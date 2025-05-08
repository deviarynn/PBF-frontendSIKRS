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
                  <li class="py-2 relative">
                    <button id="menuButton" onclick="toggleDropdown()" class="flex items-center space-x-2 w-full text-left py-2 px-3 rounded hover:bg-cyan-600 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M4 6h16M4 12h16M4 18h7"></path>
                        </svg>
                        <span>Menu</span>
                        <svg id="dropdownIcon" class="w-4 h-4 ml-auto transform transition-transform duration-200" fill="currentColor" viewBox="0 0 20 20">
                            <path fill="currentColor" d="M5.23 7.21a.75.75 0 011.06 0L10 10.91l3.71-3.7a.75.75 0 111.06 1.06l-4.24 4.25a.75.75 0 01-1.06 0L5.23 8.27a.75.75 0 010-1.06z"/>
                        </svg>
                    </button>                    
                    <ul id="dropdownMenu" class="hidden bg-gray-600 mt-2 rounded">
                        <li class="py-2 px-4 hover:bg-gray-500"><a href="/admin/dataMhs">Data Mahasiswa</a></li>
                        <li class="py-2 px-4 hover:bg-gray-500"><a href="/admin/dataProdi">Data Prodi</a></li>
                        <li class="py-2 px-4 hover:bg-gray-500"><a href="/admin/dataMatkul">Data Matkul</a></li>
                        <li class="py-2 px-4 hover:bg-gray-500"><a href="/admin/dataKelas">Data Kelas</a></li>
                        <li class="py-2 px-4 hover:bg-gray-500"><a href="/admin/dataKRS">Data KRS</a></li>
                    </ul>
                </li>
                <div class="mt-auto">
                    <li class="mt-6 pt-4 border-t border-gray-600 text-red-400 list-none">
                      <a href="#" onclick="confirmLogout()" class="block py-2 px-3 rounded hover:bg-red-600 hover:text-white transition">
                        <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path d="M14 5l7 7-7 7M5 13h13"></path>
                        </svg> Log Out
                      </a>
                    </li>
                  </div>
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
            <nav class="bg-cyan-700 text-white px-6 py-4 flex justify-between items-center shadow-md">
              <h1 class="text-lg font-semibold">Sistem Manajemen KRS Online</h1>
              <div class="flex items-center space-x-3">
                <img src="{{ asset('image/admin.png') }}" class="h-8 w-8 rounded-full" alt="Admin">
                <span>Admin</span>
              </div>
            </nav>

            <main class="p-6">
                <div class="bg-cyan-800 text-white p-3 text-center rounded mb-4  shadow-md w-full">
                    <h2 class="text-2xl font-bold">SELAMAT DATANG, ADMIN !</h2>
                  </div>
          
                  <div class="bg-white p-6 rounded shadow-lg max-w-4xl mx-auto overflow-x-auto">
                    <div class="flex justify-between items-center mb-4">
                      <input id="searchInput" onkeyup="searchTable()" type="text" placeholder="Cari kelas..." class="border p-2 rounded w-1/2">
                    </div>
                <!-- Selamat Datang Admin -->
                <hr><br>
                <div class="flex justify-center items-center h-full">
                    <div class="grid grid-cols-3 gap-6">
                        <!-- Data Mahasiswa -->
                        <div class="bg-white w-48 h-32 p-4 shadow-md rounded flex flex-col justify-center items-center">
                            <p class="font-semibold">Data Mahasiswa</p>
                            <p class="text-3xl mb-1">🎓</p>
                            <p class="text-gray-500">{{ $jumlahMahasiswa }}</p>
                        </div>
    
                        <!-- Data Matkul -->
                        <div class="bg-white w-48 h-32 p-4 shadow-md rounded flex flex-col justify-center items-center">
                            <p class="font-semibold">Data Matkul</p>
                            <p class="text-3xl mb-1">📚</p>
                            <p class="text-gray-500">{{ $jumlahMatkul }}</p>
                        </div>
                
                        <!-- Data Prodi -->
                        <div class="bg-white w-48 h-32 p-4 shadow-md rounded flex flex-col justify-center items-center">
                            <p class="font-semibold">Data Prodi</p>
                            <p class="text-3xl mb-1">🏫</p>
                            <p class="text-gray-500">{{ $jumlahProdi }}</p>
                        </div>
                
                        <!-- Data Kelas -->
                        <div class="bg-white w-48 h-32 p-4 shadow-md rounded flex flex-col justify-center items-center">
                            <p class="font-semibold">Data Kelas</p>
                            <p class="text-3xl mb-1">🏠</p>
                            <p class="text-gray-500">{{ $jumlahKelas }}</p>
                        </div>
                
                        <!-- Data KRS -->
                        <div class="bg-white w-48 h-32 p-4 shadow-md rounded flex flex-col justify-center items-center">
                            <p class="font-semibold">Data KRS</p>
                            <p class="text-3xl mb-1">📝</p>
                            <p class="text-gray-500">{{ $jumlahKrs }}</p>
                        </div>
                    </div>
                </div>                
            </main>
        </div>
    </div>
</body>
</html>
