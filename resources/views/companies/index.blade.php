{{-- resources/views/companies/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2>Companies</h2>
                    <a href="{{ route('companies.create') }}" class="btn btn-primary">Add New Company</a>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Logo</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Website</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($companies as $company)
                                    <tr>
                                        <td>
                                            @if ($company->logo)
                                                <img src="{{ asset(str_replace('public/', '', $company->logo)) }}" 
                                                    alt="{{ $company->name }}" 
                                                    style="max-width: 50px;">
                                            @endif
                                        </td>
                                        <td>{{ $company->name }}</td>
                                        <td>{{ $company->email }}</td>
                                        <td>
                                            @if ($company->website)
                                                <a href="{{ $company->website }}" target="_blank">
                                                    {{ $company->website }}
                                                </a>
                                            @endif
                                        </td>
                
                                        <td>
                                            <a href="{{ route('companies.show', $company) }}" 
                                               class="btn btn-sm btn-info">View</a>
                                            <a href="{{ route('companies.edit', $company) }}" 
                                               class="btn btn-sm btn-primary">Edit</a>
                                            <form action="{{ route('companies.destroy', $company) }}" 
                                                  method="POST" 
                                                  class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Are you sure?')">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{ $companies->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection