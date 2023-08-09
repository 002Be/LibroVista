@extends("layouts.master")
@section("title", "Filmler")
@section("content")

<div class="pt-4 mb-2 flex-row items-center pb-2 ">
    <div class="flex-1">
        <div style="float: left;">
            <span class="text font-bold text-18">En Beğenilen Kitaplar</span>
        </div>
        <div style="text-align: right;">
            <a href="#" style="text-align: right;">
                <span style="text-align: right;">Tümünü Gör</span>
            </a>
        </div>
    </div>
</div>

@foreach($movies_1 as $movie)
<div class="d-flex flex-row mb-3">
    <a href="{{route('movie.index',$movie->slug)}}">
        <div class="rounded overflow-hidden">
            <img loading="lazy" class="rwe" width="60" height="90" src="{{$movie->image}}" alt="{{$movie->name}}">
        </div>
    </a>
    <div class="m-2">
        <div class="flex-row">
            <div class="flex-1">
                <a href="{{route('movie.index',$movie->slug)}}" style="text-decoration: none; color:white;">
                    <span>{{$movie->name}}</span>
                </a>
                <div class="flex-row">
                    <a href="{{route('director.index',$movie->getDirector->slug)}}" style="text-decoration: none; color:white;">
                        <span title="{{$movie->getDirector->name}}" aria-label="{{$movie->getDirector->name}}" class="text truncate text-15 hover:underline">{{$movie->getDirector->name}}</span>
                    </a>
                </div>
                <div class="flex-row">
                    <span> {{$movie->rating}}/10 · {{$movie->likes}} beğeni</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

<hr class="mt-5">
<div class="pt-4 mb-2 flex-row items-center pb-2 ">
    <div class="flex-1">
        <div style="float: left;">
            <span class="text font-bold text-18">Yeni Çıkan Kitaplar</span>
        </div>
        <div style="text-align: right;">
            <a href="#" style="text-align: right;">
                <span style="text-align: right;">Tümünü Gör</span>
            </a>
        </div>
    </div>
</div>
@foreach($movies_2 as $movie)
<div class="d-flex flex-row mb-3">
    <a href="{{route('movie.index',$movie->slug)}}">
        <div class="rounded overflow-hidden">
            <img loading="lazy" class="rwe" width="60" height="90" src="{{$movie->image}}" alt="{{$movie->name}}">
        </div>
    </a>
    <div class="m-2">
        <div class="flex-row">
            <div class="flex-1">
                <a href="{{route('movie.index',$movie->slug)}}" style="text-decoration: none; color:white;">
                    <span>{{$movie->name}}</span>
                </a>
                <div class="flex-row">
                    <a href="{{route('director.index',$movie->getDirector->slug)}}" style="text-decoration: none; color:white;">
                        <span title="{{$movie->getDirector->name}}" aria-label="{{$movie->getDirector->name}}" class="text truncate text-15 hover:underline">{{$movie->getDirector->name}}</span>
                    </a>
                </div>
                <div class="flex-row">
                    <span> {{$movie->rating}}/10 · {{$movie->likes}} beğeni</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

<hr class="mt-5">
<div class="pt-4 mb-2 flex-row items-center pb-2 ">
    <div class="flex-1">
        <div style="float: left;">
            <span class="text font-bold text-18">En Çok Okunan Kitaplar</span>
        </div>
        <div style="text-align: right;">
            <a href="#" style="text-align: right;">
                <span style="text-align: right;">Tümünü Gör</span>
            </a>
        </div>
    </div>
</div>
@foreach($movies_3 as $movie)
<div class="d-flex flex-row mb-3">
        <a href="{{route('movie.index',$movie->slug)}}">
        <div class="rounded overflow-hidden">
            <img loading="lazy" class="rwe" width="60" height="90" src="{{$movie->image}}" alt="{{$movie->name}}">
        </div>
    </a>
    <div class="m-2">
        <div class="flex-row">
            <div class="flex-1">
                <a href="{{route('movie.index',$movie->slug)}}" style="text-decoration: none; color:white;">
                    <span>{{$movie->name}}</span>
                </a>
                <div class="flex-row">
                    <a href="{{route('director.index',$movie->getDirector->slug)}}" style="text-decoration: none; color:white;">
                        <span title="{{$movie->getDirector->name}}" aria-label="{{$movie->getDirector->name}}" class="text truncate text-15 hover:underline">{{$movie->getDirector->name}}</span>
                    </a>
                </div>
                <div class="flex-row">
                    <span> {{$movie->rating}}/10 · {{$movie->likes}} beğeni</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

<hr class="mt-5">
<div class="pt-4 mb-2 flex-row items-center pb-2 ">
    <div class="flex-1">
        <div style="float: left;">
            <span class="text font-bold text-18">En İyi Kitaplar</span>
        </div>
        <div style="text-align: right;">
            <a href="#" style="text-align: right;">
                <span style="text-align: right;">Tümünü Gör</span>
            </a>
        </div>
    </div>
