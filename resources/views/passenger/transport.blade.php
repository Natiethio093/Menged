<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
        .carriers {
            transition: 0.8s ease;
            border: none; /* Remove the border */
        }
        .carriers:hover {
            transform: scale(1.1);
        }
        .rounded-circle {
            width: 200px;
            height: 200px;
            object-fit: cover;
        }
        .card-bodies {
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>
<body>
<div class="container mt-3">
    <div class="row mb-3">
        @foreach($bus as $bus)
        <div class="col-md-4 mt-3">
            <a href="/">
                <div class="card carriers shadow">
                    <div class="card-img-top d-flex align-items-center justify-content-center pt-3">
                        <img src="/images/{{$bus->image}}" style="max-height: 100%; max-width: 100%; object-fit: contain;" class="rounded-circle" alt="Product Image">
                    </div>
                    <div class="card-body card-bodies">
                        <h5 class="card-title fs-5">{{$bus->name}}</h5>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
</body>
</html>