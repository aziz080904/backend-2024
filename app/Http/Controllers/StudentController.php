<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function index() {
        $students = Student::all();

        if ($students){
            $data = [
                'message' => 'menampilkan semua data',
                'data' => $students,
            ];
        }
        else {
            $data = [
                'message' => 'data kosong',
            ];
        }
            return response()->json($data, 200);
    }

    public function store(Request $request){
        
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'nim' => 'numeric|required',
            'email' => 'email|required',
            'jurusan' => 'required',
        ]);
        
        if($validator->fails()) {
            return response() -> json([
                'message' => 'validation errors',
                'errors' => $validator->errors()
            ], 422);
        }

        $validatedData = $validator->validated();
        $student = Student::create($validatedData);

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
