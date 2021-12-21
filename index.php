<html>
	<head>
		<meta charset="utf-8" />
    	<title>App Enviador de e-mails</title>

    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" href="estilo.css"/>
    	

	</head>

	<body>

		<div class="container">  

			<div class="py-3 text-center">
				<img class="d-block mx-auto mb-2" src="logo2.png" alt="" width="100" height="100">
				<h2>Enviador de e-mails </h2>
				<p class="lead">meu app de envio de e-mails particular!</p>
			</div>

      		<div class="row">
      			<div class="col-md-12">
  				
					<div class="card-body font-weight-bold">
						<form action="processa_envio.php" method="post">
							<div class="form-group">
								<label for="para">Para:</label>
								<input name="para" type="email" class="form-control" id="para" placeholder="exemplo: ana@hotmail.com " required>
							</div>

							<div class="form-group">
								<label for="assunto">Assunto:</label>
								<input name="assunto" type="text" class="form-control" id="assunto" placeholder="Assundo do e-mail" required>
							</div>

							<div class="form-group">
								<label for="mensagem">Mensagem:</label>
								<textarea name="mensagem" class="form-control" id="mensagem" required></textarea>
							</div>

							<div class="text-center">
							<button type="submit" class="btn btn-primary btn-lg botao">Enviar Mensagem</button>
							</div>
						</form>
					</div>
				</div>
      		</div>

      		<?php if ( isset($_GET['envio']) && $_GET['envio'] == 1) { ?>

				<div class="enviado pt-2 text-white d-flex justify-content-center">
					<h3> E-MAIL ENVIADO COM SUCESSO!</h3> 
				</div>	
	      		
			<?php }  ?>
      	</div>

	</body>
</html>