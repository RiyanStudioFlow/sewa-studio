<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LensFlow Studio - Masuk</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-indigo-950 font-sans min-h-screen flex items-center justify-center p-4 text-slate-800">

    <div class="bg-white border border-slate-100 rounded-3xl shadow-2xl p-8 max-w-md w-full text-center space-y-6">
        
        <div class="mx-auto w-14 h-14 bg-indigo-600 rounded-2xl flex items-center justify-center text-white shadow-lg shadow-indigo-200">
            <i class="fa-solid fa-camera-retro text-xl"></i>
        </div>

        <div>
            <h1 class="text-2xl font-extrabold text-slate-800 tracking-tight">LensFlow Studio</h1>
            <p class="text-[11px] text-slate-400 font-medium mt-1">Silakan masuk untuk akses booking & sewa alat</p>
        </div>

        @if ($errors->any())
            <div class="p-3 bg-red-50 border border-red-200 text-red-600 rounded-xl text-left text-xs font-semibold">
                <i class="fa-solid fa-circle-exclamation mr-1"></i> Email atau password salah!
            </div>
        @endif

        <form method="POST" action="/login" autocomplete="off" class="space-y-4 text-left">
            @csrf

            <div>
                <label class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider mb-1.5">Alamat Email</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-slate-400">
                        <i class="fa-solid fa-envelope text-xs"></i>
                    </span>
                    <input type="email" name="email" value="{{ old('email', 'admin123@gmail.com') }}" required placeholder="masukkan email anda"
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl py-3 pl-10 pr-4 text-xs font-medium text-slate-700 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all">
                </div>
            </div>

            <div>
                <div class="flex justify-between items-center mb-1.5">
                    <label class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider">Password</label>
                    <a href="#" class="text-[11px] font-bold text-indigo-600 hover:text-indigo-700 transition-colors">Lupa?</a>
                </div>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-slate-400">
                        <i class="fa-solid fa-lock text-xs"></i>
                    </span>
                    <input type="password" name="password" required placeholder="••••••••"
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl py-3 pl-10 pr-4 text-xs font-medium text-slate-700 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all">
                </div>
            </div>

            <div class="flex items-center space-x-2 pt-1">
                <input type="checkbox" name="remember" id="remember" class="w-3.5 h-3.5 rounded bg-slate-50 border-slate-300 text-indigo-600 focus:ring-0 focus:ring-offset-0 cursor-pointer">
                <label for="remember" class="text-[11px] text-slate-500 font-semibold cursor-pointer select-none">Ingat perangkat ini</label>
            </div>

            <button type="submit" class="w-full py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-bold text-xs rounded-xl uppercase tracking-widest transition-all shadow-lg shadow-indigo-200 pt-3.5 cursor-pointer">
                Masuk Sistem
            </button>
        </form>

        <div class="pt-3 border-t border-slate-100 text-center">
            <p class="text-[11px] text-slate-400 font-semibold">
                Belum punya akun? <a href="/register" class="text-indigo-600 hover:text-indigo-700 font-bold underline transition-colors ml-0.5">Daftar di sini</a>
            </p>
        </div>

    </div>

</body>
</html>