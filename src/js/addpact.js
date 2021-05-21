$(document).ready(function () {
    $("#select_client").text('');
    $("#select_order").text('');
    $.ajax({
        url: 'src/php/get/getorders.php',
        type: 'POST',
        cache: false,
        data: null,
        dataType: "json",
        success: function (result2) {
            if (result2) {
                var res2 =
                    '<select name="id_order" id="orders" class="form-select">';
                for (var i = 0; i < result2.orders.id_order.length; i++) {
                    res2 += '<option value="' + parseInt(result2.orders.id_order[i]) + '">' + result2.orders.order_name[i] + '</option>';
                }
                res2 += '</select>';
                $("#select_order").append(res2);
            }
        }
    });
    $.ajax({
        url: 'src/php/get/getclients.php',
        type: 'POST',
        cache: false,
        data: null,
        dataType: "json",
        success: function (result) {
            if (result) {
                var res =
                    '<select name="clients" id="clients" class="form-select">';
                for (var i = 0; i < result.clients.id_customer.length; i++) {
                    res += '<option data-id_customer="' + result.clients.id_customer[i] + '" data-name="' + result.clients.name[i] + '" data-last_name="' + result.clients.last_name[i] + '" data-email="' + result.clients.email[i] + '"  data-phone_number="' + result.clients.phone_number[i] + '" value="' + parseInt(result.clients.id_customer[i]) + '">' + result.clients.fio[i] + '</option>';
                }
                res += '</select>';
                $("#select_client").append(res);
            }
        }
    });
    $(document).on('change', '#clients', function () {
        $('#id_customer').attr('value', $('#clients').find(':selected').data('id_customer'));
        $('#client_name').attr('value', $('#clients').find(':selected').data('name'));
        $('#client_last_name').attr('value', $('#clients').find(':selected').data('last_name'));
        $('#client_phone_number').attr('value', $('#clients').find(':selected').data('phone_number'));
        $('#client_email').attr('value', $('#clients').find(':selected').data('email'));
    });
    $("#success").hide();
    $("#send").click(function (e) {
        e.preventDefault();
        var insert_pact = $("#myfm").serialize();
        $.ajax({
                url: 'src/php/add/addpact.php',
                type: 'POST',
                data: insert_pact
            })
            .done(function () {
                console.log("success");
                $("#success").show("slow");
            })
            .fail(function () {
                console.log("error");
            });
    });
});