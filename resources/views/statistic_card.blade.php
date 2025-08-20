<div class="reveal-on-scroll rounded-2xl border border-gray-200/60 dark:border-gray-700/60 bg-white/90 dark:bg-gray-800/90 backdrop-blur-sm p-6 shadow-xl h-full flex flex-col relative overflow-hidden transition-all duration-300 hover:shadow-2xl dark:hover:shadow-gray-900/50" role="region" aria-labelledby="stats-title">
                <!-- Background Pattern -->
                <div class="pointer-events-none absolute inset-0 opacity-40 dark:opacity-20">
                    <div class="absolute inset-0" style="background-image: radial-gradient(circle at 1px 1px, rgba(203,213,225,0.6) 1px, transparent 0); background-size: 22px 22px;"></div>
                    <!-- Dark mode pattern overlay -->
                    <div class="absolute inset-0 dark:block hidden" style="background-image: radial-gradient(circle at 1px 1px, rgba(75,85,99,0.4) 1px, transparent 0); background-size: 22px 22px;"></div>
                </div>

                <!-- Header -->
                <div class="relative z-10 flex items-start justify-between mb-4">
                    <div class="flex items-center gap-2">
                        <h3 id="stats-title" class="font-bold text-gray-900 dark:text-gray-100">Statistik</h3>
                        <button type="button" class="inline-flex items-center justify-center w-5 h-5 rounded-full text-gray-500 dark:text-gray-400 ring-1 ring-gray-300/70 dark:ring-gray-600/70 bg-white/70 dark:bg-gray-700/70 backdrop-blur-sm hover:bg-gray-50 dark:hover:bg-gray-600 transition-colors duration-200" title="Informasi statistik" aria-label="Info statistik">i</button>
                    </div>
                    <button type="button" class="inline-flex items-center gap-2 text-sm text-gray-700 dark:text-gray-300 ring-1 ring-gray-300/80 dark:ring-gray-600/80 bg-white/70 dark:bg-gray-700/70 hover:bg-gray-50 dark:hover:bg-gray-600 px-3 py-1.5 rounded-xl transition-all duration-200 hover:scale-105">
                        <span>Lihat laporan</span>
                        <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                        </svg>
                    </button>
                </div>

                <!-- Highlight metric -->
                <div class="relative z-10 flex items-center justify-between mb-4">
                    <div>
                        <div class="text-3xl sm:text-4xl font-extrabold text-gray-900 dark:text-white tracking-tight transition-colors duration-300" id="stats-total">—</div>
                        <div class="mt-2 flex items-center gap-2">
                            <span class="inline-flex items-center gap-1 rounded-full bg-emerald-50 dark:bg-emerald-900/30 text-emerald-600 dark:text-emerald-400 text-xs font-medium px-2 py-1 ring-1 ring-emerald-200 dark:ring-emerald-700/50 transition-all duration-200 hover:scale-105">
                                <svg class="w-3.5 h-3.5 animate-pulse" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M5 10a1 1 0 011.707-.707L9 11.586V4a1 1 0 112 0v7.586l2.293-2.293A1 1 0 0115 10v6a1 1 0 01-1 1H6a1 1 0 01-1-1v-6z" clip-rule="evenodd"/></svg>
                                <span id="stats-growth">Live</span>
                            </span>
                        </div>
                    </div>
                    <div class="w-11 h-11 rounded-2xl bg-gradient-to-br from-orange-400 to-amber-500 dark:from-orange-500 dark:to-amber-600 text-white flex items-center justify-center shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-110 group">
                        <svg class="w-6 h-6 transition-transform group-hover:rotate-12" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                    </div>
                </div>

                <!-- Category rows -->
                <div class="relative z-10 grid grid-cols-1 gap-3 mb-4">
                    <div class="flex items-center justify-between text-sm p-2 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors duration-200">
                        <span class="text-gray-600 dark:text-gray-400 flex items-center gap-2">
                            <div class="w-2 h-2 rounded-full bg-amber-500"></div>
                            Publikasi
                        </span>
                        <span class="flex items-center gap-2">
                            <span class="text-emerald-600 dark:text-emerald-400 text-xs font-medium" id="pct-pub"></span>
                        </span>
                    </div>
                    <div class="flex items-center justify-between text-sm p-2 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors duration-200">
                        <span class="text-gray-600 dark:text-gray-400 flex items-center gap-2">
                            <div class="w-2 h-2 rounded-full bg-emerald-500"></div>
                            Proyek
                        </span>
                        <span class="flex items-center gap-2">
                            <span class="text-emerald-600 dark:text-emerald-400 text-xs font-medium" id="pct-proj"></span>
                        </span>
                    </div>
                    <div class="flex items-center justify-between text-sm p-2 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors duration-200">
                        <span class="text-gray-600 dark:text-gray-400 flex items-center gap-2">
                            <div class="w-2 h-2 rounded-full bg-blue-500"></div>
                            Perangkat Lunak
                        </span>
                        <span class="flex items-center gap-2">
                            <span class="text-emerald-600 dark:text-emerald-400 text-xs font-medium" id="pct-soft"></span>
                        </span>
                    </div>
                </div>

                <!-- Chart area -->
                <div class="relative z-10 h-44">
                    <!-- Skeleton -->
                    <div id="chart-skeleton" class="absolute inset-0 p-4 animate-pulse">
                        <div class="h-3 w-28 bg-gray-200 dark:bg-gray-600 rounded mb-3"></div>
                        <div class="absolute bottom-4 left-4 right-4 flex items-end gap-2 h-28">
                            <div class="flex-1 h-10 bg-gray-200 dark:bg-gray-600 rounded"></div>
                            <div class="flex-1 h-16 bg-gray-200 dark:bg-gray-600 rounded" style="animation-delay:.15s"></div>
                            <div class="flex-1 h-8 bg-gray-200 dark:bg-gray-600 rounded" style="animation-delay:.3s"></div>
                        </div>
                    </div>

                    <canvas id="statsChart" class="relative" role="img" aria-label="Grafik jumlah publikasi, proyek, dan perangkat lunak"></canvas>

                    <!-- Accessibility -->
                    <p id="stats-desc" class="sr-only">Grafik perbandingan jumlah publikasi, proyek, dan perangkat lunak. Nilai diperbarui secara dinamis.</p>
                    <div id="stats-live" class="sr-only" aria-live="polite"></div>

                    <!-- No JavaScript Fallback -->
                    <noscript>
                        <div class="flex items-center justify-center h-full">
                            <p class="text-sm text-gray-600 dark:text-gray-400 text-center">
                                <svg class="w-8 h-8 mx-auto mb-2 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
                                Aktifkan JavaScript untuk melihat grafik statistik
                            </p>
                        </div>
                    </noscript>
                </div>
            </div>


