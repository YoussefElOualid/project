<?php
$output = "";
$rows = $dataRes;
if( count($rows) >0)
{

 $output .= '
 <div class="row"></br></br></br>
 <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Demande d urgence
                        </div>


  <div class="panel-body">
 <form onsubmit="return GO(this);" action="'.base_url().'getinsertdUrgence" method="post"> 
 <div width="100%" class="table table-striped table-bordered table-hover">
   <input type="hidden" name="id" id="id" value="">
   <input type="hidden" name="date_reception" id="date_reception" value="">
   <input type="hidden" name="card_number" id="card_number" value="">
   <input type="hidden" name="option" id="option" value="">
   <table class="table table bordered"  >
    <tr>
	<th>+</th>
     <th>Card Number</th>
     <th>nom</th>
     <th>reference</th>
    </tr>
 ';
 foreach($rows as $row)
 {
  $output .= '
   <tr>
	<td><input required type="radio" data-id="'.$row->rowid.'" data-num-card="'.$row->card_number.'" data-date="'.  $row->file_reception_start.'"  name="line" /></td>
    <td>'.$row->card_number.'</td>	
    <td>'.$row->holder_name.'</td>
    <td>'.$row->clt_reference.'</td>
   </tr>
  ';


 }
 echo $output;
 ECHO '</table><center><input type="checkbox" name="cart" value="Cart"> Carte 
 					   <input type="checkbox" name="pin" value="Pin"> Pin 
 					   <br><br><br> 
 		<input class="btn btn-primary" data-check="check'.$row->rowid.'" type="submit"  value="valider"/></center>';
echo "</form></div></div>";
 }
else
{
 echo ' 

  <section class="panel">
        <div class="panel-heading">
            <h3>
                Modal Alerts
                
            </h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-12">
                    
                       <div class="alert alert-warning" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong>Numéro de carte Introuvable!</strong> version 2 <a href="<?=base_url()?>getPages/getdemande_urg/getdemande_urggence" class="alert-link">not looking too good</a>
                        </div>
                </div>
            </div>
        </div>
    </section>


 ';








}




?>
</div>
</div>
<script>
        $type = [];
        $options = [];
  $(document).ready(function(){
    $('body').on('click','input[type="radio"]',function(){
      $('#id').val($(this).attr('data-id'))
      $('#date_reception').val($(this).attr('data-date'))
      $('#card_number').val($(this).attr('data-num-card'))
    })


  })
        function GO($ele){
        $('[type="checkbox"]').each(function(e,i){
        if($.inArray($(i).val(),$options) == -1 && $(i).prop( "checked" )){
              $options.push($(i).val())
            }
        })
          $("#option").val($options.join());

        if($('[type="checkbox"]').length > 0){
        if($('[type="checkbox"]:checked').length > 0 ){
            $.ajax({
                url:$($ele).attr('action'),
                type:$($ele).attr('method'),
                data:$($ele).serialize(),
                success:function(data){
                    $('.page-content-inner').html(data)
                }
            })

        }else{
          alert(' remplir tous les champs !')
          }
        }
            return false;
        }
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

