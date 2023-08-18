<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield("title")</title>
    @yield("css")
    <style>
        .hide-on-small-screen {
            display: block; /* Varsayılan olarak divler görünür olsun */
        }

        /* Küçük ekranlarda gizlenecek div'in stilini medya sorgusuyla değiştir */
        @media screen and (max-width: 1080px){
            .hide-on-small-screen {
                display: none; /* veya visibility: hidden; veya opacity: 0; */
                visibility: hidden;
            }
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body style="background-color: #191a1f; color:white; font-size: 16px;">
    <div class="d-flex flex-column flex-shrink-0" style="width: 280px; height:100%; position: fixed; left: 0px;">
        <br><br><br>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <!-- <a href="#" class="nav-link active" aria-current="page"> -->
                <a href="{{route('HomePage')}}" class="nav-link text-white" aria-current="page">
                <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
                Keşfet
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-white">
                <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
                Karşılaştır
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-white">
                <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
                Takip Edilenler
                </a>
            </li>
            <hr>
            <li>
                <a href="#" class="nav-link text-white">
                <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
                Paylaşımlar
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-white">
                <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
                İncelemeler
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-white">
                <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
                Alıntılar
                </a>
            </li>
            <hr>
            <li>
                <a href="{{route('books.index')}}" class="nav-link text-white">
                <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
                Kitaplar
                </a>
            </li>
            <li>
                <a href="{{route('movies.index')}}" class="nav-link text-white">
                <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
                Filmler
                </a>
            </li>
            <li>
                <a href="{{route('series.index')}}" class="nav-link text-white">
                <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
                Diziler
                </a>
            </li>
            <li>
                <a href="{{route('actors.index')}}" class="nav-link text-white">
                <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
                Oyuncular
                </a>
            </li>
            <li>
                <a href="{{route('writers.index')}}" class="nav-link text-white">
                <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
                Yazarlar
                </a>
            </li>
            <li>
                <a href="{{route('directors.index')}}" class="nav-link text-white">
                <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
                Yönetmenler
                </a>
            </li>
            <hr>
            <li>
                <a href="{{route('page.contact')}}" class="nav-link text-white">
                <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
                İletişim
                </a>
            </li>
            <li>
                <a href="{{route('page.about')}}" class="nav-link text-white">
                <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
                Hakkında
                </a>
            </li>
            <li>
                <a href="{{route('page.privacyPolicy')}}" class="nav-link text-white">
                <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
                Gizlilik Politikası
                </a>
            </li>
            <li>
                <a href="{{route('page.faq')}}" class="nav-link text-white">
                <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
                Sıkça Sorulan Sorular
                </a>
            </li>
        </ul>
        <div style="text-align: center; font-size:10px;">
            © Telif Hakkı 2023, Tüm Hakları Saklıdır  | LibroVista 2023
        </div>
        <br>
    </div>

    <header class="p-3" style="position: fixed; width:100%; z-index: 1;">
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
                    @if(isset(Auth::user()->name))
                    <div class="dropdown text-end">
                        <a href="#" style="color: white; margin-right: 10px;"><i class="bi bi-chat-square-dots"></i></a>
                        <a href="#" style="color: white; margin-right: 10px;"><i class="bi bi-bell"></i></a>
                        <a href="#" class="link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                            <span class="text-white">{{Auth::user()->name}}</span>
                        </a>
                        <ul class="dropdown-menu text-small">
                            <li><a href="{{route('profile.index', Auth::user()->username)}}" class="dropdown-item">Profil</a></li>
                            <li><a href="#" class="dropdown-item">Arkadaşlar</a></li>
                            <li><button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#contentModal">İçerik Ekle</button></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a href="{{route('settings.index')}}" class="dropdown-item"><i class="bi bi-sliders2"></i> Ayarlar</a></li>
                            <li><button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#logoutModal"><i class="bi bi-door-closed"></i> Çıkış Yap</button></li>
                        </ul>
                    </div>
                    @else
                    <div class="text-end">
                        <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#loginModal">Giriş Yap / Üye Ol</button>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </header>
    @include("Widgets.register")
    @include("Widgets.login")
    <div class="container">
        <div class="row">
            <div class="col-2">
                
            </div>
            <div class="col-8" style="margin-top: 100px;">