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
            updateAccount();
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
    $estado = 1;
    $tipo_cuenta = $_POST['tipo_cuenta'];

    $account = new Account();
    $account->create([$numero_cuenta, $cliente, $estado, $tipo_cuenta]);

    header('Location: ../Views/accounts/view.php');
}

function updateAccount() {
    $id = $_GET['id'];
    $numero_cuenta = $_POST['numero_cuenta'];
    $cliente = $_POST['id_cliente'];
    $estado = 1;
    $tipo_cuenta = $_POST['tipo_cuenta'];

    $account = new Account();
    $account->edit($id,[$numero_cuenta, $cliente, $estado, $tipo_cuenta]);

    header('Location: ../Views/accounts/view.php');
}

function deleteAccount() {
    $id = $_GET['id'];

    $account = new Account();
    $account->delete($id);

    header('Location: ../Views/accounts/view.php');
}
?>