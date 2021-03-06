/**
 * Вращение иконки у капчи
 * @return {[type]} [description]
 */
function refreshCaptcha() {
    $('#captcha')[0].src = '/captcha/securimage_show.php?' + Math.random();
    $("#refresh_captcha").rotate({
      angle: 0,
      animateTo:180
      });

    return false;
}

/**
 * Отправляет Ajax!
 * @param  {[type]} inSheduleId [description]
 * @param  {[type]} inDate      [description]
 * @param  {[type]} Sender      [description]
 * @return {[type]}             [description]
 */
function do_ajax_contactform(Sender) {
    var outData = JSON.stringify({
        name: $("#InputName").val(),
        email: $("#InputEmail").val(),
        contactPhone: $("#phone-input").val(),
        comment: $("#InputMessage").val(),
        captcha: $("#2xCc").val(),
        additional_info: $("#contact_form_additional_info").val()
    });

    $.ajax({
        url: 'send_mail_contact.php', // путь к php-обработчику
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
                
            }
        }
    });
}

/**
 * Jquery onDocumentLOAD
 */
$(function() {
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

    $('#contact_form').validator().on('submit', function(e) {
        if (e.isDefaultPrevented()) {
            $.notify("Вы заполнили не все требуемые поля", {
                className: "error",
                position: "bottom right"
            });
            return false;
        } else {
            $('#contact_form input').prop('disabled', true);
            $('#contact_form textarea').prop('disabled', true);
            $('#contact_form #send_ajax').addClass('disabled');
            do_ajax_contactform(this);
            return false;
        }
    })
});

