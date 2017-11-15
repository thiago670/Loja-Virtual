<?php

function getUsuario(){
	$dados=
	[
		["nome"=>"Thiago","Email"=>"t.r.assis@gmail.com"],
		["nome"=>"Antonio","Email"=>"antonio@gmail.com"],
		["nome"=>"Miriam","Email"=>"miriam@gmail.com"],
		["nome"=>"Cássia","Email"=>"Cássia@gmail.com"]
	];

	return $dados;
}
function exibeUsuario(){

	$usuarios=getUsuario();
	$html="";

	foreach ($usuarios as $chave => $usuario) {
		$nome = $usuario["nome"];
		$email = $usuario["Email"];
		

		$html .="<li>Nome: $nome - Email: $email</li>";

	}

	echo $html;	
}

?>