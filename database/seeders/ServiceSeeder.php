<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
    }
}
