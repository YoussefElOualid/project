
<nav class="top-menu">
    <div class="menu-icon-container hidden-md-up">
        <div class="animate-menu-button left-menu-toggle">
            <div><!-- --></div>
        </div>
    </div>
    <div class="menu">
        <div class="menu-user-block">
            <div class="dropdown dropdown-avatar">
                <a href="javascript: void(0);" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <span class="avatar" href="javascript:void(0);">
                        <img src="<?php echo base_url();  ?>
assets/common/img/temp/avatars/1.jpg" alt="Alternative text to the image">
                    </span>
                </a>
                <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="" role="menu">
                    <a class="dropdown-item" href="javascript:void(0)"><i class="dropdown-icon icmn-user"></i> Profile : <?=$this->session->userdata('user_name');?></a>

                  <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?=base_url()?>getPages/update_passe"><i class="dropdown-icon fa fa-repeat"></i>Changer le mot de passe</a>
                 
                 
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?=base_url('logout')?>"><i class="dropdown-icon icmn-exit"></i>Déconnexion</a>
                </ul>
            </div>
        </div>
       

       
    </div>
</nav>
