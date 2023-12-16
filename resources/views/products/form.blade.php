<!-- resources/views/products/form.blade.php -->

@extends('layouts.master')
@section('content')
{{--    <div class="container">--}}
{{--        <form action="{{ route('product.add') }}" method="post">--}}
{{--            @csrf--}}
{{--            <label for="name">Product Name:</label>--}}
{{--            <input type="text" name="name" required>--}}
{{--            <br>--}}
{{--            <label for="quantity">Quantity:</label>--}}
{{--            <input type="number" name="quantity" required>--}}
{{--            <br>--}}
{{--            <label for="price">Price:</label>--}}
{{--            <input type="number" step="0.01" name="price" required>--}}
{{--            <br>--}}
{{--            <button type="submit">Add Product</button>--}}
{{--        </form>--}}
{{--    </div>--}}
<section class="section main-section">
    <div class="card mb-6">
        <header class="card-header">
            <p class="card-header-title">
                <span class="icon"><i class="mdi mdi-ballot"></i></span>
                product
            </p>
        </header>
        <div class="card-content">
            <form action="{{ route('product.add') }}" method="post">
                @csrf
                <div class="field">
                    <label class="label">From</label>
                    <div class="field-body">
                        <div class="field">
                            <div class="control icons-left">
                                <input class="input" type="text" name="name" placeholder="Product Name">
                                <span class="icon left"><i class="mdi mdi-account"></i></span>
                            </div>
                        </div>
                        <div class="field">
                            <div class="control icons-left icons-right">
                                <input class="input" type="number" name="quantity" placeholder="product quantity">
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
                                    <input class="input" name="price" placeholder="enter price">
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

