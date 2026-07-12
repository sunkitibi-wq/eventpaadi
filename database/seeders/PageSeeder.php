<?php

namespace Database\Seeders;

use App\Models\Page;
use App\Models\User;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    public function run(): void
    {
        $author = User::first() ?? User::firstOrCreate(
            ['email' => 'admin@example.com'],
            ['name' => 'Admin User', 'password' => bcrypt('password')]
        );

        // 1. Home Page
        Page::updateOrCreate(
            ['slug' => 'home'],
            [
                'title' => 'Home',
                'template' => 'home',
                'status' => 'published',
                'user_id' => $author->id,
                'published_at' => now(),
                'meta_title' => 'EventPaadi - Nigeria\'s Event Powerhouse',
                'meta_description' => 'EventPaadi is Nigeria\'s leading event support and knowledge platform, empowering event professionals, businesses, and event hosts.',
                'meta_keywords' => 'event planning, events, nigeria, wedding planning, corporate retreats, logsitics',
                'content' => [
                    'hero_badge' => "Nigeria's Event Powerhouse",
                    'hero_title' => 'Empowering the Pulse of Nigerian Events.',
                    'hero_description' => 'EventPaadi is Nigeria\'s leading event support and knowledge platform, empowering event professionals, businesses, and event hosts with the tools, insights, technology, and expertise to deliver exceptional events.',
                    'hero_primary_btn_text' => 'Explore Services',
                    'hero_primary_btn_link' => '/support',
                    'hero_secondary_btn_text' => 'Join the Academy',
                    'hero_secondary_btn_link' => '/academy',
                    'hero_image_1' => null, // Left null to default to unsplash/LH3 placeholder in views
                    'hero_image_2' => null,

                    'pillars_title' => 'The Pillars of Our Excellence',
                    'pillars' => [
                        [
                            'title' => 'Event Support',
                            'description' => 'Comprehensive service solutions for professional logistics, on-site management, and vendor coordination tailored for the Nigerian market.',
                            'icon' => 'handyman',
                            'link_text' => 'Learn More',
                            'link_url' => '/support',
                        ],
                        [
                            'title' => 'Media & Insights',
                            'description' => 'Stay ahead with the latest industry trends, data-driven insights, and celebratory success stories from across West Africa.',
                            'icon' => 'newspaper',
                            'link_text' => 'Explore Insights',
                            'link_url' => '/blog',
                        ],
                        [
                            'title' => 'Academy',
                            'description' => 'Empowering the next generation of event managers through professional certification and hands-on masterclasses.',
                            'icon' => 'school',
                            'link_text' => 'Join Academy',
                            'link_url' => '/academy',
                        ],
                    ],

                    'stats' => [
                        ['number' => '500+', 'label' => 'Events Supported'],
                        ['number' => '1,200', 'label' => 'Certified Pros'],
                        ['number' => '15+', 'label' => 'Smart Tools'],
                        ['number' => '98%', 'label' => 'Client Satisfaction'],
                    ],

                    'tools_title' => 'Precision Tools for Modern Planners',
                    'tools_description' => 'Sophisticated technology designed to eliminate the chaos of event coordination and let you focus on the art of celebration.',
                    'tools' => [
                        [
                            'title' => 'Omni-Planner Dashboard',
                            'description' => 'Manage budgets, vendors, and guest lists in one synchronized workspace.',
                            'image' => null,
                            'link_url' => '/resources',
                            'icon' => 'dashboard',
                            'col_span' => '8',
                        ],
                        [
                            'title' => 'Smart Check-In',
                            'description' => 'Secure, lightning-fast QR check-in systems for events of any scale.',
                            'image' => null,
                            'link_url' => '/resources',
                            'icon' => 'qr_code_2',
                            'col_span' => '4',
                        ],
                        [
                            'title' => 'Impact Analytics',
                            'description' => 'Deep insights into attendee engagement and ROI for corporate hosts.',
                            'image' => null,
                            'link_url' => '/resources',
                            'icon' => 'analytics',
                            'col_span' => '4',
                        ],
                        [
                            'title' => 'Vendor Marketplace',
                            'description' => 'Connect with Nigeria\'s most reliable, pre-vetted service providers in seconds.',
                            'image' => null,
                            'link_url' => '/resources',
                            'icon' => 'storefront',
                            'col_span' => '8',
                        ],
                    ],

                    'testimonials_title' => 'Trusted by the Industry',
                    'testimonials_description' => 'Hear from the professionals who are shaping the future of Nigerian events with EventPaadi.',
                    'testimonials' => [
                        [
                            'author_name' => 'Titi Adebayo',
                            'author_title' => 'Lead Planner, Zenith Events',
                            'quote' => '"EventPaadi transformed our corporate gala planning. The tools for budget tracking and vendor management are miles ahead of anything else in Nigeria. Truly world-class."',
                            'rating' => '5',
                        ],
                        [
                            'author_name' => 'Chidi Okafor',
                            'author_title' => 'CEO, Urban Pulse Events',
                            'quote' => '"The Academy provided me with the certification and confidence to launch my own agency. The network of mentors here is incredible—they truly want to see you succeed."',
                            'rating' => '5',
                        ],
                    ],

                    'cta_title' => 'Ready to elevate your event game?',
                    'cta_description' => 'Join thousands of Nigerian professionals who are building the future of celebration on EventPaadi.',
                    'cta_primary_btn_text' => 'Get Started Free',
                    'cta_primary_btn_link' => '/register',
                    'cta_secondary_btn_text' => 'Talk to an Expert',
                    'cta_secondary_btn_link' => 'mailto:hello@eventpaadi.ng',
                ]
            ]
        );

        // 2. Academy Page
        Page::updateOrCreate(
            ['slug' => 'academy'],
            [
                'title' => 'Academy',
                'template' => 'academy',
                'status' => 'published',
                'user_id' => $author->id,
                'published_at' => now(),
                'meta_title' => 'EventPaadi Academy - Professional Certification & Training',
                'meta_description' => 'Unlock dynamic career growth with premium events credentials, mentoring, and courses tailored for West African planners.',
                'meta_keywords' => 'event certification, event school, event class, event manager training, lagos',
                'content' => [
                    'hero_badge' => 'Professional Event Excellence',
                    'hero_title' => 'Elevate Your Event Career.',
                    'hero_description' => 'Master the art of West African celebration and professional event logistics. Join the elite community of Nigerian event professionals.',
                    'hero_primary_btn_text' => 'Explore Programs',
                    'hero_primary_btn_link' => '#register',
                    'hero_secondary_btn_text' => 'View Schedule',
                    'hero_secondary_btn_link' => '#register',
                    'hero_image' => null,
                    'hero_stat_number' => '5,000+',
                    'hero_stat_label' => 'Graduates in 2024',

                    'tracks_title' => 'Master Every Dimension',
                    'tracks_description' => 'Specialized training modules tailored for the Nigerian event ecosystem, from luxury weddings to large-scale corporate summits.',
                    'tracks' => [
                        [
                            'title' => 'Event Management & Strategy',
                            'description' => 'End-to-end planning frameworks for luxury Nigerian celebrations and high-tier corporate events.',
                            'icon' => 'event_available',
                            'col_span' => '2',
                            'row_span' => '2',
                        ],
                        [
                            'title' => 'Technical Production',
                            'description' => 'Master lighting, sound engineering, and AV logistics for large-scale outdoor stages.',
                            'icon' => 'architecture',
                            'col_span' => '1',
                            'row_span' => '2',
                        ],
                        [
                            'title' => 'Floral Design',
                            'description' => 'Luxury decor and botanical artistry.',
                            'icon' => 'local_florist',
                            'col_span' => '1',
                            'row_span' => '1',
                        ],
                        [
                            'title' => 'Event Tech',
                            'description' => 'Ticketing, RFID, and digital engagement.',
                            'icon' => 'devices_other',
                            'col_span' => '1',
                            'row_span' => '1',
                        ],
                    ],

                    'formats_title' => 'Flexible Learning Journeys',
                    'formats_description' => 'Whether you are starting out or scaling up, we have a format that fits your professional schedule and career goals.',
                    'formats' => [
                        [
                            'title' => 'Certification Programs',
                            'description' => 'Comprehensive 6-month cohorts with industry placement and professional accreditation recognized across West Africa.',
                            'icon' => 'school',
                            'bullets' => 'Industry-standard curriculum, Hands-on project portfolio',
                            'button_text' => 'Enroll Now',
                            'button_link' => '#register',
                            'is_popular' => false,
                        ],
                        [
                            'title' => 'Elite Masterclasses',
                            'description' => 'Intensive weekend sessions led by industry titans focusing on high-stakes event negotiation and luxury branding.',
                            'icon' => 'verified',
                            'bullets' => 'Live Q&A with CEOs, Networking dinner included',
                            'button_text' => 'Claim Seat',
                            'button_link' => '#register',
                            'is_popular' => true,
                        ],
                        [
                            'title' => 'Practical Workshops',
                            'description' => '1-day skill-specific labs covering technical topics like 3D floor planning, lighting rigs, and digital marketing.',
                            'icon' => 'psychology',
                            'bullets' => 'Interactive demo access, Softwares and tools provided',
                            'button_text' => 'See Workshops',
                            'button_link' => '#register',
                            'is_popular' => false,
                        ],
                    ],

                    'mentors_title' => 'Learn From Industry Icons',
                    'mentors' => [
                        ['name' => 'Tunde Bakare', 'role' => 'Tech Lead, V-Events', 'image' => null],
                        ['name' => 'Chinelo Obi', 'role' => 'Creative Director, Flora', 'image' => null],
                        ['name' => 'Femi Adebayo', 'role' => 'CEO, EventFlow Tech', 'image' => null],
                        ['name' => 'Amaka Udoh', 'role' => 'Founder, Luxe Weddings', 'image' => null],
                    ],

                    'register_title' => 'Start Learning Today',
                    'register_description' => 'Unlock access to our entire library of professional courses, community forums, and monthly industry networking sessions.',
                    'bullet_1_title' => 'Recognized Degree',
                    'bullet_1_desc' => 'Valid for career upgrades.',
                    'bullet_2_title' => 'Alumni Network',
                    'bullet_2_desc' => 'Join 10k+ professionals.',
                ]
            ]
        );

        // 3. Resources Page
        Page::updateOrCreate(
            ['slug' => 'resources'],
            [
                'title' => 'Resources',
                'template' => 'resources',
                'status' => 'published',
                'user_id' => $author->id,
                'published_at' => now(),
                'meta_title' => 'EventPaadi Resources - Planners Toolkit & Templates',
                'meta_description' => 'Empowering planners with smart calculators, calculators, contract templates, and data sheets.',
                'meta_keywords' => 'event budget sheet, wedding contract template, event timeline excel, resources',
                'content' => [
                    'hero_badge' => 'RESOURCE HUB',
                    'hero_title' => 'Insights & Innovation at Your Fingertips.',
                    'hero_description' => 'Empowering Nigerian event professionals with high-tier digital tools, expert insights, and the resources needed to scale excellence.',
                    'hero_primary_btn_text' => 'Explore Tools',
                    'hero_primary_btn_link' => '#tools',
                    'hero_secondary_btn_text' => 'Read the Blog',
                    'hero_secondary_btn_link' => '/blog',
                    'hero_image' => null,
                    'hero_floater_title' => 'ROI Tracker',
                    'hero_floater_desc' => 'Live Analytics',

                    'trends_title' => 'Latest Trends',
                    'trends_description' => 'Stay ahead in the Nigerian event industry.',

                    'tools_title' => 'Powerful Event Tools',
                    'tools_description' => 'Precision-engineered software components designed for the modern event architect.',
                    'tools' => [
                        [
                            'title' => 'Budget Calculator',
                            'description' => 'Automate your financial planning with our intelligent NGN-focused budget generator.',
                            'icon' => 'payments',
                            'link_url' => '#',
                            'col_span' => '2',
                        ],
                        [
                            'title' => 'Seating Chart Generator',
                            'description' => 'Drag-and-drop floor planning for any venue size, from ballrooms to garden parties.',
                            'icon' => 'grid_view',
                            'link_url' => '#',
                            'col_span' => '2',
                        ],
                        [
                            'title' => 'Event Checklists',
                            'description' => 'Step-by-step master guides.',
                            'icon' => 'checklist',
                            'link_url' => '#',
                            'col_span' => '1',
                        ],
                        [
                            'title' => 'Vendor Directory',
                            'description' => 'Verified Nigerian partners.',
                            'icon' => 'storefront',
                            'link_url' => '#',
                            'col_span' => '1',
                        ],
                    ],

                    'downloads_title' => 'Whitepapers & Templates',
                    'downloads_description' => 'Downloadable assets to professionalize your workflow instantly.',
                    'downloads' => [
                        [
                            'title' => 'Vendor Contract Template',
                            'description' => 'Professional legal framework for Nigerian service providers.',
                            'file_size' => '2.4MB',
                            'type' => 'pdf',
                            'file_url' => '#',
                        ],
                        [
                            'title' => '2024 Event Industry Report',
                            'description' => 'Deep dive into market trends and consumer behavior in Lagos.',
                            'file_size' => '8.1MB',
                            'type' => 'pdf',
                            'file_url' => '#',
                        ],
                        [
                            'title' => 'Guest List Master Sheet',
                            'description' => 'Organized Excel template with automated RSVP tracking.',
                            'file_size' => '1.2MB',
                            'type' => 'xlsx',
                            'file_url' => '#',
                        ],
                        [
                            'title' => 'Sponsorship Pitch Deck',
                            'description' => 'High-conversion presentation slides for event funding.',
                            'file_size' => '12MB',
                            'type' => 'pptx',
                            'file_url' => '#',
                        ],
                    ],

                    'newsletter_title' => 'The Event Dispatch',
                    'newsletter_description' => 'Weekly intelligence for event pioneers. No spam, just pure Nigerian excellence delivered to your inbox.',
                ]
            ]
        );

        // 4. Support Page
        Page::updateOrCreate(
            ['slug' => 'support'],
            [
                'title' => 'Support',
                'template' => 'support',
                'status' => 'published',
                'user_id' => $author->id,
                'published_at' => now(),
                'meta_title' => 'EventPaadi Support - Professional Logistics & AV Sourcing',
                'meta_description' => 'Bespoke event support, sound engineering, AV management, protocol, and pre-vetted vendor management.',
                'meta_keywords' => 'av hire lagos, protocol team abuja, wedding coordinators, event logistics',
                'content' => [
                    'hero_badge' => 'Premium Event Solutions',
                    'hero_title' => 'Bespoke Support for Seamless Events.',
                    'hero_description' => 'Elevate your professional gatherings with Nigerian excellence. We provide the infrastructure and expertise so you can focus on the moments that matter.',
                    'hero_primary_btn_text' => 'Request a Quote',
                    'hero_primary_btn_link' => '#quote',
                    'hero_secondary_btn_text' => 'Explore Services',
                    'hero_secondary_btn_link' => '#services',
                    'hero_image' => null,

                    'services_title' => 'Integrated Service Ecosystem',
                    'services_description' => 'Scalable solutions tailored for the high-end event professional, from initial strategy to post-event synthesis.',
                    'services' => [
                        [
                            'title' => 'Production Support',
                            'description' => 'Technical site audits, lighting plots, and sound engineering for flawless execution.',
                            'bullet_1' => 'Technical Audits',
                            'bullet_2' => 'Audio/Visual Setup',
                            'icon' => 'settings_heart',
                        ],
                        [
                            'title' => 'On-site Coordination',
                            'description' => 'Real-time floor management and guest experience stewardship across the continent.',
                            'bullet_1' => 'Floor Management',
                            'bullet_2' => 'Protocol Teams',
                            'icon' => 'groups',
                        ],
                        [
                            'title' => 'Technology Integration',
                            'description' => 'Digital registration, RFID tracking, and custom event apps for the modern host.',
                            'bullet_1' => 'RFID Guest Tracking',
                            'bullet_2' => 'Hybrid Connectivity',
                            'icon' => 'hub',
                        ],
                        [
                            'title' => 'Vendor Management',
                            'description' => 'Sourcing and supervising premium vendors to meet international standards.',
                            'bullet_1' => 'Quality Control',
                            'bullet_2' => 'Contract Handling',
                            'icon' => 'handshake',
                        ],
                    ],

                    'difference_title' => 'The EventPaadi Difference',
                    'difference_points' => [
                        [
                            'title' => 'Unyielding Quality',
                            'description' => 'We adhere to global standards of excellence while honoring the unique cultural vibrancy of West African celebrations.',
                            'icon' => 'verified',
                        ],
                        [
                            'title' => 'Mission-Critical Reliability',
                            'description' => 'Redundant systems and meticulous planning ensure that your event remains seamless, regardless of the complexity.',
                            'icon' => 'shield_lock',
                        ],
                        [
                            'title' => 'Continuous Innovation',
                            'description' => 'We leverage the latest in event technology, from generative AI guest management to immersive AR experiences.',
                            'icon' => 'lightbulb',
                        ],
                    ],
                    'difference_stat_1_val' => '99.9%',
                    'difference_stat_1_lbl' => 'Uptime on Technical Infrastructure',
                    'difference_stat_2_val' => '500+',
                    'difference_stat_2_lbl' => 'High-Stakes Events Managed',
                    'difference_image_1' => null,
                    'difference_image_2' => null,

                    'cases_title' => 'Proven Success',
                    'cases_description' => 'Real stories of seamless execution across diverse event landscapes.',
                    'cases' => [
                        [
                            'title' => 'The Nexus Summit',
                            'description' => 'Optimized logistics for 500+ global executives over 3 days.',
                            'image' => null,
                            'category' => 'Corporate Retreat',
                        ],
                        [
                            'title' => 'Echoes of Lagos',
                            'description' => 'Production management for a 5,000 attendee live broadcast event.',
                            'image' => null,
                            'category' => 'Live Concert',
                        ],
                        [
                            'title' => 'The Adeleke Nuptials',
                            'description' => 'Coordinating 40+ high-end vendors for a royal celebration.',
                            'image' => null,
                            'category' => 'Luxury Wedding',
                        ],
                    ],

                    'quote_title' => 'Let’s Build Something Iconic.',
                    'quote_description' => 'Share your vision with us, and our support team will craft a bespoke proposal within 24 hours.',
                    'quote_phone' => '+234 800 EVENT PAADI',
                    'quote_email' => 'support@eventpaadi.com',
                    'quote_address' => 'Lagos & Abuja, Nigeria',
                ]
            ]
        );

        // 5. Blog SEO settings Page
        Page::updateOrCreate(
            ['slug' => 'blog'],
            [
                'title' => 'Blog',
                'template' => 'blog',
                'status' => 'published',
                'user_id' => $author->id,
                'published_at' => now(),
                'meta_title' => 'EventPaadi Blog - Nigerian Celebration Insights',
                'meta_description' => 'Stay informed with high-key event industry reports, trends, AV tips, and expert interviews.',
                'meta_keywords' => 'event blog, event tips, industry report lagos, nigeria events',
                'content' => []
            ]
        );
    }
}
