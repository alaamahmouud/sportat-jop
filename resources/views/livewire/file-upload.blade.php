<div>


    <div id="modal-container" class="uk-modal-container big-modal " uk-modal style="z-index: 9789787;">
        <div class="uk-modal-dialog uk-modal-body">
            <button class="uk-modal-close-default" type="button" uk-close></button>
            <div class="container-fluid uploadvideo">



                <form wire:submit.prevent="submit" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <input type="file" wire:model="attachment" class="d-none"  id="addVideosInput" accept=" video/*" />



                        <button class="btn1  " id="addVideosBtn">
                            Upload video
                            <i class="fas fa-upload"></i>
                        </button>
                        <div class="video-list">
                            <ul>
                                @if(session()->has('message'))
                                    <div class="alert alert-success">
                                        {{ session('message') }}
                                    </div>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">






                        <input type="text" wire:model="title" id="" class="title" placeholder="Title">

                            <textarea wire:model="description" id="" cols="30" rows="3"
                                      placeholder="Add Discription"></textarea>
                            <input type="text" name="tags" wire:model="tags" placeholder="Tags" id="" class="tags">
                        <p  > What Sport Do You Play? </p>
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
                                    <input class="form-check-input" name="category_id" wire:model="category_id" type="checkbox" value="{{$cat->id}}"
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
                            <button type="submit" class="btn2"> Upload </button>
                        </div>
                    </div>
                </div>
                </form>

            </div>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.6.0/dist/alpine.min.js" defer></script>

<script>

    $('input[type="checkbox"]').on('change', function() {
        $('input[name="' + this.name + '"]').not(this).prop('checked', false);
    });
</script>
