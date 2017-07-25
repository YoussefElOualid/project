<?php 

$config['pages'] = [ 
					'getAccueil'=>[
								'page'=>'dashboard',
								'roles'=>['admin','user'],
								'label'=>'Accueil',
								'parent'=>'home',
								'level'=>'1',
								'title_page'=>"Accueil"
								],
					# Production
					'getetatprod'=>[
								'page'=>'production/EtatdeProduction',
								'roles'=>['admin','user'],
								'label'=>'Etat de production',
								'parent'=>"1",
								'level'=>'2',
								'title_page'=>"Etat de production",
								'query'=>'function:getSubProdById@args:null'								],
					'getetatrejet'=>[
								'page'=>'production/EtatdeReject',
								'roles'=>['admin','user'],
								'label'=>'Etat de Rejet',
								'parent'=>'1',
								'level'=>'2',
								'title_page'=>"Etat de rejet",
								'query'=>'function:getEtatDeRejectyId@args:null'	
								],
				

				// gestion Stock
				 	'getstock_carte'=>[
				 				'page'=>'production/StockDeCarte',
			 				     'roles'=>['admin','user'],
								'label'=>'Stock de Carte',
								'parent'=>'8',
								'level'=>'2',
								'title_page'=>"Stock de carte",
								'query'=>'function:getStockCarteyId@args:null'
				 				],
				 	'getstock_pin'=>[
				 				'page'=>'production/StockDePin',
								 'roles'=>['admin','user'],
				 				 'label'=>'Stock Pin',
								'parent'=>'8',
								'level'=>'2',
								'title_page'=>"Stock de pin",
								'query'=>'function:getStockPinById@args:null'
				 				],
				 	'getstock_divers'=>[
				 				'page'=>'production/StockDeDivers',
				 				'roles'=>['admin','user'],
				 				 'label'=>'Stock Divers',
								'parent'=>'8',
								'level'=>'2',
								'title_page'=>"Stock de pin",
								'query'=>'function:getStockDiversById@args:null'
				 				],
				 	'getsearch_pin'=>[
				 				'page'=>'production/Pancherceh',
				 				'roles'=>['admin','user'],
				 				 'label'=>'Recherche par Pan',
								'parent'=>'1',
								'level'=>'2',
								'title_page'=>"Recherche de pin"
								

				 				],
				 	'getdemande_urg'=>[
				 				'page'=>'production/Demandeurgence',
				 				'roles'=>['admin','user'],
				 				 'label'=>'Demande d\'urgence',
								'parent'=>'1',
								'level'=>'2',
								'title_page'=>"Demande  urgence"
				 				],

                               'getdemande_urggence'=>[
				 				'page'=>'production/DemandeurgenceVer',
				 				'roles'=>['admin','user'],
				 				 'label'=>'Demande d\'urgence V2',
								'parent'=>'1',
								'level'=>'2',
								'title_page'=>"Demande  urgence"
				 				],


				 							#Impression
				               
				
				   'gettab_prod_cart_imp'=>[
				 				'page'=>'imp/TabDbordProdCartes',
								'roles'=>['admin','user'],
								'label'=>'Tableau de Bord Production Cartes',
								'parent'=>'3',
								'level'=>'2',
								'title_page'=>"Impression Tableau de Bord Production Cartes"
				 				],
				 'gettab_prod_cartcroise_imp'=>[
				 				'page'=>'imp/TabDbordCarteCroise',
								'roles'=>['admin','user'],
								'label'=>'Tableau de Bord Production Cartes (Croisé)',
								'parent'=>'3',
								'level'=>'2',
								'title_page'=>"Impression Tableu de Bord (Croisé) "
				 				
				 				],
				        'gettab_bord_pin'=>[ 
				 				'page'=>'imp/TabbordPin',
				 				'roles'=>['admin','user'],
								'label'=>'Tableau de Bord Pin',
								'parent'=>'3',
								'level'=>'2',
								'title_page'=>"Tableau de Bord Pin"
				 				],
				 'gettab_bord_pin_croise'=>[
				 				'page'=>'imp/TabbordPinCroise',
				 				'roles'=>['admin','user'],
								'label'=>'Tableau de Bord Pin (Croisé)',
								'parent'=>'3',
								'level'=>'2',
								'title_page'=>"Tableau de Bord Pin (Croisé)"
				 				],
				       'gettab_control_rejets'=>[
				 				'page'=>'imp/TabContFabrication',
				 				'roles'=>['admin','user'],
								'label'=>'Tableau Contrôle de Fabrication (Rejets)',
								'parent'=>'3',
								'level'=>'2',
								'title_page'=>"Tableau Contrôle de Fabrication (Rejets)"
				 				],// Tableau Etat Du stock
				 'gettab_etat_stock'=>[
				 				'page'=>'imp/TabEtatStock',
				 				'roles'=>['admin','user'],
								'label'=>'Tableau Etat Du stock',
								'parent'=>'3',
								'level'=>'2',
								'title_page'=>"Tableau Etat Du stock"
				 				],
				// # Pin 
				 'gettab_prod_pin'=>[
				 				'page'=>'pin/ProductionPin',
				 				'roles'=>['admin','user'],
								'label'=>'Production Pin',
								'parent'=>'4',
								'level'=>'2',
								'title_page'=>"Production Pin",
								'query'=>'function:getProdPinById@args:null'
				 				],
								
				      'gettab_prod_pin_re'=>[
				 				'page'=>'pin/ProductionPinRetournes',
								'roles'=>['admin','user'],
								'label'=>'Pin Retournés',
								'parent'=>'4',
								'level'=>'2',
								'title_page'=>"ExtraNet",
								'query'=>'function:getProdPinRetourneById@args:null'
								],
				// #Agence     
				
				 'gettab_agence'=>[
				 				'page'=>'agence/tablesAgence',
				 				'roles'=>['admin','user'],
								'label'=>'Liste d\'agences',
								'parent'=>'5',
								'level'=>'2',
								'title_page'=>"liste Agence",
								'query'=>'function:getAgenceById@args:null,
										  function:getlisteAgence@args:null'
				 				],
				 # Tracking card  
			     'getTrakingcarte'=>[ 
				 				'page'=>'traking/TrakingCarte',
				 				'roles'=>['admin','user'],
								'label'=>'Traking Card',
								'parent'=>'6',
								'level'=>'2',
								'title_page'=>"Traking Carte",
								'query'=>'function:getTrakingCarteById@args:null'
				 				],
								
								
				 		
  //URG
				 				'urgence'=>[
				 				'page'=>'production/demandeUrgence/demandedurgence',
				 				'roles'=>['admin','user'],
								'label'=>'Traking test',
								'parent'=>'9',
								'level'=>'2',
								'title_page'=>"Demande Urgence",
								'query'=>'function:getDemendeUrgeById@args:null'
				 				],
								

								
								
				 # personnalisation			
				  // 'perso_carte'=>[
				 				// 'page'=>'Personalisation',
				 				// 'roles'=>['admin'],
								// 'label'=>'Perso_carte',
								// 'parent'=>'7',
								// 'level'=>'2',
								//'title_page'=>"title dyal kola page"
				 				// ],
		         // 'perso_carte_stock'=>[
				 				// 'page'=>'PersoStock',
				 				// 'roles'=>['admin'],
								// 'label'=>'Stock_Carte',
								// 'parent'=>'7',
								// 'level'=>'2',
								//'title_page'=>"title dyal kola page"
				 				// ],
				 
				 
				 // 'perso_conditionment'=>[
				 				// 'page'=>'Conditionment',
				 				// 'roles'=>['admin'],
								// 'label'=>'Conditionment',
								// 'parent'=>'7',
								// 'level'=>'2',
								//'title_page'=>"title dyal kola page"
				 				// ],
								
					 # Inscription			
			     //  'getInscription'=>[
				 			// 	'page'=>'inscription/inscription',
				 			// 	'roles'=>['admin'],
								// 'label'=>'Inscription t',
								// 'parent'=>'8',
								// 'level'=>'2',
								// 'title_page'=>"Inscription"
				 			// 	],
								
								'Dem_urG'=>[
				 			'page'=>'production/demandeUrgence/demandedurgence',
				 				'roles'=>['admin','user'],
								'label'=>'urgence',
								'parent'=>'9',
								'level'=>'2',
								'title_page'=>"Demande Urgence",
								'query'=>'function:getDemendeUrgeById@args:null'
				 				],
				 	"getpdf"=>[
				 				'page'=>'pdf/pdfmaker',
				 				'roles'=>['admin','user'],
								'label'=>'',
								'parent'=>'0',
								'level'=>'0',
								'title_page'=>""
				 				],
				 	"getinsertdUrgence"=>[
				 				'page'=>'',
				 				'roles'=>['admin','user'],
								'label'=>'',
								'parent'=>'0',
								'level'=>'0',
								'title_page'=>""
				 				],

				 				'get_users'=>[
				 				'page'=>'users/updateusers',
								'roles'=>['admin','user'],
								'label'=>'Gestion d\'utilisateur',
								'parent'=>'7',
								'level'=>'2',
								'title_page'=>"Admin",
								'query'=>'function:getUtlisateureById@args:null'
								],


								'update_passe'=>[
				 				'page'=>'users/changepasse',
								'roles'=>['admin','user'],
								'label'=>'modifier mot de passe',
								'parent'=>'7',
								'level'=>'2',
								'title_page'=>"Admin"
								
								],

 
 
	]; 

