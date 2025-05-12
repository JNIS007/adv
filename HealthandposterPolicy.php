<?php
$pageTitle = "Health & Porter Policy";
$relatedPages = [
  "Responsible Tourism in Nepal with Advanced Adventures" => "responsible-tourism.php",
  "Health & Porter Policy" => "#",
  "Education" => "education.php",
  "Social Awareness" => "social-awareness.php",
  "Wild Guide Nepal" => "wild-guide-nepal.php",
  "Employment" => "employment.php",
  "Wildlife Spotting" => "wildlife-spotting.php",
  "Learn Nepali Language" => "learn-nepali-language.php"
];
?>

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
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Advanced Adventures - Nepal Trekking & Tours</title>

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const dropdown = document.getElementById('countries-dropdown');
      const mainToggle = document.getElementById('main-toggle');

      mainToggle.addEventListener('mouseenter', () => {
        dropdown.classList.remove('hidden');
      });

      mainToggle.addEventListener('mouseleave', () => {
        setTimeout(() => {
          if (!mainToggle.matches(':hover') && !dropdown.matches(':hover')) {
            dropdown.classList.add('hidden');
          }
        }, 200);
      });

      dropdown.addEventListener('mouseleave', () => {
        setTimeout(() => {
          if (!mainToggle.matches(':hover') && !dropdown.matches(':hover')) {
            dropdown.classList.add('hidden');
          }
        }, 200);
      });

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
            'brand-green': '#2ecc71',
            'brand-blue': '#3498db',
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
          <a href="/page/booking.html" class="font-medium text-gray-700 transition hover:text-primary">Booking</a>
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
            class="bg-[#122747] hover:bg-[#122560] text-white px-4 py-2 rounded-md font-medium transition">
            Book Now
          </a>
        </nav>
      </div>
    </div>
  </header>
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

  <div class="container px-4 mx-auto mt-8">
    <div class="flex flex-col gap-8 md:flex-row">
      <!-- Main Content -->
      <div class="space-y-8 md:w-3/4">
        <h1 class="mb-6 text-4xl font-bold text-gray-900"><?php echo $pageTitle; ?></h1>

        <!-- Hero Image -->
        <div class="relative mb-8">
          <div class="absolute inset-0 rounded-lg opacity-50 bg-gradient-to-r from-green-200 via-blue-200 to-purple-200"></div>
          <div class="relative z-10 flex items-center justify-center p-12">
            <div class="p-6 bg-white rounded-lg shadow-lg bg-opacity-80">
              <h2 class="text-3xl font-bold text-center text-gray-800">
                Safety & Well Being, <br>
                Not an Issue Anymore...
              </h2>
            </div>
          </div>
          <div class="absolute inset-0 flex items-center justify-center">
            <svg class="w-full h-auto max-h-64" viewBox="0 0 500 300" xmlns="http://www.w3.org/2000/svg">
              <g transform="translate(250,150)">
                <ellipse rx="220" ry="130" fill="url(#gradient)" opacity="0.7" />
              </g>
              <defs>
                <radialGradient id="gradient">
                  <stop offset="0%" stop-color="#4caf50" stop-opacity="0.5" />
                  <stop offset="50%" stop-color="#2196f3" stop-opacity="0.5" />
                  <stop offset="100%" stop-color="#9c27b0" stop-opacity="0.5" />
                </radialGradient>
              </defs>
            </svg>
            <div class="absolute inset-0 flex items-center justify-center">
              <svg class="w-64 h-64" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                <g fill="none" stroke="#000" stroke-width="0.5" opacity="0.5">
                  <path d="M50 10 L40 40 L10 50 L40 60 L50 90 L60 60 L90 50 L60 40 Z" />
                  <g transform="translate(25,25) scale(0.5)">
                    <path d="M50 10 L40 40 L10 50 L40 60 L50 90 L60 60 L90 50 L60 40 Z" />
                  </g>
                </g>
              </svg>
            </div>
          </div>
        </div>

        <!-- Policy Content -->
        <div class="p-6 bg-white rounded-lg shadow-md">
          <h2 class="mb-4 text-2xl font-semibold text-gray-800">Our Inclination toward Guide and Porter</h2>
          <p class="mb-4 text-gray-600">
            We have recruited porters and guides from local communities as part of our commitment to social and economic development. We provide comprehensive training to our staff and trekkers, taking full responsibility for their well-being.
          </p>

          <div class="space-y-4">
            <h3 class="text-xl font-semibold text-green-700">Training Programs Include:</h3>
            <ul class="space-y-2 text-gray-600 list-disc list-inside">
              <li>Intensive Wilderness First Aid</li>
              <li>Trekking Guide Training</li>
              <li>Co-Trekking Workshop & Adventure Meet</li>
              <li>English and Other Major Languages</li>
              <li>Conservation & Biodiversity</li>
              <li>Rock & Ice Climbing & Mountaineering (for expedition leaders)</li>
            </ul>
          </div>

          <p class="mt-4 text-gray-600">
            We always respect our porters and their hard work. We believe in equality and mutual respect. Our guides and porters are essential to creating memorable trip experiences.
          </p>
        </div>

        <!-- Detailed Policy Sections -->
        <div class="p-6 bg-white rounded-lg shadow-md">
          <h2 class="mb-6 text-2xl font-semibold text-gray-800">Our Commitment to Guide and Porter Welfare</h2>

          <div class="space-y-6">
            <div>
              <h3 class="mb-3 text-xl font-semibold text-blue-700">Insurance</h3>
              <p class="text-gray-600">
                We have insured our porters to cover all costs and ensure their safety from potential injuries.
              </p>
            </div>

            <div>
              <h3 class="mb-3 text-xl font-semibold text-blue-700">Weight Limits</h3>
              <p class="text-gray-600">
                We never ask our porters to carry more than 30 kg, prioritizing their health and well-being.
              </p>
            </div>

            <div>
              <h3 class="mb-3 text-xl font-semibold text-blue-700">Health and Well-being</h3>
              <p class="text-gray-600">
                Our mission is to manage the health of our guides, porters, and guests. We encourage guests to inform guides if porters need any additional attention regarding health, food, or sleep during the trip.
              </p>
            </div>

            <div>
              <h3 class="mb-3 text-xl font-semibold text-blue-700">Environmental Awareness</h3>
              <p class="text-gray-600">
                We teach our team to be responsible for environmental policies during trips, emphasizing proper waste management and conservation.
              </p>
            </div>

            <div>
              <h3 class="mb-3 text-xl font-semibold text-blue-700">Essential Support</h3>
              <p class="text-gray-600">
                We provide our guides and porters with warm clothes, good shoes, necessary high-altitude trekking equipment, adequate shelter, food, drink, and fair wages.
              </p>
            </div>
          </div>
        </div>

        <!-- Ethical Standards -->
        <div class="p-6 bg-white rounded-lg shadow-md">
          <h2 class="mb-6 text-2xl font-semibold text-gray-800">Ethical Standards</h2>

          <div>
            <h3 class="mb-3 text-xl font-semibold text-red-700">Say No to Prostitution and Drugs</h3>
            <p class="mb-4 text-gray-600">
              We strongly prohibit prostitution for our clients while traveling. Prostitution is a fatal infringement of human rights. We are aware that many women and children are exploited and forced into dangerous situations.
            </p>
            <p class="text-gray-600">
              Illegal drugs are strictly restricted. Failure to follow our basic rules and regulations will result in expulsion from the group.
            </p>
          </div>
        </div>

        <!-- Community Initiatives -->
        <div class="p-6 bg-white rounded-lg shadow-md">
          <h2 class="mb-6 text-2xl font-semibold text-gray-800">Community Health Initiatives</h2>

          <p class="mb-4 text-gray-600">
            Nepal's remote regions face significant challenges due to tough geographical conditions and lack of education, particularly in healthcare access. Many areas lack basic health services, leading to preventable health issues and even fatalities.
          </p>

          <div class="space-y-4">
            <div>
              <h3 class="mb-3 text-xl font-semibold text-green-700">Current Achievements</h3>
              <p class="text-gray-600">
                Collaborating with Pioneer Foundation Nepal, we have conducted health-related activities in remote Gorkha villages. During a free health camp in Bungkot, over 1000 villagers received free medical treatment.
              </p>
            </div>

            <div>
              <h3 class="mb-3 text-xl font-semibold text-green-700">Past Initiatives</h3>
              <p class="text-gray-600">
                In 2012, we prioritized sanitation by constructing toilets at Chundevi Primary School in Lalitpur.
              </p>
            </div>

            <div>
              <h3 class="mb-3 text-xl font-semibold text-green-700">Future Plans</h3>
              <p class="text-gray-600">
                We plan to:
                - Conduct free health camps in quake-affected villages of Central Nepal
                - Provide free health orientations in remote villages
                - Raise funds and skills to rebuild grounded health posts
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
            <p class="mt-2 text-gray-600">Stay updated with our latest offers and responsible tourism initiatives</p>
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
    href="https://wa.me/yourphonenumber"
    target="_blank"
    class="flex items-center justify-center w-16 h-16 text-white transition duration-300 bg-green-500 rounded-full shadow-lg whatsapp-float hover:bg-green-600">
    <i class="text-3xl fab fa-whatsapp"></i>
  </a>
</body>

</html>