<?php

    require_once '../dataBase/connectDB.php';

    if(!empty($_POST['agent']) && !empty($_POST['item']) && !empty($_POST['itemQuantity'])) {
        // Получение данных с формы
        $agent = trim($_POST['agent']);
        $item = trim($_POST['item']);
        $itemQuantity = trim($_POST['itemQuantity']);

        $agent = htmlentities($agent);
        $item = htmlentities($item);
        $itemQuantity = htmlentities($itemQuantity);

        $date = date("d.m.Y");

        //$sql = 'INSERT INTO invoice(today, agent, items, value_1) VALUES(:today, :agent, :items, :value_1)';
        //$data = [':today' => $date,':agent' => $agent, ':item' => $item, ':value_1' => $itemQuantity];
        $sql = 'INSERT INTO invoice(today, agent, items, value_1) VALUES("'.$date.'", "'.$agent.'", "'.$item.'", "'.$itemQuantity.'")';

        //$stmt = prepare($sql);
        //$stmt->execute($date);
        $stmt = $pdo->query($sql);

        if($stmt) {
            echo "Создан новый счет на оплату.";
        } else {
            echo "Ошибка!";
        }
    } else {
        echo 'Вы не заполнили все поля!';
    }

    