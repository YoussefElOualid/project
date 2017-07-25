<section class="panel">
        <div class="panel-heading">
            <h3>
           Tableau Contrôle de Fabrication (Rejets)
   
            </h3></br>

        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-12">
                  
                    
                    <br />
                    <div class="margin-bottom-10">
                    <form class="form-inline"   method="post" action="<?=base_url()?>getpdfContFabriCationRejets">

     <input type="hidden" value="<?=$this->session->userdata('label')?>" name="label"/>
        
    <div class="form-group" >
    <label for="deb"><b>Du:</b></label>
    <input type="text" class="form-control datepicker" name="deb">
  </div>
  <div class="form-group">
    <label for="fin"><b>Au:</b></label>
    <input type="text"   class="form-control datepicker"   name="fin">
  </div>  

  
  <button type="submit" class="btn btn-primary">Imprimer</button>
</form>

                   </div>
                </div>
            </div> 
        </div>  
            <script type="text/javascript">
             
          
    $(function(){
      $('.datepicker').datepicker();
      });
      </script>  
           
           