<?php

if (isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['phone']) && isset($_POST['email'])) {
    // Наполнение массива данными для запроса
    $requestData = array(
        'firstName'   => $_POST['firstName'],
        'lastName'    => $_POST['lastName'],
        'phone'       => $_POST['phone'],
        'email'       => $_POST['email'],
        'countryCode' => 'GB',
        'box_id'      => 28,
        'offer_id'    => 5,
        'landingUrl'  => $_SERVER['HTTP_HOST'],
        'ip'          => $_SERVER['REMOTE_ADDR'],
        'password'    => 'qwerty12',
        'language'    => 'en'
    );

    // Преобразование данных в JSON
    $jsonData = json_encode($requestData);

    // Инициализация cURL сессии, установка параметров запроса
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL            => 'https://crm.belmar.pro/api/v1/addlead',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING       => '',
        CURLOPT_MAXREDIRS      => 10,
        CURLOPT_TIMEOUT        => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST  => 'POST',
        CURLOPT_POSTFIELDS     => $jsonData,
        CURLOPT_HTTPHEADER     => array(
            'Content-Type: application/json',
            'token: ba67df6a-a17c-476f-8e95-bcdb75ed3958' // Замените YOUR_TOKEN на ваш токен
        ),
    ));

    // Выполнение запроса, получение ответа
    $response = curl_exec($curl);

    // Закрытие cURL сессии
    curl_close($curl);

    // Возвращаем ответ
    echo $response;
}

if (isset($_POST['startDate']) && isset($_POST['endDate'])) {
    $startDate = $_POST['startDate'];
    $endDate   = $_POST['endDate'];

    // Проверка наличия корректных дат
    if (!empty($startDate) && !empty($endDate)) {
        // Отправка запроса на сервер
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crm.belmar.pro/api/v1/getstatuses',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'{
                "date_from" : "' . $startDate . '",
                "date_to" : "' . $endDate . '",
                "page" : 0,
                "limit" : 100
            }',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'token: ba67df6a-a17c-476f-8e95-bcdb75ed3958'
            ),
        ));

        $response = curl_exec($curl);

        // Проверка наличия ошибок cURL
        if ($response === false) {
            echo 'Ошибка cURL: ' . curl_error($curl);
        } else {
            echo $response;
        }

        curl_close($curl);
    } else {
        echo 'Ошибка: Некорректные даты';
    }
}