<?php

namespace App\Http\Controllers;

use App\Models\setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = setting::orderBy('created_at', 'desc')->get();
        
        return view('pendaftaran.settings', compact('settings'))->with([
            'title' => 'Ketentuan dan Kebijakan kursus',
            'banner' => 'upload PDF ketentuan dan Kebijakan',
            'destroy' => 'hapus',
            'upload' => 'upload',
            'download' => 'download',
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'file_path' => 'required|mimes:pdf|max:4096',
        ]);

        if ($request->hasFile('file_path')) {
            $file = $request->file('file_path');
            $fileName = $file->getClientOriginalName();
            $filePath = $file->storeAs('file_path', $fileName, 'public'); 
        }

        setting::create(array_merge($validated, [
            'file_path' => $filePath,
        ]));

        return redirect()->route('settings')->with([
            'success' => 'upload file telah berhasil.',
        ]);
    }

    public function destroy($id)
    {
        // Cari entri di database berdasarkan ID
        $setting = Setting::findOrFail($id);
    
        // Hapus file dari storage
        if (Storage::disk('public')->exists($setting->file_path)) {
            Storage::disk('public')->delete($setting->file_path);
        }
    
        // Hapus entri dari database
        $setting->delete();
    
        // Redirect dengan pesan sukses
        return redirect()->route('settings')->with('success', 'Dokumen berhasil dihapus.');
    }
    
}
