<?php
function positions_list($value){

    if(!isset($value))
        $value=0;

    $list = "<option value='0' ";
    if ($value==0)
        $list .= "selected";
    $list .= ">...</option>";

    $list .= "<option value='1' ";
    if ($value==1)
        $list .= "selected";
    $list .= ">Vartininkas</option>";

    $list .= "<option value='2' ";
    if ($value==2)
        $list .= "selected";
    $list .= ">Gynėjas</option>";

    $list .= "<option value='3' ";
    if ($value==3)
        $list .= "selected";
    $list .= ">Saugas</option>";

    $list .= "<option value='4'";
    if ($value==4)
        $list .= "selected";
    $list .= ">Puolėjas</option>";

    return $list;
}

function applications_status_list($value){

    if(!isset($value))
        $value=0;

    $list = "<option value='0' ";
    if ($value==0)
        $list .= "selected";
    $list .= ">Naujas</option>";

    $list .= "<option value='1' ";
    if ($value==1)
        $list .= "selected";
    $list .= ">Patvirtintas</option>";

    $list .= "<option value='2' ";
    if ($value==2)
        $list .= "selected";
    $list .= ">Atidėtas</option>";

    $list .= "<option value='3' ";
    if ($value==3)
        $list .= "selected";
    $list .= ">Atmestas</option>";

    return $list;
}