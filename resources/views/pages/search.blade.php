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
      <a href="#home">Casa</a>
      <a href="#habitaciones">Suites</a>
      <a href="#amenidades">Amenidades</a>
      <a href="#info">Eventos</a>
      <a href="#historia">Historia</a>
      <a href="#actividades">Actividades</a>
      <a href="#contacto">Contacto</a>
      <br>
      
      <div class="availability">
        <form action="{{ asset('search') }}" method="post" style="padding:1rem;">
        {{ csrf_field() }}
          <div class="box">
              <input type="text" name="fecha" class="input responsive" placeholder="Seleccionar fecha" style="font-size: 13px; cursor: pointer; height: 25px; border-style: solid; border-color: #233734;" value="{{$data['date']}}" />
              <script>
                  $(function() {
                      $('input[name="fecha"]').daterangepicker({
                              locale: {
                                  format: "DD/MM/YYYY"
                              },

                              startDate: moment().startOf('hour'),
                              endDate: moment().startOf('hour').add(48, 'hour')
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
                          <p style="font-size: 13px; padding-top: 3px; cursor: pointer;">Suites {{$data['suites']}}, &nbsp;Adultos {{$data['adults']}}</p>
                      </label>
                  </div>

                  <div class="desplegable" style=" border-top: 1px solid #00000070;">
                      <div class="box" style="margin-left: 0;">
                          <label for="" class="form__label">Suite 1</label>
                          <input type="number" min="1" max="1" value="1" class="input" name="suite" style="display: none;">
                      </div>

                      <div class="box uno" style="display: flex; margin-bottom: 8px;">
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

                          <div class="box uno" style="display: flex;">
                              <label for="" class="form__label" style="font-size: 15px; margin-left: 10px;">Adultos:</label>
                              <input type="number" min="0" max="5" value="0" class="input" name="adultos2" id="adultos" disabled="" style="border: solid 1px #00000073; width: 60px; height: 35px; border-radius: 5px;">
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

                              <div class="box uno" style="display: flex;">
                                  <label for="" class="form__label" style="font-size: 15px; margin-left: 10px;">Adultos:</label>
                                  <input type="number" min="0" max="5" value="0" class="input" name="adultos3" id="adultos3" disabled="" style="border: solid 1px #00000073; width: 60px; height: 35px; border-radius: 5px;">
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

                                  <div class="box uno" style="display: flex;">
                                      <label for="" class="form__label" style="font-size: 15px; margin-left: 10px;">Adultos:</label>
                                      <input type="number" min="0" max="5" value="0" class="input" name="adultos4" id="adultos4" disabled="" style="border: solid 1px #00000073; width: 60px; height: 35px; border-radius: 5px;">
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

                                      <div class="box uno" style="display: flex;">
                                          <label for="" class="form__label" style="font-size: 15px; margin-left: 10px;">Adultos:</label>
                                          <input type="number" min="0" max="5" value="0" class="input" name="adultos5" id="adultos5" disabled="" style="border: solid 1px #00000073; width: 60px; height: 35px; border-radius: 5px;">
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
<div style="height: 10vh;"></div>

<section>
    @foreach($data['suite'] as $suite)
    <div style="height: 2vh;"></div>
    <div class="res-info" style="width: 100%; border: 3px solid #ccc;">
      <div class="res-des">
          <div id="overflow">
              <div class="inner">
                  <img src="{{$suite->image}}" alt="">
              </div>
          </div>
      </div>
      <div class="res-des">
          <h1 class="heading" style="font-size: 2.5rem;font-family: Montecarlo; font-weight: 200;">{{$suite->name}}</h1>
          <p style="text-align: left;"><i class="fa-solid fa-house"></i> {{$suite->area}},&nbsp;&nbsp;<i class="fa-solid fa-bed"></i> {{$suite->num_beds}} camas,&nbsp;&nbsp;<i class="fa-solid fa-user"></i> Capacidad maxima: {{$suite->guests}}</p>
          <p style="text-align: left;color:#c7893e"><i class="fa-solid fa-plus"></i>  full services</p>
          <p style="font-family: Futura; text-align: justify; margin: 10px 10px;">{{$suite->description}}</p>
          <p style="text-align: left;color:#c7893e"><i class="fa-solid fa-feather"></i>  Terms and Conditions</p>
          @php
          $price = (float)$suite->price * (int)$data['dates'];
          @endphp
          <p style="font-size: 18px;text-align: left;">Total {{$data['adults']}} Adults, {{$data['dates']}} Nights - USD $ {{$price}}</p>
          <button class="btn">Seleccionar</button>
          <div style="height:5px;"></div>
      </div>
    </div>
    @endforeach
</section>

@endsection

{{-- vendor script --}}
@section('vendor-script')
@endsection

{{-- page script --}}
@section('page-script')

@endsection