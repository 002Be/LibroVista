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


                    <!--  -->
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Public info</h5>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="inputUsername">Username</label>
                                            <input type="text" class="form-control" id="inputUsername" placeholder="Username">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputUsername">Biography</label>
                                            <textarea rows="2" class="form-control" id="inputBio" placeholder="Tell something about yourself"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="text-center">
                                            <img alt="Andrew Jones" src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle img-responsive mt-2" width="128" height="128">
                                            <div class="mt-2">
                                                <span class="btn btn-primary"><i class="fa fa-upload"></i></span>
                                            </div>
                                            <small>For best results, use an image at least 128px by 128px in .jpg format</small>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </form>
                        </div>
                    </div>


                    <!--  -->
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Private info</h5>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="form-group">
                                    <label for="inputEmail4">E-Posta</label>
                                    <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                                </div><br>
                                <div class="form-group col-md-4">
                                    <label for="inputState">Boş</label>
                                    <select id="inputState" class="form-control">
                                        <option selected="">Seçiniz</option>
                                        <option>...</option>
                                    </select>
                                </div><br>
                                <button type="submit" class="btn btn-primary">Kaydet</button>
                            </form>
                        </div>
                    </div>
                </div>


                <!--  -->
                <div class="card" id="password">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Şifre</h5>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <label for="inputPasswordCurrent">Mevcut Şifre</label>
                                <input type="password" class="form-control" id="inputPasswordCurrent">
                                <small><a href="#">Şifreni mi unuttun?</a></small>
                            </div><br>
                            <div class="form-group">
                                <label for="inputPasswordNew">Yeni Şifre</label>
                                <input type="password" class="form-control" id="inputPasswordNew">
                            </div><br>
                            <div class="form-group">
                                <label for="inputPasswordNew2">Şifre Tekrar</label>
                                <input type="password" class="form-control" id="inputPasswordNew2">
                            </div><br>
                            <button type="submit" class="btn btn-primary">Kaydet</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
@section("rightBar")
<div class="card">
    <div class="card-header">
        <h5 class="card-title mb-0">Profile Settings</h5>
    </div>
    <div class="list-group list-group-flush" role="tablist">
        <a class="list-group-item list-group-item-action active" data-toggle="list" href="#account" role="tab">
            Account
        </a>
        <a class="list-group-item list-group-item-action" data-toggle="list" href="#password" role="tab">
            Password
        </a>
        <a class="list-group-item list-group-item-action" data-toggle="list" href="#" role="tab">
            Privacy and safety
        </a>
        <a class="list-group-item list-group-item-action" data-toggle="list" href="#" role="tab">
            Email notifications
        </a>
        <a class="list-group-item list-group-item-action" data-toggle="list" href="#" role="tab">
            Web notifications
        </a>
        <a class="list-group-item list-group-item-action" data-toggle="list" href="#" role="tab">
            Widgets
        </a>
        <a class="list-group-item list-group-item-action" data-toggle="list" href="#" role="tab">
            Your data
        </a>
        <a class="list-group-item list-group-item-action" data-toggle="list" href="#" role="tab">
            Delete account
        </a>
    </div>
</div>
@endsection