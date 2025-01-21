<!-- resources/views/checkout/success.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Sukses</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mb-4">Checkout Berhasil</h1>
        <div class="alert alert-success">
            Terima kasih! Pesanan Anda telah berhasil diproses.
        </div>
        <a href="{{ route('pembeli.index') }}" class="btn btn-primary">Kembali ke Beranda</a>
    </div>
</body>
</html>
