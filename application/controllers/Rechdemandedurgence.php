<?php

//class rechercehdemande extends CI_Controller{
include "../content/header.php";
include "../content/indexpages.php";
?>
<body>
    <div id="wrapper">

<?php
include "../content/sidebarmenu.php";
echo    '<div id="page-wrapper">';

//include "../content/footer.php";


//include "/content/sidemenu.php";
//include "../content/content.php";
//include "../content/header.php";
// like '%".$search."%'
//fetch.php

$output = '';



	
if(isset($_POST["rech"]))
{
 $search = trim($_POST["rech"]);

 /* $query = "
  SELECT  llx_command_filedet.rowid,  llx_command_filedet.card_number, llx_command_filedet.holder_name, llx_command_files.clt_reference, llx_command_files.file_reception_start FROM llx_command_filedet
inner join   llx_command_files
on llx_command_filedet.fk_object=llx_command_files.rowid
  WHERE card_number LIKE '%".$search."%' ".isuserBank('llx_command_filedet')." group by card_number";
*/
 $query = "
SELECT 
    llx_command_filedet.rowid,
    llx_command_filedet.card_number,
    llx_command_filedet.holder_name,
    llx_command_files.clt_reference,
    llx_command_files.file_reception_start
FROM
    llx_command_filedet,    
    llx_command_files ,
	llx_command_extractions
WHERE
	llx_command_filedet.fk_object = llx_command_files.rowid
   and llx_command_filedet.card_number ='".$search." '
  

GROUP BY llx_command_filedet.card_number ".isuserBank('llx_command_filedet');
}
else
{
 $query = "SELECT * FROM llx_command_filedet ".(!empty(isuserBank(''))?'where '.str_ireplace(['and','.'],'',isuserBank('')):'')." ORDER BY card_number";
echo $query;
 }
 
$result = mysqli_query($coonect, $query);

if(mysqli_num_rows($result) > 0)
{
 $output .= '
 <div class="row"></br></br></br>
 <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            DataTable Tracking Card
                        </div>
  <div class="panel-body">
 <form onsubmit="return false;" action="crud_demaneurgence/insertDemandeurgence.php" method="post"> 
 <div width="100%" class="table table-striped table-bordered table-hover">
   <input type="hidden" name="id" id="id" value="">
   <input type="hidden" name="date_reception" id="date_reception" value="">
   <input type="hidden" name="card_number" id="card_number" value="">
   <table class="table table bordered"  >
    <tr>
	<th>+</th>
     <th>Card Number</th>
     <th>nom</th>
     <th>reference</th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
	<td><input type="radio" data-id="'.$row['rowid'].'" data-num-card="'.$row['card_number'].'" data-date="'.  $row['file_reception_start'].'"  name="line" /></td>
    <td>'.$row["card_number"].'</td>	
    <td>'.$row["holder_name"].'</td>
    <td>'.$row["clt_reference"].'</td>
   </tr>
  ';
 
  
  
 }
 echo $output;
 ECHO '</table><center><input type="checkbox" name="cart" vlaue="Cart"> Cart 
 					   <input type="checkbox" name="pin" vlaue="Pin"> Pin 
 					   <br><br><br> 
 		<input data-check="check'.$row["rowid"].'" type="submit"  value="valider"/></center>';
echo "</form></div></div>";
 }
else
{
 echo '<h1>numero de carte  introuvable</h1>';
}

</div>
</div>

 <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
	<style>
	</style>
	<script>
	$(document).ready(function(){
		$('body').on('click','input[type="radio"]',function(){
			$('#id').val($(this).attr('data-id'))
			$('#date_reception').val($(this).attr('data-date'))
			$('#card_number').val($(this).attr('data-num-card'))
		})
	})
	$(document).submit(function(){
		if($('[type="checkbox"]:checked').length > 0 ){
			$('form').removeAttr('onsubmit');
			setTimeout(function(){
				$('[type="submit"]').click()
				},500)
		
			}else{
			$('form').attr('onsubmit','return false');
			alert(' remplir tous les champs !')
			}
		
	})
	// function submit(rowid){
		// $('#check'+rowid).submit(function(){
			// if($(this).find('[type="checkbox"]:checked').length > 0 ){
				// console.log($('#check'+rowid).serialize())
			// }else{
				// alert()
			// }
		// })
		// }
		
		// $('form').on('submit', function () {
				// if($(this).find('[type="checkbox"]:checked').length > 0 ){
				// console.log($('#check'+rowid).serialize()).
					
					// $.ajax({
						// url:'fetchdemnedurg.php',
						// type:'get',
						// data:$(this).serialize(),
						// success:function(){
						
						// }
					// });
					
				// }else{
					
				// }
			// });
	</script>
	