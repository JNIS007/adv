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
    <!-- Breadcrumb -->
    <div class="flex items-center text-gray-600 mb-6">
        <a href="/" class="hover:text-blue-500">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                </path>
            </svg>
        </a>
        <span class="mx-2">→</span>
        <span>Terms & Conditions</span>
    </div>

    <!-- Main Content and Sidebar -->
    <div class="flex flex-col lg:flex-row gap-8">
        <!-- Terms & Conditions -->
        <div class="w-full lg:w-3/4">
            <h1 class="text-3xl font-bold mb-6">Terms & Conditions</h1>

            <!-- Featured Image -->
            <div class="mb-8">
                <img src="assets/termsandconditions.png" alt="Terms and Conditions"
                    class="w-full h-auto rounded-lg shadow-md mb-6">
            </div>

            <!-- Terms & Conditions Content - Aligned with image -->
            <div class="space-y-8 text-gray-800 leading-relaxed text-[16px]">
                <!-- Introduction -->
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <h2 class="text-2xl font-semibold text-primary border-b pb-3 mb-4">BOOKING TERMS & CONDITIONS</h2>
                    <div class="prose max-w-none">
                        <p>By booking a trip with Advanced Adventures Nepal, you agree to be bound by these Terms. These
                            terms form a legal contract between you and us. If you're booking on behalf of others, you
                            confirm that you have the authority to accept these terms for them.</p>
                        <p class="mt-3"><strong>Note:</strong> Trekking, climbing, and mountaineering in the Himalayas
                            involve risks
                            due to altitude and terrain. You accept these risks when booking with us.</p>
                    </div>
                </div>

                <!-- Payment Terms -->
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <h2 class="text-2xl font-semibold text-primary border-b pb-3 mb-4">BOOKING CONFIRMATION & PAYMENTS
                    </h2>
                    <div class="prose max-w-none">
                        <p>To confirm your booking, a <strong>20% deposit for Nepal trips</strong> or <strong>50% for
                                Bhutan & Tibet trips</strong> is required. This deposit is non-refundable.</p>
                        <p class="mt-3">Payment methods include <strong>bank wire transfer</strong> or <strong>online
                                payment</strong> (Visa, MasterCard, AMEX with 4% surcharge).</p>
                    </div>
                </div>

                <!-- Balance Payment -->
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <h2 class="text-2xl font-semibold text-primary border-b pb-3 mb-4">BALANCE PAYMENT</h2>
                    <div class="prose max-w-none">
                        <ul class="list-disc space-y-2 ml-6">
                            <li><strong>Nepal Trips:</strong> Remaining 80% payable on arrival in Kathmandu (preferably
                                in USD cash, or card with 4% fee).</li>
                            <li><strong>Bhutan & Tibet Trips:</strong> Full balance due <strong>30 days prior</strong>
                                to departure.</li>
                        </ul>
                    </div>
                </div>

                <!-- Trip Price -->
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <h2 class="text-2xl font-semibold text-primary border-b pb-3 mb-4">TRIP PRICE</h2>
                    <div class="prose max-w-none">
                        <p>Prices are per person. Solo travelers pay a single supplement. We reserve the right to change
                            prices due to currency fluctuation, fuel costs, or changes in local operator fees.</p>
                    </div>
                </div>

                <!-- Cancellation Policy -->
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <h2 class="text-2xl font-semibold text-primary border-b pb-3 mb-4">CANCELLATION</h2>
                    <div class="prose max-w-none">
                        <p><strong>Client Cancellation:</strong> Deposit is non-refundable. No refund after trip starts.
                            For Bhutan/Tibet, 100% cancellation fee applies within 30 days.</p>
                        <p class="mt-3"><strong>Company Cancellation:</strong> Full refund or option to reschedule if
                            canceled due to
                            uncontrollable events (weather, disasters, etc.).</p>
                    </div>
                </div>

                <!-- Itinerary Changes -->
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <h2 class="text-2xl font-semibold text-primary border-b pb-3 mb-4">ITINERARY CHANGES</h2>
                    <div class="prose max-w-none">
                        <p>Flight delays due to weather are common. Clients are responsible for extra accommodation/meal
                            costs. We'll help adjust the itinerary when necessary.</p>
                    </div>
                </div>

                <!-- Trip Flexibility -->
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <h2 class="text-2xl font-semibold text-primary border-b pb-3 mb-4">TRIP FLEXIBILITY</h2>
                    <div class="prose max-w-none">
                        <p>Date changes must be requested at least 30 days prior. A US$100 amendment fee applies.
                            Last-minute changes may cost more.</p>
                    </div>
                </div>

                <!-- Insurance & Medical -->
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <h2 class="text-2xl font-semibold text-primary border-b pb-3 mb-4">INSURANCE & MEDICAL</h2>
                    <div class="prose max-w-none">
                        <p>Travel insurance covering emergency evacuation, medical expenses, and trip cancellation is
                            mandatory. We are not responsible for injuries or health issues during the trip.</p>
                    </div>
                </div>

                <!-- Missed Services -->
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <h2 class="text-2xl font-semibold text-primary border-b pb-3 mb-4">MISSED SERVICES</h2>
                    <div class="prose max-w-none">
                        <p>No refunds for missed or unused services due to voluntary or involuntary reasons (sickness,
                            early departure, etc.).</p>
                    </div>
                </div>

                <!-- Visa & Passport -->
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <h2 class="text-2xl font-semibold text-primary border-b pb-3 mb-4">VISA & PASSPORT</h2>
                    <div class="prose max-w-none">
                        <p>Ensure your passport is valid for 6 months beyond your trip. Nepal visas are available on
                            arrival. Bhutan visas are arranged by us. Tibet visas vary depending on entry point.</p>
                    </div>
                </div>

                <!-- Child Policy -->
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <h2 class="text-2xl font-semibold text-primary border-b pb-3 mb-4">CHILD POLICY</h2>
                    <div class="prose max-w-none">
                        <p>Children under 16 must travel with a legal guardian.</p>
                    </div>
                </div>

                <!-- Privacy -->
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <h2 class="text-2xl font-semibold text-primary border-b pb-3 mb-4">PRIVACY</h2>
                    <div class="prose max-w-none">
                        <p>Personal details collected for booking are confidential and secure. We do not share your
                            information.</p>
                    </div>
                </div>

                <!-- Updates to Terms -->
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <h2 class="text-2xl font-semibold text-primary border-b pb-3 mb-4">UPDATES TO TERMS</h2>
                    <div class="prose max-w-none">
                        <p>We may update these terms at any time. The current version is always on our website.</p>
                    </div>
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
        <aside class="w-full lg:w-1/4 mt-6 lg:mt-0">
            <div class="sticky top-6">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Related Pages</h3>
                    <ul class="space-y-3">
                        <li class="border-b pb-3">
                            <a href="#" class="text-blue-600 hover:text-blue-800 transition-colors">Discount Offer</a>
                        </li>
                        <li class="border-b pb-3">
                            <a href="#" class="text-blue-600 hover:text-blue-800 transition-colors">Terms &
                                Conditions</a>
                        </li>
                        <li class="border-b pb-3">
                            <a href="#" class="text-blue-600 hover:text-blue-800 transition-colors">How to Pay</a>
                        </li>
                        <li class="border-b pb-3">
                            <a href="#" class="text-blue-600 hover:text-blue-800 transition-colors">Book Your Trip</a>
                        </li>
                        <li>
                            <a href="#" class="text-blue-600 hover:text-blue-800 transition-colors">Pay Online</a>
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