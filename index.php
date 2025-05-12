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
    document.addEventListener('DOMContentLoaded', function() {
      const bookingDropdown = document.getElementById('booking-dropdown');
      const bookingToggle = document.getElementById('booking-trigger'); // Trigger element for the booking dropdown

      // Show dropdown on hover
      bookingToggle.addEventListener('mouseenter', () => {
        bookingDropdown.classList.remove('hidden');
      });

      // Hide dropdown when mouse leaves both the button and the dropdown
      bookingToggle.addEventListener('mouseleave', (e) => {
        setTimeout(() => {
          if (!bookingToggle.matches(':hover') && !bookingDropdown.matches(':hover')) {
            bookingDropdown.classList.add('hidden');
          }
        }, 200);
      });

      bookingDropdown.addEventListener('mouseleave', (e) => {
        setTimeout(() => {
          if (!bookingToggle.matches(':hover') && !bookingDropdown.matches(':hover')) {
            bookingDropdown.classList.add('hidden');
          }
        }, 200);
      });

      // Handle submenu hover (optional enhancement)
      const submenuButtons = document.querySelectorAll('#booking-dropdown button');

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
    const goToTopButton = document.getElementById('goToTop');

    window.addEventListener('scroll', () => {
      if (window.scrollY > 300) {
        goToTopButton.classList.add('visible');
      } else {
        goToTopButton.classList.remove('visible');
      }
    });

    goToTopButton.addEventListener('click', () => {
      window.scrollTo({
        top: 0,
        behavior: 'smooth'
      });
    });
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
  <div class="py-2 text-sm text-white bg-gray-800">
    <div class="container flex items-center justify-between px-4 mx-auto text-sm md:text-base">
      <span><i class="mr-1 fas fa-medal"></i> 15 Years Experience</span>
      <div>
        <div class="flex items-center space-x-4">
          <span><i class="mr-1 fas fa-phone-alt"></i> +977-9851189771</span>
          <a href="https://api.whatsapp.com/send?phone=9779851189771" target="_blank" class="hover:text-secondary">
            <i class="mr-1 fab fa-whatsapp"></i> WhatsApp
          </a>
          <a href="viber://contact?number=9779851189771" target="_blank" class="hover:text-secondary">
            <i class="mr-1 fab fa-viber"></i> Viber
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- Main header -->
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
            <button id="main-toggle" class="flex items-center font-medium text-gray-700 transition hover:text-primary">
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

                    <div class="absolute top-0 hidden bg-white rounded-md shadow-xl whitespace-nowrap left-full">
                      <ul class="py-1">
                        <?php foreach ($dest['categories'] as $cat): ?>
                          <li class="relative group">
                            <button
                              class="flex items-center justify-between w-full px-4 py-2 hover:bg-gray-50 hover:text-secondary">
                              <?= $cat['name'] ?> <i class="ml-2 text-xs fas fa-chevron-right"></i>
                            </button>

                            <div class="absolute top-0 hidden bg-white rounded-md shadow-xl whitespace-nowrap left-full">
                              <ul class="py-1">
                                <?php foreach ($cat['subcategories'] as $sub): ?>
                                  <li class="relative group">
                                    <button
                                      class="flex items-center justify-between w-full px-4 py-2 hover:bg-gray-50 hover:text-secondary">
                                      <?= $sub['name'] ?> <i class="ml-2 text-xs fas fa-chevron-right"></i>
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
          <!-- Booking Dropdown -->
          <div id="booking-container" class="relative inline-block">
            <!-- Trigger -->
            <div id="booking-trigger" class="font-medium text-gray-700 transition cursor-pointer hover:text-primary">
              Booking <i class="fas fa-chevron-down"></i>
            </div>

            <!-- Dropdown Menu -->
            <div id="booking-dropdown" class="absolute left-0 z-50 hidden w-48 mt-2 bg-white rounded-md shadow-lg">
              <a href="booking.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Book Your Trip</a>
              <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">How to Pay</a>
              <a href="payOnline.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Pay Online</a>
              <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Terms & conditions</a>
              <a href="DiscountOffers.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Discount
                Offers</a>
            </div>
          </div>
          <a href="/page/travel-guide.html" class="font-medium text-gray-700 transition hover:text-primary">Travel
            Guide</a>
          <a href="/page/about-us.html" class="font-medium text-gray-700 transition hover:text-primary">About Us</a>
          <a href="/page/csr.html" class="font-medium text-gray-700 transition hover:text-primary">CSR</a>
          <a href="/testimonials.html" class="font-medium text-gray-700 transition hover:text-primary">Trip Reviews</a>
          <a href="#" class="font-medium text-gray-700 transition hover:text-primary">Travel Blog</a>
          <a href="#" class="font-medium text-gray-700 transition hover:text-primary">Contact</a>
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
        <button class="text-gray-700 lg:hidden focus:outline-none" id="mobile-menu-button">
          <i class="text-2xl fas fa-bars"></i>
        </button>
      </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="fixed inset-0 z-50 hidden bg-black bg-opacity-50 lg:hidden">
      <div class="absolute top-0 right-0 w-4/5 h-full max-w-sm overflow-y-auto bg-white shadow-lg mobile-menu">
        <div class="flex items-center justify-between p-4 border-b">
          <img src="https://www.advadventures.com/dist/frontend/img/adv-logo-new.jpg" alt="Advanced Adventures"
            class="h-10">
          <button id="close-mobile-menu" class="text-gray-600">
            <i class="text-2xl fas fa-times"></i>
          </button>
        </div>

        <div class="p-4 space-y-4">
          <div class="accordion">
            <button class="flex items-center justify-between w-full py-2 font-medium text-gray-700">
              Destinations <i class="fas fa-chevron-down"></i>
            </button>
            <div class="hidden pl-4 mt-2 space-y-2 accordion-content">
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
          <div class="relative swiper-slide">
            <!-- Background Image -->
            <div class="absolute inset-0 bg-center bg-cover"
              style="background-image: url('./admin/postimages/<?php echo htmlspecialchars($r["PostImage"]); ?>');">
              <div class="absolute inset-0 bg-black bg-opacity-40"></div>
            </div>

            <!-- Foreground Content -->
            <div class="relative flex items-center justify-center h-full px-4 text-center">
              <div class="max-w-4xl text-white">
                <h1 class="mb-4 text-4xl font-bold md:text-6xl animate-fadeIn">
                  <?php echo htmlspecialchars($r["PostTitle"]); ?>
                </h1>

                <p class="mb-8 text-xl delay-100 md:text-2xl animate-fadeIn line-clamp-2">
                  <?php echo htmlspecialchars($r["PostDetails"]); ?>
                </p>

                <!-- Metadata Badges -->
                <div class="delay-200 animate-fadeIn">
                  <span class="inline-block px-3 py-1 mb-2 mr-2 text-sm font-semibold rounded-full bg-primary">
                    <?php echo (int) $r["Days"]; ?> Days
                  </span>

                  <span class="inline-block px-3 py-1 mb-2 mr-2 text-sm font-semibold rounded-full bg-secondary">
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
                  class="inline-block px-8 py-3 mt-8 text-lg font-bold transition delay-300 bg-white rounded-md text-primary hover:bg-gray-100 animate-fadeIn">
                  Explore This Trek
                </a>
              </div>
            </div>
          </div>
        <?php } ?>

      </div>

      <!-- Navigation Arrows -->
      <div class="text-white swiper-button-next"></div>
      <div class="text-white swiper-button-prev"></div>

      <!-- Pagination -->
      <div class="swiper-pagination"></div>
    </div>

    <!-- Trip Finder Section -->
    <div class="container relative z-10 px-4 mx-auto -mt-16">
      <div class="p-8 border border-gray-200 shadow-2xl backdrop-blur-lg bg-white/80 rounded-2xl">
        <h3 class="mb-6 text-3xl font-bold text-center text-gray-900">Find Your Perfect Adventure</h3>

        <!-- Search Bar -->
        <div class="mb-6">
          <input type="text" placeholder="Search for a trip..."
            class="w-full p-3 transition border border-gray-300 rounded-lg shadow-sm focus:ring-primary focus:border-primary bg-gray-50">
        </div>

        <form class="grid grid-cols-1 gap-6 md:grid-cols-4">

          <!-- Destination Select -->
          <div>
            <label for="destination" class="block mb-2 text-sm font-semibold text-gray-700">Destination</label>
            <select id="destination"
              class="w-full p-3 transition border border-gray-300 rounded-lg shadow-sm focus:ring-primary focus:border-primary bg-gray-50">
              <option value="">All Destinations</option>
              <option value="nepal">Nepal</option>
              <option value="tibet">Tibet</option>
              <option value="bhutan">Bhutan</option>
            </select>
          </div>

          <!-- Activity Select -->
          <div>
            <label for="activity" class="block mb-2 text-sm font-semibold text-gray-700">Activity</label>
            <select id="activity"
              class="w-full p-3 transition border border-gray-300 rounded-lg shadow-sm focus:ring-primary focus:border-primary bg-gray-50">
              <option value="">All Activities</option>
              <option value="trekking">Trekking</option>
              <option value="climbing">Peak Climbing</option>
              <option value="tours">Cultural Tours</option>
            </select>
          </div>

          <!-- Duration Select -->
          <div>
            <label for="duration" class="block mb-2 text-sm font-semibold text-gray-700">Duration</label>
            <select id="duration"
              class="w-full p-3 transition border border-gray-300 rounded-lg shadow-sm focus:ring-primary focus:border-primary bg-gray-50">
              <option value="">Any Duration</option>
              <option value="1-7">1-7 Days</option>
              <option value="8-14">8-14 Days</option>
              <option value="15+">15+ Days</option>
            </select>
          </div>

          <!-- Search Button -->
          <div class="flex items-end">
            <button type="submit"
              class="flex items-center justify-center w-full gap-2 px-6 py-3 text-lg font-semibold text-white transition transform rounded-lg shadow-lg bg-primary hover:bg-blue-700 hover:scale-105">
              <i class="fas fa-search"></i> Search
            </button>
          </div>

        </form>
      </div>
    </div>
  </section>

  <section class="py-16 bg-gray-50">
    <div class="container px-4 mx-auto">
      <!-- Section Header -->
      <div class="mb-12 text-center">
        <h2 class="mb-4 text-3xl font-bold text-gray-800 md:text-4xl">Why Choose Advanced Adventures Nepal?</h2>
        <div class="w-20 h-1 mx-auto bg-primary"></div>
      </div>

      <!-- Cards Grid -->
      <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-4">
        <!-- Card 1: Nepal Based Company -->
        <a href="https://www.advadventures.com/page/why-us.html" class="group">
          <div
            class="h-full overflow-hidden transition-all duration-300 bg-white shadow-md rounded-xl hover:shadow-lg hover:-translate-y-1">
            <div class="p-6">
              <div class="flex items-center mb-4">
                <div class="p-3 mr-4 rounded-full bg-primary bg-opacity-10">
                  <i class="text-xl fas fa-map-marked-alt text-primary"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-800 transition group-hover:text-primary">Nepal Based Company
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
            class="h-full overflow-hidden transition-all duration-300 bg-white shadow-md rounded-xl hover:shadow-lg hover:-translate-y-1">
            <div class="p-6">
              <div class="flex items-center mb-4">
                <div class="p-3 mr-4 rounded-full bg-primary bg-opacity-10">
                  <i class="text-xl fas fa-headset text-primary"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-800 transition group-hover:text-primary">100% Customer Care
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
            class="h-full overflow-hidden transition-all duration-300 bg-white shadow-md rounded-xl hover:shadow-lg hover:-translate-y-1">
            <div class="p-6">
              <div class="flex items-center mb-4">
                <div class="p-3 mr-4 rounded-full bg-primary bg-opacity-10">
                  <i class="text-xl fas fa-users text-primary"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-800 transition group-hover:text-primary">Professionally
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
            class="h-full overflow-hidden transition-all duration-300 bg-white shadow-md rounded-xl hover:shadow-lg hover:-translate-y-1">
            <div class="p-6">
              <div class="flex items-center mb-4">
                <div class="p-3 mr-4 rounded-full bg-primary bg-opacity-10">
                  <i class="text-xl fas fa-route text-primary"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-800 transition group-hover:text-primary">Carefully Designed
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
            class="h-full overflow-hidden transition-all duration-300 bg-white shadow-md rounded-xl hover:shadow-lg hover:-translate-y-1">
            <div class="p-6">
              <div class="flex items-center mb-4">
                <div class="p-3 mr-4 rounded-full bg-primary bg-opacity-10">
                  <i class="text-xl fas fa-comments text-primary"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-800 transition group-hover:text-primary">Prompt Communication
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
            class="h-full overflow-hidden transition-all duration-300 bg-white shadow-md rounded-xl hover:shadow-lg hover:-translate-y-1">
            <div class="p-6">
              <div class="flex items-center mb-4">
                <div class="p-3 mr-4 rounded-full bg-primary bg-opacity-10">
                  <i class="text-xl fas fa-check-circle text-primary"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-800 transition group-hover:text-primary">Guaranteed
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
            class="h-full overflow-hidden transition-all duration-300 bg-white shadow-md rounded-xl hover:shadow-lg hover:-translate-y-1">
            <div class="p-6">
              <div class="flex items-center mb-4">
                <div class="p-3 mr-4 rounded-full bg-primary bg-opacity-10">
                  <i class="text-xl fas fa-leaf text-primary"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-800 transition group-hover:text-primary">Responsible Travel
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
            class="h-full overflow-hidden transition-all duration-300 bg-white shadow-md rounded-xl hover:shadow-lg hover:-translate-y-1">
            <div class="p-6">
              <div class="flex items-center mb-4">
                <div class="p-3 mr-4 rounded-full bg-primary bg-opacity-10">
                  <i class="text-xl fas fa-hands-helping text-primary"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-800 transition group-hover:text-primary">Social
                  Responsibility</h3>
              </div>
              <p class="text-gray-600">We support rural Himalayan communities through humanitarian activities in
                coordination with www.pfnepal.org</p>
            </div>
          </div>
        </a>
      </div>

      <!-- CTA Button -->
      <div class="mt-12 text-center">
        <a href="https://www.advadventures.com/page/why-us.html"
          class="inline-block px-8 py-3 font-semibold text-white transition duration-300 transform rounded-lg bg-primary hover:bg-blue-800 hover:scale-105">
          Learn More About Us
        </a>
      </div>
    </div>
  </section>

  <section class="py-16 bg-gray-50" id="featured-treks">
    <div class="container px-4 mx-auto">
      <!-- Section Header -->
      <div class="mb-12 text-center">
        <h2 class="mb-2 text-3xl font-bold text-gray-800 md:text-4xl">Top Adventures for 2025/2026</h2>
        <p class="max-w-2xl mx-auto text-lg text-gray-600">Our handpicked selection of must-experience Himalayan
          journeys</p>
        <div class="w-20 h-1 mx-auto mt-4 bg-primary"></div>
      </div>

      <!-- Trek Cards -->
      <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-4">

        <?php
        $query = mysqli_query($con, "SELECT * FROM tblposts WHERE Is_Active = 1");
        while ($row = mysqli_fetch_array($query)) {
          $ctid = $row["CategoryId"];
        ?>

          <div class="relative overflow-hidden transition-all duration-300 shadow-lg group rounded-xl hover:shadow-xl">
            <div class="relative h-64 overflow-hidden">
              <img src="admin/postimages/<?php echo htmlentities($row['PostImage']); ?>"
                alt="<?php echo htmlentities($row['PostTitle']); ?>"
                class="object-cover w-full h-full transition duration-500 transform group-hover:scale-105">
              <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-black/10 to-transparent" style="mask-image: linear-gradient(to bottom, black 0%, transparent 30%), 
      linear-gradient(to right, black 0%, transparent 30%);">
              </div>
              <div
                class="absolute px-4 py-2 border rounded-full shadow-lg bottom-4 right-4 bg-white/90 backdrop-blur-sm border-white/20">
                <span class="font-bold text-primary">US $<?php echo htmlentities($row['Price']); ?></span>
              </div>
            </div>
            <div class="p-6 bg-white">
              <div class="flex items-start justify-between mb-2">
                <span class="text-sm text-gray-500"><?php echo htmlentities($row['Days']); ?> Days</span>
                <span class="px-2 py-1 text-xs font-semibold text-red-800 bg-red-100 rounded-full"><?php
                                                                                                    $q = mysqli_query($con, "SELECT * FROM tblcategory WHERE id =$ctid");
                                                                                                    $r = mysqli_fetch_array($q);
                                                                                                    echo $r["CategoryName"];
                                                                                                    ?></span>
              </div>
              <h3 class="mb-3 text-xl font-bold text-gray-800 transition group-hover:text-primary">
                <a href="package/<?php echo htmlentities($row['PostUrl']); ?>">
                  <?php echo htmlentities($row['PostTitle']); ?>
                </a>
              </h3>
              <p class="mb-4 text-gray-600 line-clamp-3">
                <?php echo htmlentities(substr($row['PostDetails'], 0, 150)); ?>...
              </p>
              <a href="http://localhost/adv/new_page.php?id=<?php echo urlencode($row['id']); ?>"
                class="inline-flex items-center font-medium transition text-primary hover:text-blue-800">
                Explore This Trek <i class="ml-2 fas fa-arrow-right"></i>
              </a>
            </div>
          </div>
        <?php } ?>

      </div>

      <!-- CTA -->
      <div class="mt-12 text-center">
        <a href="/all-treks"
          class="inline-block px-8 py-3 font-semibold text-white transition duration-300 transform rounded-lg bg-primary hover:bg-blue-800 hover:scale-105">
          View All Recommended Adventures
        </a>
      </div>
    </div>
  </section>

  <section class="py-16 bg-white">
    <div class="container px-4 mx-auto">
      <!-- Section Header -->
      <div class="mb-16 text-center">
        <h2 class="mb-3 text-4xl font-bold text-gray-800 md:text-5xl">Discover Our World</h2>
        <p class="max-w-3xl mx-auto text-xl text-gray-600">Journey through the most breathtaking destinations in the
          Himalayas and beyond</p>
        <div class="w-24 h-1.5 bg-primary mx-auto mt-6"></div>
      </div>

      <!-- Destination Grid - Larger, More Stylish Cards -->
      <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-4">
        <!-- Nepal -->
        <div
          class="group relative overflow-hidden rounded-2xl shadow-2xl h-[400px] transition-all duration-500 hover:-translate-y-2">
          <div class="absolute inset-0 transition-all duration-700 bg-center bg-cover group-hover:scale-110"
            style="background-image: url('https://www.advadventures.com/dist/frontend1/assets/images/nepal.jpg')">
            <div class="absolute inset-0 bg-gradient-to-b from-transparent via-black/20 to-black/80"></div>
          </div>
          <a href="https://www.advadventures.com/nepal" class="absolute inset-0 flex flex-col justify-end p-8">
            <div class="transition duration-500 transform group-hover:-translate-y-2">
              <h3 class="mb-2 text-3xl font-bold text-white">Nepal</h3>
              <p class="mb-6 text-gray-200">Land of Himalayas & Birth Place Of Lord Buddha</p>
            </div>
            <div
              class="transition duration-500 transform translate-y-4 opacity-0 group-hover:opacity-100 group-hover:translate-y-0">
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
          <div class="absolute inset-0 transition-all duration-700 bg-center bg-cover group-hover:scale-110"
            style="background-image: url('https://www.advadventures.com/dist/frontend1/assets/images/bhutan.jpg')">
            <div class="absolute inset-0 bg-gradient-to-b from-transparent via-black/20 to-black/80"></div>
          </div>
          <a href="https://www.advadventures.com/bhutan" class="absolute inset-0 flex flex-col justify-end p-8">
            <div class="transition duration-500 transform group-hover:-translate-y-2">
              <h3 class="mb-2 text-3xl font-bold text-white">Bhutan</h3>
              <p class="mb-6 text-gray-200">Land of Thunder Dragon & Lost Himalayan Shangri-La</p>
            </div>
            <div
              class="transition duration-500 transform translate-y-4 opacity-0 group-hover:opacity-100 group-hover:translate-y-0">
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
          <div class="absolute inset-0 transition-all duration-700 bg-center bg-cover group-hover:scale-110"
            style="background-image: url('https://www.advadventures.com/dist/frontend1/assets/images/tibet.jpg')">
            <div class="absolute inset-0 bg-gradient-to-b from-transparent via-black/20 to-black/80"></div>
          </div>
          <a href="https://www.advadventures.com/tibet" class="absolute inset-0 flex flex-col justify-end p-8">
            <div class="transition duration-500 transform group-hover:-translate-y-2">
              <h3 class="mb-2 text-3xl font-bold text-white">Tibet</h3>
              <p class="mb-6 text-gray-200">Mysterious Land & "Roof Of The World"</p>
            </div>
            <div
              class="transition duration-500 transform translate-y-4 opacity-0 group-hover:opacity-100 group-hover:translate-y-0">
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
          <div class="absolute inset-0 transition-all duration-700 bg-center bg-cover group-hover:scale-110"
            style="background-image: url('https://www.advadventures.com/dist/frontend1/assets/images/india.jpg')">
            <div class="absolute inset-0 bg-gradient-to-b from-transparent via-black/20 to-black/80"></div>
          </div>
          <a href="https://www.advadventures.com/india" class="absolute inset-0 flex flex-col justify-end p-8">
            <div class="transition duration-500 transform group-hover:-translate-y-2">
              <h3 class="mb-2 text-3xl font-bold text-white">India</h3>
              <p class="mb-6 text-gray-200">Land of Taj Mahal, the exotic mystic & fantasy!</p>
            </div>
            <div
              class="transition duration-500 transform translate-y-4 opacity-0 group-hover:opacity-100 group-hover:translate-y-0">
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
      <div class="mt-16 text-center">
        <a href="/all-destinations"
          class="inline-block px-10 py-4 font-bold text-white transition duration-300 transform shadow-lg bg-primary hover:bg-blue-800 rounded-xl hover:scale-105 hover:shadow-xl">
          Explore All Destinations
          <i class="ml-2 fas fa-arrow-right"></i>
        </a>
      </div>
    </div>
  </section>

  <section class="py-16 bg-white">
    <div class="container px-4 mx-auto">
      <!-- Section Header -->
      <div class="mb-16 text-center">
        <span class="inline-block mb-3 font-semibold text-primary">EXPLORE NEPAL</span>
        <h2 class="mb-4 text-4xl font-bold text-gray-900 md:text-5xl">Discover Our Trekking Adventures</h2>
        <p class="max-w-3xl mx-auto text-xl text-gray-600">Experience the most breathtaking trails in the Himalayas with
          expert guides</p>
        <div class="w-24 h-1.5 bg-primary mx-auto mt-6"></div>
      </div>

      <!-- Symmetric 2-Column Grid -->
      <div class="grid grid-cols-1 gap-8 lg:grid-cols-2">
        <!-- Left Column - Featured Trek -->
        <div class="group relative overflow-hidden rounded-2xl shadow-2xl h-[500px] transition-all duration-500">
          <div class="absolute inset-0 transition-all duration-700 bg-center bg-cover group-hover:scale-105"
            style="background-image: url('https://www.advadventures.com/uploads/packagethumb/1511688063-tengboche-monastery.jpg')">
            <div class="absolute inset-0 bg-gradient-to-b from-transparent via-black/10 to-black/70"></div>
          </div>
          <div class="absolute bottom-0 left-0 right-0 p-8 text-white">
            <div class="flex gap-2 mb-3">
              <span class="px-3 py-1 text-sm font-bold text-white rounded-full bg-primary/90">14 DAYS</span>
              <span class="px-3 py-1 text-sm text-white rounded-full bg-white/20 backdrop-blur-sm">BEST SELLER</span>
            </div>
            <h3 class="mb-2 text-3xl font-bold">Everest Base Camp Trek</h3>
            <p class="max-w-lg mb-6 text-gray-200">Walk in the footsteps of legends to the base of the world's highest
              peak.</p>
            <div class="flex items-center justify-between pt-4 border-t border-white/20">
              <span class="text-2xl font-bold">From $1580</span>
              <a href="/everest-base-camp" class="flex items-center gap-2 font-medium transition-all hover:gap-3">
                Explore <i class="text-sm fas fa-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>

        <!-- Right Column - 3 Treks Stack -->
        <div class="flex flex-col gap-6 h-[500px]">
          <!-- Trek 1 (Top) -->
          <div
            class="relative flex-1 overflow-hidden transition-all duration-300 shadow-lg group rounded-2xl hover:-translate-y-1">
            <div class="absolute inset-0 transition duration-700 bg-center bg-cover group-hover:scale-110"
              style="background-image: url('https://www.advadventures.com/uploads/packagethumb/1511517375-annapurna.jpg')">
              <div class="absolute inset-0 bg-gradient-to-b from-transparent via-black/10 to-black/60"></div>
            </div>
            <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
              <h4 class="mb-1 text-xl font-bold">Annapurna Circuit</h4>
              <div class="flex items-center justify-between pt-3 mt-3 border-t border-white/20">
                <span class="text-sm">From $1090</span>
                <a href="/annapurna" class="text-white transition-colors hover:text-primary">
                  <i class="fas fa-arrow-right"></i>
                </a>
              </div>
            </div>
          </div>

          <!-- Middle Row - 2 Small Treks -->
          <div class="flex gap-6 h-[200px]">
            <!-- Trek 2 -->
            <div
              class="relative flex-1 overflow-hidden transition-all duration-300 shadow-lg group rounded-2xl hover:-translate-y-1">
              <div class="absolute inset-0 transition duration-700 bg-center bg-cover group-hover:scale-110"
                style="background-image: url('https://www.advadventures.com/uploads/packagethumb/1511688929-chorten-in-lo-manthang-valley.jpg')">
                <div class="absolute inset-0 bg-gradient-to-b from-transparent via-black/10 to-black/60"></div>
              </div>
              <div class="absolute bottom-0 left-0 right-0 p-4 text-white">
                <h4 class="text-lg font-bold">Upper Mustang</h4>
                <div class="flex items-center justify-between pt-2 mt-2 border-t border-white/20">
                  <span class="text-xs">From $2390</span>
                  <a href="/mustang" class="text-sm text-white transition-colors hover:text-primary">
                    <i class="fas fa-arrow-right"></i>
                  </a>
                </div>
              </div>
            </div>

            <!-- Trek 3 -->
            <div
              class="relative flex-1 overflow-hidden transition-all duration-300 shadow-lg group rounded-2xl hover:-translate-y-1">
              <div class="absolute inset-0 transition duration-700 bg-center bg-cover group-hover:scale-110"
                style="background-image: url('https://www.advadventures.com/uploads/packagethumb/1515909872-gokyo-valley-trek62.jpeg')">
                <div class="absolute inset-0 bg-gradient-to-b from-transparent via-black/10 to-black/60"></div>
              </div>
              <div class="absolute bottom-0 left-0 right-0 p-4 text-white">
                <h4 class="text-lg font-bold">Gokyo Valley</h4>
                <div class="flex items-center justify-between pt-2 mt-2 border-t border-white/20">
                  <span class="text-xs">From $1570</span>
                  <a href="/gokyo" class="text-sm text-white transition-colors hover:text-primary">
                    <i class="fas fa-arrow-right"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Centered "View All" Button -->
      <div class="mt-12 text-center">
        <a href="/all-treks"
          class="inline-flex items-center justify-center px-8 py-3.5 border-2 border-primary text-primary hover:bg-primary hover:text-white font-bold rounded-lg transition-all duration-300">
          View All Treks
          <i class="ml-2 fas fa-arrow-right"></i>
        </a>
      </div>
    </div>
  </section>

  <section class="py-16 bg-gray-50">
    <div class="container px-4 mx-auto">
      <!-- Section Header -->
      <div class="mb-16 text-center">
        <span class="inline-block mb-3 font-semibold text-primary">HIMALAYAN EXPEDITIONS</span>
        <h2 class="mb-4 text-4xl font-bold text-gray-900 md:text-5xl">Popular Climbing Peaks in Nepal</h2>
        <p class="max-w-3xl mx-auto text-xl text-gray-600">Conquer Nepal's most spectacular climbing peaks with expert
          guides</p>
        <div class="w-24 h-1.5 bg-primary mx-auto mt-6"></div>
      </div>

      <!-- Climbing Packages Grid -->
      <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-4">
        <!-- Island Peak -->
        <div
          class="relative overflow-hidden transition-all duration-300 bg-white shadow-lg group rounded-xl hover:shadow-xl hover:-translate-y-2">
          <figure class="relative h-48 overflow-hidden">
            <img src="https://www.advadventures.com/uploads/packagethumb/1516605172-DSCF1253.JPG"
              alt="Island Peak Climbing"
              class="object-cover w-full h-full transition-transform duration-500 group-hover:scale-105" loading="lazy">
            <figcaption
              class="absolute px-3 py-1 text-sm font-semibold rounded-full shadow-sm bottom-4 right-4 bg-white/90 text-primary">
              $2440
            </figcaption>
          </figure>
          <div class="p-6">
            <div class="flex items-start justify-between mb-3">
              <span class="text-sm text-gray-500">19 Days</span>
              <span class="text-xs bg-blue-100 text-blue-800 px-2.5 py-1 rounded-full font-medium">Everest Region</span>
            </div>
            <h3 class="mb-3 text-xl font-bold text-gray-900">
              <a href="/package/island-peak-climbing.html" class="transition-colors hover:text-primary">Island Peak
                Climbing</a>
            </h3>
            <p class="mb-5 text-gray-600 line-clamp-3">Perfect blend of trekking and climbing in the Everest region with
              spectacular views and thrilling ascent.</p>
            <a href="/package/island-peak-climbing.html"
              class="inline-flex items-center font-medium transition-colors text-primary hover:text-primary-dark">
              Explore Details
              <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                  d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z"
                  clip-rule="evenodd" />
              </svg>
            </a>
          </div>
        </div>

        <!-- Mera Peak -->
        <div
          class="relative overflow-hidden transition-all duration-300 bg-white shadow-lg group rounded-xl hover:shadow-xl hover:-translate-y-2">
          <figure class="relative h-48 overflow-hidden">
            <img src="https://www.advadventures.com/uploads/packagethumb/1512107235-Mera-summit.jpg"
              alt="Mera Peak Climbing"
              class="object-cover w-full h-full transition-transform duration-500 group-hover:scale-105" loading="lazy">
            <figcaption
              class="absolute px-3 py-1 text-sm font-semibold rounded-full shadow-sm bottom-4 right-4 bg-white/90 text-primary">
              $2590
            </figcaption>
          </figure>
          <div class="p-6">
            <div class="flex items-start justify-between mb-3">
              <span class="text-sm text-gray-500">18 Days</span>
              <span class="text-xs bg-green-100 text-green-800 px-2.5 py-1 rounded-full font-medium">Highest Trekking
                Peak</span>
            </div>
            <h3 class="mb-3 text-xl font-bold text-gray-900">
              <a href="/package/mera-peak-climbing.html" class="transition-colors hover:text-primary">Mera Peak
                Climbing</a>
            </h3>
            <p class="mb-5 text-gray-600 line-clamp-3">Climb one of Nepal's highest trekking peaks (6,476m) with three
              summits offering breathtaking Himalayan views.</p>
            <a href="/package/mera-peak-climbing.html"
              class="inline-flex items-center font-medium transition-colors text-primary hover:text-primary-dark">
              Explore Details
              <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                  d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z"
                  clip-rule="evenodd" />
              </svg>
            </a>
          </div>
        </div>

        <!-- Lobuche Peak -->
        <div
          class="relative overflow-hidden transition-all duration-300 bg-white shadow-lg group rounded-xl hover:shadow-xl hover:-translate-y-2">
          <figure class="relative h-48 overflow-hidden">
            <img src="https://www.advadventures.com/uploads/packagethumb/1512108319-lobuche-peak.jpg"
              alt="Lobuche Peak Climbing"
              class="object-cover w-full h-full transition-transform duration-500 group-hover:scale-105" loading="lazy">
            <figcaption
              class="absolute px-3 py-1 text-sm font-semibold rounded-full shadow-sm bottom-4 right-4 bg-white/90 text-primary">
              $2680
            </figcaption>
          </figure>
          <div class="p-6">
            <div class="flex items-start justify-between mb-3">
              <span class="text-sm text-gray-500">22 Days</span>
              <span class="text-xs bg-purple-100 text-purple-800 px-2.5 py-1 rounded-full font-medium">Technical
                Climb</span>
            </div>
            <h3 class="mb-3 text-xl font-bold text-gray-900">
              <a href="/package/lobuche-peak-climbing.html" class="transition-colors hover:text-primary">Lobuche Peak
                Climbing</a>
            </h3>
            <p class="mb-5 text-gray-600 line-clamp-3">Challenging trekking peak near Everest with spectacular views of
              the Khumbu region's giants.</p>
            <a href="/package/lobuche-peak-climbing.html"
              class="inline-flex items-center font-medium transition-colors text-primary hover:text-primary-dark">
              Explore Details
              <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                  d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z"
                  clip-rule="evenodd" />
              </svg>
            </a>
          </div>
        </div>

        <!-- Pisang Peak -->
        <div
          class="relative overflow-hidden transition-all duration-300 bg-white shadow-lg group rounded-xl hover:shadow-xl hover:-translate-y-2">
          <figure class="relative h-48 overflow-hidden">
            <img
              src="https://www.advadventures.com/uploads/packagethumb/1516604867-pisang%20base%20camp-%20tented%20camp.jpg"
              alt="Pisang Peak Climbing"
              class="object-cover w-full h-full transition-transform duration-500 group-hover:scale-105" loading="lazy">
            <figcaption
              class="absolute px-3 py-1 text-sm font-semibold rounded-full shadow-sm bottom-4 right-4 bg-white/90 text-primary">
              $2990
            </figcaption>
          </figure>
          <div class="p-6">
            <div class="flex items-start justify-between mb-3">
              <span class="text-sm text-gray-500">21 Days</span>
              <span class="text-xs bg-orange-100 text-orange-800 px-2.5 py-1 rounded-full font-medium">Annapurna
                Region</span>
            </div>
            <h3 class="mb-3 text-xl font-bold text-gray-900">
              <a href="/package/pisang-peak-climbing.html" class="transition-colors hover:text-primary">Pisang Peak with
                Annapurna Circuit</a>
            </h3>
            <p class="mb-5 text-gray-600 line-clamp-3">Challenging 6,093m climb combined with the classic Annapurna
              Circuit and Tilicho Lake.</p>
            <a href="/package/pisang-peak-climbing.html"
              class="inline-flex items-center font-medium transition-colors text-primary hover:text-primary-dark">
              Explore Details
              <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                  d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z"
                  clip-rule="evenodd" />
              </svg>
            </a>
          </div>
        </div>
      </div>

      <!-- CTA Button -->
      <div class="mt-16 text-center">
        <a href="/all-climbing-expeditions"
          class="inline-flex items-center justify-center px-8 py-3.5 border-2 border-primary text-primary hover:bg-primary hover:text-white font-bold rounded-lg transition-all duration-300 transform hover:scale-105">
          View All Climbing Expeditions
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
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

    <div class="container relative z-10 px-4 mx-auto">
      <div class="mb-8 text-center animate-slide-up">
        <span class="inline-block text-[#ffcc00] font-semibold mb-3 tracking-widest uppercase">Testimonials</span>
        <h2 class="text-4xl md:text-5xl font-bold mb-4 font-serif text-[#fffae3]">Trailblazers' Tales</h2>
        <div class="w-24 h-1.5 bg-[#ffcc00] mx-auto mt-6"></div>
      </div>

      <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
        <div
          class="relative text-gray-900 transition-all duration-500 bg-white shadow-lg group rounded-2xl hover:shadow-xl hover:-translate-y-2">
          <div class="p-8">
            <div class="mb-6">
              <p class="mb-4 text-gray-700">"A life-changing journey through the Himalayas. The team's expertise made
                every step feel safe and magical."</p>
              <div class="border-l-4 border-[#ffcc00] pl-4">
                <h4 class="font-bold text-gray-800">Sarah Mitchell</h4>
                <p class="text-sm text-gray-500">Everest Base Camp Trek</p>
              </div>
            </div>
          </div>
        </div>

        <div
          class="relative text-gray-900 transition-all duration-500 bg-white shadow-lg group rounded-2xl hover:shadow-xl hover:-translate-y-2">
          <div class="p-8">
            <div class="mb-6">
              <p class="mb-4 text-gray-700">"Perfect blend of adventure and cultural immersion. Every detail was
                meticulously planned yet felt spontaneous."</p>
              <div class="border-l-4 border-[#ffcc00] pl-4">
                <h4 class="font-bold text-gray-800">James Chen</h4>
                <p class="text-sm text-gray-500">Annapurna Circuit</p>
              </div>
            </div>
          </div>
        </div>

        <div
          class="relative text-gray-900 transition-all duration-500 bg-white shadow-lg group rounded-2xl hover:shadow-xl hover:-translate-y-2">
          <div class="p-8">
            <div class="mb-6">
              <p class="mb-4 text-gray-700">"The mountain vistas took our breath away, but the genuine care from our
                guides truly touched our hearts."</p>
              <div class="border-l-4 border-[#ffcc00] pl-4">
                <h4 class="font-bold text-gray-800">Amina Al-Mansoori</h4>
                <p class="text-sm text-gray-500">Langtang Valley Trek</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="mt-12 text-center">
        <a href="/testimonials.html"
          class="inline-flex items-center px-6 py-3 border-2 border-[#ffcc00] text-[#ffcc00] hover:bg-[#ffcc00] hover:text-white font-medium rounded-full transition-all duration-500">
          <span>Explore More Stories</span>
        </a>
      </div>
    </div>
  </section>

  <!-- Certificates Section -->
  <section class="py-10 -mt-5">
    <div class="container px-4 mx-auto">
      <div class="mb-8 text-center">
        <h2 class="mb-4 text-4xl font-bold leading-tight text-gray-900 md:text-5xl">
          TripAdvisor <br />
          <span class="text-green-600">Certificates of Excellence</span>
        </h2>
        <p class="max-w-2xl mx-auto mt-4 text-xl text-gray-600">
          A testament to our unwavering commitment to creating exceptional travel experiences
        </p>
        <div class="w-32 h-1 mx-auto mt-6 bg-green-600"></div>
      </div>

      <div class="grid max-w-6xl grid-cols-1 gap-8 mx-auto md:grid-cols-3">
        <div class="overflow-hidden bg-white shadow-lg rounded-2xl">
          <img src="https://www.advadventures.com/dist/frontend1/assets/images/cert-excel17.png"
            alt="TripAdvisor Certificate 2017" class="object-contain w-full h-auto max-h-[400px]">
          <div class="py-3 text-center text-white bg-green-600">
            2017 Certificate
          </div>
        </div>

        <div class="overflow-hidden bg-white shadow-lg rounded-2xl">
          <img src="https://www.advadventures.com/dist/frontend1/assets/images/cert-excel18.png"
            alt="TripAdvisor Certificate 2018" class="object-contain w-full h-auto max-h-[400px]">
          <div class="py-3 text-center text-white bg-green-600">
            2018 Certificate
          </div>
        </div>

        <div class="overflow-hidden bg-white shadow-lg rounded-2xl">
          <img src="https://www.advadventures.com/dist/frontend1/assets/images/cert-excel19.png"
            alt="TripAdvisor Certificate 2019" class="object-contain w-full h-auto max-h-[400px]">
          <div class="py-3 text-center text-white bg-green-600">
            2019 Certificate
          </div>
        </div>
      </div>

      <div class="mt-12 text-center">
        <a href="#"
          class="inline-flex items-center px-10 py-4 font-bold text-white transition-all duration-300 transform bg-green-600 rounded-full shadow-xl hover:bg-green-700 hover:scale-105 hover:shadow-2xl">
          View Our Full TripAdvisor Profile
        </a>
      </div>
    </div>
  </section>

  <section class="py-16 bg-white">
    <div class="container px-4 mx-auto">
      <!-- Section Header -->
      <div class="mb-12 text-center">
        <h2 class="mb-3 text-3xl font-bold text-gray-900 md:text-4xl">Stay Updated with Our Adventures</h2>
        <p class="max-w-2xl mx-auto text-lg text-gray-600">Sign up for exclusive deals, discounts, and travel
          inspiration</p>
        <div class="w-24 h-1 mx-auto mt-4 bg-primary"></div>
      </div>

      <!-- Newsletter Form -->
      <div class="max-w-2xl mx-auto">
        <form action="https://www.advadventures.com/newsletter" method="post" class="space-y-6">
          <input type="hidden" name="_token" value="834vxzSWguoqpCyS1zaobUybEUf5qCmhkDwdSkwp">

          <div class="flex flex-col gap-4 sm:flex-row">
            <div class="relative flex-grow">
              <label for="sEmail" class="sr-only">Email Address</label>
              <input type="email" id="sEmail" name="email"
                class="w-full py-4 pl-12 pr-6 transition-all border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent"
                placeholder="Enter your email address" required>
              <svg class="absolute w-5 h-5 text-gray-400 transform -translate-y-1/2 left-4 top-1/2" fill="none"
                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                </path>
              </svg>
            </div>
            <button type="submit"
              class="px-8 py-4 font-medium text-white transition-colors rounded-lg shadow-md bg-primary hover:bg-primary-dark hover:shadow-lg whitespace-nowrap">
              Subscribe
            </button>
          </div>

          <p class="text-sm text-center text-gray-500">
            We respect your privacy. Unsubscribe at any time.
          </p>
        </form>
      </div>
    </div>
  </section>
  <footer class="py-8 text-white bg-gray-900">
    <div class="container px-4 mx-auto">
      <!-- Main sections -->
      <div class="grid grid-cols-1 gap-8 mb-10 md:grid-cols-4">
        <!-- Destinations -->
        <div>
          <h3 class="pb-2 mb-4 text-lg font-bold border-b border-gray-700">Destinations</h3>
          <ul class="space-y-2">
            <li><a href="/nepal" class="hover:text-blue-300">Nepal</a></li>
            <li><a href="/tibet" class="hover:text-blue-300">Tibet</a></li>
            <li><a href="/bhutan" class="hover:text-blue-300">Bhutan</a></li>
            <li><a href="/india" class="hover:text-blue-300">India</a></li>
            <li><a href="/nepal-bhutan" class="hover:text-blue-300">Nepal/Bhutan</a></li>
            <li><a href="/nepal-tibet" class="hover:text-blue-300">Nepal/Tibet</a></li>
            <li><a href="/nepal-tibet-bhutan" class="hover:text-blue-300">Nepal/Tibet/Bhutan</a></li>
          </ul>
        </div>

        <!-- Activities Column -->
        <div>
          <h3 class="pb-2 mb-4 text-lg font-bold border-b border-gray-700">Popular Activities</h3>
          <ul class="space-y-2">
            <li><a href="/trekking-in-nepal" class="hover:text-blue-300">Trekking in Nepal</a></li>
            <li><a href="/tours-in-nepal" class="hover:text-blue-300">Tours in Nepal</a></li>
            <li><a href="/peak-climbing" class="hover:text-blue-300">Peak Climbing</a></li>
            <li><a href="/bhutan-tours" class="hover:text-blue-300">Bhutan Tours</a></li>
            <li><a href="/mt-kailash" class="hover:text-blue-300">Mt. Kailash</a></li>
            <li><a href="/tibet-tours" class="hover:text-blue-300">Tibet Tours</a></li>
          </ul>
        </div>

        <!-- Resources Column -->
        <div>
          <h3 class="pb-2 mb-4 text-lg font-bold border-b border-gray-700">Resources</h3>
          <ul class="space-y-2">
            <li><a href="/nepal-travel-guide" class="hover:text-blue-300">Nepal Travel Guide</a></li>
            <li><a href="/bhutan-travel-guide" class="hover:text-blue-300">Bhutan Travel Guide</a></li>
            <li><a href="/tibet-travel-guide" class="hover:text-blue-300">Tibet Travel Guide</a></li>
            <li><a href="/nepal-visa" class="hover:text-blue-300">Nepal Visa</a></li>
            <li><a href="/travel-insurance" class="hover:text-blue-300">Travel Insurance</a></li>
            <li><a href="/terms-conditions" class="hover:text-blue-300">Terms & Conditions</a></li>
          </ul>
        </div>

        <!-- Contact Column -->
        <div>
          <h3 class="pb-2 mb-4 text-lg font-bold border-b border-gray-700">Contact Us</h3>
          <ul class="space-y-3">
            <li class="flex items-start">
              <span class="mr-2 text-blue-400">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd"
                    d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                    clip-rule="evenodd"></path>
                </svg>
              </span>
              <div>
                Advanced Adventures Nepal Pvt. Ltd<br>
                Bhagwan Bahal, Thamel Kathmandu
              </div>
            </li>
            <li class="flex items-center">
              <span class="mr-2 text-blue-400">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z">
                  </path>
                </svg>
              </span>
              <a href="tel:9771-4544152">977-1-4544152</a>
            </li>
            <li class="flex items-center">
              <span class="mr-2 text-blue-400">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z">
                  </path>
                </svg>
              </span>
              <a href="https://wa.me/9779851189771">+977 9851189771 (WhatsApp)</a>
            </li>
            <li class="flex items-center">
              <span class="mr-2 text-blue-400">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                  <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                </svg>
              </span>
              <a href="mailto:info@advadventures.com">info@advadventures.com</a>
            </li>
          </ul>
        </div>
      </div>

      <!-- Our Affiliations & Certifications section -->
      <div class="pt-8 pb-6 border-t border-gray-800">
        <h2 class="mb-8 text-xl font-bold text-center">Our Affiliations & Certifications</h2>

        <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
          <!-- Affiliations Section -->
          <div class="text-center">
            <h3 class="mb-4 text-lg font-bold">Our Affiliations</h3>
            <div class="flex flex-wrap items-center justify-center gap-4 mb-2">
              <img src="/images/ntb-logo.png" alt="Nepal Tourism Board" class="h-10">
              <img src="/images/taan-logo.png" alt="TAAN" class="h-10">
              <img src="/images/nma-logo.png" alt="NMA" class="h-10">
              <img src="/images/himal-logo.png" alt="Himalayan Rescue" class="h-10">
              <img src="/images/keep-logo.png" alt="KEEP" class="h-10">
              <img src="/images/natta-logo.png" alt="NATTA" class="h-10">
            </div>
          </div>

          <!-- Partner With Section -->
          <div class="text-center">
            <h3 class="mb-4 text-lg font-bold">Partner with</h3>
            <a href="https://www.touristlink.com/partner/advanced-adventures-nepal.html" target="_blank"
              class="inline-block">
              <img src="/images/touristlink-certified.png" alt="Touristlink Certified Partner" class="h-16 mx-auto">
            </a>
          </div>

          <!-- Recommended On Section -->
          <div class="text-center">
            <h3 class="mb-4 text-lg font-bold">Recommended On</h3>
            <div class="flex flex-wrap items-center justify-center gap-4">
              <img src="/images/lonely-planet-logo.png" alt="Lonely Planet" class="h-10">
              <img src="/images/bookmundi-logo.png" alt="Bookmundi" class="h-10">
              <img src="/images/trustpilot-logo.png" alt="Trustpilot" class="h-10">
              <img src="/images/tripadvisor-logo.png" alt="TripAdvisor" class="h-10">
            </div>
          </div>
        </div>
      </div>

      <!-- Copyright & Social Media Section -->
      <div class="pt-6 mt-6 border-t border-gray-800">
        <div class="flex flex-col md:flex-row md:justify-between md:items-center">
          <!-- DMCA & Copyright -->
          <div class="flex items-center mb-4 space-x-4 md:mb-0">
            <img src="/images/dmca-protected.png" alt="DMCA Protected" class="h-8">
            <div>
              <p class="text-sm">Copyright © <?php echo date('Y'); ?> Advanced Adventures Nepal Pvt Ltd. All Rights
                Reserved.</p>
              <p class="text-xs">Govt. Regd No: 064/065/47694 | NMA Regd No: 833 | NTB Regd No: 1215/067</p>
            </div>
          </div>

          <!-- Social Media & Creator -->
          <div class="flex flex-col md:flex-row md:items-center">
            <!-- Social Media Icons -->
            <div class="flex mb-2 space-x-3 md:mr-4 md:mb-0">
              <a href="https://www.facebook.com/advadventures.nepal" target="_blank"
                class="text-white hover:text-blue-300">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                  <path
                    d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z">
                  </path>
                </svg>
              </a>
              <a href="https://twitter.com/weadvadventures" target="_blank" class="text-white hover:text-blue-300">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                  <path
                    d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84">
                  </path>
                </svg>
              </a>
              <a href="https://www.instagram.com/advancedadventuresnepal" target="_blank"
                class="text-white hover:text-blue-300">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                  <path
                    d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.023.047 1.351.058 3.807.058h.468c2.456 0 2.784-.011 3.807-.058.975-.045 1.504-.207 1.857-.344.466-.182.8-.399 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.047-1.023.058-1.351.058-3.807v-.468c0-2.456-.011-2.784-.058-3.807-.045-.975-.207-1.504-.344-1.857-.182-.466-.399-.8-.748-1.15-.35-.35-.683-.566-1.15-.748-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058h-.468zm.63 3.063a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 8.135a3 3 0 100-6 3 3 0 000 6zm4.243-8.707a1.2 1.2 0 100-2.4 1.2 1.2 0 000 2.4z">
                  </path>
                </svg>
              </a>
              <a href="https://www.youtube.com/@advadventures" target="_blank" class="text-white hover:text-blue-300">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                  <path
                    d="M19.812 5.418c.861.23 1.538.907 1.768 1.768C21.998 8.746 22 12 22 12s0 3.255-.418 4.814a2.504 2.504 0 01-1.768 1.768c-1.56.419-7.814.419-7.814.419s-6.255 0-7.814-.419a2.505 2.505 0 01-1.768-1.768C2 15.255 2 12 2 12s0-3.255.417-4.814a2.507 2.507 0 011.768-1.768C5.744 5 11.998 5 11.998 5s6.255 0 7.814.418z">
                  </path>
                  <path fill="white"
                    d="M9.546 8.803a.5.5 0 00-.5.5v5.394a.5.5 0 00.764.424l4.723-2.697a.5.5 0 000-.848l-4.723-2.697a.5.5 0 00-.264-.076z">
                  </path>
                </svg>
              </a>
            </div>
            <p class="text-xs">Crafted with <span class="text-red-500">♥</span> by <a href="https://www.cyberpirates.io"
                class="underline hover:text-blue-300">Cyber Pirates Pvt. Ltd.</a></p>
          </div>
        </div>
      </div>
    </div>
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
    mainSwiper.on('slideChange', function() {
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
      window.scrollTo({
        top: 0,
        behavior: 'smooth'
      });
    });
  </script>
</body>

</html>