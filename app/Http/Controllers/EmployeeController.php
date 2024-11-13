<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    //membuat method index untuk mendapat semua data employee
    public function index() {
        $employees = Employee::all();
        //membuat condition jika resource tersedia atau tidak
        if ($employees){
            $data = [
                'message' => 'Get All Resource',
                'data' => $employees,
            ];
        }
        else {
            $data = [
                'message' => 'Data is empty',
            ];
        }
            return response()->json($data, 200);
    }

    //membuat method store untuk menambah data employee
    public function store(Request $request){
        //Membuat validation
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:200',
            'gender' => 'required|in:L,P', // validator gender L untuk laki-laki dan P untuk perempuan
            'phone' => 'required|string|max:13', // validasi nomor hp employee
            'address' => 'required|string', // validasi alamat employee
            'email' => 'required|email|unique:employees,email', // validasi email employee
            'status' => 'required|in:active,inactive,terminated', // validasi status employee
            'hired_on' => 'required|date', // validasi tanggal masuk employee
        ]);
        
        //membuat condition jika menambah data berhasil atau gagal
        if($validator->fails()) {
            return response() -> json([
                'message' => 'validation errors',
                'errors' => $validator->errors()
            ], 422);
        }

        $validatedData = $validator->validated();
        $employee = Employee::create($validatedData);

        $data = [
            'message' => 'Resource is added successfully',
            'data' => $employee,
        ];

        return response()->json($data, 201);
    }

    //membuat method show untuk menampilkan data employee menggunakan id
    public function show($id){
        $employee = Employee::find($id);
        //membuat condition jika data ditemukan atau tidak ditemukan
        if($employee){
            $data = 
            ['message' => 'Get Detail Resource',
            'data' => $employee];
    
            return response()->json($data, 200);
        }
        else {
            $data = [
                'message' => 'Resource not found'];
    
            return response()->json($data, 404);
        }
    }

    //membuat method show untuk menghapus data employee
    public function destroy($id) {
        // cari id employee yang ingin dihapus
        $employee = Employee::find($id);
        
        // membuat condition apakah data berhasil dihapus atau tidak
        if ($employee) {
            // hapus employee tersebut
            $employee->delete();

            $data = [
                'message' => 'Resource is delete Successfully'
            ];

            // mengembalikan data (json) dan kode 200
            return response()->json($data, 200);
        }

        else {
            $data = [
                'message' => 'Resource not found'
            ];

            return response()->json($data, 200);
        }
    }

    //membuat method search untuk mencari resource by name
    public function search($name){
        // Cari employee berdasarkan nama
        $employees = Employee::where('name', 'LIKE', "%$name%")->get();
    
        // membuat condition apakah data ditemukan atau tidak
        if ($employees->isNotEmpty()) {
            $data = [
                'message' => 'Get searched resource',
                'data' => $employees
            ];
    
            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Resource not found'
            ];
    
            return response()->json($data, 404);
        }
    }
    
    //membuat method active untuk mencari resource yang active
    public function active()
    {
        // Mendapatkan data employee dengan status active
        $employees = Employee::where('status', 'active')->get();
    
        $data = [
            'message' => 'Get active resource',
            'total' => $employees->count(),
            'data' => $employees
        ];
    
        return response()->json($data, 200);
    }
    
    //membuat method inactive untuk mencari resource yang inactive
    public function inactive()
    {
        // Mendapatkan data employee dengan status inactive
        $employees = Employee::where('status', 'inactive')->get();
    
        $data = [
            'message' => 'Get inactive resource',
            'total' => $employees->count(),
            'data' => $employees
        ];
    
        return response()->json($data, 200);
    }
    
    //membuat method terminated untuk mencari resource yang terminated
    public function terminated()
    {
        // Mendapatkan data employee dengan status terminated
        $employees = Employee::where('status', 'terminated')->get();
    
        $data = [
            'message' => 'Get terminated resource',
            'total' => $employees->count(),
            'data' => $employees
        ];
    
        return response()->json($data, 200);
    }
    
}
