<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Welcome - Sistem KRS</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        /* Animasi fade-in slide-up */
        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Animasi fadeInUp untuk grup */
        .fade-in-group {
            animation: fadeInUp 1s ease-out both;
        }

        /* Animasi gradient background bergerak */
        @keyframes gradientBG {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }

        /* Pulse efek lembut */
        .pulse-glow {
            animation: pulseGlow 2.5s infinite;
        }
        @keyframes pulseGlow {
            0%, 100% {
                box-shadow: 0 0 6px 0 rgba(6, 182, 212, 0.6);
            }
            50% {
                box-shadow: 0 0 20px 6px rgba(6, 182, 212, 0.3);
            }
        }
    </style>
</head>
    <body
        class="h-screen flex flex-col items-center justify-center bg-gradient-to-r from-cyan-950 via-gray-900 to-indigo-950 bg-[length:400%_400%] animate-gradientBG"
    >

        <!-- Header dengan Logo dan Text -->
        <div
            class="w-full max-w-6xl bg-cyan-300 py-4 flex items-center justify-center shadow-xl rounded-lg border border-cyan-400 animate-fadeInUp fade-in-group pulse-glow"
            style="animation-duration: 1s;">
            <img
                src="{{ asset('image/krs.png') }}"
                alt="Logo SiKRS"
                class="h-14 mr-2 drop-shadow-md"
            />
            <h2 class="text-2xl font-bold text-gray-800 drop-shadow-sm select-none">SiKRS</h2>
        </div>

        <!-- Selamat Datang -->
        <h1
            class="text-3xl font-bold text-white mt-10 mb-9 animate-fadeInUp fade-in-group"
            style="animation-delay: 0.3s; animation-duration: 1s;"
        >
            Selamat Datang di Sistem Manajemen KRS Online
        </h1>

        <!-- Box Pilihan Login -->
        <div
            class="bg-blue-100 p-8 rounded-2xl shadow-2xl w-[500px] text-center animate-fadeInUp fade-in-group"
            style="animation-delay: 0.6s; animation-duration: 1s;"
        >
            <p class="text-gray-700 text-lg font-medium mb-6 select-none">Silakan pilih role login</p>

            <!-- Box Pilihan -->
            <div class="grid grid-cols-2 gap-6">
                <a
                    href="{{ route('admin.login') }}"
                    class="block bg-blue-600 text-white px-6 py-6 rounded-xl text-lg font-semibold shadow-lg hover:shadow-2xl hover:bg-blue-800 transform hover:scale-110 transition duration-300 ease-in-out select-none"
                >
                    <span class="block text-4xl mb-1 animate-pulse">👨‍💼</span>
                    Admin
                </a>
                <a
                    href="{{ route('mahasiswa.login') }}"
                    class="block bg-green-600 text-white px-6 py-6 rounded-xl text-lg font-semibold shadow-lg hover:shadow-2xl hover:bg-green-800 transform hover:scale-110 transition duration-300 ease-in-out select-none"
                >
                    <span class="block text-4xl mb-1 animate-pulse">🎓</span>
                    Mahasiswa
                </a>
            </div>
        </div>
    </body>
</html>
