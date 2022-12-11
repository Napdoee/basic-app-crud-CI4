<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <!-- My CSS -->
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>

<body>
    <?= $this->include('layout/navbar') ?>

    <div class="container">
        <?= $this->renderSection('content') ?>
    </div>

    <?= $this->include('layout/footer') ?>

    <!-- Jquery dan JS -->
    <script src="<?= base_url('js/jquery-3.5.1.js') ?>"></script>
    <script>
    function closeBtn(e) {
        const alert = document.querySelector('.alert');
        alert.style.display = 'none';
    }

    function previewImg() {
        const cover = document.querySelector('#cover');
        const imgPreview = document.querySelector('.img-preview');

        const fileCover = new FileReader();
        fileCover.readAsDataURL(cover.files[0]);

        fileCover.onload = function(e) {
            imgPreview.src = e.target.result;
        }
    }
    </script>
</body>

</html>