</div>
@foreach($movies_4 as $movie)
<div class="d-flex flex-row mb-3">
        <a href="{{route('movie.index',$movie->slug)}}">
        <div class="rounded overflow-hidden">
            <img loading="lazy" class="rwe" width="60" height="90" src="{{$movie->image}}" alt="{{$movie->name}}">
        </div>
    </a>
    <div class="m-2">
        <div class="flex-row">
            <div class="flex-1">
                <a href="{{route('movie.index',$movie->slug)}}" style="text-decoration: none; color:white;">
                    <span>{{$movie->name}}</span>
                </a>
                <div class="flex-row">
                    <a href="{{route('director.index',$movie->getDirector->slug)}}" style="text-decoration: none; color:white;">
                        <span title="{{$movie->getDirector->name}}" aria-label="{{$movie->getDirector->name}}" class="text truncate text-15 hover:underline">{{$movie->getDirector->name}}</span>
                    </a>
                </div>
                <div class="flex-row">
                    <span> {{$movie->rating}}/10 · {{$movie->likes}} beğeni</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

<hr class="mt-5">
<div class="pt-4 mb-2 flex-row items-center pb-2 ">
    <div class="flex-1">
        <div style="float: left;">
            <span class="text font-bold text-18">Tüm Kitaplar</span>
        </div>
        <div style="text-align: right;">
            <a href="#" style="text-align: right;">
                <span style="text-align: right;">Tümünü Gör</span>
            </a>
        </div>
    </div>
</div>
@foreach($movies_5 as $movie)
<div class="d-flex flex-row mb-3">
        <a href="{{route('movie.index',$movie->slug)}}">
        <div class="rounded overflow-hidden">
            <img loading="lazy" class="rwe" width="60" height="90" src="{{$movie->image}}" alt="{{$movie->name}}">
        </div>
    </a>
    <div class="m-2">
        <div class="flex-row">
            <div class="flex-1">
                <a href="{{route('movie.index',$movie->slug)}}" style="text-decoration: none; color:white;">
                    <span>{{$movie->name}}</span>
                </a>
                <div class="flex-row">
                    <a href="{{route('director.index',$movie->getDirector->slug)}}" style="text-decoration: none; color:white;">
                        <span title="{{$movie->getDirector->name}}" aria-label="{{$movie->getDirector->name}}" class="text truncate text-15 hover:underline">{{$movie->getDirector->name}}</span>
                    </a>
                </div>
                <div class="flex-row">
                    <span> {{$movie->rating}}/10 · {{$movie->likes}} beğeni</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection
@section("rightBar")

<div style="background-color:dimgray;" class="card hide-on-small-screen" style="position: fixed; width:300px">
    <div class="card-header">
        <h5 class="card-title mb-0 text-center">Kategoriler</h5>
    </div>
    <div class="list-group list-group-flush" role="tablist">
        <p class="m-2"><a href="#" style="text-decoration: none; color:white;">Aksiyon</a></p>
        <p class="m-2"><a href="#" style="text-decoration: none; color:white;">Macera</a></p>
        <p class="m-2"><a href="#" style="text-decoration: none; color:white;">Romantik</a></p>
        <p class="m-2"><a href="#" style="text-decoration: none; color:white;">Komedi</a></p>
        <p class="m-2"><a href="#" style="text-decoration: none; color:white;">Bilim Kurgu</a></p>
    </div>
    <div class="card-header">
        <h5 class="card-title mb-0 text-center">Yazarlar</h5>
    </div>
    <div class="list-group list-group-flush" role="tablist">
        <p class="m-2"><a href="#" style="text-decoration: none; color:white;">Aksiyon</a></p>
        <p class="m-2"><a href="#" style="text-decoration: none; color:white;">Macera</a></p>
        <p class="m-2"><a href="#" style="text-decoration: none; color:white;">Romantik</a></p>
        <p class="m-2"><a href="#" style="text-decoration: none; color:white;">Komedi</a></p>
        <p class="m-2"><a href="#" style="text-decoration: none; color:white;">Bilim Kurgu</a></p>
    </div>
    <div class="card-header">
        <h5 class="card-title mb-0 text-center">Yayınevleri</h5>
    </div>
    <div class="list-group list-group-flush" role="tablist">
        <p class="m-2"><a href="#" style="text-decoration: none; color:white;">Aksiyon</a></p>
        <p class="m-2"><a href="#" style="text-decoration: none; color:white;">Macera</a></p>
        <p class="m-2"><a href="#" style="text-decoration: none; color:white;">Romantik</a></p>
        <p class="m-2"><a href="#" style="text-decoration: none; color:white;">Komedi</a></p>
        <p class="m-2"><a href="#" style="text-decoration: none; color:white;">Bilim Kurgu</a></p>
    </div>
</div>

@endsection