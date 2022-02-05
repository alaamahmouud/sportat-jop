
<style>
    label.error {
        color: #dc3545;
        font-size: 14px;
    }
    .overLay {
       width: 100% ;
        height: 100px;

        color:white;
        text-align:center;
        position:absolute;
        right:0;
        top:0;
    }
</style>

<div id="modal-container" class="uk-modal-container big-modal " uk-modal style="z-index: 9789787;">
    <div class="uk-modal-dialog uk-modal-body">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <div class="container-fluid uploadvideo">



            <form method="post" enctype="multipart/form-data" id="laravel-ajax-file-upload" action="javascript:void(0)">
                @csrf
                <div class="row">
                    <div class="col-md-6">

                        <div id="toOver">

                        </div>
                        <input type="file" name="attachment" class="btn1 "

                               onclick="disableVido()"
                               id="addVideosInput"
                               accept=" video/*" />


                        <div class="mesSuc">

                        </div>

                        <p  class="showMessage"></p>
                        <div class="video-list">
                            <ul>

                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">






                        <input type="text" name="title" id="" class="title" placeholder="Title">

                        <textarea name="description" id="" cols="30" rows="3"
                                  placeholder="Add Discription"></textarea>
                        <input type="text" name="tags"  placeholder="Tags" id="" class="tags">
                        <p  > What Sport Do You Play? <label></label> </p>
                        <div class="question">
                            <div class="footbale"   >
                                <div class="row">


                                    @inject('category' , App\Models\Category)

                                    @php

                                        $categories = $category->where('is_active',1)->get()
                                    @endphp

                                    @foreach($categories as $cat)
                                        <div class="col-md-4">
                                            <div class="form-check sese">
                                                <input class="form-check-input" name="category_id"  type="checkbox" value="{{$cat->id}}"
                                                       id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    {{$cat->name}}
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="last-form" >
                            <button type="submit" class="btn2" id="upload"> Upload </button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

<script>

    function disableVido(){


          var element =   document.getElementById("toOver")
            element.classList.add("overLay")


    }

    $('#modal-container').on('hide', function() {
        window.location.reload();
    });

    $('input[type="checkbox"]').on('change', function() {
        $('input[name="' + this.name + '"]').not(this).prop('checked', false);
    });


    /// area validtion

    $(document).ready(function() {
        $("#laravel-ajax-file-upload").validate({
            rules: {
                attachment: "required",
                title: "required",
                category_id: "required",
                description: "required",
                tags: "required",

            },
            messages: {
                attachment: "attachment is required",
                title: "title is required",
                category_id: "Category is required",
                description: " description is required",
                tags: "tags is required",

            }
        });
    });

    //
    $(document).ready(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#laravel-ajax-file-upload').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type:'POST',
                url: "{{ url('add-video')}}",
                data: formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend: function(data)
                {
                    if (data['status'] ==1) {
                        $('.showMessage').append('Waiting to Upload Video ...')
                    }
                },
                success: (data) => {

                    if (data['status'] ==1) {
                        this.reset();
                        $('.video-list').hide();
                        $('.showMessage').hide();
                        $('.mesSuc').append('<div class="uk-alert-warning " uk-alert>  <p>Upload Video Successful.</p> </div>')

                        setInterval(function (){

                            $('.mesSuc').hide();

                        },700)
                    }
                },
                error: function(data){
                    console.log(data)
                }
            });
        });
    });
</script>
