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

	$tables="mas_lugares";
	$campos="*";
	$sWhere=" clave_usuario LIKE '".$cve_user."'";
	$sWhere.=" order by id_lugares";
	
	include 'pagination.php'; //include pagination file
	//pagination variables
	$page_lugar = (isset($_REQUEST['page_lugar']) && !empty($_REQUEST['page_lugar']))?$_REQUEST['page_lugar']:1;
	$per_page_lugar = intval($_REQUEST['per_page_lugar']); //how much records you want to show
	$adjacents  = 4; //gap between page_lugars after number of adjacents
	$offset = ($page_lugar - 1) * $per_page_lugar;
	//Count the total number of row in your table*/
	$count_query   = mysqli_query($con,"SELECT count(*) AS numrows FROM $tables where $sWhere ");
	if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}
	else {echo mysqli_error($con);}
	$total_page_lugars = ceil($numrows/$per_page_lugar);
	//main query to fetch the data
	$query_lugar = mysqli_query($con,"SELECT $campos FROM  $tables where $sWhere LIMIT $offset,$per_page_lugar");
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
						while($row = mysqli_fetch_array($query_lugar)){	
							$product_id=$row['id_lugares'];
							$prod_code=$row['Nombreforo'];
							$prod_ctry=$row['Domicilioforo'];
							$prod_stock=$row['Descripcionlug'];						
							$finales++;
						?>	
						<tr class="<?php echo $text_class;?>">
                        <td class='text-center'><?php echo $product_id;?></td>
							<td class='text-center'><?php echo $prod_code;?></td>
							<td><?php echo $prod_ctry;?></td>
							<td> 
								<a href="#"  data-target="#editProductModal" class="edit" data-toggle="modal" data-id="<?php echo $product_id; ?>" data-jat="<?php echo $product_id; ?>" data-name='<?php echo $prod_code;?>' data-category="<?php echo $prod_ctry?>" ><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
								<a href="#deleteProductModal" class="delete" data-toggle="modal" data-id="<?php echo $product_id;?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                    		</td>
						</tr>
						<?php }?>
						<tr>
							<td colspan='6'> 
								<?php 
									$inicios=$offset+1;
									$finales+=$inicios -1;
									echo "Mostrando $inicios al $finales de $numrows registros";
									echo paginate( $page_lugar, $total_page_lugars, $adjacents);
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