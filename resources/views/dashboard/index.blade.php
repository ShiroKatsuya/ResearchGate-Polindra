@extends('layouts.app')

@section('content')
<!--
  index.blade.php
  Modern, responsive Login UI (UI-only) using Tailwind CDN + Alpine.js CDN
  Semua teks dalam Bahasa Indonesia.
-->
<style>
  [x-cloak]{display:none !important;}
  .loading-bar{position:fixed;top:0;left:0;right:auto;height:3px;background:linear-gradient(90deg,#6366F1,#A855F7,#06B6D4);background-size:300% 100%;animation:loading 1.2s ease-in-out infinite;z-index:70;border-radius:9999px}
  @keyframes loading{0%{width:0;background-position:0% 50%}50%{width:60%;background-position:50% 50%}100%{width:100%;background-position:100% 50%}}
  .shake{animation:shake 400ms cubic-bezier(.36,.07,.19,.97) both}
  @keyframes shake{10%,90%{transform:translateX(-1px)}20%,80%{transform:translateX(2px)}30%,50%,70%{transform:translateX(-4px)}40%,60%{transform:translateX(4px)}}
</style>

<div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50 text-gray-900 antialiased font-sans selection:bg-primary/20 selection:text-primary-800 smooth-scroll">
  <section class="max-w-4xl w-full mx-auto py-12">
    <div class="grid w-full gap-8 items-center grid-cols-1 lg:grid-cols-2">
      <div x-data="loginForm()" x-init="init()" :class="shake ? 'shake' : ''" class="bg-white shadow-2xl rounded-2xl overflow-hidden border border-gray-100 transform transition-all duration-300 hover:scale-[1.005]">
        <div x-show="loading" x-cloak class="loading-bar" aria-hidden="true"></div>
        <!-- Header / Logo -->
        <header class="px-6 py-6 sm:py-8 flex items-center justify-between bg-gradient-to-r from-indigo-500 to-purple-600 text-white">
          <div class="flex items-center gap-3">
            <!-- SVG logo (small, inline, accessible) -->
            <img src="{{ asset('asset/images/logo.png') }}" alt="Logo" class="w-12 h-12 rounded-full p-2 bg-white bg-opacity-20 shadow-inner object-contain" aria-hidden="true">
            <div>
              <h1 class="text-xl font-bold">Gerbang Riset Mahasiswa</h1>
              <p class="text-sm opacity-80">Masuk untuk melanjutkan ke dashboard</p>
            </div>
          </div>
          
        </header>

        <!-- Form -->
        <div class="px-6 pb-6 sm:pb-8 pt-6">
          <form @submit.prevent="submit()" @keydown.enter="submit()" class="space-y-5" :aria-busy="loading.toString()">
            <!-- Hidden CSRF token as backup -->
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <!-- Info / tooltip -->
            <div class="flex items-center justify-between">
              <label class="text-sm font-semibold text-gray-800">Masuk</label>
              <div class="relative flex items-center gap-2 text-sm text-gray-500 group">
                <button type="button" class="flex items-center gap-1 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 rounded p-1" x-data="{}" @mouseenter="showTooltip = true" @mouseleave="showTooltip = false" aria-describedby="info-login">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M12 20a8 8 0 100-16 8 8 0 000 16z" /></svg>
                  <span class="sr-only">Info formulir</span>
                </button>
                {{-- <div x-show="showTooltip" x-cloak x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" class="absolute z-10 top-full mt-2 left-1/2 -translate-x-1/2 w-max max-w-xs bg-white text-xs text-gray-700 p-3 rounded-md shadow-lg border border-gray-100" role="tooltip" id="info-login">
                  Masukkan email atau username dan kata sandi. Ini hanya demo UI — tidak melakukan panggilan backend.
                </div> --}}
              </div>
            </div>

            <!-- Username / Email -->
            <div>
              <label for="identity" class="block text-sm font-medium text-gray-700">Email / Username</label>
              <div class="mt-1 relative">
                <input id="identity" name="identity" type="text" x-model="form.identity" @blur="validateIdentity()" @input="errors.identity = ''" placeholder="contoh@contoh.com atau username" aria-describedby="identity-note identity-error" :aria-invalid="Boolean(errors.identity).toString()" class="w-full px-4 py-2 pl-10 rounded-lg border border-gray-200 bg-gray-50 text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200" />
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 00-4.5 1.207"/></svg>
                </div>
              </div>
              <p id="identity-note" class="mt-1 text-xs text-gray-400">Masukkan email atau username yang terdaftar.</p>
              <p x-text="errors.identity" x-show="errors.identity" x-transition.opacity class="mt-2 text-sm text-red-600" id="identity-error" role="alert"></p>
            </div>

            <!-- Password dengan toggle show/hide -->
            <div>
              <div class="flex items-center justify-between">
                <label for="password" class="block text-sm font-medium text-gray-700">Kata Sandi</label>
                <div class="relative">
                  <button type="button" class="text-xs text-gray-500 inline-flex items-center gap-1 px-2 py-1 rounded hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500" @mouseenter="passwordTip = true" @mouseleave="passwordTip = false" aria-describedby="password-tip">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M12 20a8 8 0 100-16 8 8 0 000 16z" /></svg>
                    Tips
                  </button>
                  <div x-show="passwordTip" x-cloak x-transition class="absolute right-0 mt-12 w-64 text-xs bg-white border border-gray-200 rounded-md shadow-lg p-3 text-gray-600" role="tooltip" id="password-tip">
                    Tetap jaga kerahasiaan akun Anda.
                  </div>
                </div>
              </div>
              <div class="mt-1 relative">
                <input id="password" :type="showPassword ? 'text' : 'password'" x-model="form.password" @input="updatePasswordStrength($event)" @keyup="checkCaps($event)" @keydown="checkCaps($event)" name="password" aria-describedby="password-error" :aria-invalid="Boolean(errors.password).toString()" placeholder="Masukkan kata sandi" class="w-full px-4 py-2 pl-10 rounded-lg border border-gray-200 bg-gray-50 text-gray-900 placeholder-gray-400 pr-12 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200" />
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                </div>
                <button type="button" @click="showPassword = !showPassword" :aria-pressed="showPassword.toString()" class="absolute right-2 top-1/2 -translate-y-1/2 p-2 rounded-full text-gray-500 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-colors" aria-label="Tampilkan / Sembunyikan kata sandi">
                  <svg x-show="!showPassword" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                  <svg x-show="showPassword" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.477 0-8.268-2.943-9.542-7a9.959 9.959 0 012.223-3.5M6.88 6.88A9.959 9.959 0 0112 5c4.477 0 8.268 2.943 9.542 7-.245.78-.57 1.52-.96 2.21"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3l18 18"/></svg>
                </button>
              </div>
              <p x-text="errors.password" x-show="errors.password" x-transition.opacity class="mt-2 text-sm text-red-600" id="password-error" role="alert"></p>
              <p x-show="capsLock" x-transition.opacity class="mt-1 text-xs text-amber-600">Caps Lock aktif.</p>
              <div x-show="form.password" x-transition class="mt-2">
                <div class="h-1.5 w-full rounded-full bg-gray-200 overflow-hidden">
                  <div :class="passwordStrength.color" class="h-full rounded-full transition-all duration-300" :style="`width: ${passwordStrength.score * 25}%`"></div>
                </div>
                <div class="mt-1 flex items-center justify-between text-xs">
                  <span class="text-gray-500" x-text="`Kekuatan: ${passwordStrength.label}`"></span>
                  <span class="text-gray-400" x-show="passwordStrength.suggestions" x-text="passwordStrength.suggestions"></span>
                </div>
              </div>
            </div>

            <!-- Remember & Forgot -->
            <div class="flex items-center justify-between">
              <label class="inline-flex items-center text-sm">
                <input type="checkbox" x-model="form.remember" class="h-4 w-4 rounded text-indigo-600 focus:ring-indigo-500 border-gray-300 bg-gray-50" />
                <span class="ml-2 text-gray-700">Ingat saya</span>
              </label>
              <button type="button" @click="openForgot()" class="text-sm text-indigo-600 hover:underline focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 rounded">Lupa kata sandi?</button>
            </div>

            <!-- Submit (various states: default, hover, active, disabled, loading) -->
            <div>
              <button :disabled="loading || !canSubmit()" :class="(loading || !canSubmit()) ? 'opacity-60 cursor-not-allowed' : 'hover:shadow-md active:scale-[0.98] transition-all duration-200'" type="submit" class="w-full inline-flex items-center justify-center gap-2 px-4 py-2 bg-indigo-600 text-white rounded-lg font-semibold focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 shadow-lg">
                <svg x-show="!loading" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M12 5l7 7-7 7" /></svg>
                <svg x-show="loading" xmlns="http://www.w3.org/2000/svg" class="animate-spin w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"><circle cx="12" cy="12" r="10" stroke-width="4" stroke-opacity="0.25"/><path d="M4 12a8 8 0 018-8" stroke-width="4" stroke-linecap="round"/></svg>
                <span x-text="loading ? 'Memproses...' : 'Masuk'">Masuk</span>
              </button>
            </div>

            <!-- Or divider -->
            <div class="flex items-center gap-3 text-gray-400">
              <hr class="flex-1 border-gray-200" />
              <span class="text-xs">atau masuk dengan</span>
              <hr class="flex-1 border-gray-200" />
            </div>

            <!-- Social login buttons (dummy) -->
            <div class="grid grid-cols-2 gap-3">
              <button type="button" @click="social('google')" class="inline-flex items-center justify-center gap-2 px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-indigo-500 text-gray-700 hover:bg-gray-50 active:scale-[0.98] transition-all duration-200">
                <!-- Google SVG small -->
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 533.5 544.3" aria-hidden="true"><path fill="#4285f4" d="M533.5 278.4c0-17.4-1.6-34.2-4.6-50.4H272v95.6h146.9c-6.4 34-25.3 62.8-54.1 82v68h87.2c51-47 80-116 80-195.2z"/><path fill="#34a853" d="M272 544.3c73.6 0 135.4-24.3 180.6-66.1l-87.2-68c-24 16.2-55 25.7-93.4 25.7-71.8 0-132.7-48.4-154.5-113.6H28.5v71.2C73 487 164.6 544.3 272 544.3z"/><path fill="#fbbc04" d="M117.5 324.8c-9.6-28.3-9.6-58.7 0-87l-88-71.2C4.2 208.6 0 239.4 0 272s4.2 63.4 29.5 105.4l88-71.2z"/><path fill="#ea4335" d="M272 108.6c39.9 0 75.9 13.7 104.3 40.6l78.9-78.9C403.1 24.6 340.8 0 272 0 164.6 0 73 57.3 28.5 142.8l88 71.2C139.3 157 200.2 108.6 272 108.6z"/></svg>
                <span class="text-sm">Google</span>
              </button>

              <button type="button" @click="social('github')" class="inline-flex items-center justify-center gap-2 px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-indigo-500 text-gray-700 hover:bg-gray-50 active:scale-[0.98] transition-all duration-200">
                <!-- GitHub Icon -->
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true"><path fill="currentColor" d="M12 0C5.37 0 0 5.37 0 12c0 5.3 3.438 9.8 8.205 11.385.6.113.82-.263.82-.583 0-.287-.01-1.044-.016-2.05-3.338.726-4.042-1.61-4.042-1.61-.546-1.387-1.333-1.756-1.333-1.756-1.09-.745.083-.73.083-.73 1.205.085 1.84 1.236 1.84 1.236 1.07 1.833 2.809 1.303 3.495.997.108-.775.418-1.303.762-1.603-2.665-.3-5.466-1.333-5.466-5.931 0-1.31.468-2.381 1.236-3.221-.124-.303-.536-1.523.117-3.176 0 0 1.008-.322 3.301 1.23a11.5 11.5 0 013.003-.403c1.018.005 2.045.138 3.003.403 2.292-1.552 3.299-1.23 3.299-1.23.655 1.653.243 2.873.12 3.176.77.84 1.235 1.911 1.235 3.221 0 4.61-2.803 5.628-5.475 5.922.43.371.815 1.102.815 2.222 0 1.606-.014 2.9-.014 3.293 0 .323.216.702.825.583C20.565 21.796 24 17.297 24 12c0-6.63-5.37-12-12-12z"/></svg>
                <span class="text-sm">GitHub</span>
              </button>
            </div>

            <!-- Register link -->
            {{-- <p class="text-center text-sm text-gray-500">Belum punya akun? <a href="#" class="text-indigo-600 hover:underline font-medium" @click.prevent="goRegister()">Daftar</a></p> --}}
            <p class="text-center text-sm text-gray-500">Belum punya akun? <a href="#" class="text-indigo-600 hover:underline font-medium">Daftar</a></p>
          </form>
        </div>

        <!-- Footer (policy) -->
        <footer class="px-6 py-4 border-t border-gray-100 text-xs text-gray-500 text-center">
          <p>Dengan masuk, Anda menyetujui <a href="#" class="text-indigo-600 hover:underline">Syarat & Ketentuan</a> dan <a href="#" class="text-indigo-600 hover:underline">Kebijakan Privasi</a>.</p>
        </footer>

        <!-- Forgot password modal / drawer (dummy) -->
        <div x-show="forgotOpen" x-cloak x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="fixed inset-0 bg-black/50 flex items-end sm:items-center justify-center z-40 p-4">
          <div @click.away="forgotOpen = false" class="bg-white rounded-t-2xl sm:rounded-2xl p-6 w-full max-w-md shadow-lg border border-gray-100 transform transition-all duration-300">
            <div class="flex items-center justify-between">
              <h3 class="text-lg font-bold text-gray-900">Lupa Kata Sandi</h3>
              <button @click="forgotOpen = false" class="p-2 rounded-full text-gray-400 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-colors">
                <span class="sr-only">Tutup</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
              </button>
            </div>
            <p class="mt-2 text-sm text-gray-500">Hubungi Administrator Untuk Melakukan Reset Password</p>
            {{-- <div class="mt-4">
              <label for="fp-email" class="block text-sm font-medium text-gray-700">Email</label>
              <input id="fp-email" type="email" class="mt-1 w-full px-4 py-2 rounded-lg border border-gray-200 bg-gray-50 text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200" placeholder="email@contoh.com">
            </div>
            <div class="mt-5 flex justify-end gap-3">
              <button @click="forgotOpen=false" class="px-4 py-2 rounded-lg text-gray-600 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-colors">Batal</button>
              <button @click="consoleLog('Kirim instruksi lupa')" class="px-4 py-2 bg-indigo-600 text-white rounded-lg font-semibold hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors">Kirim</button>
            </div> --}}
          </div>
        </div>

        <!-- Toast -->
        <div aria-live="polite" class="fixed inset-0 flex items-start px-4 py-6 pointer-events-none sm:p-6 z-50">
          <div class="w-full flex flex-col items-center sm:items-start space-y-4">
            <div x-show="toast.show" x-cloak x-transition:enter="transform ease-out duration-300 transition" x-transition:enter-start="translate-y-[-2rem] opacity-0 sm:translate-y-0 sm:translate-x-2" x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" x-text="toast.message" class="pointer-events-auto max-w-sm w-full bg-white shadow-lg rounded-lg border border-gray-100 px-4 py-3 text-sm text-gray-800"></div>
          </div>
        </div>
      </div>
      {{-- information --}}
      <div class="block">
        <div class="relative isolate overflow-hidden rounded-2xl border border-slate-200 bg-gradient-to-br from-indigo-50 via-violet-50 to-sky-50 p-6 lg:p-10 shadow-sm">
          <div class="absolute -left-10 -top-10 h-56 w-56 rounded-full bg-indigo-300/20 blur-3xl"></div>
          <div class="absolute -bottom-16 -right-16 h-64 w-64 rounded-full bg-sky-300/20 blur-3xl"></div>
          <div class="relative">
            <h2 class="mb-3 text-xl lg:text-2xl font-semibold tracking-tight text-slate-800">Selamat datang kembali 👋</h2>
            <p class="max-w-md text-sm lg:text-base text-slate-600">Masuk untuk melanjutkan eksplorasi riset, proyek, dan publikasi terbaru.</p>
            <ul class="mt-4 lg:mt-6 space-y-2 text-xs lg:text-sm text-slate-600">
              <li class="flex items-start gap-2"><svg xmlns="http://www.w3.org/2000/svg" class="mt-0.5 h-4 w-4 lg:h-5 lg:w-5 text-emerald-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"></path></svg><span>Login dengan akun yang sudah terdaftar.</span></li>
              <li class="flex items-start gap-2"><svg xmlns="http://www.w3.org/2000/svg" class="mt-0.5 h-4 w-4 lg:h-5 lg:w-5 text-emerald-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"></path></svg><span>Validasi input dengan pesan error yang jelas.</span></li>
            </ul>
            
            <!-- Demo Credentials -->
            <div class="mt-6 lg:mt-8 p-3 lg:p-4 bg-white/50 rounded-xl border border-slate-200">
              <h3 class="text-xs lg:text-sm font-semibold text-slate-800 mb-2 lg:mb-3">Akun Demo Tersedia:</h3>
              <div class="space-y-1 lg:space-y-2 text-xs">
                <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-2">
                  <span class="font-medium text-slate-700">User 1:</span>
                  <span class="text-slate-600 text-xs">rizky_sulaeman@gmail.com / 12345678</span>
                </div>
                <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-2">
                  <span class="font-medium text-slate-700">User 2:</span>
                  <span class="text-slate-600 text-xs">testuser@gmail.com / testpass@123</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<!-- Tailwind/Alpine already included globally in layout; avoid duplicate includes that can cause conflicts -->

<!-- Alpine component logic (Alpine inlined) -->
<script>
  function loginForm(){
    return {
      showPassword: false,
      loading: false,
      forgotOpen: false,
      toast: { show: false, message: '' },
      showTooltip: false, // Tambahkan properti untuk mengontrol tooltip
      passwordTip: false,
      form: { identity: '', password: '', remember: false },
      errors: { identity: '', password: '' },
      capsLock: false,
      shake: false,
      passwordStrength: { score: 0, label: 'Sangat Lemah', color: 'bg-red-500', suggestions: '' },

      init(){
        // Force light mode by removing any leftover dark class and preference
        try { document.documentElement.classList.remove('dark'); localStorage.removeItem('dark-mode'); } catch(e) {}
        // Prefill remember + identity
        const savedRemember = localStorage.getItem('remember') === 'true';
        const savedIdentity = savedRemember ? (localStorage.getItem('identity') || '') : '';
        this.form.remember = savedRemember;
        this.form.identity = savedIdentity;

        // Watchers to persist
        this.$watch('form.remember', (val) => {
          localStorage.setItem('remember', val ? 'true' : 'false');
          if (!val) localStorage.removeItem('identity');
        });
        this.$watch('form.identity', (val) => {
          if (this.form.remember) localStorage.setItem('identity', val || '');
        });
      },

      validate(){
        this.errors.identity = '';
        this.errors.password = '';
        let ok = true;
        if(!this.form.identity || this.form.identity.trim().length < 3){
          this.errors.identity = 'Email atau username harus diisi (minimal 3 karakter).';
          ok = false;
        }
        if(!this.form.password || this.form.password.length < 6){
          this.errors.password = 'Kata sandi harus minimal 6 karakter.';
          ok = false;
        }
        return ok;
      },

      validateIdentity(){
        const value = (this.form.identity || '').trim();
        if (!value) {
          this.errors.identity = 'Email atau username tidak boleh kosong.';
          return;
        }
        if (value.includes('@')) {
          const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/;
          if (!emailRegex.test(value)) {
            this.errors.identity = 'Format email tidak valid.';
          }
        } else if (value.length < 3) {
          this.errors.identity = 'Username minimal 3 karakter.';
        }
      },

      async submit(){
        // basic frontend validation + states
        if(!this.validate()){
          this.showToast('Periksa kembali data yang dimasukkan.');
          this.shake = true; setTimeout(()=>{ this.shake = false }, 450);
          return;
        }
        this.loading = true;
        
        try {
          // Get CSRF token with fallback
          let csrfToken = '';
          const csrfMeta = document.querySelector('meta[name="csrf-token"]');
          if (csrfMeta) {
            csrfToken = csrfMeta.getAttribute('content');
          }
          
          // Fallback to hidden input if meta tag is not available
          if (!csrfToken) {
            const hiddenToken = document.querySelector('input[name="_token"]');
            if (hiddenToken) {
              csrfToken = hiddenToken.value;
            }
          }
          
          // Prepare headers
          const headers = {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
          };
          
          // Add CSRF token if available
          if (csrfToken) {
            headers['X-CSRF-TOKEN'] = csrfToken;
          }
          
          // Use relative URL to avoid domain issues with tunnel
          const loginUrl = "{{ route('login.submit') }}";
          const url = loginUrl.startsWith('http') ? loginUrl : window.location.origin + loginUrl;
          
          const response = await fetch(url, {
            method: 'POST',
            headers: headers,
            body: JSON.stringify(this.form),
            credentials: 'same-origin'
          });
          
          if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
          }
          
          const data = await response.json();
          
          if (data.success) {
            this.showToast(data.message);
            setTimeout(() => {
              window.location.href = data.redirect;
            }, 1000);
          } else {
            this.showToast(data.message);
            this.shake = true; 
            setTimeout(()=>{ this.shake = false }, 450);
          }
        } catch (error) {
          console.error('Login error:', error);
          
          // More specific error handling
          if (error.name === 'TypeError' && error.message.includes('Failed to fetch')) {
            this.showToast('Koneksi gagal. Periksa koneksi internet Anda atau coba refresh halaman.');
          } else if (error.message.includes('HTTP error! status: 419')) {
            this.showToast('Sesi telah berakhir. Silakan refresh halaman dan coba lagi.');
          } else if (error.message.includes('HTTP error! status: 422')) {
            this.showToast('Data yang dimasukkan tidak valid. Periksa kembali.');
          } else {
            this.showToast('Terjadi kesalahan. Silakan coba lagi.');
          }
          
          this.shake = true; 
          setTimeout(()=>{ this.shake = false }, 450);
        } finally {
          this.loading = false;
        }
      },

      social(provider){
        this.showToast('Masuk dengan ' + provider + ' (demo).');
        console.log('social login:', provider);
      },

      openForgot(){
        this.forgotOpen = true;
      },

      goRegister(){
        window.location.href = "{{ route('register') }}"; // Gunakan route() helper untuk URL
        this.showToast('Navigasi ke halaman Daftar (demo).');
        console.log('navigate: register');
      },

      checkCaps(event){
        if (event && typeof event.getModifierState === 'function') {
          this.capsLock = !!event.getModifierState('CapsLock');
        }
      },

      updatePasswordStrength(event){
        const value = this.form.password || '';
        const hasLower = /[a-z]/.test(value);
        const hasUpper = /[A-Z]/.test(value);
        const hasNumber = /[0-9]/.test(value);
        const hasSymbol = /[^A-Za-z0-9]/.test(value);
        
        let score = 0;
        
        // Base score for any password
        if (value.length > 0) score = 1;
        
        // Improved scoring system
        if (value.length >= 6) {
          let criteria = 0;
          if (hasLower) criteria++;
          if (hasUpper) criteria++;
          if (hasNumber) criteria++;
          if (hasSymbol) criteria++;
          
          // Score based on criteria met
          if (criteria >= 1 && value.length >= 6) score = 2;
          if (criteria >= 2 && value.length >= 6) score = 3;
          if (criteria >= 3 && value.length >= 8) score = 4;
        }
        
        const map = {
          0: { label: 'Kosong', color: 'bg-red-500', suggestions: '' },
          1: { label: 'Kata Sandi Sangat Lemah', color: 'bg-red-500', suggestions: 'Rubah kata sandi Anda Dengan Kata Sandi yang lebih kuat.' },
          2: { label: 'Kata Sandi Lemah', color: 'bg-amber-500', suggestions: 'Disarankan untuk mengganti kata sandi Anda.' },
          3: { label: 'Kata Sandi Baik', color: 'bg-emerald-500', suggestions: 'Kata sandi Anda sudah cukup kuat.' },
          4: { label: 'Kata Sandi Kuat', color: 'bg-emerald-600', suggestions: 'Kata sandi Anda sudah sangat kuat.' }
        };
        this.passwordStrength = { score, ...(map[score] || map[0]) };
      },

      canSubmit(){
        return (this.form.identity || '').trim().length >= 3 && (this.form.password || '').length >= 6;
      },

      showToast(message = ''){
        this.toast.message = message;
        this.toast.show = true;
        setTimeout(()=>{ this.toast.show = false }, 3000);
      },

      consoleLog(msg){ console.log(msg) }
    }
  }
</script>

@endsection
