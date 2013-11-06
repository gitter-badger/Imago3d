

SceneViewer = function()
{
    //chiamata al costruttore di sim App
    Sim.App.call(this);
};

// Subclass Sim.App
SceneViewer.prototype = new Sim.App();

// Our custom initializer
SceneViewer.prototype.init = function(param)
{
    // Call superclass init code to set up scene, renderer, default camera
    Sim.App.prototype.init.call(this, param);

    this.camera = new THREE.PerspectiveCamera(45, 1, 1, 4000);
    this.camera.position.set(0, 0, 0);

  


    // Create the model and add it to our sim
    var content = new Scene();
    content.init(param.jsondata);
    this.addObject(content);

    this.createCameraControls();

    this.content = content;


};



// Custom model class
Scene = function()
{
    Sim.Object.call(this);
};

Scene.prototype = new Sim.Object();

Scene.prototype.init = function(param)
{

    var group = new THREE.Object3D;
    this.setObject3D(group);
    
     
    
    //this.light1=this.createLight();

    //elementi fissi 
    this.createGrid();
    this.lightD = this.createDirectLight();
    this.lightA = this.createAmbientLight();

    //grandezza sul piano del pavimento x/y
    
     for(var i=0;i<param.length;i++)
    {
        
        switch (param[i].name) {


        case "Floor":
            this.floor = this.createFloor(param[i].xdim,param[i].ydim,param[i].level*(wallheight));
            break; 
        case "mainRoom":
            this.generateRoom(param[i].xdim,param[i].ydim,param[i].level*(wallheight),param[i].windowsFront,param[i].doorsFront,param[i].windowsBack,param[i].doorsBack,param[i].windowsLeft,param[i].doorsLeft,param[i].windowsRight,param[i].doorsRight);
            break;  
        case "Wall":
            this.generateWall({width: param[i].width, height: param[i].height, depth: param[i].depth}, param[i].yrotation, {x: param[i].positionx, y: param[i].positiony, z:param[i].positionz},param[i].windows,param[i].doors);
            break; //oblique dx
        

    }
    
    }
    
       
     



};

Scene.prototype.createDirectLight = function()
{
    var light = new Light();
    this.object3D.add(light.directlight());
    return light;
};

Scene.prototype.createAmbientLight = function()
{
    var light = new Light();
    this.object3D.add(light.ambientlight());
    return light;
};


Scene.prototype.createGrid = function()
{
    var aux = new Grid();
    this.object3D.add(aux.createGrid());
};

Scene.prototype.createFloor = function(x,y,z)
{
    var aux = new BasicFloor();
    this.object3D.add(aux.CreateFloor(x, y,z));//aggiungo l'elemento alla scena
    return aux;
}

Scene.prototype.generateWall = function(dimension, y_rotation, position,windows,doors)
{
    var aux = new Wall();
    this.object3D.add(aux.CreateWall(dimension, y_rotation, position,windows,doors));//aggiungo l'elemento alla scena
    return aux;
}

Scene.prototype.generateRoom = function(x,y,level,windowsFront,doorsFront,windowsBack,doorsBack,windowsLeft,doorsLeft,windowsRight,doorsRight)
{
    var aux = new Room();
    this.object3D.add(aux.CreateRoom(x,y,level,windowsFront,doorsFront,windowsBack,doorsBack,windowsLeft,doorsLeft,windowsRight,doorsRight));
    return aux;
}


Scene.prototype.update = function()
{
    //richiama l'update sugli oggetti
    Sim.Object.prototype.update.call(this);
//   this.cube.update();

};


SceneViewer.prototype.createCameraControls = function()
{
    controls = new THREE.PointerLockControls(this.camera);
    this.scene.add(controls.getObject());
    this.scene.fog = new THREE.Fog(0xeaeaea, 1, 750);
    ray = new THREE.Raycaster();
    ray.ray.direction.set(0, -1, 0);
    this.controls = controls;
};

SceneViewer.prototype.update = function()
{

    Sim.App.prototype.update.call(this);
    controls.isOnObject(false);

    ray.ray.origin.copy(controls.getObject().position);
    ray.ray.origin.y -= 5;

    intersections = ray.intersectObjects(objects);

    if (intersections.length > 0) {

        var distance = intersections[ 0 ].distance;

        if (distance > 0 && distance < 10) {

            controls.isOnObject(true);

        }

    }

  
          
    
    
    controls.update(Date.now() - time);

    time = Date.now();



};

