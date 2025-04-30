<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <style>
    html, body {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      background-color: #111827;
    }

    #goToTop {
      opacity: 0;
      visibility: hidden;
      transition: all 0.3s ease;
    }
  </style>
</head>
<body>
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
            <div class="flex items-center"><i class="fas fa-phone-alt text-primary mr-2 text-xs"></i> +977-1-4544152</div>
            <div class="flex items-center"><i class="fab fa-whatsapp text-primary mr-2 text-xs"></i> +977 9851189771</div>
            <div class="flex items-center"><i class="fas fa-envelope text-primary mr-2 text-xs"></i> <a href="mailto:info@advadventures.com" class="hover:text-primary">info@advadventures.com</a></div>
          </address>
        </div>
      </div>

      <!-- Certifications -->
      <div class="border-t border-gray-700 pt-3 mb-3">
        <h3 class="text-white font-semibold mb-2 text-center">Certifications</h3>
        <div class="flex justify-center gap-4 flex-wrap">
          <img src="https://www.advadventures.com/dist/frontend1/assets/images/cert-excel17.png" alt="2017" class="h-10" />
          <img src="https://www.advadventures.com/dist/frontend1/assets/images/cert-excel18.png" alt="2018" class="h-10" />
          <img src="https://www.advadventures.com/dist/frontend1/assets/images/cert-excel19.png" alt="2019" class="h-10" />
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
        <p class="mt-2 text-center text-[11px]">Crafted with <span class="text-primary">♥</span> by <a href="https://www.cyberpirates.io" class="hover:text-primary">Cyber Pirates</a></p>
      </div>
    </div>

    <!-- Back to Top Button -->
    <button id="goToTop" class="fixed bottom-6 right-4 z-50 bg-primary text-white p-2 rounded-full shadow-lg hover:bg-primary-dark">
      <i class="fas fa-chevron-up text-xs"></i>
    </button>
  </footer>
</body>
</html>