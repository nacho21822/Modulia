@extends('layouts.app')

@section('title', 'Inicio')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}" />
@endpush

@section('content')

    {{-- NOTIFICACIÓN DE BIENVENIDA (TOAST) --}}
    @if (session('welcome'))
    <div class="welcome-toast">
        <div class="toast-content">
            <img src="{{ asset('img/si.png') }}" alt="Icono" class="toast-img" />
            <p>{{ session('welcome') }}</p>
        </div>
        <div class="toast-progress"></div>
    </div>
@endif

    <section class="hero">
        {{-- VIDEO DE FONDO --}}
        <video autoplay muted loop playsinline class="hero-video">
            <source src="{{ asset('img/videoFinal.mp4') }}" type="video/mp4">
            Tu navegador no soporta videos HTML5.
        </video>

        {{-- CAPA OSCURA (OPCIONAL, PARA QUE SE LEA EL TEXTO) --}}
        <div class="hero-overlay"></div>

        {{-- CONTENIDO DEL HERO --}}
        <h1 class="hero-text">
            MODULAR SOLUTIONS FOR A NEW<br />
            <span>WAY OF LIVING</span>
        </h1>
        <div class="hero-plus" id="aboutBtn">+</div>
    </section>

    {{-- MODAL ABOUT US --}}
    <div class="about-backdrop" id="aboutModal" aria-hidden="true">
        <div class="about-modal">
            <button class="about-close" id="aboutClose" aria-label="Close">&times;</button>

            <div class="about-header">
                <span class="about-tag">EST. 2020 &mdash; BARCELONA</span>
                <h2>About Modulia</h2>
            </div>

            <div class="about-body">
                <p class="about-lead">
                    We design and build modular container spaces that redefine the way people live, work, and
                    do business &mdash; without compromising on quality, speed, or sustainability.
                </p>

                <div class="about-stats">
                    <div class="about-stat">
                        <strong>+500</strong>
                        <span>Projects delivered</span>
                    </div>
                    <div class="about-stat">
                        <strong>18</strong>
                        <span>Countries</span>
                    </div>
                    <div class="about-stat">
                        <strong>60%</strong>
                        <span>Faster than traditional construction</span>
                    </div>
                </div>

                <div class="about-pillars">
                    <div class="about-pillar">
                        <h4>Our Mission</h4>
                        <p>To make architectural quality accessible through intelligent modular systems &mdash;
                        spaces that are built to last, adapt, and inspire.</p>
                    </div>
                    <div class="about-pillar">
                        <h4>What We Build</h4>
                        <p>From private container homes and professional office spaces to commercial pop-ups and
                        industrial warehouses &mdash; every module is engineered for performance.</p>
                    </div>
                    <div class="about-pillar">
                        <h4>Our Promise</h4>
                        <p>Each project is designed around your vision and timeline. We handle everything
                        from concept to installation, so you can focus on what matters.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="claim">
      <p>ARCHITECTURAL MODULAR SPACES,<br/>
      <span>TAILORED TO YOUR VISION AND TIMELINE.</span>
      </p>
    </section>

    <section class="features-section">
      <div class="features-wrapper">
        <img src="{{ asset('img/cocina2.jpg') }}" id="featuresImage" alt="Features Image" />
        <div class="features-tags">
          <span id="kitchen" class="active" data-img="{{ asset('img/cocina2.jpg') }}">Kitchen</span>
          <span id="living" data-img="{{ asset('img/salon.jpg') }}">Living Room</span>
          <span id="bathroom" data-img="{{ asset('img/baño.jpg') }}">Bathroom</span>
        </div>
        <button class="features-btn">Our Products</button>
      </div>
    </section>

    <section class="final">
      <p>DESIGNED TO INTEGRATE SEAMLESSLY,<br/>
      <span>BUILT TO MAKE AN IMPACT.</span>
      </p>
      <button class="secondary-btn">Our Product</button>
    </section>

    <div class="compare-wrapper">
      <div class="compare-container" id="compare">
        <img src="{{ asset('img/transicion1.png') }}" class="compare-img base" />
        <img src="{{ asset('img/transicion2.png') }}" class="compare-img top" id="topImage" />
        <div class="divider" id="divider">
          <span class="handle"></span>
        </div>
      </div>
    </div>

    <section class="categories">
      <p>
        CAREFULLY CURATED CATEGORIES<br />
        <span>FOR TIMELESS OUTCOMES.</span>
      </p>
    </section>

  <section class="cards-section">
    <div class="cards-container">
    
      {{-- TARJETA 1: HOMES --}}
      <a href="{{ route('products.index', ['category' => 'Container Homes']) }}" class="card">
        <img src="{{ asset('img/foto4.jpg') }}" alt="Container Homes" />
        <div class="card-overlay">
          <h3>CONTAINER HOMES</h3>
          <p>Transform shipping containers into beautiful, sustainable homes.</p>
        </div>
      </a>

      {{-- TARJETA 2: OFFICES --}}
      <a href="{{ route('products.index', ['category' => 'Office Spaces']) }}" class="card">
        <img src="{{ asset('img/category-offices.jpg') }}" alt="Office Spaces" />
        <div class="card-overlay">
          <h3>OFFICE SPACES</h3>
          <p>Modern, efficient office solutions.</p>
        </div>
      </a>

      {{-- TARJETA 3: COMMERCIAL --}}
      <a href="{{ route('products.index', ['category' => 'Commercial']) }}" class="card">
        <img src="{{ asset('img/comercial1.jpg') }}" alt="Commercial" />
        <div class="card-overlay">
          <h3>COMMERCIAL</h3>
          <p>Pop-up shops, cafes, restaurants.</p>
        </div>
      </a>

    </div>
  </section>

    <section class="scroll-story">
      <div class="scroll-sticky">
        <div class="story-text">
          <div class="story-item active">Versatile modular systems for industry, offices, and housing</div>
          <div class="story-item">Temporary or permanent modular buildings</div>
          <div class="story-item">Quality, durability, and efficiency in every module</div>
          <div class="story-item">Cost-effective alternative to traditional construction</div>
          <div class="story-item">Modular container solutions built to grow with you</div>
        </div>
        <div class="story-images">
          <img src="{{ asset('img/scroll6.jpg') }}" class="story-img active" />
          <img src="{{ asset('img/scroll2.jpg') }}" class="story-img" />
          <img src="{{ asset('img/scroll5.jpg') }}" class="story-img" />
          <img src="{{ asset('img/scroll4.jpg') }}" class="story-img" />
          <img src="{{ asset('img/scroll3.jpg') }}" class="story-img" />
        </div>
      </div>
    </section>

@endsection