// Constructor
Grid = function()
{
    Sim.App.call(this);
}


Grid.prototype.createGrid = function()
{

// i bet you look good on the dance floor
    var texture1 = THREE.ImageUtils.loadTexture("core/images/grid_grass.jpg");
    var material1 = new THREE.MeshPhongMaterial({map: texture1, ambient: 0xffffff, color: 0xffffff, specular: 0x050505});
    material1.color.setHSL(0.095, 1, 0.75);
    
    texture1.wrapS = texture1.wrapT = THREE.RepeatWrapping;
    texture1.repeat.set(200,200);
    texture1.anisotropy = 16;

    var geometry = new THREE.PlaneGeometry(1000,1000);

    var mesh1 = new THREE.Mesh(geometry, material1);
    mesh1.rotation.x = -Math.PI / 2;
    mesh1.scale.set(1, 1, 1);
    mesh1.position.set(0, 0, 0);
    mesh1.receiveShadow = true;
    objects.push(mesh1);

    return mesh1;

}









