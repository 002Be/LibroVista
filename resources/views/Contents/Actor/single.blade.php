@extends("layouts.master")
@section("title", "Kitap - ".$actor->name)
@section("content")


<!-- Kitap resmi ve bilgileri -->
<div class="card card-body mt-2" style="background-color:#191a1f;">
    <div style="display: flex;">
        <div>
            <img src="/{{$actor->image}}" width="300" height="450" alt="{{$actor->name}}">
        </div>
        <div class="m-4 col-7">
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-danger" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-sliders2-vertical"></i></button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{route('actor.islem.TakipEt',[$actor->id,$actor->name,$actor->slug])}}">@if(in_array($actor->id, $takipID)) Takipten Çıkar @else Takip Et @endif</a></li>
                    <li><a class="dropdown-item" href="{{route('actor.islem.FavorilereEkle',[$actor->id,$actor->name,$actor->slug])}}">@if(in_array($actor->id, $favoriID)) Favorilerden Kaldır @else Favorilere Ekle @endif</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Düzeltme Öner</a></li>
                    <li><a class="dropdown-item" href="#">Şikayet Et</a></li>
                </ul>
            </div>
            <div class="m-4">
                <div style="text-align: center;"><i class="bi bi-star"></i> {{$actor->rating}} · <i class="bi bi-people"></i> 10</div><br>
                Ad : {{$actor->name}}
                <br>
                Doğum tarihi : {{date('d-m-Y', strtotime($actor->date))}} · {{$ageActor}} yaşında.
                <br>
                Beğeni Sayısı : {{$actor->likes}}
            </div>
        </div>
    </div>
</div>

<!-- Kitabın özeti -->
<div class="card card-body mt-2" style="background-color:#191a1f;">
    <p>{{$actor->about}}</p>
</div>

<!-- Kitap resmi ve bilgileri -->

<div class="card card-body mt-2" style="background-color:#191a1f;">
    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
        <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapseOne" checked>
        <label class="btn btn-outline-primary" for="btnradio1">İncelemeler</label>

        <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="true" aria-controls="collapseOne">
        <label class="btn btn-outline-primary" for="btnradio2">Paylaşımlar</label>

        <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="true" aria-controls="collapseOne">
        <label class="btn btn-outline-primary" for="btnradio3">Alıntılar</label>
    </div>

    <div class="accordion" id="accordionExample" >
        <div class="accordion-item" style="background-color:#191a1f; color:white; border:none;">
            <div id="collapse1" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                </div>
            </div>
        </div>
        <div class="accordion-item" style="background-color:#191a1f; color:white; border:none;">
            <div id="collapse2" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                </div>
            </div>
        </div>
        <div class="accordion-item" style="background-color:#191a1f; color:white; border:none;">
            <div id="collapse3" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                </div>
            </div>
        </div>
        
    </div>
</div>


@endsection