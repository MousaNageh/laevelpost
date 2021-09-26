@extends("layout.app")
@section("title")
    Login
@endsection
@section("content")
    <div class="container">
        <div class="card text-left col-md-6 offset-md-3 my-5">
            <div class="card-body">
              <h4 class="card-title text-info ">Login</h4>
              <form class="card-text" method="POST" action="{{ route('login') }}">
                  @csrf
                  @if (session("status"))
                      <div class="alert alert-danger">
                        {{ session("status") }}
                      </div>
                  @endif
                  <div class="form-group">
                      <input type="email" name="email" placeholder="email" value="{{ old("email", "") }}" class="form-control @error("email") border-danger @enderror">
                      @error("email")
                          <small class="text-danger my-2">
                               {{ $message }}
                          </small>
                      @enderror
                  </div>

                  <div class="form-group">
                      <input type="password" name="password" placeholder="password" value="{{ old("password", "") }}" class="form-control @error("password") border-danger @enderror" >
                        @error("password")
                            <small class="text-danger my-2 ">
                                {{ $message }}
                            </small>
                        @enderror
                  </div>

                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="Remember">
                    <label class="form-check-label" for="Remember">
                      Remember Me
                    </label>
                  </div>

                  <input type="submit"  class="btn btn-info text-white" value="Login">
              </form>
            </div>
          </div>
    </div>
@endsection
