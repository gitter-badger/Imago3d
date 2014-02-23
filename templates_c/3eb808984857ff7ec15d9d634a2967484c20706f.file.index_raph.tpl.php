<?php /* Smarty version Smarty-3.1.15, created on 2014-02-09 06:19:39
         compiled from "./templates/index_raph.tpl" */ ?>
<?php /*%%SmartyHeaderCode:734194615282361ec36d40-23954385%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3eb808984857ff7ec15d9d634a2967484c20706f' => 
    array (
      0 => './templates/index_raph.tpl',
      1 => 1391951977,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '734194615282361ec36d40-23954385',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5282361ec84ee6_77263707',
  'variables' => 
  array (
    'json' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5282361ec84ee6_77263707')) {function content_5282361ec84ee6_77263707($_smarty_tpl) {?><!DOCTYPE html>
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





        </style>

        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">

        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>

        <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>


        <link rel="stylesheet" href="http://jqueryui.com/resources/demos/style.css">
        <script type="text/javascript" src="templates/raphael/raphael.js"></script>   

        
            <script type="text/javascript">


                //array globale per i muri
                var walls = new Array();

                //array associativo muri finestre e porte
                var wallselement=new Array();

                var mainRooms= new Array();
                var floors=new Array();


                //costante di scostamento da raphael to imago
                var scost=0;

                var wallindex = 0;
                var selectedid; //elemento grafico attualmente selezionato
                var selectedwin;
                var auxiliarcontext;

                $(document).ready(function() {
                    //creazione paper

                    var context = initialize();
                    auxiliarcontext = context;
                    jsonloader();

                    $('#addwall').on('click', function() {
                        createWall(context, 10, 10, 300, 300,0,false);
                    });

                    $('#addfloor').on('click', function() {
                        createWall(context, 150, 150, 300, 300,0,true);
                    });

                    $('#addwindow').on('click', function() {
                        createWindow();
                    });

                    $('#adddoor').on('click', function() {
                        createWindow(null,null,true);
                    });

                    $('#deletedoor').on('click', function() {
                        deleteWindow();
                    });
                    
                    $('#sendjson').on('click', function() {
                        modeltojson();
                    });
                    $('#deletewall').on('click', function() {
                        deleteElement();
                    });

                    $('#deletewindow').on('click', function() {
                        deleteWindow();
                    });

                    //event.preventDefault();

                });

                function updateFloorLevel(i)
                {

                    var floor=getWall(selectedid);
                    floor.data("level",i);
                }


                function initialize()
                {
                    var paper = new Raphael("paper", 600, 600);
                    return paper;
                }

                function createWall(context, width, height, x, y,rotationflag,isFloor,level)
                {
                    if(level==null){level=0;console.log("Level è null!");}
                    if(!isFloor){
                    var c = context.rect(x, y, width, height, 0).attr({fill: "hsb(0, 1, 1)", stroke: "2px solid black", opacity: .5});
                    c.drag(move, start);
                    c.data("flagrotate", rotationflag);
                    c.data("index", wallindex++);
                    c.data("isFloor",false);
                    c.data("level",level);
                    c.dblclick(rotateme); //trigger rotazione
                    c.click(getData); //trigger per la visualizzazione dei dati
                    walls.push(c);}
                    else{
                        console.log("Costruisco il floor");
                        var c = context.rect(x, y, width, height, 0).attr({fill: "lightGreen", stroke: "2px solid black", opacity: .5});
                        c.drag(move, start);
                        c.data("flagrotate", rotationflag);
                        c.data("index", wallindex++);
                        c.data("isFloor",true);
                        c.data("level",level);
                        c.dblclick(rotateme); //trigger rotazione
                        c.click(getData); //trigger per la visualizzazione dei dati
                        walls.push(c);
                    }
                }

                function getWall(index)
                {
                    var flag=false;
                    var aux=null;
                    for(var i=0;i<walls.length && !flag;i++)
                    {
                        if(walls[i].data("index")==index)
                        {
                            aux=walls[i];
                            flag=true;
                        }
                    }
                    return aux;

                }

                function createWindow(windows,o,isDoor)
                {


                    console.log("look this wall: "+walls[o]);
                    var wall=getWall(selectedid);

                    var auxx,auxy;

                    if(windows!=null && o!=null){
                        if(!isDoor){
                        for(var i=0;i<windows.length;i++)
                        {
                            if(walls[o].data("flagrotate")===0)
                            {
                                console.log("finestra orizontale");
                                auxy=walls[o].attr("y")+walls[o].attr("height")/2;
                                auxx=(windows[i].positionx*2)+(walls[o].attr("x")+(walls[o].attr("width")/2));
                                console.log(auxx+" - "+auxy);

                            }
                            else
                            {
                                console.log("finestra verticale");
                                auxx=walls[o].attr("x")+walls[o].attr("width")/2;
                                auxy=-(windows[i].positionx*2)+(walls[o].attr("y")+(walls[o].attr("height")/2));
                                console.log(auxx+" - "+auxy);

                            }
                            var c =auxiliarcontext.circle(auxx,auxy, 10).attr({fill: "#19ba09", stroke: "2px solid black", opacity: .5});
                            c.drag(movewindows,startwindows);
                            c.data("wallie",walls[o].data("index"));
                            c.data("isDoor",false);
                            c.click(getDataWindows);
                            wallselement.push([o,c]);
                        }
                        }
                        else{
                            //è una porta
                            for(var i=0;i<windows.length;i++)
                            {
                                if(walls[o].data("flagrotate")===0)
                                {
                                    console.log("porta orizontale");
                                    auxy=walls[o].attr("y")+walls[o].attr("height")/2;
                                    auxx=-(windows[i].positionx*2)+(walls[o].attr("x")+(walls[o].attr("width")/2));
                                    console.log(auxx+" - "+auxy);

                                }
                                else
                                {
                                    console.log("porta verticale");
                                    auxx=walls[o].attr("x")+walls[o].attr("width")/2;
                                    auxy=(windows[i].positionx*2)+(walls[o].attr("y")+(walls[o].attr("height")/2));
                                    console.log(auxx+" - "+auxy);

                                }
                                var c =auxiliarcontext.circle(auxx,auxy, 10).attr({fill: "orange", stroke: "2px solid black", opacity: .5});
                                c.drag(movewindows,startwindows);
                                c.data("wallie",walls[o].data("index"));
                                c.data("isDoor",true);

                                c.click(getDataWindows);
                                wallselement.push([o,c]);
                            }
                        }
                    }
                    else{
                        if(wall!=null && !isDoor){
                        console.log("aux");

                        var c =auxiliarcontext.circle(wall.attr("x")+(wall.attr("width")/2),wall.attr("y")+(wall.attr("height")/2), 10).attr({fill: "#19ba09", stroke: "2px solid black", opacity: .5});
                            c.data("wallie",wall.data("index"));
                            c.data("isDoor",false);
                            c.drag(movewindows,startwindows);
                            c.click(getDataWindows);
                            //console.log("1) index del muro a cui è associato: "+c.data("wallie"));
                        wallselement.push([selectedid,c]);}
                        if(wall!=null && isDoor){
                            console.log("aux");

                            var c =auxiliarcontext.circle(wall.attr("x")+(wall.attr("width")/2),wall.attr("y")+(wall.attr("height")/2), 10).attr({fill: "orange", stroke: "2px solid black", opacity: .5});
                            c.data("wallie",wall.data("index"));
                            c.data("isDoor",true);

                            c.drag(movewindows,startwindows);
                            c.click(getDataWindows);
                            //console.log("1) index del muro a cui è associato: "+c.data("wallie"));
                            wallselement.push([selectedid,c]);}
                    }




                }

                //restuisce l'array delle windows per l'i-esimo wall
                function getWindows(index,isDoorFlag)
                {
                    var array=[];
                    var wall=getWall(index);
                    for(var i=0; i<wallselement.length;i++)
                    {
                        var aux=wallselement[i];
                        if(aux[0] === index && !aux[1].data('isDoor') && !isDoorFlag)
                        {


                            var window=aux[1];
                            var auxposx=0;
                            if(wall.data("flagrotate")===0){//console.log("il muro sta orizontale");
                            auxposx=(window.attr("cx")-(wall.attr("x")+(wall.attr("width")/2)))/2;
                            }
                            else{//console.log("il muro sta verticale!");
                                auxposx=-(window.attr("cy")-(wall.attr("y")+(wall.attr("height")/2)))/2;
                            }


                            array.push({'width':10,'height':10,'depth':10,'positionx':auxposx,'positiony':1});

                        }
                        if(aux[0] === index && aux[1].data('isDoor') && isDoorFlag)
                        {
                            var door=aux[1];
                            var auxposx=0;
                            if(wall.data("flagrotate")===0){//console.log("il muro sta orizontale");
                                auxposx=-(door.attr("cx")-(wall.attr("x")+(wall.attr("width")/2)))/2;
                            }
                            else{//console.log("il muro sta verticale!");
                                auxposx=(door.attr("cy")-(wall.attr("y")+(wall.attr("height")/2)))/2;
                            }

                            array.push({'width':10,'height':24,'depth':10,'positionx':auxposx,'positiony':1});
                        }

                    }
                    //console.log(array);
                    return array;
                }



                //funzioni per il drag 
                function start() {
                    this.ox = this.attr("x");
                    this.oy = this.attr("y");
                    this.data("array",new Array());
                    for(var i=0; i<wallselement.length;i++)
                    {
                        var aux=wallselement[i];
                        if(aux[0] === this.data("index"))
                        {
                            var el=aux[1];
                            var elox=el.attr("cx");
                            var eloy=el.attr("cy");
                            var auxarr=new Array();
                            auxarr.push(el);
                            auxarr.push(elox);
                            auxarr.push(eloy);
                            this.data("array").push(auxarr);
                        }
                    }

                }
                function move(dx, dy) {
                    this.attr({
                        x: Math.min(Math.max(this.ox + dx, 0), 600 - this.attr("width")),
                        y: Math.min(Math.max(this.oy + dy, 0), 600 - this.attr('height'))
                    });

                    for(var i=0;i<this.data("array").length;i++)
                    {
                        var el=this.data("array")[i][0];
                        el.attr({
                            cx:this.data("array")[i][1]+dx,
                            cy:this.data("array")[i][2]+dy
                        });

                    }

                }

                function movewindows(dx,dy)
                {   //console.log("dx: "+dx+" dy: "+dy);
                    //console.log("2) index del muro a cui è associato: "+this.data("wallie"));
                    var wall=getWall(this.data("wallie"));
                    if(wall.data("flagrotate")===0)
                    {
                        this.attr({
                            cx:Math.min(Math.max(this.cx + dx,wall.attr("x")),wall.attr("x") + wall.attr("width")),
                            cy: this.cy
                        });
                    }else{
                        this.attr({
                            cx:this.cx,
                            cy: Math.min(Math.max(this.cy + dy,wall.attr("y")),wall.attr("y") + wall.attr("height"))
                        });
                    }

                }

                function startwindows()
                {
                    this.cx = this.attr("cx");
                    this.cy = this.attr("cy");
                    //console.log("circle x:"+this.cx);
                    //console.log("circle y:"+this.cy);

                }

                function jsonloader()
                {
                    //json dalla session

                    var json =<?php echo $_smarty_tpl->tpl_vars['json']->value;?>
;

                    if(json!="" || json!=null){
                    //console.log(JSON.stringify(json, null, 2));
                    for (var i = 0; i < json.length; i++)
                    {

                        switch (json[i].name) {

                            case "Floor":
                                //this.floor = this.createFloor(param[i].xdim,param[i].ydim,param[i].level*(wallheight));
                                // createWall(context, width, height, x, y,rotationflag,isFloor)

                                console.log("ho trovato un floor!");
                                createWall(auxiliarcontext, Math.ceil(json[i].xdim*2),Math.ceil(json[i].ydim*2),json[i].xposition + 300 - json[i].xdim,json[i].yposition + 300 - json[i].ydim,0,true,json[i].level);

                                break;
                            case "mainRoom":
                                //this.generateRoom(param[i].xdim,param[i].ydim,param[i].level*(wallheight),param[i].windowsFront,param[i].doorsFront,param[i].windowsBack,param[i].doorsBack,param[i].windowsLeft,param[i].doorsLeft,param[i].windowsRight,param[i].doorsRight);
                                break;
                            case "Wall":
                                //this.generateWall({width: param[i].width, height: param[i].height, depth: param[i].depth}, param[i].yrotation, {x: param[i].positionx, y: param[i].positiony, z:param[i].positionz},param[i].windows,param[i].doors);
                                //console.log("devo creare un muro");

                                var auxwidth;
                                var auxheigt;
                                var auxx;
                                var auxy;


                                if(json[i].depth,json[i].y_rotation===1)
                                {
                                    //console.log("verticale");
                                    auxwidth= Math.ceil(json[i].depth*2);
                                    auxheigt= Math.ceil(json[i].width*2);
                                    auxx=json[i].positionx + 300 - json[i].depth;
                                    auxy=json[i].positionz + 300  - json[i].width;
                                }
                                else{
                                    //console.log("orizontale");
                                    auxwidth= Math.ceil(json[i].width*2);
                                    auxheigt=Math.ceil(json[i].depth*2);
                                    auxx=json[i].positionx + 300 - json[i].width;
                                    auxy=json[i].positionz + 300 - json[i].depth;
                                }

                                createWall(auxiliarcontext, auxwidth, auxheigt, auxx, auxy,json[i].y_rotation,false,json[i].positiony/25);

                                if(json[i].windows.length != 0)
                                {
                                    createWindow(json[i].windows,wallindex-1,false);
                                }

                                if(json[i].doors.length != 0)
                                {

                                    createWindow(json[i].doors,wallindex-1,true);
                                }

                                break; //oblique dx


                            }
                    }

                    }




                }
                //handler per i dati dell'elemento selezionato --> triggerato in raphael.js

                //elemento selezionato con click
                function getData()
                {

                    var jsonobj =
                            {
                                'name': 'Wall',
                                'width': this.attr("width"),
                                'height': 30,
                                'depth': this.attr("height"),
                                'y_rotation': this.data("flagrotate"),
                                'positionx': this.attr("x"),
                                'positiony': 0,
                                'positionz': this.attr("y"),
                                'windows': [],
                                'doors': []
                            };

                    var aux = document.forms['formdisplay'];
                    //document.getElementById("display").innerHTML=JSON.stringify(jsonobj, null, 2);  //jsonobj.name
                    //elemento selezionato ---> aggiornamento numero nel form
                    aux.elements['width'].value = JSON.stringify(jsonobj.width, null, 2);
                    aux.elements['height'].value = JSON.stringify(jsonobj.depth, null, 2);
                    aux.elements['x'].value = JSON.stringify(jsonobj.positionx, null, 2);
                    aux.elements['y'].value = JSON.stringify(jsonobj.positionz, null, 2);

                    // -->aggiornamento posizione dello slider
                    $("#slider-width").slider({value: this.attr("width")});
                    $("#slider-height").slider({value: this.attr("height")});
                    $("#slider-xposition").slider({value: this.attr("x")});
                    $("#slider-yposition").slider({value: this.attr("y")});

                    aux.elements['idelement'].value = this.data("index");
                    aux.elements['floorlevel'].value=this.data("level");

                    selectedid = this.data("index");
                    this.attr({fill: "blue"});

                    for (var i = 0; i < walls.length; i++)
                    {

                        if (walls[i].data("index") == selectedid)
                        {
                            walls[i].attr({fill: "blue"});
                        }
                        else {
                            if(!walls[i].data("isFloor")){walls[i].attr({fill: "hsb(0, 1, 1)"});}
                            else{walls[i].attr({fill: "lightgreen"});}

                        }


                    }
                return jsonobj;
                }

                function getDataWindows()
                {
                    for(var i=0;i<wallselement.length;i++)
                    {
                        if(this === wallselement[i][1])
                        {
                            selectedwin=wallselement[i][1];
                            //alert("trovato");
                        }
                    }
                }

                //modifica dell'elemento selezionato
                function UpdateElement(namevalue, value)
                {
                    var aux = document.forms['formdisplay'];
                    var aux2 = aux.elements['idelement'].value;
                    for (var i = 0; i < walls.length; i++)
                    {


                        if (aux2 == walls[i].data("index"))
                        {
                            var data = {};
                            data[namevalue] = value;
                            walls[i].attr(data);
                        }
                    }
                }

                //elimina elemento selezionato -->usa la variabile globale selectedid
                function deleteElement()
                {
                    //alert(selectedid);
                    var k=0;
                    for (var i = 0; i < walls.length; i++)
                    {
                        if (walls[i].data("index") == selectedid)
                        {
                            walls[i].remove();
                            walls.splice(i, 1);
                            var aux=countWallElem(selectedid);
                            for(var j=0;j<aux;j++)
                            {
                              deleteWallElem(selectedid);
                            }
                        }
                    }
                }

                function deleteWindow()
                {
                        for(var i=0;i<wallselement.length;i++)
                        {
                            if(selectedwin === wallselement[i][1])
                            {
                                wallselement.splice(i, 1);
                                selectedwin.remove();
                            }
                        }
                }

                function countWallElem(wallid)
                {
                    var count=0;
                    for (var i = 0; i < wallselement.length; i++)
                    {
                        var aux=wallselement[i];
                        if(aux[0]===wallid)
                        {
                            count++;
                        }
                    }
                    return count;
                }


                //elimina un solo elemento per volta
                function deleteWallElem(wallid)
                {
                    var flag=false;
                    for (var i = 0; i < wallselement.length && !flag; i++)
                    {
                        var aux=wallselement[i];
                        if(aux[0]===wallid)
                        {
                            aux[1].remove();
                            wallselement.splice(i,1);
                            flag=true;
                        }
                    }
                    //console.log("wallelem dopo cancellazione: "+wallselement);
                }

                //funzioni per la rotation
                function rotateme()
                {

                    if (this.data("flagrotate") === 0) {
                        this.data("flagrotate", 1);
                    }
                    else {
                        this.data("flagrotate", 0);
                    }
                    //console.log(this.data("flagrotate"));
                    this.undrag();
                    var aux1 = this.attr("width");
                    var aux2 = this.attr('height');
                    this.attr({'width': aux2, 'height': aux1});
                    this.drag(move, start);

                    for(var i=0; i<wallselement.length;i++)
                    {
                        var aux=wallselement[i];
                        if(aux[0] === this.data("index"))
                        {
                            var el=aux[1];
                            var auxwx=el.attr("cx");
                            var auxwy=el.attr("cy");


                            //console.log("barra: ("+this.attr("x")+" , "+this.attr("y")+" )");
                            //console.log("cerchio: ("+el.attr("cx")+" , "+el.attr("cy")+" )");

                            //this.attr("x")+this.attr('width')/2,

                            if (this.data("flagrotate") === 1) {
                            el.attr({
                            cx:this.attr("x"),
                            cy:this.attr("y")+(auxwx-this.attr("x"))
                        });}
                            else{

                                el.attr({
                                    cy:this.attr("y"),
                                    cx:this.attr("x")+(auxwy-this.attr("y"))
                                });

                            }

                            console.log("barra after: ("+this.attr("x")+" , "+this.attr("y")+" )");
                            console.log("cerchio after: ("+el.attr("cx")+" , "+el.attr("cy")+" )");

                        }
                    }


                }



                function modeltojson()
                {



                    var jsonobj, jsonarray = [];
                    for (i = 0; i < walls.length; i++)
                    {

                        //get element
                        var windows=getWindows(walls[i].data("index"),false);
                        var doors=getWindows(walls[i].data("index"),true);

                        var auxwidth;
                        var auxheigt;
                        if(walls[i].data("flagrotate")===1)
                        {
                            console.log("verticale");
                            auxwidth= Math.ceil(walls[i].attr("height")/2);
                            auxheigt=Math.ceil(walls[i].attr("width")/2);

                        }
                        else{
                            console.log("orizontale");
                            auxwidth=Math.ceil(walls[i].attr("width")/2);;
                            auxheigt=Math.ceil(walls[i].attr("height")/2);
                        }

                        if(!walls[i].data("isFloor"))
                        {
                        jsonobj =
                                {'name': 'Wall',
                                    'width': auxwidth,
                                    'height': 25,
                                    'depth': auxheigt,
                                    'y_rotation': walls[i].data("flagrotate"),
                                    'positionx': walls[i].attr("x") - 300+(walls[i].attr("width")/2),
                                    'positiony': walls[i].data("level")*25,
                                    'positionz': walls[i].attr("y") - 300 +(walls[i].attr("height")/2),
                                    'windows': windows,
                                    'doors': doors

                                };
                            jsonarray.push(jsonobj);
                        }
                        else{

                            jsonobj =
                            {'name': 'Floor',
                                'xdim':auxwidth,
                                'ydim':auxheigt,
                                'level':walls[i].data("level"),
                                'xposition':walls[i].attr("x") - 300+(walls[i].attr("width")/2),
                                'yposition':walls[i].attr("y") - 300 +(walls[i].attr("height")/2)

                            };
                            jsonarray.push(jsonobj);


                        }



                    }
                    //console.log(JSON.stringify(jsonarray, null, 2));
                    var aux = document.forms['myform'];
                    aux.elements['jsonstring'].value = JSON.stringify(jsonarray, null, 2);
                    //console.log(JSON.stringify(jsonarray, null, 2));

                    aux.submit();
                }


                


//slider wall
                $(function() {
                    $("#slider-width").slider({
                        range: "max",
                        min: 1,
                        max: 600,
                        value: document.getElementById('width').value,
                        slide: function(event, ui) {
                            $("#width").val(ui.value);
                            UpdateElement(document.getElementById('width').getAttribute("name"), ui.value);
                        }
                    });
                    $("#width").val($("#slider-width").slider("value"));
                });

                $(function() {
                    $("#slider-height").slider({
                        range: "max",
                        min: 1,
                        max: 600,
                        value: document.getElementById('height').value,
                        slide: function(event,ui) {
                            $("#height").val(ui.value);
                            UpdateElement(document.getElementById('height').getAttribute("name"), ui.value);
                        }
                    });
                    $("#height").val($("#slider-height").slider("value"));
                });

                $(function() {
                    $("#slider-xposition").slider({
                        range: "max",
                        min: 1,
                        max: 580,
                        value: document.getElementById('xposition').value,
                        slide: function(event, ui) {
                            $("#xposition").val(ui.value);
                            UpdateElement(document.getElementById('xposition').getAttribute("name"), ui.value);
                        }
                    });
                    $("#xposition").val($("#slider-xposition").slider("value"));
                });

                $(function() {
                    $("#slider-yposition").slider({
                        range: "max",
                        min: 1,
                        max: 580,
                        value: document.getElementById('yposition').value,
                        slide: function(event, ui){
                            $("#yposition").val(ui.value);
                            UpdateElement(document.getElementById('yposition').getAttribute("name"), ui.value);
                        }
                    });
                    $("#yposition").val($("#slider-yposition").slider("value"));
                });
                
//slider window


//menu accordion
                $(function() {
                    $("#accordion").accordion();
                });
            </script>
        




    </head>
    <body>




        <div id="accordion" style="width: 500px; padding:20px; margin:10px; float:left;">

            <h3>Walls & Floor Panel</h3>
            <div>

                <form name="formdisplay">
                    <table>
                        <tr><td>Id:</td><td> <input type="number" min="1" max="600" name="idelement"></td></tr>
                    </table>  
                    <p>
                        <label for="amount">Width:</label>
                        <input type="text" id="width" name="width" style="border:0; color:#f6931f; font-weight:bold;">
                    </p>
                    <div id="slider-width"></div>
                    <p>
                    <label for="amount">Height:</label>
                    <input type="text" id="height" name="height" style="border:0; color:#f6931f; font-weight:bold;">
                    </p>
                    <div id="slider-height"></div>
                    <p>
                    <label for="amount">X-Position:</label>
                    <input type="text" id="xposition" name="x" style="border:0; color:#f6931f; font-weight:bold;">
                    </p>
                    <div id="slider-xposition"></div>
                    <p>
                    <label for="amount">Y-Position:</label>
                    <input type="text" id="yposition" name="y" style="border:0; color:#f6931f; font-weight:bold;">
                    </p>
                    <div id="slider-yposition"></div>
                    <p>
                    <table>
                        <tr><td>Livello y:</td><td> <input onchange="updateFloorLevel(this.value)" type="number" min="0" max="600" name="floorlevel"></td></tr>
                    </table>
                    </p>


                    <!-- <tr><td>Height:</td><td> <input type="range" min="1" max="600" name="height" onchange="UpdateElement(this.name, this.value)"></td></tr>
                     <tr><td>Rotation:</td><td> <input type="range" min="1" max="10" name="y_rotation" onchange="UpdateElement(this.name, this.value)"></td></tr>
                    -->

                </form>

                <button id="addwall">Add Wall</button>
                <button id="addfloor">Add Floor</button>
                <button id="deletewall">Delete Element</button>
                <button id="sendjson">Invia Json</button>

            </div>

            <h3>Wall's Elements</h3>
            <div>
                <button id="addwindow">Add Window</button>
                <button id="deletewindow">Delete Window</button>

                <button id="adddoor">Add door</button>
                <button id="deletedoor">Delete door</button>
            </div>

        </div>



        </div>
        <div style="float:left; height:600px; margin:10px auto; border:1px solid black; background-image:url('templates/img/graphy.png'); background-position:center;">
            <div id="paper">


            </div>        
        </div>

        <div style="float:left; margin-top:90px;">
            <form name="myform" action="index_imago3d.php" method="POST">

                <textarea cols="40" rows="20" name="jsonstring" style="text-align:left; display:none;">
                
                </textarea>
                </br>
                <input type="submit" style="text-align:left; display:none;">

            </form>
        </div>



    </body>
</html>
<?php }} ?>
