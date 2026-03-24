<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Dynamic Title & Meta Tags -->
    <title>@yield('title', 'Union Lubricants - Premium Lubricant Solutions')</title>
    <meta name="description" content="@yield('meta_description', 'Union Lubricants provides premium lubricant solutions for industrial applications worldwide. Explore our products and find the perfect lubricant for your needs.')">
    <meta name="keywords" content="@yield('meta_keywords', 'lubricants, oils, industrial oils, motor oils, hydraulic oils, gear oils')">
    <meta name="author" content="Union Lubricants">
    <meta name="robots" content="index, follow">

    <!-- Open Graph Meta Tags (for social media sharing) -->
    <meta property="og:title" content="@yield('title', 'Union Lubricants')">
    <meta property="og:description" content="@yield('meta_description', 'Premium lubricant solutions for industries')">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="@yield('og_image', asset('images/og-image.jpg'))">
    <meta property="og:site_name" content="Union Lubricants">

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title', 'Union Lubricants')">
    <meta name="twitter:description" content="@yield('meta_description', 'Premium lubricant solutions for industries')">
    <meta name="twitter:image" content="@yield('og_image', asset('images/og-image.jpg'))">

    <!-- Canonical Tag -->
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Alternate Language Tags (if applicable) -->
    <link rel="alternate" hreflang="en-US" href="{{ url()->current() }}">

    <!-- Schema.org JSON-LD Markup (Organization) -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "Union Lubricants",
        "url": "{{ route('home') }}",
        "logo": "{{ asset('images/logo.png') }}",
        "description": "Premium lubricant solutions for industrial applications",
        "contactPoint": {
            "@type": "ContactPoint",
            "telephone": "+1-555-0000",
            "contactType": "Sales"
        },
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "123 Oil Lane",
            "addressLocality": "City",
            "addressRegion": "ST",
            "postalCode": "12345",
            "addressCountry": "US"
        },
        "sameAs": [
            "https://www.facebook.com/unionlubricants",
            "https://www.twitter.com/unionlubricants",
            "https://www.linkedin.com/company/unionlubricants"
        ]
    }
    </script>

    <!-- Page-Specific JSON-LD (yielded from child views) -->
    @yield('json_ld')

    <!-- Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-900">
    <!-- Navigation -->
    <nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a href="{{ route('home') }}" class="text-2xl font-bold text-blue-600">
                        Union Lubricants
                    </a>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex space-x-1">
                    <a href="{{ route('home') }}" class="px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('home') ? 'bg-blue-100 text-blue-700' : 'text-gray-700 hover:bg-gray-100' }}">
                        Home
                    </a>
                    <a href="{{ route('products.index') }}" class="px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('products.*') ? 'bg-blue-100 text-blue-700' : 'text-gray-700 hover:bg-gray-100' }}">
                        Products
                    </a>
                    <a href="{{ route('news.index') }}" class="px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('news.*') ? 'bg-blue-100 text-blue-700' : 'text-gray-700 hover:bg-gray-100' }}">
                        News
                    </a>
                    <a href="{{ route('contact.show') }}" class="px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('contact.*') ? 'bg-blue-100 text-blue-700' : 'text-gray-700 hover:bg-gray-100' }}">
                        Contact
                    </a>
                    <a href="{{ route('about') }}" class="px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('about') ? 'bg-blue-100 text-blue-700' : 'text-gray-700 hover:bg-gray-100' }}">
                        About
                    </a>
                </div>

                <!-- Auth Links -->
                <div class="flex items-center space-x-4">
                    @auth
                        <a href="{{ route('admin.dashboard') }}" class="px-3 py-2 rounded-md text-sm font-medium text-blue-600 hover:text-blue-700">
                            Admin
                        </a>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-100">
                                Logout
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-100">
                            Login
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Flash Messages -->
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    @if (session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    @endif

    <!-- Main Content -->
    <main class="min-h-screen">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white mt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Company Info -->
                <div>
                    <h3 class="text-lg font-bold mb-4">Union Lubricants</h3>
                    <p class="text-gray-400">Premium lubricant solutions for industrial applications worldwide.</p>
                </div>

                <!-- Quick Links -->
                <div>
                    <h3 class="text-lg font-bold mb-4">Quick Links</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="{{ route('home') }}" class="hover:text-white">Home</a></li>
                        <li><a href="{{ route('products.index') }}" class="hover:text-white">Products</a></li>
                        <li><a href="{{ route('news.index') }}" class="hover:text-white">News</a></li>
                        <li><a href="{{ route('contact.show') }}" class="hover:text-white">Contact</a></li>
                    </ul>
                </div>

                <!-- Products -->
                <div>
                    <h3 class="text-lg font-bold mb-4">Products</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-white">Motor Oils</a></li>
                        <li><a href="#" class="hover:text-white">Hydraulic Oils</a></li>
                        <li><a href="#" class="hover:text-white">Gear Oils</a></li>
                        <li><a href="#" class="hover:text-white">Industrial Oils</a></li>
                    </ul>
                </div>

                <!-- Contact -->
                <div>
                    <h3 class="text-lg font-bold mb-4">Contact</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li>Email: info@unionlubricants.com</li>
                        <li>Phone: +1-555-0000</li>
                        <li>Address: 123 Oil Lane, City, ST 12345</li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; {{ date('Y') }} Union Lubricants. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>

</html>
