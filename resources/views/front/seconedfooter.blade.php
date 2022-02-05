   <!-- BootStrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <!-- ulkit js  -->
    <script src="front/js/uikit.js"></script>
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $("#addVideosBtn").click(function () {
            $(this).parents().find("#addVideosInput").click();
        });

        document.getElementById("addVideosInput").onchange = (e) => {
            const file = e.target.files[0];
            const url = URL.createObjectURL(file);
            const li = ` <li> <video controls="controls" src=" ${url} " type="video/mp4" width="100%" height="30%"></video>
                        <span><i class="fa fa-trash"></i></span>
                        </li>`;
            $(".video-list ul").append(li);

        };
    </script>
     <script>
        $(".dl").click(function() {
        $("html").toggleClass("light");
        $("body").toggleClass("light");
        })
    </script>
</body>
</html>

