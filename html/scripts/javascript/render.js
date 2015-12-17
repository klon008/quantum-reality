var reservPrice = 'забронировать';
//var currentWeekDay = new Date(); Эта дата приходит из пхп для избежания проблем с врменными зонами
//Максимальное количество недель пролистываемых
var maxWeekCount = 3;

/**
 * Клик следующей недели или предидущей
 * @param  {[type]}  inDOMid [description]
 * @param  {Boolean} isNext  [description]
 * @return {[type]}          [description]
 */
function newxtWeek(inDOMid, isNext) {
    var regex = /\d+/;
    var match = regex.exec(inDOMid);
    var currentId = parseInt(match[0]);
    var nextId = currentId+1;
    var prevId = currentId-1;
    if (currentId || currentId === 0){
        $("#"+inDOMid).fadeOut(400, function() {

            if (isNext === true){

                /**Следующий день*/
                $("#reserve_table"+nextId).fadeIn();

                if ((nextId+1) == maxWeekCount){
                    $("#toNextWeek").attr('onclick', '').addClass('disabled-text');
                    $("#toPrevWeek").removeClass('disabled-text').attr('onclick', 'newxtWeek(\'reserve_table'+nextId+'\', false)');;
                } else {
                    $("#toNextWeek").removeClass('disabled-text').attr('onclick', 'newxtWeek(\'reserve_table'+nextId+'\', true)');
                    $("#toPrevWeek").removeClass('disabled-text').attr('onclick', 'newxtWeek(\'reserve_table'+nextId+'\', false)');
                }
            } else if (isNext === false){

                /**Предидущий день*/
                $("#reserve_table"+prevId).fadeIn();

                if (prevId === 0){
                    $("#toPrevWeek").attr('onclick', '').addClass('disabled-text');
                    $("#toNextWeek").removeClass('disabled-text').attr('onclick', 'newxtWeek(\'reserve_table'+prevId+'\', true)');
                } else {
                    $("#toPrevWeek").removeClass('disabled-text').attr('onclick', 'newxtWeek(\'reserve_table'+prevId+'\', false)');
                    $("#toNextWeek").removeClass('disabled-text').attr('onclick', 'newxtWeek(\'reserve_table'+prevId+'\', true)');
                }
            }
        //действия
        });
    };
}
/**
 * Генерация таблицы
 * @return {[type]} [description]
 */
function createTable(content, inDate) {
    function getonclick(inId, inD) {
        return 'onclick=\'open_modal(' + inId + ',' + inD.valueOf() + ',this)\'';
    }

    /*content += '';*/
    content += '<thead><tr><td></td>';

    /*Формируем даты*/
    var weekDates = [];
    var d;

    if (inDate){
        d = new Date(inDate.valueOf());
    } else {
        d = new Date(currentWeekDay.valueOf());
    }

    var to = d.setTime(d.getTime() - (d.getDay() ? d.getDay() : 7) * 24 * 60 * 60 * 1000);
    for (var i = 1; i < 8; i++) {
        weekDates.push(new Date(to).addDays(i));
    }
    /*Формируем даты*/

    /*Заголовок*/
    for (i = 0; i < weekDates.length; i++) {
        content += '<th>' + timeConverter(weekDates[i]) + '</th>';
    }
    content += '</tr></thead><tbody>';
    /*Заголовок*/

    /*Рабочее время*/
    for (i = 0; i < workTimes.length; i++) {

        content += '<tr><th>' + workTimes[i]['text_shedule'] + '</th>';

        /*Цикл формирует ячейки*/
        for (var j = 0; j < weekDates.length; j++) {

            var todayDate = new Date();
            if (weekDates[j] <= todayDate) {
                content += '<td class="disabled-cell"></td>';
            } else {
                filteredWorkTimes = getFilteredWorkTimes(workTimes[i]['id'], weekDates[j], shedule);
                if (filteredWorkTimes.length == 0) {
                    content += '<td class="enabled-cell" ' + getonclick(workTimes[i]['id'], weekDates[j]) + '>' + reservPrice + '</td>';
                } else {
                    content += '<td class="disabled-cell"></td>';
                }
            }


        };

        content += '</tr>';

    }

    /**Рабочее время**/
    function getFilteredWorkTimes(inId, inDate, inSheduleId) {
        function getNormalizeDate(iValue) {
            var tempDate = new Date(iValue);
            var TimeOfDate = (tempDate.getSeconds() * 1000) + (tempDate.getMinutes() * 60 * 1000) + (tempDate.getHours() * 60 * 60 * 1000) + tempDate.getMilliseconds();
            var result = tempDate - TimeOfDate;
            return result;
        }
        var result = [];
        var tempDate = getNormalizeDate(inDate);
        result = shedule.filter(function(row) {
            if (row['work_schedule_fk'] == inId && tempDate == getNormalizeDate(row['date'] * 1000)) {
                return row;
            }
        });
        return result;
    }

    content += "<tbody></table>";

    $('#new_table').append(content);
}

/**
 * Рендер таблицы
 * @param  {[type]} inShedule   [description]
 * @param  {[type]} workTimes [description]
 * @return {[type]}             [description]
 */
function firstRender() {
    if (workTimes) {
        var naviagetion = "<div class=\"col-md-12 center-block\"><a id=\"toPrevWeek\" class=\"back_arrow disabled-text\" href=\"javascript:previousWeek;\" onclick=\"\"><span class=\"fa fa-arrow-circle-left\"></span> Предидущая неделя</a> <span style=\"color: #FFF\">||</span> <a id=\"toNextWeek\" class=\"back_arrow\" href=\"javascript:void(0);\" onclick=\"newxtWeek('reserve_table0', true);\">Слудующая неделя <span class=\"fa fa-arrow-circle-right\"></span></a></div>";
        var content = naviagetion + "<table id=\"reserve_table0\">";
        createTable(content);
        for (var i = 1; i < maxWeekCount; i++) {
            var nextWeekDay = currentWeekDay.addDays(7*i);
            createTable("<table id=\"reserve_table"+i+"\" style=\"display: none;\">", nextWeekDay);
        }
    }
}

/**
 * Уникс время в читаемый текст
 * @param  {[type]} UNIX_timestamp [description]
 * @return {[type]}                [description]
 */
function timeConverter(inDate) {
    var a = new Date(inDate);
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
function timeConverterDMY(inDate) {
    var a = new Date(inDate);
    var year = a.getFullYear();
    var month = a.getMonth() + 1;
    var date = a.getDate();
    var time = date + '.' + month + '.' + year;
    return time;
}

function timeConverterYYYYMMDD(inDate) {
    var a = new Date(inDate);
    var year = a.getFullYear();
    var month = a.getMonth() + 1;
    var date = a.getDate();
    var time = date + '-' + month + '-' + year;
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
        "date": inDate / 1000,
        "sender": Sender
    });
}

function do_ajax(inSheduleId, inDate, Sender) {
    var outData = JSON.stringify({
        shedule: inSheduleId,
        date: inDate,
        name: $("#InputName").val(),
        email: $("#InputEmail").val(),
        contactPhone: $("#phone-input").val(),
        numberParticipants: $("#inputGroupSize").val(),
        comment: $("#InputMessage").val(),
        selected_game: $("#Input-selectbox").val()
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

/**
 * Учим Дату суммировать даты
 * @param {[type]} days [description]
 */
Date.prototype.addDays = function(days) {
    this.setDate(this.getDate() + parseInt(days));
    return this;
};
