@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add New Company</div>

                <div class="card-body">
                    <form method="POST" 
                          action="{{ route('companies.store') }}" 
                          enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" 
                                   name="name" 
                                   class="form-control @error('name') is-invalid @enderror" 
                                   value="{{ old('name') }}" 
                                   required>
                            @error('name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" 
                                   name="email" 
                                   class="form-control @error('email') is-invalid @enderror" 
                                   value="{{ old('email') }}">
                            @error('email')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Website</label>
                            <input type="url" 
                                   name="website" 
                                   class="form-control @error('website') is-invalid @enderror" 
                                   value="{{ old('website') }}">
                            @error('website')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Logo (minimum 100x100)</label>
                            <input type="file" 
                                   name="logo" 
                                   class="form-control @error('logo') is-invalid @enderror">
                            @error('logo')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Create Company</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection