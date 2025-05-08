<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SiKRS - Data Prodi</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    let isDropdownOpen = false;

    function toggleDropdown() {
      const dropdown = document.getElementById("dropdownMenu");
      const icon = document.getElementById("dropdownIcon");

      isDropdownOpen = !isDropdownOpen;
      dropdown.classList.toggle("hidden");
      dropdown.classList.toggle("opacity-100");

      if (isDropdownOpen) {
        icon.classList.add("rotate-180");
      } else {
        icon.classList.remove("rotate-180");
      }
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

    function confirmLogout() {
      if (confirm("Apakah Anda yakin ingin keluar?")) {
        window.location.href = "{{ route('welcome') }}";
      }
    }

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
  </script>
</head>
<body class="bg-gray-100 text-gray-800">

  <div class="flex h-screen overflow-hidden">

    <!-- Sidebar -->
    <aside id="sidebar" class="w-64 bg-gray-700 text-white px-6 pt-5 pb-24 fixed h-full shadow-xl flex flex-col transform transition-transform duration-300">
      <div class="flex items-center justify-center mb-6">
        <img src="{{ asset('image/krs.png') }}" alt="Logo SiKRS" class="h-8 mr-2">
        <h2 class="text-2xl font-bold tracking-wide">SiKRS</h2>
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
        

          <ul id="dropdownMenu" class="hidden absolute left-0 w-full mt-1 bg-gray-600 text-sm rounded shadow-lg opacity-100 z-20">
            <li>
              <a href="/admin/dataMhs" class="block py-2 px-4 hover:bg-gray-800 transition {{ Request::is('admin/dataMhs') ? 'bg-cyan-700 text-white font-semibold' : '' }}">Data Mahasiswa</a>
            </li>
            <li>
              <a href="/admin/dataProdi" class="block py-2 px-4 hover:bg-gray-800 transition {{ Request::is('admin/dataProdi') ? 'bg-cyan-700 text-white font-semibold' : '' }}">Data Prodi</a>
            </li>
            <li>
              <a href="/admin/dataMatkul" class="block py-2 px-4 hover:bg-gray-800 transition {{ Request::is('admin/dataMatkul') ? 'bg-cyan-700 text-white font-semibold' : '' }}">Data Matkul</a>
            </li>
            <li>
              <a href="/admin/dataKelas" class="block py-2 px-4 hover:bg-gray-800 transition {{ Request::is('admin/dataKelas') ? 'bg-cyan-700 text-white font-semibold' : '' }}">Data Kelas</a>
            </li>
            <li>
              <a href="/admin/dataKRS" class="block py-2 px-4 hover:bg-gray-800 transition {{ Request::is('admin/dataKRS') ? 'bg-cyan-700 text-white font-semibold' : '' }}">Data KRS</a>
            </li>
          </ul>
        </li>
      </ul>

      <div class="mt-auto">
        <li class="mt-6 pt-4 border-t border-gray-600 text-red-400 list-none">
          <a href="#" onclick="confirmLogout()" class="block py-2 px-3 rounded hover:bg-red-600 hover:text-white transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7-7 7M5 13h13"></path>
            </svg>
            Log Out
          </a>
        </li>
      </div>
    </aside>

    <!-- Main content -->
    <div class="flex-1 ml-64 transition-all duration-300">
      <!-- Navbar -->
      <nav class="bg-cyan-700 text-white px-6 py-4 flex justify-between items-center shadow-md sticky top-0 z-10">
        <div class="flex items-center space-x-4">
          <span id="toggleSidebar" class="text-2xl cursor-pointer">&#9776;</span>
          <h1 class="text-lg font-bold tracking-wide">Sistem Manajemen KRS Online</h1>
        </div>
        <div class="flex items-center space-x-3">
          <img src="{{ asset('image/admin.png') }}" alt="Admin" class="h-9 w-9 rounded-full border-2 border-white">
          <span class="font-medium">Admin</span>
        </div>
      </nav>

      <!-- Content -->
      <main class="p-6">
        <!-- Header -->
        <div class="bg-cyan-800 text-white text-center py-4 rounded shadow-md">
          <h2 class="text-2xl font-semibold">DATA PRODI POLITEKNIK NEGERI CILACAP</h2>
        </div>

        <!-- Card -->
        <div class="mt-6 bg-white p-6 rounded-lg shadow-md max-w-5xl mx-auto">
          <div class="flex justify-between items-center mb-4">
            <a href="/admin/tambahProdi" class="bg-green-700 hover:bg-green-600 text-white px-4 py-2 rounded transition">Tambah</a>
            <input type="text" id="searchInput" placeholder="Cari Prodi..." class="border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-cyan-400">
          </div>

          <div class="overflow-x-auto">
            <table id="prodiTable" class="min-w-full border border-gray-300 text-sm text-center">
                <thead class="bg-gray-200 text-gray-700">
                <tr>
                  <th class="border px-4 py-2">Kode Prodi</th>
                  <th class="border px-4 py-2">Nama Prodi</th>
                  <th class="border px-4 py-2">Aksi</th>
                </tr>
              </thead>

              <script>
                document.getElementById("searchInput").addEventListener("keyup", function () {
                  const searchTerm = this.value.toLowerCase();
                  const rows = document.querySelectorAll("#prodiTable tbody tr");
              
                  rows.forEach(row => {
                    const rowText = row.innerText.toLowerCase();
                    row.style.display = rowText.includes(searchTerm) ? "" : "none";
                  });
                });
              </script>

              <tbody>
                @foreach ($prodi as $p)
                <tr class="hover:bg-gray-50">
                  <td class="border px-4 py-2">{{ $p['kode_prodi'] }}</td>
                  <td class="border px-4 py-2">{{ $p['nama_prodi'] }}</td>
                  <td class="border px-4 py-2">
                    <a href="/admin/editProdi/{{ $p['kode_prodi'] }}" class="text-gray-500 border border-transparent hover:border-blue-600 hover:text-blue-600 hover:scale-110 transition duration-200 ease-in-out">
                      ✏</a>
                    <a href="/admin/deleteProdi/{{ $p['kode_prodi'] }}" onclick="return confirm('Yakin ingin menghapus prodi ini?');" class="text-gray-500 border border-transparent hover:border-red-600 hover:text-red-600 hover:scale-110 transition duration-200 ease-in-out"
                    onclick="return confirm('Apakah Anda yakin ingin menghapus matkul ini?');">🗑️</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </main>
    </div>
  </div>
</body>
</html>
