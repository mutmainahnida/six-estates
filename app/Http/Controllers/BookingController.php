<?php

namespace App\Http\Controllers;

use App\Models\Booking;
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
        $bookings = Booking::with('user', 'kamar')->get()->map(function ($booking) {
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
    public function edit(string $id)
    {
        $booking = Booking::with('user', 'kamar')->findOrFail($id); // Eager load user and kamar data
        $users = User::all(); // Get all users
        $kamars = Kamar::all(); // Get all kamars
        return view('bookings.edit', compact('booking', 'users', 'kamars'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'user_id' => 'required|integer|exists:users,id',
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