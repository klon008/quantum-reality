/**
 * Сохранение отзывов
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
                    function getDate(){
                        var today = new Date();
                        var dd = today.getDate();
                        var mm = today.getMonth()+1; //January is 0!

                        var yyyy = today.getFullYear();
                        if(dd<10){
                            dd='0'+dd
                        } 
                        if(mm<10){
                            mm='0'+mm
                        } 
                        var today = yyyy+'-'+mm+'-'+dd;
                        return today;
                    }
                    var text = "<div class=\"reviews row\">\n<div class=\"col-md-3\">\n<div class=\"rate-date\"><span class=\"glyphicon glyphicon-time\">&nbsp;</span>"+getDate()+"</div>\n<div><input type=\"hidden\" class=\"rating\" data-filled=\"fa fa-star fa-3x\" data-empty=\"fa fa-star-o fa-3x\" data-readonly value=\""+$("#rating").val()+"\"/></div>\n</div>\n\n<div class=\"col-md-9\">\n<h1>"+$("#InputName").val()+"</h1>\n<div>\n"+$("#InputMessage").val()+"\n</div>\n</div>\n</div>";

                    $.notify(json.successMsg, {
                        className: "success",
                        position: "bottom right"
                    });
                    $('#reviews_list').prepend(text);
                    $('.rating').rating();

                    $('#myModal').modal('hide');
                    }
                }
            });
    }

    /**
     * Jquery onDocumentLOAD
     */
    $(function() {
        /**onclick submit modalform*/
        $('#modal_form').validator().on('submit', function(e) {
            if (e.isDefaultPrevented()) {
                $.notify("Вы заполнили не все требуемые поля", {
                    className: "error",
                    position: "bottom right"
                });
                return false;
            } else {
                do_ajax();
                return false;
            }
        });
        /**Общие настройки аякса*/
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
