
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- BootStrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <!-- ulkit js -->
    <link rel="stylesheet" href="front/css/uikit.css" />
    <!--Font Awesome-->
    <link rel="stylesheet" href="front/css/all.min.css" />
    <!-- Style css   -->
    <link rel="stylesheet" href="front/css/profile.css" />
    <!-- edit css  -->
    <link rel="stylesheet" href="front/css/edit.css">

</head>
<body class="">
    <!-- Start Navbar  -->
    <nav class="navbar navbar-expand-lg navbar-light sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand logo" href="#"> <img src="front/img/Group 1.png" alt=""> </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-5">
                        <form class="d-flex form">
                            <input class="form-control me-2 se-input" type="search" placeholder="Search"
                                aria-label="Search">
                            <button class="btn search" type="submit">Search</button>
                        </form>
                    </div>
                    <div class="col-md-2"></div>
                    <div class="col-md-4 aa" style="display: flex; align-items: center; justify-content: space-around;">
                        <a class="uk-button upload-btn" href="#modal-container" uk-toggle>UPLOAD VIDEO</a>
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
                                        <div class="pic" style="background-image: url(front/img/Ellipse\ 26.jpg);"></div>
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
                                        <div class="pic" style="background-image: url(front/img/Ellipse\ 26.jpg);"></div>
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
                    <div id="modal-container" class="uk-modal-container big-modal " uk-modal style="z-index: 9789787;">
                        <div class="uk-modal-dialog uk-modal-body">
                            <button class="uk-modal-close-default" type="button" uk-close></button>
                            <div class="container-fluid uploadvideo">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="file" class="d-none" id="addVideosInput" accept=" video/*" />
                                        <button class="btn1  " id="addVideosBtn">
                                            Upload video
                                            <i class="fas fa-upload"></i>
                                        </button>
                                        <div class="video-list">
                                            <ul>

                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <form action="">
                                            <input type="text" name="title" id="" placeholder="Title">
                                            <textarea name="" id="" cols="30" rows="3"
                                                placeholder="Add Discription"></textarea>
                                            <input type="text" name="tags" placeholder="Tags" id="">
                                        </form>
                                        <p  > What Sport Do You Play? </p>
                                        <div class="question"
                                            style="display: flex; align-items: center; justify-content: space-between;">
                                            <div class="footbale">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="flexCheckDefault">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Football
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="flexCheckDefault">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Football
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="flexCheckDefault">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Football
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="flexCheckDefault">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Football
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="basketball">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="flexCheckDefault">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Basketball
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="flexCheckDefault">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Basketball
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="flexCheckDefault">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Basketball
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="flexCheckDefault">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Basketball
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="archery">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="flexCheckDefault">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Archery
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="flexCheckDefault">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Archery
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="flexCheckDefault">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Archery
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="flexCheckDefault">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Archery
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <form class="last-form" action="">
                                            <button class="btn2"> Upload </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Modal -->
                </div>
            </div>
        </div>
    </nav>
    <!-- End Navbar  -->