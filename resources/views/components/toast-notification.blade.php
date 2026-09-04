<div x-data="{ 
        show: false, 
        message: '', 
        type: 'success',
        init() {
            @if(session('success'))
                this.flash('{{ session('success') }}', 'success');
            @endif
            @if(session('error'))
                this.flash('{{ session('error') }}', 'error');
            @endif
            @if(session('warning'))
                this.flash('{{ session('warning') }}', 'warning');
            @endif

            window.addEventListener('notify', e => {
                this.flash(e.detail.message, e.detail.type || 'success');
            });
        },
        flash(message, type) {
            this.message = message;
            this.type = type;
            this.show = true;
            setTimeout(() => { this.show = false }, 5000);
        }
     }"
     x-show="show"
     x-transition:enter="transition ease-out duration-300 transform"
     x-transition:enter-start="translate-x-full opacity-0 scale-95"
     x-transition:enter-end="translate-x-0 opacity-100 scale-100"
     x-transition:leave="transition ease-in duration-200 transform"
     x-transition:leave-start="translate-x-0 opacity-100 scale-100"
     x-transition:leave-end="translate-x-full opacity-0 scale-95"
     class="fixed top-6 right-6 z-[100] max-w-sm w-[90%] sm:w-full bg-white/95 backdrop-blur-md rounded-2xl border border-slate-100 shadow-2xl p-4 flex gap-3.5 items-start font-sans"
     style="display: none;">

    <!-- Icon Indicator based on type -->
    <!-- 1. Success Icon -->
    <div x-show="type === 'success'" class="h-10 w-10 rounded-full bg-emerald-500/10 text-emerald-600 flex items-center justify-center flex-shrink-0">
        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
        </svg>
    </div>

    <!-- 2. Error Icon -->
    <div x-show="type === 'error'" style="display: none;" class="h-10 w-10 rounded-full bg-rose-500/10 text-rose-600 flex items-center justify-center flex-shrink-0">
        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </div>

    <!-- 3. Warning Icon -->
    <div x-show="type === 'warning'" style="display: none;" class="h-10 w-10 rounded-full bg-amber-500/10 text-amber-600 flex items-center justify-center flex-shrink-0">
        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
        </svg>
    </div>

    <!-- Content Area -->
    <div class="flex-1 flex flex-col gap-0.5 overflow-hidden">
        <span class="text-xs font-extrabold uppercase tracking-wider" 
              :class="type === 'success' ? 'text-emerald-600' : (type === 'error' ? 'text-rose-600' : 'text-amber-600')"
              x-text="type === 'success' ? 'Success Notification' : (type === 'error' ? 'Registry Error' : 'System Warning')">
        </span>
        <p class="text-xs text-slate-500 font-medium leading-relaxed" x-text="message"></p>
    </div>

    <!-- Close Trigger -->
    <button @click="show = false" class="p-1 rounded-lg text-slate-400 hover:text-slate-600 transition-colors">
        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>
</div>
