<?php
include("./admin/includes/config.php");

$menuData = [];

$dests = mysqli_query($con, "SELECT * FROM tbldest");
while ($dest = mysqli_fetch_assoc($dests)) {
    $destId = $dest['Id'];
    $menuData[$destId] = [
        'name' => $dest['DestName'],
        'categories' => []
    ];

    $cats = mysqli_query($con, "SELECT * FROM tblCategory WHERE destId = $destId");
    while ($cat = mysqli_fetch_assoc($cats)) {
        $catId = $cat['id'];
        $menuData[$destId]['categories'][$catId] = [
            'name' => $cat['CategoryName'],
            'subcategories' => []
        ];

        $subs = mysqli_query($con, "SELECT * FROM tblSubcategory WHERE CategoryId = $catId");
        while ($sub = mysqli_fetch_assoc($subs)) {
            $subId = $sub['SubCategoryId'];
            $menuData[$destId]['categories'][$catId]['subcategories'][$subId] = [
                'name' => $sub['Subcategory'],
                'posts' => []
            ];

            $posts = mysqli_query($con, "SELECT * FROM tblPosts WHERE CategoryId = $catId AND SubCategoryId = $subId");
            while ($post = mysqli_fetch_assoc($posts)) {
                $menuData[$destId]['categories'][$catId]['subcategories'][$subId]['posts'][] = [
                    'id' => $post['id'],
                    'title' => $post['PostTitle']
                ];
            }
        }
    }
}
?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advanced Adventures - Nepal Trekking & Tours</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const dropdown = document.getElementById('countries-dropdown');
            const mainToggle = document.getElementById('main-toggle');

            // Show dropdown on hover
            mainToggle.addEventListener('mouseenter', () => {
                dropdown.classList.remove('hidden');
            });

            // Hide dropdown when mouse leaves both button and dropdown
            mainToggle.addEventListener('mouseleave', (e) => {
                setTimeout(() => {
                    if (!mainToggle.matches(':hover') && !dropdown.matches(':hover')) {
                        dropdown.classList.add('hidden');
                    }
                }, 200);
            });

            dropdown.addEventListener('mouseleave', (e) => {
                setTimeout(() => {
                    if (!mainToggle.matches(':hover') && !dropdown.matches(':hover')) {
                        dropdown.classList.add('hidden');
                    }
                }, 200);
            });

            // Handle submenu hover (optional enhancement)
            const submenuButtons = document.querySelectorAll('#countries-dropdown button');

            submenuButtons.forEach(button => {
                const submenu = button.nextElementSibling;
                if (!submenu) return;

                button.addEventListener('mouseenter', () => {
                    submenu.classList.remove('hidden');
                });

                button.parentElement.addEventListener('mouseleave', () => {
                    submenu.classList.add('hidden');
                });
            });
        });

        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#1a365d',  // Deep navy for professionalism
                        secondary: '#c2410c', // Adventurous orange for accents
                    },
                    animation: {
                        'fadeIn': 'fadeIn 0.8s ease-out forwards',
                    },
                    keyframes: {
                        fadeIn: {
                            'from': { opacity: '0', transform: 'translateY(20px)' },
                            'to': { opacity: '1', transform: 'translateY(0)' }
                        }
                    }
                }
            }
        }
    </script>

    <style>
        /* Header Dropdowns */
        .dropdown-content {
            opacity: 0;
            visibility: hidden;
            transform: translateY(10px);
            transition: all 0.2s ease;
        }

        .dropdown:hover .dropdown-content,
        .dropdown:focus-within .dropdown-content {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        /* Mobile Menu */
        @keyframes slideIn {
            from {
                transform: translateX(100%);
            }

            to {
                transform: translateX(0);
            }
        }

        .mobile-menu {
            animation: slideIn 0.3s ease-out;
        }

        /* Swiper Overrides */
        .swiper-button-next,
        .swiper-button-prev {
            background-color: rgba(255, 255, 255, 0.2);
            width: 50px;
            height: 50px;
            border-radius: 50%;
            backdrop-filter: blur(5px);
            transition: all 0.3s ease;
        }

        .swiper-button-next:hover,
        .swiper-button-prev:hover {
            background-color: rgba(255, 255, 255, 0.3);
        }

        .swiper-button-next::after,
        .swiper-button-prev::after {
            font-size: 1.5rem;
            color: white;
        }

        .swiper-pagination-bullet {
            background: white;
            opacity: 0.6;
            width: 12px;
            height: 12px;
        }

        .swiper-pagination-bullet-active {
            background: #1a365d;
            opacity: 1;
        }

        .testimonials-carousel {
            padding-bottom: 3rem;
        }

        .testimonials-carousel .swiper-pagination-bullet {
            width: 12px;
            height: 12px;
            background: rgba(26, 54, 93, 0.3);
            opacity: 1;
            transition: all 0.3s ease;
        }

        .testimonials-carousel .swiper-pagination-bullet-active {
            background: #1a365d;
            width: 30px;
            border-radius: 6px;
        }

        [class="dropdown"] {
            transition: all 0.2s ease;
        }

        / Prevent layout shift / .relative {
            position: relative;
        }

        .absolute {
            position: absolute;
        }

        / Better hover effects */ .hover:bg-gray-50:hover {
            background-color: #f9fafb;
        }

        .hover:text-secondary:hover {
            color: #6b7280;
        }

        @media (max-width: 1024px) {

            .testimonial-prev,
            .testimonial-next {
                display: none;
            }
        }
    </style>
</head>
<header class="sticky top-0 z-50 bg-white shadow-md">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center py-4">
            <!-- Logo -->
            <a href="#" class="flex items-center">
                <img src="assets/logo.png" alt="Advanced Adventures" class="h-12 md:h-16 object-contain">
            </a>

            <!-- Desktop Navigation -->
            <nav class="hidden lg:flex items-center space-x-8">
                <!-- Destinations Mega Menu -->
                <div class="relative">
                    <button id="main-toggle"
                        class="flex items-center font-medium text-gray-700 transition hover:text-primary">
                        Destination <i class="ml-1 text-xs fas fa-chevron-down"></i>
                    </button>

                    <div id="countries-dropdown" class="absolute left-0 hidden w-48 mt-2 bg-white rounded-md shadow-xl">
                        <ul class="py-1">
                            <?php foreach ($menuData as $dest): ?>
                                <li class="relative group">
                                    <button
                                        class="flex items-center justify-between w-full px-4 py-2 hover:bg-gray-50 hover:text-secondary">
                                        <?= $dest['name'] ?> <i class="ml-2 text-xs fas fa-chevron-right"></i>
                                    </button>

                                    <div
                                        class="absolute top-0 hidden whitespace-nowrap bg-white rounded-md shadow-xl left-full">
                                        <ul class="py-1">
                                            <?php foreach ($dest['categories'] as $cat): ?>
                                                <li class="relative group">
                                                    <button
                                                        class="flex items-center justify-between w-full px-4 py-2 hover:bg-gray-50 hover:text-secondary">
                                                        <?= $cat['name'] ?> <i class="ml-2 text-xs fas fa-chevron-right"></i>
                                                    </button>

                                                    <div
                                                        class="absolute top-0 hidden whitespace-nowrap bg-white rounded-md shadow-xl left-full">
                                                        <ul class="py-1">
                                                            <?php foreach ($cat['subcategories'] as $sub): ?>
                                                                <li class="relative group">
                                                                    <button
                                                                        class="flex items-center justify-between w-full px-4 py-2 hover:bg-gray-50 hover:text-secondary">
                                                                        <?= $sub['name'] ?> <i
                                                                            class="ml-2 text-xs fas fa-chevron-right"></i>
                                                                    </button>

                                                                    <div
                                                                        class="absolute top-0 hidden whitespace-nowrap bg-white rounded-md shadow-xl left-full">
                                                                        <ul class="py-1">
                                                                            <?php foreach ($sub['posts'] as $post): ?>
                                                                                <li>
                                                                                    <a href="new_page.php?id=<?= $post['id'] ?>"
                                                                                        class="block px-4 py-2 hover:bg-gray-50 hover:text-secondary">
                                                                                        <?= $post['title'] ?>
                                                                                    </a>
                                                                                </li>
                                                                            <?php endforeach; ?>
                                                                        </ul>
                                                                    </div>
                                                                </li>
                                                            <?php endforeach; ?>
                                                        </ul>
                                                    </div>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>


                <!-- Other Menu Items -->
                <a href="/page/booking.html" class="font-medium text-gray-700 hover:text-primary transition">Booking</a>
                <a href="/page/travel-guide.html" class="font-medium text-gray-700 hover:text-primary transition">Travel
                    Guide</a>
                <a href="/page/about-us.html" class="font-medium text-gray-700 hover:text-primary transition">About
                    Us</a>
                <a href="/page/csr.html" class="font-medium text-gray-700 hover:text-primary transition">CSR</a>
                <a href="/testimonials.html" class="font-medium text-gray-700 hover:text-primary transition">Trip
                    Reviews</a>
                <a href="#" class="font-medium text-gray-700 hover:text-primary transition">Travel Blog</a>
                <a href="#" class="font-medium text-gray-700 hover:text-primary transition">Contact</a>
                <!-- Search Button -->
                <button class="p-2 text-gray-600 hover:text-primary">
                    <i class="fas fa-search"></i>
                </button>

                <!-- CTA Button -->
                <a href="/page/book-your-trip.html"
                    class="bg-primary hover:bg-[#122747] text-white px-4 py-2 rounded-md font-medium transition">
                    Book Now
                </a>
            </nav>

            <!-- Mobile Menu Button -->
            <button class="lg:hidden text-gray-700 focus:outline-none" id="mobile-menu-button">
                <i class="fas fa-bars text-2xl"></i>
            </button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden lg:hidden fixed inset-0 bg-black bg-opacity-50 z-50">
        <div class="mobile-menu absolute right-0 top-0 h-full w-4/5 max-w-sm bg-white shadow-lg overflow-y-auto">
            <div class="flex justify-between items-center p-4 border-b">
                <img src="https://www.advadventures.com/dist/frontend/img/adv-logo-new.jpg" alt="Advanced Adventures"
                    class="h-10">
                <button id="close-mobile-menu" class="text-gray-600">
                    <i class="fas fa-times text-2xl"></i>
                </button>
            </div>

            <div class="p-4 space-y-4">
                <div class="accordion">
                    <button class="flex justify-between items-center w-full py-2 font-medium text-gray-700">
                        Destinations <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="accordion-content hidden pl-4 mt-2 space-y-2">
                        <a href="/nepal" class="block py-1 hover:text-secondary">Nepal</a>
                        <a href="/tibet" class="block py-1 hover:text-secondary">Tibet</a>
                        <a href="/bhutan" class="block py-1 hover:text-secondary">Bhutan</a>
                        <a href="#" class="block py-1 hover:text-secondary">Mt. Kailash</a>
                        <a href="#" class="block py-1 hover:text-secondary">luxury Travel</a>
                    </div>
                </div>

                <a href="/page/booking.html" class="block py-2 font-medium text-gray-700">Booking</a>
                <a href="/page/travel-guide.html" class="block py-2 font-medium text-gray-700">Travel Guide</a>
                <a href="/page/about-us.html" class="block py-2 font-medium text-gray-700">About Us</a>
                <a href="/page/csr.html" class="block py-2 font-medium text-gray-700">CSR</a>
                <a href="/testimonials.html" class="block py-2 font-medium text-gray-700">Reviews</a>

                <div class="pt-4 border-t">
                    <a href="/page/book-your-trip.html"
                        class="block w-full bg-primary hover:bg-[#122747] text-white text-center px-4 py-2 rounded-md font-medium">
                        Book Now
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>


<div class="container mx-auto px-4 py-8">
    <!-- Page Title -->
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Advanced Adventures Team</h1>

        <!-- Team Member Photos Row -->
        <div class="flex items-center space-x-2 overflow-x-auto">
            <div class="w-12 h-12 rounded-full overflow-hidden flex-shrink-0">
                <img src="/api/placeholder/50/50" alt="Team Member" class="w-full h-full object-cover">
            </div>
            <div class="w-12 h-12 rounded-full overflow-hidden flex-shrink-0">
                <img src="/api/placeholder/50/50" alt="Team Member" class="w-full h-full object-cover">
            </div>
            <div class="w-12 h-12 rounded-full overflow-hidden flex-shrink-0">
                <img src="/api/placeholder/50/50" alt="Team Member" class="w-full h-full object-cover">
            </div>
            <div class="w-12 h-12 rounded-full overflow-hidden flex-shrink-0">
                <img src="/api/placeholder/50/50" alt="Team Member" class="w-full h-full object-cover">
            </div>
            <div class="w-12 h-12 rounded-full overflow-hidden flex-shrink-0">
                <img src="/api/placeholder/50/50" alt="Team Member" class="w-full h-full object-cover">
            </div>
            <div class="w-12 h-12 rounded-full overflow-hidden flex-shrink-0">
                <img src="/api/placeholder/50/50" alt="Team Member" class="w-full h-full object-cover">
            </div>
            <div class="w-12 h-12 rounded-full overflow-hidden flex-shrink-0">
                <img src="/api/placeholder/50/50" alt="Team Member" class="w-full h-full object-cover">
            </div>
            <div class="w-12 h-12 rounded-full overflow-hidden flex-shrink-0">
                <img src="/api/placeholder/50/50" alt="Team Member" class="w-full h-full object-cover">
            </div>
            <div class="w-12 h-12 rounded-full overflow-hidden flex-shrink-0">
                <img src="/api/placeholder/50/50" alt="Team Member" class="w-full h-full object-cover">
            </div>
            <div class="w-12 h-12 rounded-full overflow-hidden flex-shrink-0">
                <img src="/api/placeholder/50/50" alt="Team Member" class="w-full h-full object-cover">
            </div>
        </div>
    </div>

    <!-- Navigation Tabs -->
    <div class="border-b border-gray-300 mb-8">
        <nav class="flex">
            <button id="managementTab"
                class="text-blue-600 font-semibold border-b-2 border-blue-600 px-6 py-3 mr-4">Management Team</button>
            <button id="guidesTab" class="text-gray-600 hover:text-blue-600 px-6 py-3">Guides</button>
        </nav>
    </div>

    <!-- Management Team Content -->
    <div id="managementContent" class="mb-12">
        <div class="flex flex-col items-center md:items-start md:flex-row gap-8">
            <!-- Profile Image and Name -->
            <div class="w-full md:w-1/4 flex flex-col items-center">
                <div class="w-64 h-64 rounded-full overflow-hidden mb-4">
                    <img src="/api/placeholder/256/256" alt="Keshav Wagle" class="w-full h-full object-cover">
                </div>
                <h3 class="text-xl font-bold text-gray-800">Keshav Wagle</h3>
                <p class="text-gray-600">Managing Director</p>
            </div>

            <!-- Profile Description -->
            <div class="w-full md:w-3/4">
                <p class="mb-4 text-gray-700">
                    Keshav Wagle's more than decade long experience in operational and executive management in
                    Himalayan Tourism makes him a credible figure in Himalayan Holiday sector. Having entry in the
                    Himalayan Tourism as a beginner, his hardworking attribute and visionary ideas have promoted him
                    to this status and hence he can put himself in anyone's shoes catering services to the travelers
                    across Himalayan nations.
                </p>
                <p class="mb-4 text-gray-700">
                    Emerging tourism entrepreneur of Nepal, Mr. Keshav is the executive member of Trekking Agencies
                    Association of Nepal (TAAN). Having pleasant personality and great leadership skills, Mr. Wagle
                    prioritizes client's safety while operating tours and treks across Himalayas. As the Managing
                    Director of the company he believes in catering quality services and does everything and
                    sometimes goes out of the box to cater the best services to the clients of Advanced Adventures.
                </p>
                <p class="text-gray-700">
                    Graduated from Tribhuvan University, Mr. Wagle has been involved in several community welfare
                    projects and philanthropic activities.
                </p>
            </div>
        </div>
    </div>

    <!-- Guides Content (initially hidden) -->
    <div id="guidesContent" class="mb-12 hidden">
        <div class="flex flex-col items-center md:items-start md:flex-row gap-8">
            <!-- Profile Image and Name -->
            <div class="w-full md:w-1/4 flex flex-col items-center">
                <div class="w-64 h-64 rounded-full overflow-hidden mb-4">
                    <img src="/api/placeholder/256/256" alt="Lok Bhatta" class="w-full h-full object-cover">
                </div>
                <h3 class="text-xl font-bold text-gray-800">Lok Bhatta</h3>
                <p class="text-gray-600">Trek Guide</p>
            </div>

            <!-- Profile Description -->
            <div class="w-full md:w-3/4">
                <p class="mb-4 text-gray-700">
                    Mr. Lok Bhatta is one of our best and professional guide in the company. He has been guiding with us
                    from last 12 years. He have trekked over to our major
                    trekking region of- Everest Region, Annapurna Region, Mustang Region, Manalsu Region, Langtang
                    Region etc. He is loyal, dedicated, honest and quiet person, but
                    do guides his groups most carefully and ensure professional and personalized services.
                </p>
                <p class="text-gray-700">
                    He is licensed from Nepal Gov, Department of Tourism as professioanl trekking guide in Nepal. He
                    loves meeting new peoples and guiding them to our Himalayas!
                </p>
            </div>
        </div>
    </div>

    <!-- Newsletter Section (preserved as requested) -->
    <div class="mt-12">
        <div class="bg-indigo-50 p-6 rounded-lg shadow-sm">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between">
                <div class="mb-4 sm:mb-0">
                    <p class="text-gray-800 font-medium text-lg">Sign Up for Newsletter for Special Deals &
                        Discounts</p>
                    <p class="text-gray-600 text-sm mt-1">Stay updated with our latest offers and travel
                        packages</p>
                </div>
                <div class="sm:ml-4 flex-shrink-0">
                    <form class="flex w-full sm:w-auto">
                        <input type="email" placeholder="Your Email Address"
                            class="px-4 py-2 w-full sm:w-64 rounded-l border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                            required>
                        <button type="submit"
                            class="bg-indigo-600 text-white px-4 py-2 rounded-r hover:bg-indigo-700 transition-colors whitespace-nowrap">
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- WhatsApp Floating Button -->
    <div class="fixed bottom-8 right-8">
        <a href="#"
            class="bg-green-500 text-white rounded-full p-3 shadow-lg flex items-center justify-center hover:bg-green-600 transition-colors">
            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                <path
                    d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L0 24l6.335-1.652a11.882 11.882 0 005.647 1.44h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
            </svg>
        </a>
    </div>

    <!-- Tab Switching Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const managementTab = document.getElementById('managementTab');
            const guidesTab = document.getElementById('guidesTab');
            const managementContent = document.getElementById('managementContent');
            const guidesContent = document.getElementById('guidesContent');

            managementTab.addEventListener('click', function () {
                // Show Management content, hide Guides content
                managementContent.classList.remove('hidden');
                guidesContent.classList.add('hidden');

                // Update tab styling
                managementTab.className = 'text-blue-600 font-semibold border-b-2 border-blue-600 px-6 py-3 mr-4';
                guidesTab.className = 'text-gray-600 hover:text-blue-600 px-6 py-3';
            });

            guidesTab.addEventListener('click', function () {
                // Show Guides content, hide Management content
                guidesContent.classList.remove('hidden');
                managementContent.classList.add('hidden');

                // Update tab styling
                guidesTab.className = 'text-blue-600 font-semibold border-b-2 border-blue-600 px-6 py-3';
                managementTab.className = 'text-gray-600 hover:text-blue-600 px-6 py-3 mr-4';
            });
        });
    </script>
</div>





<body>

</body>

</html>