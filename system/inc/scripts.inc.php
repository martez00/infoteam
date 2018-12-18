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
        toastr.options = {
            positionClass: 'toast-top-center'
        };

       $( "#datepicker" ).datepicker(
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


            });
        });
    } );

    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
