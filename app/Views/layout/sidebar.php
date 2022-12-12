<div class="sidebar">
    <a href="#">
        <h1 class="logo">Logo</h1>
    </a>
    <div class="profile">
        <img src="<?= base_url('img/hujan.jpg') ?>" alt="" class="img-profile">
        <p>Napdoe</p>
    </div>
    <hr class="line">
    <ul class="sidemenu">
        <a href="<?= base_url('home') ?>" class="items">
            <i class="bi bi-house"></i>
            <span class="description">Home</span>
        </a>
        <a href="<?= base_url('about') ?>" class="items">
            <i class="bi bi-info-circle"></i>
            <span class="description">About</span>
        </a>
        <a href="<?= base_url('comic') ?>" class="items">
            <i class="bi bi-book"></i>
            <span class="description">Comic</span>
        </a>
        <a href="<?= base_url('person') ?>" class="items">
            <i class="bi bi-person"></i>
            <span class="description">Person</span>
        </a>
        <a class="items button" href="/comic/new">Add Comic</a>
        <a class="items button" href="/person/new">Add Person</a>
    </ul>
</div>