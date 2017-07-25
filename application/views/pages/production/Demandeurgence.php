
       
            <div class="col-lg-4 col-lg-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Demande d'urgence</h3>
                    </div>
                    <div class="panel-body"> 
                        <form role="form" method="post" onsubmit="return GO(this)" action="<?php  echo base_url() ?>getDemendUrgence">

                       <?php 
      // if($this->uri->segment(2) == "inserted")  
      //      {  
           //base url - http://localhost/tutorial/codeigniter  
           //redirect url - http://localhost/tutorial/codeigniter/main/inserted  
                //main - segment(1)  
                //inserted - segment(2)  
           //      echo '<p class="text-success">Data Inserted</p>';  
           // }  
                           
                          ?>
                            <fieldset>
                                <div class="form-group">
                                    <label>Pan:</label><input required  placeholder="Numéro de Carte (Pan)" class="form-control" name="rech" type="text" autofocus>
                                </div>
                                                                <div class="checkbox-inline">

                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" class="btn btn-primary btn-sm" value="Rechercher"/>
								
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
       
   
		 
           <script type="text/javascript">
                function GO($ele){
                    $.ajax({
                      url:$($ele).attr('action'),
                      type:$($ele).attr('method'),
                      data:$($ele).serialize(),
                      success:function(data){
                      $('.page-content-inner').html(data)
                      }
                    })

                return false;
             }

 $(document).ready(function(){
    $('body').on('click','input[type="radio"]',function(){
      $('#id').val($(this).attr('data-id'))
      $('#date_reception').val($(this).attr('data-date'))
      $('#card_number').val($(this).attr('data-num-card'))
    })
  })
           </script>

          