<?php

namespace App\Http\Controllers;

use App\Enums\UserRolesEnum;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class InstrukturController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $instruktur = User::query()
            ->instruktur()
            ->orderByDesc('created_at')
            ->paginate(10);
        return view('instruktur.index', compact('instruktur'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('instruktur.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'no_telp' => ['required'],
            'alamat' => ['required'],
        ]);

        $data['password'] = Hash::make('password');
        $data['role'] = UserRolesEnum::INSTRUKTUR->value;
        User::create($data);
        session()->flash('success', 'Data berhasil disimpan.');
        return redirect()->route('instruktur.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $instruktur)
    {
        return view('instruktur.edit', compact('instruktur'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $instruktur)
    {
        $data = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'no_telp' => ['required'],
            'alamat' => ['required'],
        ]);

        $instruktur->update($data);
        session()->flash('success', 'Data berhasil disimpan.');
        return redirect()->route('instruktur.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $instruktur)
    {
        $instruktur->delete();
        session()->flash('success', 'Data berhasil hapus.');
        return redirect()->route('instruktur.index');
    }
}
