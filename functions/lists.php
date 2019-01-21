<?php
function if_working_list($value, $get_value = false){

    if(!isset($value))
        $value=0;

    $list = "<option value='0' ";
    if ($value==0) {
        $list .= "selected";
        $return_value="Ne";
    }
    $list .= ">Ne</option>";

    $list .= "<option value='1' ";
    if ($value==1) {
        $list .= "selected";
        $return_value="Taip";
    }
    $list .= ">Taip</option>";

    if($get_value==true)
        return $return_value;
    else return $list;
}
function positions_in_club_list($value, $get_value = false){

    if(!isset($value))
        $value=0;

    $list = "<option value='0' ";
    if ($value==0) {
        $list .= "selected";
        $return_value="";
    }
    $list .= ">...</option>";

    $list .= "<option value='1' ";
    if ($value==1) {
        $list .= "selected";
        $return_value="Buhalteris";
    }
    $list .= ">Buhalteris</option>";

    $list .= "<option value='2' ";
    if ($value==2) {
        $list .= "selected";
        $return_value="Treneris";
    }
    $list .= ">Treneris</option>";

    $list .= "<option value='3' ";
    if ($value==3) {
        $list .= "selected";
        $return_value="Skautas";
    }
    $list .= ">Skautas</option>";

    $list .= "<option value='4'";
    if ($value==4) {
        $list .= "selected";
        $return_value="Aprūpinimo skyrius";
    }
    $list .= ">Aprūpinimo skyrius</option>";

    $list .= "<option value='5'";
    if ($value==5) {
        $list .= "selected";
        $return_value="Administratorius";
    }
    $list .= ">Administratorius</option>";

    if($get_value==true)
        return $return_value;
    else return $list;
}
function positions_list($value, $get_value = false){

    if(!isset($value))
        $value=0;

    $list = "<option value='0' ";
    if ($value==0) {
        $list .= "selected";
        $return_value="";
    }
    $list .= ">...</option>";

    $list .= "<option value='1' ";
    if ($value==1) {
        $list .= "selected";
        $return_value="Vartininkas";
    }
    $list .= ">Vartininkas</option>";

    $list .= "<option value='2' ";
    if ($value==2) {
        $list .= "selected";
        $return_value="Gynėjas";
    }
    $list .= ">Gynėjas</option>";

    $list .= "<option value='3' ";
    if ($value==3) {
        $list .= "selected";
        $return_value="Saugas";
    }
    $list .= ">Saugas</option>";

    $list .= "<option value='4'";
    if ($value==4) {
        $list .= "selected";
        $return_value="Puolėjas";
    }
    $list .= ">Puolėjas</option>";

    if($get_value==true)
        return $return_value;
    else return $list;
}

function applications_status_list($value, $get_value = false){

    if(!isset($value))
        $value=0;

    $list = "<option value='0' ";
    if ($value==0) {
        $list .= "selected";
        $return_value="Naujas";
    }
    $list .= ">Naujas</option>";

    $list .= "<option value='1' ";
    if ($value==1) {
        $list .= "selected";
        $return_value="Patvirtintas";
    }
    $list .= ">Patvirtintas</option>";

    $list .= "<option value='2' ";
    if ($value==2) {
        $list .= "selected";
        $return_value="Atidėtas";
    }
    $list .= ">Atidėtas</option>";

    $list .= "<option value='3' ";
    if ($value==3) {
        $list .= "selected";
        $return_value="Atmestas";
    }
    $list .= ">Atmestas</option>";

    if($get_value==true)
        return $return_value;
    else return $list;
}

