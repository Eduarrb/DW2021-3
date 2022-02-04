<?php
    try{
        include('db_con.php');

        $query = query("SELECT * FROM noticias WHERE noti_cat_id = {$_GET['id']}");
        $res = mysqli_fetch_all($query, MYSQLI_ASSOC);
        $jsonResp = json_encode(['resultado' => $res, 'modulo' => 'noticias']);
        echo $jsonResp;
    } catch(Exception $e){
        error_log($e->getMessage());
        echo json_encode($e->getMessage());
    }
?>