$config["parents"] = [
				'1'=>['label'=>"Gestion de Production",'roles'=>["admin",'user'],'icon'=>"fa fa-refresh"],
				'8'=>['label'=>"Gestion de stock
			",'roles'=>["admin",'user'],'icon'=>"fa fa-archive"],
				// "3"=>['label'=>"Statique",'roles'=>['admin'],'icon'=>"fa fa-bar-chart-o fa-fw"],
				"3"=>['label'=>"Impression",'roles'=>['admin','user'],'icon'=>"fa fa-file-pdf-o"],
				"4"=>['label'=>"Pin",'roles'=>['admin','user'],'icon'=>"fa fa-file-powerpoint-o"],
				// "5"=>['label'=>"Agence",'roles'=>['admin'],'icon'=>"glyphicon glyphicon-map-marker"],
				"5"=>['label'=>"Agence",'roles'=>['admin','user'],'icon'=>"fa fa-bank"],
			    "6"=>['label'=>"Tracking Card",'roles'=>['admin','user'],'icon'=>"fa fa-credit-card"],

			     "7"=>['label'=>"Gestion User",'roles'=>['admin'],'icon'=>"fa fa-users"]


				//"7"=>['label'=>"personnalisation",'roles'=>['admin'],'icon'=>"fa-database"],

				// "8"=>['label'=>"Inscription",'roles'=>['admin'],'icon'=>"fa fa-user-plus"],
    //             "9"=>['label'=>"Demande d urgence",'roles'=>['admin'],'icon'=>"glyphicon glyphicon-retwee"]
				];
	


				/// requet fina Cards 

               
				$config['querys'] =[

				// Requete Production
				'etatprod'=>"select  distinct a.rowid,  a.clt_reference, count(1) as total_card, a.total_pin, a.file_reception_end, a.file_dataprep_start,a.card_perso_start,a.card_delivery_start,b.perso_code
from llx_command_files a, llx_command_filedet b
where a.rowid = b.fk_object
and (a.file_reception_end is NULL or a.file_control_end is NULL or a.file_dataprep_end is NULL or a.card_perso_end is NULL 
			or a.card_condit_end is NULL or a.card_exped_end is NULL or a.card_delivery_end is NULL)
group by a.rowid, a.clt_reference, a.total_pin, a.file_reception_end, a.file_dataprep_start",

	             'etatreject'=>"SELECT distinct  a.card_number,a.card_type, a.branch_code, a.line_comment, a.import_key, b.file_reception_start 
FROM `llx_command_filedet` a, `llx_command_files` b WHERE a.`fk_object` = b.rowid  ",

                  //stoc cart
                 'stockcarte'=>"select * from llx_extranet_product WHERE card_type like '0%'",
                 //stocl Pin

                 'stockpin'=>"select * from llx_extranet_product WHERE card_type like 'P%'"  ,
                 //stocl divers
                 'stockdivers'=>"select * from llx_extranet_product WHERE 
                card_type like 'D%'",
        
                      
        
                //Pin


                 'ProdPin'=>'select distinct llx_command_filedet.import_key,llx_command_files.total_pin, llx_command_files.file_reception_start from llx_command_files inner join llx_command_filedet on llx_command_filedet.fk_object=llx_command_files.rowid ',

                        'ProdPinRetourne'=>'select  distinct llx_command_filedet.import_key,llx_command_filedet.perso_code as type, llx_command_filedet.card_number,llx_command_filedet.holder_address1 ,  llx_command_filedet.`line_comment` from llx_command_filedet inner join llx_command_files on llx_command_filedet.fk_object=llx_command_files.rowid' ,
                    //agence

				'listagence'=>'select * from llx_branches',

				//TRAKIN CARTE

				'TrakingCarte'=>"select * from llx_command_files",


				// 'select llx_command_files.import_key,
    //          llx_command_files.file_reception_start,
    //          llx_command_files.file_reception_end,
    //          llx_command_files.file_control_start,
    //          llx_command_files.file_control_end,
    //          llx_command_files.file_dataprep_start,
    //          llx_command_files.file_dataprep_end,
    //          llx_command_files.card_perso_start,
    //          llx_command_files.card_perso_end,
    //          llx_command_files.card_condit_start,
    //          llx_command_files.card_condit_end,
    //          llx_command_files.card_exped_start,
    //          llx_command_files.card_exped_end,
    //          llx_command_files.card_delivery_start,
    //          llx_command_files.card_delivery_end,
    //          llx_command_files.pin_edition_start,
    //          llx_command_files.pin_edition_end,
    //          llx_command_files.pin_condit_start,
    //          llx_command_files.pin_condit_end,
    //          llx_command_files.pin_exped_start,
    //          llx_command_files.pin_exped_end,
    //          llx_command_files.pin_postage_start,
    //          llx_command_files.pin_postage_end







				//  from llx_command_files  inner join
			 // llx_command_filedet on llx_command_filedet.fk_object = llx_command_files.rowid ',

				// Demande d durgenceand  llx_command_filedet.card_number ='".$reche." '
 
				'demendurgence'=>"SELECT 
    llx_command_filedet.rowid,
    llx_command_filedet.card_number,
    llx_command_filedet.holder_name,
    llx_command_files.clt_reference,
    llx_command_files.file_reception_start
FROM
    llx_command_filedet,    
    llx_command_files 
	
WHERE
	llx_command_filedet.fk_object = llx_command_files.rowid
   and llx_command_filedet.card_number = '%reche'
GROUP BY llx_command_filedet.card_number " ,

//demende urge aff

'affdemandeurg'=>'select * from llx_command_extractions',


//demendeurge
'inserturgence'=>"insert into llx_command_extractions(fk_object,card_number,reception_datetime,type)  values('%id','%card_number','%date_reception','%type')",


//  demande  durgence V2
 // 'inserturgenceNewV'=>"insert into llx_command_extractions(card_number,holder_name,type,delivery_type,delivery_place)  values('%Num_carte','%nom_poretur','%type','%type',%place)",




'inserturgenceNewV'=>"insert into llx_command_extractions(card_number,holder_name,type,delivery_type,delivery_place)  values('%card_number','%nom_poretur','%type','%action','%place')",



//demendeurge
'updateurgence'=>"update llx_command_extractions set delivery_type= '%type',
 													 delivery_place= '%place' 
 													  where rowid = %id",
	


// list agenec get
'getlistagence'=>"SELECT * FROM llx_bank_list",


// insert agence

'InsertAgence'=>"INSERT INTO llx_branches(branch_label, bank_code, branch_address1 , branch_address2 , branch_address3 ,branch_code, city_code, country_code)  
     VALUES('%nomAge', '%codebank' , '%adress1' ,'%adress2', '%adress3' ,'%codeAge','%codeVille', '%codePays')",

'updateAgence'=>"update llx_branches set branch_label = '%nomAge', bank_code = '%codebank', branch_address1 = '%adress1' , branch_address2 = '%adress2' , 
							branch_address3  = '%adress3' ,branch_code = '%codeAge', city_code = '%codeVille', country_code = '%codePays' where rowid = %rowid",



// Update Agence

'UpdateAgence'=>"UPDATE llx_branches 
          SET branch_label='%nomAge',   
           city_code='%codeVille',   
           bank_code='%codebank',   
           country_code='%codePays',
           branch_code='%codeAge',
		   branch_address1='%adress1',
		   branch_address2='%adress2',
		   branch_address2='%adress3'",
         //  WHERE rowid='".$_POST["bank_id"]."'"; "

// Insert Utlisateur


'UtlisateurInsert'=>"INSERT INTO finausers( userName, userEmail	 ,userPass,pass_native,userLogin,idbank,type_user,bank_label)  
     VALUES('%nomuser','%mail','%passuser','%passcrypted','%loginuser','%bank' ,'%typeuser','%label')",

//update  Utlisateur

  'updateutlisateur'=>"UPDATE finausers 
          SET userName ='%nomuser',
          userEmail ='%mail',
          userPass ='%passuser',
          pass_native='%passcrypted',
          userLogin ='%loginuser',
          idbank='%bank',
          type_user  ='%typeuser',
          bank_label = '%label' 
          
where userID = '%rowid' "
          ,
          

// SUb Etat Prod        

'subetatprod'=>"select a.clt_reference, c.label, c.stock, count(1) as nombre, SUM(IF(b.line_status>100,1,0)) as reject
from llx_command_files a, llx_command_filedet b, llx_product c
where a.rowid = b.fk_object
AND c.fk_product_type=0
AND c.barcode=CONCAT(a.import_key, RIGHT(b.card_type,2)) 
and (a.file_reception_end is NULL or a.file_control_end is NULL or a.file_dataprep_end is NULL or a.card_perso_end is NULL 
			or a.card_condit_end is NULL or a.card_exped_end is NULL or a.card_delivery_end is NULL)
								   and a.rowid =  '%rowid' 
								    group by a.clt_reference, c.label, c.stock   limit 150",



// 'getPan'=>"SELECT   card_number,holder_address1,holder_name,holder_firstname FROM llx_command_filedet 
//   WHERE card_number = '%rech' "

// recherche par pan
'recpan'=>"SELECT   llx_command_filedet.card_number,llx_command_filedet.holder_name,llx_command_filedet.import_key,llx_command_files.file_reception_start FROM llx_command_filedet
inner  join llx_command_files on llx_command_filedet.fk_object= llx_command_files.rowid
  WHERE llx_command_filedet.card_number = '%rech' ",


  //update user

  'getusers'=>"select  * from finausers",



// Demande Urgence Versio 3 

'geturgecne'=>"SELECT 
    llx_command_filedet.rowid,
    llx_command_filedet.card_number,
    llx_command_filedet.holder_name,
    llx_command_files.clt_reference,
    llx_command_files.file_reception_start
FROM
    llx_command_filedet,    
    llx_command_files 
	
WHERE
	llx_command_filedet.fk_object = llx_command_files.rowid
   and llx_command_filedet.card_number = '%reche'
GROUP BY llx_command_filedet.card_number ",



];  




 ?>