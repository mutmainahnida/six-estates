<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hotels = Hotel::all();
        return view('hotels.index', compact('hotels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('hotels.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_hotel' => 'required|max:255',
            'alamat' => 'required',
            'kota' => 'required|max:255',
            'bintang' => 'required|integer|min:1|max:5',
            'deskripsi' => 'nullable',
        ]);

        Hotel::create($validatedData , $request->all());

        return redirect()->route('hotels.index')->with('success', 'Hotel berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $hotel = Hotel::find($id); // Mencari hotel berdasarkan ID
        if (!$hotel) {
        return abort(404);
        }
        return view('hotels.show', compact('hotel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $hotel = Hotel::find($id);
        if (!$hotel) {
            return abort(404);
        }
        return view('hotels.edit', compact('hotel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $hotel = Hotel::find($id);
        if (!$hotel) {
            return abort(404);
        }

        $request->validate([
            'nama_hotel' => 'required|string|max:255',
            'alamat' => 'required|string',
            'kota' => 'required|string|max:255',
            'bintang' => 'required|integer|min:1|max:5',
            'deskripsi' => 'nullable|string',
        ]);

        $hotel->update($request->all());
        return redirect()->route('hotels.index')->with('success', 'Hotel berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $hotel = Hotel::findOrFail($id);
        $hotel->delete();

        return redirect()->route('hotels.index')
            ->with('success', 'Hotel berhasil dihapus.');
    }
}