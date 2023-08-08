@extends("layouts.master")
@section("title", "Oyuncu Ekle")
@section("content")

<div class="card" style="background-color:dimgray;">
    <div class="card-header">
        <h5 class="card-title mb-0 text-white">Eklenecek Oyuncu Hakkında</h5>
    </div>
    <div class="card-body text-white">
        <form method="POST" action="{{route('content.actor.add')}}" enctype="multipart/form-data"> @csrf
            <input type="hidden" name="process" value="publicInfo">
                <div class="form-group">
                    <label>Adı Soyadı</label>
                    <input name="name" type="text" class="form-control" style="background-color:dimgray;" required>
                </div><br>
                <div class="form-group">
                    <label>Hayat Hikayesi</label>
                    <textarea name="about" rows="10" class="form-control" style="background-color:dimgray;"></textarea>
                </div><br>
                <div class="form-group">
                    <label>Doğduğu Yer</label>
                    <input name="birthplace" placeholder="Şehir, Ülke" type="text" class="form-control" style="background-color:dimgray;" required>
                </div><br>
                <div class="form-group">
                    <label>Cinsiyeti</label>
                    <input name="gender" type="text" class="form-control" style="background-color:dimgray;" required>
                </div><br>
                <div class="form-group">
                    <label>Resmi</label>
                    <input name="image" type="file" class="form-control" style="background-color:dimgray;" required>
                </div><br>
                <div class="form-group">
                    <label>Doğum Tarihi</label>
                    <input name="date" type="date" class="form-control" style="background-color:dimgray;" required>
                </div><br>
                <div class="form-check">
                    <label class="form-check-label" for="flexCheckChecked">
                        Oyuncu ekleme koşullarını okudum kabul ediyorum.
                    </label>
                    <input class="form-check-input" type="checkbox" id="flexCheckChecked" required>
                </div><br>
            <button type="submit" class="btn btn-success w-100">Oyuncuyu Ekle</button>
        </form>
    </div>
</div>

@endsection
@section("rightBar")

<div style="background-color:dimgray;" class="card" style="position: fixed; width:300px">
    <div class="card-header">
        <h5 class="card-title mb-0 text-center">Oyuncu Ekleme Kuralları</h5>
    </div>
    <div class="list-group list-group-flush" role="tablist">
        <ul>
            <li class="mt-3" type="1">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Et, quo perferendis! Beatae reprehenderit distinctio officiis est nobis similique non minima.</li>
            <li class="mt-3" type="1">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Et, quo perferendis! Beatae reprehenderit distinctio officiis est nobis similique non minima.</li>
            <li class="mt-3" type="1">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Et, quo perferendis! Beatae reprehenderit distinctio officiis est nobis similique non minima.</li>
            <li class="mt-3" type="1">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Et, quo perferendis! Beatae reprehenderit distinctio officiis est nobis similique non minima.</li>
        </ul>
    </div>
</div>

@endsection