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
    public function indexPublic(Request $request)
    {
        $query = Lapangan::where('status', 'tersedia');

        if ($request->has('keyword') && !empty($request->keyword)) {
            $keyword = $request->keyword;
            $query->where(function ($q) use ($keyword) {
                $q->where('nama_lapangan', 'like', '%' . $keyword . '%')
                  ->orWhere('lokasi', 'like', '%' . $keyword . '%')
                  ->orWhere('deskripsi', 'like', '%' . $keyword . '%');
            });
        }

        if ($request->has('tipe') && !empty($request->tipe)) {
            $query->where('tipe_lapangan', $request->tipe);
        }

        if ($request->has('min_price') && !empty($request->min_price)) {
            $query->where('harga_per_jam', '>=', $request->min_price);
        }

        if ($request->has('max_price') && !empty($request->max_price)) {
            $query->where('harga_per_jam', '<=', $request->max_price);
        }

        $lapangans = $query->get();

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'courts' => $lapangans->map(fn($l) => [
                    'id' => $l->id,
                    'nama_lapangan' => $l->nama_lapangan,
                    'lokasi' => $l->lokasi,
                    'tipe_lapangan' => $l->tipe_lapangan,
                    'harga_per_jam' => $l->harga_per_jam,
                    'deskripsi' => $l->deskripsi,
                    'foto' => $l->foto,
                ]),
                'total' => $lapangans->count()
            ]);
        }

        return view('court.index', compact('lapangans'));
    }

    /**
     * Display lapangan detail untuk user (public view)
     */
    public function showPublic($id)
    {
        $lapangan = Lapangan::findOrFail($id);
        
        $weather = $this->getWeatherData();
        
        return view('court.detail', compact('lapangan', 'weather'));
    }

    /**
     * Get weather data from OpenWeatherMap API
     */
    private function getWeatherData()
    {
        try {
            $apiKey = env('OPENWEATHER_API_KEY');
            $city = 'Bandung';
            $url = "https://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$apiKey}&units=metric";
            
            $response = file_get_contents($url);
            $data = json_decode($response, true);
            
            if (isset($data['main'])) {
                return [
                    'temp' => round($data['main']['temp']),
                    'description' => ucfirst($data['weather'][0]['description']),
                    'icon' => $data['weather'][0]['icon'],
                    'humidity' => $data['main']['humidity'],
                    'wind_speed' => $data['wind']['speed'],
                ];
            }
        } catch (\Exception $e) {
            \Log::error('Weather API Error: ' . $e->getMessage());
        }
        
        return [
            'temp' => 28,
            'description' => 'Sunny with Cloud',
            'icon' => '01d',
            'humidity' => 60,
            'wind_speed' => 3.5,
        ];
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

    
        if ($request->input('hapus_foto_lama') == '1' && $lapangan->foto) {
            \Storage::disk('public')->delete($lapangan->foto);
            $validated['foto'] = null;
        }

    
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