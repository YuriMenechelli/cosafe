<!-- Main content -->
<section class="content">
  <!-- Default box -->
	<div class="box">
	    <div class="box-header with-border" id="center">
		<h1 class="text-center">Esqueci a Senha</h1>
		    <form action="controllers/UsuarioController.php" method="POST">
		    	<div class="form-group">
		    		<div class="col-md-12">
					    <label for="login"><h5>Email</h5></label>
					    <input type="text" name="login" class="form-control" id="login" placeholder="Digite o email" required>
					  	<input type="hidden" name="reset">
					</div>  	
			  </div>
			  <div class="col-md-4">
			  <button type="submit" class="btn btn-primary">Redefinir</button>
			</div>
			</form>
	    </div>
	</div>
  <!-- /.box -->
</section>