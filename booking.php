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
        document.addEventListener('DOMContentLoaded', function() {
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
                        primary: '#1a365d', // Deep navy for professionalism
                        secondary: '#c2410c', // Adventurous orange for accents
                    },
                    animation: {
                        'fadeIn': 'fadeIn 0.8s ease-out forwards',
                    },
                    keyframes: {
                        fadeIn: {
                            'from': {
                                opacity: '0',
                                transform: 'translateY(20px)'
                            },
                            'to': {
                                opacity: '1',
                                transform: 'translateY(0)'
                            }
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

<body>
    <div class="py-2 text-sm text-white bg-gray-800">
        <div class="container flex items-center justify-between px-4 mx-auto text-sm md:text-base">
            <span><i class="mr-1 fas fa-medal"></i> 15 Years Experience</span>
            <div>
                <div class="flex items-center space-x-4">
                    <span><i class="mr-1 fas fa-phone-alt"></i> +977-9851189771</span>
                    <a href="https://api.whatsapp.com/send?phone=9779851189771" target="_blank"
                        class="hover:text-secondary">
                        <i class="mr-1 fab fa-whatsapp"></i> WhatsApp
                    </a>
                    <a href="viber://contact?number=9779851189771" target="_blank" class="hover:text-secondary">
                        <i class="mr-1 fab fa-viber"></i> Viber
                    </a>
                </div>
            </div>
        </div>
    </div>
    <header class="sticky top-0 z-50 bg-white shadow-md">
        <div class="container px-4 mx-auto">
            <div class="flex items-center justify-between py-4">
                <!-- Logo -->
                <a href="#" class="flex items-center">
                    <img src="assets/logo.png" alt="Advanced Adventures" class="object-contain h-12 md:h-16">
                </a>

                <!-- Desktop Navigation -->
                <nav class="items-center hidden space-x-8 lg:flex">
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
                                            class="absolute top-0 hidden bg-white rounded-md shadow-xl whitespace-nowrap left-full">
                                            <ul class="py-1">
                                                <?php foreach ($dest['categories'] as $cat): ?>
                                                    <li class="relative group">
                                                        <button
                                                            class="flex items-center justify-between w-full px-4 py-2 hover:bg-gray-50 hover:text-secondary">
                                                            <?= $cat['name'] ?> <i
                                                                class="ml-2 text-xs fas fa-chevron-right"></i>
                                                        </button>

                                                        <div
                                                            class="absolute top-0 hidden bg-white rounded-md shadow-xl whitespace-nowrap left-full">
                                                            <ul class="py-1">
                                                                <?php foreach ($cat['subcategories'] as $sub): ?>
                                                                    <li class="relative group">
                                                                        <button
                                                                            class="flex items-center justify-between w-full px-4 py-2 hover:bg-gray-50 hover:text-secondary">
                                                                            <?= $sub['name'] ?> <i
                                                                                class="ml-2 text-xs fas fa-chevron-right"></i>
                                                                        </button>

                                                                        <div
                                                                            class="absolute top-0 hidden bg-white rounded-md shadow-xl whitespace-nowrap left-full">
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
                        class="font-medium text-gray-700 transition hover:text-primary">Booking</a>
                    <a href="/page/travel-guide.html"
                        class="font-medium text-gray-700 transition hover:text-primary">Travel
                        Guide</a>
                    <a href="/page/about-us.html" class="font-medium text-gray-700 transition hover:text-primary">About
                        Us</a>
                    <a href="/page/csr.html" class="font-medium text-gray-700 transition hover:text-primary">CSR</a>
                    <a href="/testimonials.html" class="font-medium text-gray-700 transition hover:text-primary">Trip
                        Reviews</a>
                    <a href="#" class="font-medium text-gray-700 transition hover:text-primary">Travel Blog</a>
                    <a href="#" class="font-medium text-gray-700 transition hover:text-primary">Contact</a>
                    <!-- Search Button -->
                    <button class="p-2 text-gray-600 hover:text-primary">
                        <i class="fas fa-search"></i>
                    </button>


                </nav>
            </div>
        </div>
    </header>

    <div class="container px-4 py-8 mx-auto">
        <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">
            <!-- Booking Form -->
            <div class="flex flex-col p-6 space-y-6 bg-white rounded shadow lg:col-span-2">
                <h2 class="mb-6 text-2xl font-bold text-gray-800">Book your trip now</h2>
                <form action="submit_booking.php" method="POST" class="space-y-6">
                    <!-- Trip Selection -->
                    <div class="grid gap-4">
                        <!-- Full-width Trip Selection -->
                        <div>
                            <label class="block mb-1 font-medium text-gray-700">Your selected trip *</label>
                            <select name="trip" required class="w-full p-2 border border-gray-300 rounded">
                                <option value="">Select your package</option>
                                <!-- Add trip options here -->
                                <option value="package1">Trip Package 1</option>
                                <option value="package2">Trip Package 2</option>
                            </select>
                        </div>

                        <!-- Two-column layout for Date and Travellers -->
                        <div class="grid gap-4 md:grid-cols-2">
                            <!-- Trip Date -->
                            <div>
                                <label class="block mb-1 font-medium text-gray-700">Select trip date *</label>
                                <input type="date" name="trip_date" required class="w-full p-2 border border-gray-300 rounded">
                            </div>

                            <!-- Travellers -->
                            <div>
                                <label class="block mb-1 font-medium text-gray-700">Select travellers number *</label>
                                <input type="number" name="travellers" value="1" min="1" required class="w-full p-2 border border-gray-300 rounded">
                            </div>
                        </div>
                    </div>



                    <!-- Traveller Information -->
                    <h3 class="text-xl font-semibold text-gray-800">Information of traveller 1</h3>
                    <div class="grid gap-4 md:grid-cols-2">
                        <div class="flex gap-2">
                            <select name="salutation" class="p-2 border border-gray-300 rounded">
                                <option>Mr.</option>
                                <option>Ms.</option>
                                <option>Mrs.</option>
                            </select>
                            <input type="text" name="fullname" required placeholder="Full Name"
                                class="flex-1 p-2 border border-gray-300 rounded">
                        </div>
                        <input type="email" name="email" required placeholder="Enter your email here"
                            class="w-full p-2 border border-gray-300 rounded">
                        <input type="tel" name="contact" placeholder="Contact Number"
                            class="w-full p-2 border border-gray-300 rounded">
                        <input type="text" name="country" required placeholder="Your Current Country"
                            class="w-full p-2 border border-gray-300 rounded">
                        <input type="text" name="passport" required placeholder="Passport Number"
                            class="w-full p-2 border border-gray-300 rounded">
                        <input type="text" name="emergency" required
                            placeholder="Enter personal address and number in case of emergency"
                            class="w-full p-2 border border-gray-300 rounded">
                        <select name="ref_source" class="w-full p-2 border border-gray-300 rounded">
                            <option value="">Select how did you find us?</option>
                            <option>Google</option>
                            <option>Facebook</option>
                            <option>Friend</option>
                            <option>Other</option>
                        </select>
                        <textarea name="special_request" rows="3" class="w-full p-2 border border-gray-300 rounded"
                            placeholder="Do you have any other special questions or request?"></textarea>
                    </div>

                    <!-- Agreement -->
                    <div class="flex items-center gap-2">
                        <input type="checkbox" name="agree" required class="border-gray-300">
                        <label for="agree" class="text-sm text-gray-700">I agree to all the booking terms and
                            conditions</label>
                    </div>

                    <!-- Submit -->
                    <button type="submit" class="px-6 py-2 text-white bg-blue-600 rounded hover:bg-blue-700">
                        Submit Booking
                    </button>
                </form>
            </div>

            <!-- Aside Content -->
            <aside class="sticky top-0 p-6 bg-gray-100 rounded shadow">
                <h3 class="mb-4 text-xl font-semibold text-gray-800">Why Book With Us?</h3>
                <ul class="space-y-2 text-gray-700 list-disc list-inside">
                    <li>Group Discounts Available</li>
                    <li>Guaranteed Departures</li>
                    <li>Local Professional Guides</li>
                    <li>Safe and Secure Trips</li>
                    <li>Private & Group Departures</li>
                </ul>
            </aside>
        </div>
    </div>


    <footer class="pt-6 text-xs text-gray-300 bg-gray-900">
        <div class="px-4 mx-auto max-w-7xl">
            <div class="grid grid-cols-1 gap-4 mb-4 md:grid-cols-2 lg:grid-cols-4">
                <!-- Destinations -->
                <div>
                    <h3 class="pb-1 mb-2 font-semibold text-white border-b border-primary">Destinations</h3>
                    <ul class="space-y-1">
                        <li><a href="/nepal" class="hover:text-primary">Nepal</a></li>
                        <li><a href="/tibet" class="hover:text-primary">Tibet</a></li>
                        <li><a href="/bhutan" class="hover:text-primary">Bhutan</a></li>
                        <li><a href="/india" class="hover:text-primary">India</a></li>
                        <li><a href="#" class="hover:text-primary">Nepal/Bhutan</a></li>
                        <li><a href="#" class="hover:text-primary">Nepal/Tibet</a></li>
                        <li><a href="#" class="hover:text-primary">Nepal/Tibet/Bhutan</a></li>
                    </ul>
                </div>

                <!-- Activities -->
                <div>
                    <h3 class="pb-1 mb-2 font-semibold text-white border-b border-primary">Activities</h3>
                    <ul class="space-y-1">
                        <li><a href="#" class="hover:text-primary">Trekking</a></li>
                        <li><a href="#" class="hover:text-primary">Cultural Tours</a></li>
                        <li><a href="#" class="hover:text-primary">Peak Climbing</a></li>
                        <li><a href="#" class="hover:text-primary">Bhutan Tours</a></li>
                        <li><a href="#" class="hover:text-primary">Mt. Kailash</a></li>
                        <li><a href="#" class="hover:text-primary">Tibet Tours</a></li>
                    </ul>
                </div>

                <!-- Resources -->
                <div>
                    <h3 class="pb-1 mb-2 font-semibold text-white border-b border-primary">Resources</h3>
                    <ul class="space-y-1">
                        <li><a href="#" class="hover:text-primary">Travel Guide</a></li>
                        <li><a href="#" class="hover:text-primary">Visa Info</a></li>
                        <li><a href="#" class="hover:text-primary">Insurance</a></li>
                        <li><a href="#" class="hover:text-primary">Terms</a></li>
                    </ul>
                </div>

                <!-- Contact -->
                <div>
                    <h3 class="pb-1 mb-2 font-semibold text-white border-b border-primary">Contact</h3>
                    <address class="space-y-1 text-xs not-italic">
                        <div class="flex items-start">
                            <i class="mt-1 mr-2 text-xs fas fa-map-marker-alt text-primary"></i>
                            <span>Advanced Adventures Nepal Pvt. Ltd<br>Bhagwan Bahal, Thamel</span>
                        </div>
                        <div class="flex items-center"><i class="mr-2 text-xs fas fa-phone-alt text-primary"></i> +977-1-4544152</div>
                        <div class="flex items-center"><i class="mr-2 text-xs fab fa-whatsapp text-primary"></i> +977 9851189771</div>
                        <div class="flex items-center"><i class="mr-2 text-xs fas fa-envelope text-primary"></i> <a href="mailto:info@advadventures.com" class="hover:text-primary">info@advadventures.com</a></div>
                    </address>
                </div>
            </div>

            <!-- Certifications -->
            <div class="pt-3 mb-3 border-t border-gray-700">
                <h3 class="mb-2 font-semibold text-center text-white">Certifications</h3>
                <div class="flex flex-wrap justify-center gap-4">
                    <img src="https://www.advadventures.com/dist/frontend1/assets/images/cert-excel17.png" alt="2017" class="h-10" />
                    <img src="https://www.advadventures.com/dist/frontend1/assets/images/cert-excel18.png" alt="2018" class="h-10" />
                    <img src="https://www.advadventures.com/dist/frontend1/assets/images/cert-excel19.png" alt="2019" class="h-10" />
                </div>
            </div>

            <!-- Footer Bottom -->
            <div class="pt-3 pb-4 border-t border-gray-700">
                <div class="flex flex-col items-center justify-between gap-2 md:flex-row">
                    <div class="text-center md:text-left">
                        <p>© 2025 Advanced Adventures Nepal Pvt. Ltd.</p>
                        <p class="mt-1 text-[11px]">Regd No: 064/065/47694 | NMA: 833 | NTB: 1215/067</p>
                    </div>
                    <div class="flex space-x-3">
                        <a href="#" class="text-gray-400 hover:text-primary"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="text-gray-400 hover:text-primary"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-gray-400 hover:text-primary"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-gray-400 hover:text-primary"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <p class="mt-2 text-center text-[11px]">Crafted with <span class="text-primary">♥</span> by <a href="https://www.cyberpirates.io" class="hover:text-primary">Cyber Pirates</a></p>
            </div>
        </div>

        <!-- Back to Top Button -->
        <button id="goToTop" class="fixed z-50 p-2 text-white rounded-full shadow-lg bottom-6 right-4 bg-primary hover:bg-primary-dark">
            <i class="text-xs fas fa-chevron-up"></i>
        </button>
    </footer>




</body>

</html>