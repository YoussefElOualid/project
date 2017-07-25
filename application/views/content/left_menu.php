<style>

.left-menu-inner{
    
   /* width: 150px;*/
    overflow-y: scroll;
  /*  top: 0;
    bottom: 0;
}*/

}
    #style-3::-webkit-scrollbar-track
{
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3) !important;
    background-color: #F5F5F5 !important;
}

#style-3::-webkit-scrollbar
{
    width: 6px !important;
    background-color: #F5F5F5 !important;
}

#style-3::-webkit-scrollbar-thumb
{
    background-color: #000000 !important;
}
</style>


<nav class="left-menu" left-menu="">
    <div class="logo-container">
        <a href="<?=base_url('getPages/getAccueil')?>" class="logo">
            <img src="<?php base_url(); ?>/www/assets/common/img/18.png" alt="extranet">
            <img class="logo-inverse" src="<?php base_url(); ?>/www/assets/common/img/logo-inverse.png" alt="FinaCards">
        </a>
    </div>
    <div class="left-menu-inner scroll-pane" style="overflow: hidden; padding: 0px; width: 239px;">

        <div class="jspContainer" id="style-3" style="width: 239px; height: 500px;">
            <div class="jspPane" style="padding: 0px; top: 0px; left: 0px; width: 239px;">
                <ul class="left-menu-list left-menu-list-root list-unstyled">
                    <?php 
                        if($menus['isAccueil']){
                    ?>                 
                    
                        <!-- -->
                    </li>
                    <li class="left-menu-list">
                        <a class="left-menu-link" href="<?=base_url('getPages/getAccueil')?>">
                            <i class="left-menu-link-icon icmn-home2"><!-- --></i>
                            <span class="menu-top-hidden">Acceuil</span> 
                        </a>
                    </li>

                    <li class="left-menu-list-separator"></li>
                    <?php }?>

                    <?php // sat ra kaynin broblem 5or f l menu matybanch kamel chof
                    function array_value_recursive($key, array $arr){
                        $val = array();
                        array_walk_recursive($arr, function($v, $k) use($key, &$val){
                            if($k == $key) array_push($val, $v);
                        });
                        return count($val) > 1 ? $val : array_pop($val);
                    }

                    foreach ($menus as $key => $value) {
                        if($key > 0){
                            $active = "";
                            $index = $this->uri->segment(2);
                               if(in_array('child', array_keys($value)) ){
                                foreach ($value['child'] as $key => $test) {
                                           if($index == $test['page'])
                                             {
                                            $active = "left-menu-list-opened left-menu-list-active";
                                               }
                                }

                               } 
                    ?>
                    <li class="left-menu-list-submenu <?=$active?> ">
                        <a class="left-menu-link" href="javascript: void(0);">
                            <i class="<?=$value['icon_parent']?>"><!-- --></i> 
                            <?=$value['label_parent']?>
                        </a>
                        <ul class="left-menu-list list-unstyled" 
                        style="<?=strlen($active)>0?"display: block;":"display: none;"?>">
                            <?php 
                                if(in_array('child', array_keys($value))){
                                foreach ($value['child'] as $y => $v) {
                             ?>
                            <li>
                                <a class="left-menu-link" href="<?=base_url('getPages').'/'.$v['page']?>">
                                    <?=$v['label']?>
                                </a>
                            </li>
                            <?php } }?>
                        </ul>
                    </li>
                    <li class="left-menu-list-separator">
                        <!-- -->
                    </li>
                    <?php }  ?>
                    <?php }  ?>

                </ul>
            </div>
        </div>
    </div>
</nav>