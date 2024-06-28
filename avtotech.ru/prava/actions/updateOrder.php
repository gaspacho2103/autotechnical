<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактирование заказа</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
<div class="row">
            <div class="container w-50 mx-auto mt-5">
                <h2 class="mb-5">Редактирование заказа</h2>
                <form method="post" class="mt-2">
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Имя</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="name" id="name">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Телефон</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="telephone" id="telephone">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Компания</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="company" id="company">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Услуга</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="service" id="service">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Тип авто</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="type" id="type">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Название авто</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="avto" id="avto">
                        </div>
                    </div>
                    <div class="row mb-3 mt-5">
                        <div class="col-sm-5 d-grid">
                            <?php
                                $id = $_GET['id'];
                            ?>
                            <button type="submit" onclick="updateOrder(<?=$id?>)" class="btn btn-primary">Изменить</button>
                            <script src="../orders.js"></script>
                        </div>
                        <div class="col-sm-4 d-grid">
                            <a class="btn btn-outline-primary" href="../admin.php" role="button">Выйти</a>
                        </div>
                    </div>
                </div>
        </div>
</body>
</html>