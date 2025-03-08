<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />

        <script src='https://cdn.jsdelivr.net/npm/deepar@5.6.3/js/deepar.js'> </script>

    <style>
      /* Asegurar que el div ocupe toda la pantalla */
      html, body {
          margin: 0;
          padding: 0;
          width: 100%;
          height: 100%;
          overflow: hidden;
      }
  
      #deepar-div {
          width: 100vw;
          height: 100vh;
          position: absolute;
          top: 0;
          left: 0;
      }
  </style>
</head>

<body>
    <!-- Div element where AR preview will be inserted -->
  <div id='deepar-div'></div>
  <!-- Initialize DeepAR and load AR effect/filter -->
  <script>
    (async function() {
      const deepAR = await deepar.initialize({
        licenseKey: '57b9c24927dff91e79042795d36bf8e8d48bd42a4447f85794d990573e59436887edfdd22f7557a8',
        previewElement: document.querySelector('#deepar-div'),
        effect: 'https://cdn.jsdelivr.net/npm/deepar@5.6.3/effects/Shoe',
        additionalOptions: {
      cameraConfig: {
          facingMode: 'environment'
      }
  }
      });
    })();
  </script>
</body>

</html>