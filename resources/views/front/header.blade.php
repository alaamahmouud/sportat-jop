
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <!-- BootStrap css link -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <!-- ulkit js -->
    <link rel="stylesheet" href="front/css/uikit.css" />
    <!--Font Awesome-->
    <link rel="stylesheet" href="front/css/all.min.css" />
    <!-- Style css   -->
    <link rel="stylesheet" href="front/css/style.css" />
     <!-- css Modal  -->
     <link rel="stylesheet" href="front/css/signin.css">

  </head>
  <body>
    <!--Start Header-->
    <header>
      <div class="container">
        <div class="row">
          <div class="col-md-11">
            <nav class="navbar navbar-expand-lg navbar-light">
                <button
                  class="navbar-toggler"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#navbarNav"
                  aria-controls="navbarNav"
                  aria-expanded="false"
                  aria-label="Toggle navigation"
                >
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                  <ul class="navbar-nav">
                    <li class="nav-item">
                      <a class="nav-link" aria-current="page" href="{{url(route('front.home'))}}">Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{url(route('front.about'))}}">About Us</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{url(route('front.rols'))}}">Rules</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{url(route('front.contact'))}}">Contact Us</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Register</a>
                    </li>
                  </ul>
                </div>
            </nav>
          </div>
          <div class="col-md-1">
            <button class="" type="button">
              English
            </button>
            <div
              uk-dropdown="animation: uk-animation-slide-top-small; duration: 500"
            >
              <ul class="uk-nav uk-dropdown-nav">
                <li class="uk-active"><a href="#">English</a></li>
                <li><a href="#">Arabic</a></li>
                <li><a href="#">German</a></li>
                <li><a href="#">Italy</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="container-fluid logo">
        <div class="row">
          <img src="front/img/Group 1.png" alt="" />
        </div>
        <div class="row secound-row">
          <div class="col-md-5">
            <p>Filling The Missing Link</p>
            <p class="article">
              Between Discovering Talents, Adopting Them And Nurturing Them
              Through Sports Clubs.
            </p>
          </div>
          <div class="col-md-4">
            <video width="400px" autoplay muted loop>
              <source
                src="front/img/WhatsApp Video 2022-01-06 at 10.58.35 AM.mp4"
                type="video/mp4"
              />
              <source
                src="front/img/WhatsApp Video 2022-01-06 at 10.58.35 AM.mp4"
                type="video/ogg"
              />
              Your browser does not support HTML video.
            </video>
          </div>
        </div>
          @if(!Auth::guard('client-web')->check())
              <div class="row third-row">
                  <div class="col-md-3">
                      <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">REGISTER NOW</button>
                  </div>
              </div>
{{--              <form method="get" action="{{url('/logout')}}">--}}
{{--              <div class="row third-row">--}}
{{--                  <div class="col-md-3">--}}
{{--              <button> LOG OUT  </button>--}}
{{--                  </div>--}}
{{--              </div>--}}
{{--              </form>--}}
{{--              <button>logOut</button>--}}
              @endif
      </div>
    </header>

    <!-- Start Modal  -->
      <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl"  >
      <div class="modal-content" style="border: none;">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body signIn " style="padding: 0">
          <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="reset-password">
                      <p> Reset Password </p>

                      <div class="input-pass">
                       <form action="">
                        <input type="password" placeholder="New Password" name="new-pasword">
                        <input type="password" placeholder="Confirm New Password" name="confirm-pass">
                        <button> Save </button>
                      </form>
                      </div>


                    </div>
                    <div class="enter-code">
                      <p> Forget Password </p>
                      <p> Please Enter The Code We Sent You On <SPan> +200125958555 </SPan> </p>

                      <form action="">
                        <div class="code">
                          <input type="text" maxlength="1">
                          <input type="text" maxlength="1">
                          <input type="text" maxlength="1">
                          <input type="text" maxlength="1">
                          <input type="text" maxlength="1">
                          <input type="text" maxlength="1">
                        </div>
                        <button class="re-send"> Resend Code </button>
                        <button class="send" type="button" id="send-code"> Send </button>
                      </form>

                    </div>
                    <div class="forget-password">
                      <p> Forget Password </p>
                      <p class="enter-num"> Please Enter Your Phone Number </p>
                      <form action="">
                        <div class="dropdown">
                          <a class="btn  dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                           +20
                          </a>

                          <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="#">+966</a></li>
                            <li><a class="dropdown-item" href="#">+240</a></li>
                            <li><a class="dropdown-item" href="#">+155</a></li>
                          </ul>
                        </div>
                        <div class="input-num" style="display: inline; padding: 1%;">
                          <input type="tel" name="PhoneNumber" placeholder="Your Phone Number">
                        </div>

                        <button id="next-code" type="button" > Next </button>
                      </form>
                    </div>
                    <section id="hide-sign-in">
                      <p> Sign In </p>

                    <div class="as-what">
                      <button class="active" type="button" href="" id="as-talent"> As a talent  </button>
                      <button href="" id="as-guest" type="button"> As a guest </button>
                    </div>

                    <form method="post" action="{{'client-login'}}">

                        @csrf
                      <div class="hide-talent" style="transition: .5s ease;">
                        <input type="text" name="phone" placeholder="Phone Number" id="">
                          @if ($errors->has('phone'))
                              <div class="uk-alert-danger" uk-alert>

                                  <a class="uk-alert-close" uk-close></a>
                                  <p class="danger"> {{ $errors->first('phone') }}</p>

                              </div>
                         @endif

                          <input type="password" name="password" placeholder="Password">
                          @if ($errors->has('password'))

                              <div class="uk-alert-danger" uk-alert>
                                  <a class="uk-alert-close" uk-close></a>
                                  <p class="danger"> {{ $errors->first('password') }}</p>

                              </div>
                          @endif

                          <button> SIGN IN </button>
                        <button href="" type="button" class="forget-pass"> Forget Password ? </button>
                      </div>
                    </form>

                        <form>
                      <div class="as-gust">
                        <input type="email" name="E-mail" placeholder="E-Mail">
                          <button> SIGN IN </button>

                      </div>
                      <p class="not-have-acc"> Don't Have An Account ? <button type="button" id="sign-up" > Sign Up </button> </p>

                      <div class="social">
                          <a href=""> <img src="{{asset('front/img/svgexport-10 (3).png')}}" alt=""></a>
                          <a href=""> <img src="{{asset('front/img/svgexport-10 (4).png')}}" alt=""> </a>
                          <a href=""> <img src="{{asset('front/img/Mask Group 2.jpg')}}" alt=""> </a>
                      </div>
{{--                    </section>--}}
                  </form>
                  <!-- Start Sign-up  -->
                  <form action="" class="sign-up">
                    <p>Sign Up</p>
                    <input type="email" name="E-mail" placeholder="E-Mail">
                    <div class="dropdown">
                      <a class="btn  dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                       +20
                      </a>

                      <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item" href="#">+966</a></li>
                        <li><a class="dropdown-item" href="#">+240</a></li>
                        <li><a class="dropdown-item" href="#">+155</a></li>
                      </ul>
                    </div>
                    <input type="tel" name="phone-num" style="display: inline;width: 85%;" placeholder="Your Phone Number">

                    <div class="dropdown">
                      <a class="btn  dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"  >
                       +20
                      </a>

                      <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item" href="#">+966</a></li>
                        <li><a class="dropdown-item" href="#">+240</a></li>
                        <li><a class="dropdown-item" href="#">+155</a></li>
                      </ul>
                    </div>
                    <input type="tel" name="phone-num" style="display: inline;width: 85%;" placeholder="Relative's Number">
                    <input type="date" name="Date" placeholder="Date Of Birth">
                    <input type="password" name="Pass" placeholder="Password">
                    <input type="checkbox" class="check-box" name="check-box">
                    <span> I Agree To The <button href="#modal-container" uk-toggle type="button" > Terms And Privacy </button> </span>
                    <div class="next">
                      <button> Next </button>
                      <p> Already Have An Account ? <button id="sign-in" type="button"> Sign In </button> </p>
                    </div>
                  </form>

                  <!-- End Sign-up  -->
                </div>
                <div class="col-md-5">
                  <div class="pic" style="background-image: url({{asset('front/img/Group\ 20.jpg')}});">  </div>
                </div>
            </div>
        </div>
        </div>
      </div>
    </div>
  </div>

  <div id="modal-container" class="uk-modal-container" uk-modal style="z-index: 8989897899;">
    <div class="uk-modal-dialog uk-modal-body terms-privecy">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <p class="title" >Terms And Privacy</p>
        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam.</p>
    </div>
</div>
    <!-- End Modal  -->

    <!-- Ende Header -->
