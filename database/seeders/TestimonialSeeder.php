<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
