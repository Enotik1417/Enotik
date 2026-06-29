<?php
class UserModel {
    private $db;

    public function __construct(PDO $pdo) {
        $this->db = $pdo;
    }

    public function getDataWithSubquery($subqueryParam) {
        $sql = "SELECT u.id, u.Student, u.Department, u.Progres, u.Status
                FROM informatietable u
                WHERE u.id IN (
                    SELECT Student_id FROM orders WHERE amount > $subqueryParam
                )";
                
        $stmt = $this->db->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}



class Model {
    private $pdo;
    private $table;

    public function __construct(PDO $pdo, string $table) {
        $this->pdo = $pdo;
        $this->table = $table;
    }
    public function create(array $data): bool {
        if (empty($data)) {
            return false;
        }
        $fields = array_keys($data);
        $fieldsStr = implode(', ', $fields);
        $values = array_map(function($value) {
            return "'" . $value . "'";
        };
         array_values($data));
        $valuesStr = implode(', ', $values);
        $sql = "INSERT INTO {$this->table} ($fieldsStr) VALUES ($valuesStr)";
        return (bool)$this->pdo->exec($sql);
    }
    public function update(int $id, array $data): bool {
        if (empty($data)) {
            return false;
        }
        unset($data['id']);
        $setParts = [];
        foreach ($data as $field => $value) {
            $setParts[] = "$field = '$value'";
        }
        $setStr = implode(', ', $setParts);
        $sql = "UPDATE {$this->table} SET $setStr WHERE id = $id";

        return (bool)$this->pdo->exec($sql);
    }
}


?>

