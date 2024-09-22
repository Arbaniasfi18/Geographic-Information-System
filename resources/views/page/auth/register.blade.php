@extends('main')

@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    
<form method="POST" action="{{ url('register') }}">
  @csrf
    <center>
      <div class="cont">
        <h3 class="gin">Register</h3>
        @if (\Session::has('error'))
            <div class="alert alert-success">
              {!! \Session::get('error') !!}
            </div>
        @endif
          <div class="form-group">
            <input type="nama" class="form-control" id="exampleInputNama" placeholder="Masukkan Nama" name="nama" minlength="2">
          </div>
          <div class="form-group">
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Username" name="email">
          </div>
          <div class="form-group">
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Password" name="password" minlength="8">
          </div>
          <div class="form-group">
            <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Ulangi Password" name="conf_pass" minlength="8">
            <p id="conf_pass_err" style="color: red"></p>
          </div>
            <button type="submit" class="btn btn__primary btn__rounded ml-30">Register</button> 
            <a href="{{ url('login') }}" class="btn btn__primary btn__rounded ml-30">Login</a>
          </div>
      </center>
  </form>
    
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

  <script>
    $('form').submit(function(e) {
      var pass1 = $('#exampleInputPassword1').val();
      var pass2 = $('#exampleInputPassword2').val();

      if (pass1 != pass2) {
        $('#conf_pass_err').html('Password does not match');
        e.preventDefault();
      }else {
        $(this).submit();
      }

    });
  </script>

@endsection
