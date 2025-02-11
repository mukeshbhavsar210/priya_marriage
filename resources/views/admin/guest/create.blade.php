@extends('admin.layouts.app')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <h2>Create Guest</h2>
            </div>
            <div class="col-md-4  text-right">
                <a href="{{ route('guest.index') }}" class="btn btn-primary float-end">Back</a>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="card">
            @include('admin.layouts.message')
            <form action="" method="post" id="createGuestForm" name="createGuestForm">
            {{-- <form method="post" action="create-guest"> --}}
                @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
                                            <p></p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="surname">Surname</label>
                                            <select id="surname" class="form-control" name="surname_id">
                                                <option selected>Select Surname</option>
                                                @if($surnames->isNotEmpty())
                                                    @foreach ($surnames as $data)
                                                        <option value={{ $data->id }}>{{ $data->surname }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="city">City</label>
                                            <select id="city" class="form-control" name="city_id">
                                                <option selected>Select City</option>
                                                @if($cities->isNotEmpty())
                                                    @foreach ($cities as $data)
                                                        <option value={{ $data->id }}>{{ $data->name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="category">Category</label>
                                        <select id="category" class="form-control" name="category_id">
                                            <option selected>Select Category</option>
                                            @if($categories->isNotEmpty())
                                                @foreach ($categories as $data)
                                                    <option value={{ $data->id }}>{{ $data->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="event">Are you coming?</label>
                                        <select id="event" class="form-control" name="event">
                                            <option selected>Select Category</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                        </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="invitation">Investion Sent?</label>
                                        <select id="invitation" class="form-control" name="invitation">
                                            <option selected>Select Category</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                        </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="food_choice">Food Choice</label>
                                        <select id="food_choice" class="form-control" name="food_choice">
                                            <option selected>Select Food</option>
                                            <option value="Gujarati">Gujarati</option>
                                            <option value="Rajasthani">Rajasthani</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="food_choice">Guest Belongs to?</label>
                                        <select id="food_choice" class="form-control" name="guest_type">
                                            <option selected>Select Food</option>
                                            <option value="Bride">Bride</option>
                                            <option value="Groom">Groom</option>
                                        </select>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <input type="hidden" id="image_id" name="image_id" value=" ">
                                    <label for="image">Photo</label>
                                    <div id="image" class="dropzone dz-clickable">
                                        <div class="dz-message needsclick">
                                            <br>Drop files here or click to upload.<br><br>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer"><button type="submit" class="btn btn-primary">Submit</button></div>
            </form>
        </div>
    </div>
</section>
@endsection

@section('customJs')
  <script>
    $("#createGuestForm").submit(function(event){
        event.preventDefault();
        var element = $(this);
        $("button[type=submit]").prop('disabled', true);
        $.ajax({
            url: '{{ route("guest.store") }}',
            type: 'post',
            data: element.serializeArray(),
            dataType: 'json',
            success: function(response){
                $("button[type=submit]").prop('disabled', false);
                if(response["status"] == true){

                    window.location.href="{{ route('guest.index') }}"

                    $('#name').removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback').html("");
                } else {
                    var errors = response['errors']
                    if(errors['name']){
                        $('#name').addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback').html(errors['name']);
                    } else {
                        $('#name').removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback').html("");
                    }
                }
            }, error: function(jqXHR, exception) {
                console.log("Something event wrong");
            }
        })
    });

    //Dropzone for images
    Dropzone.autoDiscover = false;
            const dropzone = $("#image").dropzone({
                init: function() {
                    this.on('addedfile', function(file) {
                        if (this.files.length > 1) {
                            this.removeFile(this.files[0]);
                        }
                    });
                },
                url:  "{{ route('temp-images.create') }}",
                maxFiles: 1,
                paramName: 'image',
                addRemoveLinks: true,
                acceptedFiles: "image/jpeg,image/png,image/gif",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }, success: function(file, response){
                    $("#image_id").val(response.image_id);
                    console.log(response)
                }
            });
</script>
@endsection