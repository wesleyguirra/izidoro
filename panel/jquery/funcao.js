$(document) .ready(function(){
	$("#recupera") .validate({
		rules:{
			email:{required:true, email:true},
		
			},
		messages:{
			email:{required:"O campo email deve ser preenchido", email: "Formato inválido!"},
			},
	});
})