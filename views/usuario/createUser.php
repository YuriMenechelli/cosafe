<!-- Main content -->
<section class="content">
  <!-- Default box -->
	<div class="box">
	    <div class="box-header with-border" id="center">
	    	<h1 class="text-center">Cadastrar Usuário</h1>
		    <form action="controllers/UsuarioController.php" method="POST">
		    	<div class="form-group">
			    <label for="nome"><h5>Nome</h5></label>
			    <input type="text" name="nome" class="form-control" id="nome" placeholder="Digite o nome" required>
			  </div>
			  <div class="form-group">
			    <label for="cpf"><h5>CPF</h5></label>
			    <input type="text" name="cpf" class="form-control" id="cpf" placeholder="Digite o CPF" required>
			  </div>
			  <div class="form-group">
			  	<input type="hidden" name="inserir">
			  	<label for="email"><h5>Email</h5></label>
			    <input type="email" name="login" value="" class="form-control" id="login" aria-describedby="emailHelp" placeholder="Digite o email" required>
			  </div>
			  <div class="form-group">
			    <label for="senha"><h5>Senha</h5></label>
			    <input type="password" name="senha" class="form-control" id="senha" placeholder="Digite a senha" required>
			  </div>
			  <button type="submit" class="btn btn-primary">Cadastrar</button>
			</form>
	    </div>
	</div>
  <!-- /.box -->
</section>