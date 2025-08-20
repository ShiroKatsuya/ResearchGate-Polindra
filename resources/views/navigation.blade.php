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
               {{ request()->routeIs('publikasi.index') ? 'ring-2 ring-blue-500 shadow-lg scale-105 from-blue-100 to-indigo-100' : '' }}"
               data-tooltip="Kelola publikasi penelitian">
                <div class="relative z-10">
                    <div class="mx-auto mb-3 w-12 h-12 rounded-lg bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                        <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 20h9M12 4v16m0 0H3m9-16a2 2 0 012 2v12a2 2 0 01-2 2" />
                        </svg>
                    </div>
                    <h3 class="font-semibold text-gray-800 group-hover:text-blue-700 transition-colors duration-300">Publikasi</h3>
                    <p class="text-xs text-gray-500 mt-1 group-hover:text-blue-600 transition-colors duration-300">Riset & Karya</p>
                </div>
                <div class="absolute inset-0 bg-gradient-to-br from-blue-500/5 to-indigo-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            </a>

            <!-- Proyek -->
            <a href="{{ route('research.projects') }}" 
               class="group relative overflow-hidden rounded-xl bg-gradient-to-br from-emerald-50 to-teal-50 p-4 text-center transition-all duration-300 hover:shadow-lg hover:scale-105 hover:from-emerald-100 hover:to-teal-100 border border-emerald-200/50 hover:border-emerald-300
               {{ request()->routeIs('research.projects') ? 'ring-2 ring-emerald-500 shadow-lg scale-105 from-emerald-100 to-teal-100' : '' }}"
               data-tooltip="Kelola proyek penelitian">
                <div class="relative z-10">
                    <div class="mx-auto mb-3 w-12 h-12 rounded-lg bg-gradient-to-br from-emerald-500 to-teal-600 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                        <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V7" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 3v4M8 3v4M4 11h16" />
                        </svg>
                    </div>
                    <h3 class="font-semibold text-gray-800 group-hover:text-emerald-700 transition-colors duration-300">Proyek</h3>
                    <p class="text-xs text-gray-500 mt-1 group-hover:text-emerald-600 transition-colors duration-300">Penelitian</p>
                </div>
                <div class="absolute inset-0 bg-gradient-to-br from-emerald-500/5 to-teal-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            </a>

            <!-- Penelitian -->
            <a href="{{ route('research.publications') }}" 
               class="group relative overflow-hidden rounded-xl bg-gradient-to-br from-purple-50 to-violet-50 p-4 text-center transition-all duration-300 hover:shadow-lg hover:scale-105 hover:from-purple-100 hover:to-violet-100 border border-purple-200/50 hover:border-purple-300
               {{ request()->routeIs('research.publications') ? 'ring-2 ring-purple-500 shadow-lg scale-105 from-purple-100 to-violet-100' : '' }}"
               data-tooltip="Kelola publikasi penelitian">
                <div class="relative z-10">
                    <div class="mx-auto mb-3 w-12 h-12 rounded-lg bg-gradient-to-br from-purple-500 to-violet-600 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                        <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 20h9" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m0 0H3m9-16a2 2 0 012 2v12a2 2 0 01-2 2" />
                        </svg>
                    </div>
                    <h3 class="font-semibold text-gray-800 group-hover:text-purple-700 transition-colors duration-300">Penelitian</h3>
                    <p class="text-xs text-gray-500 mt-1 group-hover:text-purple-600 transition-colors duration-300">Publikasi</p>
                </div>
                <div class="absolute inset-0 bg-gradient-to-br from-purple-500/5 to-violet-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            </a>

            <!-- Software -->
            <a href="{{ route('research.software') }}" 
               class="group relative overflow-hidden rounded-xl bg-gradient-to-br from-orange-50 to-red-50 p-4 text-center transition-all duration-300 hover:shadow-lg hover:scale-105 hover:from-orange-100 hover:to-red-100 border border-orange-200/50 hover:border-orange-300
               {{ request()->routeIs('research.software') ? 'ring-2 ring-orange-500 shadow-lg scale-105 from-orange-100 to-red-100' : '' }}"
               data-tooltip="Kelola perangkat lunak">
                <div class="relative z-10">
                    <div class="mx-auto mb-3 w-12 h-12 rounded-lg bg-gradient-to-br from-orange-500 to-red-600 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                        <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <rect x="4" y="4" width="16" height="16" rx="2" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 8h8v8H8z" />
                        </svg>
                    </div>
                    <h3 class="font-semibold text-gray-800 group-hover:text-orange-700 transition-colors duration-300">Software</h3>
                    <p class="text-xs text-gray-500 mt-1 group-hover:text-orange-600 transition-colors duration-300">Aplikasi</p>
                </div>
                <div class="absolute inset-0 bg-gradient-to-br from-orange-500/5 to-red-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            </a>

            <!-- Berita -->
            <a href="{{ route('news.index') }}" 
               class="group relative overflow-hidden rounded-xl bg-gradient-to-br from-pink-50 to-rose-50 p-4 text-center transition-all duration-300 hover:shadow-lg hover:scale-105 hover:from-pink-100 hover:to-rose-100 border border-pink-200/50 hover:border-pink-300
               {{ request()->routeIs('news.index') ? 'ring-2 ring-pink-500 shadow-lg scale-105 from-pink-100 to-rose-100' : '' }}"
               data-tooltip="Kelola berita dan pengumuman">
                <div class="relative z-10">
                    <div class="mx-auto mb-3 w-12 h-12 rounded-lg bg-gradient-to-br from-pink-500 to-rose-600 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
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
        </nav>

        <!-- Quick Stats -->
        <div class="mt-6 pt-6 border-t border-gray-200/50">
            <div class="grid grid-cols-3 gap-4 text-center">
                <div class="group cursor-pointer">
                    <div class="text-2xl font-bold text-blue-600 group-hover:text-blue-700 transition-colors duration-300">{{ $publikasis->total() ?? 0 }}</div>
                    <div class="text-xs text-gray-500 group-hover:text-gray-600 transition-colors duration-300">Total Publikasi</div>
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