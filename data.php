<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Данные с Формы</title>

    <link href="/styles.css?1" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>
    <main>

        <div class="container">
            <header class="d-flex justify-content-center py-3">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a href="/" class="nav-link">Форма Отправки</a></li>
                    <li class="nav-item"><a href="/data.php" class="nav-link active" aria-current="page">Данные с Формы</a></li>
                </ul>
            </header>
        </div>

        <div class="container">
            <div class="py-5 text-center">
                <h2>Данные с Формы</h2>
            </div>

            <form id="getDataForm">
                <div class="row">
                    <div class="col">
                        <label for="startDate">Дата от:</label>
                        <input type="date" class="form-control" id="startDate" name="startDate" value="<?php echo date('Y-m-d'); ?>">
                    </div>
                    <div class="col">
                        <label for="endDate">Дата до:</label>
                        <input type="date" class="form-control" id="endDate" name="endDate" value="<?php echo date('Y-m-d'); ?>">
                    </div>
                </div>
                <br>
                <button id="submitDataForm" type="submit" class="btn btn-primary">Применить</button>
            </form>

            <table id="dataTable" class="table">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Email</th>
                        <th scope="col">Status</th>
                        <th scope="col">FTD</th>
                    </tr>
                </thead>

                <tbody>
                </tbody>
            </table>
        </div>

    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/ajax.js?11"></script>

</body>

</html>