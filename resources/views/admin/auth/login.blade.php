<main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-75">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
              <div class="card card-plain mt-8">
                <div class="card-header pb-0 text-left bg-transparent">
                  <h3 class="font-weight-bolder text-info text-gradient">Masuk sebagai admin</h3>
                  <p class="mb-0">Masukan email dan password admin</p>
                </div>
                <div class="card-body">
                  <form role="form" action="{{route('login')}}" method="POST">
                    @csrf
                    <label>Email</label>
                    <div class="mb-3">
                      @error('email')
                          <label class="text-danger">{{$message}}</label>
                      @enderror
                      @if (Session::has('failed'))
                          {{Session::get('failed')}}
                      @endif
                      <input type="email" name="email" class="form-control" placeholder="Masukan email..." aria-label="Email" aria-describedby="email-addon">
                    </div>
                    <label>Password</label>
                    <div class="mb-3">
                      @error('password')
                      <label class="text-danger">{{$message}}</label>
                      @enderror
                      <input type="password" name="password" class="form-control" placeholder="Masukan password..." aria-label="Password" aria-describedby="password-addon">
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Masuk</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>