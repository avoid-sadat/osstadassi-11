@extends('layouts.master')

@section('content')
    <div class="sales-table">
        <h2>Sales Transactions History</h2>
        <table style="border: 2px solid;">
            <thead>
            <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Created At</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($sells as $sale)
                <tr style="border: 2px solid;">
                    <td>{{ $sale->id }}</td>
                    <td>{{ $sale->productName }}</td>
                    <td>{{ $sale->totalsell }}</td>
                    <td>${{ $sale->TotalPrice }}</td>
                    <td>{{ $sale->sellTime }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <hr>
<div style="margin-left: 504px">
    Total Sell: ${{ $sells->sum('TotalPrice') }}
</div>
    </div>
@endsection
