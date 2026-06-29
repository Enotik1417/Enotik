<?php
class Db
{
    public function Db_Logic_Conection() 
    {
        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        $link = mysqli_connect('127.0.0.1', 'root', '', 'informatetable');

        if (!$link) { 
            return [
                'success' => false,
                'message' => 'Не удалось подключиться к MySQL',
                'error' => mysqli_connect_error()
            ];
        }

        mysqli_set_charset($link, "utf8mb4");

        return $link;
    }

public function Db_Adding_Data($sql) 
{
    $link = $this->Db_Logic_Conection();
    if (is_array($link)) {
        return $link;
    }

    if (mysqli_query($link, $sql)) {
        return [
            'success' => true,
           
        ];
    }

    return [
        'success' => false,
        'error' => mysqli_error($link)
    ];
}


}
?>
