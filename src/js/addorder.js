$(document).ready(function () {
    $("#success").hide();
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
                    res2 += '<option data-id_order="' + result2.orders.id_order[i] + '" data-order_name="' + result2.orders.order_name[i] + '" data-order_type="' + result2.orders.order_type[i] + '" value="' + parseInt(result2.orders.id_order[i]) + '">' + result2.orders.order_name[i] + '</option>';
                }
                res2 += '</select>';
                $("#select_order").append(res2);
            }
        }
    });
    $(document).on('change', '#orders', function () {
        $('#id_order').attr('value', $('#orders').find(':selected').data('id_order'));
        $('#edit_order_name').attr('value', $('#orders').find(':selected').data('order_name'));
        $('#edit_order_type').attr('value', $('#orders').find(':selected').data('order_type'));
    });
    $("#edit").click(function (e) {
        e.preventDefault();
        var update_worker = $("#editfm").serialize();
        $.ajax({
                url: 'src/php/edit/editorder.php',
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
        var insert_order = $("#sendfm").serialize();
        $.ajax({
                url: 'src/php/add/addorder.php',
                type: 'POST',
                data: insert_order
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