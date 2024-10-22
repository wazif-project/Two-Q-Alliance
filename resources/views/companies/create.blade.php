{{-- resources/views/companies/create.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Add New Company</h5>
                    <a href="{{ route('companies.index') }}" class="btn btn-secondary btn-sm">
                        Back to List
                    </a>
                </div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger mb-4">
                            <strong>Please check the following errors:</strong>
                            <ul class="mb-0 mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" 
                          action="{{ route('companies.store') }}" 
                          enctype="multipart/form-data"
                          class="needs-validation" 
                          novalidate>
                        @csrf

                        <div class="row g-2">
                            <!-- Company Information Section -->


                            <!-- Name Field -->
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="name" class="form-label fw-bold">
                                        Company Name <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" 
                                           id="name"
                                           name="name" 
                                           class="form-control form-control-lg @error('name') is-invalid @enderror" 
                                           value="{{ old('name') }}" 
                                           required
                                           placeholder="Enter company name">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <div class="form-text">
                                        This is the official name of the company.
                                    </div>
                                </div>
                            </div>

                            <!-- Contact Information Section -->


                            <!-- Email Field -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email" class="form-label fw-bold">Email Address</label>
                                    <input type="email" 
                                           id="email"
                                           name="email" 
                                           class="form-control @error('email') is-invalid @enderror" 
                                           value="{{ old('email') }}"
                                           placeholder="company@example.com">
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Website Field -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="website" class="form-label fw-bold">Website</label>
                                    <input type="url" 
                                           id="website"
                                           name="website" 
                                           class="form-control @error('website') is-invalid @enderror" 
                                           value="{{ old('website') }}"
                                           placeholder="https://www.example.com">
                                    @error('website')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Logo Section -->


                            <!-- Logo Field -->
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="logo" class="form-label fw-bold">
                                        Company Logo
                                    </label>
                                    <input type="file" 
                                           id="logo"
                                           name="logo" 
                                           class="form-control @error('logo') is-invalid @enderror"
                                           accept="image/*">
                                    @error('logo')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <div class="form-text">
                                        Please upload a logo with minimum dimensions of 100x100 pixels.
                                        Supported formats: PNG, JPG, JPEG.
                                    </div>
                                </div>
                            </div>

                            <!-- Submit Buttons -->
                            <div class="col-12 mt-4">
                                <div class="d-flex justify-content-between align-items-center border-top pt-4">
                                    <a href="{{ route('companies.index') }}" class="btn btn-outline-secondary">
                                        Cancel
                                    </a>
                                    <button type="submit" class="btn btn-primary">
                                        Create Company
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Optional: Add client-side validation
    (function () {
        'use strict'

        // Fetch all forms that need validation
        var forms = document.querySelectorAll('.needs-validation')

        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script>
@endpush
@endsection