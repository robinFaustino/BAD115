$("#idpais").change(function(event){
	$.get("departamentos/"+event.target.value+"",function(response,idpais){
		console.log(response);
		$("#departamento").empty();
		for(i=0;i<response.length;i++){
			$("#departamento").append("<option value='"+response[i].id+"'>"+response[i].name+"</option>");
		}
	});
});
//desde aqui funciona 
$(function(){
	$('#idpais').on('change', onselectidpais);
});

function onselectidpais(){
	var pais_id = $(this).val();

	if(!pais_id){
		$('#departamento').html('<option value="">Seleccione departamento</option>');
		return;
	}
	
	$.get('/api/postulante/'+ pais_id+'/departamento',function(data){
		var html_select = '<option value="">Seleccione departamento</option>';
		for(var i=0;i<data.length; ++i)
		html_select += '<option value= "'+data[i].iddepartamento+'">'+data[i].nombre+'</option>';
		$('#departamento').html(html_select);
	});
	
		
	
}