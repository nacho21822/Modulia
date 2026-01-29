<!doctype html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <title>Modulia</title>
    <link rel="stylesheet" href="../css/paginaPrincipal.css" />
  </head>
  <body>
    
    <!-- HERO -->
    <section class="hero">
      <?php include "./header.html"?>

      <h1 class="hero-text">
        MODULAR SOLUTIONS FOR A NEW<br />
        <span>WAY OF LIVING</span>
      </h1>

      <div class="hero-plus">+</div>
  </section>

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

        <!-- CATEGORIES -->
    <section class="categories">
      <p>
        CAREFULLY CURATED CATEGORIES<br />
        <span>FOR TIMELESS OUTCOMES.</span>
      </p>
    </section>

    <!-- CARDS -->
<section class="cards-section">
  <div class="cards-container">

    <a href="#" class="card">
      <img src="../img/foto4.jpg" alt="Container Homes" />
      <div class="card-overlay">
        <h3>CONTAINER HOMES</h3>
        <p>
          Transform shipping containers into beautiful, sustainable homes.
          From cozy studios to spacious family residences.
        </p>
      </div>
    </a>

    <a href="#" class="card">
      <img src="../img/category-offices.jpg" alt="Office Spaces" />
      <div class="card-overlay">
        <h3>OFFICE SPACES</h3>
        <p>
          Modern, efficient office solutions perfect for startups,
          remote work, or expanding businesses.
        </p>
      </div>
    </a>

    <a href="#" class="card">
      <img src="../img/comercial1.jpg" alt="Commercial" />
      <div class="card-overlay">
        <h3>COMMERCIAL</h3>
        <p>
          Pop-up shops, cafes, restaurants, and retail spaces designed
          for maximum impact and flexibility.
        </p>
      </div>
    </a>

  </div>
</section>

<!-- SCROLL STORY -->
<section class="scroll-story">
  <div class="scroll-sticky">

    <!-- TEXT -->
    <div class="story-text">
      <div class="story-item active">Designed for modern living</div>
      <div class="story-item">Built faster than traditional homes</div>
      <div class="story-item">Sustainable & modular by design</div>
      <div class="story-item">Adaptable to any environment</div>
    </div>

    <!-- IMAGES -->
    <div class="story-images">
      <img src="../img/foto3.jpg" class="story-img active" />
      <img src="../img/foto4.jpg" class="story-img" />
      <img src="../img/comedor1.jpg" class="story-img" />
      <img src="../img/fondo2.jpg" class="story-img" />
    </div>

  </div>
</section>

    <?php include "footer.html";?>
    <script src="../js/paginaPrincipal.js"></script>
  </body>
</html>