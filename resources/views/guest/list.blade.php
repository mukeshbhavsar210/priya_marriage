@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-10">
            <h4>Guest List</h4>
        </div>
        <div class="col-md-2">
            <a href="{{ route('guest.create') }}" class="btn btn-primary float-end">Create Guest</a>
        </div>
    </div>    
    
    <table class="table border mt-4">
        <thead>
        <tr>
            <th scope="col">Name</th>            
            <th scope="col">Surname</th>
            <th scope="col">Mobile</th>
            <th scope="col">Whatsapp</th>
            <th scope="col">Address</th>
            <th scope="col">City</th>
            <th scope="col">Category</th>
            <th scope="col">Event</th>
            <th scope="col">Invitation</th>
            <th scope="col">Food choice</th>
            <th scope="col">Guest Type</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
            @if($guests->isNotEmpty())
                @foreach ($guests as $guest)
                    <tr>
                        <td>{{ $guest->name }}</td>
                        <td>{{ $guest->surname->surname }}</td>
                        <td>{{ $guest->mobile }}</td>
                        <td>{{ $guest->whatsapp }}</td>
                        <td>{{ $guest->address }}</td>
                        <td>{{ $guest->city->name }}</td>
                        <td>{{ $guest->category->name }}</td>
                        <td>{{ $guest->event }}</td>
                        <td>{{ $guest->invitation }}</td>
                        <td>{{ $guest->food_choice }}</td>
                        <td>{{ $guest->guest_type }}</td>
                        <td>
                            <a href="{{ route('guest.edit', $guest->id ) }}">
                                <svg class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                </svg>
                            </a>
                            <a href="#" onclick="deleteBrand({{ $guest->id }})" class="text-danger w-4 h-4 mr-1">
                                <svg wire:loading.remove.delay="" wire:target="" class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path	ath fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                  </svg>
                            </a>
                        </td>
                    </tr>
                @endforeach    
            @endif            
        </tbody>
    </table>
@endsection