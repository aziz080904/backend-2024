<?php

# membuat class Person
class Person
{
    # membuat property (variable)
    public $nama;
    public $alamat;
    public $jurusan;

    # membuat constructor
    public function __construct($nama, $alamat, $jurusan)
    {
        $this->nama = $nama;
        $this->alamat = $alamat;
        $this->jurusan = $jurusan;
    }
}

$aziz = new Person('Aziz Maulana', 'Jakarta', 'Teknik Informatika');
$budi = new Person('Budi Siregar', 'Medan', 'Sistem Informasi');