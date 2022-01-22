<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use PDO;

use function PHPUnit\Framework\returnSelf;

class StudentController extends Controller{
    
    //function untuk menghapus index
    public function index(){
        $data['student'] = Student::all();
        return view('student', $data);
    }

    //functionn untuk mngambil nilai form 
    public function create(){
        $data['gender'] = ['L', 'P'];
        $data['departement'] = ['S1 RPL', 'S1 Informatika', 'S1 Sistem Informasi'];

        return view('student_create', $data);
    }

    //funtion untuk input data
    public function store(Request $request){
        $request->validate([
            'nim' => 'required|size:8, unique:students',
            'nama' => 'required|min:3|max:50',
            'gender' => 'required|in:P,L',
            'departement' => 'required',
            'address' => '',
        ]);

        $student = new Student();

        $student->nim = $request->nim;
        $student->nama = $request->nama;
        $student->gender = $request->gender;
        $student->departement = $request->departement;
        $student->address = $request->address;
        $student->save();

        return redirect(route('student.index'))->with('pesan', 'Data berhasil disimpan');
    }

    //function untuk akses data
    public function edit($id){
        $data['gender'] = ['L', 'P'];
        $data['departement'] = ['S1 RPL', 'S1 Informatika', 'S1 Sistem Informasi'];
        $data['student'] = Student::find($id);

        return view('student_edit', $data);
    }

    //function untuk update data 
    public function update(Request $request, $id){
        $request->validate([
            'nim' => 'required|size:8, unique:students',
            'nama' => 'required|min:3|max:50',
            'gender' => 'required|in:P,L',
            'departement' => 'required',
            'address' => '',
        ]);

        $student = new Student();

        $student = Student::find($id);
        $student->nim = $request->nim;
        $student->nama = $request->nama;
        $student->gender = $request->gender;
        $student->departement = $request->departement;
        $student->address = $request->address;
        $student->save();

        return redirect(route('student.index'))->with('pesan', 'Data berhasil diupdate');
    }

    //function untuk hapus data
    public function destroy($id){
        $student = Student::find($id);
        $student->delete();

        return redirect(route('student.index'))->with('pesan', 'data berhasil dihapus');
    }

}
