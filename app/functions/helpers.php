<?php

function showTable($data)
{   
    echo "<tr>";
    echo "<td>{$_POST['type']}</td>";
    
    foreach ($data as $key => $value) {
        echo "<td>{$key}</td>";
    };
    echo "</tr>";
    $temp = 0;
    for ($i = 0; $i < 4; $i++){
        echo "<tr>";
        $temp +=25;
        echo "<td>{$temp}</td>";
        foreach ($data as $key => $value) {
            if ($temp == $_POST['weight'] && $key == $_POST['month']){
                echo "<td class=\"table-info\" >{$value[$temp]}</td>";
            } else {
                echo "<td>{$value[$temp]}</td>";
            }
        }
        echo "</tr>";
    }
};

function showPrice($prices){
        $price = $prices[$_POST['month']][$_POST['weight']] * $_POST['weight'];
        echo "Цена составит {$price}";
}
