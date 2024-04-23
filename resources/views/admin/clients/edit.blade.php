@extends('admin.layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Update Clients</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('clients.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <form method="POST" action="{{ route('clients.update', $clients->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="category">Product Category</label>
                                <select name="category" id="category" class="form-control">
                                    <option value="" disabled>Select Clinets Category</option>
                                    <option value="filter-sig" {{ $clients->category === 'Signature' ? 'selected' : '' }}>Signature</option>
                                    <option value="filter-fin" {{ $clients->category === 'Fintech' ? 'selected' : '' }} >Fintech</option>

                                    <option value="filter-fin" {{ $clients->category === 'Fintech' ? 'selected' : '' }}>Fintech</option>
                                    <option value="filter-gov" {{ $clients->category === 'Government Organization' ? 'selected' : '' }}> Government Organization</option>
                                    <option value="filter-real {{ $clients->category === 'Real Estate' ? 'selected' : '' }}">Real Estate</option>
                                    <option value="filter-ngo" {{ $clients->category === 'NGO' ? 'selected' : '' }}>NGO</option>
                                    <option value="filter-tel" {{ $clients->category === 'Telecom' ? 'selected' : '' }}>Telecom</option>
                                    <option value="filter-edu" {{ $clients->category === 'Education' ? 'selected' : '' }}>Education</option>
                                    <option value="filter-hea" {{ $clients->category === 'Healthcare' ? 'selected' : '' }}>Healthcare</option>
                                    <option value="filter-manu" {{ $clients->category === 'Manufacturing And Trading' ? 'selected' : '' }}>Manufacturing And Trading</option>
                                    <option value="filter-ins" {{ $clients->category === 'Inspection & Testing' ? 'selected' : '' }}>Inspection & Testing</option>
                                    <option value="filter-club" {{ $clients->category === 'Club and Restaurants' ? 'selected' : '' }}>Club and Restaurants</option>
                                    <option value="filter-tech" {{ $clients->category === 'Technology' ? 'selected' : '' }}>Technology</option>
                                    <option value="filter-man" {{ $clients->category === '>Management Consultancy' ? 'selected' : '' }}>Management Consultancy</option>
                                    <!-- Add more options as needed -->
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="link">Link</label>
                                <input type="text" name="link" id="link" class="form-control" placeholder="Link" value="{{ $clients->link }}">
                                <p class="error"></p>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="mb-1">
                                <label for="image">Image</label>
                                <input type="hidden" id="image_id" name="image_id">

                                <div id="image" class="dropzone dz-clickable">
                                    <div class="dz-message needsclick">
                                        <br>Drop files here or click to upload.<br><br>
                                    </div>
                                </div>
                            </div>
                            @if (!@empty($clients->logo))
                            <div>
                                <img width="250" src="{{asset('uploads/first_section/'.$clients->logo)}}" alt="">
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="pb-5 pt-3">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('clients.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
            </div>
        </div>
    </form>

    <!-- /.card -->
</section>
<!-- /.content -->
@endsection
@section('customJs')


<script>
    $("#sectionForm").submit(function(event) {
        event.preventDefault();
        var element = $(this);
        $("button[type=submit]").prop('disabled', true);
        $.ajax({
            url: '{{ route("clients.store") }}',
            type: 'POST',
            data: element.serializeArray(), // Fixed typo: 'data' instead of 'date'
            dataType: 'json',
            headers: {

                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) { // Fixed typo: 'function' instead of 'funtion'
                // Handle success response here
                $("button[type=submit]").prop('disabled', false);
                if (response["status"] == true) {
                    window.location.href = "{{route('clients.index')}}"



                } else {
                    var errors = response['errors'];
                    $(".error").removeClass('is-invalid').html(''); // Remove error classes and clear error messages
                    $("input[type='text'], select").removeClass('is-invalid');
                    $.each(errors, function(key, value) {
                        $(`#${key}`).addClass('is-invalid'); // Add the 'is-invalid' class to the input
                        $(`#${key}`).next('p').addClass('invalid-feedback').html(value); // Add the error message
                    });

                }

            },
            error: function(jqXHR, exception) {
                console.log("Something went wrong");
            }
        })
    });


    Dropzone.autoDiscover = false;
    const dropzone = $("#image,#logo").dropzone({
        init: function() {
            this.on('addedfile', function(file) {
                if (this.files.length > 1) {
                    this.removeFile(this.files[0]);
                }
            });
        },
        url: "{{ route('temp-images.create') }}",
        maxFiles: 1,
        paramName: 'image',
        addRemoveLinks: true,
        acceptedFiles: "image/jpeg,image/png,image/gif",
        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(file, response) {
            $("#image_id").val(response.image_id);
            console.log(response)
        }
    });
</script>


@endsection
