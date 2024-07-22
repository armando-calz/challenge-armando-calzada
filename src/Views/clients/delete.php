<?php 
require '../../../includes/database.php';
$id = $_GET['id'];
$clientes = $connection->query("SELECT * FROM clientes WHERE id_cliente = '$id'");
$cliente = $clientes->fetch_assoc();

include '../../../includes/header.php';
?>

<div class="container">
    <h1 class="mt-5">Eliminar Cliente</h1>
    <form action="../../controllers/ClientController.php?action=deleteClient&id=<?=$id?>" method="POST">
        <h2>¿Está seguro que desea Eliminar a <?=$cliente['nombre'] . " " . $cliente['paterno']?>?</h2>
        <button type="submit" class="btn btn-primary mt-3">Eliminar Cliente</button>
    </form>
    <a href="../../../public/index.php" class="btn btn-secondary mt-3">Cancelar</a>
</div>

<?php include '../../../includes/footer.php'; ?>
