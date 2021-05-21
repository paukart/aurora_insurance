$(document).ready(function () {
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
                    '<select name="workers" class="form-select">';
                for (var i = 0; i < result.workers.id_worker.length; i++) {
                    res += '<option value="'+parseInt(i+1)+'">'+result.workers.fio[i]+'</option>';
                }
                res += '</select>';
                $(".rows").append(res);
                res += '</tr></table>';
                console.log(res);
                $("#select").append(res);
            } else {
                console.log("ОШИБКА!");
            }
            return false;
        }
    });
    return false;
});