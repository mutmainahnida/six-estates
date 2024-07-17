<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Kamar;
use Illuminate\Http\Request;

class KamarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kamars = Kamar::with('hotel')->get();
        return view('kamars.index', compact('kamars'));
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kamar = Kamar::findOrFail($id);
        $hotels = Hotel::all();
        return view('kamars.edit', compact('kamar', 'hotels'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
      $kamar = Kamar::find($id);
      if (!$kamar) {
          return abort(404);
      }

      $request->validate([
            'hotel_id'   => 'required|exists:hotels,id',
            'tipe_kamar' => 'required|string|max:255',
            'harga'      => 'required|numeric',
            'kapasitas'  => 'required|integer',
            'deskripsi'  => 'nullable|string',
      ]);

      $kamar->update($request->all());

      return redirect()->route('kamars.index', [$kamar->hotel_id])
              ->with('success', 'Kamar berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kamar = Kamar::find($id);
        if (!$kamar) {
            return abort(404);
        }
  
        $kamar->delete();
  
        return redirect()->route('kamars.index')
                ->with('success', 'Kamar berhasil dihapus');
    }
}