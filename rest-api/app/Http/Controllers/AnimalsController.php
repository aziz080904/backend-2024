<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalsController extends Controller {
    public $animals = ['kucing', 'ayam', 'ikan'];

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
        $this->index();
    }
}


$animal = new AnimalsController();

echo "<strong># GET Request</strong><br>";
$animal->index();

echo "<br><strong># POST Request</strong><br>";
$animal->store(new Request(['animal' => 'Musang']));

echo "<br><strong># PUT Request</strong><br>";
$animal->update(new Request(['animal' => 'Burung']), 1);

echo "<br><strong># DELETE Request</strong><br>";
$animal->destroy(2);