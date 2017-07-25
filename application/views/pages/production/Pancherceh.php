
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                  <div class="login-panel panel panel-default">
                    <div class="panel-heading">

                        <h3 class="panel-title">Recherche Par Pan</h3>
                    </div>
                       
                        <div class="panel-body">
       
              <form onsubmit="return GO(this)"  action="<?php echo base_url()?>/getPages/getChechePan" method="post">
            
 <fieldset>
                        <!-- /.panel-heading -->     
  <!--  <h2 align="center">Recherche pas numero de carte</h2><br /> -->
   <div class="form-group">
   
   
     <input type="text" name="search_text" id="search_text" placeholder="Recherche par numéro de carte(Pan)" class="form-control" />
     </div>
     <div  class="form-group" >
     <input type="submit" class="btn btn-primary btn-sm form-control" value="Cherche" 
    </div>
     </fieldset>
   </form>
  
</div>
   
 
   </div>
   <div id="result"></div>
   </div>
   </div>

<script type="text/javascript">
    function GO($ele) {
        $.ajax({
            url:$($ele).attr('action'),
            type:$($ele).attr('method'),
            data:$($ele).serialize(),
            success:function(data){
                $('.page-content-inner').html(data);
            }
        })
        return false;
    }
</script>