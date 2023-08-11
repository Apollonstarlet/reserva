{{-- layout --}}
@extends('layouts.fullLayoutMaster')

{{-- page title --}}
@section('title','User Register')

{{-- page style --}}
@section('page-style')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/register.css')}}">
@endsection

{{-- page content --}}
@section('content')
<div id="register-page" class="row">
  <div class="col s12 m8 l4 z-depth-4 card-panel border-radius-6 register-card bg-opacity-8">
    <form class="login-form" method="POST" action="{{ route('register') }}">
      @csrf
      <div class="row">
        <!-- <div class="input-field col s12"  style="text-align: center;">
  			<img src="{{asset('images/mail/seguros_acv.png')}}" height="50" width="264">
		</div> -->
        <div class="col s12">
		  @if(session('success'))
		    <div class="card-alert card green lighten-5">
			  <div class="card-content green-text">
				  <p>{{ __('locale.'. session('success'))}}</p>
			  </div>
			  <button type="button" class="close green-text" data-dismiss="alert" aria-label="Close">
				  <span aria-hidden="true">×</span>
			  </button>
			</div>
		  @elseif(session('error'))
		    <div class="card-alert card red lighten-5">
			  <div class="card-content red-text">
				  <p>{{ __('locale.'. session('error'))}}</p>
			  </div>
			  <button type="button" class="close red-text" data-dismiss="alert" aria-label="Close">
				  <span aria-hidden="true">×</span>
			  </button>
			</div>
		  @else
          	<h5 class="ml-4">{{ __('locale.Register')}}</h5>
		  @endif
      </div>
      <div class="row margin">
        <div class="input-field col m6 s12">
          <i class="material-icons prefix pt-2">person_outline</i>
          <input id="firstname" type="text" class="@error('name') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}"
             autocomplete="firstname" autofocus>
          <label for="firstname" class="center-align">{{ __('locale.Firstname')}}</label>
          @error('firstname')
          <small class="red-text ml-7" role="alert">
            {{ $message }}
          </small>
          @enderror
        </div>
        <div class="input-field col m6 s12">
          <i class="material-icons prefix pt-2">person_outline</i>
          <input id="lastname" type="text" class="@error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}"
             autocomplete="lastname">
          <label for="lastname" class="center-align">{{ __('locale.Lastname')}}</label>
          @error('lastname')
          <small class="red-text ml-7" role="alert">
            {{ $message }}
          </small>
          @enderror
        </div>
      </div>
      <div class="row margin">
        <div class="input-field col s12">
          <i class="material-icons prefix pt-2">mail_outline</i>
          <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email"
            value="{{ old('email') }}"  autocomplete="email">
          <label for="email">{{ __('locale.Email')}}</label>
          @error('email')
          <small class="red-text ml-7" role="alert">
            {{ $message }}
          </small>
          @enderror
        </div>
      </div>
      <div class="row margin">
        <div class="input-field col m6 s12">
          <i class="material-icons prefix pt-2">lock_outline</i>
          <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password"
            autocomplete="new-password">
          <label for="password">{{ __('locale.Password')}}</label>
          @error('password')
          <small class="red-text ml-7" role="alert">
            {{ $message }}
          </small>
          @enderror
        </div>
		<div class="input-field col m6 s12">
          <i class="material-icons prefix pt-2">lock_outline</i>
          <input id="password-confirm" type="password" name="password_confirmation"
            autocomplete="new-password">
          <label for="password-confirm">{{ __('locale.Password_again')}}</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <button type="submit"
            class="btn waves-effect waves-light border-round gradient-45deg-indigo-blue col s12">{{ __('locale.Register')}}</button>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <p class="margin medium-small"><a href="{{ route('login')}}">{{ __('locale.Already_account')}}</a></p>
        </div>
      </div>
    </form>
  </div>
	  <style>
		  .myfooter {
			  position: fixed;
			  left: 0;
			  bottom: 20px;
			  width: 100%;
			  color: white;
			  text-align: center;
		  }
	  </style>
	  <div class="myfooter">
		  <img src="{{ asset('images/logo/footer.png')}}" width="300" height="60">
	  </div>
</div>
@endsection
