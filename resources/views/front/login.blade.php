<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- BootStrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <!-- ulkit js -->
    <link rel="stylesheet" href="front/css/uikit.css" />
    <!--Font Awesome-->
    <link rel="stylesheet" href="front/css/all.min.css" />
    <!-- Style css   -->
    <link rel="stylesheet" href="front/css/signin.css" />

</head>
<body>


<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Launch demo modal
</button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" style="padding: 0;">
      <div class="modal-content" style="border: none;">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body signIn " style="padding: 0;">
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

                      <form action="">
                        <div class="hide-talent" style="transition: .5s ease;">
                          <input type="email" name="E-Mail" placeholder="E-mail" id="">
                          <input type="password" name="Password" placeholder="Password">
                          <button href="" type="button" class="forget-pass"> Forget Password ? </button>
                        </div>
                        <div class="as-gust">
                          <input type="email" name="E-mail" placeholder="E-Mail">
                        </div>
                        <button> SIGN IN </button>
                        <p class="not-have-acc"> Don't Have An Account ? <button type="button" id="sign-up" > Sign Up </button> </p>

                        <div class="social">
                            <a href=""> <img src="front/img/svgexport-10 (3).png" alt=""></a>
                            <a href=""> <img src="front/img/svgexport-10 (4).png" alt=""> </a>
                            <a href=""> <img src="front/img/Mask Group 2.jpg" alt=""> </a>
                        </div>
                      </section>
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
                    <div class="pic" style="background-image: url(front/img/Group\ 20.jpg);">  </div>
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
    <!-- BootStrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <!-- ulkit js  -->
    <script src="front/js/uikit.js"></script>
    <!-- jquery cdn  -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
      $(document).ready(function(){
        $("#as-guest").click(function(){
          $(".hide-talent").hide();
          $(".as-gust").show();
          $("#as-guest").addClass("active")
          $("#as-talent").removeClass("active")

        });
        $(".forget-pass").click(function(){
          $(".forget-password").show();
          $("#hide-sign-in").hide()
        })
        $("#as-talent").click(function(){
          $(".as-gust").hide();
          $(".hide-talent").show()
          $("#as-talent").addClass("active")
          $("#as-guest").removeClass("active")
        });
       $("#next-code").click(function(){
         $(".forget-password").hide();
         $(".enter-code").show();
        $("#send-code").click(function(){
          $(".enter-code").hide();
          $(".reset-password").show()
        })

       })
      });
      $(document).ready(function(){
        $("#sign-up").click(function(){
          $("#hide-sign-in").hide();
          $(".sign-up").show();
        })
        $("#sign-in").click(function(){
          $(".sign-up").hide();
          $("#hide-sign-in").show();
        })
      })
    </script>
</body>
</html>
