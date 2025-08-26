@extends('front.layout.app')
@section('page-title', 'Donation')
@section('content')

{{-- <section class="main">
    <div class="container">
        <div class="profile-wrapper">
            <div class="row">
                <div class="col-lg-3 mb-4 mb-md-5 mb-lg-0">
                    @include('front/sidebar_profile')
                </div>
                <div class="col-lg-9">
                    <div class="profile-right">
                        <div class="profile-heading-group">
                            <h2 class="mb-0">My Orders</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        @if($donations->isEmpty())
                            <div class="d-flex justify-content-center align-items-center" style="min-height: 300px;">
                                <p class="text-muted fs-5">You haven’t made any donations yet.</p>
                            </div>
                        @else
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>Amount</th>
                                            <th>Purpose</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($donations as $index => $donation)
                                            <tr>
                                                <td>{{ $index+1 }}</td>
                                                <td>₹{{ number_format($donation->amount, 2) }}</td>
                                                <td>{{ $donation->purpose }}</td>
                                                <td>
                                                    @if($donation->status == 'success')
                                                        <span class="badge bg-success">Success</span>
                                                    @elseif($donation->status == 'pending')
                                                        <span class="badge bg-warning">Pending</span>
                                                    @else
                                                        <span class="badge bg-danger">Failed</span>
                                                    @endif
                                                </td>
                                                <td>{{ $donation->created_at->format('d M, Y h:i A') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
<section class="main py-5">
    <div class="container">
        <div class="profile-wrapper">
            <div class="row">
                <!-- Sidebar -->
                <div class="col-lg-3 mb-4">
                    @include('front/sidebar_profile')
                </div>

                <!-- Content -->
                <div class="col-lg-9">
                    <div class="profile-right card shadow-sm border-0 p-4">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h2 class="mb-0">My Donations</h2>
                        </div>

                        @if($donations->isEmpty())
                            <div class="d-flex flex-column justify-content-center align-items-center text-center py-5">
                                <img src="{{ asset('assets/images/empty-box.png') }}" 
                                     alt="No Donations" class="mb-3" style="width:120px;">
                                <p class="text-muted fs-5">You haven’t made any donations yet.</p>
                            </div>
                        @else
                            <div class="table-responsive">
                                <table class="table table-hover align-middle">
                                    <thead class="table-light">
                                        <tr>
                                            <th>No.</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($donations as $index => $donation)
                                            <tr>
                                                <td>{{ $index+1 }}</td>
                                                <td>
                                                    <strong>₹{{ number_format($donation->amount, 2) }}</strong>
                                                </td>
                                                <td>
                                                    @if($donation->status == 'success')
                                                        <span class="badge bg-success">Success</span>
                                                    @elseif($donation->status == 'pending')
                                                        <span class="badge bg-warning text-dark">Pending</span>
                                                    @else
                                                        <span class="badge bg-danger">Failed</span>
                                                    @endif
                                                </td>
                                                <td>{{ $donation->created_at->format('d M, Y h:i A') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



@endsection