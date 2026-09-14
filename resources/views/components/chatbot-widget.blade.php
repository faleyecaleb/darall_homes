<!-- Premium Floating AI Chatbot Widget (hoomeee x Cognify World-Class Premium Dark/Gold Theme) -->
<div x-data="chatbotWidget" class="fixed bottom-6 right-6 z-[90] font-sans">

    <!-- 1. Floating Circular Chat Orb (Trigger Button) - Premium Brand-Dark Theme -->
    <button @click="open = !open" 
            class="h-14 w-14 rounded-full bg-brand-dark hover:bg-slate-800 hover:scale-110 active:scale-95 text-white flex items-center justify-center shadow-2xl transition-all duration-300 transform group relative border border-white/10">
        <!-- Floating pulsing ring -->
        <span class="absolute inset-0 rounded-full bg-brand-red-500/20 animate-ping -z-10"></span>
        
        <!-- Premium slide-in tooltip label on hover -->
        <span class="absolute right-16 scale-0 group-hover:scale-100 transition-all duration-300 origin-right bg-brand-dark border border-white/10 text-white text-[10px] font-bold py-1.5 px-3.5 rounded-xl whitespace-nowrap shadow-2xl select-none pointer-events-none">
            Chat with Darall AI
        </span>

        <!-- Toggle SVG Icons -->
        <!-- Chat Icon (Universal Sleek Conversation Bubble Icon) -->
        <svg x-show="!open" class="h-6 w-6 text-brand-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
        </svg>
        <!-- Close Icon -->
        <svg x-show="open" style="display: none;" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>

    <!-- 2. Premium Chat Interface Panel (Cognify x hoomeee Premium Light/Gold Theme) -->
    <div x-show="open"
         x-transition:enter="transition ease-out duration-300 transform"
         x-transition:enter-start="translate-y-12 scale-95 opacity-0"
         x-transition:enter-end="translate-y-0 scale-100 opacity-100"
         x-transition:leave="transition ease-in duration-200 transform"
         x-transition:leave-start="translate-y-0 scale-100 opacity-100"
         x-transition:leave-end="translate-y-12 scale-95 opacity-0"
         class="absolute bottom-20 right-0 max-w-md w-[92vw] sm:w-[380px] md:w-[420px] bg-white border border-slate-100 rounded-[2.5rem] shadow-[0_25px_60px_-15px_rgba(0,0,0,0.12)] flex flex-col h-[520px] sm:h-[600px] overflow-hidden"
         style="display: none;">

        <!-- Brand Panel Header - Sleek Executive Brand-Dark with Warm Golden Accents -->
        <div class="p-6 bg-brand-dark text-white border-b border-slate-900 flex items-center justify-between flex-shrink-0 shadow-lg shadow-black/10">
            <div class="flex items-center gap-3">
                <div class="h-10 w-10 rounded-2xl bg-white/5 flex items-center justify-center text-brand-red-400 relative border border-white/5">
                    <!-- Glowing Gold Active Spot -->
                    <span class="absolute top-0 right-0 h-2.5 w-2.5 rounded-full bg-brand-red-400 border-2 border-[#1c1c1e] animate-pulse"></span>
                    <!-- Chat silhouette icon -->
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg>
                </div>
                <div class="flex flex-col text-left">
                    <span class="text-sm font-extrabold uppercase tracking-widest font-sans text-white">Darall AI</span>
                    <span class="text-[9px] text-brand-red-400 font-bold mt-0.5 uppercase tracking-wider">Lagos Portfolio Guide</span>
                </div>
            </div>
            <!-- Close trigger -->
            <button @click="open = false" class="p-1 rounded-xl text-white/60 hover:text-white hover:bg-white/10 transition-all">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Scrollable Messages Feed -->
        <div x-ref="chatContainer" class="flex-1 overflow-y-auto p-6 space-y-5 bg-[#f8fafc]">
            
            <template x-for="(msg, index) in history" :key="index">
                <!-- Outer alignment container with entry fade/slide transition -->
                <div class="flex flex-col max-w-[85%] transition-all duration-300 ease-out transform"
                     :class="[
                        msg.role === 'user' ? 'self-end ml-auto' : 'self-start mr-auto',
                        msg.animate ? 'translate-y-2 opacity-0' : 'translate-y-0 opacity-100'
                     ]"
                     x-init="$el.classList.remove('translate-y-2', 'opacity-0')">
                    
                    <!-- Bubble wrapper with premium colors and custom Markdown/HTML Formatter -->
                    <div class="p-4 rounded-2xl text-[12px] font-semibold leading-relaxed shadow-sm font-sans"
                         :class="msg.role === 'user' ? 'bg-brand-dark text-white rounded-tr-none shadow-md shadow-slate-900/10' : 'bg-white border border-slate-100 text-slate-700 rounded-tl-none'">
                        <!-- Calling the advanced brand-HTML/Markdown parser! -->
                        <span x-html="formatMessage(msg.text)"></span>
                    </div>
                </div>
            </template>

            <!-- Typing Pulse Loading State -->
            <div x-show="loading" style="display: none;" class="flex items-center gap-1.5 p-4 bg-white rounded-2xl border border-slate-100 self-start max-w-[80px] shadow-sm rounded-tl-none animate-pulse">
                <span class="h-1.5 w-1.5 rounded-full bg-slate-400 animate-bounce"></span>
                <span class="h-1.5 w-1.5 rounded-full bg-slate-400 animate-bounce [animation-delay:0.2s]"></span>
                <span class="h-1.5 w-1.5 rounded-full bg-slate-400 animate-bounce [animation-delay:0.4s]"></span>
            </div>

            <!-- Quick Suggestion Prompts (Only visible on fresh start) -->
            <div x-show="history.length === 1 && !loading && !typing" class="flex flex-col gap-2 pt-2 animate-fade-in duration-500">
                <span class="text-[10px] font-extrabold uppercase tracking-widest text-slate-400 block mb-2 px-1">Suggested Inquiries:</span>
                <div class="flex flex-col gap-2">
                    <template x-for="prompt in quickPrompts">
                        <button type="button" :disabled="loading || typing" @click="sendMessage(prompt)" class="group w-full flex items-center justify-between px-5 py-3.5 text-xs font-bold text-slate-700 bg-white border border-slate-150 rounded-2xl hover:border-brand-red-500/30 hover:bg-slate-50 hover:translate-x-1 transition-all duration-200 text-left shadow-sm">
                            <span x-text="prompt"></span>
                            <svg class="h-4 w-4 text-slate-300 group-hover:text-brand-red-500 transition-colors transform group-hover:translate-x-1 duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                    </template>
                </div>
            </div>
        </div>

        <!-- Input Form Footer -->
        <div class="p-4 bg-white border-t border-slate-100 flex-shrink-0 flex flex-col gap-2">
            <form @submit.prevent="sendMessage()" class="flex items-center gap-2">
                <!-- Hands-free voice typing trigger -->
                <button type="button" 
                        @click="toggleVoiceDictation()" 
                        :disabled="loading || typing"
                        :class="[
                            listening ? 'bg-red-50 text-red-600 border-red-200 animate-pulse' : 'bg-slate-50 text-slate-400 border-slate-100 hover:text-slate-600 hover:bg-slate-100',
                            (loading || typing) ? 'opacity-50 cursor-not-allowed hover:bg-slate-50 hover:text-slate-400' : ''
                        ]"
                        class="h-11 w-11 rounded-xl border flex items-center justify-center flex-shrink-0 transition-all duration-200"
                        title="Voice-to-Text Dictation">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z" />
                    </svg>
                </button>

                <input type="text" name="message" x-model="message" :disabled="loading || typing" placeholder="Ask Darall about listings or investments..." class="flex-1 bg-slate-50 border border-slate-100 rounded-2xl px-4 py-4 text-xs text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#1c1c1e] focus:bg-white transition-all font-sans font-medium">
                
                <button type="submit" :disabled="loading || typing" :class="(loading || typing) ? 'opacity-50 cursor-not-allowed' : ''" class="h-12 w-12 rounded-xl bg-brand-dark hover:bg-slate-800 text-white flex items-center justify-center flex-shrink-0 transition-all active:scale-95 shadow-md border border-white/5">
                    <!-- Send vector arrow -->
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </button>
            </form>
            <!-- Voice assistant status notice -->
            <div x-show="listening" style="display: none;" class="text-[10px] text-red-500 font-bold text-center flex items-center justify-center gap-1">
                <span class="h-1.5 w-1.5 rounded-full bg-red-500 animate-ping"></span>
                <span>Listening actively... speak clearly now.</span>
            </div>
        </div>

    </div>

