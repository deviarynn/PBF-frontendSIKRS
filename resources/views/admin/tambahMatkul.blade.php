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
            let menuMatkul = document.getElementById("menuMatkul");

            isDropdownOpen = !isDropdownOpen; // Ubah status dropdown

            if (isDropdownOpen) {
                dropdown.classList.remove("hidden");
                dropdown.classList.add("opacity-80", "backdrop-blur-md");
                menuMatkul.classList.add("bg-gray-500", "text-white", "rounded");
            } else {
                dropdown.classList.add("hidden");
                dropdown.classList.remove("opacity-80", "backdrop-blur-md");
                menuMatkul.classList.remove("bg-gray-500", "text-white", "rounded");
            }
        }

        function keepDropdownOpen(event) {
            event.stopPropagation(); // Mencegah dropdown tertutup saat klik di dalamnya
        }

        function openDataMatkul() {
            isDropdownOpen = true; // Pastikan dropdown tetap terbuka
            document.getElementById("dropdownMenu").classList.remove("hidden");
            document.getElementById("dropdownMenu").classList.add("opacity-50", "backdrop-blur-md");

            // Highlight menu "Data Mahasiswa"
            document.getElementById("menuMatkul").classList.add("bg-gray-500", "text-white", "rounded");
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
                        <li id="menuMatkul" class="py-2 px-4 hover:bg-gray-500">
                            <a href="/admin/dataMatkul" onclick="openDataMatkul()">Data Matkul</a>
                        </li>
                        <li class="py-2 px-4 hover:bg-gray-500"><a href="/admin/dataKelas">Data Kelas</a></li>
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

            @if ($errors->any())
                    <div class="pt-3">
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $item)
                                    <li>{{ $item }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                        
                    @endif

            <main class="flex-1 p-6">
                <div class="flex justify-center items-center h-full">
                    <div class="bg-gray-900 text-white w-96 rounded-lg shadow-lg p-6">
                        <h2 class="text-lg font-bold text-center">Tambah Data Matkul</h2>
                        <div class="bg-white p-4 rounded-lg mt-4 text-black">

                            <form action="{{ route('matkul.store') }}" method="POST">
                            @csrf
                            <label for="kode_matkul" class="block font-semibold">Kode Matkul</label>
                            <input type="text" id="kode_matkul" name="kode_matkul" placeholder="" value="{{ Session::get('kode_matkul') }}" class="w-full border border-gray-400 rounded p-2 mt-1">

                            <label for="nama_matkul" class="block font-semibold">Matkul</label>
                            <input type="text" id="nama_matkul" name="nama_matkul" placeholder="" value="{{ Session::get('nama_matkul') }}" class="w-full border border-gray-400 rounded p-2 mt-1">
    
                            <label for="sks" class="block font-semibold">SKS</label>
                            <input type="number" id="sks" name="sks" placeholder="" value="{{ Session::get('sks') }}" class="w-full border border-gray-400 rounded p-2 mt-1">
    
                            <label for="semester" class="block font-semibold">Semester</label>
                            <input type="number" id="semester" name="semester" placeholder="" value="{{ Session::get('semester') }}" class="w-full border border-gray-400 rounded p-2 mt-1">
    
                            <div class="flex justify-center mt-4">
                                <button class="bg-green-700 text-white py-2 px-4 rounded-lg">Simpan</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
                <div class="absolute left-100 bottom-0 ml-4 mb-4">
                    <a href="/admin/dataMatkul" class="bg-yellow-700 text-white py-2 px-4 rounded-lg block text-center">Back</a>
                </div>
            </main>
            </div>
        </div>
    </body>
    </html>
    
