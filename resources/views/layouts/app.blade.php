<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Sistem Informasi Service Motor' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    <style>body{font-family:'Instrument Sans',system-ui,-apple-system,Segoe UI,sans-serif}</style>
</head>
<body class="bg-gray-50 min-h-screen">
    <nav class="bg-white shadow-sm border-b border-gray-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center gap-3">
                    <span class="font-semibold text-gray-900 text-lg">Service<span class="text-indigo-600">Motor</span></span>
                </div>
                <div class="hidden md:flex items-center gap-6 text-sm font-medium">
                    <a href="{{ route('pelanggan.index') }}" class="px-3 py-2 rounded-md text-gray-600 hover:bg-gray-100 hover:text-gray-900 transition">Data Pelanggan</a>
                    <a href="{{ route('kendaraan.index') }}" class="px-3 py-2 rounded-md text-gray-600 hover:bg-gray-100 hover:text-gray-900 transition">Data Kendaraan</a>
                    <a href="{{ route('daftar-service.index') }}" class="px-3 py-2 rounded-md text-gray-600 hover:bg-gray-100 hover:text-gray-900 transition">Daftar Service</a>
                    <a href="{{ route('data-service.index') }}" class="px-3 py-2 rounded-md text-gray-600 hover:bg-gray-100 hover:text-gray-900 transition">Data Service</a>
                    <a href="{{ route('pembayaran.index') }}" class="px-3 py-2 rounded-md text-gray-600 hover:bg-gray-100 hover:text-gray-900 transition">Pembayaran</a>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        @if(session('ok'))
            <div class="mb-4 p-3 rounded bg-green-50 border border-green-200 text-green-800 text-sm">{{ session('ok') }}</div>
        @endif
        @if(session('error'))
            <div class="mb-4 p-3 rounded bg-red-50 border border-red-200 text-red-800 text-sm">{{ session('error') }}</div>
        @endif

        @yield('content')
    </main>
</body>
</html>
