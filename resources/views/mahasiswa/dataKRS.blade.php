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
            let menuKRS = document.getElementById("menuKRS");

            isDropdownOpen = !isDropdownOpen; // Ubah status dropdown

            if (isDropdownOpen) {
                dropdown.classList.remove("hidden");
                dropdown.classList.add("opacity-80", "backdrop-blur-md");
                menuKRS.classList.add("bg-gray-500", "text-white", "rounded");
            } else {
                dropdown.classList.add("hidden");
                dropdown.classList.remove("opacity-80", "backdrop-blur-md");
                menuKRS.classList.remove("bg-gray-500", "text-white", "rounded");
            }
        }

        function keepDropdownOpen(event) {
            event.stopPropagation(); // Mencegah dropdown tertutup saat klik di dalamnya
        }

        function openDataKRS(){
            isDropdownOpen = true; // Pastikan dropdown tetap terbuka
            document.getElementById("dropdownMenu").classList.remove("hidden");
            document.getElementById("dropdownMenu").classList.add("opacity-50", "backdrop-blur-md");

            // Highlight menu "Data Mahasiswa"
            document.getElementById("menuKRS").classList.add("bg-gray-500", "text-white", "rounded");
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

        function checkKRS() {
            let krsData = sessionStorage.getItem('krs'); 
            if (krsData) {
                document.getElementById("krsTable").innerHTML = krsData; 
                document.getElementById("tambahButton").classList.add("hidden"); 
                document.getElementById("unduhKRS").classList.remove("hidden"); 
            } else {
                document.getElementById("krsBody").innerHTML = '<tr><td colspan="9" class="text-center p-4">Belum ada data</td></tr>';
            }
        }

        window.onload = checkKRS; 
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
                <li class="py-2"><a href="/mahasiswa/dashboard " class="block">Dashboard</a></li>
                <li class="py-2 relative">
                    <button id="menuButton" onclick="toggleDropdown()" class="block w-full text-left flex justify-between items-center">Menu <span>▼</span></button>                    
                    <ul id="dropdownMenu" class="hidden bg-gray-600 mt-2 rounded" onclick="keepDropdownOpen(event)">
                        <li id="menuKRS" class="py-2 px-4 hover:bg-gray-500">
                            <a href="/mahasiswa/dataKRS" onclick="openDataKRS()">Data KRS</a>
                        </li>
                    </ul>
                </li>
                <li class="py-2 text-white flex justify-between items-center">
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
                    <img src="{{ asset('image/mhs.png') }}" alt="👨‍💼" class="h-8 w-8 rounded-full">
                    <span>Mahasiswa</span>
                </div>
            </nav>

            <main class="p-6">
                <!-- Selamat Datang Admin -->
                <div class="bg-cyan-700 text-white p-3 text-center rounded mb-4 shadow-md w-full">
                    <h2 class="text-2xl font-bold">KRS MAHASISWA POLITEKNIK NEGERI CILACAP</h2>
                </div>
                <hr><br>

                <!-- Main Content -->
                <div class="bg-white shadow-md rounded p-4 max-w-4xl mx-auto overflow-x-auto">
                    <div class="flex justify-between items-center mt-4">
                        <a href="/mahasiswa/tambahKRS" class="bg-green-900 text-white px-4 py-2 rounded">
                            Tambah
                        </a>                        
                    </div>
                    <table class="w-full mt-4 border-collapse border border-gray-300 text-center">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="border p-2">No.</th>
                                <th class="border p-2">NPM</th>
                                <th class="border p-2">Nama</th>
                                <th class="border p-2">Kelas</th>
                                <th class="border p-2">Prodi</th>
                                <th class="border p-2">Matkul</th>
                                <th class="border p-2">SKS</th>
                                <th class="border p-2">Semester</th>
                                <th class="border p-2">AKSI</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($krs as $kr)                                
                            <tr>
                                <td class="border border-gray-400 px-4 py-2">{{ $kr['id_krs'] }}</td>
                                <td class="border border-gray-400 px-4 py-2">{{ $kr['npm'] }}</td>
                                <td class="border border-gray-400 px-4 py-2">{{ $kr['nama_mahasiswa'] }}</td>
                                <td class="border border-gray-400 px-4 py-2">{{ $kr['nama_kelas'] }}</td>
                                <td class="border border-gray-400 px-4 py-2">{{ $kr['nama_prodi'] }}</td>
                                <td class="border border-gray-400 px-4 py-2">{{ $kr['nama_matkul'] }}</td>
                                <td class="border border-gray-400 px-4 py-2">{{ $kr['sks'] }}</td>
                                <td class="border border-gray-400 px-4 py-2">{{ $kr['semester'] }}</td>

                                <td class="border border-gray-400 px-4 py-2 text-center">
                                    <a href="/admin/editKrs/{{ $kr['id_krs'] }}" class="text-blue-500">✏</a>
                                    <a href="/admin/deleteKrs/{{ $kr['id_krs'] }}" class="text-red-500 ml-2">🗑</a>
                                </td>
                            </tr> 
                            @endforeach
                    </table>
                    <!-- Tombol Unduh KRS -->
                <div class="text-right mt-4">
                    <a id="unduhKRS" href="/mahasiswa/unduhKRS" class="bg-blue-500 text-white px-4 py-2 rounded hidden">
                        Unduh KRS
                </div>
            </main>
        </div>
    </div>
</body>
</html>
