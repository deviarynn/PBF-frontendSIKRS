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

        function simpanKRS(event) {
            event.preventDefault(); // Mencegah reload halaman

            let nama = document.getElementById("nama").value;
            let npm = document.getElementById("npm").value;
            let kelas = document.getElementById("kelas").value;
            let prodi = document.getElementById("prodi").value;
            let matkul = document.getElementById("matkul").value;
            let sks = document.getElementById("sks").value;
            let semester = document.getElementById("semester").value;

            if (!nama || !npm || !kelas || !prodi || !matkul || !sks || !semester) {
                alert("Harap isi semua kolom!");
                return;
            }

            // Simpan data ke sessionStorage
            let krsRow = `
                <tr class="text-center">
                    <td class="border p-2">1</td>
                    <td class="border p-2">${nama}</td>
                    <td class="border p-2">${npm}</td>
                    <td class="border p-2">${kelas}</td>
                    <td class="border p-2">${prodi}</td>
                    <td class="border p-2">${matkul}</td>
                    <td class="border p-2">${sks}</td>
                    <td class="border p-2">${semester}</td>
                    <td class="border p-2">
                        <a href="#" class="text-blue-500">✏</a>
                    </td>
                </tr>
            `;
            sessionStorage.setItem("krs", krsRow);

            // Arahkan kembali ke halaman data KRS
            window.location.href = "/mahasiswa/dataKRS";
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
                <li class="py-2"><a href="/mahasiswa/dashboard " class="block">Dashboard</a></li>
                <li class="py-2 relative">
                    <button id="menuButton" onclick="toggleDropdown()" class="block w-full text-left flex justify-between items-center">Menu <span>▼</span></button>                    
                    <ul id="dropdownMenu" class="hidden bg-gray-600 mt-2 rounded" onclick="keepDropdownOpen(event)">
                        <li class="py-2 px-4 hover:bg-gray-500"><a href="/mahasiswa/dataMatkul">Data Matkul</a></li>
                        <li id="menuKRS" class="py-2 px-4 hover:bg-gray-500">
                            <a href="/mahasiswa/dataKRS" onclick="openDataKRS()">Data KRS</a>
                        </li>
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
                    <img src="{{ asset('image/mhs.png') }}" alt="👨‍💼" class="h-8 w-8 rounded-full">
                    <span>Mahasiswa</span>
                </div>
            </nav>

            <main class="flex-1 p-6">
                <div class="flex justify-center items-center h-full">
                    <div class="bg-gray-900 text-white w-96 rounded-lg shadow-lg p-6">
                        <h2 class="text-lg font-bold text-center">Input KRS</h2>
                        <form onsubmit="simpanKRS(event)" class="bg-white p-4 rounded-lg mt-4 text-black">
                            <label for="nama" class="block text-black font-semibold">Nama</label>
                            <input id="nama" type="text" class="w-full border border-gray-400 rounded p-2 mt-1">
            
                            <label for="npm" class="text-black font-semibold">NPM</label>
                            <input id="npm" type="text" class="w-full border border-gray-400 rounded p-2 mt-1">
            
                            <label for="kelas" class="block text-black font-semibold">Kelas</label>
                            <input id="kelas" type="text" class="w-full border border-gray-400 rounded p-2 mt-1">
            
                            <label for="prodi" class="block text-black font-semibold">Prodi</label>
                            <input id="prodi" type="text" class="w-full border border-gray-400 rounded p-2 mt-1">
            
                            <label for="matkul" class="block text-black font-semibold">Matkul</label>
                            <input id="matkul" type="text" class="w-full border border-gray-400 rounded p-2 mt-1">
            
                            <label for="sks" class="block text-black font-semibold">SKS</label>
                            <input id="sks" type="number" class="w-full border border-gray-400 rounded p-2 mt-1">
            
                            <label for="semester" class="block text-black font-semibold">Semester</label>
                            <input id="semester" type="number" class="w-full border border-gray-400 rounded p-2 mt-1">
            
                            <button type="submit" class="bg-green-700 text-white py-2 px-4 rounded-lg mt-4 w-full">Simpan</button>
                        </form>
                    </div>
                </div>
                <div class="absolute left-100 bottom-0 ml-4 mb-4">
                    <a href="/mahasiswa/dataKRS" class="bg-yellow-700 text-white py-2 px-4 rounded-lg block text-center">Back</a>
                </div>
            </main>
            </div>
        </div>
    </body>
    </html>
    