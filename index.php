<?php
###################################################################################################################
############################################## SETTINGS 	###################################################
###################################################################################################################
$f3=require('lib/base.php');
$f3->config('config.ini');

$def_login=true; // Login form on header
$def_forcelang=''; // Force Language, to enable select your lang (pt, eng, es)

$def_db=Array("type"=>"mysql","host"=>"localhost","port"=>"3306","dbname"=>"db","user"=>"root","pw"=>""); // DB Definitions
$safekey='safekeyadded';

$projName='EcoShop';

$absURL='http://localhost/ecoshop/';

$cache_time=86400;
##########################################################################################################################################
##################################################################### CONFIGURATION ####################################################
##########################################################################################################################################
######## DB
$db=new DB\SQL(
    $def_db['type'].':host='.$def_db['host'].';port='.$def_db['port'].';dbname='.$def_db['dbname'],
    $def_db['user'],
    $def_db['pw']
);
######## SITESET
$f3->set('CACHE',FALSE);
$f3->set('DEBUG',3);
$f3->set('absURL',$absURL);
######## ROUTE

$f3->set('LOCALES','ui/dict/');
if ($def_forcelang!='') $f3->set('LANGUAGE',$def_forcelang);

$f3->route('GET /',
	function($f3) {
		echo View::instance()->render('index.htm');
	}
);


####################### RUN
$f3->run();

####################### FUNCTIONS
// Start deploying your functions here...