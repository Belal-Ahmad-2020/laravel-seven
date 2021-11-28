<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Default Title')</title>

    @yield('styles')
</head>
<body>

<header>

<nav>
<ul >
<!-- to applying active class inside li use Request::segment(1) -->
<li style="display:inline" class="{{ Request::segment(1) == 'home' ? 'active' : '' }}"><a href="{{ url('/home') }}">Home</a></li>
<li style="display:inline" class="{{ Request::segment(1) == 'create_post' ? 'active' : '' }}"><a  href="{{ url('/create_post') }}">Create Post</a></li>
<li style="display:inline" class="{{ Request::segment(1) == 'all_post' ? 'active' : '' }}"><a  href="{{  url('/all_post') }}">All Posts</a></li>
</ul>
</nav>
@yield('header')
</header>

<br><br><hr><br>



    <div class="content">
        @yield('content')
        
        <br><br>
    </div>

    

<hr>
<footer>
&copy; 2021 Belal Mansoori
@yield('footer')
</footer>

@yield('scripts')

</body>
</html>