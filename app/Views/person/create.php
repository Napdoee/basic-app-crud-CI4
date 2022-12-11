<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<h1 class="heading-1"><?= $title ?></h1>
<a href="/person">
    <button class="btn-1">Back to person list</button>
</a>
<hr class="line">
<form action="/person/save" method="post">
    <?= csrf_field(); ?>
    <table class="form">
        <tr>
            <td>Name</td>
            <td>
                <input class="input-control <?= $validation->hasError('name') ? 'is-invalid' : ''?>" type="text"
                    name="name" id="name" value="<?= old('name') ?>">
                <div class="invalid-text">
                    <?= $validation->getError('name') ?>
                </div>
            </td>
        </tr>
        <tr>
            <td>Address</td>
            <td>
                <input class="input-control <?= $validation->hasError('address') ? 'is-invalid' : ''?>" type="text"
                    name="address" id="address" value="<?= old('address') ?>">
                <div class="invalid-text">
                    <?= $validation->getError('address') ?>
                </div>
            </td>
        </tr>
        <tr>
            <td><button type="submit" class="btn-1 secondary">Add Person</button></td>
            <td></td>
        </tr>
    </table>
</form>
<?= $this->endSection() ?>