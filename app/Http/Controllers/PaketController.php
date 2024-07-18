<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use Illuminate\Http\Request;
use App\ManagementFile;

class PaketController extends Controller
{
    use ManagementFile;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pakets = Paket::query()
            ->orderByDesc('created_at')
            ->paginate(3);
        return view('paket.index', compact('pakets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('paket.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => ['required'],
            'kelas' => ['required'],
            'jumlah_pertemuan' => ['required', 'numeric'],
            'jumlah_jam' => ['required', 'numeric'],
            'harga' => ['required', 'numeric'],
            'jenis' => ['required'],
            'foto' => ['nullable', 'image'],
            
        ]);

        $file_name = null;
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $file_name = time() . "_" . $file->getClientOriginalName();
            $file->storeAs('public/cover', $file_name);
        }
        Paket::create([
            'nama' => $request->nama,
            'jumlah_pertemuan' => $request->jumlah_pertemuan,
            'jumlah_jam' => $request->jumlah_jam,
            'kelas' => $request->kelas,
            'jns_mobil' => $request->jenis,
            'harga' => $request->harga,
            'foto' => $file_name,
            'keterangan' => $request->keterangan,
        ]);
        session()->flash('success', 'Data berhasil disimpan.');
        return redirect()->route('paket.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Paket $paket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Paket $paket)
    {
        return view('paket.edit', compact('paket'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Paket $paket)
    {
        $request->validate([
            'nama' => ['required'],
            'kelas' => ['required'],
            'jumlah_pertemuan' => ['required', 'numeric'],
            'jumlah_jam' => ['required', 'numeric'],
            'harga' => ['required', 'numeric'],
            'jenis' => ['required'],
            'foto' => ['nullable', 'image'],
        ]);

        if ($request->hasFile('foto')) {
            $this->removeFile('cover/' . $paket->foto);
            $file = $request->file('foto');
            $file_name = time() . "_" . $file->getClientOriginalName();
            $file->storeAs('public/cover', $file_name);
            $paket->foto = $file_name;
        }

        $paket->nama = $request->nama;
        $paket->kelas = $request->kelas;
        $paket->jumlah_pertemuan = $request->jumlah_pertemuan;
        $paket->jumlah_jam = $request->jumlah_jam;
        $paket->jns_mobil = $request->jenis;
        $paket->harga = $request->harga;
        $paket->keterangan = $request->keterangan;
        $paket->save();

        session()->flash('success', 'Data berhasil disimpan.');
        return redirect()->route('paket.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Paket $paket)
    {
        $this->removeFile('cover/' . $paket->foto);
        $paket->delete();
        session()->flash('success', 'Data berhasil dihapus.');
        return redirect()->route('paket.index');
    }
}
