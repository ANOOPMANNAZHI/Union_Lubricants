@extends('layouts.app')

@section('title', 'About Union Lubricants - Premium Lubrication Solutions')
@section('meta_description', 'Learn about Union Lubricants - a trusted provider of premium lubrication solutions for industrial and automotive applications worldwide.')

<div class="bg-white dark:bg-gray-900">
    <!-- Page Header -->
    <section class="bg-blue-600 text-white py-16 sm:py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl sm:text-5xl font-bold mb-4">About Union Lubricants</h1>
            <p class="text-lg text-blue-100">Your trusted partner in premium lubrication solutions</p>
        </div>
    </section>

    <!-- About Content -->
    <section class="py-16 sm:py-20 md:py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center mb-16">
                <div>
                    <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 dark:text-white mb-6">Our Mission</h2>
                    <p class="text-gray-600 dark:text-gray-300 text-lg mb-4">
                        At Union Lubricants, we are dedicated to providing premium quality lubricant solutions that protect and enhance the performance of equipment across diverse industries. Our commitment to excellence and innovation drives us to develop products that meet and exceed industry standards.
                    </p>
                    <p class="text-gray-600 dark:text-gray-300 text-lg">
                        We believe that superior lubrication is the foundation of equipment reliability, longevity, and operational efficiency. Our products are engineered to deliver exceptional protection, even in the most demanding conditions.
                    </p>
                </div>
                <div class="bg-gradient-to-br from-blue-400 to-blue-600 rounded-lg h-64 sm:h-80 md:h-96 flex items-center justify-center">
                    <svg class="w-32 h-32 text-white opacity-50" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v2h8v-2zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-2a4 4 0 00-8 0v2a2 2 0 002 2h4a2 2 0 002-2z" />
                    </svg>
                </div>
            </div>

            <!-- Values Section -->
            <div class="mb-16">
                <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 dark:text-white mb-12 text-center">Our Core Values</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-8">
                        <div class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-2.77 3.066 3.066 0 00-3.58 3.03A3.066 3.066 0 006.267 3.455zm9.8 9.684a4.5 4.5 0 07-5.742-7.112 4.5 4.5 0 00-3.962 7.743h.38a4.5 4.5 0 019.324 0z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Quality</h3>
                        <p class="text-gray-600 dark:text-gray-300">We maintain the highest standards in product development and manufacturing to ensure superior quality in every batch.</p>
                    </div>

                    <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-8">
                        <div class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v2h8v-2zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-2a4 4 0 00-8 0v2a2 2 0 002 2h4a2 2 0 002-2z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Integrity</h3>
                        <p class="text-gray-600 dark:text-gray-300">We conduct our business with transparency and honesty, building lasting relationships based on trust with our customers.</p>
                    </div>

                    <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-8">
                        <div class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M12.316 3.051a1 1 0 01.633 1.265l-4 12a1 1 0 11-1.898-.632l4-12a1 1 0 011.265-.633zM5.707 6.293a1 1 0 010 1.414L3.414 10l2.293 2.293a1 1 0 11-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0zm8.586 0a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 11-1.414-1.414L16.586 10l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Innovation</h3>
                        <p class="text-gray-600 dark:text-gray-300">We continuously invest in research and development to create cutting-edge lubricant solutions for evolving market needs.</p>
                    </div>
                </div>
            </div>

            <!-- Industries Served -->
            <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-8 sm:p-12 mb-16">
                <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 dark:text-white mb-8 text-center">Industries We Serve</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="flex items-start">
                        <svg class="w-6 h-6 text-blue-600 dark:text-blue-400 mt-1 mr-4 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Automotive</h3>
                            <p class="text-gray-600 dark:text-gray-300">Premium engine oils and fluids for cars, trucks, and commercial vehicles</p>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <svg class="w-6 h-6 text-blue-600 dark:text-blue-400 mt-1 mr-4 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Manufacturing</h3>
                            <p class="text-gray-600 dark:text-gray-300">Industrial lubricants for machinery and production equipment</p>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <svg class="w-6 h-6 text-blue-600 dark:text-blue-400 mt-1 mr-4 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Mining</h3>
                            <p class="text-gray-600 dark:text-gray-300">Heavy-duty lubricants for demanding mining operations</p>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <svg class="w-6 h-6 text-blue-600 dark:text-blue-400 mt-1 mr-4 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Construction</h3>
                            <p class="text-gray-600 dark:text-gray-300">Specialized lubricants for construction equipment</p>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <svg class="w-6 h-6 text-blue-600 dark:text-blue-400 mt-1 mr-4 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Marine</h3>
                            <p class="text-gray-600 dark:text-gray-300">Marine-grade lubricants for vessels and offshore operations</p>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <svg class="w-6 h-6 text-blue-600 dark:text-blue-400 mt-1 mr-4 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Agriculture</h3>
                            <p class="text-gray-600 dark:text-gray-300">Lubricants for tractors and agricultural equipment</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Call to Action -->
            <div class="bg-gradient-to-r from-blue-600 to-blue-800 rounded-lg text-white p-8 sm:p-12 text-center">
                <h2 class="text-2xl sm:text-3xl font-bold mb-4">Want to learn more about our products?</h2>
                <p class="text-lg text-blue-100 mb-6">Explore our comprehensive product catalog and find the perfect solution for your needs</p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('products.index') }}" class="px-8 py-3 bg-white text-blue-600 hover:bg-gray-100 font-semibold rounded-lg transition duration-200">
                        Browse Products
                    </a>
                    <a href="{{ route('contact.show') }}" class="px-8 py-3 bg-blue-700 hover:bg-blue-800 font-semibold rounded-lg transition duration-200">
                        Contact Us
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>
