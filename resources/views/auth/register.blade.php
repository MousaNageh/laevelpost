@extends("layout.app")
@section("title")
    Register
@endsection
@section("content")
    <div class="container">
        <div class="card text-left col-md-6 offset-md-3 my-5">
            <div class="card-body">
              <h4 class="card-title text-info ">Register</h4>
              <form class="card-text" method="POST" action="{{ route('register') }}">
                  @csrf
                  <div class="form-group">
                      <input type="text" name="username" placeholder="username"   value="{{ old("username", "") }}" class="form-control @error("username") border-danger @enderror">
                      @error("username")
                          <small class="text-danger my-2">
                               {{ $message }}
                          </small>
                      @enderror
                  </div>
                  <div class="form-group">
                      <input type="email" name="email" placeholder="email" value="{{ old("email", "") }}" class="form-control @error("email") border-danger @enderror">
                      @error("email")
                          <small class="text-danger my-2">
                               {{ $message }}
                          </small>
                      @enderror
                  </div>
                  <div class="form-group">
                      <input type="text" name="name" placeholder="name" value="{{ old("name", "") }}" class="form-control @error("name") border-danger @enderror" >
                        @error("name")
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
                  <div class="form-group">
                      <input type="password" name="password_confirmation" value="{{ old("password_confirmation", "") }}" placeholder="repeat password" class="form-control">
                  </div>
                  <input type="submit"  class="btn btn-info text-white" value="Register">
              </form>
            </div>
          </div>
    </div>
@endsection
