<?php
function check_user_rights(){
    if($_SESSION['global_role']==5){
        $rights_arr['leisti_perziureti']=1;
        $rights_arr['leisti_kurti']=1;
        $rights_arr['leisti_trinti']=1;
        return $rights_arr;
    }
    else if($_SESSION['global_role']==1){
        $rights_arr['pagrindiniai_duomenys']="readonly";
        $rights_arr['leisti_perziureti']=1;
        $rights_arr['leisti_kurti']=0;
        $rights_arr['leisti_trinti']=0;
        return $rights_arr;
    }
    else {
        $rights_arr['leisti_perziureti']=0;
        return $rights_arr;
    }
}

function check_roles_rights(){
    if($_SESSION['global_role']!=5){
        $rights_arr['leisti_perziureti']=0;
        return $rights_arr;
    }
    else {
        $rights_arr['leisti_perziureti']=1;
        return $rights_arr;
    }
}

function check_teams_rights(){
    if($_SESSION['global_role']!=5){
        $rights_arr['leisti_perziureti']=0;
        return $rights_arr;
    }
    else {
        $rights_arr['leisti_perziureti']=1;
        return $rights_arr;
    }
}
