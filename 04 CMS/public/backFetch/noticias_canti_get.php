<?php
    try{
        include('db_con.php');

        $query = query("SELECT COUNT(*) AS cantidad, MONTH(noti_fecha) as mes FROM noticias GROUP BY MONTH(noti_fecha)");
        $res = mysqli_fetch_all($query, MYSQLI_ASSOC);
        $jsonResp = json_encode(['resultado' => $res, 'modulo' => 'noticias']);
        echo $jsonResp;
    } catch(Exception $e){
        error_log($e->getMessage());
        echo json_encode($e->getMessage());
    }
?>