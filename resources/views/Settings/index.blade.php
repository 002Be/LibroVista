@extends("layouts.master")
@section("title", "Ayarlar")
@section("css")
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<style>
    body{
    margin-top:20px;
    background:#F0F8FF;
}
.card {
    margin-bottom: 1.5rem;
    box-shadow: 0 1px 15px 1px rgba(52,40,104,.08);
}
.card {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid #e5e9f2;
    border-radius: .2rem;
}
.card-header:first-child {
    border-radius: calc(.2rem - 1px) calc(.2rem - 1px) 0 0;
}
.card-header {
    border-bottom-width: 1px;
}
.card-header {
    padding: .75rem 1.25rem;
    margin-bottom: 0;
    color: inherit;
    background-color: #fff;
    border-bottom: 1px solid #e5e9f2;
}
</style>
@endsection
@section("content")

<div class="container p-0">
    <div>
        <div>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="account" role="tabpanel">

                    <!-- Genel Bilgiler -->
                    <div class="card" id="publicInfo">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Genel Bilgiler</h5>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{route('settings.index.update')}}"> @csrf
                                <input type="hidden" name="process" value="publicInfo">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="inputUsername">Kullanıcı Adı</label>
                                            <input name="username" type="text" class="form-control" id="inputUsername" value="{{$user->username}}" required>
                                        </div><br>
                                        <div class="form-group">
                                            <label for="inputUsername">Ad Soyadı</label>
                                            <input name="name" type="text" class="form-control" id="inputUsername" value="{{$user->name}}" required>
                                        </div><br>
                                        <div class="form-group">
                                            <label for="inputUsername">Konumu</label>
                                            <input name="location" type="text" class="form-control" id="inputLocation" value="{{$userData['location']}}" required>
                                        </div><br>
                                        <div class="form-group col-md-4">
                                            <label for="datepicker">Doğum Tarihi</label>
                                            <input name="date" type="date" class="form-control" id="datepicker" name="datepicker" value="{{$user->date}}">
                                        </div><br>
                                        <div class="form-group">
                                            <label for="inputUsername">Hakkında</label>
                                            <textarea name="biography" rows="5" class="form-control" id="inputBio" placeholder="Sizin hakkınızda">{{$userData['biography']}}</textarea><br>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="text-center">
                                            <img alt="Andrew Jones" src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle img-responsive mt-2" width="128" height="128">
                                            <div class="mt-2">
                                                <span class="btn btn-primary"><i class="fa fa-upload"></i></span>
                                            </div>
                                            <small>En iyi sonuçlar için .jpg biçiminde en az 128 piksele 128 piksel boyutlarında bir resim kullanın</small>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success">Kaydet</button>
                            </form>
                        </div>
                    </div>
                </div>


                <!-- E-Posta Değiştir -->
                <div class="card" id="email">
                    <div class="card-header">
                        <h5 class="card-title mb-0">E-Posta Adresini Değiştir</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('settings.index.update')}}"> @csrf
                            <input type="hidden" name="process" value="email">
                            <div class="form-group">
                                <label for="inputEmail1">Mevcut E-Posta Adresiniz</label>
                                <input name="oldEmail" type="email" class="form-control" id="inputEmail1" required>
                            </div><br>
                            <div class="form-group">
                                <label for="inputEmail2">Yeni E-Posta Adresiniz</label>
                                <input name="newEmail" type="email" class="form-control" id="inputEmail2" required>
                            </div><br>
                            <div class="form-group">
                                <label for="inputEmail3">Tekrar Yeni E-Posta Adresiniz</label>
                                <input name="newEmailR" type="email" class="form-control" id="inputEmail3" required>
                            </div><br>
                            <button type="submit" class="btn btn-success">Kaydet</button>
                        </form>
                    </div>
                </div>


                <!-- Şifre Değiştir -->
                <div class="card" id="password">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Şifreni Değiştir</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('settings.index.update')}}"> @csrf
                            <input type="hidden" name="process" value="password">
                            <div class="form-group">
                                <label for="inputPassword">Mevcut Şifreniz</label>
                                <input name="oldPassword" type="password" class="form-control" id="inputPassword" required>
                            </div><br>
                            <div class="form-group">
                                <label for="inputPasswordNew">Yeni Şifreniz</label>
                                <input name="newPassword" type="password" class="form-control" id="inputPasswordNew" required>
                            </div><br>
                            <div class="form-group">
                                <label for="inputPasswordNew2">Tekrar Yeni Şifreniz</label>
                                <input name="newPasswordR" type="password" class="form-control" id="inputPasswordNew2" required>
                            </div><br>
                            <button type="submit" class="btn btn-success">Kaydet</button>
                        </form>
                    </div>
                </div>

                <!-- Bildirimler -->
                <div class="card" id="notification">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Bildirim Seçenekleri</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('settings.index.update')}}"> @csrf
                            <input type="hidden" name="process" value="notification">
                            <div class="form-check form-switch">
                                <label class="form-check-label" for="flexSwitchCheckDefault">E-Posta bildirimleri</label>
                                <input name="" class="form-check-input float-end" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                            </div>
                            <div class="form-check form-switch">
                                <label class="form-check-label" for="flexSwitchCheckChecked">Mobil anlık bildirimleri</label>
                                <input name="" class="form-check-input float-end" type="checkbox" role="switch" id="flexSwitchCheckChecked">
                            </div>
                            <div class="form-check form-switch">
                                <label class="form-check-label" for="flexSwitchCheckChecked">Takip bildirimleri</label>
                                <input name="" class="form-check-input float-end" type="checkbox" role="switch" id="flexSwitchCheckChecked">
                            </div>
                            <div class="form-check form-switch">
                                <label class="form-check-label" for="flexSwitchCheckChecked">Sosyal bildirimler</label>
                                <input name="" class="form-check-input float-end" type="checkbox" role="switch" id="flexSwitchCheckChecked">
                            </div>
                            <div class="form-check form-switch">
                                <label class="form-check-label" for="flexSwitchCheckChecked">Kişiselleştirilmiş bildirimler</label>
                                <input name="" class="form-check-input float-end" type="checkbox" role="switch" id="flexSwitchCheckChecked">
                            </div>
                            <br>
                            <button type="submit" class="btn btn-success">Kaydet</button>
                        </form>
                    </div>
                </div>

                <!-- Özel Bilgiler -->
                <div class="card" id="privateInfo">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Diğer Bilgiler</h5>
                    </div>
                    <div class="card-body">
                        <p style="font-size: 12px;">
                            @php $counterBooks=0; @endphp @foreach($userData['books_read'] as $book) @php $counterBooks++ @endphp @endforeach
                            Okunan kitap sayısı : {{$counterBooks}}<br>
                            @php $counterMovies=0; @endphp @foreach($userData['movies_watched'] as $book) @php $counterMovies++ @endphp @endforeach
                            İzlenen film sayısı : {{$counterMovies}}<br>
                            @php $counterSeries=0; @endphp @foreach($userData['series_watched'] as $book) @php $counterSeries++ @endphp @endforeach
                            İzlenen dizi sayısı : {{$counterSeries}}<br>
                            LibroVista sürümü : S6.A305.B13<br>
                            LibroVista'ya katılma tarihi : {{date('d-m-Y H:i', strtotime($user->created_at))}}<br>
                        </p>
                    </div>
                </div>

                <!-- Hesabı Sil -->
                <div class="card" id="deleteAccount">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Hesabını Sil</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('settings.index.update')}}"> @csrf
                            <input type="hidden" name="process" value="deleteAccount">
                            <p><b>LibroVista</b> hesabınızı silmek istediğinizden emin misiniz? Hesabınızı sildiğinizde, tüm kişisel verileriniz ve içerikleriniz kalıcı olarak silinecektir ve geri döndürülemez. Lütfen bu işlemi dikkatlice düşünün ve karar verin.</p>
                            <br>
                            <button type="submit" class="btn btn-danger">Hesabı Kalıcı Olarak Sil</button>
                        </form>
                    </div>
                </div>

                
            </div>
        </div>
    </div>

</div>

@endsection
@section("rightBar")
<div class="card hide-on-small-screen" style="position: fixed; width:300px">
    <div class="card-header">
        <h5 class="card-title mb-0">Ayarlar</h5>
    </div>
    <div class="list-group list-group-flush" role="tablist">
        <a class="list-group-item list-group-item-action" data-toggle="list" href="#publicInfo" role="tab">
            Genel Bilgiler
        </a>
        <a class="list-group-item list-group-item-action" data-toggle="list" href="#email" role="tab">
            E-Posta Adresini Değiştir
        </a>
        <a class="list-group-item list-group-item-action" data-toggle="list" href="#password" role="tab">
            Şifreni Değiştir
        </a>
        <a class="list-group-item list-group-item-action" data-toggle="list" href="#notification" role="tab">
            Bildirim Seçenekleri
        </a>
        <a class="list-group-item list-group-item-action" data-toggle="list" href="#privateInfo" role="tab">
            Diğer Bilgiler
        </a>
        <a class="list-group-item list-group-item-action" data-toggle="list" href="#deleteAccount" role="tab">
            Hesabını Sil
        </a>
    </div>
</div>
@endsection