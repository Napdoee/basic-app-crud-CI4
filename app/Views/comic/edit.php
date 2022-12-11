<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<h1 class="heading-1">Form edit comics</h1>
<a href="/comic">
    <button class="btn-1">Back to comic list</button>
</a>
<hr class="line">
<form action="/comic/update/<?= $comic['id'] ?>" method="POST" enctype="multipart/form-data">
    <?= csrf_field(); ?>
    <input type="hidden" name="slug" value="<?= $comic['slug'] ?>">
    <input type="hidden" name="coverOld" value="<?= $comic['cover'] ?>">
    <table class="form">
        <tr>
            <td>Title</td>
            <td>
                <input class="input-control <?= $validation->hasError('title') ? 'is-invalid' : ''?>" type="text"
                    name="title" id="title" value="<?= old('title', $comic['title']) ?>">
                <div class="invalid-text">
                    <?= $validation->getError('title') ?>
                </div>
            </td>
        </tr>
        <tr>
            <td>Author</td>
            <td>
                <input class="input-control <?= $validation->hasError('author') ? 'is-invalid' : ''?>" type="text"
                    name="author" id="author" value="<?= old('author', $comic['author']) ?>">
                <div class="invalid-text">
                    <?= $validation->getError('author') ?>
                </div>
            </td>
        </tr>
        <tr>
            <td>Cover</td>
            <td>
                <img src="/img/<?= $comic['cover'] ?>" class="img-preview">
                <input class="input-control <?= $validation->hasError('cover') ? 'is-invalid' : ''?>" type="file"
                    name="cover" id="cover" onchange="previewImg()">
                <div class="invalid-text">
                    <?= $validation->getError('cover') ?>
                </div>
            </td>
        </tr>
        <tr>
            <td>Release Date</td>
            <td>
                <input class="input-control <?= $validation->hasError('release_date') ? 'is-invalid' : ''?>" type="date"
                    name="release_date" id="release_date" value="<?= old('release_date', $comic['release_date']) ?>">
                <div class="invalid-text">
                    <?= $validation->getError('release_date') ?>
                </div>
            </td>
        </tr>
        <tr>
            <td><button type="submit" class="btn-1 secondary">Save Changes</button></td>
            <td></td>
        </tr>
    </table>
</form>
<?= $this->endSection() ?>