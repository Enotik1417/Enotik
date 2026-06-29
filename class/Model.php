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





$studentId = isset($_GET['id']) ? (int)$_GET['id'] : null;
$current_student = null;

if ($studentId) {
    $link = $db->Db_Logic_Conection();

    if ($link && !is_array($link)) {
        $sql = "SELECT * FROM `informatietable` WHERE `id` = $studentId";
        $result = mysqli_query($link, $sql);
        $current_student = mysqli_fetch_assoc($result);
    }
}


if (isset($_POST['update_student'])) {
    $link = $db->Db_Logic_Conection();

    if ($link && !is_array($link)) {
        $id = (int)$_POST['student_id'];
        $student    = mysqli_real_escape_string($link, trim($_POST['Student'] ?? ''));
        $department = mysqli_real_escape_string($link, trim($_POST['Department'] ?? ''));
        $progres    = mysqli_real_escape_string($link, trim($_POST['Progres'] ?? ''));
        $status     = mysqli_real_escape_string($link, trim($_POST['Status'] ?? ''));

        $sql = "UPDATE `informatietable` SET 
                `Student` = '$student', 
                `Department` = '$department', 
                `Progres` = '$progres', 
                `Status` = '$status' 
                WHERE `id` = $id";

        if (mysqli_query($link, $sql)) {
            header("Location: index.php");
            exit;
        } else {
            $error_message = 'Ошибка при обновлении данных: ' . mysqli_error($link);
        }
    }
}
?>
