<?php
require 'includes/database.php';
$clientes = $connection->query('SELECT * FROM clientes');
include 'includes/header.php';
?>
<div class="container">
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
                <th>Accione</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clientes as $cliente): ?>
            <tr>
                <td><?= $cliente['nombre'] ?></td>
                <td><?= $cliente['paterno']?></td>
                <td><?= $cliente['materno'] ?></td>
                <td><?= $cliente['edad'] ?></td>
                <td><?= $cliente['sexo'] ?></td>
                <td><?= $cliente['correo_electronico'] ?></td>
                <td><?= $cliente['curp'] ?></td>
                <td>
                    
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
    <a href="create.php" class="btn btn-primary mb-3">Nuevo Cliente</a>
</div>
<?php include 'includes/footer.php'; ?>