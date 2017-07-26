<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

//$route['default_controller'] = "login";
$route['default_controller'] = "home/view";
$route['404_override'] = '';

$route['email'] = 'Email_Controller';



$secure_login="login";

$login_exceptions=array(
"0"=>"index",
"1"=>"ajax_login",
"2"=>"validate_login",
"3"=>"logout",
"4"=>"getutil",
"5"=>"UpdateAccount",
"6"=>"indxeuser"
);

foreach($login_exceptions as $u) {
    $route[$u] = "$secure_login/".$u;
    $route[$u."/(.*)"] = "$secure_login/".$u.'/$1/$1/$1';
}

$secure_pages="pages";

$pages_exceptions=array(
"0"=>"index",
"1"=>"getPages",
"2"=>"getPermission",
//impression 
"3"=>"getpdf",//2
"4	"=>"getpdfProdCarte",//1
"5"=>"getpdfProdCartePin",//3
"4"=>"getpdfProdCartePinCroise",
"6"=>"getpdfContFabriCationRejets",//5
"7"=>"getpdfEtatDuStock",
"8"=>"getDemendUrgence",
"9"=>"getinsertdUrgence",
"10"=>"updateurgence",
"11"=>"getinsertAgence",
"12"=>"getChechePan",
"13"=>"getinsertdUrgenceNew",
"14"=>"passe",
"15"=>"getinsertUtlisateur",
"16"=>"indxeuser",
"17"=>"updatePwd",
"18"=>"getExistNumberCard",
"18"=>"getinsertdUrgenceNewPlop"
);

foreach($pages_exceptions as $u) {
    $route[$u] = "$secure_pages/".$u;
    $route[$u."/(.*)"] = "$secure_pages/".$u.'/$1/$1/$1';
}

/* End of file routes.php */
/* Location: ./application/config/routes.php */