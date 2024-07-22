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
        $stmt =  $this->conn->prepare('INSERT INTO cuentas (numero_cuenta, id_cliente, fecha_creacion, estado) VALUES (?, ?, ?, ?)');
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