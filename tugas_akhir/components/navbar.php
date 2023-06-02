<nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
    <div class="container mx-auto">
        <a class="navbar-brand" href="#">Management Guru</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?= $_SERVER['REQUEST_URI'] == '/dashboard' ? 'active' : '' ?>"
                        href="/dashboard">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $_SERVER['REQUEST_URI'] == '/mata-pelajaran' ? 'active' : '' ?>"
                        href="/mata-pelajaran">Mata Pelajaran</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Kelas</a>
                </li>
            </ul>
            <div class="text-white mx-2">
                Hello, <?= $controller->getUser($_SESSION['username'])->nama ?>
            </div>
            <button class="btn btn-danger" onclick="logout()">
                Logout
            </button>
        </div>
    </div>
</nav>

<script>
function logout() {
    $.ajax({
        type: "POST",
        url: "/api/logout",
        success: function(response) {
            setTimeout(() => {
                if (response.status) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: response.message,
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => {
                        window.location.href = '/login'
                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal logout!',
                        text: response.message,
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            }, 500)
        }
    });
}
</script>