@extends("layouts.master")
@section("title", "Ana Sayfa")
@section("content")

<div>
    @php $counter=0; @endphp
    @foreach($discoverContents as $discoverContent)
        @php $counter++; @endphp
        @switch($counter)
            @case(1)
                @php $snap1="writer"; $snap2="book"; @endphp
                @break
            @case(2)
                @php $snap1="director"; $snap2="movie"; @endphp
                @break
            @case(3)
                @php $snap1="director"; $snap2="serie"; @endphp
                @break
            @case(4)
                @php $snap2="actor"; @endphp
                @break
            @case(5)
                @php $snap2="writer"; @endphp
                @break
            @case(6)
                @php $snap2="director"; @endphp
                @break
        @endswitch
        @foreach($discoverContent as $discover)
        <div class="d-flex flex-row mb-3">
            <a href="{{route($snap2.'.index',$discover->slug)}}">
                <div class="rounded overflow-hidden">
                    <img loading="lazy" class="rwe" width="60" height="90" src="/{{$discover->image}}" alt="{{$discover->name}}">
                </div>
            </a>
            <div class="m-1">
                <div class="flex-row">
                    <div class="flex-1">
                        <a href="{{route($snap2.'.index',$discover->slug)}}" style="text-decoration: none; color:white;">
                            <span>{{$discover->name}}</span>
                        </a>
                        <div class="flex-row">
                            <a href="#" style="text-decoration: none; color:white;">
                                <span title="{{$discover->$snap1}}" aria-label="{{$discover->$snap1}}" class="text truncate text-15 hover:underline">{{$discover->$snap1}}</span>
                            </a>
                        </div>
                        <div class="flex-row">
                            <p> {{$discover->rating}}/10 · {{$discover->likes}} beğeni</p>
                            <p style="font-size: 10px; margin-top:-15px;"> Ekleme tarihi : {{date('d-m-Y', strtotime($discover->created_at))}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <br><br>
    @endforeach
</div>

@endsection