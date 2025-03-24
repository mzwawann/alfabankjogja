<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Tampilkan form login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'id_user' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        // Tentukan apakah input adalah email atau username
        $login_type = filter_var($request->id_user, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        // Coba login dengan data yang disediakan
        if (Auth::attempt([$login_type => $credentials['id_user'], 'password' => $credentials['password']])) {
            // Regenerasi session untuk keamanan
            $request->session()->regenerate();

            // Arahkan berdasarkan role
            $user = Auth::user();
            return $this->redirectToRole($user->role);
        }

        // Jika login gagal
        return back()->withErrors([
            'id_user' => 'Username atau password salah.',
        ]);
    }

    // Fungsi untuk mengarahkan berdasarkan role
    private function redirectToRole($role)
    {
        switch ($role) {
            case 'admin':
                return redirect()->route('home'); // Admin ke home
            case 'marketing':
                return redirect()->route('marketing'); // Marketing ke halaman marketing
            case 'akademik':
                return redirect()->route('akademik'); // Akademik ke halaman akademik
            case 'keuangan':
                return redirect()->route('keuangan'); // Keuangan ke halaman keuangan
            case 'logistik':
                return redirect()->route('logistik'); // Logistik ke halaman logistik
            default:
                return redirect()->route('dashboard'); // Default ke dashboard
        }
    }

    // Fungsi logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
