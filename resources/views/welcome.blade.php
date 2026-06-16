<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sewa Studio - Pintu Masuk</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-[#0b0f19] text-slate-100 min-h-screen flex flex-col justify-between relative overflow-hidden">

    <div class="absolute top-[-20%] left-[-10%] w-[500px] h-[500px] bg-indigo-600/10 rounded-full blur-[120px] pointer-events-none"></div>
    <div class="absolute bottom-[-20%] right-[-10%] w-[500px] h-[500px] bg-violet-600/10 rounded-full blur-[120px] pointer-events-none"></div>

    <main class="flex-grow flex items-center justify-center p-6 relative z-10">
        <div class="bg-[#111827]/60 backdrop-blur-xl border border-slate-800/80 rounded-[32px] shadow-[0_25px_70px_-15px_rgba(0,0,0,0.7)] p-8 max-w-md w-full text-center space-y-7 ring-1 ring-white/5">
            
            <div class="mx-auto w-16 h-16 bg-gradient-to-tr from-indigo-600 to-violet-500 rounded-2xl flex items-center justify-center text-white shadow-xl shadow-indigo-500/20 ring-4 ring-indigo-500/10">
                <i class="fa-solid fa-sliders text-2xl animate-pulse"></i>
            </div>

            <div class="space-y-1.5">
                <h1 class="text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-white via-slate-200 to-slate-400 tracking-tight">
                    Studio Flow
                </h1>
                <p class="text-[10px] text-indigo-400 font-bold uppercase tracking-widest">
                    Portal Ekosistem Sewa & Inspeksi
                </p>
            </div>

            <div class="p-4 bg-amber-500/5 border border-amber-500/20 rounded-2xl text-left flex items-start space-x-3 backdrop-blur-sm">
                <div class="p-1 bg-amber-500/10 rounded-lg mt-0.5">
                    <i class="fa-solid fa-lightbulb text-amber-400 text-xs block"></i>
                </div>
                <p class="text-[11px] text-amber-200/80 leading-relaxed font-medium">
                    Silakan pilih gerbang otentikasi di bawah ini untuk mensimulasikan pembatasan hak akses (*Multi-Auth*) di depan dewan penguji.
                </p>
            </div>

            <div class="space-y-3.5 pt-1">
                
                <a href="/login" class="flex items-center justify-between p-4 bg-[#161f30]/40 border border-slate-800/60 hover:border-indigo-500/50 hover:bg-[#161f30]/80 rounded-2xl transition-all duration-300 group shadow-lg text-left block cursor-pointer">
                    <div class="flex items-center space-x-4">
                        <div class="p-3 bg-[#1f293d]/60 border border-slate-700/50 rounded-xl text-slate-400 group-hover:text-indigo-400 group-hover:border-indigo-500/30 transition-all shadow-inner">
                            <i class="fa-solid fa-user-gear text-base group-hover:scale-110 transition-transform"></i>
                        </div>
                        <div>
                            <h4 class="text-xs font-bold text-slate-200 uppercase tracking-wide group-hover:text-indigo-400 transition-colors">Portal Pelanggan</h4>
                            <p class="text-[10px] text-slate-400 font-medium mt-0.5">Eksplorasi studio, cek ketersediaan & histori nota.</p>
                        </div>
                    </div>
                    <div class="w-7 h-7 rounded-full bg-slate-800/50 flex items-center justify-center group-hover:bg-indigo-600/20 transition-all">
                        <i class="fa-solid fa-chevron-right text-[10px] text-slate-500 group-hover:text-indigo-400 transition-transform group-hover:translate-x-0.5"></i>
                    </div>
                </a>

                <a href="/login" class="flex items-center justify-between p-4 bg-[#161f30]/40 border border-slate-800/60 hover:border-violet-500/50 hover:bg-[#161f30]/80 rounded-2xl transition-all duration-300 group shadow-lg text-left block cursor-pointer">
                    <div class="flex items-center space-x-4">
                        <div class="p-3 bg-[#1f293d]/60 border border-slate-700/50 rounded-xl text-slate-400 group-hover:text-violet-400 group-hover:border-violet-500/30 transition-all shadow-inner">
                            <i class="fa-solid fa-user-shield text-base group-hover:scale-110 transition-transform"></i>
                        </div>
                        <div>
                            <h4 class="text-xs font-bold text-slate-200 uppercase tracking-wide group-hover:text-violet-400 transition-colors">Portal Manajemen Admin</h4>
                            <p class="text-[10px] text-slate-400 font-medium mt-0.5">Kendali penuh aset, regulasi denda QC & finansial.</p>
                        </div>
                    </div>
                    <div class="w-7 h-7 rounded-full bg-slate-800/50 flex items-center justify-center group-hover:bg-violet-600/20 transition-all">
                        <i class="fa-solid fa-chevron-right text-[10px] text-slate-500 group-hover:text-violet-400 transition-transform group-hover:translate-x-0.5"></i>
                    </div>
                </a>

            </div>
        </div>
    </main>

    <footer class="w-full text-center py-5 text-[10px] text-slate-600 font-semibold tracking-widest relative z-10 uppercase">
        &copy; 2026 <span class="text-slate-400 font-bold">Studio Flow</span> &bull; <span class="text-indigo-500/80">Premium Cyber Theme Active</span>
    </footer>

</body>
</html>