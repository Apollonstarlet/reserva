@extends('layouts.fullLayoutMaster')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-content">
        <div class="card-title">{{ __('locale.Verify_txt1')}}</div>
          @if (session('resent'))
          <div class="card-alert card green lighten-5" role="alert">
              <div class="card-content green-text">
                {{ __('locale.Verify_txt2')}}
              </div>
          </div>
          @endif

          {{ __('locale.Verify_txt3')}}
          {{ __('locale.Verify_txt4')}},
          <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
              @csrf
              <button type="submit"
                  class="waves-effect waves-light btn">{{ __('locale.Verify_txt5')}}</button>.
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
