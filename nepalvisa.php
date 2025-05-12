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
        <span>Nepal Visa</span>
    </div>
    <!-- Main Content and Sidebar Wrapper -->
    <div class="flex flex-col lg:flex-row gap-8">
        <!-- Main Content -->
        <div class="w-full lg:w-3/4">
            <h1 class="text-3xl font-bold mb-6">Nepal Visa</h1>

            <!-- Featured Image -->
            <div class="mb-8">
                <img src="assets/nepalvisa.png" alt="Nepal Visa" class="w-full h-auto rounded-lg shadow-md mb-6">
            </div>

            <!-- Nepal Visa Info -->
            <div class="space-y-6 text-gray-800 leading-relaxed text-[16px]">
                <p>If you plan to travel to Nepal, a visa is a mandatory document for international travellers to enter
                    the
                    country. Fortunately, obtaining a Nepal visa is a straightforward process. You can easily acquire a
                    Nepal visa on arrival, which is a quick and simple procedure. To streamline the process, you can
                    fill
                    out an online form, print it, and bring it with you when you arrive.</p>

                <p>You can download the visa form from this link:
                    <a href="https://nepaliport.immigration.gov.np/on-arrival/IO01"
                        class="text-blue-600 font-semibold hover:underline" target="_blank"
                        rel="noopener noreferrer">Nepal Visa Form</a>.
                </p>

                <p>Alternatively, you can also obtain a Nepal visa from the Nepalese Embassy or Nepalese Diplomatic
                    Missions
                    abroad before your trip.</p>

                <h2 class="text-xl font-semibold mt-6">The cost of Nepal visa fees is as follows:</h2>
                <ul class="list-disc list-inside space-y-1">
                    <li>15–Day Visa: US$ 30</li>
                    <li>30–Day Visa: US$ 50</li>
                    <li>90–Day Visa: US$ 125</li>
                </ul>

                <p class="mt-4">However, nationals of certain countries, including Nigeria, Ghana, Zimbabwe, Swaziland,
                    Cameroon, Somalia, Liberia, Ethiopia, Iraq, Palestine, Afghanistan, and Syria, as well as refugees
                    with
                    travel documents, must obtain a Nepal visa before their arrival.</p>

                <h2 class="text-xl font-semibold mt-6">Gratis Visa (Free Visa)</h2>
                <p>A Gratis Visa is issued free of charge to the following categories of applicants:</p>
                <ul class="list-disc list-inside space-y-1">
                    <li>Children below 10 years old.</li>
                    <li>SAARC citizens (except Afghanistan) for up to 30 days once in a given visa year.</li>
                    <li>Non-Residential Nepalese (NRN) card holders (issued by MoFA/Nepalese diplomatic missions
                        abroad).</li>
                    <li>Chinese nationals.</li>
                </ul>

                <p class="mt-4">Additionally, officials from China, Brazil, Russia, and Thailand do not require an entry
                    visa due to reciprocal visa waiver agreements.</p>
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