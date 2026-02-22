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
                                id="first_name"
                                name="first_name"
                                class="form-control contact-input"
                                placeholder="First Name"
                                required
                                minlength="2"
                                autocomplete="given-name"
                            >
                            <div class="invalid-feedback" id="first_name-error">Please enter your first name.</div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <input
                                type="text"
                                id="last_name"
                                name="last_name"
                                class="form-control contact-input"
                                placeholder="Last Name"
                                required
                                minlength="2"
                                autocomplete="family-name"
                            >
                            <div class="invalid-feedback" id="last_name-error">Please enter your last name.</div>
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
                        <div class="invalid-feedback" id="phone-error">Please enter a valid 9-digit phone number.</div>
                        <div class="field-hint" id="phone-counter">0 / 9 digits</div>
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
                        <div class="invalid-feedback" id="construction_type-error">Please select a construction type.</div>
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
                        <div class="invalid-feedback" id="location-error">Please enter your project location.</div>
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
                        <div class="invalid-feedback" id="email-error">Please enter a valid email address.</div>
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
                        <div class="invalid-feedback" id="details-error">Please describe your project (min. 10 characters).</div>
                        <div class="field-hint" id="details-counter">0 / 10 minimum characters</div>
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
    (function () {
        'use strict';

        // --- Helpers ---

        function markValid(input) {
            input.classList.remove('is-invalid');
            input.classList.add('is-valid');
            input.setCustomValidity('');
        }

        function markInvalid(input, message) {
            input.classList.remove('is-valid');
            input.classList.add('is-invalid');
            input.setCustomValidity(message);
            var errorEl = document.getElementById(input.id + '-error');
            if (errorEl) errorEl.textContent = message;
        }

        function clearMark(input) {
            input.classList.remove('is-valid', 'is-invalid');
            input.setCustomValidity('');
        }

        // --- Field rules ---

        var rules = {

            first_name: function (el) {
                var v = el.value.trim();
                if (v.length === 0)        return markInvalid(el, 'First name is required.');
                if (v.length < 2)          return markInvalid(el, 'First name must be at least 2 characters.');
                if (/[0-9]/.test(v))       return markInvalid(el, 'First name cannot contain numbers.');
                markValid(el);
            },

            last_name: function (el) {
                var v = el.value.trim();
                if (v.length === 0)        return markInvalid(el, 'Last name is required.');
                if (v.length < 2)          return markInvalid(el, 'Last name must be at least 2 characters.');
                if (/[0-9]/.test(v))       return markInvalid(el, 'Last name cannot contain numbers.');
                markValid(el);
            },

            phone: function (el) {
                var v = el.value.replace(/\D/g, '');   // strip non-digits
                el.value = v;                           // keep only digits in the field
                var counter = document.getElementById('phone-counter');
                if (counter) counter.textContent = v.length + ' / 9 digits';
                if (v.length === 0)  return markInvalid(el, 'Phone number is required.');
                if (v.length !== 9)  return markInvalid(el, 'Phone must be exactly 9 digits (current: ' + v.length + ').');
                markValid(el);
                if (counter) counter.textContent = '✓ 9 / 9 digits';
            },

            construction_type: function (el) {
                if (!el.value) return markInvalid(el, 'Please select a construction type.');
                markValid(el);
            },

            location: function (el) {
                var v = el.value.trim();
                if (v.length === 0)  return markInvalid(el, 'Project location is required.');
                if (v.length < 3)    return markInvalid(el, 'Please enter a more specific location.');
                markValid(el);
            },

            email: function (el) {
                var v = el.value.trim();
                var re = /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/;
                if (v.length === 0)  return markInvalid(el, 'Email address is required.');
                if (!re.test(v))     return markInvalid(el, 'Please enter a valid email (e.g. you@example.com).');
                markValid(el);
            },

            details: function (el) {
                var v = el.value.trim();
                var len = v.length;
                var counter = document.getElementById('details-counter');
                if (counter) {
                    if (len < 10) {
                        counter.textContent = len + ' / 10 minimum characters';
                    } else {
                        counter.textContent = len + ' characters';
                    }
                }
                if (len === 0)   return markInvalid(el, 'Project details are required.');
                if (len < 10)    return markInvalid(el, 'Please add more detail (' + (10 - len) + ' characters remaining).');
                markValid(el);
            }
        };

        // --- Attach listeners ---

        Object.keys(rules).forEach(function (id) {
            var el = document.getElementById(id);
            if (!el) return;
            var validate = rules[id];

            // Validate on blur (when user leaves the field)
            el.addEventListener('blur', function () {
                validate(el);
            });

            // Update counters / strip bad chars in real time without showing errors prematurely
            if (id === 'phone') {
                el.addEventListener('input', function () {
                    var v = el.value.replace(/\D/g, '');
                    el.value = v;
                    var counter = document.getElementById('phone-counter');
                    if (counter) counter.textContent = v.length + ' / 9 digits';
                    // Only show real-time error if the field was already touched
                    if (el.classList.contains('is-invalid') || el.classList.contains('is-valid')) {
                        validate(el);
                    }
                });
            }

            if (id === 'details') {
                el.addEventListener('input', function () {
                    var counter = document.getElementById('details-counter');
                    var len = el.value.trim().length;
                    if (counter) {
                        counter.textContent = len < 10
                            ? len + ' / 10 minimum characters'
                            : len + ' characters';
                    }
                    if (el.classList.contains('is-invalid') || el.classList.contains('is-valid')) {
                        validate(el);
                    }
                });
            }
        });

        // --- Submit: validate all fields ---
        var form = document.getElementById('contactForm');
        form.addEventListener('submit', function (e) {
            var allValid = true;

            Object.keys(rules).forEach(function (id) {
                var el = document.getElementById(id);
                if (!el) return;
                rules[id](el);
                if (el.classList.contains('is-invalid')) allValid = false;
            });

            if (!allValid) {
                e.preventDefault();
                e.stopPropagation();
                // Scroll to first error
                var firstError = form.querySelector('.is-invalid');
                if (firstError) firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
        });

    })();
    </script>
@endpush
