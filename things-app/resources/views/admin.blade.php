<!DOCTYPE html>
<html lang="en">

<head>
    <title>things. - @yield('title')</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/normalize.css')}}">
    <link rel="stylesheet" href="{{ asset('css/skeleton.css')}}">
    <link rel="stylesheet" href="{{ asset('css/main.css')}}">
    <link rel="stylesheet" href="{{ asset('css/fonts.css')}}">
</head>

<body>
    <div class="container">

        <header>
            <div class="row">
                <div class="three columns logo_gauche">
                    <a href="/"><img src="images/things_title.png" alt="logo things. rouge et noir" width="170"></a>
                </div>
                <div class="five columns">
                    <form action="/search" method="get">
                        <input type="text" name="search" placeholder="buy things." class="bg-transparent placeholder-black text-sm">
                    </form>
                </div>
                <div class="two columns sell">
                    <a href="/catalogues/user" class="sells"> <strong>sell things.</strong></a>
                </div>
                <div class="two columns icons login">
                    <a href="#"><img src="images/profile.png" alt="logo profile" width="25"></a>

                    <a href="#"><img src="images/favorites.png" alt="logo favorites" width="25"></a>

                    <a href="#"><img src="images/cart.png" alt="logo cart" width="25"></a>

                    <a class="register" href="#"> Login/</a><a class="register" href="#">Register</a>
                </div>
            </div>

        </header>
        <br>
        <div class="link A_crud">
            <div class="three columns">
                <span class="A_title"><strong>Users.</strong></span>
                <div class="row">
                    <div class="four columns">
                        <a class="link" href="/users/create">Create.</a>
                    </div>
                </div>
                <div class="row">
                    <div class="four columns">
                        <a class="link" href="/users">RUD.</a>
                    </div>
                </div>
            </div>
            <div class="three columns">
                <span class="A_title"><strong>Ads.</strong></span>
                <div class="row">
                    <div class="four columns">
                        <a class="link" href="/catalogues/create">Create</a>
                    </div>
                </div>
                <div class="row">
                    <div class="four columns">
                        <a class="link" href="/catalogues">RUD.</a>
                    </div>
                </div>
            </div>

            <div class="three columns">
                <span class="A_title"><strong>Categories.</strong></span>
                <div class="row">
                    <div class="four columns">
                        <a class="link" href="/Categories/create">Create</a>
                    </div>
                </div>
                <div class="row">
                    <div class="four columns">
                        <a class="link" href="/Categories">RUD.</a>
                    </div>
                </div>
            </div>





        </div>
</body>
<footer>
    <div class="row">
        <div class="one column">
            <p></p>
        </div>
        <div class="six columns copyright">
            <span>© Chrystal Tiran, Jonathan Homerin, Magda Hennebo</span>
        </div>
        <div class="two columns contact">
            <p><strong>contact us.</strong></p>
        </div>
        <div class="one column">
            <a href="/admin"><img class="logo_droite" src="images/things_logo.png" alt="logo things t" width="100"></a>
        </div>
    </div>


</footer>


</html>