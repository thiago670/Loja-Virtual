<?php

function getInfo($atributo){
	$dados=array("Titulo"=>"Meu Site","Descrição"=>"Sistema de Cadastro de Produtos");
	return $dados[$atributo];
}