const data = new Date();

function iniciaVideoDaCamera (){

	//Inicia a imagem da câmera
	const specs = {video:{width:480}};
	navigator.mediaDevices.getUserMedia(specs).then(stream=>{
	
		let video = document.querySelector('#video');		
		video.srcObject = stream;		
		video.play();
	});	

	//Captura a imgagem
	document.querySelector('#capture').addEventListener('click', function (){
		let canvas = document.querySelector("#canvas");	
		let linkDownload = document.getElementById('linkDownload');
		
		canvas.height = video.videoHeight;
		canvas.width = video.videoWidth;

		let context = canvas.getContext('2d');		
		context.drawImage(video, 0, 0);

		canvas.style.display = "block";
		linkDownload.style.display = "inline-block";
	});

	//Salva a imagem
	document.querySelector('#linkDownload').addEventListener('click', function (){
		var meucanvas = document.getElementById('canvas');
		var arquivo = document.getElementById('linkDownload');

		//Definindo o nome do arquivo e a extensão 
		arquivo.download = "img_" + data.getDate() + "_" + data.getMonth() + "_" + data.getFullYear() + "_" + data.getHours() + "-" + data.getMinutes() + "-" + data.getSeconds() + ".jpeg";

		arquivo.href = meucanvas.toDataURL();



	});

}

window.addEventListener("DOMContentLoaded", iniciaVideoDaCamera);

