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
            @if(isset(Auth::user()->username))
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
            @endif
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
        <label class="btn btn-outline-primary" for="btnradio2">Alıntılar</label>

        <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="true" aria-controls="collapse3">
        <label class="btn btn-outline-primary" for="btnradio3">Oyuncular</label>
    </div>

    <div class="accordion" id="accordionExample" >
        <div class="accordion-item" style="background-color:#191a1f; color:white; border:none;">
            <div id="collapse1" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <form action="{{route('serie.islem.Inceleme')}}" method="POST"> @csrf
                        <textarea name="reviews" cols="30" rows="5" class="form-control" style="background-color: #191a1f; color:white;" required placeholder="İnceleme yaz"></textarea>
                        <input type="hidden" name="id" value="{{$serie->id}}">
                        @if(isset(Auth::user()->username))
                        <button type="submit" class="btn w-100 btn-outline-success mt-2">Paylaş</button>
                        @else
                        <button type="reset" class="btn w-100 btn-outline-success mt-2">Paylaşım Yapabilmek İçin Giriş Yapınız</button>
                        @endif
                    </form>
                    @foreach($serieData['reviews'] as $reviews)
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
                    <form action="{{route('serie.islem.Alinti')}}" method="POST"> @csrf
                        <textarea name="quotes" cols="30" rows="5" class="form-control" style="background-color: #191a1f; color:white;" required placeholder="Alıntı yaz"></textarea>
                        <input type="hidden" name="id" value="{{$serie->id}}">
                        @if(isset(Auth::user()->username))
                        <button type="submit" class="btn w-100 btn-outline-success mt-2">Paylaş</button>
                        @else
                        <button type="reset" class="btn w-100 btn-outline-success mt-2">Paylaşım Yapabilmek İçin Giriş Yapınız</button>
                        @endif
                    </form>
                    @foreach($serieData['quotes'] as $quotes)
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
        <div class="accordion-item" style="background-color:#191a1f; color:white; border:none;">
            <div id="collapse3" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <form action="{{route('serie.islem.Oyuncu')}}" method="POST"> @csrf
                        <select name="actor">
                            <option value="">A</option>
                            <option value="">b</option>
                        </select>
                        <input type="hidden" name="id" value="{{$serie->id}}">
                        @if(isset(Auth::user()->username))
                        <button type="submit" class="btn w-100 btn-outline-success mt-2">Ekle</button>
                        @else
                        <button type="reset" class="btn w-100 btn-outline-success mt-2">Ekleme Yapabilmek İçin Giriş Yapınız</button>
                        @endif
                    </form>
                    @foreach($serieData['actors'] as $actors)
                        @php $actor = App\Models\Actor::find($actors['actorId']); @endphp
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
                                        { {Carbon\Carbon::parse($actors["date"])->diffForHumans()}}
                                    </div>
                                    <div>
                                        <a href="{{route('profile.index',$user->username)}}" style="text-decoration:none; color:white;">
                                            {{$actor->name}} <br>
                                            <span style="color:gray;">{ {"@".$user->username}}</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="m-3">
                                <p style="color:#ffffe6;">{{"“".$actors["actors"]."“"}}</p>
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