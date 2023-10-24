<?php
session_start();
error_reporting(0);
include 'config/db_config.php';
include 'includes/date_include.php';
    
  if(isset($_SESSION['saved'])){
    header('location:voting/VotingStudentCouncil.php');
  }
  if(isset($_SESSION['savedSSG'])){
    header('location:voting/VotingSSG.php');
  }
  if(isset($_SESSION['savedPleb'])){
    header('location:voting/VotingPlebiscite.php');
  }

  if($flag == 'true' && $flag1 == 'true' && $flag2 == 'true'){
     header("Location: election_closed.php");
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>USeP E-Voting | Login</title>
  <link rel="icon" href="img\usep_logo.png">

  <!-- Bootstrap core CSS-->
  <link href="bootstrap-4.3.1-dist/css/bootstrap.css" rel="stylesheet">

  <!-- font awesome cdn -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet"  type='text/css'>

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/slider.css">
  <link rel="stylesheet" href="css/login.css">
  <link rel="stylesheet" href="css/toastr.css">

  <style>
  .custom-checkbox .custom-control-input:checked~.custom-control-label::before {
    background-color: #A24D4D !important;
  }
  #priv{
    background: rgb(138,53,53);
    background: linear-gradient(90deg, rgba(138,53,53,1) 0%, rgba(196,95,95,1) 35%, rgba(138,53,53,1) 100%);
  }
  #privacy{
    background:#A24D4D;color:white;border:none
  }
  #privacy:hover{
    background:#7e0308
  }

  @media (max-width:767px){
    #priv-image{
      width:50%;
    }
  }
  .text-responsive {
    font-size: calc(87% + 0.3vw + 0.3vh);
  }
  </style>
</head>

<body>
 <nav class="navbar navbar-expand navbar-dark static-top">
  <div class="container">
     <img id="logo" src="img/usep_logo.png"width="5%" alt="">
     <h4 id="title" class="text-center text-white">USeP E-Voting | Voting Page</h4>
     <img id="logo" class="float-right" src="img/COC Logo2.png" width="5%" alt="">
  </div>
