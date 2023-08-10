@extends("layouts.master")
@section("title", "Oyunculer")
@section("content")

<div class="pt-4 mb-2 flex-row items-center pb-2 ">
    <div class="flex-1">
        <div style="float: left;">
            <span class="text font-bold text-18">En Beğenilen Oyunculer</span>
        </div>
        <div style="text-align: right;">
            <a href="#" style="text-align: right;">
                <span style="text-align: right;">Tümünü Gör</span>
            </a>
        </div>
    </div>
</div>

@foreach($actors_1 as $actor)
<div class="d-flex flex-row mb-3">
    <a href="{{route('actor.index',$actor->id)}}">
        <div class="rounded overflow-hidden">
            <img loading="lazy" class="rwe" width="60" height="90" src="{{$actor->image}}" alt="{{$actor->name}}">
        </div>
    </a>
    <div class="m-2">
        <div class="flex-row">
            <div class="flex-1">
                <a href="{{route('actor.index',$actor->id)}}" style="text-decoration: none; color:white;">
                    <span>{{$actor->name}}</span>
                </a>
                <div class="flex-row">
                    <a href="#" style="text-decoration: none; color:white;">
                        <span title="{{$actor->actor}}" aria-label="{{$actor->actor}}" class="text truncate text-15 hover:underline">{{$actor->actor}}</span>
                    </a>
                </div>
                <div class="flex-row">
                    <span> {{$actor->rating}}/10 · {{$actor->likes}} beğeni</span>
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
            <span class="text font-bold text-18">En Çok Okunan Oyunculer</span>
        </div>
        <div style="text-align: right;">
            <a href="#" style="text-align: right;">
                <span style="text-align: right;">Tümünü Gör</span>
            </a>
        </div>
    </div>
</div>
@foreach($actors_2 as $actor)
<div class="d-flex flex-row mb-3">
    <a href="{{route('actor.index',$actor->id)}}">
        <div class="rounded overflow-hidden">
            <img loading="lazy" class="rwe" width="60" height="90" src="{{$actor->image}}" alt="{{$actor->name}}">
        </div>
    </a>
    <div class="m-2">
        <div class="flex-row">
            <div class="flex-1">
                <a href="{{route('actor.index',$actor->id)}}" style="text-decoration: none; color:white;">
                    <span>{{$actor->name}}</span>
                </a>
                <div class="flex-row">
                    <a href="#" style="text-decoration: none; color:white;">
                        <span title="{{$actor->actor}}" aria-label="{{$actor->actor}}" class="text truncate text-15 hover:underline">{{$actor->actor}}</span>
                    </a>
                </div>
                <div class="flex-row">
                    <span> {{$actor->rating}}/10 · {{$actor->likes}} beğeni</span>
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
            <span class="text font-bold text-18">En İyi Oyunculer</span>
        </div>
        <div style="text-align: right;">
            <a href="#" style="text-align: right;">
                <span style="text-align: right;">Tümünü Gör</span>
            </a>
        </div>
    </div>
</div>
@foreach($actors_3 as $actor)
<div class="d-flex flex-row mb-3">
        <a href="{{route('actor.index',$actor->id)}}">
        <div class="rounded overflow-hidden">
            <img loading="lazy" class="rwe" width="60" height="90" src="{{$actor->image}}" alt="{{$actor->name}}">
        </div>
    </a>
    <div class="m-2">
        <div class="flex-row">
            <div class="flex-1">
                <a href="{{route('actor.index',$actor->id)}}" style="text-decoration: none; color:white;">
                    <span>{{$actor->name}}</span>
                </a>
                <div class="flex-row">
                    <a href="#" style="text-decoration: none; color:white;">
                        <span title="{{$actor->actor}}" aria-label="{{$actor->actor}}" class="text truncate text-15 hover:underline">{{$actor->actor}}</span>
                    </a>
                </div>
                <div class="flex-row">
                    <span> {{$actor->rating}}/10 · {{$actor->likes}} beğeni</span>
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
            <span class="text font-bold text-18">Tüm Oyunculer</span>
        </div>
        <div style="text-align: right;">
            <a href="#" style="text-align: right;">
                <span style="text-align: right;">Tümünü Gör</span>
            </a>
        </div>
    </div>
</div>
@foreach($actors_4 as $actor)
<div class="d-flex flex-row mb-3">
        <a href="{{route('actor.index',$actor->id)}}">
        <div class="rounded overflow-hidden">
            <img loading="lazy" class="rwe" width="60" height="90" src="{{$actor->image}}" alt="{{$actor->name}}">
        </div>
    </a>
    <div class="m-2">
        <div class="flex-row">
            <div class="flex-1">
                <a href="{{route('actor.index',$actor->id)}}" style="text-decoration: none; color:white;">
                    <span>{{$actor->name}}</span>
                </a>
                <div class="flex-row">
                    <a href="#" style="text-decoration: none; color:white;">
                        <span title="{{$actor->actor}}" aria-label="{{$actor->actor}}" class="text truncate text-15 hover:underline">{{$actor->actor}}</span>
                    </a>
                </div>
                <div class="flex-row">
                    <span> {{$actor->rating}}/10 · {{$actor->likes}} beğeni</span>
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
        <h5 class="card-title mb-0 text-center">Oyunculer</h5>
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