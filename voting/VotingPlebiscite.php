<?php

session_start();
include '../config/db_config.php';
include '../voting-operations/Decryption.php';

$connect = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

    if(isset($_SESSION["savedPleb"])){

    }else{
      header('location:../index.php');
    }
    
$voter = mysqli_real_escape_string($connect,decryption($_SESSION["savedPleb"]));
$campus = mysqli_real_escape_string($connect,decryption($_SESSION["Usep-Comelec"]));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>USeP E-Voting | Plebiscite</title>
    <link rel="icon" href="../img/usep_logo.png">

    <!-- Bootstrap CSS -->
    <link href="../bootstrap-5.1.3-dist/css/bootstrap.css" rel="stylesheet" />

    <!-- Font-Awesome CSS -->
    <link rel="stylesheet" href="../fontawesome-6.0.0/css/fontawesome.min.css" />

    <!--My Design -->
    <link href="../css/Main.css" rel="stylesheet" />

    <script src="../jquery/jquery-3.6.0.min.js"></script>
    <script src="../bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>

    <!--flipster Carousel -->
    <link rel="stylesheet" href="../jquery-flipster-carousel/dist/jquery.flipster.min.css">

    <!-- Custom fonts for this template-->
    <script src="../fontawesome-6.0.0/js/all.min.js"></script>

    <style>
        body {
            background-color: #f6f9fb;
        }

        .styles_Card {
            border-radius: 16px;
            border: 1px solid;
            background-color: #fff;
            border-color: #d1dadf;
            text-decoration: none;
            padding: 20px 20px;
            margin: 0 0 0 0;
        }

        #img {
            height: 100px;
            width: 100px
        }

        .crop {
            height: 200px;
            width: 200px;
            overflow: hidden;
        }

        .crop img {
            width: 200px;
            height: 200px;
            clip: rect(0px, 200px, 200px, 0px);
        }

        .ChooseYourCandidate {
            overflow: hidden;
        }

        #NoVote img {
            width: 200px;
            height: 200px
        }

        #NoVote .crop {
            height: 100%;
            width: 100%;
            overflow: hidden
        }
        .text-responsive {
            font-size: calc(100% + 1vw + 1vh);
        }
    </style>
</head>

<body class="jumbotron m-0 p-0" onbeforeunload="HandleBackFunctionality()">
    <div class="container-fluid">
        <div class="row">
            <div class="text-center w-100 col-12">
                <img class="rounded-circle mt-1" id="img" src="../img/campus_admin_logo/Plebiscite.jpg">
                <h1 class="text-responsive font-weight-bold text-uppercase text-dark">
                    Supreme Student Government Congress
                </h1>
                <div class="form-group offset-lg-3 col-sm-12 col-lg-6 align-self-center">
                    <div class="text-center styles_Card ">
                        <div class="x-100 y-100">
                            <div id="Carousel" class="position-relative ChooseYourCandidate">
                                <div class="position-relative text-center rounded mx-auto d-block w-100 h-100 p-5 m-5 bg-white" id="ChooseYourCandidate">
                                    <h2>
                                        Choose Your Decision
                                    </h2>
                                </div>
                                <ul id="flip-items" class="flip-items position-absolute">
                                    <li data-id="0" data-start="0" id="NoVote">
                                        <div class="crop">
                                            <img class="rounded  img-fluid mb-5" src="../uploads/Abstain.jpg" />
                                        </div>
                                    </li>
                                    <li data-id="1" data-start="1">
                                        <div class="crop">
                                            <img class="rounded  img-fluid" src="../img/Yes.gif" />
                                        </div>
                                        <h5 class="text-center"> Yes </h5>
                                    </li>
                                    <li data-id="2" data-start="2">
                                        <div class="crop">
                                            <img class="rounded img-fluid" src="../img/No.gif" />
                                        </div>
                                        <h5 class="text-center"> No </h5>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-12">
                        <div class="row">
                            <div class="col-lg-7 col-md-7 col-xs-6">

                            </div>
                            <div id="hide" class="col-lg-4 col-md-4 col-xs-5">
                                <button id="vote" class="btn btn-success m-2 text-center p-3">Submit Your Vote</button>
                            </div>
                            <div class="col-lg-1 col-md-1 col-xs-1">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>

