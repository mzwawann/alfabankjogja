<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;

class ChartController extends Controller
{
    public function index()
    {
        // Ambil data dari model Sale
        $sales = Sale::all();

        // Format data untuk chart
        $data = $sales->map(function($sale) {
            return ['label' => $sale->month, 'y' => $sale->amount];
        });

        //Kirim data ke view
        return view('home', ['data' => $data]);
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
