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
  </style>
</head>

<body class="font-sans antialiased">
  <!-- Top info bar -->
  <div class="bg-gray-800 text-white text-sm py-2">
    <div class="container mx-auto px-4 flex justify-between items-center">
      <span><i class="fas fa-medal mr-1"></i> 15 Years Experience</span>
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
            Book Now
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
              Book Now
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
  
</body>

</html>