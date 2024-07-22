<?php
namespace App\Models;

require '../../includes/database.php';

class Account
{
    private $conn;

    public function __construct()
    {
        global $connection;
        $this->conn = $connection;
    }

    public function create($data)
    {
        $stmt =  $this->conn->prepare('INSERT INTO cuentas (numero_cuenta, id_cliente, estado, tipo_cuenta) VALUES (?, ?, ?, ?)');
        return $stmt->execute($data);
        
    }

    public function edit($id, $data)
    {
        $stmt = $this->conn->prepare("UPDATE cuentas SET numero_cuenta = ?, id_cliente = ?, estado = ?, tipo_cuenta = ? WHERE id_cuenta = '$id'");
        return $stmt->execute($data);
    }

    public function delete($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM cuentas WHERE id_cuenta = '$id'");
        return $stmt->execute();
    } 

    public function deleteByClient($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM cuentas WHERE id_cliente = '$id'");
        return $stmt->execute();
    }
}