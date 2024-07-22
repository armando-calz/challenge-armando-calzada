<?php
require '../../../includes/database.php';
$cuentas_clientes = $connection->query('SELECT * FROM cuentas join clientes on cuentas.id_cliente = clientes.id_cliente');
include '../../../includes/header.php';
?>
<div class="container bg-white rounded pt-1 pb-5">
    <h1 class="my-5">Cuentas</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Numero de cuenta</th>
                <th>Cliente</th>
                <th>Nombre</th>
                <th>Estado</th>
                <th>Tipo de cuenta</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cuentas_clientes as $cuenta): ?>
            <tr>
                <td><?= $cuenta['numero_cuenta'] ?></td>
                <td><?= $cuenta['id_cliente']?></td>
                <td><?= $cuenta['nombre']?></td>
                <td><?php if ($cuenta['estado'] == 0)
                        echo 'Inactiva'; 
                    else if ($cuenta['estado'] == 1) 
                        echo'Activa';
                    else
                        echo'Bloqueada';
                ?></td>
                <td><?php if ($cuenta['tipo_cuenta'] == 1)
                        echo 'Básica'; 
                    else if ($cuenta['tipo_cuenta'] == 2) 
                        echo'Avanzada';
                    else if ($cuenta['tipo_cuenta'] == 3)
                        echo'Especial';
                ?></td>
                <td>
                    <a href="edit.php?id=<?=$cuenta['id_cuenta']?>" class="btn btn-warning btn-sm">Editar</a>
                    <a href="delete.php?id=<?=$cuenta['id_cuenta']?>" class="btn btn-danger btn-sm">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="row mt-4">
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
