<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengguna</title>
</head>

<body>

    <div class="bg-body-tertiary ">
        <h1>Daftar Pengguna</h1>
        <table>
            <thead></thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
                <?php foreach ($data['users'] as $u) : ?>
                    <tr>
                        <td><?= htmlspecialchars($u['name']); ?></td>
                        <td><?= htmlspecialchars($u['email']); ?></td>
                        <td>
                            <a href="<?= BASEURL; ?>/user/detail/<?= $u['id']; ?>" class="btn btn-primary">
                                Detail
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>