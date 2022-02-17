<?php

function showTable($link)
{   
    $sql = "SELECT * FROM month;";

    $result = mysqli_query($link,$sql);

    $categories = mysqli_fetch_all($result);

    $content = "<tr>";
    $content.= "<td>{$_POST['type']}</td>";

    $monthHelper = "";

    
    foreach ($categories as $key => $value) {
        $content.= "<td>{$value[1]}</td>";
        if ($value[1]==$_POST['month']) {
            $monthHelper = $value[0];
        };
    };

    $content.= "</tr>";

    $sql = "SELECT month_id, weight_id, price FROM price 
    JOIN material ON material_id = material.id 
    WHERE material.name = \"{$_POST['type']}\";";

    $result = mysqli_query($link,$sql);

    $categories = mysqli_fetch_all($result);
    
    $temp = 0;

    for ($i = 0; $i<4; $i++) {
        $helpTemp = $temp;
        $content.= "<tr>";
        $weight = 25 * ($i+1);
        $content.= "<td>{$weight}</td>";
        for ($j = 0; $j<6;$j++) {
            if ($weight == $_POST['weight'] && $monthHelper == $categories[$helpTemp][0]) {
                $content.= "<td class=\"table-info\">{$categories[$helpTemp][2]}</td>";
            } else {
                $content.= "<td>{$categories[$helpTemp][2]}</td>";
            }
            $helpTemp+=4;
        };
        $content.= "</tr>";
        $temp +=1;
    };

    return $content;
};

function showPrice($link) {
    $sql = 
        "SELECT price FROM price
        JOIN month ON month.id = month_id 
        JOIN weight ON weight.id = weight_id 
        JOIN material ON material.id = material_id 
        WHERE 
        weight.count = {$_POST['weight']} AND 
        month.name=\"{$_POST['month']}\" AND 
        material.name = \"{$_POST['type']}\";";


    $result = mysqli_query($link,$sql);

    $categories = mysqli_fetch_all($result);

    $price = $categories[0][0];

    $price *= $_POST['weight'];

    $content = "<span class=\"border p-3 border-primary border-5 rounded-pill\">";
    $content.= "Цена составит: {$price}";
    $content.= "</span>";

    return $content;
};

function showAnyType($link, $type) {
    $sql = "SELECT * FROM {$type};";

    $result = mysqli_query($link,$sql);

    $categories = mysqli_fetch_all($result);

    $result = '';

    foreach ($categories as $key => $value) {
        $result.= "<option>{$value[1]}</option>";
    };

    return $result;
};