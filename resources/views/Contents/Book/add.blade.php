@extends("layouts.master")
@section("title", "Kitap Ekle")
@section("content")

<div class="card" style="background-color:dimgray;">
    <div class="card-header">
        <h5 class="card-title mb-0 text-white">Eklenecek Kitap Hakkında</h5>
    </div>
    <div class="card-body text-white">
        <form method="POST" action="{{route('content.book.add')}}" enctype="multipart/form-data"> @csrf
            <input type="hidden" name="process" value="publicInfo">
                <div class="form-group">
                    <label>Adı</label>
                    <input name="name" type="text" class="form-control" style="background-color:dimgray;" required>
                </div><br>
                <div class="form-group">
                    <label>Konusu</label>
                    <textarea name="about" rows="10" class="form-control" style="background-color:dimgray;" required></textarea>
                </div><br>
                <div class="form-group">
                    <label>Türü</label>
                    <input name="category" placeholder="Türler arası virgül(,) bırakın | aksiyon,bilim kurgu" type="text" class="form-control" style="background-color:dimgray;" required>
                </div><br>
                <div class="form-group">
                    <label>Resmi</label>
                    <input name="image" type="file" class="form-control" style="background-color:dimgray;" required>
                </div><br>
                <div class="form-group">
                    <label>Sayfa Sayısı</label>
                    <input name="page" type="text" class="form-control" style="background-color:dimgray;" required>
                </div><br>
                <div class="form-group">
                    <label>Çıkış Yılı</label>
                    <input name="releaseYear" type="date" class="form-control" style="background-color:dimgray;" required>
                </div><br>
                <div class="form-group">
                    <label>Yazarı</label>
                    <input name="writer" type="text" class="form-control" style="background-color:dimgray;" required>
                </div><br>
                <div class="form-check">
                    <label class="form-check-label" for="flexCheckChecked">
                        Kitap ekleme koşullarını okudum kabul ediyorum.
                    </label>
                    <input class="form-check-input" type="checkbox" id="flexCheckChecked" required>
                </div><br>
            <button type="submit" class="btn btn-success w-100">Kitapi Ekle</button>
        </form>
    </div>
</div>

@endsection
@section("rightBar")

<div style="background-color:dimgray;" class="card" style="position: fixed; width:300px">
    <div class="card-header">
        <h5 class="card-title mb-0 text-center">Kitap Ekleme Kuralları</h5>
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