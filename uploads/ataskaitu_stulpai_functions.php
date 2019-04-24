<?php
//####################################################################################################################
/*
 *      SVARBU!
 *      JEI X ATASKAITAI REIKIA PRIDĖTI PAPILDOMĄ `PASIDARYK PATS` STULPĄ - TĄ STULPĄ PRIDĖTI Į MASYVO GALĄ SU DIDŽIAUSIU `EIL_NR`,
 *      T.Y. KITIEMS MASYVO ELEMENTAMS `EIL_NR` NEKEISTI.
*/
//####################################################################################################################
function ataskaitu_default_settings($ataskaitos_vardas, $stulpo_vardas, $get_stulpo_settings, $user_id, $skyrius, $teisiu_role, $cl_kliento_id){
    global $enable_klientu_pasijungimo_system_uzsakymu_vedimas;
    unset($ataskaitos_stulpai);
    if($ataskaitos_vardas == "reisai_eksp_main") {
        if(!$stulpo_vardas) { //grazinam ataskaitos stulpu masyva
            $ataskaitos_stulpai[] = "krovinio_marsrutas_is";
            $ataskaitos_stulpai[] = "krovinio_marsrutas_i";
            $ataskaitos_stulpai[] = "istat_sask_parametrai";
            $ataskaitos_stulpai[] = "krovinio_parametrai";
            $ataskaitos_stulpai[] = "log_grand_main_info";
            $ataskaitos_stulpai[] = "papl_islaidos_html";
            $ataskaitos_stulpai[] = "log_grand_is";
            $ataskaitos_stulpai[] = "log_grand_i";
            $ataskaitos_stulpai[] = "kontakt_asmuo_param";
            $ataskaitos_stulpai[] = "uzsakymo_stulpu_grupe";
            $ataskaitos_stulpai[] = "uzsakymo_stulpu_grupe_2";
            $ataskaitos_stulpai[] = "uzsakymo_vykdymo_grupe";
            $ataskaitos_stulpai[] = "uzs_dokumentu_parametrai";
            $ataskaitos_stulpai[] = "konteineriu_informacija";
            return $ataskaitos_stulpai;
        }
        $parametrai = atask_pasidaryk_pats_reisai_eksp_main($stulpo_vardas);
    }
    if($ataskaitos_vardas == "reisai_eksp_v4") {
        if(!$stulpo_vardas) { //grazinam ataskaitos stulpu masyva
            $ataskaitos_stulpai[] = "reiso_krovinio_info";
            $ataskaitos_stulpai[] = "reiso_krovinio_marsrutas_i";
            $ataskaitos_stulpai[] = "reiso_krovinio_marsrutas_is";
            return $ataskaitos_stulpai;
        }
        $parametrai = atask_pasidaryk_pats_reisai_eksp_v4($stulpo_vardas);
    }
    if($ataskaitos_vardas == "organizer_uzs_log_grandines") {
        if(!$stulpo_vardas) { //grazinam ataskaitos stulpu masyva
            $ataskaitos_stulpai[] = "uzdavinio_marsrutas_is";
            $ataskaitos_stulpai[] = "uzdavinio_marsrutas_i";
            $ataskaitos_stulpai[] = "organizer_marsruto_info_grupe";
            $ataskaitos_stulpai[] = "organizer_uzsakymo_info_grupe";
            $ataskaitos_stulpai[] = "organizer_log_grand_info_grupe";
            $ataskaitos_stulpai[] = "organizer_log_grand_kroviniai_info_grupe";
            $ataskaitos_stulpai[] = "organizer_log_grand_kroviniai_info_pakr_grupe";
            $ataskaitos_stulpai[] = "organizer_log_grand_kroviniai_info_iskr_grupe";
            $ataskaitos_stulpai[] = "organizer_log_grand_reiso_kroviniai_info_grupe";
            $ataskaitos_stulpai[] = "organizer_reiso_uzsakymo_info_grupe";
            $ataskaitos_stulpai[] = "organizer_reiso_log_grand_info_grupe";
            $ataskaitos_stulpai[] = "organizer_reiso_keliones_lapo_info_grupe";
            $ataskaitos_stulpai[] = "reiso_uzdavinio_marsrutas_is";
            $ataskaitos_stulpai[] = "reiso_uzdavinio_marsrutas_i";
            $ataskaitos_stulpai[] = "reiso_uzdavinio_grand_kroviniai_marsrutas_is";
            $ataskaitos_stulpai[] = "reiso_uzdavinio_grand_kroviniai_marsrutas_i";
            return $ataskaitos_stulpai;
        }
        $parametrai = atask_pasidaryk_pats_organizer_uzs_log_grandines($stulpo_vardas);
    }
    if($ataskaitos_vardas == "reisai") {
        if(!$stulpo_vardas) { //grazinam ataskaitos stulpu masyva
            $ataskaitos_stulpai[] = "kons_uzsakymas";
            return $ataskaitos_stulpai;
        }
        $parametrai = atask_pasidaryk_pats_reisai($stulpo_vardas);
    }
    if($ataskaitos_vardas == "reisai_su_km") {
        if(!$stulpo_vardas) { //grazinam ataskaitos stulpu masyva
            $ataskaitos_stulpai[] = "kons_uzsakymas";
            $ataskaitos_stulpai[] = "reisai_su_km_uzsakymo_stulpu_grupe";
            $ataskaitos_stulpai[] = "reisai_su_km_kroviniu_grupe";
            $ataskaitos_stulpai[] = "reisai_su_km_uzsakymo_stulpu_grupe_2";
            $ataskaitos_stulpai[] = "reisai_su_km_marsrutas_is";
            $ataskaitos_stulpai[] = "reisai_su_km_marsrutas_i";
            $ataskaitos_stulpai[] = "reisai_su_km_log_grand_main_info";
            return $ataskaitos_stulpai;
        }
        $parametrai = atask_pasidaryk_pats_reisai_su_km($stulpo_vardas);
    }
    if($ataskaitos_vardas == "keliones_lapas") {
        if(!$stulpo_vardas) { //grazinam ataskaitos stulpu masyva
            $ataskaitos_stulpai[] = "keliones_lapas_uzsakymo_stulpu_grupe";
            return $ataskaitos_stulpai;
        }
        $parametrai = atask_pasidaryk_pats_keliones_lapas($stulpo_vardas);
    }
    if($ataskaitos_vardas == "reisai_su_km_autov") {
        if(!$stulpo_vardas) { //grazinam ataskaitos stulpu masyva
            $ataskaitos_stulpai[] = "kons_uzsakymas";
            $ataskaitos_stulpai[] = "reisai_su_km_autov_uzsakymo_stulpu_grupe";
            $ataskaitos_stulpai[] = "reisai_su_km_autov_kroviniu_grupe";
            $ataskaitos_stulpai[] = "reisai_su_km_autov_uzsakymo_stulpu_grupe_2";
            $ataskaitos_stulpai[] = "reisai_su_km_autov_marsrutas_is";
            $ataskaitos_stulpai[] = "reisai_su_km_autov_marsrutas_i";
            $ataskaitos_stulpai[] = "reisai_su_km_autov_log_grand_main_info";
            return $ataskaitos_stulpai;
        }
        $parametrai = atask_pasidaryk_pats_reisai_su_km_autov($stulpo_vardas);
    }
    if($ataskaitos_vardas == "frachto_paskirstymas_uzsakymams") {
        if(!$stulpo_vardas) { //grazinam ataskaitos stulpu masyva
            $ataskaitos_stulpai[] = "kons_uzsakymas";
            $ataskaitos_stulpai[] = "frachto_paskirstymas_uzsakymams_uzsakymo_stulpu_grupe";
            $ataskaitos_stulpai[] = "frachto_paskirstymas_uzsakymams_kroviniu_grupe";
            $ataskaitos_stulpai[] = "frachto_paskirstymas_uzsakymams_uzsakymo_stulpu_grupe_2";
            $ataskaitos_stulpai[] = "frachto_paskirstymas_uzsakymams_marsrutas_is";
            $ataskaitos_stulpai[] = "frachto_paskirstymas_uzsakymams_marsrutas_i";
            $ataskaitos_stulpai[] = "frachto_paskirstymas_uzsakymams_log_grand_main_info";
            return $ataskaitos_stulpai;
        }
        $parametrai = atask_pasidaryk_pats_frachto_paskirstymas_uzsakymams($stulpo_vardas);
    }
    if($ataskaitos_vardas == "organizer_uzs_log_grandines_autov") {
        if(!$stulpo_vardas) { //grazinam ataskaitos stulpu masyva
            $ataskaitos_stulpai[] = "kons_uzsakymas";
            return $ataskaitos_stulpai;
        }
        $parametrai = atask_pasidaryk_pats_organizer_uzs_log_grandines_autov($stulpo_vardas);
    }
    if($ataskaitos_vardas == "org_pagal_pask_uzdavinius") {
        if(!$stulpo_vardas) { //grazinam ataskaitos stulpu masyva
            $ataskaitos_stulpai[] = "org_pagal_pask_uzdavinius_masinos_info";
            $ataskaitos_stulpai[] = "org_pagal_pask_uzdavinius_paskutinis";
            $ataskaitos_stulpai[] = "org_pagal_pask_uzdavinius_pasikrovimas";
            $ataskaitos_stulpai[] = "org_pagal_pask_uzdavinius_issikrovimas";
            $ataskaitos_stulpai[] = "org_pagal_pask_uzdavinius_pasikrovimas_nepriskirtiem";
            $ataskaitos_stulpai[] = "org_pagal_pask_uzdavinius_issikrovimas_nepriskirtiem";
            return $ataskaitos_stulpai;
        }
        $parametrai = atask_pasidaryk_pats_org_pagal_pask_uzdavinius($stulpo_vardas);
    }
    if($ataskaitos_vardas == "masinu_priekabu_dispatcher") {
        if(!$stulpo_vardas) { //grazinam ataskaitos stulpu masyva
            $ataskaitos_stulpai[] = "masinu_priekabu_dispatcher_masinos_info";
            $ataskaitos_stulpai[] = "masinu_priekabu_dispatcher_priekabos_info";
            $ataskaitos_stulpai[] = "masinu_priekabu_dispatcher_uzdavinys_is";
            $ataskaitos_stulpai[] = "masinu_priekabu_dispatcher_uzdavinys_i";
            $ataskaitos_stulpai[] = "masinu_priekabu_dispatcher_uzdavinys_is_priekabos";
            $ataskaitos_stulpai[] = "masinu_priekabu_dispatcher_uzdavinys_i_priekabos";
            $ataskaitos_stulpai[] = "masinu_priekabu_dispatcher_krovinio_info_masinos";
            $ataskaitos_stulpai[] = "masinu_priekabu_dispatcher_krovinio_info_priekabos";
            return $ataskaitos_stulpai;
        }
        $parametrai = atask_pasidaryk_pats_masinu_priekabu_dispatcher($stulpo_vardas);
    }
    if($get_stulpo_settings){
        if($cl_kliento_id){
            $settings = gor(" SELECT parametrai FROM ataskaitu_stulpai_pasidaryk_pats WHERE failo_vardas = '$ataskaitos_vardas' AND failo_vieta = '$stulpo_vardas' AND cl_kliento_id = '$cl_kliento_id'");
            if ($settings == FALSE) {
                $settings = gor(" SELECT parametrai FROM ataskaitu_stulpai_pasidaryk_pats WHERE failo_vardas = '$ataskaitos_vardas' AND failo_vieta = '$stulpo_vardas' AND skyrius = '0' AND teisiu_roles_id = '0' AND priskirta_user_id = '0' AND cl_kliento_id = '0' AND bendri_settings = '1'");
            }
        }else {
            if ($user_id) {
                $settings = gor(" SELECT parametrai FROM ataskaitu_stulpai_pasidaryk_pats WHERE failo_vardas = '$ataskaitos_vardas' AND failo_vieta = '$stulpo_vardas' AND priskirta_user_id = '$user_id'");
            }
            if ($settings == FALSE && $skyrius) {
                $settings = gor(" SELECT parametrai FROM ataskaitu_stulpai_pasidaryk_pats WHERE failo_vardas = '$ataskaitos_vardas' AND failo_vieta = '$stulpo_vardas' AND skyrius = '$skyrius'");
            }
            if ($settings == FALSE && $teisiu_role) {
                $settings = gor(" SELECT parametrai FROM ataskaitu_stulpai_pasidaryk_pats WHERE failo_vardas = '$ataskaitos_vardas' AND failo_vieta = '$stulpo_vardas' AND teisiu_roles_id = '$teisiu_role'");
            }
            if ($settings == FALSE) {
                $settings = gor(" SELECT parametrai FROM ataskaitu_stulpai_pasidaryk_pats WHERE failo_vardas = '$ataskaitos_vardas' AND failo_vieta = '$stulpo_vardas' AND skyrius = '0' AND teisiu_roles_id = '0' AND priskirta_user_id = '0' AND cl_kliento_id = '0' AND bendri_settings = '0'");
            }
        }
        $settings = unserialize(stripslashes($settings));
        if(!$settings ) {
            $settings = $parametrai;
        } else {
            $lr = array();
            foreach ($parametrai as $param) {
                foreach ($settings as $s) {
                    if ($param[stulpas] == $s[stulpas] ) {
                        $param[active] = $s[active];
                        $param[eil_nr] = $s[eil_nr];
                        $param[substring] = $s[substring];
                        $param[vidinis_stulpo_vardas] = $s[vidinis_stulpo_vardas];
                        $param[funkcija] = $s[funkcija];
                        $param[style] = $s[style];
                        $param[jei_nera_reiksmes_rodyk_x_stulpelio_reiksme] = $s[jei_nera_reiksmes_rodyk_x_stulpelio_reiksme];
                        $param[rodyk_tik_tuomet_jei_nera_x_stulpelio] = $s[rodyk_tik_tuomet_jei_nera_x_stulpelio];
                        $param[rodyk_tik_tuomet_jei_yra_x_stulpelis] = $s[rodyk_tik_tuomet_jei_yra_x_stulpelis];
                        $param[text_before] = $s[text_before];
                        $param[text_after] = $s[text_after];
                        $lr[$param[stulpas]] = $param;
                        break;
                    }
                }
            }
            $settings = $lr;
        }
        uasort($settings,"order_by_eil_nr");
        return $settings;
    }
    return $parametrai;
}

function order_by_eil_nr($a, $b) {
    return $a['eil_nr'] - $b['eil_nr'];
}

function atask_pasidaryk_pats_reisai_eksp_v4($stulpo_vardas)
{
    if($stulpo_vardas == "reiso_krovinio_info") {
        $parametrai = array(
            'svoris_t' => array(
                'eil_nr' => 1,
                'active' => 1,
                'substring' => 0,
                'label' => 'Svoris',
                'text_after' => 't.,',
                'stulpas' => 'svoris_t'
            ),
            'temperature' => array(
                'eil_nr' => 2,
                'active' => 1,
                'substring' => 0,
                'label' => 'Temperatura',
                'text_after' => 'C,',
                'stulpas' => 'temperature'
            ),
            'krovinio_id' => array(
                'eil_nr' => 3,
                'active' => 1,
                'substring' => 0,
                'label' => 'Krovinys ',
                'stulpas' => 'krovinio_pavadinimas'
            )
        );
    }
    if($stulpo_vardas == "reiso_krovinio_marsrutas_i") {
        $parametrai = array(
            'pakr_salis' => array(
                'eil_nr' => 1,
                'active' => 1,
                'substring' => 0,
                'funkcija' => 'get_salis_sutr_by_id',
                'label' => 'Pasikrovimo vieta',
                'stulpas' => 'pakr_salis'
            ),
            'pakr_regionas' => array(
                'eil_nr' => 2,
                'active' => 1,
                'substring' => 0,
                'label' => 'Pasikrovimo regionas',
                'stulpas' => 'pakr_regionas'
            ),
            'pakr_miestas' => array(
                'eil_nr' => 3,
                'active' => 1,
                'substring' => 0,
                'label' => 'Pasikrovimo miestas',
                'stulpas' => 'pakr_miestas'
            ),
        );
    }
    if($stulpo_vardas == "reiso_krovinio_marsrutas_is") {
        $parametrai = array(
            'iskr_salis' => array(
                'eil_nr' => 1,
                'active' => 1,
                'substring' => 0,
                'funkcija' => 'get_salis_sutr_by_id',
                'label' => 'Išsikrovimo  vieta',
                'stulpas' => 'iskr_salis'
            ),
            'iskr_regionas' => array(
                'eil_nr' => 2,
                'active' => 1,
                'substring' => 0,
                'label' => 'Išsikrovimo  regionas',
                'stulpas' => 'iskr_regionas'
            ),
            'iskr_miestas' => array(
                'eil_nr' => 3,
                'active' => 1,
                'substring' => 0,
                'label' => 'Išsikrovimo  miestas',
                'stulpas' => 'iskr_miestas'
            ),
        );
    }
    return $parametrai;
}

