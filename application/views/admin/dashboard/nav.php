<nav class="navbar navbar-inverse" role="navigation">
    <div class="navbar-header">
        <div class="logosmall">
            <a href="<?= base_url(); ?>">
                <img src="<?= base_url() . 'public/img/logo_small_free.png' ?>">
            </a>
        </div>
    </div>
    <div class="collapse navbar-collapse" id="navbar-collapse-01">
        <ul class="nav navbar-nav">
            <li <?= ($this->uri->segment(2) == "dashboard")?'class="active"':''; ?>><a href="<?= base_url() . 'admin'; ?>">Dashboard</a></li>
            <li <?= ($this->uri->segment(2) == "ideas")?'class="active"':''; ?>><a href="<?= base_url() . 'admin/ideas'; ?>">Ideas and Comments</a></li>
            <li <?= ($this->uri->segment(2) == "users")?'class="active"':''; ?>><a href="<?= base_url() . 'admin/users'; ?>">Users Management</a></li>
            <li <?= ($this->uri->segment(2) == "system")?'class="active"':''; ?>><a href="<?= base_url() . 'admin/system'; ?>">System Settings</a></li>
        </ul>
        <p class="navbar-text navbar-right">Signed in as <span style="color:#27AE60"><?= $_SESSION['phpback_username']; ?></span>
            <a href="<?= base_url() . 'action/logout'; ?>">
                <button type="button" class="btn btn-danger btn-xs" style="margin-left:10px;">Log out</button>
            </a>
        </p>
    </div><!-- /.navbar-collapse -->
</nav><!-- /navbar -->
