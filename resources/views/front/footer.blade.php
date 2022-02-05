<!-- Start Footer  -->
<footer>
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-2">
            <img src="front/img/Group 1.png" alt="">
          </div>
          <div class="col-md-4">
            <h2> ABOUT US </h2>
            <p> The Idea Started When "Sobhi Al-Shakhshir" Was Influenced By Ancient Greek Culture And Their Interest In Entertainment Within Games And Sports Tournaments. </p>
          </div>
          <div class="col-md-4">
            <h2>CONNECT WITH US</h2>
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
            
          </div>
          <div class="col-md-2">
            <h2>
              DOWNLOAD OUR APPLICATION
            </h2>
            <div class="down-load">
              <a href=""> <img src="front/img/Daco_4108569.png" alt="">   </a>
              <a href=""> <img src="front/img/Daco_410856912.png" alt=""> </a>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- End Footer  -->
    <!-- BootStrap js link -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
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