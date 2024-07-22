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
        $stmt = $this->db->prepare("UPDATE clients SET name = :name, email = :email WHERE id = :id");
        $data['id'] = $id;
        return $stmt->execute($data);
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM clients WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}