</nav>

  <div class="container">
    <div class="card card-login mx-auto mt-5 shadow p-3 mb-5 bg-white rounded">
      <img src="img/login_bkg.jpg" width="100%" alt="">
      <h4 class="card-header text-center">Login Here!</h4>
      <div class="card-body">
        <div>
          
          <div class="form-group"><!--Select Mode of Voting-->
            <div class="form-row">
              <div class="col-md-12">
                <select id="mode" name="mode" class="custom-select" id="inputGroupSelect04">
                  <option selected value="mode">Choose Mode of Voting</option>
                  <option value="University Student Government" style="display:none">University Student Government</option>
                  <option value="Plebiscite" style="display:none">Plebiscite</option>
                  <option value="Student Council and Local Council">Student Council and Local Council</option>
                </select>
              </div>
            </div>
          </div> <!--End Select Mode of Voting-->
          
          <div class="form-group"><!--Select Campus-->
            <div class="form-row">
              <div class="col-md-12">
                <select id="campus" name="campus" class="custom-select" id="inputGroupSelect04">
                  <option selected value="campus">Choose Campus</option>
                  <option value="Obrero">Obrero</option>
                  <option value="Mintal">Mintal</option>
                  <option value="Tagum">Tagum</option>
                  <option value="Mabini">Mabini</option>
                </select>
              </div>
            </div>
          </div> <!--End Select Campus-->

          <!--Form For Student-->
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="inputUsername" class="form-control" placeholder="Student ID" required="required"
                autofocus="autofocus">
              <label for="inputUsername">Student ID</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="inputPassword" class="form-control" placeholder="mm-dd-yyy" required="required">
              <label for="inputPassword">mm-dd-yyyy</label>
            </div>
          </div>
          <div class="form-group">
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="customControlInline" name="remember"
                onclick="showPassword()">
              <label class="custom-control-label" for="customControlInline">Show Password<menu type="context"></menu>
                </label>
            </div>
          </div>
          <!--End Form For Student-->
          <button id="login" class="btn btn-primary btn-block">LOGIN</button>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg">
      <div class="col-12">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="image-flip">
                    <div class="mainflip">
                        <div class="frontside">
                            <div class="card shadow-sm p-3 mb-5 bg-white ">
                                <div class="card-body text-center">
                                    <p></p>
                                    <h4 class="card-title"><img width="50%" src="img/campus_logos/mabini_logo.png" alt=""></h4>
                                    <span class="card-text">Mabini Campus Student Council</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="image-flip">
                    <div class="mainflip">
                        <div class="frontside">
                            <div class="card shadow-sm p-3 mb-5 bg-white">
                                <div class="card-body text-center">
                                    <p></p>
                                    <h4 class="card-title"><img width="50%" src="img/campus_logos/mintal_logo.png" alt=""></h4>
                                    <span class="card-text">Mintal Campus Student Council</span>
                                    <p class="card-text"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="image-flip">
                    <div class="mainflip">
                        <div class="frontside">
                            <div class="card shadow-sm p-3 mb-5 bg-white">
                                <div class="card-body text-center">
                                    <p></p>
                                    <h4 class="card-title"><img width="50%" src="img/campus_logos/obrero_logo.png" alt=""></h4>
                                    <span class="card-text">Obrero Campus Student Council</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="image-flip">
                    <div class="mainflip">
                        <div class="frontside">
                            <div class="card shadow-sm p-3 mb-5 bg-white ">
                                <div class="card-body text-center">
                                    <p></p>
                                    <h4 class="card-title"><img width="50%" src="img/campus_logos/tagum_logo.png" alt=""></h4>
                                    <span class="card-text">Tagum Campus Student Council</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

               <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="image-flip">
                    <div class="mainflip">
                        <div class="frontside">
                            <div class="card shadow-sm p-3 mb-5 bg-white">
                                <div class="card-body text-center">
                                    <p></p>
                                    <h4 class="card-title"><img width="50%" src="img/campus_admin_logo/SSG.png" alt=""></h4>
                                    <span class="card-text">Supreme Student Government</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="image-flip">
                    <div class="mainflip">
                        <div class="frontside">
                            <div class="card shadow-sm p-3 mb-5 bg-white">
                                <div class="card-body text-center">
                                    <p></p>
                                    <h4 class="card-title"><img width="50%" src="img/campus_admin_logo/Plebiscite.png" alt=""></h4>
                                    <span class="card-text">Supreme Student Government Congress</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            


        </div>
        </div>
        </div>
          </div>
          </div>


 <!-- Sticky Footer -->
      <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-6">
            <h6>About</h6>
            <p class="text-justify float-left">This online voting system is an initiative to help students vote for  student and local council officers amidst the pandemic. It gives the students both the chance to vote or run for student body positions.</p>
          </div>

          <div class="col-xs-6 col-md-6">
            <h6>Address</h6>
            <ul class="footer-links">
              <li><span>University of Southeastern Philippines Iñigo St., Bo. Obrero,
              Davao City Philippines 8000</span></li>
          </div>

          <div >
        
          </div>
        </div>
        <hr>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-sm-6 col-xs-12">
            <p class="copyright-text">USeP E-Voting Copyright &copy; <?php echo date('Y') ?> All Rights Reserved by 
         <a href="#">beeEsAyTeA18
        </a>.
        </p>
        </div>
          <div class="col-md-4 col-sm-6 col-xs-12">
            <ul class="campus-logos">
              <li><a  data-toggle="tooltip" title="Click to visit"  target="_blank" href="https://www.facebook.com/USePofficial/"><img src="img/social-icons/facebook.png" width="100%" alt=""></a></li>
              <li><a  data-toggle="tooltip" title="Click to visit" target="_blank" href="https://www.youtube.com/watch?v=GDyWK_F_17E"><img src="img/social-icons/youtube.png" width="100%" alt=""></a></li>   
            </ul>
          </div>
        </div>
      </div>
