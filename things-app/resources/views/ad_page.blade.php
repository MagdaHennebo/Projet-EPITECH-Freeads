@extends('home')

@section('content')

<header>
    <div class="row">
        <div class="three columns logo_gauche">
            <a href="#"><img src="css/Skeleton-2.0.4/images/things_title.png" alt="logo things. rouge et noir" width="170"></a>
        </div>
        <div class="five columns">
            <form action="/search" method="get">
                <input type="text" name="search" placeholder="buy things." class="bg-transparent placeholder-black text-sm">
            </form>
        </div>
        <div class="two columns sell">
            <a href="#" class="sells"> <strong>sell things.</strong></a>
        </div>
        <div class="two columns icons login">
            <a href="#"><img src="css/Skeleton-2.0.4/images/profile.png" alt="logo profile" width="25"></a>

            <a href="#"><img src="css/Skeleton-2.0.4/images/favorites.png" alt="logo favorites" width="25"></a>

            <a href="#"><img src="css/Skeleton-2.0.4/images/cart.png" alt="logo cart" width="25"></a>

            <a class="register" href="#"> Login/</a><a class="register" href="#">Register</a>
        </div>
    </div>

</header>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            {{ $catalogue->title }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            {{ $catalogue->detail }}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            {{ $catalogue->price }}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            {{ $catalogue->location }}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <img src="/image/{{ $catalogue->image }}" width="500px">
        </div>
    </div>
</div>
@endsection