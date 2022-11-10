<?php
session_start();
require 'connect.php';

// if (isset($_POST["loginPL"])) {
//     if (empty($_POST["usernamePL"]) || empty(["passwordPL"])) {
//         $message = '<label>Email dan Password harus di isi</label>';
//     } else {
//         $query = "SELECT username, password From pelanggan WHERE username = :username AND password = :password";
//         $statement = $conn->prepare($query);
//         $statement->execute(
//             array(
//                 'username'  => $_POST["usernamePL"],
//                 'password'  => $_POST["passwordPL"]
//             )
//         );
//         $count = $statement->rowCount();
//         if ($count > 0) {
//             $_SESSION["username"] = $_POST["username"];
//             header("location:UserRiwayat.php");
//         } else {
//             $message("<label>Wrong data</>");
//         }
//     }
// }

if (isset($_POST["loginPL"])) {
    $username = $_POST["usernamePL"];
    $password = $_POST["passwordPL"];

    $result = mysqli_query($conn, "SELECT * FROM pelanggan WHERE username = '$username' AND password = '$password'");
    $cek = mysqli_num_rows($result);
    while ($pass = mysqli_fetch_array($result)) {
        $id_pelanggan = $pass['id_pelanggan'];
        $nama_pelanggan = $pass['nama_pelanggan'];
    }

    if ($cek > 0) {
        $_SESSION["LoginPL"] = true;
        $_SESSION["id"] = $id_pelanggan;
        $_SESSION["nama"] = $nama_pelanggan;
        header("Location: UserRiwayat.php");
        exit;
    }
    $error = true;
}

// if (isset($_POST["loginAD"])) {
//     $username = $_POST["usernameAD"];
//     $password = $_POST["passwordAD"];

//     $result = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username'");
//     $cek = mysqli_num_rows($result);
//     while ($results = mysqli_fetch_array($result)) {
//         $id_admin = $results['id_admin'];
//         $nama = $results['nama'];
//     }

//     if ($cek > 0) {
//         $_SESSION["LoginAD"] = true;
//         $_SESSION["id"] = $id_admin;
//         $_SESSION["nama"] = $nama;
//         header("Location: AdminService.php");
//         exit;
//     }
//     $error = true;
// }

// if (isset($_POST["loginPM"])) {
//     $username = $_POST["usernamePM"];
//     $password = $_POST["passwordPM"];

//     $result = mysqli_query($conn, "SELECT * FROM pemilik WHERE username = '$username'");
//     $cek = mysqli_num_rows($result);
//     while ($results = mysqli_fetch_array($result)) {
//         $id_pemilik = $results['id_pemilik'];
//         $nama = $results['nama'];
//     }

//     if (mysqli_num_rows($result) == 1) {
//         $_SESSION["LoginPM"] = true;
//         $_SESSION["id"] = $id_pemilik;
//         $_SESSION["nama"] = $nama;
//         header("Location: OwnerService.php");
//         exit;
//     }

//     $error = true;
// }

// 
?>


