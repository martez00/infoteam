    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <!-- Bootstrap core CSS-->
    <link href="<?php echo $GLOBALS['url_path']; ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="<?php echo $GLOBALS['url_path']; ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="<?php echo $GLOBALS['url_path']; ?>vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo $GLOBALS['url_path']; ?>css/sb-admin.css" rel="stylesheet">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" />

    <script>
        function print_table(value){
            var mywindow = window.open('', '', '');
            mywindow.document.write('<html><title>InfoTeam - spauzdinimas</title><body>');
            console.log(document.getElementById(value).innerHTML);
            var lenta = document.getElementById(value).innerHTML;
            var i = lenta.indexOf('<t');
            var j = lenta.indexOf('</table>');
            lenta = lenta.substring(i, j) + "</table>";
            mywindow.document.write(lenta);
            mywindow.document.write('</body></html>');
            mywindow.document.close();
            mywindow.print();
            return true;
        }
    </script>