<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show Product - SantriKoding.com</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #2c3e50;
            color: #ecf0f1;
            font-family: 'Poppins', sans-serif;
        }

        h3 {
            font-weight: 600;
            color: #2c3e50;
        }

        p {
            font-size: 1.1rem;
            line-height: 1.6;
        }

        .card {
            border-radius: 15px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
        }

        img {
            border-radius: 15px;
            transition: transform 0.3s ease;
        }

        img:hover {
            transform: scale(1.05);
        }

        .price {
            font-size: 1.5rem;
            font-weight: 700;
            color: #e74c3c;
        }

        .stock {
            font-weight: 500;
            color: #27ae60;
        }

        .container {
            margin-top: 50px;
            margin-bottom: 50px;
        }

        .card-body {
            padding: 20px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .col-md-4, .col-md-8 {
                margin-bottom: 20px;
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body text-center">
                        <img src="{{ asset('/storage/products/' . $product->image) }}" alt="{{ $product->title }}" class="rounded" style="width: 100%;">
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <h3>{{ $product->title }}</h3>
                        <hr />
                        <p class="price">{{ "Rp " . number_format($product->price, 2, ',', '.') }}</p>
                        <p>{!! $product->description !!}</p>
                        <hr />
                        <p class="stock">Stock : {{ $product->stock }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
