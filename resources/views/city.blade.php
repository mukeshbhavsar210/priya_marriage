<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('City') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container">
                        <h1>Cities list</h1> 
                        <table class="table border">
                            <thead>
                              <tr>
                                <th scope="col">City</th>            
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($cities as $city)
                                    <tr>
                                        <td>{{ $city->name }}</td>
                                    </tr>
                                @endforeach                    
                            </tbody>
                          </table>
                    
                          <div class="card">
                            <div class="card-header">Create city</div>
                            <div class="card-body">
                                <form action="create-city" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="inputCity" class="form-label">City</label>
                                            <input type="text" name="name" class="form-control" >
                                        </div>
                                        
                                        <div class="col-md-3">
                                            <button type="submit" class="btn btn-primary mt-4">Submit</button>
                                        </div>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
