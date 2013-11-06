<!DOCTYPE html>
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
            
{literal}
      <script type="text/javascript" >
        // create the editor
        var container = document.getElementById('jsoneditor');
        var editor = new jsoneditor.JSONEditor(container);

        var json ={/literal}{$json}{literal};
            editor.set(json);

        // set json
        document.getElementById('setJSON').onclick = function () {
            var json ={/literal}{$json}{literal};
            editor.set(json);
        };

        // get json
        document.getElementById('getJSON').onclick = function () {
            var json = editor.get();
            document.forms['myform'].elements['jsonstring'].value=JSON.stringify(json, null, 2);
            document.forms["myform"].submit();
        };
    </script>       
            
{/literal}
        
    </body>
</html>
