<!DOCTYPE html>
<html lang="en" >

<head >
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- BootStrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <!-- ulkit js -->
    <link rel="stylesheet" href="{{asset('front/css/uikit.css')}}" />
    <!--Font Awesome-->
    <link rel="stylesheet" href="{{asset('front/css/all.min.css')}}" />
    <!-- Style css   -->
    <link rel="stylesheet" href="{{asset('front/css/previewCard.css')}}" />
    <!-- Dark Mood  -->
    <link rel="stylesheet" href="{{asset('front/css/darkMood.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/allSport.css')}}" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

</head>

<body class="">
<!-- Start Navbar  -->
@include('front.nav')
<!-- End Navbar  -->
<div class="container-xxl preview-post">
    <div class="row">

        <!-- Start Post  -->
        <div class="col-md-9" style="overflow: hidden;">
            <div class="post">
                <div class="pic" >
                    <video controls >
                        @foreach($video->attachmentRelation->where('usage','video') as $final)
                            <source src="{{asset($final->path)}}" type="video/mp4">
                        @endforeach
                    </video>

                </div>
            </div>
            <div class="row" style="padding: inherit;">
                <div class="col-md-12 fcol">
                    <div class="one">
                        <div class="caption">
                            <p class="fpra"> {{$video->title}} </p>
                            <p class="spra">{{$video->tags}}</p>
                            <p class="tpra">{{$video->created_at->format('d/m/Y')}}</p>
                        </div>
                        <div class="btns-group ">
                            <form   id="vote-video" action="javascript:void(0)" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{$video->id}}">
                            <button class="to-remove"> VOTE </button>

                            </form>

                            <div class="notVote">

                            </div>
                            <button> <i style="color: #eec212;" class="fas fa-share"></i> Share </button>
                        </div>
                    </div>

                    <div class="vote-view">
                        <div class="vote">
                            <p> Vote </p>
                            <p> {{$video->upVotesCount()}} </p>
                        </div>
                        <div class="views">
                            <p> Views </p>
                            <p> {{$video->views->count()}} </p>
                        </div>
                    </div>

                </div>

                <div class="col-md-12 scol">
                    <div class="comment">
                        <div class="pic" style="background-image: url('{{asset($video->client->attachmentRelation->where('usage','profile-image')->first()->path ?? 'front/img/Ellipse\ 11.png'  )}}');"></div>
                        <div class="name">
                            <p> {{$video->client->full_name}} </p>
                            <p> {{$video->description}} </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- End Post  -->
        <!-- Start Comments  -->
        <div class="col-md-3 comments">
            <form action="" class="d-flex">
                <input type="text" placeholder="Write a comment" name="comment" id="comment">
                <Button> Send </Button>
            </form>

            @foreach($video->comments as $comment)
            <div class="comment-person">
                <div class="pic" style="background-image: url('{{asset($comment->client == null ? 'front/img/Ellipse\ 11.png' : $comment->client->attachmentRelation->where('usage','profile-image')->first()->path ?? 'front/img/Ellipse\ 11.png')}}');"></div>
                <div class="information">
                    <p> {{$comment->client->full_name ?? strstr($comment->guest->email,'@',true)}} </p>
                    <span>{{$comment->created_at->format('d/m/Y')}}</span>
                    <span> {{$comment->created_at->format('h:i A')}} </span>
                    <br>
                    <p>{{$comment->content}}</p>
                </div>
            </div>
                @endforeach
        </div>
        <!-- End Comments  -->
    </div>
</div>

<div class="container filter">
    <div class="row">
      @include('front.data')
    </div>
</div>

<!-- BootStrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
<!-- ulkit js  -->
<script src="{{asset('front/js/uikit.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>

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


<script>

    $(document).ready(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#vote-video').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type:'POST',
                url: "{{ url('add-vote')}}",
                data: formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend: function(data)
                {



                },
                success: (data) => {


                    $('.to-remove').remove();

                    $('.notVote').append(' <button> UnVOTE </button>')

                        // this.reset();


                },
                error: function(data){
                    console.log(data)
                }
            });
        });
    });

</script>
</body>

</html>
