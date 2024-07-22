<?php

require '../Models/Account.php';
use App\Models\Account;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $action = isset($_GET['action']) ? $_GET['action'] : '';

    switch ($action) {
        case 'addAccount':
            addAccount();
            break;
        case 'updateAccount':
            updateClient();
            break;
        case 'deleteAccount':
            deleteAccount();
            break;
        default:
            echo 'Acción no válida.';
            break;
    }
} else {
    echo 'Solicitud inválida.';
}

function addAccount(){
    $numero_cuenta = $_POST['numero_cuenta'];
    $cliente = $_POST['id_cliente'];
    $fecha_creacion = getdate();
    $estado = 1;

    $account = new Account();
    $account->create([$numero_cuenta, $cliente, $fecha_creacion, $estado]);


    header('Location: ../../public/index.php');
}

?>