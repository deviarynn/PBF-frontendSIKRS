<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Welcome - Sistem KRS</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        @keyframes fadeInUp {
            0% { opacity: 0; transform: translateY(20px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        .fade-in-group {
            animation: fadeInUp 1s ease-out both;
        }

        @keyframes gradientBG {
        0% { background-position: 0% 50%, center; }
        50% { background-position: 100% 50%, center; }
        100% { background-position: 0% 50%, center; }
        }


        .pulse-glow {
            animation: pulseGlow 2.5s infinite;
        }

        @keyframes pulseGlow {
            0%, 100% { box-shadow: 0 0 6px 0 rgba(6, 182, 212, 0.6); }
            50% { box-shadow: 0 0 20px 6px rgba(2, 104, 125, 0.95); }
        }
    </style>
</head>
    <body style="
    height: 100vh;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    background: linear-gradient(to right, #083344, #0a191b),
              url('/image/gkb.png') no-repeat center center fixed;
    background-size: 400% 400%, contain;
    font-family: 'Poppins', sans-serif;
    animation: gradientBG 10s ease infinite;
">


    <!-- Header -->
    <div class="w-full max-w-6xl bg-cyan-300 py-4 flex items-center justify-center shadow-xl rounded-lg border border-cyan-400 animate-fadeInUp fade-in-group pulse-glow">
        <img src="{{ asset('image/krs.png') }}" alt="Logo SiKRS" class="h-14 mr-2 drop-shadow-md" />
        <h2 class="text-2xl font-bold text-gray-800 drop-shadow-sm select-none">SiKRS</h2>
    </div>

    <!-- Judul -->
    <h1 class="text-3xl font-bold text-white mt-10 mb-9 animate-fadeInUp fade-in-group"
        style="animation-delay: 0.3s; animation-duration: 1s;">
        Selamat Datang di Sistem Manajemen KRS Online
    </h1>

    <!-- Box Login Info -->
    <div class="bg-white bg-opacity-90 backdrop-blur-md p-10 rounded-3xl shadow-xl w-[500px] text-center animate-fadeInUp fade-in-group"
     style="animation-delay: 0.6s; animation-duration: 1s;">
    <p class="text-gray-600 text-l font-semibold mb-8 tracking-wide select-none">
        Sistem Pengelolaan KRS Digital berbasis website
    </p>

    <a href="{{ route('login') }}"
       class="inline-block bg-cyan-600 text-white px-6 py-4 rounded-xl font-semibold text-lg shadow-lg hover:bg-cyan-800 transition duration-300">
        Login ke sistem
    </a>
</div>

</body>
</html>
