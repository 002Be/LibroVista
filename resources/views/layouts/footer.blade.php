
            </div>
            <div class="col-3">
                @yield("rightBar")
            </div>
        </div>
    </div>
    <div style="margin:100px;"></div>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
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

    @yield("js")
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
</body>
</html>