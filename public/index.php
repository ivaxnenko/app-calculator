<?php

require __DIR__.'/../app/config/config.php';
require __DIR__.'/../app/functions/helpers.php';

?>

<!DOCTYPE html>
<html lang="en">

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
                Freight Cost Calculator
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 offset-md-3">
                <form method="post">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="type">Feedstock</label>
                                <select class="form-control" id="type" name="type">
                                    <?php
                                    foreach ($prices as $key => $value)
                                        echo "<option>{$key}</option>";
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="weight">Month</label>
                                <select class="form-control" id="month" name="month">
                                <?php
                                    foreach ($prices["Meal"] as $key => $value)
                                        echo "<option>{$key}</option>";
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="month">Weight</label>
                                <select class="form-control" id="weight" name="weight">
                                <?php
                                    foreach ($prices["Meal"]["September"] as $key => $value)
                                        echo "<option>{$key}</option>";
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3 mt-3">
                        <div class="col-md-4 offset-md-4">
                            <button type="submit" class="btn btn-primary" name="button">Calculate</button>
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
                        echo showTable($prices[$_POST['type']]);
                    ?>
                </table>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-4 offset-md-4">
                <?php
                if ($_POST)
                    echo showPrice($prices[$_POST['type']]);
                ?>
            </div>
        </div>
    </div>
</html>