/**
 * [do_ajax description]
 * @param  {[type]} inSheduleId [description]
 * @param  {[type]} inDate      [description]
 * @param  {[type]} Sender      [description]
 * @return {[type]}             [description]
 */
function do_ajax() {
    var outData = JSON.stringify({
        comment: $("#InputMessage").val(),
        name: $("#InputName").val(),
        rating: $("#rating").val()
    });

    $.ajax({
            url: '/insert_comment.php', // путь к php-обработчику
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
                    }
                }
            });
    }

    /**
     * Jquery onDocumentLOAD
     */
    $(function() {
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
    });
