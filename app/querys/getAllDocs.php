<?php

    require_once '../dataBase/connectDB.php';

    $sql = 'SELECT * FROM invoice';
    $result = $pdo->query($sql);
    $result = $result->fetchAll(PDO::FETCH_ASSOC);

    foreach($result as $key => $value) {
        echo '<span class="docTableItem">'.$value['id'].'</span><span class="docTableItem">'.$value['today'].'</span><span class="docTableItem">'.$value['agent'].'</span>,';
    }