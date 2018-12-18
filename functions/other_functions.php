<?php
function return_applications_table($prasymai)
{
    $text = "";
    $text = "<div class=\"table-responsive\">
                        <table class=\"table table-bordered\" id=\"dataTable\" width=\"100%\" cellspacing=\"0\">
                            <thead>
                            <tr>
                                <th></th>
                                <th>Vardas</th>
                                <th>Pavardė</th>
                                <th>Šalis</th>
                                <th>Pozicija</th>
                                <th>Gimimo data</th>
                                <th>Prašymo data</th>
                            </tr>
                            </thead>
                            <tbody>";

    if (is_array($prasymai) || is_object($prasymai)) {
        foreach ($prasymai as $prasymas) {
            $text .= "<tr>
<td><a class='btn btn-block btn-danger' href='" . $GLOBALS['url_path'] . "applications/edit_application.php?id=".$prasymas['id']."'>REDAGUOTI</a></td>
<td>" . $prasymas['name'] . "</td>
<td>" . $prasymas['surname'] . "</td>
<td>" . $prasymas['country'] . "</td>
<td>" . positions_list($prasymas['position_in_field'], true) . "</td>
<td>" . $prasymas['birth_date'] . "</td>
<td>" . $prasymas['created_date'] . "</td>
</tr>";
        }
    }
    $text .= " </tbody>
                        </table>
                    </div>";
    return $text;
}