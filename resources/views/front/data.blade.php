    @foreach($videos as $video)
    <div class="col-md-4">
        <div class="card">
            <div class="card-head">
                <div class="image">
                    <video controls >
                        @foreach($video->attachmentRelation->where('usage','video') as $final)
                            <source src="{{asset($final->path)}}" type="video/mp4">
                        @endforeach
                        Your browser does not support HTML video.
                    </video>
                </div>
            </div>
            <div class="card-body">
                <p class="break"> <a style="color: black" href="{{route('front.videoId',$video->id)}}">{{$video->title}}</a></p>


{{--           'front/img/Ellipse\ 11.png'     --}}
                <div class="info">
                    <div class="pic" style="background-image: url('{{asset($video->client->attachmentRelation->where('usage','profile-image')->first()->path ?? 'front/img/Ellipse\ 11.png'  )}}');"></div>
                    <div class="date">
                        <p style="font-size: 13px; color: #000;"  >{{$video->client->full_name}}</p>
                        <p>{{$video->views->count()}} Views</p>
                        <p>{{$video->created_at->format('d/m/Y')}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach

