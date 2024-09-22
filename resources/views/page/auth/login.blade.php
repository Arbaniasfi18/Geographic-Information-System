@extends('main')

@section('content')
    

<form action="{{ url('login') }}" method="POST">
  @csrf
    <center>
        <div class="cont">
        <br>
          <h3 class="gin">Log In</h3>
          <br>
        @if (\Session::has('success'))
          <div class="alert alert-success">
            {!! \Session::get('success') !!}</li>
          </div>
        @endif
        @if (\Session::has('error'))
          <div class="alert alert-danger">
            {!! \Session::get('error') !!}</li>
          </div>
        @endif
        <div class="form-group">
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Username" name="email">
        </div>
        <br>
        <div class="form-group">
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Password" name="password" minlength="8">
        </div>
        <br>
        <button type="submit" class="btn btn__primary btn__rounded ml-30">Log In</button>
        <p>Sudah punya akun ? </p><a href="{{ url('register') }}">Register</a>  
      </center>
  </form> 
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>


@endsection
