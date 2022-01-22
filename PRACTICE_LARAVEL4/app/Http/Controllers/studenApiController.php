<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class studenApiController extends Controller
{
    public function index() 
    {
        // mengambil data dari database, lalu simpan kedalam array dahulu
        $data['student'] = Student::all();

        // return data array ke API
        return response() -> json($data);
    }

    // menampilkan data siswa melalui API dgn menggunakan parameter id
    public function getById($id) 
    {
        // mengambil data dari database berdasarkan id, lalu simpan kedalam array dahulu
        $data['student'] = Student::find($id);

        // return data array ke API
        return response() -> json($data);
    }

    // menampilkan data siswa melalui API dgn menggunakan parameter nim
    public function getBynim($nim) 
    {
        // mengambil data dari database berdasarkan nim, lalu simpan kedalam array dahulu
        $data['student'] = Student::where('nim', $nim) -> first();

        // return data array ke API
        return response() -> json($data);
    }

    public function save() 
    {
        $student = new Student();
        $student->nim = request('nim');
        $student->name = request('name');
        $student->gender = request('gender');
        $student->departement = request('departement');
        $student->address = request('address');
        $student->save();

        return response() -> json(['message' => "Data Berhasil Disimpan"]);
    }

    public function update($id) 
    {
        $student = Student::find($id);
        $student->nim = request('nim');
        $student->name = request('name');
        $student->gender = request('gender');
        $student->departement = request('departement');
        $student->address = request('address');
        $student->save();

        return response() -> json(['message' => "Data Berhasil Diubah"]);
    }

    public function delete($id) 
    {
        // ambil data bersadarkan id
        $student = Student::find($id);

        // hapus data mahasiswa
        $student->delete();

        return response() -> json(['message' => "Data Berhasil Dihapus"]);
    }
}
