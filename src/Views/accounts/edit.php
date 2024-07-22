<?php
require '../../../includes/database.php';
$id = $_GET['id'];
$clientes = $connection->query('SELECT * FROM clientes');
$cuentas = $connection->query("SELECT * FROM cuentas WHERE id_cuenta = '$id'");
$cuenta = $cuentas->fetch_assoc();

include '../../../includes/header.php';
?>

<div class="container cont">
    <div class="form-container">
        <h1 class="mt-2 mb-3 text-center">Editar Cuenta</h1>
        <form action="../../Controllers/AccountController.php?action=updateAccount&id=<?=$id?>" method="POST">
            <div class="form-group">
                <label>Numero de cuenta:</label>
                <input type="number" id="numero_cuenta" name="numero_cuenta" class="form-control" oninput="validarLongitud(event,16)" value="<?= $cuenta['numero_cuenta'] ?>" required>
            </div>
            <div class="form-group">
                <label>Cliente:</label>
                <select id="id_cliente" name="id_cliente" class="form-control" required>
                    <option value="">--Selecciona una opción--</option>
                    <?php foreach ($clientes as $cliente): ?>
                        <option value="<?= $cliente['id_cliente'] ?>" <?php if ($cliente['id_cliente'] == $cuenta['id_cliente']) echo 'selected'; ?> ><?= $cliente['nombre'] . " " . $cliente['paterno'] . " " . $cliente['materno']?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label>Tipo de cuenta:</label>
                <select id="tipo_cuenta" name="tipo_cuenta" class="form-control" required>
                    <option value="">--Selecciona una opción--</option>
                    <option value="1" <?php if ($cuenta['tipo_cuenta'] == 1) echo 'selected'; ?>>Básica</option>
                    <option value="2" <?php if ($cuenta['tipo_cuenta'] == 2) echo 'selected'; ?>>Avanzada</option>
                    <option value="3" <?php if ($cuenta['tipo_cuenta'] == 3) echo 'selected'; ?>>Especial</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Editar Cuenta</button>
        </form>
        <a href="view.php" class="btn btn-secondary mt-3">Volver</a>
    </div>
</div>

<?php include '../../../includes/footer.php'; ?>