<?php


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
  document.addEventListener('DOMContentLoaded', function() {
    const travelDropdown = document.getElementById('travel-dropdown');
    const travelTrigger = document.getElementById('travel-trigger');

    travelTrigger.addEventListener('mouseenter', () => {
      travelDropdown.classList.remove('hidden');
    });

    travelTrigger.addEventListener('mouseleave', () => {
      setTimeout(() => {
        if (!travelTrigger.matches(':hover') && !travelDropdown.matches(':hover')) {
          travelDropdown.classList.add('hidden');
        }
      }, 200);
    });

    travelDropdown.addEventListener('mouseleave', () => {
      setTimeout(() => {
        if (!travelTrigger.matches(':hover') && !travelDropdown.matches(':hover')) {
          travelDropdown.classList.add('hidden');
        }
      }, 200);
    });
  });
  document.addEventListener('DOMContentLoaded', function() {
    const csrDropdown = document.getElementById('csr-dropdown');
    const csrTrigger = document.getElementById('csr-trigger');

    csrTrigger.addEventListener('mouseenter', () => {
      csrDropdown.classList.remove('hidden');
    });

    csrTrigger.addEventListener('mouseleave', () => {
      setTimeout(() => {
        if (!csrTrigger.matches(':hover') && !csrDropdown.matches(':hover')) {
          csrDropdown.classList.add('hidden');
        }
      }, 200);
    });

    csrDropdown.addEventListener('mouseleave', () => {
      setTimeout(() => {
        if (!csrTrigger.matches(':hover') && !csrDropdown.matches(':hover')) {
          csrDropdown.classList.add('hidden');
        }
      }, 200);
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
              <a href="booking.php" class="flex items-center justify-between w-full px-4 py-2 hover:bg-gray-50 hover:text-secondary">Book Your Trip</a>
              <a href="how_to_pay.php" class="flex items-center justify-between w-full px-4 py-2 hover:bg-gray-50 hover:text-secondary">How to Pay</a>
              <a href="payOnline.php" class="flex items-center justify-between w-full px-4 py-2 hover:bg-gray-50 hover:text-secondary">Pay Online</a>
              <a href="termsandconditions.php" class="flex items-center justify-between w-full px-4 py-2 hover:bg-gray-50 hover:text-secondary">Terms & conditions</a>
              <a href="DiscountOffers.php" class="flex items-center justify-between w-full px-4 py-2 hover:bg-gray-50 hover:text-secondary">Discount
                Offers</a>
            </div>
          </div>
          <div id="travel-container" class="relative inline-block">
            <!-- Trigger -->
            <div id="travel-trigger" class="font-medium text-gray-700 transition cursor-pointer hover:text-primary">
              Travel Guide <i class="fas fa-chevron-down"></i>
            </div>

            <!-- Dropdown Menu -->
            <div id="travel-dropdown" class="absolute left-0 z-50 hidden w-48 mt-2 bg-white rounded-md shadow-lg">
              <a href="nepalvisa.php" class="flex items-center justify-between w-full px-4 py-2 hover:bg-gray-50 hover:text-secondary">Nepali Visa</a>
              <a href="nepaltravelguide.php" class="flex items-center justify-between w-full px-4 py-2 hover:bg-gray-50 hover:text-secondary">Nepal Travel Guide</a>
              <a href="equipmentchecklist.php" class="flex items-center justify-between w-full px-4 py-2 hover:bg-gray-50 hover:text-secondary">Equipment Check List</a>
              <a href="travelinsurance.php" class="flex items-center justify-between w-full px-4 py-2 hover:bg-gray-50 hover:text-secondary">Travel Insurance</a>
              <a href="besttimetotravel.php" class="flex items-center justify-between w-full px-4 py-2 hover:bg-gray-50 hover:text-secondary">Best Time To Travel Nepal</a>
              <a href="packinglist.php" class="flex items-center justify-between w-full px-4 py-2 hover:bg-gray-50 hover:text-secondary">Packing List</a>
              <a href="bhutantravelguide.php" class="flex items-center justify-between w-full px-4 py-2 hover:bg-gray-50 hover:text-secondary">Bhutan Travel Guide</a>
              <a href="tibettravelguide.php" class="flex items-center justify-between w-full px-4 py-2 hover:bg-gray-50 hover:text-secondary">Tibet Travel Guide</a>
            </div>
          </div>


          <a href="/page/about-us.html" class="font-medium text-gray-700 transition hover:text-primary">About Us</a>

          <div id="csr-container" class="relative inline-block">
            <!-- Trigger -->
            <div id="csr-trigger" class="font-medium text-gray-700 transition cursor-pointer hover:text-primary">
              CSR <i class="fas fa-chevron-down"></i>
            </div>

            <!-- Dropdown Menu -->
            <div id="csr-dropdown" class="absolute left-0 z-50 hidden mt-2 bg-white rounded-md shadow-lg w-72">
              <a href="Responsible_tourism.php" class="flex items-center justify-between w-full px-4 py-2 hover:bg-gray-50 hover:text-secondary">Responsible Tourism in Nepal with Advanced Adventures</a>
              <a href="HealthandposterPolicy.php" class="flex items-center justify-between w-full px-4 py-2 hover:bg-gray-50 hover:text-secondary">Health & Porter Policy</a>
              <a href="Education.php" class="flex items-center justify-between w-full px-4 py-2 hover:bg-gray-50 hover:text-secondary">Education</a>
              <a href="SocialAwareness.php" class="flex items-center justify-between w-full px-4 py-2 hover:bg-gray-50 hover:text-secondary">Social Awareness</a>
              <a href="PostQuakeRelief.php" class="flex items-center justify-between w-full px-4 py-2 hover:bg-gray-50 hover:text-secondary">Post-Quake Relief</a>
              <a href="Environment.php" class="flex items-center justify-between w-full px-4 py-2 hover:bg-gray-50 hover:text-secondary">Environment</a>
              <a href="LearnNepelaseLanguage.php" class="flex items-center justify-between w-full px-4 py-2 hover:bg-gray-50 hover:text-secondary">Learn Nepalese Language</a>
              <a href="VolunteerTeaching.php" class="flex items-center justify-between w-full px-4 py-2 hover:bg-gray-50 hover:text-secondary">Volunteer Teaching</a>
            </div>
          </div>

          <a href="/testimonials.html" class="font-medium text-gray-700 transition hover:text-primary">Trip Reviews</a>
          <a href="#" class="font-medium text-gray-700 transition hover:text-primary">Travel Blog</a>
          <a href="contact.php" class="font-medium text-gray-700 transition hover:text-primary">Contact</a>
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