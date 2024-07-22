<?php
require '../../../includes/database.php';
$clientes = $connection->query('SELECT * FROM clientes');
$cuentas = $connection->query('SELECT * FROM cuentas');
include '../../../includes/header.php';
?>
<div class="container">
    <h1 class="my-5">Cuentas</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Numero de cuenta</th>
                <th>Cliente</th>
                <th>Estado</th>
                <th>Tipo de cuenta</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cuentas as $cuenta): ?>
            <tr>
                <td><?= $cuenta['numero_cuenta'] ?></td>
                <td><?= $cuenta['id_cliente']?></td>
                <td><?= $cuenta['estado'] ?></td>
                <td><?= $cuenta['tipo_cuenta'] ?></td>
                <td>
                    <a href="edit.php?id=<?=$cuenta['id_cuenta']?>" class="btn btn-warning btn-sm">Editar</a>
                    <a href="delete.php?id=<?=$cuenta['id_cuenta']?>" class="btn btn-danger btn-sm">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="row">
        <div class="col-md-9">
                <a href="../../../public/index.php" class="btn btn-primary mb-3 float-right">Ver Clientes</a>
        </div>
        <div class="col-md-3">
            <a href="../clients/create.php" class="btn btn-primary mb-3">Crear Cliente</a>
            <a href="../accounts/create.php" class="btn btn-primary mb-3">Crear Cuenta</a>
        </div>
    </div>
</div>
<?php include '../../../includes/footer.php'; ?>
