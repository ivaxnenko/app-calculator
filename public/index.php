<?php

require __DIR__.'/../app/functions/helpers.php';
require __DIR__.'/../app/include/database.php';

?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
    <link href="css/bootstrap.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row mb-3 mt-3">
            <div class="col-md-4 offset-md-3 h2">
                Калькулятор стоимости грузоперевозки
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 offset-md-3">
                <form method="post">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="type">Сырье</label>
                                <select class="form-control" id="type" name="type">
                                    <?php
                                        echo showAnyType($link, 'material');
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="weight">Месяц</label>
                                <select class="form-control" id="month" name="month">
                                    <?php
                                        echo showAnyType($link, 'month');
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="month">Тоннаж</label>
                                <select class="form-control" id="weight" name="weight">
                                <?php
                                    echo showAnyType($link, 'weight');
                                ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3 mt-3">
                        <div class="col-md-4 offset-md-4">
                            <button type="submit" class="btn btn-primary" name="button">Рассчитать</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-4 offset-md-3">
                <table class="table">
                    <?php
                    if ($_POST)
                        echo showTable($link);
                    ?>
                </table>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-4 offset-md-4">
                <?php
                if ($_POST)
                    echo showPrice($link);
                ?>
            </div>
        </div>
    </div>
</html>