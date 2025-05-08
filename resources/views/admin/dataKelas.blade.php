<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SiKRS - Data Kelas</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        let isDropdownOpen = false;
        function toggleDropdown() {
            let dropdown = document.getElementById("dropdownMenu");
            isDropdownOpen = !isDropdownOpen;
            dropdown.classList.toggle("hidden");
        }

        document.addEventListener("click", function(event) {
            let dropdown = document.getElementById("dropdownMenu");
            let menuButton = document.getElementById("menuButton");
            if (!dropdown.contains(event.target) && event.target !== menuButton) {
                dropdown.classList.add("hidden");
                isDropdownOpen = false;
            }
        });

        function confirmLogout() {
            if (confirm("Apakah Anda yakin ingin keluar?")) {
                window.location.href = "{{ route('welcome') }}";
            }
        }

        // Fitur pencarian
        function searchTable() {
            const input = document.getElementById("searchInput");
            const filter = input.value.toLowerCase();
            const rows = document.querySelectorAll("tbody tr");

            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(filter) ? "" : "none";
            });
        }
    </script>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-800 text-white p-5 fixed h-full">
            <div class="flex items-center mb-6 space-x-2">
                <img src="{{ asset('image/krs.png') }}" class="h-8" alt="Logo">
                <span class="text-2xl font-bold">SiKRS</span>
            </div>
            <ul>
                <li class="mb-3 flex items-center space-x-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M3 12l2-2m0 0l7-7 7 7M13 5v6h6"></path>
                    </svg>
                    <a href="/admin/dashboard">Dashboard</a>
                </li>
                <li class="mb-3">
                    <button id="menuButton" onclick="toggleDropdown()" class="flex items-center space-x-2 w-full text-left">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M4 6h16M4 12h16M4 18h7"></path>
                        </svg>
                        <span>Menu</span>
                        <svg class="w-4 h-4 ml-auto transform transition-transform duration-200" viewBox="0 0 20 20">
                            <path fill="currentColor" d="M5.23 7.21a.75.75 0 011.06 0L10 10.91l3.71-3.7a.75.75 0 111.06 1.06l-4.24 4.25a.75.75 0 01-1.06 0L5.23 8.27a.75.75 0 010-1.06z"/>
                        </svg>
                    </button>
                    <ul id="dropdownMenu" class="hidden ml-6 mt-2 space-y-2">
                        <li><a href="/admin/dataMhs" class="block hover:text-cyan-300">Data Mahasiswa</a></li>
                        <li><a href="/admin/dataProdi" class="block hover:text-cyan-300">Data Prodi</a></li>
                        <li><a href="/admin/dataMatkul" class="block hover:text-cyan-300">Data Matkul</a></li>
                        <li><a href="/admin/dataKelas" class="block text-cyan-400 font-bold">Data Kelas</a></li>
                        <li><a href="/admin/dataKRS" class="block hover:text-cyan-300">Data KRS</a></li>
                    </ul>
                </li>
                <li class="mt-10 text-red-500">
                    <a href="#" onclick="confirmLogout()" class="flex items-center space-x-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M17 16l4-4m0 0l-4-4m4 4H7"></path>
                        </svg>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </aside>

        <!-- Content -->
        <div class="flex-1 ml-64">
            <!-- Navbar -->
            <nav class="bg-cyan-500 text-white p-4 flex justify-between items-center shadow">
                <div class="flex items-center space-x-2">
                    <svg class="w-6 h-6" fill="none" stroke="white" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M4 6h16M4 12h16M4 18h7"></path>
                    </svg>
                    <h1 class="text-lg font-semibold">Sistem Manajemen KRS Online</h1>
                </div>
                <div class="flex items-center space-x-3">
                    <img src="{{ asset('image/admin.png') }}" class="h-8 w-8 rounded-full" alt="Admin">
                    <span>Admin</span>
                </div>
            </nav>

            <!-- Main -->
            <main class="p-6">
                <div class="bg-cyan-700 text-white text-center p-4 rounded mb-6 shadow">
                    <h2 class="text-2xl font-bold">DATA KELAS POLITEKNIK NEGERI CILACAP</h2>
                </div>

                <div class="bg-white p-4 rounded shadow max-w-4xl mx-auto overflow-x-auto">
                    <div class="flex justify-between items-center mb-4">
                        <a href="/admin/tambahKelas" class="bg-green-800 hover:bg-green-600 text-white px-4 py-2 rounded">Tambah</a>
                        <input id="searchInput" onkeyup="searchTable()" type="text" placeholder="Cari kelas..." class="border p-2 rounded w-1/2">
                    </div>
                           
                    <table id="kelasTable" class="w-full mt-4 border-collapse border border-gray-300 text-center">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="border p-2">ID Kelas</th>
                                <th class="border p-2">Kelas</th>
                                <th class="border p-2">Aksi</th>
                            </tr>
                        </thead>

                        <script>
                            document.getElementById("searchInput").addEventListener("keyup", function () {
                                const searchTerm = this.value.toLowerCase();
                                const rows = document.querySelectorAll("#kelasTable tbody tr");
                        
                                rows.forEach(row => {
                                    const rowText = row.innerText.toLowerCase();
                                    row.style.display = rowText.includes(searchTerm) ? "" : "none";
                                });
                            });
                        </script>
                        
                        <tbody>
                            @foreach ($kelas as $k)                                
                            <tr class="text-center">
                                <td class="border border-gray-400 px-4 py-2">{{ $k['id_kelas'] }}</td>
                                <td class="border border-gray-400 px-4 py-2">{{ $k['nama_kelas'] }}</td>
                                <td class="border border-gray-400 px-4 py-2 text-center">
                                    <a href="/admin/editKelas/{{ $k['id_kelas'] }}"  class="text-gray-500 border border-transparent hover:border-blue-600 hover:text-blue-600 hover:scale-110 transition duration-200 ease-in-out">✏</a>
                                    <form action="{{ url('admin/hapusKelas/' . $k['id_kelas']) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-gray-500 border border-transparent hover:border-red-600 hover:text-red-600 hover:scale-110 transition duration-200 ease-in-out"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus matkul ini?');">🗑</button>
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
