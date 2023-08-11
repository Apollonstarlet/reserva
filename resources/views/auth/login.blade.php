{{-- layout --}}
@extends('layouts.fullLayoutMaster')

{{-- page title --}}
@section('title','User Login')

{{-- page style --}}
@section('page-style')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/login.css')}}">
@endsection

{{-- page content --}}
@section('content')
<div id="login-page" class="row">
  <div class="col s12 m6 l4 z-depth-4 card-panel border-radius-6 login-card bg-opacity-8">
    <form class="login-form" method="POST" action="{{ route('login') }}">
      @csrf
      <div class="row">
		<!--<div class="input-field col s12"  style="text-align: center;">
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
          	<h5 class="ml-4">{{ __('locale.Sign_in')}}</h5>
		  @endif
        </div>
      </div>
      <div class="row margin">
        <div class="input-field col s12">
          <i class="material-icons prefix pt-2">person_outline</i>
          <input id="email" type="email" class=" @error('email') is-invalid @enderror" name="email"
            value="{{ old('email') }}"  autocomplete="email" autofocus>
          <label for="email" class="center-align">{{ __('locale.Email')}}</label>
          @error('email')
          <small class="red-text ml-7" >
            {{ $message }}
          </small>
          @enderror
        </div>
      </div>
      <div class="row margin">
        <div class="input-field col s12">
          <i class="material-icons prefix pt-2">lock_outline</i>
          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
            name="password"  autocomplete="current-password">
          <label for="password">{{ __('locale.Password')}}</label>
          @error('password')
          <small class="red-text ml-7" >
            {{ $message }}
          </small>
          @enderror
        </div>
      </div>
      <div class="row margin">
        <div class="col s8 m8 l8">
          <p>
            <label>
              <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
              <span>{{ __('locale.Remember')}}</span>
            </label>
          </p>
		</div>
		<div class="col s4 m4 l4">
			<ul class="navbar-list">
				<li class="dropdown-language">
				  <a class="waves-effect waves-block waves-light translation-button" data-target="translation-dropdown">
					<span class="flag-icon flag-icon-mx"></span>
				  </a>
				</li>
			</ul>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <button type="submit" class="btn waves-effect waves-light border-round gradient-45deg-indigo-blue col s12">
            {{ __('locale.Login')}}
          </button>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6 m6 l6">
          <p class="margin medium-small"><a href="{{ route('register') }}">{{ __('locale.Register_now')}}</a></p>
        </div>
        <div class="input-field col s6 m6 l6">
          <p class="margin right-align medium-small">
            <a href="{{ route('password.request') }}">{{ __('locale.Forgot_password')}}</a>
          </p>
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
<ul class="dropdown-content" id="translation-dropdown">
	<li class="dropdown-item">
		<a class="grey-text text-darken-1" href="{{url('lang/en')}}" data-language="en">
			<i class="flag-icon flag-icon-us"></i>
			{{ __('locale.English')}}
		</a>
	</li>
	<li class="dropdown-item">
		<a class="grey-text text-darken-1" href="{{url('lang/es')}}" data-language="es">
			<i class="flag-icon flag-icon-mx"></i>
			{{ __('locale.Spanish')}}
		</a>
	</li>
</ul>
@endsection
