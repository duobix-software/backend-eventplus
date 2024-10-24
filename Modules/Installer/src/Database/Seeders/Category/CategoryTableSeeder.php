<?php

namespace Duobix\Installer\Database\Seeders\Category;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->delete();

        DB::table('category_tag')->delete();

        DB::table('categories')->insert([
            [
                'id' => 1,
                'slug' => 'music-concerts',
                'name' => 'Music Concerts',
                'description' => 'Live performances by musicians and bands.',
                'logo' => 'https://g-kpbmgmvtukq.vusercontent.net/placeholder.svg',
                'banner' => 'https://g-kpbmgmvtukq.vusercontent.net/placeholder.svg',
            ],
            [
                'id' => 2,
                'slug' => 'conferences',
                'name' => 'Conferences',
                'description' => 'Formal meetings or presentations on specific topics.',
                'logo' => 'https://g-kpbmgmvtukq.vusercontent.net/placeholder.svg',
                'banner' => 'https://g-kpbmgmvtukq.vusercontent.net/placeholder.svg',
            ],
            [
                'id' => 3,
                'slug' => 'workshops',
                'name' => 'Workshops',
                'description' => 'Hands-on training and interactive sessions.',
                'logo' => 'https://g-kpbmgmvtukq.vusercontent.net/placeholder.svg',
                'banner' => 'https://g-kpbmgmvtukq.vusercontent.net/placeholder.svg',
            ],
            [
                'id' => 4,
                'slug' => 'sports-events',
                'name' => 'Sports Events',
                'description' => 'Competitions and activities related to various sports.',
                'logo' => 'https://g-kpbmgmvtukq.vusercontent.net/placeholder.svg',
                'banner' => 'https://g-kpbmgmvtukq.vusercontent.net/placeholder.svg',
            ],
            [
                'id' => 5,
                'slug' => 'theater',
                'name' => 'Theater',
                'description' => 'Dramatic performances and plays.',
                'logo' => 'https://g-kpbmgmvtukq.vusercontent.net/placeholder.svg',
                'banner' => 'https://g-kpbmgmvtukq.vusercontent.net/placeholder.svg',
            ],
            [
                'id' => 6,
                'slug' => 'festivals',
                'name' => 'Festivals',
                'description' => 'Large-scale celebrations, often with multiple events.',
                'logo' => 'https://g-kpbmgmvtukq.vusercontent.net/placeholder.svg',
                'banner' => 'https://g-kpbmgmvtukq.vusercontent.net/placeholder.svg',
            ],
            [
                'id' => 7,
                'slug' => 'exhibitions',
                'name' => 'Exhibitions',
                'description' => 'Showcases of art, science, or other subjects.',
                'logo' => 'https://g-kpbmgmvtukq.vusercontent.net/placeholder.svg',
                'banner' => 'https://g-kpbmgmvtukq.vusercontent.net/placeholder.svg',
            ],
            [
                'id' => 8,
                'slug' => 'networking-events',
                'name' => 'Networking Events',
                'description' => 'Events focused on making professional connections.',
                'logo' => 'https://g-kpbmgmvtukq.vusercontent.net/placeholder.svg',
                'banner' => 'https://g-kpbmgmvtukq.vusercontent.net/placeholder.svg',
            ],
            [
                'id' => 9,
                'slug' => 'startup-pitches',
                'name' => 'Startup Pitches',
                'description' => 'Entrepreneurs presenting their business ideas to investors.',
                'logo' => 'https://g-kpbmgmvtukq.vusercontent.net/placeholder.svg',
                'banner' => 'https://g-kpbmgmvtukq.vusercontent.net/placeholder.svg',
            ],
            [
                'id' => 10,
                'slug' => 'webinars',
                'name' => 'Webinars',
                'description' => 'Online seminars or presentations.',
                'logo' => 'https://g-kpbmgmvtukq.vusercontent.net/placeholder.svg',
                'banner' => 'https://g-kpbmgmvtukq.vusercontent.net/placeholder.svg',
            ],
            [
                'id' => 11,
                'slug' => 'hackathons',
                'name' => 'Hackathons',
                'description' => 'Collaborative coding events to solve problems or build projects.',
                'logo' => 'https://g-kpbmgmvtukq.vusercontent.net/placeholder.svg',
                'banner' => 'https://g-kpbmgmvtukq.vusercontent.net/placeholder.svg',
            ],
            [
                'id' => 12,
                'slug' => 'charity-events',
                'name' => 'Charity Events',
                'description' => 'Events aimed at raising funds or awareness for a cause.',
                'logo' => 'https://g-kpbmgmvtukq.vusercontent.net/placeholder.svg',
                'banner' => 'https://g-kpbmgmvtukq.vusercontent.net/placeholder.svg',
            ],
            [
                'id' => 13,
                'slug' => 'food-drink',
                'name' => 'Food & Drink',
                'description' => 'Events focused on culinary experiences, food tasting, and drinks.',
                'logo' => 'https://g-kpbmgmvtukq.vusercontent.net/placeholder.svg',
                'banner' => 'https://g-kpbmgmvtukq.vusercontent.net/placeholder.svg',
            ],
            [
                'id' => 14,
                'slug' => 'book-signings',
                'name' => 'Book Signings',
                'description' => 'Authors signing and presenting their books.',
                'logo' => 'https://g-kpbmgmvtukq.vusercontent.net/placeholder.svg',
                'banner' => 'https://g-kpbmgmvtukq.vusercontent.net/placeholder.svg',
            ],
            [
                'id' => 15,
                'slug' => 'film-screenings',
                'name' => 'Film Screenings',
                'description' => 'Showings of movies or documentaries.',
                'logo' => 'https://g-kpbmgmvtukq.vusercontent.net/placeholder.svg',
                'banner' => 'https://g-kpbmgmvtukq.vusercontent.net/placeholder.svg',
            ],
            [
                'id' => 16,
                'slug' => 'trade-shows',
                'name' => 'Trade Shows',
                'description' => 'Large-scale industry exhibitions for professionals and companies.',
                'logo' => 'https://g-kpbmgmvtukq.vusercontent.net/placeholder.svg',
                'banner' => 'https://g-kpbmgmvtukq.vusercontent.net/placeholder.svg',
            ],
            [
                'id' => 17,
                'slug' => 'fashion-shows',
                'name' => 'Fashion Shows',
                'description' => 'Runway events showcasing new clothing lines and designers.',
                'logo' => 'https://g-kpbmgmvtukq.vusercontent.net/placeholder.svg',
                'banner' => 'https://g-kpbmgmvtukq.vusercontent.net/placeholder.svg',
            ],
            [
                'id' => 18,
                'slug' => 'art-exhibitions',
                'name' => 'Art Exhibitions',
                'description' => 'Displays of visual arts, including paintings, sculptures, and photography.',
                'logo' => 'https://g-kpbmgmvtukq.vusercontent.net/placeholder.svg',
                'banner' => 'https://g-kpbmgmvtukq.vusercontent.net/placeholder.svg',
            ],
            [
                'id' => 19,
                'slug' => 'cultural-festivals',
                'name' => 'Cultural Festivals',
                'description' => 'Events celebrating various cultures, traditions, and heritages.',
                'logo' => 'https://g-kpbmgmvtukq.vusercontent.net/placeholder.svg',
                'banner' => 'https://g-kpbmgmvtukq.vusercontent.net/placeholder.svg',
            ],
            [
                'id' => 20,
                'slug' => 'health-wellness',
                'name' => 'Health & Wellness',
                'description' => 'Events focused on physical, mental, and emotional health.',
                'logo' => 'https://g-kpbmgmvtukq.vusercontent.net/placeholder.svg',
                'banner' => 'https://g-kpbmgmvtukq.vusercontent.net/placeholder.svg',
            ]
        ]);

        DB::table('category_tag')->insert([
            // Music Concerts
            ['category_id' => 1, 'tag_id' => 1],  // Music
            ['category_id' => 1, 'tag_id' => 7],  // Entertainment
            ['category_id' => 1, 'tag_id' => 19], // Cinema

            // Conferences
            ['category_id' => 2, 'tag_id' => 2],  // Business
            ['category_id' => 2, 'tag_id' => 13], // Marketing
            ['category_id' => 2, 'tag_id' => 14], // Science
            ['category_id' => 2, 'tag_id' => 25], // History
            ['category_id' => 2, 'tag_id' => 9],  // Travel

            // Workshops
            ['category_id' => 3, 'tag_id' => 5],  // Education
            ['category_id' => 3, 'tag_id' => 22], // Coding
            ['category_id' => 3, 'tag_id' => 21], // Gaming
            ['category_id' => 3, 'tag_id' => 26], // Cooking

            // Sports Events
            ['category_id' => 4, 'tag_id' => 8],  // Sports
            ['category_id' => 4, 'tag_id' => 15], // Fitness
            ['category_id' => 4, 'tag_id' => 6],  // Health
            ['category_id' => 4, 'tag_id' => 23], // Sustainability

            // Theater
            ['category_id' => 5, 'tag_id' => 4],  // Art
            ['category_id' => 5, 'tag_id' => 19], // Cinema
            ['category_id' => 5, 'tag_id' => 17], // Fashion

            // Festivals
            ['category_id' => 6, 'tag_id' => 19], // Cinema
            ['category_id' => 6, 'tag_id' => 4],  // Art
            ['category_id' => 6, 'tag_id' => 7],  // Entertainment
            ['category_id' => 6, 'tag_id' => 18], // Photography

            // Exhibitions
            ['category_id' => 7, 'tag_id' => 18], // Photography
            ['category_id' => 7, 'tag_id' => 4],  // Art
            ['category_id' => 7, 'tag_id' => 31], // Literature
            ['category_id' => 7, 'tag_id' => 30], // Architecture

            // Networking Events
            ['category_id' => 8, 'tag_id' => 10], // Networking
            ['category_id' => 8, 'tag_id' => 2],  // Business
            ['category_id' => 8, 'tag_id' => 11], // Startup
            ['category_id' => 8, 'tag_id' => 28], // Psychology

            // Startup Pitches
            ['category_id' => 9, 'tag_id' => 11], // Startup
            ['category_id' => 9, 'tag_id' => 2],  // Business
            ['category_id' => 9, 'tag_id' => 12], // Finance
            ['category_id' => 9, 'tag_id' => 22], // Coding

            // Webinars
            ['category_id' => 10, 'tag_id' => 14], // Science
            ['category_id' => 10, 'tag_id' => 5],  // Education
            ['category_id' => 10, 'tag_id' => 22], // Coding
            ['category_id' => 10, 'tag_id' => 9],  // Travel

            // Hackathons
            ['category_id' => 11, 'tag_id' => 22], // Coding
            ['category_id' => 11, 'tag_id' => 38], // Robotics
            ['category_id' => 11, 'tag_id' => 39], // Artificial Intelligence
            ['category_id' => 11, 'tag_id' => 21], // Gaming

            // Charity Events
            ['category_id' => 12, 'tag_id' => 23], // Sustainability
            ['category_id' => 12, 'tag_id' => 24], // Environment
            ['category_id' => 12, 'tag_id' => 20], // Health
            ['category_id' => 12, 'tag_id' => 16], // Wellness

            // Food & Drink
            ['category_id' => 13, 'tag_id' => 26], // Cooking
            ['category_id' => 13, 'tag_id' => 13], // Marketing
            ['category_id' => 13, 'tag_id' => 9],  // Travel

            // Book Signings
            ['category_id' => 14, 'tag_id' => 31], // Literature
            ['category_id' => 14, 'tag_id' => 27], // Writing
            ['category_id' => 14, 'tag_id' => 25], // History

            // Film Screenings
            ['category_id' => 15, 'tag_id' => 19], // Cinema
            ['category_id' => 15, 'tag_id' => 4],  // Art
            ['category_id' => 15, 'tag_id' => 18], // Photography

            // Trade Shows
            ['category_id' => 16, 'tag_id' => 2],  // Business
            ['category_id' => 16, 'tag_id' => 16], // Wellness
            ['category_id' => 16, 'tag_id' => 38], // Robotics

            // Fashion Shows
            ['category_id' => 17, 'tag_id' => 17], // Fashion
            ['category_id' => 17, 'tag_id' => 4],  // Art
            ['category_id' => 17, 'tag_id' => 18], // Photography

            // Art Exhibitions
            ['category_id' => 18, 'tag_id' => 4],  // Art
            ['category_id' => 18, 'tag_id' => 18], // Photography
            ['category_id' => 18, 'tag_id' => 30], // Architecture

            // Cultural Festivals
            ['category_id' => 19, 'tag_id' => 4],  // Art
            ['category_id' => 19, 'tag_id' => 19], // Cinema
            ['category_id' => 19, 'tag_id' => 7],  // Entertainment

            // Health & Wellness
            ['category_id' => 20, 'tag_id' => 16], // Wellness
            ['category_id' => 20, 'tag_id' => 6],  // Health
            ['category_id' => 20, 'tag_id' => 15], // Fitness
            ['category_id' => 20, 'tag_id' => 24], // Environment
        ]);
    }
}
