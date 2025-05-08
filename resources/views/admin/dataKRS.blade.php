<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SiKRS - Data Matkul</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        let isDropdownOpen = false;
        function toggleDropdown() {
          const dropdown = document.getElementById("dropdownMenu");
          const icon = document.getElementById("dropdownIcon");
      
          isDropdownOpen = !isDropdownOpen;
          dropdown.classList.toggle("hidden");
          dropdown.classList.toggle("opacity-100");
      
          icon.classList.toggle("rotate-180", isDropdownOpen);
        }
      
        document.addEventListener("click", function (event) {
          const dropdown = document.getElementById("dropdownMenu");
          const menuButton = document.getElementById("menuButton");
      
          if (!dropdown.contains(event.target) && !menuButton.contains(event.target)) {
            isDropdownOpen = false;
            dropdown.classList.add("hidden");
            document.getElementById("dropdownIcon").classList.remove("rotate-180");
          }
        });
        document.addEventListener("DOMContentLoaded", function () {
        const toggleButton = document.getElementById("toggleSidebar");
        const sidebar = document.getElementById("sidebar");
        const mainContent = document.querySelector(".ml-64");

        toggleButton.addEventListener("click", function () {
        sidebar.classList.toggle("-translate-x-full");
        mainContent.classList.toggle("ml-64");
        mainContent.classList.toggle("ml-0");
        });
    });
        function confirmLogout() {
          if (confirm("Apakah Anda yakin ingin keluar?")) {
            window.location.href = "{{ route('welcome') }}";
          }
        }
      </script>      
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside id="sidebar" class="w-64 bg-gray-700 text-white px-6 pt-5 pb-24 fixed h-full shadow-xl flex flex-col">
            <div class="flex items-center justify-center mb-6">
              <img src="{{ asset('image/krs.png') }}" alt="Logo SiKRS" class="h-8 mr-2">
              <h2 class="text-2xl font-bold">SiKRS</h2>
            </div>
            <hr class="border-gray-600 mb-4">
          
            <ul class="flex-1">
                <li class="mb-3">
                    <a href="/admin/dashboard" class="block py-2 px-3 rounded hover:bg-cyan-600 transition">
                      <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 4v16h18V4H3zm2 12V6h14v10H5z" />
                      </svg>
                      Dashboard
                    </a>
                  </li>
          
              <li class="mb-3 relative">
                <button id="menuButton" onclick="toggleDropdown()" class="flex items-center space-x-2 w-full text-left py-2 px-3 rounded hover:bg-cyan-600 transition">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M4 6h16M4 12h16M4 18h7"></path>
                  </svg>
                  <span>Menu</span>
                  <svg id="dropdownIcon" class="w-4 h-4 ml-auto transform transition-transform duration-200" fill="currentColor" viewBox="0 0 20 20">
                    <path fill="currentColor" d="M5.23 7.21a.75.75 0 011.06 0L10 10.91l3.71-3.7a.75.75 0 111.06 1.06l-4.24 4.25a.75.75 0 01-1.06 0L5.23 8.27a.75.75 0 010-1.06z"/>
                  </svg>
                </button>
                <ul id="dropdownMenu" class="hidden absolute left-0 w-full mt-1 bg-gray-600 rounded shadow-lg z-20">
                  <li><a href="/admin/dataMhs" class="block py-2 px-4 hover:bg-gray-700 transition">Data Mahasiswa</a></li>
                  <li><a href="/admin/dataProdi" class="block py-2 px-4 hover:bg-gray-700 transition">Data Prodi</a></li>
                  <li><a href="/admin/dataMatkul" class="block py-2 px-4 hover:bg-gray-700 transition">Data Matkul</a></li>
                  <li><a href="/admin/dataKelas" class="block py-2 px-4 hover:bg-gray-700 transition">Data Kelas</a></li>
                  <li><a href="/admin/dataKRS" class="block py-2 px-4 hover:bg-gray-700 bg-cyan-700 text-white font-semibold">Data KRS</a></li>
                </ul>
              </li>
            </ul>
          
            <div class="mt-auto">
                <li class="mt-6 pt-4 border-t border-gray-600 text-red-400 list-none">
                  <a href="#" onclick="confirmLogout()" class="block py-2 px-3 rounded hover:bg-red-600 hover:text-white transition">
                    <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path d="M14 5l7 7-7 7M5 13h13"></path>
                    </svg> Log Out
                  </a>
                </li>
              </div>
          </aside>

        <!-- Main Content -->
        <div class="flex-1 ml-64">
            <!-- Navbar -->
            <nav class="bg-cyan-700 text-white p-4 flex justify-between items-center shadow-md w-full">
                <div class="flex items-center space-x-4">
                    <span id="toggleSidebar" class="text-2xl cursor-pointer">&#9776;</span>
                    <h1 class="text-lg font-bold">Sistem Manajemen KRS Online</h1>
                </div>
                <div class="flex items-center space-x-3">
                    <img src="{{ asset('image/admin.png') }}" alt="👨‍💼" class="h-8 w-8 rounded-full">
                    <span>Admin</span>
                </div>
            </nav>

            <main class="p-6">
                <!-- Selamat Datang Admin -->
                <div class="bg-cyan-800 text-white p-3 text-center rounded mb-4 shadow-md w-full">
                    <h2 class="text-2xl font-bold">DATA KRS MAHASISWA POLITEKNIK NEGERI CILACAP</h2>
                </div>
                <hr><br>

                <!-- Main Content -->
                <div class="bg-white shadow-md rounded p-4 max-w-4xl mx-auto overflow-x-auto">
                    <div class="flex justify-between items-center mt-4">
                        <input type="text" id="searchInput" placeholder="Cari NPM atau lainnya..." class="border p-2 rounded w-64 mb-3">
                    </div>
                    <table id="krsTable" class="w-full border-collapse border border-gray-300 text-center">
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
                        <script>
                            document.getElementById("searchInput").addEventListener("keyup", function () {
                              const searchTerm = this.value.toLowerCase();
                              const rows = document.querySelectorAll("#krsTable tbody tr");
                          
                              rows.forEach(row => {
                                const rowText = row.innerText.toLowerCase();
                                row.style.display = rowText.includes(searchTerm) ? "" : "none";
                              });
                            });
                          </script>
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
                                    <a href="/admin/editKrs/{{ $kr['id_krs'] }}" class="text-blue-600 hover:underline mr-2">✏</a>
                                    <a href="/admin/deleteKrs/{{ $kr['id_krs'] }}" class="text-gray-500 border border-transparent hover:border-red-600 hover:text-red-600 hover:scale-110 transition duration-200 ease-in-out"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus matkul ini?');">🗑</a>
                                </td>
                            </tr> 
                            @endforeach
                    </table>
                </div>
            </main>
        </div>
    </div>
</body>
</html>
