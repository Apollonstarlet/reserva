{{-- extend layout --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title', 'Dashboard')

{{-- page style --}}
@section('page-style')
<link rel="stylesheet" href="css/estilo.css">
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
  </nav>
@endsection

{{-- page content --}}
@section('content')
<section class="home" id="home">
  <div class="swiper">
      <div class="container-slider">
          <div class="contenedor2" id="contenedor2">
              <div class="slider-section">
                  <img src="imagenes/10.jpeg" alt="" class="slider-img">
              </div>
              <div class="slider-section">
                  <img src="imagenes/12.jpeg" alt="" class="slider-img">
              </div>
              <div class="slider-section">
                  <img src="imagenes/3.jpeg" alt="" class="slider-img">
              </div>
              <div class="slider-section">
                  <img src="imagenes/9.jpeg" alt="" class="slider-img">
              </div>
          </div>
          <div class="slider-btn slider-btn-right" id="btn-right">&#62;</div>
          <div class="slider-btn slider-btn-left" id="btn-left">&#60;</div>
      </div>
      <div class="availability">
          <form action="{{ asset('search') }}" class="form-register" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
              <div class="box">
                  <input type="text" name="fecha" class="input responsive" placeholder="Seleccionar fecha" style="font-size: 13px; cursor: pointer; height: 46px;" />
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

              <hr>
              <div class="box" style="cursor: pointer;">
                  <!--SUITE 1-->
                  <div class="contenedor-input" style="border-radius: 5px;">

                      <input type="checkbox" id="evento-click">

                      <div class="boton-abrir">
                          <label for="evento-click" class="btn-open">
                              <p style="font-size: 15px; padding-top: 12px; cursor: pointer;">Suites, Adultos</p>
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
                  <input type="submit" class="form__submit" value="Buscar" style="font-size: 15px; margin-bottom: 9px;">
              </div>

          </form>
      </div>
</section>

<!--APARTADO DE SUITES-->
<section id="habitaciones" class="habitaciones">
  <section class="offer mtop">
      <div class="container6">
          <div class="heading1">
              <h1 class="heading" style="color: #fff; font-family: Montecarlo;">Suite</h1>
          </div>

          <div class="content grid2 mtop">
              <div class="box1 flex">
                  <div class="left">
                      <div class="carrousel">
                          <div class="conteCarrousel">
                              <div class="itemCarrousel" id="itemCarrousel-1">

                                  <div class="itemCarrouselArrows">
                                      <a href="#itemCarrousel-3">
                                          <i class="fas fa-chevron-left"></i>
                                      </a>
                                      <a href="#itemCarrousel-2">
                                          <i class="fas fa-chevron-right"></i>
                                      </a>
                                  </div>
                              </div>
                              <div class="itemCarrousel" id="itemCarrousel-2">

                                  <div class="itemCarrouselArrows">
                                      <a href="#itemCarrousel-1">
                                          <i class="fas fa-chevron-left"></i>
                                      </a>
                                      <a href="#itemCarrousel-3">
                                          <i class="fas fa-chevron-right"></i>
                                      </a>
                                  </div>
                              </div>
                              <div class="itemCarrousel" id="itemCarrousel-3">

                                  <div class="itemCarrouselArrows">
                                      <a href="#itemCarrousel-2">
                                          <i class="fas fa-chevron-left"></i>
                                      </a>
                                      <a href="#itemCarrousel-1">
                                          <i class="fas fa-chevron-right"></i>
                                      </a>
                                  </div>
                              </div>
                          </div>
                          <div class="conteCarrouselController">
                              <a href="#itemCarrousel-1">•</a>
                              <a href="#itemCarrousel-2">•</a>
                              <a href="#itemCarrousel-3">•</a>
                          </div>
                      </div>
                  </div>
                  <div class="right">
                      <h4 style="color: #233734;">Junior suite double</h4>
                      <div class="rate flex">
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                      </div>
                      <p><i class="fa-solid fa-bed"></i> 2 camas
                          <br><br><i class="fa-solid fa-user"></i> Capacidad maxima: 5<br><br>
                          Disfruta de una estancia inolvidable en nuestra habitación doble con el equilibrio perfecto entre comodidad y sustentabilidad
                      </p>
                      <h5 style="color: #233734; font-size: 16px;">$4000/Noche</h5>
                      <center>
                          <a href="Carrito/index.php" class="btn" style="font-size: 13px;">Ver más</a>
                      </center>
                  </div>
              </div>
              <div class="box1 flex">
                  <div class="left">
                      <div class="carrousel1">
                          <div class="conteCarrousel1">
                              <div class="itemCarrousel1" id="itemCarrousel-11">

                                  <div class="itemCarrouselArrows1">
                                      <a href="#itemCarrousel-31">
                                          <i class="fas fa-chevron-left"></i>
                                      </a>
                                      <a href="#itemCarrousel-21">
                                          <i class="fas fa-chevron-right"></i>
                                      </a>
                                  </div>
                              </div>
                              <div class="itemCarrousel1" id="itemCarrousel-21">

                                  <div class="itemCarrouselArrows">
                                      <a href="#itemCarrousel-11">
                                          <i class="fas fa-chevron-left"></i>
                                      </a>
                                      <a href="#itemCarrousel-31">
                                          <i class="fas fa-chevron-right"></i>
                                      </a>
                                  </div>
                              </div>
                              <div class="itemCarrousel1" id="itemCarrousel-31">
                                  >
                                  <div class="itemCarrouselArrows1">
                                      <a href="#itemCarrousel-21">
                                          <i class="fas fa-chevron-left"></i>
                                      </a>
                                      <a href="#itemCarrousel-11">
                                          <i class="fas fa-chevron-right"></i>
                                      </a>
                                  </div>
                              </div>
                          </div>
                          <div class="conteCarrouselController1">
                              <a href="#itemCarrousel-11">•</a>
                              <a href="#itemCarrousel-21">•</a>
                              <a href="#itemCarrousel-31">•</a>
                          </div>
                      </div>
                  </div>
                  <div class="right">
                      <h4 style="color: #233734;">Junior suite king</h4>
                      <div class="rate flex">
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                      </div>
                      <p><i class="fa-solid fa-bed"></i> 1 cama
                          <br><br><i class="fa-solid fa-user"></i> Capacidad maxima: 4<br><br>
                          Descubre un nuevo amanecer en nuestra exquisita habitación king, donde el confort es nuestro sello distintivo
                      </p>
                      <h5 style="color: #233734; font-size: 16px;">$3500/Noche</h5>
                      <center>
                          <a href="Carrito/index.php" class="btn" style="font-size: 13px;">Ver más</a>
                      </center>
                  </div>
              </div>
              <div class="box1 flex">
                  <div class="left">

                      <div class="carrousel2">
                          <div class="conteCarrousel2">
                              <div class="itemCarrousel2" id="itemCarrousel-12">

                                  <div class="itemCarrouselArrows2">
                                      <a href="#itemCarrousel-32">
                                          <i class="fas fa-chevron-left"></i>
                                      </a>
                                      <a href="#itemCarrousel-22">
                                          <i class="fas fa-chevron-right"></i>
                                      </a>
                                  </div>
                              </div>
                              <div class="itemCarrousel1" id="itemCarrousel-22">

                                  <div class="itemCarrouselArrows">
                                      <a href="#itemCarrousel-12">
                                          <i class="fas fa-chevron-left"></i>
                                      </a>
                                      <a href="#itemCarrousel-32">
                                          <i class="fas fa-chevron-right"></i>
                                      </a>
                                  </div>
                              </div>
                              <div class="itemCarrousel1" id="itemCarrousel-32">

                                  <div class="itemCarrouselArrows2">
                                      <a href="#itemCarrousel-22">
                                          <i class="fas fa-chevron-left"></i>
                                      </a>
                                      <a href="#itemCarrousel-12">
                                          <i class="fas fa-chevron-right"></i>
                                      </a>
                                  </div>
                              </div>
                          </div>
                          <div class="conteCarrouselController2">
                              <a href="#itemCarrousel-12">•</a>
                              <a href="#itemCarrousel-22">•</a>
                              <a href="#itemCarrousel-32">•</a>
                          </div>
                      </div>

                  </div>
                  <div class="right">
                      <h4 style="color: #233734;">Master suite green</h4>
                      <div class="rate flex">
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                      </div>
                      <p><i class="fa-solid fa-bed"></i> 1 cama
                          <br><br><i class="fa-solid fa-user"></i> Capacidad maxima: 2 <br><br>
                          Disfruta el amanecer de tu estancia exponenciando principalmente el contacto con la naturaleza, ideal para pasar una velada en pareja.
                      </p>
                      <h5 style="color: #233734; font-size: 16px;">$5000/Noche</h5>
                      <center>
                          <a href="Carrito/" class="btn" style="font-size: 13px;">Ver más</a>
                      </center>
                  </div>
              </div>
              <div class="box1 flex">
                  <div class="left">

                      <div class="carrousel3">
                          <div class="conteCarrousel3">
                              <div class="itemCarrousel3" id="itemCarrousel-13">

                                  <div class="itemCarrouselArrows3">
                                      <a href="#itemCarrousel-33">
                                          <i class="fas fa-chevron-left"></i>
                                      </a>
                                      <a href="#itemCarrousel-23">
                                          <i class="fas fa-chevron-right"></i>
                                      </a>
                                  </div>
                              </div>
                              <div class="itemCarrousel3" id="itemCarrousel-23">

                                  <div class="itemCarrouselArrows">
                                      <a href="#itemCarrousel-13">
                                          <i class="fas fa-chevron-left"></i>
                                      </a>
                                      <a href="#itemCarrousel-33">
                                          <i class="fas fa-chevron-right"></i>
                                      </a>
                                  </div>
                              </div>
                              <div class="itemCarrousel1" id="itemCarrousel-33">

                                  <div class="itemCarrouselArrows3">
                                      <a href="#itemCarrousel-23">
                                          <i class="fas fa-chevron-left"></i>
                                      </a>
                                      <a href="#itemCarrousel-13">
                                          <i class="fas fa-chevron-right"></i>
                                      </a>
                                  </div>
                              </div>
                          </div>
                          <div class="conteCarrouselController3">
                              <a href="#itemCarrousel-13">•</a>
                              <a href="#itemCarrousel-23">•</a>
                              <a href="#itemCarrousel-33">•</a>
                          </div>
                      </div>

                  </div>
                  <div class="right">
                      <h4 style="color: #233734;">Master suite deluxe</h4>
                      <div class="rate flex">
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                      </div>
                      <p><i class="fa-solid fa-bed"></i> 1 cama
                          <br><br><i class="fa-solid fa-user"></i> Capacidad maxima: 2 <br><br>
                          Disfruta de tu estancia exponenciando principalmente el contacto con la naturaleza
                          donde todos los elementos se conjugan y los sentidos se activan.
                      </p>
                      <h5 style="color: #233734; font-size: 16px;">$6000/Noche</h5>
                      <center>
                          <a href="Carrito/index.php" class="btn" style="font-size: 13px;">Ver más</a>
                      </center>
                  </div>
              </div>
          </div>
      </div>
  </section>
</section>

<!--APARTADO DE AMENIDADES-->
<section id="amenidades" class="amenidades">
  <h1 class="heading" style="color: #fff; font-family: Montecarlo;">Amenidades</h1>
  <div class="body_page">
      <div class="container_card">
          <div class="cardt c1">
              <div class="icon">
                  <img src="imagenes/12.jpeg" alt="">
              </div>

              <div class="info_description">
                  <center>
                      <p style="font-family: Futura;"><b>Plaza Maria bonita</b>
                          <br>
                          <a href="amenidades/plazamb.html" style="font-size: 12px;">
                              <div class="btn">Ver mas</div>
                          </a>
                  </center>
              </div>
          </div>

          <div class="cardt c2">
              <div class="icon">
                  <img src="imagenes/7.jpeg" alt="">
              </div>

              <div class="info_description">
                  <center>
                      <p><b>Cava</b></p>
                      <a href="amenidades/cava.html">
                          <div class="btn" style="font-size: 13px;">Ver mas</div>
                      </a>
                  </center>
              </div>
          </div>

          <div class="cardt c3">
              <div class="icon">
                  <img src="imagenes/8.jpeg" alt="">
              </div>

              <div class="info_description">
                  <center>
                      <p><b>El librero</b></p>
                      <a href="amenidades/ellibrero.html">
                          <div class="btn" style="font-size: 12px;">Ver mas</div>
                      </a>
                  </center>
              </div>
          </div>

          <div class="cardt c3">
              <div class="icon">
                  <img src="imagenes/resturante.jpeg" alt="">
              </div>

              <div class="info_description">
                  <center>
                      <p><b>Restaurante</b></p>
                      <a href="amenidades/restaurante.html">
                          <div class="btn" style="font-size: 12px;">Ver mas</div>
                      </a>
                  </center>
              </div>
          </div>

          <div class="cardt c3">
              <div class="icon">
                  <img src="imagenes/10.jpeg" alt="">
              </div>

              <div class="info_description">
                  <center>
                      <p><b>Roof top</b></p>
                      <a href="amenidades/rooftop.html">
                          <div class="btn" style="font-size: 12px;">Ver mas</div>
                      </a>
                  </center>

              </div>
          </div>

          <div class="cardt c3">
              <div class="icon">
                  <img src="imagenes/10.jpeg" alt="">
              </div>

              <div class="info_description">
                  <center>
                      <p><b>Roof top privado</b></p>
                      <a href="amenidades/rooftoppriv.html">
                          <div class="btn" style="font-size: 12px;">Ver mas</div>
                      </a>
                  </center>

              </div>
          </div>

          <div class="cardt c3">
              <div class="icon">
                  <img src="imagenes/10.jpeg" alt="">
              </div>

              <div class="info_description">
                  <center>
                      <p><b>Jardin central</b></p>
                      <a href="amenidades/jardin.html">
                          <div class="btn" style="font-size: 12px;">Ver mas</div>
                      </a>
                  </center>

              </div>
          </div>

          <div class="cardt c3">
              <div class="icon">
                  <img src="imagenes/Alberca.jpg" alt="">
              </div>

              <div class="info_description">
                  <center>
                      <p><b>Alberca</b></p>
                      <a href="amenidades/alberca.html">
                          <div class="btn" style="font-size: 12px;">Ver mas</div>
                      </a>
                  </center>

              </div>
          </div>
      </div>
  </div>
</section>

<!--EVENTOS APARTADO-->
<section id="info" class="eventos">
  <div class="res-info" style="width: 100%; margin: auto; align-items: center;">
      <div class="res-des">
          <div class="global">
              <h1 class="heading" style="color: #fff; padding-bottom: 0; font-family: Montecarlo; font-weight: 200;">Eventos</h1>
          </div>
          <p style="font-family: Futura; text-align: justify; margin: 10px 10px;">En el Hotel Rserva Maria Aurora,
              nos enorgullecemos de ofrecer un espacio excepcional y servicios
              de primer nivel para que tus eventos sean inolvidables. Ya sea una
              boda íntima, una conferencia de negocios o una fiesta de cumpleaños,
              nuestro equipo altamente capacitado se encargará de cada detalle
              para garantizar el éxito de tu evento.
          </p>
          <a href="eventos.html">
              <div class="btn">Ver mas</div>
          </a>
      </div>

      <div class="res-des">
          <div id="slider">
              <input type="radio" name="slider" id="slide1" checked>
              <input type="radio" name="slider" id="slide2">
              <input type="radio" name="slider" id="slide3">
              <input type="radio" name="slider" id="slide4">
              <div id="slides">
                  <div id="overflow">
                      <div class="inner">
                          <div class="slide slide_1">
                              <div class="slide-content">

                              </div>
                          </div>
                          <div class="slide slide_2">
                              <div class="slide-content">

                              </div>
                          </div>
                          <div class="slide slide_3">
                              <div class="slide-content">

                              </div>
                          </div>
                          <div class="slide slide_4">
                              <div class="slide-content">

                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div id="controls">
                  <label for="slide1"></label>
                  <label for="slide2"></label>
                  <label for="slide3"></label>
                  <label for="slide4"></label>
              </div>
              <div id="bullets">
                  <label for="slide1"></label>
                  <label for="slide2"></label>
                  <label for="slide3"></label>
                  <label for="slide4"></label>
              </div>
          </div>
      </div>

  </div>
</section>

<!--APARTADO DE HISTORIA-->
<section class="wrapper wrapper2 top" id="historia">
  <div class="container">
      <div class="text">
          <div class="heading">
              <h5 class="heading" style="font-family: Montecarlo;">Conoce nuestra historia </h5>
              <h2 class="heading" style="font-family: Montecarlo;">Reserva Maria Aurora</h2>
          </div>

          <div class="para">
              <p style="text-align: justify;">Lorem ipsum dolor sit amet,
                  consectetur adipisicing elit, sed do eiusmod tempor incididunt
                  ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                  nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                  consequat. Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  In quos reprehenderit voluptatibus cum, cumque et!</p>
              <center><a href="historia.html">
                      <div class="btn">Ver mas</div>
                  </a></center>
              <br>
              <div class="box flex" style="left: 1px; width: 100%;">
                  <div class="img">
                      <img src="imagenes/c.jpg" alt="">
                  </div>
                  <div class="name">
                      <h5>KATE PALMER</h5>
                      <h5>IDAHO</h5>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>

<!--APARTADI DE ACTIVIDADES-->
<section id="actividades" class="turismo">

  <h1 class="heading" style="color: #fff; font-family: Montecarlo;">Actividades</h1>

  <div class="cartas">

      <div class="card" style="background-image: url(imagenes/uvavino.jpg)">
          <div class="content1">
              <h2>Cultura</h2>
              <a href="actividades/cultura.html">
                  <div class="btn" style="font-size: 12px;">Ver mas</div>
              </a>
          </div>
      </div>

      <div class="card" style="background-image:url(imagenes/estanque.jpg)">
          <div class="content1">
              <center>
                  <h2>Recreacion</h2>
              </center>
              <a href="actividades/recreacion.html">
                  <div class="btn" style="font-size: 12px;">Ver mas</div>
              </a>
          </div>
      </div>


      <div class="card" style="background-image: url(imagenes/viñedo.jpg)">
          <div class="content1">
              <h2>Enoturismo</h2>
              <a href="actividades/enoturismo.html">
                  <div class="btn" style="font-size: 12px;">Ver mas</div>
              </a>
          </div>
      </div>
  </div>

  <div class="cartas">
      <div class="card" style="background-image:url(imagenes/plaza\ del\ reloj.jpg)">
          <div class="content1">
              <h2>Aire libre</h2>
              <a href="actividades/Aire Libre.html">
                  <div class="btn" style="font-size: 12px;">Ver mas</div>
              </a>
          </div>
      </div>

      <div class="card" style="background-image:url(imagenes/temazcal.JPG)">
          <div class="content1">
              <h2>Temazcal</h2>
              <a href="actividades/Temazcal.html">
                  <div class="btn" style="font-size: 12px;">Ver mas</div>
              </a>
          </div>
      </div>

      <div class="card" style="background-image:url(imagenes/santo\ madero.jpg)">
          <div class="content1">
              <h2>Aventura</h2>
              <a href="actividades/aventura.html">
                  <div class="btn" style="font-size: 12px;">Ver mas</div>
              </a>
          </div>
      </div>
  </div>
</section>
@endsection

{{-- vendor script --}}
@section('vendor-script')
@endsection

{{-- page script --}}
@section('page-script')
@endsection