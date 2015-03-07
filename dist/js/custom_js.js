function base_url(url) {
    var base = document.getElementById('base_url_hidden').value;
    if (typeof (url) != "undefined") {
        return base + '' + url;
    }
    else {
        return base;
    }
}

function show_success(msg) {
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };
    toastr.success(msg);
}

function show_error(msg) {
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };
    toastr.error(msg);
}

function show_warning(msg) {
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };
    toastr.warning(msg);
}

function show_info(msg) {
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };
    toastr.info(msg);
}

$(document).ready(function () {
   
   var flash_success_msg = document.getElementById('show_success_hidden').value.trim();
   if(flash_success_msg!=""){
       show_success(flash_success_msg);
   }
   
   var flash_error_msg = document.getElementById('show_error_hidden').value.trim();
   if(flash_error_msg!=""){
       show_error(flash_error_msg);
   }
   
   var flash_warning_msg = document.getElementById('show_warning_hidden').value.trim();
   if(flash_warning_msg!=""){
       show_warning(flash_warning_msg);
   }
   
   var flash_info_msg = document.getElementById('show_info_hidden').value.trim();
   if(flash_info_msg!=""){
       show_info(flash_info_msg);
   }
   
});