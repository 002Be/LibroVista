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
            @if(isset(Auth::user()->username))
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
            @endif

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
                        <textarea name="reviews" cols="30" rows="5" class="form-control" style="background-color: #191a1f; color:white;" required placeholder="İnceleme yaz"></textarea>
                        <input type="hidden" name="id" value="{{$book->id}}">
                        @if(isset(Auth::user()->username))
                        <button type="submit" class="btn w-100 btn-outline-success mt-2">Paylaş</button>
                        @else
                        <button type="reset" class="btn w-100 btn-outline-success mt-2">Paylaşım Yapabilmek İçin Giriş Yapınız</button>
                        @endif
                    </form>
                    @foreach($bookData['reviews'] as $reviews)
                        @php $user = App\Models\User::find($reviews['userId']); @endphp
                        <hr style="color: white;">
                        <div style="color: white;">
                            <div>
                                <div style="float:left;" class="me-1">
                                    <a href="{{route('profile.index',$user->username)}}">
                                        <img src="{{asset('uploads/writer/person.png')}}" width="50px" style="border-radius: 50%;" alt="{{$user->name}}">
                                    </a>
                                    </div>
                                <div class="ms-1">
                                    <div style="float:right;">
                                        {{Carbon\Carbon::parse($reviews["date"])->diffForHumans()}}
                                    </div>
                                    <div>
                                        <a href="{{route('profile.index',$user->username)}}" style="text-decoration:none; color:white;">
                                            {{$user->name}} <br>
                                            <span style="color:gray;">{{"@".$user->username}}</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="m-3">
                                <p>{{$reviews["reviews"]}}</p>
                            </div>
                            <div style="text-align: right;">
                                <a href="#" class="me-1" style="width: 30px; height:30px; text-decoration:none; color:white;"><i class="bi bi-heart"></i></a>
                                <a href="#" style="width: 30px; height:30px; text-decoration:none; color:white;"><i class="bi bi-flag"></i></a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="accordion-item" style="background-color:#191a1f; color:white; border:none;">
            <div id="collapse2" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="card card-body" style="background-color: #191a1f;">
                    <form action="{{route('book.islem.Alinti')}}" method="POST"> @csrf
                        <textarea name="quotes" cols="30" rows="5" class="form-control" style="background-color: #191a1f; color:white;" required placeholder="Alıntı yaz"></textarea>
                        <input type="hidden" name="id" value="{{$book->id}}">
                        @if(isset(Auth::user()->username))
                        <button type="submit" class="btn w-100 btn-outline-success mt-2">Paylaş</button>
                        @else
                        <button type="reset" class="btn w-100 btn-outline-success mt-2">Paylaşım Yapabilmek İçin Giriş Yapınız</button>
                        @endif
                    </form>
                    @foreach($bookData['quotes'] as $quotes)
                        @php $user = App\Models\User::find($quotes['userId']); @endphp
                        <hr style="color: white;">
                        <div style="color: white;">
                            <div>
                                <div style="float:left;" class="me-1">
                                    <a href="{{route('profile.index',$user->username)}}">
                                        <img src="{{asset('uploads/writer/person.png')}}" width="50px" style="border-radius: 50%;" alt="{{$user->name}}">
                                    </a>
                                    </div>
                                <div class="ms-1">
                                    <div style="float:right;">
                                        {{Carbon\Carbon::parse($quotes["date"])->diffForHumans()}}
                                    </div>
                                    <div>
                                        <a href="{{route('profile.index',$user->username)}}" style="text-decoration:none; color:white;">
                                            {{$user->name}} <br>
                                            <span style="color:gray;">{{"@".$user->username}}</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="m-3">
                                <p style="color:#ffffe6;">{{"“".$quotes["quotes"]."“"}}</p>
                            </div>
                            <div style="text-align: right;">
                                <a href="#" class="me-1" style="width: 30px; height:30px; text-decoration:none; color:white;"><i class="bi bi-heart"></i></a>
                                <a href="#" style="width: 30px; height:30px; text-decoration:none; color:white;"><i class="bi bi-flag"></i></a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection 