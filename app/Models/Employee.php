<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    // Menentukan tabel yang digunakan oleh model
    protected $table = 'employees';

    // Menentukan kolom yang dapat diisi
    protected $fillable = [
        'name',
        'gender',
        'phone',
        'address',
        'email',
        'status',
        'hired_on',
    ];

    public $timestamps = true;
}
