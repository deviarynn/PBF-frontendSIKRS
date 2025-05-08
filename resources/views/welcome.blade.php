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

    <div class="w-full bg-cyan-300 py-4 flex items-center justify-center shadow-xl rounded-lg border border-cyan-400">
        <img src="{{ asset('image/krs.png') }}" alt="Logo SiKRS" class="h-14 mr-2 drop-shadow-md">
        <h2 class="text-2xl font-bold text-gray-800 drop-shadow-sm">SiKRS</h2>
    </div>
    

    <!-- Selamat Datang -->
    <h1 class="text-3xl font-bold text-white mt-10 mb-9">Selamat Datang di Sistem Manajemen KRS Online</h1>

    <!-- Box Pilihan Login -->
    <div class="bg-blue-100 p-8 rounded-2xl shadow-2xl w-[500px] text-center">
        <p class="text-gray-700 text-lg font-medium">Silakan pilih role login</p>
    
        <!-- Box Pilihan -->
        <div class="mt-6 grid grid-cols-2 gap-6">
            <a href="{{ route('admin.login') }}"
               class="block bg-blue-600 text-white px-6 py-6 rounded-xl text-lg font-semibold shadow-lg hover:shadow-2xl hover:bg-blue-800 transform hover:scale-105 transition duration-300 ease-in-out">
                <span class="block text-3xl mb-1">👨‍💼</span>
                Admin
            </a>
            <a href="{{ route('mahasiswa.login') }}"
               class="block bg-green-600 text-white px-6 py-6 rounded-xl text-lg font-semibold shadow-lg hover:shadow-2xl hover:bg-green-800 transform hover:scale-105 transition duration-300 ease-in-out">
                <span class="block text-3xl mb-1">🎓</span>
                Mahasiswa
            </a>
        </div>
    </div>
    

</body>
</html>
