<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MyMovie</title>

    <link rel="stylesheet" href="{{ asset('css/app.css')}}">
</head>

<body>
    <main class="container py-2">
        <div class="row row-cols-3 g-3">
            @foreach ($movies as $movie)
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $movie->title }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $movie->original_title }}</h6>
                        <p class="card-text">
                            Nationality: {{ $movie->nationality }} <br>
                            On cinema: {{ $movie->date }} <br>
                            Rating: {{ $movie->vote }}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </main>
</body>

</html>
