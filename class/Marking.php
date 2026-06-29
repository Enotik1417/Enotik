<?php
class Marking
{
    private $db;
    public function __construct(Db $dbObject) {
        $this->db = $dbObject;
    }

    public function Db_Student_Table()
    {
        $link = $this->db->Db_Logic_Conection();
        $query = "SELECT * FROM informatietable";
        
        try {
            $result_set = mysqli_query($link, $query);
            
            $students_data = [];
            while ($row = mysqli_fetch_assoc($result_set)) {
                $students_data[] = $row;
            }

            $marking = $this;
            require __DIR__ . '/../View.php';

        } catch (mysqli_sql_exception $e) {
            echo "<p style='color:red;'>Ошибка запроса: " . htmlspecialchars($e->getMessage()) . "</p>";
            return false;
        }
    }

    public function Print_Table_Content($students_data)
    {
        if (empty($students_data)) {
            echo '<tr><td colspan="5" class="info-table__cell" style="text-align:center;">Данные отсутствуют</td></tr>';
            return;
        }

        foreach ($students_data as $student) {
            $id = (int)$student['id'];
            echo '<tr class="info-table__row">';
            
            echo '<td class="info-table__cell">';
            echo '<a href="index.php?id=' . $id . '" class="student-link">';
            echo htmlspecialchars($student['Student']);
            echo '</a>';
            echo '</td>';

            echo '<td class="info-table__cell">' . htmlspecialchars($student['Department']) . '</td>';
            echo '<td class="info-table__cell">' . htmlspecialchars($student['Progres']) . ' %</td>';
            echo '<td class="info-table__cell">' . htmlspecialchars($student['Status']) . '</td>';
            
            echo '<td class="info-table__cell">';
            echo '<a href="index.php?action=edit&id=' . $id . '" class="btn-edit">Редактировать</a>';
            echo '<a href="index.php?action=delete&id=' . $id . '" class="btn-delete">Удалить</a>';
            echo '</td>';
            
            echo '</tr>';
        }
    }       
}
?>