</div>

<!-- Isolated Javascript Script tag completely avoiding any inline HTML premature closing bugs! -->
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('chatbotWidget', () => ({
            open: false,
            message: '',
            loading: false,
            typing: false, // Tracks the word-by-word typewriter streaming state
            listening: false,
            recognition: null,
            history: [], // Message thread
            quickPrompts: [
                'What properties do you have in Lekki?',
                'Who is the CEO of Darall Homes?',
                'What is the company mission?',
                'How do I schedule an inspection?'
            ],
            init() {
                // Initial greeting with typewriter effect
                this.typewrite('Greetings! I am **Darall**, your private digital concierge for Darall Homes Limited. I can assist you with our luxury listings, investment acquisitions, and tour bookings. How can I guide you today?');
                
                // Configure HTML5 Speech Recognition for voice-to-text
                const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
                if (SpeechRecognition) {
                    this.recognition = new SpeechRecognition();
                    this.recognition.continuous = false;
                    this.recognition.lang = 'en-US';
                    this.recognition.interimResults = false;

                    this.recognition.onresult = async (event) => {
                        const voiceText = event.results[0][0].transcript;
                        this.message = voiceText;
                        if (voiceText.trim()) {
                            await this.sendMessage(voiceText);
                        }
                    };

                    this.recognition.onend = () => {
                        this.listening = false;
                    };

                    this.recognition.onerror = () => {
                        this.listening = false;
                    };
                }
            },
            toggleVoiceDictation() {
                if (!this.recognition) {
                    alert('Speech Recognition is not supported by your current browser. Please try Google Chrome or Microsoft Edge.');
                    return;
                }

                // If loading or typing, block speech recognition entirely!
                if (this.loading || this.typing) return;

                if (this.listening) {
                    this.recognition.stop();
                    this.listening = false;
                } else {
                    this.listening = true;
                    this.recognition.start();
                }
            },
            async sendMessage(text = null) {
                let msg = text || this.message;
                if (!msg.trim()) return;

                // Stop active listening if sending
                if (this.listening && this.recognition) {
                    this.recognition.stop();
                    this.listening = false;
                }

                // Instantly push user message with slide animation
                this.history.push({ role: 'user', text: msg, animate: true });
                if (!text) this.message = '';
                this.loading = true;
                this.typing = true; // Lock the conversation UI immediately

                // Scroll to bottom
                this.$nextTick(() => { this.scrollToBottom(); });

                try {
                    let response = await fetch('{{ route('chat') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            message: msg,
                            history: this.history.slice(0, -1).map(h => ({ role: h.role, text: h.text })) // Clean history for API
                        })
                    });

                    let result = await response.json();
                    
                    // Trigger typewriter effect for assistant response
                    this.typewrite(result.reply);

                } catch (error) {
                    this.typewrite('I apologize, but I encountered a connection issue. Please make sure your internet is stable, or feel free to contact our advisory team directly!');
                } finally {
                    this.loading = false;
                    this.$nextTick(() => { this.scrollToBottom(); });
                }
            },
            typewrite(text) {
                // Ensure typing lock is active during typewriter animation
                this.typing = true;
                
                // Add blank assistant message to history
                let index = this.history.push({ role: 'assistant', text: '', animate: true }) - 1;
                let words = text.split(' ');
                let current = '';
                let wordIndex = 0;
                
                // Staggered word-by-word streaming typewriter effect (ultra-smooth & lightweight)
                let timer = setInterval(() => {
                    if (wordIndex < words.length) {
                        current += (wordIndex === 0 ? '' : ' ') + words[wordIndex];
                        this.history[index].text = current;
                        wordIndex++;
                        this.scrollToBottom();
                    } else {
                        clearInterval(timer);
                        this.typing = false; // RELEASE the lock once typewriter typing is fully complete!
                        this.scrollToBottom();
                    }
                }, 15); // Fluid 15ms per word
            },
            formatMessage(text) {
                if (!text) return '';
                
                let formatted = text;

                // 1. Convert Markdown links [Label](url) into GORGEOUS, premium brand-red-gold clickable CTA buttons!
                formatted = formatted.replace(
                    /\[(.*?)\]\((.*?)\)/g, 
                    '<a href="$2" target="_blank" class="inline-flex items-center gap-1.5 px-4 py-2.5 text-[10px] font-extrabold uppercase tracking-wider text-slate-900 bg-brand-red-400 hover:bg-brand-red-500 rounded-xl my-2 shadow-md shadow-brand-red-500/10 transition-all transform hover:scale-[1.02] mr-1.5">$1</a>'
                );

                // 2. Format Bold text **text** into strong tags
                formatted = formatted.replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>');

                // 3. Format Subheaders (### Title) into modern bold tracking headers
                formatted = formatted.replace(/### (.*?)\n/g, '<h4 class="text-xs font-extrabold text-slate-900 mt-4 mb-2 uppercase tracking-wider block">$1</h4>');

                // 4. Format bullet points (* Item) into beautiful custom-spaced items with gold dots
                formatted = formatted.replace(/^\* (.*?)$/gm, '<div class="flex items-start gap-1.5 my-1.5 text-slate-600"><span class="text-brand-red-500 font-bold">•</span><span class="text-xs">$1</span></div>');

                // 5. Line breaks to HTML breaks
                formatted = formatted.replace(/\n/g, '<br>');

                return formatted;
            },
            scrollToBottom() {
                let container = this.$refs.chatContainer;
                if (container) {
                    container.scrollTo({
                        top: container.scrollHeight,
                        behavior: 'smooth'
                    });
                }
            }
        }));
    });
</script>
