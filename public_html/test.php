<?php
/**
 * Created by PhpStorm.
 * User: SW-PC1
 * Date: 25.07.14
 * Time: 13:02
 */
$countryRaw = file('C:\Users\SW-PC1\Downloads\rocid.csv (copy 3)\country.csv');
$regionRaw = file('C:\Users\SW-PC1\Downloads\rocid.csv (copy 3)\region.csv');
$cityRaw = file('C:\Users\SW-PC1\Downloads\rocid.csv (copy 3)\city.csv');



$li = mysqli_connect('localhost', 'root', 'mysql', 'qucms');

//mysql_set_charset('utf8');

mysqli_set_charset($li, 'utf8');

$cities = [];
$regions = [];
$countries = [];

unset($cityRaw[0]);
foreach ($cityRaw as $rowRaw) {
    $rowArr = explode(';', $rowRaw);
    $cities[(int)$rowArr[0]][] = $rowArr[1];
}

unset($regionRaw[0]);
foreach ($regionRaw as $rowRaw) {
    $rowArr = explode(';', $rowRaw);
    $regions[(int)$rowArr[1]][(int)$rowArr[0]] = $rowArr[2];
}


unset($countryRaw[0]);
foreach ($countryRaw as $rowRaw) {
    $rowArr = explode(';', $rowRaw);
    $countries[(int)$rowArr[0]] = $rowArr[1];
}

$i = 1;
$j = 1;
$k = 1;
foreach($countries as $id => $title) {
    mysqli_query($li, "INSERT INTO country(id, title) VALUES($i, \"$title\")");
    foreach($regions[$id] as $regId => $regTitle) {
        mysqli_query($li, "INSERT INTO region(id, countryId, title) VALUES($j, $i, \"$regTitle\")");
        foreach($cities[$regId] as $citTitle) {
            mysqli_query($li, "INSERT INTO city(id, regionId, title) VALUES($k, $j, \"$citTitle\")");
            $k++;
        }
        $j++;
    }
    $i++;
}

mysqli_close($li);