</footer>

<!-- Messenger Chat Plugin Code -->
    <div id="fb-root"></div>

    <!-- Your Chat Plugin code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "535744283289207");
      chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v14.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>

   <!-- Data privacy modal  -->
  <div class="modal animate__animated animate__bounceIn" data-backdrop="static" data-keyboard="false" id="privacy-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-header" style="background:#5F2D2D">
        <div class="modal-content">
          
          <div class="modal-body">
          <div class="text-center">
              <img src="../img/usep_logo.png" width="30%" alt="">
          </div>
              <div class="text-center">
                <h4>University of Southeastern Philippines</h3>
                <span>Office of Legal Affairs- Universiy Data Privacy Office</span><br><br>
                <h5 class="font-weight-bold">Privacy Notice</h5>
              </div>
            <br>
           <div class="text-center">
            <p>Pursuant to the University of Southeastern Philippines (USeP) data privacy policy and the Data Privacy Act of 2012,
             we will collect and process the following personal information from you when you manually or electronically fill in this form:</p>
           </div>
           <div>
            <ul>
              <li>Full Name</li>
              <li>E-mail address</li>
              <li>ID Number</li>
              <li>Campus, College and Program</li>
              <li>Birthdate</li>
              <li>Device Information</li>
            </ul>
           </div>

            <div class="text-center">
              <span><span class="font-weight-bold">USE:</span>The collected personal information will be utilized solely for <span class="text-danger"> 2021 Campus Student Council Elections </span> </span>
            </div><br>

          <div>
            <span> <span class="font-weight-bold"> PROTECTION MEASURE: </span> These personal information shall be held in utmost confidentiality and shall not be transferred or 
            divulged to other persons or entity without your express consent. Only authorized personnel has access to this personal information. 
            <span class="text-danger"> The USeP – Commission on Student Election </span> will only retain the collected personal data as long as necessary for the fulfilment of the 
            purpose.</span>
          
          </div>

          <br>
         
            <br>
          <div class="text-center">
              <h5 class="font-weight-bold">Information</h5>
          </div>

          <div class="text-center">
            <p>For querries and clarifications pertaining to the University Data Privacy Policy and with the Data Privacy Act of 2012, 
            you may contact the Univeristy Data Privacy Officer <span class="font-weight-bold"> MR. KARLO MARTIN C. CARAMUGAN </span> through his email <a href="#"> kmccaramugan@usep.edu.ph </a> .</p>
          </div>

          </div>
          <div class="modal-footer">
            <div class="container text-center"><button type="button" class="btn btn-secondary" id="privacy" data-dismiss="modal">Agree</button></div>
          </div>
        </div>
      </div>
    </div>
    
    
    
  <!-- Bootstrap core JavaScript-->
  <script src="jquery/jquery-3.6.0.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <!--<script src="vendor/jquery-easing/jquery.easing.min.js"></script>-->

  <!-- sweet alert dialog -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

  <script src="js/long-press-event-min.js"></script>
  <script src="js/toastr.js"></script>


    <!-- animate css -->
    <link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"
