<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aku Login</title>
    <link href="https://cdn.jsdelivr.net/gh/rajnandan1/brutopia@latest/dist/assets/compiled/css/app.css" rel="stylesheet" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body class="bg-dark">

    <div class="card text-center container mt-5" style="width: 50%;">
        <h2 class="mt-4">LOGIN</h2>
        <hr>
        <form action="<?= base_url('/doLogin'); ?>" method="post">
            <div class="form-group px-3">
                <label for="user" class="">Username</label>
                <input type="text" name="username" class="form-control" id="user" required>
                <label for="user" class="">Password</label>
                <input type="password" name="password" class="form-control" id="pass" required>

                <div class="d-grid gap-2 my-4">
                    <button type="submit" class="btn btn-outline-dark">LOGIN</button>
                </div>
                <?php if (session()->getFlashdata('success')): ?>
                    <div class="alert alert-success" id="alert-box">
                        <?= session()->getFlashdata('success'); ?>
                    </div>
                <?php endif; ?>

                <?php if (session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger" id="alert-box">
                        <?= session()->getFlashdata('error'); ?>
                    </div>
                <?php endif; ?>
            </div>
        </form>

        <hr>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-9/aliYfme0J7xHBG3sOz/WaM4VgFpg6aABeRm1Fy/L64K=" crossorigin="anonymous"></script>
    <script>
        // 
        setTimeout(function() {
        var alertBox = document.getElementById("alert-box");
        if (alertBox) {
            alertBox.style.transition = "opacity 0.5s ease";
            alertBox.style.opacity = "0";
            setTimeout(() => alertBox.remove(), 500);
        }
    }, 3000);
    </script>
</body>

</html>