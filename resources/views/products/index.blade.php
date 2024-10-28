<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Products - SantriKoding.com</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #2c3e50;
            color: #ecf0f1;
            font-family: 'Poppins', sans-serif;
        }

        h3, h5 {
            color: #fff;
        }

        a {
            color: #e1306c;
            text-decoration: none;
        }

        a:hover {
            color: #fff;
        }

        .card {
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
        }

        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }

        .btn-success:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }

        .btn-dark {
            background-color: #343a40;
            border-color: #343a40;
        }

        .btn-dark:hover {
            background-color: #23272b;
            border-color: #1d2124;
        }

        .table {
            color: #fff;
        }

        .table thead {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .table th {
            border: none;
        }

        .table tbody tr:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .card-body {
            padding: 20px;
        }

        /* Hover effects for table buttons */
        .btn-primary:hover, .btn-danger:hover {
            transform: scale(1.1);
            transition: 0.3s;
        }

        img {
            transition: 0.3s;
        }

        img:hover {
            transform: scale(1.05);
        }

        footer {
            text-align: center;
            padding: 20px 0;
            color: #aaa;
        }

        /* Pagination customization */
        .pagination .page-link {
            color: #fff;
            background-color: transparent;
            border-color: #fff;
        }

        .pagination .page-link:hover {
            background-color: #e1306c;
            color: #fff;
        }

        /* Add animation for buttons */
        .btn {
            transition: all 0.3s ease;
        }
    </style>
</head>

<body>

    <!-- Content Section -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4"> Tw1ster </h3>
                    <h5 class="text-center">
                        <a href="https://www.instagram.com/mnzrfdllh/" target="_blank">
                            <i class="fab fa-instagram"></i> Instagram
                        </a>
                    </h5>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('products.create') }}" class="btn btn-md btn-success mb-3">ADD PRODUCT</a>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">IMAGE</th>
                                    <th scope="col">TITLE</th>
                                    <th scope="col">PRICE</th>
                                    <th scope="col">STOCK</th>
                                    <th scope="col" style="width: 20%">ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $product)
                                    <tr>
                                        <td class="text-center">
                                            <img src="{{ asset('/storage/products/'.$product->image) }}" class="rounded" style="width: 150px">
                                        </td>
                                        <td>{{ $product->title }}</td>
                                        <td>{{ "Rp " . number_format($product->price,2,',','.') }}</td>
                                        <td>{{ $product->stock }}</td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('products.destroy', $product->id) }}" method="POST">
                                                <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">DELETE</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        Data Products belum Tersedia.
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Section -->
    <footer>
        <p>&copy; 2024 Tw1ster.com. All Rights Reserved.</p>
    </footer>

    <!-- Bootstrap & JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Message with SweetAlert
        @if(session('success')) 
            Swal.fire({ 
                icon: "success", 
                title: "BERHASIL", 
                text: "{{ session('success') }}", 
                showConfirmButton: false,
                timer: 2000
            });
        @elseif(session('error')) 
            Swal.fire({ 
                icon: "error",
                title: "GAGAL!",
                text: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @endif
    </script>
</body>

</html>
