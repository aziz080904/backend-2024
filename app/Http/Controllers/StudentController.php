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
        $student = Student::find($id);
        $student->update([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request->jurusan
        ]);
        return response()->json([
            'message' => 'Ubah data sukses',
            'data' => $student], 200);}

    public function destroy($id) {
        $student = Student::find($id);
        $student->delete();
        return response()->json([
            'message' => 'Hapus data sukses'], 200);}
}
