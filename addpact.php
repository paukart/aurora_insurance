<?php
session_start();
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Аврора</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="src/js/setdate.js"></script>
    <script src="src/js/addpact.js"></script>
</head>

<body class="mx-5" onload="setDate()">
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-danger rounded">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Аврора</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="index.html">Главная</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="addpact.php">Оформить страховку</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pacts.html">Страховые полисы</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="clients.html">Клиенты</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="workers.html">Работники</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="addworker.html">Добавить работника</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="addclient.html">Добавить клиента</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="addorder.html">Добавить услугу</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="container">
        <form method="POST" id="myfm">
            <div class="alert alert-success my-3" role="alert" id="success">Успешно!</div>
            <div class="col-md-7 col-lg-8">
                <h4 class="mb-3">Объект страхования</h4>
                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="insurance_object" class="form-label">Описание объекта:</label>
                        <input type="text" class="form-control" name="insurance_object" id="insurance_object" placeholder="Mitsubishi Outlander XL, 2007" value="" required>
                    </div>

                    <div class="col-sm-6">
                        <label for="date" class="form-label">Дата оформления:</label>
                        <input type="date" class="form-control" id="date" name="date" required>
                    </div>

                    <div class="col-sm-6">
                        <label for="insured_sum" class="form-label">Сумма страхования:</label>
                        <input type="number" class="form-control" id="insured_sum" name="insured_sum" placeholder="20000" required>
                    </div>
                    <div class="col-sm-6"><label for="order_name" class="form-label">Тип услуги:</label><div id="select_order"></div></div>
                </div>
            </div>

            <hr class="my-4">

            <div class="col-md-7 col-lg-8">
                <h4 class="mb-3">Информация о клиенте</h4>
                <div class="row g-3">
                    <div id="select_client" class="col-sm-12"></div>
                    <input type="hidden" name="id_customer" id="id_customer">
                    <div class="col-sm-6">
                        <label for="client_name" class="form-label">Имя:</label>
                        <input type="text" class="form-control" name="client_name" id="client_name" placeholder="Иван" required>
                    </div>

                    <div class="col-sm-6">
                        <label for="client_last_name" class="form-label">Фамилия:</label>
                        <input type="text" class="form-control" name="client_last_name" id="client_last_name" placeholder="Иванов" required>
                    </div>

                    <div class="col-sm-6">
                        <label for="client_email" class="form-label">Email:</label>
                        <input type="email" class="form-control" name="client_email" id="client_email" placeholder="you@example.com">
                    </div>

                    <div class="col-sm-6">
                        <label for="client_phone_number" class="form-label">Телефон:</label>
                        <input type="tel" class="form-control" name="client_phone_number" id="client_phone_number" placeholder="71233456789">
                    </div>
                </div>
            </div>

            <hr class="my-4">

            <div class="col-md-7 col-lg-8">
                <h4 class="mb-3">Информация о страховом агенте</h4>
                <div class="row g-3">
                    <div class="alert alert-warning" role="alert">
                        Проверьте все данные перед отправкой формы!
                    </div>
                    <div class="col-sm-6">
                        <label for="worker_name" class="form-label">Имя:</label>
                        <input type="text" class="form-control" name="worker_name" id="worker_name" placeholder="Иван" readonly value="<?= $_SESSION['worker_name'] ?>">
                    </div>

                    <div class="col-sm-6">
                        <label for="worker_last_name" class="form-label">Фамилия:</label>
                        <input type="text" class="form-control" name="worker_last_name" id="worker_last_name" readonly placeholder="Иванов" value="<?= $_SESSION['worker_last_name'] ?>">
                    </div>

                    <div class="col-sm-6">
                        <label for="worker_email" class="form-label">Email:</label>
                        <input type="email" class="form-control" name="worker_email" id="worker_email" readonly value="<?= $_SESSION['worker_email'] ?>" placeholder="you@example.com">
                    </div>

                    <div class="col-sm-6">
                        <label for="worker_phone_number" class="form-label">Телефон:</label>
                        <input type="tel" class="form-control" name="worker_phone_number" id="worker_phone_number" readonly placeholder="71233456789" value="<?= $_SESSION['worker_phone_number'] ?>">
                    </div>
                </div>
            </div>

            <hr class="my-4">
            <div class="col-md-7 col-lg-8">
                <div class="col-6">
                    <input type="submit" id="send" name="send" class="btn btn-success" value="Добавить">
                </div>
            </div>
        </form>
    </div>
    </form>
    <footer class="my-5 pt-5 text-muted text-center text-small">
        <hr>
        <p class="mb-1">&copy; 2021 Аврора</p>
    </footer>
</body>

</html>