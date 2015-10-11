$(function(){
	//GERAIS
	var errmsg	= $('.msg');
	var forms	= $('form');
	var botao	= $('.sb');
	var urlpost = 'includes/header.php';
	
	botao.attr("type","submit");
	
	forms.submit(function(){
		errmsg.fadeOut("fast");
		return false;
	});
	
	function carregando(){
		errmsg.empty().html('<p class="load"><img src="img/load.gif" alt="Carregando..."> Aguarde, enviando requisição!</p>').fadeIn("fast");
	}
	
	function errosend(){
		errmsg.empty().html('<p class="erro"><strong>Erro inesperado,</strong> Favor contate o admin!</p>').fadeIn("fast");
	}
	
	//GENÉRICAS
	function errdados( mensagem ){
		errmsg.empty().html('<p class="erro">'+mensagem+'</p>').fadeIn("fast");
	}
	
	function sucesso( mensagem ){
		errmsg.empty().html('<p class="accept">'+mensagem+'</p>').fadeIn("fast");
	}
	
	$.ajaxSetup({
		url:	urlpost,
		type:	'POST',
		beforeSend: carregando,
		error: 		errosend
	});

	//CADASTRO
	var cadastro = $('form[name="cadastro"]');
	
	cadastro.submit(function(){
		var dados = $(this).serialize();
		var acao = "&acao=cadastro";
		var sender	= dados+acao;
		
		$.ajax({
			data:	sender,
			success: function( resposta ){
				if(resposta == '1'){
					errdados('<strong>Erro ao cadastrar:</strong> Existem campos em branco!');
				}else if(resposta == '2'){
					errosend();
				}else{
					sucesso( 'Parabéns <strong>'+resposta+'</strong>, seu cadastro foi realizado!' );
				}				
			},
			complete: function(){
				//location.href="http://www.upinside.com.br";	
				cadastro.find("input:text").val('');
			}
		});
	});
	
	//READ
	var loadler = $('.lendoartigos');
	var listler = $('.usuarios');
	var loadmore = $('.j_read');
	
	listler.empty();
	loadmore.hide();
	
	function carregarusuarios( instrucoes ){
		$.ajax({
			data:		instrucoes,
			beforeSend: '',
			error: 		'',
			success: 	function( leitura ){
				if(leitura != '3'){
					listler.append( leitura );
					loadler.delay(300).fadeOut("slow");
					loadmore.delay(1000).fadeIn("slow");
				}else{
					loadmore.text('Não existem mais usuários. Recarregar página').click(function(){
						location.reload();
					});	
					loadler.delay(300).fadeOut("slow");
				}
			}		
		});
	} //finaliza funcao
	
	carregarusuarios("acao=ler&offset=0&limit=2");
	
	var offset  = 2;
	loadmore.click(function(){
		loadler.fadeIn("fast");
		carregarusuarios("acao=ler&offset="+offset+"&limit=2");
		offset += 2;
	});
	
	//DELETE
	listler.on('click','.j_delete',function(){
		var delid = $(this).attr("id");
		var deldata = "acao=deletar&del="+delid;
		var liaction = $('li[class="j_'+delid+'"]');
		
		liaction.css("background","red");
		carregarusuarios("acao=ler&offset="+offset+"&limit=1");
		
		$.ajax({
			data:		deldata,
			beforeSend: '',
			error: 		'',
			success: 	function(){
				liaction.fadeOut("slow");	
			}
			
		});
	});
	
	//CONSULTA
	var closemodal = $('.j_buttom_close');
	var formmodal	= $('form[name="editar"]');
	
	listler.on('click','.j_edit',function(){
		var idedit = $(this).attr("id");
		var consult = "acao=consulta&editid="+idedit;
		var liaction = $('li[class="j_'+idedit+'"]');
		
		liaction.css("background","#09F");
		
		$.ajax({
			data:		consult,
			dataType:	"json",
			beforeSend: function(){ $('.editar').fadeIn("slow"); },
			error: 		'',	
			success: 	function( retorno ){
				$.each( retorno, function(key, value){
					formmodal.find("input[name='"+key+"']").val(value);
				});
				
			},
			complete: 	function(){
				formmodal.fadeIn("slow");
			}

		});
		
		closemodal.click(function(){
			formmodal.fadeOut("fast",function(){
				$('.editar').fadeOut("slow");
				liaction.css("background","#FFF");
			});	
		});
		
	});
	
	//EDITAR
	formmodal.submit(function(){
		var dados 	= "acao=editar&"+$(this).serialize();
		var editid 	= $(this).find('input[name="id"]').val();
		var listme 	= $('li[class="j_'+editid+'"]');
		
		listme.css("background","#090");
		
		$.ajax({
			data:		dados,
			dataType:	"json",
			beforeSend: function(){
				$('.j_loadboxedit').fadeIn("fast");
			},
			error: 		'',
			success: 	function( atualizacao ){
				$('.j_loadboxedit').fadeOut("slow");
				listme.find('h3').text(atualizacao.nome + " " + atualizacao.sobrenome);
				listme.find('.email').html('<a href="mailto:'+atualizacao.email+'">'+atualizacao.email+'</a>');
				listme.find('.telefone').text(atualizacao.telefone);
			}
				
		});		
	});*/
});