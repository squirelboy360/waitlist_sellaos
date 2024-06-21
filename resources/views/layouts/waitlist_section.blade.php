@extends('layouts.app')

@section('content')
<div class="mx-auto max-w-7xl py-24 sm:px-6 sm:py-32 lg:px-8">
    <div class="relative isolate overflow-hidden bg-gray-900 px-6 pt-16 shadow-2xl sm:rounded-3xl sm:px-16 md:pt-24 lg:flex lg:gap-x-20 lg:px-24 lg:pt-0">
        <svg viewBox="0 0 1024 1024" class="absolute left-1/2 top-1/2 -z-10 h-[64rem] w-[64rem] -translate-y-1/2 sm:left-full sm:-ml-80 lg:left-1/2 lg:ml-0 lg:-translate-x-1/2 lg:translate-y-0" aria-hidden="true">
            <circle cx="512" cy="512" r="512" fill="url(#759c1415-0410-454c-8f7c-9a820de03641)" fill-opacity="0.7" />
            <defs>
                <radialGradient id="759c1415-0410-454c-8f7c-9a820de03641">
                    <stop stop-color="#7775D6" />
                    <stop offset="1" stop-color="#414EDE" />
                </radialGradient>
            </defs>
        </svg>
        <div class="mx-auto max-w-md text-center lg:mx-0 lg:flex-auto lg:py-32 lg:text-left">
            <h1 class="text-white font-extrabold text-4xl lg:text-6xl tracking-tight md:-mb-4 flex flex-col gap-3 items-center lg:items-start">
                <span class="relative">Open your shop</span>
                <span class="whitespace-nowrap relative">
                    <span class="mr-3 sm:mr-4 md:mr-5">in days,</span>
                    <span class="relative whitespace-nowrap">
                        <span class="absolute bg-neutral-content -left-2 -top-1 -bottom-1 -right-2 md:-left-3 md:-top-0 md:-bottom-0 md:-right-3 -rotate-1"></span>
                        <span class="relative text-neutral">not weeks</span>
                    </span>
                </span>
            </h1>
            <p class="mt-6 text-lg leading-8 text-gray-300">This tool would simplify your life as an entrepreneur by allowing you to create an inventory for your shop with your own unique product ID for easy product tracking, receive payments for your sales in any recognized payment method, and turn any device into a client machine for product checkouts.</p>
            <div class="mt-10 flex items-center justify-center gap-x-6 lg:justify-start">
                <form action="/waitlist" method="POST" class="flex items-center space-x-2">
                    @csrf
                    <input type="email" name="email" id="email" class="flex-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Email Address" required />
                    <button type="submit" class="rounded-md bg-white px-3.5 py-2.5 text-sm font-semibold text-gray-900 shadow-sm hover:bg-gray-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white">Join Waitlist</button>
                </form>                        
            </div>
            @if(session('success'))
                <div class="mt-4 text-green-500">
                    {{ session('success') }}
                </div>
            @endif
        </div>
        <div class="relative mt-16 h-80 lg:mt-8">
            <img class="absolute left-0 top-0 w-[57rem] max-w-none rounded-md bg-white/5 ring-1 ring-white/10" src="{{ asset('assets/shot2.png') }}" alt="App screenshot" width="1824" height="1080">
        </div>
    </div>
</div>

<div class="relative h-96 w-72 rounded-xl bg-gradient-to-br from-indigo-300 to-violet-300 mx-auto mt-8 tilt-card">
    <div class="absolute inset-4 grid place-content-center rounded-xl bg-white shadow-lg">
        <svg class="mx-auto text-4xl" fill="currentColor" viewBox="0 0 16 16">
            <path d="M5 1a2 2 0 0 0-2 2v1h1V3a1 1 0 0 1 1-1h2.293l.354.354a1.5 1.5 0 0 0 2.121 0L10.707 2H13a1 1 0 0 1 1 1v2.293l-.354.354a1.5 1.5 0 0 0 0 2.121l.354.354V13a1 1 0 0 1-1 1h-1v1h1a2 2 0 0 0 2-2V9.707l-.354-.354a1.5 1.5 0 0 0-2.121 0L12 10.293V9h-1v2.293l-.354.354a1.5 1.5 0 0 0 0 2.121l.354.354H9.707l-.354-.354a1.5 1.5 0 0 0-2.121 0L7 14.293V13H5v2a1 1 0 0 1-1-1v-2.293l.354-.354a1.5 1.5 0 0 0 0-2.121L4 9.707V7.707l-.354-.354a1.5 1.5 0 0 0-2.121 0L1 8.293V5a2 2 0 0 0 2-2h1V1H3zm8.707 1.707L11 3.414 9.707 2.707 11 1.707 12.707 3zM3.707 4L5 5.293 3.707 6.707 2 5l1.707-1zm1 9.707L5 12.414 6.293 13l-1.293 1.293L4.707 14z"/>
        </svg>
        <p class="text-center text-2xl font-bold">HOVER ME</p>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const ROTATION_RANGE = 32.5;
        const HALF_ROTATION_RANGE = 32.5 / 2;

        const tiltCard = document.querySelector('.tilt-card');
        const cardContent = tiltCard.querySelector('.absolute');

        tiltCard.addEventListener('mousemove', function (e) {
            const rect = tiltCard.getBoundingClientRect();
            const width = rect.width;
            const height = rect.height;
            const mouseX = (e.clientX - rect.left) * ROTATION_RANGE;
            const mouseY = (e.clientY - rect.top) * ROTATION_RANGE;
            const rX = (mouseY / height - HALF_ROTATION_RANGE) * -1;
            const rY = mouseX / width - HALF_ROTATION_RANGE;

            tiltCard.style.transform = `rotateX(${rX}deg) rotateY(${rY}deg)`;
        });

        tiltCard.addEventListener('mouseleave', function () {
            tiltCard.style.transform = 'rotateX(0deg) rotateY(0deg)';
        });
    });
</script>
@endsection
