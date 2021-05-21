$(document).ready(function () {
    $("#success").hide();
    $("#select").text('');
    var clients = $('#myfm').serialize();
    $.ajax({
        url: 'src/php/get/getclients.php',
        type: 'POST',
        cache: false,
        data: clients,
        dataType: "json",
        success: function (result) {
            if (result) {
                var res =
                    '<select name="clients" id="clients" class="form-select">';
                for (var i = 0; i < result.clients.id_customer.length; i++) {
                    res += '<option data-id_customer="' + result.clients.id_customer[i] + '" data-name="' + result.clients.name[i] + '" data-last_name="' + result.clients.last_name[i] + '" data-email="' + result.clients.email[i] + '"  data-phone_number="' + result.clients.phone_number[i] + '" value="' + parseInt(result.clients.id_customer[i]) + '">' + result.clients.fio[i] + '</option>';
                }
                res += '</select>';
                console.log(res);
                $("#select").append(res);
            } else {
                console.log("ОШИБКА!");
            }
        }
    });
    $(document).on('change', '#clients', function () {
        $('#id_customer').attr('value', $('#clients').find(':selected').data('id_customer'));
        $('#edit_client_name').attr('value', $('#clients').find(':selected').data('name'));
        $('#edit_client_last_name').attr('value', $('#clients').find(':selected').data('last_name'));
        $('#edit_client_phone_number').attr('value', $('#clients').find(':selected').data('phone_number'));
        $('#edit_client_email').attr('value', $('#clients').find(':selected').data('email'));
    });
    $("#edit").click(function (e) {
        e.preventDefault();
        var update_worker = $("#editfm").serialize();
        $.ajax({
                url: 'src/php/edit/editclient.php',
                type: 'POST',
                data: update_worker
            })
            .done(function () {
                console.log("success");
                $("#success").show("slow");
                setTimeout(function() { $("#success").hide('slow'); }, 2000);
            })
            .fail(function () {
                console.log("error");
            });
    });
    $("#send").click(function (e) {
        e.preventDefault();
        var insert_client = $("#sendfm").serialize();
        $.ajax({
                url: 'src/php/add/addclient.php',
                type: 'POST',
                data: insert_client
            })
            .done(function () {
                console.log("success");
                $("#success").show("slow");
                setTimeout(function() { $("#success").hide('slow'); }, 2000);
            })
            .fail(function () {
                console.log("error");
            });
    });
});