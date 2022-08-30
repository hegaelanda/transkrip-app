<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-md">
        <a class="navbar-brand" href="#">Transkrip App</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="/">Home</a>
                <a class="nav-link" href="/tambah">Tambah Data</a>
                <!-- <a class="nav-link" href="/generate">Generate Transkrip</a> -->
                <a class="nav-link disabled"><?= session()->get('nama'); ?></a>
                <a class="nav-link" href="/logout">Logout</a>
            </div>
        </div>
    </div>
</nav>