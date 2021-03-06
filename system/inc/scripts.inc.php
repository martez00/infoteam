<!-- Bootstrap core JavaScript-->
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo $GLOBALS['url_path']; ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script type="text/javascript" src="<?php echo $GLOBALS['url_path']; ?>vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Custom scripts for all pages-->
<script type="text/javascript" src="<?php echo $GLOBALS['url_path']; ?>js/sb-admin.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<!-- Page level plugin JavaScript-->
<script src="<?php echo $GLOBALS['url_path']; ?>vendor/datatables/jquery.dataTables.js"></script>
<script src="<?php echo $GLOBALS['url_path']; ?>vendor/datatables/dataTables.bootstrap4.js"></script>

<!-- Demo scripts for this page-->
<script src="<?php echo $GLOBALS['url_path']; ?>js/demo/datatables-demo.js"></script>
<script type="text/javascript">
    $( function() {
        $('.form-control').on('input', function(e){
            var value = this.value;
            var exist_quotes_single = value.search("'");
            var exist_quotes_double = value.search("\"");
            if(exist_quotes_single!='-1' || exist_quotes_double!='-1'){
                if(exist_quotes_single!='-1') {
                    value = value.replace("'", "");
                }
                if(exist_quotes_double!='-1')
                    value = value.replace("\"", "");
                this.value = value;
                toastr.error("Kabučių naudojimas programoje negalimas!");
            }
        });

        toastr.options = {
            positionClass: 'toast-top-center'
        };

       $( ".datepicker" ).datepicker(
            { dateFormat: 'yy-mm-dd' }
        );

        $("form :input").each(function(){
            var input = $(this);
            var msg   = "Privalote įvesti šį lauką!";
            input.on('change invalid input', function(){
                input[0].setCustomValidity('');
                if(!(input[0].validity.tooLong || input[0].validity.tooShort)){
                    if (! input[0].validity.valid) {
                        input[0].setCustomValidity(msg);
                    }
                }
                if(input[0].validity.tooShort){
                    input[0].setCustomValidity('Privalote įvesti bent 6 skaitmenų slaptažodį.');
                }
            });
        });
    } );

    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });

    function print_table(value){
        var mywindow = window.open('', '', '');
        mywindow.document.write('<html><title>InfoTeam - spausdinimas</title><body>');
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

    function set_page(page_number){
        document.getElementById("page").value=page_number;
        $('input[type=submit]').click();
    }
</script>
