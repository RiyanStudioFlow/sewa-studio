<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Rental Studio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-indigo-950 font-sans min-h-screen flex items-center justify-center p-4">

    <!-- KARTU LOGIN UTAMA WARNA BIRU/PUTIH -->
    <div class="bg-white rounded-3xl shadow-2xl p-8 max-w-md w-full text-center space-y-6 border border-slate-100">
        
        <!-- Icon Header -->
        <div class="mx-auto w-14 h-14 bg-indigo-600 rounded-2xl flex items-center justify-center text-white shadow-lg shadow-indigo-200">
            <i class="fa-solid fa-user-shield text-xl"></i>
        </div>

        <!-- Judul Halaman -->
        <div>
            <h1 class="text-2xl font-extrabold text-slate-800 tracking-tight">Login Admin</h1>
            <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest mt-1">Sistem Manajemen Rental & Inspeksi Studio</p>
        </div>

        <!-- Notifikasi Error (Jika salah password) -->
        @if ($errors->any())
            <div class="p-3 bg-red-50 border border-red-200 text-red-600 rounded-xl text-left text-xs font-semibold flex items-center space-x-2">
                <i class="fa-solid fa-circle-exclamation text-sm"></i>
                <span>Email / Username atau password salah!</span>
            </div>
        @endif

        <!-- FORM LOGIN -->
        <form method="POST" action="/login-admin" autocomplete="off" class="space-y-4 text-left">
            @csrf

            <!-- Kolom Email -->
            <div>
                <label class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider mb-1.5">Email / Username Admin</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-slate-400">
                        <i class="fa-solid fa-envelope text-xs"></i>
                    </span>
                    <input type="email" name="email" value="{{ old('email', 'admin@gmail.com') }}" required placeholder="Masukkan email admin"
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl py-3 pl-10 pr-4 text-xs font-medium text-slate-700 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all">
                </div>
            </div>

            <!-- Kolom Password -->
            <div>
                <label class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider mb-1.5">Password</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-slate-400">
                        <i class="fa-solid fa-lock text-xs"></i>
                    </span>
                    <input type="password" name="password" required placeholder="••••••••"
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl py-3 pl-10 pr-4 text-xs font-medium text-slate-700 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all">
                </div>
            </div>

            <!-- Tombol Sign In -->
            <button type="submit" class="w-full py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-bold text-xs rounded-xl uppercase tracking-widest transition-all shadow-lg shadow-indigo-200 pt-3.5 cursor-pointer">
                Sign In Admin
            </button>
        </form>

        <!-- KOTAK PETUNJUK AKUN DEMO PENGUJI (DOSEN) -->
        <div class="p-4 bg-amber-50 border border-amber-200/70 rounded-2xl text-left space-y-1">
            <span class="text-[10px] font-black text-amber-700 uppercase tracking-wider flex items-center mb-1">
                <i class="fa-solid fa-lock text-xs mr-1.5"></i> Akun Demo Penguji:
            </span>
            <p class="text-xs text-slate-600 font-medium">Username: <span class="font-bold text-slate-800">admin@gmail.com</span></p>
            <p class="text-xs text-slate-600 font-medium">Password: <span class="font-bold text-slate-800">password</span></p>
        </div>

    </div>

</body>
</html>