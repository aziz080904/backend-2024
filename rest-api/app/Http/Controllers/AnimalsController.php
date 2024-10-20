<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalsController extends Controller {
public $animals = ['Kucing', 'Anjing', 'Gajah', 'Marmut', 'Kancil'];

    public function index() {
        foreach ($this->animals as $animal) {
            echo '- ' . $animal . '<br>';
        }
    }

    public function store(Request $request) {
        array_push($this->animals, $request->input('animal'));
        $this->index(); 
    }

    public function update(Request $request, $id) {
        if (isset($this->animals[$id])) {
            $this->animals[$id] = $request->input('animal');
        }
        $this->index(); 
    }

    public function destroy($id) {
        if (isset($this->animals[$id])) {
            unset($this->animals[$id]);
            // $this->animals = array_values($this->animals);
        }
    }
}


$animal = new AnimalsController();

echo "<b> GET Request - Menampilkan seluruh hewan</b><br>";
$animal->index();

echo "<br><b> POST Request - Menambah hewan baru</b><br>";
$animal->store(new Request(['animal' => 'Bekicot']));

echo "<br><b> PUT Request - Mengupdate data hewan </b><br>";
$animal->update(new Request(['animal' => 'Anjing Husky']), 1);

echo "<br><b> DELETE Request - Menghapus data hewan</b><br>";
$animal->destroy(3);