function rodyk_pasidaryk_pats_eiliskuma($eilutes_arr,$b,$all_b_res){
    $eiliskumas = "";
    foreach ($eilutes_arr AS $key => $eilute) {
        unset($style);
        if($eilute[jei_nera_reiksmes_rodyk_x_stulpelio_reiksme] && $b[$eilute[jei_nera_reiksmes_rodyk_x_stulpelio_reiksme]] && !$b[$eilute[stulpas]] && $eilute[active]){
            $eilute = $eilutes_arr[$eilute[jei_nera_reiksmes_rodyk_x_stulpelio_reiksme]];
        }else {
            if (!$eilute[active])
                continue;
        }
        switch ($eilute[stulpas]) {
            case "$eilute[stulpas]":
                if($eilute[rodyk_tik_tuomet_jei_nera_x_stulpelio] && $b[$eilute[rodyk_tik_tuomet_jei_nera_x_stulpelio]]) //jei pasirinktas stulpelis ir jo reiksme ne tuscia - tada nerodom $eilute[stulpas]
                    break 1;
                if($eilute[rodyk_tik_tuomet_jei_yra_x_stulpelis] && !$b[$eilute[rodyk_tik_tuomet_jei_yra_x_stulpelis]]) //jei pasirinktas stulpelis ir jo reiksme tuscia - tada nerodom $eilute[stulpas]
                    break 1;
                if($eilute[style])
                    $style = "$eilute[style]";
                if ($eilute[funkcija] && function_exists($eilute[funkcija])) {
                    if($b[$eilute[stulpas]]) {
                        if ($eilute[substring])
                            $eiliskumas .= "<span style='$style' onmouseover=\"show_tooltip(this, '$eilute[text_before] {$eilute[funkcija]($b[$eilute[stulpas]], $all_b_res)} $eilute[text_after]')\" '>$eilute[text_before]" . mb_substr($eilute[funkcija]($b[$eilute[stulpas]], $all_b_res), 0, $eilute[substring], "UTF-8") . "$eilute[text_after]</span> ";
                        else
                            $eiliskumas .= "<span style='$style'>$eilute[text_before]" . $eilute[funkcija]($b[$eilute[stulpas]], $all_b_res) . "$eilute[text_after]</span> ";
                    }
                }else {
                    if($b[$eilute[stulpas]]) {
                        if ($eilute[substring])
                            $eiliskumas .= "<span style='$style' onmouseover=\"show_tooltip(this, '$eilute[text_before] {$b[$eilute[stulpas]]} $eilute[text_after]')\" '>$eilute[text_before]" . mb_substr($b[$eilute[stulpas]], 0, $eilute[substring], "UTF-8") . "$eilute[text_after]</span> ";
                        else
                            $eiliskumas .= "<span style='$style'>$eilute[text_before]" . $b[$eilute[stulpas]] . "$eilute[text_after]</span> ";
                    }
                }
                break;
        }
    }
    return $eiliskumas;
}
function rodyk_pasidaryk_pats_eiliskuma_vienam_stulpeliui($ataskaitos_stulpu_settings, $reiksme, $tooltip){
    $eiliskumas = "";
    if (!$ataskaitos_stulpu_settings[active])
        return;
    switch ($ataskaitos_stulpu_settings[stulpas]) {
        case "$ataskaitos_stulpu_settings[stulpas]":
            if ($ataskaitos_stulpu_settings[style])
                $style = "$ataskaitos_stulpu_settings[style]";
            if ($reiksme) {
                if ($ataskaitos_stulpu_settings[substring]) {
                    if(!$tooltip) $tooltip = $reiksme;
                    $eiliskumas .= "<span style='$style' onmouseover=\"show_tooltip(this, '{$tooltip}')\" '>" . mb_substr($reiksme, 0, $ataskaitos_stulpu_settings[substring], "UTF-8") . "</span> ";
                }
                else
                    $eiliskumas .= "<span style='$style'>" . $reiksme . "</span> ";
            }
            break;
    }
    return $eiliskumas;
}
function rodyk_pasidaryk_pats_eiliskuma_ataskaitai($eilutes_arr,$b,$tik_td_names,$all_b_res, $rowspan){
    $eiliskumas = array();
    foreach ($eilutes_arr AS $key => $eilute) {
        if (!$eilute[active])
            continue;
        switch ($eilute[stulpas]) {
            case "$eilute[stulpas]":
                if($tik_td_names){
                    $b['custom_stulpas_1'] = __("Custom 1", "custom_1", "ataskaitu_stulpai_functions");
                    $b['custom_stulpas_2'] = __("Custom 2", "custom_2", "ataskaitu_stulpai_functions");
                    $b['custom_stulpas_3'] = __("Custom 3", "custom_3", "ataskaitu_stulpai_functions");
                    $eiliskumas[$key] = $b[$eilute[stulpas]];
                }else {
                    if(!$rowspan) $rowspan = 1;
                    $b['custom_stulpas_1'] = "<td rowspan=$rowspan></td>";
                    $b['custom_stulpas_2'] = "<td rowspan=$rowspan></td>";
                    $b['custom_stulpas_3'] = "<td rowspan=$rowspan></td>";
                    //jei reikia rowspan - custom funkcijai paduodam rowspan kaip parametra td piesimui
                    if ($eilute[funkcija] && function_exists($eilute[funkcija])) {
                        $eiliskumas[$key] = $eilute[funkcija]($all_b_res,$rowspan,$b[$eilute[stulpas]]);
                    } else {
                        $eiliskumas[$key] = $b[$eilute[stulpas]];
                        if($eilute[substring] && ereg("<td nowrap", $b[$eilute[stulpas]]) && !ereg("onmouseover=",$b[$eilute[stulpas]])) {
                            if($eilute[vidinis_stulpo_vardas])
                                $eilute[stulpas] = $eilute[vidinis_stulpo_vardas];
                            if($all_b_res[$eilute[stulpas]])
                                $eiliskumas[$key] = "<td nowrap align=left><span onmouseover=\"show_tooltip(this, '{$all_b_res[$eilute[stulpas]]}')\" '>" . mb_substr($all_b_res[$eilute[stulpas]], 0, $eilute[substring], "UTF-8") . "</span></td> ";
                        }
                    }
                }

                break;
        }
    }
    return $eiliskumas;
}
function get_salis_sutr_by_id_is_masyvo($salies_id){
    global $saliu_sutrumpinimai;
    return $saliu_sutrumpinimai[$salies_id];
}
function ataskaitos_stulpai_list($stulpu_array, $value)
{
    $list = "<option value=''";
    if (!$value)
        $list .= 'selected';
    $list .= "> ....... </option> ";
    foreach ($stulpu_array AS $stulpas) {
        $list .= "<option value='$stulpas[stulpas]' ";
        if ($value == $stulpas[stulpas]) {
            $list .= 'selected';
        }
        $list .= ">$stulpas[label]</option>";
    }
    return $list;
}
function atask_pasidaryk_pats_reisai_eksp_main($stulpo_vardas){
    if($stulpo_vardas == "uzsakymo_stulpu_grupe") {
        $parametrai = array(
            'uzs_zymeti_uzsak' => array(
                'eil_nr' => 0,
                'active' => 0,
                'label' => 'Žymėti užsakymus',
                'colspan' => '1',
                'stulpas' => 'uzs_zymeti_uzsak'
            ),
            'uzs_baigtas' => array(
                'eil_nr' => 1,
                'active' => 1,
                'label' => 'Baigtas',
                'colspan' => '1',
                'stulpas' => 'uzs_baigtas'
            ),
            'uzs_pavadinimas' => array(
                'eil_nr' => 2,
                'active' => 1,
                'label' => 'Užsak. Nr.',
                'colspan' => '1',
                'stulpas' => 'uzs_pavadinimas'
            ),
            'uzs_vadybininkas' => array(
                'eil_nr' => 3,
                'active' => 1,
                'label' => 'Vadyb.',
                'colspan' => '1',
                'stulpas' => 'uzs_vadybininkas'
            ),
            'uzs_uzsakovas' => array(
                'eil_nr' => 4,
                'active' => 1,
                'label' => 'Užsakovas',
                'colspan' => '1',
                'stulpas' => 'uzs_uzsakovas'
            ),
            'uzs_marsrutas' => array(
                'eil_nr' => 5,
                'active' => 1,
                'label' => 'Maršrutas',
                'colspan' => '4',
                'stulpas' => 'uzs_marsrutas'
            ),
            'uzs_krov_param' => array(
                'eil_nr' => 6,
                'active' => 1,
                'label' => 'EP,Ldm,Svoris',
                'colspan' => '1',
                'stulpas' => 'uzs_krov_param'
            ),
            'uzs_frachtas_suma' => array(
                'eil_nr' => 7,
                'active' => 1,
                'label' => 'Frachtas',
                'colspan' => '1',
                'stulpas' => 'uzs_frachtas_suma'
            ),
            'uzs_isstat_sask' => array(
                'eil_nr' => 8,
                'active' => 1,
                'label' => 'Sąskaitos',
                'colspan' => '1',
                'stulpas' => 'uzs_isstat_sask'
            ),
            'uzs_pelnas_td' => array(
                'eil_nr' => 9,
                'active' => 1,
                'label' => 'Pelnas EUR',
                'colspan' => '1',
                'stulpas' => 'uzs_pelnas_td'
            ),
            'uzs_reg_data' => array(
                'eil_nr' => 10,
                'active' => 0,
                'label' => 'Reg. data',
                'colspan' => '1',
                'stulpas' => 'uzs_reg_data'
            ),
            'uzs_uzsakovo_nr' => array(
                'eil_nr' => 11,
                'active' => 0,
                'label' => 'Užsakovo užs. nr.',
                'colspan' => '1',
                'stulpas' => 'uzs_uzsakovo_nr'
            ),
            'uzs_kasd_pastabos' => array(
                'eil_nr' => 12,
                'active' => 0,
                'label' => 'Kasdienės Pastabos',
                'colspan' => '1',
                'stulpas' => 'uzs_kasd_pastabos'
            ),
            'uzs_dokumentai' => array(
                'eil_nr' => 13,
                'active' => 0,
                'label' => 'Dokumentai',
                'colspan' => '1',
                'stulpas' => 'uzs_dokumentai'
            ),
            'uzs_vadyb_pastabos' => array(
                'eil_nr' => 14,
                'active' => 0,
                'label' => 'Vadybininkų pastabos',
                'colspan' => '1',
                'stulpas' => 'uzs_vadyb_pastabos'
            ),
            'uzs_krovinio_siuntejas_text' => array(
                'eil_nr' => 15,
                'active' => 0,
                'label' => 'Siuntėjas',
                'colspan' => '1',
                'stulpas' => 'uzs_krovinio_siuntejas_text'
            ),
            'uzs_krovinio_gavejas_text' => array(
                'eil_nr' => 16,
                'active' => 0,
                'label' => 'Gavėjas',
                'colspan' => '1',
                'stulpas' => 'uzs_krovinio_gavejas_text'
            ),
            'uzs_uzsakovo_kontaktinis_asmuo' => array(
                'eil_nr' => 17,
                'active' => 0,
                'label' => 'Kontaktinis asmuo',
                'colspan' => '1',
                'stulpas' => 'uzs_uzsakovo_kontaktinis_asmuo'
            ),
            'uzs_saskaitos_tarp_savu' => array(
                'eil_nr' => 18,
                'active' => 0,
                'label' => 'Sąskaitos tarp savų',
                'colspan' => '1',
                'stulpas' => 'uzs_saskaitos_tarp_savu'
            ),
            'uzs_priskirta_imone' => array(
                'eil_nr' => 19,
                'active' => 0,
                'label' => 'Priskirta įmonė',
                'colspan' => '1',
                'stulpas' => 'uzs_priskirta_imone'
            ),
            'uzsakovo_krovinio_nr' => array(
                'eil_nr' => 20,
                'active' => 0,
                'label' => 'Pasikrovimo nr.',
                'colspan' => '1',
                'stulpas' => 'uzsakovo_krovinio_nr'
            ),
            'vnt' => array(
                'eil_nr' => 21,
                'active' => 0,
                'label' => 'Vnt.',
                'colspan' => '1',
                'stulpas' => 'vnt'
            ),
            'uzs_pelnas_lt_priemusios_imones' => array(
                'eil_nr' => 22,
                'active' => 0,
                'label' => 'Pardavėjo pelnas',
                'colspan' => '1',
                'stulpas' => 'uzs_pelnas_lt_priemusios_imones'
            ),
            'uzs_pelnas_lt_logistu' => array(
                'eil_nr' => 23,
                'active' => 0,
                'label' => 'Logisto pelnas',
                'colspan' => '1',
                'stulpas' => 'uzs_pelnas_lt_logistu'
            ),
            'uzsakymo_priekaba' => array(
                'eil_nr' => 24,
                'active' => 0,
                'label' => 'Užsakymo priekaba',
                'colspan' => '1',
                'stulpas' => 'uzsakymo_priekaba'
            ),
            'custom_stulpas_1' => array(
                'eil_nr' => 25,
                'active' => 0,
                'label' => 'Custom 1',
                'colspan' => '1',
                'stulpas' => 'custom_stulpas_1'
            ),
            'custom_stulpas_2' => array(
                'eil_nr' => 26,
                'active' => 0,
                'label' => 'Custom 2',
                'colspan' => '1',
                'stulpas' => 'custom_stulpas_2'
            ),
            'custom_stulpas_3' => array(
                'eil_nr' => 27,
                'active' => 0,
                'label' => 'Custom 3',
                'colspan' => '1',
                'stulpas' => 'custom_stulpas_3'
            ),
            'uzs_isstat_sask_apm_data' => array(
                'eil_nr' => 28,
                'active' => 0,
                'label' => 'Sąskaitos apmokėjimo data',
                'colspan' => '1',
                'stulpas' => 'uzs_isstat_sask_apm_data'
            ),
            'uzs_isstat_sask_apm_suma' => array(
                'eil_nr' => 29,
                'active' => 0,
                'label' => 'Sąskaitos apmokėjimo suma, valiuta',
                'colspan' => '1',
                'stulpas' => 'uzs_isstat_sask_apm_suma'
            )
        );
        $last_eil_nr=26;
        global $enable_konteineriu_skinus;
        if($enable_konteineriu_skinus){
            $parametrai[uzs_konteineriu_info]= array(
                'eil_nr' => $last_eil_nr+1,
                'active' => 0,
                'label' => 'Konteinerių informacija',
                'colspan' => '1',
                'stulpas' => 'uzs_konteineriu_info'
            );
        }
    }
    if($stulpo_vardas=="konteineriu_informacija"){
        $parametrai = array(
            'konteinerio_nr' => array(
                'eil_nr' => 0,
                'active' => 1,
                'text_before' => 'Kont. nr: ',
                'label' => 'Konteinerio nr.',
                'text_after' => ', ',
                'colspan' => '1',
                'stulpas' => 'konteinerio_nr'
            ),
            'konteinerio_linija' => array(
                'eil_nr' => 1,
                'active' => 1,
                'text_before' => 'Linija: ',
                'label' => 'Linija',
                'text_after' => ', ',
                'colspan' => '1',
                'funkcija' => 'get_tipai_sarasai_visi_by_id',
                'stulpas' => 'konteinerio_linija'
            ),
            'konteinerio_tipas_value' => array(
                'eil_nr' => 2,
                'active' => 1,
                'text_before' => 'Kont. tipas: ',
                'label' => 'Tipas',
                'text_after' => ', ',
                'colspan' => '1',
                'stulpas' => 'konteinerio_tipas_value'
            ),
            'konteinerio_kiekis' => array(
                'eil_nr' => 3,
                'active' => 1,
                'text_before' => 'Kiekis: ',
                'label' => 'Kiekis',
                'text_after' => ', ',
                'colspan' => '1',
                'stulpas' => 'konteinerio_kiekis'
            ));
    }
    if($stulpo_vardas == "uzsakymo_stulpu_grupe_2") {
        $parametrai = array(
            'uzs_zymeti_uzsak' => array(
                'eil_nr' => 0,
                'active' => 0,
                'label' => 'Žymėti užsakymus',
                'colspan' => '1',
                'stulpas' => 'uzs_zymeti_uzsak'
            ),
            'uzs_baigtas' => array(
                'eil_nr' => 1,
                'active' => 0,
                'label' => 'Baigtas',
                'colspan' => '1',
                'rowspan' => '2',
                'stulpas' => 'uzs_baigtas'
            ),
            'uzs_pavadinimas' => array(
                'eil_nr' => 2,
                'active' => 0,
                'label' => 'Užsak. Nr.',
                'colspan' => '1',
                'rowspan' => '2',
                'stulpas' => 'uzs_pavadinimas'
            ),
            'uzs_vadybininkas' => array(
                'eil_nr' => 3,
                'active' => 0,
                'label' => 'Vadyb.',
                'colspan' => '1',
                'rowspan' => '2',
                'stulpas' => 'uzs_vadybininkas'
            ),
            'uzs_uzsakovas' => array(
                'eil_nr' => 4,
                'active' => 0,
                'label' => 'Užsakovas',
                'colspan' => '1',
                'rowspan' => '2',
                'stulpas' => 'uzs_uzsakovas'
            ),
            'uzs_marsrutas' => array(
                'eil_nr' => 5,
                'active' => 0,
                'label' => 'Maršrutas',
                'colspan' => '4',
                'rowspan' => '2',
                'stulpas' => 'uzs_marsrutas'
            ),
            'uzs_krov_param' => array(
                'eil_nr' => 6,
                'active' => 0,
                'label' => 'EP,Ldm,Svoris',
                'colspan' => '1',
                'rowspan' => '2',
                'stulpas' => 'uzs_krov_param'
            ),
            'uzs_frachtas_suma' => array(
                'eil_nr' => 7,
                'active' => 0,
                'label' => 'Frachtas',
                'colspan' => '1',
                'rowspan' => '2',
                'stulpas' => 'uzs_frachtas_suma'
            ),
            'uzs_isstat_sask' => array(
                'eil_nr' => 8,
                'active' => 0,
                'label' => 'Sąskaitos',
                'colspan' => '1',
                'rowspan' => '2',
                'stulpas' => 'uzs_isstat_sask'
            ),
            'uzs_pelnas_td' => array(
                'eil_nr' => 9,
                'active' => 0,
                'label' => 'Pelnas EUR',
                'colspan' => '1',
                'rowspan' => '2',
                'stulpas' => 'uzs_pelnas_td'
            ),
            'uzs_reg_data' => array(
                'eil_nr' => 10,
                'active' => 1,
                'label' => 'Reg. data',
                'colspan' => '1',
                'rowspan' => '2',
                'stulpas' => 'uzs_reg_data'
            ),
            'uzs_uzsakovo_nr' => array(
                'eil_nr' => 11,
                'active' => 1,
                'label' => 'Užsakovo užs. nr.',
                'colspan' => '1',
                'rowspan' => '2',
                'stulpas' => 'uzs_uzsakovo_nr'
            ),
            'uzs_kasd_pastabos' => array(
                'eil_nr' => 12,
                'active' => 1,
                'label' => 'Kasdienės Pastabos',
                'colspan' => '1',
                'rowspan' => '2',
                'stulpas' => 'uzs_kasd_pastabos'
            ),
            'uzs_dokumentai' => array(
                'eil_nr' => 13,
                'active' => 1,
                'label' => 'Dokumentai',
                'colspan' => '1',
                'rowspan' => '2',
                'stulpas' => 'uzs_dokumentai'
            ),
            'uzs_vadyb_pastabos' => array(
                'eil_nr' => 14,
                'active' => 1,
                'label' => 'Vadybininkų pastabos',
                'colspan' => '1',
                'rowspan' => '2',
                'stulpas' => 'uzs_vadyb_pastabos'
            ),
            'uzs_krovinio_siuntejas_text' => array(
                'eil_nr' => 15,
                'active' => 0,
                'label' => 'Siuntėjas',
                'colspan' => '1',
                'stulpas' => 'uzs_krovinio_siuntejas_text'
            ),
            'uzs_krovinio_gavejas_text' => array(
                'eil_nr' => 16,
                'active' => 0,
                'label' => 'Gavėjas',
                'colspan' => '1',
                'stulpas' => 'uzs_krovinio_gavejas_text'
            ),
            'uzs_uzsakovo_kontaktinis_asmuo' => array(
                'eil_nr' => 17,
                'active' => 0,
                'label' => 'Kontaktinis asmuo',
                'colspan' => '1',
                'stulpas' => 'uzs_uzsakovo_kontaktinis_asmuo'
            ),
            'uzs_saskaitos_tarp_savu' => array(
                'eil_nr' => 18,
                'active' => 0,
                'label' => 'Sąskaitos tarp savų',
                'colspan' => '1',
                'stulpas' => 'uzs_saskaitos_tarp_savu'
            ),
            'uzs_priskirta_imone' => array(
                'eil_nr' => 19,
                'active' => 0,
                'label' => 'Priskirta įmonė',
                'colspan' => '1',
                'stulpas' => 'uzs_priskirta_imone'
            ),
            'custom_stulpas_1' => array(
                'eil_nr' => 20,
                'active' => 0,
                'label' => 'Custom 1',
                'colspan' => '1',
                'stulpas' => 'custom_stulpas_1'
            ),
            'custom_stulpas_2' => array(
                'eil_nr' => 21,
                'active' => 0,
                'label' => 'Custom 2',
                'colspan' => '1',
                'stulpas' => 'custom_stulpas_2'
            ),
            'custom_stulpas_3' => array(
                'eil_nr' => 22,
                'active' => 0,
                'label' => 'Custom 3',
                'colspan' => '1',
                'stulpas' => 'custom_stulpas_3'
            ),
            'uzs_kopijuoti_uzsak' => array(
                'eil_nr' => 23,
                'active' => 1,
                'label' => 'Kopijuoti užsakymus',
                'colspan' => '1',
                'stulpas' => 'uzs_kopijuoti_uzsak'
            ),
            'uzs_isstat_sask_apm_data' => array(
                'eil_nr' => 24,
                'active' => 0,
                'label' => 'Sąskaitos apmokėjimo data',
                'colspan' => '1',
                'stulpas' => 'uzs_isstat_sask_apm_data'
            ),
            'uzs_isstat_sask_apm_suma' => array(
                'eil_nr' => 25,
                'active' => 0,
                'label' => 'Sąskaitos apmokėjimo suma, valiuta',
                'colspan' => '1',
                'stulpas' => 'uzs_isstat_sask_apm_suma'
            )
        );
    }
    if($stulpo_vardas == "uzsakymo_vykdymo_grupe") {
        $parametrai = array(
            'show_reisu_failus' => array(
                'eil_nr' => 1,
                'active' => 0,
                'label' => 'Rodyti failus',
                'colspan' => '0',
                'stulpas' => 'show_reisu_failus'
            ),
            'uzdavinio_priekaba' => array(
                'eil_nr' => 2,
                'active' => 0,
                'colspan' => '1',
                'label' => 'Užd. priekaba',
                'stulpas' => 'uzdavinio_priekaba'
            ),
            'sask_gautos' => array(
                'eil_nr' => 3,
                'active' => 1,
                'colspan' => '1',
                'label' => 'Sąskaitos',
                'stulpas' => 'sask_gautos'
            ),
            'uzs_gautu_sask_apm_data' => array(
                'eil_nr' => 4,
                'active' => 0,
                'colspan' => '1',
                'label' => 'Sąskaitos apmokėjimo data',
                'stulpas' => 'uzs_gautu_sask_apm_data'
            ),
            'uzs_gautu_sask_apm_suma' => array(
                'eil_nr' => 5,
                'active' => 0,
                'colspan' => '1',
                'label' => 'Sąskaitos apmokėjimo suma, valiuta',
                'stulpas' => 'uzs_gautu_sask_apm_suma'
            )
        );
    }
    if($stulpo_vardas == "uzs_dokumentu_parametrai") {
        $parametrai = array(
            'show_uzsakymo_failus' => array(
                'eil_nr' => 1,
                'active' => 1,
                'label' => 'Rodyti failus',
                'stulpas' => 'show_uzsakymo_failus'
            ),
            'show_dokumento_aprasyma' => array(
                'eil_nr' => 2,
                'active' => 1,
                'label' => 'Rodyti dokumento aprašymą',
                'stulpas' => 'show_dokumento_aprasyma'
            ),
            'show_dokumento_aprasyma_su_failo_aprašymu' => array(
                'eil_nr' => 3,
                'active' => 1,
                'label' => 'Rodyti prikabinto failo informaciją prie dokumento aprašymo',
                'stulpas' => 'show_failo_aprašyma_prie_dokumento_aprasymo'
            ),
            'show_dokumento_tipa' => array(
                'eil_nr' => 4,
                'active' => 1,
                'label' => 'Rodyti dokumento tipą',
                'stulpas' => 'show_dokumento_tipa'
            ),
            'show_dokumento_tipa_su_failo_aprasymu' => array(
                'eil_nr' => 5,
                'active' => 1,
                'label' => 'Rodyti prikabinto failo informaciją prie dokumento tipo',
                'stulpas' => 'show_failo_aprasyma_prie_dokumento_tipo'
            )
        );
    }
    if($stulpo_vardas == "krovinio_marsrutas_is") {
        $parametrai = array(
            'pakr_salis' => array(
                'eil_nr' => 1,
                'active' => 1,
                'substring' => 0,
                'label' => 'Pasikrovimo šalis',
                'funkcija' => 'get_salis_sutr_by_id_is_masyvo',
                'stulpas' => 'pakr_salis'
            ),
            'pakr_miestas' => array(
                'eil_nr' => 2,
                'active' => 0,
                'substring' => 0,
                'label' => 'Pasikrovimo miestas',
                'stulpas' => 'pakr_miestas'
            ),
            'pakr_regionas' => array(
                'eil_nr' => 3,
                'active' => 1,
                'substring' => 0,
                'label' => 'Pasikrovimo regionas',
                'jei_nera_reiksmes_rodyk_x_stulpelio_reiksme' => 'pakr_miestas',
                'stulpas' => 'pakr_regionas'
            ),
            'pakr_adresas' => array(
                'eil_nr' => 4,
                'active' => 0,
                'substring' => 0,
                'label' => 'Pasikrovimo adresas',
                'stulpas' => 'pakr_adresas'
            ),
            'pakr_vietos_id' => array(
                'eil_nr' => 5,
                'active' => 0,
                'substring' => 0,
                'label' => 'Pasikrovimo vieta',
                'funkcija' => 'get_vieta_by_id',
                'stulpas' => 'pakr_vietos_id'
            ),
            'siuntejas_past' => array(
                'eil_nr' => 6,
                'active' => 0,
                'substring' => 0,
                'label' => 'Įmonė / Pastabos / Kontaktinis asmuo',
                'stulpas' => 'siuntejas_past'
            ),
            'krov_pakr_vieta_terminalas' => array(
                'eil_nr' => 7,
                'active' => 0,
                'substring' => 0,
                'label' => 'Pasikrovimo vieta - terminalas',
                'style' => 'background-color: #ffd280;font-weight: bold;',
                'stulpas' => 'krov_pakr_vieta_terminalas'
            )
        );
    }
//        if($stulpo_vardas == "krovinio_pakr_data") {
//            $parametrai = array(
//                    array(
//                        'eil_nr' => 1,
//                        'active' => 1,
//                        'substring' => 0,
//                        'label' => 'Faktinė pasikrovimo data',
//                        'funkcija' => 'pakeisk_datu_spalva',
//                        'stulpas' => 'pasikrovimo_data'
//                    ),
//                    array(
//                        'eil_nr' => 2,
//                        'active' => 0,
//                        'substring' => 0,
//                        'label' => 'Pageidaujama pasikrovimo data nuo-iki',
//                        'stulpas' => 'pakr_pageidaujamos_datos_nuo_iki'
//                    ),
//                    array(
//                        'eil_nr' => 4,
//                        'active' => 0,
//                        'substring' => 0,
//                        'label' => 'Laiko pastabos',
//                        'stulpas' => 'pakr_laiko_pastabos'
//                    )
//            );
//        }
    if($stulpo_vardas == "krovinio_marsrutas_i") {
        $parametrai = array(
            'iskr_salis' => array(
                'eil_nr' => 1,
                'active' => 1,
                'substring' => 0,
                'label' => 'Išsikrovimo šalis',
                'funkcija' => 'get_salis_sutr_by_id_is_masyvo',
                'stulpas' => 'iskr_salis'
            ),
            'iskr_miestas' => array(
                'eil_nr' => 2,
                'active' => 0,
                'substring' => 0,
                'label' => 'Išsikrovimo miestas',
                'stulpas' => 'iskr_miestas'
            ),
            'iskr_regionas' => array(
                'eil_nr' => 3,
                'active' => 1,
                'substring' => 0,
                'label' => 'Išsikrovimo regionas',
                'jei_nera_reiksmes_rodyk_x_stulpelio_reiksme' => 'iskr_miestas',
                'stulpas' => 'iskr_regionas'
            ),
            'iskr_adresas' => array(
                'eil_nr' => 4,
                'active' => 0,
                'substring' => 0,
                'label' => 'Išsikrovimo adresas',
                'stulpas' => 'iskr_adresas'
            ),
            'iskr_vietos_id' => array(
                'eil_nr' => 5,
                'active' => 0,
                'substring' => 0,
                'label' => 'Išsikrovimo vieta',
                'funkcija' => 'get_vieta_by_id',
                'stulpas' => 'iskr_vietos_id'
            ),
            'gavejas_past' => array(
                'eil_nr' => 6,
                'active' => 0,
                'substring' => 0,
                'label' => 'Įmonė / Pastabos / Kontaktinis asmuo',
                'stulpas' => 'gavejas_past'
            ),
            'krov_iskr_vieta_terminalas' => array(
                'eil_nr' => 7,
                'active' => 0,
                'substring' => 0,
                'label' => 'Išsikrovimo vieta - terminalas',
                'style' => 'background-color: #ffd280;font-weight: bold;',
                'stulpas' => 'krov_iskr_vieta_terminalas'
            ),
            'show_krov_cmr_failus' => array(
                'eil_nr' => 8,
                'active' => 0,
                'substring' => 0,
                'label' => 'Rodyti failus',
                'stulpas' => 'show_krov_cmr_failus'
            )
        );
    }
//        if($stulpo_vardas == "krovinio_iskr_data") {
//            $parametrai = array(
//                array(
//                    'eil_nr' => 1,
//                    'active' => 1,
//                    'substring' => 0,
//                    'label' => 'Faktinė pristatymo data',
//                    'funkcija' => 'pakeisk_datu_spalva',
//                    'stulpas' => 'pristatymo_data'
//                ),
//                array(
//                    'eil_nr' => 2,
//                    'active' => 0,
//                    'substring' => 0,
//                    'label' => 'Pageidaujama pristatymo data nuo-iki',
//                    'stulpas' => 'iskr_pageidaujamos_datos_nuo_iki'
//                ),
//                array(
//                    'eil_nr' => 3,
//                    'active' => 0,
//                    'substring' => 0,
//                    'label' => 'Laiko pastabos',
//                    'stulpas' => 'iskr_laiko_pastabos'
//                )
//            );
//        }
    if($stulpo_vardas == "istat_sask_parametrai") {
        $parametrai = array(
            'show_failus_istat_sask' => array(
                'eil_nr' => 1,
                'active' => 0,
                'substring' => 0,
                'label' => 'Rodyti failus',
                'stulpas' => 'show_failus_istat_sask'
            )
        );
    }
    if($stulpo_vardas == "krovinio_parametrai") {
        $parametrai = array(
            'paleciu_skaicius' => array(
                'eil_nr' => 1,
                'active' => 1,
                'substring' => 0,
                'label' => 'Euro paletės',
                'text_after' => 'EP,',
                'stulpas' => 'paleciu_skaicius'
            ),
            'svoris_t' => array(
                'eil_nr' => 2,
                'active' => 1,
                'substring' => 0,
                'label' => 'Svoris kg',
                'text_after' => 'kg,',
                'stulpas' => 'svoris_t'
            ),
            'ldm' => array(
                'eil_nr' => 3,
                'active' => 1,
                'substring' => 0,
                'label' => 'LDM',
                'text_after' => 'ldm,',
                'stulpas' => 'ldm'
            ),
            'vnt' => array(
                'eil_nr' => 4,
                'active' => 0,
                'substring' => 0,
                'label' => 'Vnt',
                'text_after' => 'vnt,',
                'stulpas' => 'vnt'
            ),
            'ilgis' => array(
                'eil_nr' => 5,
                'active' => 0,
                'substring' => 0,
                'label' => 'Ilgis',
                'stulpas' => 'ilgis'
            ),
            'aukstis' => array(
                'eil_nr' => 6,
                'active' => 0,
                'substring' => 0,
                'label' => 'Aukštis',
                'stulpas' => 'aukstis'
            ),
            'turis' => array(
                'eil_nr' => 7,
                'active' => 0,
                'substring' => 0,
                'label' => 'Tūris',
                'stulpas' => 'turis'
            ),
            'temperature' => array(
                'eil_nr' => 8,
                'active' => 0,
                'substring' => 0,
                'label' => 'Temperatūra',
                'stulpas' => 'temperature'
            ),
            'plotis' => array(
                'eil_nr' => 9,
                'active' => 0,
                'substring' => 0,
                'label' => 'Plotis',
                'stulpas' => 'plotis'
            ),
            'show_krov_term_failus' => array(
                'eil_nr' => 10,
                'active' => 0,
                'substring' => 0,
                'label' => 'Rodyti failus',
                'stulpas' => 'show_krov_term_failus'
            )

        );
    }
    if($stulpo_vardas == "log_grand_main_info") {
        $parametrai = array(
            'vardas_sutr_log_grandines' => array(
                'eil_nr' => 1,
                'active' => 0,
                'substring' => 0,
                'label' => 'Logistinės grandinės vadybininkas',
                'stulpas' => 'vardas_sutr_log_grandines'
            ),
            'vardas_sutr_reiso' => array(
                'eil_nr' => 2,
                'active' => 0,
                'substring' => 0,
                'label' => 'Reiso vadybininkas',
                'stulpas' => 'vardas_sutr_reiso'
            )
        );
    }
    if($stulpo_vardas == "papl_islaidos_html") {
        $parametrai = array(
            'papl_isl_raw_html' => array(
                'eil_nr' => 1,
                'active' => 1,
                'substring' => 0,
                'label' => 'Papildomos išlaidos',
                'stulpas' => 'papl_isl_raw_html'
            )
        );
    }
    if($stulpo_vardas == "log_grand_is") {
        $parametrai = array(
            'pakr_salis' => array(
                'eil_nr' => 1,
                'active' => 0,
                'substring' => 0,
                'label' => 'Pasikrovimo šalis',
                'funkcija' => 'get_salis_sutr_by_id_is_masyvo',
                'stulpas' => 'pakr_salis'
            ),
            'uzd_pakr_miestas' => array(
                'eil_nr' => 2,
                'active' => 0,
                'substring' => 0,
                'label' => 'Pasikrovimo miestas',
                'stulpas' => 'uzd_pakr_miestas'
            ),
            'uzd_pakr_regionas' => array(
                'eil_nr' => 3,
                'active' => 0,
                'substring' => 0,
                'label' => 'Pasikrovimo regionas',
                'stulpas' => 'uzd_pakr_regionas'
            ),
            'uzd_pakr_adresas' => array(
                'eil_nr' => 4,
                'active' => 0,
                'substring' => 0,
                'label' => 'Pasikrovimo adresas',
                'stulpas' => 'uzd_pakr_adresas'
            ),
            'uzd_pakr_vietos_id' => array(
                'eil_nr' => 5,
                'active' => 0,
                'substring' => 0,
                'label' => 'Pasikrovimo vieta',
                'funkcija' => 'get_vieta_by_id',
                'style' => 'background-color: #ffd280;font-weight: bold; text-decoration: underline;',
                'stulpas' => 'uzd_pakr_vietos_id'
            ),
            'pakr_vieta_terminalas' => array(
                'eil_nr' => 6,
                'active' => 0,
                'substring' => 0,
                'label' => 'Pasikrovimo vieta - terminalas',
                'style' => 'background-color: #ffd280;font-weight: bold;',
                'stulpas' => 'pakr_vieta_terminalas'
            )
        );
    }
    if($stulpo_vardas == "log_grand_i") {
        $parametrai = array(
            'iskr_salis' => array(
                'eil_nr' => 1,
                'active' => 0,
                'substring' => 0,
                'label' => 'Išsikrovimo šalis',
                'funkcija' => 'get_salis_sutr_by_id_is_masyvo',
                'stulpas' => 'iskr_salis'
            ),
            'uzd_iskr_miestas' => array(
                'eil_nr' => 2,
                'active' => 0,
                'substring' => 0,
                'label' => 'Išsikrovimo miestas',
                'stulpas' => 'uzd_iskr_miestas'
            ),
            'uzd_iskr_regionas' => array(
                'eil_nr' => 3,
                'active' => 0,
                'substring' => 0,
                'label' => 'Išsikrovimo regionas',
                'stulpas' => 'uzd_iskr_regionas'
            ),
            'uzd_iskr_adresas' => array(
                'eil_nr' => 4,
                'active' => 0,
                'substring' => 0,
                'label' => 'Išsikrovimo adresas',
                'stulpas' => 'uzd_iskr_adresas'
            ),
            'uzd_iskr_vietos_id' => array(
                'eil_nr' => 5,
                'active' => 0,
                'substring' => 0,
                'label' => 'Išsikrovimo vieta ',
                'funkcija' => 'get_vieta_by_id',
                'style' => 'background-color: #ffd280;font-weight: bold; text-decoration: underline;',
                'stulpas' => 'uzd_iskr_vietos_id'
            ),
            'iskr_vieta_terminalas' => array(
                'eil_nr' => 6,
                'active' => 0,
                'substring' => 0,
                'label' => 'Išsikrovimo vieta - terminalas',
                'style' => 'background-color: #ffd280;font-weight: bold;',
                'stulpas' => 'iskr_vieta_terminalas'
            )
        );
    }
    if($stulpo_vardas == "kontakt_asmuo_param") {
        $parametrai = array(
            'vardas' => array(
                'eil_nr' => 1,
                'active' => 1,
                'substring' => 0,
                'label' => 'Vardas',
                'stulpas' => 'vardas'
            ),
            'gimimo_diena' => array(
                'eil_nr' => 2,
                'active' => 0,
                'substring' => 0,
                'label' => 'Gimimo diena',
                'stulpas' => 'gimimo_diena'
            ),
            'pareigos' => array(
                'eil_nr' => 3,
                'active' => 0,
                'substring' => 0,
                'label' => 'Pareigos',
                'stulpas' => 'pareigos'
            ),
            'filialas' => array(
                'eil_nr' => 4,
                'active' => 0,
                'substring' => 0,
                'funkcija' => 'get_tipai_sarasai_visi_by_id',
                'label' => 'Filialas',
                'stulpas' => 'filialas'
            ),
            'telefonas' => array(
                'eil_nr' => 5,
                'active' => 0,
                'substring' => 0,
                'label' => 'Telefonas',
                //'style' => 'background-color: #ffd280;font-weight: bold; text-decoration: underline;',
                'stulpas' => 'telefonas'
            ),
            'mob_nr' => array(
                'eil_nr' => 6,
                'active' => 0,
                'substring' => 0,
                'label' => 'Mobilusis telefonas',
                //'style' => 'background-color: #ffd280;font-weight: bold;',
                'stulpas' => 'mob_nr'
            ),
            'faksas' => array(
                'eil_nr' => 7,
                'active' => 0,
                'substring' => 0,
                'label' => 'Faksas',
                //'style' => 'background-color: #ffd280;font-weight: bold; text-decoration: underline;',
                'stulpas' => 'faksas'
            ),
            'email' => array(
                'eil_nr' => 8,
                'active' => 0,
                'substring' => 0,
                'label' => 'E-mail',
                //'style' => 'background-color: #ffd280;font-weight: bold; text-decoration: underline;',
                'stulpas' => 'email'
            ),
            'pastabos' => array(
                'eil_nr' => 9,
                'active' => 0,
                'substring' => 0,
                'label' => 'Pastabos',
                //'style' => 'background-color: #ffd280;font-weight: bold; text-decoration: underline;',
                'stulpas' => 'pastabos'
            ),
            'trans_birza' => array(
                'eil_nr' => 10,
                'active' => 0,
                'substring' => 0,
                'label' => 'TransID',
                //'style' => 'background-color: #ffd280;font-weight: bold; text-decoration: underline;',
                'stulpas' => 'trans_birza'
            ),
            'skype' => array(
                'eil_nr' => 11,
                'active' => 0,
                'substring' => 0,
                'label' => 'Skype',
                //'style' => 'background-color: #ffd280;font-weight: bold; text-decoration: underline;',
                'stulpas' => 'skype'
            ),
            'whatsapp' => array(
                'eil_nr' => 12,
                'active' => 0,
                'substring' => 0,
                'label' => 'WhatsApp',
                //'style' => 'background-color: #ffd280;font-weight: bold; text-decoration: underline;',
                'stulpas' => 'whatsapp'
            ),
            'viber' => array(
                'eil_nr' => 13,
                'active' => 0,
                'substring' => 0,
                'label' => 'Viber',
                //'style' => 'background-color: #ffd280;font-weight: bold; text-decoration: underline;',
                'stulpas' => 'viber'
            )
        );
    }
    return $parametrai;
}
function atask_pasidaryk_pats_organizer_uzs_log_grandines($stulpo_vardas){
    if($stulpo_vardas == "organizer_marsruto_info_grupe") {
        $parametrai = array(
            'eil_nr' => array(
                'eil_nr' => 1,
                'active' => 1,
                'label' => 'Eil. nr',
                'colspan' => '1',
                'stulpas' => 'eil_nr'
            ),
            'radio_route' => array(
                'eil_nr' => 2,
                'active' => 1,
                'label' => 'Route radio',
                'colspan' => '1',
                'stulpas' => 'radio_route'
            ),
            'marsrutas' => array(
                'eil_nr' => 3,
                'active' => 1,
                'label' => 'Maršrutas.',
                'colspan' => '1',
                'stulpas' => 'marsrutas'
            ),
            'statusas' => array(
                'eil_nr' => 4,
                'active' => 1,
                'label' => 'Statusas',
                'colspan' => '1',
                'stulpas' => 'statusas'
            ),
            'sum_krov' => array(
                'eil_nr' => 5,
                'active' => 1,
                'label' => 'Sum krov.',
                'colspan' => '1',
                'stulpas' => 'sum_krov'
            ),
            'sum_preliminari_suma' => array(
                'eil_nr' => 6,
                'active' => 0,
                'label' => 'Sum preliminari suma EUR',
                'colspan' => '1',
                'stulpas' => 'sum_preliminari_suma'
            ),
            'route_pastabos' => array(
                'eil_nr' => 7,
                'active' => 0,
                'label' => 'Pastabos',
                'colspan' => '1',
                'stulpas' => 'route_pastabos'
            ),
            'custom_stulpas_1' => array(
                'eil_nr' => 8,
                'active' => 0,
                'label' => 'Custom 1',
                'colspan' => '1',
                'stulpas' => 'custom_stulpas_1'
            ),
            'custom_stulpas_2' => array(
                'eil_nr' => 9,
                'active' => 0,
                'label' => 'Custom 2',
                'colspan' => '1',
                'stulpas' => 'custom_stulpas_2'
            ),
            'custom_stulpas_3' => array(
                'eil_nr' => 10,
                'active' => 0,
                'label' => 'Custom 3',
                'colspan' => '1',
                'stulpas' => 'custom_stulpas_3'
            )
        );
    }
    if($stulpo_vardas == "organizer_uzsakymo_info_grupe") {
        $parametrai = array(
            'priskirti_log_grand_marsrutui' => array(
                'eil_nr' => 1,
                'active' => 1,
                'label' => 'Priskirti log. grand. maršrutui',
                'colspan' => '1',
                'stulpas' => 'priskirti_log_grand_marsrutui'
            ),
            'uzsakymas' => array(
                'eil_nr' => 2,
                'active' => 1,
                'label' => 'Užsakymas',
                'colspan' => '1',
                'stulpas' => 'uzsakymas'
            ),
            'uzsakovas' => array(
                'eil_nr' => 3,
                'active' => 1,
                'label' => 'Užsakovas',
                'colspan' => '1',
                'stulpas' => 'uzsakovas'
            ),
            'vadybininkas' => array(
                'eil_nr' => 4,
                'active' => 1,
                'label' => 'Vadybininkas',
                'colspan' => '1',
                'stulpas' => 'vadybininkas'
            ),
            'custom_stulpas_1' => array(
                'eil_nr' => 5,
                'active' => 0,
                'label' => 'Custom 1',
                'colspan' => '1',
                'stulpas' => 'custom_stulpas_1'
            ),
            'custom_stulpas_2' => array(
                'eil_nr' => 6,
                'active' => 0,
                'label' => 'Custom 2',
                'colspan' => '1',
                'stulpas' => 'custom_stulpas_2'
            ),
            'custom_stulpas_3' => array(
                'eil_nr' => 7,
                'active' => 0,
                'label' => 'Custom 3',
                'colspan' => '1',
                'stulpas' => 'custom_stulpas_3'
            )
        );
    }
    if($stulpo_vardas == "organizer_reiso_uzsakymo_info_grupe") {
        $parametrai = array(
            'uzsakymas' => array(
                'eil_nr' => 1,
                'active' => 1,
                'label' => 'Užsakymas',
                'colspan' => '1',
                'stulpas' => 'uzsakymas'
            ),
            'uzsakovas' => array(
                'eil_nr' => 2,
                'active' => 1,
                'label' => 'Užsakovas',
                'colspan' => '1',
                'stulpas' => 'uzsakovas'
            ),
            'vadybininkas' => array(
                'eil_nr' => 3,
                'active' => 1,
                'label' => 'Vadybininkas',
                'colspan' => '1',
                'stulpas' => 'vadybininkas'
            ),
            'custom_stulpas_1' => array(
                'eil_nr' => 4,
                'active' => 0,
                'label' => 'Custom 1',
                'colspan' => '1',
                'stulpas' => 'custom_stulpas_1'
            ),
            'custom_stulpas_2' => array(
                'eil_nr' => 5,
                'active' => 0,
                'label' => 'Custom 2',
                'colspan' => '1',
                'stulpas' => 'custom_stulpas_2'
            ),
            'custom_stulpas_3' => array(
                'eil_nr' => 6,
                'active' => 0,
                'label' => 'Custom 3',
                'colspan' => '1',
                'stulpas' => 'custom_stulpas_3'
            )
        );
    }
    if($stulpo_vardas == "organizer_log_grand_info_grupe") {
        $parametrai = array(
            'frachto_dalis' => array(
                'eil_nr' => 1,
                'active' => 1,
                'label' => 'Frachtas',
                'colspan' => '1',
                'stulpas' => 'frachto_dalis'
            ),
            'kas_vykdo' => array(
                'eil_nr' => 2,
                'active' => 1,
                'label' => 'Kas vykdo',
                'colspan' => '1',
                'stulpas' => 'kas_vykdo'
            ),
            'preliminari_suma' => array(
                'eil_nr' => 3,
                'active' => 0,
                'label' => 'Preliminari suma',
                'colspan' => '1',
                'stulpas' => 'preliminari_suma'
            ),
            'uzd_vadybininkas' => array(
                'eil_nr' => 4,
                'active' => 1,
                'label' => 'Vadybininkas',
                'colspan' => '1',
                'stulpas' => 'uzd_vadybininkas'
            ),
            'pakr_data' => array(
                'eil_nr' => 5,
                'active' => 1,
                'label' => 'Pakr. data',
                'colspan' => '1',
                'stulpas' => 'pakr_data'
            ),
            'pakr_vieta' => array(
                'eil_nr' => 6,
                'active' => 1,
                'label' => 'Pakr. vieta',
                'colspan' => '1',
                'stulpas' => 'pakr_vieta'
            ),
            'iskr_data' => array(
                'eil_nr' => 7,
                'active' => 1,
                'label' => 'Iškr. data',
                'colspan' => '1',
                'stulpas' => 'iskr_data'
            ),
            'iskr_vieta' => array(
                'eil_nr' => 8,
                'active' => 1,
                'label' => 'Iškr. vieta',
                'colspan' => '1',
                'stulpas' => 'iskr_vieta'
            ),
            'uzd_pastabos' => array(
                'eil_nr' => 9,
                'active' => 0,
                'label' => 'Užd. pastabos',
                'colspan' => '1',
                'stulpas' => 'uzd_pastabos'
            ),
            'uzd_statusas' => array(
                'eil_nr' => 10,
                'active' => 0,
                'label' => 'Užd. statusas',
                'colspan' => '1',
                'stulpas' => 'uzd_statusas'
            ),
            'custom_stulpas_1' => array(
                'eil_nr' => 11,
                'active' => 0,
                'label' => 'Custom 1',
                'colspan' => '1',
                'stulpas' => 'custom_stulpas_1'
            ),
            'custom_stulpas_2' => array(
                'eil_nr' => 12,
                'active' => 0,
                'label' => 'Custom 2',
                'colspan' => '1',
                'stulpas' => 'custom_stulpas_2'
            ),
            'custom_stulpas_3' => array(
                'eil_nr' => 13,
                'active' => 0,
                'label' => 'Custom 3',
                'colspan' => '1',
                'stulpas' => 'custom_stulpas_3'
            )
        );
    }
    if($stulpo_vardas == "organizer_reiso_log_grand_info_grupe") {
        $parametrai = array(
            'frachto_dalis' => array(
                'eil_nr' => 1,
                'active' => 1,
                'label' => 'Frachtas',
                'colspan' => '1',
                'stulpas' => 'frachto_dalis'
            ),
            'kas_vykdo' => array(
                'eil_nr' => 2,
                'active' => 1,
                'label' => 'Kas vykdo',
                'colspan' => '1',
                'stulpas' => 'kas_vykdo'
            ),
            'preliminari_suma' => array(
                'eil_nr' => 3,
                'active' => 0,
                'label' => 'Preliminari suma',
                'colspan' => '1',
                'stulpas' => 'preliminari_suma'
            ),
            'uzd_vadybininkas' => array(
                'eil_nr' => 4,
                'active' => 1,
                'label' => 'Vadybininkas',
                'colspan' => '1',
                'stulpas' => 'uzd_vadybininkas'
            ),
            'pakr_data' => array(
                'eil_nr' => 5,
                'active' => 1,
                'label' => 'Pakr. data',
                'colspan' => '1',
                'stulpas' => 'pakr_data'
            ),
            'pakr_vieta' => array(
                'eil_nr' => 6,
                'active' => 1,
                'label' => 'Pakr. vieta',
                'colspan' => '1',
                'stulpas' => 'pakr_vieta'
            ),
            'iskr_data' => array(
                'eil_nr' => 7,
                'active' => 1,
                'label' => 'Iškr. data',
                'colspan' => '1',
                'stulpas' => 'iskr_data'
            ),
            'iskr_vieta' => array(
                'eil_nr' => 8,
                'active' => 1,
                'label' => 'Iškr. vieta',
                'colspan' => '1',
                'stulpas' => 'iskr_vieta'
            ),
            'uzd_pastabos' => array(
                'eil_nr' => 9,
                'active' => 0,
                'label' => 'Užd. pastabos',
                'colspan' => '1',
                'stulpas' => 'uzd_pastabos'
            ),
            'uzd_statusas' => array(
                'eil_nr' => 10,
                'active' => 0,
                'label' => 'Užd. statusas',
                'colspan' => '1',
                'stulpas' => 'uzd_statusas'
            ),
            'custom_stulpas_1' => array(
                'eil_nr' => 11,
                'active' => 0,
                'label' => 'Custom 1',
                'colspan' => '1',
                'stulpas' => 'custom_stulpas_1'
            ),
            'custom_stulpas_2' => array(
                'eil_nr' => 12,
                'active' => 0,
                'label' => 'Custom 2',
                'colspan' => '1',
                'stulpas' => 'custom_stulpas_2'
            ),
            'custom_stulpas_3' => array(
                'eil_nr' => 13,
                'active' => 0,
                'label' => 'Custom 3',
                'colspan' => '1',
                'stulpas' => 'custom_stulpas_3'
            ),
            'uzd_route' => array(
                'eil_nr' => 14,
                'active' => 1,
                'label' => 'Maršrutas',
                'colspan' => '1',
                'stulpas' => 'uzd_route'
            ),
            'uzd_route_pastabos' => array(
                'eil_nr' => 15,
                'active' => 1,
                'label' => 'Maršruto pastabos',
                'colspan' => '1',
                'stulpas' => 'uzd_route_pastabos'
            )
        );
    }
    if($stulpo_vardas == "organizer_log_grand_kroviniai_info_grupe") {
        $parametrai = array(
            'krovinio_info' => array(
                'eil_nr' => 1,
                'active' => 1,
                'label' => 'Krovinio info',
                'colspan' => '1',
                'stulpas' => 'krovinio_info'
            ),
            'krovinio_pav' => array(
                'eil_nr' => 2,
                'active' => 1,
                'label' => 'Krovinio pavadinimas',
                'colspan' => '1',
                'stulpas' => 'krovinio_pav'
            ),
            'krovinio_spec_salygos' => array(
                'eil_nr' => 3,
                'active' => 1,
                'label' => 'Spec. gabenimo salygos',
                'colspan' => '1',
                'stulpas' => 'krovinio_spec_salygos'
            ),
            'krovinio_pakr_data' => array(
                'eil_nr' => 4,
                'active' => 1,
                'label' => 'Pakrovimo data',
                'colspan' => '1',
                'stulpas' => 'krovinio_pakr_data'
            ),
            'krovinio_pakr_vieta' => array(
                'eil_nr' => 5,
                'active' => 1,
                'label' => 'Pakrovimo vieta',
                'colspan' => '1',
                'stulpas' => 'krovinio_pakr_vieta'
            ),
            'krovinio_ismuitinimo_vieta' => array(
                'eil_nr' => 6,
                'active' => 1,
                'label' => 'Išmuitinimo vieta',
                'colspan' => '1',
                'stulpas' => 'krovinio_ismuitinimo_vieta'
            ),
            'krovinio_iskr_vieta' => array(
                'eil_nr' => 7,
                'active' => 1,
                'label' => 'Iškrovimo vieta',
                'colspan' => '1',
                'stulpas' => 'krovinio_iskr_vieta'
            ),
            'krovinio_iskr_data' => array(
                'eil_nr' => 8,
                'active' => 1,
                'label' => 'Iškrovimo data',
                'colspan' => '1',
                'stulpas' => 'krovinio_iskr_data'
            ),
            'krovinio_temperatura' => array(
                'eil_nr' => 9,
                'active' => 1,
                'label' => 'Temperatūra',
                'colspan' => '1',
                'stulpas' => 'krovinio_temperatura'
            ),
            'krovinio_cmr' => array(
                'eil_nr' => 10,
                'active' => 1,
                'label' => 'CMR',
                'colspan' => '1',
                'stulpas' => 'krovinio_cmr'
            ),
            'krovinio_uzs_terminalui' => array(
                'eil_nr' => 11,
                'active' => 1,
                'label' => 'Užd. term.',
                'colspan' => '1',
                'stulpas' => 'krovinio_uzs_terminalui'
            ),
            'custom_stulpas_1' => array(
                'eil_nr' => 12,
                'active' => 0,
                'label' => 'Custom 1',
                'colspan' => '1',
                'stulpas' => 'custom_stulpas_1'
            ),
            'custom_stulpas_2' => array(
                'eil_nr' => 13,
                'active' => 0,
                'label' => 'Custom 2',
                'colspan' => '1',
                'stulpas' => 'custom_stulpas_2'
            ),
            'custom_stulpas_3' => array(
                'eil_nr' => 14,
                'active' => 0,
                'label' => 'Custom 3',
                'colspan' => '1',
                'stulpas' => 'custom_stulpas_3'
            ),
            'krovinio_siuntejas_text' => array(
                'eil_nr' => 15,
                'active' => 0,
                'label' => 'Siuntėjas',
                'colspan' => '1',
                'stulpas' => 'krovinio_siuntejas_text'
            ),
            'krovinio_gavejas_text' => array(
                'eil_nr' => 16,
                'active' => 0,
                'label' => 'Gavėjas',
                'colspan' => '1',
                'stulpas' => 'krovinio_gavejas_text'
            ),
            'krovinio_statusas' => array(
                'eil_nr' => 17,
                'active' => 0,
                'label' => 'Krovinio statusas',
                'colspan' => '1',
                'stulpas' => 'krovinio_statusas'
            )
        );
    }
    if($stulpo_vardas == "organizer_log_grand_reiso_kroviniai_info_grupe") {
        $parametrai = array(
            'krovinio_info' => array(
                'eil_nr' => 1,
                'active' => 1,
                'label' => 'Krovinio info',
                'colspan' => '1',
                'stulpas' => 'krovinio_info'
            ),
            'krovinio_pav' => array(
                'eil_nr' => 2,
                'active' => 1,
                'label' => 'Krovinio pavadinimas',
                'colspan' => '1',
                'stulpas' => 'krovinio_pav'
            ),
            'krovinio_spec_salygos' => array(
                'eil_nr' => 3,
                'active' => 1,
                'label' => 'Spec. gabenimo salygos',
                'colspan' => '1',
                'stulpas' => 'krovinio_spec_salygos'
            ),
            'krovinio_pakr_data' => array(
                'eil_nr' => 4,
                'active' => 1,
                'label' => 'Pakrovimo data',
                'colspan' => '1',
                'stulpas' => 'krovinio_pakr_data'
            ),
            'krovinio_pakr_vieta' => array(
                'eil_nr' => 5,
                'active' => 1,
                'label' => 'Pakrovimo vieta',
                'colspan' => '1',
                'stulpas' => 'krovinio_pakr_vieta'
            ),
            'krovinio_ismuitinimo_vieta' => array(
                'eil_nr' => 6,
                'active' => 1,
                'label' => 'Išmuitinimo vieta',
                'colspan' => '1',
                'stulpas' => 'krovinio_ismuitinimo_vieta'
            ),
            'krovinio_iskr_vieta' => array(
                'eil_nr' => 7,
                'active' => 1,
                'label' => 'Iškrovimo vieta',
                'colspan' => '1',
                'stulpas' => 'krovinio_iskr_vieta'
            ),
            'krovinio_iskr_data' => array(
                'eil_nr' => 8,
                'active' => 1,
                'label' => 'Iškrovimo data',
                'colspan' => '1',
                'stulpas' => 'krovinio_iskr_data'
            ),
            'krovinio_temperatura' => array(
                'eil_nr' => 9,
                'active' => 1,
                'label' => 'Temperatūra',
                'colspan' => '1',
                'stulpas' => 'krovinio_temperatura'
            ),
            'krovinio_cmr' => array(
                'eil_nr' => 10,
                'active' => 1,
                'label' => 'CMR',
                'colspan' => '1',
                'stulpas' => 'krovinio_cmr'
            ),
            'krovinio_uzs_terminalui' => array(
                'eil_nr' => 11,
                'active' => 1,
                'label' => 'Užd. term.',
                'colspan' => '1',
                'stulpas' => 'krovinio_uzs_terminalui'
            ),
            'custom_stulpas_1' => array(
                'eil_nr' => 12,
                'active' => 0,
                'label' => 'Custom 1',
                'colspan' => '1',
                'stulpas' => 'custom_stulpas_1'
            ),
            'custom_stulpas_2' => array(
                'eil_nr' => 13,
                'active' => 0,
                'label' => 'Custom 2',
                'colspan' => '1',
                'stulpas' => 'custom_stulpas_2'
            ),
            'custom_stulpas_3' => array(
                'eil_nr' => 14,
                'active' => 0,
                'label' => 'Custom 3',
                'colspan' => '1',
                'stulpas' => 'custom_stulpas_3'
            ),
            'krovinio_siuntejas_text' => array(
                'eil_nr' => 15,
                'active' => 0,
                'label' => 'Siuntėjas',
                'colspan' => '1',
                'stulpas' => 'krovinio_siuntejas_text'
            ),
            'krovinio_gavejas_text' => array(
                'eil_nr' => 16,
                'active' => 0,
                'label' => 'Gavėjas',
                'colspan' => '1',
                'stulpas' => 'krovinio_gavejas_text'
            )
        );
    }
    if($stulpo_vardas == "uzdavinio_marsrutas_is") {
        $parametrai = array(
            'pakr_salis' => array(
                'eil_nr' => 1,
                'active' => 1,
                'substring' => 0,
                'label' => 'Pasikrovimo šalis',
                'funkcija' => 'get_salis_sutr_by_id_is_masyvo',
                'rodyk_tik_tuomet_jei_nera_x_stulpelio' => 'pakr_vieta_terminalas',
                'stulpas' => 'pakr_salis'
            ),
            'pakr_miestas' => array(
                'eil_nr' => 2,
                'active' => 1,
                'substring' => 0,
                'label' => 'Pasikrovimo miestas',
                'rodyk_tik_tuomet_jei_nera_x_stulpelio' => 'pakr_vieta_terminalas',
                'stulpas' => 'pakr_miestas'
            ),
            'pakr_regionas' => array(
                'eil_nr' => 3,
                'active' => 0,
                'substring' => 0,
                'label' => 'Pasikrovimo regionas',
                'stulpas' => 'pakr_regionas'
            ),
            'pakr_adresas' => array(
                'eil_nr' => 4,
                'active' => 0,
                'substring' => 0,
                'label' => 'Pasikrovimo adresas',
                'stulpas' => 'pakr_adresas'
            ),
            'pakr_vietos_id' => array(
                'eil_nr' => 5,
                'active' => 1,
                'substring' => 0,
                'label' => 'Pasikrovimo vieta',
                'funkcija' => 'get_vieta_by_id',
                'rodyk_tik_tuomet_jei_yra_x_stulpelis' => 'pakr_vieta_terminalas',
                'style' => 'background-color: #ffd280;font-weight: bold; text-decoration: underline;',
                'stulpas' => 'pakr_vietos_id'
            ),
            'pakr_vieta_terminalas' => array(
                'eil_nr' => 6,
                'active' => 1,
                'substring' => 0,
                'label' => 'Pasikrovimo vieta - terminalas',
                'style' => 'background-color: #ffd280;font-weight: bold;',
                'stulpas' => 'pakr_vieta_terminalas'
            )
        );
    }
    if($stulpo_vardas == "reiso_uzdavinio_marsrutas_is") {
        $parametrai = array(
            'pakr_salis' => array(
                'eil_nr' => 1,
                'active' => 1,
                'substring' => 0,
                'label' => 'Pasikrovimo šalis',
                'funkcija' => 'get_salis_sutr_by_id_is_masyvo',
                'rodyk_tik_tuomet_jei_nera_x_stulpelio' => 'pakr_vieta_terminalas',
                'stulpas' => 'pakr_salis'
            ),
            'pakr_miestas' => array(
                'eil_nr' => 2,
                'active' => 1,
                'substring' => 0,
                'label' => 'Pasikrovimo miestas',
                'rodyk_tik_tuomet_jei_nera_x_stulpelio' => 'pakr_vieta_terminalas',
                'stulpas' => 'pakr_miestas'
            ),
            'pakr_regionas' => array(
                'eil_nr' => 3,
                'active' => 0,
                'substring' => 0,
                'label' => 'Pasikrovimo regionas',
                'stulpas' => 'pakr_regionas'
            ),
            'pakr_adresas' => array(
                'eil_nr' => 4,
                'active' => 0,
                'substring' => 0,
                'label' => 'Pasikrovimo adresas',
                'stulpas' => 'pakr_adresas'
            ),
            'pakr_vietos_id' => array(
                'eil_nr' => 5,
                'active' => 1,
                'substring' => 0,
                'label' => 'Pasikrovimo vieta',
                'funkcija' => 'get_vieta_by_id',
                'rodyk_tik_tuomet_jei_yra_x_stulpelis' => 'pakr_vieta_terminalas',
                'style' => 'background-color: #ffd280;font-weight: bold; text-decoration: underline;',
                'stulpas' => 'pakr_vietos_id'
            ),
            'pakr_vieta_terminalas' => array(
                'eil_nr' => 6,
                'active' => 1,
                'substring' => 0,
                'label' => 'Pasikrovimo vieta - terminalas',
                'style' => 'background-color: #ffd280;font-weight: bold;',
                'stulpas' => 'pakr_vieta_terminalas'
            )
        );
    }
    if($stulpo_vardas == "reiso_uzdavinio_grand_kroviniai_marsrutas_is") {
        $parametrai = array(
            'pakr_salis' => array(
                'eil_nr' => 1,
                'active' => 1,
                'substring' => 0,
                'label' => 'Pasikrovimo šalis',
                'funkcija' => 'get_salis_sutr_by_id_is_masyvo',
                'rodyk_tik_tuomet_jei_nera_x_stulpelio' => 'uzd_pakr_vieta_terminalas',
                'stulpas' => 'pakr_salis'
            ),
            'pakr_miestas' => array(
                'eil_nr' => 2,
                'active' => 1,
                'substring' => 0,
                'label' => 'Pasikrovimo miestas',
                'rodyk_tik_tuomet_jei_nera_x_stulpelio' => 'uzd_pakr_vieta_terminalas',
                'stulpas' => 'pakr_miestas'
            ),
            'pakr_regionas' => array(
                'eil_nr' => 3,
                'active' => 0,
                'substring' => 0,
                'label' => 'Pasikrovimo regionas',
                'stulpas' => 'pakr_regionas'
            ),
            'pakr_adresas' => array(
                'eil_nr' => 4,
                'active' => 0,
                'substring' => 0,
                'label' => 'Pasikrovimo adresas',
                'stulpas' => 'pakr_adresas'
            ),
            'pakr_vietos_id' => array(
                'eil_nr' => 5,
                'active' => 1,
                'substring' => 0,
                'label' => 'Pasikrovimo vieta',
                'funkcija' => 'get_vieta_by_id',
                'rodyk_tik_tuomet_jei_yra_x_stulpelis' => 'uzd_pakr_vieta_terminalas',
                'style' => 'background-color: #ffd280;font-weight: bold; text-decoration: underline;',
                'stulpas' => 'pakr_vietos_id'
            ),
            'uzd_pakr_vieta_terminalas' => array(
                'eil_nr' => 6,
                'active' => 1,
                'substring' => 0,
                'label' => 'Pasikrovimo vieta - terminalas',
                'style' => 'background-color: #ffd280;font-weight: bold;',
                'stulpas' => 'uzd_pakr_vieta_terminalas'
            )
        );
    }
    if($stulpo_vardas == "uzdavinio_marsrutas_i") {
        $parametrai = array(
            'iskr_salis' => array(
                'eil_nr' => 1,
                'active' => 1,
                'substring' => 0,
                'label' => 'Išsikrovimo šalis',
                'funkcija' => 'get_salis_sutr_by_id_is_masyvo',
                'rodyk_tik_tuomet_jei_nera_x_stulpelio' => 'iskr_vieta_terminalas',
                'stulpas' => 'iskr_salis'
            ),
            'iskr_miestas' => array(
                'eil_nr' => 2,
                'active' => 1,
                'substring' => 0,
                'label' => 'Išsikrovimo miestas',
                'rodyk_tik_tuomet_jei_nera_x_stulpelio' => 'iskr_vieta_terminalas',
                'stulpas' => 'iskr_miestas'
            ),
            'iskr_regionas' => array(
                'eil_nr' => 3,
                'active' => 0,
                'substring' => 0,
                'label' => 'Išsikrovimo regionas',
                'stulpas' => 'iskr_regionas'
            ),
            'iskr_adresas' => array(
                'eil_nr' => 4,
                'active' => 0,
                'substring' => 0,
                'label' => 'Išsikrovimo adresas',
                'stulpas' => 'iskr_adresas'
            ),
            'iskr_vietos_id' => array(
                'eil_nr' => 5,
                'active' => 1,
                'substring' => 0,
                'label' => 'Išsikrovimo vieta ',
                'funkcija' => 'get_vieta_by_id',
                'rodyk_tik_tuomet_jei_yra_x_stulpelis' => 'iskr_vieta_terminalas',
                'style' => 'background-color: #ffd280;font-weight: bold; text-decoration: underline;',
                'stulpas' => 'iskr_vietos_id'
            ),
            'iskr_vieta_terminalas' => array(
                'eil_nr' => 6,
                'active' => 1,
                'substring' => 0,
                'label' => 'Išsikrovimo vieta - terminalas',
                'style' => 'background-color: #ffd280;font-weight: bold;',
                'stulpas' => 'iskr_vieta_terminalas'
            )
        );
    }
    if($stulpo_vardas == "reiso_uzdavinio_grand_kroviniai_marsrutas_i") {
        $parametrai = array(
            'iskr_salis' => array(
                'eil_nr' => 1,
                'active' => 1,
                'substring' => 0,
                'label' => 'Išsikrovimo šalis',
                'funkcija' => 'get_salis_sutr_by_id_is_masyvo',
                'rodyk_tik_tuomet_jei_nera_x_stulpelio' => 'uzd_iskr_vieta_terminalas',
                'stulpas' => 'iskr_salis'
            ),
            'iskr_miestas' => array(
                'eil_nr' => 2,
                'active' => 1,
                'substring' => 0,
                'label' => 'Išsikrovimo miestas',
                'rodyk_tik_tuomet_jei_nera_x_stulpelio' => 'uzd_iskr_vieta_terminalas',
                'stulpas' => 'iskr_miestas'
            ),
            'iskr_regionas' => array(
                'eil_nr' => 3,
                'active' => 0,
                'substring' => 0,
                'label' => 'Išsikrovimo regionas',
                'stulpas' => 'iskr_regionas'
            ),
            'iskr_adresas' => array(
                'eil_nr' => 4,
                'active' => 0,
                'substring' => 0,
                'label' => 'Išsikrovimo adresas',
                'stulpas' => 'iskr_adresas'
            ),
            'iskr_vietos_id' => array(
                'eil_nr' => 5,
                'active' => 1,
                'substring' => 0,
                'label' => 'Išsikrovimo vieta ',
                'funkcija' => 'get_vieta_by_id',
                'rodyk_tik_tuomet_jei_yra_x_stulpelis' => 'uzd_iskr_vieta_terminalas',
                'style' => 'background-color: #ffd280;font-weight: bold; text-decoration: underline;',
                'stulpas' => 'iskr_vietos_id'
            ),
            'uzd_iskr_vieta_terminalas' => array(
                'eil_nr' => 6,
                'active' => 1,
                'substring' => 0,
                'label' => 'Išsikrovimo vieta - terminalas',
                'style' => 'background-color: #ffd280;font-weight: bold;',
                'stulpas' => 'uzd_iskr_vieta_terminalas'
            )
        );
    }
    if($stulpo_vardas == "reiso_uzdavinio_marsrutas_i") {
        $parametrai = array(
            'iskr_salis' => array(
                'eil_nr' => 1,
                'active' => 1,
                'substring' => 0,
                'label' => 'Išsikrovimo šalis',
                'funkcija' => 'get_salis_sutr_by_id_is_masyvo',
                'rodyk_tik_tuomet_jei_nera_x_stulpelio' => 'iskr_vieta_terminalas',
                'stulpas' => 'iskr_salis'
            ),
            'iskr_miestas' => array(
                'eil_nr' => 2,
                'active' => 1,
                'substring' => 0,
                'label' => 'Išsikrovimo miestas',
                'rodyk_tik_tuomet_jei_nera_x_stulpelio' => 'iskr_vieta_terminalas',
                'stulpas' => 'iskr_miestas'
            ),
            'iskr_regionas' => array(
                'eil_nr' => 3,
                'active' => 0,
                'substring' => 0,
                'label' => 'Išsikrovimo regionas',
                'stulpas' => 'iskr_regionas'
            ),
            'iskr_adresas' => array(
                'eil_nr' => 4,
                'active' => 0,
                'substring' => 0,
                'label' => 'Išsikrovimo adresas',
                'stulpas' => 'iskr_adresas'
            ),
            'iskr_vietos_id' => array(
                'eil_nr' => 5,
                'active' => 1,
                'substring' => 0,
                'label' => 'Išsikrovimo vieta ',
                'funkcija' => 'get_vieta_by_id',
                'rodyk_tik_tuomet_jei_yra_x_stulpelis' => 'iskr_vieta_terminalas',
                'style' => 'background-color: #ffd280;font-weight: bold; text-decoration: underline;',
                'stulpas' => 'iskr_vietos_id'
            ),
            'iskr_vieta_terminalas' => array(
                'eil_nr' => 6,
                'active' => 1,
                'substring' => 0,
                'label' => 'Išsikrovimo vieta - terminalas',
                'style' => 'background-color: #ffd280;font-weight: bold;',
                'stulpas' => 'iskr_vieta_terminalas'
            )
        );
    }
    if($stulpo_vardas == "organizer_log_grand_kroviniai_info_pakr_grupe") {
        $parametrai = array(
            'pakr_salis' => array(
                'eil_nr' => 1,
                'active' => 1,
                'substring' => 0,
                'label' => 'Pasikrovimo šalis',
                'funkcija' => 'get_salis_sutr_by_id_is_masyvo',
                'rodyk_tik_tuomet_jei_nera_x_stulpelio' => 'uzd_pakr_vieta_terminalas',
                'stulpas' => 'pakr_salis'
            ),
            'pakr_miestas' => array(
                'eil_nr' => 2,
                'active' => 1,
                'substring' => 0,
                'label' => 'Pasikrovimo miestas',
                'rodyk_tik_tuomet_jei_nera_x_stulpelio' => 'uzd_pakr_vieta_terminalas',
                'stulpas' => 'pakr_miestas'
            ),
            'pakr_regionas' => array(
                'eil_nr' => 3,
                'active' => 0,
                'substring' => 0,
                'label' => 'Pasikrovimo regionas',
                'stulpas' => 'pakr_regionas'
            ),
            'pakr_adresas' => array(
                'eil_nr' => 4,
                'active' => 0,
                'substring' => 0,
                'label' => 'Pasikrovimo adresas',
                'stulpas' => 'pakr_adresas'
            ),
            'pakr_vietos_id' => array(
                'eil_nr' => 5,
                'active' => 1,
                'substring' => 0,
                'label' => 'Pasikrovimo vieta',
                'funkcija' => 'get_vieta_by_id',
                'rodyk_tik_tuomet_jei_yra_x_stulpelis' => 'uzd_pakr_vieta_terminalas',
                'style' => 'background-color: #ffd280;font-weight: bold; text-decoration: underline;',
                'stulpas' => 'pakr_vietos_id'
            ),
            'uzd_pakr_vieta_terminalas' => array(
                'eil_nr' => 6,
                'active' => 1,
                'substring' => 0,
                'label' => 'Pasikrovimo vieta - terminalas',
                'style' => 'background-color: #ffd280;font-weight: bold;',
                'stulpas' => 'uzd_pakr_vieta_terminalas'
            )
        );
    }
    if($stulpo_vardas == "organizer_log_grand_kroviniai_info_iskr_grupe") {
        $parametrai = array(
            'iskr_salis' => array(
                'eil_nr' => 1,
                'active' => 1,
                'substring' => 0,
                'label' => 'Išsikrovimo šalis',
                'funkcija' => 'get_salis_sutr_by_id_is_masyvo',
                'rodyk_tik_tuomet_jei_nera_x_stulpelio' => 'iskr_vieta_terminalas',
                'stulpas' => 'iskr_salis'
            ),
            'iskr_miestas' => array(
                'eil_nr' => 2,
                'active' => 1,
                'substring' => 0,
                'label' => 'Išsikrovimo miestas',
                'rodyk_tik_tuomet_jei_nera_x_stulpelio' => 'iskr_vieta_terminalas',
                'stulpas' => 'iskr_miestas'
            ),
            'iskr_regionas' => array(
                'eil_nr' => 3,
                'active' => 0,
                'substring' => 0,
                'label' => 'Išsikrovimo regionas',
                'stulpas' => 'iskr_regionas'
            ),
            'iskr_adresas' => array(
                'eil_nr' => 4,
                'active' => 0,
                'substring' => 0,
                'label' => 'Išsikrovimo adresas',
                'stulpas' => 'iskr_adresas'
            ),
            'iskr_vietos_id' => array(
                'eil_nr' => 5,
                'active' => 1,
                'substring' => 0,
                'label' => 'Išsikrovimo vieta ',
                'funkcija' => 'get_vieta_by_id',
                'rodyk_tik_tuomet_jei_yra_x_stulpelis' => 'iskr_vieta_terminalas',
                'style' => 'background-color: #ffd280;font-weight: bold; text-decoration: underline;',
                'stulpas' => 'iskr_vietos_id'
            ),
            'iskr_vieta_terminalas' => array(
                'eil_nr' => 6,
                'active' => 1,
                'substring' => 0,
                'label' => 'Išsikrovimo vieta - terminalas',
                'style' => 'background-color: #ffd280;font-weight: bold;',
                'stulpas' => 'iskr_vieta_terminalas'
            )
        );
    }
    if($stulpo_vardas == "organizer_reiso_keliones_lapo_info_grupe") {
        $parametrai = array(
            'masina' => array(
                'eil_nr' => 1,
                'active' => 1,
                'label' => 'Mašina',
                'colspan' => '1',
                'stulpas' => 'masina'
            ),
            'priekaba' => array(
                'eil_nr' => 2,
                'active' => 1,
                'label' => 'Priekaba',
                'colspan' => '1',
                'stulpas' => 'priekaba'
            ),
            'vairuotojas_vezejas' => array(
                'eil_nr' => 3,
                'active' => 1,
                'label' => 'Vairuotojas/Vežėjas',
                'colspan' => '1',
                'stulpas' => 'vairuotojas_vezejas'
            ),
            'isvykimo_data' => array(
                'eil_nr' => 4,
                'active' => 1,
                'label' => 'Išvykimo data',
                'colspan' => '1',
                'stulpas' => 'isvykimo_data'
            ),
            'grizimo_data' => array(
                'eil_nr' => 5,
                'active' => 1,
                'label' => 'Grįžimo data',
                'colspan' => '1',
                'stulpas' => 'grizimo_data'
            ),
            'statusas' => array(
                'eil_nr' => 6,
                'active' => 1,
                'label' => 'Statusas',
                'colspan' => '1',
                'stulpas' => 'statusas'
            )
        );
    }
    return $parametrai;
}
function atask_pasidaryk_pats_reisai($stulpo_vardas)
{
    if ($stulpo_vardas == "kons_uzsakymas") {
        $parametrai = array(
            'frachtas' => array(
                'eil_nr' => 1,
                'active' => 1,
                'substring' => 0,
                'label' => 'Frachtas',
                'stulpas' => 'frachtas'
            ),
            'frachtas_valiuta' => array(
                'eil_nr' => 2,
                'active' => 1,
                'substring' => 0,
                'funkcija' => 'get_valiuta_by_id',
                'label' => 'Frachto valiuta',
                'rodyk_tik_tuomet_jei_yra_x_stulpelis' => 'frachtas',
                'stulpas' => 'frachtas_valiuta'
            ),
            'uzsakovo_ref_nr' => array(
                'eil_nr' => 3,
                'active' => 1,
                'substring' => 0,
                'label' => 'Užsakovo REF nr.',
                'stulpas' => 'uzsakovo_ref_nr'
            ),
            'pastabos' => array(
                'eil_nr' => 4,
                'active' => 0,
                'substring' => 10,
                'label' => 'Pastabos',
                'stulpas' => 'pastabos'
            ),
            'pastabos_2' => array(
                'eil_nr' => 5,
                'active' => 0,
                'substring' => 10,
                'label' => 'Pastabos 2',
                'stulpas' => 'pastabos_2'
            )
        );
    }
    return $parametrai;
}

