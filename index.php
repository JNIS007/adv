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
  <!-- Top info bar -->
  <div class="bg-gray-800 text-white text-sm py-2">
    <div class="container mx-auto px-4 flex justify-between items-center text-sm md:text-base">
      <span><i class="fas fa-medal mr-1"></i> 15 Years Experience</span>
      <div>
        <div class="flex items-center space-x-4">
          <span><i class="fas fa-phone-alt mr-1"></i> +977-9851189771</span>
          <a href="https://api.whatsapp.com/send?phone=9779851189771" target="_blank" class="hover:text-secondary">
            <i class="fab fa-whatsapp mr-1"></i> WhatsApp
          </a>
          <a href="viber://contact?number=9779851189771" target="_blank" class="hover:text-secondary">
            <i class="fab fa-viber mr-1"></i> Viber
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- Main header -->
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
    <button id="main-toggle" class="flex items-center font-medium text-gray-700 transition hover:text-primary">
        Destination <i class="ml-1 text-xs fas fa-chevron-down"></i>
    </button>

    <div id="countries-dropdown" class="absolute left-0 hidden w-48 mt-2 bg-white rounded-md shadow-xl">
        <ul class="py-1">
            <?php foreach ($menuData as $dest): ?>
                <li class="relative group">
                    <button class="flex items-center justify-between w-full px-4 py-2 hover:bg-gray-50 hover:text-secondary">
                        <?= $dest['name'] ?> <i class="ml-2 text-xs fas fa-chevron-right"></i>
                    </button>

                    <div class="absolute top-0 hidden whitespace-nowrap bg-white rounded-md shadow-xl left-full">
                        <ul class="py-1">
                            <?php foreach ($dest['categories'] as $cat): ?>
                                <li class="relative group">
                                    <button class="flex items-center justify-between w-full px-4 py-2 hover:bg-gray-50 hover:text-secondary">
                                        <?= $cat['name'] ?> <i class="ml-2 text-xs fas fa-chevron-right"></i>
                                    </button>

                                    <div class="absolute top-0 hidden whitespace-nowrap bg-white rounded-md shadow-xl left-full">
                                        <ul class="py-1">
                                            <?php foreach ($cat['subcategories'] as $sub): ?>
                                                <li class="relative group">
                                                    <button class="flex items-center justify-between w-full px-4 py-2 hover:bg-gray-50 hover:text-secondary">
                                                        <?= $sub['name'] ?> <i class="ml-2 text-xs fas fa-chevron-right"></i>
                                                    </button>

                                                    <div class="absolute top-0 hidden whitespace-nowrap bg-white rounded-md shadow-xl left-full">
                                                        <ul class="py-1">
                                                            <?php foreach ($sub['posts'] as $post): ?>
                                                                <li>
                                                                    <a href="new_page.php?id=<?= $post['id'] ?>" class="block px-4 py-2 hover:bg-gray-50 hover:text-secondary">
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
          <a href="/page/about-us.html" class="font-medium text-gray-700 hover:text-primary transition">About Us</a>
          <a href="/page/csr.html" class="font-medium text-gray-700 hover:text-primary transition">CSR</a>
          <a href="/testimonials.html" class="font-medium text-gray-700 hover:text-primary transition">Trip Reviews</a>
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

  <!-- Hero Slider -->
  <section class="relative">
    <!-- Slider Container -->
    <div class="swiper-container h-screen max-h-[800px]">
      <div class="swiper-wrapper">
        <!-- Slide 1 - Everest Base Camp -->
        <?php
        $q = mysqli_query($con, "SELECT * FROM tblposts WHERE Is_Active = 1");
        while ($r = mysqli_fetch_array($q)) {
          $ct = $r["CategoryId"];
          ?>
          <div class="swiper-slide relative">
            <!-- Background Image -->
            <div class="absolute inset-0 bg-cover bg-center"
              style="background-image: url('./admin/postimages/<?php echo htmlspecialchars($r["PostImage"]); ?>');">
              <div class="absolute inset-0 bg-black bg-opacity-40"></div>
            </div>

            <!-- Foreground Content -->
            <div class="relative h-full flex items-center justify-center text-center px-4">
              <div class="max-w-4xl text-white">
                <h1 class="text-4xl md:text-6xl font-bold mb-4 animate-fadeIn">
                  <?php echo htmlspecialchars($r["PostTitle"]); ?>
                </h1>

                <p class="text-xl md:text-2xl mb-8 animate-fadeIn delay-100 line-clamp-2">
                  <?php echo htmlspecialchars($r["PostDetails"]); ?>
                </p>

                <!-- Metadata Badges -->
                <div class="animate-fadeIn delay-200">
                  <span class="inline-block bg-primary px-3 py-1 rounded-full text-sm font-semibold mr-2 mb-2">
                    <?php echo (int) $r["Days"]; ?> Days
                  </span>

                  <span class="inline-block bg-secondary px-3 py-1 rounded-full text-sm font-semibold mr-2 mb-2">
                    <?php
                    $catRes = mysqli_query($con, "SELECT CategoryName FROM tblcategory WHERE id = " . (int) $ct);
                    if ($catRow = mysqli_fetch_assoc($catRes)) {
                      echo htmlspecialchars($catRow["CategoryName"]);
                    }
                    ?>
                  </span>
                </div>

                <!-- CTA Button -->
                <a href="#"
                  class="mt-8 inline-block bg-white text-primary hover:bg-gray-100 px-8 py-3 rounded-md font-bold text-lg transition animate-fadeIn delay-300">
                  Explore This Trek
                </a>
              </div>
            </div>
          </div>
        <?php } ?>

      </div>

      <!-- Navigation Arrows -->
      <div class="swiper-button-next text-white"></div>
      <div class="swiper-button-prev text-white"></div>

      <!-- Pagination -->
      <div class="swiper-pagination"></div>
    </div>

    <!-- Trip Finder Section -->
    <div class="container mx-auto px-4 -mt-16 relative z-10">
      <div class="backdrop-blur-lg bg-white/80 rounded-2xl shadow-2xl p-8 border border-gray-200">
        <h3 class="text-3xl font-bold text-gray-900 text-center mb-6">Find Your Perfect Adventure</h3>

        <!-- Search Bar -->
        <div class="mb-6">
          <input type="text" placeholder="Search for a trip..."
            class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-primary focus:border-primary bg-gray-50 transition">
        </div>

        <form class="grid grid-cols-1 md:grid-cols-4 gap-6">

          <!-- Destination Select -->
          <div>
            <label for="destination" class="block text-sm font-semibold text-gray-700 mb-2">Destination</label>
            <select id="destination"
              class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-primary focus:border-primary bg-gray-50 transition">
              <option value="">All Destinations</option>
              <option value="nepal">Nepal</option>
              <option value="tibet">Tibet</option>
              <option value="bhutan">Bhutan</option>
            </select>
          </div>

          <!-- Activity Select -->
          <div>
            <label for="activity" class="block text-sm font-semibold text-gray-700 mb-2">Activity</label>
            <select id="activity"
              class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-primary focus:border-primary bg-gray-50 transition">
              <option value="">All Activities</option>
              <option value="trekking">Trekking</option>
              <option value="climbing">Peak Climbing</option>
              <option value="tours">Cultural Tours</option>
            </select>
          </div>

          <!-- Duration Select -->
          <div>
            <label for="duration" class="block text-sm font-semibold text-gray-700 mb-2">Duration</label>
            <select id="duration"
              class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-primary focus:border-primary bg-gray-50 transition">
              <option value="">Any Duration</option>
              <option value="1-7">1-7 Days</option>
              <option value="8-14">8-14 Days</option>
              <option value="15+">15+ Days</option>
            </select>
          </div>

          <!-- Search Button -->
          <div class="flex items-end">
            <button type="submit"
              class="w-full flex items-center justify-center gap-2 bg-primary hover:bg-blue-700 text-white py-3 px-6 rounded-lg font-semibold text-lg transition transform hover:scale-105 shadow-lg">
              <i class="fas fa-search"></i> Search
            </button>
          </div>

        </form>
      </div>
    </div>
  </section>

  <section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
      <!-- Section Header -->
      <div class="text-center mb-12">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Why Choose Advanced Adventures Nepal?</h2>
        <div class="w-20 h-1 bg-primary mx-auto"></div>
      </div>

      <!-- Cards Grid -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
        <!-- Card 1: Nepal Based Company -->
        <a href="https://www.advadventures.com/page/why-us.html" class="group">
          <div
            class="h-full bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
            <div class="p-6">
              <div class="flex items-center mb-4">
                <div class="bg-primary bg-opacity-10 p-3 rounded-full mr-4">
                  <i class="fas fa-map-marked-alt text-primary text-xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-800 group-hover:text-primary transition">Nepal Based Company
                </h3>
              </div>
              <p class="text-gray-600">Advanced Adventures Nepal is Nepal Based Local Travel and Adventure Leading
                Company which is run and operated by the most experienced, dedicated and professional team.</p>
            </div>
          </div>
        </a>

        <!-- Card 2: 100% Customer Care -->
        <a href="https://www.advadventures.com/page/why-us.html" class="group">
          <div
            class="h-full bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
            <div class="p-6">
              <div class="flex items-center mb-4">
                <div class="bg-primary bg-opacity-10 p-3 rounded-full mr-4">
                  <i class="fas fa-headset text-primary text-xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-800 group-hover:text-primary transition">100% Customer Care
                </h3>
              </div>
              <p class="text-gray-600">We always focus on 100% customer satisfaction. We make sure to provide best
                customer care, dedicated services and safe, comfortable trips.</p>
            </div>
          </div>
        </a>

        <!-- Card 3: Professionally Guided Team -->
        <a href="https://www.advadventures.com/page/why-us.html" class="group">
          <div
            class="h-full bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
            <div class="p-6">
              <div class="flex items-center mb-4">
                <div class="bg-primary bg-opacity-10 p-3 rounded-full mr-4">
                  <i class="fas fa-users text-primary text-xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-800 group-hover:text-primary transition">Professionally
                  Guided Team</h3>
              </div>
              <p class="text-gray-600">Our team consists of local experienced leaders with 12-15 years of route
                experience, all licensed & authorized to work in Nepal's tourism industry.</p>
            </div>
          </div>
        </a>

        <!-- Card 4: Carefully Designed Itinerary -->
        <a href="https://www.advadventures.com/page/why-us.html" class="group">
          <div
            class="h-full bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
            <div class="p-6">
              <div class="flex items-center mb-4">
                <div class="bg-primary bg-opacity-10 p-3 rounded-full mr-4">
                  <i class="fas fa-route text-primary text-xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-800 group-hover:text-primary transition">Carefully Designed
                  Itinerary</h3>
              </div>
              <p class="text-gray-600">Every trip itinerary is designed to provide real experiences with maximum
                flexibility and proper acclimatization.</p>
            </div>
          </div>
        </a>

        <!-- Card 5: Prompt Communication -->
        <a href="https://www.advadventures.com/page/why-us.html" class="group">
          <div
            class="h-full bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
            <div class="p-6">
              <div class="flex items-center mb-4">
                <div class="bg-primary bg-opacity-10 p-3 rounded-full mr-4">
                  <i class="fas fa-comments text-primary text-xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-800 group-hover:text-primary transition">Prompt Communication
                </h3>
              </div>
              <p class="text-gray-600">We provide quick replies to inquiries and accurate trip information to help you
                plan your trip of a lifetime.</p>
            </div>
          </div>
        </a>

        <!-- Card 6: Guarantee to Run Your Trip -->
        <a href="https://www.advadventures.com/page/why-us.html" class="group">
          <div
            class="h-full bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
            <div class="p-6">
              <div class="flex items-center mb-4">
                <div class="bg-primary bg-opacity-10 p-3 rounded-full mr-4">
                  <i class="fas fa-check-circle text-primary text-xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-800 group-hover:text-primary transition">Guaranteed
                  Departures</h3>
              </div>
              <p class="text-gray-600">All advertised trips are guaranteed departures. We never cancel once you've
                booked - your trip will run as scheduled.</p>
            </div>
          </div>
        </a>

        <!-- Card 7: Responsible Travel -->
        <a href="https://www.advadventures.com/page/why-us.html" class="group">
          <div
            class="h-full bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
            <div class="p-6">
              <div class="flex items-center mb-4">
                <div class="bg-primary bg-opacity-10 p-3 rounded-full mr-4">
                  <i class="fas fa-leaf text-primary text-xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-800 group-hover:text-primary transition">Responsible Travel
                </h3>
              </div>
              <p class="text-gray-600">Committed to true sustainability - socially and environmentally. Our commitment
                formed when the company was established.</p>
            </div>
          </div>
        </a>

        <!-- Card 8: Corporate Social Responsibility -->
        <a href="https://www.advadventures.com/page/why-us.html" class="group">
          <div
            class="h-full bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
            <div class="p-6">
              <div class="flex items-center mb-4">
                <div class="bg-primary bg-opacity-10 p-3 rounded-full mr-4">
                  <i class="fas fa-hands-helping text-primary text-xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-800 group-hover:text-primary transition">Social
                  Responsibility</h3>
              </div>
              <p class="text-gray-600">We support rural Himalayan communities through humanitarian activities in
                coordination with www.pfnepal.org</p>
            </div>
          </div>
        </a>
      </div>

      <!-- CTA Button -->
      <div class="text-center mt-12">
        <a href="https://www.advadventures.com/page/why-us.html"
          class="inline-block bg-primary hover:bg-blue-800 text-white font-semibold px-8 py-3 rounded-lg transition duration-300 transform hover:scale-105">
          Learn More About Us
        </a>
      </div>
    </div>
  </section>

  <section class="py-16 bg-gray-50" id="featured-treks">
    <div class="container mx-auto px-4">
      <!-- Section Header -->
      <div class="text-center mb-12">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-2">Top Adventures for 2025/2026</h2>
        <p class="text-lg text-gray-600 max-w-2xl mx-auto">Our handpicked selection of must-experience Himalayan
          journeys</p>
        <div class="w-20 h-1 bg-primary mx-auto mt-4"></div>
      </div>

      <!-- Trek Cards -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">

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

      <!-- CTA -->
      <div class="text-center mt-12">
        <a href="/all-treks"
          class="inline-block bg-primary hover:bg-blue-800 text-white font-semibold px-8 py-3 rounded-lg transition duration-300 transform hover:scale-105">
          View All Recommended Adventures
        </a>
      </div>
    </div>
  </section>

  <section class="py-16 bg-white">
    <div class="container mx-auto px-4">
      <!-- Section Header -->
      <div class="text-center mb-16">
        <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-3">Discover Our World</h2>
        <p class="text-xl text-gray-600 max-w-3xl mx-auto">Journey through the most breathtaking destinations in the
          Himalayas and beyond</p>
        <div class="w-24 h-1.5 bg-primary mx-auto mt-6"></div>
      </div>

      <!-- Destination Grid - Larger, More Stylish Cards -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
        <!-- Nepal -->
        <div
          class="group relative overflow-hidden rounded-2xl shadow-2xl h-[400px] transition-all duration-500 hover:-translate-y-2">
          <div class="absolute inset-0 bg-cover bg-center transition-all duration-700 group-hover:scale-110"
            style="background-image: url('https://www.advadventures.com/dist/frontend1/assets/images/nepal.jpg')">
            <div class="absolute inset-0 bg-gradient-to-b from-transparent via-black/20 to-black/80"></div>
          </div>
          <a href="https://www.advadventures.com/nepal" class="absolute inset-0 flex flex-col justify-end p-8">
            <div class="transform transition duration-500 group-hover:-translate-y-2">
              <h3 class="text-3xl font-bold text-white mb-2">Nepal</h3>
              <p class="text-gray-200 mb-6">Land of Himalayas & Birth Place Of Lord Buddha</p>
            </div>
            <div
              class="opacity-0 group-hover:opacity-100 transition duration-500 transform translate-y-4 group-hover:translate-y-0">
              <div class="flex items-center text-white">
                <span class="mr-2">Explore Treks</span>
                <i class="fas fa-arrow-right"></i>
              </div>
              <div
                class="w-full bg-white h-0.5 mt-2 transform scale-x-0 group-hover:scale-x-100 origin-left transition duration-500">
              </div>
            </div>
          </a>
        </div>

        <!-- Bhutan -->
        <div
          class="group relative overflow-hidden rounded-2xl shadow-2xl h-[400px] transition-all duration-500 hover:-translate-y-2">
          <div class="absolute inset-0 bg-cover bg-center transition-all duration-700 group-hover:scale-110"
            style="background-image: url('https://www.advadventures.com/dist/frontend1/assets/images/bhutan.jpg')">
            <div class="absolute inset-0 bg-gradient-to-b from-transparent via-black/20 to-black/80"></div>
          </div>
          <a href="https://www.advadventures.com/bhutan" class="absolute inset-0 flex flex-col justify-end p-8">
            <div class="transform transition duration-500 group-hover:-translate-y-2">
              <h3 class="text-3xl font-bold text-white mb-2">Bhutan</h3>
              <p class="text-gray-200 mb-6">Land of Thunder Dragon & Lost Himalayan Shangri-La</p>
            </div>
            <div
              class="opacity-0 group-hover:opacity-100 transition duration-500 transform translate-y-4 group-hover:translate-y-0">
              <div class="flex items-center text-white">
                <span class="mr-2">Explore Culture</span>
                <i class="fas fa-arrow-right"></i>
              </div>
              <div
                class="w-full bg-white h-0.5 mt-2 transform scale-x-0 group-hover:scale-x-100 origin-left transition duration-500">
              </div>
            </div>
          </a>
        </div>

        <!-- Tibet -->
        <div
          class="group relative overflow-hidden rounded-2xl shadow-2xl h-[400px] transition-all duration-500 hover:-translate-y-2">
          <div class="absolute inset-0 bg-cover bg-center transition-all duration-700 group-hover:scale-110"
            style="background-image: url('https://www.advadventures.com/dist/frontend1/assets/images/tibet.jpg')">
            <div class="absolute inset-0 bg-gradient-to-b from-transparent via-black/20 to-black/80"></div>
          </div>
          <a href="https://www.advadventures.com/tibet" class="absolute inset-0 flex flex-col justify-end p-8">
            <div class="transform transition duration-500 group-hover:-translate-y-2">
              <h3 class="text-3xl font-bold text-white mb-2">Tibet</h3>
              <p class="text-gray-200 mb-6">Mysterious Land & "Roof Of The World"</p>
            </div>
            <div
              class="opacity-0 group-hover:opacity-100 transition duration-500 transform translate-y-4 group-hover:translate-y-0">
              <div class="flex items-center text-white">
                <span class="mr-2">Discover</span>
                <i class="fas fa-arrow-right"></i>
              </div>
              <div
                class="w-full bg-white h-0.5 mt-2 transform scale-x-0 group-hover:scale-x-100 origin-left transition duration-500">
              </div>
            </div>
          </a>
        </div>

        <!-- India -->
        <div
          class="group relative overflow-hidden rounded-2xl shadow-2xl h-[400px] transition-all duration-500 hover:-translate-y-2">
          <div class="absolute inset-0 bg-cover bg-center transition-all duration-700 group-hover:scale-110"
            style="background-image: url('https://www.advadventures.com/dist/frontend1/assets/images/india.jpg')">
            <div class="absolute inset-0 bg-gradient-to-b from-transparent via-black/20 to-black/80"></div>
          </div>
          <a href="https://www.advadventures.com/india" class="absolute inset-0 flex flex-col justify-end p-8">
            <div class="transform transition duration-500 group-hover:-translate-y-2">
              <h3 class="text-3xl font-bold text-white mb-2">India</h3>
              <p class="text-gray-200 mb-6">Land of Taj Mahal, the exotic mystic & fantasy!</p>
            </div>
            <div
              class="opacity-0 group-hover:opacity-100 transition duration-500 transform translate-y-4 group-hover:translate-y-0">
              <div class="flex items-center text-white">
                <span class="mr-2">Explore</span>
                <i class="fas fa-arrow-right"></i>
              </div>
              <div
                class="w-full bg-white h-0.5 mt-2 transform scale-x-0 group-hover:scale-x-100 origin-left transition duration-500">
              </div>
            </div>
          </a>
        </div>
      </div>

      <!-- CTA -->
      <div class="text-center mt-16">
        <a href="/all-destinations"
          class="inline-block bg-primary hover:bg-blue-800 text-white font-bold px-10 py-4 rounded-xl transition duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
          Explore All Destinations
          <i class="fas fa-arrow-right ml-2"></i>
        </a>
      </div>
    </div>
  </section>

  <section class="py-16 bg-white">
    <div class="container mx-auto px-4">
      <!-- Section Header -->
      <div class="text-center mb-16">
        <span class="inline-block text-primary font-semibold mb-3">EXPLORE NEPAL</span>
        <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Discover Our Trekking Adventures</h2>
        <p class="text-xl text-gray-600 max-w-3xl mx-auto">Experience the most breathtaking trails in the Himalayas with
          expert guides</p>
        <div class="w-24 h-1.5 bg-primary mx-auto mt-6"></div>
      </div>

      <!-- Symmetric 2-Column Grid -->
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Left Column - Featured Trek -->
        <div class="group relative overflow-hidden rounded-2xl shadow-2xl h-[500px] transition-all duration-500">
          <div class="absolute inset-0 bg-cover bg-center transition-all duration-700 group-hover:scale-105"
            style="background-image: url('https://www.advadventures.com/uploads/packagethumb/1511688063-tengboche-monastery.jpg')">
            <div class="absolute inset-0 bg-gradient-to-b from-transparent via-black/10 to-black/70"></div>
          </div>
          <div class="absolute bottom-0 left-0 right-0 p-8 text-white">
            <div class="flex gap-2 mb-3">
              <span class="bg-primary/90 text-white px-3 py-1 rounded-full text-sm font-bold">14 DAYS</span>
              <span class="bg-white/20 backdrop-blur-sm text-white px-3 py-1 rounded-full text-sm">BEST SELLER</span>
            </div>
            <h3 class="text-3xl font-bold mb-2">Everest Base Camp Trek</h3>
            <p class="text-gray-200 mb-6 max-w-lg">Walk in the footsteps of legends to the base of the world's highest
              peak.</p>
            <div class="flex items-center justify-between border-t border-white/20 pt-4">
              <span class="text-2xl font-bold">From $1580</span>
              <a href="/everest-base-camp" class="flex items-center gap-2 font-medium hover:gap-3 transition-all">
                Explore <i class="fas fa-arrow-right text-sm"></i>
              </a>
            </div>
          </div>
        </div>

        <!-- Right Column - 3 Treks Stack -->
        <div class="flex flex-col gap-6 h-[500px]">
          <!-- Trek 1 (Top) -->
          <div
            class="group relative flex-1 overflow-hidden rounded-2xl shadow-lg transition-all duration-300 hover:-translate-y-1">
            <div class="absolute inset-0 bg-cover bg-center transition duration-700 group-hover:scale-110"
              style="background-image: url('https://www.advadventures.com/uploads/packagethumb/1511517375-annapurna.jpg')">
              <div class="absolute inset-0 bg-gradient-to-b from-transparent via-black/10 to-black/60"></div>
            </div>
            <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
              <h4 class="text-xl font-bold mb-1">Annapurna Circuit</h4>
              <div class="flex justify-between items-center border-t border-white/20 pt-3 mt-3">
                <span class="text-sm">From $1090</span>
                <a href="/annapurna" class="text-white hover:text-primary transition-colors">
                  <i class="fas fa-arrow-right"></i>
                </a>
              </div>
            </div>
          </div>

          <!-- Middle Row - 2 Small Treks -->
          <div class="flex gap-6 h-[200px]">
            <!-- Trek 2 -->
            <div
              class="group relative flex-1 overflow-hidden rounded-2xl shadow-lg transition-all duration-300 hover:-translate-y-1">
              <div class="absolute inset-0 bg-cover bg-center transition duration-700 group-hover:scale-110"
                style="background-image: url('https://www.advadventures.com/uploads/packagethumb/1511688929-chorten-in-lo-manthang-valley.jpg')">
                <div class="absolute inset-0 bg-gradient-to-b from-transparent via-black/10 to-black/60"></div>
              </div>
              <div class="absolute bottom-0 left-0 right-0 p-4 text-white">
                <h4 class="text-lg font-bold">Upper Mustang</h4>
                <div class="flex justify-between items-center border-t border-white/20 pt-2 mt-2">
                  <span class="text-xs">From $2390</span>
                  <a href="/mustang" class="text-white hover:text-primary transition-colors text-sm">
                    <i class="fas fa-arrow-right"></i>
                  </a>
                </div>
              </div>
            </div>

            <!-- Trek 3 -->
            <div
              class="group relative flex-1 overflow-hidden rounded-2xl shadow-lg transition-all duration-300 hover:-translate-y-1">
              <div class="absolute inset-0 bg-cover bg-center transition duration-700 group-hover:scale-110"
                style="background-image: url('https://www.advadventures.com/uploads/packagethumb/1515909872-gokyo-valley-trek62.jpeg')">
                <div class="absolute inset-0 bg-gradient-to-b from-transparent via-black/10 to-black/60"></div>
              </div>
              <div class="absolute bottom-0 left-0 right-0 p-4 text-white">
                <h4 class="text-lg font-bold">Gokyo Valley</h4>
                <div class="flex justify-between items-center border-t border-white/20 pt-2 mt-2">
                  <span class="text-xs">From $1570</span>
                  <a href="/gokyo" class="text-white hover:text-primary transition-colors text-sm">
                    <i class="fas fa-arrow-right"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Centered "View All" Button -->
      <div class="text-center mt-12">
        <a href="/all-treks"
          class="inline-flex items-center justify-center px-8 py-3.5 border-2 border-primary text-primary hover:bg-primary hover:text-white font-bold rounded-lg transition-all duration-300">
          View All Treks
          <i class="fas fa-arrow-right ml-2"></i>
        </a>
      </div>
    </div>
  </section>

  <section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
      <!-- Section Header -->
      <div class="text-center mb-16">
        <span class="inline-block text-primary font-semibold mb-3">HIMALAYAN EXPEDITIONS</span>
        <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Popular Climbing Peaks in Nepal</h2>
        <p class="text-xl text-gray-600 max-w-3xl mx-auto">Conquer Nepal's most spectacular climbing peaks with expert
          guides</p>
        <div class="w-24 h-1.5 bg-primary mx-auto mt-6"></div>
      </div>

      <!-- Climbing Packages Grid -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
        <!-- Island Peak -->
        <div
          class="group relative bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
          <figure class="relative h-48 overflow-hidden">
            <img src="https://www.advadventures.com/uploads/packagethumb/1516605172-DSCF1253.JPG"
              alt="Island Peak Climbing"
              class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" loading="lazy">
            <figcaption
              class="absolute bottom-4 right-4 bg-white/90 px-3 py-1 rounded-full shadow-sm text-sm font-semibold text-primary">
              $2440
            </figcaption>
          </figure>
          <div class="p-6">
            <div class="flex justify-between items-start mb-3">
              <span class="text-sm text-gray-500">19 Days</span>
              <span class="text-xs bg-blue-100 text-blue-800 px-2.5 py-1 rounded-full font-medium">Everest Region</span>
            </div>
            <h3 class="text-xl font-bold text-gray-900 mb-3">
              <a href="/package/island-peak-climbing.html" class="hover:text-primary transition-colors">Island Peak
                Climbing</a>
            </h3>
            <p class="text-gray-600 mb-5 line-clamp-3">Perfect blend of trekking and climbing in the Everest region with
              spectacular views and thrilling ascent.</p>
            <a href="/package/island-peak-climbing.html"
              class="inline-flex items-center text-primary font-medium hover:text-primary-dark transition-colors">
              Explore Details
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                  d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z"
                  clip-rule="evenodd" />
              </svg>
            </a>
          </div>
        </div>

        <!-- Mera Peak -->
        <div
          class="group relative bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
          <figure class="relative h-48 overflow-hidden">
            <img src="https://www.advadventures.com/uploads/packagethumb/1512107235-Mera-summit.jpg"
              alt="Mera Peak Climbing"
              class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" loading="lazy">
            <figcaption
              class="absolute bottom-4 right-4 bg-white/90 px-3 py-1 rounded-full shadow-sm text-sm font-semibold text-primary">
              $2590
            </figcaption>
          </figure>
          <div class="p-6">
            <div class="flex justify-between items-start mb-3">
              <span class="text-sm text-gray-500">18 Days</span>
              <span class="text-xs bg-green-100 text-green-800 px-2.5 py-1 rounded-full font-medium">Highest Trekking
                Peak</span>
            </div>
            <h3 class="text-xl font-bold text-gray-900 mb-3">
              <a href="/package/mera-peak-climbing.html" class="hover:text-primary transition-colors">Mera Peak
                Climbing</a>
            </h3>
            <p class="text-gray-600 mb-5 line-clamp-3">Climb one of Nepal's highest trekking peaks (6,476m) with three
              summits offering breathtaking Himalayan views.</p>
            <a href="/package/mera-peak-climbing.html"
              class="inline-flex items-center text-primary font-medium hover:text-primary-dark transition-colors">
              Explore Details
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                  d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z"
                  clip-rule="evenodd" />
              </svg>
            </a>
          </div>
        </div>

        <!-- Lobuche Peak -->
        <div
          class="group relative bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
          <figure class="relative h-48 overflow-hidden">
            <img src="https://www.advadventures.com/uploads/packagethumb/1512108319-lobuche-peak.jpg"
              alt="Lobuche Peak Climbing"
              class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" loading="lazy">
            <figcaption
              class="absolute bottom-4 right-4 bg-white/90 px-3 py-1 rounded-full shadow-sm text-sm font-semibold text-primary">
              $2680
            </figcaption>
          </figure>
          <div class="p-6">
            <div class="flex justify-between items-start mb-3">
              <span class="text-sm text-gray-500">22 Days</span>
              <span class="text-xs bg-purple-100 text-purple-800 px-2.5 py-1 rounded-full font-medium">Technical
                Climb</span>
            </div>
            <h3 class="text-xl font-bold text-gray-900 mb-3">
              <a href="/package/lobuche-peak-climbing.html" class="hover:text-primary transition-colors">Lobuche Peak
                Climbing</a>
            </h3>
            <p class="text-gray-600 mb-5 line-clamp-3">Challenging trekking peak near Everest with spectacular views of
              the Khumbu region's giants.</p>
            <a href="/package/lobuche-peak-climbing.html"
              class="inline-flex items-center text-primary font-medium hover:text-primary-dark transition-colors">
              Explore Details
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                  d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z"
                  clip-rule="evenodd" />
              </svg>
            </a>
          </div>
        </div>

        <!-- Pisang Peak -->
        <div
          class="group relative bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
          <figure class="relative h-48 overflow-hidden">
            <img
              src="https://www.advadventures.com/uploads/packagethumb/1516604867-pisang%20base%20camp-%20tented%20camp.jpg"
              alt="Pisang Peak Climbing"
              class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" loading="lazy">
            <figcaption
              class="absolute bottom-4 right-4 bg-white/90 px-3 py-1 rounded-full shadow-sm text-sm font-semibold text-primary">
              $2990
            </figcaption>
          </figure>
          <div class="p-6">
            <div class="flex justify-between items-start mb-3">
              <span class="text-sm text-gray-500">21 Days</span>
              <span class="text-xs bg-orange-100 text-orange-800 px-2.5 py-1 rounded-full font-medium">Annapurna
                Region</span>
            </div>
            <h3 class="text-xl font-bold text-gray-900 mb-3">
              <a href="/package/pisang-peak-climbing.html" class="hover:text-primary transition-colors">Pisang Peak with
                Annapurna Circuit</a>
            </h3>
            <p class="text-gray-600 mb-5 line-clamp-3">Challenging 6,093m climb combined with the classic Annapurna
              Circuit and Tilicho Lake.</p>
            <a href="/package/pisang-peak-climbing.html"
              class="inline-flex items-center text-primary font-medium hover:text-primary-dark transition-colors">
              Explore Details
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                  d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z"
                  clip-rule="evenodd" />
              </svg>
            </a>
          </div>
        </div>
      </div>

      <!-- CTA Button -->
      <div class="text-center mt-16">
        <a href="/all-climbing-expeditions"
          class="inline-flex items-center justify-center px-8 py-3.5 border-2 border-primary text-primary hover:bg-primary hover:text-white font-bold rounded-lg transition-all duration-300 transform hover:scale-105">
          View All Climbing Expeditions
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd"
              d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z"
              clip-rule="evenodd" />
          </svg>
        </a>
      </div>
    </div>
  </section>



  <section class="py-16 bg-gradient-to-b from-[#4a90e2] to-[#073b4c] relative overflow-hidden text-white">
    <div class="absolute inset-0 z-0">
      <div class="absolute w-full h-full bg-gradient-to-b from-primary/5 to-transparent"></div>
      <div class="absolute inset-0 animate-float">
        <div
          class="h-full bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTYiIGhlaWdodD0iMTYiIHZpZXdCb3g9IjAgMCAxNiAxNiIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTggMTZMMCA4TCA4IDBMMTYgOEw4IDE2WiIgZmlsbD0iI2ZmZiIgZmlsbC1vcGFjaXR5PSIwLjEyIi8+PC9zdmc+')] opacity-10">
        </div>
      </div>
    </div>

    <div class="container mx-auto px-4 relative z-10">
      <div class="text-center mb-8 animate-slide-up">
        <span class="inline-block text-[#ffcc00] font-semibold mb-3 tracking-widest uppercase">Testimonials</span>
        <h2 class="text-4xl md:text-5xl font-bold mb-4 font-serif text-[#fffae3]">Trailblazers' Tales</h2>
        <div class="w-24 h-1.5 bg-[#ffcc00] mx-auto mt-6"></div>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div
          class="group relative bg-white text-gray-900 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-500 hover:-translate-y-2">
          <div class="p-8">
            <div class="mb-6">
              <p class="text-gray-700 mb-4">"A life-changing journey through the Himalayas. The team's expertise made
                every step feel safe and magical."</p>
              <div class="border-l-4 border-[#ffcc00] pl-4">
                <h4 class="font-bold text-gray-800">Sarah Mitchell</h4>
                <p class="text-sm text-gray-500">Everest Base Camp Trek</p>
              </div>
            </div>
          </div>
        </div>

        <div
          class="group relative bg-white text-gray-900 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-500 hover:-translate-y-2">
          <div class="p-8">
            <div class="mb-6">
              <p class="text-gray-700 mb-4">"Perfect blend of adventure and cultural immersion. Every detail was
                meticulously planned yet felt spontaneous."</p>
              <div class="border-l-4 border-[#ffcc00] pl-4">
                <h4 class="font-bold text-gray-800">James Chen</h4>
                <p class="text-sm text-gray-500">Annapurna Circuit</p>
              </div>
            </div>
          </div>
        </div>

        <div
          class="group relative bg-white text-gray-900 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-500 hover:-translate-y-2">
          <div class="p-8">
            <div class="mb-6">
              <p class="text-gray-700 mb-4">"The mountain vistas took our breath away, but the genuine care from our
                guides truly touched our hearts."</p>
              <div class="border-l-4 border-[#ffcc00] pl-4">
                <h4 class="font-bold text-gray-800">Amina Al-Mansoori</h4>
                <p class="text-sm text-gray-500">Langtang Valley Trek</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="text-center mt-12">
        <a href="/testimonials.html"
          class="inline-flex items-center px-6 py-3 border-2 border-[#ffcc00] text-[#ffcc00] hover:bg-[#ffcc00] hover:text-white font-medium rounded-full transition-all duration-500">
          <span>Explore More Stories</span>
        </a>
      </div>
    </div>
  </section>

  <!-- Certificates Section -->
  <section class="py-10 -mt-5">
    <div class="container mx-auto px-4">
      <div class="text-center mb-8">
        <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4 leading-tight">
          TripAdvisor <br />
          <span class="text-green-600">Certificates of Excellence</span>
        </h2>
        <p class="text-xl text-gray-600 max-w-2xl mx-auto mt-4">
          A testament to our unwavering commitment to creating exceptional travel experiences
        </p>
        <div class="w-32 h-1 bg-green-600 mx-auto mt-6"></div>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
          <img src="https://www.advadventures.com/dist/frontend1/assets/images/cert-excel17.png"
            alt="TripAdvisor Certificate 2017" class="object-contain w-full h-auto max-h-[400px]">
          <div class="bg-green-600 text-white text-center py-3">
            2017 Certificate
          </div>
        </div>

        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
          <img src="https://www.advadventures.com/dist/frontend1/assets/images/cert-excel18.png"
            alt="TripAdvisor Certificate 2018" class="object-contain w-full h-auto max-h-[400px]">
          <div class="bg-green-600 text-white text-center py-3">
            2018 Certificate
          </div>
        </div>

        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
          <img src="https://www.advadventures.com/dist/frontend1/assets/images/cert-excel19.png"
            alt="TripAdvisor Certificate 2019" class="object-contain w-full h-auto max-h-[400px]">
          <div class="bg-green-600 text-white text-center py-3">
            2019 Certificate
          </div>
        </div>
      </div>

      <div class="text-center mt-12">
        <a href="#"
          class="inline-flex items-center px-10 py-4 bg-green-600 hover:bg-green-700 text-white font-bold rounded-full transition-all duration-300 transform hover:scale-105 shadow-xl hover:shadow-2xl">
          View Our Full TripAdvisor Profile
        </a>
      </div>
    </div>
  </section>

  <section class="py-16 bg-white">
    <div class="container mx-auto px-4">
      <!-- Section Header -->
      <div class="text-center mb-12">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-3">Stay Updated with Our Adventures</h2>
        <p class="text-lg text-gray-600 max-w-2xl mx-auto">Sign up for exclusive deals, discounts, and travel
          inspiration</p>
        <div class="w-24 h-1 bg-primary mx-auto mt-4"></div>
      </div>

      <!-- Newsletter Form -->
      <div class="max-w-2xl mx-auto">
        <form action="https://www.advadventures.com/newsletter" method="post" class="space-y-6">
          <input type="hidden" name="_token" value="834vxzSWguoqpCyS1zaobUybEUf5qCmhkDwdSkwp">

          <div class="flex flex-col sm:flex-row gap-4">
            <div class="flex-grow relative">
              <label for="sEmail" class="sr-only">Email Address</label>
              <input type="email" id="sEmail" name="email"
                class="w-full pl-12 pr-6 py-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-all"
                placeholder="Enter your email address" required>
              <svg class="absolute left-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none"
                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                </path>
              </svg>
            </div>
            <button type="submit"
              class="px-8 py-4 bg-primary hover:bg-primary-dark text-white font-medium rounded-lg transition-colors shadow-md hover:shadow-lg whitespace-nowrap">
              Subscribe
            </button>
          </div>

          <p class="text-sm text-gray-500 text-center">
            We respect your privacy. Unsubscribe at any time.
          </p>
        </form>
      </div>
    </div>
  </section>
  <footer class="bg-gray-900 text-gray-300 py-12">
    <div class="container mx-auto px-4">
      <!-- Main Footer Content -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-8">
        <!-- Destinations Column -->
        <div>
          <h3 class="text-lg font-bold text-white mb-4 border-b border-primary pb-2">Destinations</h3>
          <ul class="space-y-2">
            <li><a href="https://www.advadventures.com/nepal" class="hover:text-primary transition-colors">Nepal</a>
            </li>
            <li><a href="https://www.advadventures.com/tibet" class="hover:text-primary transition-colors">Tibet</a>
            </li>
            <li><a href="https://www.advadventures.com/bhutan" class="hover:text-primary transition-colors">Bhutan</a>
            </li>
            <li><a href="https://www.advadventures.com/india" class="hover:text-primary transition-colors">India</a>
            </li>
            <li><a href="https://www.advadventures.com/package/Explore-the-Magic-of-Nepal-and-Bhutan.html"
                class="hover:text-primary transition-colors">Nepal/Bhutan</a></li>
            <li><a href="https://www.advadventures.com/package/all-nepal-tour.html"
                class="hover:text-primary transition-colors">Nepal/Tibet</a></li>
            <li><a href="https://www.advadventures.com/package/Nepal-Tibet-&amp;-Bhutan-Introduction-tour%20.html"
                class="hover:text-primary transition-colors">Nepal/Tibet/Bhutan</a></li>
          </ul>
        </div>

        <!-- Activities Column -->
        <div>
          <h3 class="text-lg font-bold text-white mb-4 border-b border-primary pb-2">Popular Activities</h3>
          <ul class="space-y-2">
            <li><a href="https://www.advadventures.com/nepal/trekking-in-nepal.html"
                class="hover:text-primary transition-colors">Trekking in Nepal</a></li>
            <li><a href="https://www.advadventures.com/nepal/tours-in-nepal.html"
                class="hover:text-primary transition-colors">Tours in Nepal</a></li>
            <li><a href="https://www.advadventures.com/nepal/peak-climbing-in-nepal.html"
                class="hover:text-primary transition-colors">Peak Climbing</a></li>
            <li><a href="https://www.advadventures.com/bhutan/bhutan-tours.html"
                class="hover:text-primary transition-colors">Bhutan Tours</a></li>
            <li><a href="https://www.advadventures.com/tibet/mt-kailash.html"
                class="hover:text-primary transition-colors">Mt. Kailash</a></li>
            <li><a href="https://www.advadventures.com/tibet/tibet-tour.html"
                class="hover:text-primary transition-colors">Tibet Tours</a></li>
          </ul>
        </div>

        <!-- Resources Column -->
        <div>
          <h3 class="text-lg font-bold text-white mb-4 border-b border-primary pb-2">Resources</h3>
          <ul class="space-y-2">
            <li><a href="https://www.advadventures.com/page/nepal-travel-guide.html"
                class="hover:text-primary transition-colors">Nepal Travel Guide</a></li>
            <li><a href="https://www.advadventures.com/page/bhutan-travel-guide.html"
                class="hover:text-primary transition-colors">Bhutan Travel Guide</a></li>
            <li><a href="https://www.advadventures.com/page/tibet-travel-guide.html"
                class="hover:text-primary transition-colors">Tibet Travel Guide</a></li>
            <li><a href="https://www.advadventures.com/page/nepal-visa.html"
                class="hover:text-primary transition-colors">Nepal Visa</a></li>
            <li><a href="https://www.advadventures.com/page/travel-insurance.html"
                class="hover:text-primary transition-colors">Travel Insurance</a></li>
            <li><a href="https://www.advadventures.com/page/terms-conditions.html"
                class="hover:text-primary transition-colors">Terms & Conditions</a></li>
          </ul>
        </div>

        <!-- Contact Column -->
        <div>
          <h3 class="text-lg font-bold text-white mb-4 border-b border-primary pb-2">Contact Us</h3>
          <address class="not-italic space-y-2">
            <div class="flex items-start">
              <svg class="w-5 h-5 mt-1 mr-2 text-primary flex-shrink-0" fill="none" stroke="currentColor"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
              </svg>
              <span>Advanced Adventures Nepal Pvt. Ltd<br>Bhagwan Bahal, Thamel Kathmandu</span>
            </div>
            <div class="flex items-center">
              <svg class="w-5 h-5 mr-2 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                </path>
              </svg>
              <span>977-1-4544152</span>
            </div>
            <div class="flex items-center">
              <svg class="w-5 h-5 mr-2 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                </path>
              </svg>
              <span>+977 9851189771 (WhatsApp)</span>
            </div>
            <div class="flex items-center">
              <svg class="w-5 h-5 mr-2 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                </path>
              </svg>
              <a href="mailto:info@advadventures.com"
                class="hover:text-primary transition-colors">info@advadventures.com</a>
            </div>
          </address>
        </div>
      </div>

      <!-- Affiliations & Certifications -->
      <div class="border-t border-gray-700 pt-8 mb-8">
        <h3 class="text-lg font-bold text-white mb-4 text-center">Our Affiliations & Certifications</h3>
        <div class="flex flex-wrap justify-center gap-6 mb-6">
          <!-- Replace these with your actual logo images -->
          <img src="https://via.placeholder.com/100x50?text=NTB" alt="NTB"
            class="h-10 opacity-80 hover:opacity-100 transition-opacity">
          <img src="https://via.placeholder.com/100x50?text=TAAN" alt="TAAN"
            class="h-10 opacity-80 hover:opacity-100 transition-opacity">
          <img src="https://via.placeholder.com/100x50?text=NMA" alt="NMA"
            class="h-10 opacity-80 hover:opacity-100 transition-opacity">
          <img src="https://via.placeholder.com/100x50?text=Touristlink" alt="Touristlink"
            class="h-10 opacity-80 hover:opacity-100 transition-opacity">
          <img src="https://via.placeholder.com/100x50?text=TripAdvisor" alt="TripAdvisor"
            class="h-10 opacity-80 hover:opacity-100 transition-opacity">
        </div>
      </div>

      <!-- Social Media & Copyright -->
      <div class="border-t border-gray-700 pt-8">
        <div class="flex flex-col md:flex-row justify-between items-center">
          <div class="mb-4 md:mb-0">
            <p class="text-sm">Copyright © 2025 Advanced Adventures Nepal Pvt Ltd. All Rights Reserved.</p>
            <p class="text-xs mt-1">Govt. Regd No: 064/065/47694 | NMA Regd No: 833 | NTB Regd No: 1215/067</p>
          </div>

          <div class="flex space-x-4">
            <a href="https://www.facebook.com/advadventures.nepal" target="_blank"
              class="text-gray-400 hover:text-primary transition-colors">
              <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path fill-rule="evenodd"
                  d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                  clip-rule="evenodd"></path>
              </svg>
            </a>
            <a href="https://twitter.com/weadvadventures" target="_blank"
              class="text-gray-400 hover:text-primary transition-colors">
              <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path
                  d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84">
                </path>
              </svg>
            </a>
            <a href="https://www.instagram.com/advancedadventuresnepal" target="_blank"
              class="text-gray-400 hover:text-primary transition-colors">
              <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path fill-rule="evenodd"
                  d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.467.182.353.301.882.344 1.857.047 1.023.058 1.351.058 3.807v.468c0 2.456-.011 2.784-.058 3.807-.045.975-.207 1.504-.344 1.857-.182.466-.399.8-.748 1.15-.35.35-.683.566-1.15.748-.353.137-.882.3-1.857.344-1.054.048-1.37.058-3.808.058h-.468c-2.456 0-2.784-.011-3.807-.058-.975-.045-1.504-.207-1.857-.344-.466-.182-.8-.399-1.15-.748-.35-.35-.566-.683-.748-1.15-.137-.353-.3-.882-.344-1.857-.048-1.023-.058-1.351-.058-3.807v-.468c0-2.456.011-2.784.058-3.807.045-.975.207-1.504.344-1.857.182-.466.399-.8.748-1.15.35-.35.683-.566 1.15-.748.353-.137.882-.3 1.857-.344 1.023-.047 1.351-.058 3.807-.058h.468c2.456 0 2.784.011 3.807.058.975.045 1.504.207 1.857.344.466.182.8.399 1.15.748.35.35.566.683.748 1.15.137.353.3.882.344 1.857.048 1.023.058 1.351.058 3.807v.468c0 2.456-.011 2.784-.058 3.807-.045.975-.207 1.504-.344 1.857-.182.467-.399.8-.748 1.15-.35.35-.683.566-1.15.748-.353.137-.882.3-1.857.344-1.023.047-1.351.058-3.807.058h-.468z"
                  clip-rule="evenodd"></path>
                <path fill-rule="evenodd"
                  d="M12 6.865a5.135 5.135 0 100 10.27 5.135 5.135 0 000-10.27zM12 15a3 3 0 110-6 3 3 0 010 6z"
                  clip-rule="evenodd"></path>
                <path d="M18.406 7.079a1.2 1.2 0 100-2.4 1.2 1.2 0 000 2.4z"></path>
              </svg>
            </a>
            <a href="https://www.youtube.com/@advadventures" target="_blank"
              class="text-gray-400 hover:text-primary transition-colors">
              <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path fill-rule="evenodd"
                  d="M19.812 5.418c.861.23 1.538.907 1.768 1.768C21.998 8.746 22 12 22 12s0 3.255-.418 4.814a2.504 2.504 0 01-1.768 1.768c-1.56.419-7.814.419-7.814.419s-6.255 0-7.814-.419a2.505 2.505 0 01-1.768-1.768C2 15.255 2 12 2 12s0-3.255.417-4.814a2.507 2.507 0 011.768-1.768C5.744 5 11.998 5 11.998 5s6.255 0 7.814.418z"
                  clip-rule="evenodd"></path>
                <path
                  d="M9.546 8.803a.5.5 0 00-.5.5v5.394a.5.5 0 00.764.424l4.723-2.697a.5.5 0 000-.848l-4.723-2.697a.5.5 0 00-.264-.076z">
                </path>
              </svg>
            </a>
          </div>
        </div>

        <div class="mt-4 text-center md:text-left">
          <p class="text-xs">Crafted with <span class="text-primary">♥</span> by <a href="https://www.cyberpirates.io"
              class="hover:text-primary transition-colors">Cyber Pirates Pvt. Ltd.</a></p>
        </div>
      </div>
    </div>

    <!-- Back to Top Button -->
    <button id="goToTop"
      class="fixed bottom-6 right-6 bg-primary text-white p-3 rounded-full shadow-lg hover:bg-primary-dark transition-colors opacity-0 invisible transition-all duration-300">
      <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
      </svg>
    </button>
  </footer>
  <!-- Swiper JS -->
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  <script>
    // Initialize Testimonials Swiper
    const testimonialsSwiper = new Swiper('.testimonials-carousel', {
      loop: true,
      speed: 800,
      autoplay: {
        delay: 8000,
        disableOnInteraction: false,
        pauseOnMouseEnter: true
      },
      navigation: {
        nextEl: '.testimonial-next',
        prevEl: '.testimonial-prev',
      },
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
        bulletClass: 'swiper-pagination-bullet',
        bulletActiveClass: 'swiper-pagination-bullet-active',
      },
      slidesPerView: 1,
      spaceBetween: 30,
      breakpoints: {
        1024: {
          spaceBetween: 40
        }
      }
    });

    // Initialize Other Swiper (if you still need this)
    const mainSwiper = new Swiper('.swiper-container', {
      loop: true,
      autoplay: {
        delay: 7000,
        disableOnInteraction: false,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      effect: 'fade',
      fadeEffect: {
        crossFade: true
      },
    });

    // Reset animations when slide changes (for main swiper)
    mainSwiper.on('slideChange', function () {
      const slides = document.querySelectorAll('.swiper-slide');
      slides.forEach(slide => {
        const animElements = slide.querySelectorAll('[class*="animate-"]');
        animElements.forEach(el => {
          el.style.opacity = '0';
          el.style.animation = 'none';
          void el.offsetWidth; // Trigger reflow
          el.style.animation = '';
        });
      });
    });

    // Mobile menu toggle
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    const closeMobileMenu = document.getElementById('close-mobile-menu');

    if (mobileMenuButton && mobileMenu && closeMobileMenu) {
      mobileMenuButton.addEventListener('click', () => {
        mobileMenu.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
      });

      closeMobileMenu.addEventListener('click', () => {
        mobileMenu.classList.add('hidden');
        document.body.style.overflow = '';
      });

      // Close mobile menu when clicking outside
      mobileMenu.addEventListener('click', (e) => {
        if (e.target === mobileMenu) {
          mobileMenu.classList.add('hidden');
          document.body.style.overflow = '';
        }
      });
    }

    // Accordion functionality for mobile
    document.querySelectorAll('.accordion button').forEach(button => {
      button.addEventListener('click', () => {
        const content = button.nextElementSibling;
        const icon = button.querySelector('i');

        if (content && icon) {
          content.classList.toggle('hidden');
          icon.classList.toggle('fa-chevron-down');
          icon.classList.toggle('fa-chevron-up');
        }
      });
    });

    // Back to top button functionality
    const goToTopBtn = document.getElementById('goToTop');

    window.addEventListener('scroll', () => {
      if (window.pageYOffset > 300) {
        goToTopBtn.classList.remove('opacity-0', 'invisible');
        goToTopBtn.classList.add('opacity-100', 'visible');
      } else {
        goToTopBtn.classList.remove('opacity-100', 'visible');
        goToTopBtn.classList.add('opacity-0', 'invisible');
      }
    });

    goToTopBtn.addEventListener('click', (e) => {
      e.preventDefault();
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
  </script>
</body>

</html>