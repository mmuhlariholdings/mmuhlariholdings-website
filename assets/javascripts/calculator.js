$(document).ready(function () {
    var estimate = 0;
    $(".estimate-display").text((estimate).toLocaleString('en-ZAR', { style: 'currency', currency: 'ZAR' }));
    $('.radio-options').change(function () {
        estimate = 0;
        $(".radio-options:checked").each(function () {
            var value = parseInt($(this).val());
            estimate = estimate + value;
            var currency = (estimate).toLocaleString('en-ZAR', { style: 'currency', currency: 'ZAR' });
            $(".estimate-display").text(currency);
        });
    });
});