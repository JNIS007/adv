<?php
$pageTitle = "Responsible Tourism in Nepal with Advanced Adventures";
$relatedPages = [
  "Responsible Tourism in Nepal with Advanced Adventures" => "#",
  "Health & Safety Policy" => "health-safety-policy.php",
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
          <span class="text-gray-500">Responsible Tourism</span>
        </li>
      </ol>
    </nav>
  </div>

  <div class="container px-4 mx-auto mt-8">
    <div class="flex flex-col gap-8 md:flex-row">
      <!-- Main Content -->
      <div class="space-y-8 md:w-3/4">
        <h1 class="mb-6 text-3xl font-bold text-gray-900"><?php echo $pageTitle; ?></h1>

        <!-- Feature Image -->
        <div class="mb-8">
          <img src="https://th.bing.com/th/id/OIP.-CyK0DCi0ok6863HnLmlSAHaEK?cb=iwc2&rs=1&pid=ImgDetMain" alt="Travelers engaging with local guides and community members in Nepal" class="object-cover w-full h-auto rounded-lg shadow-lg">
        </div>

        <!-- Advanced Adventures Nepal: Travel with Purpose -->
        <div class="p-6 bg-white rounded-lg shadow-md">
          <h2 class="mb-4 text-2xl font-semibold text-gray-800">Advanced Adventures Nepal: Travel with Purpose</h2>
          <p class="mb-4 text-gray-600">At Advanced Adventures Nepal, we believe that travel has the power to transform lives—not just for those who journey, but for the communities and environments they encounter. We are passionate about responsible tourism, a philosophy that guides every step we take.</p>
          <p class="text-gray-600">As guests in the regions we explore, we strive to tread lightly, leaving behind only positive impacts and meaningful connections.</p>
        </div>

        <!-- Our Commitments -->
        <div class="p-6 bg-white rounded-lg shadow-md">
          <h2 class="mb-6 text-2xl font-semibold text-gray-800">Our Commitments</h2>

          <div class="space-y-4">
            <div>
              <h3 class="flex items-center text-xl font-semibold text-green-700">
                <i class="mr-3 fas fa-shield-alt"></i>Porter Welfare
              </h3>
              <p class="ml-8 text-gray-600">The health and safety of our porters are non-negotiable. We adhere to the International Porter Protection Guidelines (IPPG) and support initiatives like the Lukla Porter Clothing Bank.</p>
            </div>

            <div>
              <h3 class="flex items-center text-xl font-semibold text-green-700">
                <i class="mr-3 fas fa-leaf"></i>Carbon Neutrality
              </h3>
              <p class="ml-8 text-gray-600">We are dedicated to combating climate change by offsetting our annual carbon emissions through impactful projects across Nepal.</p>
            </div>

            <div>
              <h3 class="flex items-center text-xl font-semibold text-green-700">
                <i class="mr-3 fas fa-handshake"></i>Cultural Exchange
              </h3>
              <p class="ml-8 text-gray-600">We believe travel is a bridge between cultures. Our guides foster meaningful connections through engaging, on-the-ground discussions.</p>
            </div>
          </div>
        </div>

        <!-- Your Role in Responsible Travel -->
        <div class="p-6 bg-white rounded-lg shadow-md">
          <h2 class="mb-6 text-2xl font-semibold text-gray-800">Your Role in Responsible Travel</h2>

          <div class="space-y-6">
            <div>
              <h3 class="mb-4 text-xl font-semibold text-blue-700">Supporting Local Economies</h3>
              <ul class="space-y-2 text-gray-600 list-disc list-inside">
                <li>Shop local and support traditional artisans</li>
                <li>Practice fair and respectful tipping</li>
                <li>Engage in mindful bargaining</li>
                <li>Support local charities instead of giving directly to individuals</li>
              </ul>
            </div>

            <div>
              <h3 class="mb-4 text-xl font-semibold text-blue-700">Cultural Awareness</h3>
              <ul class="space-y-2 text-gray-600 list-disc list-inside">
                <li>Learn a few words of Nepali</li>
                <li>Ask permission before taking photos</li>
                <li>Dress conservatively, especially at religious sites</li>
                <li>Respect local customs and social norms</li>
              </ul>
            </div>

            <div>
              <h3 class="mb-4 text-xl font-semibold text-blue-700">Environmental Respect</h3>
              <ul class="space-y-2 text-gray-600 list-disc list-inside">
                <li>Observe wildlife responsibly</li>
                <li>Minimize plastic usage</li>
                <li>Conserve water</li>
                <li>Practice 'Leave No Trace' principles</li>
                <li>Consider carbon offset programs</li>
              </ul>
            </div>
          </div>
        </div>

        <!-- Call to Action -->
        <div class="p-6 text-center bg-green-100 rounded-lg">
          <h2 class="mb-4 text-2xl font-bold text-green-900">Join Us in Making a Difference</h2>
          <p class="mb-6 text-green-800">Together, we can guide Nepal's travel industry towards sustainable, earth-friendly experiences that create a lasting positive impact.</p>
          <a href="#" class="px-6 py-3 text-white transition duration-300 bg-green-600 rounded-full hover:bg-green-700">
            Explore Responsible Tours
          </a>
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