<?php 
require '../../../includes/database.php';
$id = $_GET['id'];
$clientes = $connection->query("SELECT * FROM clientes WHERE id_cliente = '$id'");
$cliente = $clientes->fetch_assoc();

include '../../../includes/header.php';
?>

<div class="container cont">
    <div class="form-container">
        <h1 class="mt-2 mb-3 text-center">Editar Cliente</h1>
        <form action="../../Controllers/ClientController.php?action=updateClient&id=<?=$id?>" method="POST">
            <div class="form-group">
                <label>Nombre(s):</label>
                <input type="text" id="nombre" name="nombre" class="form-control" value="<?= $cliente['nombre'] ?>"  required>
            </div>
            <div class="form-group">
                <label>Apellido Paterno:</label>
                <input type="text" id="paterno" name="paterno" class="form-control" value="<?= $cliente['paterno'] ?>" required>
            </div>
            <div class="form-group">
                <label>Apellido Materno:</label>
                <input type="text" id="smaterno" name="materno" class="form-control" value="<?= $cliente['materno'] ?>"required>
            </div>
            <div class="form-group">
                <label>Edad:</label>
                <input type="number" id="edad" name="edad" class="form-control" value="<?= $cliente['edad'] ?>" required>
            </div>
            <div class="form-group">
                <label>Sexo:</label>
                <select id="sexo" name="sexo" class="form-control" required>
                    <option value="">--Selecciona una opción--</option>
                    <option value="1" <?php if ($cliente['sexo'] == 1) echo 'selected'; ?>>Masculino</option>
                    <option value="2" <?php if ($cliente['sexo'] == 2) echo 'selected'; ?>>Femenino</option>
                    <option value="3" <?php if ($cliente['sexo'] == 3) echo 'selected'; ?>>Otro</option>
                </select>
            </div>
            <div class="form-group">
                <label>Correo Electrónico:</label>
                <input type="email" id="correo" name="correo" class="form-control" value="<?= $cliente['correo'] ?>" required>
            </div>
            <div class="form-group">
                <label>CURP:</label>
                <input type="text" id="curp" name="curp" class="form-control" maxlength="18" value="<?= $cliente['curp'] ?>" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Editar Cliente</button>
        </form>
        <a href="../../../public/index.php" class="btn btn-secondary mt-3">Volver</a>
    </div>
</div>

<?php include '../../../includes/footer.php'; ?>
