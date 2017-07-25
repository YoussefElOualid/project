      
       <form onsubmit="return GO(this);" action="<?=base_url()?>updateurgence" method="post">
           <div class=" col-lg-12">
      		<input type="hidden" name="id" value="<?=$dataRes;?>">
      		<input id="action" type="hidden" name="action" value="">
		<br><br><br><br><br><br><br>
		<div class="panel panel-default">
			<div class="panel-heading"><label>Votre Card number est : <?=$card_number;?></label></div>
			<div class="panel-body">
						    <div class="row form-group">
		  <div class="col-lg-12">
		    <div class="input-group">
		      <span class="input-group-addon">
		        <input type="radio" required name="tcheck" data-name="center" aria-label="...">
		      </span>
		      <label class="form-control" >Center monitique</label>
		    </div><!-- /input-group -->
		  </div>
		  </div><div class="row form-group">
		  <div class="col-lg-12">
		    <div class="input-group">
		      <span class="input-group-addon">
		        <input type="radio" required name="tcheck" data-name="agence" aria-label="...">
		      </span>
		      <label class="form-control" >Agence</label>
		    </div><!-- /input-group -->
		  </div>
		  </div><div class="row form-group">
		  <div class="col-lg-12">
		    <div class="input-group">
		      <span class="input-group-addon">
		        <input type="radio" required name="tcheck" data-name="text" aria-label="...">
		      </span>
		      <input type="text"   placceholder="
Adresse de livraison" class="form-control" id="text_" name="adress" aria-label="...">
		    </div><!-- /input-group -->
		  </div>
		  </div>
<div class="row form-group text-center">
		  <div class="col-lg-12">
		  <input type="submit" name="" value="valider" class="btn btn-primary">
		  </div>
		  </div>

			</div>
		</div>
</form>
  </div>
  </div>
<script type="text/javascript">
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
    function GO($ele) {
        $.ajax({
            url:$($ele).attr('action'),
            type:$($ele).attr('method'),
            data:$($ele).serialize(),
            success:function(data){sat lach hadchi kamel??
                $('.page-content-inner').html(data)
            }
        })
        return false;
    }
</script>