<!-- Main content -->
<section class="content">
  <!-- Default box -->
	<div class="box">
	    <div class="box-header with-border" id="center">
	    	<h1 class="text-center">Editar Usuário</h1>
		    <form action="controllers/UsuarioController.php" method="POST">
			  <div class="form-group">
			  	<?php 
			  		foreach($usuario->listar_por_id("usuarios", $_GET['id']) as $item):
			  	?>
			  	<input type="hidden" name="id" value="<?= $item['id'] ?>">
			  	<input type="hidden" name="edit" value="edit">
			  	<div class="form-group">
				    <label for="nome"><h5>Nome</h5></label>
				    <input type="text" name="nome" class="form-control" id="nome" value="<?= $item['nome'] ?>"  placeholder="Digite o nome" required>
			  	</div>
			  	<div class="form-group">
				    <label for="cpf"><h5>CPF</h5></label>
				    <input type="text" name="cpf" class="form-control" id="cpf" value="<?= $item['cpf'] ?>" placeholder="Digite o CPF" required>
			  	</div>
			  	<label for="email"><h5>Email</h5></label>
			    <input type="email" name="login" value="<?= $item['login'] ?>" class="form-control" id="login" aria-describedby="emailHelp" placeholder="Digite o email">
			  </div>
			  <div class="form-group">
			    <label for="senha"><h5>Senha</h5></label>
			    <input type="password" name="senha" class="form-control" id="senha" placeholder="Digite a senha">
			  </div>
			  		<?php endforeach; ?>
			  <button type="submit" class="btn btn-primary">Editar</button>
			</form>
	    </div>
	</div>
  <!-- /.box -->
</section>