<!doctype html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <title>Modulia</title>
    <link rel="stylesheet" href="../css/paginaPrincipal.css" />
  </head>
  <body>
    <!-- HERO -->
    <header class="hero">
      <img src="../img/logo.png" alt="Modulia logo" class="hero-logo" />

      <h1 class="hero-text">
        MODULAR SOLUTIONS FOR A NEW<br />
        <span>WAY OF LIVING</span>
      </h1>

      <div class="hero-plus">+</div>
    </header>

    <!-- CLAIM -->
    <section class="claim">
      <p>
        WE DESIGN CUSTOM, ARCHITECT-GRADE SPACES<br />
        <span>AND BUILD THEM IN WEEKS, NOT YEARS.</span>
      </p>
    </section>

    <!-- FEATURES IMAGE -->
    <section class="features-section">
      <div class="features-wrapper">
        <img src="../img/cocina1.jpg" id="featuresImage" alt="Features Image" />

        <div class="features-tags">
          <span id="kitchen" class="active">Kitchen</span>
          <span id="living">Living Room</span>
          <span id="bathroom">Bathroom</span>
        </div>

        <button class="features-btn">Explore Features</button>
      </div>
    </section>

    <!-- FINAL TEXT -->
    <section class="final">
      <h2>
        DESIGNED TO BLEND IN,<br />
        <span>NATURALLY STANDS OUT.</span>
      </h2>
      <button class="secondary-btn">Explore Features</button>
    </section>
    <div class="compare-wrapper">
      <div class="compare-container" id="compare">

        <img src="../img/transicion1.png" class="compare-img base" />

        <img
          src="../img/transicion2.png"
          class="compare-img top"
          id="topImage"
        />

        <div class="divider" id="divider">
          <span class="handle"></span>
        </div>


      </div>
    </div>

    <?php include "footer.html";?>

    <script src="../js/paginaPrincipal.js"></script>
  </body>
</html>
