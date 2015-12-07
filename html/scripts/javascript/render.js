var reservPrice = '200 руб.';
/**
 * Рендер таблицы
 * @param  {[type]} inShedule   [description]
 * @param  {[type]} inDates     [description]
 * @param  {[type]} inWorkTimes [description]
 * @return {[type]}             [description]
 */
function firstRender(inShedule, inDates, inWorkTimes) {
    var content = "<table>";

    function getonclick(inId, inD) {
        return 'onclick=\'open_modal(' + inId + ',' + inD + ',this)\'';
    }

    /*content += '';*/
    content += '<thead><tr><td></td>';

    /*Заголовок*/
    for (i = 0; i < inDates.length; i++) {
        content += '<th>' + timeConverter(inDates[i]) + '</th>';
    }
    content += '</tr></thead><tbody>';
    /*Заголовок*/

    /*Рабочее время*/
    for (i = 0; i < inWorkTimes.length; i++) {

        content += '<tr><th>' + inWorkTimes[i]['text_shedule'] + '</th>';

        /*Цикл формирует ячейки*/
        for (var j = 0; j < inDates.length; j++) {

            var todayDate = Math.floor((new Date()) / 1000);
            if (inDates[j] < todayDate) {
                content += '<td class="disabled-cell"></td>';
            } else {
                filteredWorkTimes = getFilteredWorkTimes(inWorkTimes[i]['id'], inDates[j], inShedule);
                if (filteredWorkTimes.length == 0) {
                    content += '<td class="enabled-cell" ' + getonclick(inWorkTimes[i]['id'], inDates[j]) + '>' + reservPrice + '</td>';
                } else {
                    content += '<td class="disabled-cell"></td>';
                }
            }


        };

        content += '</tr>';

    }

    /**Рабочее время**/
    function getFilteredWorkTimes(inId, inDate, inSheduleId) {
        var result = [];
        result = inShedule.filter(function(row) {
            if (row['work_schedule_fk'] == inId && inDate == row['date']) {
                return row;
            }
        });
        return result;
    }

    content += "<tbody></table>";

    $('#new_table').append(content);
}

/**
 * Уникс время в читаемый текст
 * @param  {[type]} UNIX_timestamp [description]
 * @return {[type]}                [description]
 */
function timeConverter(UNIX_timestamp) {
    var a = new Date(UNIX_timestamp * 1000);
    var days = ['Воскресенье', 'Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота'];
    var year = a.getFullYear();
    var month = a.getMonth() + 1;
    var date = a.getDate();
    var day = days[a.getDay()];
    var time = date + '.' + month + '.' + year + '<br/>' + day;
    return time;
}

/**
 * Уникс время DMY
 * @param  {[type]} UNIX_timestamp [description]
 * @return {[type]}                [description]
 */
function timeConverterDMY(UNIX_timestamp) {
    var a = new Date(UNIX_timestamp * 1000);
    var year = a.getFullYear();
    var month = a.getMonth() + 1;
    var date = a.getDate();
    var time = date + '.' + month + '.' + year;
    return time;
}

/**
 * Срабатывает при клике на ячейку
 * @param  {[type]} inSheduleId [description]
 * @param  {[type]} inDate      [description]
 * @return {[type]}             [description]
 */
function open_modal(inSheduleId, inDate, Sender) {
    $('#myModal').modal();
    $('#InputDate').val(timeConverterDMY(inDate));
    $('#modal_form').data("modal_settings", {
        "shedule": inSheduleId,
        "date": inDate,
        "sender": Sender
    });
    /*$('#send_ajax').click(function() {
        $('#modal_form').validator();
        do_ajax(inSheduleId, inDate, Sender);
    });*/
}

function do_ajax(inSheduleId, inDate, Sender) {
    var outData = JSON.stringify({
        shedule: inSheduleId,
        date: inDate,
        name: $("#InputName").val(),
        email: $("#InputEmail").val(),
        contactPhone: $("#phone-input").val(),
        numberParticipants: $("#inputGroupSize").val(),
        comment: $("#InputMessage").val()
    });

    $.ajax({
        url: 'insert_ajax.php', // путь к php-обработчику
        data: {
            dater: outData
        }, // данные, которые передаем на сервер

        success: function(json) { // функция, которая будет вызвана в случае удачного завершения запроса к серверу
            // json - переменная, содержащая данные ответа от сервера. Обзывайте её как угодно ;)
            if (json.errorMsg) {
                $.notify(json.errorMsg, {
                    className: "error",
                    position: "bottom right"
                });

            } else if (json.successMsg) {
                $.notify(json.successMsg, {
                    className: "success",
                    position: "bottom right"
                });
                $('#myModal').modal('hide');
                $(Sender).animate({
                    opacity: 0.6
                }, 600, function() {
                    $(this).html('');
                }).removeClass('enabled-cell').addClass('disabled-cell');
            }
        }
    });
}

/**
 * Jquery onDocumentLOAD
 */
$(function() {
    $('.rating').rating();
    // Описываем общие установки для всех ajax-запросов
    $.ajaxSetup({
        type: 'POST', // метод передачи данных
        dataType: 'json', // тип ожидаемых данных в ответе
        beforeSend: function() { // Функция вызывается перед отправкой запроса

        },
        error: function(req, text, error) { // отслеживание ошибок во время выполнения ajax-запроса
            console.log(text, error);
            $.notify('Приносим свои извинения, на сайте произошла ошибка: ' + text + ' | ' + error, {
                className: "error",
                position: "bottom right"
            });
        },
        complete: function() { // функция вызывается по окончании запроса

        }
    });

    /*При скрытии модалки очищать onlick*/
    $('#myModal').on('hidden.bs.modal', function(e) {
        $('#send_ajax').unbind();
    });

    $('#modal_form').validator().on('submit', function(e) {
        if (e.isDefaultPrevented()) {
            $.notify("Вы заполнили не все требуемые поля", {
                className: "error",
                position: "bottom right"
            });
            return false;
        } else {
            settings = $('#modal_form').data("modal_settings");
            do_ajax(settings["shedule"], settings["date"], settings["sender"]);
            return false;
        }
    })
});
