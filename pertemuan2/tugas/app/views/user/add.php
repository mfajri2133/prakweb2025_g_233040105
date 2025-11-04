<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pengguna</title>
</head>

<body>
    <section class="hero">
        <div class="d-flex align-items-center h-100">
            <div class="card bg-light shadow-sm w-50 mx-auto">
                <div class="card-header bg-light ">
                    <h3 class="mb-0">Tambah Pengguna</h3>
                </div>

                <div class="card-body">
                    <form action="<?= BASEURL; ?>/user/store" method="POST">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Nama</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Email</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>

                        <div class="mt-4 d-flex gap-3 justify-content-end">
                            <a href="<?= BASEURL; ?>/user" class="btn btn-secondary">
                                Kembali
                            </a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>