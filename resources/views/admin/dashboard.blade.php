<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SiKRS - Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        function toggleDropdown() {
            document.getElementById("dropdownMenu").classList.toggle("hidden");
        }
    </script>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-700 text-white p-5 fixed h-full">
            <div class="text-center mb-4 flex items-center justify-center">
                <img src="{{ asset('image/krs.png') }}" alt="Logo SiKRS" class="h-8 mr-1">
                <h2 class="text-2xl font-bold text-white">SiKRS</h2>
            </div>
            <hr>            
            <ul class="mt-5">
                <li class="py-2"><a href="#" class="block">Dashboard</a></li>
                <li class="py-2 relative">
                    <button onclick="toggleDropdown()" class="block w-full text-left flex justify-between items-center">
                        Menu <span>🔽</span>
                    </button>                    
                    <ul id="dropdownMenu" class="hidden bg-gray-600 mt-2 rounded">
                        <li class="py-2 px-4 hover:bg-gray-500"><a href="/admin/dataMhs">Data Mahasiswa</a></li>
                        <li class="py-2 px-4 hover:bg-gray-500"><a href="/admin/dataDosen">Data Dosen</a></li>
                        <li class="py-2 px-4 hover:bg-gray-500"><a href="/admin/dataProdi">Data Prodi</a></li>
                        <li class="py-2 px-4 hover:bg-gray-500"><a href="/admin/dataMatkul">Data Matkul</a></li>
                        <li class="py-2 px-4 hover:bg-gray-500"><a href="/admin/dataKelas">Data Kelas</a></li>
                        <li class="py-2 px-4 hover:bg-gray-500"><a href="/admin/dataKRS">Data KRS</a></li>
                    </ul>
                </li>
                <li class="py-2 text-red-600 flex justify-between items-center">
                    <a href="#" onclick="confirmLogout()" class="block flex justify-between items-center w-full">
                        Log Out <span>🚪</span>
                    </a>
                </li>
            </ul>
            
            <script>
                function confirmLogout() {
                    let confirmAction = confirm("Apakah Anda yakin ingin keluar?");
                    if (confirmAction) {
                        window.location.href = "{{ route('welcome') }}"; // Arahkan ke halaman welcome
                    }
                }
            </script>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 ml-64">
            <!-- Navbar -->
            <nav class="bg-cyan-500 text-white p-4 flex justify-between items-center shadow-md w-full">
                <div class="flex items-center space-x-4">
                    <button class="text-2xl">&#9776;</button> <!-- Strip tiga -->
                    <h1 class="text-lg font-bold">Sistem Manajemen KRS Online</h1>
                </div>
                <div class="flex items-center space-x-3">
                    <img src="{{ asset('image/admin.png') }}" alt="👨‍💼" class="h-8 w-8 rounded-full">
                    <span>Admin</span>
                </div>
            </nav>

            <main class="p-6">
                <!-- Selamat Datang Admin -->
                <div class="bg-green-600 text-white p-3 text-center rounded mb-4  shadow-md w-full">
                <h2 class="text-2xl font-bold">SELAMAT DATANG, ADMIN !</h2>
                </div><hr><br>
                <div class="flex justify-center items-center h-full">
                    <div class="grid grid-cols-3 gap-6">
                        <!-- Data Mahasiswa -->
                        <div class="bg-white w-48 h-32 p-4 shadow-md rounded flex flex-col justify-center items-center">
                            <p class="font-semibold">Data Mahasiswa</p>
                            <p class="text-3xl mb-1">🎓</p>
                            <p class="text-gray-500">2084</p>
                        </div>
                
                        <!-- Data Dosen -->
                        <div class="bg-white w-48 h-32 p-4 shadow-md rounded flex flex-col justify-center items-center">
                            <p class="font-semibold">Data Dosen</p>
                            <p class="text-3xl mb-1">👨‍🏫</p>
                            <p class="text-gray-500">2084</p>
                        </div>
                
                        <!-- Data Matkul -->
                        <div class="bg-white w-48 h-32 p-4 shadow-md rounded flex flex-col justify-center items-center">
                            <p class="font-semibold">Data Matkul</p>
                            <p class="text-3xl mb-1">📚</p>
                            <p class="text-gray-500">2084</p>
                        </div>
                
                        <!-- Data Prodi -->
                        <div class="bg-white w-48 h-32 p-4 shadow-md rounded flex flex-col justify-center items-center">
                            <p class="font-semibold">Data Prodi</p>
                            <p class="text-3xl mb-1">🏫</p>
                            <p class="text-gray-500">2084</p>
                        </div>
                
                        <!-- Data Kelas -->
                        <div class="bg-white w-48 h-32 p-4 shadow-md rounded flex flex-col justify-center items-center">
                            <p class="font-semibold">Data Kelas</p>
                            <p class="text-3xl mb-1">🏠</p>
                            <p class="text-gray-500">2084</p>
                        </div>
                
                        <!-- Data KRS -->
                        <div class="bg-white w-48 h-32 p-4 shadow-md rounded flex flex-col justify-center items-center">
                            <p class="font-semibold">Data KRS</p>
                            <p class="text-3xl mb-1">📝</p>
                            <p class="text-gray-500">2084</p>
                        </div>
                    </div>
                </div>                
            </main>
        </div>
    </div>
</body>
</html>
