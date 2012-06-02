	//Funcion post Jquery
	function testPost()
	{
		$('#iconLoading').css('display','block');
		var notifyMessage	= document.getElementById('notifyMessage');		
		var submitData = $('#formAddAgent').serialize();	
		$.ajax({
			type: "POST",
			url: "core/CONTROLLER_PHP",
			data: submitData,
			dataType: "html",
			success: function(result)
			{
				result = eval( result );				
				// alert(result);				
				// $('#iconLoading').css('display','none');
				// notifyMessage.innerHTML 	= result;				
			}			
		});			
	}
	
	function testGet()
	{
		$.get("CONTROLLER_PHP", {parametro1: "valor1", parametro2: "valor2"}, function(result){
		   
		})		
	}
	
	

