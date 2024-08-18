<div x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }" x-init="$watch('darkMode', val => localStorage.setItem('darkMode', val))" :class="{ 'dark': darkMode }"
    class="bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-200">
    <!-- Hero Section -->
    <section class="relative bg-red-600 dark:bg-red-800 text-white">
        <div class="absolute inset-0 bg-gradient-to-r from-red-600 to-red-800 dark:from-red-800 dark:to-red-900">
        </div>
        <div class="relative container mx-auto px-6 py-24 md:py-32">
            <div class="max-w-3xl mx-auto text-center">
                <h1 class="text-4xl md:text-5xl font-extrabold mb-4">Drive Your Dreams</h1>
                <p class="text-xl mb-8">Experience the freedom of the open road with our premium car rentals</p>
                <a href="/car-list"
                    class="inline-block bg-white dark:bg-gray-800 text-red-600 dark:text-red-400 font-bold py-3 px-8 rounded-full hover:bg-red-100 dark:hover:bg-gray-700 transition duration-300 transform hover:scale-105">
                    Explore Our Fleet
                </a>
            </div>
        </div>
        <svg class="absolute bottom-0 w-full h-16 text-gray-100 dark:text-gray-900" viewBox="0 0 1440 80"
            xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
            <path fill="currentColor"
                d="M0,64L80,58.7C160,53,320,43,480,48C640,53,800,75,960,74.7C1120,75,1280,53,1360,42.7L1440,32L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z">
            </path>
        </svg>
    </section>

    <!-- Features Section -->
    <section class="py-16 md:py-24">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-12">Why Choose Us?</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                <!-- Feature 1: Wide Selection -->
                <div
                    class="text-center p-6 bg-white dark:bg-gray-800 rounded-lg shadow-lg transform transition duration-300 hover:scale-105">
                    <div class="text-red-600 dark:text-red-400 mb-4">
                        <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Wide Selection</h3>
                    <p class="text-gray-600 dark:text-gray-400">Choose from our diverse fleet of vehicles to suit your
                        needs</p>
                </div>
                <!-- Feature 2: Affordable Pricing -->
                <div
                    class="text-center p-6 bg-white dark:bg-gray-800 rounded-lg shadow-lg transform transition duration-300 hover:scale-105">
                    <div class="text-green-600 dark:text-green-400 mb-4">
                        <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 10h2a2 2 0 110 4H3v4h18v-4h-2a2 2 0 110-4h2V8H3v2z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Affordable Pricing</h3>
                    <p class="text-gray-600 dark:text-gray-400">Get competitive rates that match your budget</p>
                </div>
                <!-- Feature 3: 24/7 Customer Support -->
                <div
                    class="text-center p-6 bg-white dark:bg-gray-800 rounded-lg shadow-lg transform transition duration-300 hover:scale-105">
                    <div class="text-blue-600 dark:text-blue-400 mb-4">
                        <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.5a7.5 7.5 0 017.5 7.5c0 4.142-3.358 7.5-7.5 7.5S4.5 16.142 4.5 12 7.858 4.5 12 4.5zM12 9v3l2 2m-2 1v1">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">24/7 Customer Support</h3>
                    <p class="text-gray-600 dark:text-gray-400">We’re here to assist you any time, day or night</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Cars Section -->
    <section class="bg-gray-200 dark:bg-gray-800 py-16 md:py-24">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-12">Featured Cars</h2>
            @livewire('featured-car-list')
        </div>
    </section>

    <!-- CTA Section -->
    <section class="bg-red-600 dark:bg-red-800 text-white py-16 md:py-24">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Ready to Hit the Road?</h2>
            <p class="text-xl mb-8">Book your car now and start your journey</p>
            <a href="/car-list"
                class="inline-block bg-white dark:bg-gray-800 text-red-600 dark:text-red-400 font-bold py-3 px-8 rounded-full hover:bg-red-100 dark:hover:bg-gray-700 transition duration-300 transform hover:scale-105">
                Rent a Car
            </a>
        </div>
    </section>

    <x-footer />
</div>
