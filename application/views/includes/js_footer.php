<input type="hidden" id="base_url_hidden" value="<?php echo base_url(); ?>" />
<?php
$success = $this->session->flashdata("show_success");
$warning = $this->session->flashdata("show_warning");
$error = $this->session->flashdata("show_error");
$info = $this->session->flashdata("show_info");
?>
<input type="hidden" id="show_success_hidden" value="<?php echo (isset($success)) ? $success : ""; ?>" />
<input type="hidden" id="show_error_hidden" value="<?php echo (isset($error)) ? $error : ""; ?>"  />
<input type="hidden" id="show_warning_hidden" value="<?php echo (isset($warning)) ? $warning : ""; ?>"  />
<input type="hidden" id="show_info_hidden" value="<?php echo (isset($info)) ? $info : ""; ?>"  />

<!-- jQuery 2.1.3 -->
<script src="<?php echo base_url('bower_components/jquery/jQuery-2.1.3.min.js') ?>"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="<?php echo base_url('bower_components/bootstrap/dist/js/bootstrap.min.js') ?>" type="text/javascript"></script>
<!-- SlimScroll -->
<!--<script src="<?php echo base_url('bower_components/slimScroll/jquery.slimScroll.min.js') ?>" type="text/javascript"></script>-->
<!-- FastClick -->
<script src="<?php echo base_url('bower_components/fastclick/fastclick.min.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('dist/js/app.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('bower_components/toastr/toastr.min.js') ?>"></script>
<script src="<?php echo base_url('dist/js/custom_js.js') ?>"></script>

<script src="<?php echo base_url('bower_components/bootbox/bootbox.js') ?>"></script>

<script src="<?php echo base_url('bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js') ?>"></script>

<script src="<?php echo base_url('bower_components/iCheck/icheck.min.js') ?>"></script>

<script src="<?php echo base_url('bower_components/datatables/media/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('dist/js/dataTables.bootstrap.js') ?>"></script>

<script src="<?php echo base_url('bower_components/jquery-validation/dist/jquery.validate.min.js') ?>"></script>
<script src="<?php echo base_url('bower_components/angular/angular.min.js') ?>"></script>
<script>
    // override jquery validate plugin defaults
    $.validator.setDefaults({
        highlight: function (element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function (element) {
            $(element).closest('.form-group').removeClass('has-error');
        },
        errorElement: 'span',
        errorClass: 'help-block',
        errorPlacement: function (error, element) {
            if (element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        }
    });
</script>