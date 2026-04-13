<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Blog;
use Illuminate\Support\Str;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Blog::truncate();

        $blogs = [
            [
                'title' => 'How Climate-Smart Agriculture Is Transforming Smallholder Farming in Sub-Saharan Africa',
                'category' => 'policy',
                'excerpt' => 'An in-depth look at how AgriScience\'s climate adaptation programs have helped 12,000 farmers in Kenya, Tanzania, and Uganda build resilience against increasingly unpredictable weather patterns.',
                'content' => 'Full article content here...',
                'author_name' => 'Dr. Lena Ochieng',
                'author_image' => 'LO',
                'date' => '2026-03-15',
                'read_time' => '8 min read',
                'is_featured' => true,
            ],
            [
                'title' => '5 Organic Pest Control Methods Every Farmer Should Know',
                'category' => 'farming',
                'excerpt' => 'Discover natural and effective ways to protect your crops without relying on harmful chemical pesticides. From neem oil to companion planting.',
                'content' => 'Full article content here...',
                'author_name' => 'Dr. Vikram Patel',
                'author_image' => 'VP',
                'date' => '2026-03-10',
                'read_time' => '5 min read',
                'is_featured' => false,
            ],
            [
                'title' => 'Satellite Imaging: The Future of Precision Agriculture',
                'category' => 'technology',
                'excerpt' => 'How AgriScience is using satellite data to provide farmers with actionable insights about soil moisture, crop health, and optimal planting times.',
                'content' => 'Full article content here...',
                'author_name' => 'Marco Chen',
                'author_image' => 'MC',
                'date' => '2026-03-05',
                'read_time' => '6 min read',
                'is_featured' => false,
            ],
            [
                'title' => 'Meet Priya: From Struggling Farmer to Cooperative Leader',
                'category' => 'community',
                'excerpt' => 'The inspiring journey of a woman in rural Maharashtra who transformed her community through AgriScience\'s cooperative farming training.',
                'content' => 'Full article content here...',
                'author_name' => 'Aisha Siddiqui',
                'author_image' => 'AS',
                'date' => '2026-02-28',
                'read_time' => '10 min read',
                'is_featured' => false,
            ],
            [
                'title' => 'Why Governments Must Invest in Soil Health Legislation',
                'category' => 'policy',
                'excerpt' => 'A policy brief on the economic and environmental case for national soil protection laws, drawing on AgriScience\'s 10-year longitudinal data.',
                'content' => 'Full article content here...',
                'author_name' => 'Dr. Vikram Patel',
                'author_image' => 'VP',
                'date' => '2026-02-20',
                'read_time' => '12 min read',
                'is_featured' => false,
            ],
            [
                'title' => 'Agroforestry 101: Integrating Trees Into Your Farm',
                'category' => 'farming',
                'excerpt' => 'Learn how combining forestry with agriculture can improve soil fertility, increase biodiversity, and create additional income streams for farmers.',
                'content' => 'Full article content here...',
                'author_name' => 'Dr. Lena Ochieng',
                'author_image' => 'LO',
                'date' => '2026-02-14',
                'read_time' => '7 min read',
                'is_featured' => false,
            ],
            [
                'title' => 'Mobile Apps That Are Revolutionizing Farm Management',
                'category' => 'technology',
                'excerpt' => 'A review of the top digital tools transforming how smallholder farmers track crops, access markets, and receive weather advisories.',
                'content' => 'Full article content here...',
                'author_name' => 'Marco Chen',
                'author_image' => 'MC',
                'date' => '2026-02-08',
                'read_time' => '5 min read',
                'is_featured' => false,
            ],
            [
                'title' => 'Youth in Agriculture: Breaking the Rural Exodus Cycle',
                'category' => 'community',
                'excerpt' => 'How AgriScience\'s youth programs are making farming attractive to the next generation and reversing the trend of rural-to-urban migration.',
                'content' => 'Full article content here...',
                'author_name' => 'Aisha Siddiqui',
                'author_image' => 'AS',
                'date' => '2026-01-30',
                'read_time' => '9 min read',
                'is_featured' => false,
            ],
            [
                'title' => 'Cover Crops: Your Soil\'s Best Friend During Off-Season',
                'category' => 'farming',
                'excerpt' => 'Understanding the science behind cover cropping and how it can dramatically improve soil health, reduce erosion, and suppress weeds naturally.',
                'content' => 'Full article content here...',
                'author_name' => 'Dr. Vikram Patel',
                'author_image' => 'VP',
                'date' => '2026-01-22',
                'read_time' => '6 min read',
                'is_featured' => false,
            ],
            [
                'title' => 'Fair Trade 2.0: Reimagining Global Agricultural Commerce',
                'category' => 'policy',
                'excerpt' => 'Our vision for a more equitable global food trade system that puts smallholder farmers at the center of value chains.',
                'content' => 'Full article content here...',
                'author_name' => 'Marco Chen',
                'author_image' => 'MC',
                'date' => '2026-01-15',
                'read_time' => '11 min read',
                'is_featured' => false,
            ],
        ];

        foreach ($blogs as $blog) {
            $blog['slug'] = Str::slug($blog['title']);
            Blog::create($blog);
        }
    }
}
