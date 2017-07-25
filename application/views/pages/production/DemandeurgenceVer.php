      <div class="col-lg-4 col-lg-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Demande d'extraction</h3>
                    </div>
                    <div class="panel-body"> 
                        <form role="form" method="post" onsubmit="return GO(this)" action="<?php  echo base_url() ?>getinsertdUrgenceNewPlop">
                        
                        <input type="hidden" name="option" id="option" value="">
                        <input id="action" type="hidden" name="action" value="">

                       <?php 
      // if($this->uri->segment(2) == "inserted") getinsertdUrgenceNew getinsertdUrgenceNewPlop 
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
                                    <label>Numéro de Carte</label><input required  placeholder="Numéro de Carte (Pan)" class="form-control" id="numcarte" name="numcarte" type="text" autofocus>
                                </div>


                                 <div class="form-group">
                                    <label>Nom  de porteur:</label><input required  placeholder="Nom de porteur" class="form-control" name="nom" type="text" autofocus>
                                </div>

                                 
                        <label>Methode de livraison:</label> 
                <div class="input-group">
                 
          <span class="input-group-addon">
            <input type="radio" required name="tcheck" data-name="center" aria-label="...">
          </span>
          <label class="form-control" >Centre Monétique</label>
        </div><!-- /form-group -->

            <div class="input-group">
          <span class="input-group-addon">
            <input type="radio" required name="tcheck" data-name="agence" aria-label="...">
          </span>
          <label class="form-control" >Agence</label>
        </div><!-- /input-group -->

        <div class="input-group">
          <span class="input-group-addon">
            <input type="radio" required name="tcheck" data-name="text" aria-label="...">
          </span>
          <input type="text"   placeholder="
Adresse de livraison" class="form-control" id="text_" name="adress" aria-label="...">
        </div><!-- /input-group --></br></br>
     



                                <div class="form-group">
                                <center><input type="checkbox" name="cart" value="Cart"> Carte 
             <input type="checkbox" name="pin" value="Pin"> Pin 
             <br><br><br> 
       
                                                                
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" class="btn btn-primary btn-sm" value="
Insérer"/>
								
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
<script>
$options = [];
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

  $('[type="radio"]').on('click',function(){
    switch($(this).attr('data-name')){
      case 'center':$('#action').val("Center monitique");break;
      case 'agence':$('#action').val("Agence");break;
      case 'text':$('#action').val($('#text_').val());break;
    }
  })
  $('#text_').on('input , keyup',function(){
    if($('[data-name="text"]').prop('checked')){
      $('#action').val($(this).val());
    }
  })
  // $('#numcarte').on('input',function(){
  //   if($(this).val().length == 16){
  //     $.getJSON('<?=base_url()?>getExistNumberCard',{num:$(this).val()},function(e){

  //         if(e.count == 0){
  //           alert('makinch f db')
  //         }else{
  //           alert(JSON.stringify(e)+" Oui - Non ")
  //         }
  //     })
  //   }
  // })
</script>