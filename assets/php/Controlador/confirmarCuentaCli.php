<!Doctype HTML>
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
   
   <link rel="icon" type="image/x-icon" href="../../../views/images/Recurso 1.png" />
	 <!-- Core theme CSS (includes Bootstrap)-->
   <link href="../assets/css/style.css" rel="stylesheet" />
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   <title>| Alerta</title>
   </head>
   <body>
   <script> 
    window.addEventListener("load", init, false);
		function init () {
			Swal.fire({
				title: "BIENVENIDO A TRAINGYM",
				text: "Su registro ha sido exitoso, recuerde validar su pago con la recepción",
				icon: "success",
				buttons: true,
				dangerMode: true,
			  }).then((willDelete) => {
			if (willDelete) {
				location.href = "../../../views/login.php";
			} else {
				location.href = "../../../views/login.php";
			}
		  });
		}
		
   </script>
   
   </body>
   </html>