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

            #raphcontainer
            {
                border: 1px solid #000;


            }
        </style>

        <script type="text/javascript" src="templates/js/jquery-2.0.3.min.js"></script>
        <script type="text/javascript" src="templates/raphael/raphael.js"></script>   

        {literal}
            <script type="text/javascript">


                var walls = new Array();
                var jsonarray=[];
               

                function drawPoint(paper, x, y) {

                    var c = paper.circle(x, y, 10).attr({fill: "hsb(0, 1, 1)", stroke: "none", opacity: .5});
                    c.attr({'x': x, 'y': y});
                    c.paper = paper;
                    c.drag(move, start);
                    


                }

                function drawWall(paper, x, y, width) {

                    var c = paper.rect(x, y, width, 10).attr({fill: "hsb(0, 1, 1)", stroke: "none", opacity: .5});
                    c.attr({'x': x, 'y': y});
                    c.data('flagrotate', 2);

                    c.paper = paper;
                    c.drag(move, start);
                    c.dblclick(rotatefun);                    
                    walls.push(c);

                }
                
                function centerWall(paper, x, y, width) {

                    var c = paper.rect(x, y, width, width).attr({fill: "hsb(0, 1, 1)", stroke: "none", opacity: .5});
                    c.attr({'x': x, 'y': y});                
                    c.paper = paper;
                }




                var rotatefun = function()
                {
                    this.flag = this.data("flagrotate");
                    if (this.flag===2) {
                        //console.log(0);
                        this.rotate(-90);
                        this.data('flagrotate', 1);
                        transform("t100,100r45t-100,0");
                    }
                    else {
                        //console.log(1);
                        this.undrag();
                        this.drag(move, start);
                        this.rotate(90);
                        this.data('flagrotate', 2);
                    }

                };



                var start = function() {
                    this.ox = this.attr("x");
                    this.oy = this.attr("y");

                },
                        move = function (dx, dy) {
            this.attr({
                x: Math.min(Math.max(this.ox + dx, 10), 470),
                y: Math.min(Math.max(this.oy + dy, 10), 470)
            });
        };


                var start2 = function() {
                    this.ox = this.attr("y");
                    this.oy = this.attr("x");

                },
                        move2 = function(dx, dy) {
                    //this.attr({x: this.ox - dy, y: this.oy + dx});
                    this.attr({
                x: Math.min(Math.max(this.oy - dy, 10), 430),
                y: Math.min(Math.max(this.ox + dx, 10), 570)
            });
                };


                function modeltojson(arraymodel)
                {
                    var divcont = document.getElementById("container3");
                    var stringcod = "[";
                    var jsonobj;
                  
                    var i = 0;
                    for (i = 0; i < arraymodel.length; i++)
                    {

                        
                        jsonobj =
                                {'name': 'Wall',
                                'width': 160,
                                'height': 30,
                                'depth': 1,
                                'yrotation': arraymodel[i].data('flagrotate'),
                                'positionx': arraymodel[i].attr("x"),
                                'positiony': 0,
                                'positionz': arraymodel[i].attr("y"),
                                'windows':[],
                                'doors':[]

                            };
                            jsonarray.push(jsonobj);
                        stringcod=stringcod+JSON.stringify(jsonobj);

                    }
                    stringcod=stringcod+"]";
                    divcont.innerHTML =stringcod;
                    console.log(JSON.stringify(jsonarray));
                   
                    
                }
                ;
                
                JSON.stringify = JSON.stringify || function (obj) {
    var t = typeof (obj);
    if (t !== "object" || obj === null) {
        // simple data type
        if (t === "string") obj = '"'+obj+'"';
        return String(obj);
    }
    else {
        // recurse array or object
        var n, v, json = [], arr = (obj && obj.constructor === Array);
        for (n in obj) {
            v = obj[n]; t = typeof(v);
            if (t === "string") v = '"'+v+'"';
            else if (t === "object" && v !== null) v = JSON.stringify(v);
            json.push((arr ? "" : '"' + n + '":') + String(v));
        }
        return (arr ? "[" : "{") + String(json) + (arr ? "]" : "}");
    }
};

                $(document).ready(function() {

 $('#sendJSON').on('click', function() {
                
            document.forms['myform'].elements['jsonstring'].value=JSON.stringify(jsonarray, null, 2);
            document.forms["myform"].submit();
        });

       // Canvas is created at the top left corner of the #notepad element
       // (or its top right corner in dir="rtl" elements)

                    var paper = Raphael(document.getElementById("container"), 500, 500);
                    centerWall(paper,300,300,10);
                    $('#container2').on('click', function(e) {
                        var x = 10;
                        var y = 10;
                        drawWall(paper, x, y, 160);
                    });

                    $('#container3').on('click', function() {
                        modeltojson(walls);
                    });
                });
                
           
            </script>
            
          
            
        {/literal}

    </head>
    <body>
         <div style="float:left; margin-top:90px;">
<form name="myform" action="index_imago3d.php" method="POST">
  
<textarea cols="40" rows="20" name="jsonstring" style="text-align:left; display:none;">

</textarea>
</br>
<input type="submit" style="text-align:left; display:none;">

</form></div>
        
        <div id="container2" style="margin:0 auto; border:1px solid black;">
            <p>Add wall</p>

        </div>
        <div id="container" style="width:600px; height:600px; margin:0 auto; border:1px solid black;  background-image:url('templates/img/graphy.png'); background-position:center;  ">


        </div>
        <button id="sendJSON">Invia JSON</button>
        <div id="container3" style="margin:0 auto; border:1px solid black;">
            <p>Model to json</p>   

        </div>



    </body>
</html>
