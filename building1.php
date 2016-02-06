<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Schedular</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="dist/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="dist/css/styles.css">
</head>

<body class="hold-transition skin-green layout-top-nav">

  <style type="text/css" media="screen">
    #three {
      height: 42.35em;
    }
  </style>
  <div class="wrapper">

    <?php 
          $current_page = "home";
          include("header.php"); 
    ?>

    <!-- Full Width Column -->
    <div class="content-wrapper">
      <div id="three">

      </div>

    </div>
    <!-- /.content-wrapper -->
  </div>
  <!-- ./wrapper -->
  
  <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
  <script src="plugins/fastclick/fastclick.js"></script>

  <script src="dist/js/scripts.js"></script>
  <script src="plugins/three.js/build/three.min.js"></script>
  <script src="plugins/threestrap/build/threestrap.min.js"></script>
  <script src="plugins/threex-colladaloader/ColladaLoader.js"></script>

  <script>

    var loader = new THREE.ColladaLoader();
        loader.options.convertUpAxis = true;
        loader.load( 'boom.dae', function ( collada ) {
        dae = collada.scene; 
    });

    // Bootstrap core + controls plugin into element
    var three = THREE.Bootstrap({
      element: document.querySelector('#three'),
      plugins: ['core', 'controls', 'cursor'],
      controls: {
        klass: THREE.OrbitControls
      },
    });

    // Alter controls
    three.controls.rotateSpeed = 0.5;

    // Random generator
    var sd = 12345;
    function rnd() {
      sd = (Math.abs(Math.sin(sd * 10000) * 1000)) % 1;
      return sd * 2 - 1;
    }

    // Insert cubes
    var colors = [
      new THREE.Color(0x3090FF),
      new THREE.Color(0x10A0FF),
      new THREE.Color(0x60109F),
    ];
    var n = colors.length;
    for (var i = 0; i < 100; ++i) {
      var sz = 1 + rnd() * .2;
      var mesh = new THREE.Mesh(new THREE.BoxGeometry(sz, sz, sz),
                                new THREE.MeshPhongMaterial({ color: colors[i % n] }));
      mesh.position.set(rnd() * 10, rnd() * 10, rnd() * 10);
      three.scene.add(mesh);
    }

    // Lights
    var hemiLight = new THREE.HemisphereLight(0xffffff, 0xffffff, 0.6);
    hemiLight.color.setHSL(0.6, 1, 0.6);
    hemiLight.groundColor.setHSL(0.095, 1, 0.75);
    hemiLight.position.set(0, 500, 0);
    three.scene.add(hemiLight);

    var dirLight = new THREE.DirectionalLight(0xffffff, 1);
    dirLight.color.setHSL(0.1, 1, 0.95);
    dirLight.position.set(-1, 1.75, 1);
    dirLight.position.multiplyScalar(50);
    three.scene.add(dirLight);

    // Place camera
    three.camera.position.set(3, 1.5, 5.6);

    three.scene.add( dae );

  </script>

</body>
</html>