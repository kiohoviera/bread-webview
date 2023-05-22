@extends('layout.app')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Scanner Logs</h5>
                    </div>
                    <div class="card-datatable table-responsive pt-0">
                        <table class="datatables-basic table">
                            <thead>
                            <tr>
                                <th>Bread Info</th>
                                <th>Manufacturing Date</th>
                                <th>Expiation Date</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Remarks</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($scanLogs as $logs)
                                <tr>
                                    <td>{{ $logs->bread->bread_info }}</td>
                                    <td>{{ $logs->bread->manufacturing_date }}</td>
                                    <td>{{ $logs->bread->expiration_date }}</td>
                                    <td>{{ $logs->quantity }}</td>
                                    <td>{{ $logs->bread->price }}</td>
                                    <td>{{ $logs->remarks }}</td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

