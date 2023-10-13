@extends("layouts.master")
@section("title", "Kitap - ".$director->name)
@section("content")


<!-- Kitap resmi ve bilgileri -->
<div class="card card-body mt-2" style="background-color:#191a1f;">
    <div style="display: flex;">
        <div>
            <img src="/{{$director->image}}" width="300" height="450" alt="{{$director->name}}">
        </div>
        <div class="m-4 col-7">
            @if(isset(Auth::user()->username))
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-danger" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-sliders2-vertical"></i></button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('director.islem.TakipEt',[$director->id,$director->name,$director->slug])}}">@if(in_array($director->id, $takipID)) Takipten Çıkar @else Takip Et @endif</a></li>
                        <li><a class="dropdown-item" href="{{route('director.islem.FavorilereEkle',[$director->id,$director->name,$director->slug])}}">@if(in_array($director->id, $favoriID)) Favorilerden Kaldır @else Favorilere Ekle @endif</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Düzeltme Öner</a></li>
                        <li><a class="dropdown-item" href="#">Şikayet Et</a></li>
                    </ul>
                </div>
            @endif
            <div class="m-4">
                <div style="text-align: center;"><i class="bi bi-star"></i> {{$director->rating}} · <i class="bi bi-people"></i> 10</div><br>
                Ad : {{$director->name}}
                <br>
                Doğum tarihi : {{date('d-m-Y', strtotime($director->date))}} · {{$ageDirector}} yaşında.
                <br>
                Beğeni Sayısı : {{$director->likes}}
            </div>
        </div>
    </div>
</div>

<!-- Kitabın özeti -->
<div class="card card-body mt-2" style="background-color:#191a1f;">
    <p>{{$director->about}}</p>
</div>

<!-- Kitap resmi ve bilgileri -->

<div class="card card-body mt-2" style="background-color:#191a1f;">
    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
        <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapseOne" checked>
        <label class="btn btn-outline-primary" for="btnradio1">İncelemeler</label>

        <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="true" aria-controls="collapseOne">
        <label class="btn btn-outline-primary" for="btnradio2">Alıntılar</label>
    </div>

    <div class="accordion" id="accordionExample" >
        <div class="accordion-item" style="background-color:#191a1f; color:white; border:none;">
            <div id="collapse1" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <form action="{{route('director.islem.Inceleme')}}" method="POST"> @csrf
                        <textarea name="reviews" cols="30" rows="5" class="form-control" style="background-color: #191a1f; color:white;" required placeholder="İnceleme yaz"></textarea>
                        <input type="hidden" name="id" value="{{$director->id}}">
                        @if(isset(Auth::user()->username))
                        <button type="submit" class="btn w-100 btn-outline-success mt-2">Paylaş</button>
                        @else
                        <button type="reset" class="btn w-100 btn-outline-success mt-2">Paylaşım Yapabilmek İçin Giriş Yapınız</button>
                        @endif
                    </form>
                    @foreach($directorData['reviews'] as $reviews)
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
                <div class="accordion-body">
                    <form action="{{route('director.islem.Alinti')}}" method="POST"> @csrf
                        <textarea name="quotes" cols="30" rows="5" class="form-control" style="background-color: #191a1f; color:white;" required placeholder="Alıntı yaz"></textarea>
                        <input type="hidden" name="id" value="{{$director->id}}">
                        @if(isset(Auth::user()->username))
                        <button type="submit" class="btn w-100 btn-outline-success mt-2">Paylaş</button>
                        @else
                        <button type="reset" class="btn w-100 btn-outline-success mt-2">Paylaşım Yapabilmek İçin Giriş Yapınız</button>
                        @endif
                    </form>
                    @foreach($directorData['quotes'] as $quotes)
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