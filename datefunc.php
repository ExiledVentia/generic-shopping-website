<?php
function dateEn($tgl){
    $day = substr($tgl,8,2);
    $month = getMonth(substr($tgl,5,2));
    $year = substr($tgl,0,4);
    return $day.''.$month.''.$year;
}
function getMonth($mth){
    switch ($mth){
        case 1;
            return " January ";
        break;
        case 2;
            return " February ";
        break;
        case 3;
            return " March ";
        break;
        case 4;
            return " April ";
        break;
        case 5;
            return " May ";
        break;
        case 6;
            return " June ";
        break;
        case 7;
            return " July ";
        break;
        case 8;
            return " August ";
        break;
        case 9;
            return " September ";
        break;
        case 10;
            return " October ";
        break;
        case 11;
            return " November ";
        break;
        case 12;
            return " December ";
        break;

    }
}
?>