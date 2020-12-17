@extends('layouts.outer')

@section('meta')
  @include('commons.outer.meta', 
  [
    'title' => 'My Academic Writer - Do my academic work ASAP! – Best Writers Do Essays less than 4 Hours',
    'desc' => 'Write my academic work for me today! – From scratch and in less than a couple of hours, our professional academic writers will do your task to score 85% or more.',
    'route' => route('about'),
    'custom' => 'aboutstyle.min.css'
  ]
)
@endsection

@section('nav')
  @include('commons.outer.nav')
@endsection

@section('face')
<style>
.form-control {
    display: block;
    width: 100%;
    height: calc(1.5em + .75rem + 2px);
    padding: .375rem .75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: .25rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
@media (max-width: 1024px){
  .contact .php-email-form {
      padding: 30px 15px 15px 15px;
  }
}
.php-email-form input, .contact .php-email-form textarea {
    border-radius: 10px;
    margin-bottom:10px;
}
.php-email-form{
    margin: 0 auto;
    max-width: 350px;
    margin-bottom:120px;
    margin-top:120px;
    text-align: center;
}
.php-email-form button[type="submit"] {
    background: #fff;
    border: 2px solid #063fb1;
    padding: 10px 24px;
    color: #063fb1;
    transition: 0.4s;
    border-radius: 50px;
    margin-top: 5px;
}
::placeholder{
  text-align:center!important;
  color:#ced4da!important;
}
</style>
<!-- messges -->
@if(Session::get('status') && Session::get('status') == 2000)
  <div class="alert alert-success">{{Session::get('message')}}</div>
  @endif
  @if(Session::get('status') && Session::get('status') == 2001)
  <div class="alert alert-danger">{{Session::get('message')}}</div>
  @endif
  <form action="{{route('password.update')}}" method="POST" class="php-email-form">
        @csrf
            <input type="hidden" name="token" value="{{ $token }}">

          <div class="form-group">
            <input placeholder="your email address" type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ $email ?? old('email') }}" required />
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>

          <div class="form-group">
            <input placeholder="new password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required/>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>

          <div class="form-group">
            <input placeholder="new password" type="password" class="form-control" name="password_confirmation" required/>
          </div>

          <div class="text-center">
            <button type="submit">Change Password</button>
          </div>
  </form>
@endsection

@section('seofake')
    @include('commons.outer.seofake')
@endsection


