<?php
error_reporting(E_ERROR | E_PARSE);
include '../assets/php/Modelo/class.conexion.php';
session_start();
$numDoc = $_SESSION["NumeroIdentificacion"];
$rolRec = $_SESSION["rolRecepcionista"];
if (!isset($numDoc) || $rolRec != 1) {
	echo '<!Doctype HTML>
  <html lang="es-ES">
  <head>
  <head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="description" content="" />
	<meta name="author" content="" />
  <link
  href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
  rel="stylesheet"
  integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl"
  crossorigin="anonymous">
  <!--<link rel="stylesheet" href="../assets/css/style.css">-->
  <link rel="icon" type="image/x-icon" href="../assets/img/Logotipo.PNG" />
	<!-- Core theme CSS (includes Bootstrap)-->
  <link href="../assets/css/style.css" rel="stylesheet" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <title>| Error</title>
  </head>
  <body>
  <script> window.addEventListener("load", init, false);
		function init () {
			Swal.fire({
				title: "¡Error!",
				text: "Debe iniciar sesión correctamente para acceder!",
				icon: "error",
				buttons: true,
				dangerMode: true,
			  }).then((willDelete) => {
			if (willDelete) {
				location.href = "index.php";
			} else {
				location.href = "index.php";
			}
		  });
		}
		
		  </script>
  
  </body>
  </html>';
  
} else {
	echo '<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Bienvenido</title>
		<!-- Favicon icon -->
		<link rel="icon" type="image/png" sizes="16x16" href="../images/favicon.png">
		<link rel="stylesheet" href="../vendor/chartist/css/chartist.min.css">
		<link href="../vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
		<link href="../vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
		<link href="../css/style.css" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
	</head>
	<body>
	
		<!--*******************
			Preloader start
		********************-->
		<!-- <div id="preloader">
			<div class="sk-three-bounce">
				<div class="sk-child sk-bounce1"></div>
				<div class="sk-child sk-bounce2"></div>
				<div class="sk-child sk-bounce3"></div>
			</div>
		</div> -->
		<!--*******************
			Preloader end
		********************-->
	
		<!--**********************************
			Main wrapper start
		***********************************-->
		<div id="main-wrapper">
	
			<!--**********************************
				Nav header start
			***********************************-->
			<div class="nav-header">
				<a href="inicioRecepcionista.php" class="brand-logo">
					<img class="logo-abbr" src="../images/logo.png" alt="">
					<!-- <img class="logo-compact" src="../images/logo.jpeg" alt=""> -->
					<img class="brand-title" width="200" height="30" src="../images/logo-text.png" alt="">
				</a>
				<div class="nav-control">
					<div class="hamburger">
						<span class="line"></span><span class="line"></span><span class="line"></span>
					</div>
				</div>
			</div>
			<!--**********************************
				Nav header end
			***********************************-->
			
			<!--**********************************
				Chat box start
			***********************************-->
			<!-- <div class="chatbox">
				<div class="chatbox-close"></div>
				<div class="custom-tab-1">
					<ul class="nav nav-tabs">
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#notes">Notes</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#alerts">Alerts</a>
						</li>
						<li class="nav-item">
							<a class="nav-link active" data-toggle="tab" href="#chat">Chat</a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane fade active show" id="chat" role="tabpanel">
							<div class="card mb-sm-3 mb-md-0 contacts_card dz-chat-user-box">
								<div class="card-header chat-list-header text-center">
									<a href="javascript:void(0)"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect fill="#000000" x="4" y="11" width="16" height="2" rx="1"/><rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000) " x="4" y="11" width="16" height="2" rx="1"/></g></svg></a>
									<div>
										<h6 class="mb-1">Chat List</h6>
										<p class="mb-0">Show All</p>
									</div>
									<a href="javascript:void(0)"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg></a>
								</div>
								<div class="card-body contacts_body p-0 dz-scroll  " id="DZ_W_Contacts_Body">
									<ul class="contacts">
										<li class="name-first-letter">A</li>
										<li class="active dz-chat-user">
											<div class="d-flex bd-highlight">
												<div class="img_cont">
													<img src="images/avatar/1.jpg" class="rounded-circle user_img" alt=""/>
													<span class="online_icon"></span>
												</div>
												<div class="user_info">
													<span>Archie Parker</span>
													<p>Kalid is online</p>
												</div>
											</div>
										</li>
										<li class="dz-chat-user">
											<div class="d-flex bd-highlight">
												<div class="img_cont">
													<img src="images/avatar/2.jpg" class="rounded-circle user_img" alt=""/>
													<span class="online_icon offline"></span>
												</div>
												<div class="user_info">
													<span>Alfie Mason</span>
													<p>Taherah left 7 mins ago</p>
												</div>
											</div>
										</li>
										<li class="dz-chat-user">
											<div class="d-flex bd-highlight">
												<div class="img_cont">
													<img src="images/avatar/3.jpg" class="rounded-circle user_img" alt=""/>
													<span class="online_icon"></span>
												</div>
												<div class="user_info">
													<span>AharlieKane</span>
													<p>Sami is online</p>
												</div>
											</div>
										</li>
										<li class="dz-chat-user">
											<div class="d-flex bd-highlight">
												<div class="img_cont">
													<img src="images/avatar/4.jpg" class="rounded-circle user_img" alt=""/>
													<span class="online_icon offline"></span>
												</div>
												<div class="user_info">
													<span>Athan Jacoby</span>
													<p>Nargis left 30 mins ago</p>
												</div>
											</div>
										</li>
										<li class="name-first-letter">B</li>
										<li class="dz-chat-user">
											<div class="d-flex bd-highlight">
												<div class="img_cont">
													<img src="images/avatar/5.jpg" class="rounded-circle user_img" alt=""/>
													<span class="online_icon offline"></span>
												</div>
												<div class="user_info">
													<span>Bashid Samim</span>
													<p>Rashid left 50 mins ago</p>
												</div>
											</div>
										</li>
										<li class="dz-chat-user">
											<div class="d-flex bd-highlight">
												<div class="img_cont">
													<img src="images/avatar/1.jpg" class="rounded-circle user_img" alt=""/>
													<span class="online_icon"></span>
												</div>
												<div class="user_info">
													<span>Breddie Ronan</span>
													<p>Kalid is online</p>
												</div>
											</div>
										</li>
										<li class="dz-chat-user">
											<div class="d-flex bd-highlight">
												<div class="img_cont">
													<img src="images/avatar/2.jpg" class="rounded-circle user_img" alt=""/>
													<span class="online_icon offline"></span>
												</div>
												<div class="user_info">
													<span>Ceorge Carson</span>
													<p>Taherah left 7 mins ago</p>
												</div>
											</div>
										</li>
										<li class="name-first-letter">D</li>
										<li class="dz-chat-user">
											<div class="d-flex bd-highlight">
												<div class="img_cont">
													<img src="images/avatar/3.jpg" class="rounded-circle user_img" alt=""/>
													<span class="online_icon"></span>
												</div>
												<div class="user_info">
													<span>Darry Parker</span>
													<p>Sami is online</p>
												</div>
											</div>
										</li>
										<li class="dz-chat-user">
											<div class="d-flex bd-highlight">
												<div class="img_cont">
													<img src="images/avatar/4.jpg" class="rounded-circle user_img" alt=""/>
													<span class="online_icon offline"></span>
												</div>
												<div class="user_info">
													<span>Denry Hunter</span>
													<p>Nargis left 30 mins ago</p>
												</div>
											</div>
										</li>
										<li class="name-first-letter">J</li>
										<li class="dz-chat-user">
											<div class="d-flex bd-highlight">
												<div class="img_cont">
													<img src="images/avatar/5.jpg" class="rounded-circle user_img" alt=""/>
													<span class="online_icon offline"></span>
												</div>
												<div class="user_info">
													<span>Jack Ronan</span>
													<p>Rashid left 50 mins ago</p>
												</div>
											</div>
										</li>
										<li class="dz-chat-user">
											<div class="d-flex bd-highlight">
												<div class="img_cont">
													<img src="images/avatar/1.jpg" class="rounded-circle user_img" alt=""/>
													<span class="online_icon"></span>
												</div>
												<div class="user_info">
													<span>Jacob Tucker</span>
													<p>Kalid is online</p>
												</div>
											</div>
										</li>
										<li class="dz-chat-user">
											<div class="d-flex bd-highlight">
												<div class="img_cont">
													<img src="images/avatar/2.jpg" class="rounded-circle user_img" alt=""/>
													<span class="online_icon offline"></span>
												</div>
												<div class="user_info">
													<span>James Logan</span>
													<p>Taherah left 7 mins ago</p>
												</div>
											</div>
										</li>
										<li class="dz-chat-user">
											<div class="d-flex bd-highlight">
												<div class="img_cont">
													<img src="images/avatar/3.jpg" class="rounded-circle user_img" alt=""/>
													<span class="online_icon"></span>
												</div>
												<div class="user_info">
													<span>Joshua Weston</span>
													<p>Sami is online</p>
												</div>
											</div>
										</li>
										<li class="name-first-letter">O</li>
										<li class="dz-chat-user">
											<div class="d-flex bd-highlight">
												<div class="img_cont">
													<img src="images/avatar/4.jpg" class="rounded-circle user_img" alt=""/>
													<span class="online_icon offline"></span>
												</div>
												<div class="user_info">
													<span>Oliver Acker</span>
													<p>Nargis left 30 mins ago</p>
												</div>
											</div>
										</li>
										<li class="dz-chat-user">
											<div class="d-flex bd-highlight">
												<div class="img_cont">
													<img src="images/avatar/5.jpg" class="rounded-circle user_img" alt=""/>
													<span class="online_icon offline"></span>
												</div>
												<div class="user_info">
													<span>Oscar Weston</span>
													<p>Rashid left 50 mins ago</p>
												</div>
											</div>
										</li>
									</ul>
								</div>
							</div>
							<div class="card chat dz-chat-history-box d-none">
								<div class="card-header chat-list-header text-center">
									<a href="javascript:void(0)" class="dz-chat-history-back">
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><polygon points="0 0 24 0 24 24 0 24"/><rect fill="#000000" opacity="0.3" transform="translate(15.000000, 12.000000) scale(-1, 1) rotate(-90.000000) translate(-15.000000, -12.000000) " x="14" y="7" width="2" height="10" rx="1"/><path d="M3.7071045,15.7071045 C3.3165802,16.0976288 2.68341522,16.0976288 2.29289093,15.7071045 C1.90236664,15.3165802 1.90236664,14.6834152 2.29289093,14.2928909 L8.29289093,8.29289093 C8.67146987,7.914312 9.28105631,7.90106637 9.67572234,8.26284357 L15.6757223,13.7628436 C16.0828413,14.136036 16.1103443,14.7686034 15.7371519,15.1757223 C15.3639594,15.5828413 14.7313921,15.6103443 14.3242731,15.2371519 L9.03007346,10.3841355 L3.7071045,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(9.000001, 11.999997) scale(-1, -1) rotate(90.000000) translate(-9.000001, -11.999997) "/></g></svg>
									</a>
									<div>
										<h6 class="mb-1">Chat with Khelesh</h6>
										<p class="mb-0 text-success">Online</p>
									</div>							
									<div class="dropdown">
										<a href="javascript:void(0)" data-toggle="dropdown" ><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg></a>
										<ul class="dropdown-menu dropdown-menu-right">
											<li class="dropdown-item"><i class="fa fa-user-circle text-primary mr-2"></i> View profile</li>
											<li class="dropdown-item"><i class="fa fa-users text-primary mr-2"></i> Add to close friends</li>
											<li class="dropdown-item"><i class="fa fa-plus text-primary mr-2"></i> Add to group</li>
											<li class="dropdown-item"><i class="fa fa-ban text-primary mr-2"></i> Block</li>
										</ul>
									</div>
								</div>
								<div class="card-body msg_card_body dz-scroll" id="DZ_W_Contacts_Body3">
									<div class="d-flex justify-content-start mb-4">
										<div class="img_cont_msg">
											<img src="images/avatar/1.jpg" class="rounded-circle user_img_msg" alt=""/>
										</div>
										<div class="msg_cotainer">
											Hi, how are you samim?
											<span class="msg_time">8:40 AM, Today</span>
										</div>
									</div>
									<div class="d-flex justify-content-end mb-4">
										<div class="msg_cotainer_send">
											Hi Khalid i am good tnx how about you?
											<span class="msg_time_send">8:55 AM, Today</span>
										</div>
										<div class="img_cont_msg">
									<img src="images/avatar/2.jpg" class="rounded-circle user_img_msg" alt=""/>
										</div>
									</div>
									<div class="d-flex justify-content-start mb-4">
										<div class="img_cont_msg">
											<img src="images/avatar/1.jpg" class="rounded-circle user_img_msg" alt=""/>
										</div>
										<div class="msg_cotainer">
											I am good too, thank you for your chat template
											<span class="msg_time">9:00 AM, Today</span>
										</div>
									</div>
									<div class="d-flex justify-content-end mb-4">
										<div class="msg_cotainer_send">
											You are welcome
											<span class="msg_time_send">9:05 AM, Today</span>
										</div>
										<div class="img_cont_msg">
									<img src="images/avatar/2.jpg" class="rounded-circle user_img_msg" alt=""/>
										</div>
									</div>
									<div class="d-flex justify-content-start mb-4">
										<div class="img_cont_msg">
											<img src="images/avatar/1.jpg" class="rounded-circle user_img_msg" alt=""/>
										</div>
										<div class="msg_cotainer">
											I am looking for your next templates
											<span class="msg_time">9:07 AM, Today</span>
										</div>
									</div>
									<div class="d-flex justify-content-end mb-4">
										<div class="msg_cotainer_send">
											Ok, thank you have a good day
											<span class="msg_time_send">9:10 AM, Today</span>
										</div>
										<div class="img_cont_msg">
											<img src="images/avatar/2.jpg" class="rounded-circle user_img_msg" alt=""/>
										</div>
									</div>
									<div class="d-flex justify-content-start mb-4">
										<div class="img_cont_msg">
											<img src="images/avatar/1.jpg" class="rounded-circle user_img_msg" alt=""/>
										</div>
										<div class="msg_cotainer">
											Bye, see you
											<span class="msg_time">9:12 AM, Today</span>
										</div>
									</div>
									<div class="d-flex justify-content-start mb-4">
										<div class="img_cont_msg">
											<img src="images/avatar/1.jpg" class="rounded-circle user_img_msg" alt=""/>
										</div>
										<div class="msg_cotainer">
											Hi, how are you samim?
											<span class="msg_time">8:40 AM, Today</span>
										</div>
									</div>
									<div class="d-flex justify-content-end mb-4">
										<div class="msg_cotainer_send">
											Hi Khalid i am good tnx how about you?
											<span class="msg_time_send">8:55 AM, Today</span>
										</div>
										<div class="img_cont_msg">
									<img src="images/avatar/2.jpg" class="rounded-circle user_img_msg" alt=""/>
										</div>
									</div>
									<div class="d-flex justify-content-start mb-4">
										<div class="img_cont_msg">
											<img src="images/avatar/1.jpg" class="rounded-circle user_img_msg" alt=""/>
										</div>
										<div class="msg_cotainer">
											I am good too, thank you for your chat template
											<span class="msg_time">9:00 AM, Today</span>
										</div>
									</div>
									<div class="d-flex justify-content-end mb-4">
										<div class="msg_cotainer_send">
											You are welcome
											<span class="msg_time_send">9:05 AM, Today</span>
										</div>
										<div class="img_cont_msg">
									<img src="images/avatar/2.jpg" class="rounded-circle user_img_msg" alt=""/>
										</div>
									</div>
									<div class="d-flex justify-content-start mb-4">
										<div class="img_cont_msg">
											<img src="images/avatar/1.jpg" class="rounded-circle user_img_msg" alt=""/>
										</div>
										<div class="msg_cotainer">
											I am looking for your next templates
											<span class="msg_time">9:07 AM, Today</span>
										</div>
									</div>
									<div class="d-flex justify-content-end mb-4">
										<div class="msg_cotainer_send">
											Ok, thank you have a good day
											<span class="msg_time_send">9:10 AM, Today</span>
										</div>
										<div class="img_cont_msg">
											<img src="images/avatar/2.jpg" class="rounded-circle user_img_msg" alt=""/>
										</div>
									</div>
									<div class="d-flex justify-content-start mb-4">
										<div class="img_cont_msg">
											<img src="images/avatar/1.jpg" class="rounded-circle user_img_msg" alt=""/>
										</div>
										<div class="msg_cotainer">
											Bye, see you
											<span class="msg_time">9:12 AM, Today</span>
										</div>
									</div>
								</div>
								<div class="card-footer type_msg">
									<div class="input-group">
										<textarea class="form-control" placeholder="Type your message..."></textarea>
										<div class="input-group-append">
											<button type="button" class="btn btn-primary"><i class="fa fa-location-arrow"></i></button>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="alerts" role="tabpanel">
							<div class="card mb-sm-3 mb-md-0 contacts_card">
								<div class="card-header chat-list-header text-center">
									<a href="javascript:void(0)"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg></a>
									<div>
										<h6 class="mb-1">Notications</h6>
										<p class="mb-0">Show All</p>
									</div>
									<a href="javascript:void(0)"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/><path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero"/></g></svg></a>
								</div>
								<div class="card-body contacts_body p-0 dz-scroll" id="DZ_W_Contacts_Body1">
									<ul class="contacts">
										<li class="name-first-letter">SEVER STATUS</li>
										<li class="active">
											<div class="d-flex bd-highlight">
												<div class="img_cont primary">KK</div>
												<div class="user_info">
													<span>David Nester Birthday</span>
													<p class="text-primary">Today</p>
												</div>
											</div>
										</li>
										<li class="name-first-letter">SOCIAL</li>
										<li>
											<div class="d-flex bd-highlight">
												<div class="img_cont success">RU<i class="icon fa-birthday-cake"></i></div>
												<div class="user_info">
													<span>Perfection Simplified</span>
													<p>Jame Smith commented on your status</p>
												</div>
											</div>
										</li>
										<li class="name-first-letter">SEVER STATUS</li>
										<li>
											<div class="d-flex bd-highlight">
												<div class="img_cont primary">AU<i class="icon fa fa-user-plus"></i></div>
												<div class="user_info">
													<span>AharlieKane</span>
													<p>Sami is online</p>
												</div>
											</div>
										</li>
										<li>
											<div class="d-flex bd-highlight">
												<div class="img_cont info">MO<i class="icon fa fa-user-plus"></i></div>
												<div class="user_info">
													<span>Athan Jacoby</span>
													<p>Nargis left 30 mins ago</p>
												</div>
											</div>
										</li>
									</ul>
								</div>
								<div class="card-footer"></div>
							</div>
						</div>
						<div class="tab-pane fade" id="notes">
							<div class="card mb-sm-3 mb-md-0 note_card">
								<div class="card-header chat-list-header text-center">
									<a href="javascript:void(0)"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect fill="#000000" x="4" y="11" width="16" height="2" rx="1"/><rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000) " x="4" y="11" width="16" height="2" rx="1"/></g></svg></a>
									<div>
										<h6 class="mb-1">Notes</h6>
										<p class="mb-0">Add New Nots</p>
									</div>
									<a href="javascript:void(0)"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/><path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero"/></g></svg></a>
								</div>
								<div class="card-body contacts_body p-0 dz-scroll" id="DZ_W_Contacts_Body2">
									<ul class="contacts">
										<li class="active">
											<div class="d-flex bd-highlight">
												<div class="user_info">
													<span>New order placed..</span>
													<p>10 Aug 2020</p>
												</div>
												<div class="ml-auto">
													<a href="javascript:void(0)" class="btn btn-primary btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
													<a href="javascript:void(0)" class="btn btn-warning btn-xs sharp"><i class="fa fa-trash"></i></a>
												</div>
											</div>
										</li>
										<li>
											<div class="d-flex bd-highlight">
												<div class="user_info">
													<span>Youtube, a video-sharing website..</span>
													<p>10 Aug 2020</p>
												</div>
												<div class="ml-auto">
													<a href="javascript:void(0)" class="btn btn-primary btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
													<a href="javascript:void(0)" class="btn btn-warning btn-xs sharp"><i class="fa fa-trash"></i></a>
												</div>
											</div>
										</li>
										<li>
											<div class="d-flex bd-highlight">
												<div class="user_info">
													<span>john just buy your product..</span>
													<p>10 Aug 2020</p>
												</div>
												<div class="ml-auto">
													<a href="javascript:void(0)" class="btn btn-primary btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
													<a href="javascript:void(0)" class="btn btn-warning btn-xs sharp"><i class="fa fa-trash"></i></a>
												</div>
											</div>
										</li>
										<li>
											<div class="d-flex bd-highlight">
												<div class="user_info">
													<span>Athan Jacoby</span>
													<p>10 Aug 2020</p>
												</div>
												<div class="ml-auto">
													<a href="javascript:void(0)" class="btn btn-primary btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
													<a href="javascript:void(0)" class="btn btn-warning btn-xs sharp"><i class="fa fa-trash"></i></a>
												</div>
											</div>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div> -->
			<!--**********************************
				Chat box End
			***********************************-->
			
			<!--**********************************
				Header start
			***********************************-->
			<div class="header">
				<div class="header-content">
					<nav class="navbar navbar-expand">
						<div class="collapse navbar-collapse justify-content-between">
							<div class="header-left">
								<div class="dashboard_bar">
									Bienvenido
								</div>
							</div>
							<ul class="navbar-nav header-right"></ul>
								<!-- <li class="nav-item">
									<div class="input-group search-area d-xl-inline-flex d-none">
										<div class="input-group-append">
											<span class="input-group-text"><a href="javascript:void(0)"><i class="flaticon-381-search-2"></i></a></span>
										</div>								
									</div>
								</li> -->
								<!-- <li class="nav-item dropdown notification_dropdown">
									<a class="nav-link  ai-icon" href="javascript:void(0)" role="button" data-toggle="dropdown">
										<svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M22.75 15.8385V13.0463C22.7471 10.8855 21.9385 8.80353 20.4821 7.20735C19.0258 5.61116 17.0264 4.61555 14.875 4.41516V2.625C14.875 2.39294 14.7828 2.17038 14.6187 2.00628C14.4546 1.84219 14.2321 1.75 14 1.75C13.7679 1.75 13.5454 1.84219 13.3813 2.00628C13.2172 2.17038 13.125 2.39294 13.125 2.625V4.41534C10.9736 4.61572 8.97429 5.61131 7.51794 7.20746C6.06159 8.80361 5.25291 10.8855 5.25 13.0463V15.8383C4.26257 16.0412 3.37529 16.5784 2.73774 17.3593C2.10019 18.1401 1.75134 19.1169 1.75 20.125C1.75076 20.821 2.02757 21.4882 2.51969 21.9803C3.01181 22.4724 3.67904 22.7492 4.375 22.75H9.71346C9.91521 23.738 10.452 24.6259 11.2331 25.2636C12.0142 25.9013 12.9916 26.2497 14 26.2497C15.0084 26.2497 15.9858 25.9013 16.7669 25.2636C17.548 24.6259 18.0848 23.738 18.2865 22.75H23.625C24.321 22.7492 24.9882 22.4724 25.4803 21.9803C25.9724 21.4882 26.2492 20.821 26.25 20.125C26.2486 19.117 25.8998 18.1402 25.2622 17.3594C24.6247 16.5786 23.7374 16.0414 22.75 15.8385ZM7 13.0463C7.00232 11.2113 7.73226 9.45223 9.02974 8.15474C10.3272 6.85726 12.0863 6.12732 13.9212 6.125H14.0788C15.9137 6.12732 17.6728 6.85726 18.9703 8.15474C20.2677 9.45223 20.9977 11.2113 21 13.0463V15.75H7V13.0463ZM14 24.5C13.4589 24.4983 12.9316 24.3292 12.4905 24.0159C12.0493 23.7026 11.716 23.2604 11.5363 22.75H16.4637C16.284 23.2604 15.9507 23.7026 15.5095 24.0159C15.0684 24.3292 14.5411 24.4983 14 24.5ZM23.625 21H4.375C4.14298 20.9999 3.9205 20.9076 3.75644 20.7436C3.59237 20.5795 3.50014 20.357 3.5 20.125C3.50076 19.429 3.77757 18.7618 4.26969 18.2697C4.76181 17.7776 5.42904 17.5008 6.125 17.5H21.875C22.571 17.5008 23.2382 17.7776 23.7303 18.2697C24.2224 18.7618 24.4992 19.429 24.5 20.125C24.4999 20.357 24.4076 20.5795 24.2436 20.7436C24.0795 20.9076 23.857 20.9999 23.625 21Z" fill="#FF9900"/>
										</svg>
										<div class="pulse-css"></div>
									</a>
									<div class="dropdown-menu rounded dropdown-menu-right">
										<div id="DZ_W_Notification1" class="widget-media dz-scroll p-3 height380">
											<ul class="timeline">										
												<li class="nav-item dropdown header-profile"> -->
													<a class="nav-link" href="javascript:void(0)" role="button" data-toggle="dropdown">
														<div class="header-info">
															<span style="color: #FF9900"><strong>Recepcionista</strong></span>
														</div>
													</a> 
													<div class="dropdown-menu dropdown-menu-right">
														<!-- <a href="../app-profile.html" class="dropdown-item ai-icon">
															<svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
															<span class="ml-2">Profile </span>
														</a>
														<a href="../email-inbox.html" class="dropdown-item ai-icon">
															<svg id="icon-inbox" xmlns="http://www.w3.org/2000/svg" class="text-success" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
															<span class="ml-2">Inbox </span>
														</a> -->
														<a href="../assets/php/Controlador/logoutController.php" class="dropdown-item ai-icon">
															<svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-warning" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
															<span class="ml-2">Cerrar Sesion </span>
														</a>
													</div>
												</li>
											</ul>
										</div>
									</nav>
								</div>
							</div>
			<!-- <li>
													<div class="timeline-panel">
														<div class="media mr-2">
															<img alt="image" width="50" src="images/avatar/1.jpg">
														</div>
														<div class="media-body">
															<h6 class="mb-1">Dr sultads Send you Photo</h6>
															<small class="d-block">29 July 2020 - 02:26 PM</small>
														</div>
													</div>
												</li> -->
												<!-- <li>
													<div class="timeline-panel">
														<div class="media mr-2 media-info">
															KG
														</div>
														<div class="media-body">
															<h6 class="mb-1">Resport created successfully</h6>
															<small class="d-block">29 July 2020 - 02:26 PM</small>
														</div>
													</div>
												</li>
												<li>
													<div class="timeline-panel">
														<div class="media mr-2 media-success">
															<i class="fa fa-home"></i>
														</div>
														<div class="media-body">
															<h6 class="mb-1">Reminder : Treatment Time!</h6>
															<small class="d-block">29 July 2020 - 02:26 PM</small>
														</div>
													</div>
												</li>
												 <li>
													<div class="timeline-panel">
														<div class="media mr-2">
															<img alt="image" width="50" src="images/avatar/1.jpg">
														</div>
														<div class="media-body">
															<h6 class="mb-1">Dr sultads Send you Photo</h6>
															<small class="d-block">29 July 2020 - 02:26 PM</small>
														</div>
													</div>
												</li>
												<li>
													<div class="timeline-panel">
														<div class="media mr-2 media-warning">
															KG
														</div> -->
														<!-- <div class="media-body">
															<h6 class="mb-1">Resport created successfully</h6>
															<small class="d-block">29 July 2020 - 02:26 PM</small>
														</div>
													</div>
												</li>
												<li>
													<div class="timeline-panel">
														<div class="media mr-2 media-primary">
															<i class="fa fa-home"></i>
														</div>
														<div class="media-body">
															<h6 class="mb-1">Reminder : Treatment Time!</h6>
															<small class="d-block">29 July 2020 - 02:26 PM</small>
														</div>
													</div>
												</li>
											</ul>
										</div>
										<a class="all-notification" href="javascript:void(0)">See all notifications <i class="ti-arrow-right"></i></a>
									</div>
								</li> -->
								<!-- <li class="nav-item dropdown notification_dropdown">
									<a class="nav-link bell bell-link" href="javascript:void(0)">
										<svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M22.4605 3.84888H5.31688C4.64748 3.84961 4.00571 4.11586 3.53237 4.58919C3.05903 5.06253 2.79279 5.7043 2.79205 6.3737V18.1562C2.79279 18.8256 3.05903 19.4674 3.53237 19.9407C4.00571 20.4141 4.64748 20.6803 5.31688 20.6811C5.54005 20.6812 5.75404 20.7699 5.91184 20.9277C6.06964 21.0855 6.15836 21.2995 6.15849 21.5227V23.3168C6.15849 23.6215 6.24118 23.9204 6.39774 24.1818C6.5543 24.4431 6.77886 24.6571 7.04747 24.8009C7.31608 24.9446 7.61867 25.0128 7.92298 24.9981C8.22729 24.9834 8.52189 24.8863 8.77539 24.7173L14.6173 20.8224C14.7554 20.7299 14.918 20.6807 15.0842 20.6811H19.187C19.7383 20.68 20.2743 20.4994 20.7137 20.1664C21.1531 19.8335 21.4721 19.3664 21.6222 18.8359L24.8966 7.05011C24.9999 6.67481 25.0152 6.28074 24.9414 5.89856C24.8675 5.51637 24.7064 5.15639 24.4707 4.84663C24.235 4.53687 23.931 4.28568 23.5823 4.11263C23.2336 3.93957 22.8497 3.84931 22.4605 3.84888ZM23.2733 6.60304L20.0006 18.3847C19.95 18.5614 19.8432 18.7168 19.6964 18.8275C19.5496 18.9381 19.3708 18.9979 19.187 18.9978H15.0842C14.5856 18.9972 14.0981 19.1448 13.6837 19.4219L7.84171 23.3168V21.5227C7.84097 20.8533 7.57473 20.2115 7.10139 19.7382C6.62805 19.2648 5.98628 18.9986 5.31688 18.9978C5.09371 18.9977 4.87972 18.909 4.72192 18.7512C4.56412 18.5934 4.4754 18.3794 4.47527 18.1562V6.3737C4.4754 6.15054 4.56412 5.93655 4.72192 5.77874C4.87972 5.62094 5.09371 5.53223 5.31688 5.5321H22.4605C22.5905 5.53243 22.7188 5.56277 22.8353 5.62076C22.9517 5.67875 23.0532 5.76283 23.1318 5.86646C23.2105 5.97008 23.2642 6.09045 23.2887 6.21821C23.3132 6.34597 23.308 6.47766 23.2733 6.60304Z" fill="#FF9900"/>
											<path d="M7.84173 11.4233H12.0498C12.273 11.4233 12.4871 11.3347 12.6449 11.1768C12.8027 11.019 12.8914 10.8049 12.8914 10.5817C12.8914 10.3585 12.8027 10.1444 12.6449 9.98661C12.4871 9.82878 12.273 9.74011 12.0498 9.74011H7.84173C7.61852 9.74011 7.40446 9.82878 7.24662 9.98661C7.08879 10.1444 7.00012 10.3585 7.00012 10.5817C7.00012 10.8049 7.08879 11.019 7.24662 11.1768C7.40446 11.3347 7.61852 11.4233 7.84173 11.4233Z" fill="#FF9900"/>
											<path d="M15.4162 13.1066H7.84173C7.61852 13.1066 7.40446 13.1952 7.24662 13.3531C7.08879 13.5109 7.00012 13.725 7.00012 13.9482C7.00012 14.1714 7.08879 14.3855 7.24662 14.5433C7.40446 14.7011 7.61852 14.7898 7.84173 14.7898H15.4162C15.6394 14.7898 15.8535 14.7011 16.0113 14.5433C16.1692 14.3855 16.2578 14.1714 16.2578 13.9482C16.2578 13.725 16.1692 13.5109 16.0113 13.3531C15.8535 13.1952 15.6394 13.1066 15.4162 13.1066Z" fill="#FF9900"/>
										</svg>
										<div class="pulse-css"></div>
									</a>
								</li>
								<li class="nav-item dropdown notification_dropdown">
									<a class="nav-link" href="javascript:void(0)" data-toggle="dropdown">
										<svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M23.625 6.12506H22.75V2.62506C22.75 2.47268 22.7102 2.32295 22.6345 2.19068C22.5589 2.05841 22.45 1.94819 22.3186 1.87093C22.1873 1.79367 22.0381 1.75205 21.8857 1.75019C21.7333 1.74832 21.5831 1.78629 21.4499 1.86031L14 5.99915L6.55007 1.86031C6.41688 1.78629 6.26667 1.74832 6.11431 1.75019C5.96194 1.75205 5.8127 1.79367 5.68136 1.87093C5.55002 1.94819 5.44113 2.05841 5.36547 2.19068C5.28981 2.32295 5.25001 2.47268 5.25 2.62506V6.12506H4.375C3.67904 6.12582 3.01181 6.40263 2.51969 6.89475C2.02757 7.38687 1.75076 8.0541 1.75 8.75006V11.3751C1.75076 12.071 2.02757 12.7383 2.51969 13.2304C3.01181 13.7225 3.67904 13.9993 4.375 14.0001H5.25V23.6251C5.25076 24.321 5.52757 24.9882 6.01969 25.4804C6.51181 25.9725 7.17904 26.2493 7.875 26.2501H20.125C20.821 26.2493 21.4882 25.9725 21.9803 25.4804C22.4724 24.9882 22.7492 24.321 22.75 23.6251V14.0001H23.625C24.321 13.9993 24.9882 13.7225 25.4803 13.2304C25.9724 12.7383 26.2492 12.071 26.25 11.3751V8.75006C26.2492 8.0541 25.9724 7.38687 25.4803 6.89475C24.9882 6.40263 24.321 6.12582 23.625 6.12506ZM21 6.12506H17.3769L21 4.11256V6.12506ZM7 4.11256L10.6231 6.12506H7V4.11256ZM7 23.6251V14.0001H13.125V24.5001H7.875C7.64303 24.4998 7.42064 24.4075 7.25661 24.2434C7.09258 24.0794 7.0003 23.857 7 23.6251ZM21 23.6251C20.9997 23.857 20.9074 24.0794 20.7434 24.2434C20.5794 24.4075 20.357 24.4998 20.125 24.5001H14.875V14.0001H21V23.6251ZM24.5 11.3751C24.4997 11.607 24.4074 11.8294 24.2434 11.9934C24.0794 12.1575 23.857 12.2498 23.625 12.2501H4.375C4.14303 12.2498 3.92064 12.1575 3.75661 11.9934C3.59258 11.8294 3.5003 11.607 3.5 11.3751V8.75006C3.5003 8.51809 3.59258 8.2957 3.75661 8.13167C3.92064 7.96764 4.14303 7.87536 4.375 7.87506H23.625C23.857 7.87536 24.0794 7.96764 24.2434 8.13167C24.4074 8.2957 24.4997 8.51809 24.5 8.75006V11.3751Z" fill="#FF9900"/>
										</svg>
										<div class="pulse-css"></div>
									</a>
									<div class="dropdown-menu dropdown-menu-right rounded">
										<div id="DZ_W_TimeLine11Home" class="widget-timeline dz-scroll style-1 p-3 height370 ps ps--active-y">
											<ul class="timeline">
												<li>
													<div class="timeline-badge primary"></div>
													<a class="timeline-panel text-muted" href="#">
														<span>10 minutes ago</span>
														<h6 class="mb-0">Youtube, a video-sharing website, goes live <strong class="text-primary">$500</strong>.</h6>
													</a>
												</li>
												<li>
													<div class="timeline-badge info">
													</div>
													<a class="timeline-panel text-muted" href="#">
														<span>20 minutes ago</span>
														<h6 class="mb-0">New order placed <strong class="text-info">#XF-2356.</strong></h6>
														<p class="mb-0">Quisque a consequat ante Sit amet magna at volutapt...</p>
													</a>
												</li>
												<li>
													<div class="timeline-badge danger">
													</div>
													<a class="timeline-panel text-muted" href="#">
														<span>30 minutes ago</span>
														<h6 class="mb-0">john just buy your product <strong class="text-warning">Sell $250</strong></h6>
													</a>
												</li>
												<li>
													<div class="timeline-badge success">
													</div>
													<a class="timeline-panel text-muted" href="#">
														<span>15 minutes ago</span>
														<h6 class="mb-0">StumbleUpon is acquired by eBay. </h6>
													</a>
												</li>
												<li>
													<div class="timeline-badge warning">
													</div>
													<a class="timeline-panel text-muted" href="#">
														<span>20 minutes ago</span>
														<h6 class="mb-0">Mashable, a news website and blog, goes live.</h6>
													</a>
												</li>
												<li>
													<div class="timeline-badge dark">
													</div>
													<a class="timeline-panel text-muted" href="#">
														<span>20 minutes ago</span>
														<h6 class="mb-0">Mashable, a news website and blog, goes live.</h6>
													</a>
												</li>
											</ul>
										</div>
									</div>
								</li> -->
			<!--**********************************
				Header end ti-comment-alt
			***********************************-->
	
			<!--**********************************
				Sidebar start
			***********************************-->
			<div class="deznav">
				<div class="deznav-scroll">
					<ul class="metismenu" id="menu">
						<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
								<i class="flaticon-381-news"></i>
								<span class="nav-text">Inicio</span>
							</a>
							<ul aria-expanded="false">
								<li><a href="inicioRecepcionista.php">Bienvenido</a></li>
								
							</ul>
						</li>
						<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="fa fa-money"></i>
								<span class="nav-text">Pagos</span>
							</a>
							<ul aria-expanded="false">
								<li><a href="ConsultarPagos.php">Consultar pagos</a></li>
								
								</li>
					 
								</li>
							</ul>
						</li>
						<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
								<i class="flaticon-381-user-9"></i>
								<span class="nav-text">Instructores</span>
							</a>
							<ul aria-expanded="false">
								<li><a href="RegistrarInstructor.php">Registrar Instructor</a></li>
								<li><a href="mostrarInstructores.php">Mostrar instructores</a></li>
								<li><a href="mostrarInstructores2.php">Habilitar instructores</a></li>
								
							</ul>
						</li>
						<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-381-user-9"></i>
								<span class="nav-text">Clientes </span>
							</a>
							<ul aria-expanded="false">
								<li><a href="mostrarClientes.php">Mostrar Clientes</a></li>
								<li><a href="mostrarClientes1.php">Ficha y Suscripcion</a></li>
								<li><a href="mostrarClientes2.php">Habilitar clientes</a></li>
								
	
							</ul>
						</li>
						<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-381-notepad"></i>
								<span class="nav-text">Asistencias</span>
							</a>
							<ul aria-expanded="false">
								<li><a href="registroAsistencias.php">Registrar Asistencias</a></li>
								<li><a href="Asistencias.php">Mostrar Asistencias</a></li>
								
							</ul>
						</li>
						<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-381-calendar-7"></i>
							<span class="nav-text">Agenda</span>
						</a>
						<ul aria-expanded="false">
							<li><a href="ConsultarAgendaClientes.php">Consultar Agenda Clientes</a></li>
							<li><a href="mostrarInstructores3.php">Agendar Programacion Instructores</a></li>
							
						</ul>
					</li>
						<!-- <li><a href="widget-basic.html" class="ai-icon" aria-expanded="false">
								<i class="flaticon-381-settings-2"></i>
								<span class="nav-text">Widget</span>
							</a>
						</li>
						<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
								<i class="flaticon-381-notepad"></i>
								<span class="nav-text">Forms</span>
							</a>
							<ul aria-expanded="false">
								<li><a href="../form-element.html">Form Elements</a></li>
								<li><a href="../form-wizard.html">Wizard</a></li>
								<li><a href="../form-editor-summernote.html">Summernote</a></li>
								<li><a href="form-pickers.html">Pickers</a></li>
								<li><a href="form-validation-jquery.html">Jquery Validate</a></li>
							</ul>
						</li>
						<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
								<i class="fa fa-money"></i>
								<span class="nav-text">Table</span>
							</a>
							<ul aria-expanded="false">
								<li><a href="table-bootstrap-basic.html">Bootstrap</a></li>
								<li><a href="table-datatable-basic.html">Datatable</a></li>
							</ul>
						</li>
						<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
								<i class="flaticon-381-layer-1"></i>
								<span class="nav-text">Pages</span>
							</a> -->
							<!-- <ul aria-expanded="false">
								<li><a href="../page-register.html">Register</a></li>
								<li><a href="../page-login.html">Login</a></li>
								<li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Error</a>
									<ul aria-expanded="false">
										<li><a href="../page-error-400.html">Error 400</a></li>
										<li><a href="../page-error-403.html">Error 403</a></li>
										<li><a href="../page-error-404.html">Error 404</a></li>
										<li><a href="../page-error-500.html">Error 500</a></li>
										<li><a href="../page-error-503.html">Error 503</a></li>
									</ul>
								</li>
								<li><a href="../page-lock-screen.html">Lock Screen</a></li>
							</ul>
						</li>
					</ul>
					<div class="add-menu-sidebar">
						<img src="images/calendar.png" alt="" class="mr-3">
						<p class="	font-w500 mb-0">Create Workout Plan Now</p>
					</div> -->
					<div class="copyright">
						<p><strong>TrainGym</strong> © 2021 </p>
						<!-- <p>Made with <span class="heart"></span> by DexignZone</p> -->
					</div>
				</div>
			</div>
			<!--**********************************
				Sidebar end
			***********************************-->
			
			<!--**********************************
				Content body start
			***********************************-->
			<div class="content-body">
				<!-- row -->
				<div class="container-fluid">
					<div class="row">
						<div class="col-xl-12 col-xxl-12">
							<div class="row">
							<div class="col-sm-3">
									<div class="card avtivity-card">
									<a href="ConsultarPagos.php"><div class="card-body">
											<div>
												<center><span class="activity-icon" >
												<i class="fa fa-money" style="font-size: 40px;margin-top: 20px;" ></i>		
												</span></center>
												
												<div class="media-body">
													<strong><p  style="font-size:25px;text-align: center;">Pagos</p></strong>
												</div>
											</div>
											<!-- <svg width="40" height="39" viewBox="0 0 40 39" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M18.0977 7.90402L9.78535 16.7845C9.17929 17.6683 9.40656 18.872 10.2862 19.4738L18.6574 25.2104V30.787C18.6574 31.8476 19.4992 32.7357 20.5598 32.7568C21.6456 32.7735 22.5295 31.9023 22.5295 30.8207V24.1961C22.5295 23.5564 22.2138 22.9588 21.6877 22.601L16.3174 18.9184L20.8376 14.1246L23.1524 19.3982C23.4596 20.101 24.1582 20.5556 24.9243 20.5556H31.974C33.0346 20.5556 33.9226 19.7139 33.9437 18.6532C33.9605 17.5674 33.0893 16.6835 32.0076 16.6835H26.1953C25.4293 14.9411 24.6128 13.2155 23.9015 11.4478C23.5395 10.5556 23.3376 10.1684 22.6726 9.55389C22.5379 9.42763 21.5993 8.56904 20.7618 7.80305C19.9916 7.10435 18.8047 7.15065 18.0977 7.90402Z" fill="#FF3282"/>
														<path d="M26.0269 8.87206C28.4769 8.87206 30.463 6.88598 30.463 4.43603C30.463 1.98608 28.4769 0 26.0269 0C23.577 0 21.5909 1.98608 21.5909 4.43603C21.5909 6.88598 23.577 8.87206 26.0269 8.87206Z" fill="#FF3282"/>
														<path d="M8.16498 38.388C12.6744 38.388 16.33 34.7325 16.33 30.2231C16.33 25.7137 12.6744 22.0581 8.16498 22.0581C3.65559 22.0581 0 25.7137 0 30.2231C0 34.7325 3.65559 38.388 8.16498 38.388Z" fill="#FF3282"/>
														<path d="M31.835 38.388C36.3444 38.388 40 34.7325 40 30.2231C40 25.7137 36.3444 22.0581 31.835 22.0581C27.3256 22.0581 23.67 25.7137 23.67 30.2231C23.67 34.7325 27.3256 38.388 31.835 38.388Z" fill="#FF3282"/>
													</svg> -->
											<div class="progress" style="height:5px;">
												<div class="progress-bar bg-warning" style="width: 90%; height:5px;" role="progressbar">
												
												</div>
											</div>
										</div>
										<div class="effect bg-warning"></div>
									</div>
								</div></a>
								<div class="col-sm-3">
									<div class="card avtivity-card">
									<a href="mostrarInstructores.php"><div class="card-body">
											<div>
												<center><span class="activity-icon" >
												<i class="flaticon-381-user-9"style="font-size: 40px;margin-top: 20px;"></i>
												<!-- <i class="fa fa-money"  ></i>		 -->
												</span></center>
												
												<div class="media-body">
													<strong><p  style="font-size:25px;text-align: center;">Instructores</p></strong>
												</div>
											</div>
											<!-- <svg width="40" height="39" viewBox="0 0 40 39" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M18.0977 7.90402L9.78535 16.7845C9.17929 17.6683 9.40656 18.872 10.2862 19.4738L18.6574 25.2104V30.787C18.6574 31.8476 19.4992 32.7357 20.5598 32.7568C21.6456 32.7735 22.5295 31.9023 22.5295 30.8207V24.1961C22.5295 23.5564 22.2138 22.9588 21.6877 22.601L16.3174 18.9184L20.8376 14.1246L23.1524 19.3982C23.4596 20.101 24.1582 20.5556 24.9243 20.5556H31.974C33.0346 20.5556 33.9226 19.7139 33.9437 18.6532C33.9605 17.5674 33.0893 16.6835 32.0076 16.6835H26.1953C25.4293 14.9411 24.6128 13.2155 23.9015 11.4478C23.5395 10.5556 23.3376 10.1684 22.6726 9.55389C22.5379 9.42763 21.5993 8.56904 20.7618 7.80305C19.9916 7.10435 18.8047 7.15065 18.0977 7.90402Z" fill="#FF3282"/>
														<path d="M26.0269 8.87206C28.4769 8.87206 30.463 6.88598 30.463 4.43603C30.463 1.98608 28.4769 0 26.0269 0C23.577 0 21.5909 1.98608 21.5909 4.43603C21.5909 6.88598 23.577 8.87206 26.0269 8.87206Z" fill="#FF3282"/>
														<path d="M8.16498 38.388C12.6744 38.388 16.33 34.7325 16.33 30.2231C16.33 25.7137 12.6744 22.0581 8.16498 22.0581C3.65559 22.0581 0 25.7137 0 30.2231C0 34.7325 3.65559 38.388 8.16498 38.388Z" fill="#FF3282"/>
														<path d="M31.835 38.388C36.3444 38.388 40 34.7325 40 30.2231C40 25.7137 36.3444 22.0581 31.835 22.0581C27.3256 22.0581 23.67 25.7137 23.67 30.2231C23.67 34.7325 27.3256 38.388 31.835 38.388Z" fill="#FF3282"/>
													</svg> -->
											<div class="progress" style="height:5px;">
												<div class="progress-bar bg-Color1" style="width: 90%; height:5px;" role="progressbar">
												
												</div>
											</div>
										</div>
										<div class="effect bg-Color1"></div>
									</div>
								</div></a>
								<div class="col-sm-3">
									<div class="card avtivity-card">
									<a href="mostrarClientes.php"><div class="card-body">
											<div>
												<center><span class="activity-icon" >
												<i class="flaticon-381-user-9" style="font-size: 40px;margin-top: 20px;" ></i>		
												</span></center>
												
												<div class="media-body">
													<strong><p  style="font-size:25px;text-align: center;">Clientes</p></strong>
												</div>
											</div>
											<!-- <svg width="40" height="39" viewBox="0 0 40 39" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M18.0977 7.90402L9.78535 16.7845C9.17929 17.6683 9.40656 18.872 10.2862 19.4738L18.6574 25.2104V30.787C18.6574 31.8476 19.4992 32.7357 20.5598 32.7568C21.6456 32.7735 22.5295 31.9023 22.5295 30.8207V24.1961C22.5295 23.5564 22.2138 22.9588 21.6877 22.601L16.3174 18.9184L20.8376 14.1246L23.1524 19.3982C23.4596 20.101 24.1582 20.5556 24.9243 20.5556H31.974C33.0346 20.5556 33.9226 19.7139 33.9437 18.6532C33.9605 17.5674 33.0893 16.6835 32.0076 16.6835H26.1953C25.4293 14.9411 24.6128 13.2155 23.9015 11.4478C23.5395 10.5556 23.3376 10.1684 22.6726 9.55389C22.5379 9.42763 21.5993 8.56904 20.7618 7.80305C19.9916 7.10435 18.8047 7.15065 18.0977 7.90402Z" fill="#FF3282"/>
														<path d="M26.0269 8.87206C28.4769 8.87206 30.463 6.88598 30.463 4.43603C30.463 1.98608 28.4769 0 26.0269 0C23.577 0 21.5909 1.98608 21.5909 4.43603C21.5909 6.88598 23.577 8.87206 26.0269 8.87206Z" fill="#FF3282"/>
														<path d="M8.16498 38.388C12.6744 38.388 16.33 34.7325 16.33 30.2231C16.33 25.7137 12.6744 22.0581 8.16498 22.0581C3.65559 22.0581 0 25.7137 0 30.2231C0 34.7325 3.65559 38.388 8.16498 38.388Z" fill="#FF3282"/>
														<path d="M31.835 38.388C36.3444 38.388 40 34.7325 40 30.2231C40 25.7137 36.3444 22.0581 31.835 22.0581C27.3256 22.0581 23.67 25.7137 23.67 30.2231C23.67 34.7325 27.3256 38.388 31.835 38.388Z" fill="#FF3282"/>
													</svg> -->
											<div class="progress" style="height:5px;">
												<div class="progress-bar bg-warning" style="width: 90%; height:5px;" role="progressbar">
												
												</div>
											</div>
										</div>
										<div class="effect bg-warning" ></div>
									</div>
								</div></a>
								<div class="col-sm-3">
									<div class="card avtivity-card">
										<a href="Asistencias.php"><div class="card-body">
											<div>
												<center><span class="activity-icon" >
												<i class="flaticon-381-notepad" style="font-size: 40px;margin-top: 20px;" ></i>		
												</span></center>
												
												<div class="media-body">
													<strong><p  style="font-size:25px;text-align: center;">Asistencias</p></strong>
												</div>
											</div>
											<!-- <svg width="40" height="39" viewBox="0 0 40 39" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M18.0977 7.90402L9.78535 16.7845C9.17929 17.6683 9.40656 18.872 10.2862 19.4738L18.6574 25.2104V30.787C18.6574 31.8476 19.4992 32.7357 20.5598 32.7568C21.6456 32.7735 22.5295 31.9023 22.5295 30.8207V24.1961C22.5295 23.5564 22.2138 22.9588 21.6877 22.601L16.3174 18.9184L20.8376 14.1246L23.1524 19.3982C23.4596 20.101 24.1582 20.5556 24.9243 20.5556H31.974C33.0346 20.5556 33.9226 19.7139 33.9437 18.6532C33.9605 17.5674 33.0893 16.6835 32.0076 16.6835H26.1953C25.4293 14.9411 24.6128 13.2155 23.9015 11.4478C23.5395 10.5556 23.3376 10.1684 22.6726 9.55389C22.5379 9.42763 21.5993 8.56904 20.7618 7.80305C19.9916 7.10435 18.8047 7.15065 18.0977 7.90402Z" fill="#FF3282"/>
														<path d="M26.0269 8.87206C28.4769 8.87206 30.463 6.88598 30.463 4.43603C30.463 1.98608 28.4769 0 26.0269 0C23.577 0 21.5909 1.98608 21.5909 4.43603C21.5909 6.88598 23.577 8.87206 26.0269 8.87206Z" fill="#FF3282"/>
														<path d="M8.16498 38.388C12.6744 38.388 16.33 34.7325 16.33 30.2231C16.33 25.7137 12.6744 22.0581 8.16498 22.0581C3.65559 22.0581 0 25.7137 0 30.2231C0 34.7325 3.65559 38.388 8.16498 38.388Z" fill="#FF3282"/>
														<path d="M31.835 38.388C36.3444 38.388 40 34.7325 40 30.2231C40 25.7137 36.3444 22.0581 31.835 22.0581C27.3256 22.0581 23.67 25.7137 23.67 30.2231C23.67 34.7325 27.3256 38.388 31.835 38.388Z" fill="#FF3282"/>
													</svg> -->
											<div class="progress" style="height:5px;">
												<div class="progress-bar bg-Color1" style="width: 90%; height:5px;" role="progressbar">
												
												</div>
											</div>
										</div>
										<div class="effect bg-Color1"></div>
									</div>
								</div></a>
						<div class="col-xxl-12 col-xxl-12">
							<div class="card">
								<div class="card-header d-sm-flex d-block pb-0 border-0">
									<div class="mr-auto pr-3 mb-sm-0 mb-3">
										<h4 class="text-black fs-20">Pagos</h4>
										<p class="fs-13 mb-0 text-black">Control de los pagos del año</p>
									</div>
									<div class="dropdown mb-3 show">
										<!-- <button type="button" class="btn rounded btn-light" data-toggle="dropdown" aria-expanded="true">
											<svg class="mr-2" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<g clip-path="url(#clip5)"> -->
												<path d="M0.988957 17.0741C0.328275 17.2007 -0.104585 17.8386 0.0219823 18.4993C0.133362 19.0815 0.644694 19.4865 1.21678 19.4865C1.29272 19.4865 1.37119 19.4789 1.44713 19.4637L6.4592 18.5018C6.74524 18.4461 7.00091 18.2917 7.18316 18.0639L9.33481 15.3503L8.61593 14.9832C8.08435 14.7149 7.71475 14.2289 7.58818 13.6391L5.55804 16.1983L0.988957 17.0741Z" fill="#A02CFA"/>
												<path d="M18.84 6.49306C20.3135 6.49306 21.508 5.29854 21.508 3.82502C21.508 2.3515 20.3135 1.15698 18.84 1.15698C17.3665 1.15698 16.1719 2.3515 16.1719 3.82502C16.1719 5.29854 17.3665 6.49306 18.84 6.49306Z" fill="#A02CFA"/>
												<path d="M13.0179 3.15677C12.7369 2.86819 12.4762 2.75428 12.1902 2.75428C12.0864 2.75428 11.9826 2.76947 11.8712 2.79479L7.29203 3.88073C6.6592 4.03008 6.26937 4.66545 6.41872 5.29576C6.54782 5.83746 7.02877 6.20198 7.56289 6.20198C7.65404 6.20198 7.74514 6.19185 7.8363 6.16907L11.7371 5.24513C11.9902 5.52611 13.2584 6.90063 13.4888 7.14364C11.8763 8.87002 10.2639 10.5939 8.65137 12.3202C8.62605 12.3481 8.60329 12.3759 8.58049 12.4038C8.10966 13.0037 8.25397 13.9454 8.96275 14.3023L13.9064 16.826L11.3397 20.985C10.9878 21.5571 11.165 22.3064 11.7371 22.6608C11.9371 22.7848 12.1573 22.843 12.375 22.843C12.7825 22.843 13.1824 22.638 13.4128 22.2659L16.6732 16.983C16.8529 16.6919 16.901 16.34 16.8074 16.0135C16.7137 15.6844 16.4884 15.411 16.1821 15.2566L12.8331 13.553L16.3543 9.78636L19.0122 12.0393C19.2324 12.2266 19.5032 12.3177 19.7716 12.3177C20.0601 12.3177 20.3487 12.2114 20.574 12.0038L23.6243 9.16112C24.1002 8.71814 24.128 7.97392 23.685 7.49803C23.4521 7.24996 23.1383 7.12339 22.8244 7.12339C22.5383 7.12339 22.2497 7.22717 22.0245 7.43727L19.7412 9.56107C19.7386 9.56361 14.0178 4.18196 13.0179 3.15677Z" fill="#A02CFA"/>
												</g>
												<defs>
												<clipPath id="clip5">
												<rect width="24" height="24" fill="white"/>
												</clipPath>
												</defs>
											</svg>
											<!-- Running
											<svg class="ml-2" width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M1 0.999999L7 7L13 1" stroke="#FF9900" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
											</svg>
										</button>
										<div class="dropdown-menu dropdown-menu-right">
											<a class="dropdown-item" href="javascript:void(0);">Edit</a>
											<a class="dropdown-item" href="javascript:void(0);">Delete</a>
										</div> -->
									</div>
								</div>
								<div class="card-body pt-0 pb-0">
									<div id="chartBar"></div>
								</div>
							</div>
						</div>
						<!-- <div class="col-xl-9 col-xxl-8">
							<div class="row">
								<div class="col-xl-12">	
									<div class="card">
										<div class="card-header d-sm-flex d-block pb-0 border-0">
											<div class="mr-auto pr-3">
												<h4 class="text-black font-w600 fs-20">Recomended Trainer for You</h4>
												<p class="fs-13 mb-0 text-black">Lorem ipsum dolor sit amet, consectetur</p>
											</div>
											<a href="food-menu.html" class="btn btn-primary rounded d-none d-md-block">View More</a>
										</div>
										<div class="card-body pt-2">
											<div class="testimonial-one owl-carousel">
												<div class="items">
													<div class="card text-center">
														<div class="card-body">
															<img src="images/testimonial/1.jpg" alt="">
															<h5 class="fs-16 font-w500 mb-1"><a href="app-profile.html" class="text-black">Roberto Carloz</a></h5>
															<p class="fs-14">Body Building Trainer</p> -->
															<!-- <div class="d-flex align-items-center justify-content-center">
																<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<path d="M5.09569 20C4.80437 19.9988 4.51677 19.9344 4.25273 19.8113C3.98868 19.6881 3.75447 19.5091 3.56624 19.2866C3.37801 19.0641 3.24024 18.8034 3.16243 18.5225C3.08462 18.2415 3.06862 17.9471 3.11554 17.6593L3.88905 12.8902L0.569441 9.45986C0.312024 9.19466 0.132451 8.86374 0.0503661 8.50328C-0.0317185 8.14282 -0.0131526 7.76671 0.104033 7.4161C0.221219 7.06549 0.43251 6.75388 0.714792 6.51537C0.997074 6.27685 1.33947 6.12062 1.70453 6.06376L6.20048 5.37325L8.18158 1.13817C8.34755 0.796915 8.60606 0.509234 8.92762 0.307978C9.24917 0.106721 9.6208 0 10.0001 0C10.3793 0 10.751 0.106721 11.0725 0.307978C11.3941 0.509234 11.6526 0.796915 11.8186 1.13817L13.7931 5.36719L18.2955 6.06376C18.6606 6.12062 19.003 6.27685 19.2852 6.51537C19.5675 6.75388 19.7788 7.06549 19.896 7.4161C20.0132 7.76671 20.0318 8.14282 19.9497 8.50328C19.8676 8.86374 19.688 9.19466 19.4306 9.45986L16.1144 12.8765L16.885 17.66C16.9463 18.0327 16.9014 18.4152 16.7556 18.7635C16.6097 19.1119 16.3687 19.4121 16.0602 19.6297C15.7517 19.8473 15.3882 19.9735 15.0113 19.994C14.6344 20.0144 14.2593 19.9281 13.9292 19.7451L10.0026 17.5635L6.07117 19.7451C5.77302 19.9118 5.43724 19.9996 5.09569 20Z" fill="#FFAA29"/>
																</svg>
																<span class="fs-14 d-block ml-2 pr-2 mr-2 border-right text-black font-w500">4.4</span>
																<a href="app-profile.html" class="btn-link fs-14">Send Request</a>
															</div>
														</div>
													</div>
												</div>
												<div class="items">
													<div class="card text-center">
														<div class="card-body">
															<img src="images/testimonial/2.jpg" alt="">
															<h5 class="fs-16 font-w500 mb-1"><a href="app-profile.html" class="text-black">Cindy Moss</a></h5>
															<p class="fs-14">Fat Belly Trainer</p>
															<div class="d-flex align-items-center justify-content-center">
																<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<path d="M5.09569 20C4.80437 19.9988 4.51677 19.9344 4.25273 19.8113C3.98868 19.6881 3.75447 19.5091 3.56624 19.2866C3.37801 19.0641 3.24024 18.8034 3.16243 18.5225C3.08462 18.2415 3.06862 17.9471 3.11554 17.6593L3.88905 12.8902L0.569441 9.45986C0.312024 9.19466 0.132451 8.86374 0.0503661 8.50328C-0.0317185 8.14282 -0.0131526 7.76671 0.104033 7.4161C0.221219 7.06549 0.43251 6.75388 0.714792 6.51537C0.997074 6.27685 1.33947 6.12062 1.70453 6.06376L6.20048 5.37325L8.18158 1.13817C8.34755 0.796915 8.60606 0.509234 8.92762 0.307978C9.24917 0.106721 9.6208 0 10.0001 0C10.3793 0 10.751 0.106721 11.0725 0.307978C11.3941 0.509234 11.6526 0.796915 11.8186 1.13817L13.7931 5.36719L18.2955 6.06376C18.6606 6.12062 19.003 6.27685 19.2852 6.51537C19.5675 6.75388 19.7788 7.06549 19.896 7.4161C20.0132 7.76671 20.0318 8.14282 19.9497 8.50328C19.8676 8.86374 19.688 9.19466 19.4306 9.45986L16.1144 12.8765L16.885 17.66C16.9463 18.0327 16.9014 18.4152 16.7556 18.7635C16.6097 19.1119 16.3687 19.4121 16.0602 19.6297C15.7517 19.8473 15.3882 19.9735 15.0113 19.994C14.6344 20.0144 14.2593 19.9281 13.9292 19.7451L10.0026 17.5635L6.07117 19.7451C5.77302 19.9118 5.43724 19.9996 5.09569 20Z" fill="#FFAA29"/>
																</svg>
																<span class="fs-14 d-block ml-2 pr-2 mr-2 border-right text-black font-w500">4.4</span>
																<a href="app-profile.html" class="btn-link fs-14">Send Request</a>
															</div>
														</div>
													</div>
												</div>
												<div class="items">
													<div class="card text-center">
														<div class="card-body">
															<img src="images/testimonial/3.jpg" alt="">
															<h5 class="fs-16 font-w500 mb-1"><a href="app-profile.html" class="text-black">Ivankov Smurz</a></h5>
															<p class="fs-14">Sixpack Builder</p>
															<div class="d-flex align-items-center justify-content-center">
																<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<path d="M5.09569 20C4.80437 19.9988 4.51677 19.9344 4.25273 19.8113C3.98868 19.6881 3.75447 19.5091 3.56624 19.2866C3.37801 19.0641 3.24024 18.8034 3.16243 18.5225C3.08462 18.2415 3.06862 17.9471 3.11554 17.6593L3.88905 12.8902L0.569441 9.45986C0.312024 9.19466 0.132451 8.86374 0.0503661 8.50328C-0.0317185 8.14282 -0.0131526 7.76671 0.104033 7.4161C0.221219 7.06549 0.43251 6.75388 0.714792 6.51537C0.997074 6.27685 1.33947 6.12062 1.70453 6.06376L6.20048 5.37325L8.18158 1.13817C8.34755 0.796915 8.60606 0.509234 8.92762 0.307978C9.24917 0.106721 9.6208 0 10.0001 0C10.3793 0 10.751 0.106721 11.0725 0.307978C11.3941 0.509234 11.6526 0.796915 11.8186 1.13817L13.7931 5.36719L18.2955 6.06376C18.6606 6.12062 19.003 6.27685 19.2852 6.51537C19.5675 6.75388 19.7788 7.06549 19.896 7.4161C20.0132 7.76671 20.0318 8.14282 19.9497 8.50328C19.8676 8.86374 19.688 9.19466 19.4306 9.45986L16.1144 12.8765L16.885 17.66C16.9463 18.0327 16.9014 18.4152 16.7556 18.7635C16.6097 19.1119 16.3687 19.4121 16.0602 19.6297C15.7517 19.8473 15.3882 19.9735 15.0113 19.994C14.6344 20.0144 14.2593 19.9281 13.9292 19.7451L10.0026 17.5635L6.07117 19.7451C5.77302 19.9118 5.43724 19.9996 5.09569 20Z" fill="#FFAA29"/>
																</svg>
																<span class="fs-14 d-block ml-2 pr-2 mr-2 border-right text-black font-w500">4.4</span>
																<a href="javascript:void(0)" class="btn-link fs-14">Send Request</a>
															</div>
														</div>
													</div>
												</div>
												<div class="items">
													<div class="card text-center">
														<div class="card-body">
															<img src="images/testimonial/4.jpg" alt="">
															<h5 class="fs-16 font-w500 mb-1"><a href="app-profile.html" class="text-black">Louis Simatupang</a></h5>
															<p class="fs-14">Body Building Trainer</p>
															<div class="d-flex align-items-center justify-content-center">
																<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<path d="M5.09569 20C4.80437 19.9988 4.51677 19.9344 4.25273 19.8113C3.98868 19.6881 3.75447 19.5091 3.56624 19.2866C3.37801 19.0641 3.24024 18.8034 3.16243 18.5225C3.08462 18.2415 3.06862 17.9471 3.11554 17.6593L3.88905 12.8902L0.569441 9.45986C0.312024 9.19466 0.132451 8.86374 0.0503661 8.50328C-0.0317185 8.14282 -0.0131526 7.76671 0.104033 7.4161C0.221219 7.06549 0.43251 6.75388 0.714792 6.51537C0.997074 6.27685 1.33947 6.12062 1.70453 6.06376L6.20048 5.37325L8.18158 1.13817C8.34755 0.796915 8.60606 0.509234 8.92762 0.307978C9.24917 0.106721 9.6208 0 10.0001 0C10.3793 0 10.751 0.106721 11.0725 0.307978C11.3941 0.509234 11.6526 0.796915 11.8186 1.13817L13.7931 5.36719L18.2955 6.06376C18.6606 6.12062 19.003 6.27685 19.2852 6.51537C19.5675 6.75388 19.7788 7.06549 19.896 7.4161C20.0132 7.76671 20.0318 8.14282 19.9497 8.50328C19.8676 8.86374 19.688 9.19466 19.4306 9.45986L16.1144 12.8765L16.885 17.66C16.9463 18.0327 16.9014 18.4152 16.7556 18.7635C16.6097 19.1119 16.3687 19.4121 16.0602 19.6297C15.7517 19.8473 15.3882 19.9735 15.0113 19.994C14.6344 20.0144 14.2593 19.9281 13.9292 19.7451L10.0026 17.5635L6.07117 19.7451C5.77302 19.9118 5.43724 19.9996 5.09569 20Z" fill="#FFAA29"/>
																</svg>
																<span class="fs-14 d-block ml-2 pr-2 mr-2 border-right text-black font-w500">4.4</span>
																<a href="app-profile.html" class="btn-link fs-14">Send Request</a>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div> -->
								<div class="col-xl-12">	
									<div class="card">
										<div class="card-header d-sm-flex d-block pb-0 border-0">
											<div class="mr-auto pr-3">
												<h4 class="text-black fs-20 font-w600">Asistencias</h4>
												<p class="fs-13 mb-0 text-black">Control de Asitencias en la semana</p>
											</div>
											<!-- <div class="dropdown mt-sm-0 mt-3">
												<button type="button" class="btn rounded btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
													Weekly
												</button>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="javascript:void(0);">Link 1</a>
													<a class="dropdown-item" href="javascript:void(0);">Link 2</a>
													<a class="dropdown-item" href="javascript:void(0);">Link 3</a>
												</div>
											</div> -->
										</div>
										<div class="card-body">
											<div id="chartTimeline"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- <div class="col-xl-3 col-xxl-4">
							<div class="row">
								<div class="col-xl-12">
									<div class="card featuredMenu">
										<div class="card-header border-0">
											<h4 class="text-black font-w600 fs-20 mb-0">Featured Diet Menu</h4>
										</div>
										<div class="card-body loadmore-content height750 dz-scroll pt-0" id="FeaturedMenusContent">
											<div class="media mb-4">
												<img src="images/menus/1.png" width="85" alt="" class="rounded mr-3">
												<div class="media-body">
													<h5><a href="food-menu.html" class="text-black fs-16">Chinese Orange Fruit With Avocado Salad</a></h5>
													<span class="fs-14 text-primary font-w500">Kevin Ignis</span>
												</div>
											</div>
											<ul class="d-flex flex-wrap pb-2 border-bottom mb-3 justify-content-between">
												<li class="mr-3 mb-2"><i class="las la-clock scale5 mr-3"></i><span class="fs-14 text-black">4-6 mins </span></li>
												<li class="mb-2"><i class="fa fa-star-o mr-3 scale5 text-warning" aria-hidden="true"></i><span class="fs-14 text-black font-w500">176 Reviews</span></li>
											</ul>
											<div class="media mb-4">
												<img src="images/menus/2.png" width="85" alt="" class="rounded mr-3">
												<div class="media-body">
													<h5><a href="food-menu.html" class="text-black fs-16">Fresh or Frozen (No Sugar Added) Fruits</a></h5>
													<span class="fs-14 text-primary font-w500">Olivia Johanson</span>
												</div>
											</div>
											<ul class="d-flex flex-wrap pb-2 border-bottom mb-3 justify-content-between">
												<li class="mr-3 mb-2"><i class="las la-clock scale5 mr-3"></i><span class="fs-14 text-black">4-6 mins </span></li>
												<li class="mb-2"><i class="fa fa-star-o mr-3 scale5 text-warning" aria-hidden="true"></i><span class="fs-14 text-black font-w500">176 Reviews</span></li>
											</ul>
											<div class="media mb-4">
												<img src="images/menus/3.png" width="85" alt="" class="rounded mr-3">
												<div class="media-body">
													<h5><a href="food-menu.html" class="text-black fs-16">Fresh or Frozen (No Sugar Added) Fruits</a></h5>
													<span class="fs-14 text-primary font-w500">Stefanny Raharjo</span>
												</div>
											</div>
											<ul class="d-flex flex-wrap pb-2 border-bottom mb-3 justify-content-between">
												<li class="mr-3 mb-2"><i class="las la-clock scale5 mr-3"></i><span class="fs-14 text-black">4-6 mins </span></li>
												<li class="mb-2"><i class="fa fa-star-o mr-3 scale5 text-warning" aria-hidden="true"></i><span class="fs-14 text-black font-w500">176 Reviews</span></li>
											</ul>
											<div class="media mb-4">
												<img src="images/menus/4.png" width="85" alt="" class="rounded mr-3">
												<div class="media-body">
													<h5><a href="food-menu.html" class="text-black fs-16">Original Boiled Egg with Himalaya Salt</a></h5>
													<span class="fs-14 text-primary font-w500">Peter Parkur</span>
												</div>
											</div>
											<ul class="d-flex flex-wrap pb-2 border-bottom mb-3 justify-content-between">
												<li class="mr-3 mb-2"><i class="las la-clock scale5 mr-3"></i><span class="fs-14 text-black">4-6 mins </span></li>
												<li class="mb-2"><i class="fa fa-star-o mr-3 scale5 text-warning" aria-hidden="true"></i><span class="fs-14 text-black font-w500">176 Reviews</span></li>
											</ul>
										</div>
										<div class="card-footer style-1 text-center border-0 pt-0 pb-4">
											<a class="text-primary dz-load-more fa fa-chevron-down" id="FeaturedMenus" href="javascript:void(0);" rel="ajax/featured-menu-list.html">
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div> -->
			<!--**********************************
				Content body end
			***********************************-->
	
			<!--**********************************
				Footer start
			***********************************-->
			<div class="footer">
				<div class="copyright">
					<p>Copyright © Developed by TrainGym 2021</p>
				</div>
			</div>
			<!--**********************************
				Footer end
			***********************************-->
	
			<!--**********************************
			   Support ticket button start
			***********************************-->
	
			<!--**********************************
			   Support ticket button end
			***********************************-->
	
	
		</div>
		<!--**********************************
			Main wrapper end
		***********************************-->
	
		<!--**********************************
			Scripts
		***********************************-->
		<!-- Required vendors -->
		<script src="../vendor/global/global.min.js"></script>
		<script src="../vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
		<script src="../vendor/chart.js/Chart.bundle.min.js"></script>
		<script src="../js/custom.min.js"></script>
		<script src="../js/deznav-init.js"></script>
		<script src="../vendor/owl-carousel/owl.carousel.js"></script>
		
		<!-- Chart piety plugin files -->
		<script src="../vendor/peity/jquery.peity.min.js"></script>
		
		<!-- Apex Chart -->
		<script src="../vendor/apexchart/apexchart.js"></script>
		
		<!-- Dashboard 1 -->
		<script src="../js/dashboard/dashboard-1.js"></script>
		<script>
			function carouselReview(){
				/*  testimonial one function by = owl.carousel.js */
				jQuery(".testimonial-one").owlCarousel({
					loop:true,
					autoplay:true,
					margin:30,
					nav:false,
					dots: false,
					left:true,
					navText: ["<i class="fa fa-chevron-left" aria-hidden="true"></i>", "<i class="fa fa-chevron-right" aria-hidden="true"></i>"],
					responsive:{
						0:{
							items:1
						},
						484:{
							items:2
						},
						882:{
							items:3
						},	
						1200:{
							items:2
						},			
						
						1540:{
							items:3
						},
						1740:{
							items:4
						}
					}
				})			
			}
			jQuery(window).on("load",function(){
				setTimeout(function(){
					carouselReview();
				}, 1000); 
			});
		</script>
	</body>
	</html>';
}
?>
