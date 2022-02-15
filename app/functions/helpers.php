<?php

function showTable($data)
{   
    $content = "<tr>";
    $content.= "<td>{$_POST['type']}</td>";
    
    foreach ($data as $key => $value) {
        $content.= "<td>{$key}</td>";
    };

    $content.= "</tr>";

    $temp = 0;

    for ($i = 0; $i < 4; $i++) {
        $content.= "<tr>";
        $temp +=25;
        $content.= "<td>{$temp}</td>";
        foreach ($data as $key => $value) {
            if ($temp == $_POST['weight'] && $key == $_POST['month']) {
                $content.= "<td class=\"table-info\" >{$value[$temp]}</td>";
            } else {
                $content.= "<td>{$value[$temp]}</td>";
            }
        }
        $content.= "</tr>";
    }
    return $content;
};

function showPrice($prices) {
        $price = $prices[$_POST['month']][$_POST['weight']] * $_POST['weight'];

        $content = "<span class=\"border p-3 border-primary border-5 rounded-pill\">";
        $content.= "Total price: {$price}";
        $content.= "</span>";

        return $content;
}
