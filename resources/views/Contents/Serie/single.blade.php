@extends("layouts.master")
@section("title", "Dizi - ".$serie->name)
@section("content")


<!-- Kitap resmi ve bilgileri -->
<div class="card card-body mt-2" style="background-color:#191a1f;">
    <div style="display: flex;">
        <div>
            <img src="/{{$serie->image}}" width="300" height="450" alt="{{$serie->name}}">
        </div>
        <div class="m-4 col-7">
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-danger" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-sliders2-vertical"></i></button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{route('serie.islem.TakipEt',[$serie->id,$serie->name,$serie->slug])}}">@if(in_array($serie->id, $takipID)) Takipten Çıkar @else Takip Et @endif</a></li>
                    <li><a class="dropdown-item" href="{{route('serie.islem.FavorilereEkle',[$serie->id,$serie->name,$serie->slug])}}">@if(in_array($serie->id, $favoriID)) Favorilerden Kaldır @else Favorilere Ekle @endif</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="{{route('serie.islem.Izlenilen',[$serie->id,$serie->name,$serie->slug])}}" @if(in_array($serie->id, $izliyorumID)) style="background-color:gray;" @endif>İzliyorum</a></li>
                    <li><a class="dropdown-item" href="{{route('serie.islem.Izledim',[$serie->id,$serie->name,$serie->slug])}}" @if(in_array($serie->id, $izledimID)) style="background-color:gray;" @endif>Bitirdim</a></li>
                    <li><a class="dropdown-item" href="{{route('serie.islem.Biraktim',[$serie->id,$serie->name,$serie->slug])}}" @if(in_array($serie->id, $biraktimID)) style="background-color:gray;" @endif>Bıraktım</a></li>
                    <li><a class="dropdown-item" href="{{route('serie.islem.Izlenilecek',[$serie->id,$serie->name,$serie->slug])}}" @if(in_array($serie->id, $izlenecekID)) style="background-color:gray;" @endif>Daha Sonra</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Düzeltme Öner</a></li>
                    <li><a class="dropdown-item" href="#">Şikayet Et</a></li>
                </ul>
            </div>
            <div class="m-4">
                <p id="deneme">DENEME</p>
                <div style="text-align: center;"><i class="bi bi-star"></i> {{$serie->rating}} · <i class="bi bi-people"></i> 10</div><br>
                Ad : {{$serie->name}}
                <br>
                Tür : 
                @php 
                    $categoriesArray = explode(',', $serie->category); 
                    $categoriesCount = count($categoriesArray);
                @endphp
                @foreach($categoriesArray as $category)
                    @php $categoriesCount-- @endphp
                    <a href="#" style="text-decoration: none;">{{$category}}</a>@if($categoriesCount>0),@endif
                @endforeach
                <br>
                Çıkış Yılı : {{date('Y', strtotime($serie->releaseYear))}}
                <br>
                Sezon Sayısı : {{$serie->season}}
                <br>
                <hr>
                    <h6>Yönetmen</h6>
                    <img src="/{{$serie->image}}" width="40" height="40" style="border-radius:50%;" alt="{{$serie->name}}">
                    Adı : <a href="#" style="text-decoration: none;">{{$serie->director}}</a>
                    <br>
                    Hakkında : Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut iusto veritatis pariatur et sint minus nostrum quae, nemo qui culpa officia animi cumque ipsa ab possimus ipsum aspernatur doloremque sequi.
                <br>
            </div>
        </div>
    </div>
</div>

<!-- Kitabın özeti -->
<div class="card card-body mt-2" style="background-color:#191a1f;">
    <p>{{$serie->about}}</p>
</div>

<!-- Kitap resmi ve bilgileri -->

<div class="card card-body mt-2" style="background-color:#191a1f;">
    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
        <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1" checked>
        <label class="btn btn-outline-primary" for="btnradio1">İncelemeler</label>

        <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="true" aria-controls="collapse2">
        <label class="btn btn-outline-primary" for="btnradio2">Paylaşımlar</label>

        <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="true" aria-controls="collapse3">
        <label class="btn btn-outline-primary" for="btnradio3">Alıntılar</label>

        <input type="radio" class="btn-check" name="btnradio" id="btnradio4" autocomplete="off" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="true" aria-controls="collapse4">
        <label class="btn btn-outline-primary" for="btnradio4">Oyuncular</label>
    </div>

    <div class="accordion" id="accordionExample" >
        <div class="accordion-item" style="background-color:#191a1f; color:white; border:none;">
            <div id="collapse1" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <strong>1This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                </div>
            </div>
        </div>
        <div class="accordion-item" style="background-color:#191a1f; color:white; border:none;">
            <div id="collapse2" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <strong>2This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                </div>
            </div>
        </div>
        <div class="accordion-item" style="background-color:#191a1f; color:white; border:none;">
            <div id="collapse3" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <strong>3This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                </div>
            </div>
        </div>
        <div class="accordion-item" style="background-color:#191a1f; color:white; border:none;">
            <div id="collapse4" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <strong>4This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                </div>
            </div>
        </div>
    </div>
</div>

@endsection