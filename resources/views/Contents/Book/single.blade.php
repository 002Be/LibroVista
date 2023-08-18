@extends("layouts.master")
@section("title", "Kitap - ".$book->name)
@section("content")


<!-- Kitap resmi ve bilgileri -->
<div class="card card-body mt-2" style="background-color:#191a1f;">
    <div style="display: flex;">
        <div>
            <img src="/{{$book->image}}" width="300" height="450" alt="{{$book->name}}">
        </div>
        <div class="m-4 col-7">
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-danger" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-sliders2-vertical"></i></button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{route('book.islem.TakipEt',[$book->id,$book->name,$book->slug])}}">@if(in_array($book->id, $takipID)) Takipten Çıkar @else Takip Et @endif</a></li>
                    <li><a class="dropdown-item" href="{{route('book.islem.FavorilereEkle',[$book->id,$book->name,$book->slug])}}">@if(in_array($book->id, $favoriID)) Favorilerden Kaldır @else Favorilere Ekle @endif</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="{{route('book.islem.Okunan',[$book->id,$book->name,$book->slug])}}" @if(in_array($book->id, $okuyorumID)) style="background-color:gray;" @endif>Okuyorum</a></li>
                    <li><a class="dropdown-item" href="{{route('book.islem.Okudum',[$book->id,$book->name,$book->slug])}}" @if(in_array($book->id, $okudumID)) style="background-color:gray;" @endif>Bitirdim</a></li>
                    <li><a class="dropdown-item" href="{{route('book.islem.Biraktim',[$book->id,$book->name,$book->slug])}}" @if(in_array($book->id, $biraktimID)) style="background-color:gray;" @endif>Bıraktım</a></li>
                    <li><a class="dropdown-item" href="{{route('book.islem.Okunacak',[$book->id,$book->name,$book->slug])}}" @if(in_array($book->id, $okunacakID)) style="background-color:gray;" @endif>Daha Sonra</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Düzeltme Öner</a></li>
                    <li><a class="dropdown-item" href="#">Şikayet Et</a></li>
                </ul>
            </div>

            <div style="text-align: center;"> <i class="bi bi-star"></i> {{$book->rating}} · <i class="bi bi-people"></i> 10</div><br>
            <div>
                Ad : {{$book->name}}
                <br>
                Tür :
                @php
                    $categoriesArray = explode(',', $book->category); 
                    $categoriesCount = count($categoriesArray);
                @endphp
                @foreach($categoriesArray as $category)
                    @php $categoriesCount-- @endphp
                    <a href="#" style="text-decoration: none;">{{$category}}</a>@if($categoriesCount>0),@endif
                    
                @endforeach
                <br>
                Çıkış Yılı : {{date('Y', strtotime($book->releaseYear))}}
                <br>
                Sayfa Sayısı : {{$book->page}}
                <br><br>
                @if(isset($book->translator))
                    Çevirmen : {{$book->translator}}
                    <br>
                @endif
                Yayın Evi : <a href="#" style="text-decoration: none;">{{$book->publisher}}</a>
                <br>
                <hr>
                    <h6>Yazar</h6>
                    <img src="/{{$book->getWriter->image}}" width="40" height="40" style="border-radius:50%;" alt="{{$book->getWriter->name}}">
                    Adı : <a href="{{route('writer.index',$book->getWriter->id)}}" style="text-decoration: none;">{{$book->getWriter->name}}</a>
                    <br>
                    {!!Str::limit($book->getWriter->about, 195)!!}
                <br>
            </div>
        </div>
    </div>
</div>

<!-- Kitabın özeti -->
<div class="card card-body mt-2" style="background-color:#191a1f;">
    <p>{{$book->about}}</p>
</div>

<!-- Kitap resmi ve bilgileri -->

<div class="card card-body mt-2" style="background-color:#191a1f;">
    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
        <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapseOne" checked>
        <label class="btn btn-outline-primary" for="btnradio1">İncelemeler</label>

        <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="true" aria-controls="collapseOne">
        <label class="btn btn-outline-primary" for="btnradio2">Alıntılar</label>
    </div>

    <div class="accordion" id="accordionExample">
        <div class="accordion-item" style="background-color:#191a1f; border:none;">
            <div id="collapse1" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                <div class="card card-body" style="background-color: #191a1f;">
                    <form action="{{route('book.islem.Inceleme')}}" method="POST"> @csrf
                        <textarea name="reviews" cols="30" rows="5" class="form-control" style="background-color: #191a1f; color:white;" required></textarea>
                        <input type="hidden" name="id" value="{{$book->id}}">
                        <button type="submit" class="btn w-100 btn-success mt-2">Paylaş</button>
                    </form>
                    <hr style="color: white;">



                    @foreach($bookData['reviews'] as $reviews)
                        @php
                            $user = App\Models\User::find($reviews['userId']);
                        @endphp
                    <div style="color: white;">
                        <p>{{$user->name}}</p>
                        <p>{{$reviews["reviews"]}}</p>
                        <p>{{Carbon\Carbon::parse($reviews["date"])->diffForHumans()}}</p>
                    </div>
                        
                    @endforeach




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
        
    </div>
</div>
@endsection