@extends('admin.layouts.app')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <h2>Guest</h2>
            </div>
            <div class="col-md-4 text-right">
                <a href="{{ route('guest.create') }}" class="btn btn-primary float-end">Create Guest</a>
            </div>
        </div>
    </div>
</section>
    
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <table class="table border">
                <thead>
                <tr>
                    <th scope="col">ID</th>            
                    <th scope="col">Name</th>            
                    <th scope="col">Surname</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                    @if($guests->isNotEmpty())
                        @foreach ($guests as $guest)
                            <tr>
                                <td>{{ $guest->id }}</td>
                                <td>{{ $guest->name }}</td>
                                <td>{{ $guest->surname->surname }}</td>
                                <td>{{ $guest->mobile }}</td>
                                {{-- <td>{{ $guest->whatsapp }}</td>
                                <td>{{ $guest->address }}</td>
                                <td>{{ $guest->city->name }}</td>
                                <td>{{ $guest->category->name }}</td>
                                <td>{{ $guest->event }}</td>
                                <td>{{ $guest->invitation }}</td>
                                <td>{{ $guest->food_choice }}</td>
                                <td>{{ $guest->guest_type }}</td> --}}
                                <td>
                                    
                                    
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal_{{ $guest->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">{{ $guest->name }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                                {{ $guest->whatsapp }}
                                                {{ $guest->address }}
                                                {{ $guest->city->name }}
                                                {{ $guest->category->name }}
                                                {{ $guest->event }}
                                                {{ $guest->invitation }}
                                                {{ $guest->food_choice }}
                                                {{ $guest->guest_type }}
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Button trigger modal -->
                                    <button type="button" data-toggle="modal" data-target="#exampleModal_{{ $guest->id }}">
                                        <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                                            width="20px" height="20px" viewBox="0 0 64 64" enable-background="new 0 0 64 64" xml:space="preserve">
                                        <path fill="#231F20" d="M63.714,30.516C63.347,29.594,54.448,8,31.999,8S0.651,29.594,0.284,30.516
                                            c-0.379,0.953-0.379,2.016,0,2.969C0.651,34.406,9.55,56,31.999,56s31.348-21.594,31.715-22.516
                                            C64.093,32.531,64.093,31.469,63.714,30.516z M31.999,40c-4.418,0-8-3.582-8-8s3.582-8,8-8s8,3.582,8,8S36.417,40,31.999,40z"/>
                                        </svg>
                                    </button>

                                    <a href="{{ route('guest.edit', $guest->id ) }}">
                                        <svg class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                        </svg>
                                    </a>
                                    
                                    <a href="#" onclick="deleteGuest({{ $guest->id }})" class="text-danger w-4 h-4 mr-1">
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
        </div>
    </div>
</section>
<script>  
    function deleteGuest(id){
        var url = '{{ route("guest.delete","ID") }}'
        var newUrl = url.replace("ID",id)

        if(confirm("Are you sure you want to delete?")){
            $.ajax({
                url: newUrl,
                type: 'delete',
                data: {},
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response){
                    if(response["status"]){
                        window.location.href="{{ route('guest.index') }}"
                    }
                }
            });
        }
    }
</script>
@endsection