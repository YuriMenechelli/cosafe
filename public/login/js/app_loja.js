var App = function (){

	var calculoFreteProduto = function(){
		$('.btn-calcular-frete').on('click', function () {

			var input_cep = $('#cep-calculo-produto').val();
			var id_produto = $(this).attr('data-id');

			if (!input_cep){
				alert('Necessita digitar um CEP.');
				return false;
			}

			$('.calculo-frete-retorno').html('<div class="carregando-frete-produto">Aguarde calculo do frete...</div>');
			$('.calculo-frete-retorno').removeClass('hide');
			$.ajax({
				type: 'post',
				url:  url_loja +'ajax/calcular_frete',
				data: {id:id_produto, cep:input_cep},
				dataType: "JSON"
			}).then (function(res){
				if (res.erro == 0) {
					$('.calculo-frete-retorno').html(res.valor_frete);
				}
			}, function (){
				alert('Erro ao simular frete');
			});
		});
	}

	var mascaraForm = function () {
		$('.input_cep').mask('00000-000');
	}

	var alteraProdutoCarrinho = function(){
		$('.btn-alterar-qtd-produto-carrinho').on('click', function(){

			var id_produto 	= $(this).attr('data-id');
			var qtd_compra	= $('#produto_'+id_produto).val();
			

			if (qtd_compra > 0) {
				$.ajax({
				type: 'post',
				url:  url_loja +'carrinho/update',
				data: {id:id_produto, qtd: qtd_compra},
				dataType: "JSON"
			}).then (function(res){

				if (res.erro == 0) {

					$(location).attr('href', url_loja +'carrinho');
				}

			}, function (){

				alert('Erro ao apaagr produto do carrinho');

			});
			} else {
				alert('Não pode passar valores zero.');
			}

			

			/**/
			
		});
	}

	var apagaProdutoCarrinho = function(){
		$('.btn-apagar-produto-carrinho').on('click', function(){

			var id_produto = $(this).attr('data-id');

			$.ajax({
				type: 'post',
				url:  url_loja +'carrinho/apagar_item',
				data: {id:id_produto},
				dataType: "JSON"
			}).then (function(res){

				if (res.erro == 0) {

					$(location).attr('href', url_loja +'carrinho');
				}

			}, function (){

				alert('Erro ao apaagr produto do carrinho');

			});
			
		});
	}

	var limpaCarrinhoCompra = function(){

		$('.btn-limpar-carrinho').on('click', function(){
			$.ajax({
				type: 'post',
				url:  url_loja +'carrinho/limpar',
				data: {limpar:true},
				dataType: "JSON"
			}).then (function(res){

				if (res.erro == 0) {

					$('.body-carrinho-top').addClass('hide');
					$('.btns-carrinho-top').addClass('hide');
					$('.body-carrinho-vazio').removeClass('hide');
					$('.carrinho-total-item').html('0');
				} 

			}, function (){

				alert('Erro ao limpar carrinho');

			});
		});

	}

	var verificaCarrinhoCompra = function(){
		$.getJSON(url_loja+'carrinho/carrinho_topo', function(res){
			if (res.erro == 0) {

				$('.body-carrinho-top').removeClass('hide');
				$('.btns-carrinho-top').removeClass('hide');

				$('.body-carrinho-vazio').addClass('hide');

				$('.carrinho-total-item').html(res.itens);
				$('.carrinho-total-valor').html(res.total);

			}
		});
	}

	var addProdutoCarrinho = function(){

		$('.btn-add-produto-carrinho').on('click', function(){

			var id_produto = $(this).attr('data-id');
			$.ajax({
				type: 'post',
				url:  url_loja + 'carrinho/add',
				data: {id:id_produto},
				dataType: "JSON"
			}).then (function(res){

				if (res.erro == 0) {

					var msg = '<div class="alert alert-success" value="alert">'+
								'<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
  									'<span aria-hidden="true">&times;</span>'+
								'</button>'+
								'<strong>'+res.msg+'</strong>'+
							  ' <a href="'+url_loja+'carrinho" title"" class="btn btn-success">Finalizar compra</a></div>';

					$('.msg-carrinho-alert').html(msg);
					$('.msg-add-carrinho').removeClass('hide');

					$('.carrinho-total-item').html(res.itens);
					$('.carrinho-total-valor').html(res.total);

					$('.body-carrinho-top').removeClass('hide');
					$('.btns-carrinho-top').removeClass('hide');

					$('.body-carrinho-vazio').addClass('hide');
				} else {
					alert(res.msg);
				}

			}, function (){

				alert('Erro ao add produto');

			});
			/*alert(url_loja);*/
		});

	}

	return {
		init: function(){
			addProdutoCarrinho();
			verificaCarrinhoCompra();
			limpaCarrinhoCompra();
			apagaProdutoCarrinho();
			alteraProdutoCarrinho();
			mascaraForm();
			calculoFreteProduto();
		}
	}

}();

jQuery(document).ready(function(){
	App.init();
});
