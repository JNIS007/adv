<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Advanced Adventures</title>

  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />


  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: '#1a365d',
            secondary: '#c2410c',
          },
          animation: {
            fadeIn: 'fadeIn 0.8s ease-out forwards',
          },
          keyframes: {
            fadeIn: {
              from: { opacity: '0', transform: 'translateY(20px)' },
              to: { opacity: '1', transform: 'translateY(0)' }
            }
          }
        }
      }
    }
  </script>

  <style>
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





    @keyframes fade-in-up {
      0% {
        opacity: 0;
        transform: translateY(20px);
      }

      100% {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .animate-fade-in-up {
      animation: fade-in-up 0.8s ease-out;
    }

    .perspective-1000 {
      perspective: 1000px;
    }

    .group:hover .group-hover\:rotate-x-12 {
      transform: rotateX(12deg);
    }

    .backdrop-blur-sm {
      backdrop-filter: blur(4px);
    }
  </style>
  <style>
    .hover\:scale-105:hover {
      transform: scale(1.05);
    }

    .transition-transform {
      transition: transform 0.3s ease;
    }
  </style>
</head>

<body class="font-sans antialiased">
  <!-- Header Placeholder -->
  <div id="header-container"></div>
  <!-- Top info bar -->
  <div class="bg-gray-800 text-white text-sm py-2">
    <div class="container mx-auto px-4 flex justify-between items-center">
      
      <span><i class="fas fa-medal mr-1"></i> 15 Years Experience</span>
      <div class="flex items-center space-x-4">
        <span><span class="font-bold text-yellow-400"><i class="fas fa-headset mr-1"></i> Talk to Expert</span>
<i class="fas fa-phone-alt mr-1"></i> +977-9851189771</span>
        <a href="https://api.whatsapp.com/send?phone=9779851189771" target="_blank" class="hover:text-secondary">
          <i class="fab fa-whatsapp mr-1"></i> WhatsApp
        </a>
        <a href="viber://contact?number=9779851189771" target="_blank" class="hover:text-secondary">
          <i class="fab fa-viber mr-1"></i> Viber
        </a>
      </div>
    </div>
  </div>

  <!-- Main header -->
  <header class="sticky top-0 z-50 bg-white shadow-md">
    <div class="container mx-auto px-4">
      <div class="flex justify-between items-center py-4">
        <!-- Logo -->
        <a href="https://www.advadventures.com" class="flex items-center">
          <img src="assets/logo.png" alt="Advanced Adventures" class="h-12 md:h-16 object-contain">
        </a>

        <!-- Desktop Navigation -->
        <nav class="hidden lg:flex items-center space-x-8">
          <div class="dropdown relative">
            <button class="flex items-center font-medium text-gray-700 hover:text-primary transition">
              Destinations <i class="fas fa-chevron-down ml-1 text-xs"></i>
            </button>
            <div
              class="dropdown-content absolute left-0 mt-2 w-96 bg-white shadow-xl rounded-md p-4 grid grid-cols-2 gap-4">
              <div>
                <h3 class="font-bold text-primary mb-2">Trekking</h3>
                <ul class="space-y-2">
                  <li><a href="/nepal/everest-region-trekking" class="hover:text-secondary">Everest Region</a></li>
                  <li><a href="/nepal/annapurna-region-trekking" class="hover:text-secondary">Annapurna Region</a></li>
                  <li><a href="/nepal/langtang-region-trekking" class="hover:text-secondary">Langtang Region</a></li>
                  <li><a href="/nepal/manaslu-region-trekking" class="hover:text-secondary">Manaslu Region</a></li>
                </ul>
              </div>
              <div>
                <h3 class="font-bold text-primary mb-2">Tours</h3>
                <ul class="space-y-2">
                  <li><a href="/nepal/tours-in-nepal" class="hover:text-secondary">Cultural Tours</a></li>
                  <li><a href="/nepal/wildlife-tour-in-nepal" class="hover:text-secondary">Wildlife Tours</a></li>
                  <li><a href="/nepal/luxury-travel" class="hover:text-secondary">Luxury Travel</a></li>
                  <li><a href="/nepal/day-tours" class="hover:text-secondary">Day Tours</a></li>
                </ul>
              </div>
            </div>
          </div>

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
            Enquiry
          </a>
        </nav>

        <!-- Mobile Menu Button -->
        <button class="lg:hidden text-gray-700" id="mobile-menu-button">
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
              <a href="#" class="block py-1 hover:text-secondary">Luxury Travel</a>
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
              Enquiry
            </a>
          </div>
        </div>
      </div>
    </div>
  </header>

  <script>
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    const closeMobileMenu = document.getElementById('close-mobile-menu');

    mobileMenuButton.addEventListener('click', () => {
      mobileMenu.classList.remove('hidden');
      document.body.style.overflow = 'hidden';
    });

    closeMobileMenu.addEventListener('click', () => {
      mobileMenu.classList.add('hidden');
      document.body.style.overflow = '';
    });

    mobileMenu.addEventListener('click', (e) => {
      if (e.target === mobileMenu) {
        mobileMenu.classList.add('hidden');
        document.body.style.overflow = '';
      }
    });

    document.querySelectorAll('.accordion button').forEach(button => {
      button.addEventListener('click', () => {
        const content = button.nextElementSibling;
        const icon = button.querySelector('i');
        content.classList.toggle('hidden');
        icon.classList.toggle('fa-chevron-down');
        icon.classList.toggle('fa-chevron-up');
      });
    });
  </script>


  <!--main content-->
  <main>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
      <!-- Featured Image -->
      <div class="mb-8 rounded-xl overflow-hidden shadow-lg">
        <img src="assets/bhutan.png" alt="Nepal, Tibet & Bhutan Introduction tour - 12 Days"
          class="w-full h-96 object-cover">
      </div>
      <div class="text-sm text-gray-600 py-2">
        Home - Nepal - Trekking in Nepal - Everest region - Everest base camp trek
      </div>
      <div class="mb-6">
        <h1 class="text-3xl font-bold text-[#005FAB]">Everest Base Camp Trek – 14 Days</h1>
        <p class="text-yellow-600 font-medium mt-1">★★★★★ 140 reviews on TripAdvisor | Recommended by 99% of travelers</p>
      </div>
      <div class="sticky top-20 z-40 bg-white shadow-md py-2 mb-8">
        <div class="max-w-7xl mx-auto px-4 flex overflow-x-auto space-x-6">
          <a href="#overview" class="text-blue-600 font-semibold hover:text-secondary">Trip Facts</a>
          <a href="#overview" class="text-blue-600 font-semibold hover:text-secondary">Overview</a>
          <a href="#itinerary" class="text-blue-600 font-semibold hover:text-secondary">Itinerary</a>
          <a href="#includes" class="text-blue-600 font-semibold hover:text-secondary">Includes/Exclude</a>
          <a href="#info" class="text-blue-600 font-semibold hover:text-secondary">Useful Info</a>
          <a href="#faqs" class="text-blue-600 font-semibold hover:text-secondary">FAQs</a>
          <a href="#reviews" class="text-blue-600 font-semibold hover:text-secondary">Reviews</a>
        </div>
      </div>
      




      <!-- Main Content Layout -->
      <div class="flex flex-col md:flex-row gap-8">
        <!-- Main Content -->
        <div class="flex-1">



          <!-------------- Trip Facts Section ---------->
          <section class="bg-blue-50 p-8 rounded-xl shadow-lg mb-10">
            <h2 class="text-3xl font-bold text-[#005FAB] mb-8 border-b-2 border-[#005FAB] pb-4">Trip Facts</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
              <!-- Activities -->
              <div class="flex items-start space-x-4">
                <div class="w-8 mt-1 text-[#005FAB]">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5z" />
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="M12 14l6.16-3.422A12.083 12.083 0 0112 21.75 12.083 12.083 0 015.84 10.578L12 14z" />
                  </svg>
                </div>
                <div>
                  <h3 class="font-semibold text-lg mb-1">Activities</h3>
                  <p class="text-gray-700">Sightseeing Tours & Hiking</p>
                </div>
              </div>

              <!-- Meals -->
              <div class="flex items-start space-x-4">
                <div class="w-8 mt-1 text-[#005FAB]">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 6.75h15M4.5 12h15m-15 5.25h15" />
                  </svg>
                </div>
                <div>
                  <h3 class="font-semibold text-lg mb-1">Meals</h3>
                  <p class="text-gray-700">Breakfast in Nepal & Tibet, Full board in Bhutan</p>
                </div>
              </div>

              <!-- Accommodation -->
              <div class="flex items-start space-x-4">
                <div class="w-8 mt-1 text-[#005FAB]">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="M3 9.75V6.75A2.25 2.25 0 015.25 4.5h13.5A2.25 2.25 0 0121 6.75v3M3 9.75L12 15l9-5.25M3 9.75v9.75a.75.75 0 00.75.75h16.5a.75.75 0 00.75-.75V9.75" />
                  </svg>
                </div>
                <div>
                  <h3 class="font-semibold text-lg mb-1">Accommodation</h3>
                  <p class="text-gray-700">Three star standard hotel</p>
                </div>
              </div>

              <!-- Group Size -->
              <div class="flex items-start space-x-4">
                <div class="w-8 mt-1 text-[#005FAB]">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="M17 20h5v-2a4 4 0 00-4-4h-1M7 20H2v-2a4 4 0 014-4h1m10-4a4 4 0 11-8 0 4 4 0 018 0z" />
                  </svg>
                </div>
                <div>
                  <h3 class="font-semibold text-lg mb-1">Group Size</h3>
                  <p class="text-gray-700">2+ Participants</p>
                </div>
              </div>
          </section>

          <!-------- Trip Overview Section ----------->
          <section class="bg-blue-50 p-8 rounded-xl shadow-lg mb-10">
            <h2 class="text-3xl font-bold text-[#005FAB] mb-8 border-b-2 border-[#005FAB] pb-4">Trip Overview</h2>
            <div class="space-y-6 text-gray-700 leading-relaxed">
              <p>Embark on an unforgettable 12-day cultural and scenic journey across the Himalayan jewels of Nepal,
                Tibet, and Bhutan. This thoughtfully curated itinerary blends spiritual immersion, breathtaking mountain
                landscapes, and local cultural experiences.</p>

              <p>Begin in Kathmandu, Nepal, exploring iconic UNESCO World Heritage Sites like Swayambhunath, Boudhanath,
                Pashupatinath, and Kathmandu Durbar Square. Ascend to Nagarkot for a peaceful mountain retreat with
                panoramic sunrise views and nature hikes.</p>

              <p>Fly to Lhasa, Tibet for a deep dive into Tibetan Buddhism. Visit the majestic Potala Palace, Jokhang
                Temple, Barkhor Street, and Drepung Monastery. Participate in local customs, including butter tea
                tasting and observing monastic debates.</p>

              <p>Conclude your journey in Bhutan, the Land of the Thunder Dragon. Discover Thimphu’s cultural gems and
                Paro Valley’s spiritual treasures, including the famed Taktsang (Tiger’s Nest) Monastery hike.</p>

              <div class="bg-white/70 p-6 rounded-lg border-l-4 border-[#005FAB]">
                <h3 class="text-xl font-semibold mb-4 text-[#005FAB]">Key Highlights</h3>
                <ul class="space-y-2">
                  <li class="flex items-start space-x-2">
                    <svg class="w-5 mt-1 text-[#005FAB]" xmlns="http://www.w3.org/2000/svg" fill="none"
                      viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>Cross-border Himalayan experience covering 3 countries</span>
                  </li>
                  <li class="flex items-start space-x-2">
                    <svg class="w-5 mt-1 text-[#005FAB]" xmlns="http://www.w3.org/2000/svg" fill="none"
                      viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>Cultural interactions with diverse Buddhist traditions</span>
                  </li>
                  <li class="flex items-start space-x-2">
                    <svg class="w-5 mt-1 text-[#005FAB]" xmlns="http://www.w3.org/2000/svg" fill="none"
                      viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>Combination of cultural exploration and moderate hiking</span>
                  </li>
                  <li class="flex items-start space-x-2">
                    <svg class="w-5 mt-1 text-[#005FAB]" xmlns="http://www.w3.org/2000/svg" fill="none"
                      viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>Carefully curated accommodations with local character</span>
                  </li>
                </ul>
              </div>
            </div>
          </section>


          <!-- Short Itinerary -->
          <section class="bg-blue-50 p-6 rounded-xl shadow-sm mb-8">
            <h2 class="text-3xl font-bold text-[#005FAB] mb-8 border-b-2 border-[#005FAB] pb-4">Short Itinerary</h2>
            <div class="space-y-6 text-gray-700 leading-relaxed">

              <!-- Day 01 -->
              <div class="border border-gray-200 rounded-lg">
                <button class="w-full text-left px-4 py-3 flex justify-between items-center font-semibold text-black">
                  <span><strong>Day 01:</strong> Arrival in Kathmandu</span>
                </button>
              </div>

              <!-- Day 02 -->
              <div class="border border-gray-200 rounded-lg">
                <button class="w-full text-left px-4 py-3 flex justify-between items-center font-semibold text-black">
                  <span><strong>Day 02:</strong> Sightseeing in Kathmandu (Boudhanath, Pashupatinath, Kathmandu Durbar
                    Square, and Swoyambhunath)</span>
                </button>
              </div>

              <!-- Day 03 -->
              <div class="border border-gray-200 rounded-lg">
                <button class="w-full text-left px-4 py-3 flex justify-between items-center font-semibold text-black">
                  <span><strong>Day 03:</strong> Sightseeing tour to Bhaktapur Durbar Square, Changunarayan, and
                    Nagarkot</span>
                </button>
              </div>

              <!-- Day 04 -->
              <div class="border border-gray-200 rounded-lg">
                <button class="w-full text-left px-4 py-3 flex justify-between items-center font-semibold text-black">
                  <span><strong>Day 04:</strong> Sunrise tour at Nagarkot and sightseeing to Patan, Bungamati, and
                    Khokana</span>
                </button>
              </div>

              <!-- Day 05 -->
              <div class="border border-gray-200 rounded-lg">
                <button class="w-full text-left px-4 py-3 flex justify-between items-center font-semibold text-black">
                  <span><strong>Day 05:</strong> Fly from Kathmandu to Lhasa (3650m/11,980ft) - 1 hour 30 minutes</span>
                </button>
              </div>

              <!-- Day 06 -->
              <div class="border border-gray-200 rounded-lg">
                <button class="w-full text-left px-4 py-3 flex justify-between items-center font-semibold text-black">
                  <span><strong>Day 06:</strong> Sightseeing in Lhasa – Potala Palace, Jokhang Temple, and Barkhor
                    Street</span>
                </button>
              </div>

              <!-- Day 07 -->
              <div class="border border-gray-200 rounded-lg">
                <button class="w-full text-left px-4 py-3 flex justify-between items-center font-semibold text-black">
                  <span><strong>Day 07:</strong> Sightseeing in Lhasa – Drepung Monastery and Sera Monastery</span>
                </button>
              </div>

              <!-- Day 08 -->
              <div class="border border-gray-200 rounded-lg">
                <button class="w-full text-left px-4 py-3 flex justify-between items-center font-semibold text-black">
                  <span><strong>Day 08:</strong> Fly from Lhasa to Kathmandu and transfer to hotel – 1:30 hours
                    flight</span>
                </button>
              </div>

              <!-- Day 09 -->
              <div class="border border-gray-200 rounded-lg">
                <button class="w-full text-left px-4 py-3 flex justify-between items-center font-semibold text-black">
                  <span><strong>Day 09:</strong> Fly to Paro (2200m/7200ft) and Drive to Thimphu – Thimphu
                    Sightseeing</span>
                </button>
              </div>

              <!-- Day 10 -->
              <div class="border border-gray-200 rounded-lg">
                <button class="w-full text-left px-4 py-3 flex justify-between items-center font-semibold text-black">
                  <span><strong>Day 10:</strong> Sightseeing in Thimphu, Drive back to Paro and Paro Sightseeing</span>
                </button>
              </div>

              <!-- Day 11 -->
              <div class="border border-gray-200 rounded-lg">
                <button class="w-full text-left px-4 py-3 flex justify-between items-center font-semibold text-black">
                  <span><strong>Day 11:</strong> Hike to Taktsang Monastery (Tiger's Nest) (3180m/10,430ft) – 5-6 hours
                    hike</span>
                </button>
              </div>

              <!-- Day 12 -->
              <div class="border border-gray-200 rounded-lg">
                <button class="w-full text-left px-4 py-3 flex justify-between items-center font-semibold text-black">
                  <span><strong>Day 12:</strong> Departure from Paro</span>
                </button>
              </div>
            </div>
          </section>


          <!-- Detailed Itinerary -->
          <section class="bg-blue-50 p-6 rounded-xl shadow-sm mb-8">
            <h2 class="text-3xl font-bold text-[#005FAB] mb-8 border-b-2 border-[#005FAB] pb-4">Detailed Itinerary</h2>
            <div class="space-y-6 text-gray-700 leading-relaxed">
              <div x-data="{ selected: null }" class="space-y-4">

                <!-- Day 01 -->
                <div class="border border-gray-200 rounded-lg">
                  <button @click="selected !== 1 ? selected = 1 : selected = null"
                    class="w-full text-left px-4 py-3 flex justify-between items-center font-semibold text-black">
                    <span><strong>Day 01:</strong> Arrival in Kathmandu</span>
                    <span x-show="selected !== 1">+</span>
                    <span x-show="selected === 1">−</span>
                  </button>
                  <div x-show="selected === 1" x-collapse class="px-4 pb-4 text-black">
                    <p><strong>Altitude:</strong> 1350m / 4428ft</p>
                    <p><strong>Meals:</strong> Welcome Dinner</p>
                    <br>
                    <p>On arrival to Kathmandu; Advanced Adventures representative will greet you at the airport and
                      transfer you to our trip hotel. Later we meet and take you to our head office, brief your upcoming
                      Nepal & Bhutan trip with us. Evening, we host welcome dinner at one of the finest local restaurant
                      with music and ethnic dance. Overnight Kathmandu.</p>
                  </div>
                </div>

                <!-- Day 02 -->
                <div class="border border-gray-200 rounded-lg">
                  <button @click="selected !== 2 ? selected = 2 : selected = null"
                    class="w-full text-left px-4 py-3 flex justify-between items-center font-semibold text-black">
                    <span><strong>Day 02:</strong> Sightseeing tour in Kathmandu</span>
                    <span x-show="selected !== 2">+</span>
                    <span x-show="selected === 2">−</span>
                  </button>
                  <div x-show="selected === 2" x-collapse class="px-4 pb-4 text-black">
                    <p><strong>Places:</strong> Boudhanath, Pashupatinath, Kathmandu Durbar Square, Swoyambhunath</p>
                    <p><strong>Altitude:</strong> 1350m / 4428ft</p>
                    <p><strong>Meals:</strong> Breakfast</p>
                    <br>
                    <p>After breakfast, we will start to our guided trip to cultural world heritage sites in Kathmandu;
                      including visits to the pilgrimage sites of Hindus Pashupatinath temple, the world biggest
                      Bouddhanath Stupa, visit Swoyambhunath Stupa also known as monkey temple and historical Kathmandu
                      Durbar Square with temple, unique architectures and the living goddess Kumari in central
                      Kathmandu. Overnight.</p>
                  </div>
                </div>

                <!-- Day 03 -->
                <div class="border border-gray-200 rounded-lg">
                  <button @click="selected !== 3 ? selected = 3 : selected = null"
                    class="w-full text-left px-4 py-3 flex justify-between items-center font-semibold text-black">
                    <span><strong>Day 03:</strong> Bhaktapur, Changunarayan & Drive to Nagarkot</span>
                    <span x-show="selected !== 3">+</span>
                    <span x-show="selected === 3">−</span>
                  </button>
                  <div x-show="selected === 3" x-collapse class="px-4 pb-4 text-black">
                    <p><strong>Places:</strong> Bhaktapur Durbar Square, Changunarayan Temple, Drive to Nagarkot</p>
                    <p><strong>Altitude:</strong> 2161m / 7090ft</p>
                    <p><strong>Meals:</strong> Breakfast</p>
                  </div>
                </div>

                <!-- Day 04 -->
                <div class="border border-gray-200 rounded-lg">
                  <button @click="selected !== 4 ? selected = 4 : selected = null"
                    class="w-full text-left px-4 py-3 flex justify-between items-center font-semibold text-black">
                    <span><strong>Day 04:</strong> Sunrise at Nagarkot & Patan, Bungamati, Khokana Tour</span>
                    <span x-show="selected !== 4">+</span>
                    <span x-show="selected === 4">−</span>
                  </button>
                  <div x-show="selected === 4" x-collapse class="px-4 pb-4 text-black">
                    <p><strong>Places:</strong> Sunrise from Nagarkot, Patan Durbar Square, Bungamati, Khokana</p>
                    <p><strong>Altitude:</strong> 1350m / 4428ft</p>
                    <p><strong>Meals:</strong> Breakfast</p>
                  </div>
                </div>

                <!-- Day 05 -->
                <div class="border border-gray-200 rounded-lg">
                  <button @click="selected !== 5 ? selected = 5 : selected = null"
                    class="w-full text-left px-4 py-3 flex justify-between items-center font-semibold text-black">
                    <span><strong>Day 05:</strong> Fly to Lhasa</span>
                    <span x-show="selected !== 5">+</span>
                    <span x-show="selected === 5">−</span>
                  </button>
                  <div x-show="selected === 5" x-collapse class="px-4 pb-4 text-black">
                    <p><strong>Flight Duration:</strong> 1.5 hours</p>
                    <p><strong>Altitude:</strong> 3650m / 11,980ft</p>
                    <p><strong>Meals:</strong> Breakfast</p>
                  </div>
                </div>

                <!-- Day 06 -->
                <div class="border border-gray-200 rounded-lg">
                  <button @click="selected !== 6 ? selected = 6 : selected = null"
                    class="w-full text-left px-4 py-3 flex justify-between items-center font-semibold text-black">
                    <span><strong>Day 06:</strong> Lhasa Sightseeing: Potala, Jokhang & Barkhor</span>
                    <span x-show="selected !== 6">+</span>
                    <span x-show="selected === 6">−</span>
                  </button>
                  <div x-show="selected === 6" x-collapse class="px-4 pb-4 text-black">
                    <p><strong>Places:</strong> Potala Palace, Jokhang Temple, Barkhor Street</p>
                    <p><strong>Altitude:</strong> 3650m / 11,980ft</p>
                    <p><strong>Meals:</strong> Breakfast</p>
                  </div>
                </div>

                <!-- Day 07 -->
                <div class="border border-gray-200 rounded-lg">
                  <button @click="selected !== 7 ? selected = 7 : selected = null"
                    class="w-full text-left px-4 py-3 flex justify-between items-center font-semibold text-black">
                    <span><strong>Day 07:</strong> Lhasa Monasteries: Drepung & Sera</span>
                    <span x-show="selected !== 7">+</span>
                    <span x-show="selected === 7">−</span>
                  </button>
                  <div x-show="selected === 7" x-collapse class="px-4 pb-4 text-black">
                    <p><strong>Places:</strong> Drepung Monastery, Sera Monastery</p>
                    <p><strong>Altitude:</strong> 3650m / 11,980ft</p>
                    <p><strong>Meals:</strong> Breakfast</p>
                  </div>
                </div>

                <!-- Day 08 -->
                <div class="border border-gray-200 rounded-lg">
                  <button @click="selected !== 8 ? selected = 8 : selected = null"
                    class="w-full text-left px-4 py-3 flex justify-between items-center font-semibold text-black">
                    <span><strong>Day 08:</strong> Fly back to Kathmandu</span>
                    <span x-show="selected !== 8">+</span>
                    <span x-show="selected === 8">−</span>
                  </button>
                  <div x-show="selected === 8" x-collapse class="px-4 pb-4 text-black">
                    <p><strong>Flight Duration:</strong> 1.5 hours</p>
                    <p><strong>Altitude:</strong> 1350m / 4428ft</p>
                    <p><strong>Meals:</strong> Breakfast</p>
                  </div>
                </div>

                <!-- Day 09 -->
                <div class="border border-gray-200 rounded-lg">
                  <button @click="selected !== 9 ? selected = 9 : selected = null"
                    class="w-full text-left px-4 py-3 flex justify-between items-center font-semibold text-black">
                    <span><strong>Day 09:</strong> Fly to Paro & Drive to Thimphu</span>
                    <span x-show="selected !== 9">+</span>
                    <span x-show="selected === 9">−</span>
                  </button>
                  <div x-show="selected === 9" x-collapse class="px-4 pb-4 text-black">
                    <p><strong>Altitude:</strong> 2248m / 7375ft</p>
                    <p><strong>Activities:</strong> Paro to Thimphu drive, Thimphu sightseeing</p>
                    <p><strong>Meals:</strong> Breakfast, Lunch & Dinner</p>
                  </div>
                </div>

                <!-- Day 10 -->
                <div class="border border-gray-200 rounded-lg">
                  <button @click="selected !== 10 ? selected = 10 : selected = null"
                    class="w-full text-left px-4 py-3 flex justify-between items-center font-semibold text-black">
                    <span><strong>Day 10:</strong> Thimphu to Paro & Paro Sightseeing</span>
                    <span x-show="selected !== 10">+</span>
                    <span x-show="selected === 10">−</span>
                  </button>
                  <div x-show="selected === 10" x-collapse class="px-4 pb-4 text-black">
                    <p><strong>Altitude:</strong> 2200m / 7200ft</p>
                    <p><strong>Activities:</strong> Return drive, sightseeing around Paro</p>
                    <p><strong>Meals:</strong> Breakfast, Lunch & Dinner</p>
                  </div>
                </div>

                <!-- Day 11 -->
                <div class="border border-gray-200 rounded-lg">
                  <button @click="selected !== 11 ? selected = 11 : selected = null"
                    class="w-full text-left px-4 py-3 flex justify-between items-center font-semibold text-black">
                    <span><strong>Day 11:</strong> Hike to Tiger's Nest (Taktsang Monastery)</span>
                    <span x-show="selected !== 11">+</span>
                    <span x-show="selected === 11">−</span>
                  </button>
                  <div x-show="selected === 11" x-collapse class="px-4 pb-4 text-black">
                    <p><strong>Altitude:</strong> 3180m / 10430ft</p>
                    <p><strong>Hike Duration:</strong> 5–6 hours</p>
                    <p><strong>Meals:</strong> Breakfast, Lunch & Dinner</p>
                  </div>
                </div>

                <!-- Day 12 -->
                <div class="border border-gray-200 rounded-lg">
                  <button @click="selected !== 12 ? selected = 12 : selected = null"
                    class="w-full text-left px-4 py-3 flex justify-between items-center font-semibold text-black">
                    <span><strong>Day 12:</strong> Departure from Paro</span>
                    <span x-show="selected !== 12">+</span>
                    <span x-show="selected === 12">−</span>
                  </button>
                  <div x-show="selected === 12" x-collapse class="px-4 pb-4 text-black">
                    <p><strong>Meals:</strong> Breakfast</p>
                  </div>
                </div>

              </div>
            </div>
          </section>
          <section class="bg-blue-50 p-6 rounded-xl shadow-sm mb-8 text-center">
            <h2 class="text-2xl font-bold text-[#005FAB] mb-4">Not satisfied with this itinerary?</h2>
            <p class="mb-4 text-gray-700">We can customize it to suit your travel needs.</p>
            <a href="#" class="bg-primary text-white px-6 py-2 rounded-lg hover:bg-[#122747] transition">
              Customize this Trip
            </a>
          </section>
          


          <!-- Include Alpine.js -->
          <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>


          <!-- Altitude Map -->
          <section class="bg-blue-50 p-6 rounded-xl shadow-sm">
            <h2 class="text-3xl font-bold text-[#005FAB] mb-8 border-b-2 border-[#005FAB] pb-4">Altitude Map</h2>
            <div class="bg-gray-100 h-96 rounded-lg flex items-center justify-center">
              <canvas id="altitudeChart" class="w-full h-full"></canvas>
            </div>
          </section>

          <!-- Include Chart.js -->
          <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

          <script>
            const ctx = document.getElementById('altitudeChart').getContext('2d');

            const altitudeChart = new Chart(ctx, {
              type: 'line',
              data: {
                labels: [
                  'Day 01', 'Day 02', 'Day 03', 'Day 04', 'Day 05', 'Day 06',
                  'Day 07', 'Day 08', 'Day 09', 'Day 10', 'Day 11', 'Day 12'
                ],
                datasets: [{
                  label: 'Altitude (m)',
                  data: [
                    1350, 1350, 2161, 1350, 3650, 3650,
                    3650, 1350, 2248, 2200, 3180, 2200
                  ],
                  backgroundColor: 'rgba(0, 95, 171, 0.2)', // Updated with #005FAB (light blue)
                  borderColor: 'rgba(0, 95, 171, 1)', // Updated with #005FAB (dark blue)
                  borderWidth: 2,
                  pointBackgroundColor: 'rgba(0, 95, 171, 1)', // Updated with #005FAB
                  pointRadius: 5,
                  tension: 0.3,
                  fill: true,
                }]
              },
              options: {
                responsive: true,
                plugins: {
                  tooltip: {
                    backgroundColor: '#ffffff', // Tooltip background color for better readability
                    titleColor: '#005FAB', // Tooltip title color
                    bodyColor: '#333333', // Tooltip body color for better contrast
                    font: {
                      size: 14, // Increase font size for tooltips
                      family: 'Arial, sans-serif', // Set font family
                      weight: 'bold' // Make the tooltip font bold
                    },
                    callbacks: {
                      title: function (context) {
                        return context[0].label;
                      },
                      label: function (context) {
                        const dayDetails = [
                          "Arrival in Kathmandu - 1350m",
                          "Kathmandu Sightseeing - 1350m",
                          "Bhaktapur, Changunarayan, Nagarkot - 2161m",
                          "Nagarkot Sunrise & Heritage Tour - 1350m",
                          "Fly to Lhasa - 3650m",
                          "Potala, Jokhang, Barkhor - 3650m",
                          "Drepung & Sera Monasteries - 3650m",
                          "Fly back to Kathmandu - 1350m",
                          "Paro to Thimphu - 2248m",
                          "Thimphu to Paro - 2200m",
                          "Tiger's Nest Hike - 3180m",
                          "Departure from Paro - 2200m"
                        ];
                        return dayDetails[context.dataIndex];
                      }
                    }
                  },
                  legend: {
                    display: false
                  },
                  title: {
                    display: false
                  }
                },
                scales: {
                  y: {
                    beginAtZero: false,
                    title: {
                      display: true,
                      text: 'Altitude (meters)',
                      font: {
                        size: 16, // Increase font size for Y-axis title
                        family: 'Arial, sans-serif', // Set font family
                        weight: 'bold' // Make the Y-axis title bold
                      },
                      color: '#005FAB' // Set Y-axis title color
                    },
                    ticks: {
                      font: {
                        size: 14, // Increase font size for Y-axis labels
                        family: 'Arial, sans-serif', // Set font family
                        weight: 'normal' // Use normal weight for Y-axis labels
                      },
                      color: '#333333' // Set Y-axis labels color for better readability
                    }
                  },
                  x: {
                    title: {
                      display: true,
                      text: 'Days',
                      font: {
                        size: 16, // Increase font size for X-axis title
                        family: 'Arial, sans-serif', // Set font family
                        weight: 'bold' // Make the X-axis title bold
                      },
                      color: '#005FAB' // Set X-axis title color
                    },
                    ticks: {
                      font: {
                        size: 14, // Increase font size for X-axis labels
                        family: 'Arial, sans-serif', // Set font family
                        weight: 'normal' // Use normal weight for X-axis labels
                      },
                      color: '#333333' // Set X-axis labels color for better readability
                    }
                  }
                }
              }
            });
          </script>


          <!-----------------Includes and Excludes--------------------->
          <section class="bg-blue-50 p-6 rounded-xl shadow-lg mt-8">
            <h2 class="text-3xl font-bold text-gray-800 mb-6 border-b-2 pb-2">What's Included?</h2>
            <ul class="list-disc pl-6 space-y-4 text-gray-700">
              <li class="flex items-center space-x-2">
                <span class="w-2.5 h-2.5 bg-blue-500 rounded-full"></span>
                <span>3-star standard hotels in Nepal, Tibet, and Bhutan</span>
              </li>
              <li class="flex items-center space-x-2">
                <span class="w-2.5 h-2.5 bg-blue-500 rounded-full"></span>
                <span>All transfers according to the program by private vehicle</span>
              </li>
              <li class="flex items-center space-x-2">
                <span class="w-2.5 h-2.5 bg-blue-500 rounded-full"></span>
                <span>Breakfast, Lunch, and Dinner during your stay in Bhutan</span>
              </li>
              <li class="flex items-center space-x-2">
                <span class="w-2.5 h-2.5 bg-blue-500 rounded-full"></span>
                <span>Breakfast basis in Nepal and Tibet</span>
              </li>
              <li class="flex items-center space-x-2">
                <span class="w-2.5 h-2.5 bg-blue-500 rounded-full"></span>
                <span>Monument entry fees as per itinerary</span>
              </li>
              <li class="flex items-center space-x-2">
                <span class="w-2.5 h-2.5 bg-blue-500 rounded-full"></span>
                <span>Services of local English-speaking guides in Nepal, Tibet, and Bhutan</span>
              </li>
              <li class="flex items-center space-x-2">
                <span class="w-2.5 h-2.5 bg-blue-500 rounded-full"></span>
                <span>Bhutan Visa and Tibet Travel Permit</span>
              </li>
              <li class="flex items-center space-x-2">
                <span class="w-2.5 h-2.5 bg-blue-500 rounded-full"></span>
                <span>Government taxes in Nepal, Tibet & Bhutan</span>
              </li>
            </ul>
          </section>

          <section class="bg-blue-50 p-6 rounded-xl shadow-lg mt-8">
            <h2 class="text-3xl font-bold text-gray-800 mb-6 border-b-2 pb-2">What's Not Included?</h2>
            <ul class="list-disc pl-6 space-y-4 text-gray-700">
              <li class="flex items-center space-x-2">
                <span class="w-2.5 h-2.5 bg-red-500 rounded-full"></span>
                <span>International flight tickets to and from Kathmandu, Kathmandu - Paro - Kathmandu & Kathmandu -
                  Lhasa - Kathmandu</span>
              </li>
              <li class="flex items-center space-x-2">
                <span class="w-2.5 h-2.5 bg-red-500 rounded-full"></span>
                <span>Nepal Visa (purchased on arrival at Kathmandu airport)</span>
              </li>
              <li class="flex items-center space-x-2">
                <span class="w-2.5 h-2.5 bg-red-500 rounded-full"></span>
                <span>Tips for local guides and drivers</span>
              </li>
              <li class="flex items-center space-x-2">
                <span class="w-2.5 h-2.5 bg-red-500 rounded-full"></span>
                <span>Travel insurance</span>
              </li>
              <li class="flex items-center space-x-2">
                <span class="w-2.5 h-2.5 bg-red-500 rounded-full"></span>
                <span>Other personal and incidental expenses</span>
              </li>
            </ul>
          </section>


          <!----------------------Departure Dates And Price------------------------->
          <section id="departures" class="bg-blue-50 p-6 rounded-xl shadow-lg mt-8">
            <h2 class="text-3xl font-bold text-gray-800 mb-6">Everest Base Camp Trek Departures 2025 & 2026</h2>
          
            <p class="text-gray-700 mb-4">
              Choose between joining a fixed departure group or creating your own private trip. Below are the upcoming group
              departures for 2025 & 2026.
            </p>
          
            <!-- Tabs -->
            <div class="flex space-x-4 mb-6">
              <button id="tab-group" class="tab-button bg-primary text-white px-4 py-2 rounded-md focus:outline-none">Group
                Departures</button>
              <button id="tab-private"
                class="tab-button bg-gray-300 text-gray-800 px-4 py-2 rounded-md focus:outline-none">Private Trip</button>
            </div>
          
            <!-- Group Departures -->
            <div id="group-departures">
              <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                  <label for="year" class="block text-sm font-medium text-gray-800 mb-1">Select Year</label>
                  <select id="year" class="w-full p-2 border rounded-md bg-white">
                    <option>2025</option>
                    <option>2026</option>
                  </select>
                </div>
                <div>
                  <label for="month" class="block text-sm font-medium text-gray-800 mb-1">Select Month</label>
                  <select id="month" class="w-full p-2 border rounded-md bg-white">
                    <option>January</option>
                    <option>February</option>
                    <option>March</option>
                    <option>April</option>
                    <option>May</option>
                    <option>June</option>
                    <option>July</option>
                    <option>August</option>
                    <option>September</option>
                    <option>October</option>
                    <option>November</option>
                    <option>December</option>
                  </select>
                </div>
              </div>
          
              <div class="overflow-x-auto">
                <table class="min-w-full text-left bg-white rounded-lg overflow-hidden border border-gray-200">
                  <thead class="bg-primary text-white">
                    <tr>
                      <th class="px-4 py-3">Start Date</th>
                      <th class="px-4 py-3">Group Name</th>
                      <th class="px-4 py-3">Trip Price</th>
                      <th class="px-4 py-3">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="border-t">
                      <td class="px-4 py-3">01 Jan 2025</td>
                      <td class="px-4 py-3">Group A</td>
                      <td class="px-4 py-3">USD 1000</td>
                      <td class="px-4 py-3">
                        <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md">Book Now</button>
                      </td>
                    </tr>
                    <tr class="border-t">
                      <td class="px-4 py-3">15 Jan 2025</td>
                      <td class="px-4 py-3">Group B</td>
                      <td class="px-4 py-3">USD 1200</td>
                      <td class="px-4 py-3">
                        <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md">Book Now</button>
                      </td>
                    </tr>
                    <tr class="border-t">
                      <td class="px-4 py-3">01 Feb 2025</td>
                      <td class="px-4 py-3">Group C</td>
                      <td class="px-4 py-3">USD 1100</td>
                      <td class="px-4 py-3">
                        <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md">Book Now</button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          
            <!-- Private Trip -->
            <div id="private-departures" class="hidden mt-6">
              <div class="bg-white p-6 rounded-md shadow border border-gray-200">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Plan a Private Trip</h3>
                <p class="text-gray-700 mb-4">
                  Looking for a private departure with your own group, family, or solo? We can customize this trek based on your
                  preferred dates, comfort level, and travel style.
                </p>
                <a href="#inquiry-form" class="inline-block bg-primary hover:bg-[#122747] text-white px-6 py-2 rounded-md">
                  Inquire About a Private Trip
                </a>
              </div>
            </div>
          </section>
          
          <script>
            const tabGroup = document.getElementById('tab-group');
            const tabPrivate = document.getElementById('tab-private');
            const groupSection = document.getElementById('group-departures');
            const privateSection = document.getElementById('private-departures');

            tabGroup.addEventListener('click', () => {
              groupSection.classList.remove('hidden');
              privateSection.classList.add('hidden');
              tabGroup.classList.add('bg-primary', 'text-white');
              tabGroup.classList.remove('bg-gray-300', 'text-gray-800');
              tabPrivate.classList.remove('bg-primary', 'text-white');
              tabPrivate.classList.add('bg-gray-300', 'text-gray-800');
            });

            tabPrivate.addEventListener('click', () => {
              privateSection.classList.remove('hidden');
              groupSection.classList.add('hidden');
              tabPrivate.classList.add('bg-primary', 'text-white');
              tabPrivate.classList.remove('bg-gray-300', 'text-gray-800');
              tabGroup.classList.remove('bg-primary', 'text-white');
              tabGroup.classList.add('bg-gray-300', 'text-gray-800');
            });
          </script>
          <section id="info" class="..."> <!-- Keep existing classes -->
            <!-- Useful Info content -->
          </section>
          <section id="similar-treks" class="bg-blue-50 p-6 rounded-xl shadow-lg mt-8">
            <h2 class="text-2xl font-bold text-[#005FAB] mb-4">Similar Treks</h2>
            <ul class="space-y-3 text-blue-700 list-disc list-inside">
              <li><a href="/trip/annapurna-base-camp-trek" class="hover:underline">Annapurna Base Camp Trek – 11 Days</a></li>
              <li><a href="/trip/langtang-valley-trek" class="hover:underline">Langtang Valley Trek – 10 Days</a></li>
              <li><a href="/trip/manaslu-circuit-trek" class="hover:underline">Manaslu Circuit Trek – 16 Days</a></li>
            </ul>
          </section>
          <section id="faqs" class="..."> <!-- Keep existing layout -->
            <!-- FAQ content -->
          </section>




    


  </main>

  <!-- Footer Placeholder -->
  <div id="footer-container"></div>
  <footer class="bg-gray-900 text-gray-300 pt-6 text-xs">
    <div class="max-w-7xl mx-auto px-4">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
        <!-- Destinations -->
        <div>
          <h3 class="text-white font-semibold mb-2 border-b border-primary pb-1">Destinations</h3>
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
          <h3 class="text-white font-semibold mb-2 border-b border-primary pb-1">Activities</h3>
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
          <h3 class="text-white font-semibold mb-2 border-b border-primary pb-1">Resources</h3>
          <ul class="space-y-1">
            <li><a href="#" class="hover:text-primary">Travel Guide</a></li>
            <li><a href="#" class="hover:text-primary">Visa Info</a></li>
            <li><a href="#" class="hover:text-primary">Insurance</a></li>
            <li><a href="#" class="hover:text-primary">Terms</a></li>
          </ul>
        </div>

        <!-- Contact -->
        <div>
          <h3 class="text-white font-semibold mb-2 border-b border-primary pb-1">Contact</h3>
          <address class="not-italic space-y-1 text-xs">
            <div class="flex items-start">
              <i class="fas fa-map-marker-alt text-primary mt-1 mr-2 text-xs"></i>
              <span>Advanced Adventures Nepal Pvt. Ltd<br>Bhagwan Bahal, Thamel</span>
            </div>
            <div class="flex items-center"><i class="fas fa-phone-alt text-primary mr-2 text-xs"></i> +977-1-4544152
            </div>
            <div class="flex items-center"><i class="fab fa-whatsapp text-primary mr-2 text-xs"></i> +977 9851189771
            </div>
            <div class="flex items-center"><i class="fas fa-envelope text-primary mr-2 text-xs"></i> <a
                href="mailto:info@advadventures.com" class="hover:text-primary">info@advadventures.com</a></div>
          </address>
        </div>
      </div>

      <!-- Certifications -->
      <div class="border-t border-gray-700 pt-3 mb-3">
        <h3 class="text-white font-semibold mb-2 text-center">Certifications</h3>
        <div class="flex justify-center gap-4 flex-wrap">
          <img src="https://www.advadventures.com/dist/frontend1/assets/images/cert-excel17.png" alt="2017"
            class="h-10" />
          <img src="https://www.advadventures.com/dist/frontend1/assets/images/cert-excel18.png" alt="2018"
            class="h-10" />
          <img src="https://www.advadventures.com/dist/frontend1/assets/images/cert-excel19.png" alt="2019"
            class="h-10" />
        </div>
      </div>

      <!-- Footer Bottom -->
      <div class="border-t border-gray-700 pt-3 pb-4">
        <div class="flex flex-col md:flex-row justify-between items-center gap-2">
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
        <p class="mt-2 text-center text-[11px]">Crafted with <span class="text-primary">♥</span> by <a
            href="https://www.cyberpirates.io" class="hover:text-primary">Cyber Pirates</a></p>
      </div>
    </div>

    <!-- Back to Top Button -->
    <button id="goToTop"
      class="fixed bottom-6 right-4 z-50 bg-primary text-white p-2 rounded-full shadow-lg hover:bg-primary-dark">
      <i class="fas fa-chevron-up text-xs"></i>
    </button>
  </footer>

  <!-- Inclusion Script -->
  <script>
    // Function to load external HTML
    function loadHTML(url, elementId) {
      fetch(url)
        .then(response => response.text())
        .then(data => {
          document.getElementById(elementId).innerHTML = data;
          reinitScripts();
        });
    }

    // Reinitialize scripts after content load
    function reinitScripts() {
      // Mobile menu script
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

        mobileMenu.addEventListener('click', (e) => {
          if (e.target === mobileMenu) {
            mobileMenu.classList.add('hidden');
            document.body.style.overflow = '';
          }
        });
      }

      // Accordion script
      document.querySelectorAll('.accordion button').forEach(button => {
        button.addEventListener('click', () => {
          const content = button.nextElementSibling;
          const icon = button.querySelector('i');
          content.classList.toggle('hidden');
          icon.classList.toggle('fa-chevron-down');
          icon.classList.toggle('fa-chevron-up');
        });
      });

      // Back to top button
      const goToTopBtn = document.getElementById('goToTop');
      if (goToTopBtn) {
        window.addEventListener('scroll', () => {
          if (window.pageYOffset > 300) {
            goToTopBtn.style.opacity = '1';
            goToTopBtn.style.visibility = 'visible';
          } else {
            goToTopBtn.style.opacity = '0';
            goToTopBtn.style.visibility = 'hidden';
          }
        });

        goToTopBtn.addEventListener('click', (e) => {
          e.preventDefault();
          window.scrollTo({ top: 0, behavior: 'smooth' });
        });
      }
    }

    // Load header and footer
    document.addEventListener('DOMContentLoaded', () => {
      loadHTML('header.html', 'header-container');
      loadHTML('footer.html', 'footer-container');
    });
  </script>
</body>

</html>