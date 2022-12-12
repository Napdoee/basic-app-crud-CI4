<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <!-- My CSS -->
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>

<body>
    <?= $this->include('layout/sidebar') ?>

    <div class="main-content">
        <?= $this->include('layout/navbar') ?>
        <div class="container">
            <?= $this->renderSection('content') ?>
        </div>
    </div>

    <?= $this->include('layout/footer') ?>

    <!-- Jquery dan JS -->
    <script src="<?= base_url('js/jquery-3.5.1.js') ?>"></script>
    <script src="<?= base_url('js/script.js') ?>"></script>
</body>

</html>