<script>
 document.addEventListener('DOMContentLoaded', () => {
   const canvas = document.getElementById('statsChart');
   if (!canvas) return;
   
   const ctx = canvas.getContext('2d');
   const prefersReduced = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
   
   // Check for dark mode preference
   const isDarkMode = () => {
     return window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches ||
            document.documentElement.classList.contains('dark');
   };
   
   // Get colors based on theme
   const getThemeColors = () => {
     const dark = isDarkMode();
     return {
       text: dark ? '#f3f4f6' : '#374151',
       grid: dark ? 'rgba(75,85,99,0.2)' : 'rgba(0,0,0,0.06)',
       border: dark ? 'rgba(75,85,99,0.3)' : 'rgba(0,0,0,0.08)',
       tooltip: dark ? 'rgba(17,24,39,0.95)' : 'rgba(17,24,39,0.95)'
     };
   };
   
   // Enhanced Chart Configuration with theme support
    const chart = new Chart(ctx, {
      type: 'line',
     data: {
       labels: ['Publikasi', 'Proyek', 'Perangkat Lunak'],
       datasets: [
         {
           label: 'Publikasi',
           backgroundColor: 'rgba(245, 158, 11, 0.8)', // bg-amber-500/80
           borderColor: 'rgba(245, 158, 11, 0.95)',
           pointRadius: 0,
           pointHoverRadius: 6,
           pointHoverBackgroundColor: 'rgba(245, 158, 11, 1)',
           pointHoverBorderColor: '#ffffff',
           pointHoverBorderWidth: 2,
           tension: 0.4,
           fill: true,
           borderWidth: 3,
           data: [0, 0, 0],
         },
         {
           label: 'Proyek',
           backgroundColor: 'rgba(16, 185, 129, 0.8)', // bg-emerald-500/80
           borderColor: 'rgba(16, 185, 129, 0.95)',
           pointRadius: 0,
           pointHoverRadius: 6,
           pointHoverBackgroundColor: 'rgba(16, 185, 129, 1)',
           pointHoverBorderColor: '#ffffff',
           pointHoverBorderWidth: 2,
           tension: 0.4,
           fill: true,
           borderWidth: 3,
           data: [0, 0, 0],
         },
         {
           label: 'Perangkat Lunak',
           backgroundColor: 'rgba(59, 130, 246, 0.8)', // bg-blue-500/80
           borderColor: 'rgba(59, 130, 246, 0.95)',
           pointRadius: 0,
           pointHoverRadius: 6,
           pointHoverBackgroundColor: 'rgba(59, 130, 246, 1)',
           pointHoverBorderColor: '#ffffff',
           pointHoverBorderWidth: 2,
           tension: 0.4,
           fill: true,
           borderWidth: 3,
           data: [0, 0, 0],
         }
       ]
     },
     options: {
       responsive: true,
       maintainAspectRatio: false,
       animation: prefersReduced ? false : { 
         duration: 1000,
         easing: 'easeOutQuart'
       },
       plugins: {
         legend: { display: false },
         tooltip: {
           enabled: true,
           backgroundColor: getThemeColors().tooltip,
           borderColor: 'rgba(59, 130, 246, 0.6)',
           borderWidth: 2,
           cornerRadius: 12,
           padding: 16,
           titleFont: {
             size: 14,
             weight: '600'
           },
           bodyFont: {
             size: 13
           },
           displayColors: true,
           callbacks: {
             label: function(context) {
                return `${context.parsed.y} item`;
             }
           }
         }
       },
       scales: {
         x: {
           grid: { 
             color: getThemeColors().grid, 
             borderColor: getThemeColors().border,
             drawBorder: false
           },
           ticks: { 
             color: getThemeColors().text,
             font: {
               size: 12,
               weight: '500'
             }
           }
         },
         y: {
           beginAtZero: true,
           grace: '10%',
           ticks: { 
             precision: 0, 
             color: getThemeColors().text,
             font: {
               size: 12,
               weight: '500'
             }
           },
           grid: { 
             color: getThemeColors().grid, 
             borderColor: getThemeColors().border,
             drawBorder: false
           }
         }
       },
       interaction: {
         intersect: false,
         mode: 'index'
       },
       elements: {
         point: {
           hoverRadius: 6,
           hoverBorderWidth: 2
         }
       }
     }
   });

  // Enhanced API Call with Error Handling
  axios.get('{{ url('/api/stats/overview') }}')
    .then(response => {
      const payload = response && response.data ? response.data : {};
      const data = {
        publications: Number(payload.publications) || 0,
        projects: Number(payload.projects) || 0,
        software: Number(payload.software) || 0,
      };
      
      // Update chart data with smooth animation
      chart.data.datasets[0].data = [data.publications, 0, 0]; // Publikasi
      chart.data.datasets[1].data = [0, data.projects, 0];     // Proyek
      chart.data.datasets[2].data = [0, 0, data.software];     // Perangkat Lunak
      chart.update('active');
      
      // Update headline and rows
      const total = data.publications + data.projects + data.software;
      const fmt = (n) => new Intl.NumberFormat('id-ID').format(n);
      const setText = (id, txt) => { const el = document.getElementById(id); if (el) el.textContent = txt; };
      setText('stats-total', fmt(total));
      setText('val-pub', fmt(data.publications));
      setText('val-proj', fmt(data.projects));
      setText('val-soft', fmt(data.software));

      // Percentages and progress bars (floor to nearest 10%)
      const pct = (value) => {
        if (!total) return 0;
        const percent = (value / total) * 100;
        return Math.floor(percent / 10) * 10;
      };
      setText('pct-pub', total ? `${pct(data.publications)}%` : '');
      setText('pct-proj', total ? `${pct(data.projects)}%` : '');
      setText('pct-soft', total ? `${pct(data.software)}%` : '');
      const setWidth = (id, w) => { const el = document.getElementById(id); if (el) el.style.width = `${w}%`; };
      setWidth('bar-pub', pct(data.publications));
      setWidth('bar-proj', pct(data.projects));
      setWidth('bar-soft', pct(data.software));

      // Hide skeleton and show chart with fade effect
      const skeleton = document.getElementById('chart-skeleton');
      if (skeleton) {
        skeleton.style.opacity = '0';
        setTimeout(() => skeleton.classList.add('hidden'), 300);
      }
      
      // Update live region for screen readers
      const live = document.getElementById('stats-live');
      if (live) {
        live.textContent = `Statistik diperbarui: Publikasi ${data.publications}, Proyek ${data.projects}, Perangkat Lunak ${data.software}.`;
      }
      
      // Show success toast
      if (window.showToast) {
        window.showToast('Data statistik berhasil diperbarui', 'success');
      }
    })
    .catch(error => {
      console.error('Error fetching stats:', error);
      
      // Hide skeleton
      const skeleton = document.getElementById('chart-skeleton');
      if (skeleton) {
        skeleton.classList.add('hidden');
      }
      
      // Show error message with dark mode support
      const canvas = document.getElementById('statsChart');
      if (canvas) {
        canvas.style.display = 'none';
        const errorDiv = document.createElement('div');
        errorDiv.className = 'flex items-center justify-center h-full text-center';
        errorDiv.innerHTML = `
          <div class="space-y-2">
            <svg class="w-12 h-12 mx-auto mb-2 text-red-400 dark:text-red-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.34 16.5c-.77.833.192 2.5 1.732 2.5z"/>
            </svg>
            <p class="text-sm text-gray-600 dark:text-gray-400">Gagal memuat data statistik</p>
            <button onclick="location.reload()" class="text-xs text-blue-600 dark:text-blue-400 hover:text-blue-700 dark:hover:text-blue-300 underline transition-colors duration-200">Coba lagi</button>
          </div>
        `;
        canvas.parentNode.appendChild(errorDiv);
      }
      
      // Show error toast
      if (window.showToast) {
        window.showToast('Gagal memuat data statistik', 'error');
      }
    });

  // Theme change listener for dynamic chart updates
  const mediaQuery = window.matchMedia('(prefers-color-scheme: dark)');
  mediaQuery.addEventListener('change', (e) => {
    const colors = getThemeColors();
    chart.options.scales.x.ticks.color = colors.text;
    chart.options.scales.y.ticks.color = colors.text;
    chart.options.scales.x.grid.color = colors.grid;
    chart.options.scales.y.grid.color = colors.grid;
    chart.options.scales.x.grid.borderColor = colors.border;
    chart.options.scales.y.grid.borderColor = colors.border;
    chart.update('none');
  });
});
</script>