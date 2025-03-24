<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LogistikController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $user = Auth::user();
            Log::info('User logged in with role: ' . $user->role);

            if ($user->role === 'logistik' || $user->role === 'admin') {
                // Logic untuk halaman logistik
                return view('logistik');  // Asumsi ada view bernama 'logistik.blade.php'
            } else {
                Log::info('Redirecting to home because role is not logistik or admin');
                return redirect()->route('home')->with('error', 'You do not have access to this page.');
            }
        } else {
            Log::info('Redirecting to login because user is not authenticated');
            return redirect()->route('login')->with('error', 'Please login to access the logistik page.');
        }
    }
}
