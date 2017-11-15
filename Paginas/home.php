<h2><?php echo getInfo("titulo") ?></h2>
<p><?php echo getInfo("descricao") ?></p>
<hr>
<h2>Pesquisar</h2>
<form action="busca" method="GET"  >
	<input type="text" name="busca" placeholder="Busca">
	<button>Pesquisar</button>
</form>

<hr>
<h2>Lista de Produtos</h2>
<ul>
	<?php foreach($produtos as $produto): ?>

		<li>
			<?php echo  $produto['titulo']." - ".$produto['descricao']." - "."R$".number_format($produto['valor'],2,",",".") ?>
			<a href="/produto/editar?id=<?php echo $produto['id'] ?>">Editar</a>
			
		</li>

	<?php endforeach; ?>
</ul>

<hr>
<?php if(isset($editando)):?>
	<h2>Editando Produto</h2>
<?php else:?>
	<h2>Adicionar Produto</h2>
<?php endif;?>

<?php if(isset($msg)): ?>
	<p><?php echo $msg ?></p>
<?php endif; ?>

<form action="<?php echo (isset($editando) ? '/produto/salvar' : '/produto/adicionar');?>" method="post">
	<?php if(isset($editando)):?>
		<input type="hidden" name="id" value="<?php echo $produtoEdit['id'] ?>">
	<?php endif;?>
	<input type="text" name="titulo" placeholder="Título" 
	value="<?php echo (isset($produtoEdit['titulo'])? $produtoEdit['titulo'] : '' );?>">
	<input type="text" name="descricao" placeholder="Descrição" 
	value="<?php echo (isset($produtoEdit['descricao'])? $produtoEdit['descricao'] : '' );?>">
	<input type="text" name="valor" placeholder="Valor R$" 
	value="<?php echo (isset($produtoEdit['valor'])? $produtoEdit['valor'] : '' );?>">
	<button><?php echo (isset($editando) ? 'Atualizar' : 'Adicionar');?></button>
	<a href="/home">Cancelar</a>
</form>