<!-- sweet alert dialog -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<!--flipster Carousel-->
<script src="../jquery-flipster-carousel/dist/jquery.flipster.min.js"></script>

<script>
        window.onbeforeunload = function () {
        $.ajax({
            type: "POST",
            url: "../voting-operations/AjaxClose.php",
            data: {
                voter: "<?php echo $_SESSION["savedPleb"]?>",
                campus: "<?php echo $_SESSION["Usep-Comelec"] ?>",
                mode: "Plebiscite",
                all: "true"
            }
        });
    }
    $(document).ready(function () {
        display(true);
    });    

    function display(F1) {
        var Id = null;
        var Start = 0;
        var Flag = String(F1);

        $("#Carousel").flipster({
            style: 'carousel',
            spacing: -0.5,
            buttons: true,
            itemcontainer: 'ul',
            itemselector: 'li',
            enableTouch: true,
            start: Start,
            loop: true,
            click: true,
            onItemSwitch: function (currentItem, previousItem) {
                Id = $(currentItem).data('id');
                Start = $(currentItem).data('start');
                $("#ChooseYourCandidate").remove();
                $("#flip-items").removeClass("position-absolute");
                Flag = false;
            },
        });

        $(function () {
            $("#vote").click(function (event) {
                if (Flag == "true") {
                    Swal.fire({
                        title: 'Please Choose Your Decision',
                        icon: 'error',
                        showCancelButton: false,
                        confirmButtonText: 'Okay'
                    });
                } else {
                    Swal.fire({
                        title: 'Do you want to submit your vote?',
                        text: "You won't be able to revert this.",
                        icon: 'success',
                        showCancelButton: true,
                        confirmButtonColor: '#1ba205',
                        cancelButtonColor: '#A24D4D',
                        confirmButtonText: 'Yes, Submit My Vote.',
                        cancelButtonText: 'Back'
                    }).then((result) => {
                        if (result.value) {
                            $.ajax({
                                type: "POST",
                                url: "../voting-operations/Plebiscite/AjaxSubmitPleb.php",
                                data: {
                                    'voter': "<?php echo $_SESSION["savedPleb"] ?>",
                                    'campus': "<?php echo $_SESSION["Usep-Comelec"] ?>",
                                    'ID': Id
                                },
                                dataType: 'json',
                                success: function (response) {
                                    let timerInterval
                                    Swal.fire({
                                        title: 'Please wait!',
                                        html: 'Submitting All Your Votes In <b></b> Seconds.',
                                        icon: 'success',
                                        timer: 2000,
                                        timerProgressBar: true,
                                        onBeforeOpen: () => {
                                            Swal.showLoading()
                                            timerInterval = setInterval(() => {
                                                const content = Swal.getContent()
                                                    if (content) {
                                                        const b = content.querySelector('b')
                                                        if (b) {
                                                            b.textContent =Swal.getTimerLeft()
                                                        }
                                                    }
                                                }, 100)
                                        },
                                        onClose: () => {
                                            clearInterval(timerInterval)
                                        }
                                    }).then((result) => {
                                        if (result.dismiss === Swal
                                            .DismissReason.timer) {
                                            $.ajax({
                                                type: "POST",
                                                url: "../voting-operations/AjaxClose.php",
                                                data: {
                                                    voter: "<?php echo $_SESSION["savedPleb"]?>",
                                                    campus: "<?php echo $_SESSION["Usep-Comelec"] ?>",
                                                    mode: "Plebiscite"
                                                },
                                                success: function () {
                                                    if (response[0] == "Cast") {
                                                        window.location.href ='VoteCast.php';
                                                    } else if (response[0] == "Proxy") {
                                                        window.location.href ='VoteProxy.php';
                                                    } else {
                                                        window.location.href = 'VoteNotCast.php';
                                                    }
                                                }
                                            });
                                        }
                                    })
                                },
                                error: function (ts) {
                                    Swal.fire({
                                        title: 'Database Error!',
                                        text: "Problem In Accessing The Database Restart Your Device!",
                                        icon: 'error',
                                        confirmButtonColor: '#A24D4D',
                                        confirmButtonText: 'Okay'
                                    }).then((result) => {
                                        if (result.value) {
                                            location.reload();
                                        }
                                    })
                                }
                            });
                        } else {
                            window.location = 'VotingSSG.php';
                        }
                    });
                }
            });
        });
    }
</script>