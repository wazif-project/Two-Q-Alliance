{{-- resources/views/companies/show.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Company Details</h5>
                    <a href="{{ route('companies.index') }}" class="btn btn-secondary btn-sm">Back to List</a>
                </div>

                <div class="card-body">
                    <div class="text-center mb-4">
                        @if ($company->logo)
                            <img src="{{ Storage::url($company->logo) }}" 
                                 alt="{{ $company->name }}" 
                                 class="img-thumbnail"
                                 style="max-height: 150px;">
                        @endif
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th style="width: 200px;">Company Name</th>
                                    <td>{{ $company->name }}</td>
                                </tr>
                                <tr>
                                    <th>Email Address</th>
                                    <td>{{ $company->email ?: 'Not provided' }}</td>
                                </tr>
                                <tr>
                                    <th>Website</th>
                                    <td>
                                        @if ($company->website)
                                            <a href="{{ $company->website }}" target="_blank">
                                                {{ $company->website }}
                                            </a>
                                        @else
                                            Not provided
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Created At</th>
                                    <td>{{ $company->created_at->format('F j, Y g:i A') }}</td>
                                </tr>
                                <tr>
                                    <th>Last Updated</th>
                                    <td>{{ $company->updated_at->format('F j, Y g:i A') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('companies.edit', $company) }}" 
                           class="btn btn-primary">Edit Company</a>
                        <form action="{{ route('companies.destroy', $company) }}" 
                              method="POST" 
                              class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this company?')">
                                Delete Company
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection