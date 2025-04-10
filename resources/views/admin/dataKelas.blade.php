<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SiKRS - Data Matkul</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        let isDropdownOpen = false; // Menyimpan status dropdown
        
        function toggleDropdown() {
            let dropdown = document.getElementById("dropdownMenu");
            let menuKelas = document.getElementById("menuKelas");

            isDropdownOpen = !isDropdownOpen; // Ubah status dropdown

            if (isDropdownOpen) {
                dropdown.classList.remove("hidden");
                dropdown.classList.add("opacity-80", "backdrop-blur-md");
                menuKelas.classList.add("bg-gray-500", "text-white", "rounded");
            } else {
                dropdown.classList.add("hidden");
                dropdown.classList.remove("opacity-80", "backdrop-blur-md");
                menuKelas.classList.remove("bg-gray-500", "text-white", "rounded");
            }
        }

        function keepDropdownOpen(event) {
            event.stopPropagation(); // Mencegah dropdown tertutup saat klik di dalamnya
        }

        function openDataKelas(){
            isDropdownOpen = true; // Pastikan dropdown tetap terbuka
            document.getElementById("dropdownMenu").classList.remove("hidden");
            document.getElementById("dropdownMenu").classList.add("opacity-50", "backdrop-blur-md");

            // Highlight menu "Data Mahasiswa"
            document.getElementById("menuKelas").classList.add("bg-gray-500", "text-white", "rounded");
        }

        document.addEventListener("click", function(event) {
            let dropdown = document.getElementById("dropdownMenu");
            let menuButton = document.getElementById("menuButton");

            if (!dropdown.contains(event.target) && event.target !== menuButton) {
                isDropdownOpen = false; // Tutup dropdown jika klik di luar
                dropdown.classList.add("hidden");
                dropdown.classList.remove("opacity-50", "backdrop-blur-md");
            }
        });
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
                <li class="py-2"><a href="/admin/dashboard " class="block">Dashboard</a></li>
                <li class="py-2 relative">
                    <button id="menuButton" onclick="toggleDropdown()" class="block w-full text-left flex justify-between items-center">Menu <span>▼</span></button>                    
                    <ul id="dropdownMenu" class="hidden bg-gray-600 mt-2 rounded" onclick="keepDropdownOpen(event)">
                        <li class="py-2 px-4 hover:bg-gray-500"><a href="/admin/dataMhs">Data Mahasiswa</a></li>
                        <li class="py-2 px-4 hover:bg-gray-500"><a href="/admin/dataProdi">Data Prodi</a></li>
                        <li class="py-2 px-4 hover:bg-gray-500"><a href="/admin/dataMatkul">Data Matkul</a></li>
                        <li id="menuKelas" class="py-2 px-4 hover:bg-gray-500">
                            <a href="/admin/dataKelas" onclick="openDataKelas()">Data Kelas</a>
                        </li>
                        <li class="py-2 px-4 hover:bg-gray-500"><a href="/admin/dataKRS">Data KRS</a></li>
                    </ul>
                </li>
                <li class="py-2 text-red-600 flex justify-between items-center">
                    <a href="#" onclick="confirmLogout()" class="block flex justify-between items-center w-full">
                        Log Out <span>🔐</span>
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
                <div class="bg-cyan-700 text-white p-3 text-center rounded mb-4 shadow-md w-full">
                    <h2 class="text-2xl font-bold">DATA KELAS POLITEKNIK NEGERI CILACAP</h2>
                </div>
                <hr><br>

                <!-- Main Content -->
                <div class="bg-white shadow-md rounded p-4 max-w-4xl mx-auto overflow-x-auto">
                    <div class="flex justify-between items-center mt-4">
                        <a href="/admin/tambahKelas" class="bg-green-900 text-white px-4 py-2 rounded">
                            Tambah
                        </a>                        
                        <input type="text" placeholder="cari kelas..." class="border p-2 rounded">
                    </div>
                    <table class="w-full mt-4 border-collapse border border-gray-300 text-center">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="border p-2">ID Kelas</th>
                                <th class="border p-2">Kelas</th>
                                <th class="border p-2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kelas as $k)                                
                            <tr class="text-center">
                                <td class="border border-gray-400 px-4 py-2">{{ $k['id_kelas'] }}</td>
                                <td class="border border-gray-400 px-4 py-2">{{ $k['nama_kelas'] }}</td>
                                <td class="border border-gray-400 px-4 py-2 text-center">
                                    <a href="/admin/editKelas/{{ $k['id_kelas'] }}" class="text-blue-500">✏</a>
                                    <form action="{{ url('admin/hapusKelas/' . $k['id_kelas']) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 ml-2" onclick="return confirm('Apakah Anda yakin ingin menghapus data kelas ini?');">🗑</button>
                                    </form>                                
                                </td>
                            </tr>
                            
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
</body>
</html>
