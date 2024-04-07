<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Форма Отправки</title>

    <link href="/styles.css?1" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>
    <main>

        <div class="container">
            <header class="d-flex justify-content-center py-3">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a href="/" class="nav-link active" aria-current="page">Форма Отправки</a></li>
                    <li class="nav-item"><a href="/data.php" class="nav-link">Данные с Формы</a></li>
                </ul>
            </header>
        </div>

        <div class="container">
            <div class="py-5 text-center">
                <h2>Форма Отправки</h2>
            </div>
            <div class="g-3">
                <form id="indexForm" method="POST">
                    <label for="firstName">Имя:</label>
                    <input type="text" class="form-control" id="firstName" name="firstName" required><br>

                    <label for="lastName">Фамилия:</label>
                    <input type="text" class="form-control" id="lastName" name="lastName" required><br>

                    <label for="phone">Телефон:</label>
                    <input type="tel" class="form-control" id="phone" name="phone" required><br>

                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required><br>

                    <button id="submitIndexForm" class="w-100 btn btn-primary btn-lg" type="button">Отправить</button>
                </form>
            </div>
        </div>

    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/ajax.js?11"></script>

</body>

</html>