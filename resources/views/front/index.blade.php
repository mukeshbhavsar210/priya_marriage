@extends('front.layouts.app')

@section('content')
    <div class="container">
        <div class="card mt-5">
            <div class="card-body">
                <div class="alert alert-danger" role="alert">
                    <h4>Guest</h4>
                    {{ $guests->count() }}
                  </div>
                <table class="table border">
                    <thead>
                    <tr>
                        <th scope="col">Photo</th>
                        <th scope="col">Name</th>            
                        <th scope="col">Surname</th>
                        <th scope="col">Mobile</th>
                        <th scope="col">Address</th>
                        <th scope="col">City</th>
                        <th scope="col">Category</th>
                        <th scope="col">Guest Type</th>                        
                        <th scope="col">Invitation</th>                        
                        <th scope="col">Food</th>
                        <th scope="col">Bridge</th>
                    </tr>
                    </thead>
                    <tbody>
                        @if($guests->isNotEmpty())
                            @foreach ($guests as $guest)
                                <tr>
                                    <td>
                                        @if($guest->image > 0)
                                            <img style="height: 50px; border-radius:100px;" src="{{ $guest->image }}" />    
                                        @else
                                            <img style="height: 50px" src="{{ asset('front-assets/images/user.png') }}" />
                                        @endif
                                    </td>
                                    <td>{{ $guest->name }}</td>
                                    <td>{{ $guest->surname->surname }}</td>
                                    <td>{{ $guest->mobile }}</td>
                                    <td>{{ $guest->address }}</td>
                                    <td>{{ $guest->city->name }}</td>
                                    <td>{{ $guest->category->name }}</td>
                                    <td>{{ $guest->event }}</td>
                                    <td>{{ $guest->invitation }}</td>
                                    <td>{{ $guest->food_choice }}</td>
                                    <td>
                                        @if($guest->guest_type == 'Bride')
                                            <div class="alert alert-primary" role="alert">
                                                {{ $guest->guest_type }}
                                            </div>
                                        @else
                                            <div class="alert alert-success" role="alert">
                                                {{ $guest->guest_type }}
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach    
                        @endif            
                    </tbody>
                </table> 
            </div>
        </div>
</div>
@endsection