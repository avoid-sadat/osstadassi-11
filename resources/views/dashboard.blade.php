@extends('layouts.master')

@section('content')
    <section class="is-title-bar">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
            <ul>
                <li>Admin</li>
                <li>Dashboard</li>
            </ul>

        </div>
    </section>

    <section class="is-hero-bar">
        @if(session('success'))
            <div class="alert alert-success text-blue-500">
                {{ session('success') }}
            </div>
        @endif

    </section>

    <section class="section main-section">
        <div class="grid gap-6 grid-cols-1 md:grid-cols-3 mb-6">
            <div class="card">
                <div class="card-content">
                    <div class="flex items-center justify-between">
                        <div class="widget-label">
                            <h3>
                                Todays Sales
                            </h3>
                            <h1>
                                {{$todaySales}}
                            </h1>
                        </div>
                        <span class="icon widget-icon text-green-500"><i class="mdi mdi-account-multiple mdi-48px"></i></span>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-content">
                    <div class="flex items-center justify-between">
                        <div class="widget-label">
                            <h3>
                               Yesterday Sales
                            </h3>
                            <h1>
                                {{$yesterdaySales}}
                            </h1>
                        </div>
                        <span class="icon widget-icon text-blue-500"><i
                                class="mdi mdi-cart-outline mdi-48px"></i></span>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-content">
                    <div class="flex items-center justify-between">
                        <div class="widget-label">
                            <h3>
                                This Month Sale
                            </h3>
                            <h1>
                                {{$thisMonthSales}}
                            </h1>
                        </div>
                        <span class="icon widget-icon text-red-500"><i class="mdi mdi-finance mdi-48px"></i></span>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-content">
                    <div class="flex items-center justify-between">
                        <div class="widget-label">
                            <h3>
                                Last Month Sale
                            </h3>
                            <h1>
                                {{$lastMonthSales}}
                            </h1>
                        </div>
                        <span class="icon widget-icon text-red-500"><i class="mdi mdi-finance mdi-48px"></i></span>
                    </div>
                </div>
            </div>
        </div>


        <div class="card has-table">
            <header class="card-header">
                <p class="card-header-title">
                    <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
                    Products List
                </p>
                <a href="{{route('product.form')}}" class="card-header-icon">
                    <button class="button light">Add Product</button>
                </a>
            </header>
            <div class="card-content">
                <table>
                    <thead>
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Quantity Sell</th>
                        <th>Total Sell</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td class="image-cell">
                                <div class="image">
                                    <img src="https://avatars.dicebear.com/v2/initials/rebecca-bauch.svg"
                                         class="rounded-full">
                                </div>
                            </td>
                            <td data-label="Name">{{$product->productName}}</td>
                            <td data-label="Company">{{$product->quantity}}</td>
                            <td data-label="City">{{$product->sellPrice}}</td>
                            <td data-label="City">{{$product->totalsell}}</td>
                            <td data-label="City">{{$product->TotalPrice}}</td>
                            <td class="actions-cell">
                                <div class="buttons right nowrap">
                                    <button class="button small green --jb-modal" data-target="sample-modal-2"
                                            type="button">
                                        <a href="{{route('sell.product',$product->id)}}">
                                            <span class="icon"><i class="mdi mdi-eye"></i>Sell</span>
                                        </a>
                                    </button>
                                    <button class="button small red --jb-modal" data-target="sample-modal"
                                            type="button">
                                        <a href="{{route('get.product',$product->id)}}">
                                            <span class="icon"><i class="mdi mdi-trash-can"></i>Update</span>
                                        </a>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </section>

@endsection
