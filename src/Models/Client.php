<?php
namespace App\Models;

require '../../includes/database.php';

class Client
{
    private $conn;

    public function __construct()
    {
        global $connection;
        $this->conn = $connection;
    }

    public function create($data)
    {
        $stmt =  $this->conn->prepare('INSERT INTO clientes (nombre, paterno, materno, edad, sexo, correo, curp) VALUES (?, ?, ?, ?, ?, ?, ?)');
        //$stmt = $this->conn->prepare('INSERT INTO clients (nombre, paterno, materno, edad, sexo, correo, curp) VALUES (:nombre, :paterno, :materno, :edad, :sexo, :correo, :curp)');
        return $stmt->execute($data);
        
    }

    public function edit($id, $data)
    {
        $stmt = $this->conn->prepare("UPDATE clientes SET nombre = ?, paterno = ?, materno = ?, edad = ?, sexo = ?, correo = ?, curp = ? WHERE id_cliente = '$id'");
        return $stmt->execute($data);
    }

    public function delete($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM clientes WHERE id_cliente = '$id'");
        return $stmt->execute();
    }
}