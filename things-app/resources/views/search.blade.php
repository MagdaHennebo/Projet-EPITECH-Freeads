<!DOCTYPE html>
<html lang="en">

<head>
    <title>things. - @yield('title')</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="{{ asset('css/fonts.css')}}">
    <link rel="stylesheet" href="{{ asset('css/main.css')}}">
    <link rel="stylesheet" href="{{ asset('css/normalize.css')}}">
    <link rel="stylesheet" href="{{ asset('css/skeleton.css')}}">
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
                    <a href="/catalogues" class="sells"> <strong>sell things.</strong></a>
                </div>
                <div class="two columns icons login">
                    <a href="#"><img src="images/profile.png" alt="logo profile" width="25"></a>

                    <a href="#"><img src="images/favorites.png" alt="logo favorites" width="25"></a>

                    <a href="#"><img src="images/cart.png" alt="logo cart" width="25"></a>

                    @if (Route::has('login'))
                    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                        @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Profile</a>
                        @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

                        @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                        @endif
                        @endauth
                    </div>
                    @endif
                </div>
            </div>

        </header>

        <body>



            <div class="row">
                <div class="twelve columns"></div>
                <p></p>
            </div>
            <div class="row">

                @if($catalogues->isNotEmpty())
                @foreach ($catalogues as $catalogue)
                <div class="three columns">


                    <img src="/image/{{ $catalogue->image }}" width="200px" height="200px">
                    <p><a class="link" href="#"><strong>{{ $catalogue->title }}</strong></a></p>
                </div>
                @endforeach
                @else
                <div>
                    <h2>No products found</h2>
                </div>
                @endif
            </div>
        </body>

</html>