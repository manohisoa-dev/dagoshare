$(document).ready(function () {
    if($('.form-validation').length){
        $(".form-validation").validate();
    }

    if($('.chosen-select').length){
        $(".chosen-select").chosen();
    }

    if($('.clockpicker').length){
        $('.clockpicker').clockpicker();
    }
});