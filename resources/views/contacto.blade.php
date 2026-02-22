@extends('layouts.app')

@section('title', 'Contact - Modulia')

@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/contacto.css') }}">
@endpush

@section('content')

    <div class="banner-full-width">
         <div class="text-center">
            <h1 class="super-title">Start Building</h1>
         </div>
    </div>

    <div class="main-container">

        <div class="row content-area">

            <div class="col-12 col-md-4 col-lg-3 info-sidebar">

                <div class="info-block">
                    <div class="info-title">Showroom & Factory</div>
                    <p>Industrial Park West<br>Unit 42, Valencia</p>
                </div>

                <div class="info-block">
                    <div class="info-title">Visiting Hours</div>
                    <p>Monday - Friday<br>09:00 - 18:00 (Appointment only)</p>
                </div>

            </div>

            <div class="col-12 col-md-8 col-lg-8 offset-lg-1 mt-4 mt-md-0">

                {{-- Alert de éxito --}}
                @if(session('contact_success'))
                    <div class="alert alert-success alert-dismissible fade show mb-5" role="alert">
                        <strong>Message sent!</strong> We'll get back to you as soon as possible.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form id="contactForm" class="needs-validation" method="POST" action="" novalidate>
                    @csrf

                    {{-- Contact Details --}}
                    <label class="input-label mb-3">Contact Details</label>
                    <div class="row mb-4">
                        <div class="col-12 col-sm-6 mb-3 mb-sm-0">
                            <input
                                type="text"
                                name="first_name"
                                class="form-control contact-input"
                                placeholder="First Name"
                                required
                                minlength="2"
                            >
                            <div class="invalid-feedback">Please enter your first name.</div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <input
                                type="text"
                                name="last_name"
                                class="form-control contact-input"
                                placeholder="Last Name"
                                required
                                minlength="2"
                            >
                            <div class="invalid-feedback">Please enter your last name.</div>
                        </div>
                    </div>

                    {{-- Phone --}}
                    <div class="mb-4">
                        <label class="input-label" for="phone">Phone Number</label>
                        <input
                            type="tel"
                            id="phone"
                            name="phone"
                            class="form-control contact-input mt-2"
                            placeholder="Phone Number (+34)"
                            required
                            pattern="[0-9]{9}"
                        >
                        <div class="invalid-feedback">Please enter a valid 9-digit phone number.</div>
                    </div>

                    {{-- Construction Type --}}
                    <div class="mb-4">
                        <label class="input-label" for="construction_type">Construction Type</label>
                        <select id="construction_type" name="construction_type" class="form-select contact-input mt-2" required>
                            <option value="" selected disabled>Select an option...</option>
                            <option value="home">Single Family Home</option>
                            <option value="office">Office / Coworking Space</option>
                            <option value="retail">Retail / Pop-up Store</option>
                            <option value="custom">Other / Custom Project</option>
                        </select>
                        <div class="invalid-feedback">Please select a construction type.</div>
                    </div>

                    {{-- Location --}}
                    <div class="mb-4">
                        <label class="input-label" for="location">Project Location</label>
                        <input
                            type="text"
                            id="location"
                            name="location"
                            class="form-control contact-input mt-2"
                            placeholder="City or Region (for transport calculation)"
                            required
                        >
                        <div class="invalid-feedback">Please enter your project location.</div>
                    </div>

                    {{-- Email --}}
                    <div class="mb-4">
                        <label class="input-label" for="email">Email Address</label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            class="form-control contact-input mt-2"
                            placeholder="you@email.com"
                            required
                        >
                        <div class="invalid-feedback">Please enter a valid email address.</div>
                    </div>

                    {{-- Catalog checkbox --}}
                    <div class="mb-4 form-check p-0 d-flex align-items-center gap-3">
                        <input
                            type="checkbox"
                            name="catalog"
                            class="form-check-input contact-check flex-shrink-0"
                            id="catalog"
                            style="margin: 0;"
                        >
                        <label class="form-check-label check-label" for="catalog">
                            I want to receive the technical materials catalog
                        </label>
                    </div>

                    {{-- Project Details --}}
                    <div class="mb-4">
                        <label class="input-label" for="details">Project Details</label>
                        <textarea
                            id="details"
                            name="details"
                            class="form-control contact-input mt-2"
                            rows="3"
                            placeholder="Ex: I need two 40ft modules joined together..."
                            required
                            minlength="10"
                        ></textarea>
                        <div class="invalid-feedback">Please describe your project (min. 10 characters).</div>
                    </div>

                    <button type="submit" class="btn-pill">Request Quote</button>

                </form>
            </div>
        </div>

    </div>

@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Bootstrap custom validation
        (function () {
            'use strict';
            var form = document.getElementById('contactForm');
            form.addEventListener('submit', function (e) {
                if (!form.checkValidity()) {
                    e.preventDefault();
                    e.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        })();
    </script>
@endpush
