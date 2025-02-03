@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-10">
        <h4>Register Account</h4>
    </div>
    
</div>  

<div class="card mt-4">
    
    @include('layouts.message')
    
    <form method="post" action="create-guest">
      @csrf
        <div class="card-body">                    
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
                    @error('name')
                        <p>Please enter your name</p>
                    @enderror
                  </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                  <label for="email">Email</label>
                  <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email">
                  @error('email')
                      <p>Please enter your email</p>
                  @enderror
              </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                @error('password')
                    <p>Please enter your password</p>
                @enderror
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Enter Password">
                @error('confirm_password')
                    <p>Please enter your confirm password</p>
                @enderror
            </div>
        </div>
        </div>
    </div>
    <div class="card-footer"><button type="submit" class="btn btn-primary">Create Account</button></div>
  </form>
</div>

@endsection

@section('customJs')
  <script>
    
</script>
@endsection