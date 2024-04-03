<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Tarefas - @yield('titulo')</title>
        <meta charset="utf-8">
        <base href="/">
        <link rel="stylesheet" href="{{asset('/css/income.css')}}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

        <script src="{{asset("js/scripts.js")}}"></script>
    </head>

    <body>


        <div class="d-flex light-mode" id="wrapper">
            <!-- Sidebar-->
            <div  class="border-end light-mode" id="sidebar-wrapper">
                <div  class="sidebar-heading border-bottom light-mode ">Start Bootstrap</div>
                <div  class="list-group list-group-flush light-mode">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 light-mode" href="{{route('dashboard.index')}}">
                        <img class="icon" src="{{asset("img/pagina-inicial.png")}}"> DashBoard
                    </a>
                    <a href="{{route('userbank.index')}}" class="list-group-item list-group-item-action list-group-item-light p-3 light-mode" href="#!">
                        <img class="icon" src="{{asset("img/banco.png")}}"> Adicionar Conta
                    </a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 light-mode" href="#"><img class="icon" src="{{asset("img/analise.png")}}">Analisar</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 light-mode" href="#!">Events</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 light-mode" href="#!">Profile</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3 light-mode" href="#!">Status</a>
                    <input type="checkbox"  class="sr-only" id="darkmode-toggle">
                                    <label for="darkmode-toggle" class="toggle">
                                    <span>Toggle dark mode</span>
                                    </label>
                </div>
            </div>

            <!-- Page content wrapper-->
            <div id="page-content-wrapper">

                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg light-mode border-bottom">
                    <div class="container-fluid">
                        <button class="btn btn-primary " id="sidebarToggle">Toggle Menu</button>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                                <li class="nav-item active"><a class="nav-link colordark-mode" href="{{route('dashboard.index')}}">Home</a></li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle colordark-mode" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ session('username') }}</a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item"  href="{{route('logout.auth')}}">Logout</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#!">Settings</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>

                <!-- Page content-->
                <div id="page-content" class="container-fluid">

                    @yield('conteudo')

                </div>
            </div>
        </div>



        <script>

            document.addEventListener("DOMContentLoaded", function() {
            const darkModeToggle = document.getElementById('darkmode-toggle');

                darkModeToggle.addEventListener('change', function() {
                    const isChecked = this.checked;

                    if (isChecked) {
                        enableDarkMode();
                        enableDarkModetext();
                    } else {
                        disableDarkMode();
                        disableDarkModetext();
                    }
                });

                function enableDarkMode() {
                    const elements = document.querySelectorAll('.light-mode',);
                    elements.forEach(element => {
                        element.classList.remove('light-mode');
                        element.classList.add('dark-mode');
                    });
                }

                function enableDarkModetext() {
                    const elements = document.querySelectorAll('.colordark-mode',);
                    elements.forEach(element => {

                        element.classList.remove('colordark-mode');
                        element.classList.add('colorlight-mode');

                    });
                }

                function disableDarkModetext() {
                    const elements = document.querySelectorAll('.colorlight-mode');
                    elements.forEach(element => {
                        element.classList.remove('colorlight-mode');
                        element.classList.add('colordark-mode');

                    });
                }

                function disableDarkMode() {
                    const elements = document.querySelectorAll('.dark-mode');
                    elements.forEach(element => {
                        element.classList.remove('dark-mode');
                        element.classList.add('light-mode');
                    });
                }
            });

        </script>

    </body>
</html>
