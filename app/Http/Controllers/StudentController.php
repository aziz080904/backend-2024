<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index(){
        $students = Student::all();
        $data = [
            'message'=>'Akses data sukses',
            'data'=>$students
        ];

        return response()->json($data,200);}

    public function store(Request $request){
        $input =[
            'nama'=>$request->nama,
            'nim'=>$request->nim,
            'email'=>$request->email,
            'jurusan'=>$request->jurusan];

        $student = Student::create($input);
        $data = [
            'message' => 'Input data sukses',
            'data' => $student,
        ];

        return response()->json($data, 201);}

    public function update(Request $request, $id) {
        # cari id student yang ingin diupdate
        $student = Student::find($id);

        if ($student) {
            # menangkap data request
            $input = [
            'nama' => $request->nama ?? $student->nama,
            'nim' => $request->nim ?? $student->nim,
            'email' => $request->email ?? $student->email,
            'jurusan' => $request->jurusan ?? $student->jurusan
            ];
            # melakukan update data
            $student->update($input);
            $data = [
            'message' => 'Ubah data sukses',
            'data' => $student
            ];
            # mengembalikan data (json) dan kode 200
            return response()->json($data, 200);
        }
            
        else {
            $data = [
            'message' => 'Data tidak ditemukan'
            ];
            return response()->json($data, 404);
            }
        }

    public function destroy($id) {
        # cari id student yang ingin dihapus
        $student = Student::find($id);
        
        if ($student) {
            # hapus student tersebut
            $student->delete();

            $data = [
                'message' => 'Hapus data sukses'
            ];

            # mengembalikan data (json) dan kode 200
            return response()->json($data, 200);
        }

        else {
            $data = [
                'message' => 'Data tidak ditemukan'
            ];

            return response()->json($data, 200);
        }
    }

    public function show($id){
        $student = Student::find($id);

        if($student){
            $data = 
            ['message' => 'Dapat detail student',
            'data' => $student];

            return response()->json($data, 200);
        }
        else {
            $data = [
                'message' => 'Gagal dapat student'];

            return response()->json($data, 404);
        }
    }
}
