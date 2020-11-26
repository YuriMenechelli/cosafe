<!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border" id="center">
        	<h1 class="text-center">Lista de Usuários</h1>

			<div class="row margin-bottom-20">
				<div class="col-md-12 text-right" style="padding:10px">
					<a href="usuario_create.php" title="Novo" class="btn btn-success"><i class="fa fa-plus-square"></i> Novo</a>
				</div>
			</div> <br>

			<table class="table table-striped table-sm">

				<thead>
					<tr>
						<th>NOME</th>
						<th>CPF</th>
						<th>E-MAIL</th>
						<th class="text-center">OPÇÕES</th>
					</tr>
				</thead>

				<tbody>
					<?php
						foreach($manager->listar_usuarios('usuarios') as $item):
							?>
						<tr>
							<td><?= $item['nome'] ?></td>
							<td><?= $item['cpf'] ?></td>
							<td><?= $item['login'] ?></td>
							<td class="text-center">
							<a href="usuario_edit.php?id=<?= $item['id'] ?>" title="Editar" class="btn btn-primary"><i class="fa fa-edit"></i></a>
							<a onclick="return confirm('Você tem certeza que deseja excluir ?') "href="controllers/UsuarioController.php?id=<?= $item['id'] ?>&acao=excluir" title="Apagar" class="btn btn-danger btn_apagar_registro"><i class="fa fa-trash"></i></a>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
        </div>
      </div>
      <!-- /.box -->
    </section>