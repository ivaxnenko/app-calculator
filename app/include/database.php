<?php

$link = mysqli_connect('localhost','root','','app_calculator');
mysqli_set_charset($link, 'utf8');

if (mysqli_connect_errno()) {
    echo 'Ошибка в подключении к базе данных ('.mysqli_connect_errno().'): '. mysqli_connect_error();
    exit();
}