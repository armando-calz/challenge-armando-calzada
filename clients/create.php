<?php
require '../includes/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $apellido_paterno = $_POST['paterno'];
    $apellido_materno = $_POST['materno'];
    $edad = $_POST['edad'];
    $sexo = $_POST['sexo'];
    $correo = $_POST['correo_electronico'];
    $curp = $_POST['curp'];

    $stmt = $connection->prepare('INSERT INTO clientes (nombre, paterno, materno, edad, sexo, correo_electronico, curp) VALUES (?, ?, ?, ?, ?, ?, ?)');
    $stmt->execute([$nombre, $apellido_paterno, $apellido_materno, $edad, $sexo, $correo, $curp]);

    header('Location: ../index.php');
}
include '../includes/header.php';
?>
<div class="container">
    <h1 class="mt-5">Crear Cliente</h1>
    <form action="create.php" method="POST">
        <div class="form-group">
            <label>Nombre(s):</label>
            <input type="text" id="nombre" name="nombre" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Apellido Paterno:</label>
            <input type="text" id="paterno" name="paterno" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Apellido Materno:</label>
            <input type="text" id="smaterno" name="materno" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Edad:</label>
            <input type="number" id="edad" name="edad" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Sexo:</label>
            <input type="text" id="sexo" name="sexo" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Correo Electrónico:</label>
            <input type="email" id="correo_electronico" name="correo_electronico" class="form-control" required>
        </div>
        <div class="form-group">
            <label>CURP:</label>
            <input type="text" id="curp" name="curp" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Crear Cliente</button>
    </form>
    
</div>
<?php include '../includes/footer.php'; ?>
