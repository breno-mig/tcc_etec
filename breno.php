<?php 


$produtos = [ 
	["nome" => "Produto 1", "valor" => "100,00", "imagem" => "teste.jpg"],
	["nome" => "Produto 2", "valor" => "500,00", "imagem" => "teste.jpg"],
	["nome" => "Produto 3", "valor" => "10,00", "imagem" => "teste.jpg"],
	["nome" => "Produto 4", "valor" => "6000,00", "imagem" => "teste.jpg"]
];

foreach($produtos as $produto){

	echo '<div class="card">
				<img src="imagens/{$produto['imagem']}" >
				<h1>{$produto['nome']}</h1>
				<p class="price">{$produto['valor']}</p>
				<a href="produtos/Orcamento2.php" target="corpo"> 
					<button>Faça um Orçamento</button>
				</a>
			</div>';	

}

?>