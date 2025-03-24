<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\CourseRegistration;
use App\Models\Setting;
use Illuminate\Support\Facades\Storage;

class CourseRegistrationController extends Controller
{
    public function index()
    {
        $registrations = CourseRegistration::orderBy('created_at', 'desc')->get();
        $title = 'Data siswa';
        return view('pendaftaran.siswa', compact('registrations', 'title'));
    }

    public function create() {
        $settings = Setting::orderBy('created_at', 'desc')->get();; 
        return view('pendaftaran.pendaftaran', ['settings' => $settings], compact('settings'))->with('title', 'pendaftaran');
    }
    
    public function store(Request $request)
    {
        $request->merge([
            'telepon' => $request->kode_negara . $request->telepon,
        ]);

        $validated = $request->validate([
            'ketentuan_dan_kebijakan' => 'required|string|max:41',
            'nama_lengkap' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string|max:9',
            'agama' => 'required|string|max:9',
            'alamat_lengkap' => 'required|string|max:255', 
            'photo_ktp' => 'required|image|mimes:jpeg,png,jpg,webp|max:10000',
            'telepon' => 'required|string|max:17|unique:course_registrations,telepon',
            'telepon_orangtua' => 'required|string|max:17',
            'akun_instagram' => 'required|string|max:255',
            'status' => 'required|string|max:15',
            'asal_sekolah_kampus' => 'required|string|max:255',
            'pekerjaan' => 'required|string|max:15',
            'bekerja_di' => 'required|string|max:255',
            'input_lainnya' => 'nullable|string|max:255',
            'jenis_program' => 'required|string|max:7',
            'model_pembelajaran' => 'required|string|max:19',
            'program_studi' => 'required|string|max:255',
            'program_studi_lainnya' => 'nullable|string|max:255', 
            'jam_pilihan' => 'required|string|max:7',
            'mulai_pendidikan' => 'required|string|max:10',
            'informasi' => 'required|string|max:255',
            'nama_ibu'=> 'required|string|max:255',
            'nama_ayah'=> 'required|string|max:255',
            'alat_transportasi' => 'required|string|max:17',
            'KIP' => 'required|string|max:5',
            'KPS' => 'required|string|max:5',
        ], [
            'telepon.unique' => 'Nomor telepon sudah terdaftar !', 
        ]);

        if ($request->hasFile('photo_ktp')) {
            $file = $request->file('photo_ktp');
            $fileName = time().'_'.$file->getClientOriginalName();
            $filePath = $file->storeAs('photo_ktp', $fileName, 'public'); 
        }

        if ($validated['program_studi'] === 'Lainnya') {
            $programStudi = $validated['program_studi_lainnya'];
        } else {
            $programStudi = $validated['program_studi'];
        }

        $bekerjaDi = $validated['bekerja_di'] === 'lainnya' ? $validated['input_lainnya'] : $validated['bekerja_di'];

        CourseRegistration::create(array_merge($validated, [
            'program_studi' => $programStudi, 
            'bekerja_di' => $bekerjaDi,
            'photo_ktp' => $filePath,
        ]));

        return redirect()->route('pendaftaran')->with([
            'success' => 'pendaftaran kursus alfabank yogyakarta.',
            'formrecord' => 'Pendaftaran kursus telah berhasil !',
            'data' => 'Data siswa',
            'form' => 'Form pendaftaran',
            'siswa' => route('pendaftaran.index'),
            'formlink' => route('pendaftaran')
        ]);
    }

