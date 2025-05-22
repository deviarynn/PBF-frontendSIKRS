<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SiKRS - Edit Data Matkul</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
<body class="bg-gray-300 text-gray-800">
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
          <li><a href="/admin/dataMhs" class="block py-2 px-4 hover:bg-gray-800">Data Mahasiswa</a></li>
          <li><a href="/admin/dataProdi" class="block py-2 px-4 hover:bg-gray-800">Data Prodi</a></li>
          <li><a href="/admin/dataMatkul" class="block py-2 px-4 hover:bg-gray-800 bg-cyan-700 text-white font-semibold">Data Matkul</a></li>
          <li><a href="/admin/dataKelas" class="block py-2 px-4 hover:bg-gray-800">Data Kelas</a></li>
          <li><a href="/admin/dataKRS" class="block py-2 px-4 hover:bg-gray-800">Data KRS</a></li>
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

            <main class="flex-1 p-6">
                <div class="flex justify-center items-center h-full">
                    <div class="bg-gray-900 text-white w-96 rounded-lg shadow-lg p-6">
                        <h2 class="text-lg font-bold text-center">Edit Data Matkul</h2>
                        <div class="bg-white p-4 rounded-lg mt-4 text-black">
                            <form action="{{ route('matkul.update', $matkul['kode_matkul']) }}" method="POST">
                              @csrf
                              @method('PUT')
                            
                                    <!-- Tambahkan input hidden untuk kode_matkul -->
                            <input type="hidden" name="kode_matkul_lama" value="{{ $matkul['kode_matkul'] }}">
                            <div class="mb-4">
                                <label for="kode_matkul" class="block font-medium">Kode Matkul</label>
                                <input type="text" name="kode_matkul" value="{{ $matkul['kode_matkul'] }}" class="w-full border rounded p-2" readonly>
                            </div>

                            <div class="mb-4">
                                <label for="nama_matkul" class="block font-medium">Mata Matkul</label>
                                <input type="text" name="nama_matkul" value="{{ $matkul['nama_matkul'] }}" class="w-full border rounded p-2">
                            </div>

                            <div class="mb-4">
                                <label for="sks" class="block font-medium">SKS</label>
                                <input type="text" name="sks" value="{{ $matkul['sks'] }}" class="w-full border rounded p-2">
                            </div>

                            <div class="mb-4">
                                <label for="semester" class="block font-medium">Semester</label>
                                <input type="text" name="semester" value="{{ $matkul['semester'] }}" class="w-full border rounded p-2">
                            </div>

                            <hr><br>
                            <div class="flex justify-between">
                                <a href="/admin/dataMatkul" class="px-4 py-2 bg-red-700 text-white rounded hover:bg-red-900 transition duration-200">Batal</a>
                                <button type="button" id="btnUbah" class="px-4 py-2 bg-blue-700 text-white rounded hover:bg-blue-900 transition duration-200">Ubah</button>
                            </div>
                            </form>
                            <script>
                        document.getElementById("btnUbah").addEventListener("click", function (e) {
                          Swal.fire({
                            title: 'Yakin ingin mengubah?',
                            text: "Perubahan data Matkul akan disimpan.",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#2563eb',  // Tailwind blue-600
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Ya, ubah!',
                            cancelButtonText: 'Batal',
                            width: '350px',
                            customClass: {
                              popup: 'text-sm',
                              title: 'text-base font-semibold',
                              htmlContainer: 'text-sm',
                              confirmButton: 'text-sm px-3 py-1',
                              cancelButton: 'text-sm px-3 py-1'
                            }
                          }).then((result) => {
                            if (result.isConfirmed) {
                              // Submit form secara manual
                              document.querySelector("form").submit();
                            }
                          });
                        });
                      </script>
                      @if(session('success'))
                      <script>
                      document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire({
                          title: 'Berhasil!',
                          text: {!! json_encode(session('success')) !!},
                          icon: 'success',
                          confirmButtonText: 'OK',
                          timer: 2000,
                          width: '350px',
                          showConfirmButton: false,
                          customClass: {
                            popup: 'text-sm',
                            title: 'text-base font-semibold',
                            htmlContainer: 'text-sm',
                            confirmButton: 'text-sm px-3 py-1',
                            cancelButton: 'text-sm px-3 py-1' // ditambahkan agar sama dengan versi hapus
                          }
                        });
                      });
                      </script>
                      @endif
                        </div>
                    </div>
                </div>
            </main>
            </div>
        </div>
    </body>
    </html>