<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield("title")</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <div class="d-flex flex-column flex-shrink-0 text-bg-dark" style="width: 280px; height:100%; position: fixed; left: 0px;">
        <br><br><br>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <!-- <a href="#" class="nav-link active" aria-current="page"> -->
                <a href="#" class="nav-link text-white" aria-current="page">
                <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
                Keşfet
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-white">
                <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
                Popülerler
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-white">
                <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
                Orders
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-white">
                <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
                Products
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-white">
                <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
                Customers
                </a>
            </li>
        </ul>
        <div style="text-align: center; font-size:10px;">
            © Telif Hakkı 2023, Tüm Hakları Saklıdır  | LibroVista 2023
        </div>
        <br>
    </div>

    <header class="p-3 text-bg-dark">
        <div class="container text-center">
            <div class="row align-items-center">
                <div class="col">

                </div>
                <div class="col">
                    <form role="search">
                        <input value="Ara..." type="search" class="form-control form-control-dark text-bg-dark" placeholder="Ara..." aria-label="Search">
                    </form>
                </div>
                <div class="col">
                    <div class="dropdown text-end">
                        <a href="#" class="link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                            <span class="text-white">User</span>
                        </a>
                        <ul class="dropdown-menu text-small">
                            <li><a class="dropdown-item" href="#">New project...</a></li>
                            <li><a class="dropdown-item" href="#">Profil</a></li>
                            <li><a class="dropdown-item" href="#">Ayarlar</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Çıkış Yap</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-3">
                
            </div>
            <div class="col-6" style="margin-top: 50px;">