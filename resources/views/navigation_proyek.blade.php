<div id="mainNavContainer" class="mb-8 fixed bottom-0 left-0 transition-transform duration-300 z-40">
    <div id="mainNavPanel" class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg border border-white/20 p-6 transition-all duration-300">
        <div class="flex items-center justify-between mb-6">
            <div class="text-center w-full">
                <h2 class="text-lg font-semibold text-gray-700 mb-2">Navigasi Utama</h2>
                <p class="text-sm text-gray-500">Pilih modul yang ingin Anda kelola</p>
            </div>
            <button id="closeNavBtn" type="button" class="absolute top-4 right-4 text-gray-400 hover:text-gray-700 transition-colors duration-200 rounded-full p-1 focus:outline-none focus:ring-2 focus:ring-blue-400" aria-label="Tutup Navigasi">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        
        <nav class="grid grid-cols-2 md:grid-cols-5 gap-4">
            <!-- Publikasi -->
            <a href="{{ route('publikasi.index') }}" 
               class="group relative overflow-hidden rounded-xl bg-gradient-to-br from-blue-50 to-indigo-50 p-4 text-center transition-all duration-300 hover:shadow-lg hover:scale-105 hover:from-blue-100 hover:to-indigo-100 border border-blue-200/50 hover:border-blue-300
               {{ request()->routeIs('publikasi.index') ? 'order-first ring-2 ring-blue-500 shadow-lg scale-105' : '' }}"
               data-tooltip="Kelola publikasi penelitian">
                <div class="relative z-10">
                    <div class="mx-auto mb-3 w-12 h-12 rounded-lg bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                        <!-- Icon: Book/Document for Publikasi -->
                        <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M7 4h10a2 2 0 012 2v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6a2 2 0 012-2z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 2v4M8 2v4" />
                        </svg>
                    </div>
                    <h3 class="font-semibold text-gray-800 group-hover:text-blue-700 transition-colors duration-300">Publikasi</h3>
                    <p class="text-xs text-gray-500 mt-1 group-hover:text-blue-600 transition-colors duration-300">Riset & Karya</p>
                </div>
                <div class="absolute inset-0 bg-gradient-to-br from-blue-500/5 to-indigo-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            </a>

            <!-- Proyek -->
            <a href="{{ route('proyek.index') }}" 
               class="group relative overflow-hidden rounded-xl bg-gradient-to-br from-emerald-50 to-teal-50 p-4 text-center transition-all duration-300 hover:shadow-lg hover:scale-105 hover:from-emerald-100 hover:to-teal-100 border border-emerald-200/50 hover:border-emerald-300
               {{ request()->routeIs('proyek.index') ? 'order-first ring-2 ring-blue-500 shadow-lg scale-105' : '' }}"
               data-tooltip="Kelola proyek penelitian">
                <div class="relative z-10">
                    <div class="mx-auto mb-3 w-12 h-12 rounded-lg bg-gradient-to-br from-emerald-500 to-teal-600 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                        <!-- Icon: Briefcase for Proyek -->
                        <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <rect x="3" y="7" width="18" height="13" rx="2" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 3v4M8 3v4M3 13h18" />
                        </svg>
                    </div>
                    <h3 class="font-semibold text-gray-800 group-hover:text-emerald-700 transition-colors duration-300">Proyek</h3>
                    <p class="text-xs text-gray-500 mt-1 group-hover:text-emerald-600 transition-colors duration-300">Penelitian</p>
                </div>
                <div class="absolute inset-0 bg-gradient-to-br from-emerald-500/5 to-teal-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            </a>

            <!-- Perangkat Lunak-->
            <a href="{{ route('perangkatlunak.index') }}" 
               class="group relative overflow-hidden rounded-xl bg-gradient-to-br from-purple-50 to-violet-50 p-4 text-center transition-all duration-300 hover:shadow-lg hover:scale-105 hover:from-purple-100 hover:to-violet-100 border border-purple-200/50 hover:border-purple-300
               {{ request()->routeIs('perangkatlunak.index') ? 'order-first ring-2 ring-blue-500 shadow-lg scale-105' : '' }}"
               data-tooltip="Kelola perangkat lunak">
                <div class="relative z-10">
                    <div class="mx-auto mb-3 w-12 h-12 rounded-lg bg-gradient-to-br from-purple-500 to-violet-600 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                        <!-- Icon: Chip/CPU for Perangkat Lunak -->
                        <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <rect x="7" y="7" width="10" height="10" rx="2" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 9v6M21 9v6M9 3h6M9 21h6" />
                        </svg>
                    </div>
                    <h3 class="font-semibold text-gray-800 group-hover:text-purple-700 transition-colors duration-300">Perangkat Lunak</h3>
                    <p class="text-xs text-gray-500 mt-1 group-hover:text-purple-600 transition-colors duration-300">Aplikasi</p>
                </div>
                <div class="absolute inset-0 bg-gradient-to-br from-purple-500/5 to-violet-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            </a>

            <!-- Perkenalan -->
            <a href="{{ route('perkenalan.index') }}" 
               class="group relative overflow-hidden rounded-xl bg-gradient-to-br from-orange-50 to-red-50 p-4 text-center transition-all duration-300 hover:shadow-lg hover:scale-105 hover:from-orange-100 hover:to-red-100 border border-orange-200/50 hover:border-orange-300
               {{ request()->routeIs('perkenalan.index') ? 'order-first ring-2 ring-blue-500 shadow-lg scale-105' : '' }}"
               data-tooltip="Kelola perkenalan">
                <div class="relative z-10">
                    <div class="mx-auto mb-3 w-12 h-12 rounded-lg bg-gradient-to-br from-orange-500 to-red-600 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                        <!-- Icon: User/Group for Perkenalan -->
                        <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87M16 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    <h3 class="font-semibold text-gray-800 group-hover:text-orange-700 transition-colors duration-300">Perkenalan</h3>
                    <p class="text-xs text-gray-500 mt-1 group-hover:text-orange-600 transition-colors duration-300">Penelitian</p>
                </div>
                <div class="absolute inset-0 bg-gradient-to-br from-orange-500/5 to-red-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            </a>

            <!-- Berita -->
            <a href="{{ route('berita.index') }}" 
               class="group relative overflow-hidden rounded-xl bg-gradient-to-br from-pink-50 to-rose-50 p-4 text-center transition-all duration-300 hover:shadow-lg hover:scale-105 hover:from-pink-100 hover:to-rose-100 border border-pink-200/50 hover:border-pink-300
               {{ request()->routeIs('berita.index') ? 'order-first ring-2 ring-blue-500 shadow-lg scale-105' : '' }}"
               data-tooltip="Kelola berita dan pengumuman">
                <div class="relative z-10">
                    <div class="mx-auto mb-3 w-12 h-12 rounded-lg bg-gradient-to-br from-pink-500 to-rose-600 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                        <!-- Icon: Newspaper for Berita -->
                        <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <rect x="3" y="5" width="18" height="14" rx="2" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M7 8h10M7 12h6" />
                        </svg>
                    </div>
                    <h3 class="font-semibold text-gray-800 group-hover:text-pink-700 transition-colors duration-300">Berita</h3>
                    <p class="text-xs text-gray-500 mt-1 group-hover:text-pink-600 transition-colors duration-300">Informasi</p>
                </div>
                <div class="absolute inset-0 bg-gradient-to-br from-pink-500/5 to-rose-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            </a>

            <!-- Mahasiswa -->
            <a href="{{ route('student.index') }}" 
            class="group relative overflow-hidden rounded-xl bg-gradient-to-br from-cyan-50 to-blue-50 p-4 text-center transition-all duration-300 hover:shadow-lg hover:scale-105 hover:from-cyan-100 hover:to-blue-100 border border-cyan-200/50 hover:border-cyan-300
            {{ request()->routeIs('student.index') ? 'order-first ring-2 ring-blue-500 shadow-lg scale-105' : '' }}"
            data-tooltip="Kelola data mahasiswa">
             <div class="relative z-10">
                 <div class="mx-auto mb-3 w-12 h-12 rounded-lg bg-gradient-to-br from-cyan-500 to-blue-600 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                     <!-- Icon: Academic Cap for Mahasiswa -->
                     <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                         <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5z" />
                         <path stroke-linecap="round" stroke-linejoin="round" d="M12 14v7" />
                         <path stroke-linecap="round" stroke-linejoin="round" d="M5 19a7 7 0 0014 0" />
                     </svg>
                 </div>
                 <h3 class="font-semibold text-gray-800 group-hover:text-cyan-700 transition-colors duration-300">Mahasiswa</h3>
                 <p class="text-xs text-gray-500 mt-1 group-hover:text-cyan-600 transition-colors duration-300">Data</p>
             </div>
             <div class="absolute inset-0 bg-gradient-to-br from-cyan-500/5 to-blue-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
         </a>
        </nav>

        <!-- Quick Stats -->
        <div class="mt-6 pt-6 border-t border-gray-200/50">
            <div class="grid grid-cols-3 gap-4 text-center">
                <div class="group cursor-pointer">
                    <div class="text-2xl font-bold text-blue-600 group-hover:text-blue-700 transition-colors duration-300">{{ $proyeks->total() ?? 0 }}</div>
                    <div class="text-xs text-gray-500 group-hover:text-gray-600 transition-colors duration-300">Total Proyek</div>
                </div>
                <div class="group cursor-pointer">
                    <div class="text-2xl font-bold text-emerald-600 group-hover:text-emerald-700 transition-colors duration-300">0</div>
                    <div class="text-xs text-gray-500 group-hover:text-gray-600 transition-colors duration-300">Proyek Aktif</div>
                </div>
                <div class="group cursor-pointer">
                    <div class="text-2xl font-bold text-purple-600 group-hover:text-purple-700 transition-colors duration-300">0</div>
                    <div class="text-xs text-gray-500 group-hover:text-gray-600 transition-colors duration-300">Software</div>
                </div>
            </div>
        </div>
    </div>
    <!-- Show/Hide Button -->
    <button id="showNavBtn" type="button" 
            class="ml-32 inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-medium rounded-lg shadow-lg hover:from-blue-700 hover:to-indigo-700 transform hover:scale-105 transition-all duration-200" 
            style="display:none;">
        <span>Tampilkan Navigasi</span>
    </button>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const navPanel = document.getElementById('mainNavPanel');
    const closeBtn = document.getElementById('closeNavBtn');
    const showBtn = document.getElementById('showNavBtn');

    function hideNavPanel() {
        navPanel.classList.add('opacity-0', 'pointer-events-none', 'translate-y-10');
        setTimeout(() => {
            navPanel.style.display = 'none';
            showBtn.style.display = 'block';
        }, 300);
    }

    function showNavPanel() {
        navPanel.style.display = '';
        setTimeout(() => {
            navPanel.classList.remove('opacity-0', 'pointer-events-none', 'translate-y-10');
        }, 10);
        showBtn.style.display = 'none';
    }

    closeBtn.addEventListener('click', hideNavPanel);
    showBtn.addEventListener('click', showNavPanel);

    navPanel.classList.remove('opacity-0', 'pointer-events-none', 'translate-y-10');

    function autoHideNavOnMobile() {
        if (window.innerWidth <= 768) {
            hideNavPanel();
        } else {
            navPanel.style.display = '';
            navPanel.classList.remove('opacity-0', 'pointer-events-none', 'translate-y-10');
            showBtn.style.display = 'none';
            if (closeBtn) {
                closeBtn.click();
            }
        }
    }

    autoHideNavOnMobile();
    window.addEventListener('resize', autoHideNavOnMobile);
});
</script>