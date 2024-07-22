<?php
//namespace App\Controllers; 
require '../Models/Client.php';
use App\Models\Client;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $action = isset($_GET['action']) ? $_GET['action'] : '';

    switch ($action) {
        case 'addClient':
            addClient();
            break;
        case 'updateClient':
            updateClient();
            break;
        case 'deleteClient':
            deleteClient();
            break;
        default:
            echo 'Acción no válida.';
            break;
    }
} else {
    echo 'Solicitud inválida.';
}

function addClient() {
    $nombre = $_POST['nombre'];
    $paterno = $_POST['paterno'];
    $materno = $_POST['materno'];
    $edad = $_POST['edad'];
    $sexo = $_POST['sexo'];
    $correo = $_POST['correo'];
    $curp = $_POST['curp'];

    $client = new Client();
    $client->create([$nombre, $paterno, $materno, $edad, $sexo, $correo, $curp]);
    //$client->create(['nombre' => $nombre, 'paterno' => $paterno, 'materno' => $materno, 'edad' => $edad, 'sexo' => $sexo, 'correo' => $correo, 'curp' => $curp]);
    
    header('Location: ../../public/index.php');
}

function updateClient() {
    // Lógica para actualizar un cliente
    echo 'Actualizar cliente';
    // Aquí puedes manejar la lógica para actualizar un cliente
}

function deleteClient() {
    // Lógica para eliminar un cliente
    echo 'Eliminar cliente';
    // Aquí puedes manejar la lógica para eliminar un cliente
}
?>

