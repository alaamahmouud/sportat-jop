<nav class="navbar navbar-expand-lg navbar-light sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand logo" href="{{route('front.index')}}"> <img src="{{asset('front/img/Group 1.png')}}" alt=""> </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-5">
                    @include('front.search')
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-4 aa" style="display: flex; align-items: center; justify-content: space-around;">
                    <a class="uk-button upload-btn" href="#modal-container" uk-toggle>UPLOAD VIDEO</a>

                @include('front.upload')
                <!-- Start Notifacation -->
                    <div class="uk-inline notifecate">
                        <button class="notificate-icon" type="button"><i class="far fa-bell"></i> <span>2</span>
                        </button>
                        <div uk-drop="mode: click">
                            <div class="cards">
                                <div class="notification">
                                    <div class="date-of-noti">
                                        <span>02:00 Pm</span> <span>01/02/2020</span>
                                    </div>
                                    <div class="pic" style="background-image: url({{asset('front/img/Ellipse\ 26.jpg')}});"></div>
                                    <div class="vote">
                                        <span class="name"> Mohamed Ahmed </span> <span style="font-size: 13px;">
                                                Voted
                                                For You </span>
                                    </div>
                                </div>
                                <div class="notification">
                                    <div class="date-of-noti">
                                        <span>02:00 Pm</span> <span>01/02/2020</span>
                                    </div>
                                    <div class="pic" style="background-image: url({{asset('front/img/Ellipse\ 26.jpg')}});"></div>
                                    <div class="vote">
                                        <span class="name"> Mohamed Ahmed </span> <span style="font-size: 13px;">
                                                Voted
                                                For You </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Notifacation -->

                    <!-- Start Drop Down  -->
                    <div class=" uk-inline">
                        <a class="choose-moode dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                           data-bs-toggle="dropdown" aria-expanded="false">

                        </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><a class="dropdown-item" href="#">Rules</a></li>
                            <li> <a class="dropdown-item" href="">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input dl" type="checkbox" id="flexSwitchCheckChecked"
                                               c >
                                        <label class="form-check-label" for="flexSwitchCheckChecked">Dark
                                            Mood</label>
                                    </div>
                                </a> </li>
                            <li><a class="dropdown-item" href="#">Log Out</a></li>
                        </ul>
                    </div>
                    <!-- End Drop Down  -->
                    <!-- Start Change Language  -->
                    <div class="dropdown uk-inline">
                        <button class="btn-lang dropdown-toggle" type="button" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                            English
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="#">Italian</a></li>
                            <li><a class="dropdown-item" href="#">France</a></li>
                            <li><a class="dropdown-item" href="#"> Mnen Ywady 3la fen </a></li>
                        </ul>
                    </div>
                    <!-- End  Change Language  -->

                </div>
                <!-- Start Modal -->
                <!-- End Modal -->
            </div>
        </div>
    </div>
</nav>
