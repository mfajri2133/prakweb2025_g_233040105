<?php
$user = $data['user'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pengguna</title>
</head>

<body>
    <section class="hero">
        <div class="d-flex align-items-center h-100">
            <div class="card bg-light shadow-sm w-50 mx-auto">
                <div class="card-header bg-light ">
                    <h3 class="mb-0">Profil Pengguna</h3>
                </div>

                <div class="card-body">

                    <div class="mb-3">
                        <label class="form-label fw-bold">Nama</label>
                        <p class="form-control"><?= htmlspecialchars($user['name']); ?></p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Email</label>
                        <p class="form-control"><?= htmlspecialchars($user['email']); ?></p>
                    </div>

                    <div class="mt-4 d-flex justify-content-end">
                        <a href="<?= BASEURL; ?>/user" class="btn btn-secondary">
                            Kembali
                        </a>

                    </div>

                </div>
            </div>
        </div>
    </section>
</body>

</html>