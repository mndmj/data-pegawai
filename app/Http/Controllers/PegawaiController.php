<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function index(): View
    {
        $pegawai = Pegawai::latest()->paginate(10);
        return view('data_pegawai.index', compact('pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $pegawai = Pegawai::find('jk');
        return view('data_pegawai.create', compact('pegawai'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nip' => 'required|unique:pegawais,nip|numeric',
            'nama' => 'required|min:2',
            'jk' => 'required',
        ]);
        Pegawai::create([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'jk' => $request->jk
        ]);
        return redirect()->route('pegawai.index')->with(['success', 'Data berhasil disimpan']);
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
    public function edit(string $id): View
    {
        $pegawai = Pegawai::findOrFail($id);
        return view('data_pegawai.edit', compact('pegawai'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'nip' => 'required|numeric|unique:pegawais,nip,' . $id,
            'nama' => 'required|min:2',
            'jk' => 'required',
        ]);

        $pegawai = Pegawai::findOrFail($id);

        $pegawai->update([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'jk' => $request->jk,
        ]);

        return redirect()->route('pegawai.index')->with(['success' => 'Data berhasil diubah !!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        $pegawai = Pegawai::findOrFail($id);
        $pegawai->delete();
        return redirect()->route('pegawai.index')->with(['success' => 'Data berhasil dihapus !!']);
    }
}
