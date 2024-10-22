@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Edit Company</h5>
                    <a href="{{ route('companies.index') }}" class="btn btn-secondary btn-sm">Back to List</a>
                </div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" 
                          action="{{ route('companies.update', $company) }}" 
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" 
                                   name="name" 
                                   id="name"
                                   class="form-control @error('name') is-invalid @enderror" 
                                   value="{{ old('name', $company->name) }}" 
                                   required>
                            @error('name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" 
                                   name="email" 
                                   id="email"
                                   class="form-control @error('email') is-invalid @enderror" 
                                   value="{{ old('email', $company->email) }}">
                            @error('email')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="website" class="form-label">Website</label>
                            <input type="url" 
                                   name="website" 
                                   id="website"
                                   class="form-control @error('website') is-invalid @enderror" 
                                   value="{{ old('website', $company->website) }}">
                            @error('website')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="logo" class="form-label">Logo (minimum 100x100)</label>
                            @if($company->logo)
                                <div class="mb-2">
                                    <img src="{{ asset(str_replace('public/', '', $company->logo)) }}" 
                                                 alt="Current Logo" 
                                                 class="img-thumbnail me-3" 
                                                 style="max-height: 100px;">
                                            <span class="text-muted">{{ basename($company->logo) }}</span>
                                </div>
                            @endif
                            <input type="file" 
                                   name="logo" 
                                   id="logo"
                                   class="form-control @error('logo') is-invalid @enderror">
                            <small class="form-text text-muted">Leave empty to keep current logo</small>
                            @error('logo')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">Update Company</button>
                            <a href="{{ route('companies.index') }}" class="btn btn-primary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection