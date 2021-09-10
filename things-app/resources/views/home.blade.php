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

        <div class="row">
            <p></p>
        </div>

        <div class="row">
            <div class="one column">
                <p class="category_title"><strong>categories.</strong></p>
            </div>
        </div>


        <div class="row">
            <nav class="navigation">
                @if($categories->isNotEmpty())
                @foreach ($categories->reverse()->take(12) as $category)
                <div class="one column">
                    <p class="liennav"><a href='{{ $category->name }}'><img class="logo_furnitures" src="picture/{{ $category->picture }}" alt=' {{ $category->name }}' width="65" height="65"></a></p>
                </div>
                @endforeach
                @endif

            </nav>
        </div>


        <div class="row">
            <div class="two columns">
                <p class="newest_title"><strong>newest things.</strong></p>
            </div>
            <div class="five columns">
                <p></p>
            </div>
            <div class="two columns">
                <p class="filter" style="float:right"><strong>sort things by. </strong></p>
            </div>
            <div class="three columns">
                <!-- <a class="link" href="eloquent">A-Z &nbsp;</a>
                <a class="link" href="eloquent">Z-A &nbsp;</a>
                <a class="link" href="eloquent">Lower to higher &nbsp;</a>
                <a class="link" href="eloquent">Higher to lower &nbsp;</a>
                <a class="link" href="eloquent">Most recents &nbsp;</a> -->



                <select class="filtre" name="filtre">
                    <option value="choice" selected disabled></option>
                    <option value="alphabet dec" href=>Z->A</option>
                    <option value="alphabet asc">A->Z</option>
                    <option value="price up">Lower to higher</option>
                    <option value="price down">Higher to lower</option>
                    <option value="recently posted">most recent</option>
                </select>


            </div>
        </div>

        <div class="row">
            @if($catalogues->isNotEmpty())
            @foreach ($catalogues->reverse()->take(4) as $catalogue)

            <div class="three columns">
                <img src="/image/{{ $catalogue->image }}" alt=' {{ $catalogue->title }}' width="200px" height="200px"></a>
                <p><a class="link" href="#"><strong>{{ $catalogue->title }}</strong></a></p>

            </div>

            @endforeach
            @endif
            @yield('content')
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