@extends('front.secondmain')

@section('secondcontent')
<!-- Start Profile     -->
    <div class="container cover">
        <div class="row pic-cover" style="background-image:url(front/img/david-clarke-DRtKiuN9_Mk-unsplash.jpg)">
        </div>
        <div class="row" style="justify-content: space-between; position: relative; background-color: #fff;">
            <div class="col-md-1 setting"><button href="#modal-container2" uk-toggle> <i class="fas fa-cog"></i> </button> </div>
            <div class="col-md-3">
            <div class="personal-pic" style="background-image: url(front/img/1235.jpg);">
               <span type="button" class="btn " data-bs-toggle="modal" data-bs-target="#exampleModal5" > Edit </span>
            </div>
            </div>
            <div class="col-md-1">
                <button type="button" class="edit" data-bs-toggle="modal" data-bs-target="#exampleModal5">  Edit  </button>
            </div>
        </div>
        <div class="row name-bio">
            <div class="name">  
                <p> Mohamed Ahmed </p>
                <p class="user-name" > @mohamed20 </p>
            </div>
            <div class="bio">
                <p> Lorem ipsum dolor sit amet consectetur adipisicing elit.at recusandae sed, voluptates soluta inventore omnis aliquid voluptatem. Cumque. </p>
            </div>
        </div>
        <div class="rank-vote-view">
            <div class="rank">
                <p> #6 </p>
                <p> Rank </p>
            </div>
            <div class="votes">
                <p> 101M </p>
                <p> votes </p>
            </div>
            <div class="views">
                <P>200M</P>
                <p> votes </p>
            </div>
        </div>
        <div class="row posts">
            <div class="col-md-12">
                <video  controls poster="front/img/alexander-redl-d3bYmnZ0ank-unsplash.jpg">
                    <source src="front/img/365 sportat.mp4" type="video/mp4">
                    <source src="front/img/365 sportat.mp4" type="video/ogg">
                    Your browser does not support HTML video.
                </video>
                <div class="video-name"> 
                    <p> Breaking A New Record </p>
                </div>
                <div class="info-video">
                    <div class="pic" style="background-image: url(front/img/1235.jpg);"></div>
                    <div class="view-date">
                        <p> Mohamed Ahmed </p>
                        <p> 1M View </p>
                        <p> 01/02/2020 </p>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <video  controls poster="front/img/alexander-redl-d3bYmnZ0ank-unsplash.jpg">
                    <source src="front/img/365 sportat.mp4" type="video/mp4">
                    <source src="front/img/365 sportat.mp4" type="video/ogg">
                    Your browser does not support HTML video.
                </video>
                <div class="video-name"> 
                    <p> Breaking A New Record </p>
                </div>
                <div class="info-video">
                    <div class="pic" style="background-image: url(front/img/1235.jpg);"></div>
                    <div class="view-date">
                        <p> Mohamed Ahmed </p>
                        <p> 1M View </p>
                        <p> 01/02/2020 </p>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <video  controls poster="front/img/alexander-redl-d3bYmnZ0ank-unsplash.jpg">
                    <source src="front/img/365 sportat.mp4" type="video/mp4">
                    <source src="front/img/365 sportat.mp4" type="video/ogg">
                    Your browser does not support HTML video.
                </video>
                <div class="video-name"> 
                    <p> Breaking A New Record </p>
                </div>
                <div class="info-video">
                    <div class="pic" style="background-image: url(front/img/1235.jpg);"></div>
                    <div class="view-date">
                        <p> Mohamed Ahmed </p>
                        <p> 1M View </p>
                        <p> 01/02/2020 </p>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
<!-- End Profile -->


<!-- Start Modal  -->
<div id="modal-container2" style="z-index: 979878997;" class="uk-modal-container setting-modal" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <h2 class="uk-modal-title">Edit Profile</h2>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <form action="">
                        <input type="text" name="fName" placeholder="Mohamed">
                        <input type="text" name="PhoneNum" placeholder="+201552698555">
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Egypt</option>
                            <option value="1">KSA</option>
                            <option value="2">US</option>
                            <option value="3">England</option>
                          </select>
                    </form>
                </div>
                <div class="col-md-6">
                   <form action="">
                    <input type="text" name="lName" placeholder="Ahmed">
                    <input type="email" name="email" placeholder="nnn@gmail.com">
                    <input type="date" name="Date" placeholder="5/12/2022">
                   </form>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <textarea name="Comment" placeholder="I Want To Change My Password" id="" cols="10" rows="1" ></textarea>
                </div>
            </div>
            <div class="row password">
                <p> Change Password </p>
                <div class="col-md-6">
                   <form action="">
                        <input type="password" name="Current password" placeholder="Current Password">
                        <input type="password" name="Current password" placeholder="New Password">
                        <input type="password" name="Current password" placeholder="Confirm New Password">
                        <button class="save"> SAVE CHANGES </button>  
                        <button  class="cancle uk-modal-close" > CANCEL </button>  
                    </form>
                </div>
            </div>
        </div>
    
    </div>
</div>
<!-- End Modal  -->

<!-- Start Edit Modal  -->
<div class="modal fade" id="exampleModal5" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="container-fluid edit-profil">
              <div class="row">
                <div class="col-md-6 aaa">
                      <p> Profile </p>
                      <input type="file" class="d-none" id="addPhotosInput" accept="image/png, image/gif, image/jpeg" />
                      <button class="btn add-photo" id="addPhotosBtn">
                          Add Photos <i class="fas fa-camera-retro"></i> 
                      </button>
                      <div class="photos-list">
                        <ul></ul>
                      </div>
                
                    <form action="">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" name="First Name" placeholder="First Name">
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="Last Name" placeholder="Last Name">
                            </div>
                            <div class="col-md-6">
                                <select class="form-select form-select " aria-label=".form-select example">
                                    <option selected>Gender</option>
                                    <option value="1">Male</option>
                                    <option value="2">Female</option> 
                                  </select>                                     
                            </div>
                            <div class="col-md-6">
                                <select class="form-select form-select " aria-label=".form-select example">
                                    <option selected>Nationality</option>
                                    <option value="1">Egyption</option>
                                    <option value="2">American</option>
                                    <option value="3">TONSE</option>
                                  </select>
                                  
                            </div>
                            <div class="col-md-12">
                                <select class="form-select form-select " aria-label=".form-select example">
                                    <option selected>Residence Country</option>
                                    <option value="1">Egypt</option>
                                    <option value="2">America</option>
                                    <option value="3">KSA</option>
                                  </select>
                                  
                            </div>
                            <div class="col-md-6">
                                <select class="form-select form-select " aria-label=".form-select example">
                                    <option selected>Identification</option>
                                    <option value="1">Egypt</option>
                                    <option value="2">America</option>
                                    <option value="3">KSA</option>
                                  </select>
                                  
                            </div>
                            <div class="col-md-6">
                                <input placeholder="Expiration Date" class="textbox-n" type="text" onfocus="(this.type='Date')" id="date">
                                  
                            </div>
                            <div class="col-md-12">
                                <input type="text" name="id" placeholder="Id Number">
                            </div>
                            <div class="col-md-12">
                                <input type="text" name="id" placeholder="Bio">
                            </div>
                            <button> Done </button>
                            
                    </div>
                    </form>
                </div>
                <div class="col-md-6 ddd" style="background-image: url(img/Group\ 20.jpg);">

                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<!-- End Edit Modal  -->
@endsection
