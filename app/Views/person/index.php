<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<h1 class="heading-1"><?= $title ?></h1>
<?php if(session()->getFlashdata('msg')) : ?>
<div class="alert success">
    <p><?= session()->getFlashdata('msg') ?></p>
</div>
<?php endif ?>
<div class="flex-center">
    <a href="/person/create">
        <button class="btn-1 secondary">Add Person</button>
    </a>
    <form action="" method="GET">
        <input type="search" name="keyword" placeholder="Search" class="search" value="<?= $keyword ?>">
        <button type="submit" class="btn-0">Search</button>
    </form>
</div>
<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Address</th>
            <th width="15%">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1 + ($pager->getPerPage('person') * ($currentPage - 1)) ?>
        <?php 
        if(!empty($person)) :
        foreach($person as $row) : ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $row['name'] ?></td>
            <td><?= $row['address'] ?></td>
            <td>
                <div class="btn-group">
                    <a href="/person/edit/<?= $row['name'] ?>">
                        <button class="btn-1 warning">Update</button>
                    </a>
                    <form action="/person/<?= $row['id'] ?>" method="POST">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn-1 danger"
                            onclick="return confirm('Are you sure want delete this person [<?= $row['name'] ?>] ? ')">Delete</button>
                    </form>
                </div>
            </td>
        </tr>
        <?php endforeach; else : ?>
        <tr>
            <td colspan="4">404 Not Data Found</td>
        </tr>
        <?php endif; ?>
    </tbody>
</table>
<div class="flex-center">
    <div>
        <i>Showing <?= (empty($person) ? 0 : 1) + (10 * ($currentPage - 1)) ?> to <?= $no - 1 ?> of
            <?= $pager->getPageCount('person') ?> entries</i>
    </div>
    <?= $pager->links('person', 'pagination') ?>
</div>
<?= $this->endSection() ?>