<?php
//5 - admin, 3 - skautas, 2 - treneris, 1- buhalteris
function check_user_rights(){
    if($_SESSION['role_id']==5){
        $rights_arr['leisti_perziureti']=1;
        $rights_arr['leisti_kurti']=1;
        $rights_arr['leisti_trinti']=1;
        return $rights_arr;
    }
    else if($_SESSION['role_id']==1){
        $rights_arr['pagrindiniai_duomenys']="readonly";
        $rights_arr['leisti_perziureti']=1;
        return $rights_arr;
    }
    else {
        $rights_arr['leisti_perziureti']=0;
        return $rights_arr;
    }
}

function check_player_rights(){
    if($_SESSION['role_id']==5){
        $rights_arr['leisti_perziureti']=1;
        $rights_arr['leisti_kurti']=1;
        $rights_arr['leisti_trinti']=1;
        return $rights_arr;
    }
    else if($_SESSION['role_id']==3){
        $rights_arr['leisti_perziureti']=1;
        $rights_arr['leisti_kurti']=1;
        return $rights_arr;
    }
    else if($_SESSION['role_id']==2){
        $rights_arr['leisti_perziureti']=1;
        $rights_arr['leisti_kurti']=1;
        return $rights_arr;
    }
    else if($_SESSION['role_id']==1){
        $rights_arr['pagrindiniai_duomenys']="readonly";
        $rights_arr['leisti_perziureti']=1;
        return $rights_arr;
    }
    else {
        $rights_arr['leisti_perziureti']=0;
        return $rights_arr;
    }
}

function check_teams_rights(){
    if($_SESSION['role_id']!=5){
        $rights_arr['leisti_perziureti']=0;
        return $rights_arr;
    }
    else {
        $rights_arr['leisti_perziureti']=1;
        return $rights_arr;
    }
}

function check_applications_rights(){
    if($_SESSION['role_id']!=5){
        $rights_arr['leisti_perziureti']=0;
        return $rights_arr;
    }
    else {
        $rights_arr['leisti_perziureti']=1;
        return $rights_arr;
    }
}

function check_transactions_rights(){
    if($_SESSION['role_id']==5 || $_SESSION['role_id']==1){
        $rights_arr['leisti_perziureti']=1;
        $rights_arr['leisti_kurti']=1;
        $rights_arr['leisti_trinti']=1;
        return $rights_arr;
    }
    else {
        $rights_arr['leisti_perziureti']=0;
        return $rights_arr;
    }
}

