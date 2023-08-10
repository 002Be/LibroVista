@extends("layouts.master")
@section("title", "Yönetmenler")
@section("content")

<div class="pt-4 mb-2 flex-row items-center pb-2 ">
    <div class="flex-1">
        <div style="float: left;">
            <span class="text font-bold text-18">En Beğenilen Yönetmenler</span>
        </div>
        <div style="text-align: right;">
            <a href="#" style="text-align: right;">
                <span style="text-align: right;">Tümünü Gör</span>
            </a>
        </div>
    </div>
</div>

@foreach($directors_1 as $director)
<div class="d-flex flex-row mb-3">
    <a href="{{route('director.index',$director->id)}}">
        <div class="rounded overflow-hidden">
            <img loading="lazy" class="rwe" width="60" height="90" src="{{$director->image}}" alt="{{$director->name}}">
        </div>
    </a>
    <div class="m-2">
        <div class="flex-row">
            <div class="flex-1">
                <a href="{{route('director.index',$director->id)}}" style="text-decoration: none; color:white;">
                    <span>{{$director->name}}</span>
                </a>
                <div class="flex-row">
                    <a href="#" style="text-decoration: none; color:white;">
                        <span title="{{$director->director}}" aria-label="{{$director->director}}" class="text truncate text-15 hover:underline">{{$director->director}}</span>
                    </a>
                </div>
                <div class="flex-row">
                    <span> {{$director->rating}}/10 · {{$director->likes}} beğeni</span>
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
            <span class="text font-bold text-18">En Çok Okunan Yönetmenler</span>
        </div>
        <div style="text-align: right;">
            <a href="#" style="text-align: right;">
                <span style="text-align: right;">Tümünü Gör</span>
            </a>
        </div>
    </div>
</div>
@foreach($directors_2 as $director)
<div class="d-flex flex-row mb-3">
    <a href="{{route('director.index',$director->id)}}">
        <div class="rounded overflow-hidden">
            <img loading="lazy" class="rwe" width="60" height="90" src="{{$director->image}}" alt="{{$director->name}}">
        </div>
    </a>
    <div class="m-2">
        <div class="flex-row">
            <div class="flex-1">
                <a href="{{route('director.index',$director->id)}}" style="text-decoration: none; color:white;">
                    <span>{{$director->name}}</span>
                </a>
                <div class="flex-row">
                    <a href="#" style="text-decoration: none; color:white;">
                        <span title="{{$director->director}}" aria-label="{{$director->director}}" class="text truncate text-15 hover:underline">{{$director->director}}</span>
                    </a>
                </div>
                <div class="flex-row">
                    <span> {{$director->rating}}/10 · {{$director->likes}} beğeni</span>
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
            <span class="text font-bold text-18">En İyi Yönetmenler</span>
        </div>
        <div style="text-align: right;">
            <a href="#" style="text-align: right;">
                <span style="text-align: right;">Tümünü Gör</span>
            </a>
        </div>
    </div>
</div>
@foreach($directors_3 as $director)
<div class="d-flex flex-row mb-3">
        <a href="{{route('director.index',$director->id)}}">
        <div class="rounded overflow-hidden">
            <img loading="lazy" class="rwe" width="60" height="90" src="{{$director->image}}" alt="{{$director->name}}">
        </div>
    </a>
    <div class="m-2">
        <div class="flex-row">
            <div class="flex-1">
                <a href="{{route('director.index',$director->id)}}" style="text-decoration: none; color:white;">
                    <span>{{$director->name}}</span>
                </a>
                <div class="flex-row">
                    <a href="#" style="text-decoration: none; color:white;">
                        <span title="{{$director->director}}" aria-label="{{$director->director}}" class="text truncate text-15 hover:underline">{{$director->director}}</span>
                    </a>
                </div>
                <div class="flex-row">
                    <span> {{$director->rating}}/10 · {{$director->likes}} beğeni</span>
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
            <span class="text font-bold text-18">Tüm Yönetmenler</span>
        </div>
        <div style="text-align: right;">
            <a href="#" style="text-align: right;">
                <span style="text-align: right;">Tümünü Gör</span>
            </a>
        </div>
    </div>
</div>
@foreach($directors_4 as $director)
<div class="d-flex flex-row mb-3">
        <a href="{{route('director.index',$director->id)}}">
        <div class="rounded overflow-hidden">
            <img loading="lazy" class="rwe" width="60" height="90" src="{{$director->image}}" alt="{{$director->name}}">
        </div>
    </a>
    <div class="m-2">
        <div class="flex-row">
            <div class="flex-1">
                <a href="{{route('director.index',$director->id)}}" style="text-decoration: none; color:white;">
                    <span>{{$director->name}}</span>
                </a>
                <div class="flex-row">
                    <a href="#" style="text-decoration: none; color:white;">
                        <span title="{{$director->director}}" aria-label="{{$director->director}}" class="text truncate text-15 hover:underline">{{$director->director}}</span>
                    </a>
                </div>
                <div class="flex-row">
                    <span> {{$director->rating}}/10 · {{$director->likes}} beğeni</span>
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
        <h5 class="card-title mb-0 text-center">Yönetmenler</h5>
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