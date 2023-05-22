@extends('layout.app')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Inventory</h5>
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
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($inventories as $logs)
                                <tr>
                                    <td>{{ $logs->bread_info }}</td>
                                    <td>{{ $logs->manufacturing_date }}</td>
                                    <td>{{ $logs->expiration_date }}</td>
                                    <td>{{ $logs->quantity }}</td>
                                    <td>{{ $logs->price }}</td>
                                    <td>{{ $logs->remarks }}</td>
                                    <td>
                                        <button
                                            type="button"
                                            class="btn btn-warning"
                                            data-bs-toggle="modal"
                                            data-bs-target="#update{{ $logs->id }}"
                                        >
                                            Update
                                        </button>
                                        <button
                                            type="button"
                                            class="btn btn-danger"
                                            data-bs-toggle="modal"
                                            data-bs-target="#delete{{ $logs->id }}"
                                        >
                                            Delete
                                        </button>
                                    </td>
                                </tr>

                                <div class="modal fade" id="update{{ $logs->id }}" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
                                        <div class="modal-content p-3 p-md-5">
                                            <div class="modal-body">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                <div class="text-center mb-4">
                                                    <h3 class="mb-2">Update Record</h3>
                                                </div>
                                                <form action="/application/inventory/update/{{ $logs->id }}" method="POST" class="row g-3">
                                                    @csrf
                                                    @method('PATCH')
                                                    <div class="col-12 col-md-6">
                                                        <label class="form-label">Bread Info</label>
                                                        <input type="text" class="form-control" name="bread_info" value="{{ $logs->bread_info }}" required />
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <label class="form-label">Manufacturing Date</label>
                                                        <input type="date" class="form-control" name="manufacturing_date" value="{{ $logs->manufacturing_date }}" required />
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <label class="form-label">Expiration Date</label>
                                                        <input type="date" class="form-control" name="expiration_date" value="{{ $logs->expiration_date }}" required />
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <label class="form-label">Quantity</label>
                                                        <input type="number" class="form-control" name="quantity" value="{{ $logs->quantity }}" required />
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <label class="form-label">Price</label>
                                                        <input type="number" step="any" class="form-control" name="price" value="{{ $logs->price }}" required />
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <label class="form-label">Remarks</label>
                                                        <input type="text" class="form-control" name="remarks" value="{{ $logs->remarks }}" required />
                                                    </div>
                                                    <div class="col-12 text-center mt-3">
                                                        <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                                                        <button
                                                            type="reset"
                                                            class="btn btn-label-secondary btn-reset"
                                                            data-bs-dismiss="modal"
                                                            aria-label="Close"
                                                        >
                                                            Cancel
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="delete{{ $logs->id }}" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
                                        <div class="modal-content p-3 p-md-5">
                                            <div class="modal-body">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                <div class="text-center mb-4">
                                                    <h3 class="mb-2">Delete Record</h3>
                                                </div>
                                                <form action="/application/inventory/delete/{{ $logs->id }}" method="POST" class="row g-3">
                                                    @csrf
                                                    @method('DELETE')
                                                    <h4>Are you sure you want to delete this record?</h4>
                                                    <div class="col-12 text-center mt-3">
                                                        <button type="submit" class="btn btn-danger me-sm-3 me-1">Remove</button>
                                                        <button
                                                            type="reset"
                                                            class="btn btn-label-secondary btn-reset"
                                                            data-bs-dismiss="modal"
                                                            aria-label="Close"
                                                        >
                                                            Cancel
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

