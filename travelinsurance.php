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


<div class="container mx-auto px-4 lg:px-8 py-8">
    <div class="flex items-center text-gray-600 mb-6">
        <a href="/" class="hover:text-blue-500">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                </path>
            </svg>
        </a>
        <span class="mx-2">→</span>
        <span>Travel Insurance</span>
    </div>
    <!-- Main Content and Sidebar Wrapper -->
    <div class="flex flex-col lg:flex-row gap-8">
        <!-- Main Content -->
        <div class="w-full lg:w-3/4">
            <h1 class="text-3xl font-bold mb-6">Travel Insurance</h1>

            <!-- Featured Image -->
            <div class="mb-8">
                <img src="assets/travelinsurance.png" alt="Nepal Visa" class="w-full h-auto rounded-lg shadow-md mb-6">
            </div>

            <!-- Nepal Visa Info -->
            <div class="space-y-6 text-gray-800 leading-relaxed text-[16px]">
                <h2 class="text-2xl font-bold mb-4 text-blue-700">Travel Insurance Recommendations</h2>

                <div class="bg-yellow-100 border-l-4 border-yellow-500 p-4 mb-4">
                    <p class="font-semibold">
                        Important: You must have travel insurance that covers:
                    </p>
                    <ul class="list-disc list-inside pl-2">
                        <li>Emergency air ambulance/helicopter rescue services</li>
                        <li>Medical expenses</li>
                        <li>Trip cancellation</li>
                    </ul>
                </div>

                <!-- Worldwide -->
                <div class="mb-6">
                    <h3 class="text-xl font-semibold text-blue-600 mb-3">Worldwide</h3>
                    <div class="space-y-2">
                        <div class="bg-white shadow rounded-lg p-4 hover:bg-blue-50 transition-colors">
                            <p class="font-medium">Global Rescue</p>
                            <a href="https://www.globalrescue.com" target="_blank" rel="noopener noreferrer"
                                class="text-blue-600 hover:underline">
                                www.globalrescue.com
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Australia & New Zealand -->
                <div class="mb-6">
                    <h3 class="text-xl font-semibold text-blue-600 mb-3">Australia & New Zealand</h3>
                    <div class="space-y-2">
                        <div class="bg-white shadow rounded-lg p-4 hover:bg-blue-50 transition-colors">
                            <p class="font-medium">I - Fast Cover (Australia)</p>
                            <a href="https://www.fastcover.com.au" target="_blank" rel="noopener noreferrer"
                                class="text-blue-600 hover:underline">
                                www.fastcover.com.au
                            </a>
                        </div>
                        <div class="bg-white shadow rounded-lg p-4 hover:bg-blue-50 transition-colors">
                            <p class="font-medium">II - Cover-More Travel Insurance</p>
                            <a href="https://www.covermore.com.au" target="_blank" rel="noopener noreferrer"
                                class="text-blue-600 hover:underline">
                                www.covermore.com.au
                            </a>
                        </div>
                        <div class="bg-white shadow rounded-lg p-4 hover:bg-blue-50 transition-colors">
                            <p class="font-medium">III - Travel Insurance Direct</p>
                            <a href="https://www.travelinsurancedirect.com.au" target="_blank" rel="noopener noreferrer"
                                class="text-blue-600 hover:underline">
                                www.travelinsurancedirect.com.au
                            </a>
                        </div>
                        <div class="bg-white shadow rounded-lg p-4 hover:bg-blue-50 transition-colors">
                            <p class="font-medium">IV - 1 Cover Travel Insurance</p>
                            <a href="https://www.1cover.com.au/" target="_blank" rel="noopener noreferrer"
                                class="text-blue-600 hover:underline">
                                www.1cover.com.au/
                            </a>
                            <p class="text-gray-600 mt-1">Email: travel@1cover.com.au</p>
                        </div>
                    </div>
                </div>

                <!-- USA & Canada -->
                <div class="mb-6">
                    <h3 class="text-xl font-semibold text-blue-600 mb-3">USA & Canada</h3>
                    <div class="space-y-2">
                        <div class="bg-white shadow rounded-lg p-4 hover:bg-blue-50 transition-colors">
                            <p class="font-medium">I - World Nomads (Keep Traveling Safely)</p>
                            <a href="https://www.worldnomads.com" target="_blank" rel="noopener noreferrer"
                                class="text-blue-600 hover:underline">
                                www.worldnomads.com
                            </a>
                        </div>
                        <div class="bg-white shadow rounded-lg p-4 hover:bg-blue-50 transition-colors">
                            <p class="font-medium">II - Allianz Assistance</p>
                            <a href="https://www.allianz-assistance.ca" target="_blank" rel="noopener noreferrer"
                                class="text-blue-600 hover:underline">
                                www.allianz-assistance.ca
                            </a>
                        </div>
                        <div class="bg-white shadow rounded-lg p-4 hover:bg-blue-50 transition-colors">
                            <p class="font-medium">III - TIC Travel Insurance Coordinators Ltd.</p>
                            <a href="https://www.travelinsurance.ca" target="_blank" rel="noopener noreferrer"
                                class="text-blue-600 hover:underline">
                                www.travelinsurance.ca
                            </a>
                        </div>
                        <div class="bg-white shadow rounded-lg p-4 hover:bg-blue-50 transition-colors">
                            <p class="font-medium">IV - Travel Guard</p>
                            <a href="https://www.travelguard.com" target="_blank" rel="noopener noreferrer"
                                class="text-blue-600 hover:underline">
                                www.travelguard.com
                            </a>
                        </div>
                    </div>
                </div>

                <!-- U.K. Citizen -->
                <div class="mb-6">
                    <h3 class="text-xl font-semibold text-blue-600 mb-3">U.K. Citizen</h3>
                    <div class="space-y-2">
                        <div class="bg-white shadow rounded-lg p-4 hover:bg-blue-50 transition-colors">
                            <p class="font-medium">I - British Mountaineering Council BMC INSURANCE</p>
                            <a href="https://www.thebmc.co.uk" target="_blank" rel="noopener noreferrer"
                                class="text-blue-600 hover:underline">
                                www.thebmc.co.uk
                            </a>
                        </div>
                        <div class="bg-white shadow rounded-lg p-4 hover:bg-blue-50 transition-colors">
                            <p class="font-medium">II - First Assist Services Limited</p>
                        </div>
                        <div class="bg-white shadow rounded-lg p-4 hover:bg-blue-50 transition-colors">
                            <p class="font-medium">III - Cigna Insurance</p>
                            <a href="https://www.cignainsurance.co.uk" target="_blank" rel="noopener noreferrer"
                                class="text-blue-600 hover:underline">
                                www.cignainsurance.co.uk
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Europe -->
                <div class="mb-6">
                    <h3 class="text-xl font-semibold text-blue-600 mb-3">Europe</h3>
                    <div class="space-y-2">
                        <div class="bg-white shadow rounded-lg p-4 hover:bg-blue-50 transition-colors">
                            <p class="font-medium">I - Europe Assistance</p>
                            <a href="https://www.europ-assistance.com" target="_blank" rel="noopener noreferrer"
                                class="text-blue-600 hover:underline">
                                www.europ-assistance.com
                            </a>
                        </div>
                        <div class="bg-white shadow rounded-lg p-4 hover:bg-blue-50 transition-colors">
                            <p class="font-medium">II - International SOS</p>
                            <a href="https://www.internationalsos.com/en/" target="_blank" rel="noopener noreferrer"
                                class="text-blue-600 hover:underline">
                                www.internationalsos.com/en/
                            </a>
                        </div>
                        <div class="bg-white shadow rounded-lg p-4 hover:bg-blue-50 transition-colors">
                            <p class="font-medium">Poland - SIGNAL IDUNA UBEZPIECZENIA</p>
                            <a href="https://www.signal-iduna.pl" target="_blank" rel="noopener noreferrer"
                                class="text-blue-600 hover:underline">
                                www.signal-iduna.pl
                            </a>
                        </div>
                        <div class="bg-white shadow rounded-lg p-4 hover:bg-blue-50 transition-colors">
                            <p class="font-medium">Spain - AXA</p>
                            <a href="https://www.axa.es" target="_blank" rel="noopener noreferrer"
                                class="text-blue-600 hover:underline">
                                www.axa.es
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Singapore & Malaysia -->
                <div class="mb-6">
                    <h3 class="text-xl font-semibold text-blue-600 mb-3">Singapore & Malaysia</h3>
                    <div class="space-y-2">
                        <div class="bg-white shadow rounded-lg p-4 hover:bg-blue-50 transition-colors">
                            <p class="font-medium">I - World Nomads</p>
                            <a href="https://www.worldnomads.com" target="_blank" rel="noopener noreferrer"
                                class="text-blue-600 hover:underline">
                                www.worldnomads.com
                            </a>
                        </div>
                        <div class="bg-white shadow rounded-lg p-4 hover:bg-blue-50 transition-colors">
                            <p class="font-medium">II - MSIG ASSIST</p>
                            <a href="https://www.msig.com.my" target="_blank" rel="noopener noreferrer"
                                class="text-blue-600 hover:underline">
                                www.msig.com.my
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Disclaimer -->
                <div class="bg-gray-100 border-t-4 border-gray-500 p-4 mt-6">
                    <p class="text-sm italic">
                        Note: These insurance companies are recommendations based on previous travelers.
                        You are responsible for reviewing and verifying the policy details and coverage.
                        Advanced Adventures does not take responsibility for these insurance policies.
                    </p>
                </div>
            </div>


            <!-- Newsletter -->
            <div class="mt-10">
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
        </div>

        <!-- Sidebar -->
        <aside class="w-full lg:w-1/4">
            <div class="sticky top-6">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Related Pages</h3>
                    <ul class="space-y-3">
                        <li class="border-b pb-3">
                            <a href="#" class="text-blue-600 hover:text-blue-800 transition-colors">Travel Insurance</a>
                        </li>
                        <li class="border-b pb-3">
                            <a href="#" class="text-blue-600 hover:text-blue-800 transition-colors">Nepal Travel
                                Guide</a>
                        </li>
                        <li class="border-b pb-3">
                            <a href="#" class="text-blue-600 hover:text-blue-800 transition-colors">Packing List</a>
                        </li>
                        <li class="border-b pb-3">
                            <a href="#" class="text-blue-600 hover:text-blue-800 transition-colors">Nepal Visa</a>
                        </li>
                        <li class="border-b pb-3">
                            <a href="#" class="text-blue-600 hover:text-blue-800 transition-colors">Equipment Check
                                List</a>
                        </li>
                        <li class="border-b pb-3">
                            <a href="#" class="text-blue-600 hover:text-blue-800 transition-colors">Best Time to
                                Travel</a>
                        </li>
                        <li class="border-b pb-3">
                            <a href="#" class="text-blue-600 hover:text-blue-800 transition-colors">Bhutan Travel
                                Guide</a>
                        </li>
                        <li class="border-b pb-3">
                            <a href="#" class="text-blue-600 hover:text-blue-800 transition-colors">Tibet Travel
                                Guide</a>
                        </li>
                    </ul>
                </div>
            </div>
        </aside>
    </div>
</div>




<body>

</body>

</html>