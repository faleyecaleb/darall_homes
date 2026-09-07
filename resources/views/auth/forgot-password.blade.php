<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-50">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Restore Portal Access | Darall Homes Limited</title>

    <!-- Google Fonts CDN (Plus Jakarta Sans & Playfair Display for Luxury Typography) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">

    <!-- Standard Vite Asset Bundling -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        .font-serif {
            font-family: 'Playfair Display', serif;
        }
    </style>
</head>
<body class="h-full text-slate-800 antialiased overflow-hidden select-none bg-[#f8fafc]">

    <!-- Dual Column Split Screen Layout (Desktop Visual Visualizer & Credentials Input) -->
    <div class="flex h-screen w-screen overflow-hidden">

        <!-- 1. LEFT PANEL: Cinematic Architectural Branding (Visible on Desktop/Tablet only) -->
        <div class="hidden lg:flex lg:w-[50%] xl:w-[55%] h-full relative overflow-hidden bg-slate-950 flex-col p-16 justify-between select-none">
            <!-- Full Screen High-Res Luxury Architectural Backdrop -->
            <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=1500&q=80" 
                 alt="Darall Luxury Manor Backdrop" 
                 class="absolute inset-0 h-full w-full object-cover opacity-85 mix-blend-luminosity scale-105 hover:scale-100 transition-transform duration-[10000ms] ease-out -z-10 animate-fade-in" />

            <!-- Custom Dark Glassmorphic Vignette Filter Overlay -->
            <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/50 to-slate-950/10 -z-10"></div>

            <!-- Panel Header Brand with Glow Pulse -->
            <div class="flex items-center gap-3.5 z-20 animate-fade-in">
                <div class="h-11 w-11 rounded-2xl bg-white/10 flex items-center justify-center text-white relative border border-white/5 shadow-lg shadow-brand/10 backdrop-blur-md">
                    <svg class="h-5 w-5 text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                </div>
                <div class="flex flex-col">
                    <span class="text-xl font-extrabold uppercase tracking-widest text-white leading-none">darall</span>
                    <span class="text-[9px] text-[#a7f3d0] font-bold mt-1 tracking-wider uppercase">Lagos Luxury Portfolio</span>
                </div>
            </div>

            <!-- Pitch Slogan Block (z-20) -->
            <div class="flex flex-col gap-6 z-20 max-w-lg mb-10 animate-slide-right delay-100">
                <div class="flex items-center gap-2 px-3 py-1.5 rounded-full bg-white/5 border border-white/10 w-max backdrop-blur-md">
                    <span class="h-1.5 w-1.5 rounded-full bg-amber-400 animate-pulse"></span>
                    <span class="text-[9px] font-extrabold uppercase tracking-widest text-slate-300">Management & Advisory Portal</span>
                </div>
                <h2 class="text-4xl xl:text-5xl font-serif font-extrabold text-white leading-[1.1] tracking-tight">Access restoration point.</h2>
                <p class="text-xs text-slate-300 leading-relaxed font-semibold">
                    Retrieve your operations credentials for Darall Homes Limited. Verify your registered inbox, follow your restore link, and establish a new passcode to secure your data and operations dashboard.
                </p>
            </div>

            <!-- Footer indicator branding -->
            <div class="flex items-center justify-between text-[11px] text-slate-400 font-bold z-20 select-none animate-fade-in delay-200">
                <span>&copy; {{ date('Y') }} Darall Homes Limited. All rights reserved.</span>
                <span class="flex items-center gap-1.5">
                    <span class="h-1.5 w-1.5 rounded-full bg-emerald-400 animate-ping"></span>
                    <span>System Online</span>
                </span>
            </div>
        </div>

        <!-- 2. RIGHT PANEL: Ultra-Sleek Secure Credentials Interface (Full Bleed on Mobile) -->
        <div class="w-full lg:w-[50%] xl:w-[45%] h-full bg-white flex flex-col justify-center p-8 sm:p-12 md:p-16 lg:p-16 xl:p-20 overflow-y-auto relative">
            
            <div class="max-w-md w-full mx-auto flex flex-col gap-8 animate-slide-up">
                <!-- Portal Logo (Only visible on mobile/tablets where left panel is hidden) -->
                <div class="flex lg:hidden items-center gap-3.5 select-none mb-4">
                    <div class="h-11 w-11 rounded-2xl bg-brand-dark flex items-center justify-center text-white relative shadow-lg shadow-slate-900/10">
                        <svg class="h-5 w-5 text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-xl font-extrabold uppercase tracking-widest text-slate-900 leading-none">darall</span>
                        <span class="text-[9px] text-[#0d6e60] font-bold mt-1 tracking-wider uppercase">Lagos Operations Portal</span>
                    </div>
                </div>

                <!-- Headline greetings intro -->
                <div class="flex flex-col text-left">
                    <span class="text-xs font-extrabold uppercase tracking-widest text-slate-400">Restore Credentials</span>
                    <h1 class="text-3xl font-serif font-extrabold text-slate-900 tracking-tight mt-1">Restore Access</h1>
                    <p class="text-xs text-slate-500 mt-2 font-medium">Forgot your password? No problem. Enter your registered email address and we will generate and email a secure password reset link directly to your inbox.</p>
                </div>

                <!-- Backend Session Status Alerts -->
                @if (session('status'))
                    <div class="p-4 rounded-xl bg-emerald-50 border border-emerald-100 text-emerald-700 text-xs font-semibold flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                        {{ session('status') }}
                    </div>
                @endif

                <!-- Validation Errors Alert Block -->
                @if ($errors->any())
                    <div class="p-4 rounded-xl bg-rose-50 border border-rose-100 text-rose-700 text-xs font-semibold flex flex-col gap-1">
                        <div class="flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-rose-500 animate-pulse"></span>
                            <span>Restore request failed. Please check:</span>
                        </div>
                        <ul class="list-disc pl-5 mt-1 space-y-0.5 font-medium text-[11px] text-rose-600">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Interactive Forgot Password Form Card (Direct POST Action to routes) -->
                <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
                    @csrf

                    <!-- Email Input Group -->
                    <div class="flex flex-col gap-1.5">
                        <label for="email" class="text-[10px] font-extrabold uppercase tracking-widest text-slate-500">Email Address</label>
                        <div class="relative flex items-center">
                            <span class="absolute left-4 text-slate-400">
                                <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.206" />
                                </svg>
                            </span>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus 
                                   placeholder="agent@darallhomes.com" 
                                   class="w-full bg-slate-50 border border-slate-200 rounded-2xl pl-12 pr-4 py-4 text-sm text-slate-700 placeholder-slate-450 focus:outline-none focus:ring-2 focus:ring-brand-dark focus:bg-white transition-all font-medium" />
                        </div>
                    </div>

                    <!-- Action and Back links -->
                    <div class="flex items-center justify-between font-sans">
                        <a href="{{ route('login') }}" class="text-xs font-bold text-slate-400 hover:text-brand transition-colors flex items-center gap-1">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            <span>Return to Sign In</span>
                        </a>
                    </div>

                    <!-- Authentic Submit button -->
                    <button type="submit" 
                            class="w-full inline-flex items-center justify-center px-6 py-4 text-sm font-bold text-white bg-brand-dark hover:bg-slate-800 hover:scale-[1.01] active:scale-[0.99] rounded-2xl shadow-lg shadow-slate-900/10 transition-all cursor-pointer border border-white/5">
                        Email Password Reset Link
                    </button>
                </form>
            </div>
            
            <!-- Secure Portal footer trademark -->
            <div class="absolute bottom-6 left-8 right-8 text-center text-[10px] text-slate-400 font-bold lg:hidden z-20">
                &copy; {{ date('Y') }} Darall Homes Operations. All Rights Reserved.
            </div>

        </div>

    </div>

    <!-- Reusable Glassmorphism Toast notifications listener -->
    <x-toast-notification />

</body>
</html>
