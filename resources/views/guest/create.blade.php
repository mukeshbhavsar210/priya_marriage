<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-md-8">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Create Guest') }}
                </h2>
            </div>
            <div class="col-md-4">
                <a href="{{ route('guest.index') }}" class="btn btn-primary float-end">Back</a>
            </div>
        </div>
    </x-slot>

    @include('layouts.message')
    <div class="card mt-3">
        <div class="card-header">Create Guest</div>
        <form method="post" action="create-guest">
            @csrf
                <div class="card-body">
                  <div class="row">
                      <div class="col-md-3">
                          <div class="form-group">
                              <label for="name">Name</label>
                              <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
                              @error('name')
                                  <p>Please enter your name</p>
                              @enderror
                            </div>
                      </div>
                      {{-- <div class="col-md-3">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email">
                            @error('email')
                                <p>Please enter your email</p>
                            @enderror
                        </div>
                    </div> --}}
                    
                      <div class="col-md-3">
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
                      <div class="col-md-3">
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
                      <div class="col-md-3">
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
                      <div class="col-md-3">
                          <div class="form-group">
                              <label for="event">Are you coming?</label>
                              <select id="event" class="form-control" name="event">
                                <option selected>Select Category</option>
                                  <option value="Yes">Yes</option>
                                  <option value="No">No</option>
                              </select>
                            </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                              <label for="invitation">Investion Sent?</label>
                              <select id="invitation" class="form-control" name="invitation">
                                <option selected>Select Category</option>
                                  <option value="Yes">Yes</option>
                                  <option value="No">No</option>
                              </select>
                            </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                              <label for="food_choice">Food Choice</label>
                              <select id="food_choice" class="form-control" name="food_choice">
                                <option selected>Select Food</option>
                                  <option value="Gujarati">Gujarati</option>
                                  <option value="Rajasthani">Rajasthani</option>
                              </select>
                            </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                              <label for="food_choice">Guest Belongs to?</label>
                              <select id="food_choice" class="form-control" name="guest_type">
                                <option selected>Select Food</option>
                                  <option value="Bridge">Bridge</option>
                                  <option value="Groom">Groom</option>
                              </select>
                            </div>
                      </div>
                      {{-- <div class="col-md-6">
                        <div class="form-group">
                            <label for="addess">Address</label>
                            <textarea id="addess" name="addess" class="form-control">Enter address</textarea>            
                        </div>
                    </div> --}}
                  </div>
                </div>
              <div class="card-footer"><button type="submit" class="btn btn-primary">Submit</button></div>
            </form>
        
        </div>
    </div>
        
</x-app-layout>

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
                    window.location.href="{{ route('guest.store') }}"
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
</script>
@endsection