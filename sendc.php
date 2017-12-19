<?php
            require_once('class.phpmailer.php');
			$nombre = utf8_decode($_POST["name"]);
			$address = $_POST["email"];
			$mensaje = utf8_decode($_POST["message"]);
			 
			
			$body = "
			
			  <html>
			  <head>
		<style>
		    body{
		    	font-family: sans-serif;
		    	font-size:18px;
		    }
			.content{
				border: 4px dashed rgb(38,52,111);
				width: 80%;
			}
			.content p{
				padding:5px;
				margin-left:10px;
				margin-right:10px;
				border-bottom: 2px solid rgb(38,52,111);
				color: #000 !important;
				
			}
			</style>
	         </head>
			  <body>
			  <div class='content'>
			<p>De:  $nombre</p>
			<p>Correo:  $address</p>
		    <p>Mensaje:<br/>
		    $mensaje
		    </p>
		</div>
			  <p>Mensaje enviado desde la página www.nirt.com.mx</p>
			  <img src=\"cid:logo\" />
				</body>
           </html>
			";
			
			
			$mail = new PHPMailer(); // defaults to using php "mail()"
			$address = $_POST["email"];	
			$mail->SetFrom($address, $nombre,0);
			
			$mail->addAddress("contacto@nirt.com.mx","NIRT");
			
			$cont = "Contacto NIRT ";
			$nam = utf8_decode($nombre);

			$mail->Subject = $nam.$cont;
			
			$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
			$mail->AddEmbeddedImage('img/Logo_menu.png', 'logo');
			$mail->MsgHTML($body);
			
			if(!$mail->Send()) 
			{
				echo "Mailer Error: -" . $mail->ErrorInfo;
			} 
			else 
			{
				echo "0";
			}
?>