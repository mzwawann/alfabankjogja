<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class KeuanganController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $user = Auth::user();
            Log::info('User logged in with role: ' . $user->role);

            if ($user->role === 'keuangan' || $user->role === 'admin') {
                // Logic untuk halaman keuangan
                return view('keuangan');  // Asumsi ada view bernama 'keuangan.blade.php'
            } else {
                Log::info('Redirecting to home because role is not keuangan or admin');
                return redirect()->route('home')->with('error', 'You do not have access to this page.');
            }
        } else {
            Log::info('Redirecting to login because user is not authenticated');
            return redirect()->route('login')->with('error', 'Please login to access the keuangan page.');
        }
    }
}
