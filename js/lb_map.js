jQuery(document).ready(function ($) {
    $('.selectCidades').change(function () {
        var data = $(this).val();
        console.log(data);
    });
});