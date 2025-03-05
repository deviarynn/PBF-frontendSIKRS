<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - Sistem KRS</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-screen flex flex-col items-center justify-center bg-gray-900">

    <!-- Header dengan Logo dan Text -->

    <div class="w-full bg-cyan-300 py-4 flex items-center justify-center shadow-lg">
    <img src="{{ asset('image/krs.png') }}" alt="Logo SiKRS" class="h-14 mr-1">
        <h2 class="text-2xl font-bold text-gray-800">SiKRS</h2>
    </div>

    <!-- Selamat Datang -->
    <h1 class="text-3xl font-bold text-white mt-10 mb-9">Selamat Datang di Sistem Manajemen KRS Online</h1>

    <!-- Box Pilihan Login -->
    <div class="bg-blue-100 p-8 rounded-lg shadow-lg w-[500px] text-center">
        <p class="text-black-600 mt-2">Silakan pilih role login</p>

        <!-- Box Pilihan -->
        <div class="mt-6 grid grid-cols-2 gap-4">
            <a href="{{ route('admin.login') }}" class="block bg-blue-500 text-white px-6 py-4 rounded-lg text-lg font-semibold shadow hover:bg-blue-600 transition duration-300">
                <span class="block text-2xl">👨‍💼</span>
                Admin
            </a>
            <a href="{{ route('mahasiswa.login') }}" class="block bg-green-500 text-white px-6 py-4 rounded-lg text-lg font-semibold shadow hover:bg-green-600 transition duration-300">
                <span class="block text-2xl">🎓</span>
                Mahasiswa
            </a>
        </div>
    </div>

</body>
</html>
