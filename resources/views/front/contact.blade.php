@extends('front.main')


@section('content')

<!-- Start Contact Us -->
<div class="contact-us">
      <img class="Fimage"  src="front/img/Group 14.png" alt="">
      <img class="Limage" src="front/img/Group 13.png" alt="">
      <div class="container-fluid">
        <div class="container">
          <div class="row">
            <p>Contact Us</p>
          </div>
          <div class="row">
            <div class="col-md-6" style="z-index: 978798;" >
              <form action="">
                <div class="row">
                  <div class="col-md-6" style="margin-bottom: 3%">
                    <input type="text" placeholder="First Name" />
                  </div>
                  <div class="col-md-6" style="margin-bottom: 3%">
                    <input type="text" placeholder="Last Name" />
                  </div>
                  <div class="col-md-12" style="margin-bottom: 3%">
                    <input type="email" placeholder="Your E-Mail" />
                  </div>
                  <div class="col-md-12" style="margin-bottom: 3%">
                    <textarea
                      name=""
                      id=""
                      cols="30"
                      rows="3"
                      placeholder="Your Message"
                    ></textarea>
                  </div>
                  <div class="col-md-12">
                    <button>Send</button>
                  </div>
                </div>
              </form>
            </div>
            <div class="col-md-6 contacts">
              <div class="mail">
                <a href="">
                  <i class="far fa-envelope"></i>
                  <span> SUBHI@365SPORTAT.Com </span>
                </a>
              </div>
              <div class="phoneNum1">
                <a href="">
                  <i class="fas fa-phone-volume"></i>
                  <span> +201064947337 </span>
                </a>
              </div>
              <div class="phonenum2">
                <a href="">
                  <i class="fas fa-phone-volume"></i>
                  <span> +966505285721 </span>
                </a>
              </div>
              <div class="icons">
                <a href=""> <img src="front/img/svgexport-10 (3).png" alt="">  </a>
                <a href="">  <img src="front/img/svgexport-10 (4).png" alt=""> </a>
                <a href=""> <img src="front/img/svgexport-10 (6).png" alt=""> </a>
              </div>
              <div class="down-load">
                <a href=""> <img src="front/img/Daco_4108569.png" alt="">   </a>
                <a href=""> <img src="front/img/Daco_410856912.png" alt=""> </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- End Contact Us  -->

@endsection
