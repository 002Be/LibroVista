@extends("layouts.master")
@section("title", "Film Ekle")
@section("css")
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.css"/>
@endsection
@section("content")

<div class="card" style="background-color:dimgray;">
    <div class="card-header">
        <h5 class="card-title mb-0 text-white">Eklenecek Film Hakkında</h5>
    </div>
    <div class="card-body text-white">
        <form method="POST" action="{{route('content.movie.add')}}" enctype="multipart/form-data"> @csrf
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
                    <label>Süresi</label>
                    <input name="duration" type="text" class="form-control" style="background-color:dimgray;" required>
                </div><br>
                <div class="form-group">
                    <label>Çıkış Yılı</label>
                    <input name="releaseYear" type="date" class="form-control" style="background-color:dimgray;" required>
                </div><br>
                <div class="form-group">
                    <label>Yönetmeni</label>
                    <div class='form-control' style="background-color:dimgray;">
                        <select name="director" id="id_select2_example" style="width: 200px;" >
                            <option selected disabled style="color:white;">Seçiniz</option required>
                            @foreach($directors as $director)
                                <option value="{{$director->id}}" data-img_src="/{{$director->image}}">@if($director->name=="-") --Listede Yok-- @else {{$director->name}} @endif</option>
                            @endforeach
                        </select>
                    </div>
                </div><br>
                <div class="form-check">
                    <label class="form-check-label" for="flexCheckChecked">
                        Film ekleme koşullarını okudum kabul ediyorum.
                    </label>
                    <input class="form-check-input" type="checkbox" id="flexCheckChecked" required>
                </div><br>
            <button type="submit" class="btn btn-success w-100">Filmi Ekle</button>
        </form>
    </div>
</div>

@endsection
@section("rightBar")

<div style="background-color:dimgray;" class="card" style="position: fixed; width:300px">
    <div class="card-header">
        <h5 class="card-title mb-0 text-center">Film Ekleme Kuralları</h5>
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
@section("js")
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.js"></script>
<script type="text/javascript">
    function custom_template(obj){
            var data = $(obj.element).data();
            var text = $(obj.element).text();
            if(data && data['img_src']){
                img_src = data['img_src'];
                template = $("<div><img src=\"" + img_src + "\" style=\"width:100%;height:170px;\"/><p style=\"font-weight: 250;font-size:14pt;text-align:center;color:black;\">" + text + "</p></div>");
                return template;
            }
        }
    var options = {
        // 'templateSelection': custom_template,
        'templateResult': custom_template,
    }
    $('#id_select2_example').select2(options);
    $('.select2-container--default .select2-selection--single').css({'height': '30px'});
</script>
@endsection