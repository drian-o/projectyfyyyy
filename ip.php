<?php

$data = ['code' => 'myip'];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://lvapi.asia/ip");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        //curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $chresult = curl_exec($ch);
        print $chresult;