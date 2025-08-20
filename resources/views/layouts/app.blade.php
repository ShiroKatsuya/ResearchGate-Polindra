<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#1e40af">
    <meta name="description" content="Portal modern untuk publikasi, proyek, dan perangkat lunak karya mahasiswa Polindra">
    <title>{{ $title ?? 'Gerbang Riset Mahasiswa Politeknik Negeri Indramayu' }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Modern Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    
    <!-- Modern Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@alpinejs/focus@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    
    <script>
      // Enhanced Tailwind config
      window.tailwind = {
        theme: {
          fontFamily: {
            sans: ['Inter', 'ui-sans-serif', 'system-ui', 'sans-serif'],
            mono: ['JetBrains Mono', 'ui-monospace', 'monospace']
          },
          extend: {
            colors: {
              primary: {
                50: '#eff6ff',
                100: '#dbeafe',
                200: '#bfdbfe',
                300: '#93c5fd',
                400: '#60a5fa',
                500: '#3b82f6',
                600: '#2563eb',
                700: '#1d4ed8',
                800: '#1e40af',
                900: '#1e3a8a',
                950: '#172554'
              },
              accent: {
                50: '#fefce8',
                100: '#fef9c3',
                200: '#fef08a',
                300: '#fde047',
                400: '#facc15',
                500: '#eab308',
                600: '#ca8a04',
                700: '#a16207',
                800: '#854d0e',
                900: '#713f12',
                950: '#422006'
              },
              gray: {
                50: '#f9fafb',
                100: '#f3f4f6',
                200: '#e5e7eb',
                300: '#d1d5db',
                400: '#9ca3af',
                500: '#6b7280',
                600: '#4b5563',
                700: '#374151',
                800: '#1f2937',
                900: '#111827',
                950: '#030712'
              }
            },
            animation: {
              'fade-in': 'fadeIn 0.5s ease-out',
              'slide-up': 'slideUp 0.6s ease-out',
              'scale-in': 'scaleIn 0.3s ease-out',
              'bounce-gentle': 'bounceGentle 2s infinite',
              'float': 'float 3s ease-in-out infinite',
              'pulse-slow': 'pulseSlow 3s cubic-bezier(0.4, 0, 0.6, 1) infinite'
            },
            keyframes: {
              fadeIn: {
                '0%': { opacity: '0' },
                '100%': { opacity: '1' }
              },
              slideUp: {
                '0%': { opacity: '0', transform: 'translateY(20px)' },
                '100%': { opacity: '1', transform: 'translateY(0)' }
              },
              scaleIn: {
                '0%': { opacity: '0', transform: 'scale(0.95)' },
                '100%': { opacity: '1', transform: 'scale(1)' }
              },
              bounceGentle: {
                '0%, 100%': { transform: 'translateY(0)' },
                '50%': { transform: 'translateY(-5px)' }
              },
              float: {
                '0%, 100%': { transform: 'translateY(0px)' },
                '50%': { transform: 'translateY(-10px)' }
              },
              pulseSlow: {
                '0%, 100%': { opacity: '1' },
                '50%': { opacity: '.8' }
              }
            },
            backdropBlur: {
              xs: '2px'
            }
          }
        }
      };
    </script>
    
    <style>
      /* Custom CSS for enhanced animations and effects */
      .glass-effect {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.2);
      }
      
      .gradient-text {
        background: linear-gradient(135deg, #3b82f6 0%, #1e40af 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
      }
      
      .card-hover {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      }
      
      .card-hover:hover {
        transform: translateY(-4px) scale(1.02);
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
      }
      
      .smooth-scroll {
        scroll-behavior: smooth;
      }
      
      /* Enhanced focus states */
      .focus-ring {
        @apply outline-none ring-2 ring-offset-2 ring-primary/60 focus:ring-primary;
      }
      
      /* Custom scrollbar */
      ::-webkit-scrollbar {
        width: 8px;
      }
      
      ::-webkit-scrollbar-track {
        background: #f1f5f9;
      }
      
      ::-webkit-scrollbar-thumb {
        background: #cbd5e1;
        border-radius: 4px;
      }
      
      ::-webkit-scrollbar-thumb:hover {
        background: #94a3b8;
      }
      
      /* Loading skeleton animation */
      .skeleton {
        background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
        background-size: 200% 100%;
        animation: skeleton-loading 1.5s infinite;
      }
      
      @keyframes skeleton-loading {
        0% { background-position: 200% 0; }
        100% { background-position: -200% 0; }
      }
      
      /* Alpine.js x-cloak directive - hides elements until Alpine is fully loaded */
      [x-cloak] {
        display: none !important;
      }

      /* Make media responsive inside main content without affecting logo/nav */
      main img,
      main video,
      main iframe {
        max-width: 100%;
        height: auto;
      }
    </style>
</head>
<body class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50 text-gray-900 antialiased font-sans selection:bg-primary/20 selection:text-primary-800 smooth-scroll">
    <!-- Skip to content link for accessibility -->
    <a href="#main" class="sr-only focus:not-sr-only focus:fixed focus:top-4 focus:left-4 focus:z-50 focus:rounded-lg focus:bg-primary-600 focus:text-white focus:px-4 focus:py-2 focus:text-sm focus:font-medium transition-all duration-200">
        Loncat ke konten utama
    </a>
    
    <!-- Enhanced Navigation -->
    <nav class="sticky top-0 z-30 bg-white/80 supports-[backdrop-filter]:bg-white/60 backdrop-blur-xl border-b border-gray-200/50 shadow-sm transition-all duration-300" x-data="{ mobileOpen: false }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16 lg:h-20">
                <!-- Logo -->
                <a href="{{ url('/') }}" class="group flex items-center gap-3 font-bold tracking-tight text-primary-700 hover:text-primary-800 transition-colors duration-200">
                    <div class="relative">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-primary-500 to-primary-700 flex items-center justify-center shadow-lg group-hover:shadow-xl transition-all duration-300">
                            <img src="{{ asset('asset/images/logo.png') }}" alt="Logo" class="w-8 h-8 object-contain" />
                        </div>
                        <div class="absolute -top-1 -right-1 w-4 h-4 rounded-full bg-accent-400 animate-bounce-gentle"></div>
                    </div>
                    <div class="hidden sm:block">
                        <span class="text-lg">Politeknik Negeri Indramayu</span>
                        <span class="block text-sm text-gray-600 font-normal">Teknik Informatika</span>
                    </div>
                </a>
                
                <!-- Desktop Navigation -->
                <div class="hidden lg:flex items-center gap-1">
                    <a href="{{ route('research.publications') }}" class="group relative px-4 py-2 rounded-lg font-medium text-gray-700 hover:text-primary-700 transition-all duration-200 {{ request()->routeIs('research.publications') ? 'text-primary-700 bg-primary-50' : 'hover:bg-gray-50' }}">
                        <span class="relative z-10">Publikasi</span>
                        <div class="absolute inset-0 bg-primary-100 rounded-lg scale-0 group-hover:scale-100 transition-transform duration-200 origin-center"></div>
                    </a>
                    <a href="{{ route('research.projects') }}" class="group relative px-4 py-2 rounded-lg font-medium text-gray-700 hover:text-primary-700 transition-all duration-200 {{ request()->routeIs('research.projects') ? 'text-primary-700 bg-primary-50' : 'hover:bg-gray-50' }}">
                        <span class="relative z-10">Proyek</span>
                        <div class="absolute inset-0 bg-primary-100 rounded-lg scale-0 group-hover:scale-100 transition-transform duration-200 origin-center"></div>
                    </a>
                    <a href="{{ route('research.software') }}" class="group relative px-4 py-2 rounded-lg font-medium text-gray-700 hover:text-primary-700 transition-all duration-200 {{ request()->routeIs('research.software') ? 'text-primary-700 bg-primary-50' : 'hover:bg-gray-50' }}">
                        <span class="relative z-10">Perangkat Lunak</span>
                        <div class="absolute inset-0 bg-primary-100 rounded-lg scale-0 group-hover:scale-100 transition-transform duration-200 origin-center"></div>
                    </a>
                    <a href="{{ route('introduce.index') }}" class="group relative px-4 py-2 rounded-lg font-medium text-gray-700 hover:text-primary-700 transition-all duration-200 {{ request()->routeIs('introduce.index') ? 'text-primary-700 bg-primary-50' : 'hover:bg-gray-50' }}">
                        <span class="relative z-10">Perkenalan</span>
                        <div class="absolute inset-0 bg-primary-100 rounded-lg scale-0 group-hover:scale-100 transition-transform duration-200 origin-center"></div>
                    </a>
                    <a href="{{ route('news.index') }}" class="group relative px-4 py-2 rounded-lg font-medium text-gray-700 hover:text-primary-700 transition-all duration-200 {{ request()->routeIs('news.*') ? 'text-primary-700 bg-primary-50' : 'hover:bg-gray-50' }}">
                        <span class="relative z-10">Berita</span>
                        <div class="absolute inset-0 bg-primary-100 rounded-lg scale-0 group-hover:scale-100 transition-transform duration-200 origin-center"></div>
                    </a>

                    <a href="{{ route('dashboard.index') }}" class="group relative px-4 py-2 rounded-lg font-medium text-gray-700 hover:text-primary-700 transition-all duration-200 {{ request()->routeIs('dashboard.index') ? 'text-primary-700 bg-primary-50' : 'hover:bg-gray-50' }}">
                      <span class="relative z-10">Login</span>
                      <div class="absolute inset-0 bg-primary-100 rounded-lg scale-0 group-hover:scale-100 transition-transform duration-200 origin-center"></div>
                  </a>
                </div>
                
                <!-- Mobile menu button -->
                <button @click="mobileOpen = !mobileOpen" class="lg:hidden inline-flex items-center justify-center rounded-lg p-2 text-gray-700 hover:text-primary-700 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 transition-all duration-200" aria-label="Toggle navigation menu">
                    <svg class="h-6 w-6" :class="{ 'rotate-90': mobileOpen }" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
            
            <!-- Mobile Navigation -->
            <div class="lg:hidden" x-show="mobileOpen" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-2">
                <div class="border-t border-gray-200/50 py-4 space-y-1">
                    <a href="{{ route('research.publications') }}" class="block px-4 py-3 rounded-lg text-base font-medium text-gray-700 hover:text-primary-700 hover:bg-primary-50 transition-all duration-200 {{ request()->routeIs('research.publications') ? 'text-primary-700 bg-primary-50' : '' }}">Publikasi</a>
                    <a href="{{ route('research.projects') }}" class="block px-4 py-3 rounded-lg text-base font-medium text-gray-700 hover:text-primary-700 hover:bg-primary-50 transition-all duration-200 {{ request()->routeIs('research.projects') ? 'text-primary-700 bg-primary-50' : '' }}">Proyek</a>
                    <a href="{{ route('research.software') }}" class="block px-4 py-3 rounded-lg text-base font-medium text-gray-700 hover:text-primary-700 hover:bg-primary-50 transition-all duration-200 {{ request()->routeIs('research.software') ? 'text-primary-700 bg-primary-50' : '' }}">Perangkat Lunak</a>
                    <a href="{{ route('introduce.index') }}" class="block px-4 py-3 rounded-lg text-base font-medium text-gray-700 hover:text-primary-700 hover:bg-primary-50 transition-all duration-200 {{ request()->routeIs('introduce.index') ? 'text-primary-700 bg-primary-50' : '' }}">Perkenalan</a>
                    <a href="{{ route('news.index') }}" class="block px-4 py-3 rounded-lg text-base font-medium text-gray-700 hover:text-primary-700 hover:bg-primary-50 transition-all duration-200 {{ request()->routeIs('news.*') ? 'text-primary-700 bg-primary-50' : '' }}">Berita</a>
                    <a href="{{ route('dashboard.index') }}" class="block px-4 py-3 rounded-lg text-base font-medium text-gray-700 hover:text-primary-700 hover:bg-primary-50 transition-all duration-200 {{ request()->routeIs('dashboard.index') ? 'text-primary-700 bg-primary-50' : '' }}">Login</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main id="main" class="@yield('containerClass', 'max-w-7xl mx-auto') px-4 sm:px-6 lg:px-8 py-6 lg:py-8">
        @if(session('status'))
            <div class="mb-6 rounded-xl border border-green-200 bg-green-50 p-4 text-green-800 shadow-sm animate-fade-in">
                <div class="flex items-center gap-3">
                    <svg class="h-5 w-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <span class="font-medium">{{ session('status') }}</span>
                </div>
            </div>
        @endif
        
        {{ $slot ?? '' }}
        @yield('content')
    </main>

    <!-- Enhanced Footer -->
    <footer class="border-t border-gray-200/50 bg-white/80 backdrop-blur-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-center">
                <div class="space-y-4">
                    <div class="flex items-center gap-3">
                  
                        <div>
                            <span class="block font-semibold text-gray-900 text-xs sm:text-sm leading-tight">Jl. Raya Lohbener Lama No.08, Legok, Kec. Lohbener, Kabupaten Indramayu, Jawa Barat 45252</span>
                            {{-- <span class="block text-xs text-primary-600 mt-1">Kampus Jurusan Teknik Informatika</span> --}}
                            <p class="text-xs text-gray-400 mt-2 border-t border-gray-100 pt-2">© {{ date('Y') }} <span class="font-medium text-primary-700">Jurusan Teknik Informatika</span></p>
                          </div>
                    </div>
                  
                </div>
                
                <div class="text-center space-y-2">
                    <p class="text-sm text-gray-600">Dibangun Dengan</p>
                    <div class="flex items-center justify-center gap-2 text-xs text-gray-500">
                        <span class="px-2 py-1 bg-gray-100 rounded-full">Laravel</span>
                        <span class="px-2 py-1 bg-gray-100 rounded-full">Tailwind CSS</span>
                        <span class="px-2 py-1 bg-gray-100 rounded-full">Alpine.js</span>
                    </div>
                </div>
                
                <div class="text-right">
                    <button @click="$dispatch('open-modal', 'about-modal')" class="inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-primary-600 to-primary-700 px-6 py-3  font-medium shadow-lg hover:shadow-xl hover:scale-105 active:scale-95 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                       <span class="font-bold text-gray-900"> Tentang Portal</span>
                    </button>
                </div>
            </div>
        </div>
    </footer>

    <!-- Enhanced Modal System -->
    <div x-data="modalManager()" @open-modal.window="openModal($event.detail)" @close-modal.window="closeModal()" @keydown.escape="closeModal()">
        <!-- About Modal -->
        <div x-show="currentModal === 'about-modal'" x-cloak x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
                <div x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-2xl ring-1 ring-gray-900/5 w-full sm:max-w-lg">
                    <div class="bg-gradient-to-r from-primary-600 to-primary-700 px-6 py-6 text-white">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-white/20 flex items-center justify-center">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 id="modal-title" class="text-lg font-semibold">Tentang Portal</h3>
                                <p class="text-primary-100 text-sm">Informasi lengkap tentang sistem</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="px-6 py-6 space-y-4">
                        <div class="space-y-3">
                            <div class="flex items-start gap-3">
                                <div class="w-8 h-8 rounded-lg bg-primary-100 flex items-center justify-center flex-shrink-0 mt-0.5">
                                    <svg class="h-4 w-4 text-primary-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-medium text-gray-900">Portal Modern</h4>
                                    <p class="text-sm text-gray-600">Tampilan responsif dengan teknologi terbaru</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start gap-3">
                                <div class="w-8 h-8 rounded-lg bg-accent-100 flex items-center justify-center flex-shrink-0 mt-0.5">
                                    <svg class="h-4 w-4 text-accent-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-medium text-gray-900">Pencarian Cepat</h4>
                                    <p class="text-sm text-gray-600">Temukan karya dengan mudah dan efisien</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start gap-3">
                                <div class="w-8 h-8 rounded-lg bg-green-100 flex items-center justify-center flex-shrink-0 mt-0.5">
                                    <svg class="h-4 w-4 text-green-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-medium text-gray-900">Keamanan Terjamin</h4>
                                    <p class="text-sm text-gray-600">Sistem yang aman dan terpercaya</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-gray-50 px-6 py-4 flex justify-end">
                        <button @click="closeModal()" class="inline-flex items-center gap-2 rounded-lg bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm ring-1 ring-gray-300 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 transition-all duration-200">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                            Tutup
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Backdrop -->
        <div x-show="currentModal !== null" x-cloak x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-40 bg-gray-900/50 backdrop-blur-sm" @click="closeModal()"></div>
    </div>

    <!-- Toast System -->
    <div id="toast-root" class="fixed top-4 right-4 z-50 space-y-3"></div>
    
    <!-- Enhanced Scroll to Top Button -->
    {{-- <button id="scrollTopBtn" class="fixed bottom-6 right-6 z-40 hidden rounded-full bg-gradient-to-r from-primary-600 to-primary-700 text-white shadow-xl hover:shadow-2xl hover:scale-110 active:scale-95 p-4 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 transition-all duration-300 group" aria-label="Kembali ke atas">
        <svg class="h-5 w-5 transition-transform group-hover:-translate-y-0.5" fill="currentColor" viewBox="0 0 24 24">
            <path fill-rule="evenodd" d="M12 3a.75.75 0 01.75.75v14.69l4.72-4.72a.75.75 0 111.06 1.06l-6 6a.75.75 0 01-1.06 0l-6-6a.75.75 0 111.06-1.06l4.72 4.72V3.75A.75.75 0 0112 3z" clip-rule="evenodd"/>
        </svg>
    </button> --}}

    <script>
      // Enhanced JavaScript with modern patterns
      function modalManager() {
        return {
          currentModal: null,
          init() {
            // Ensure modal is closed on page load
            this.currentModal = null;
            document.body.style.overflow = '';
          },
          openModal(modalId) {
            this.currentModal = modalId;
            document.body.style.overflow = 'hidden';
          },
          closeModal() {
            this.currentModal = null;
            document.body.style.overflow = '';
          }
        }
      }

      // Enhanced UI behaviors
      document.addEventListener('DOMContentLoaded', () => {
        const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        
        // Enhanced tooltip system
        document.querySelectorAll('[data-tooltip]').forEach(el => {
          const text = el.getAttribute('data-tooltip');
          const tip = document.createElement('div');
          tip.className = 'pointer-events-none absolute -top-2 left-1/2 -translate-x-1/2 -translate-y-full bg-gray-900 text-white text-xs px-3 py-2 rounded-lg shadow-lg opacity-0 transition-all duration-200 z-50 whitespace-nowrap';
          tip.textContent = text;
          
          // Add arrow
          const arrow = document.createElement('div');
          arrow.className = 'absolute top-full left-1/2 -translate-x-1/2 w-0 h-0 border-l-4 border-r-4 border-t-4 border-transparent border-t-gray-900';
          tip.appendChild(arrow);
          
          el.classList.add('relative');
          el.appendChild(tip);
          
          const showTooltip = () => {
            tip.classList.remove('opacity-0');
            tip.classList.add('opacity-100');
          };
          
          const hideTooltip = () => {
            tip.classList.add('opacity-0');
            tip.classList.remove('opacity-100');
          };
          
          el.addEventListener('mouseenter', showTooltip);
          el.addEventListener('mouseleave', hideTooltip);
          el.addEventListener('focus', showTooltip);
          el.addEventListener('blur', hideTooltip);
        });

        // Enhanced toast system
        const toastRoot = document.getElementById('toast-root');
        function showToast(message, type = 'info') {
          if (!toastRoot) return;
          
          const colors = {
            info: 'bg-blue-600',
            success: 'bg-green-600',
            warning: 'bg-yellow-600',
            error: 'bg-red-600'
          };
          
          const el = document.createElement('div');
          el.className = `rounded-xl ${colors[type]} text-white text-sm px-4 py-3 shadow-xl opacity-0 translate-y-2 transition-all duration-300 max-w-sm`;
          
          const content = document.createElement('div');
          content.className = 'flex items-center gap-3';
          
          const icon = document.createElement('div');
          icon.innerHTML = type === 'success' ? '✓' : type === 'error' ? '✕' : type === 'warning' ? '⚠' : 'ℹ';
          icon.className = 'text-lg font-bold';
          
          const text = document.createElement('span');
          text.textContent = message;
          
          content.appendChild(icon);
          content.appendChild(text);
          el.appendChild(content);
          
          toastRoot.appendChild(el);
          
          requestAnimationFrame(() => {
            el.classList.remove('opacity-0', 'translate-y-2');
          });
          
          setTimeout(() => {
            el.classList.add('opacity-0', 'translate-y-2');
            setTimeout(() => el.remove(), 300);
          }, 3000);
        }

        // Enhanced copy-to-clipboard
        document.querySelectorAll('[data-copy]').forEach(btn => {
          btn.addEventListener('click', async () => {
            const text = btn.getAttribute('data-copy');
            const original = btn.innerHTML;
            
            try {
              await navigator.clipboard.writeText(text);
              btn.innerHTML = '<svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg> Tersalin';
              showToast('Berhasil disalin ke papan klip', 'success');
            } catch (err) {
              showToast('Gagal menyalin teks', 'error');
            } finally {
              setTimeout(() => {
                btn.innerHTML = original;
              }, 2000);
            }
          });
        });

        // Enhanced scroll reveal animations
        const revealEls = document.querySelectorAll('.reveal-on-scroll');
        if (!prefersReduced && revealEls.length) {
          const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
              if (entry.isIntersecting) {
                entry.target.classList.remove('opacity-0', 'translate-y-8');
                entry.target.classList.add('opacity-100', 'translate-y-0');
                observer.unobserve(entry.target);
              }
            });
          }, { 
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
          });
          
          revealEls.forEach((el) => {
            el.classList.add('opacity-0', 'translate-y-8', 'transition-all', 'duration-700', 'ease-out');
            observer.observe(el);
          });
        }

        // Enhanced scroll to top button (keep button disabled, but retain nav elevation on scroll)
        // const scrollBtn = document.getElementById('scrollTopBtn');
        function onScroll() {
          // if (scrollBtn) {
          //   const show = window.scrollY > 600;
          //   scrollBtn.classList.toggle('hidden', !show);
          // }
          const nav = document.querySelector('nav.sticky');
          if (nav) {
            nav.classList.toggle('shadow-md', window.scrollY > 10);
          }
        }
        window.addEventListener('scroll', onScroll, { passive: true });
        onScroll();
        
        // if (scrollBtn) {
        //   scrollBtn.addEventListener('click', () => {
        //     window.scrollTo({ 
        //       top: 0, 
        //       behavior: 'smooth' 
        //     });
        //   });
        // }

        // Enhanced mobile menu behavior
        const mobileMenu = document.querySelector('#mobileMenu');
        if (mobileMenu) {
          // Close mobile menu when clicking outside
          document.addEventListener('click', (e) => {
            if (!e.target.closest('nav') && mobileMenu.classList.contains('block')) {
              mobileMenu.classList.add('hidden');
            }
          });
        }
        
        // Ensure modal system is properly initialized
        const modalSystem = document.querySelector('[x-data="modalManager()"]');
        if (modalSystem && modalSystem.__x) {
          modalSystem.__x.$data.init();
        }
      });
    </script>
</body>
</html>


