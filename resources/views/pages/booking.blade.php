{{-- extend layout --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title', 'Search')

{{-- page style --}}
@section('page-style')
@endsection

@section('menu')
  <div id="menu-btn" class="fas fa-bars"></div>
  <nav class="navbar" style="width: 60%;">
      <a href="{{env('APP_URL')}}#home">Casa</a>
      <a href="{{env('APP_URL')}}#habitaciones">Suites</a>
      <a href="{{env('APP_URL')}}#amenidades">Amenidades</a>
      <a href="{{env('APP_URL')}}#info">Eventos</a>
      <a href="{{env('APP_URL')}}#historia">Historia</a>
      <a href="{{env('APP_URL')}}#actividades">Actividades</a>
      <a href="{{env('APP_URL')}}#contacto">Contacto</a>
      <br>
      
      <div class="availability">
        <form action="{{ asset('search') }}" method="post" style="padding:1rem;">
        {{ csrf_field() }}
          <div class="box">
              <p id="num_date" style="display: none;">{{$data['dates']}}</p>
              <input type="text" name="fecha" class="input responsive" placeholder="Seleccionar fecha" style="font-size: 13px; cursor: pointer; height: 25px; border-style: solid; border-color: #233734;" value="{{$data['date']}}" />
              <script>
                  $(function() {
                      let dates = Number($('p#num_date').innerHTML);
                      $('input[name="fecha"]').daterangepicker({
                              locale: {
                                  format: "YYYY-MM-DD"
                              },
                          },

                          function(start, end, label) {
                              console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
                          });
                  });
              </script>
          </div>
          <div class="box" style="cursor: pointer;">
              <!--SUITE 1-->
              <div class="contenedor-input" style="border-radius: 5px;">

                  <input type="checkbox" id="evento-click">

                  <div class="boton-abrir" style=" border-style: solid; border-color: #233734;">
                      <label for="evento-click" class="btn-open">
                          <p>Suites {{$data['suites']}}, &nbsp;Adultos {{$data['adults']}}</p>
                      </label>
                  </div>

                  <div class="desplegable" style=" border-top: 1px solid #00000070;">
                      <div class="box" style="margin-left: 0;">
                          <label for="" class="form__label">Suite 1</label>
                          <input type="number" min="1" max="1" value="1" class="input" name="suite" style="display: none;">
                      </div>

                      <div class="box uno" style="display: flex; width: auto;;">
                          <label for="" class="form__label" style="font-size: 15px; margin-left: 10px;">Adultos:</label>
                          <input type="number" min="1" max="5" value="2" class="input" name="adultos" style="border: solid 1px #0000005e; width: 60px; height: 35px; border-radius: 5px;">
                      </div>

                      <input type="checkbox" id="click-agregar">
                      <br>
                      <label for="click-agregar" value="activar caja" onclick="activarcaja();activaradultos()" class="boton-agregar" style="font-size: 10px; padding: 6px;">Agregar Suite</label>

                      <div class="desplegable-suite" style="border-top: 1px solid #00000073; margin-top: 10px;">
                          <br>
                          <label for="click-agregar" value="desactivar caja" onclick="desactivarcaja();desactivaradultos()" class="boton-agregarR" style="font-size: 10px; padding: 6px;">Eliminar suite</label>
                          <!--SUITE 2-->
                          <label for="" class="form__label">Suite 2</label>
                          <input type="number" min="1" max="1" value="1" name="suite2" hidden id="caja" disabled="">
                          <script type="text/javascript">
                              function activarcaja() {
                                  document.getElementById('caja').disabled = false
                              }

                              function desactivarcaja() {
                                  document.getElementById('caja').disabled = true
                              }
                          </script>
                          <div class="box uno" style="display: flex;width: 150px;">
                              <label for="" class="form__label" style="font-size: 15px; margin-left: 10px;">Adultos:</label>
                              <input type="number" min="1" max="5" value="1" class="input" name="adultos2" id="adultos" disabled="" style="border: solid 1px #00000073; width: 60px; height: 35px; border-radius: 5px;">
                              <script type="text/javascript">
                                  function activaradultos() {
                                      document.getElementById('adultos').disabled = false
                                  }

                                  function desactivaradultos() {
                                      document.getElementById('adultos').disabled = true
                                  }
                              </script>

                          </div>

                          <input type="checkbox" id="suite3">
                          <br>
                          <label for="suite3" value="activar caja2" onclick="activarcaja2();activaradultos3()" class="boton-agregar" style="font-size: 10px; padding: 6px;">Agregar suite</label>

                          <!--SUITE 3-->

                          <div class="desplegable-suite3" style="border-top: 1px solid #00000073; margin-top: 10px;">
                              <br>
                              <label for="suite3" value="desactivar caja2" onclick="desactivarcaja2();desactivaradultos3()" class="boton-agregarR" style="font-size: 10px; padding: 6px;">Eliminar suite</label>

                              <label for="" class="form__label">Suite 3</label>
                              <input type="number" min="1" max="1" value="1" name="suite3" hidden id="caja2" disabled="">
                              <script type="text/javascript">
                                  function activarcaja2() {
                                      document.getElementById('caja2').disabled = false
                                  }

                                  function desactivarcaja3() {
                                      document.getElementById('caja2').disabled = true
                                  }
                              </script>

                              <div class="box uno" style="display: flex;width: 150px;">
                                  <label for="" class="form__label" style="font-size: 15px; margin-left: 10px;">Adultos:</label>
                                  <input type="number" min="1" max="5" value="1" class="input" name="adultos3" id="adultos3" disabled="" style="border: solid 1px #00000073; width: 60px; height: 35px; border-radius: 5px;">
                                  <script type="text/javascript">
                                      function activaradultos3() {
                                          document.getElementById('adultos3').disabled = false
                                      }

                                      function desactivaradultos3() {
                                          document.getElementById('adultos3').disabled = true
                                      }
                                  </script>
                              </div>

                              <!--SUITE 4-->

                              <input type="checkbox" id="suite4">
                              <br>
                              <label for="suite4" value="activar caja3" onclick="activarcaja3();activaradultos4()" class="boton-agregar" style="font-size: 10px; padding: 6px;">Agregar suite</label>

                              <div class="desplegable-suite4" style="border-top: 1px solid #00000073; margin-top: 10px;">
                                  <br>
                                  <label for="suite4" value="desactivar caja3" onclick="desactivarcaja3();desactivaradultos4()" class="boton-agregarR" style="font-size: 10px; padding: 6px;">Eliminar suite</label>

                                  <label for="" class="form__label">Suite 4</label>
                                  <input type="number" min="1" max="1" value="1" name="suite4" hidden id="caja3" disabled="">
                                  <script type="text/javascript">
                                      function activarcaja3() {
                                          document.getElementById('caja3').disabled = false
                                      }

                                      function desactivarcaja4() {
                                          document.getElementById('caja3').disabled = true
                                      }
                                  </script>

                                  <div class="box uno" style="display: flex;width: 150px;">
                                      <label for="" class="form__label" style="font-size: 15px; margin-left: 10px;">Adultos:</label>
                                      <input type="number" min="1" max="5" value="1" class="input" name="adultos4" id="adultos4" disabled="" style="border: solid 1px #00000073; width: 60px; height: 35px; border-radius: 5px;">
                                      <script type="text/javascript">
                                          function activaradultos4() {
                                              document.getElementById('adultos4').disabled = false
                                          }

                                          function desactivaradultos4() {
                                              document.getElementById('adultos4').disabled = true
                                          }
                                      </script>
                                  </div>

                                  <!--SUITE 5-->
                                  <input type="checkbox" id="suite5">
                                  <br>
                                  <label for="suite5" value="activar caja4" onclick="activarcaja4();activaradultos5()" class="boton-agregar" style="font-size: 10px; padding: 6px;">Agregar suite</label>

                                  <div class="desplegable-suite5" style="border-top: 1px solid #00000073; margin-top: 10px;">
                                      <br>
                                      <label for="suite5" value="desactivar caja4" onclick="desactivarcaja4();desactivaradultos5()" class="boton-agregarR" style="font-size: 10px; padding: 6px;">Eliminar suite</label>

                                      <label for="" class="form__label">Suite 5</label>
                                      <input type="number" min="1" max="1" value="1" name="suite5" hidden id="caja4" disabled="">
                                      <script type="text/javascript">
                                          function activarcaja4() {
                                              document.getElementById('caja4').disabled = false
                                          }

                                          function desactivarcaja5() {
                                              document.getElementById('caja4').disabled = true
                                          }
                                      </script>

                                      <div class="box uno" style="display: flex;width: 150px;">
                                          <label for="" class="form__label" style="font-size: 15px; margin-left: 10px;">Adultos:</label>
                                          <input type="number" min="1" max="5" value="1" class="input" name="adultos5" id="adultos5" disabled="" style="border: solid 1px #00000073; width: 60px; height: 35px; border-radius: 5px;">
                                          <script type="text/javascript">
                                              function activaradultos5() {
                                                  document.getElementById('adultos5').disabled = false
                                              }

                                              function desactivaradultos5() {
                                                  document.getElementById('adultos5').disabled = true
                                              }
                                          </script>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="box">
              <input type="submit" class="input responsive" value="Buscar" style="font-size: 13px; cursor: pointer; height: 25px; border-style: solid; border-color: #233734;">
          </div>
        </form>
      </div>
  </nav>
@endsection

{{-- page content --}}
@section('content')
<!--EVENTOS APARTADO-->
<div style="height: 100px;"></div>
<section>
  <div class="row">
    <div class="col-sm-6" style="font-size:1.5rem;">
      
      <div class="row">
        <div class="col-sm-12" style="border-radius:10px; border: 1px solid #dee2e6;background: #f1f1f1;padding: 1.75rem;">
          <h2>Informacion Personal</h2>
          <form>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Nombre*</label>
                <input type="text" class="form-control" id="firstname">
              </div>
              <div class="form-group col-md-6">
                <label>Apellidos*</label>
                <input type="text" class="form-control" id="lastname">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Email*</label>
                <input type="email" class="form-control" id="email">
              </div>
              <div class="form-group col-md-6">
                <label>Phone*</label>
                <input type="phone" class="form-control" id="phone">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputState">Country</label>
                <select id="inputState" class="form-control">
                  <option value="mx" selected>Mexico</option>
                  <option value="us">Unitied States</option>
                  <option value="mx">Mexico</option>
                  <option value="ca">Canada</option>
                  <option value="uk">Unitied Kingdorm</option>
                </select>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="col-sm-6" style="font-size:1.5rem;">
      <div class="row">
        <div class="col-sm-12" style="border-radius:10px; border: 1px solid #dee2e6;background: #f1f1f1;padding: 1.75rem;">
          <h2>Cupon</h2>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label>Enter your coupon code if you have one</label>
              <input type="text" class="form-control" name="cupon">
            </div>
            <div class="form-group col-md-6">
              <a class="btn">Apply</a>
            </div>
          </div>
        </div>
        <div class="col-sm-12" style="border-radius:10px; border: 1px solid #dee2e6;background: #f1f1f1;padding: 1.75rem;">
          <h2>Su reservacion</h2>
          <div class="form-row">
            <div class="form-group col-md-12">
              <table class="table site-block-order-table mb-5">
                <thead>
                  <tr>
                    <th>Fecha</th>
                    <th>{{$data['date']}}</th>
                  </tr></thead>
                <tbody>
                  <tr>
                    <td>Suites</td>
                    <td>{{$data['suites']}}</td>
                  </tr>
                  <tr>
                    <td>Adultos</td>
                    <td>{{$data['adults']}}</td>
                  </tr>
                  <tr>
                    <td>Nights</td>
                    <td>{{$data['dates']}}</td>
                  </tr>
                  <tr>
                    <td class="text-success">
                      Descuento
                    </td>
                    <td id="tdTotal">0</td>
                  </tr>
                  <tr>
                    <td><b>Total final</b></td>
                    <td id="tdTotalFinal" data-total="20">USD ${{$data['total']}}</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="form-group col-md-12">
              <a class="btn" data-toggle="modal" data-target="#bookingBtn">Booking</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Trigger/Open The Modal -->
<div id="bookingBtn" class="modal fade" tabindex="-1" aria-labelledby="bookingBtnLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content" style="padding:15px;">
      <div class="modal-header">
        <h1 class="modal-title" id="exampleModalLabel"><strong>Payment Details</strong></h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <i class="fa-brands fa-cc-visa fa-3x" aria-hidden="true" style="margin-right:10px;"></i>
            <i class="fa-brands fa-cc-mastercard  fa-3x" aria-hidden="true" style="margin-right:10px;"></i>
            <i class="fa-brands fa-cc-discover  fa-3x" aria-hidden="true" style="margin-right:10px;"></i>
            <i class="fa-brands fa-cc-amex fa-3x" aria-hidden="true" style="margin-right:10px;"></i>
          </div>
        </div>
        <form role="form" action="{{ route('stripe.post') }}" method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
        {{ csrf_field() }}
        <input type="hidden" name="price" value="{{$data['total']}}">
        <input type="hidden" name="term" value="{{$data['date']}}">
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label for="validationTooltipCardNumber"><strong>CARD NUMBER</strong></label>
              <div class="input-group">
                <input type="text" class="form-control card-number border-right-0" id="validationTooltipCardNumber" placeholder="Card Number"autocomplete='off' size='20'>
                <div class="input-group-prepend">
                  <span class="input-group-text rounded-right" id="validationTooltipCardNumber"><i class="fa fa-credit-card"></i></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 col-12">
            <div class="form-group">
              <label for="exampleInputExpirationDate"><strong>Expiration Month</strong></label>
              <input type="text" id="exampleInputExpirationDate" class='form-control card-expiry-month' placeholder='MM' size='2'>
            </div>
          </div>
          <div class="col-md-4 col-12">
            <div class="form-group">
              <label for="exampleInputExpirationDate"><strong>Expiration Year</strong></label>
              <input type="text" id="exampleInputExpirationDate" class='form-control card-expiry-year' placeholder='YYYY' size='4'>
            </div>
          </div>
          <div class="col-md-4 col-12">
            <div class="form-group">
              <label for="exampleInputCvcCode"><strong>CVC CODE</strong></label>
              <input type="text" class="form-control card-cvc" id="exampleInputCvcCode"autocomplete='off' placeholder='ex. 311' size='4'>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <button class="btn">Pay Now (${{$data['total']}})</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

{{-- vendor script --}}
@section('vendor-script')
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">
$(function() {
   
    var $form         = $(".require-validation");
    $('input#email').val();
   
    $('form.require-validation').bind('submit', function(e) {
        var $form         = $(".require-validation"),
        inputSelector = ['input[type=email]', 'input[type=password]',
                         'input[type=text]', 'input[type=file]',
                         'textarea'].join(', '),
        $inputs       = $form.find('.required').find(inputSelector),
        $errorMessage = $form.find('div.error'),
        valid         = true;
        $errorMessage.addClass('hide');
  
        $('.has-error').removeClass('has-error');
        $inputs.each(function(i, el) {
          var $input = $(el);
          if ($input.val() === '') {
            $input.parent().addClass('has-error');
            $errorMessage.removeClass('hide');
            e.preventDefault();
          }
        });
   
        if (!$form.data('cc-on-file')) {
          $('input[name="email"]').val(email);
          $('input[name="firstname"]').val(firstname);
          e.preventDefault();
          Stripe.setPublishableKey($form.data('stripe-publishable-key'));
          Stripe.createToken({
            number: $('.card-number').val(),
            cvc: $('.card-cvc').val(),
            exp_month: $('.card-expiry-month').val(),
            exp_year: $('.card-expiry-year').val()
          }, stripeResponseHandler);
        }
  
  });
  
  function stripeResponseHandler(status, response) {

        let email = $('input#email').val();
        let firstname = $('input#firstname').val();
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            /* token contains id, last4, and card type */
            var token = response['id'];
               
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/><input type='hidden' name='email' value='" + email + "'/><input type='hidden' name='firstname' value='" + firstname + "'/>");
            $form.get(0).submit();
        }
    }
   
});
</script>
@endsection

{{-- page script --}}
@section('page-script')
@endsection