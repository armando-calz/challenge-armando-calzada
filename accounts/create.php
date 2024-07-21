<?php
require '../includes/database.php';
$clientes = $connection->query('SELECT * FROM clientes');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $numero_cuenta = $_POST['numero_cuenta'];
    $cliente = $_POST['id_cliente'];
    $fecha_creacion = getdate();
    $estado = 1;

    $stmt = $connection->prepare('INSERT INTO cuentas (numero_cuenta, id_cliente, fecha_creacion, estado) VALUES (?, ?, ?, ?)');
    $stmt->execute([$numero_cuenta, $cliente, $fecha_creacion, $estado]);

    header('Location: ../index.php');
}
include '../includes/header.php';
?>
<div class="container">
    <h1 class="mt-5">Crear Cuenta</h1>
    <form action="create.php" method="POST">
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
        <button type="submit" class="btn btn-primary">Crear Cuenta</button>
    </form>
    <a href="../index.php" class="btn btn-secondary mt-3">Volver</a>
</div>
<?php include '../includes/footer.php'; ?>
