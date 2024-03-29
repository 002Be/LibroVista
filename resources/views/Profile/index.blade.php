@extends("layouts.master")
@section("title", "")
@section("css")

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/@icon/entypo@1.0.3/entypo.css" rel="stylesheet">
<style>
    body{
        margin-top:20px;
        background:#DCDCDC;
    }
    /*profile page*/

    .left-profile-card .user-profile {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        margin: auto;
        margin-bottom: 20px;
    }

    .left-profile-card h3 {
        font-size: 18px;
        margin-bottom: 0;
        font-weight: 700;
    }

    .left-profile-card p {
        margin-bottom: 5px;
    }

    .left-profile-card .progress-bar {
        background-color: var(--main-color);
    }

    .personal-info {
        margin-bottom: 30px;
    }

    .personal-info .personal-list {
        list-style-type: none;
        margin: 0;
        padding: 0;
    }

    .personal-list li {
        margin-bottom: 5px;
    }

    .personal-info h3 {
        margin-bottom: 10px;
    }

    .personal-info p {
        margin-bottom: 5px;
        font-size: 14px;
    }

    .personal-info i {
        font-size: 15px;
        color: var(--main-color);
        ;
        margin-right: 15px;
        width: 18px;
    }

    .skill {
        margin-bottom: 30px;
    }

    .skill h3 {
        margin-bottom: 15px;
    }

    .skill p {
        margin-bottom: 5px;
    }

    .languages h3 {
        margin-bottom: 15px;
    }

    .languages p {
        margin-bottom: 5px;
    }

    .right-profile-card .nav-pills .nav-link.active,
    .nav-pills .show>.nav-link {
        color: #fff;
        background-color: var(--main-color);
    }

    .right-profile-card .nav>li {
        float: left;
        margin-right: 10px;
    }

    .right-profile-card .nav-pills .nav-link {
        border-radius: 26px;
    }

    .right-profile-card h3 {
        font-size: 18px;
        font-weight: 700;
        margin-bottom: 15px;
    }

    .right-profile-card h4 {
        font-size: 16px;
        margin-bottom: 15px;
    }

    .right-profile-card i {
        font-size: 15px;
        margin-right: 10px;
    }

    .right-profile-card .work-container {
        border-bottom: 1px solid #eee;
        margin-bottom: 20px;
        padding: 10px;
    }


    /*timeline*/

    .img-circle {
        border-radius: 50%;
    }

    .timeline-centered {
        position: relative;
        margin-bottom: 30px;
    }

    .timeline-centered:before,
    .timeline-centered:after {
        content: " ";
        display: table;
    }

    .timeline-centered:after {
        clear: both;
    }

    .timeline-centered:before,
    .timeline-centered:after {
        content: " ";
        display: table;
    }

    .timeline-centered:after {
        clear: both;
    }

    .timeline-centered:before {
        content: '';
        position: absolute;
        display: block;
        width: 4px;
        background: #f5f5f6;
        /*left: 50%;*/
        top: 20px;
        bottom: 20px;
        margin-left: 30px;
    }

    .timeline-centered .timeline-entry {
        position: relative;
        /*width: 50%;
            float: right;*/
        margin-top: 5px;
        margin-left: 30px;
        margin-bottom: 10px;
        clear: both;
    }

    .timeline-centered .timeline-entry:before,
    .timeline-centered .timeline-entry:after {
        content: " ";
        display: table;
    }

    .timeline-centered .timeline-entry:after {
        clear: both;
    }

    .timeline-centered .timeline-entry:before,
    .timeline-centered .timeline-entry:after {
        content: " ";
        display: table;
    }

    .timeline-centered .timeline-entry:after {
        clear: both;
    }

    .timeline-centered .timeline-entry.begin {
        margin-bottom: 0;
    }

    .timeline-centered .timeline-entry.left-aligned {
        float: left;
    }

    .timeline-centered .timeline-entry.left-aligned .timeline-entry-inner {
        margin-left: 0;
        margin-right: -18px;
    }

    .timeline-centered .timeline-entry.left-aligned .timeline-entry-inner .timeline-time {
        left: auto;
        right: -100px;
        text-align: left;
    }

    .timeline-centered .timeline-entry.left-aligned .timeline-entry-inner .timeline-icon {
        float: right;
    }

    .timeline-centered .timeline-entry.left-aligned .timeline-entry-inner .timeline-label {
        margin-left: 0;
        margin-right: 70px;
    }

    .timeline-centered .timeline-entry.left-aligned .timeline-entry-inner .timeline-label:after {
        left: auto;
        right: 0;
        margin-left: 0;
        margin-right: -9px;
        -moz-transform: rotate(180deg);
        -o-transform: rotate(180deg);
        -webkit-transform: rotate(180deg);
        -ms-transform: rotate(180deg);
        transform: rotate(180deg);
    }

    .timeline-centered .timeline-entry .timeline-entry-inner {
        position: relative;
        margin-left: -20px;
    }

    .timeline-centered .timeline-entry .timeline-entry-inner:before,
    .timeline-centered .timeline-entry .timeline-entry-inner:after {
        content: " ";
        display: table;
    }

    .timeline-centered .timeline-entry .timeline-entry-inner:after {
        clear: both;
    }

    .timeline-centered .timeline-entry .timeline-entry-inner:before,
    .timeline-centered .timeline-entry .timeline-entry-inner:after {
        content: " ";
        display: table;
    }

    .timeline-centered .timeline-entry .timeline-entry-inner:after {
        clear: both;
    }

    .timeline-centered .timeline-entry .timeline-entry-inner .timeline-time {
        position: absolute;
        left: -100px;
        text-align: right;
        padding: 10px;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }

    .timeline-centered .timeline-entry .timeline-entry-inner .timeline-time>span {
        display: block;
    }

    .timeline-centered .timeline-entry .timeline-entry-inner .timeline-time>span:first-child {
        font-size: 15px;
        font-weight: bold;
    }

    .timeline-centered .timeline-entry .timeline-entry-inner .timeline-time>span:last-child {
        font-size: 12px;
    }

    .timeline-centered .timeline-entry .timeline-entry-inner .timeline-icon {
        background: #fff;
        color: #737881;
        display: block;
        width: 40px;
        height: 40px;
        -webkit-background-clip: padding-box;
        -moz-background-clip: padding;
        background-clip: padding-box;
        -webkit-border-radius: 20px;
        -moz-border-radius: 20px;
        border-radius: 20px;
        text-align: center;
        -moz-box-shadow: 0 0 0 5px #f5f5f6;
        -webkit-box-shadow: 0 0 0 5px #f5f5f6;
        box-shadow: 0 0 0 5px #f5f5f6;
        line-height: 40px;
        font-size: 15px;
        float: left;
    }

    .timeline-centered .timeline-entry .timeline-entry-inner .timeline-icon.bg-primary {
        background-color: #303641;
        color: #fff;
    }

    .timeline-centered .timeline-entry .timeline-entry-inner .timeline-icon.bg-secondary {
        background-color: #ee4749;
        color: #fff;
    }

    .timeline-centered .timeline-entry .timeline-entry-inner .timeline-icon.bg-success {
        background-color: #00a651;
        color: #fff;
    }

    .timeline-centered .timeline-entry .timeline-entry-inner .timeline-icon.bg-info {
        background-color: #21a9e1;
        color: #fff;
    }

    .timeline-centered .timeline-entry .timeline-entry-inner .timeline-icon.bg-warning {
        background-color: #fad839;
        color: #fff;
    }

    .timeline-centered .timeline-entry .timeline-entry-inner .timeline-icon.bg-danger {
        background-color: #cc2424;
        color: #fff;
    }

    .timeline-centered .timeline-entry .timeline-entry-inner .timeline-label {
        position: relative;
        background: #f5f5f6;
        padding: 1em;
        margin-left: 60px;
        -webkit-background-clip: padding-box;
        -moz-background-clip: padding;
        background-clip: padding-box;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
    }

    .timeline-centered .timeline-entry .timeline-entry-inner .timeline-label:after {
        content: '';
        display: block;
        position: absolute;
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 9px 9px 9px 0;
        border-color: transparent #f5f5f6 transparent transparent;
        left: 0;
        top: 10px;
        margin-left: -9px;
    }

    .timeline-centered .timeline-entry .timeline-entry-inner .timeline-label h2,
    .timeline-centered .timeline-entry .timeline-entry-inner .timeline-label p {
        color: #737881;
        font-size: 12px;
        margin: 0;
        line-height: 1.428571429;
    }

    .timeline-centered .timeline-entry .timeline-entry-inner .timeline-label p+p {
        margin-top: 15px;
    }

    .timeline-centered .timeline-entry .timeline-entry-inner .timeline-label h2 {
        font-size: 16px;
        margin-bottom: 10px;
    }

    .timeline-centered .timeline-entry .timeline-entry-inner .timeline-label h2 a {
        color: #303641;
    }

    .timeline-centered .timeline-entry .timeline-entry-inner .timeline-label h2 span {
        -webkit-opacity: .6;
        -moz-opacity: .6;
        opacity: .6;
        -ms-filter: alpha(opacity=60);
        filter: alpha(opacity=60);
    }
