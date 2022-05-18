<!DOCTYPE html>
<html lang="pt-br">
          <head>
                <meta charset="utf-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <!--link rel="icon" href=""-->
                <title>Conferência Web</title>

                <!-- Bootstrap -->
                <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
                <!-- Bootstrap -->
                
                <!--CSS Ocorrências--> 
                <link href="css/estilo.css" rel="stylesheet">
                <!--CSS Ocorrências-->
                
                <!--IE Bug-->           
                <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">
                <!--IE Bug-->

                    <script type="text/javascript" src="webcam.js"></script>
					<script type="text/javascript">
						//Configurando o arquivo que vai receber a imagem
						webcam.set_api_url('upload.php');

						//Setando a qualidade da imagem (1 - 100)
						webcam.set_quality(90);

						//Habilitando o som de click
						webcam.set_shutter_sound(true);

						//Definindo a função que será chamada após o termino do processo
						webcam.set_hook('onComplete', 'my_completion_handler');

						//Função para tirar snapshot
						function take_snapshot() {
							document.getElementById('upload_results').innerHTML = '<h3>Gerando Imagem...</h3>';
							webcam.snap();
						}

						//Função callback que será chamada após o final do processo
						function my_completion_handler(msg) {
							if (msg.match(/(http\:\/\/\S+)/)) {
								var htmlResult = '<h3>Imagem Capturada!</h3>';
                                htmlResult += '<div class="img_webcam_captura"><img src="'+msg+'" /></div>';
                                htmlResult += '<br><a class="btn btn-success" href="'+msg+'" download=""><span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span> Download</a>';
								document.getElementById('upload_results').innerHTML = htmlResult;
								webcam.reset();
							}
							else {
								alert("PHP Erro: " + msg);
							}
						}
					</script>
          </head>
		  
		    <body>
                <div class="container">
				    <div>
						<!--img src="" class="img-responsive img_form"-->
					</div>
					
				    <div class="row">
						<div class="col-md-6">
					  
								<h2><b>Conferência Web</b></h2>

								<h3>Capture a imagem do produto recebido!</h3>

								<div class="img_webcam">
									<script type="text/javascript">
										//Instanciando a webcam. O tamanho pode ser alterado
										document.write(webcam.get_html(352, 240));
									</script>
								</div>

								<br>

								<form>
									<button type="button" class="btn btn-primary" aria-label="Left Align" onClick="webcam.configure()" title="Configuração">
									  <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
									</button>
									&nbsp;
									<button type="button" class="btn btn-success" aria-label="Left Align" onClick="take_snapshot()" title="Capturar imagem">
									  <span class="glyphicon glyphicon-camera" aria-hidden="true"></span>
									</button>
									&nbsp;
									<a href="index.php"type="button" class="btn btn-danger" aria-label="Left Align" title="Encerrar">
									  <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
									</a>
									
									
									<!--input class="btn btn-primary" type=button value="Configurar" onClick="webcam.configure()">
									&nbsp;&nbsp;
									<input class="btn btn-success" type=button value="Tirar Foto" onClick="take_snapshot()">
									&nbsp;&nbsp;
									<input class="btn btn-danger" type=button value="Reset" onClick="webcam.reset()"-->
								</form>
							
							<br>
					
                        </div>
					
					    <div class="col-md-6">
                             <div class="img_capturada" id="upload_results"></div>
                        </div>
								 
                        <br>
				 
				    </div>
				 
				    <div class="contato">
                            <h4><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span> Contato:</h4>
                            <p>
                            Departamento: Tecnologia da Informação <br>
                            E-mail: fernandofm3@gmail.com <br>                            
                            </p>
                    </div>
				 
				    <div class="rodape">
					    <h3>&copy; progFer Soluções<h3>
					</div>
				 
                 </div>
				 
            </body>

</html>
          
