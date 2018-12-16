<!-- Bootstrap core JavaScript-->
<script src="<?php echo $GLOBALS['url_path']; ?>vendor/jquery/jquery.min.js"></script>
<script src="<?php echo $GLOBALS['url_path']; ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo $GLOBALS['url_path']; ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo $GLOBALS['url_path']; ?>js/sb-admin.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $( function() {
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
</script>