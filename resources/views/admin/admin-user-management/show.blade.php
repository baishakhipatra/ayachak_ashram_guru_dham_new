@extends('admin.layouts.app')

@section('page', 'View Admin User')

@section('content')

<section class="content">
    <section class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- Card Header -->
                    <div class="card-header">
                        
                        {{-- Back Button --}}
                        <div class="text-end">
                        <a href="{{ route('admin.admin-user-management.index') }}" class="btn btn-sm btn-danger">
                            <i class="menu-icon tf-icons ri-arrow-left-line"></i>Back</a>
                        </div>
                        
                    {{-- </div>

                    <div class="card-body pt-12"> --}}

                        <ul class="list-unstyled mb-4">

                            <li class="mb-2">
                                <span class="h6 me-1">Full Name:</span>
                                <span>{{ ucwords($employee->name ?? 'N/A') }}</span>
                            </li>

                            <li class="mb-2">
                                <span class="h6 me-1">Email:</span>
                                <span>{{ $employee->email ?? 'N/A' }}</span>
                                
                            </li>

                        </ul>

                    </div>
                </div>

            </div>
        </div>
    </section>
</section>

@endsection