@extends('admin.layouts.app')

@section('content')

<div class="row">
    <div class="col-md-8">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Guest') }}
        </h2>
    </div>
    <div class="col-md-4">
        <a href="{{ route('guest.index') }}" class="btn btn-primary float-end">Back</a>
    </div>
</div>


@include('admin.layouts.message')

<div class="card mt-4">
    <div class="card-header">Edit guest</div>
    <form action="edit-guest" method="post" >
        <div class="card-body">        
            @csrf
          <div class="row">
              <div class="col-md-3">
                  <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="{{ $guest->name }}">
                      @error('name')
                          <p>Please enter your name</p>
                      @enderror
                    </div>
              </div>
              <div class="col-md-3">
                  <div class="form-group">
                      <label for="surname">Surname</label>
                      <select id="surname" class="form-control" name="surname_id">
                        <option selected>Select Surname</option>
                          @if($surname->isNotEmpty())
                              @foreach ($surname as $data)
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
                          <option {{ ($guest->event == 'Yes') ? 'selected' : ' ' }} value="Yes">Yes</option>
                          <option {{ ($guest->event == 'No') ? 'selected' : ' ' }} value="No">No</option>
                      </select>
                    </div>
              </div>
              <div class="col-md-3">
                  <div class="form-group">
                      <label for="invitation">Investion Sent?</label>
                      <select id="invitation" class="form-control" name="invitation">
                        <option selected>Select Category</option>
                          <option {{ ($guest->invitation == 'Yes') ? 'selected' : ' ' }} value="Yes">Yes</option>
                          <option {{ ($guest->invitation == 'No') ? 'selected' : ' ' }} value="No">No</option>
                      </select>
                    </div>
              </div>
              <div class="col-md-3">
                  <div class="form-group">
                      <label for="food_choice">Food Choice</label>
                      <select id="food_choice" class="form-control" name="food_choice">
                        <option selected>Select Food</option>
                          <option {{ ($guest->food_choice == 'Gujarati') ? 'selected' : ' ' }} value="Gujarati">Gujarati</option>
                          <option {{ ($guest->food_choice == 'Rajasthani') ? 'selected' : ' ' }} value="Rajasthani">Rajasthani</option>
                      </select>
                    </div>
              </div>
              <div class="col-md-3">
                  <div class="form-group">
                      <label for="guest_type">Guest Belongs to?</label>
                      <select id="guest_type" class="form-control" name="guest_type">
                        <option selected>Groom/Bride</option>
                          <option {{ ($guest->guest_type == 'Bride') ? 'selected' : ' ' }} value="Bride">Bride</option>
                          <option {{ ($guest->guest_type == 'Groom') ? 'selected' : ' ' }} value="Groom">Groom</option>
                      </select>
                    </div>
              </div>
          </div>
      </div>
    <div class="card-footer"><button type="submit" class="btn btn-primary">Submit</button></div>
  </form>
</div>

@endsection