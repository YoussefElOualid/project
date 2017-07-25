<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Controller {
  function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('encrypt');
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->config('finacards');
        $this->load->model('Model_request_finacards');
        $this->load->model('Pdfmaker');
          
   //   echo str_replace("%p", "salah", $this->session->userdata("isUserBank"));
   // exit();
    }

####################################################################################
#                               Permissions Users                                  #
####################################################################################

    function getConfigPermission(){
        $uri = $this->uri->segment(2);
        $configPermission = $this->config->item('pages');
        if(in_array($uri, array_keys($configPermission))){
            return $configPermission[$uri];
        }else{
            return [];
        }
    }

    function verifyPermission(){
        $var_config =$this->getConfigPermission();
        if(in_array($this->session->userdata('user_type'), $var_config['roles'])){
            $this->loadPagesInPermission($var_config);
        }else{
            redirect('getPermission',404);
        }
    }

    function loadPagesInPermission($config){

        if ($this->session->userdata('cp_admin_login') == 1)
        {
            $config_page = [
                'path'=>"pages",// hada dossier li fih les pages
                'page'=>$config['page'],
                 // hadii page li ghadi naffiche
                'title_page_current'=>$config['title_page'], // hada title dyal page lfoo9 ,
                'menus'=>$this->MenusByPermission(),
                'DataToPage'=> in_array('query', array_keys($config))?$this->RuntimeFunctionWithConfig($config['query']):""
            ];
            $this->load->view('index',$config_page);

        }else{
            redirect(base_url(),'refresh');
        }
    }
####################################################################################
#                               Generate Menu Left                                 #
####################################################################################
    function MenusByPermission(){
                          $chlids = $this->config->item('pages');
                          $parents= $this->config->item('parents');
                          $menus  = [];
                          $type   = $this->session->userdata('user_type');      
            // Test  getAccueil is found !!
            $menus['isAccueil'] = (in_array('getAccueil', array_keys($chlids)));
            $menus['Accueil']   = $menus['isAccueil']?$chlids['getAccueil']:[];
            // generate other menu
            foreach ($parents as $key => $value) {
                if(in_array($type,$value['roles'])){
                    $menus[$key]['label_parent'] = $value['label'];
                    $menus[$key]['icon_parent']  = $value['icon'];
                    foreach ($chlids as $k => $val) {
                        if($val['parent'] == $key){
                            $menus[$key]['child'][] = ['label' => $val['label'],
                                                       'page' => $k
                                                      ];
                        }
                    }
                }
            }
            return $menus;
    }
   

###################################################################################
#                   call function form finacards config                           #
###################################################################################
    function RuntimeFunctionWithConfig($query)
    {
        $data=[]; $output = [];
        @preg_match("/(function):(.*)@(args):(.*)/", $query, $output);
        if(count($output) > 3){
        $data = $this->Model_request_finacards->{$output[2]}($output[4]);
        }
        return $data;
    }
###################################################################################
#           Render all Pages in File Config With Verify Permission                ####################################################################################

    //   function poure les pages
    function getPages($getPage){
        echo $this->session->userdata('label');


      $this->verifyPermission();

    }
    function getPermission(){
        $this->load->view("errors/permission");
    }








    //pdf

    public function getpdf(){
         $data['label'] = $this->input->post('label');
        $data['deb'] = $this->input->post('deb');
        $data['fin'] = $this->input->post('fin');
//        $data['dataRes'] = $this->Pdfmaker->getDataTopdf(); 
        $this->load->view('pdf/pdfmaker',$data);

    }



public function getpdfProdCarte(){
        $data['label'] = $this->input->post('label');
        $data['deb'] = $this->input->post('deb');
        $data['fin'] = $this->input->post('fin');
        $data['dataRes'] = $this->Pdfmaker->getDataTpTBPC(); 
        $this->load->view('pdf/pdftabDebordcarte',$data);

    }


    public function getpdfProdCartePin(){   
        $data['label'] = $this->input->post('label');
        $data['deb'] = $this->input->post('deb');
        $data['fin'] = $this->input->post('fin');
        $data['dataRes'] = $this->Pdfmaker->getDataTpTBPIN(); 
        $this->load->view('pdf/pdftabDebordpin',$data);
  

    }


     public function getpdfContFabriCationRejets(){
        $data['label'] = $this->input->post('label');
        $data['deb'] = $this->input->post('deb');
        $data['fin'] = $this->input->post('fin');
        $data['dataRes'] = $this->Pdfmaker->getDataControleFabriRejets(); 
        $this->load->view('pdf/pdfControlDeFabricationRejets',$data);
  

    }

      public function getpdfEtatDuStock(){
          $data['label'] = $this->input->post('label');
        $data['deb'] = $this->input->post('deb');
        $data['fin'] = $this->input->post('fin');
        $data['dataRes'] = $this->Pdfmaker->getDataEtatDuStock(); 
        $this->load->view('pdf/pdfEtatDuStock',$data);
  

    }
     public function getpdfProdCartePinCroise(){
       $data['label'] = $this->input->post('label');
        $data['deb'] = $this->input->post('deb');
        $data['fin'] = $this->input->post('fin');
        $data['dataRes'] = $this->Pdfmaker->getDataTpTBPINCroise(); 
        $this->load->view('pdf/pdftabDebordpin(croise)',$data);
  

    }


    public function getDemendUrgence(){

     $data['reche']=$this->input->post('rech');
     $data['dataRes']=$this->Model_request_finacards->getDemUrg($this->input->post('rech'));
     $Rechercher = $this->load->view('pages/production/operationUrgence/RehcercheDemandeUrgence',$data);
     return $Rechercher;
    }



