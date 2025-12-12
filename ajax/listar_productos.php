<?php
	//* Connect To Database*/
	require_once('../Connections/conexion.php'); 

//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

$cve_user = $_SESSION['MM_Username'];
	
$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
if($action == 'ajax'){
	//$query = mysqli_real_escape_string($con,(strip_tags($_REQUEST['query'], ENT_QUOTES)));

	$tables="cronograma_acciones_ejecucion_festival";
	$campos="*";
	$sWhere=" clave_usuario LIKE '".$cve_user."'";
	$sWhere.=" order by id_cronograma_acciones";
	
	include 'pagination.php'; //include pagination file
	//pagination variables
	$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
	$per_page = intval($_REQUEST['per_page']); //how much records you want to show
	$adjacents  = 4; //gap between pages after number of adjacents
	$offset = ($page - 1) * $per_page;
	//Count the total number of row in your table*/
	$count_query   = mysqli_query($con,"SELECT count(*) AS numrows FROM $tables where $sWhere ");
	if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}
	else {echo mysqli_error($con);}
	$total_pages = ceil($numrows/$per_page);
	//main query to fetch the data
	$query = mysqli_query($con,"SELECT $campos FROM  $tables where $sWhere LIMIT $offset,$per_page");
	//loop through fetched data

	if ($numrows>0){
		
	?>
		<div class="table-responsive">
			<table class="table">
				<thead>
					<tr>
						<th class='text-center'>Código</th>
						<th>Fecha </th>
						<th>Acciones </th>
						<th></th>
					</tr>
				</thead>
				<tbody>	
						<?php 
						$finales=0;
						while($row = mysqli_fetch_array($query)){	
							$product_id_jat=$row['id_cronograma_acciones'];
							$prod_code=$row['fechaacciones'];
							$prod_ctry=$row['acciones'];						
							$finales++;
						?>	
						<tr>
                        <td class='text-center'><?php echo $product_id_jat;?></td>
							<td class='text-center'><?php echo $prod_code;?></td>
							<td><?php echo $prod_ctry;?></td>
							<td> 
								<a href="#"  data-target="#editProductModal" class="edit" data-toggle="modal" data-id="<?php echo $product_id_jat; ?>" data-jat="<?php echo $product_id_jat; ?>" data-name='<?php echo $prod_code;?>' data-category="<?php echo $prod_ctry?>" ><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
								<a href="#deleteProductModal" class="delete" data-toggle="modal" data-id="<?php echo $product_id_jat;?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                    		</td>
						</tr>
						<?php }?>
						<tr>
							<td colspan='6'> 
								<?php 
									$inicios=$offset+1;
									$finales+=$inicios -1;
									echo "Mostrando $inicios al $finales de $numrows registros";
									echo paginate( $page, $total_pages, $adjacents);
								?>
							</td>
						</tr>
				</tbody>			
			</table>
		</div>	
	<?php	
	}	
}
?>          