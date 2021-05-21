$(document).ready(function () {
    $("#success").hide();
    $("#select").text('');
    var workers = $('#myfm').serialize();
    $.ajax({
        url: 'src/php/get/getworkers.php',
        type: 'POST',
        cache: false,
        data: workers,
        dataType: "json",
        success: function (result) {
            if (result) {
                var res =
                    '<select name="workers" id="workers" class="form-select">';
                for (var i = 0; i < result.workers.id_worker.length; i++) {
                    res += '<option data-id_worker="' + result.workers.id_worker[i] + '" data-name="' + result.workers.name[i] + '" data-last_name="' + result.workers.last_name[i] + '" data-email="' + result.workers.email[i] + '"  data-phone_number="' + result.workers.phone_number[i] + '" value="' + parseInt(result.workers.id_worker[i]) + '">' + result.workers.fio[i] + '</option>';
                }
                res += '</select>';
                console.log(res);
                $("#select").append(res);
            } else {
                console.log("ОШИБКА!");
            }
        }
    });
    $(document).on('change', '#workers', function () {
        $('#id_worker').attr('value', $('#workers').find(':selected').data('id_worker'));
        $('#edit_worker_name').attr('value', $('#workers').find(':selected').data('name'));
        $('#edit_worker_last_name').attr('value', $('#workers').find(':selected').data('last_name'));
        $('#edit_worker_phone_number').attr('value', $('#workers').find(':selected').data('phone_number'));
        $('#edit_worker_email').attr('value', $('#workers').find(':selected').data('email'));
    });
    $("#edit").click(function (e) {
        e.preventDefault();
        var update_worker = $("#editfm").serialize();
        $.ajax({
                url: 'src/php/edit/editworker.php',
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
        var insert_worker = $("#sendfm").serialize();
        $.ajax({
                url: 'src/php/add/addworker.php',
                type: 'POST',
                data: insert_worker
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