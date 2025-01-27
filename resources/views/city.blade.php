<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

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
</body>
</html>