<!-- resources/views/products/form.blade.php -->

@extends('layouts.master')
@section('content')
<section class="section main-section">
    <div class="card mb-6">
        <header class="card-header">
            <p class="card-header-title">
                <span class="icon"><i class="mdi mdi-ballot"></i></span>
                Update Product
            </p>
        </header>
        <div class="card-content">
            <form action="{{ route('product.update',$updateProduct->id) }}" method="post">
                @csrf
                <div class="field">
                    <label class="label">From</label>
                    <div class="field-body">

                        <div class="field">
                            <div class="control icons-left">
                                <input class="input" type="text" name="name" value="{{$updateProduct->name}}" placeholder="Product Name">
                                <span class="icon left"><i class="mdi mdi-account"></i></span>
                            </div>
                        </div>
                        <div class="field">
                            <div class="control icons-left icons-right">
                                <input class="input" type="number" name="quantity" value="{{$updateProduct->quantity}}" placeholder="product quantity">
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
                                    <input class="input" name="price" value="{{$updateProduct->price}}" placeholder="enter price">
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

