var jQ = $.noConflict(true);
jQ(document).ready(function() {
    var number = 1 + Math.floor(Math.random() * 999999999);
    jQ("input[name='invoice_id']").val(number);
});