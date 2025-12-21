<?php

namespace App\Http\Controllers;

use App\Models\Lapangan;
use Illuminate\Http\Request;

class LapanganController extends Controller
{
    /**
     * Display lapangan untuk home page (featured)
     */
    public function indexHome()
    {
        $lapangans = Lapangan::where('status', 'tersedia')->limit(6)->get();
        return view('home', compact('lapangans'));
    }

    /**
     * Display lapangan untuk user (public view)
     */
    public function indexPublic()
    {
        $lapangans = Lapangan::where('status', 'tersedia')->get();
        return view('court.index', compact('lapangans'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lapangans = Lapangan::all();
        return view('lapangan.index', compact('lapangans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('lapangan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lapangan' => 'required|string|max:255',
            'tipe_lapangan' => 'required|string|in:Indoor,Outdoor',
            'deskripsi' => 'required|string',
            'kapasitas' => 'required|integer|min:1',
            'harga_per_jam' => 'required|numeric|min:0',
            'status' => 'required|string|in:tersedia,tidak tersedia,pemeliharaan',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'lokasi' => 'required|string',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('lapangan', 'public');
        }

        Lapangan::create($validated);

        return redirect()->route('lapangan.index')->with('success', 'Lapangan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lapangan $lapangan)
    {
        return view('lapangan.show', compact('lapangan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lapangan $lapangan)
    {
        return view('lapangan.edit', compact('lapangan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lapangan $lapangan)
    {
        $validated = $request->validate([
            'nama_lapangan' => 'required|string|max:255',
            'tipe_lapangan' => 'required|string|in:Indoor,Outdoor',
            'deskripsi' => 'required|string',
            'kapasitas' => 'required|integer|min:1',
            'harga_per_jam' => 'required|numeric|min:0',
            'status' => 'required|string|in:tersedia,tidak tersedia,pemeliharaan',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'lokasi' => 'required|string',
        ]);

        // Handle delete foto lama
        if ($request->input('hapus_foto_lama') == '1' && $lapangan->foto) {
            \Storage::disk('public')->delete($lapangan->foto);
            $validated['foto'] = null;
        }

        // Handle upload foto baru
        if ($request->hasFile('foto')) {
            if ($lapangan->foto) {
                \Storage::disk('public')->delete($lapangan->foto);
            }
            $validated['foto'] = $request->file('foto')->store('lapangan', 'public');
        }

        $lapangan->update($validated);

        return redirect()->route('lapangan.index')->with('success', 'Lapangan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lapangan $lapangan)
    {
        if ($lapangan->foto) {
            \Storage::disk('public')->delete($lapangan->foto);
        }
        
        $lapangan->delete();

        return redirect()->route('lapangan.index')->with('success', 'Lapangan berhasil dihapus');
    }
}
