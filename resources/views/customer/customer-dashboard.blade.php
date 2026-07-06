@extends('customer.includes.master')

@section('content')

<style>
    .order-card{
        border:0;
        border-radius:12px;
        color:#fff;
        transition:.3s;
        overflow:hidden;
    }

    .order-card:hover{
        transform:translateY(-4px);
        box-shadow:0 10px 20px rgba(0,0,0,.18);
    }

    .order-card .card-body{
        padding:18px 20px;
    }

    .order-card h4{
        margin:0;
        font-size:26px;
        font-weight:700;
    }

    .order-card p{
        margin:0;
        font-size:13px;
        font-weight:600;
        text-transform:uppercase;
        color:rgba(255,255,255,.9);
    }

    .order-card i{
        font-size:38px;
        opacity:.25;
    }

    .bg-total{background:#4e73df;}
    .bg-pending{background:#f6c23e;}
    .bg-confirmed{background:#36b9cc;}
    .bg-delivered{background:#1cc88a;}
    .bg-returned{background:#6c757d;}
    .bg-cancelled{background:#e74a3b;}

    a{
        text-decoration:none!important;
    }
</style>

<div class="container-fluid pt-2">

    <div class="row">

        <div class="col-lg-4 col-md-6 mb-3">
            <a href="{{url('customer/orders/all')}}">
                <div class="card order-card bg-total">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <p>Total Orders</p>
                            <h4>{{$allOrders}}</h4>
                        </div>
                        <i class="fas fa-shopping-bag"></i>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-4 col-md-6 mb-3">
            <a href="{{url('customer/orders/pending')}}">
                <div class="card order-card bg-pending">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <p>Pending Orders</p>
                            <h4>{{$pendingOrders }}</h4>
                        </div>
                        <i class="fas fa-clock"></i>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-4 col-md-6 mb-3">
            <a href="{{url('customer/orders/confirmd')}}">
                <div class="card order-card bg-confirmed">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <p>Confirmed Orders</p>
                            <h4>{{$confirmedOrders}}</h4>
                        </div>
                        <i class="fas fa-check-circle"></i>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-4 col-md-6 mb-3">
            <a href="{{url('customer/orders/delivered')}}">
                <div class="card order-card bg-delivered">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <p>Delivered Orders</p>
                            <h4>{{$deliveredOrders}}</h4>
                        </div>
                        <i class="fas fa-truck"></i>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-4 col-md-6 mb-3">
            <a href="{{url('customer/orders/returned')}}">
                <div class="card order-card bg-returned">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <p>Returned Orders</p>
                            <h4>{{$returnedOrders}}</h4>
                        </div>
                        <i class="fas fa-undo"></i>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-4 col-md-6 mb-3">
            <a href="{{url('customer/orders/cancelled')}}">
                <div class="card order-card bg-cancelled">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <p>Cancelled Orders</p>
                            <h4>{{$cancelledOrders}}</h4>
                        </div>
                        <i class="fas fa-times-circle"></i>
                    </div>
                </div>
            </a>
        </div>

    </div>

</div>

@endsection