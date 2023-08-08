@extends("layouts.master")
@section("title", "Dizi - ".$serie->name)
@section("content")


<!-- Kitap resmi ve bilgileri -->
<div class="card card-body mt-2" style="background-color:#191a1f;">
    <div style="display: flex;">
        <div>
            <img src="/{{$serie->image}}" width="300" height="450" alt="{{$serie->name}}">
        </div>
        <div class="m-4">
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
            Sayfa Sayısı : {{$serie->page}}
            <br><br>
            @if(isset($serie->translator))
                Çevirmen : {{$serie->translator}}
                <br>
            @endif
            Yayın Evi : <a href="#" style="text-decoration: none;">{{$serie->publisher}}</a>
            <br>
            <hr>
                <h6>Yazar</h6>
                <img src="/{{$serie->image}}" width="40" height="40" style="border-radius:50%;" alt="{{$serie->name}}">
                Adı : <a href="#" style="text-decoration: none;">{{$serie->writer}}</a>
                <br>
                Hakkında : Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut iusto veritatis pariatur et sint minus nostrum quae, nemo qui culpa officia animi cumque ipsa ab possimus ipsum aspernatur doloremque sequi.
            <br>
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