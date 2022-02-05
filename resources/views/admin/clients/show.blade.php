@extends('admin.layouts.main',[
								'page_header'		=> 'Profile',
								'page_description'	=> 'عرض ',
								'link' => url('admin/clients')
								])
@section('content')



<!-- profile details -->

<div class="ibox-content">
        <div class="wrapper wrapper-content">
            <div class="row animated fadeInRight">
                <div class="col-md-4">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>Profile Detail</h5>
                        </div>
                    
                        <div>

                        <!-- to image -->
                        <div class="ibox-content no-padding border-left-right">
                               @if($record->attachmentRelation != '[]')


                                <img alt="image" class="img-fluid img-responsive"
                                src="{{asset($record->attachmentRelation[0]->path ?? null)}}"  style=" border-radius: 50%; width: 50px ; height: 50px;">
                                
                                @else
                                 
                                <img alt="image" class="img-fluid img-responsive"
                                src="{{asset('one.jpg')}}" >
                                @endif
                                
                            </div>
                            <div class="ibox-content profile-content">
                                <h4><strong><td>{{$fullname}}</td></strong></h4>

                                <h5>
                                    About Me
                                </h5>

                                <p>
                                {{$record->bio}}
                                </p>
                                <div class="row m-t-lg">
                                    <div class="col-md-4">
                                        <!-- <span class="bar">5,3,9,6,5,9,7,3,5,2</span> -->
                                        <h5><strong>169</strong> vote</h5>
                                    </div>
                                    <div class="col-md-4">
                                        <!-- <span class="line">5,3,9,6,5,9,7,3,5,2</span> -->
                                        <h5><strong>280</strong> view</h5>
                                    </div>
                                    <div class="col-md-4">
                                        <!-- <span class="bar">5,3,2,-1,-3,-2,2,3,5,2</span> -->
                                        <!-- <h5><strong>240</strong> Followers</h5> -->
                                    </div>
                                </div>

                            </div>
                        </div>
                  
                </div>
                    </div>


            <!-- avtivities -->
                    
                <div class="col-md-8">
                    <div class="ibox ">


                        <div class="ibox-title">
                            <h5>Activites</h5>

                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <!-- <i class="fa fa-chevron-up"></i> -->
                                </a>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <!-- <i class="fa fa-wrench"></i> -->
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="#" class="dropdown-item">Config option 1</a>
                                    </li>
                                    <li><a href="#" class="dropdown-item">Config option 2</a>
                                    </li>
                                </ul>
                                <!-- <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a> -->
                            </div>
                        </div>


                        <div class="ibox-content">

                            <div>
                                <div class="feed-activity-list">
                               
                                @foreach($videos as $video)
                                @forelse($video->attachmentRelation as $vid)

                                <div class="feed-element">

                                <img alt="image" class="img-fluid img-responsive"
                                src="{{asset($vid->path)}}"  style=" border-radius: 50%; width: 50px ; height: 50px;">
                              
                                @empty
                                <span>لا يوجد </span>
                                </div>

                                @endforelse
            
                                @endforeach
                                        <div class="media-body ">
                                            <!-- <small class="float-right">23h ago</small> -->
                                            <small class="text-muted">$videos->updated_at</small>
                                        </div>

                                </div>


                            </div>

                        </div>






                    </div>

                
                
                
                </div>



                

            </div>
   </div>



@endsection
