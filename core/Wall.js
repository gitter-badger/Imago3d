// Constructor
Wall = function()
{
    Sim.App.call(this);
}


Wall.prototype.driveCreateWall = function(dimension,y_rotation,position,windows,doors)
{


    var mapUrl = "core/images/wall_1.jpg";
    var map = THREE.ImageUtils.loadTexture(mapUrl);
    map.wrapS = map.wrapT = THREE.MirroredRepeatWrapping;
    map.repeat.set(10, 2);
    map.anisotropy = 16;


    var cube_geometry = new THREE.CubeGeometry(dimension.width,dimension.height,dimension.depth);//dimensione
    var cube_mesh = new THREE.Mesh(cube_geometry, new THREE.MeshLambertMaterial({map: map}));

    cube_mesh.position.set(position.x/2, (dimension.height/2)+position.y, (-180+position.z/2));//posizione posizione al centro del pavimento (0, y/2, -180)


    

var cube_bsp = new ThreeBSP( cube_mesh );

//rimozione --> Finestre
if(windows.left===1){
var cube_geometryL = new THREE.CubeGeometry( 10, dimension.height/2, 1);
var cube_meshL = new THREE.Mesh(cube_geometryL,new THREE.MeshLambertMaterial());
cube_meshL.position.set((position.x/2)-dimension.width/4, (dimension.height/2)+position.y, (-180+position.z/2));
var cube_bspL = new ThreeBSP( cube_meshL );
var cube_bsp = cube_bsp.subtract( cube_bspL );}

if(windows.center===1){
var cube_geometryC = new THREE.CubeGeometry( 10, dimension.height/2, 1);
var cube_meshC = new THREE.Mesh(cube_geometryC,new THREE.MeshLambertMaterial());
cube_meshC.position.set((position.x/2), (dimension.height/2)+position.y, (-180+position.z/2));
var cube_bspC = new ThreeBSP( cube_meshC );
var cube_bsp = cube_bsp.subtract( cube_bspC );}

if(windows.right===1){
var cube_geometryR = new THREE.CubeGeometry( 10, dimension.height/2, 1);
var cube_meshR = new THREE.Mesh(cube_geometryR,new THREE.MeshLambertMaterial());
cube_meshR.position.set((position.x/2)+dimension.width/4, (dimension.height/2)+position.y, (-180+position.z/2));
var cube_bspR = new ThreeBSP( cube_meshR );
var cube_bsp = cube_bsp.subtract( cube_bspR );}

//rimozione --> Porte
if(doors.left===1){
var cube_geometryL = new THREE.CubeGeometry( 6, dimension.height-2, 1);
var cube_meshL = new THREE.Mesh(cube_geometryL,new THREE.MeshLambertMaterial());
cube_meshL.position.set((position.x/2)-dimension.width/4, (dimension.height/2-2)+position.y, (-180+position.z/2));
var cube_bspL = new ThreeBSP( cube_meshL );
var cube_bsp = cube_bsp.subtract( cube_bspL );}

if(doors.center===1){
var cube_geometryC = new THREE.CubeGeometry( 6, dimension.height-2, 1);
var cube_meshC = new THREE.Mesh(cube_geometryC,new THREE.MeshLambertMaterial());
cube_meshC.position.set((position.x/2), (dimension.height/2-2)+position.y, (-180+position.z/2));
var cube_bspC = new ThreeBSP( cube_meshC );
var cube_bsp = cube_bsp.subtract( cube_bspC );}

if(doors.right===1){
var cube_geometryR = new THREE.CubeGeometry( 6, dimension.height-2, 1);
var cube_meshR = new THREE.Mesh(cube_geometryR,new THREE.MeshLambertMaterial());
cube_meshR.position.set((position.x/2)+dimension.width/4, (dimension.height/2-2)+position.y, (-180+position.z/2));
var cube_bspR = new ThreeBSP( cube_meshR );
var cube_bsp = cube_bsp.subtract( cube_bspR );}


var result = cube_bsp.toMesh(new THREE.MeshLambertMaterial({map:map }));

var aux;
    switch (y_rotation) {


        case 1:
            result.rotation.y = Math.PI / 2;
            aux=Math.PI / 2;
            break; //vertical
        case 2:
            result.rotation.y = Math.PI;
            aux=Math.PI;
            break;  //horizontal
        case 3:
            result.rotation.y = Math.PI / 3;
            break; //oblique dx
        case 4:
            result.rotation.y = Math.PI / -3;
            break; //oblique sx

    }


    result.castShadow = true;
    result.receiveShadow = true;
    return result;

};


Wall.prototype.CreateWall = function(dimension,y_rotation,position,windows,doors)
{


    var mapUrl = "core/images/wall_1.jpg";
    var map = THREE.ImageUtils.loadTexture(mapUrl);
    map.wrapS = map.wrapT = THREE.MirroredRepeatWrapping;
    map.repeat.set(10, 2);
    map.anisotropy = 16;


    var cube_geometry = new THREE.CubeGeometry(dimension.width,dimension.height,dimension.depth);//dimensione
    var cube_mesh = new THREE.Mesh(cube_geometry, new THREE.MeshLambertMaterial({map: map}));

    cube_mesh.position.set(position.x/2, (dimension.height/2)+position.y, (-180+position.z/2));//posizione posizione al centro del pavimento (0, y/2, -180)


    

var cube_bsp = new ThreeBSP( cube_mesh );

//rimozione --> Finestre
for(var i=0;i<windows.length;i++)
{
var cube_geometryL = new THREE.CubeGeometry( windows[i].width, windows[i].height, windows[i].depth);
var cube_meshL = new THREE.Mesh(cube_geometryL,new THREE.MeshLambertMaterial());
cube_meshL.position.set((position.x/2)-windows[i].positionx, (dimension.height/2-2)+position.y+windows[i].positiony, (-180+position.z/2));
var cube_bspL = new ThreeBSP( cube_meshL );
var cube_bsp = cube_bsp.subtract( cube_bspL );     
}
//rimozione --> Porte
for(var i=0;i<doors.length;i++)
{
    
var cube_geometryC = new THREE.CubeGeometry( doors[i].width, doors[i].height-2,  doors[i].depth);
var cube_meshC = new THREE.Mesh(cube_geometryC,new THREE.MeshLambertMaterial());
cube_meshC.position.set(((position.x/2)-doors[i].positionx), (dimension.height/2)-3+position.y+doors[i].positiony, (-180+position.z/2));
var cube_bspC = new ThreeBSP( cube_meshC );
var cube_bsp = cube_bsp.subtract( cube_bspC );     
  
}




var result = cube_bsp.toMesh(new THREE.MeshLambertMaterial({map:map }));

var aux;
    switch (y_rotation) {


        case 1:
            result.rotation.y = Math.PI / 2;
            aux=(Math.PI / 2);
            break; //vertical
        case 2:
            result.rotation.y = Math.PI;
            aux=(Math.PI);
            break;  //horizontal
        case 3:
            result.rotation.y = Math.PI / 3;
            break; //oblique dx
        case 4:
            result.rotation.y = Math.PI / -3;
            break; //oblique sx

    }


    result.castShadow = true;
    result.receiveShadow = true;
    return result;

};