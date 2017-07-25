<style>
td.child ul li {
    display: inline;
    margin: 0 40px;
}

td.child ul {
    display: inline;
	margin-left:100px
}
</style>
<?php

$result = $DataToPage;

      $data = [];
      $dataKeys = [];
      foreach ($result as $u){
        // push valeus to data
        $data[] = (array)$u;

        // get names columns
        $dataKeys = array_keys((array)$u);
      }


    function VerifyEtat($data,$dataKeys){
      $dataEtat = [];// Pour Manipulication
      $dataGlobal =[]; // Parent Table Pour affichage Html
        // Bouclé Sur Data Et test Condition 
        foreach ($data as $i => $v) {
          // push import key in first case dataEtat
          $dataEtat[] = trim($v['import_key']);

          if($v['file_reception_start'] == null){
          $dataEtat = explode(',',str_repeat("Non traité,", 11));
          }
          if($v['pin_postage_end'] !== null){
          $dataEtat = explode(',',str_repeat("Delivery,", 11));
          }

         foreach ($dataKeys as $w => $e) {
            $start = @(count(explode('start',$e))==2?true:false);
            $end   = @(count(explode('end',$dataKeys[$w+1]))==2?true:false);

           if($start and $end){  
            if($start and $v[$e] !== null and $end and $v[$dataKeys[$w+1]] !== null){
              $dataEtat[] = ' <button type="button" class="btn btn-primary">
      
   Terminé 
  </button>';
            }

            if($start and $v[$e] !== null and $end and $v[$dataKeys[$w+1]] == null){
              $dataEtat[] =' <button type="button" class="btn btn-success">
     En Cours 
  </button>';
            }
            if($start and $v[$e] == null and $end and $v[$dataKeys[$w+1]] == null){
              $dataEtat[] = ' <button type="button" class="btn btn-warning">
    En Attente  
  </button>';
            }
          }


          }
            $dataGlobal[] = $dataEtat;
            $dataEtat=[];
        }
        return $dataGlobal;
    }

?>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tables</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            DataTable Tracking Card
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table class="table table-hover nowrap" id="example1" width="100%">
                                <thead>
                                    <tr>
                                        <th>Num Commande<span class="glyphicon glyphicon-arrow-down" ></span></th>
                                        <th>file<br>reception</th>
                                        
                                        <th>file<br>control</th>
                                        
                                        <th>file<br>dataprep</th>
                                        
                                        <th>card<br>perso</th>
                                        
                                        <th>card<br>condit</th>
                                        
                                        <th>card<br>exped</th>
                                        
                                        <th>card<br>delivery</th>
                                        
                                        <th>pin<br>edition</th>
                                        
                                        <th>pin<br>condit</th>
                                        
                                        <th>pin<br>exped</th>
                                        
                                        <th>pin<br>postage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach (VerifyEtat($data,$dataKeys) as $key => $line){
                                     echo '<tr><td align="center">'.implode('</td><td align="center">',$line).'</td></tr>';
                                    };?>
                                    
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

