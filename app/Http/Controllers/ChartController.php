<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Sale;

class ChartController extends Controller
{
    public function index()
    {
        // Cek apakah pengguna sudah login
        if (Auth::check()) {
            $user = Auth::user();

            // Log role pengguna untuk debugging
            Log::info('User logged in with role: ' . $user->role);

            // Cek apakah role pengguna adalah 'marketing', 'admin', atau 'akademik'
            if ($user->role === 'admin') {
                
                // Ambil data dari model Sale
                $sales = Sale::all();

                // Format data untuk chart
                $data = $sales->map(function ($sale) {
                    return ['label' => $sale->month, 'y' => $sale->amount];
                })->toArray(); // Pastikan data dikonversi ke array

                // Kirim data ke view
                return view('home', compact('data'));
            } else {
                // Jika pengguna tidak memiliki role yang sesuai, kembali ke halaman sebelumnya
                return redirect()->back()->with('error', 'You do not have access to this page.');
            }
        } else {
            // Jika pengguna belum login, arahkan ke halaman login
            return redirect()->route('login')->with('error', 'Please login to access this page.');
        }
    }

    public function getData()
    {
        $sales = Sale::all();
        
        $labels = $sales->pluck('month');
        $values = $sales->pluck('amount');

        return response()->json([
            'labels' => $labels,
            'values' => $values
        ]);
    }
}
