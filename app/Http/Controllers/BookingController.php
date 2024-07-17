<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Hotel;
use App\Models\Kamar;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = Booking::with('user', 'hotel' , 'kamar')->get()->map(function ($booking) {
        $booking->tanggal_check_in = Carbon::parse($booking->tanggal_check_in);
        $booking->tanggal_check_out = Carbon::parse($booking->tanggal_check_out);
        return $booking;
    });

    return view('bookings.index', compact('bookings'));

}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $hotels = Hotel::all();
        $kamars = Kamar::all();
        return view('bookings.create', compact('users', 'hotels' , 'kamars'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'hotel_id' => 'required|exists:hotels,id',
            'kamar_id' => 'required|exists:kamars,id',
            'tanggal_check_in' => 'required|date',
            'tanggal_check_out' => 'required|date',
            'total_harga' => 'required|numeric',
            'status' => 'required|string',
        ]);

        Booking::create($request->all());

        return redirect()->route('bookings.index')
                         ->with('success', 'Booking berhasil ditambahkan.');
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
    public function edit(string $id)
    {
        $booking = Booking::with('user', 'hotel' , 'kamar')->findOrFail($id); 
        $users = User::all();
        $hotels = Hotel::all();
        $kamars = Kamar::all();
        return view('bookings.edit', compact('booking', 'users', 'kamars'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'hotel_id' => 'required|integer|exists:hotels,id',
            'kamar_id' => 'required|integer|exists:kamars,id',
            'tanggal_check_in' => 'required|date|after:today',  
            'tanggal_check_out' => 'required|date|after:tanggal_check_in',
          ]);
        
          $booking = Booking::findOrFail($id);
        
          
          $tanggal_check_in = Carbon::parse($request->tanggal_check_in);
          $tanggal_check_out = Carbon::parse($request->tanggal_check_out);
  
          // Menghitung harga berdasarkan tipe kamar, dan juga kalkulasi hari
          $days = $tanggal_check_out->diffInDays($tanggal_check_in);
          $kamar = Kamar::find($request->kamar_id);
          $total_harga = $days * $kamar->harga;
  
          $booking->update([
              'user_id' => $request->user_id,
              'hotel_id' => $request->hotel_id,
              'kamar_id' => $request->kamar_id,
              'tanggal_check_in' => $tanggal_check_in,
              'tanggal_check_out' => $tanggal_check_out,
              'total_harga' => $total_harga,
          ]);
        
          return redirect()->route('bookings.index')->with('success', 'Booking berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();
      
        return redirect()->route('bookings.index')->with('success', 'Booking berhasil dihapus!');
    }
}