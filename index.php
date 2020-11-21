<?php
$reder = 'https://LinkBridge.ru'; // Куда редирекнтнуть

/*
 * Функция проверки домена на работоспособность
*/
function check_domain_availible($domain)
{
    $curlInit = curl_init($domain);
    curl_setopt($curlInit, CURLOPT_CONNECTTIMEOUT, 1); // Отправляем 1 пакет
    curl_setopt($curlInit, CURLOPT_HEADER, true);
    curl_setopt($curlInit, CURLOPT_NOBODY, true);
    curl_setopt($curlInit, CURLOPT_RETURNTRANSFER, true);
    
    $response = @curl_exec($curlInit);
    curl_close($curlInit);
    if ($response)
        return true;
    return false;
}

/*
 * Проверяем $reder на работоспособность.
*/
if(check_domain_availible($reder)) {
    header('Location: '.$reder); // Редирект в случае успеха
}
else {
    echo $reder.' – Unavailabe!'; // Ошибка в случае провала
}
