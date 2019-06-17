
$(function(){
	$('#departamento').on('change', onselectiddepartamento);
});

function onselectiddepartamento(){
	var departamento_id = $(this).val();

	if(!departamento_id){
		$('#municipio').html('<option value="">Seleccione municipio</option>');
		return;
	}
	
	$.get('/api/postulante/'+ departamento_id+'/municipio',function(data){
		var html_select1 = '<option value="">Seleccione municipio</option>';
		for(var i=0;i<data.length; ++i)
		html_select1 += '<option value= "'+data[i].idmunicipio+'">'+data[i].nombre+'</option>';
		$('#municipio').html(html_select1);
	});
	
		
	
}