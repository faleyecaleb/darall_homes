@extends('layouts.admin')

@section('title', 'Shortlet Reservations Manager')

@section('content')
<div class="flex flex-col gap-8 font-sans pb-10"
     x-data="{
        editingStatus: false,
        activeId: null,
        activeStatus: 'Pending',
        activePayment: 'Unpaid'
     }">
     
    <!-- Top Greeting Branding Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-3xl font-serif font-extrabold text-slate-900 tracking-tight">Shortlets Booking Grid</h1>
            <p class="text-sm text-slate-500 mt-1">Manage luxury hospitality checkouts, payment status, and check calendar availability schedules.</p>
        </div>
    </div>

    <!-- 1. VISUAL MONTHLY BOOKINGS CALENDAR VISUALIZATION (hoomeee x Cognify Premium Widget) -->
    <div class="bg-white border border-slate-100 rounded-[2.2rem] p-8 shadow-sm flex flex-col gap-6">
        @php
            $daysInMonth = $currentMonth->daysInMonth;
            $startOfWeek = $currentMonth->copy()->startOfMonth()->dayOfWeek; // 0 = Sunday, 6 = Sat
            $todayDate = date('Y-m-d');
            
            // Resolve previous and next month parameters
            $prevMonth = $currentMonth->copy()->subMonth();
            $nextMonth = $currentMonth->copy()->addMonth();
        @endphp

        <!-- Calendar Month Coordinator Bar -->
        <div class="flex items-center justify-between">
            <div class="flex flex-col text-left">
                <span class="text-xs font-extrabold uppercase tracking-widest text-slate-400">Availability Visualizer</span>
                <h3 class="text-xl font-extrabold text-slate-900 mt-1">{{ $currentMonth->format('F Y') }}</h3>
            </div>
            
            <!-- Month navigation button links -->
            <div class="flex items-center gap-2">
                <a href="{{ route('admin.bookings.index', ['month' => $prevMonth->month, 'year' => $prevMonth->year]) }}" 
                   class="p-2 rounded-xl border border-slate-200 text-slate-500 hover:bg-slate-50 hover:text-slate-900 transition-all"
                   title="Previous Month">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </a>
                
                <a href="{{ route('admin.bookings.index', ['month' => date('n'), 'year' => date('Y')]) }}" 
                   class="px-4 py-2 rounded-xl border border-slate-200 text-xs font-bold text-slate-600 hover:bg-slate-50 transition-all">
                    Today
                </a>

                <a href="{{ route('admin.bookings.index', ['month' => $nextMonth->month, 'year' => $nextMonth->year]) }}" 
                   class="p-2 rounded-xl border border-slate-200 text-slate-500 hover:bg-slate-50 hover:text-slate-900 transition-all"
                   title="Next Month">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
        </div>

        <!-- Monthly Days Grid Matrix -->
        <div class="grid grid-cols-7 gap-3">
            <!-- Weekdays Labels Header -->
            @foreach(['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'] as $dayName)
                <div class="text-center text-[10px] font-extrabold uppercase tracking-widest text-slate-400 py-1">{{ $dayName }}</div>
            @endforeach

            <!-- Blank Padding Cells for Days before Month Starts -->
            @for($i = 0; $i < $startOfWeek; $i++)
                <div class="aspect-square bg-slate-50/40 border border-slate-100/60 rounded-2xl"></div>
            @endfor

            <!-- Month Calendar Days -->
            @for($day = 1; $day <= $daysInMonth; $day++)
                @php
                    $dateString = sprintf('%04d-%02d-%02d', $year, $month, $day);
                    $carbonDate = \Carbon\Carbon::parse($dateString);
                    
                    // Filter bookings overlapping this specific day
                    $dayBookings = $activeReservations->filter(function($res) use ($dateString) {
                        $checkIn = $res->check_in_date->format('Y-m-d');
                        $checkOut = $res->check_out_date->format('Y-m-d');
                        return $dateString >= $checkIn && $dateString < $checkOut; // Checkout day is usually check-in for next guest
                    });
                    $isOccupied = $dayBookings->count() > 0;
                @endphp
                <div class="aspect-square border border-slate-100 p-2 flex flex-col justify-between rounded-2xl relative transition-all group hover:bg-slate-50/50 hover:shadow-sm {{ $todayDate === $dateString ? 'bg-amber-500/5 ring-1 ring-amber-500/20' : 'bg-white' }}">
                    <!-- Day Number -->
                    <span class="text-xs font-extrabold font-sans {{ $todayDate === $dateString ? 'text-amber-600' : 'text-slate-500' }}">{{ $day }}</span>
                    
                    <!-- Occupancy Ribbon Segment -->
                    @if($isOccupied)
                        <div class="flex flex-col gap-1 w-full mt-1">
                            @foreach($dayBookings as $res)
                                <div class="h-2 w-full rounded-lg bg-amber-500/10 border-l-2 border-amber-500 cursor-pointer flex items-center px-1 text-[8px] font-extrabold text-amber-700 truncate"
                                     title="Guest: {{ $res->customer_name }} | Unit: {{ $res->property->title }} ({{ $res->check_in_date->format('M d') }} - {{ $res->check_out_date->format('M d') }})">
                                    <span class="hidden sm:inline truncate">{{ $res->customer_name }}</span>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-[8px] text-slate-300 font-extrabold uppercase select-none px-1 tracking-wider text-right">Vacant</div>
                    @endif
                </div>
            @endfor
        </div>
    </div>

    <!-- 2. ACTIVE RESERVATIONS INDEX TABLE (Unified Pipeline CRM Grid) -->
    <div class="bg-white border border-slate-100 rounded-[2.2rem] p-8 shadow-sm flex flex-col gap-6">
        <div>
            <h3 class="text-xl font-extrabold text-slate-900 font-serif tracking-tight">Active Reservations Index</h3>
            <p class="text-sm text-slate-500 mt-1">Total Bookings Loaded: <strong class="text-slate-900 font-bold">{{ $bookings->count() }} Records</strong></p>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-slate-100 text-[10px] font-extrabold uppercase tracking-widest text-slate-400">
                        <th class="py-4">Guest Details</th>
                        <th class="py-4">Selected Property Suite</th>
                        <th class="py-4">Timeline Calendar</th>
                        <th class="py-4">Stay Value</th>
                        <th class="py-4">Booking Status</th>
                        <th class="py-4">Payment Status</th>
                        <th class="py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-xs font-semibold">
                    @forelse($bookings as $booking)
                        <tr class="text-slate-700 group hover:bg-slate-50/50 transition-colors">
                            <!-- Guest contact card -->
                            <td class="py-5 font-sans">
                                <span class="font-extrabold text-slate-900 text-sm block">{{ $booking->customer_name }}</span>
                                <span class="text-slate-400 font-medium block mt-0.5">{{ $booking->customer_email }}</span>
                                <span class="text-slate-400 font-medium block mt-0.5">{{ $booking->customer_phone }}</span>
                            </td>

                            <!-- Associated property suite details -->
                            <td class="py-5">
                                <span class="font-extrabold text-slate-900 block">{{ $booking->property->title }}</span>
                                <span class="text-slate-400 block mt-0.5">{{ $booking->property->location->name }}</span>
                            </td>

                            <!-- Dates ranges and duration check -->
                            <td class="py-5 font-sans">
                                <div class="flex items-center gap-1 text-slate-800 font-extrabold">
                                    <span>{{ $booking->check_in_date->format('M d, Y') }}</span>
                                    <span class="text-slate-300">➔</span>
                                    <span>{{ $booking->check_out_date->format('M d, Y') }}</span>
                                </div>
                                <span class="text-[10px] text-amber-600 font-extrabold uppercase mt-1 tracking-wider block bg-amber-500/10 px-2 py-0.5 rounded-lg w-max">
                                    {{ $booking->check_in_date->diffInDays($booking->check_out_date) }} Night(s) Stay
                                </span>
                            </td>

                            <!-- Total stay valuation -->
                            <td class="py-5 font-sans">
                                <span class="font-extrabold text-slate-900 text-sm block">₦{{ number_format($booking->total_price) }}</span>
                                <span class="text-[10px] text-slate-400 block mt-0.5">₦{{ number_format($booking->property->price) }} / Night</span>
                            </td>

                            <!-- Dynamic Status Inline drop coordinator -->
                            <td class="py-5">
                                <!-- Static Badge View Mode -->
                                <template x-if="!editingStatus || activeId !== '{{ $booking->id }}'">
                                    <button @click="editingStatus = true; activeId = '{{ $booking->id }}'; activeStatus = '{{ $booking->status }}'; activePayment = '{{ $booking->payment_status }}'" 
                                            class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-[10px] font-extrabold uppercase tracking-wider transition-all"
                                            :class="{
                                                'bg-amber-500/10 text-amber-600': '{{ $booking->status }}' === 'Pending',
                                                'bg-[#0d6e60]/10 text-[#0d6e60]': '{{ $booking->status }}' === 'Confirmed',
                                                'bg-rose-500/10 text-rose-600': '{{ $booking->status }}' === 'Cancelled',
                                                'bg-slate-500/10 text-slate-600': '{{ $booking->status }}' === 'Completed'
                                            }">
                                        <span class="h-1.5 w-1.5 rounded-full" :class="{
                                                'bg-amber-500 animate-pulse': '{{ $booking->status }}' === 'Pending',
                                                'bg-[#0d6e60]': '{{ $booking->status }}' === 'Confirmed',
                                                'bg-rose-500': '{{ $booking->status }}' === 'Cancelled',
                                                'bg-slate-500': '{{ $booking->status }}' === 'Completed'
                                        }"></span>
                                        <span>{{ $booking->status }}</span>
                                    </button>
                                </template>

                                <!-- Interactive Dropdown Form for state updates -->
                                <template x-if="editingStatus && activeId === '{{ $booking->id }}'">
                                    <form id="booking-form-{{ $booking->id }}" action="{{ route('admin.bookings.update', $booking->id) }}" method="POST" class="flex flex-col gap-1.5 w-32">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="payment_status" x-model="activePayment">
                                        <select name="status" x-model="activeStatus" @change="document.getElementById('booking-form-{{ $booking->id }}').submit()" class="bg-slate-50 border border-slate-200 rounded-xl px-2 py-1 text-[10px] font-bold uppercase text-slate-700 focus:outline-none focus:ring-1 focus:ring-brand focus:border-transparent transition-all">
                                            <option value="Pending">Pending</option>
                                            <option value="Confirmed">Confirmed</option>
                                            <option value="Completed">Completed</option>
                                            <option value="Cancelled">Cancelled</option>
                                        </select>
                                    </form>
                                </template>
                            </td>

                            <!-- Payment status selectors -->
                            <td class="py-5">
                                <template x-if="!editingStatus || activeId !== '{{ $booking->id }}'">
                                    <button @click="editingStatus = true; activeId = '{{ $booking->id }}'; activeStatus = '{{ $booking->status }}'; activePayment = '{{ $booking->payment_status }}'" 
                                            class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-[10px] font-extrabold uppercase tracking-wider transition-all"
                                            :class="{
                                                'bg-emerald-500/10 text-emerald-600': '{{ $booking->payment_status }}' === 'Paid',
                                                'bg-red-500/10 text-red-600': '{{ $booking->payment_status }}' === 'Unpaid',
                                                'bg-blue-500/10 text-blue-600': '{{ $booking->payment_status }}' === 'Refunded'
                                            }">
                                        <span>{{ $booking->payment_status }}</span>
                                    </button>
                                </template>

                                <template x-if="editingStatus && activeId === '{{ $booking->id }}'">
                                    <form id="payment-form-{{ $booking->id }}" action="{{ route('admin.bookings.update', $booking->id) }}" method="POST" class="flex flex-col gap-1.5 w-32">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="status" x-model="activeStatus">
                                        <select name="payment_status" x-model="activePayment" @change="document.getElementById('payment-form-{{ $booking->id }}').submit()" class="bg-slate-50 border border-slate-200 rounded-xl px-2 py-1 text-[10px] font-bold uppercase text-slate-700 focus:outline-none focus:ring-1 focus:ring-brand focus:border-transparent transition-all">
                                            <option value="Unpaid">Unpaid</option>
                                            <option value="Paid">Paid</option>
                                            <option value="Refunded">Refunded</option>
                                        </select>
                                    </form>
                                </template>
                            </td>

                            <!-- Remove Reservation Column Actions -->
                            <td class="py-5 text-right font-sans">
                                <div class="flex justify-end gap-1.5">
                                    <!-- Close Editor Button (if active) -->
                                    <template x-if="editingStatus && activeId === '{{ $booking->id }}'">
                                        <button @click="editingStatus = false; activeId = null" class="p-2 rounded-xl text-slate-400 hover:text-slate-900 hover:bg-slate-100 transition-colors" title="Cancel Editing">
                                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </template>

                                    <!-- Deletion trigger form -->
                                    <form action="{{ route('admin.bookings.destroy', $booking->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to completely remove this shortlet reservation from database?')" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 rounded-xl text-slate-400 hover:text-rose-600 hover:bg-rose-50 transition-colors" title="Delete Booking">
                                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-10 text-center text-slate-400 font-bold">
                                <div class="flex flex-col items-center justify-center gap-2">
                                    <svg class="h-10 w-10 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <span>No active bookings logged in this month's timeline.</span>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
