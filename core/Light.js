Light = function()
{
    Sim.Object.call(this);
}

Light.prototype = new Sim.Object();

Light.prototype.directlight = function()
{
    var dirLight = new THREE.DirectionalLight(0xffffff, .6);
    dirLight.color.setHSL(0.1, 1, 0.95);
    dirLight.position.set(14, 6.75, 25);
    dirLight.position.multiplyScalar(9);
    this.setObject3D(dirLight);


    dirLight.castShadow = true;

    dirLight.shadowMapWidth = 2048;
    dirLight.shadowMapHeight = 2048;

    var d = 150;

    dirLight.shadowCameraLeft = -d;
    dirLight.shadowCameraRight = d;
    dirLight.shadowCameraTop = d;
    dirLight.shadowCameraBottom = -d;

    dirLight.shadowCameraFar = 590;
    dirLight.shadowBias = -0.0001;
    dirLight.shadowDarkness = 0.60;
    dirLight.shadowCameraVisible = false;

    return dirLight;



};

Light.prototype.ambientlight = function()
{

    var light = new THREE.AmbientLight(0x808080);
    this.setObject3D(light);
    return light;
};




