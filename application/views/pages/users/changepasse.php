<section class="panel">
        <div class="panel-heading">
            <h3>
               	
Changer le mot de passe
                
            </h3>
        </div>
        <div class="panel-body">
 <div class="row">
<input type="hidden" id="pwd_current" name="pwd_current" value="<?=$this->session->userdata('pwd_native');?>">
<form method="post" onsubmit='return GO(this)' action="<?=base_url('updatePwd')?>">
<div class="form-group">
 <label class="form-label" for="firstpasse">Actuel</label>
 <input required type="password"  pattern="[A-Za-z0-9_-]{6,}" autofocus class="form-control"  name="firstpasse" placeholder="Entre votre Mot de Passe Actuel">
  <div class="text-danger msgfirst"></div>
</div>


<div class="form-group">
 <label class="form-label" for="newpasse">Nouveau</label>
 <input required type="password"  class="form-control" autofocus pattern="[A-Za-z0-9_-]{6,}" name="newpasse" placeholder="Entre votre Nouveau Mot de Passe">
</div>

<div class="form-group">
 <label class="form-label" for="confpasse">Confirmer</label>
 <input required type="password"   class="form-control" pattern="[A-Za-z0-9_-]{6,}" name="confpasse" placeholder="Confirmer votre Nouveau Mot de Passe">
  <div class="text-danger msgconf"></div>
</div>

<div class="form-group">
 <input type="submit"  class="btn-primary" value="Enregistrer les modifications">
</div>
</form>
</div>
</div>
</section>
<script type="text/javascript">
	 function GO($ele) {
        $('.msgfirst , .msgconf').html('');
        $etat = true;
        if($('#pwd_current').val().trim() !== $('[name="firstpasse"]').val().trim()){  
                $('.msgfirst').html('Mot de Passe Actuel Incorrect');
                $etat = false
        }
        if($('[name="newpasse"]').val().trim() !== $('[name="confpasse"]').val().trim()){  
                $('.msgconf').html('confirmer nouveau mot de passe')
                $etat = false
        }
       
       if($etat){
        $.ajax({
            url:$($ele).attr('action'),
            type:$($ele).attr('method'),
            data:$($ele).serialize(),
            success:function(data){
                
             $('.page-content-inner').html(data)
            }
        })
                }
        return false;
    }
</script>