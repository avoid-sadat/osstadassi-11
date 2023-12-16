<!-- resources/views/products/form.blade.php -->

@extends('layouts.master')
@section('content')
<section class="section main-section">
    <div class="card mb-6">
        <header class="card-header">
            <p class="card-header-title">
                <span class="icon"><i class="mdi mdi-ballot"></i></span>
                product buy
            </p>
        </header>
        <div class="card-content">
            <form action="{{ route('sell.store') }}" method="post">
                @csrf
                <div class="field">
                    <label class="label">From</label>
                    <div class="field-body">
                        <div class="field">
                            <div class="control icons-left">
                                <input class="input" type="hidden" value="{{$productSell->id}}" name="product_id">
                            </div>
                        </div>
                        <div class="field">
                            <div class="control icons-left">
                                <input class="input" type="text" name="name" value="{{$productSell->name}}" placeholder="Product Name">
                                <span class="icon left"><i class="mdi mdi-account"></i></span>
                            </div>
                        </div>
                        <div class="field">
                            <div class="control icons-left icons-right">
                                <input class="input" type="number" name="qty" value="{{$productSell->quantity}}" placeholder="product quantity">
                                <span class="icon left"><i class="mdi mdi-mail"></i></span>
                                <span class="icon right"><i class="mdi mdi-check"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="field">
                    <div class="field-body">
                        <div class="field">
                            <div class="field addons">
                                <div class="control">
                                    <input class="input" name="total_price" value="{{$productSell->price}}" placeholder="enter price">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


                <div class="field grouped">
                    <div class="control">
                        <button type="submit" class="button green">
                            Submit
                        </button>
                    </div>
                    <div class="control">
                        <button type="reset" class="button red">
                            Reset
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</section>

@endsection

