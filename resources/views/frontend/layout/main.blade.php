
<!DOCTYPE html>
<html class="no-js lt-ie9 lt-ie8 lt-ie7">
<html class="no-js lt-ie9 lt-ie8">
<html class="no-js lt-ie9">
<html class="no-js">
@include('frontend.includes.header')

<body>




<div id="fh5co-offcanvas">
    <a href="#" class="fh5co-close-offcanvas js-fh5co-close-offcanvas"><span><i class="icon-cross3"></i> <span>Close</span></span></a>
    <div class="fh5co-bio">

        <h3 class="heading">About Me</h3>
        <h2>Emily Tran Les</h2>

        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>

        <ul>
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();" class="nav-link">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p >
                   <button style="background: black;color: #ebebe0"  >Logout</button>
                </p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </ul>
    </div>



</div>

<!-- END #fh5co-offcanvas -->
<header id="fh5co-header">
{{--    <div style="color:red;border: 2px solid red">--}}

    <div class="container-fluid">


        <div class="row">
            <a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
            <ul class="fh5co-social">
                <li><a href="#"><i class="icon-twitter"></i></a></li>
                <li><a href="#"><i class="icon-facebook"></i></a></li>
                <li><a href="#"><i class="icon-instagram"></i></a></li>
                <li><a href="#">{{auth()->user()->name}}</a></li>




                <!-- Authentication Links -->


            </ul>



            <div class="col-lg-12 col-md-12 text-center">
                <h1 id="fh5co-logo"><a href="index.html">Magazine <sup>TM</sup></a></h1>
            </div>

        </div>

    </div>
{{--    </div>--}}

</header>



<!-- END #fh5co-header -->
@yield('content')

@include('frontend.includes.footer')

</body>
</html>


