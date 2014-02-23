<?php /* Smarty version Smarty-3.1.15, created on 2014-01-04 03:30:26
         compiled from "./templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19168843165277c727a6e7e9-17809372%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c0360d049dff10f364dfc53ba2cc3958abf6ee6d' => 
    array (
      0 => './templates/index.tpl',
      1 => 1388697950,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19168843165277c727a6e7e9-17809372',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5277c727abe6e9_42080426',
  'variables' => 
  array (
    'json' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5277c727abe6e9_42080426')) {function content_5277c727abe6e9_42080426($_smarty_tpl) {?><!DOCTYPE html>
<html>
    <head>
        <title>Imago3d</title>

        




        <style>
            html, body {
                width: 100%;
                height: 100%;
            }

           

             body {
                background-color: #d8d8d8;
                margin: 0 auto;
               
                font-family: arial;
            }

           
            
#jsoneditor {
            width: 900px;
            height: 100%;
            background:white;
            margin-bottom:20px;
        }
        </style>
<link rel="stylesheet" type="text/css" href="templates/jsoneditor/jsoneditor.css">
    <script type="text/javascript" src="templates/jsoneditor/jsoneditor.js"></script>
    
    </head>
    <body>
        
        <div style="width:960px; margin:0 auto;">
            <h2>IMAGO JSON EDITOR</h2>
            <div style="float:left; margin-top:90px;">
<form name="myform" action="index_imago3d.php" method="POST">
  
<textarea cols="40" rows="20" name="jsonstring" style="text-align:left; display:none;">

</textarea>
</br>
<input type="submit" style="text-align:left; display:none;">

</form></div>

            <div style="float:left;">
<p>
        <button id="setJSON">reImposta JSON di esempio</button>
        <button id="getJSON">Invia JSON</button>
    </p>
    
    <div id="jsoneditor"></div>
    
  
            </div>     
            </div>
            

      <script type="text/javascript" >
        // create the editor
        var container = document.getElementById('jsoneditor');
        var editor = new jsoneditor.JSONEditor(container);

        var json =<?php echo $_smarty_tpl->tpl_vars['json']->value;?>
;
            editor.set(json);

        // set json
        document.getElementById('setJSON').onclick = function () {
            var json =<?php echo $_smarty_tpl->tpl_vars['json']->value;?>
;
            editor.set(json);
        };

        // get json
        document.getElementById('getJSON').onclick = function () {
            var json = editor.get();
            document.forms['myform'].elements['jsonstring'].value=JSON.stringify(json, null, 2);
            document.forms["myform"].submit();
        };
    </script>       
            

        
    </body>
</html>
<?php }} ?>
