@extends('admin.layouts.app')
@section('content')
<section class="content-header">
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Product</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{route('products.create')}}" class="btn btn-primary">New Product</a>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="container-fluid">
        @include('admin.message')
        <div class="card">
            <form action="" method="GET">
                <div class="card-header">
                    <div class="card-title">
                        <button type="button" onclick="window.location.href='{{route("products.index")}}'" class="btn btn-default btn-sm">reset</button>
                    </div>
                    <div class="card-tools">
                        <div class="input-group input-group" style="width: 250px;">
                            <input type="text" name="keyword" value="{{Request::get('keyword')}}" class="form-control float-right" placeholder="Search">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th width="60">ID</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th width="100">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($sections->isNotEmpty())
                        @foreach ($sections as $section)
                        <tr>
                            <td>{{$section->id}}</td>
                            <td>
                                @if(!empty($section->logo))
                                <img src="{{asset('uploads/first_section/'.$section->logo)}}" class="img-thumbnail" alt="{{$section->title}}" width="50">
                                @else
                                <img src="{{asset('admin-assets/img/default.png')}}" class="img-thumbnail" alt="default image" width="50">
                                @endif
                            </td>
                            <td>{{$section->title}}</td>
                            <td>
                                @if($section->button_name == 'filter-sig')
                                Signature
                                @elseif($section->button_name == 'filter-fin')
                                Fintech
                                @endif
                            </td>

                            {{-- <td>
                                @if ($section->active == 'Yes')
                                <svg class="text-success-500 h-6 w-6 text-success" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                    aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                @else
                                <svg class="text-danger h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                @endif
                            </td> --}}
                            <td>
                                <a href="{{ route('products.show', $section->id) }}" class="btn btn-sm btn-clean btn-icon mr-2">
                                    <span class="svg-icon svg-icon-md">
                                        <svg class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path d="M3,12 C3,12 5.45454545,6 12,6 C16.9090909,6 21,12 21,12 C21,12 16.9090909,18 12,18 C5.45454545,18 3,12 3,12 Z" fill="blue" fill-rule="nonzero" opacity="0.3"></path>
                                            <path d="M12,15 C10.3431458,15 9,13.6568542 9,12 C9,10.3431458 10.3431458,9 12,9 C13.6568542,9 15,10.3431458 15,12 C15,13.6568542 13.6568542,15 12,15 Z" fill="blue" opacity="0.3"></path>
                                        </svg>
                                    </span>
                                </a>
                                <a href="{{route('products.edit',$section->id)}}">
                                    <svg class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                        </path>
                                    </svg>
                                </a>
                                <a href="#" onclick="destroySection({{$section->id}})" class="text-danger w-4 h-4 mr-1">
                                    <svg wire:loading.remove.delay="" wire:target="" class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path ath fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="card-footer clearfix">
                {{$sections->links()}}

            </div>
        </div>
    </div>
    <!-- /.card -->
</section>
<!-- /.content -->
@endsection
@section('customJs')
<script>
    function destroySection(id) {
        var url = '{{ route("products.delete", "ID") }}';

        var newUrl = url.replace("ID", id)
        if (confirm("Are you sure you want to delete")) {
            $.ajax({
                url: newUrl,
                type: 'delete',
                data: {}, // Fixed typo: 'data' instead of 'date'
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) { // Fixed typo: 'function' instead of 'funtion'
                    // Handle success response here
                    $("button[type=submit]").prop('disabled', false);
                    if (response["status"]) {
                        window.location.href = "{{route('products.index')}}";
                    } else {
                        // Handle other cases if needed
                    }
                } // Fixed typo: removed extra closing parenthesis
            });
        }


    }
</script>
@endsection
