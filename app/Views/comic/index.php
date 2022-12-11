<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<h1 class="heading-1">Comic Page</h1>
<?php if(session()->getFlashdata('msg_s')) : ?>
<div class="alert success">
    <div class="flex-center">
        <p><?= session()->getFlashdata('msg_s') ?></p>
        <span class="closeBtn" onclick="closeBtn()">&times;</span>
    </div>
</div>
<?php elseif(session()->getFlashdata('msg_e')) : ?>
<div class="alert warning">
    <div class="flex-center">
        <p><?= session()->getFlashdata('msg_e') ?></p>
        <span class="closeBtn" onclick="closeBtn()">&times;</span>
    </div>
</div>
<?php endif; ?>
<table class="table">
    <thead>
        <tr>
            <th width="5%">#</th>
            <th width="10%">Cover</th>
            <th>Title</th>
            <th>Author</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; foreach ($comic as $row) : ?>
        <tr>
            <td align="center"><?= $no++ ?></td>
            <td align="center">
                <img class="img-thumbnail" src="img/<?= $row['cover'] ?>" alt="#">
            </td>
            <td><?= $row['title'] ?></td>
            <td><?= $row['author'] ?></td>
            <td align="center">
                <a href="/comic/<?= $row['slug'] ?>">
                    <button class="btn-1 secondary">Detail</button>
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->endSection() ?>