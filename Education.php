<!DOCTYPE html>
<?php
$pageTitle = "Education";
$organizationName = "Advanced Adventures";
$partnerOrganization = "Pioneer Foundation Nepal";

$relatedPages = [
  "Responsible Tourism in Nepal with Advanced Adventures" => "responsible-tourism.php",
  "Health & Porter Policy" => "health-porter-policy.php",
  "Education" => "#",
  "Social Awareness" => "social-awareness.php",
  "Wild Guide Nepal" => "wild-guide-nepal.php",
  "Employment" => "employment.php",
  "Wildlife Spotting" => "wildlife-spotting.php",
  "Learn Nepali Language" => "learn-nepali-language.php"
];
?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo htmlspecialchars($pageTitle); ?> | <?php echo htmlspecialchars($organizationName); ?></title>

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

  <!-- Breadcrumb -->
  <div class="container px-4 py-4 mx-auto">
    <nav aria-label="breadcrumb" class="text-sm text-gray-600">
      <ol class="flex items-center space-x-2">
        <li><a href="index.php" class="hover:text-blue-600"><i class="fas fa-home"></i></a></li>
        <li class="flex items-center space-x-2">
          <span class="mx-2">/</span>
          <span class="text-gray-500"><?php echo $pageTitle; ?></span>
        </li>
      </ol>
    </nav>
  </div>

  <!-- Main Content -->
  <div class="container px-4 mx-auto mt-8">
    <div class="flex flex-col gap-8 md:flex-row">
      <!-- Main Content Area -->
      <div class="space-y-8 md:w-3/4">
        <h1 class="mb-6 text-4xl font-bold text-gray-900"><?php echo $pageTitle; ?></h1>

        <!-- Hero Section -->
        <div class="mb-8">
          <img src="https://th.bing.com/th/id/OIP.-CyK0DCi0ok6863HnLmlSAHaEK?cb=iwc2&rs=1&pid=ImgDetMain" alt="Travelers engaging with local guides and community members in Nepal" class="object-cover w-full h-auto rounded-lg shadow-lg">
        </div>

        <!-- Education Mission -->
        <div class="p-6 bg-white rounded-lg shadow-md">
          <h2 class="mb-4 text-2xl font-semibold text-gray-800">Our Educational Mission</h2>
          <p class="mb-4 text-gray-600">
            We are always pushing toward the progress, prosperity and success of our clients.
            We don't want only business rather a need the progress of society and our clients.
            <?php echo htmlspecialchars($organizationName); ?> is seeking the way to provide
            better education in the community.
          </p>

          <div class="space-y-4">
            <h3 class="text-xl font-semibold text-green-700">Our Key Focus Areas:</h3>
            <ul class="space-y-2 text-gray-600 list-disc list-inside">
              <li>Supporting underprivileged children's education</li>
              <li>Providing scholarships and educational resources</li>
              <li>Promoting literacy in rural communities</li>
              <li>Offering educational infrastructure support</li>
              <li>Empowering communities through knowledge</li>
            </ul>
          </div>
        </div>

        <!-- Community Educational Initiatives -->
        <div class="p-6 bg-white rounded-lg shadow-md">
          <h2 class="mb-6 text-2xl font-semibold text-gray-800">Community Educational Initiatives</h2>

          <p class="mb-4 text-gray-600">
            Nepal's remote regions face significant challenges in education due to tough geographical conditions
            and lack of resources. Many areas lack basic educational services, leading to limited opportunities
            for children.
          </p>

          <div class="space-y-4">
            <div>
              <h3 class="mb-3 text-xl font-semibold text-blue-700">Current Achievements</h3>
              <p class="text-gray-600">
                In collaboration with <?php echo htmlspecialchars($partnerOrganization); ?>,
                we have conducted educational support activities in remote Gorkha villages.
                We have sponsored school fees for multiple children and provided essential
                educational resources.
              </p>
            </div>

            <div>
              <h3 class="mb-3 text-xl font-semibold text-blue-700">Past Initiatives</h3>
              <p class="text-gray-600">
                In 2012, we prioritized education by supporting the infrastructure of Chundevi
                Primary School in Lalitpur, providing necessary educational materials and support.
              </p>
            </div>

            <div>
              <h3 class="mb-3 text-xl font-semibold text-blue-700">Future Plans</h3>
              <p class="text-gray-600">
                We plan to:
                - Conduct educational support programs in remote villages
                - Provide scholarships to underprivileged children
                - Improve educational infrastructure in rural areas
              </p>
            </div>
          </div>
        </div>
      </div>

      <!-- Sidebar -->
      <div class="relative md:w-1/4 top-24">
        <div class="sticky p-6 bg-white rounded-lg shadow-md top-24">
          <h4 class="mb-4 text-xl font-semibold text-gray-800">Related Pages</h4>
          <ul class="space-y-2">
            <?php foreach ($relatedPages as $title => $link): ?>
              <li>
                <a href="<?php echo $link; ?>" class="text-blue-600 hover:text-blue-800 hover:underline">
                  <?php echo $title; ?>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <!-- Newsletter Signup -->
  <div class="py-12 mt-8 bg-gray-100">
    <div class="container px-4 mx-auto">
      <div class="max-w-4xl p-8 mx-auto bg-white rounded-lg shadow-md">
        <div class="flex flex-col items-center justify-between md:flex-row">
          <div class="mb-4 md:mb-0 md:mr-6">
            <h3 class="text-2xl font-bold text-gray-800">Sign Up for Special Deals & Discounts</h3>
            <p class="mt-2 text-gray-600">Stay updated with our latest offers and educational initiatives</p>
          </div>
          <form class="flex w-full md:w-auto" action="subscribe.php" method="post">
            <input
              type="email"
              placeholder="Enter your email address"
              class="flex-grow px-4 py-2 border border-gray-300 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
              required>
            <button
              type="submit"
              class="px-6 py-2 text-white transition duration-300 bg-blue-600 rounded-r-lg hover:bg-blue-700">
              Subscribe
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- WhatsApp Float Button -->
  <a
    href="https://wa.me/9779851189771"
    target="_blank"
    class="flex items-center justify-center w-16 h-16 text-white transition duration-300 bg-green-500 rounded-full shadow-lg whatsapp-float hover:bg-green-600">
    <i class="text-3xl fab fa-whatsapp"></i>
  </a>
</body>

</html>