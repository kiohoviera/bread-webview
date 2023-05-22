@extends('layout.app')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
       <div class="row">
           <div class="col-lg-12 col-12 mb-4">
               <div class="card">
                   <div class="card-body text-center">
                       <div class="badge rounded-pill p-2 bg-label-danger mb-2">
                           <i class="ti ti-currency-dollar-singapore ti-sm"></i>
                       </div>
                       <h5 class="card-title mb-2">₱ {{ $todaySales }}</h5>
                       <small>Today Sales</small>
                   </div>
               </div>
           </div>
           <div class="col-lg-12 col-12 mb-4">
               <div class="card">
                   <div class="card-body text-center">
                       <div class="badge rounded-pill p-2 bg-label-danger mb-2">
                           <i class="ti ti-currency-dollar-singapore ti-sm"></i>
                       </div>
                       <h5 class="card-title mb-2">₱ {{ $monthlySales }}</h5>
                       <small>Monthly Sales</small>
                   </div>
               </div>
           </div>
           <div class="col-lg-2 col-6 mb-4">
               <div class="card">
                   <div class="card-body text-center">
                       <div class="badge rounded-pill p-2 bg-label-danger mb-2">
                           <i class="ti ti-briefcase ti-sm"></i>
                       </div>
                       <h5 class="card-title mb-2">{{ $inventoryIn }}</h5>
                       <small>Inventory In(Today)</small>
                   </div>
               </div>
           </div>
           <div class="col-lg-2 col-6 mb-4">
               <div class="card">
                   <div class="card-body text-center">
                       <div class="badge rounded-pill p-2 bg-label-danger mb-2">
                           <i class="ti ti-briefcase ti-sm"></i>
                       </div>
                       <h5 class="card-title mb-2">{{ $inventoryOut }}</h5>
                       <small>Inventory Out(Today)</small>
                   </div>
               </div>
           </div>

       </div>
    </div>
@endsection

