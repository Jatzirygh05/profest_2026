  		
		$gmx(document).ready(function(){
			$('#fechaacciones').datepicker();
			});
			$gmx(document).ready(function(){
		  $('#fechaacciones_fin').datepicker();
		  });
		  $gmx(document).ready(function(){
		 for($j=1;$j<=50;$j++){
			 
			  $('#fechaacciones_fin_P'+$j).datepicker(); 
			  $('#fechaacciones_P'+$j).datepicker();
			  
		 }
		});