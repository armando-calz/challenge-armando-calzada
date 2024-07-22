<?php include '../../../includes/header.php';?>

<div class="container">
    <h1 class="mt-5">Crear Cliente</h1>
    <form action="../../Controllers/ClientController.php?action=addClient" method="POST">
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
            <select id="sexo" name="sexo" class="form-control" required>
                <option value="">--Selecciona una opción--</option>
                <option value="1">Masculino</option>
                <option value="2">Femenino</option>
                <option value="3">Otro</option>
            </select>
        </div>
        <div class="form-group">
            <label>Correo Electrónico:</label>
            <input type="email" id="correo" name="correo" class="form-control" required>
        </div>
        <div class="form-group">
            <label>CURP:</label>
            <input type="text" id="curp" name="curp" class="form-control" maxlength="18" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Crear Cliente</button>
    </form>
    <a href="../../../public/index.php" class="btn btn-secondary mt-3">Volver</a>
</div>

<?php include '../../../includes/footer.php'; ?>
