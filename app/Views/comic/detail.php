<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<div class="card card-30">
    <div class="card-header">
        <div class="card-title"><?= $comic['title'] ?></div>
    </div>
    <div class="card-body">
        <img class="img-cover" src="/img/<?= $comic['cover'] ?>" alt="<?= $comic['cover'] ?>">
        <p>Author: <?= $comic['author'] ?></p>
        <small style="color: #777">Release Date: <?= $comic['release_date'] ?></small>
        <hr class="line">
        <div class="btn-group">
            <a href="/comic/edit/<?= $comic['slug'] ?>">
                <button class="btn-1 warning">Update</button>
            </a>
            <form action="/comic/<?= $comic['id'] ?>" method="post">
                <?= csrf_field(); ?>
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="btn-1 danger">Delete</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>