/>


  <script>
    $(document).ready(function(){
      $('.customer-logos').slick({
          slidesToShow: 3,
          slidesToScroll: 1,
          autoplay: true,
          autoplaySpeed: 1500,
          arrows: false,
          dots: false,
          pauseOnHover: false,
          responsive: [{
              breakpoint: 768,
              settings: {
                  slidesToShow: 2
              }
          }, {
              breakpoint: 520,
              settings: {
                  slidesToShow: 2
              }
          }]
      });
    });
      
  </script>
  
  <!-- modal opening -->
  <script>
    $(window).on('load',function(){
      if (sessionStorage.getItem('dontLoad') == null){
        $('#privacy-modal').modal('show');
        sessionStorage.setItem('dontLoad', 'true');
      } 
      });
  </script>

  <!-- loginevent -->
  <script>
    $(document).ready(function () {
      $(function () {
          $("#login").click(function (event) {
              var username = $("#inputUsername").val();
              var password = $("#inputPassword").val();
              var campus = $("#campus").val(); 
              var mode = $("#mode").val(); 
                $.ajax({
                    type: "POST",
                    url: "voting-operations/AjaxLogin.php",
                    data: {
                      username: username,
                      password: password,
                      campus: campus,
                      mode: mode,
                      resend: "None"
                    },
                    dataType: 'json',

                     beforeSend (){
                      $('#login').attr('disabled', 'disabled');
                      $('#login').html('LOGGING IN...')
                    },

                    success: function (response) {
                     $('#login').attr('disabled', false);
                      $('#login').html('LOGIN');

                      if (response[0] == "success") {
                        window.location.href = 'voting/VotingOTP.php';
                      }else if (response[0] == "failed") {
                        Swal.fire({
                          title: 'Login Failed!',
                          text: "Incorrect Username or Password!",
                          icon: 'error',
                          confirmButtonColor: '#A24D4D',
                          confirmButtonText: 'Try Again'
                        }).then((result) => {
                          if (result.value) {
                            location.reload();
                          }
                        })
                      }else if (response[0] == "Election Due") {
                        Swal.fire({
                          title: response[1] + ' Election is finally over',
                          text: "We appreciate you partaking this event",
                          icon: 'error',
                          confirmButtonText: 'Okay'
                        }).then((result) => {
                          if (result.value) {
                            location.reload();
                         }
                        })
                      }else if (response[0] == "Voted") {
                        Swal.fire({
                          title: 'Login Failed!',
                          text: "Nice Try, You Have Already Voted For This Year Election.",
                          icon: 'error',
                          confirmButtonText: 'Okay'
                        }).then((result) => {
                          if (result.value) {
                            location.reload();
                         }
                        })
                      }else if (response[0] == "Proxy") {
                        Swal.fire({
                          title: 'Login Failed!',
                          text: "Misrepresentation Of Vote Detected, One Vote Per Device Only",
                          icon: 'warning',
                          confirmButtonText: 'Okay'
                        }).then((result) => {
                          if (result.value) {
                            location.reload();
                         }
                        })
                      }else if (response[0] == "Login") {
                        Swal.fire({
                          title: 'Login Failed!',
                          text: "Your Account Is Currently Logged In On Other Device.",
                          icon: 'error',
                          confirmButtonText: 'Okay'
                        }).then((result) => {
                          if (result.value) {
                            location.reload();
                         }
                        })
                      } else {
                        Swal.fire({
                          title: 'Login Failed!',
                          text: "There's A Problem Sending You A Code To Your Email.",
                          icon: 'warning',
                          confirmButtonColor: '#A24D4D',
                          confirmButtonText: 'Try Again!'
                        }).then((result) => {
                          if (result.value) {
                            location.reload();
                          }
                        })
                      }
                    },
                    error:function(ts){
                      console.log(ts);
                      Swal.fire({
                        title: 'Login Failed!',
                        text: "Problem In Accessing Your Account! Issue: ",
                        icon: 'error',
                        confirmButtonColor: '#A24D4D',
                        confirmButtonText: 'Try Again!'
                      }).then((result) => {
                        if (result.value) {
                          location.reload();
                        }
                      })
                    }
                });
          });
      });
    });
  </script>

  <!-- toggle password -->
  <script>
    function showPassword() {
      var x = document.getElementById("inputPassword");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
    
  </script>

<!-- hotkeys ctrl+m-->
<script>
document.onkeyup = function(e) {
  if (e.ctrlKey && e.which == 77) {

    Swal.fire({
    title: "Hey!",
    text: "Please enter your access code to continue",
    input: 'text',
    showCancelButton: true,   
    confirmButtonColor: '#A24D4D',
    confirmButtonText: 'Submit'     
}).then((result) => {
    var code = result.value;
    var type= "admin";
    if (result.value) {
      $.ajax({
            type: "POST",
            url: "operations/access_code.php",
            data: {code:code,type:type},
            dataType:'json',
            success:function(response){
              var len =response.length;
              for(var i = 0; i<len; i++){
                  
                  if(response[i]['result'] == 'success'){
                    let timerInterval
                    Swal.fire({
                      title: 'Please standby!',
                      html: 'Redirecting you to admin page in <b></b> milliseconds.',
                      timer: 2000,
                      timerProgressBar: true,
                      onBeforeOpen: () => {
                        Swal.showLoading()
                        timerInterval = setInterval(() => {
                          const content = Swal.getContent()
                          if (content) {
                            const b = content.querySelector('b')
                            if (b) {
                              b.textContent = Swal.getTimerLeft()
                            }
                          }
                        }, 100)
                      },
                      onClose: () => {
                        clearInterval(timerInterval)
                      }
                    }).then((result) => {
                      if (result.dismiss === Swal.DismissReason.timer) {
                        window.location.href = 'index_admin.php';

                      }
                    })
                  }else{
                    Swal.fire({
                    title: 'Sorry!',
                    text: "The code you entered was incorrect",
                    confirmButtonColor: '#A24D4D',
                    confirmButtonText: 'Try Again!',
                    imageUrl:'img/error-anim.gif',
                    }).then((result) => {
                    if (result.value) {
                        // location.reload();
                    }
                    })

                  }
               
              }

            }  
            });

    }
});

  }
};
</script>

<script>
var el = document.getElementById('logo');

// listen for the long-press event
el.addEventListener('long-press', function(e) {

  // stop the event from bubbling up
  e.preventDefault()

  Swal.fire({
    title: "Hey!",
    text: "Please enter your access code to continue",
    input: 'text',
    showCancelButton: true,   
    confirmButtonColor: '#A24D4D',
    confirmButtonText: 'Submit'     
}).then((result) => {
    var code = result.value;
    var type= "admin";
    if (result.value) {
      $.ajax({
            type: "POST",
            url: "operations/access_code.php",
            data: {code:code,type:type},
            dataType:'json',
            success:function(response){
              var len =response.length;
              for(var i = 0; i<len; i++){
                  
                  if(response[i]['result'] == 'success'){
                    let timerInterval
                    Swal.fire({
                      title: 'Please standby!',
                      html: 'Redirecting you to admin page in <b></b> milliseconds.',
                      timer: 2000,
                      timerProgressBar: true,
                      onBeforeOpen: () => {
                        Swal.showLoading()
                        timerInterval = setInterval(() => {
                          const content = Swal.getContent()
                          if (content) {
                            const b = content.querySelector('b')
                            if (b) {
                              b.textContent = Swal.getTimerLeft()
                            }
                          }
                        }, 100)
                      },
                      onClose: () => {
                        clearInterval(timerInterval)
                      }
                    }).then((result) => {
                      if (result.dismiss === Swal.DismissReason.timer) {
                        window.location.href = 'index_admin.php';

                      }
                    })
                  }else{
                    Swal.fire({
                    title: 'Sorry!',
                    text: "The code you entered was incorrect",
                    confirmButtonColor: '#A24D4D',
                    confirmButtonText: 'Try Again!',
                    imageUrl:'img/error-anim.gif',
                    }).then((result) => {
                    if (result.value) {
                        // location.reload();
                    }
                    })

                  }
               
              }

            }  
            });

    }
});

  
});

</script>

<script>
$(function () {
    // Toastr options
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-left",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "3000",
        "hideDuration": "10000",
        "timeOut": "200000",
        "extendedTimeOut": "100000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
    toastr.info("Hey, Welcome USePian. Please login to get started.");

});

</script>
</body>


</html>