<!-- 
    <form action="" method="POST">
        <div class="userLgn">
            <div class="userLgn-content">
                <img src="close.png" alt="Close" class="closeUser">
                <h3 class="hdr-lgn">LOGIN PELANGGAN</h3>
                <p>Username</p>
                <input type="text" name="usernamePL" id="usernamePL">
                <p>Password</p>
                <input type="password" name="passwordPL" id="passwordPL">
                <button type="submit" name="loginPL" class="button">Login</button>
            </div>
        </div>
    </form>

    <form action="" method="POST">
        <div class="adminLgn">
            <div class="adminLgn-content">
                <img src="close.png" alt="Close" class="closeAdmin">
                <h3 class="hdr-lgn">LOGIN ADMIN</h3>
                <p>Username</p>
                <input type="text" name="usernameAD" id="usernameAD">
                <p>Password</p>
                <input type="password" name="passwordAD" id="passwordAD">
                <button type="submit" name="loginAD" class="button">Login</button>
            </div>
        </div>
    </form>

    <form action="" method="POST">
        <div class="ownerLgn">
            <div class="ownerLgn-content">
                <img src="close.png" alt="Close" class="closeOwner">
                <h3 class="hdr-lgn">LOGIN PEMILIK</h3>
                <p>Username</p>
                <input type="text" name="usernamePM" id="usernamePM">
                <p>Password</p>
                <input type="password" name="passwordPM" id="passwordPM">
                <button type="submit" name="loginPM" class="button">Login</button>>
            </div>
        </div>
    </form>


 -->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>SeBengkel</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Google fonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Newsreader:ital,wght@0,600;1,600&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,500;0,600;0,700;1,300;1,500;1,600;1,700&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,400;1,400&amp;display=swap" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="styles.css" rel="stylesheet" />
    <link href="styles2.css" rel="stylesheet">
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top shadow-sm" id="mainNav">
        <div class="container px-5">
            <a class="navbar-brand fw-bold" href="#page-top">SeBengkel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="bi-list"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto me-4 my-3 my-lg-0">
                    <button class="btn btn-secondary"><a href="#home" class="btn-link">Home</a></button>
                    <button class="btn btn-secondary"><a href="#features" class="btn-link">Service</a></button>
                    <button class="btn btn-secondary"><a href="#about" class="btn-link">About Us</a></button>
                    <!-- <button class="btn btn-secondary" onclick="window.open('https://google.com');">About</button> -->

                    <!-- <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Download</a></button>
                              <ul class="dropdown-menu dropdown-menu-dark">
                                <li><a class="dropdown-item active" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">Separated link</a></li>
                              </ul>
                        </div> -->

                </ul>

                <a class="btn btn-modal modal-account rounded-pill px-3 mb-2 mb-lg-0" data-bs-toggle="modal" data-bs-target="#modal-account">
                    <span class="d-flex align-items-center">
                        <i class="bi-chat-text-fill me-2"></i>
                        <span id="logUser" class="small">Login</span>
                    </span>
                </a>

                <a class="btn btn-modal rounded-pill px-3 mb-2 mb-lg-0" data-bs-toggle="modal" data-bs-target="#feedbackModal">
                    <span class="d-flex align-items-center">
                        <i class="bi-chat-text-fill me-2"></i>
                        <span class="small">Send Feedback</span>
                    </span>
                </a>
            </div>
        </div>
    </nav>
    <!-- Mashead header-->
    <header id="home" class="masthead">
        <div class="container px-5">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-6 banner ">
                    <!-- Mashead text and app badges-->
                    <div class="mb-5 mb-lg-0 text-center text-lg-start">
                        <h1 class="display-1">SeBengkel, Bergerak Maju Tiada Henti!</h1>
                        <p class="lead fw-normal text-muted mb-5">Memberi layanan terbaik sepenuh hati!</p>
                        <div class="d-flex flex-column flex-lg-row align-items-center">
                            <a class="btn btn-register btn-modal modal-account rounded-pill px-3 mb-2 mb-lg-0" href="register.php">
                                <span class="d-flex align-items-center">
                                    <i class="bi-chat-text-fill me-2"></i>
                                    <span class="small">Register</span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 banner">
                    <!-- Masthead device mockup feature-->

                    <img class="img-masthead" src="resources/Header.png" alt="">
                    <!--
                            <svg class="circle" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                                <defs>
                                    <linearGradient id="circleGradient" gradientTransform="rotate(45)">
                                        <stop class="gradient-start-color" offset="0%"></stop>
                                        <stop class="gradient-end-color" offset="100%"></stop>
                                    </linearGradient>
                                </defs>
                                <circle cx="50" cy="50" r="50"></circle></svg><svg class="shape-1 d-none d-sm-block" viewBox="0 0 240.83 240.83" xmlns="http://www.w3.org/2000/svg">
                                <rect x="-32.54" y="78.39" width="305.92" height="84.05" rx="42.03" transform="translate(120.42 -49.88) rotate(45)"></rect>
                                <rect x="-32.54" y="78.39" width="305.92" height="84.05" rx="42.03" transform="translate(-49.88 120.42) rotate(-45)"></rect></svg><svg class="shape-2 d-none d-sm-block" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg"><circle cx="50" cy="50" r="50"></circle></svg>
                            <div class="device-wrapper">
                                <div class="device" data-device="iPhoneX" data-orientation="portrait" data-color="black">
                                    <div class="screen bg-black">
                                        PUT CONTENTS HERE:
                                        * * This can be a video, image, or just about anything else.
                                        * * Set the max width of your media to 100% and the height to
                                        * * 100% like the demo example below.
                                        <video muted="muted" autoplay="" loop="" style="max-width: 100%; height: 100%"><source src="assets/img/demo-screen.mp4" type="video/mp4" /></video>
                                    </div>
                                </div>
                            </div>
                            -->
                </div>
            </div>
        </div>
        </div>
    </header>
    <!-- Quote/testimonial aside-->
    <aside class="text-center bg-gradient-primary-to-secondary">
        <div class="container ">
            <div class="row gx-5 justify-content-center">
                <div class="col-xl-8">
                    <div class="h2 fs-1 text-white mb-4">"Our Service"</div>
                </div>
            </div>
        </div>
    </aside>
    <!-- App features section-->
    <section id="features">
        <div class="container mt-2em px-5">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-8 order-lg-1 mb-5 mb-lg-0">
                    <div class="container-fluid px-5">
                        <div class="row gx-5">
                            <div class="col-md-6 mb-5">
                                <!-- Feature item-->
                                <div class="text-center">
                                    <img class="imgfeature" src="./resources/Logo.png" alt="" style="height: 4rem;">
                                    <h3 class="font-alt">Device Mockups</h3>
                                    <p class="text-muted mb-0">Ready to use HTML/CSS device mockups, no Photoshop required!</p>
                                </div>
                            </div>
                            <div class="col-md-6 mb-5">
                                <!-- Feature item-->
                                <div class="text-center">
                                    <img class="imgfeature" src="./resources/Mechanic.png" alt="" style="height: 4rem;">
                                    <h3 class="font-alt">Flexible Use</h3>
                                    <p class="text-muted mb-0">Put an image, video, animation, or anything else in the screen!</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-5 mb-md-0">
                                <!-- Feature item-->
                                <div class="text-center">
                                    <img class="imgfeature" src="./resources/Motor.png" alt="" style="height: 4rem;">
                                    <h3 class="font-alt">Free to Use</h3>
                                    <p class="text-muted mb-0">As always, this theme is free to download and use for any purpose!</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <!-- Feature item-->
                                <div class="text-center">
                                    <img class="imgfeature" src="./resources/Logo.png" alt="" style="height: 4rem;">
                                    <h3 class="font-alt">Open Source</h3>
                                    <p class="text-muted mb-0">Since this theme is MIT licensed, you can use it commercially!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 order-lg-0">
                    <!-- Features section device mockup-->
                    <div class="features-device-mockup">
                        <img class="img-masthead" src="resources/Header.png" alt="">
                        <!-- <svg class="circle" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                            <defs>
                                <linearGradient id="circleGradient" gradientTransform="rotate(45)">
                                    <stop class="gradient-start-color" offset="0%"></stop>
                                    <stop class="gradient-end-color" offset="100%"></stop>
                                </linearGradient>
                            </defs>
                            <circle cx="50" cy="50" r="50"></circle>
                        </svg><svg class="shape-1 d-none d-sm-block" viewBox="0 0 240.83 240.83" xmlns="http://www.w3.org/2000/svg">
                            <rect x="-32.54" y="78.39" width="305.92" height="84.05" rx="42.03" transform="translate(120.42 -49.88) rotate(45)"></rect>
                            <rect x="-32.54" y="78.39" width="305.92" height="84.05" rx="42.03" transform="translate(-49.88 120.42) rotate(-45)"></rect>
                        </svg><svg class="shape-2 d-none d-sm-block" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="50" cy="50" r="50"></circle>
                        </svg>
                        <div class="device-wrapper">
                            <div class="device" data-device="iPhoneX" data-orientation="portrait" data-color="black">
                                <div class="screen bg-black">
                                    PUT CONTENTS HERE:
                                    * * This can be a video, image, or just about anything else.
                                    * * Set the max width of your media to 100% and the height to
                                    * * 100% like the demo example below.
                                    <video muted="muted" autoplay="" loop="" style="max-width: 100%; height: 100%">
                                        <source src="assets/img/demo-screen.mp4" type="video/mp4" />
                                    </video>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Basic features section-->
    <section class="bg-light" id="about">
        <div class="container px-5">
            <div class="row gx-5 align-items-center justify-content-center justify-content-lg-between">
                <div class="col-12 col-lg-5">
                    <h2 class="display-4 lh-1 mb-4">SeBengkel</h2>
                    <p class="lead fw-normal text-muted mb-5 mb-lg-0">Merupakan penyedia layanan Bengkel secara daring, yang dapat anda reservasi secara online.
                        Kami ada untuk memenuhi kebutuhan dan memberikan kemudahan kepada anda.
                    </p>
                </div>
                <div class="col-sm-8 col-md-6">
                    <div class="px-5 px-sm-0"><img class="img-fluid rounded-circle" src="https://source.unsplash.com/u8Jn2rzYIps/900x900" alt="..." /></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer-->
    <footer class="bg-black text-center py-5">
        <div class="container px-5">
            <div class="text-white-50 small">
                <div class="mb-2">&copy; SeBengkel 2022. All Rights Reserved.</div>
                <a href="#!">Privacy</a>
                <span class="mx-1">&middot;</span>
                <a href="#!">Terms</a>
                <span class="mx-1">&middot;</span>
                <a href="#!">FAQ</a>
            </div>
        </div>
    </footer>
    <!-- Feedback Modal-->
    <div class="modal fade" id="feedbackModal" tabindex="-1" aria-labelledby="feedbackModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-gradient-primary-to-secondary p-4">
                    <h5 class="modal-title font-alt text-white" id="feedbackModalLabel">Send feedback</h5>
                    <button class="btn-close btn-close-white" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body border-0 p-4">
                    <!-- * * * * * * * * * * * * * * *-->
                    <!-- * * SB Forms Contact Form * *-->
                    <!-- * * * * * * * * * * * * * * *-->
                    <!-- This form is pre-integrated with SB Forms.-->
                    <!-- To make this form functional, sign up at-->
                    <!-- https://startbootstrap.com/solution/contact-forms-->
                    <!-- to get an API token!-->
                    <form id="contactForm" data-sb-form-api-token="API_TOKEN">
                        <!-- Name input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="name" type="text" placeholder="Enter your name..." data-sb-validations="required" />
                            <label for="name">Full name</label>
                            <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                        </div>
                        <!-- Email address input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="email" type="email" placeholder="name@example.com" data-sb-validations="required,email" />
                            <label for="email">Email address</label>
                            <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                            <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                        </div>
                        <!-- Phone number input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="phone" type="tel" placeholder="(123) 456-7890" data-sb-validations="required" />
                            <label for="phone">Phone number</label>
                            <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
                        </div>
                        <!-- Message input-->
                        <div class="form-floating mb-3">
                            <textarea class="form-control" id="message" type="text" placeholder="Enter your message here..." style="height: 10rem" data-sb-validations="required"></textarea>
                            <label for="message">Message</label>
                            <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                        </div>
                        <!-- Submit success message-->
                        <!---->
                        <!-- This is what your users will see when the form-->
                        <!-- has successfully submitted-->
                        <div class="d-none" id="submitSuccessMessage">
                            <div class="text-center mb-3">
                                <div class="fw-bolder">Form submission successful!</div>
                                To activate this form, sign up at
                                <br />
                                <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                            </div>
                        </div>
                        <!-- Submit error message-->
                        <!---->
                        <!-- This is what your users will see when there is-->
                        <!-- an error submitting the form-->
                        <div class="d-none" id="submitErrorMessage">
                            <div class="text-center text-danger mb-3">Error sending message!</div>
                        </div>
                        <!-- Submit Button-->
                        <div class="d-grid"><button class="btn btn-primary rounded-pill btn-lg disabled" id="submitButton" type="submit">Submit</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- ======== Modal Account ========= -->
    <div class="modal fade" id="modal-account" tabindex="-1" aria-labelledby="feedbackModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-gradient-primary-to-secondary p-4">
                    <h5 class="modal-title font-alt text-white" id="feedbackModalLabel">Login</h5>
                    <button class="btn-close btn-close-white" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body border-0 p-4">
                    <!-- * * * * * * * * * * * * * * *-->
                    <!-- * * SB Forms Contact Form * *-->
                    <!-- * * * * * * * * * * * * * * *-->
                    <!-- This form is pre-integrated with SB Forms.-->
                    <!-- To make this form functional, sign up at-->
                    <!-- https://startbootstrap.com/solution/contact-forms-->
                    <!-- to get an API token!-->
                    <form id="contactForm" method="POST">
                        <!-- Email address input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="email" type="text" name="usernamePL" placeholder="name@example.com" data-sb-validations="required" />
                            <label for="email">User Name</label>
                            <div class="invalid-feedback" data-sb-feedback="email:required">An User Name is required.</div>
                        </div>
                        <!-- Phone number input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="password" type="password" name="passwordPL" placeholder="Password" data-sb-validations="required" />
                            <label for="phone">Password</label>
                            <div class="invalid-feedback" data-sb-feedback="password:required">Password is required</div>
                        </div>
                        <div class="d-none" id="submitErrorMessage">
                            <div class="text-center text-danger mb-3">Error sending message!</div>
                        </div>
                        <!-- Submit Button-->
                        <button class="btn btn-primary rounded-pill btn-lg" name="loginPL" id="submitButton" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
</body>

</html>