<?php

namespace App\Http\Controllers;

use App\Enums\UserRolesEnum;
use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\ManagementFile;

class MemberController extends Controller
{
    use ManagementFile;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $member = User::query()
            ->has('member')
            ->paginate(10);
        return view('member.index', compact('member'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $member)
    {
        return view('member.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $member)
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

        if ($request->hasFile('ktp')) {
            $this->removeFile('ktp/' . $member?->member?->ktp);
            $fileKTP = $request->file('ktp');
            $ktp = time() . "_" . $fileKTP->getClientOriginalName();
            $fileKTP->storeAs('public/ktp', $ktp);
            $member->member->ktp = $ktp;
        }
        if ($request->hasFile('kk')) {
            $this->removeFile('kk/' . $member?->member?->kk);
            $fileKK = $request->file('kk');
            $kk = time() . "_" . $fileKK->getClientOriginalName();
            $fileKK->storeAs('public/kk', $kk);
            $member->member->kk = $kk;
        }
        if ($request->hasFile('ijazah')) {
            $this->removeFile('ijazah/' . $member?->member?->ijazah);
            $fileIjazah = $request->file('ijazah');
            $ijazah = time() . "_" . $fileIjazah->getClientOriginalName();
            $fileIjazah->storeAs('public/ijazah', $ijazah);
            $member->member->ijazah = $ijazah;
        }
        $member->member->save();

        session()->flash('success', 'Data berhasil disimpan.');
        return redirect()->route('member.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        //
    }
}
