<?php

 /**
 * Example Application

 * @package Example-application
 */
session_start(); 
require 'libs/Smarty.class.php';

$smarty = new Smarty;
if(!isset($_SESSION['jsonstring'])){
$_SESSION['jsonstring']="[
{
'name': 'Floor',
'xdim': 100,
'ydim': 100,
'level':0
 },   

{
   'name': 'Floor',
   'xdim': 100,
   'ydim': 100,
   'level':1
  },

 

   {
      
      'name': 'mainRoom',
      'xdim': 100,
      'ydim': 100,
      'level':0,
      'windowsFront':[{'width': 10,'height': 10,'depth':1,'positionx':20,'positiony': 0},
{'width': 10,'height':10,'depth':1,'positionx':-20,'positiony': 0}],

      'doorsFront':[{'width': 6,'height': 24,'depth':1,'positionx':0,'positiony': 0}],

      'windowsBack':[{'width': 10,'height': 10,'depth':1,'positionx':20,'positiony': 0},
{'width': 10,'height':10,'depth':1,'positionx':-20,'positiony': 0}],

      'doorsBack':[{'width': 6,'height': 24,'depth':1,'positionx':-44,'positiony': 0}],

      'windowsLeft':[{'width': 10,'height': 10,'depth':1,'positionx':20,'positiony': 0},
{'width': 10,'height':10,'depth':1,'positionx':-20,'positiony': 0}],

      'doorsLeft':[],

      'windowsRight':[{'width': 10,'height': 10,'depth':1,'positionx':20,'positiony': 0},
{'width': 10,'height':10,'depth':1,'positionx':-20,'positiony': 0}],

      'doorsRight':[],


  },

{
      'name': 'Wall',
      'width': 40,
      'height': 30,
      'depth': 1,
      'yrotation': 2,
      'positionx': 0,
      'positiony': 0,
      'positionz': 0,
      'windows': [{'width': 5,'height': 5,'depth':1,'positionx':5,'positiony': 2},
{'width': 5,'height': 5,'depth':1,'positionx':-5,'positiony': -2}
],
'doors':[{'width': 6,'height': 24,'depth':1,'positionx':-16,'positiony': 0}]

  }

     

    
];



";}


$smarty->assign("json",stripslashes($_SESSION['jsonstring']));
//$smarty->assign("FirstName",array("John","Mary","James","Henry"));
//$smarty->assign("LastName",array("Doe","Smith","Johnson","Case"));
//$smarty->assign("Class",array(array("A","B","C","D"), array("E", "F", "G", "H"),
//      array("I", "J", "K", "L"), array("M", "N", "O", "P")));
//
//$smarty->assign("contacts", array(array("phone" => "1", "fax" => "2", "cell" => "3"),
//      array("phone" => "555-4444", "fax" => "555-3333", "cell" => "760-1234")));
//
//$smarty->assign("option_values", array("NY","NE","KS","IA","OK","TX"));
//$smarty->assign("option_output", array("New York","Nebraska","Kansas","Iowa","Oklahoma","Texas"));
//$smarty->assign("option_selected", "NE");

$smarty->display('index.tpl');

?>
