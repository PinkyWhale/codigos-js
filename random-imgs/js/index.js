let imgs = [
		{
			nombre: "Torta",
			url: "cake.png"
		},
		{
			nombre: "Pollo",
			url: "chicken.png"	
		},
		{
			nombre: "Hamburguesa",
			url: "hamburger.png"
		}
];

function loadImages(){

	let repetidos = [];

	let length = imgs.length;

	$('#images').html("");

	while(repetidos.length < imgs.length){

		let indice = Math.floor(Math.random()*length);

		console.log(indice);

		if(repetidos.indexOf(indice) == -1){

			let elemento = imgs[indice];

			let div = `<div><img src="imgs/${elemento.url}" alt="${elemento.nombre}"></div>`;

			$('#images').append(div);

			repetidos.push(indice);
		}	

	}
}

loadImages();