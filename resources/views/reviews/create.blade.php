<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Ulasan Barang</title>
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
            --gradient-start: #2c3e50;
            --gradient-end: #3498db;
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

        .btn-primary {
            background: linear-gradient(135deg, var(--gradient-start), var(--gradient-end));
            border: none;
            padding: 0.8rem 1.5rem;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            background: linear-gradient(135deg, var(--gradient-end), var(--gradient-start));
        }

        .star-rating .bi-star-fill,
        .star-rating .bi-star {
            font-size: 2.5rem;
            cursor: pointer;
            transition: all 0.3s ease;
            margin: 0 0.2rem;
        }

        .star-rating .bi-star-fill {
            color: #ffc107;
            text-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .star-rating .bi-star {
            color: #e4e5e9;
        }

        .star-rating .bi-star:hover,
        .star-rating .bi-star-fill:hover {
            transform: scale(1.2);
        }

        .form-control, .form-select {
            border: 2px solid #e9ecef;
            border-radius: 8px;
            padding: 0.8rem 1rem;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--gradient-end);
            box-shadow: 0 0 0 0.25rem rgba(52, 152, 219, 0.1);
        }

        .form-label {
            color: var(--dark-gray);
            font-weight: 500;
            margin-bottom: 0.5rem;
        }

        .rating-label {
            font-size: 1.1rem;
            margin-bottom: 1rem;
            display: block;
        }

        .container {
            max-width: 1200px;
            padding: 0 2rem;
        }

        @media (max-width: 768px) {
            .container {
                padding: 0 1rem;
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
        <div class="card shadow-sm mx-auto" style="max-width: 600px;">
            <div class="card-body p-4">
                <h1 class="h4 card-title text-center mb-4 fw-bold">Tambah Ulasan Barang</h1>
                <form action="{{ route('reviews.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="product_id" class="form-label">Pilih Produk</label>
                        <select name="product_id" id="product_id" class="form-select">
                            @foreach($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <span class="rating-label">Berikan Rating</span>
                        <div class="star-rating d-flex justify-content-center mb-2" id="star-rating-container">
                            @for($i = 1; $i <= 5; $i++)
                                <i class="bi bi-star" data-value="{{ $i }}"></i>
                            @endfor
                        </div>
                        <input type="hidden" name="rating" id="rating-input" value="0">
                    </div>
                    <div class="mb-4">
                        <label for="comment" class="form-label">Komentar</label>
                        <textarea name="comment" id="comment" rows="4" class="form-control" placeholder="Tulis komentar Anda di sini..." required></textarea>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="bi bi-send me-2"></i>Kirim Ulasan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const stars = document.querySelectorAll('.star-rating .bi-star');
            const ratingInput = document.getElementById('rating-input');

            function updateStars(value) {
                stars.forEach((star, index) => {
                    if (index < value) {
                        star.classList.remove('bi-star');
                        star.classList.add('bi-star-fill');
                    } else {
                        star.classList.remove('bi-star-fill');
                        star.classList.add('bi-star');
                    }
                });
            }

            stars.forEach(star => {
                star.addEventListener('click', function() {
                    const value = parseInt(this.getAttribute('data-value'));
                    ratingInput.value = value;
                    updateStars(value);
                });
                star.addEventListener('mouseover', function() {
                    const value = parseInt(this.getAttribute('data-value'));
                    updateStars(value);
                });
                star.addEventListener('mouseout', function() {
                    const currentRating = parseInt(ratingInput.value);
                    updateStars(currentRating);
                });
            });

            // Set initial stars if there's a default value
            if (ratingInput.value > 0) {
                updateStars(parseInt(ratingInput.value));
            }
        });
    </script>
</body>
</html>
