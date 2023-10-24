<?php 
  session_start();
  // if(isset($_SESSION['username'])){
  //   header("location: admin/home.php");
  // }

  if(!isset($_COOKIE["admin_panel_access"])){
    header("location: index.php");
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
    <link rel="icon" href="img/usep_logo.png">


    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">

    <!-- font awesome cdn -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet"  type='text/css'>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/toastr.css">
    <!-- <link rel="stylesheet" href="css/style.css"> -->


  </head>

  <body>
  
  <nav class="navbar navbar-expand navbar-dark static-top">
  <div class="container">
     <img id="logo" src="img/usep_logo.png"width="5%" alt="">
     <h4 id="title" class="text-center text-white">USeP E-Voting | Admin Page</h4>
     <img id="logo" class="float-right" src="img/COC Logo.png" width="5%" alt="">
  </div>
</nav>

    <div class="container">
      <div class="card card-login mx-auto mt-5 shadow p-3 mb-5 bg-white rounded">
        <img src="img/login_bkg.jpg" width="100%" alt="">
        <div class="card-header text-center">Login Here!</div>
        <div></div>
        <div class="card-body">
          <div>
                 <!-- campus select -->
             <div class="form-group">
            <div class="form-row">
            <div class="col-md-12">
             <select id="campus" name="campus" class="custom-select" id="inputGroupSelect04">
                <option selected value="campus">Choose Acces Type...</option>
                <option value="Obrero">Obrero</option>
                <option value="Mintal">Mintal</option>
                <option value="Mabini">Mabini</option>
                <option value="Tagum">Tagum</option>
                <option value="Obrero-Watcher">Obrero Watcher</option>
                <option value="Mintal-Watcher">Mintal Watcher</option>
                <option value="Mabini-Watcher">Mabini Watcher</option>
                <option value="Tagum-Watcher">Tagum Watcher</option>
                <option value="SSG">SSG</option>
                <option value="USG">USG</option>
                <option value="CCO">CCO</option>
                <option value="Plebiscite">Plebiscite</option>
                <option value="Central-Chairperson">Central Chairperson</option>
                <option value="Monitoring">Monitoring</option>
                <option value="Technical-Officer">Technical Officer</option>



             </select>
             <span id = "errorCampus"style ="color:red;"></span>
            </div>
            </div>
            </div> <!-- end of campus select -->
            
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" id="inputUsername" class="form-control" placeholder="Username" required="required" autofocus="autofocus">
                <label for="inputUsername">Username</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="required">
                <label for="inputPassword">Password</label>
              </div>
            </div>
            <div class="form-group">
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="customControlInline" name="remember" onclick="showPassword()">
								<label class="custom-control-label" for="customControlInline">Show Password<menu type="context"></menu></label>
							</div>
						</div>
            <button id="login" class="btn btn-primary btn-block"> LOGIN</button>
          </div>   
        </div>
      </div>
    </div>

    <div>
        <div class="row">
        <div class="col-sm">

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
            
            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="image-flip">
                    <div class="mainflip">
                        <div class="frontside">
                            <div class="card shadow-sm p-3 mb-5 bg-white">
                                <div class="card-body text-center">
                                    <p></p>
                                    <h4 class="card-title"><img width="50%" src="img/campus_admin_logo/USG.png" alt=""></h4>
                                    <span class="card-text">University Student Government</span>
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
              <li><a  data-toggle="tooltip" title="Click to visit" target="_blank" href="https://www.facebook.com/USePofficial/"><img src="img/social-icons/facebook.png" width="100%" alt=""></a></li>
              <li><a  data-toggle="tooltip" title="Click to visit" target="_blank" href="https://www.youtube.com/watch?v=GDyWK_F_17E"><img src="img/social-icons/youtube.png" width="100%" alt=""></a></li>   
            </ul>
          </div>
        </div>
      </div>
</footer>

         

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script> 

    <!-- sweet alert dialog -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>

    <script src="js/long-press-event-min.js"></script>
    <script src="js/toastr.js"></script>




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



<!-- loginevent -->
<script>
 $(document).ready(function() {
        $(function () {
        $("#login").click(function (event) {
            var username = $("#inputUsername").val();
            var password = $("#inputPassword").val();
            var campus = $("#campus").val();
        {
            $.ajax({
            type: "POST",
            url: "operations/login_user.php",
            data: {username:username,password:password,campus:campus},
            dataType:'json',
            
            beforeSend (){
              $('#login').attr('disabled', 'disabled');
              $('#login').html('LOGGING IN...')
            },
            success:function(response){
                $('#login').attr('disabled', false);
                $('#login').html('LOGIN');
                var len = response.length;

                $("#college").empty();
                for( var i = 0; i<len; i++){
                    var login_result = response[i]['login_result'];
                    if(login_result == "success"){
      
                     window.location = 'admin/please_wait.php';
  
                  }else if(login_result == "wrong_password"){
                    Swal.fire({
                    title: 'Login Failed!',
                    text: "Incorrect username or password",
                    icon: 'error',
                    confirmButtonColor: '#A24D4D',
                    confirmButtonText: 'Try Again',
                    }).then((result) => {
                    if (result.value) {
                        // location.reload();
                    }
                    })
                  }else if(login_result == "watcher_success"){
                    
                    window.location = 'watcher/please_wait.php';
                  
                  }else if(login_result == "campus_error"){
                    Swal.fire({
                    title: 'Login Failed!',
                    text: "Please choose access type",
                    icon: 'error',
                    confirmButtonColor: '#A24D4D',
                    confirmButtonText: 'Try Again!'
                    }).then((result) => {
                    if (result.value) {
                        // location.reload();
                    }
                    })
                  }else if(login_result == "empty_fields"){
                    Swal.fire({
                    title: 'Login Failed!',
                    text: "Some fields are empty. Make sure to fill in all fields.",
                    icon: 'error',
                    confirmButtonColor: '#A24D4D',
                    confirmButtonText: 'Try Again!'
                    }).then((result) => {
                    if (result.value) {
                        // location.reload();
                    }
                    })
                  }else if(login_result == "central_admin_success"){

                    window.location = 'central-admin/please_wait.php';
                    
                  }else if(login_result == "ssg_success" || login_result == "usg_success"){

                    window.location = 'ssg/please_wait.php';

                  }else if(login_result == "plebiscite_success"){
                    window.location = 'plebiscite/please_wait.php';
                            
                  }else if(login_result == "tech_success"){
            
                    window.location = 'tech-access/please_wait.php';
                     

                  }else if(login_result == "monitor_success"){

                  
                    window.location = 'monitor-admin/please_wait.php';

                  }else{
                    Swal.fire({
                    title: 'Login Failed!',
                    text: "Account does not exist in our database!",
                    icon: 'error',
                    confirmButtonColor: '#A24D4D',
                    confirmButtonText: 'Try Again!'
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

 <!-- hotkeys ctrl+b -->

 <script>
document.onkeyup = function(e) {
  if (e.ctrlKey && e.which == 66) {

    Swal.fire({
    title: "Hey!",
    text: "Please enter your access code to continue",
    input: 'text',
    showCancelButton: true,   
    confirmButtonColor: '#A24D4D',
    confirmButtonText: 'Submit'     
}).then((result) => {
    var code = result.value;
    var type= "student";
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
                      html: 'Redirecting you to student voting page in <b></b> milliseconds.',
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
                        window.location.href = 'index.php';

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
    var type= "student";
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
                      html: 'Redirecting you to student voting page in <b></b> milliseconds.',
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
                        window.location.href = 'index.php';

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
    toastr.info("Hey, Welcome back. Please login to get started.");

});

</script>



  </body>

</html>
