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
                    <img src="https://www.advadventures.com/dist/frontend/img/adv-logo-new.jpg"
                        alt="Advanced Adventures" class="h-10">
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
    <div class="text-sm text-gray-600 py-2 pl-10">
        Home - Nepal
    </div>
    <div class="container mx-auto px-4 py-6 grid grid-cols-1 lg:grid-cols-4 gap-6">

        <!-- 📄 Main Content Area (spans 3/4 on large screens) -->
        <div class="lg:col-span-3 space-y-6">

            <!-- 🌍 Nepal Description Section -->
            <div class="bg-white border rounded-md shadow-sm p-6">


                <h1 class="text-3xl font-bold mb-4 border-b-4 border-blue-500 inline-block">Nepal</h1>

                <p class="mb-4">
                    Rough Guides labeled Nepal as a "must travel destination" and listed trekking as the "ultimate thing
                    not
                    to miss in Nepal: an unequalled scenic and cultural experience." The Himalayan range stretches
                    2,000km
                    and houses eight 8,000-ers out of fourteen including the world’s highest peak, Mount Everest. Nepal
                    is
                    undoubtedly the best travel destination for those travelers who seek walking adventures ranging from
                    easy to extremely challenging. Easy, moderate and challenging treks in every region of the country
                    are
                    major highlights of Nepal, the nation known for Himalayan adventure. Nepal goes beyond trekking
                    though.
                    Adventurous activities like white water river rafting, wildlife safaris, peak climbing, aerial
                    adventures and volunteerism are other major activities travelers can experience in Nepal.
                </p>

                <p class="mb-4">
                    Nepal is rich in culture with eight cultural UNESCO World Heritage Sites (seven are inside Kathmandu
                    Valley and the eighth is Lumbini, the birthplace of Buddha). Nepal caters many wonderful cultural
                    tours
                    where ancient and medieval culture spills in every corner of the country. With more than 100
                    ethnical
                    tribes uniquely different to each other, there's a great cultural encounter for every traveler to
                    experience in Nepal. You'll also be amazed at this small nation's resilience after the devastating
                    2015
                    earthquake. Nepal took this disaster and turned it into opportunity to promote better housing
                    construction, empower women, promote good governance and economic development.
                </p>

                <p>
                    Nepal is one of the few countries that cater diverse holiday activities relatively in a small
                    geographical territory. We can't wait to help you plan your Nepal adventure!
                </p>
            </div>

            <!-- 🎒 Nepal Packages Heading -->
            <div>
                <h2 class="text-3xl font-bold py-1 pl-5">Nepal Packages</h2>

                <!-- Your package loop goes here -->
                <!-- You can paste the package cards here (from previous answer) -->
            </div>
        </div>

        <!-- 🗂️ Sidebar: Categories -->
        <aside class="bg-white border rounded-md shadow-sm p-4 h-fit ">
            <h2 class="text-xl font-bold mb-2 border-b pb-1">Category</h2>
            <?php
            $catQuery = mysqli_query($con, "SELECT * FROM tblcategory");
            while ($cat = mysqli_fetch_array($catQuery)) {
                echo '<a href="category.php?id=' . $cat['id'] . '" class="block text-blue-700 hover:underline py-1">' . $cat['CategoryName'] . '</a>';
            }
            ?>
        </aside>

    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 py-2 pl-10 lg:col-span-3">

        <?php
        $query = mysqli_query($con, "SELECT * FROM tblposts WHERE Is_Active = 1");
        while ($row = mysqli_fetch_array($query)) {
            $ctid = $row["CategoryId"];
            ?>

            <div class="group relative overflow-hidden rounded-xl shadow-lg hover:shadow-xl transition-all duration-300">
                <div class="relative h-64 overflow-hidden">
                    <img src="admin/postimages/<?php echo htmlentities($row['PostImage']); ?>"
                        alt="<?php echo htmlentities($row['PostTitle']); ?>"
                        class="w-full h-full object-cover transform group-hover:scale-105 transition duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-black/10 to-transparent" style="mask-image: linear-gradient(to bottom, black 0%, transparent 30%), 
              linear-gradient(to right, black 0%, transparent 30%);">
                    </div>
                    <div
                        class="absolute bottom-4 right-4 bg-white/90 backdrop-blur-sm px-4 py-2 rounded-full shadow-lg border border-white/20">
                        <span class="font-bold text-primary">US $<?php echo htmlentities($row['Price']); ?></span>
                    </div>
                </div>
                <div class="p-6 bg-white">
                    <div class="flex justify-between items-start mb-2">
                        <span class="text-sm text-gray-500"><?php echo htmlentities($row['Days']); ?> Days</span>
                        <span class="text-xs font-semibold px-2 py-1 bg-red-100 text-red-800 rounded-full"><?php
                        $q = mysqli_query($con, "SELECT * FROM tblcategory WHERE id =$ctid");
                        $r = mysqli_fetch_array($q);
                        echo $r["CategoryName"];
                        ?></span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-primary transition">
                        <a href="package/<?php echo htmlentities($row['PostUrl']); ?>">
                            <?php echo htmlentities($row['PostTitle']); ?>
                        </a>
                    </h3>
                    <p class="text-gray-600 mb-4 line-clamp-3">
                        <?php echo htmlentities(substr($row['PostDetails'], 0, 150)); ?>...
                    </p>
                    <a href="http://localhost/adv/new_page.php?id=<?php echo urlencode($row['id']); ?>"
                        class="inline-flex items-center font-medium text-primary hover:text-blue-800 transition">
                        Explore This Trek <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
        <?php } ?>

    </div>
    </div>
</body>

</html>