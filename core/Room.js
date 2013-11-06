// Constructor
Room = function()
{
    Sim.App.call(this);
}

Room.prototype = new Sim.Object();

Room.prototype.CreateRoom = function(x,y,level,windowsFront,doorsFront,windowsBack,doorsBack,windowsLeft,doorsLeft,windowsRight,doorsRight)
{
    var room = new THREE.Object3D;
    this.setObject3D(room);


    var aux = new Wall();
    this.object3D.add(aux.CreateWall({width: y, height: wallheight, depth: 1}, 1, {x: x, y: level, z: 0},windowsRight,doorsRight));
    
    this.object3D.add(aux.CreateWall({width: y, height: wallheight, depth: 1}, 1, {x: -x, y: level, z: 0},windowsLeft,doorsLeft));
    this.object3D.add(aux.CreateWall({width: x, height: wallheight, depth: 1}, 2, {x: 0, y: level, z: y},windowsFront,doorsFront));
    this.object3D.add(aux.CreateWall({width: x, height: wallheight, depth: 1}, 2, {x: 0, y: level, z: -y},windowsBack,doorsBack));
    
    return room;

};

