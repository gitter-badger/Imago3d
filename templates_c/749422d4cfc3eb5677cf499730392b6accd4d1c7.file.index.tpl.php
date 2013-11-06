<?php /* Smarty version Smarty-3.1.15, created on 2013-11-05 23:03:21
         compiled from ".\templates\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:95315277b3786db481-41618343%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '749422d4cfc3eb5677cf499730392b6accd4d1c7' => 
    array (
      0 => '.\\templates\\index.tpl',
      1 => 1383688999,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '95315277b3786db481-41618343',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5277b3787050a4_32624277',
  'variables' => 
  array (
    'json' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5277b3787050a4_32624277')) {function content_5277b3787050a4_32624277($_smarty_tpl) {?><!DOCTYPE html>
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