function countries_list($value){
    $country_array = array(
        "AF" => "Afghanistan",
        "AL" => "Albania",
        "DZ" => "Algeria",
        "AS" => "American Samoa",
        "AD" => "Andorra",
        "AO" => "Angola",
        "AI" => "Anguilla",
        "AQ" => "Antarctica",
        "AG" => "Antigua and Barbuda",
        "AR" => "Argentina",
        "AM" => "Armenia",
        "AW" => "Aruba",
        "AU" => "Australia",
        "AT" => "Austria",
        "AZ" => "Azerbaijan",
        "BS" => "Bahamas",
        "BH" => "Bahrain",
        "BD" => "Bangladesh",
        "BB" => "Barbados",
        "BY" => "Belarus",
        "BE" => "Belgium",
        "BZ" => "Belize",
        "BJ" => "Benin",
        "BM" => "Bermuda",
        "BT" => "Bhutan",
        "BO" => "Bolivia",
        "BA" => "Bosnia and Herzegovina",
        "BW" => "Botswana",
        "BV" => "Bouvet Island",
        "BR" => "Brazil",
        "BQ" => "British Antarctic Territory",
        "IO" => "British Indian Ocean Territory",
        "VG" => "British Virgin Islands",
        "BN" => "Brunei",
        "BG" => "Bulgaria",
        "BF" => "Burkina Faso",
        "BI" => "Burundi",
        "KH" => "Cambodia",
        "CM" => "Cameroon",
        "CA" => "Canada",
        "CT" => "Canton and Enderbury Islands",
        "CV" => "Cape Verde",
        "KY" => "Cayman Islands",
        "CF" => "Central African Republic",
        "TD" => "Chad",
        "CL" => "Chile",
        "CN" => "China",
        "CX" => "Christmas Island",
        "CC" => "Cocos [Keeling] Islands",
        "CO" => "Colombia",
        "KM" => "Comoros",
        "CG" => "Congo - Brazzaville",
        "CD" => "Congo - Kinshasa",
        "CK" => "Cook Islands",
        "CR" => "Costa Rica",
        "HR" => "Croatia",
        "CU" => "Cuba",
        "CY" => "Cyprus",
        "CZ" => "Czech Republic",
        "CI" => "Côte d’Ivoire",
        "DK" => "Denmark",
        "DJ" => "Djibouti",
        "DM" => "Dominica",
        "DO" => "Dominican Republic",
        "NQ" => "Dronning Maud Land",
        "DD" => "East Germany",
        "EC" => "Ecuador",
        "EG" => "Egypt",
        "SV" => "El Salvador",
        "GQ" => "Equatorial Guinea",
        "ER" => "Eritrea",
        "EE" => "Estonia",
        "ET" => "Ethiopia",
        "FK" => "Falkland Islands",
        "FO" => "Faroe Islands",
        "FJ" => "Fiji",
        "FI" => "Finland",
        "FR" => "France",
        "GF" => "French Guiana",
        "PF" => "French Polynesia",
        "TF" => "French Southern Territories",
        "FQ" => "French Southern and Antarctic Territories",
        "GA" => "Gabon",
        "GM" => "Gambia",
        "GE" => "Georgia",
        "DE" => "Germany",
        "GH" => "Ghana",
        "GI" => "Gibraltar",
        "GR" => "Greece",
        "GL" => "Greenland",
        "GD" => "Grenada",
        "GP" => "Guadeloupe",
        "GU" => "Guam",
        "GT" => "Guatemala",
        "GG" => "Guernsey",
        "GN" => "Guinea",
        "GW" => "Guinea-Bissau",
        "GY" => "Guyana",
        "HT" => "Haiti",
        "HM" => "Heard Island and McDonald Islands",
        "HN" => "Honduras",
        "HK" => "Hong Kong SAR China",
        "HU" => "Hungary",
        "IS" => "Iceland",
        "IN" => "India",
        "ID" => "Indonesia",
        "IR" => "Iran",
        "IQ" => "Iraq",
        "IE" => "Ireland",
        "IM" => "Isle of Man",
        "IL" => "Israel",
        "IT" => "Italy",
        "JM" => "Jamaica",
        "JP" => "Japan",
        "JE" => "Jersey",
        "JT" => "Johnston Island",
        "JO" => "Jordan",
        "KZ" => "Kazakhstan",
        "KE" => "Kenya",
        "KI" => "Kiribati",
        "KW" => "Kuwait",
        "KG" => "Kyrgyzstan",
        "LA" => "Laos",
        "LV" => "Latvia",
        "LB" => "Lebanon",
        "LS" => "Lesotho",
        "LR" => "Liberia",
        "LY" => "Libya",
        "LI" => "Liechtenstein",
        "LT" => "Lithuania",
        "LU" => "Luxembourg",
        "MO" => "Macau SAR China",
        "MK" => "Macedonia",
        "MG" => "Madagascar",
        "MW" => "Malawi",
        "MY" => "Malaysia",
        "MV" => "Maldives",
        "ML" => "Mali",
        "MT" => "Malta",
        "MH" => "Marshall Islands",
        "MQ" => "Martinique",
        "MR" => "Mauritania",
        "MU" => "Mauritius",
        "YT" => "Mayotte",
        "FX" => "Metropolitan France",
        "MX" => "Mexico",
        "FM" => "Micronesia",
        "MI" => "Midway Islands",
        "MD" => "Moldova",
        "MC" => "Monaco",
        "MN" => "Mongolia",
        "ME" => "Montenegro",
        "MS" => "Montserrat",
        "MA" => "Morocco",
        "MZ" => "Mozambique",
        "MM" => "Myanmar [Burma]",
        "NA" => "Namibia",
        "NR" => "Nauru",
        "NP" => "Nepal",
        "NL" => "Netherlands",
        "AN" => "Netherlands Antilles",
        "NT" => "Neutral Zone",
        "NC" => "New Caledonia",
        "NZ" => "New Zealand",
        "NI" => "Nicaragua",
        "NE" => "Niger",
        "NG" => "Nigeria",
        "NU" => "Niue",
        "NF" => "Norfolk Island",
        "KP" => "North Korea",
        "VD" => "North Vietnam",
        "MP" => "Northern Mariana Islands",
        "NO" => "Norway",
        "OM" => "Oman",
        "PC" => "Pacific Islands Trust Territory",
        "PK" => "Pakistan",
        "PW" => "Palau",
        "PS" => "Palestinian Territories",
        "PA" => "Panama",
        "PZ" => "Panama Canal Zone",
        "PG" => "Papua New Guinea",
        "PY" => "Paraguay",
        "YD" => "People's Democratic Republic of Yemen",
        "PE" => "Peru",
        "PH" => "Philippines",
        "PN" => "Pitcairn Islands",
        "PL" => "Poland",
        "PT" => "Portugal",
        "PR" => "Puerto Rico",
        "QA" => "Qatar",
        "RO" => "Romania",
        "RU" => "Russia",
        "RW" => "Rwanda",
        "RE" => "Réunion",
        "BL" => "Saint Barthélemy",
        "SH" => "Saint Helena",
        "KN" => "Saint Kitts and Nevis",
        "LC" => "Saint Lucia",
        "MF" => "Saint Martin",
        "PM" => "Saint Pierre and Miquelon",
        "VC" => "Saint Vincent and the Grenadines",
        "WS" => "Samoa",
        "SM" => "San Marino",
        "SA" => "Saudi Arabia",
        "SN" => "Senegal",
        "RS" => "Serbia",
        "CS" => "Serbia and Montenegro",
        "SC" => "Seychelles",
        "SL" => "Sierra Leone",
        "SG" => "Singapore",
        "SK" => "Slovakia",
        "SI" => "Slovenia",
        "SB" => "Solomon Islands",
        "SO" => "Somalia",
        "ZA" => "South Africa",
        "GS" => "South Georgia and the South Sandwich Islands",
        "KR" => "South Korea",
        "ES" => "Spain",
        "LK" => "Sri Lanka",
        "SD" => "Sudan",
        "SR" => "Suriname",
        "SJ" => "Svalbard and Jan Mayen",
        "SZ" => "Swaziland",
        "SE" => "Sweden",
        "CH" => "Switzerland",
        "SY" => "Syria",
        "ST" => "São Tomé and Príncipe",
        "TW" => "Taiwan",
        "TJ" => "Tajikistan",
        "TZ" => "Tanzania",
        "TH" => "Thailand",
        "TL" => "Timor-Leste",
        "TG" => "Togo",
        "TK" => "Tokelau",
        "TO" => "Tonga",
        "TT" => "Trinidad and Tobago",
        "TN" => "Tunisia",
        "TR" => "Turkey",
        "TM" => "Turkmenistan",
        "TC" => "Turks and Caicos Islands",
        "TV" => "Tuvalu",
        "UM" => "U.S. Minor Outlying Islands",
        "PU" => "U.S. Miscellaneous Pacific Islands",
        "VI" => "U.S. Virgin Islands",
        "UG" => "Uganda",
        "UA" => "Ukraine",
        "SU" => "Union of Soviet Socialist Republics",
        "AE" => "United Arab Emirates",
        "GB" => "United Kingdom",
        "US" => "United States",
        "ZZ" => "Unknown or Invalid Region",
        "UY" => "Uruguay",
        "UZ" => "Uzbekistan",
        "VU" => "Vanuatu",
        "VA" => "Vatican City",
        "VE" => "Venezuela",
        "VN" => "Vietnam",
        "WK" => "Wake Island",
        "WF" => "Wallis and Futuna",
        "EH" => "Western Sahara",
        "YE" => "Yemen",
        "ZM" => "Zambia",
        "ZW" => "Zimbabwe",
        "AX" => "Åland Islands",
    );
    if(!isset($value))
        $value="";

    $list = "<option value='' ";
    if ($value=="") {
        $list .= "selected";
    }
    $list .= ">...</option>";
    foreach ($country_array as $key=>$country_value){
        $list .= "<option value='$country_value' ";
        if ($value==$country_value) {
            $list .= "selected";
        }
        $list .= ">$country_value ($key)</option>";
    }
    return $list;
}

function roles_list($value, $get_value = false, $mysqli){
    $roles=mfa_kaip_array($mysqli, "SELECT * from positions");
    if(!isset($value))
        $value="";
    $list = "<option value='NULL' ";
    if ($value=="") {
        $list .= "selected";
    }
    $list .= ">...</option>";
    foreach ($roles as $role){
        $list .= "<option value='".$role['id']."' ";
        if ($value==$role['id']) {
            $list .= "selected";
            $return_value = $role['position_name'];
        }
        $list .= ">".$role['position_name']."</option>";
    }
    if($get_value==true)
        return $return_value;
    else return $list;
}