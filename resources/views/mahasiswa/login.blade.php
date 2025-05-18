<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>SiKRS - Login</title>
  <script src="https://cdn.tailwindcss.com"></script>

  <style>
    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

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

    .animate-fadeInUp {
      animation: fadeInUp 1s ease forwards;
    }

    .animate-gradientBG {
      animation: gradientBG 15s ease infinite;
    }
  </style>
</head>
<body class="h-screen flex flex-col items-center justify-center bg-gradient-to-r from-cyan-900 via-cyan-950 to-indigo-950 bg-[length:400%_400%] animate-gradientBG">

  <div class="bg-blue-100 p-8 rounded-2xl shadow-2xl w-96 animate-fadeInUp">
    <!-- Logo -->
    <div class="text-center mb-6 flex items-center justify-center">
      <img src="{{ asset('image/krs.png') }}" alt="Logo SiKRS" class="h-14 mr-2 animate-pulse drop-shadow-md">
      <h2 class="text-2xl font-bold text-gray-800 tracking-wide">SiKRS</h2>
    </div>

    @if(session('error'))
    <div class="mb-4 p-3 text-red-800 bg-red-100 border border-red-400 rounded-lg text-sm font-medium animate-fadeInUp">
        {{ session('error') }}
    </div>
    @endif

    <!-- Form Login -->
    <form action="{{ route('mahasiswa.login') }}" method="POST" class="space-y-5">
      @csrf
      <div>
        <label class="block font-semibold text-gray-700 mb-1">Username</label>
        <input
          type="text"
          name="username"
          placeholder="masukkan username..."
          class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200"
        />
      </div>

      <div>
        <label class="block font-semibold text-gray-700 mb-1">Password</label>
        <input
          type="password"
          name="password"
          placeholder="***"
          class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200"
        />
      </div>

      <div class="pt-2">
        <button
          type="submit"
          class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold shadow-md hover:bg-blue-800 hover:shadow-xl transform hover:scale-105 transition duration-300 ease-in-out"
        >
          LOGIN
        </button>
      </div>
    </form>
  </div>

</body>
</html>
