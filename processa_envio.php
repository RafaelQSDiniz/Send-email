<?php
	
	require  "./bibliotecas/PHPMailer/Exception.php";
	require  "./bibliotecas/PHPMailer/OAuth.php";
	require  "./bibliotecas/PHPMailer/PHPMailer.php";
	require  "./bibliotecas/PHPMailer/POP3.php";
	require  "./bibliotecas/PHPMailer/SMTP.php";

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;


	//print_r($_POST);


	class mensagem {
		private $para = null;
		private $assunto = null;
		private $mensagem = null;

		public function __get($atributo) {
			return $this->$atributo;
		}
		

		public function __set($atributo, $valor) {
			$this->$atributo = $valor;
		}

		public function mensagemValida(){
			if(empty($this->para) || empty($this->assunto) || empty($this->mensagem)) { return false;
			}
			return true;
		}
	}

	$mensagem = New Mensagem();

	$mensagem->__set('para', $_POST['para']);
	$mensagem->__set('assunto', $_POST['assunto']);
	$mensagem->__set('mensagem', $_POST['mensagem']);


	//print_r($mensagem);

	if (!$mensagem->mensagemValida()) {
		echo "Mensagem não é valida";
		die();	
	} 

	$mail = new PHPMailer(true);

	try {
	    
	    $mail->isSMTP();                                           
	    $mail->Host       = 'smtp.gmail.com';                    
	    $mail->SMTPAuth   = true;                                   
	    $mail->Username   = '';            //<--- coloque seu e-mail       
	    $mail->Password   = '';          //<--- coloque sua senha                  
	    $mail->Port       = 587;                                 

	    //Recipients
	    $mail->setFrom('rafaeldiniz.dev@gmail.com', 'ROBO ENVIADOR DE EMAILS');
	    $mail->addAddress($mensagem->__get('para'));     //Add a recipient             
	    //$mail->addReplyTo('info@example.com', 'Information');
	    //$mail->addCC('cc@example.com');
	    //$mail->addBCC('bcc@example.com');

	    //Attachments
	    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
	    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

	    //Content
	    $mail->isHTML(true);                                  //Set email format to HTML
	    $mail->Subject = $mensagem->__get('assunto');
	    $mail->Body    = $mensagem->__get('mensagem');
	    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

	    $mail->send();
	    echo 'mensagem enviada com sucesso!';
	    header('Location: index.php?envio=1');
	} catch (Exception $e) {
	    echo "Detalhes do erro: {$mail->ErrorInfo}";
	}
?>