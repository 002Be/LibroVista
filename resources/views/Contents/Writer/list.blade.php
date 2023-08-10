@extends("layouts.master")
@section("title", "Yazarlar")
@section("content")

<div class="pt-4 mb-2 flex-row items-center pb-2 ">
    <div class="flex-1">
        <div style="float: left;">
            <span class="text font-bold text-18">En Beğenilen Yazarlar</span>
        </div>
        <div style="text-align: right;">
            <a href="#" style="text-align: right;">
                <span style="text-align: right;">Tümünü Gör</span>
            </a>
        </div>
    </div>
</div>

@foreach($writers_1 as $writer)
<div class="d-flex flex-row mb-3">
    <a href="{{route('writer.index',$writer->id)}}">
        <div class="rounded overflow-hidden">
            <img loading="lazy" class="rwe" width="60" height="90" src="{{$writer->image}}" alt="{{$writer->name}}">
        </div>
    </a>
    <div class="m-2">
        <div class="flex-row">
            <div class="flex-1">
                <a href="{{route('writer.index',$writer->id)}}" style="text-decoration: none; color:white;">
                    <span>{{$writer->name}}</span>
                </a>
                <div class="flex-row">
                    <a href="#" style="text-decoration: none; color:white;">
                        <span title="{{$writer->writer}}" aria-label="{{$writer->writer}}" class="text truncate text-15 hover:underline">{{$writer->writer}}</span>
                    </a>
                </div>
                <div class="flex-row">
                    <span> {{$writer->rating}}/10 · {{$writer->likes}} beğeni</span>
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
            <span class="text font-bold text-18">En Çok Okunan Yazarlar</span>
        </div>
        <div style="text-align: right;">
            <a href="#" style="text-align: right;">
                <span style="text-align: right;">Tümünü Gör</span>
            </a>
        </div>
    </div>
</div>
@foreach($writers_2 as $writer)
<div class="d-flex flex-row mb-3">
    <a href="{{route('writer.index',$writer->id)}}">
        <div class="rounded overflow-hidden">
            <img loading="lazy" class="rwe" width="60" height="90" src="{{$writer->image}}" alt="{{$writer->name}}">
        </div>
    </a>
    <div class="m-2">
        <div class="flex-row">
            <div class="flex-1">
                <a href="{{route('writer.index',$writer->id)}}" style="text-decoration: none; color:white;">
                    <span>{{$writer->name}}</span>
                </a>
                <div class="flex-row">
                    <a href="#" style="text-decoration: none; color:white;">
                        <span title="{{$writer->writer}}" aria-label="{{$writer->writer}}" class="text truncate text-15 hover:underline">{{$writer->writer}}</span>
                    </a>
                </div>
                <div class="flex-row">
                    <span> {{$writer->rating}}/10 · {{$writer->likes}} beğeni</span>
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
            <span class="text font-bold text-18">En İyi Yazarlar</span>
        </div>
        <div style="text-align: right;">
            <a href="#" style="text-align: right;">
                <span style="text-align: right;">Tümünü Gör</span>
            </a>
        </div>
    </div>
</div>
@foreach($writers_3 as $writer)
<div class="d-flex flex-row mb-3">
        <a href="{{route('writer.index',$writer->id)}}">
        <div class="rounded overflow-hidden">
            <img loading="lazy" class="rwe" width="60" height="90" src="{{$writer->image}}" alt="{{$writer->name}}">
        </div>
    </a>
    <div class="m-2">
        <div class="flex-row">
            <div class="flex-1">
                <a href="{{route('writer.index',$writer->id)}}" style="text-decoration: none; color:white;">
                    <span>{{$writer->name}}</span>
                </a>
                <div class="flex-row">
                    <a href="#" style="text-decoration: none; color:white;">
                        <span title="{{$writer->writer}}" aria-label="{{$writer->writer}}" class="text truncate text-15 hover:underline">{{$writer->writer}}</span>
                    </a>
                </div>
                <div class="flex-row">
                    <span> {{$writer->rating}}/10 · {{$writer->likes}} beğeni</span>
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
            <span class="text font-bold text-18">Tüm Yazarlar</span>
        </div>
        <div style="text-align: right;">
            <a href="#" style="text-align: right;">
                <span style="text-align: right;">Tümünü Gör</span>
            </a>
        </div>
    </div>
</div>
@foreach($writers_4 as $writer)
<div class="d-flex flex-row mb-3">
        <a href="{{route('writer.index',$writer->id)}}">
        <div class="rounded overflow-hidden">
            <img loading="lazy" class="rwe" width="60" height="90" src="{{$writer->image}}" alt="{{$writer->name}}">
        </div>
    </a>
    <div class="m-2">
        <div class="flex-row">
            <div class="flex-1">
                <a href="{{route('writer.index',$writer->id)}}" style="text-decoration: none; color:white;">
                    <span>{{$writer->name}}</span>
                </a>
                <div class="flex-row">
                    <a href="#" style="text-decoration: none; color:white;">
                        <span title="{{$writer->writer}}" aria-label="{{$writer->writer}}" class="text truncate text-15 hover:underline">{{$writer->writer}}</span>
                    </a>
                </div>
                <div class="flex-row">
                    <span> {{$writer->rating}}/10 · {{$writer->likes}} beğeni</span>
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