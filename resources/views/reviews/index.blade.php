<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Ulasan Barang</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #34495e;
            --accent-color: #95a5a6;
            --light-gray: #f8f9fa;
            --dark-gray: #343a40;
            --gradient-start: #dc3545;
            --gradient-end: #ff6b6b;
        }
        
        body {
            background-color: #f0f2f5;
            color: var(--dark-gray);
            font-family: 'Poppins', sans-serif;
        }

        .navbar {
            background: linear-gradient(135deg, var(--gradient-start), var(--gradient-end)) !important;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            padding: 1rem 0;
        }

        .navbar-brand {
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.05);
            background-color: white;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 28px rgba(0,0,0,0.1);
        }

        .btn-success {
            background: linear-gradient(135deg, var(--gradient-start), var(--gradient-end));
            border: none;
            padding: 0.6rem 1.2rem;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-success:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            background: linear-gradient(135deg, var(--gradient-end), var(--gradient-start));
        }

        .btn-info {
            background-color: var(--accent-color);
            border: none;
            color: white;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .btn-info:hover {
            background-color: var(--secondary-color);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .table {
            background-color: white;
            border-radius: 15px;
            overflow: hidden;
        }

        .table-light {
            background: linear-gradient(135deg, var(--gradient-start), var(--gradient-end));
            color: white;
        }

        .table-light th {
            font-weight: 500;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
        }

        .table tbody tr {
            transition: all 0.3s ease;
        }

        .table tbody tr:hover {
            background-color: rgba(220, 53, 69, 0.05);
            transform: scale(1.01);
        }

        .star-rating .bi-star-fill {
            color: #ffc107;
            text-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .star-rating .bi-star {
            color: #e4e5e9;
        }

        .alert-success {
            background-color: rgba(220, 53, 69, 0.1);
            border: none;
            border-radius: 12px;
            color: var(--dark-gray);
            padding: 1rem;
            margin-bottom: 1.5rem;
        }

        .product-image {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            object-fit: cover;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }

        .product-image:hover {
            transform: scale(1.1);
        }

        .btn-danger {
            background-color: #e74c3c;
            border: none;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .btn-danger:hover {
            background-color: #c0392b;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .empty-state {
            padding: 3rem 2rem;
            text-align: center;
        }

        .empty-state i {
            font-size: 3rem;
            color: var(--accent-color);
            margin-bottom: 1rem;
        }

        .empty-state p {
            color: var(--accent-color);
            font-size: 1.1rem;
        }

        .container {
            max-width: 1200px;
            padding: 0 2rem;
        }

        @media (max-width: 768px) {
            .container {
                padding: 0 1rem;
            }
            
            .table-responsive {
                border-radius: 15px;
                box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark mb-4">
        <div class="container">
            <span class="navbar-brand">
                <i class="bi bi-star-fill me-2"></i>
                Aplikasi Ulasan Barang
            </span>
        </div>
    </nav>

    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0 fw-bold">Daftar Ulasan Barang</h1>
            <a href="{{ route('reviews.create') }}" class="btn btn-success d-flex align-items-center">
                <i class="bi bi-plus-lg me-2"></i> Tambah Ulasan
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if($reviews->isEmpty())
            <div class="card empty-state">
                <i class="bi bi-inbox"></i>
                <p class="lead mb-2">Belum ada ulasan yang ditambahkan.</p>
                <p class="text-muted">Klik "Tambah Ulasan" untuk memulai.</p>
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">Produk</th>
                            <th scope="col">Rating</th>
                            <th scope="col">Komentar</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reviews as $review)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="{{ $review->product->image }}" 
                                         alt="{{ $review->product->name }}" 
                                         class="product-image me-3" 
                                         onerror="this.onerror=null; this.src='https://via.placeholder.com/50';">
                                    <span class="fw-semibold">{{ $review->product->name }}</span>
                                </div>
                            </td>
                            <td class="star-rating">
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="bi {{ $i <= $review->rating ? 'bi-star-fill' : 'bi-star' }}"></i>
                                @endfor
                            </td>
                            <td>{{ Str::limit($review->comment, 70) }}</td>
                            <td>
                                <a href="{{ route('reviews.edit', $review->id) }}" class="btn btn-sm btn-info me-2">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('reviews.destroy', $review->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus ulasan ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

    <!-- Bootstrap 5 JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
