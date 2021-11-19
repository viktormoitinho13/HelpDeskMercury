<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--Fonte do Google -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">

    <!--CSS do BootStrap -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!--CSS da aplicação -->
    <link rel="stylesheet" type="text/css" href="/css/style.css">

    <!-- JS da aplicação -->
    <script src="/js/scripts.js"></script>

    <title>@yield('title')</title>

</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="collapse navbar-collapse" id="navbar">
                <a href="/" class="navbar-brand">
                    <img src="/img/Mercury_Logo.png" alt="logoMercury">
                </a>
                <ul class="navbar-nav">

                @auth
                    <li class="navbar-item">
                        <a href="/dashboard" class="nav-link">Listar Chamados</a>
                    </li>
                    <li class="navbar-item">
                        <a href="/NovoChamado" class="nav-link">Criar chamados</a>
                    </li>

                    <li class="navbar-item">
                    <form action="/logout" method="POST">
                        @csrf
                        <a href="/logout" class="nav-link" 
                            onclick="event.preventDefault();
                            this.closest('form').submit();">
                            Sair</a>
                    </form>
                    </li>
                    @endauth
                    

                    @guest
                    <li class="navbar-item">
                        <a href="/login" class="nav-link">Login</a>
                    </li>

                    @endguest
                </ul>



            </div>
        </nav>
    </header>


    @yield('content')


<!--
    <footer>
        © 2021
        <a class="text-black" href="/"> <img src="/img/Mercury_Logo.png" width='40px' alt="logoMercury"></a>

    </footer>
-->

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>