    public function edit(CourseRegistration $registration)
    {
        return view('pendaftaran.edit', [
            'registration' => $registration,
            'title' => 'edit data siswa'
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nomor_induk_siswa' => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('course_registrations')->ignore($id), 
            ],
            'kode_kelas' => 'nullable|string|max:255',
            'nama_lengkap' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string|max:9',
            'agama' => 'required|string|max:9',
            'alamat_lengkap' => 'required|string|max:255',
            'photo_ktp' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:10000',
            'telepon' => [
                'required',
                'string',
                'max:17',
                Rule::unique('course_registrations')->ignore($id), 
            ],
            'telepon_orangtua' => 'required|string|max:17',
            'akun_instagram' => 'required|string|max:255',
            'status' => 'required|string|max:15',
            'asal_sekolah_kampus' => 'required|string|max:255',
            'pekerjaan' => 'required|string|max:15',
            'bekerja_di' => 'required|string|max:255',
            'jenis_program' => 'required|string|max:7',
            'model_pembelajaran' => 'required|string|max:19',
            'program_studi' => 'required|string|max:255',
            'jam_pilihan' => 'required|string|max:7',
            'mulai_pendidikan' => 'required|string|max:10',
            'informasi' => 'required|string|max:255',
            'nama_ibu'=> 'required|string|max:255',
            'nama_ayah'=> 'required|string|max:255',
            'alat_transportasi' => 'required|string|max:17',
            'KIP' => 'required|string|max:5',
            'KPS' => 'required|string|max:5',
        ], [
            'nomor_induk_siswa' => 'Nomor induk sudah terdaftar !',
            'telepon.unique' => 'Nomor telepon sudah terdaftar !', 
        ]);
    
        $registration = CourseRegistration::findOrFail($id);
    
        if ($request->hasFile('photo_ktp')) {
            if ($registration->photo_ktp && Storage::disk('public')->exists($registration->photo_ktp)) {
                Storage::disk('public')->delete($registration->photo_ktp);
            }
    
            $path = $request->file('photo_ktp')->store('photo_ktp', 'public');
            $registration->photo_ktp = $path;
        }
    
        $registration->nomor_induk_siswa = $request->input('nomor_induk_siswa');
        $registration->kode_kelas = $request->input('kode_kelas');
        $registration->nama_lengkap = $request->input('nama_lengkap');
        $registration->tempat_lahir = $request->input('tempat_lahir');
        $registration->tanggal_lahir = $request->input('tanggal_lahir');
        $registration->jenis_kelamin = $request->input('jenis_kelamin');
        $registration->agama = $request->input('agama');
        $registration->alamat_lengkap = $request->input('alamat_lengkap');
        $registration->telepon = $request->input('telepon');
        $registration->telepon_orangtua = $request->input('telepon_orangtua');
        $registration->akun_instagram = $request->input('akun_instagram');
        $registration->status = $request->input('status');
        $registration->asal_sekolah_kampus = $request->input('asal_sekolah_kampus');
        $registration->pekerjaan = $request->input('pekerjaan');
        $registration->bekerja_di = $request->input('bekerja_di');
        $registration->jenis_program = $request->input('jenis_program');
        $registration->model_pembelajaran = $request->input('model_pembelajaran');
        $registration->program_studi = $request->input('program_studi');
        $registration->jam_pilihan = $request->input('jam_pilihan');
        $registration->mulai_pendidikan = $request->input('mulai_pendidikan');
        $registration->informasi = $request->input('informasi');
        $registration->nama_ibu = $request->input('nama_ibu');
        $registration->nama_ayah = $request->input('nama_ayah');
        $registration->alat_transportasi = $request->input('alat_transportasi');
        $registration->KIP = $request->input('KIP');
        $registration->KPS = $request->input('KPS');
    
        $registration->save();
    
        return redirect()->route('pendaftaran.index')->with('success', 'Edit data pendaftaran berhasil.');
    }
    

    public function destroy(CourseRegistration $courseRegistration)
    {
        // Hapus file dari storage
        if (Storage::disk('public')->exists($courseRegistration->photo_ktp)) {
            Storage::disk('public')->delete($courseRegistration->photo_ktp);
        }
    

        $courseRegistration->delete();

        return redirect()->route('pendaftaran.index')->with('success', 'Hapus data siswa berhasil');
    }
}
