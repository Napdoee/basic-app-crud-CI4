<!-- <div class="pagination">
    <a href="#">&laquo;</a>
    <a href="#">1</a>
    <a class="active" href="#">2</a>
    <a href="#">3</a>
    <a href="#">4</a>
    <a href="#">5</a>
    <a href="#">6</a>
    <a href="#">&raquo;</a>
</div> -->

<?php $pager->setSurroundCount(2) ?>

<div class="pagination">
    <?php if ($pager->hasPrevious()) : ?>

    <a href="<?= $pager->getFirst() ?>" aria-label="<?= lang('Pager.first') ?>">
        <span aria-hidden="true"><?= lang('Pager.first') ?></span>
    </a>

    <a href="<?= $pager->getPrevious() ?>" aria-label="<?= lang('Pager.previous') ?>">
        <span aria-hidden="true"><?= lang('Pager.previous') ?></span>
    </a>

    <?php endif ?>

    <?php foreach ($pager->links() as $link): ?>
    <a <?= $link['active'] ? 'class="active"' : '' ?> href="<?= $link['uri'] ?>">
        <?= $link['title'] ?>
    </a>
    <?php endforeach ?>

    <?php if ($pager->hasNext()) : ?>

    <a href="<?= $pager->getNext() ?>" aria-label="<?= lang('Pager.next') ?>">
        <span aria-hidden="true"><?= lang('Pager.next') ?></span>
    </a>

    <a href="<?= $pager->getLast() ?>" aria-label="<?= lang('Pager.last') ?>">
        <span aria-hidden="true"><?= lang('Pager.last') ?></span>
    </a>

    <?php endif ?>
</div>