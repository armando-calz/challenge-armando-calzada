<?php
require '../includes/database.php';
$clientes = $connection->query('SELECT * FROM clientes');
include '../includes/header.php';
?>
<div class="container bg-white rounded pt-1 pb-5">
    <h1 class="my-5">Clientes</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Edad</th>
                <th>Sexo</th>
                <th>Correo</th>
                <th>CURP</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clientes as $cliente): ?>
            <tr>
                <td><?= $cliente['nombre'] ?></td>
                <td><?= $cliente['paterno']?></td>
                <td><?= $cliente['materno'] ?></td>
                <td><?= $cliente['edad'] ?> años</td>
                <td><?php if ($cliente['sexo'] == 1)
                            echo 'Masculino'; 
                        else if ($cliente['sexo'] == 2) 
                            echo'Femenino';
                        else
                            echo'Otro';
                        ?></td>
                <td><?= $cliente['correo'] ?></td>
                <td><?= $cliente['curp'] ?></td>
                <td>
                    <a href="../src/Views/clients/edit.php?id=<?= $cliente['id_cliente']?>" class="btn btn-warning btn-sm">Editar</a>
                    <a href="../src/Views/clients/delete.php?id=<?= $cliente['id_cliente']?>" class="btn btn-danger btn-sm">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="row mt-4">
        <div class="col-md-9">
                <a href="../src/Views/Accounts/view.php" class="btn btn-primary mb-3 float-right">Ver cuentas</a>
        </div>
        <div class="col-md-3">
            <a href="../src/Views/clients/create.php" class="btn btn-primary mb-3">Crear Cliente</a>
            <a href="../src/Views/accounts/create.php" class="btn btn-primary mb-3">Crear Cuenta</a>
        </div>
    </div>
    
    
</div>
<?php include '../includes/footer.php'; ?>
