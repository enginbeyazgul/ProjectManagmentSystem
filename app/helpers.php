<?php
function statuDescription($data){
    switch ($data){
        case "0":
            return "Proje reddedildi";
        case "1":
            return "Tamamlandı";
        case "10":
            return "Fikir Reddedildi";
        case "11":
            return "Rapor bekleniyor";
        case "12":
            return "Fikir gönderildi";
        case "20":
            return "Rapor reddedildi";
        case "21":
            return "Tez bekleniyor";
        case "22":
            return "Rapor gönderildi";
        case "30":
            return "Tez reddedildi";
        case "31":
            return "Tamamlandı";
        case "32":
            return "Tez gönderildi";
        default:
            return false;
    }
}
function iconDot($data){
    switch ($data){
        case "0":
            return "btn-outline-danger";
        case "1":
            return "btn-outline-success";
        case "10":
            return "btn-outline-danger";
        case "11":
            return "btn-outline-warning";
        case "12":
            return "btn-outline-info";
        case "20":
            return "btn-outline-danger";
        case "21":
            return "btn-outline-warning";
        case "22":
            return "btn-outline-info";
        case "30":
            return "btn-outline-danger";
        case "31":
            return "btn-outline-success";
        case "32":
            return "btn-outline-info";
        default:
            return false;
    }
}
function spanClass($data){
    switch ($data){
        case "0":
            return "badge badge-sm bg-gradient-danger";
        case "1":
            return "badge badge-sm bg-gradient-success";
        case "10":
            return "badge badge-sm bg-gradient-danger";
        case "11":
            return "badge badge-sm bg-gradient-warning";
        case "12":
            return "badge badge-sm bg-gradient-info";
        case "20":
            return "badge badge-sm bg-gradient-danger";
        case "21":
            return "badge badge-sm bg-gradient-warning";
        case "22":
            return "badge badge-sm bg-gradient-info";
        case "30":
            return "badge badge-sm bg-gradient-danger";
        case "31":
            return "badge badge-sm bg-gradient-success";
        case "32":
            return "badge badge-sm bg-gradient-info";
        default:
            return false;
    }
}
function iconClass($data){
    switch ($data){
        case "0":
            return "fas fa-times";
        case "1":
            return "fas fa-check";
        case "10":
            return "fas fa-times";
        case "11":
            return "fas fa-hourglass-half";
        case "12":
            return "fas fa-info-circle";
        case "20":
            return "fas fa-times";
        case "21":
            return "fas fa-hourglass-half";
        case "22":
            return "fas fa-info-circle";
        case "30":
            return "fas fa-times";
        case "31":
            return "fas fa-check";
        case "32":
            return "fas fa-info-circle";
        default:
            return false;
    }
}
function gorulduClass($data){
    switch ($data){
        case "12":
            return "fas fa-check";
        case "22":
            return "fas fa-check";
        case "32":
            return "fas fa-check";
        case "10":
            return "fas fa-check-double";
        case "11":
            return "fas fa-check-double";
        case "20":
            return "fas fa-check-double";
        case "21":
            return "fas fa-check-double";
        case "30":
            return "fas fa-check-double";
        case "31":
            return "fas fa-check-double";
        default:
            return "";
    }
}
function gorulduTitle($data){
    switch ($data){
        case "12":
            return "İletildi";
        case "22":
            return "İletildi";
        case "32":
            return "İletildi";
        case "10":
            return "Fikir görüntülendi";
        case "20":
            return "Rapor görüntülendi";
        case "30":
            return "Tez görüntülendi";
        case "11":
            return "Fikir görüntülendi";
        case "21":
            return "Rapor görüntülendi";
        case "31":
            return "Tez görüntülendi";
        default:
            return "";
    }
}
function gorulduColor($data){
    switch ($data){
        case "12":
            return "";
        case "22":
            return "";
        case "10":
            return "btn-outline-info";
        case "11":
            return "btn-outline-info";
        case "20":
            return "btn-outline-info";
        case "21":
            return "btn-outline-info";
        case "30":
            return "btn-outline-info";
        case "31":
            return "btn-outline-info";
        default:
            return "";
    }
}
function tarihFormat($data){
    $time = strtotime($data) + 60*60*3;
    return date('d/m/Y H:i',$time);
}
?>
