<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Contact us| Advanced Adventures</title>

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            'brand-green': '#2ecc71',
            'brand-blue': '#3498db',
          }
        }
      }
    }
  </script>

  <style>
    .whatsapp-float {
      position: fixed;
      bottom: 40px;
      right: 40px;
      z-index: 50;
    }

    .map-container {
      width: 100%;
      height: 220px;
      margin-bottom: 20px;
    }

    .form-input {
      width: 100%;
      border: 1px solid #ddd;
      border-radius: 4px;
      padding: 8px 12px;
      font-size: 14px;
    }

    .form-input:focus {
      outline: none;
      border-color: #3b82f6;
      box-shadow: 0 0 0 1px #3b82f6;
    }

    .form-select {
      width: 100%;
      border: 1px solid #ddd;
      border-radius: 4px;
      padding: 8px 12px;
      font-size: 14px;
      appearance: none;
      background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
      background-position: right 0.5rem center;
      background-repeat: no-repeat;
      background-size: 1.5em 1.5em;
    }

    .whatsapp-chat {
      position: fixed;
      bottom: 20px;
      right: 20px;
      z-index: 1000;
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
          <a href="/page/booking.html" class="font-medium text-gray-700 transition hover:text-primary">Booking</a>
          <a href="/page/travel-guide.html" class="font-medium text-gray-700 transition hover:text-primary">Travel Guide</a>
          <a href="/page/about-us.html" class="font-medium text-gray-700 transition hover:text-primary">About Us</a>
          <a href="/page/csr.html" class="font-medium text-gray-700 transition hover:text-primary">CSR</a>
          <a href="/testimonials.html" class="font-medium text-gray-700 transition hover:text-primary">Trip Reviews</a>
          <a href="#" class="font-medium text-gray-700 transition hover:text-primary">Travel Blog</a>
          <a href="#" class="font-medium text-gray-700 transition hover:text-primary">Contact</a>

          <!-- CTA Button -->
          <a href="/page/book-your-trip.html"
            class="bg-[#122747] hover:bg-[#122560] text-white px-4 py-2 rounded-md font-medium transition">
            Book Now
          </a>
        </nav>
      </div>
    </div>
  </header>
  <div class="container px-4 py-4 mx-auto">
    <!-- Breadcrumb navigation -->
    <div class="flex items-center mb-4 text-sm">
      <a href="/" class="text-blue-500 hover:text-blue-700"><i class="fas fa-home"></i></a>
      <span class="mx-2">/</span>
      <span>Contact Us</span>
    </div>

    <!-- Map section -->
    <!-- Map section -->
    <!-- Map section -->
    <div class="mb-6 map-container">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14129.828650634427!2d85.31557084994041!3d27.703167818955517!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb18fd2ef5bfed%3A0xcb2e5a20890a3bbe!2sAdvanced%20Adventures%20Nepal%20(Pvt.)%20Ltd.!5e0!3m2!1sen!2snp!4v1747131716981!5m2!1sen!2snp" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>



    <div class="grid grid-cols-1 gap-8 mt-16 md:grid-cols-3">
      <!-- Contact form section -->
      <div class="md:col-span-2">
        <div class="p-6 bg-white rounded-lg shadow-sm">
          <h2 class="pb-2 mb-4 text-xl font-semibold text-gray-800 border-b">Contact Advanced Adventures</h2>

          <p class="mb-6 text-sm text-gray-600">
            Thanks for visiting us. We appreciate hearing from you with your trip interest, comments or feedback or contact us for your interests/trip inquiries/booking. Please fill up the form below and send us. We will reply you within 24 hours. At any urgency, call us.
          </p>

          <form action="#" method="post">
            <div class="mb-4">
              <label for="name" class="block mb-1 text-sm font-medium text-gray-700">Name <span class="text-red-500">*</span></label>
              <input type="text" id="name" name="name" class="form-input" placeholder="Enter your name" required>
            </div>

            <div class="mb-4">
              <label for="email" class="block mb-1 text-sm font-medium text-gray-700">Email <span class="text-red-500">*</span></label>
              <input type="email" id="email" name="email" class="form-input" placeholder="Enter your email" required>
            </div>

            <div class="mb-4">
              <label for="phone" class="block mb-1 text-sm font-medium text-gray-700">Phone Number</label>
              <input type="tel" id="phone" name="phone" class="form-input" placeholder="Enter your phone number">
            </div>

            <div class="mb-4">
              <label for="subject" class="block mb-1 text-sm font-medium text-gray-700">Subject <span class="text-red-500">*</span></label>
              <input type="text" id="subject" name="subject" class="form-input" placeholder="Enter your subject" required>
            </div>

            <div class="mb-4">
              <label for="find_us" class="block mb-1 text-sm font-medium text-gray-700">How did you find us? <span class="text-red-500">*</span></label>
              <select id="find_us" name="find_us" class="form-select" required>
                <option value="">Select how did you find us?</option>
                <option value="google">Google Search</option>
                <option value="facebook">Facebook</option>
                <option value="instagram">Instagram</option>
                <option value="friend">Friend Recommendation</option>
                <option value="other">Other</option>
              </select>
            </div>

            <div class="mb-4">
              <label for="message" class="block mb-1 text-sm font-medium text-gray-700">Message <span class="text-red-500">*</span></label>
              <textarea id="message" name="message" rows="5" class="form-input" placeholder="Enter your message" required></textarea>
            </div>

            <div>
              <button type="submit" class="px-4 py-2 font-medium text-white transition duration-200 bg-blue-500 rounded hover:bg-blue-600">
                Send Message
              </button>
            </div>
          </form>
        </div>
      </div>

      <!-- Contact information section -->
      <div class="md:col-span-1">
        <div class="p-6 bg-white rounded-lg shadow-sm">
          <h2 class="pb-2 mb-4 text-xl font-semibold text-gray-800 border-b">Contact Address</h2>

          <div class="space-y-4">
            <div class="flex items-start">
              <div class="flex-shrink-0 mt-1">
                <i class="text-gray-500 fas fa-home"></i>
              </div>
              <div class="ml-3">
                <p class="font-medium">Advanced Adventures Nepal Pvt. Ltd.</p>
              </div>
            </div>

            <div class="flex items-start">
              <div class="flex-shrink-0 mt-1">
                <i class="text-gray-500 fas fa-map-marker-alt"></i>
              </div>
              <div class="ml-3">
                <p>Bhagwan Bahal, Thamel Kathmandu</p>
              </div>
            </div>

            <div class="flex items-start">
              <div class="flex-shrink-0 mt-1">
                <i class="text-gray-500 fas fa-phone"></i>
              </div>
              <div class="ml-3">
                <p>977-1-4354152</p>
              </div>
            </div>

            <div class="flex items-start">
              <div class="flex-shrink-0 mt-1">
                <i class="text-gray-500 fas fa-mobile-alt"></i>
              </div>
              <div class="ml-3">
                <p>977-9851189771</p>
              </div>
            </div>

            <div class="flex items-start">
              <div class="flex-shrink-0 mt-1">
                <i class="text-gray-500 fas fa-envelope"></i>
              </div>
              <div class="ml-3">
                <p>info@advadventures.com</p>
              </div>
            </div>

            <div class="pt-4 mt-4 border-t">
              <h3 class="flex items-center mb-3 font-semibold">
                <i class="mr-2 fas fa-user-circle"></i> Keshav Wagle
              </h3>

              <div class="ml-2 space-y-3">
                <div class="flex items-start">
                  <div class="flex-shrink-0">
                    <i class="text-gray-500 fas fa-phone"></i>
                  </div>
                  <div class="ml-3">
                    <p>977-9851189771</p>
                  </div>
                </div>

                <div class="flex items-start">
                  <div class="flex-shrink-0">
                    <i class="text-gray-500 fas fa-envelope"></i>
                  </div>
                  <div class="ml-3">
                    <p>info@advadventures.com</p>
                  </div>
                </div>

                <div class="flex items-start">
                  <div class="flex-shrink-0">
                    <i class="text-gray-500 fas fa-globe"></i>
                  </div>
                  <div class="ml-3">
                    <p>wagle@adv.hu</p>
                  </div>
                </div>
              </div>

              <div class="flex mt-3 space-x-4">
                <a href="https://api.whatsapp.com/send?phone=9779851189771" class="text-green-500 hover:text-green-700">
                  <i class="fab fa-whatsapp"></i> Whatsapp
                </a>
                <a href="#" class="text-blue-500 hover:text-blue-700">
                  <i class="fab fa-viber"></i> Viber
                </a>
                <a href="#" class="text-green-500 hover:text-green-700">
                  <i class="fab fa-weixin"></i> WeChat
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Newsletter section -->
    <div class="p-6 mt-8 bg-white rounded-lg shadow-sm">
      <div class="flex flex-col items-center justify-between md:flex-row">
        <h3 class="mb-4 text-lg font-semibold text-gray-800 md:mb-0">Sign Up for News Letter for Special Deals & Discounts</h3>
        <div class="flex w-full md:w-auto">
          <input type="email" placeholder="Enter your email address" class="w-full px-4 py-2 border border-gray-300 rounded-l md:w-64 focus:outline-none focus:ring-1 focus:ring-blue-500">
          <button type="button" class="px-4 py-2 text-white transition duration-200 bg-blue-500 rounded-r hover:bg-blue-600">Subscribe</button>
        </div>
      </div>
    </div>
  </div>

  <!-- WhatsApp chat button -->
  <div class="whatsapp-chat">
    <a href="https://api.whatsapp.com/send?phone=9779851189771" class="flex items-center justify-center p-3 text-white bg-green-500 rounded-full shadow-lg hover:bg-green-600">
      <i class="text-2xl fab fa-whatsapp"></i>
    </a>
  </div>
  <?php
  include("footer.php");
  ?>

</body>