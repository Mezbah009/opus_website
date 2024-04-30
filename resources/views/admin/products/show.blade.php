@extends('admin.layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Product Details</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('product_first_section.create', ['id' => $product->id]) }}"
                    class="btn btn-primary">Create Product First Section</a>
                <a href="{{ route('products.index') }}" class="btn btn-primary">Back</a>

            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    @include('admin.message')
    <!-- Product details -->
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Title:</strong> {{ $product->title }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Product Category:</strong> {{ $product->button_name }}</p>
                    </div>

                    <!-- Additional fields based on your product attributes -->

                    <div class="col-md-6">
                        <p><strong>Description:</strong> {{ $product->description }}</p>
                    </div>
                    <div class="col-md-3">
                        <p><strong>Image:</strong></p>
                        <img src="{{ asset('uploads/first_section/'.$product->logo) }}" alt="Product Image"
                            style="max-width: 30%;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- product First section --}}
<section class="content">
    <!-- Product details -->
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <?php if ($first_sec !== null): ?>
                    <div class="col-md-6">
                        <p><strong>Title:</strong> {{ $first_sec->title }}</p>
                    </div>

                    <div class="col-md-3">
                        <p><strong>Image:</strong></p>
                        <img src="{{ asset('uploads/first_section/'.$first_sec->image) }}" alt="Product Image"
                            style="max-width: 30%;">
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- /.content -->
@endsection