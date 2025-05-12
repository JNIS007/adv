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
        <span>Tibet Travel Guide</span>
    </div>
    <!-- Main Content and Sidebar Wrapper -->
    <div class="flex flex-col lg:flex-row gap-8">
        <!-- Main Content -->
        <div class="w-full lg:w-3/4">
            <h1 class="text-3xl font-bold mb-6">Tibet Travel Guide</h1>

            <!-- Featured Image -->
            <div class="mb-8">
                <img src="assets/nepaltravelguide.png" alt="Nepal Visa" class="w-full h-auto rounded-lg shadow-md mb-6">
            </div>

            <div class="space-y-6 text-gray-800 leading-relaxed text-[16px]">
                <p><strong>Facts about Tibet</strong></p>
                <ul class="list-disc list-inside">
                    <li>Tibet is home to distinct cultural traditions and astounding natural scenery, making it a top
                        destination among travelers.</li>
                    <li>The plateau of Tibet is the world’s highest plateau with an average elevation of over 4,500
                        meters.</li>
                    <li>World Heritage sites located in Tibet are, the Potala Palace, the Norbulingka Palace, and the
                        Jokhang Temple.</li>
                    <li>Buddhism is the foundation of Tibet’s culture and everyday life.</li>
                    <li>Tibet holds the third largest store of fresh water and ice in the world after the Arctic and
                        Antarctic.</li>
                </ul>

                <p><strong>How we can Enter Tibet?</strong><br>
                    We can enter Tibet from Nepal and from Mainland China.</p>

                <p><strong>From Nepal:</strong><br>
                    <u>By Air:</u> We have two direct flights between Lhasa and Kathmandu, run by Air China and Sichuan
                    Air. You get the stunning bird’s-eye view of the Himalayas including Mt. Everest, the world’s
                    highest peak flying from Nepal.<br><br>
                    <u>By Road:</u> Driving from Nepal is the most common way to enter Tibet. We have many cheap direct
                    international flights to Kathmandu; many tourists find it convenient to fly to Kathmandu then enter
                    Tibet via land. You can enter Tibet via Kerung border, Simikot border, and Kodari border. Due to the
                    Nepal earthquake in 2015, the Kodari border is temporarily closed. The Kerung border, which is 3
                    hours away from Kathmandu, is used. Note that the Simikot border is used mostly by travelers wishing
                    to tour/trek Mt. Kailash.
                </p>

                <p><strong>From Mainland China:</strong><br>
                    <u>Train/Railway:</u> There are five routes that connect China and Tibet by train. The popular
                    choice is to take the Qinghai-Tibet Railway. It takes 2 days for travelers to reach Lhasa from
                    Beijing. Travelling from Xining to Tibet takes around 21 hours. There is daily train service from
                    Shanghai to Tibet. The Chengdu-Tibet train departs every other day and takes around 43 hours. The
                    train ride from Guangzhou to Tibet is the longest and takes around 54 hours.<br><br>
                    <u>Flights:</u> Tourists can fly to Tibet from Beijing, Shanghai, and Chengdu within 7 hours. At
                    present, there are direct flights to Lhasa from Beijing, Shanghai, Chengdu, Shangri-la, Kunming,
                    Guangzhou, Chongqing, Xian, Xining, and Kathmandu. There are also several daily flights from Chengdu
                    to Shigatse and Nyingchi in Tibet.<br><br>
                    <u>By Land:</u> Entering Tibet via mainland China by land is very expensive and takes from 7 – 15
                    days. Qinghai-Tibet Highway (1937 km, an estimated 5–7 days), Xinjiang-Tibet Highway (2086 km, an
                    estimated 10–15 days).
                </p>

                <p><strong>Passport and Visa Information</strong><br>
                    Travelling to Tibet requires a Chinese visa and a Tibet Travel Permit which can both be obtained in
                    Kathmandu with the help of a travel company (Tibet via Nepal). A valid visa for China is not the
                    same as a Tibet Travel Permit. Those with a Chinese tourist visa will still need to apply for a
                    Tibet Travel Permit. The permit is still required for foreign travelers travelling to Tibet from
                    mainland China.<br><br>
                    To acquire the permit, you need to book a guide for your entire trip and pre-arrange private
                    transport for trips outside Lhasa. The trip outside Lhasa also requires additional permits which are
                    arranged by the company you are travelling with.</p>

                <p><strong>Travel Insurance</strong><br>
                    Travel insurance is coverage designed to protect against risks and financial losses that could
                    happen while traveling. Tibet is a remote location, and if you become seriously injured or very
                    sick, you may need to be evacuated by air. Under these circumstances, you don’t want to be without
                    adequate health insurance. Be sure your policy covers evacuation.</p>

                <p><strong>Banking and Foreign Exchange</strong><br>
                    The circulated currency in Tibet is renminbi (RMB). Foreign currency can be exchanged in the banks
                    there. All the branches of the Bank of China in Lhasa and other cities provide such services.
                    Chinese banks in Lhasa include Bank of China, China Construction Bank, Industrial and Commercial
                    Bank of China, and Agricultural Bank of China. Additionally, some 4/5 star hotels also offer
                    exchange services.<br><br>
                    Tibetans do not use and accept coins. You are also advised to carry enough cash if travelling to
                    remote areas in Shigatse, Shannan, Ngari, Nyingchi, and Nagqu where banking services are limited.
                </p>

                <p><strong>Electricity in Tibet</strong><br>
                    In Tibet, the power sockets are of type A, C, and I. The standard voltage is 220 V and the standard
                    frequency is 50 Hz. If the standard voltage in your country is between 220 – 240 V (as in the UK,
                    Europe, Australia, and most of Asia and Africa) you can easily use your electric appliances in
                    Tibet.<br><br>
                    However, if the standard voltage in your country is in the range of 100 V – 127 V (as in the US,
                    Canada, and most South American countries), you need a voltage converter in Tibet. You can bring
                    your own voltage converter as you might not find them in Tibetan stores. Alternately, you can also
                    buy them in Kathmandu (if travelling to Tibet via Nepal).<br><br>
                    If the label in your electric appliance states ‘INPUT: 100-240V, 50/60 Hz’ the appliance can be used
                    in all countries of the world. This is common for chargers of tablets/laptops, photo cameras, cell
                    phones, toothbrushes, etc.</p>

                <p><strong>Drinking Water</strong><br>
                    It is not wise to drink tap water or ice made from tap water. Most hotels in urban areas including
                    Lhasa boil the water first before serving them hot or cold. However, when trekking in the more
                    remote areas you should boil your own water or treat it with water-purification tablets. Tea is
                    always safe to drink but you are advised to refrain from locally brewed alcohol as it’s often made
                    with contaminated well water. Large 5-liter bottles of drinking water are available in most
                    supermarkets.<br><br>
                    The water in Tibet is ‘hard water’ so you need to boil it at least for 10 minutes to purify it.
                    Consider purchasing a water filter for a long trip (often more economical than buying bottled
                    water). Total filters take out all parasites, bacteria, and viruses, and make water safe to
                    drink.<br><br>
                    Chlorine tablets (e.g., Puritabs or Steritabs) will kill many pathogens, but not giardia and amoebic
                    cysts. Iodine is more effective for purifying water and is available in liquid (Lugol’s solution) or
                    tablet (e.g., Potable Aqua) form. Follow the directions carefully and remember that too much iodine
                    can be harmful.</p>

                <p><strong>Best Time to Visit Tibet</strong><br>
                    Visiting Tibet from May to September is the most popular season. The weather is warm with clear
                    skies. The snow/ice starts melting from April, clearing the blocked roads and making it easier for
                    you to visit various Tibetan villages. However, since this is the peak season, the prices are at
                    their highest.<br><br>
                    If you want to avoid crowds during your Tibet tour, you can visit Tibet in either April or between
                    October to November. The weather is cold but there are not a lot of tourists visiting, so you get
                    more options for hotels and vehicles.<br><br>
                    The lowest tourist season in Tibet is winter (Dec–Feb). The weather is very cold but you have all
                    the attractions to yourself.</p>
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