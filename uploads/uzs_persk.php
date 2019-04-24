<?
ini_set('max_execution_time', 9000);
ini_set('memory_limit', '2048M');
$pieces = explode("/", $_SERVER[PHP_SELF]);
$folder = $pieces[1];
require_once("$_SERVER[DOCUMENT_ROOT]/$folder/inc/loader.inc.php");
?>
    <html>
    <head>
<? require require_file("$_SERVER[DOCUMENT_ROOT]/$folder/inc/html_head.inc.php");
require_once "$_SERVER[DOCUMENT_ROOT]/$folder/iframes_test/route_perskaiciavimo_functions.php";
require require_file($_SERVER[DOCUMENT_ROOT] . "/" . $folder . '/functions/tmp_terminalines_funkcijos.php');
require require_file($_SERVER[DOCUMENT_ROOT] . "/" . $folder . '/functions/tmp_terminalines_funkcijos_2.php');
require require_file("$_SERVER[DOCUMENT_ROOT]/$folder/uzsakymai/setup_uzsakymas.php");

//$uzsakymo_id = '49853'; //jei norim pratestuot konkretu uzsakyma
$nuo_kada_imti_uzsakymus='2018-01-01';
$iki_kada_imti_uzsakymus='2018-12-30'; // nuo 2019 visi sutvarkyti
$add_dates_sql="";
if($nuo_kada_imti_uzsakymus) $add_dates_sql .=" AND uzsakymas.reg_data>='$nuo_kada_imti_uzsakymus' ";
if($iki_kada_imti_uzsakymus) $add_dates_sql .=" AND uzsakymas.reg_data<='$iki_kada_imti_uzsakymus' ";

//jei imam uzsakymo_id tai pagal datas neziurim, nes turim konkretu uzsakyma
if($uzsakymo_id){
    $additional_sql=" AND uzsakymas.uzsakymo_id='$uzsakymo_id' ";
}
else {
    $additional_sql=$add_dates_sql;
}

//uzupdeitinam ne autovezius
$sql_update_suma_vykdytojui_valiuta_pries_pap_islaidas=("UPDATE uzdaviniai LEFT JOIN uzsakymas ON uzsakymas.uzsakymo_id=uzdaviniai.uzsakymo_id SET suma_vykdytojui_valiuta_pries_pap_islaidas=suma_vykdytojui_valiuta, suma_vykdytojui_pries_pap_islaidas=suma_vykdytojui WHERE uzsakymas.used_skin_type!='1' AND uzsakymas.skyrius!='1' AND uzdaviniai.suma_vykdytojui_pries_pap_islaidas='0.00' AND uzdaviniai.suma_vykdytojui!='0.00' $additional_sql");
send_mysql_query($sql_update_suma_vykdytojui_valiuta_pries_pap_islaidas);
//uzupdeitinam autovezius
$sql_update_suma_vykdytojui_valiuta_pries_pap_islaidas_kai_autoveziai=("UPDATE uzdaviniai LEFT JOIN uzsakymas ON uzsakymas.uzsakymo_id=uzdaviniai.uzsakymo_id SET suma_vykdytojui_valiuta_pries_pap_islaidas=kaina_frachtas_suma_valiuta, suma_vykdytojui_pries_pap_islaidas=kaina_frachtas_suma_valiuta WHERE (uzsakymas.used_skin_type!='1' OR uzsakymas.skyrius='1') AND uzdaviniai.suma_vykdytojui_pries_pap_islaidas='0.00' AND uzdaviniai.kaina_frachtas_suma_valiuta!='0.00' $additional_sql");
send_mysql_query($sql_update_suma_vykdytojui_valiuta_pries_pap_islaidas_kai_autoveziai);

$uzsakymai = mfa_kaip_array("SELECT * from uzsakymas where 1=1 $additional_sql");
foreach ($uzsakymai as $uzsakymas) {
    if ($uzsakymas[used_skin_type] != 1)
        form_one_uzduotis($uzsakymas[uzsakymo_id]);

    $uzdaviniai = mfa_kaip_array("SELECT * from uzdaviniai where uzsakymo_id='$uzsakymas[uzsakymo_id]'");
    foreach ($uzdaviniai as $uzdavinys) {
        unset($sql_update_uzdavinys);
        //double check
        if(!$uzdavinys[suma_vykdytojui_pries_pap_islaidas] || $uzdavinys[suma_vykdytojui_pries_pap_islaidas]=='0.00' || $uzdavinys[suma_vykdytojui_pries_pap_islaidas]=='0'){
            if ($uzsakymas[used_skin_type] != 1 && $uzsakymas[skyrius] != 1){
                $sql_update_uzdavinys="UPDATE uzdaviniai SET suma_vykdytojui_pries_pap_islaidas=suma_vykdytojui, suma_vykdytojui_valiuta_pries_pap_islaidas=suma_vykdytojui_valiuta WHERE uzdaviniai.id='$uzdavinys[id]'";
            }
            else $sql_update_uzdavinys="UPDATE uzdaviniai SET suma_vykdytojui_pries_pap_islaidas=kaina_frachtas_suma_valiuta, suma_vykdytojui_valiuta_pries_pap_islaidas=kaina_frachtas_suma_valiuta WHERE uzdaviniai.id='$uzdavinys[id]'";
            send_mysql_query($sql_update_uzdavinys);
        }
        pelno_paskaiciavimas_log_grandinei_default_function($uzdavinys[id]);
    }
    uzsakymo_pelno_paskaiciavimas($uzsakymas[uzsakymo_id]);
    echo "Baigtas uzsakymo=<b>$uzsakymas[uzsakymo_id]</b> pelno perskaiciavimas<br>";
}
echo "<strong>-------------------------------<br>BAIGTA</strong>";