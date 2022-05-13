<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="d-flex">
    <section id="navbar" class="bg-light bg-opacity-25 p-3">
        <a href="dashboard.php" class="text-decoration-none">
            <div class="nav-menu d-flex align-items-center justify-content-center pb-3">
                <div class="logo-image d-flex align-items-center justify-content-center" style="width:40px; height:40px;">
                    <!-- <i class="fa-solid fa-hospital" style="font-size:30px; color: black"></i> -->
                    <img src="asset/logo.png" alt="" width="60">
                </div>
                <p class="text-dark fw-bold m-0 pl-3" style="font-size:20px;">Klinik Dokter Ida</p>
            </div>
        </a>
        <a href="dashboard.php?tab=pasien" class="text-decoration-none">
            <div class="nav-menu">
                <div class="nav-list py-2">
                    <div class="nav-item position-relative d-flex align-items-center pl-1">
                        <i class="fa-solid fa-hospital-user" style="font-size:15px; color: black"></i>
                        <p class="text-dark fw-bold m-0 pl-3">Pasien
                        </p>
                    </div>
                </div>
            </div>
        </a>
        <a href="dashboard.php?tab=pendaftaran" class="text-decoration-none">
            <div class="nav-menu">
                <div class="nav-list py-2">
                    <div class="nav-item position-relative d-flex align-items-center pl-1">
                        <i class="fa-solid fa-address-card" style="font-size:15px; color: black"></i>
                        <p class="text-dark fw-bold m-0 pl-3">Pendaftaran
                        </p>
                    </div>
                </div>
            </div>
        </a>
        <a href="dashboard.php?tab=dokter" class="text-decoration-none">
            <div class="nav-menu">
                <div class="nav-list py-2">
                    <div class="nav-item position-relative d-flex align-items-center pl-1">
                        <i class="fa-solid fa-user-doctor" style="font-size:15px; color: black"></i>
                        <p class="text-dark fw-bold m-0 pl-3">Dokter
                        </p>
                    </div>
                </div>
            </div>
        </a>
        <a href="dashboard.php?tab=poliklinik" class="text-decoration-none">
            <div class="nav-menu">
                <div class="nav-list py-2">
                    <div class="nav-item position-relative d-flex align-items-center pl-1">
                        <i class="fa-solid fa-house-chimney-medical" style="font-size:15px; color: black"></i>
                        <p class="text-dark fw-bold m-0 pl-3">Poliklinik
                        </p>
                    </div>
                </div>
            </div>
        </a>
        <a href="dashboard.php?tab=diagnosa" class="text-decoration-none">
            <div class="nav-menu">
                <div class="nav-list py-2">
                    <div class="nav-item position-relative d-flex align-items-center pl-1">
                        <i class="fa-solid fa-comment-medical" style="font-size:15px; color: black"></i>
                        <p class="text-dark fw-bold m-0 pl-3">Diagnosa
                        </p>
                    </div>
                </div>
            </div>
        </a>
        <a href="dashboard.php?tab=tindakan" class="text-decoration-none">
            <div class="nav-menu">
                <div class="nav-list py-2">
                    <div class="nav-item position-relative d-flex align-items-center pl-1">
                        <i class="fa-solid fa-stethoscope" style="font-size:15px; color: black"></i>
                        <p class="text-dark fw-bold m-0 pl-3">Tindakan
                        </p>
                    </div>
                </div>
            </div>
        </a>
        <a href="dashboard.php?tab=rajal" class="text-decoration-none">
            <div class="nav-menu">
                <div class="nav-list py-2">
                    <div class="nav-item position-relative d-flex align-items-center pl-1">
                        <i class="fa-solid fa-heart-circle-plus" style="font-size:15px; color: black"></i>
                        <p class="text-dark fw-bold m-0 pl-3">Rawat Jalan
                        </p>
                    </div>
                </div>
            </div>
        </a>
        <a href="dashboard.php?tab=ranap" class="text-decoration-none">
            <div class="nav-menu">
                <div class="nav-list py-2">
                    <div class="nav-item position-relative d-flex align-items-center pl-1">
                        <i class="fa-solid fa-bed" style="font-size:15px; color: black"></i>
                        <p class="text-dark fw-bold m-0 pl-3">Rawat Inap
                        </p>
                    </div>
                </div>
            </div>
        </a>
        <a href="dashboard.php?tab=ugd" class="text-decoration-none">
            <div class="nav-menu">
                <div class="nav-list py-2">
                    <div class="nav-item position-relative d-flex align-items-center pl-1">
                        <i class="fa-solid fa-truck-medical" style="font-size:15px; color: black"></i>
                        <p class="text-dark fw-bold m-0 pl-3">UGD
                        </p>
                    </div>
                </div>
            </div>
        </a>
        <a href="dashboard.php?tab=kamar" class="text-decoration-none">
            <div class="nav-menu">
                <div class="nav-list py-2">
                    <div class="nav-item position-relative d-flex align-items-center pl-1">
                        <i class="fa-solid fa-bed-pulse" style="font-size:15px; color: black"></i>
                        <p class="text-dark fw-bold m-0 pl-3">Kamar
                        </p>
                    </div>
                </div>
            </div>
        </a>
        <a href="dashboard.php?tab=pemeriksaan" class="text-decoration-none">
            <div class="nav-menu">
                <div class="nav-list py-2">
                    <div class="nav-item position-relative d-flex align-items-center pl-1">
                        <i class="fa-solid fa-kit-medical" style="font-size:15px; color: black"></i>
                        <p class="text-dark fw-bold m-0 pl-3">Pemeriksaan
                        </p>
                    </div>
                </div>
            </div>
        </a>
    </section>
    <section id="content" class="position-relative">
        <nav class="navbar navbar-dark bg-dark justify-content-between mb-4">
            <a class="navbar-brand" style="color:white;">Dashboard</a>
            <div class="dropdown">
                <button class="btn btn-light my-2 my-sm-0 dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa-solid fa-shield-halved pr-3"></i>Admin</button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Log Out</a>
                </div>
            </div>
        </nav>
        <div class="postion-relative px-3">
            <?php
            require 'functions.php';
            if (isset($_GET["tab"])) {
                $file = $_GET["tab"];
                require "$file.php";
            } else {
                require "menu.html";
            }
            ?>
        </div>
    </section>
    <script src="https://kit.fontawesome.com/1f83e5d847.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(".nav-list").on("click", function() {
            $(this).find(".nav-item-dropdown").toggleClass("hide");
        })
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>