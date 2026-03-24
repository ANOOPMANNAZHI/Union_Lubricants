@extends('layouts.app')

@section('title', 'Union Lubricants - Premium Lubrication Solutions')
@section('meta_description', 'Premium quality lubricants for automotive, industrial, mining, and construction applications. Trust Union Lubricants for superior equipment protection.')

<div class="bg-white dark:bg-gray-900">
    <!-- Hero Section -->
    <section class="relative h-screen flex items-center justify-center bg-gradient-to-r from-blue-600 to-blue-800">
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute inset-0 bg-black opacity-40"></div>
        </div>
        <div class="relative z-10 text-center text-white px-4 sm:px-6 lg:px-8 max-w-4xl">
            <h1 class="text-4xl sm:text-5xl md:text-6xl font-bold mb-6">Premium Lubrication Solutions</h1>
            <p class="text-lg sm:text-xl md:text-2xl mb-8 text-blue-100">Protect your equipment with Union Lubricants - trusted by industries worldwide</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('products.index') }}" class="px-8 py-3 bg-blue-600 hover:bg-blue-700 rounded-lg font-semibold transition duration-200">
                    Browse Products
                </a>
                <a href="{{ route('contact.show') }}" class="px-8 py-3 bg-white text-blue-600 hover:bg-gray-100 rounded-lg font-semibold transition duration-200">
                    Get in Touch
                </a>
            </div>
        </div>
    </section>

    <!-- Featured Products Section -->
    @if($featuredProducts->count() > 0)
    <section class="py-16 sm:py-20 md:py-24 bg-gray-50 dark:bg-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 dark:text-white mb-4">Featured Products</h2>
                <p class="text-lg text-gray-600 dark:text-gray-400">Our most popular lubricant solutions</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($featuredProducts as $product)
                <div class="bg-white dark:bg-gray-700 rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                    <div class="h-48 bg-gradient-to-br from-gray-200 to-gray-300 dark:from-gray-600 dark:to-gray-700 flex items-center justify-center">
                        @if($product->image_path)
                            <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                        @else
                            <svg class="w-24 h-24 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" />
                            </svg>
                        @endif
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">{{ $product->name }}</h3>
                        <p class="text-gray-600 dark:text-gray-300 text-sm mb-4">{{ $product->short_description }}</p>
                        <div class="mb-4">
                            <span class="inline-block bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-100 text-xs font-semibold px-3 py-1 rounded-full">
                                {{ $product->category->name }}
                            </span>
                        </div>
                        <a href="{{ route('products.show', $product->slug) }}" class="block w-full text-center bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded-lg transition duration-200">
                            View Details
                        </a>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="text-center mt-12">
                <a href="{{ route('products.index') }}" class="inline-block px-8 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition duration-200">
                    View All Products
                </a>
            </div>
        </div>
    </section>
    @endif

    <!-- Categories Section -->
    @if($categories->count() > 0)
    <section class="py-16 sm:py-20 md:py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 dark:text-white mb-4">Product Categories</h2>
                <p class="text-lg text-gray-600 dark:text-gray-400">Find lubricants for your specific needs</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($categories as $category)
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-8 hover:shadow-xl transition duration-300">
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-3">{{ $category->name }}</h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">{{ $category->description }}</p>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mb-6">{{ $category->products_count ?? $category->products->count() }} products</p>
                    <a href="{{ route('products.by-category', $category->slug) }}" class="inline-block text-blue-600 dark:text-blue-400 font-semibold hover:text-blue-700 dark:hover:text-blue-300 transition duration-200">
                        Browse Category →
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Why Choose Us Section -->
    <section class="py-16 sm:py-20 md:py-24 bg-blue-600 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl sm:text-4xl font-bold mb-4">Why Choose Union Lubricants?</h2>
                <p class="text-lg text-blue-100">Industry-leading quality and expertise</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="inline-block bg-blue-500 rounded-full p-4 mb-4">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 11a3 3 0 110-6 3 3 0 010 6zm0 2c-4.418 0-8 1.79-8 4v1h16v-1c0-2.21-3.582-4-8-4z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Expert Support</h3>
                    <p class="text-blue-100">Dedicated team with years of industry experience</p>
                </div>

                <div class="text-center">
                    <div class="inline-block bg-blue-500 rounded-full p-4 mb-4">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v2h8v-2zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-2a4 4 0 00-8 0v2a2 2 0 002 2h4a2 2 0 002-2z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Quality Assurance</h3>
                    <p class="text-blue-100">Stringent testing ensures premium product quality</p>
                </div>

                <div class="text-center">
                    <div class="inline-block bg-blue-500 rounded-full p-4 mb-4">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5 2a1 1 0 011 1v1h1a1 1 0 010 2H6v1a1 1 0 0-2 0V6H3a1 1 0 010-2h1V3a1 1 0 011-1zm0 10a1 1 0 011 1v1h1a1 1 0 110 2H6v1a1 1 0 11-2 0v-1H3a1 1 0 110-2h1v-1a1 1 0 011-1zM12 2a1 1 0 01.967.25l4 6A1 1 0 0117 9h-1v5a2 2 0 11-4 0V9h-1a1 1 0 01-.967-1.75l4-6z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Innovation</h3>
                    <p class="text-blue-100">Continuously developing advanced formulations</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Latest Blog Posts Section -->
    @if($latestPosts->count() > 0)
    <section class="py-16 sm:py-20 md:py-24 bg-gray-50 dark:bg-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 dark:text-white mb-4">Latest News & Updates</h2>
                <p class="text-lg text-gray-600 dark:text-gray-400">Stay informed about lubricant industry trends</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($latestPosts as $post)
                <div class="bg-white dark:bg-gray-700 rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                    <div class="h-48 bg-gradient-to-br from-gray-200 to-gray-300 dark:from-gray-600 dark:to-gray-700 flex items-center justify-center">
                        @if($post->featured_image)
                            <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
                        @else
                            <svg class="w-24 h-24 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.3A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                            </svg>
                        @endif
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">{{ $post->title }}</h3>
                        <p class="text-gray-600 dark:text-gray-300 text-sm mb-4">{{ $post->excerpt ?? substr($post->content, 0, 100) . '...' }}</p>
                        <div class="flex items-center justify-between">
                            <span class="text-xs text-gray-500 dark:text-gray-400">
                                {{ $post->published_at?->format('M d, Y') ?? $post->created_at->format('M d, Y') }}
                            </span>
                            <a href="{{ route('news.show', $post->slug) }}" class="text-blue-600 dark:text-blue-400 font-semibold hover:text-blue-700 dark:hover:text-blue-300 transition duration-200">
                                Read More →
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="text-center mt-12">
                <a href="{{ route('news.index') }}" class="inline-block px-8 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition duration-200">
                    View All Articles
                </a>
            </div>
        </div>
    </section>
    @endif

    <!-- Call to Action Section -->
    <section class="py-16 sm:py-20 md:py-24 bg-gradient-to-r from-blue-700 to-blue-900 text-white">
        <div class="max-w-4xl mx-auto text-center px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl sm:text-4xl font-bold mb-6">Ready to Optimize Your Equipment?</h2>
            <p class="text-lg text-blue-100 mb-8">Contact our expert team to find the perfect lubricant solution for your needs</p>
            <a href="{{ route('contact.show') }}" class="inline-block px-8 py-3 bg-white text-blue-600 hover:bg-gray-100 font-semibold rounded-lg transition duration-200">
                Get in Touch Today
            </a>
        </div>
    </section>
</div>
