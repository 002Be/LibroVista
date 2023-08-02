<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-body">
        <div class="mask d-flex align-items-center gradient-custom-3">
          <div class="container">
            <div class="row d-flex justify-content-center align-items-center ">

                <div class="card" style="border-radius: 15px;">
                  <div class="card-body p-5">
                    <h2 class="text-uppercase text-center mb-5">Gİrİş Yap</h2>

                    <form method="POST" action="{{route('userLoginRegister')}}"> @csrf
                      <input type="hidden" name="process" value="login">
                      <div class="form-outline mb-4">
                        <input type="text" id="form3Example1cg" class="form-control form-control-lg" name="username" required/>
                        <label class="form-label" for="form3Example1cg">Kullanıcı Adı</label>
                      </div>

                      <div class="form-outline mb-4">
                        <input type="password" id="form3Example4cg" class="form-control form-control-lg" name="password" required/>
                        <label class="form-label" for="form3Example4cg">Şifre</label>
                      </div>

                      <div class="form-check d-flex justify-content-center mb-5">
                        <input class="form-check-input me-2" type="checkbox" id="form2Example3cg"/>
                        <label class="form-check-label" for="form2Example3g">
                            Beni hatırla
                        </label>
                      </div>

                      <div class="d-flex justify-content-center">
                        <button type="submit"
                            class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Giriş Yap</button>
                      </div>
                        <p class="text-center text-muted mt-5 mb-0">Hala üye değil misin?
                            <a href="#!" data-bs-toggle="modal" data-bs-target="#registerModal" class="fw-bold text-body">Üye Ol</a>
                        </p>
                    </form>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>