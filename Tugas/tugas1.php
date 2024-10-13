<?php

# Membuat class Animal
class Animal
{
    # Property animals (array)
    public $animals;

    # Method constructor - mengisi data awal
    # Parameter: data hewan (array)
    public function __construct($data)
    {
        $this->animals = $data;
    }

    # Method index - menampilkan data animals
    public function index()
    {
        # Gunakan foreach untuk menampilkan data animals (array)
        foreach ($this->animals as $index => $animal) {
            echo '- ' . $animal . '<br>';
        }
    }

    # Method store - menambahkan hewan baru
    # Parameter: hewan baru
    public function store($data)
    {
        # Gunakan method array_push untuk menambahkan data baru
        array_push($this->animals, $data);
    }

    # Method update - mengupdate hewan
    # Parameter: index dan hewan baru
    public function update($index, $data)
    {
        if (isset($this->animals[$index])) {
            $this->animals[$index] = $data;
        }
    }

    # Method destroy - menghapus hewan
    # Parameter: index
    public function destroy($index)
    {
        # Gunakan method unset atau array_splice untuk menghapus data array
        if (isset($this->animals[$index])){
            unset($this->animals[$index]);
        }
    }
}

# Membuat object
# Kirimkan data hewan (array) ke constructor
$animal = new Animal(['Kucing', 'Anjing', 'Gajah', 'Marmut', 'Kancil']);

echo "Index - Menampilkan seluruh hewan <br>";
$animal->index();
echo "<br>";

echo "Store - Menambahkan hewan baru (Bekicot) <br>";
$animal->store('Bekicot');
$animal->index();
echo "<br>";

echo "Update - Mengupdate hewan (Anjing Husky) <br>";
$animal->update(1, 'Anjing Husky');
$animal->index();
echo "<br>";

echo "Destroy - Menghapus hewan (Marmut) <br>";
$animal->destroy(3);
$animal->index();
echo "<br>";