function atask_pasidaryk_pats_organizer_uzs_log_grandines_autov($stulpo_vardas)
{
    if ($stulpo_vardas == "kons_uzsakymas") {
        $parametrai = array(
            'frachtas' => array(
                'eil_nr' => 1,
                'active' => 1,
                'substring' => 0,
                'label' => 'Frachtas',
                'stulpas' => 'frachtas'
            ),
            'frachtas_valiuta' => array(
                'eil_nr' => 2,
                'active' => 1,
                'substring' => 0,
                'funkcija' => 'get_valiuta_by_id',
                'label' => 'Frachto valiuta',
                'rodyk_tik_tuomet_jei_yra_x_stulpelis' => 'frachtas',
                'stulpas' => 'frachtas_valiuta'
            ),
            'uzsakovo_ref_nr' => array(
                'eil_nr' => 3,
                'active' => 1,
                'substring' => 0,
                'label' => 'Užsakovo REF nr.',
                'stulpas' => 'uzsakovo_ref_nr'
            ),
            'pastabos' => array(
                'eil_nr' => 4,
                'active' => 0,
                'substring' => 10,
                'label' => 'Pastabos',
                'stulpas' => 'pastabos'
            ),
            'pastabos_2' => array(
                'eil_nr' => 5,
                'active' => 0,
                'substring' => 10,
                'label' => 'Pastabos 2',
                'stulpas' => 'pastabos_2'
            )
        );
    }
    return $parametrai;
}
function atask_pasidaryk_pats_reisai_su_km($stulpo_vardas)
{
    if ($stulpo_vardas == "reisai_su_km_uzsakymo_stulpu_grupe") {
        $parametrai = array(
            'pliusas' => array(
                'eil_nr' => 1,
                'active' => 1,
                'substring' => 0,
                'label' => 'Pliusas',
                'colspan' => '1',
                'stulpas' => 'pliusas'
            ),
            'konsoliduotas_uzsakymas' => array(
                'eil_nr' => 2,
                'active' => 1,
                'substring' => 0,
                'label' => 'Konsolidavimas',
                'colspan' => '1',
                'stulpas' => 'konsoliduotas_uzsakymas'
            ),
            'uzs_baigtas' => array(
                'eil_nr' => 3,
                'active' => 0,
                'label' => 'Baigtas',
                'colspan' => '1',
                'rowspan' => '2',
                'stulpas' => 'uzs_baigtas'
            ),
            'masina' => array(
                'eil_nr' => 4,
                'active' => 0,
                'substring' => 0,
                'label' => 'Mašina',
                'colspan' => '1',
                'stulpas' => 'masina'
            ),
            'konsoliduotas_pav' => array(
                'eil_nr' => 5,
                'active' => 1,
                'substring' => 0,
                'label' => 'Kons. pav.',
                'colspan' => '1',
                'stulpas' => 'konsoliduotas_pav'
            ),
            'priskirti_uzsakyma_konsoliduotam' => array(
                'eil_nr' => 6,
                'active' => 1,
                'substring' => 0,
                'label' => 'Priskirti užsakymą konsoliduotam',
                'colspan' => '1',
                'stulpas' => 'priskirti_uzsakyma_konsoliduotam'
            ),
            'uzsak_nr' => array(
                'eil_nr' => 7,
                'active' => 1,
                'substring' => 0,
                'label' => 'Užsak. Nr.',
                'colspan' => '1',
                'stulpas' => 'uzsak_nr'
            ),
            'uzsakovas' => array(
                'eil_nr' => 8,
                'active' => 1,
                'substring' => 0,
                'label' => 'Užsakovas',
                'colspan' => '1',
                'stulpas' => 'uzsakovas'
            ),
            'frachtas' => array(
                'eil_nr' => 9,
                'active' => 1,
                'substring' => 0,
                'label' => 'Frachtas',
                'colspan' => '1',
                'stulpas' => 'frachtas'
            ),
            'saskaitos' => array(
                'eil_nr' => 10,
                'active' => 1,
                'substring' => 0,
                'label' => 'Saskaitos',
                'colspan' => '1',
                'stulpas' => 'saskaitos'
            ),
            'kas_vykdo' => array(
                'eil_nr' => 11,
                'active' => 1,
                'substring' => 0,
                'label' => 'Kas vykdo kons. užsakymus',
                'colspan' => '1',
                'stulpas' => 'kas_vykdo'
            ),
            'uzsakovo_uzs_nr' => array(
                'eil_nr' => 12,
                'active' => 0,
                'substring' => 0,
                'label' => 'Užsakovo užs. nr.',
                'colspan' => '1',
                'stulpas' => 'uzsakovo_uzs_nr'
            ),
            'kasd_pastabos' => array(
                'eil_nr' => 13,
                'active' => 0,
                'substring' => 0,
                'label' => 'Kasdienės pastabos',
                'colspan' => '1',
                'stulpas' => 'kasd_pastabos'
            ),
            'pastabos' => array(
                'eil_nr' => 14,
                'active' => 0,
                'substring' => 0,
                'label' => 'Pastabos',
                'colspan' => '1',
                'stulpas' => 'pastabos'
            ),
            'route_pastabos' => array(
                'eil_nr' => 15,
                'active' => 0,
                'substring' => 0,
                'label' => 'Maršruto pastabos',
                'colspan' => '1',
                'stulpas' => 'route_pastabos'
            ),
            'kas_vykdo_uzsakymus' => array(
                'eil_nr' => 17,
                'active' => 0,
                'substring' => 0,
                'label' => 'Kas vykdo užsakymus',
                'colspan' => '1',
                'stulpas' => 'kas_vykdo_uzsakymus'
            ),
            'frachto_detalizacija' => array(
                'eil_nr' => 18,
                'active' => 0,
                'label' => 'Frachto detalizacija',
                'colspan' => '1',
                'stulpas' => 'uzsakymo_id'
            ),
            'uzs_vadyb_id' => array(
                'eil_nr' => 19,
                'active' => 0,
                'label' => 'Užsakymo vadybininkas',
                'colspan' => '1',
                'stulpas' => 'uzs_vadyb_id'
            ),
            'kliento_km_skirt' => array(
                'eil_nr' => 20,
                'active' => 0,
                'label' => 'Kliento ir maršruto KM skirtumas',
                'colspan' => '1',
                'stulpas' => 'kliento_km_skirt'
            ),
            'kliento_fracht_skirt' => array(
                'eil_nr' => 21,
                'active' => 0,
                'label' => 'Užs. frachto ir frachto pagal maršruto KM skirtumas',
                'colspan' => '1',
                'stulpas' => 'kliento_fracht_skirt'
            ),
            'uzdavinio_priekaba' => array(
                'eil_nr' => 22,
                'active' => 0,
                'label' => 'Užd. priekaba',
                'colspan' => '1',
                'stulpas' => 'uzdavinio_priekaba'
            ),
            'custom_stulpas_1' => array(
                'eil_nr' => 23,
                'active' => 0,
                'label' => 'Custom 1',
                'colspan' => '1',
                'stulpas' => 'custom_stulpas_1'
            ),
            'custom_stulpas_2' => array(
                'eil_nr' => 24,
                'active' => 0,
                'label' => 'Custom 2',
                'colspan' => '1',
                'stulpas' => 'custom_stulpas_2'
            ),
            'custom_stulpas_3' => array(
                'eil_nr' => 25,
                'active' => 0,
                'label' => 'Custom 3',
                'colspan' => '1',
                'stulpas' => 'custom_stulpas_3'
            )
        );
    }
    if ($stulpo_vardas == "reisai_su_km_kroviniu_grupe") {
        $parametrai = array(
            'ref_nr' => array(
                'eil_nr' => 1,
                'active' => 1,
                'substring' => 0,
                'label' => 'Ref. nr.',
                'colspan' => '1',
                'stulpas' => 'ref_nr'
            ),
            'datos' => array(
                'eil_nr' => 2,
                'active' => 1,
                'substring' => 0,
                'label' => 'Datos',
                'colspan' => '1',
                'stulpas' => 'datos'
            ),
            'krovinys' => array(
                'eil_nr' => 3,
                'active' => 1,
                'substring' => 0,
                'label' => 'Krovinys',
                'colspan' => '1',
                'stulpas' => 'krovinys'
            ),
            'marsrutas_is' => array(
                'eil_nr' => 4,
                'active' => 1,
                'substring' => 0,
                'label' => 'Iš',
                'colspan' => '1',
                'stulpas' => 'marsrutas_is'
            ),
            'marsrutas_i' => array(
                'eil_nr' => 5,
                'active' => 1,
                'substring' => 0,
                'label' => 'Į',
                'colspan' => '1',
                'stulpas' => 'marsrutas_i'
            ),
            'km_krauti' => array(
                'eil_nr' => 6,
                'active' => 1,
                'substring' => 0,
                'label' => 'Km krauti',
                'colspan' => '1',
                'stulpas' => 'km_krauti'
            ),
            'km_tusti' => array(
                'eil_nr' => 7,
                'active' => 1,
                'substring' => 0,
                'label' => 'Km tušti',
                'colspan' => '1',
                'stulpas' => 'km_tusti'
            ),
            'viso_km' => array(
                'eil_nr' => 8,
                'active' => 1,
                'substring' => 0,
                'label' => 'Viso KM',
                'colspan' => '1',
                'stulpas' => 'viso_km'
            ),
            'krovinio_km_apm' => array(
                'eil_nr' => 9,
                'active' => 1,
                'substring' => 0,
                'label' => 'Km apmokėti',
                'colspan' => '1',
                'stulpas' => 'krovinio_km_apm'
            ),
            'eur_km' => array(
                'eil_nr' => 10,
                'active' => 1,
                'substring' => 0,
                'label' => 'EUR/km',
                'colspan' => '1',
                'stulpas' => 'eur_km'
            ),
            'parazitiniai_km' => array(
                'eil_nr' => 11,
                'active' => 0,
                'substring' => 0,
                'label' => 'Paraztiniai km',
                'colspan' => '1',
                'stulpas' => 'parazitiniai_km'
            ),
            'parazitiniai_km_proc' => array(
                'eil_nr' => 12,
                'active' => 0,
                'substring' => 0,
                'label' => 'Paraztiniai km proc.',
                'colspan' => '1',
                'stulpas' => 'parazitiniai_km_proc'
            ),
            'custom_stulpas_1' => array(
                'eil_nr' => 13,
                'active' => 0,
                'label' => 'Custom 1',
                'colspan' => '1',
                'stulpas' => 'custom_stulpas_1'
            ),
            'custom_stulpas_2' => array(
                'eil_nr' => 14,
                'active' => 0,
                'label' => 'Custom 2',
                'colspan' => '1',
                'stulpas' => 'custom_stulpas_2'
            ),
            'custom_stulpas_3' => array(
                'eil_nr' => 15,
                'active' => 0,
                'label' => 'Custom 3',
                'colspan' => '1',
                'stulpas' => 'custom_stulpas_3'
            )
        );
    }
    if ($stulpo_vardas == "reisai_su_km_uzsakymo_stulpu_grupe_2") {
        $parametrai = array(
            'pliusas' => array(
                'eil_nr' => 1,
                'active' => 0,
                'substring' => 0,
                'label' => 'Pliusas',
                'colspan' => '1',
                'stulpas' => 'pliusas'
            ),
            'konsoliduotas_uzsakymas' => array(
                'eil_nr' => 2,
                'active' => 0,
                'substring' => 0,
                'label' => 'Konsolidavimas',
                'colspan' => '1',
                'stulpas' => 'konsoliduotas_uzsakymas'
            ),
            'konsoliduotas_pav' => array(
                'eil_nr' => 3,
                'active' => 0,
                'substring' => 0,
                'label' => 'Kons. pav.',
                'colspan' => '1',
                'stulpas' => 'konsoliduotas_pav'
            ),
            'priskirti_uzsakyma_konsoliduotam' => array(
                'eil_nr' => 4,
                'active' => 0,
                'substring' => 0,
                'label' => 'Priskirti užsakymą konsoliduotam',
                'colspan' => '1',
                'stulpas' => 'priskirti_uzsakyma_konsoliduotam'
            ),
            'uzsak_nr' => array(
                'eil_nr' => 5,
                'active' => 0,
                'substring' => 0,
                'label' => 'Užsak. Nr.',
                'colspan' => '1',
                'stulpas' => 'uzsak_nr'
            ),
            'uzsakovas' => array(
                'eil_nr' => 6,
                'active' => 0,
                'substring' => 0,
                'label' => 'Užsakovas',
                'colspan' => '1',
                'stulpas' => 'uzsakovas'
            ),
            'frachtas' => array(
                'eil_nr' => 7,
                'active' => 0,
                'substring' => 0,
                'label' => 'Frachtas',
                'colspan' => '1',
                'stulpas' => 'frachtas'
            ),
            'saskaitos' => array(
                'eil_nr' => 8,
                'active' => 0,
                'substring' => 0,
                'label' => 'Saskaitos',
                'colspan' => '1',
                'stulpas' => 'saskaitos'
            ),
            'kas_vykdo' => array(
                'eil_nr' => 9,
                'active' => 0,
                'substring' => 0,
                'label' => 'Kas vykdo kons. užsakymus',
                'colspan' => '1',
                'stulpas' => 'kas_vykdo'
            ),
            'uzsakovo_uzs_nr' => array(
                'eil_nr' => 10,
                'active' => 1,
                'substring' => 0,
                'label' => 'Užsakovo užs. nr.',
                'colspan' => '1',
                'stulpas' => 'uzsakovo_uzs_nr'
            ),
            'kasd_pastabos' => array(
                'eil_nr' => 11,
                'active' => 1,
                'substring' => 0,
                'label' => 'Kasdienės pastabos',
                'colspan' => '1',
                'stulpas' => 'kasd_pastabos'
            ),
            'pastabos' => array(
                'eil_nr' => 12,
                'active' => 1,
                'substring' => 0,
                'label' => 'Pastabos',
                'colspan' => '1',
                'stulpas' => 'pastabos'
            ),
            'kas_vykdo_uzsakymus' => array(
                'eil_nr' => 13,
                'active' => 0,
                'substring' => 0,
                'label' => 'Kas vykdo užsakymus',
                'colspan' => '1',
                'stulpas' => 'kas_vykdo_uzsakymus'
            ),
            'route_krauti_km' => array(
                'eil_nr' => 14,
                'active' => 0,
                'substring' => 0,
                'label' => 'KM krauti',
                'colspan' => '1',
                'stulpas' => 'route_krauti_km'
            ),
            'route_tusti_km' => array(
                'eil_nr' => 15,
                'active' => 0,
                'substring' => 0,
                'label' => 'KM tušti',
                'colspan' => '1',
                'stulpas' => 'route_tusti_km'
            ),
            'route_zemelapio_km' => array(
                'eil_nr' => 16,
                'active' => 0,
                'substring' => 0,
                'label' => 'Žemelapio KM',
                'colspan' => '1',
                'stulpas' => 'route_zemelapio_km'
            ),
            'route_odo_km' => array(
                'eil_nr' => 17,
                'active' => 0,
                'substring' => 0,
                'label' => 'Odo KM',
                'colspan' => '1',
                'stulpas' => 'route_odo_km'
            ),
            'route_parazitiniai_km' => array(
                'eil_nr' => 18,
                'active' => 0,
                'substring' => 0,
                'label' => 'Parazitiniai KM',
                'colspan' => '1',
                'stulpas' => 'route_parazitiniai_km'
            ),
            'route_parazitiniai_km_proc' => array(
                'eil_nr' => 19,
                'active' => 0,
                'substring' => 0,
                'label' => 'Parazitiniai KM %',
                'colspan' => '1',
                'stulpas' => 'route_parazitiniai_km_proc'
            ),
            'route_odo_eur_km' => array(
                'eil_nr' => 20,
                'active' => 0,
                'substring' => 0,
                'label' => 'Fakt. Route EUR / KM',
                'colspan' => '1',
                'stulpas' => 'route_odo_eur_km'
            ),
            'kliento_km_skirt' => array(
                'eil_nr' => 21,
                'active' => 0,
                'label' => 'Kliento ir maršruto KM skirtumas',
                'colspan' => '1',
                'stulpas' => 'kliento_km_skirt'
            ),
            'kliento_fracht_skirt' => array(
                'eil_nr' => 22,
                'active' => 0,
                'label' => 'Užs. frachto ir frachto pagal maršruto KM skirtumas',
                'colspan' => '1',
                'stulpas' => 'kliento_fracht_skirt'
            ),
            'custom_stulpas_1' => array(
                'eil_nr' => 23,
                'active' => 0,
                'label' => 'Custom 1',
                'colspan' => '1',
                'stulpas' => 'custom_stulpas_1'
            ),
            'custom_stulpas_2' => array(
                'eil_nr' => 24,
                'active' => 0,
                'label' => 'Custom 2',
                'colspan' => '1',
                'stulpas' => 'custom_stulpas_2'
            ),
            'custom_stulpas_3' => array(
                'eil_nr' => 25,
                'active' => 0,
                'label' => 'Custom 3',
                'colspan' => '1',
                'stulpas' => 'custom_stulpas_3'
            ),
            'uzs_kopijuoti_uzsak' => array(
                'eil_nr' => 26,
                'active' => 1,
                'label' => 'Kopijuoti užsakymus',
                'colspan' => '1',
                'stulpas' => 'uzs_kopijuoti_uzsak'
            )
        );
    }
    if($stulpo_vardas == "reisai_su_km_marsrutas_is") {
        $parametrai = array(
            'pakr_salis' => array(
                'eil_nr' => 1,
                'active' => 1,
                'substring' => 0,
                'label' => 'Pasikrovimo šalis',
                'funkcija' => 'get_salis_sutr_by_id_is_masyvo',
                'stulpas' => 'pakr_salis'
            ),
            'pakr_miestas' => array(
                'eil_nr' => 2,
                'active' => 1,
                'substring' => 0,
                'label' => 'Pasikrovimo miestas',
                'stulpas' => 'pakr_miestas'
            ),
            'pakr_regionas' => array(
                'eil_nr' => 3,
                'active' => 0,
                'substring' => 0,
                'label' => 'Pasikrovimo regionas',
                'stulpas' => 'pakr_regionas'
            ),
            'pakr_adresas' => array(
                'eil_nr' => 4,
                'active' => 0,
                'substring' => 0,
                'label' => 'Pasikrovimo adresas',
                'stulpas' => 'pakr_adresas'
            ),
            'pakr_vietos_id' => array(
                'eil_nr' => 5,
                'active' => 0,
                'substring' => 0,
                'label' => 'Pasikrovimo vieta',
                'funkcija' => 'get_vieta_by_id',
                'stulpas' => 'pakr_vietos_id'
            ),
            'siuntejas_past' => array(
                'eil_nr' => 6,
                'active' => 0,
                'substring' => 0,
                'label' => 'Įmonė / Pastabos / Kontaktinis asmuo',
                'stulpas' => 'siuntejas_past'
            )
        );
    }
    if($stulpo_vardas == "reisai_su_km_marsrutas_i") {
        $parametrai = array(
            'iskr_salis' => array(
                'eil_nr' => 1,
                'active' => 1,
                'substring' => 0,
                'label' => 'Išsikrovimo šalis',
                'funkcija' => 'get_salis_sutr_by_id_is_masyvo',
                'stulpas' => 'iskr_salis'
            ),
            'iskr_miestas' => array(
                'eil_nr' => 2,
                'active' => 1,
                'substring' => 0,
                'label' => 'Išsikrovimo miestas',
                'stulpas' => 'iskr_miestas'
            ),
            'iskr_regionas' => array(
                'eil_nr' => 3,
                'active' => 0,
                'substring' => 0,
                'label' => 'Išsikrovimo regionas',
                'stulpas' => 'iskr_regionas'
            ),
            'iskr_adresas' => array(
                'eil_nr' => 4,
                'active' => 0,
                'substring' => 0,
                'label' => 'Išsikrovimo adresas',
                'stulpas' => 'iskr_adresas'
            ),
            'iskr_vietos_id' => array(
                'eil_nr' => 5,
                'active' => 0,
                'substring' => 0,
                'label' => 'Išsikrovimo vieta',
                'funkcija' => 'get_vieta_by_id',
                'stulpas' => 'iskr_vietos_id'
            ),
            'gavejas_past' => array(
                'eil_nr' => 6,
                'active' => 0,
                'substring' => 0,
                'label' => 'Įmonė / Pastabos / Kontaktinis asmuo',
                'stulpas' => 'gavejas_past'
            )
        );
    }
    if ($stulpo_vardas == "kons_uzsakymas") {
        $parametrai = array(
            'frachtas' => array(
                'eil_nr' => 1,
                'active' => 1,
                'substring' => 0,
                'label' => 'Frachtas',
                'stulpas' => 'frachtas'
            ),
            'frachtas_valiuta' => array(
                'eil_nr' => 2,
                'active' => 1,
                'substring' => 0,
                'funkcija' => 'get_valiuta_by_id',
                'label' => 'Frachto valiuta',
                'rodyk_tik_tuomet_jei_yra_x_stulpelis' => 'frachtas',
                'stulpas' => 'frachtas_valiuta'
            ),
            'uzsakovo_ref_nr' => array(
                'eil_nr' => 3,
                'active' => 1,
                'substring' => 0,
                'label' => 'Užsakovo REF nr.',
                'stulpas' => 'uzsakovo_ref_nr'
            ),
            'pastabos' => array(
                'eil_nr' => 4,
                'active' => 0,
                'substring' => 10,
                'label' => 'Pastabos',
                'stulpas' => 'pastabos'
            ),
            'pastabos_2' => array(
                'eil_nr' => 5,
                'active' => 0,
                'substring' => 10,
                'label' => 'Pastabos 2',
                'stulpas' => 'pastabos_2'
            )
        );
    }
    if($stulpo_vardas == "reisai_su_km_log_grand_main_info") {
        $parametrai = array(
            'vardas_sutr' => array(
                'eil_nr' => 1,
                'active' => 1,
                'substring' => 0,
                'label' => 'Vadybininkas',
                'stulpas' => 'vardas_sutr'
            )
        );
    }
    return $parametrai;
}
function atask_pasidaryk_pats_keliones_lapas($stulpo_vardas)
{
    if ($stulpo_vardas == "keliones_lapas_uzsakymo_stulpu_grupe") {
        $parametrai = array(
            'uzs_numeris' => array(
                'eil_nr' => 1,
                'active' => 1,
                'substring' => 0,
                'label' => 'Užsakymas',
                'colspan' => '1',
                'stulpas' => 'uzs_numeris'
            ),
            'marsrutas' => array(
                'eil_nr' => 2,
                'active' => 1,
                'label' => 'Maršrutas',
                'colspan' => '1',
                'stulpas' => 'marsrutas'
            ),
            'uzsakovas' => array(
                'eil_nr' => 3,
                'active' => 1,
                'substring' => 0,
                'label' => 'Užsakovas',
                'colspan' => '1',
                'stulpas' => 'uzsakovas'
            ),
            'uzduoties_marsrutas' => array(
                'eil_nr' => 4,
                'active' => 1,
                'substring' => 0,
                'label' => 'Užduoties maršrutas',
                'colspan' => '1',
                'stulpas' => 'uzduoties_marsrutas'
            ),
            'uzd_pakrovimo_data' => array(
                'eil_nr' => 5,
                'active' => 1,
                'substring' => 0,
                'label' => 'Užd. pakrovimo data',
                'colspan' => '1',
                'stulpas' => 'uzd_pakrovimo_data'
            ),
            'uzd_pristatymo_data' => array(
                'eil_nr' => 6,
                'active' => 1,
                'substring' => 0,
                'label' => 'Užd. pristatymo data',
                'colspan' => '1',
                'stulpas' => 'uzd_pristatymo_data'
            ),
            'uzd_pr' => array(
                'eil_nr' => 7,
                'active' => 1,
                'substring' => 0,
                'label' => 'Užd. pr.',
                'colspan' => '1',
                'stulpas' => 'uzd_pr'
            ),
            'imp_eksp' => array(
                'eil_nr' => 8,
                'active' => 0,
                'substring' => 0,
                'label' => 'Imp./eksp.',
                'colspan' => '1',
                'stulpas' => 'imp_eksp'
            ),
            'uzd_km_viso' => array(
                'eil_nr' => 9,
                'active' => 1,
                'substring' => 0,
                'label' => 'Užd. km viso (tušti)',
                'colspan' => '1',
                'stulpas' => 'uzd_km_viso'
            ),
            'viso_marsruto_km' => array(
                'eil_nr' => 10,
                'active' => 0,
                'substring' => 0,
                'label' => 'Viso maršruto km',
                'colspan' => '1',
                'stulpas' => 'viso_marsruto_km'
            ),
            'cmr_nr' => array(
                'eil_nr' => 11,
                'active' => 1,
                'substring' => 0,
                'label' => 'CMR nr. (tonos)',
                'colspan' => '1',
                'stulpas' => 'cmr_nr'
            ),
            'islaidos' => array(
                'eil_nr' => 12,
                'active' => 1,
                'substring' => 0,
                'label' => 'Išlaidos',
                'colspan' => '1',
                'stulpas' => 'islaidos'
            ),
            'frachtas_reisui_valiuta' => array(
                'eil_nr' => 13,
                'active' => 1,
                'substring' => 0,
                'label' => 'Frachtas reisui valiuta',
                'colspan' => '1',
                'stulpas' => 'frachtas_reisui_valiuta'
            ),
            'frachtas_reisui' => array(
                'eil_nr' => 14,
                'active' => 1,
                'substring' => 0,
                'label' => 'Frachtas reisui',
                'colspan' => '1',
                'stulpas' => 'frachtas_reisui'
            ),
            'uzs_frachtas_be_pvm' => array(
                'eil_nr' => 15,
                'active' => 1,
                'substring' => 0,
                'label' => 'Užs. frachtas be PVM',
                'colspan' => '1',
                'stulpas' => 'uzs_frachtas_be_pvm'
            ),
            'pastabos_apskaitininkui' => array(
                'eil_nr' => 16,
                'active' => 1,
                'substring' => 0,
                'label' => 'Pastabos apskaitininkui',
                'colspan' => '1',
                'stulpas' => 'pastabos_apskaitininkui'
            ),
            'sms_ataskaita' => array(
                'eil_nr' => 17,
                'active' => 1,
                'label' => 'SMS ataskaita',
                'colspan' => '1',
                'stulpas' => 'sms_ataskaita'
            ),
            'custom' => array(
                'eil_nr' => 18,
                'active' => 0,
                'label' => 'custom',
                'colspan' => '1',
                'stulpas' => 'vairuotojo_uzmokestis'
            ),
            'spalvint_pagal_sventines_dienas' => array(
                'eil_nr' => 19,
                'active' => 0,
                'label' => 'Spalvinti datas pagal šventines dienas',
                'colspan' => '0',
                'stulpas' => 'spalvint_pagal_sventines_dienas'
            )

        );
    }
    return $parametrai;
}
function atask_pasidaryk_pats_reisai_su_km_autov($stulpo_vardas)
{
    if ($stulpo_vardas == "reisai_su_km_autov_uzsakymo_stulpu_grupe") {
        $parametrai = array(
            'pliusas' => array(
                'eil_nr' => 1,
                'active' => 1,
                'substring' => 0,
                'label' => 'Pliusas',
                'colspan' => '1',
                'stulpas' => 'pliusas'
            ),
            'konsoliduotas_uzsakymas' => array(
                'eil_nr' => 2,
                'active' => 1,
                'substring' => 0,
                'label' => 'Konsolidavimas',
                'colspan' => '1',
                'stulpas' => 'konsoliduotas_uzsakymas'
            ),
            'konsoliduotas_pav' => array(
                'eil_nr' => 4,
                'active' => 1,
                'substring' => 0,
                'label' => 'Kons. pav.',
                'colspan' => '1',
                'stulpas' => 'konsoliduotas_pav'
            ),
            'priskirti_uzsakyma_konsoliduotam' => array(
                'eil_nr' => 5,
                'active' => 1,
                'substring' => 0,
                'label' => 'Priskirti užsakymą konsoliduotam',
                'colspan' => '1',
                'stulpas' => 'priskirti_uzsakyma_konsoliduotam'
            ),
            'uzsak_nr' => array(
                'eil_nr' => 6,
                'active' => 1,
                'substring' => 0,
                'label' => 'Užsak. Nr.',
                'colspan' => '1',
                'stulpas' => 'uzsak_nr'
            ),
            'uzsakovas' => array(
                'eil_nr' => 7,
                'active' => 1,
                'substring' => 0,
                'label' => 'Užsakovas',
                'colspan' => '1',
                'stulpas' => 'uzsakovas'
            ),
            'frachtas' => array(
                'eil_nr' => 8,
                'active' => 1,
                'substring' => 0,
                'label' => 'Frachtas',
                'colspan' => '1',
                'stulpas' => 'frachtas'
            ),
            'saskaitos' => array(
                'eil_nr' => 9,
                'active' => 1,
                'substring' => 0,
                'label' => 'Saskaitos',
                'colspan' => '1',
                'stulpas' => 'saskaitos'
            ),
            'kas_vykdo' => array(
                'eil_nr' => 10,
                'active' => 1,
                'substring' => 0,
                'label' => 'Kas vykdo kons. užsakymus',
                'colspan' => '1',
                'stulpas' => 'kas_vykdo'
            ),
            'uzsakovo_uzs_nr' => array(
                'eil_nr' => 11,
                'active' => 0,
                'substring' => 0,
                'label' => 'Užsakovo užs. nr.',
                'colspan' => '1',
                'stulpas' => 'uzsakovo_uzs_nr'
            ),
            'kasd_pastabos' => array(
                'eil_nr' => 12,
                'active' => 0,
                'substring' => 0,
                'label' => 'Kasdienės pastabos',
                'colspan' => '1',
                'stulpas' => 'kasd_pastabos'
            ),
            'pastabos' => array(
                'eil_nr' => 13,
                'active' => 0,
                'substring' => 0,
                'label' => 'Pastabos',
                'colspan' => '1',
                'stulpas' => 'pastabos'
            ),
            'kas_vykdo_uzsakymus' => array(
                'eil_nr' => 14,
                'active' => 0,
                'substring' => 0,
                'label' => 'Kas vykdo užsakymus',
                'colspan' => '1',
                'stulpas' => 'kas_vykdo_uzsakymus'
            ),
            'custom_stulpas_1' => array(
                'eil_nr' => 15,
                'active' => 0,
                'label' => 'Custom 1',
                'colspan' => '1',
                'stulpas' => 'custom_stulpas_1'
            ),
            'custom_stulpas_2' => array(
                'eil_nr' => 16,
                'active' => 0,
                'label' => 'Custom 2',
                'colspan' => '1',
                'stulpas' => 'custom_stulpas_2'
            ),
            'custom_stulpas_3' => array(
                'eil_nr' => 17,
                'active' => 0,
                'label' => 'Custom 3',
                'colspan' => '1',
                'stulpas' => 'custom_stulpas_3'
            )
        );
    }
    if ($stulpo_vardas == "reisai_su_km_autov_kroviniu_grupe") {
        $parametrai = array(
            'ref_nr' => array(
                'eil_nr' => 1,
                'active' => 1,
                'substring' => 0,
                'label' => 'Ref. nr.',
                'colspan' => '1',
                'stulpas' => 'ref_nr'
            ),
            'datos' => array(
                'eil_nr' => 2,
                'active' => 1,
                'substring' => 0,
                'label' => 'Datos',
                'colspan' => '1',
                'stulpas' => 'datos'
            ),
            'krovinys' => array(
                'eil_nr' => 3,
                'active' => 1,
                'substring' => 0,
                'label' => 'Krovinys',
                'colspan' => '1',
                'stulpas' => 'krovinys'
            ),
            'marsrutas_is' => array(
                'eil_nr' => 4,
                'active' => 1,
                'substring' => 0,
                'label' => 'Iš',
                'colspan' => '1',
                'stulpas' => 'marsrutas_is'
            ),
            'marsrutas_i' => array(
                'eil_nr' => 5,
                'active' => 1,
                'substring' => 0,
                'label' => 'Į',
                'colspan' => '1',
                'stulpas' => 'marsrutas_i'
            ),
            'draudiminiai_ivykiai' => array(
                'eil_nr' => 6,
                'active' => 1,
                'substring' => 0,
                'label' => 'Į',
                'colspan' => '1',
                'stulpas' => 'draudiminiai_ivykiai'
            ),
            'km_krauti' => array(
                'eil_nr' => 7,
                'active' => 1,
                'substring' => 0,
                'label' => 'Km krauti',
                'colspan' => '1',
                'stulpas' => 'km_krauti'
            ),
            'km_tusti' => array(
                'eil_nr' => 8,
                'active' => 1,
                'substring' => 0,
                'label' => 'Km tušti',
                'colspan' => '1',
                'stulpas' => 'km_tusti'
            ),
            'viso_km' => array(
                'eil_nr' => 9,
                'active' => 1,
                'substring' => 0,
                'label' => 'Viso KM EUR/km',
                'colspan' => '1',
                'stulpas' => 'viso_km'
            ),
            'custom_stulpas_1' => array(
                'eil_nr' => 10,
                'active' => 0,
                'label' => 'Custom 1',
                'colspan' => '1',
                'stulpas' => 'custom_stulpas_1'
            ),
            'custom_stulpas_2' => array(
                'eil_nr' => 11,
                'active' => 0,
                'label' => 'Custom 2',
                'colspan' => '1',
                'stulpas' => 'custom_stulpas_2'
            ),
            'custom_stulpas_3' => array(
                'eil_nr' => 12,
                'active' => 0,
                'label' => 'Custom 3',
                'colspan' => '1',
                'stulpas' => 'custom_stulpas_3'
            )
        );
    }
    if ($stulpo_vardas == "reisai_su_km_autov_uzsakymo_stulpu_grupe_2") {
        $parametrai = array(
            'pliusas' => array(
                'eil_nr' => 1,
                'active' => 0,
                'substring' => 0,
                'label' => 'Pliusas',
                'colspan' => '1',
                'stulpas' => 'pliusas'
            ),
            'konsoliduotas_uzsakymas' => array(
                'eil_nr' => 2,
                'active' => 0,
                'substring' => 0,
                'label' => 'Konsolidavimas',
                'colspan' => '1',
                'stulpas' => 'konsoliduotas_uzsakymas'
            ),
            'konsoliduotas_pav' => array(
                'eil_nr' => 3,
                'active' => 0,
                'substring' => 0,
                'label' => 'Kons. pav.',
                'colspan' => '1',
                'stulpas' => 'konsoliduotas_pav'
            ),
            'priskirti_uzsakyma_konsoliduotam' => array(
                'eil_nr' => 4,
                'active' => 0,
                'substring' => 0,
                'label' => 'Priskirti užsakymą konsoliduotam',
                'colspan' => '1',
                'stulpas' => 'priskirti_uzsakyma_konsoliduotam'
            ),
            'uzsak_nr' => array(
                'eil_nr' => 5,
                'active' => 0,
                'substring' => 0,
                'label' => 'Užsak. Nr.',
                'colspan' => '1',
                'stulpas' => 'uzsak_nr'
            ),
            'uzsakovas' => array(
                'eil_nr' => 6,
                'active' => 0,
                'substring' => 0,
                'label' => 'Užsakovas',
                'colspan' => '1',
                'stulpas' => 'uzsakovas'
            ),
            'frachtas' => array(
                'eil_nr' => 7,
                'active' => 0,
                'substring' => 0,
                'label' => 'Frachtas',
                'colspan' => '1',
                'stulpas' => 'frachtas'
            ),
            'saskaitos' => array(
                'eil_nr' => 8,
                'active' => 0,
                'substring' => 0,
                'label' => 'Saskaitos',
                'colspan' => '1',
                'stulpas' => 'saskaitos'
            ),
            'kas_vykdo' => array(
                'eil_nr' => 9,
                'active' => 0,
                'substring' => 0,
                'label' => 'Kas vykdo kons. užsakymus',
                'colspan' => '1',
                'stulpas' => 'kas_vykdo'
            ),
            'lf' => array(
                'eil_nr' => 10,
                'active' => 1,
                'substring' => 0,
                'label' => 'LF',
                'colspan' => '1',
                'stulpas' => 'lf'
            ),
            'uzsakovo_uzs_nr' => array(
                'eil_nr' => 11,
                'active' => 1,
                'substring' => 0,
                'label' => 'Užsakovo užs. nr.',
                'colspan' => '1',
                'stulpas' => 'uzsakovo_uzs_nr'
            ),
            'kasd_pastabos' => array(
                'eil_nr' => 12,
                'active' => 1,
                'substring' => 0,
                'label' => 'Kasdienės pastabos',
                'colspan' => '1',
                'stulpas' => 'kasd_pastabos'
            ),
            'pastabos' => array(
                'eil_nr' => 13,
                'active' => 1,
                'substring' => 0,
                'label' => 'Pastabos',
                'colspan' => '1',
                'stulpas' => 'pastabos'
            ),
            'kas_vykdo_uzsakymus' => array(
                'eil_nr' => 14,
                'active' => 0,
                'substring' => 0,
                'label' => 'Kas vykdo užsakymus',
                'colspan' => '1',
                'stulpas' => 'kas_vykdo_uzsakymus'
            ),
            'custom_stulpas_1' => array(
                'eil_nr' => 20,
                'active' => 0,
                'label' => 'Custom 1',
                'colspan' => '1',
                'stulpas' => 'custom_stulpas_1'
            ),
            'custom_stulpas_2' => array(
                'eil_nr' => 21,
                'active' => 0,
                'label' => 'Custom 2',
                'colspan' => '1',
                'stulpas' => 'custom_stulpas_2'
            ),
            'custom_stulpas_3' => array(
                'eil_nr' => 22,
                'active' => 0,
                'label' => 'Custom 3',
                'colspan' => '1',
                'stulpas' => 'custom_stulpas_3'
            ),
        );
    }
    if($stulpo_vardas == "reisai_su_km_autov_marsrutas_is") {
        $parametrai = array(
            'pakr_salis' => array(
                'eil_nr' => 1,
                'active' => 1,
                'substring' => 0,
                'label' => 'Pasikrovimo šalis',
                'funkcija' => 'get_salis_sutr_by_id_is_masyvo',
                'stulpas' => 'pakr_salis'
            ),
            'pakr_miestas' => array(
                'eil_nr' => 2,
                'active' => 1,
                'substring' => 0,
                'label' => 'Pasikrovimo miestas',
                'stulpas' => 'pakr_miestas'
            ),
            'pakr_regionas' => array(
                'eil_nr' => 3,
                'active' => 0,
                'substring' => 0,
                'label' => 'Pasikrovimo regionas',
                'stulpas' => 'pakr_regionas'
            ),
            'pakr_adresas' => array(
                'eil_nr' => 4,
                'active' => 0,
                'substring' => 0,
                'label' => 'Pasikrovimo adresas',
                'stulpas' => 'pakr_adresas'
            ),
            'pakr_vietos_id' => array(
                'eil_nr' => 5,
                'active' => 0,
                'substring' => 0,
                'label' => 'Pasikrovimo vieta',
                'funkcija' => 'get_vieta_by_id',
                'stulpas' => 'pakr_vietos_id'
            ),
            'siuntejas_past' => array(
                'eil_nr' => 6,
                'active' => 0,
                'substring' => 0,
                'label' => 'Įmonė / Pastabos / Kontaktinis asmuo',
                'stulpas' => 'siuntejas_past'
            )
        );
    }
    if($stulpo_vardas == "reisai_su_km_autov_marsrutas_i") {
        $parametrai = array(
            'iskr_salis' => array(
                'eil_nr' => 1,
                'active' => 1,
                'substring' => 0,
                'label' => 'Išsikrovimo šalis',
                'funkcija' => 'get_salis_sutr_by_id_is_masyvo',
                'stulpas' => 'iskr_salis'
            ),
            'iskr_miestas' => array(
                'eil_nr' => 2,
                'active' => 1,
                'substring' => 0,
                'label' => 'Išsikrovimo miestas',
                'stulpas' => 'iskr_miestas'
            ),
            'iskr_regionas' => array(
                'eil_nr' => 3,
                'active' => 0,
                'substring' => 0,
                'label' => 'Išsikrovimo regionas',
                'stulpas' => 'iskr_regionas'
            ),
            'iskr_adresas' => array(
                'eil_nr' => 4,
                'active' => 0,
                'substring' => 0,
                'label' => 'Išsikrovimo adresas',
                'stulpas' => 'iskr_adresas'
            ),
            'iskr_vietos_id' => array(
                'eil_nr' => 5,
                'active' => 0,
                'substring' => 0,
                'label' => 'Išsikrovimo vieta',
                'funkcija' => 'get_vieta_by_id',
                'stulpas' => 'iskr_vietos_id'
            ),
            'gavejas_past' => array(
                'eil_nr' => 6,
                'active' => 0,
                'substring' => 0,
                'label' => 'Įmonė / Pastabos / Kontaktinis asmuo',
                'stulpas' => 'gavejas_past'
            )
        );
    }
    if ($stulpo_vardas == "kons_uzsakymas") {
        $parametrai = array(
            'frachtas' => array(
                'eil_nr' => 1,
                'active' => 1,
                'substring' => 0,
                'label' => 'Frachtas',
                'stulpas' => 'frachtas'
            ),
            'frachtas_valiuta' => array(
                'eil_nr' => 2,
                'active' => 1,
                'substring' => 0,
                'funkcija' => 'get_valiuta_by_id',
                'label' => 'Frachto valiuta',
                'rodyk_tik_tuomet_jei_yra_x_stulpelis' => 'frachtas',
                'stulpas' => 'frachtas_valiuta'
            ),
            'uzsakovo_ref_nr' => array(
                'eil_nr' => 3,
                'active' => 1,
                'substring' => 0,
                'label' => 'Užsakovo REF nr.',
                'stulpas' => 'uzsakovo_ref_nr'
            ),
            'pastabos' => array(
                'eil_nr' => 4,
                'active' => 0,
                'substring' => 10,
                'label' => 'Pastabos',
                'stulpas' => 'pastabos'
            ),
            'pastabos_2' => array(
                'eil_nr' => 5,
                'active' => 0,
                'substring' => 10,
                'label' => 'Pastabos 2',
                'stulpas' => 'pastabos_2'
            )
        );
    }
    if($stulpo_vardas == "reisai_su_km_autov_log_grand_main_info") {
        $parametrai = array(
            'vardas_sutr' => array(
                'eil_nr' => 1,
                'active' => 1,
                'substring' => 0,
                'label' => 'Vadybininkas',
                'stulpas' => 'vardas_sutr'
            )
        );
    }
    return $parametrai;
}
function atask_pasidaryk_pats_frachto_paskirstymas_uzsakymams($stulpo_vardas)
{
    if ($stulpo_vardas == "frachto_paskirstymas_uzsakymams_uzsakymo_stulpu_grupe") {
        $parametrai = array(
            'pliusas' => array(
                'eil_nr' => 1,
                'active' => 0,
                'substring' => 0,
                'label' => 'Pliusas',
                'colspan' => '1',
                'stulpas' => 'pliusas'
            ),
            'konsoliduotas_uzsakymas' => array(
                'eil_nr' => 2,
                'active' => 0,
                'substring' => 0,
                'label' => 'Konsolidavimas',
                'colspan' => '1',
                'stulpas' => 'konsoliduotas_uzsakymas'
            ),
            'konsoliduotas_pav' => array(
                'eil_nr' => 3,
                'active' => 1,
                'substring' => 0,
                'label' => 'Kons. pav.',
                'colspan' => '1',
                'stulpas' => 'konsoliduotas_pav'
            ),
            'priskirti_uzsakyma_konsoliduotam' => array(
                'eil_nr' => 4,
                'active' => 0,
                'substring' => 0,
                'label' => 'Priskirti užsakymą konsoliduotam',
                'colspan' => '1',
                'stulpas' => 'priskirti_uzsakyma_konsoliduotam'
            ),
            'uzsak_nr' => array(
                'eil_nr' => 5,
                'active' => 1,
                'substring' => 0,
                'label' => 'Užsak. Nr.',
                'colspan' => '1',
                'stulpas' => 'uzsak_nr'
            ),
            'paskirstyti_frachta_siem_uzsakymam' => array(
                'eil_nr' => 6,
                'active' => 1,
                'substring' => 0,
                'label' => 'Paskirstyti frachtą užsakymam',
                'colspan' => '1',
                'stulpas' => 'paskirstyti_frachta_siem_uzsakymam'
            ),
            'route_zemelapio_km' => array(
                'eil_nr' => 7,
                'active' => 1,
                'substring' => 0,
                'label' => 'Žemelapio KM',
                'colspan' => '1',
                'stulpas' => 'route_zemelapio_km'
            ),
            'uzsakovas' => array(
                'eil_nr' => 8,
                'active' => 1,
                'substring' => 0,
                'label' => 'Užsakovas',
                'colspan' => '1',
                'stulpas' => 'uzsakovas'
            ),
            'frachtas' => array(
                'eil_nr' => 9,
                'active' => 1,
                'substring' => 0,
                'label' => 'Frachtas',
                'colspan' => '1',
                'stulpas' => 'frachtas'
            ),
            'saskaitos' => array(
                'eil_nr' => 10,
                'active' => 1,
                'substring' => 0,
                'label' => 'Saskaitos',
                'colspan' => '1',
                'stulpas' => 'saskaitos'
            ),
            'kas_vykdo' => array(
                'eil_nr' => 11,
                'active' => 1,
                'substring' => 0,
                'label' => 'Kas vykdo kons. užsakymus',
                'colspan' => '1',
                'stulpas' => 'kas_vykdo'
            ),
            'uzsakovo_uzs_nr' => array(
                'eil_nr' => 12,
                'active' => 0,
                'substring' => 0,
                'label' => 'Užsakovo užs. nr.',
                'colspan' => '1',
                'stulpas' => 'uzsakovo_uzs_nr'
            ),
            'kasd_pastabos' => array(
                'eil_nr' => 13,
                'active' => 0,
                'substring' => 0,
                'label' => 'Kasdienės pastabos',
                'colspan' => '1',
                'stulpas' => 'kasd_pastabos'
            ),
            'pastabos' => array(
                'eil_nr' => 14,
                'active' => 0,
                'substring' => 0,
                'label' => 'Pastabos',
                'colspan' => '1',
                'stulpas' => 'pastabos'
            ),
            'kas_vykdo_uzsakymus' => array(
                'eil_nr' => 15,
                'active' => 0,
                'substring' => 0,
                'label' => 'Kas vykdo užsakymus',
                'colspan' => '1',
                'stulpas' => 'kas_vykdo_uzsakymus'
            ),
            'custom_stulpas_1' => array(
                'eil_nr' => 16,
                'active' => 0,
                'label' => 'Custom 1',
                'colspan' => '1',
                'stulpas' => 'custom_stulpas_1'
            ),
            'custom_stulpas_2' => array(
                'eil_nr' => 17,
                'active' => 0,
                'label' => 'Custom 2',
                'colspan' => '1',
                'stulpas' => 'custom_stulpas_2'
            ),
            'custom_stulpas_3' => array(
                'eil_nr' => 18,
                'active' => 0,
                'label' => 'Custom 3',
                'colspan' => '1',
                'stulpas' => 'custom_stulpas_3'
            )
        );
    }
    if ($stulpo_vardas == "frachto_paskirstymas_uzsakymams_kroviniu_grupe") {
        $parametrai = array(
            'ref_nr' => array(
                'eil_nr' => 1,
                'active' => 1,
                'substring' => 0,
                'label' => 'Ref. nr.',
                'colspan' => '1',
                'stulpas' => 'ref_nr'
            ),
            'datos' => array(
                'eil_nr' => 2,
                'active' => 1,
                'substring' => 0,
                'label' => 'Datos',
                'colspan' => '1',
                'stulpas' => 'datos'
            ),
            'krovinys' => array(
                'eil_nr' => 3,
                'active' => 1,
                'substring' => 0,
                'label' => 'Krovinys',
                'colspan' => '1',
                'stulpas' => 'krovinys'
            ),
            'marsrutas_is' => array(
                'eil_nr' => 4,
                'active' => 1,
                'substring' => 0,
                'label' => 'Iš',
                'colspan' => '1',
                'stulpas' => 'marsrutas_is'
            ),
            'marsrutas_i' => array(
                'eil_nr' => 5,
                'active' => 1,
                'substring' => 0,
                'label' => 'Į',
                'colspan' => '1',
                'stulpas' => 'marsrutas_i'
            ),
            'km_krauti' => array(
                'eil_nr' => 6,
                'active' => 1,
                'substring' => 0,
                'label' => 'Km krauti',
                'colspan' => '1',
                'stulpas' => 'km_krauti'
            ),
            'km_tusti' => array(
                'eil_nr' => 7,
                'active' => 1,
                'substring' => 0,
                'label' => 'Km tušti',
                'colspan' => '1',
                'stulpas' => 'km_tusti'
            ),
            'viso_km' => array(
                'eil_nr' => 8,
                'active' => 1,
                'substring' => 0,
                'label' => 'Viso KM EUR/km',
                'colspan' => '1',
                'stulpas' => 'viso_km'
            ),
            'custom_stulpas_1' => array(
                'eil_nr' => 9,
                'active' => 0,
                'label' => 'Custom 1',
                'colspan' => '1',
                'stulpas' => 'custom_stulpas_1'
            ),
            'custom_stulpas_2' => array(
                'eil_nr' => 10,
                'active' => 0,
                'label' => 'Custom 2',
                'colspan' => '1',
                'stulpas' => 'custom_stulpas_2'
            ),
            'custom_stulpas_3' => array(
                'eil_nr' => 11,
                'active' => 0,
                'label' => 'Custom 3',
                'colspan' => '1',
                'stulpas' => 'custom_stulpas_3'
            )
        );
    }
    if ($stulpo_vardas == "frachto_paskirstymas_uzsakymams_uzsakymo_stulpu_grupe_2") {
        $parametrai = array(
            'pliusas' => array(
                'eil_nr' => 1,
                'active' => 0,
                'substring' => 0,
                'label' => 'Pliusas',
                'colspan' => '1',
                'stulpas' => 'pliusas'
            ),
            'konsoliduotas_uzsakymas' => array(
                'eil_nr' => 2,
                'active' => 0,
                'substring' => 0,
                'label' => 'Konsolidavimas',
                'colspan' => '1',
                'stulpas' => 'konsoliduotas_uzsakymas'
            ),
            'konsoliduotas_pav' => array(
                'eil_nr' => 3,
                'active' => 0,
                'substring' => 0,
                'label' => 'Kons. pav.',
                'colspan' => '1',
                'stulpas' => 'konsoliduotas_pav'
            ),
            'priskirti_uzsakyma_konsoliduotam' => array(
                'eil_nr' => 4,
                'active' => 0,
                'substring' => 0,
                'label' => 'Priskirti užsakymą konsoliduotam',
                'colspan' => '1',
                'stulpas' => 'priskirti_uzsakyma_konsoliduotam'
            ),
            'uzsak_nr' => array(
                'eil_nr' => 5,
                'active' => 0,
                'substring' => 0,
                'label' => 'Užsak. Nr.',
                'colspan' => '1',
                'stulpas' => 'uzsak_nr'
            ),
            'uzsakovas' => array(
                'eil_nr' => 6,
                'active' => 0,
                'substring' => 0,
                'label' => 'Užsakovas',
                'colspan' => '1',
                'stulpas' => 'uzsakovas'
            ),
            'frachtas' => array(
                'eil_nr' => 7,
                'active' => 0,
                'substring' => 0,
                'label' => 'Frachtas',
                'colspan' => '1',
                'stulpas' => 'frachtas'
            ),
            'saskaitos' => array(
                'eil_nr' => 8,
                'active' => 0,
                'substring' => 0,
                'label' => 'Saskaitos',
                'colspan' => '1',
                'stulpas' => 'saskaitos'
            ),
            'kas_vykdo' => array(
                'eil_nr' => 9,
                'active' => 0,
                'substring' => 0,
                'label' => 'Kas vykdo kons. užsakymus',
                'colspan' => '1',
                'stulpas' => 'kas_vykdo'
            ),
            'uzsakovo_uzs_nr' => array(
                'eil_nr' => 10,
                'active' => 1,
                'substring' => 0,
                'label' => 'Užsakovo užs. nr.',
                'colspan' => '1',
                'stulpas' => 'uzsakovo_uzs_nr'
            ),
            'kasd_pastabos' => array(
                'eil_nr' => 11,
                'active' => 1,
                'substring' => 0,
                'label' => 'Kasdienės pastabos',
                'colspan' => '1',
                'stulpas' => 'kasd_pastabos'
            ),
            'pastabos' => array(
                'eil_nr' => 12,
                'active' => 1,
                'substring' => 0,
                'label' => 'Pastabos',
                'colspan' => '1',
                'stulpas' => 'pastabos'
            ),
            'kas_vykdo_uzsakymus' => array(
                'eil_nr' => 13,
                'active' => 0,
                'substring' => 0,
                'label' => 'Kas vykdo užsakymus',
                'colspan' => '1',
                'stulpas' => 'kas_vykdo_uzsakymus'
            ),
            'route_krauti_km' => array(
                'eil_nr' => 14,
                'active' => 0,
                'substring' => 0,
                'label' => 'KM krauti',
                'colspan' => '1',
                'stulpas' => 'route_krauti_km'
            ),
            'route_tusti_km' => array(
                'eil_nr' => 15,
                'active' => 0,
                'substring' => 0,
                'label' => 'KM tušti',
                'colspan' => '1',
                'stulpas' => 'route_tusti_km'
            ),
            'route_zemelapio_km' => array(
                'eil_nr' => 16,
                'active' => 0,
                'substring' => 0,
                'label' => 'Žemelapio KM',
                'colspan' => '1',
                'stulpas' => 'route_zemelapio_km'
            ),
            'route_odo_km' => array(
                'eil_nr' => 17,
                'active' => 0,
                'substring' => 0,
                'label' => 'Odo KM',
                'colspan' => '1',
                'stulpas' => 'route_odo_km'
            ),
            'route_parazitiniai_km' => array(
                'eil_nr' => 18,
                'active' => 0,
                'substring' => 0,
                'label' => 'Parazitiniai KM',
                'colspan' => '1',
                'stulpas' => 'route_parazitiniai_km'
            ),
            'route_parazitiniai_km_proc' => array(
                'eil_nr' => 19,
                'active' => 0,
                'substring' => 0,
                'label' => 'Parazitiniai KM %',
                'colspan' => '1',
                'stulpas' => 'route_parazitiniai_km_proc'
            ),
            'custom_stulpas_1' => array(
                'eil_nr' => 20,
                'active' => 0,
                'label' => 'Custom 1',
                'colspan' => '1',
                'stulpas' => 'custom_stulpas_1'
            ),
            'custom_stulpas_2' => array(
                'eil_nr' => 21,
                'active' => 0,
                'label' => 'Custom 2',
                'colspan' => '1',
                'stulpas' => 'custom_stulpas_2'
            ),
            'custom_stulpas_3' => array(
                'eil_nr' => 22,
                'active' => 0,
                'label' => 'Custom 3',
                'colspan' => '1',
                'stulpas' => 'custom_stulpas_3'
            ),
        );
    }
    if($stulpo_vardas == "frachto_paskirstymas_uzsakymams_marsrutas_is") {
        $parametrai = array(
            'pakr_salis' => array(
                'eil_nr' => 1,
                'active' => 1,
                'substring' => 0,
                'label' => 'Pasikrovimo šalis',
                'funkcija' => 'get_salis_sutr_by_id_is_masyvo',
                'stulpas' => 'pakr_salis'
            ),
            'pakr_miestas' => array(
                'eil_nr' => 2,
                'active' => 1,
                'substring' => 0,
                'label' => 'Pasikrovimo miestas',
                'stulpas' => 'pakr_miestas'
            ),
            'pakr_regionas' => array(
                'eil_nr' => 3,
                'active' => 0,
                'substring' => 0,
                'label' => 'Pasikrovimo regionas',
                'stulpas' => 'pakr_regionas'
            ),
            'pakr_adresas' => array(
                'eil_nr' => 4,
                'active' => 0,
                'substring' => 0,
                'label' => 'Pasikrovimo adresas',
                'stulpas' => 'pakr_adresas'
            ),
            'pakr_vietos_id' => array(
                'eil_nr' => 5,
                'active' => 0,
                'substring' => 0,
                'label' => 'Pasikrovimo vieta',
                'funkcija' => 'get_vieta_by_id',
                'stulpas' => 'pakr_vietos_id'
            ),
            'siuntejas_past' => array(
                'eil_nr' => 6,
                'active' => 0,
                'substring' => 0,
                'label' => 'Įmonė / Pastabos / Kontaktinis asmuo',
                'stulpas' => 'siuntejas_past'
            )
        );
    }
    if($stulpo_vardas == "frachto_paskirstymas_uzsakymams_marsrutas_i") {
        $parametrai = array(
            'iskr_salis' => array(
                'eil_nr' => 1,
                'active' => 1,
                'substring' => 0,
                'label' => 'Išsikrovimo šalis',
                'funkcija' => 'get_salis_sutr_by_id_is_masyvo',
                'stulpas' => 'iskr_salis'
            ),
            'iskr_miestas' => array(
                'eil_nr' => 2,
                'active' => 1,
                'substring' => 0,
                'label' => 'Išsikrovimo miestas',
                'stulpas' => 'iskr_miestas'
            ),
            'iskr_regionas' => array(
                'eil_nr' => 3,
                'active' => 0,
                'substring' => 0,
                'label' => 'Išsikrovimo regionas',
                'stulpas' => 'iskr_regionas'
            ),
            'iskr_adresas' => array(
                'eil_nr' => 4,
                'active' => 0,
                'substring' => 0,
                'label' => 'Išsikrovimo adresas',
                'stulpas' => 'iskr_adresas'
            ),
            'iskr_vietos_id' => array(
                'eil_nr' => 5,
                'active' => 0,
                'substring' => 0,
                'label' => 'Išsikrovimo vieta',
                'funkcija' => 'get_vieta_by_id',
                'stulpas' => 'iskr_vietos_id'
            ),
            'gavejas_past' => array(
                'eil_nr' => 6,
                'active' => 0,
                'substring' => 0,
                'label' => 'Įmonė / Pastabos / Kontaktinis asmuo',
                'stulpas' => 'gavejas_past'
            )
        );
    }
    if ($stulpo_vardas == "kons_uzsakymas") {
        $parametrai = array(
            'frachtas' => array(
                'eil_nr' => 1,
                'active' => 1,
                'substring' => 0,
                'label' => 'Frachtas',
                'stulpas' => 'frachtas'
            ),
            'frachtas_valiuta' => array(
                'eil_nr' => 2,
                'active' => 1,
                'substring' => 0,
                'funkcija' => 'get_valiuta_by_id',
                'label' => 'Frachto valiuta',
                'rodyk_tik_tuomet_jei_yra_x_stulpelis' => 'frachtas',
                'stulpas' => 'frachtas_valiuta'
            ),
            'uzsakovo_ref_nr' => array(
                'eil_nr' => 3,
                'active' => 1,
                'substring' => 0,
                'label' => 'Užsakovo REF nr.',
                'stulpas' => 'uzsakovo_ref_nr'
            ),
            'pastabos' => array(
                'eil_nr' => 4,
                'active' => 0,
                'substring' => 10,
                'label' => 'Pastabos',
                'stulpas' => 'pastabos'
            ),
            'pastabos_2' => array(
                'eil_nr' => 5,
                'active' => 0,
                'substring' => 10,
                'label' => 'Pastabos 2',
                'stulpas' => 'pastabos_2'
            )
        );
    }
    if($stulpo_vardas == "frachto_paskirstymas_uzsakymams_log_grand_main_info") {
        $parametrai = array(
            'vardas_sutr' => array(
                'eil_nr' => 1,
                'active' => 1,
                'substring' => 0,
                'label' => 'Vadybininkas',
                'stulpas' => 'vardas_sutr'
            )
        );
    }
    return $parametrai;
}
function atask_pasidaryk_pats_masinu_priekabu_dispatcher($stulpo_vardas)
{
    if($stulpo_vardas == "masinu_priekabu_dispatcher_uzdavinys_is_priekabos") {
        $parametrai = array(
            'uzd_pasikrovimo_data' => array(
                'eil_nr' => 1,
                'active' => 1,
                'substring' => 0,
                'label' => 'Pasikrovimo data',
                'funkcija' => 'format_date_time',
                'stulpas' => 'uzd_pasikrovimo_data'
            ),
            'uzd_pasikrovimo_salis' => array(
                'eil_nr' => 2,
                'active' => 1,
                'substring' => 0,
                'label' => 'Pasikrovimo šalis',
                'funkcija' => 'get_salis_sutr_by_id',
                'stulpas' => 'uzd_pasikrovimo_salis'
            ),
            'uzd_pasikrovimo_miestas' => array(
                'eil_nr' => 3,
                'active' => 1,
                'substring' => 0,
                'label' => 'Pasikrovimo miestas',
                'stulpas' => 'uzd_pasikrovimo_miestas'
            ),
            'uzd_pasikrovimo_adresas' => array(
                'eil_nr' => 4,
                'active' => 0,
                'substring' => 0,
                'label' => 'Pasikrovimo adresas',
                'stulpas' => 'uzd_pasikrovimo_adresas'
            ),
            'uzd_pasikrovimo_regionas' => array(
                'eil_nr' => 5,
                'active' => 0,
                'substring' => 0,
                'label' => 'Pasikrovimo regionas',
                'stulpas' => 'uzd_pasikrovimo_regionas'
            ),
            'uzd_pasikrovimo_vietos_id' => array(
                'eil_nr' => 6,
                'active' => 0,
                'substring' => 0,
                'label' => 'Pasikrovimo vieta',
                'funkcija' => 'get_vieta_by_id',
                'stulpas' => 'uzd_pasikrovimo_vietos_id'
            )
        );
    }

    if($stulpo_vardas == "masinu_priekabu_dispatcher_uzdavinys_is") {
        $parametrai = array(
            'uzd_pasikrovimo_data' => array(
                'eil_nr' => 1,
                'active' => 1,
                'substring' => 0,
                'label' => 'Pasikrovimo data',
                'funkcija' => 'format_date_time',
                'stulpas' => 'uzd_pasikrovimo_data'
            ),
            'uzd_pasikrovimo_salis' => array(
                'eil_nr' => 2,
                'active' => 1,
                'substring' => 0,
                'label' => 'Pasikrovimo šalis',
                'funkcija' => 'get_salis_sutr_by_id',
                'stulpas' => 'uzd_pasikrovimo_salis'
            ),
            'uzd_pasikrovimo_miestas' => array(
                'eil_nr' => 3,
                'active' => 1,
                'substring' => 0,
                'label' => 'Pasikrovimo miestas',
                'stulpas' => 'uzd_pasikrovimo_miestas'
            ),
            'uzd_pasikrovimo_adresas' => array(
                'eil_nr' => 4,
                'active' => 0,
                'substring' => 0,
                'label' => 'Pasikrovimo adresas',
                'stulpas' => 'uzd_pasikrovimo_adresas'
            ),
            'uzd_pasikrovimo_regionas' => array(
                'eil_nr' => 5,
                'active' => 0,
                'substring' => 0,
                'label' => 'Pasikrovimo regionas',
                'stulpas' => 'uzd_pasikrovimo_regionas'
            ),
            'uzd_pasikrovimo_vietos_id' => array(
                'eil_nr' => 6,
                'active' => 0,
                'substring' => 0,
                'label' => 'Pasikrovimo vieta',
                'funkcija' => 'get_vieta_by_id',
                'stulpas' => 'uzd_pasikrovimo_vietos_id'
            )
        );
    }

    if($stulpo_vardas == "masinu_priekabu_dispatcher_uzdavinys_i_priekabos") {
        $parametrai = array(
            'uzd_pristatymo_data' => array(
                'eil_nr' => 1,
                'active' => 1,
                'substring' => 0,
                'label' => 'Pristatymo data',
                'funkcija' => 'format_date_time',
                'stulpas' => 'uzd_pristatymo_data'
            ),
            'uzd_pristatymo_salis' => array(
                'eil_nr' => 2,
                'active' => 1,
                'substring' => 0,
                'label' => 'Pristatymo šalis',
                'funkcija' => 'get_salis_sutr_by_id',
                'stulpas' => 'uzd_issikrovimo_salis'
            ),
            'uzd_pristatymo_miestas' => array(
                'eil_nr' => 3,
                'active' => 1,
                'substring' => 0,
                'label' => 'Pristatymo miestas',
                'stulpas' => 'uzd_issikrovimo_miestas'
            ),
            'uzd_pristatymo_adresas' => array(
                'eil_nr' => 4,
                'active' => 0,
                'substring' => 0,
                'label' => 'Pristatymo adresas',
                'stulpas' => 'uzd_issikrovimo_adresas'
            ),
            'uzd_issikrovimo_regionas' => array(
                'eil_nr' => 5,
                'active' => 0,
                'substring' => 0,
                'label' => 'Išsikrovimo regionas',
                'stulpas' => 'uzd_issikrovimo_regionas'
            ),
            'uzd_issikrovimo_vietos_id' => array(
                'eil_nr' => 6,
                'active' => 0,
                'substring' => 0,
                'label' => 'Išsikrovimo vieta',
                'funkcija' => 'get_vieta_by_id',
                'stulpas' => 'uzd_issikrovimo_vietos_id'
            )
        );
    }

    if($stulpo_vardas == "masinu_priekabu_dispatcher_uzdavinys_i") {
        $parametrai = array(
            'uzd_pristatymo_data' => array(
                'eil_nr' => 1,
                'active' => 1,
                'substring' => 0,
                'label' => 'Pristatymo data',
                'funkcija' => 'format_date_time',
                'stulpas' => 'uzd_pristatymo_data'
            ),
            'uzd_pristatymo_salis' => array(
                'eil_nr' => 2,
                'active' => 1,
                'substring' => 0,
                'label' => 'Pristatymo šalis',
                'funkcija' => 'get_salis_sutr_by_id',
                'stulpas' => 'uzd_issikrovimo_salis'
            ),
            'uzd_pristatymo_miestas' => array(
                'eil_nr' => 3,
                'active' => 1,
                'substring' => 0,
                'label' => 'Pristatymo miestas',
                'stulpas' => 'uzd_issikrovimo_miestas'
            ),
            'uzd_pristatymo_adresas' => array(
                'eil_nr' => 4,
                'active' => 0,
                'substring' => 0,
                'label' => 'Pristatymo adresas',
                'stulpas' => 'uzd_issikrovimo_adresas'
            ),
            'uzd_issikrovimo_regionas' => array(
                'eil_nr' => 5,
                'active' => 0,
                'substring' => 0,
                'label' => 'Išsikrovimo regionas',
                'stulpas' => 'uzd_issikrovimo_regionas'
            ),
            'uzd_issikrovimo_vietos_id' => array(
                'eil_nr' => 6,
                'active' => 0,
                'substring' => 0,
                'label' => 'Išsikrovimo vieta',
                'funkcija' => 'get_vieta_by_id',
                'stulpas' => 'uzd_issikrovimo_vietos_id'
            )
        );
    }

    if ($stulpo_vardas == "masinu_priekabu_dispatcher_masinos_info") {
        $parametrai = array(
            'masin_masinos_nr' => array(
                'eil_nr' => 1,
                'active' => 1,
                'substring' => 0,
                'label' => 'Mašina',
                'colspan' => '1',
                'stulpas' => 'masin_masinos_nr'
            ),
            'masin_priekaba' => array(
                'eil_nr' => 2,
                'active' => 1,
                'label' => 'Priekaba',
                'colspan' => '1',
                'stulpas' => 'masin_priekaba'
            ),
            'masin_vairuotojas' => array(
                'eil_nr' => 3,
                'active' => 1,
                'substring' => 0,
                'label' => 'Vairuotojas',
                'colspan' => '1',
                'stulpas' => 'masin_vairuotojas'
            ),
            'masin_statusas' => array(
                'eil_nr' => 4,
                'active' => 0,
                'substring' => 0,
                'label' => 'Statusas',
                'colspan' => '1',
                'stulpas' => 'masin_statusas'
            ),
            'masin_siandien_nuvaziuoti_km' => array(
                'eil_nr' => 5,
                'active' => 0,
                'substring' => 0,
                'label' => 'Šiandien nuvažiuoti km',
                'colspan' => '1',
                'stulpas' => 'masin_siandien_nuvaziuoti_km'
            ),
            'masin_sms' => array(
                'eil_nr' => 6,
                'active' => 0,
                'substring' => 0,
                'label' => 'SMS',
                'colspan' => '1',
                'stulpas' => 'masin_sms'
            ),
            'masin_plansete' => array(
                'eil_nr' => 7,
                'active' => 0,
                'substring' => 0,
                'label' => 'Planšetė',
                'colspan' => '1',
                'stulpas' => 'masin_plansete'
            ),
            'masin_pask_vair_atsakas' => array(
                'eil_nr' => 8,
                'active' => 0,
                'substring' => 0,
                'label' => 'Pask. vair. atsakas	',
                'colspan' => '1',
                'stulpas' => 'masin_pask_vair_atsakas'
            ),
            'masin_kiek_liko_dirbti' => array(
                'eil_nr' => 9,
                'active' => 0,
                'substring' => 0,
                'label' => 'Kiek liko dirbti',
                'colspan' => '1',
                'stulpas' => 'masin_kiek_liko_dirbti'
            ),
            'masin_vakar' => array(
                'eil_nr' => 10,
                'active' => 0,
                'substring' => 0,
                'label' => 'Vakar',
                'colspan' => '1',
                'stulpas' => 'masin_vakar'
            ),
            'masin_siandien' => array(
                'eil_nr' => 11,
                'active' => 0,
                'substring' => 0,
                'label' => 'Šiandien',
                'colspan' => '1',
                'stulpas' => 'masin_siandien'
            ),
            'masin_temperatura1' => array(
                'eil_nr' => 12,
                'active' => 0,
                'substring' => 0,
                'label' => 'Temp. 1',
                'colspan' => '1',
                'stulpas' => 'masin_temperatura1'
            ),
            'masin_temperatura2' => array(
                'eil_nr' => 13,
                'active' => 0,
                'substring' => 0,
                'label' => 'Temp. 2',
                'colspan' => '1',
                'stulpas' => 'masin_temperatura2'
            ),
            'vairuotojo_darbo_laiku_info' => array(
                'eil_nr' => 14,
                'active' => 0,
                'label' => 'Rodyti vairuotojo darbo laiku informacija',
                'colspan' => '1',
                'stulpas' => 'vairuotojo_darbo_laiku_info'
            ),
            'custom_stulpas_1' => array(
                'eil_nr' => 15,
                'active' => 0,
                'label' => 'Custom 1',
                'colspan' => '1',
                'stulpas' => 'custom_stulpas_1'
            ),
            'custom_stulpas_2' => array(
                'eil_nr' => 16,
                'active' => 0,
                'label' => 'Custom 2',
                'colspan' => '1',
                'stulpas' => 'custom_stulpas_2'
            ),
            'custom_stulpas_3' => array(
                'eil_nr' => 17,
                'active' => 0,
                'label' => 'Custom 3',
                'colspan' => '1',
                'stulpas' => 'custom_stulpas_3'
            )
        );
    }
    if ($stulpo_vardas == "masinu_priekabu_dispatcher_priekabos_info") {
        $parametrai = array(
            'priekab_priekabos_nr' => array(
                'eil_nr' => 1,
                'active' => 1,
                'substring' => 0,
                'label' => 'Priekaba',
                'colspan' => '1',
                'stulpas' => 'priekab_priekabos_nr'
            ),
            'priekab_masina' => array(
                'eil_nr' => 2,
                'active' => 1,
                'substring' => 0,
                'label' => 'Mašina',
                'colspan' => '1',
                'stulpas' => 'priekab_masina'
            ),
            'priekab_vairuotojas' => array(
                'eil_nr' => 3,
                'active' => 1,
                'substring' => 0,
                'label' => 'Vairuotojas',
                'colspan' => '1',
                'stulpas' => 'priekab_vairuotojas'
            ),
            'custom_stulpas_1' => array(
                'eil_nr' => 4,
                'active' => 0,
                'label' => 'Custom 1',
                'colspan' => '1',
                'stulpas' => 'custom_stulpas_1'
            ),
            'custom_stulpas_2' => array(
                'eil_nr' => 5,
                'active' => 0,
                'label' => 'Custom 2',
                'colspan' => '1',
                'stulpas' => 'custom_stulpas_2'
            ),
            'custom_stulpas_3' => array(
                'eil_nr' => 6,
                'active' => 0,
                'label' => 'Custom 3',
                'colspan' => '1',
                'stulpas' => 'custom_stulpas_3'
            )
        );
    }
    if ($stulpo_vardas == "masinu_priekabu_dispatcher_krovinio_info_masinos") {
        $parametrai = array(
            'kr_pavadinimas' => array(
                'eil_nr' => 1,
                'active' => 0,
                'substring' => 0,
                'label' => 'Krovinio pavadinimas',
                'colspan' => '1',
                'stulpas' => 'kr_pavadinimas'
            ),
            'kr_konteinerio_nr' => array(
                'eil_nr' => 2,
                'active' => 1,
                'substring' => 0,
                'label' => 'Konteinerio nr.',
                'colspan' => '1',
                'stulpas' => 'kr_konteinerio_nr'
            ),
            'kr_konteinerio_tipas' => array(
                'eil_nr' => 3,
                'active' => 1,
                'substring' => 0,
                'label' => 'Konteinerio tipas',
                'colspan' => '1',
                'stulpas' => 'kr_konteinerio_tipas'
            ),
            'kr_svoris_t' => array(
                'eil_nr' => 4,
                'active' => 1,
                'substring' => 0,
                'label' => 'Svoris t.',
                'colspan' => '1',
                'stulpas' => 'kr_svoris_t'
            ),
            'custom_stulpas_1' => array(
                'eil_nr' => 5,
                'active' => 0,
                'label' => 'Custom 1',
                'colspan' => '1',
                'stulpas' => 'custom_stulpas_1'
            ),
            'custom_stulpas_2' => array(
                'eil_nr' => 6,
                'active' => 0,
                'label' => 'Custom 2',
                'colspan' => '1',
                'stulpas' => 'custom_stulpas_2'
            ),
            'custom_stulpas_3' => array(
                'eil_nr' => 7,
                'active' => 0,
                'label' => 'Custom 3',
                'colspan' => '1',
                'stulpas' => 'custom_stulpas_3'
            )
        );
    }
    if ($stulpo_vardas == "masinu_priekabu_dispatcher_krovinio_info_priekabos") {
        $parametrai = array(
            'kr_pavadinimas' => array(
                'eil_nr' => 1,
                'active' => 0,
                'substring' => 0,
                'label' => 'Krovinio pavadinimas',
                'colspan' => '1',
                'stulpas' => 'kr_pavadinimas'
            ),
            'kr_konteinerio_nr' => array(
                'eil_nr' => 2,
                'active' => 1,
                'substring' => 0,
                'label' => 'Konteinerio nr.',
                'colspan' => '1',
                'stulpas' => 'kr_konteinerio_nr'
            ),
            'kr_konteinerio_tipas' => array(
                'eil_nr' => 3,
                'active' => 1,
                'substring' => 0,
                'label' => 'Konteinerio tipas',
                'colspan' => '1',
                'stulpas' => 'kr_konteinerio_tipas'
            ),
            'kr_svoris_t' => array(
                'eil_nr' => 4,
                'active' => 1,
                'substring' => 0,
                'label' => 'Svoris t.',
                'colspan' => '1',
                'stulpas' => 'kr_svoris_t'
            ),
            'custom_stulpas_1' => array(
                'eil_nr' => 5,
                'active' => 0,
                'label' => 'Custom 1',
                'colspan' => '1',
                'stulpas' => 'custom_stulpas_1'
            ),
            'custom_stulpas_2' => array(
                'eil_nr' => 6,
                'active' => 0,
                'label' => 'Custom 2',
                'colspan' => '1',
                'stulpas' => 'custom_stulpas_2'
            ),
            'custom_stulpas_3' => array(
                'eil_nr' => 7,
                'active' => 0,
                'label' => 'Custom 3',
                'colspan' => '1',
                'stulpas' => 'custom_stulpas_3'
            )
        );
    }
    return $parametrai;
}
function atask_pasidaryk_pats_org_pagal_pask_uzdavinius($stulpo_vardas){
    if ($stulpo_vardas == "org_pagal_pask_uzdavinius_masinos_info") {
        $parametrai = array(
            'eil_nr' => array(
                'eil_nr' => 1,
                'active' => 1,
                'label' => 'Eilės nr.',
                'colspan' => '1',
                'stulpas' => 'eil_nr'
            ),
            'masin_masinos_nr_reisas' => array(
                'eil_nr' => 2,
                'active' => 1,
                'substring' => 0,
                'label' => 'Mašina/Reisas',
                'colspan' => '1',
                'stulpas' => 'masin_masinos_nr_reisas'
            ),
            'masin_statusas' => array(
                'eil_nr' => 3,
                'active' => 1,
                'substring' => 0,
                'label' => 'Statusas',
                'colspan' => '1',
                'stulpas' => 'masin_statusas'
            ),
            'masin_siandien_nuvaziuoti_km' => array(
                'eil_nr' => 4,
                'active' => 1,
                'substring' => 0,
                'label' => 'Šiandien nuvažiuoti km',
                'colspan' => '1',
                'stulpas' => 'masin_siandien_nuvaziuoti_km'
            ),
            'masin_sms' => array(
                'eil_nr' => 5,
                'active' => 1,
                'substring' => 0,
                'label' => 'SMS',
                'colspan' => '1',
                'stulpas' => 'masin_sms'
            ),
            'masin_plansete' => array(
                'eil_nr' => 6,
                'active' => 1,
                'substring' => 0,
                'label' => 'Planšetė',
                'colspan' => '1',
                'stulpas' => 'masin_plansete'
            ),
            'masin_pask_vair_atsakas' => array(
                'eil_nr' => 7,
                'active' => 1,
                'substring' => 0,
                'label' => 'Pask. vair. atsakas	',
                'colspan' => '1',
                'stulpas' => 'masin_pask_vair_atsakas'
            ),
            'masin_vairuotojas' => array(
                'eil_nr' => 8,
                'active' => 1,
                'substring' => 0,
                'label' => 'Vairuotojas',
                'colspan' => '1',
                'stulpas' => 'masin_vairuotojas'
            ),
            'masin_kiek_liko_dirbti' => array(
                'eil_nr' => 9,
                'active' => 1,
                'substring' => 0,
                'label' => 'Kiek liko dirbti',
                'colspan' => '1',
                'stulpas' => 'masin_kiek_liko_dirbti'
            ),
            'masin_priekaba' => array(
                'eil_nr' => 10,
                'active' => 1,
                'substring' => 0,
                'label' => 'Priekaba',
                'colspan' => '1',
                'stulpas' => 'masin_priekaba'
            ),
            'masin_vakar' => array(
                'eil_nr' => 11,
                'active' => 1,
                'substring' => 0,
                'label' => 'Vakar',
                'colspan' => '1',
                'stulpas' => 'masin_vakar'
            ),
            'masin_siandien' => array(
                'eil_nr' => 12,
                'active' => 1,
                'substring' => 0,
                'label' => 'Šiandien',
                'colspan' => '1',
                'stulpas' => 'masin_siandien'
            ),
            'masin_temperatura1' => array(
                'eil_nr' => 13,
                'active' => 0,
                'substring' => 0,
                'label' => 'Temp. 1',
                'colspan' => '1',
                'stulpas' => 'masin_temperatura1'
            ),
            'masin_temperatura2' => array(
                'eil_nr' => 14,
                'active' => 0,
                'substring' => 0,
                'label' => 'Temp. 2',
                'colspan' => '1',
                'stulpas' => 'masin_temperatura2'
            ),
            'km_iki_kito_tasko' => array(
                'eil_nr' => 15,
                'active' => 1,
                'substring' => 0,
                'label' => '"Lėktuvo/Google" km. iki sekančio taško',
                'colspan' => '1',
                'stulpas' => 'km_iki_kito_tasko'
            ),
            'vairuotojo_darbo_laiku_info' => array(
                'eil_nr' => 16,
                'active' => 0,
                'label' => 'Rodyti vairuotojo darbo laiku informacija',
                'colspan' => '1',
                'stulpas' => 'vairuotojo_darbo_laiku_info'
            ),
            'custom_stulpas_1' => array(
                'eil_nr' => 17,
                'active' => 0,
                'label' => 'Custom 1',
                'colspan' => '1',
                'stulpas' => 'custom_stulpas_1'
            ),
            'custom_stulpas_2' => array(
                'eil_nr' => 18,
                'active' => 0,
                'label' => 'Custom 2',
                'colspan' => '1',
                'stulpas' => 'custom_stulpas_2'
            ),
            'custom_stulpas_3' => array(
                'eil_nr' => 19,
                'active' => 0,
                'label' => 'Custom 3',
                'colspan' => '1',
                'stulpas' => 'custom_stulpas_3'
            ),
            'standing_warning' => array(
                'eil_nr' => 20,
                'active' => 1,
                'label' => 'Stovėjimo įspėjimai',
                'colspan' => '1',
                'stulpas' => 'standing_warning'
            ),
            'eta_iki_sekancio_st_uzs_td_mapnguide' => array(
                'eil_nr' => 21,
                'active' => 1,
                'label' => 'Sekantis tšk.<br>Map&Guide',
                'colspan' => '1',
                'stulpas' => 'eta_iki_sekancio_st_uzs_td_mapnguide'
            ),
            'nuoroda_isorine_sistema' => array(
                'eil_nr' => 22,
                'active' => 0,
                'label' => 'Nuoroda į išorinę sistemą',
                'colspan' => '1',
                'stulpas' => 'nuoroda_isorine_sistema'
            )
        );
    }
    if ($stulpo_vardas == "org_pagal_pask_uzdavinius_paskutinis") {
        $parametrai = array(
            'fnc_rodyk_temperaturos_ispejima' => array(
                'eil_nr' => 1,
                'active' => 1,
                'substring' => 0,
                'colspan' => 1,
                'label' => 'Temp',
                'funkcija' => 'fnc_rodyk_temperaturos_ispejima',
                'stulpas' => 'fnc_rodyk_temperaturos_ispejima'
            ),
            'fnc_rodyk_uzsakova' => array(
                'eil_nr' => 2,
                'active' => 1,
                'substring' => 0,
                'colspan' => 1,
                'label' => 'Užsakovas',
                'funkcija' => 'fnc_rodyk_uzsakova',
                'stulpas' => 'fnc_rodyk_uzsakova'
            ),
            'fnc_rodyk_uzd_pakr_laika' => array(
                'eil_nr' => 3,
                'active' => 1,
                'substring' => 0,
                'colspan' => 1,
                'label' => 'Pakrovimo laikas',
                'funkcija' => 'fnc_rodyk_uzd_pakr_laika',
                'stulpas' => 'fnc_rodyk_uzd_pakr_laika'
            ),
            'fnc_rodyk_uzd_pakr_vieta' => array(
                'eil_nr' => 4,
                'active' => 1,
                'colspan' => 1,
                'substring' => 0,
                'label' => 'Pakrovimo vieta',
                'funkcija' => 'fnc_rodyk_uzd_pakr_vieta',
                'stulpas' => 'fnc_rodyk_uzd_pakr_vieta'
            ),
            'fnc_rodyk_uzd_iskr_laika' => array(
                'eil_nr' => 5,
                'active' => 1,
                'colspan' => 1,
                'substring' => 0,
                'label' => 'Iškrovimo laikas',
                'funkcija' => 'fnc_rodyk_uzd_iskr_laika',
                'stulpas' => 'fnc_rodyk_uzd_iskr_laika'
            ),
            'fnc_rodyk_uzd_iskr_vieta' => array(
                'eil_nr' => 6,
                'active' => 1,
                'substring' => 0,
                'colspan' => 1,
                'label' => 'Iškrovimo vieta',
                'funkcija' => 'fnc_rodyk_uzd_iskr_vieta',
                'stulpas' => 'fnc_rodyk_uzd_iskr_vieta'
            ),
            'fnc_rodyk_route_statusas' => array(
                'eil_nr' => 7,
                'active' => 1,
                'substring' => 0,
                'colspan' => 1,
                'label' => 'Statusas',
                'funkcija' => 'fnc_rodyk_route_statusas',
                'stulpas' => 'statusas'
            ),
            'fnc_rodyk_kel_lapa' => array(
                'eil_nr' => 8,
                'active' => 0,
                'substring' => 0,
                'colspan' => 1,
                'label' => 'Kelionės lapas',
                'funkcija' => 'fnc_rodyk_kel_lapa',
                'stulpas' => 'fnc_rodyk_kel_lapa'
            ),
            'fnc_rodyk_krovinio_info' => array(
                'eil_nr' => 9,
                'active' => 0,
                'substring' => 0,
                'colspan' => 1,
                'label' => 'Krovinio info',
                'funkcija' => 'fnc_rodyk_krovinio_info',
                'stulpas' => 'fnc_rodyk_krovinio_info'
            ),
            'fnc_rodyk_uzsakymas_before' => array(
                'eil_nr' => 10,
                'active' => 0,
                'substring' => 0,
                'colspan' => 1,
                'label' => 'Buvę užsak.',
                'funkcija' => 'fnc_rodyk_uzsakymas_before',
                'stulpas' => 'fnc_rodyk_uzsakymas_before'
            ),
            'fnc_rodyk_sekanti_uzsak' => array(
                'eil_nr' => 11,
                'active' => 0,
                'substring' => 0,
                'colspan' => 1,
                'label' => 'Sekantį užsak',
                'funkcija' => 'fnc_rodyk_sekanti_uzsak',
                'stulpas' => 'fnc_rodyk_sekanti_uzsak'
            ),
            'fnc_rodyk_tik_trailer' => array(
                'eil_nr' => 12,
                'active' => 0,
                'substring' => 0,
                'colspan' => 1,
                'label' => 'Priekaba',
                'funkcija' => 'fnc_rodyk_tik_trailer',
                'stulpas' => 'fnc_rodyk_tik_trailer'
            ),
            'fnc_rodyk_tik_vairuotoja' => array(
                'eil_nr' => 13,
                'active' => 0,
                'substring' => 0,
                'colspan' => 1,
                'label' => 'Vairuotojas',
                'funkcija' => 'fnc_rodyk_tik_vairuotoja',
                'stulpas' => 'fnc_rodyk_tik_vairuotoja'
            ),
            'fnc_rodyk_tik_vilkika' => array(
                'eil_nr' => 14,
                'active' => 0,
                'substring' => 0,
                'colspan' => 1,
                'label' => 'Mašina',
                'funkcija' => 'fnc_rodyk_tik_vilkika',
                'stulpas' => 'fnc_rodyk_tik_vilkika'
            ),
            'fnc_rodyk_vilkika' => array(
                'eil_nr' => 15,
                'active' => 0,
                'substring' => 0,
                'colspan' => 1,
                'label' => 'Mašina ir statusas',
                'funkcija' => 'fnc_rodyk_vilkika',
                'stulpas' => 'fnc_rodyk_vilkika'
            ),
            'fnc_rodyk_trailer' => array(
                'eil_nr' => 16,
                'active' => 0,
                'substring' => 0,
                'colspan' => 1,
                'label' => 'Priekaba ir statusas',
                'funkcija' => 'fnc_rodyk_trailer',
                'stulpas' => 'fnc_rodyk_trailer'
            ),
            'fnc_rodyk_vairuotoja' => array(
                'eil_nr' => 17,
                'active' => 0,
                'substring' => 0,
                'colspan' => 1,
                'label' => 'Vairuotojas ir statusas',
                'funkcija' => 'fnc_rodyk_vairuotoja',
                'stulpas' => 'fnc_rodyk_vairuotoja'
            ),
            'fnc_rodyk_vadybininka' => array(
                'eil_nr' => 18,
                'active' => 0,
                'substring' => 0,
                'colspan' => 1,
                'label' => 'Vadybininkas',
                'funkcija' => 'fnc_rodyk_vadybininka',
                'stulpas' => 'fnc_rodyk_vadybininka'
            ),
            'fnc_rodyk_cmr_temperature' => array(
                'eil_nr' => 19,
                'active' => 0,
                'substring' => 0,
                'colspan' => 1,
                'label' => 'CMR Temp.',
                'funkcija' => 'fnc_rodyk_cmr_temperature',
                'stulpas' => 'fnc_rodyk_cmr_temperature'
            ),
            'fnc_rodyk_rezimo_tipa' => array(
                'eil_nr' => 20,
                'active' => 0,
                'substring' => 0,
                'colspan' => 1,
                'label' => 'Režimo tipas',
                'funkcija' => 'fnc_rodyk_rezimo_tipa',
                'stulpas' => 'fnc_rodyk_rezimo_tipa'
            ),
            'fnc_rodyk_temperaturos_paklaida' => array(
                'eil_nr' => 21,
                'active' => 0,
                'substring' => 0,
                'colspan' => 1,
                'label' => 'Temp. paklaida (+-)',
                'funkcija' => 'fnc_rodyk_temperaturos_paklaida',
                'stulpas' => 'fnc_rodyk_temperaturos_paklaida'
            ),
            'fnc_rodyk_faktine_temperatura' => array(
                'eil_nr' => 22,
                'active' => 0,
                'substring' => 0,
                'colspan' => 1,
                'label' => 'Faktinė temperatūra',
                'funkcija' => 'fnc_rodyk_faktine_temperatura',
                'stulpas' => 'fnc_rodyk_faktine_temperatura'
            )
        );
    }
    if ($stulpo_vardas == "org_pagal_pask_uzdavinius_pasikrovimas") {
        $parametrai = array(
            'pakr_salis' => array(
                'eil_nr' => 1,
                'active' => 1,
                'substring' => 5,
                'label' => 'Pasikrovimo šalis',
                'funkcija' => 'get_salis_sutr_by_id',
                'stulpas' => 'salis'
            ),
            'pakr_miestas2' => array(
                'eil_nr' => 2,
                'active' => 1,
                'substring' => 5,
                'label' => 'Pasikrovimo miestas',
                'stulpas' => 'miestas'
            ),
            'pakr_regionas' => array(
                'eil_nr' => 3,
                'active' => 1,
                'substring' => 5,
                'label' => 'Pasikrovimo regionas',
                'stulpas' => 'regionas'
            ),
            'pakr_adresas' => array(
                'eil_nr' => 4,
                'active' => 1,
                'substring' => 5,
                'label' => 'Pasikrovimo adresas',
                'stulpas' => 'adresas'
            ),
            'pakr_iskr_vieta' => array(
                'eil_nr' => 5,
                'active' => 1,
                'substring' => 5,
                'label' => 'Pasikrovimo vieta',
                'funkcija' => 'get_vieta_by_id',
                'stulpas' => 'pakr_iskr_vieta'
            ),
        );
    }
    if ($stulpo_vardas == "org_pagal_pask_uzdavinius_issikrovimas") {
        $parametrai = array(
            'iskr_salis' => array(
                'eil_nr' => 1,
                'active' => 1,
                'substring' => 5,
                'label' => 'Išsikrovimo šalis',
                'funkcija' => 'get_salis_sutr_by_id',
                'stulpas' => 'salis'
            ),
            'iskr_miestas' => array(
                'eil_nr' => 2,
                'active' => 1,
                'substring' => 5,
                'label' => 'Išsikrovimo miestas',
                'stulpas' => 'miestas'
            ),
            'iskr_regionas' => array(
                'eil_nr' => 3,
                'active' => 1,
                'substring' => 5,
                'label' => 'Išsikrovimo regionas',
                'stulpas' => 'regionas'
            ),
            'iskr_adresas' => array(
                'eil_nr' => 4,
                'active' => 1,
                'substring' => 5,
                'label' => 'Išsikrovimo adresas',
                'stulpas' => 'adresas'
            ),
            'uzd_iskr_vietos_id' => array(
                'eil_nr' => 5,
                'active' => 1,
                'substring' => 5,
                'label' => 'Išsikrovimo vieta',
                'funkcija' => 'get_vieta_by_id',
                'stulpas' => 'pakr_iskr_vieta'
            ),
        );
    }
    if ($stulpo_vardas == "org_pagal_pask_uzdavinius_pasikrovimas_nepriskirtiem") {
        $parametrai = array(
            'pakr_salis' => array(
                'eil_nr' => 1,
                'active' => 1,
                'substring' => 5,
                'label' => 'Pasikrovimo šalis',
                'funkcija' => 'get_salis_sutr_by_id',
                'stulpas' => 'pakr_salis'
            ),
            'pakr_miestas' => array(
                'eil_nr' => 2,
                'active' => 1,
                'substring' => 5,
                'label' => 'Pasikrovimo miestas',
                'stulpas' => 'pakr_miestas'
            ),
            'pakr_regionas' => array(
                'eil_nr' => 3,
                'active' => 1,
                'substring' => 5,
                'label' => 'Pasikrovimo regionas',
                'stulpas' => 'pakr_regionas'
            ),
            'pakr_adresas' => array(
                'eil_nr' => 4,
                'active' => 1,
                'substring' => 5,
                'label' => 'Pasikrovimo adresas',
                'stulpas' => 'pakr_adresas'
            ),
            'pakr_iskr_vieta' => array(
                'eil_nr' => 5,
                'active' => 1,
                'substring' => 5,
                'label' => 'Pasikrovimo vieta',
                'funkcija' => 'get_vieta_by_id',
                'stulpas' => 'pakr_vietos_id'
            ),
        );
    }
    if ($stulpo_vardas == "org_pagal_pask_uzdavinius_issikrovimas_nepriskirtiem") {
        $parametrai = array(
            'iskr_salis' => array(
                'eil_nr' => 1,
                'active' => 1,
                'substring' => 5,
                'label' => 'Išsikrovimo šalis',
                'funkcija' => 'get_salis_sutr_by_id',
                'stulpas' => 'iskr_salis'
            ),
            'iskr_miestas' => array(
                'eil_nr' => 2,
                'active' => 1,
                'substring' => 5,
                'label' => 'Išsikrovimo miestas',
                'stulpas' => 'iskr_miestas'
            ),
            'iskr_regionas' => array(
                'eil_nr' => 3,
                'active' => 1,
                'substring' => 5,
                'label' => 'Išsikrovimo regionas',
                'stulpas' => 'iskr_regionas'
            ),
            'iskr_adresas' => array(
                'eil_nr' => 4,
                'active' => 1,
                'substring' => 5,
                'label' => 'Išsikrovimo adresas',
                'stulpas' => 'iskr_adresas'
            ),
            'uzd_iskr_vietos_id' => array(
                'eil_nr' => 5,
                'active' => 1,
                'substring' => 5,
                'label' => 'Išsikrovimo vieta',
                'funkcija' => 'get_vieta_by_id',
                'stulpas' => 'iskr_vietos_id'
            ),
        );
    }
    return $parametrai;
}

//custom funckijos pagalba galima replacint ir egzistuojanciu stulpu reiksmes
//aprasius custom funkciją returnint value td tage kaip pvz:
//custom funkciju cia nekist, deti i configa - cia tik pvz
//function custom1_lauko_ataskaitoje_funkcija_pvz($arr,$rowspan){
//    return "<td rowspan=$rowspan>".$arr[route_pavadinimas]."</td>";
//}

//function pakeisk_datu_spalva($data){
//    global $separator_for_date;
//    $data = format_date_time_metai_pilnai($data);
//    if ($separator_for_date) {
//        $sep_for_date = $separator_for_date;
//    } else {
//        $sep_for_date = ".";
//    }
//    $date_today = date("Y" . $sep_for_date . "m" . $sep_for_date . "d");
//    $date_tomorrow = date("Y" . $sep_for_date . "m" . $sep_for_date . "d", strtotime("+1 day"));
//
//    if (strpos($data, $date_today) !== false) {
//        $return_string = "<font color='red'><b>" . $data . "</b></font>";
//    } else if (strpos($data, $date_tomorrow) !== false) {
//        $return_string = "<font color='blue'><b>" . $data . "</b></font>";
//    } else {
//        $return_string = $data;
//    }
//    return $return_string;
//}
