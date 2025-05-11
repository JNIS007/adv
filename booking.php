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

        /* Optional: To ensure sticky elements behave as expected */
        .sticky {
            position: -webkit-sticky;
            /* For Safari support */
            position: sticky;
            top: 0;
            z-index: 10;
        }


        @media (max-width: 1024px) {

            .testimonial-prev,
            .testimonial-next {
                display: none;
            }
        }
    </style>
</head>

<body class="font-sans antialiased">
    <div class="bg-gray-800 text-white text-sm py-2">
        <div class="container mx-auto px-4 flex justify-between items-center text-sm md:text-base">
            <span><i class="fas fa-medal mr-1"></i> 15 Years Experience</span>
            <div>
                <div class="flex items-center space-x-4">
                    <span><i class="fas fa-phone-alt mr-1"></i> +977-9851189771</span>
                    <a href="https://api.whatsapp.com/send?phone=9779851189771" target="_blank"
                        class="hover:text-secondary">
                        <i class="fab fa-whatsapp mr-1"></i> WhatsApp
                    </a>
                    <a href="viber://contact?number=9779851189771" target="_blank" class="hover:text-secondary">
                        <i class="fab fa-viber mr-1"></i> Viber
                    </a>
                </div>
            </div>
        </div>
    </div>
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

                        <div id="countries-dropdown"
                            class="absolute left-0 hidden w-48 mt-2 bg-white rounded-md shadow-xl">
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
                                                            <?= $cat['name'] ?> <i
                                                                class="ml-2 text-xs fas fa-chevron-right"></i>
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
                    <a href="/page/booking.html"
                        class="font-medium text-gray-700 hover:text-primary transition">Booking</a>
                    <a href="/page/travel-guide.html"
                        class="font-medium text-gray-700 hover:text-primary transition">Travel
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


                </nav>
            </div>
        </div>
    </header>
    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Booking Form -->
            <div class="lg:col-span-2 bg-white p-6 rounded shadow flex flex-col space-y-6">
                <h2 class="text-2xl font-bold mb-6 text-gray-800">Book your trip now</h2>
                <form action="submit_booking.php" method="POST" class="space-y-6">
                    <!-- Trip Selection -->
                    <div class="grid md:grid-cols-3 gap-4">
                        <div>
                            <label class="block font-medium mb-1 text-gray-700">Your selected trip *</label>
                            <select name="trip" required class="w-full border border-gray-300 p-2 rounded">
                                <option value="">Select your package</option>
                            </select>
                        </div>
                        <div>
                            <label class="block font-medium mb-1 text-gray-700">Select trip date *</label>
                            <input type="date" name="trip_date" required
                                class="w-full border border-gray-300 p-2 rounded">
                        </div>
                        <div>
                            <label class="block font-medium mb-1 text-gray-700">Select travellers number *</label>
                            <input type="number" name="travellers" value="1" min="1" required
                                class="w-full border border-gray-300 p-2 rounded">
                        </div>
                    </div>

                    <!-- Traveller Information -->
                    <h3 class="text-xl font-semibold text-gray-800">Information of traveller 1</h3>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div class="flex gap-2">
                            <select name="salutation" class="border border-gray-300 p-2 rounded">
                                <option>Mr.</option>
                                <option>Ms.</option>
                                <option>Mrs.</option>
                            </select>
                            <input type="text" name="fullname" required placeholder="Full Name"
                                class="flex-1 border border-gray-300 p-2 rounded">
                        </div>
                        <input type="email" name="email" required placeholder="Enter your email here"
                            class="w-full border border-gray-300 p-2 rounded">
                        <input type="tel" name="contact" placeholder="Contact Number"
                            class="w-full border border-gray-300 p-2 rounded">
                        <input type="text" name="country" required placeholder="Your Current Country"
                            class="w-full border border-gray-300 p-2 rounded">
                        <input type="text" name="passport" required placeholder="Passport Number"
                            class="w-full border border-gray-300 p-2 rounded">
                        <input type="text" name="emergency" required
                            placeholder="Enter personal address and number in case of emergency"
                            class="w-full border border-gray-300 p-2 rounded">
                        <select name="ref_source" class="w-full border border-gray-300 p-2 rounded">
                            <option value="">Select how did you find us?</option>
                            <option>Google</option>
                            <option>Facebook</option>
                            <option>Friend</option>
                            <option>Other</option>
                        </select>
                        <textarea name="special_request" rows="3" class="w-full border border-gray-300 p-2 rounded"
                            placeholder="Do you have any other special questions or request?"></textarea>
                    </div>

                    <!-- Agreement -->
                    <div class="flex items-center gap-2">
                        <input type="checkbox" name="agree" required class="border-gray-300">
                        <label for="agree" class="text-sm text-gray-700">I agree to all the booking terms and
                            conditions</label>
                    </div>

                    <!-- Submit -->
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded">
                        Submit Booking
                    </button>
                </form>
            </div>

            <!-- Aside Content -->
            <aside class="bg-gray-100 p-6 rounded shadow sticky top-0">
                <h3 class="text-xl font-semibold mb-4 text-gray-800">Why Book With Us?</h3>
                <ul class="list-disc list-inside space-y-2 text-gray-700">
                    <li>Group Discounts Available</li>
                    <li>Guaranteed Departures</li>
                    <li>Local Professional Guides</li>
                    <li>Safe and Secure Trips</li>
                    <li>Private & Group Departures</li>
                </ul>
            </aside>
        </div>
    </div>




</html>