@extends('index')

@section('content') 
<div class="container">
    <form class="form-signin" method="post" action="{{ action('MainController@trans') }}">
        @csrf
        <div class="text-center mb-4">
          <h1 class="h3 mb-3 font-weight-normal">Data Transmission</h1>
          <p>Please make sure you have <code>internet connection</code>, Thank you.</p>
        </div>
        <div class="form-label-group">
          <input type="number" id="key" name="key" class="form-control" placeholder="Please enter the 12 digits EACODE..." autofocus>
        </div>
        <button class="btn btn-lg btn-primary btn-block mt-4 send" type="submit">Transmit</button>
      </form>
      <div>
        <img src="{{asset('img/undraw_uploading_go67.svg')}}" style="width:95%;">
        <p><small>Illustration by :<a style="text-decoration:none; color:#5E92FF;" href="https://undraw.co/"> undraw</a></small></p>
      </div>  
</div>
<div id="loading" class="overlay" style="display:none">
    <div class="overlay__inner">
      <div class="overlay__content">
          <span class="spinner"></span><br>
          <p class="text-light">Sending data...</p>
      </div>
    </div>
</div>
@endsection