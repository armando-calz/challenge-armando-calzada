<?php 
require '../../../includes/database.php';
$id = $_GET['id'];
$cuentas = $connection->query("SELECT * FROM cuentas WHERE id_cuenta = '$id'");
$cuenta = $cuentas->fetch_assoc();

include '../../../includes/header.php';
?>

<div class="container ">
    <h1 class="mt-5">Eliminar Cuenta</h1>
    <form action="../../controllers/AccountController.php?action=deleteAccount&id=<?=$id?>" method="POST">
        <h2>¿Está seguro que desea Eliminar la cuenta? No. cuenta: <?=$cuenta['numero_cuenta']?></h2>
        <button type="submit" class="btn btn-primary mt-3">Eliminar Cuenta</button>
    </form>
    <a href="view.php" class="btn btn-secondary mt-3">Cancelar</a>
</div>

<?php include '../../../includes/footer.php'; ?>
