<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/class/db.php';
require_once __DIR__ . '/class/Marking.php';

$db = new Db(); 
$marking = new Marking($db);

$error_message = '';


if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $link = $db->Db_Logic_Conection();
    
    if ($link && !is_array($link)) {
        $deleteId = (int)$_GET['id'];
        $sql = "DELETE FROM `informatietable` WHERE `id` = $deleteId";
        
        if (mysqli_query($link, $sql)) {
            header("Location: index.php");
            exit;
        }
    }
}

if (isset($_POST['add_student'])) {
    $link = $db->Db_Logic_Conection(); 

    if ($link && !is_array($link)) {
        $data = [
            'Student'    => mysqli_real_escape_string($link, trim($_POST['Student'] ?? '')),
            'Department' => mysqli_real_escape_string($link, trim($_POST['Department'] ?? '')),
            'Progres'    => mysqli_real_escape_string($link, trim($_POST['Progres'] ?? '')),
            'Status'     => mysqli_real_escape_string($link, trim($_POST['Status'] ?? ''))
        ];

        $fields = implode(", ", array_keys($data));
        $values = "'" . implode("', '", array_values($data)) . "'";

        $sql = "INSERT INTO `informatietable` ($fields) VALUES ($values)";

        $result = $db->Db_Adding_Data($sql);
        
        if (isset($result['success']) && $result['success'] === true) {
            header("Location: " . $_SERVER['PHP_SELF']);
            exit;
        } else {
            $error_message = $result['error'] ?? 'Произошла ошибка при сохранении данных.';
        }
    } else {
        $error_message = 'Ошибка подключения к БД.';
    }
}

if (isset($_POST['send_feedback'])) {
}





$studentId = isset($_GET['id']) ? (int)$_GET['id'] : null;

if ($studentId) {

    $link = $db->Db_Logic_Conection();
    $current_student = null;

    if ($link && !is_array($link)) {
        $sql = "SELECT * FROM `informatietable` WHERE `id` = $studentId";
        $result = mysqli_query($link, $sql);
        $current_student = mysqli_fetch_assoc($result);
    }


require_once __DIR__ . '/StudentPage.php';
} else {

    $marking->Db_Student_Table();
}
?>
