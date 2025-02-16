<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-md-8">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Create User') }}
                </h2>
            </div>
            <div class="col-md-4">
                <a href="{{ route('users.create') }}" class="btn btn-primary float-end">Back</a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    Coming Soon
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
