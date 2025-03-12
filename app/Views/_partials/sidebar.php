<?php
$route = service('uri')->getSegment(1);
$title = '';

switch ($route) {
    case 'dashboard':
        $title = 'Dashboard';
        break;
    case 'siswa':
        $title = 'Siswa';
        break;
    case 'absensi':
        $title = 'Absensi';
        break;
    default:
        $title = 'Al - Muchalif Arnama';
        break;
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title;?></title>
    <link href="https://cdn.jsdelivr.net/gh/rajnandan1/brutopia@latest/dist/assets/compiled/css/app.css" rel="stylesheet" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>

    <!-- Header -->
    <header class="bg-primary pt-2 pb-1">
        <h1><?= $title;?></h1>
    </header>

    <div class="container-fluid">
        <div class="row">

            <!-- Sidebar -->
            <nav class="col-md-2 sidebar bg-primary">
                <div class="sidebar-sticky">
                    <hr>
                    <h5 class="sidebar-heading">Menu</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="<?php echo base_url('dashboard'); ?>">
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('siswa'); ?>">
                                Siswa
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('absensi'); ?>">
                                Kehadiran
                            </a>
                        </li>
                    </ul>
                    <hr>
                </div>
            </nav>
            <main role="main" class="col-md-10 ml-sm-auto col-lg-10 px-4 pb-3">