// insert demande durgence
    public function getinsertdUrgence(){ 
     $data['id']=$this->input->post('id');
     $data['date_recept']=$this->input->post('date_reception');
     $data['card_number']=$this->input->post('card_number');
     $data['type'] = $this->input->post('option');

     $data['dataRes']=$this->Model_request_finacards->insertDemandeUrgnce($data);
    $Rechercher = $this->load->view('pages/production/operationUrgence/insertDemandeUrgence',$data);
     return $Rechercher;
    
 }
//Demande d'urgence v 2 
// hadak l formlulaire nn dyal page a sat
  public function getinsertdUrgenceNew(){
     // $data['id']=$this->input->post('id');
     $data['Num_carte']=$this->input->post('numcarte');
     $data['nom_poretur']=$this->input->post('nom');
     $data['type'] = $this->input->post('option');
     $data['action'] =$this->input->post('action');
  
 $is  = $this->Model_request_finacards->insertDemandeUrgnceVers(
    $data); 


    
      if($is){
        echo '<link href="'.base_url().'assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
 <div class="alert alert-success text-center" >
        <h2 style="color:#fff !important;">Merci,Votre commande a bien été enregistrée</h2>
        <a href="'.base_url().'" class="btn btn-xs btn-danger">page d\'accueil </a>
 </div>';
     }else{



        echo 'Introuvable';
     }
    
 }

   //insert AgEnCe and update 
    public function insertDemandeUrgence(){
     $bank_code_country = explode('|',$this->input->post('bank_code_country'));
     $data['nomAge']=$this->input->post('label');
      $data['codebank']=$bank_code_country[0];
      $data['adress1']=$this->input->post('addres1');
      $data['adress2']=$this->input->post('addres2');
      $data['adress3']=$this->input->post('addres3');
      $data['codeAge']=$this->input->post('codeAg');
      $data['codeVille']=$this->input->post('codeV');
        $data['codePays']=$bank_code_country[1];
        $data['rowid'] = $this->input->post('rowid');

     $data['dataRes']=$this->Model_request_finacards->insertAgence($data);
     $Rechercher = $this->load->view('pages/production/operationUrgence/insertDemandeUrgence',$data);
     return $Rechercher;    
    }



    //update Agence

    public function AgEnCeUpdate(){

      $bank_code_country = explode('|',$this->input->post('bank_code_country'));
      $data['nomAge']=$this->input->post('label');
      $data['codebank']=$bank_code_country[0];
      $data['adress1']=$this->input->post('addres1');
      $data['adress2']=$this->input->post('addres2');
      $data['adress3']=$this->input->post('addres3');
      $data['codeAge']=$this->input->post('codeAg');
      $data['codeVille']=$this->input->post('codeV');
      $data['codePays']=$bank_code_country[1];

    }

//Insert utlisateur




  public function getinsertUtlisateur(){
    $bank_code_country = explode('|',$this->input->post('bank_code_country'));
     $data['nomuser']=$this->input->post('nomuser');  
     $data['mail']=$this->input->post('email');
     $data['passuser']=$this->input->post('pass');
     $data['passcrypted']= hash('sha256',$this->input->post('pass') );
     $data['loginuser']=$this->input->post('login');
     
     $data['bank'] = $bank_code_country[0];
     $data['typeuser']=$this->input->post('type');
     $data['label']=$bank_code_country[1];

   //test 

     $data['rowid'] = $this->input->post('rowid');

//     $data['rowid'] = $this->input->post('idusers');

// ID USER ID 
  //   $data['id'] = $this->input->post('idusers');



    
     $data['dataRes']=$this->Model_request_finacards->InsertUtlisateur($data);
      $Rechercher = $this->load->view('pages/production/operationUrgence/insertDemandeUrgence',$data);
     return $Rechercher;
    }






