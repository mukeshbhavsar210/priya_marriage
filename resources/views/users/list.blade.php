<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-md-8">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Users') }}
                </h2>
            </div>
            <div class="col-md-4">
                <a href="{{ route('users.create') }}" class="btn btn-primary float-end">Create User</a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="table border mt-4">
                        <thead>
                        <tr>
                            <th scope="col">Name</th>            
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @if($users->isNotEmpty())
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>Role</td>
                                        <td>
                                            <a href="{{ route('users.edit', $user->id ) }}">
                                                <svg class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
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
        </div>
    </div>
</x-app-layout>
