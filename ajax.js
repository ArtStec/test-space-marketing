$(document).ready(function () {
    $('#submitIndexForm').click(function (e) {
        e.preventDefault();

        var firstName = $('#firstName').val();
        var lastName = $('#lastName').val();
        var phone = $('#phone').val();
        var email = $('#email').val();

        $.ajax({
            url: 'functions.php',
            type: 'POST',
            dataType: 'json',
            data: {
                firstName: firstName,
                lastName: lastName,
                phone: phone,
                email: email
            },
            success: function () {
                alert('Данные успешно отправлены');
            },
            error: function () {
                alert('Ошибка при выполнении запроса');
            }
        });
    });

    $('#submitDataForm').click(function(e) {
        e.preventDefault(); // Предотвращаем стандартное поведение отправки формы
        
        var startDate = $('#startDate').val();
        var endDate   = $('#endDate').val();
        
        // Отправка AJAX-запроса
        $.ajax({
            type: 'POST',
            url: 'functions.php',
            dataType: 'json',
            data: {
                startDate: startDate,
                endDate: endDate
            },
            success: function(response) {
                updateTable(response); // Функция для обновления таблицы с данными
            },
            error: function(xhr, status, error) {
                console.error('Произошла ошибка при выполнении запроса:', error);
            }
        });
    });

    function updateTable(data) {
        var tableBody = $('#dataTable tbody');
        tableBody.empty(); // Очищаем содержимое таблицы
    
        if (data.status) {
            // Проверяем, есть ли данные о лидах
            if (data.data.length > 0) {
                // Если есть данные, добавляем их в таблицу
                $.each(data.data, function(index, lead) {
                    var row = $('<tr>');
                    $('<td>').text(lead.id).appendTo(row);
                    $('<td>').text(lead.email).appendTo(row);
                    $('<td>').text(lead.status).appendTo(row);
                    $('<td>').text(lead.ftd).appendTo(row);
                    tableBody.append(row);
                });
            } else {
                // Если данных нет, выводим сообщение об отсутствии данных
                tableBody.append('<tr><td colspan="4">Нет данных о лидах в выбранном диапазоне дат</td></tr>');
            }
        } else {
            // Если запрос завершился неудачно, выводим сообщение об ошибке
            console.error('Произошла ошибка при получении данных о лидах:', data.error);
        }
    }
});