<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengguna</title>
</head>

<body>
    <section class="hero">
        <div class="d-flex align-items-center h-100">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="card bg-light shadow-2-strong">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div class="border-bottom container">
                                        <div class="row">
                                            <h2 class="col-8">
                                                Daftar Pengguna
                                            </h2>
                                            <div class="col-4">
                                                <a href="<?= BASEURL; ?>/user/store" class="btn btn-primary float-end">
                                                    Tambah Pengguna
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <table class="table table-light table-borderless mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Email</th>
                                                <th scope="col" class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($data['users'] as $u) : ?>
                                                <tr>
                                                    <td><?= htmlspecialchars($u['id']); ?></td>
                                                    <td><?= htmlspecialchars($u['name']); ?></td>
                                                    <td><?= htmlspecialchars($u['email']); ?></td>
                                                    <td class="text-center">
                                                        <a href="<?= BASEURL; ?>/user/detail/<?= $u['id']; ?>" class="btn btn-secondary">Detail</a>
                                                        <a href="<?= BASEURL; ?>/user/update/<?= $u['id']; ?>" class="btn btn-warning text-white">Edit</a>
                                                        <button
                                                            class="btn btn-danger btn-delete"
                                                            data-id="<?= $u['id']; ?>"
                                                            data-name="<?= htmlspecialchars($u['name']); ?>"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#deleteModal">
                                                            Hapus
                                                        </button>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>

                                    <div class="modal fade" id="deleteModal" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <form action="<?= BASEURL; ?>/user/delete" method="POST">

                                                    <div class="modal-header bg-light">
                                                        <h5 class="modal-title">Konfirmasi Hapus</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <p id="delete-text" class="mb-3"></p>

                                                        <input type="hidden" name="id" id="delete-id">
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                                                    </div>

                                                </form>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener("click", function(e) {
            if (e.target.classList.contains("btn-delete")) {

                const id = e.target.dataset.id;
                const name = e.target.dataset.name;

                document.getElementById("delete-id").value = id;

                document.getElementById("delete-text").innerHTML =
                    "Apakah kamu yakin akan menghapus data '<strong>" + name + "</strong>' ?";
            }
        });
    </script>

</body>


</html>