<?php
require 'constructor.php';

    $aziz = new Person('Aziz Maulana', 'Jakarta', 'Teknik Informatika');
    $khalid = new Person('Khalid Saifullah', 'Depok', 'Teknik Informatika');

$aziz -> Print();
echo '<br>';
$khalid -> Print();
?>