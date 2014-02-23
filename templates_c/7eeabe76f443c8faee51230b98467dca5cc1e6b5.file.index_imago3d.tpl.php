<?php /* Smarty version Smarty-3.1.15, created on 2014-01-04 03:30:32
         compiled from "./templates/index_imago3d.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11944547485277c72ccb1938-86602200%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7eeabe76f443c8faee51230b98467dca5cc1e6b5' => 
    array (
      0 => './templates/index_imago3d.tpl',
      1 => 1388697950,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11944547485277c72ccb1938-86602200',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5277c72cd09f60_91840976',
  'variables' => 
  array (
    'jsonstring' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5277c72cd09f60_91840976')) {function content_5277c72cd09f60_91840976($_smarty_tpl) {?><!DOCTYPE html>
<html>
    <head>
        <title>Imago3d</title>

        <link rel="stylesheet" href="../css/webglbook.css" /> 


        <script src="core/libs/three.js"></script>
        <script src="core/libs/three.min.js"></script>

        <script src="core/libs/jquery-1.6.4.js"></script>
        <script src="core/libs/jquery.mousewheel.js"></script>
        <script src="core/libs/RequestAnimationFrame.js"></script>
        <script src="core/sim/sim.js"></script>

        <script src="core/libs/csg.js"></script>
        <script src="core/libs/ThreeCSG.js"></script>


        <script src="core/libs/PointerLockControls.js"></script>


        <script src="core/SceneViewerLib.js"></script>
        <script src="core/Light.js"></script>
        <script src="core/Grid.js"></script>
        <script src="core/BasicFloor.js"></script>
        <script src="core/Wall.js"></script>
        <script src="core/Room.js"></script>




        <style>
            html, body {
                width: 100%;
                height: 100%;
            }

            body {
                background-color: #d8d8d8;
                margin: 0;
                overflow: hidden;
                font-family: arial;
            }

            #blocker {

                position: absolute;

                width: 100%;
                height: 100%;

                background-color: rgba(0,0,0,0.5);

            }

            #instructions {

                width: 100%;
                height: 100%;

                display: -webkit-box;
                display: -moz-box;
                display: box;

                -webkit-box-orient: horizontal;
                -moz-box-orient: horizontal;
                box-orient: horizontal;

                -webkit-box-pack: center;
                -moz-box-pack: center;
                box-pack: center;

                -webkit-box-align: center;
                -moz-box-align: center;
                box-align: center;

                color: #ffffff;
                text-align: center;

                cursor: pointer;

            }

        </style>


        <script>

            var wallheight = 25; // altezza dei muri
            
            var objects = []; //tutti i mesh in questo array sono non scavalcabili(fisici)

            var geometry, material;
            var controls, time = Date.now();
            var blocker, instructions;
            var objects = [];

            var ray;



            var renderer = null;
            var scene = null;
            var camera = null;
            var mesh = null;

            $(document).ready(
                    function() {




                        blocker = document.getElementById('blocker');
                        instructions = document.getElementById('instructions');

                        // http://www.html5rocks.com/en/tutorials/pointerlock/intro/

                        var havePointerLock = 'pointerLockElement' in document || 'mozPointerLockElement' in document || 'webkitPointerLockElement' in document;

                        if (havePointerLock) {

                            var element = document.body;

                            var pointerlockchange = function(event) {

                                if (document.pointerLockElement === element || document.mozPointerLockElement === element || document.webkitPointerLockElement === element) {

                                    controls.enabled = true;

                                    blocker.style.display = 'none';

                                } else {

                                    controls.enabled = false;

                                    blocker.style.display = '-webkit-box';
                                    blocker.style.display = '-moz-box';
                                    blocker.style.display = 'box';

                                    instructions.style.display = '';

                                }

                            }

                            var pointerlockerror = function(event) {

                                instructions.style.display = '';

                            }

                            // Hook pointer lock state change events
                            document.addEventListener('pointerlockchange', pointerlockchange, false);
                            document.addEventListener('mozpointerlockchange', pointerlockchange, false);
                            document.addEventListener('webkitpointerlockchange', pointerlockchange, false);

                            document.addEventListener('pointerlockerror', pointerlockerror, false);
                            document.addEventListener('mozpointerlockerror', pointerlockerror, false);
                            document.addEventListener('webkitpointerlockerror', pointerlockerror, false);

                            instructions.addEventListener('click', function(event) {

                                instructions.style.display = 'none';

                                // Ask the browser to lock the pointer
                                element.requestPointerLock = element.requestPointerLock || element.mozRequestPointerLock || element.webkitRequestPointerLock;

                                if (/Firefox/i.test(navigator.userAgent)) {

                                    var fullscreenchange = function(event) {

                                        if (document.fullscreenElement === element || document.mozFullscreenElement === element || document.mozFullScreenElement === element) {

                                            document.removeEventListener('fullscreenchange', fullscreenchange);
                                            document.removeEventListener('mozfullscreenchange', fullscreenchange);

                                            element.requestPointerLock();
                                        }

                                    }

                                    document.addEventListener('fullscreenchange', fullscreenchange, false);
                                    document.addEventListener('mozfullscreenchange', fullscreenchange, false);

                                    element.requestFullscreen = element.requestFullscreen || element.mozRequestFullscreen || element.mozRequestFullScreen || element.webkitRequestFullscreen;

                                    element.requestFullscreen();

                                } else {

                                    element.requestPointerLock();

                                }

                            }, false);

                        } else {

                            instructions.innerHTML = 'Your browser doesn\'t seem to support Pointer Lock API';

                        }

                        var datajson = <?php echo $_smarty_tpl->tpl_vars['jsonstring']->value;?>



                        var container = document.getElementById("container");
                        var app = new SceneViewer();
                        app.init({container: container, jsondata: datajson});
                        app.run();

                    }
            );


        </script>

    </head>
    <body>
        <div id="container" style="width:100%; height:100%; overflow:hidden; position:absolute;"></div>
        <div id="blocker">

            <div id="instructions">
                <span style="font-size:40px">Benvenuto in imago3d!</span>
                <br />
                Per vedere il tuo modello fai click sullo schermo <br />
                (W, A, S, D = Move, SPACE=Jump!,  MOUSE = Look around)
                <br />
                <a href="index.php" style="color:white;">TORNA ALL'EDITOR</a>
            </div>
            
            

        </div>
    </body>
</html>
<?php }} ?>
