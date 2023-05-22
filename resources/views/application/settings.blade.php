@extends('layout.app')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Scanner Logs</h5>
                    </div>
                    <div class="card-body pt-0">
                        <form action="/application/updateSettings" method="POST">
                            @csrf
                            <div class="form-group mt-3">
                                <label>Password</label>
                                <input class="form-control" type="text" value="{{ $settings->password_set }}" required name="password_set" />
                            </div>
                            <div class="form-group mt-3">
                                <label>Scanner Type</label>
                                <select class="form-control" name="scanner" required>
                                    <option value="in" {{ $settings->scanner_status == "on" ? "selected" : "" }}>Inventory In</option>
                                    <option value="out" {{ $settings->scanner_status_out == "on" ? "selected" : "" }}>Inventory Out</option>
                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <button class="btn btn-primary btn-block" type="submit">Update</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
