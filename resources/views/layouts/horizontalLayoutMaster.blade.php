<body>
    <!--APARTADO DE BURBUJA DE REDES-->
    <div class="container3">
        <input type="checkbox" id="btn-mas">
        <div class="redes">
            <a href="tel:+8120329924" class="fa-solid fa-phone"></a>
            <a href="https://bit.ly/3nZ8gpb" class="fa-brands fa-whatsapp"></a>
        </div>
    </div>

    <!--APARTADO DEL HEADER Y DEL MENU-->
    <heade class="header">
        <div class="padre">
            <div class="nada">
                <div class="traductor">
                    <div class="lang-menu">
                        <div class="selected-lang">
                            <p>Español</p>
                        </div>
                        <ul>
                            <li>
                                <a href="{{url('lang/en')}}" class="en" data-language="en">Ingles</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="logo">
                <a href="/" class="logo"><img src="imagenes/logo centro.png" alt=""></a>
            </div>

            <div class="nada">
            </div>

        </div>
        @yield('menu')
    </heade>

    @yield('content')
    
  @include('panels.footer')

  @include('panels.scripts')
</body>