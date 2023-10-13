@extends("layouts.master")
@section("title", "İletişim")
@section("content")

<div class="container">
    <div class="mb-5">
        <h1 class="h1-responsive font-weight-bold text-center my-4">İletişim</h1>
    </div>
    <div>
        <section class="mb-4">
            <p class="text-center w-responsive mx-auto mb-5">
            Sormak istediğiniz bir şey var mı? Lütfen doğrudan bizimle iletişime geçmekten çekinmeyin. Ekibimiz içinde size geri dönecektir.
            </p>
            <div class="row">
                <div>
                    <form method="POST" action="{{route('contact.create')}}"> @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <input type="text" id="name" name="name" class="form-control" required>
                                    <label for="name" class="">Adınız</label>
                                </div>
                            </div><br>
                            <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <input type="text" id="email" name="email" class="form-control" required>
                                    <label for="email" class="">E-Posta adresiniz</label>
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="md-form mb-0">
                                    <input type="text" id="subject" name="subject" class="form-control" required>
                                    <label for="subject" class="">Konu</label>
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="md-form">
                                    <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea" required></textarea>
                                    <label for="message">Mesajınız</label>
                                </div>
                            </div>
                        </div>
                        <div class="text-center text-md-left d-grid gap-2"><br>
                            <button class="btn btn-block btn-primary" type="submit">İlet</button>
                        </div>
                    </form>
                    <div class="status"></div>
                </div>
            </div>
        </section>
    </div>
</div>

@endsection
@section("rightBar")
<div class="text-center" style="margin-top: 100%;">
    <ul class="list-unstyled mb-0">
        <li><i class="bi bi-geo-alt"></i></i>
            <p>74357, TURKEY</p>
        </li><br>
        <li><i class="bi bi-telephone"></i></i>
            <p>+90 234 567 89 4X</p>
        </li><br>
        <li><i class="bi bi-envelope"></i></i>
            <p>contact@example.com</p>
        </li>
    </ul>
</div>
@endsection