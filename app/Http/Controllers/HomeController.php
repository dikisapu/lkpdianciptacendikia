<?php

namespace App\Http\Controllers;

use App\Enums\StatusTransaksiEnum;
use App\Models\Paket;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use App\ManagementFile;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    use ManagementFile;

    public function index()
    {
        return view('dashboard');
    }

    public function paket()
    {
        $pakets = Paket::query()
            ->orderByDesc('created_at')
            ->paginate(9);
        return view('daftar-paket', compact('pakets'));
    }

    public function detailPaket(Paket $paket)
    {
        return view('detail-paket', compact('paket'));
    }

    public function bokingPaket(Paket $paket)
    {
        if (!auth()->check()) {
            session()->flash('fail', 'Login terlebih dahulu');
            return redirect()->route('auth.form-login');
        }
        return view('bokin-paket', compact('paket'));
    }

    public function storeBoking(Request $request, Paket $paket)
    {
        Transaksi::create([
            'kode' => $this->kode_transaksi(),
            'paket_id' => $paket->id,
            'user_id' => auth()->user()->id,
            'status_transaksi' => StatusTransaksiEnum::MENUNGGU_PEMBAYARAN->value,
            'range_jam' => $request->range_jam,
            'kelas' => $request->kelas,
            'hari' => $request->hari,
            'tgl_transaksi' => date('Y-m-d'),
            'tgl_mulai' => null,
            'catatan' => $request->catatan,
        ]);

        session()->flash('success', 'Data berhasil disimpan.');
        return redirect()->route('my-paket');
    }

    public function myPaket()
    {
        $transaksi = Transaksi::query()
            ->with('paket')
            ->where('user_id', auth()->user()->id)
            ->paginate(10);
        return view('paket-saya', compact('transaksi'));
    }

    public function detailMyPaket(Transaksi $transaksi)
    {
        return view('detail-paket-saya', compact('transaksi'));
    }

    public function uploadBuktiBayar(Request $request, Transaksi $transaksi)
    {
        $request->validate([
            'bukti_bayar' => ['required', 'image']
        ]);
        $file_name = null;
        if ($request->hasFile('bukti_bayar')) {
            $file = $request->file('bukti_bayar');
            $file_name = $transaksi->kode . '-' . $file->getClientOriginalName();
            $file->storeAs('public/bukti_bayar', $file_name);
        }
        $transaksi->update([
            'bukti_bayar' => $file_name,
            'tgl_bayar' => date('Y-m-d'),
            'status_transaksi' => StatusTransaksiEnum::MENUNGGU_KONFIRMASI->value
        ]);
        session()->flash('success', 'Bukti bayar sudah dikirim.');
        return redirect()->back();
    }

    public function myProfile()
    {
        $member = User::find(auth()->user()->id);
        return view('my-profile', compact('member'));
    }

    public function updateProfile(Request $request, User $member)
{
    $request->validate([
        'name' => ['required'],
        'alamat' => ['required'],
        'kk' => ['nullable', 'image'],
        'ktp' => ['nullable', 'image'],
        'foto' => ['nullable', 'image'],
        'ijazah' => ['nullable', 'image'],
    ]);

    if ($request->hasFile('foto')) {
        $this->removeFile('foto/' . $member->foto);
        $fileFoto = $request->file('foto');
        $foto = time() . "_" . $fileFoto->getClientOriginalName();
        $fileFoto->storeAs('public/foto', $foto);
        $member->foto = $foto;
    }
    $member->name = $request->name;
    $member->no_telp = $request->no_telp;
    $member->alamat = $request->alamat;
    $member->save();

    // Pastikan objek relasi ada sebelum memodifikasinya
    if ($member->member) {
        if ($request->hasFile('ktp')) {
            $this->removeFile('ktp/' . optional($member->member)->ktp);
            $fileKTP = $request->file('ktp');
            $ktp = time() . "_" . $fileKTP->getClientOriginalName();
            $fileKTP->storeAs('public/ktp', $ktp);
            $member->member->ktp = $ktp;
        }
        if ($request->hasFile('kk')) {
            $this->removeFile('kk/' . optional($member->member)->kk);
            $fileKK = $request->file('kk');
            $kk = time() . "_" . $fileKK->getClientOriginalName();
            $fileKK->storeAs('public/kk', $kk);
            $member->member->kk = $kk;
        }
        if ($request->hasFile('ijazah')) {
            $this->removeFile('ijazah/' . optional($member->member)->ijazah);
            $fileIjazah = $request->file('ijazah');
            $ijazah = time() . "_" . $fileIjazah->getClientOriginalName();
            $fileIjazah->storeAs('public/ijazah', $ijazah);
            $member->member->ijazah = $ijazah;
        }
        $member->member->save();
    } else {
        // Tangani kasus di mana relasi member tidak ada (opsional)
        session()->flash('error', 'Member tidak ditemukan.');
        return redirect()->route('my-profile');
    }

    session()->flash('success', 'Data berhasil disimpan.');
    return redirect()->route('my-profile');
}


    public function reset(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        $user = User::find(auth()->user()->id);
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->email = $request->email;
        $user->save();

        session()->flash('success', 'Data berhasil disimpan.');
        return redirect()->route('my-profile');
    }

    public function aboutUs()
    {
        return view('about-us');
    }

    public function faq()
    {
        return view('faq');
    }

    public function cetakInvoice(Transaksi $transaksi)
    {
        return view('cetak-invoice', compact('transaksi'));
    }
}
