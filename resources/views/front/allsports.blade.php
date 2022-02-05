<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- BootStrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <!-- ulkit js -->
    <link rel="stylesheet" href="{{asset('front/css/uikit.css')}}" />
    <!--Font Awesome-->
    <link rel="stylesheet" href="{{asset('front/css/all.min.css')}}" />
    <!-- Style css   -->
    <link rel="stylesheet" href="{{asset('front/css/allSport.css')}}" />

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <style type="text/css">
        .ajax-load{
            background: #e1e1e1;
            padding: 10px 0px;
            width: 100%;
        }
    </style>

</head>

<body>
<!-- Start Navbar  -->

@include('front.nav')
<!-- End Navbar  -->


<!-- Start filter  -->
@inject('category',App\Models\Category)


<div class="container filter">
    <div class="row" id="myBtnContainer">
        <button class=" btn" onclick="window.location='{{url('index')}}'"> All </button>

        @php

        $categories = $category->get()
        @endphp

        @foreach($categories->where('is_active',1) as  $cat)


        <button class="btn" id type="button" onclick="window.location='{{url('index?category_id='.$cat->id)}}'"> {{ucfirst($cat->name)}} </button>
        @endforeach
    </div>

    <div class="row all-cards"  id="posts"  >
        @if($videos->count() > 0)
       @include('front.data')
        @else

            @include('front.search-notfound')

        @endif

    </div>
    </div>
    <div class="ajax-load text-center" style="display:none">
        <p>Loading More post</p>
    </div>





<!-- End Filter  -->





<!-- BootStrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
<!-- ulkit js  -->
<script src="{{asset('front/js/uikit.js')}}"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>

<SCript>
    $("#addVideosBtn").click(function () {
        $(this).parents().find("#addVideosInput").click();
    });

    document.getElementById("addVideosInput").onchange = (e) => {
        const file = e.target.files[0];
        const url = URL.createObjectURL(file);
        const li = ` <li class="video-preview"> <video controls="controls" src=" ${url} " type="video/mp4" width="100%" height="30%"></video>
                        <p onclick="removeVi()"><i class="fa fa-trash"></i></p>
                        </li>`;
        $(".video-list ul").append(li);

    };
</SCript>
<script src="{{asset('front/js/index.js')}}"></script>
<script type="text/javascript">

    var page = 1;



    $(window).scroll(function() {
        if($(window).scrollTop() + $(window).height() >= $(document).height()) {
            page++;

            loadMoreData(page);

        }
    });


    function loadMoreData(page){

        $.ajax(
            {
                url: '?page=' + page,
                type: "get",
                beforeSend: function(data)
                {
                    $('.ajax-load').show();
                }
            })
            .done(function(data)
            {


                if(!data.video){


                    $('.ajax-load').html("<h2 class='text-center' style='color: #eea236'>No More Videos Found !! </h2>");

                    return false ;
                }

                $('.ajax-load').hide();
                $("#posts").append(data.video);
            })
            .fail(function(jqXHR, ajaxOptions, thrownError)
            {
                alert('server not responding...');
            });





    }
</script>
<script>




    function removeVi(){
       $('.video-preview').remove();

      var toRm =   document.getElementById("toOver");

      toRm.classList.remove("overLay");


    }
    $(".dl").click(function() {
        $("html").toggleClass("light");
        $("body").toggleClass("light");
    })
</script>

</body>


</html>
