<!doctype html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Our Products | Modulia</title>
  <link rel="stylesheet" href="../css/products.css">
</head>

<body>

  <!-- HEADER -->
<header class="products-header">
  <span class="header-eyebrow">Our collection</span>
  <h1>Modular Products</h1>
  <p>
    A curated selection of modular spaces designed for living,
    working and commercial use.
  </p>
</header>

  <!-- MAIN -->
  <main class="products-layout">

    <!-- FILTERS -->
    <aside class="filters">

      <div class="filter-group">
        <h4>Search</h4>
        <input type="text" placeholder="Search products">
      </div>

      <div class="filter-group">
        <h4>Categories</h4>
        <ul class="categories-list">
          <li class="active" data-category="all">All Products</li>
          <li data-category="office">Office Spaces</li>
          <li data-category="home">Container Homes</li>
          <li data-category="commercial">Commercial</li>
        </ul>
      </div>

      <div class="filter-group">
        <h4>Price Range</h4>
        <div class="price-range">
          <input type="number" placeholder="0">
          <span>—</span>
          <input type="number" placeholder="200000">
        </div>
      </div>

    </aside>

    <!-- PRODUCTS -->
    <section class="products-grid">

      <!-- OFFICE -->
      <article class="product-card" data-category="office" data-price="38000" data-name="home office pro">
        <div class="product-img"><img src="../img/foto3.jpg"></div>
        <div class="product-info">
          <span class="product-category">Office Spaces</span>
          <h3>Home Office Pro</h3>
          <span class="product-size">160 sq ft</span>
          <span class="product-price">$38,000</span>
        </div>
      </article>

      <article class="product-card" data-category="office" data-price="68000" data-name="startup hub">
        <div class="product-img"><img src="../img/foto3.jpg"></div>
        <div class="product-info">
          <span class="product-category">Office Spaces</span>
          <h3>Startup Hub</h3>
          <span class="product-size">320 sq ft</span>
          <span class="product-price">$68,000</span>
        </div>
      </article>

      <article class="product-card" data-category="office" data-price="125000" data-name="executive suite">
        <div class="product-img"><img src="../img/foto3.jpg"></div>
        <div class="product-info">
          <span class="product-category">Office Spaces</span>
          <h3>Executive Suite</h3>
          <span class="product-size">640 sq ft</span>
          <span class="product-price">$125,000</span>
        </div>
      </article>

      <!-- CONTAINER HOMES -->
      <article class="product-card" data-category="home" data-price="72000" data-name="compact living module">
        <div class="product-img"><img src="../img/foto3.jpg"></div>
        <div class="product-info">
          <span class="product-category">Container Homes</span>
          <h3>Compact Living Module</h3>
          <span class="product-size">160 sq ft</span>
          <span class="product-price">$72,000</span>
        </div>
      </article>

      <article class="product-card" data-category="home" data-price="145000" data-name="family residence">
        <div class="product-img"><img src="../img/foto3.jpg"></div>
        <div class="product-info">
          <span class="product-category">Container Homes</span>
          <h3>Family Residence</h3>
          <span class="product-size">640 sq ft</span>
          <span class="product-price">$145,000</span>
        </div>
      </article>

      <!-- COMMERCIAL -->
      <article class="product-card" data-category="commercial" data-price="56000" data-name="retail pop-up">
        <div class="product-img"><img src="../img/foto3.jpg"></div>
        <div class="product-info">
          <span class="product-category">Commercial</span>
          <h3>Retail Pop-Up</h3>
          <span class="product-size">240 sq ft</span>
          <span class="product-price">$56,000</span>
        </div>
      </article>

      <article class="product-card" data-category="commercial" data-price="98000" data-name="modular cafe">
        <div class="product-img"><img src="../img/foto3.jpg"></div>
        <div class="product-info">
          <span class="product-category">Commercial</span>
          <h3>Modular Café</h3>
          <span class="product-size">400 sq ft</span>
          <span class="product-price">$98,000</span>
        </div>
      </article>

    </section>

  </main>

  <?php include "footer.html"; ?>
  <script src="../js/products.js"></script>
</body>
</html>