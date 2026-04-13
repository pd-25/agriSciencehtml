<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Publication;

class PublicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Publication::truncate();

        $data = [
            [
                'category' => 'paper',
                'type_label' => 'Peer-Reviewed Paper',
                'title' => 'Impact of Biochar Amendment on Soil Carbon Sequestration in Semi-Arid Tropical Farmlands',
                'description' => 'A 3-year longitudinal study measuring the effects of biochar application on soil organic carbon across 120 farm plots in Rajasthan, India.',
                'author' => 'Dr. V. Patel, Dr. L. Ochieng et al.',
                'date' => 'March 2026',
                'source_info' => 'Nature Sustainability',
                'source_icon' => 'bi bi-journal',
            ],
            [
                'category' => 'report',
                'type_label' => 'Annual Report',
                'title' => 'State of Smallholder Agriculture 2025: Challenges, Innovations, and the Path Forward',
                'description' => 'Our comprehensive annual report analyzing trends, challenges, and opportunities across smallholder farming systems in 28 countries.',
                'author' => 'AgriScience Research Team',
                'date' => 'February 2026',
                'source_info' => '84 pages',
                'source_icon' => 'bi bi-file-earmark-pdf',
            ],
            [
                'category' => 'study',
                'type_label' => 'Field Study',
                'title' => 'Evaluating Drip Irrigation Adoption Rates and Yield Outcomes Among Women Farmers in East Africa',
                'description' => 'A mixed-methods study examining the socioeconomic factors influencing irrigation technology adoption and its impact on women-led farms.',
                'author' => 'A. Siddiqui, M. Chen',
                'date' => 'January 2026',
                'source_info' => 'Kenya, Tanzania',
                'source_icon' => 'bi bi-geo-alt',
            ],
            [
                'category' => 'paper',
                'type_label' => 'Peer-Reviewed Paper',
                'title' => 'Machine Learning Models for Early Detection of Crop Disease Using Low-Cost Smartphone Imaging',
                'description' => 'Developing accessible AI-powered diagnostic tools that enable farmers to identify plant diseases using only a smartphone camera.',
                'author' => 'Dr. R. Gupta, Dr. T. Nakamura',
                'date' => 'December 2025',
                'source_info' => 'Computers & Electronics in Ag.',
                'source_icon' => 'bi bi-journal',
            ],
            [
                'category' => 'report',
                'type_label' => 'Policy Brief',
                'title' => 'Financing the Future: A Framework for Climate-Responsive Agricultural Investment in LMICs',
                'description' => 'Policy recommendations for multilateral development banks and national governments on directing climate finance toward smallholder adaptation.',
                'author' => 'Dr. V. Patel, M. Chen',
                'date' => 'November 2025',
                'source_info' => '32 pages',
                'source_icon' => 'bi bi-file-earmark-pdf',
            ],
            [
                'category' => 'study',
                'type_label' => 'Field Study',
                'title' => 'Comparative Analysis of Traditional vs. Scientific Composting Methods in Vietnamese Rice Paddies',
                'description' => 'A controlled study comparing nutrient profiles, microbial activity, and crop yields between indigenous composting practices and modern techniques.',
                'author' => 'Dr. P. Tran, Dr. L. Ochieng',
                'date' => 'October 2025',
                'source_info' => 'Vietnam',
                'source_icon' => 'bi bi-geo-alt',
            ],
        ];

        foreach ($data as $item) {
            Publication::create($item);
        }
    }
}
