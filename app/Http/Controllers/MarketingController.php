<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marketing;
use App\Models\Omset;
use App\Models\Informan;
use App\Models\KelasBerjalan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class MarketingController extends Controller
{
    /**
     * Menampilkan halaman marketing dengan data yang dibutuhkan.
     */
    public function index()
    {
        // Memastikan pengguna sudah login
        if (Auth::check()) {
            $user = Auth::user();

            // Log role pengguna yang sedang login
            Log::info('User logged in with role: ' . $user->role);

            // Memastikan bahwa role adalah 'admin' atau 'marketing'
            if ($user->role !== 'marketing' && $user->role !== 'admin') {
                Log::warning('Unauthorized access attempt by user with role: ' . $user->role);
                return redirect()->route('home')->with('error', 'You do not have access to this page.');
            }

            // Mengambil data dari model
            $marketingData = Marketing::all()->map(function ($item) {
                return ['label' => $item->month, 'value' => $item->amount];
            });

            $omsetData = Omset::all()->map(function ($item) {
                return ['label' => $item->month, 'value' => $item->amount];
            });

            $informanData = Informan::all()->map(function ($item) {
                return ['label' => $item->month, 'value' => $item->amount];
            });

            $kelasBerjalanData = KelasBerjalan::all()->map(function ($item) {
                return ['label' => $item->month, 'value' => $item->amount];
            });

            // Mengembalikan view marketing dengan data yang sudah diambil
            return view('marketing', [
                'marketingData' => $marketingData,
                'omsetData' => $omsetData,
                'informanData' => $informanData,
                'kelasBerjalanData' => $kelasBerjalanData,
            ]);
        } else {
            Log::info('Redirecting to login because user is not authenticated');
            return redirect()->route('login')->with('error', 'Please login to access the marketing page.');
        }
    }

    /**
     * Mengambil data untuk tipe tertentu dalam format JSON.
     * @param string $type
     * @return \Illuminate\Http\JsonResponse
     */
    public function getData($type)
    {
        // Memastikan pengguna sudah login
        if (!Auth::check()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $user = Auth::user();
        Log::info('User logged in with role: ' . $user->role);

        // Memastikan hanya 'admin' atau 'marketing' yang bisa mengakses
        if ($user->role !== 'marketing' && $user->role !== 'admin') {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        // Switch untuk menentukan data berdasarkan tipe yang diminta
        switch ($type) {
            case 'marketing':
                $data = Marketing::all();
                break;
            case 'omset':
                $data = Omset::all();
                break;
            case 'informan':
                $data = Informan::all();
                break;
            case 'kelas_berjalan':
                $data = KelasBerjalan::all();
                break;
            default:
                return response()->json(['error' => 'Invalid type'], 400);
        }

        // Mengembalikan data dalam format JSON
        return response()->json([
            'labels' => $data->pluck('month'),
            'values' => $data->pluck('amount'),
        ]);
    }
}