</style>
@endsection
@section("content")

<div class="card card-body mt-2" style="background-color:#191a1f;">
    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
        <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1" checked>
        <label class="btn btn-outline-primary" for="btnradio1">Paylaşımlar</label>

        <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="true" aria-controls="collapse2">
        <label class="btn btn-outline-primary" for="btnradio2">İncelemeler</label>

        <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="true" aria-controls="collapse3">
        <label class="btn btn-outline-primary" for="btnradio3">Favoriler</label>

        <input type="radio" class="btn-check" name="btnradio" id="btnradio4" autocomplete="off" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="true" aria-controls="collapse4">
        <label class="btn btn-outline-primary" for="btnradio4">Eklenenler</label>
    </div>

    <div class="accordion" id="accordionExample" >
        <div class="accordion-item" style="background-color:#191a1f; color:white; border:none;">
            <div id="collapse1" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    Paylaşımlar
                </div>
            </div>
        </div>
        <div class="accordion-item" style="background-color:#191a1f; color:white; border:none;">
            <div id="collapse2" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    İncelemeler
                </div>
            </div>
        </div>
        <div class="accordion-item" style="background-color:#191a1f; color:white; border:none;">
            <div id="collapse3" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <div>
                        @foreach($userData['favorite_books'] as $book)
                            @foreach($aBooks as $books)
                                @if($book["id"]==$books["id"])
                                <div class="d-flex flex-row mb-3">
                                    <a href="{{route('book.index',$books->id)}}">
                                        <div class="rounded overflow-hidden">
                                            <img loading="lazy" class="rwe" width="60" height="90" src="/{{$books->image}}" alt="{{$books->name}}">
                                        </div>
                                    </a>
                                    <div class="m-1">
                                        <div class="flex-row">
                                            <div class="flex-1">
                                                <a href="{{route('book.index',$books->id)}}" style="text-decoration: none; color:white;">
                                                    <span>{{$books->name}}</span>
                                                </a>
                                                <div class="flex-row">
                                                    <a href="{{route('writer.index',$books->writer)}}" style="text-decoration: none; color:white;">
                                                        <span class="text truncate text-15 hover:underline">Kitap · {{$books->getWriter->name}}</span>
                                                    </a>
                                                </div>
                                                <div class="flex-row">
                                                    <p> {{$books->rating}}/10 · {{$books->likes}} beğeni</p>
                                                    <p style="font-size: 10px; margin-top:-15px;"> Ekleme tarihi : {{date('d-m-Y', strtotime($books->created_at))}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            @endforeach
                        @endforeach
                    </div>
                    <div>
                        @foreach($userData['favorite_movies'] as $book)
                            @foreach($aMovies as $books)
                                @if($book["id"]==$books["id"])
                                <div class="d-flex flex-row mb-3">
                                    <a href="{{route('book.index',$books->id)}}">
                                        <div class="rounded overflow-hidden">
                                            <img loading="lazy" class="rwe" width="60" height="90" src="/{{$books->image}}" alt="{{$books->name}}">
                                        </div>
                                    </a>
                                    <div class="m-1">
                                        <div class="flex-row">
                                            <div class="flex-1">
                                                <a href="{{route('book.index',$books->id)}}" style="text-decoration: none; color:white;">
                                                    <span>{{$books->name}}</span>
                                                </a>
                                                <div class="flex-row">
                                                    <a href="{{route('writer.index',$books->writer)}}" style="text-decoration: none; color:white;">
                                                        <span class="text truncate text-15 hover:underline">Film · {{$books->getWriter->name}}</span>
                                                    </a>
                                                </div>
                                                <div class="flex-row">
                                                    <p> {{$books->rating}}/10 · {{$books->likes}} beğeni</p>
                                                    <p style="font-size: 10px; margin-top:-15px;"> Ekleme tarihi : {{date('d-m-Y', strtotime($books->created_at))}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            @endforeach
                        @endforeach
                    </div>
                    <div>
                        @foreach($userData['favorite_series'] as $book)
                            @foreach($aSeries as $books)
                                @if($book["id"]==$books["id"])
                                <div class="d-flex flex-row mb-3">
                                    <a href="{{route('book.index',$books->id)}}">
                                        <div class="rounded overflow-hidden">
                                            <img loading="lazy" class="rwe" width="60" height="90" src="/{{$books->image}}" alt="{{$books->name}}">
                                        </div>
                                    </a>
                                    <div class="m-1">
                                        <div class="flex-row">
                                            <div class="flex-1">
                                                <a href="{{route('book.index',$books->id)}}" style="text-decoration: none; color:white;">
                                                    <span>{{$books->name}}</span>
                                                </a>
                                                <div class="flex-row">
                                                    <a href="{{route('writer.index',$books->director)}}" style="text-decoration: none; color:white;">
                                                        <span class="text truncate text-15 hover:underline">Dizi · {{$books->getDirector->name}}</span>
                                                    </a>
                                                </div>
                                                <div class="flex-row">
                                                    <p> {{$books->rating}}/10 · {{$books->likes}} beğeni</p>
                                                    <p style="font-size: 10px; margin-top:-15px;"> Ekleme tarihi : {{date('d-m-Y', strtotime($books->created_at))}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            @endforeach
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="accordion-item" style="background-color:#191a1f; color:white; border:none;">
            <div id="collapse4" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    @php $counter=0; @endphp
                    @foreach($userAddContentsAll as $userAddContents)
                        @php $counter++; @endphp

                        @switch($counter)
                            @case(1)
                                @php $snap1="writer"; $snap2="book"; $snap3="getWriter"; $snap4="Kitap"; @endphp
                                @break
                            @case(2)
                                @php $snap1="director"; $snap2="movie"; $snap3="getDirector"; $snap4="Film"; @endphp
                                @break
                            @case(3)
                                @php $snap1="director"; $snap2="serie"; $snap3="getDirector"; $snap4="Dizi"; @endphp
                                @break
                            @case(4)
                                @php $snap2="actor"; $snap4="Oyuncu"; @endphp
                                @break
                            @case(5)
                                @php $snap2="writer"; $snap4="Yazar"; @endphp
                                @break
                            @case(6)
                                @php $snap2="director"; $snap4="Yönetmen"; @endphp
                                @break
                        @endswitch

                        @foreach($userAddContents as $userAddContent)
                        <div class="d-flex flex-row mb-3">
                            <a href="{{route($snap2.'.index',$userAddContent->id)}}">
                                <div class="rounded overflow-hidden">
                                    <img loading="lazy" class="rwe" width="60" height="90" src="/{{$userAddContent->image}}" alt="{{$userAddContent->name}}">
                                </div>
                            </a>
                            <div class="m-1">
                                <div class="flex-row">
                                    <div class="flex-1">
                                        <a href="{{route($snap2.'.index',$userAddContent->id)}}" style="text-decoration: none; color:white;">
                                            <span>{{$userAddContent->name}}</span>
                                        </a>
                                        <div class="flex-row">
                                        <!-- <a href="{ {route($snap1.'.index',$userAddContent->$snap1)}}" style="text-decoration: none; color:white;"> -->
                                            @if($userAddContent->$snap1)
                                                <a href="{{route($snap1.'.index', ['id' => $userAddContent->$snap1])}}" style="text-decoration: none; color:white;">
                                                    <span class="text truncate text-15 hover:underline">
                                                        @if(!$userAddContent->$snap3->name=="-")
                                                            {{$snap4." · "}}{{$userAddContent->$snap3->name}}
                                                        @else
                                                            {{$snap4}}
                                                        @endif
                                                    </span>
                                                </a>
                                            @else
                                                <a type="hidden"><span style="margin-top:-15px;">{{$snap4}}</span></a>
                                            @endif
                                        </div>
                                        <div class="flex-row">
                                            <p> {{$userAddContent->rating}}/10 · {{$userAddContent->likes}} beğeni</p>
                                            <p style="font-size: 10px; margin-top:-15px;"> Ekleme tarihi : {{date('d-m-Y', strtotime($userAddContent->created_at))}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>





    </div>
</div>

@endsection
@section("rightBar")

    <div class="card left-profile-card" style="width: 350px;">
        <div class="card-body">
            <div class="text-center">
                <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="" class="user-profile">
                <h3>{{$users[0]->name}}</h3>
                <p>{{"@".$users[0]->username}}</p>
                <!-- <div class="d-flex align-items-center justify-content-center mb-3">
                    <i class="fas fa-star text-info"></i>
                    <i class="fas fa-star text-info"></i>
                    <i class="fas fa-star text-info"></i>
                    <i class="fas fa-star text-info"></i>
                    <i class="fas fa-star text-info"></i>
                </div> -->
                <br>
            </div>
            <div class="personal-info">
                <h3>Kişisel Bilgiler</h3>
                <ul class="personal-list">
                    <li><i class="bi bi-file-person"></i><span> {{$userData["biography"]}}</span></li>
                    <li><i class="fas fa-map-marker-alt "></i><span> {{$userData["location"]}}</span></li>
                </ul>
            </div>
            <hr>
            <div>
                <h5 class="mt-3">Bitirilen Kitaplar</h5>
                @foreach($userData['books_finished'] as $book)
                    <a href="{{route('book.index', $book['id'])}}">{{$book['name']}}</a><br>
                @endforeach
                <h5 class="mt-3">Bitirilen Filmler</h5>
                @foreach($userData['movies_finished'] as $movie)
                    <a href="{{route('movie.index', $movie['id'])}}">{{$movie['name']}}</a><br>
                @endforeach
                <h5 class="mt-3">Bitirilen Diziler</h5>
                @foreach($userData['series_finished'] as $series)
                    <a href="{{route('series.index', $series['id'])}}">{{$series['name']}}</a><br>
                @endforeach
            </div>
        </div>
    </div>
@endsection