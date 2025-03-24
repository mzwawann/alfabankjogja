<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index()
    {
        // $guests = Guest::all();
        $guests = Guest::orderBy('created_at', 'desc')->get();
        $title = 'Buku tamu';
        return view('guests.guestsbook', compact('guests', 'title'));
    }

    public function create()
    {
        return view('guests.create', ['title' => 'Tambahkan tamu']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'kode_negara' => 'required',
            'telepon' => 'required|string|max:17',
            'kursus' => 'nullable|string|max:255',
            'status_pendidikan' => 'nullable|string|max:255', 
            'tahu_alfabank_dari' => 'nullable|string|max:255',
            'tujuan_motivasi_kursus' => 'nullable|string|max:255',
        ]);
    
        $kursus = $request->kursus_lainnya ? $request->kursus_lainnya : $request->kursus;
        $tujuan_motivasi_kursus = $request->tujuan_motivasi_kursus_lainnya ? $request->tujuan_motivasi_kursus_lainnya : $request->kursus;
        $nomor_telepon_lengkap = $request->kode_negara . $request->telepon;
    
        Guest::create([
            'name' => $request->name,
            'telepon' => $nomor_telepon_lengkap,
            'kursus' => $kursus,
            'status_pendidikan' => $request->status_pendidikan,  
            'tahu_alfabank_dari' => $request->tahu_alfabank_dari,
            'tujuan_motivasi_kursus' => $tujuan_motivasi_kursus,
            'status' => 'Info',
            'FU' => $request->FU,
        ]);
    
        return redirect()->route('create')->with([
            'success' => 'buku tamu alfabank yogyakarta.',
            'formrecord' => 'Data anda sudah berhasil direkam.',
            'guests' => route('guests.index'),
            'data' =>'Buku tamu'
        ]);
    }
    
    
    public function edit(Guest $guest)
    {
        return view('guests.edit', [
            'guest' => $guest,
            'title' => 'Edit data tamu'
        ]);
    }

    public function update(Request $request, Guest $guest)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'telepon' => 'required|string|max:17',
            'kursus' => 'nullable|string|max:255',
            'status_pendidikan' => 'nullable|string|max:255',
            'tahu_alfabank_dari' => 'nullable|string|max:255',
            'tujuan_motivasi_kursus' => 'nullable|string|max:255',
            'status' => 'nullable|string|max:255',
            'FU' => 'nullable|string|max:255',
        ]);

        $kursus = $request->kursus_lainnya ? $request->kursus_lainnya : $request->kursus;

        $guest->name = $request->name;
        $guest->telepon = $request->telepon;
        $guest->kursus = $kursus;
        $guest->status_pendidikan = $request->status_pendidikan;
        $guest->tahu_alfabank_dari = $request->tahu_alfabank_dari;
        $guest->tujuan_motivasi_kursus = $request->tujuan_motivasi_kursus;
        $guest->status = $request->status;
        $guest->FU = $request->FU;

        $guest->save();

        return redirect()->route('guests.index')->with('success', 'Guest updated successfully.');
    }


    public function destroy(Guest $guest)
    {
        $guest->delete();

        return redirect()->route('guests.index')->with('success', 'Guest deleted successfully.');
    }
}
