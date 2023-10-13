<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="https://www.tecomatlan.tecnm.mx/wp-content/uploads/2020/01/cropped-itt-192x192.png">

        <title>{{ config('app.name', 'Solicitud de Fichas TecNM Campus Tecomatlán') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        
        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="engine1/style.css" />
        <script type="text/javascript" src="engine1/jquery.js"></script>
        
        <link rel="stylesheet" href="css/styles.css">
        <style>
            html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
        </style>
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
            .mybutton{
                font-weight: bold;
                text-decoration:none;
                font-size:16px;
                margin-top:-1px;
            }
        </style>
    </head>
    <body > <!-- class="antialiased" -->
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top text-white" id="mainNav">
                <div class="container">
                    <h4>{{ config('app.name', 'Solicitud de Fichas TecNM Campus Tecomatlán') }}</h4>
                    <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                        Menu
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarResponsive">

                    @if (Route::has('login'))
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item mx-0 mx-lg-1"><button class="btn btn-link py-3 px-0 px-lg-3 rounded text-white mybutton" onClick="window.open('https://docs.google.com/document/d/1A0NxQw0PNyj2yIGfsdWnIa1ED8izK0q9YfeYbyPLVWM/')" >MANUAL</button></li>
                        @auth
                            <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded text-white" href="{{ url('/home') }}">Inicio</a></li>
                        @else
                            <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded text-white" href="{{ route('login') }}">Ingresar</a></li>
                            @if (Route::has('register'))
                            <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded text-white" href="{{ route('register') }}">Registrarse</a></li>
                            @endif
                        @endauth
                        </ul>
                    </div>
                    @endif
                </div>
            </nav>
        <br><br><br><br>
                <!-- cuerpo -->
    <!--<header class="masthead bg-primary text-white text-center">
        <div class="container d-flex align-items-center flex-column">
            <p class="masthead-subheading font-weight-light mb-2">Solicitud de Fichas para examen de admisión al TecNM Campus Tecomatlán</p>
        </div>
    </header> -->
       <!-- Start WOWSlider.com BODY section -->
    <div style="background-color: ">  
        <div id="wowslider-container1">
            <div class="ws_images"><ul>
                    <li><img src="data1/images/ia2021.jpg" alt="IA-2021" title="" id="wows1_0"/></li>
                    <li><img src="data1/images/ige2021.jpg" alt="slideshow html code" title="" id="wows1_1"/></a></li>
                    <li><img src="data1/images/isc2021.jpg" alt="ISC-2021" title="" id="wows1_2"/></li>
                </ul></div>
                <div class="ws_bullets"><div>
                    <a href="#" title="IA-2021"><span><img src="data1/tooltips/ia2021.jpg" alt="IA-2021"/>1</span></a>
                    <a href="#" title="IGE-2021"><span><img src="data1/tooltips/ige2021.jpg" alt="IGE-2021"/>2</span></a>
                    <a href="#" title="ISC-2021"><span><img src="data1/tooltips/isc2021.jpg" alt="ISC-2021"/>3</span></a>
                </div></div><
            <div class="ws_shadow"></div>
            </div>	
        <div class="container mt-5 text-center">
                <h3 class="fw-bold mt-3">Convocatoria 2022</h3>
                <img class="mt-5" src="images/admision.jpg" style="width: 60%; heigth: 40%;">
        </div>
    </div>
<script type="text/javascript" src="engine1/wowslider.js"></script>
<script type="text/javascript" src="engine1/script.js"></script>
<!-- End WOWSlider.com BODY section -->


<footer class="bg-secondary text-center text-white mt-5">
            <div class="container">
                <div class="row">
                    <!-- Footer Location-->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <br>
                        <h4 class="text-uppercase mb-4">Ubicación</h4>
                        <p class="lead mb-0">
                            Tecomatlán, Puebla.
                            <br>
                            Carretera Palomas-Tlapa Km 19.5
                        </p>
                    </div>
                    <!-- Footer Social Icons-->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <br>
                        <h4 class="text-uppercase mb-4">Nuestras Redes</h4>
                     <!--Facebook-->   <a class="btn btn-outline-light btn-social mx-1" href="https://es-la.facebook.com/tecomatlan.tecnm.mx/"><svg class="svg-inline--fa fa-facebook-f fa-fw" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="facebook-f" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M279.1 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.4 0 225.4 0c-73.22 0-121.1 44.38-121.1 124.7v70.62H22.89V288h81.39v224h100.2V288z"></path></svg><!-- <i class="fab fa-fw fa-facebook-f"></i> Font Awesome fontawesome.com --></a>
                     <!--tweeter-->   <a class="btn btn-outline-light btn-social mx-1" href="https://twitter.com/campustecnm"><svg class="svg-inline--fa fa-twitter fa-fw" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="twitter" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M459.4 151.7c.325 4.548 .325 9.097 .325 13.65 0 138.7-105.6 298.6-298.6 298.6-59.45 0-114.7-17.22-161.1-47.11 8.447 .974 16.57 1.299 25.34 1.299 49.06 0 94.21-16.57 130.3-44.83-46.13-.975-84.79-31.19-98.11-72.77 6.498 .974 12.99 1.624 19.82 1.624 9.421 0 18.84-1.3 27.61-3.573-48.08-9.747-84.14-51.98-84.14-102.1v-1.299c13.97 7.797 30.21 12.67 47.43 13.32-28.26-18.84-46.78-51.01-46.78-87.39 0-19.49 5.197-37.36 14.29-52.95 51.65 63.67 129.3 105.3 216.4 109.8-1.624-7.797-2.599-15.92-2.599-24.04 0-57.83 46.78-104.9 104.9-104.9 30.21 0 57.5 12.67 76.67 33.14 23.72-4.548 46.46-13.32 66.6-25.34-7.798 24.37-24.37 44.83-46.13 57.83 21.12-2.273 41.58-8.122 60.43-16.24-14.29 20.79-32.16 39.31-52.63 54.25z"></path></svg><!-- <i class="fab fa-fw fa-twitter"></i> Font Awesome fontawesome.com --></a>
                     <!--web-->    <a class="btn btn-outline-light btn-social mx-1" href="http://www.tecomatlan.tecnm.mx"><svg class="svg-inline--fa fa-dribbble fa-fw" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="dribbble" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M256 8C119.3 8 8 119.3 8 256s111.3 248 248 248 248-111.3 248-248S392.7 8 256 8zm163.1 114.4c29.5 36.05 47.37 81.96 47.83 131.1-6.984-1.477-77.02-15.68-147.5-6.818-5.752-14.04-11.18-26.39-18.62-41.61 78.32-31.98 113.8-77.48 118.3-83.52zM396.4 97.87c-3.81 5.427-35.7 48.29-111 76.52-34.71-63.78-73.18-116.2-79.04-124 67.18-16.19 137.1 1.27 190.1 47.49zm-230.5-33.25c5.585 7.659 43.44 60.12 78.54 122.5-99.09 26.31-186.4 25.93-195.8 25.81C62.38 147.2 106.7 92.57 165.9 64.62zM44.17 256.3c0-2.166 .043-4.322 .108-6.473 9.268 .19 111.9 1.513 217.7-30.15 6.064 11.87 11.86 23.92 17.17 35.95-76.6 21.58-146.2 83.53-180.5 142.3C64.79 360.4 44.17 310.7 44.17 256.3zm81.81 167.1c22.13-45.23 82.18-103.6 167.6-132.8 29.74 77.28 42.04 142.1 45.19 160.6-68.11 29.01-150 21.05-212.8-27.88zm248.4 8.489c-2.171-12.89-13.45-74.9-41.15-151 66.38-10.63 124.7 6.768 131.9 9.055-9.442 58.94-43.27 109.8-90.79 141.1z"></path></svg><!-- <i class="fab fa-fw fa-dribbble"></i> Font Awesome fontawesome.com --></a>
                    </div>
                    <!-- Footer About Text-->
                    <div class="col-lg-4">
                        <br>
                        <h4 class="text-uppercase mb-4">Contactos</h4>
                        <p class="lead mb-0">
                            <a href="tel:+522751134511">2751134511</a><br>
                            <a href="mailto:escolarestecomatlan@hotmail.com">se_tecomatlan.tecnm.mx</a><br>
                            <a href="https://api.whatsapp.com/send?phone=522751134511">WhatsApp 2751134511</a>
                            
                        </p>
                    </div>
                </div>
            </div>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
