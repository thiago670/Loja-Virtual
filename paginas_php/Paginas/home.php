<main class="container">
	
	<form action="busca" method="GET">
		<input type="text" name="busca" placeholder="Busca">
		<button class="btn blue">Pesquisar</button>
	</form>
	<h2>Lista de Produtos</h2>
		<table class="highlight">
	        <thead>
	          <tr>
	              <th>Título</th>
	              <th>Descrição</th>
	              <th>Valor</th>
	              <th>Editar</th>
	              <th>Apagar</th>
	          </tr>
	        </thead>
	        <tbody>
	    		<?php foreach($produtos as $produto): ?>
		          <tr>
		            <td><?php echo $produto['titulo']; ?></td>
		            <td><?php echo $produto['descricao']; ?></td>
		            <td><?php echo "R$ ".number_format($produto['valor'],2,",","."); ?></td>
		            <td><a href="/produto/editar?id=<?php echo $produto['id'] ?>"><i class="material-icons">edit</i></a></td>
		            <td><a href="/produto/deletar?id=<?php echo $produto['id'] ?>" onclick="return confirm('Deseja deletar o produto <?php echo $produto['titulo']; ?>')"><i class="material-icons">delete</i></a></td>
		          </tr>
	    		<?php endforeach; ?> 
	        </tbody>
      </table>


	<?php if (isset($editando)): ?>
		<h2>Editar Produto</h2>
	<?php else: ?>
		<h2>Adicionar Produto</h2>
	<?php endif ?>


	<?php if (isset($msg)): ?>
		<p><?php echo $msg ?></p>
	<?php endif; ?>

	<form action="<?php echo (isset($editando) ? '/produto/salvar' : '/produto/adicionar');?>" method="post">
		<?php if (isset($editando)): ?>
			<input type="hidden" name="id" value="<?php echo $produtoEdit['id'] ?>">
		<?php endif; ?>

		<div class="input-field col s6">
			<input type="text" name="titulo" value="<?php echo(isset($produtoEdit['titulo'])?$produtoEdit['titulo']:''); ?>">
	        <label>Título</label>
	    </div>
	   	<div class="input-field col s6">
			<input type="text" name="descricao" value="<?php echo(isset($produtoEdit['descricao'])?$produtoEdit['descricao']:''); ?>">
	        <label>Descrição</label>
	    </div>
	   	<div class="input-field col s6">
			<input type="text" name="valor" value="<?php echo(isset($produtoEdit['valor'])?$produtoEdit['valor']:''); ?>">
	        <label>Valor (R$)</label>
	    </div>
		<button class="btn blue"><?php echo(isset($editando)?'Atualizar':'Adicionar'); ?></button>
		<a href="/home" class="btn orange">Cancelar</a></div>
	</form>
	<?php if(isset($editando)): ?>
		<form action="/home" method="post">
			<button>Cancelar</button>
		</form>
	<?php endif; ?>

</main>

