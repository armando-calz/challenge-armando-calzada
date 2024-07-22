<?php
require '../../../includes/database.php';
$clientes = $connection->query('SELECT * FROM clientes');

include '../../../includes/header.php';
?>

<div class="container cont">
    <div class="form-container">
        <h1 class="mt-2 mb-3 text-center">Crear Cuenta</h1>
        <form action="../../Controllers/AccountController.php?action=addAccount" method="POST">
            <div class="form-group">
                <label>Numero de cuenta:</label>
                <input type="number" id="numero_cuenta" name="numero_cuenta" class="form-control" oninput="validarLongitud(event,16)" required>
            </div>
            <div class="form-group">
                <label>Cliente:</label>
                <select id="id_cliente" name="id_cliente" class="form-control" required>
                    <option value="">--Selecciona una opción--</option>
                    <?php foreach ($clientes as $cliente): ?>
                        <option value="<?= $cliente['id_cliente'] ?>"><?= $cliente['nombre'] . " " . $cliente['paterno'] . " " . $cliente['materno']?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label>Tipo de cuenta:</label>
                <select id="tipo_cuenta" name="tipo_cuenta" class="form-control" required>
                    <option value="">--Selecciona una opción--</option>
                    <option value="1">Básica</option>
                    <option value="2">Avanzada</option>
                    <option value="3">Especial</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Crear Cuenta</button>
        </form>
        <a href="view.php" class="btn btn-secondary mt-3">Volver</a>
    </div>
    
</div>

<?php include '../../../includes/footer.php'; ?>