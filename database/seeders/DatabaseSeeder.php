<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\ProductCategory;
use App\Models\Industry;
use App\Models\Product;
use App\Models\Post;
use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Admin User
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@union-lubricants.local',
            'password' => bcrypt('password'),
        ]);

        // Create Demo User
        User::create([
            'name' => 'Demo User',
            'email' => 'demo@example.com',
            'password' => bcrypt('demo123'),
        ]);

        // Create Product Categories
        $categories = [
            [
                'name' => 'Engine Oils',
                'slug' => 'engine-oils',
                'description' => 'Premium quality engine oils for all vehicle types',
                'is_active' => true,
            ],
            [
                'name' => 'Hydraulic Fluids',
                'slug' => 'hydraulic-fluids',
                'description' => 'High-performance hydraulic fluids for industrial applications',
                'is_active' => true,
            ],
            [
                'name' => 'Transmission Oils',
                'slug' => 'transmission-oils',
                'description' => 'Specialized transmission and gearbox lubricants',
                'is_active' => true,
            ],
            [
                'name' => 'Coolants',
                'slug' => 'coolants',
                'description' => 'Engine coolants and antifreeze solutions',
                'is_active' => true,
            ],
            [
                'name' => 'Industrial Lubricants',
                'slug' => 'industrial-lubricants',
                'description' => 'Lubricants for industrial machinery and equipment',
                'is_active' => true,
            ],
        ];

        foreach ($categories as $category) {
            ProductCategory::create($category);
        }

        // Create Industries
        $industries = [
            [
                'name' => 'Automotive',
                'slug' => 'automotive',
                'description' => 'Lubricants for cars, trucks, and commercial vehicles',
            ],
            [
                'name' => 'Manufacturing',
                'slug' => 'manufacturing',
                'description' => 'Industrial lubricants for manufacturing plants',
            ],
            [
                'name' => 'Mining',
                'slug' => 'mining',
                'description' => 'Heavy-duty lubricants for mining equipment',
            ],
            [
                'name' => 'Construction',
                'slug' => 'construction',
                'description' => 'Lubricants for construction and heavy machinery',
            ],
            [
                'name' => 'Marine',
                'slug' => 'marine',
                'description' => 'Specialized lubricants for marine vessels',
            ],
            [
                'name' => 'Agriculture',
                'slug' => 'agriculture',
                'description' => 'Lubricants for agricultural equipment and tractors',
            ],
        ];

        foreach ($industries as $industry) {
            Industry::create($industry);
        }

        // Create Demo Products
        $products = [
            [
                'category_id' => 1,
                'name' => 'Premium Synthetic Engine Oil 5W-40',
                'slug' => 'premium-synthetic-engine-oil-5w-40',
                'code' => 'PSO-5W40-001',
                'short_description' => 'Advanced synthetic engine oil with superior protection and performance',
                'description' => 'Our premium synthetic engine oil provides excellent protection for modern engines. Formulated with advanced additive package to ensure optimal engine performance and longevity. Suitable for all weather conditions.',
                'viscosity_grade' => '5W-40',
                'pack_sizes' => json_encode(['1L', '5L', '10L', '20L', '50L']),
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'category_id' => 2,
                'name' => 'Hydraulic Fluid ISO 46',
                'slug' => 'hydraulic-fluid-iso-46',
                'code' => 'HF-ISO46-002',
                'short_description' => 'High-performance hydraulic fluid for industrial systems',
                'description' => 'Professional-grade hydraulic fluid meeting ISO 46 viscosity standards. Provides excellent lubrication, thermal stability, and protection against oxidation and corrosion.',
                'viscosity_grade' => 'ISO 46',
                'pack_sizes' => json_encode(['20L', '50L', '200L', '1000L']),
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'category_id' => 3,
                'name' => 'Automatic Transmission Fluid (ATF)',
                'slug' => 'automatic-transmission-fluid-atf',
                'code' => 'ATF-AUTO-003',
                'short_description' => 'Optimized ATF for smooth transmission operation',
                'description' => 'Specially formulated automatic transmission fluid that ensures smooth gear shifting and optimal transmission performance. Compatible with most modern automatic transmissions.',
                'viscosity_grade' => 'ATF',
                'pack_sizes' => json_encode(['1L', '5L', '10L', '20L']),
                'is_active' => true,
                'is_featured' => false,
            ],
            [
                'category_id' => 5,
                'name' => 'Industrial Gear Oil EP 220',
                'slug' => 'industrial-gear-oil-ep-220',
                'code' => 'IGO-EP220-004',
                'short_description' => 'Heavy-duty gear oil for industrial gearboxes',
                'description' => 'Premium industrial gear oil with extreme pressure (EP) additives. Designed for heavy-load applications in industrial machinery and equipment.',
                'viscosity_grade' => 'ISO 220',
                'pack_sizes' => json_encode(['20L', '50L', '200L', '1000L']),
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'category_id' => 4,
                'name' => 'Engine Coolant 50/50 Mix',
                'slug' => 'engine-coolant-50-50-mix',
                'code' => 'EC-5050-005',
                'short_description' => 'Pre-mixed coolant and antifreeze solution',
                'description' => 'Ready-to-use engine coolant with 50% glycol and 50% water mixture. Provides excellent freeze protection and corrosion resistance for all vehicle types.',
                'viscosity_grade' => null,
                'pack_sizes' => json_encode(['1L', '5L', '20L']),
                'is_active' => true,
                'is_featured' => false,
            ],
            [
                'category_id' => 5,
                'name' => 'Spindle Oil ISO 32',
                'slug' => 'spindle-oil-iso-32',
                'code' => 'SO-ISO32-006',
                'short_description' => 'Precision spindle oil for machine tools',
                'description' => 'High-precision spindle oil for machine tool applications. Provides superior lubrication at high speeds while maintaining excellent thermal stability.',
                'viscosity_grade' => 'ISO 32',
                'pack_sizes' => json_encode(['5L', '20L', '50L']),
                'is_active' => true,
                'is_featured' => false,
            ],
            [
                'category_id' => 5,
                'name' => 'Mining Equipment Lubricant',
                'slug' => 'mining-equipment-lubricant',
                'code' => 'MEL-HEAVY-007',
                'short_description' => 'Extreme-duty lubricant for mining operations',
                'description' => 'Specially formulated for harsh mining conditions. Provides superior wear protection and extended oil change intervals in demanding mining equipment.',
                'viscosity_grade' => 'ISO 220',
                'pack_sizes' => json_encode(['50L', '200L', '1000L']),
                'is_active' => true,
                'is_featured' => false,
            ],
            [
                'category_id' => 5,
                'name' => 'Biodegradable Chain Saw Oil',
                'slug' => 'biodegradable-chain-saw-oil',
                'code' => 'BCSO-ECO-008',
                'short_description' => 'Eco-friendly lubricant for chainsaw applications',
                'description' => 'Environmentally safe chain saw oil that biodegrades naturally. Perfect for forestry and landscaping operations with minimal environmental impact.',
                'viscosity_grade' => null,
                'pack_sizes' => json_encode(['1L', '5L', '20L']),
                'is_active' => true,
                'is_featured' => false,
            ],
        ];

        foreach ($products as $product) {
            $createdProduct = Product::create($product);

            // Attach random industries to each product
            $randomIndustries = Industry::inRandomOrder()->limit(rand(2, 4))->pluck('id');
            $createdProduct->industries()->attach($randomIndustries);
        }        // Create Demo Blog Posts
        $posts = [
            [
                'title' => 'The Importance of Using Quality Lubricants',
                'slug' => 'importance-of-quality-lubricants',
                'excerpt' => 'Learn why choosing the right lubricant is crucial for equipment longevity',
                'content' => 'Using high-quality lubricants is essential for maintaining equipment performance and extending its lifespan. Poor quality lubricants can lead to increased wear, reduced efficiency, and costly repairs. Our premium range of lubricants ensures optimal protection for all your equipment needs.',
                'is_published' => true,
                'published_at' => now(),
            ],
            [
                'title' => 'Guide to Synthetic vs Mineral Oils',
                'slug' => 'guide-synthetic-vs-mineral-oils',
                'excerpt' => 'Understanding the differences and benefits of synthetic and mineral oils',
                'content' => 'Synthetic oils offer superior performance compared to mineral oils in many applications. They provide better thermal stability, improved oxidation resistance, and longer drain intervals. Learn more about which option is best for your needs.',
                'is_published' => true,
                'published_at' => now(),
            ],
            [
                'title' => 'Seasonal Lubricant Maintenance Tips',
                'slug' => 'seasonal-lubricant-maintenance-tips',
                'excerpt' => 'Essential tips for maintaining proper lubrication throughout the year',
                'content' => 'Different seasons require different lubrication strategies. From winter freeze protection to summer heat management, proper seasonal maintenance ensures your equipment operates smoothly year-round. Discover our expert recommendations.',
                'is_published' => true,
                'published_at' => now(),
            ],
        ];

        foreach ($posts as $post) {
            Post::create($post);
        }

        // Create Services
        $services = [
            [
                'title' => 'Lubricant Manufacturing',
                'description' => 'We manufacture a full range of high-quality lubricants including petrol engine oil, diesel engine oil, hydraulic oil, gear oil, brake fluids, automotive transmission fluid (ATF), specialty lubricants, industrial lubricants, marine lubricants, and greases.',
                'icon' => 'fa-cogs',
                'image_path' => null,
            ],
            [
                'title' => 'Blending & Filling Services',
                'description' => 'Our large-scale blending and filling capacity includes lubricant blending (65,000 MT/annum), viscosity improver blending (10,000 MT/annum), filling & packaging services, third-party blending & filling for other brands, and export packaging services.',
                'icon' => 'fa-flask',
                'image_path' => null,
            ],
            [
                'title' => 'Private Label Manufacturing',
                'description' => 'We help clients build their own brands through custom lubricant formulation, custom packaging & labeling, brand identity creation, graphic design for labels, and production & supply for private-label clients.',
                'icon' => 'fa-tag',
                'image_path' => null,
            ],
            [
                'title' => 'Laboratory Testing Services',
                'description' => 'Our in-house lab provides comprehensive quality assurance testing including lubricant formulation testing, grease testing, ICP analysis, FTIR analysis, viscometer testing, flash point testing, pour point testing, density testing, four ball testing, penetrometer testing, drop point testing, water wash test, and oil separation test.',
                'icon' => 'fa-flask-empty',
                'image_path' => null,
            ],
            [
                'title' => 'Research & Development',
                'description' => 'We provide continuous product improvement, development of new lubricant formulas, performance enhancement research, and technological innovation for advanced lubricants to meet evolving market demands.',
                'icon' => 'fa-flask-beaker',
                'image_path' => null,
            ],
            [
                'title' => 'Specialized Consulting Services',
                'description' => 'Our expert consulting team offers lubrication planning, lubricant selection guidance, technical consulting for machinery lubrication, and customized lubricant formulations for specific industries and applications.',
                'icon' => 'fa-comments',
                'image_path' => null,
            ],
            [
                'title' => 'Global Export Services',
                'description' => 'We export lubricants to Middle East, Africa, South Asia, and Russia with tailored lubricant solutions for international climate demands and comprehensive support for global distribution partners.',
                'icon' => 'fa-globe',
                'image_path' => null,
            ],
            [
                'title' => 'Health, Safety & Environment (HSE) Compliance',
                'description' => 'We maintain rigorous workplace safety systems, environmental compliance processes, eco-friendly production methods, and provide training & safety protocol implementation to ensure the highest standards.',
                'icon' => 'fa-shield',
                'image_path' => null,
            ],
            [
                'title' => 'Industry-Specific Lubrication Solutions',
                'description' => 'We offer industry-specific lubrication products and solutions for automotive, heavy-duty vehicles, motorcycles, agriculture, earth-moving equipment, industrial machinery, and marine sectors.',
                'icon' => 'fa-industry',
                'image_path' => null,
            ],
            [
                'title' => 'Customer Support & Delivery Services',
                'description' => 'We provide 24/7 customer service, maintain large inventory availability, and offer fast delivery services to ensure our clients receive the products they need when they need them.',
                'icon' => 'fa-truck',
                'image_path' => null,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }

        // Create Sample Testimonials
        $testimonials = [
            [
                'author_name' => 'John Anderson',
                'author_company' => 'Premium Auto Industries',
                'author_position' => 'Fleet Manager',
                'content' => 'Union Lubricants has been our trusted partner for over 5 years. Their exceptional engine oils have significantly improved our fleet\'s performance and reduced maintenance costs.',
                'author_image' => null,
                'rating' => 5,
                'is_featured' => true,
            ],
            [
                'author_name' => 'Sarah Mitchell',
                'author_company' => 'Heavy Machinery Corp',
                'author_position' => 'Operations Director',
                'content' => 'The hydraulic fluids from Union Lubricants are outstanding. They have delivered consistent performance in our heavy-duty equipment, reducing downtime significantly.',
                'author_image' => null,
                'rating' => 5,
                'is_featured' => true,
            ],
            [
                'author_name' => 'Michael Chen',
                'author_company' => 'Global Manufacturing Ltd',
                'author_position' => 'Maintenance Supervisor',
                'content' => 'Excellent quality and reliability. Union Lubricants\' products have helped us achieve optimal equipment efficiency. Highly recommended for industrial applications.',
                'author_image' => null,
                'rating' => 5,
                'is_featured' => true,
            ],
            [
                'author_name' => 'Emma Thompson',
                'author_company' => 'Agricultural Solutions Inc',
                'author_position' => 'Technical Manager',
                'content' => 'Their agricultural lubricants are perfect for our demanding farm equipment. Great product quality and excellent customer support throughout our partnership.',
                'author_image' => null,
                'rating' => 5,
                'is_featured' => false,
            ],
            [
                'author_name' => 'Robert Davis',
                'author_company' => 'Marine Transport Services',
                'author_position' => 'Fleet Superintendent',
                'content' => 'Union Lubricants\' marine products are top-notch. Their formulations provide superior protection in harsh marine environments. We trust them completely.',
                'author_image' => null,
                'rating' => 5,
                'is_featured' => false,
            ],
            [
                'author_name' => 'Lisa Rodriguez',
                'author_company' => 'Construction Equipment Co',
                'author_position' => 'Equipment Coordinator',
                'content' => 'Outstanding value for money. The lubricants not only perform exceptionally well but also offer great cost efficiency for our large equipment fleet.',
                'author_image' => null,
                'rating' => 4,
                'is_featured' => false,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }
    }
}
