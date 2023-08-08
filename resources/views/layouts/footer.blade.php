
            </div>
            <div class="col-2" style="margin-top: 100px;">
                @yield("rightBar")
            </div>
        </div>
    </div>
    <div style="margin:100px;"></div>

    <!-- Logout Modal-->
    <div class="modal fade text-black" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="background-color:dimgray;">
                <div class="modal-header">
                    <h5 id="exampleModalLabel">Çıkış Yap</h5>
                </div>
                <div class="modal-body">
                    <h5>Gerçekten çıkış yapmak istiyor musun?</h5>
                </div>
                <form action="{{route('userLoginRegister')}}" method="POST"> @csrf
                    <div class="modal-footer">
                        <input type="hidden" name="process" value="logout">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Geri Dön</button>
                        <button class="btn btn-danger" type="submit">Çıkış Yap</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- İçerik Modal -->
    <div class="modal fade text-black" id="contentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="background-color:dimgray;">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Eklemek istediğiniz içeriği seçiniz</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <a href="{{route('content.book')}}" class="btn w-100 btn-primary mb-3" style="background-color:#191a1f; border-color:dimgray;">Kitap Ekle</a>
                    <a href="{{route('content.movie')}}" class="btn w-100 btn-primary mb-3" style="background-color:#191a1f; border-color:dimgray;">Film Ekle</a>
                    <a href="{{route('content.serie')}}" class="btn w-100 btn-primary mb-3" style="background-color:#191a1f; border-color:dimgray;">Dizi Ekle</a>
                    <a href="{{route('content.writer')}}" class="btn w-100 btn-primary mb-3" style="background-color:#191a1f; border-color:dimgray;">Yazar Ekle</a>
                    <a href="{{route('content.actor')}}" class="btn w-100 btn-primary mb-3" style="background-color:#191a1f; border-color:dimgray;">Oyuncu Ekle</a>
                    <a href="{{route('content.director')}}" class="btn w-100 btn-primary mb-3" style="background-color:#191a1f; border-color:dimgray;">Yönetmen Ekle</a>
                </div>
            </div>
        </div>
    </div>

    @yield("js")
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
</body>
</html>