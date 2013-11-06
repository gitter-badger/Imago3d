// Constructor
BasicFloor = function()
{
    Sim.App.call(this);
}


BasicFloor.prototype.CreateFloor = function(x,y,z)
{

    var mapUrl = "core/images/floor_1.jpg";
    var map = THREE.ImageUtils.loadTexture(mapUrl);
    map.wrapS = map.wrapT = THREE.MirroredRepeatWrapping;    
  
    map.repeat.set(x/10,y/10);
 
    
    map.anisotropy = 16;
    var geometry = new THREE.CubeGeometry(0.01, x, y);
    var material = new THREE.MeshLambertMaterial({map: map});
    
    var mesh = new THREE.Mesh(geometry, material);
    mesh.castShadow = true;
    mesh.receiveShadow = true;
    mesh.position.set(0, z, -180); // 136 = 180-(88/2)
    mesh.rotation.z = Math.PI / 2;
    
   objects.push(mesh); //rende solido
    
    return mesh;
};