public function updateurgence(){
     $id=$this->input->post('id');
     $action =$this->input->post('action');
     $is  = $this->Model_request_finacards->updateurgence($id,$action);    
     if($is){
        echo '<link href="'.base_url().'assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
 <div class="alert alert-success text-center" >
        <h2 style="color:#fff !important;">Merci,Votre commande a bien été enregistrée</h2>
        <a href="'.base_url().'" class="btn btn-xs btn-danger">page d\'accueil </a>
 </div>';
     }
}

  

// cherceh Pan 

    public function getChechePan(){
    
    $data['rech']=$this->input->post('search_text');
     $data['dataRes']=$this->Model_request_finacards->getchPan($this->input->post('search_text'));
     $Rechercher = $this->load->view('pages/production/getpan',$data);

     return $Rechercher;
   
    }


// agence


      public function getinsertAgence(){
       $bank_code_country = explode('|',$this->input->post('bank_code_country'));
       $data['nomAge']=$this->input->post('label');
        $data['codebank']=$bank_code_country[0];
        $data['adress1']=$this->input->post('addres1');
        $data['adress2']=$this->input->post('addres2');
        $data['adress3']=$this->input->post('addres3');
        $data['codeAge']=$this->input->post('codeAg');
        $data['codeVille']=$this->input->post('codeV');
        $data['codePays']=$bank_code_country[1];
        $data['rowid'] = $this->input->post('rowid');

       $data['dataRes']=$this->Model_request_finacards->insertAgence($data);
       $Rechercher = $this->load->view('pages/production/operationUrgence/insertDemandeUrgence',$data);
     return $Rechercher;
    }


/// CHANGE PASSWORD





  public function updatePwd(){
        $this->load->library('form_validation');
$this->form_validation->set_rules('firstpasse','Current Paswword','required|alpha_numeric|min_length[6]|max_length[20]');

$this->form_validation->set_rules('newpasse','New Paswword','required|alpha_numeric|min_length[6]|max_length[20]');

$this->form_validation->set_rules('confpasse','Confirm Paswword','required|alpha_numeric|min_length[6]|max_length[20]');

if($this->form_validation->run()){

   $curr_password = $this->input->post('firstpasse');
 
      $new_password = $this->input->post('newpasse');
        $conf_password = $this->input->post('confpasse');
        $this->load->model('querys');

        $userid=  $this->session->userdata('user_id');
         $passwd = $this->querys->getCurrPassword($userid);
     


         if ($passwd->pass_native === $curr_password) {

       if  ($new_password == $conf_password) {
       
       if ($this->querys->updatePassword($new_password,$userid))
     {

  echo ' <div calss="row"   <div class="alert alert-success" role="alert">
                          
                               
                            </button>
                            Votre <strong>Mot de passe</strong> a été modifié avec succès !
                        </div></div>';  
              $this->session->set_userdata('pwd_native',$new_password);
                              }
               
      else{

        echo 'Failed to update password';
      }
   

   } //2 IF
    else{
     echo 'New password and Confirm  is not matching';
     }   
   
      }// first if 

  else{

echo 'Sorry! Current password is not matching';

  }

}
 else{

    echo validation_errors();
   }



   } 


   // public function getExistNumberCard()
   // {
   //    $num = $this->input->get('num');
   //    $query = "select * from llx_command_filedet where card_number = ".$num;
   //    $res = $this->db->query($query);
   //    echo json_encode([
   //                  'count'=>$res->num_rows(),
   //                  'data' => $res->result()
   //                  ]);
   // }

/// test Demande d Urgecne dernier Version

  public function getinsertdUrgenceNewPlop(){ 
     // $data['id']=$this->input->post('id');
     $data['Num_carte']=$this->input->post('numcarte');
     $data['nom_poretur']=$this->input->post('nom');
     $data['type'] = $this->input->post('option');
     $data['action'] =$this->input->post('action');
  
 
  $data['dataRes']= $this->Model_request_finacards->getdemandeUrgencev3(
    $this->input->post('numcarte')); 
  $new = $this->load->view('pages/production/newurgence',$data);
  return $new;
// if($is){
//   

//      return $new;

//     }
 //      if($is){
 //        echo '<link href="'.base_url().'assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
 // <div class="alert alert-success text-center" >
 //        <h2 style="color:#fff !important;">Merci,Votre commande a bien été enregistrée</h2>
 //        <a href="'.base_url().'" class="btn btn-xs btn-danger">page d\'accueil </a>
 // </div>';
 //     }
     // else{

     //    echo 'Introuvable';
     // }
    
 }





 }

   