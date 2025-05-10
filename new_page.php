<?php
$i = 1;
include("./admin/includes/config.php");
$id = $_GET['id'];
if ($id == '') {
  header('location:https://www.dotweb.com.np/advadventure/adv/index.php');
} else {
  $query = mysqli_query($con, "SELECT * FROM tblposts WHERE Is_Active = 1 and id='$id'");
  $row = mysqli_fetch_array($query);

  $q = "SELECT * FROM other WHERE P_id='$id' and is_active = 1 ";
  $result = mysqli_query($con, $q);


  $roo = mysqli_fetch_assoc($result);



  $itineraryText = $roo["Detailed_Itinerary"];
  $inputString = $roo["Useful_Information"];
  $inc = $roo["Inc"];
  $exe = $roo["Exc"];
  $altitudeDataJson = $roo["chart_data"]; // Your JSON string: '[{"outline":"Day 01","height":"1350"},{"outline":"Day 04","height":"1560"}]'
  $Important_Note = $roo["Important_Note"];
  $Recommended_Package = $roo["Recommended_Package"];
  // Decode the JSON data
  $altitudeData = json_decode($altitudeDataJson, true);

  // Prepare arrays for Chart.js
  $labels = [];
  $dataPoints = [];
  $dayDetails = [];

  foreach ($altitudeData as $item) {
    $labels[] = $item['outline'];
    $dataPoints[] = (int) $item['height'];
    $dayDetails[] = $item['outline'] . " - " . $item['height'] . "m";
  }

  // Fill in missing days with null values (if needed)
  $completeLabels = [];
  $completeData = [];
  $completeDetails = [];

  for ($i = 1; $i <= count($altitudeData); $i++) {
    $dayStr = 'Day ' . str_pad($i, 2, '0', STR_PAD_LEFT);
    $completeLabels[] = $dayStr;

    $found = false;
    foreach ($altitudeData as $item) {
      if ($item['outline'] === $dayStr) {
        $completeData[] = (int) $item['height'];
        $completeDetails[] = $item['outline'] . " - " . $item['height'] . "m";
        $found = true;
        break;
      }
    }

    if (!$found) {
      $completeData[] = null;
      $completeDetails[] = $dayStr . " - No data";
    }
  }

  $it = explode('|', $inc);

  $exit = explode('|', $exe);

  $items = explode('|', $inputString);

  $smtrek = explode('|', $Recommended_Package);

  // Trim whitespace from each item and create an associative array
  $result = [];
  foreach ($items as $item) {
    $item = trim($item);
    if (!empty($item)) {
      // Split each item into key-value pairs
      $parts = explode(':', $item, 2);
      if (count($parts) === 2) {
        $key = trim($parts[0]);
        $value = trim($parts[1]);
        $result[$key] = $value;
      }
    }
  }


  $tripFacts = [];

  // Split by pipe
  $components = explode('|', $Important_Note);

  foreach ($components as $component) {
    $component = trim($component);
    if (strpos($component, ':') !== false) {
      list($key, $value) = explode(':', $component, 2);
      $tripFacts[trim($key)] = trim($value);
    }
  }









  // Display the results
// echo "<ul>";
// foreach ($result as $key => $value) {
//     echo "<li><strong>$key:</strong> $value</li>";
// }
// echo "</ul>";

  // Parse the text into structured days
  // Parse itinerary text with pipe delimiter
  $days = [];
  if (!empty($itineraryText)) {
    // Split by day delimiter (assuming each day starts with "Day XX:")
    $dayEntries = preg_split('/(?=Day \d{2}:)/', $itineraryText, -1, PREG_SPLIT_NO_EMPTY);

    foreach ($dayEntries as $dayEntry) {
      // Split the day entry into components using pipe delimiter
      $components = explode('|', $dayEntry);

      // Initialize day array
      $day = [
        'day' => '',
        'title' => '',
        'altitude' => '',
        'meals' => '',
        'description' => ''
      ];

      // Process each component
      foreach ($components as $component) {
        $component = trim($component);

        if (preg_match('/^Day (\d{2}):(.+)$/', $component, $dayMatch)) {
          $day['day'] = trim($dayMatch[1]);
          $day['title'] = trim($dayMatch[2]);
        } elseif (preg_match('/^Altitude:(.+)$/', $component, $altMatch)) {
          $day['altitude'] = trim($altMatch[1]);
        } elseif (preg_match('/^Meals:(.+)$/', $component, $mealsMatch)) {
          $day['meals'] = trim($mealsMatch[1]);
        } elseif (preg_match('/^Description:(.+)$/', $component, $descMatch)) {
          $day['description'] = trim($descMatch[1]);
        }
      }

      // Only add if we have at least a day number and title
      if (!empty($day['day']) && !empty($day['title'])) {
        $days[] = $day;
      }
    }
  }

  // Display the formatted output
// foreach ($days as $day) {
//     echo "<div class='itinerary-day'>";
//     echo "<h3>Day {$day['day']}: {$day['title']}</h3>";
//     echo "<p><strong>Altitude:</strong> {$day['altitude']}</p>";
//     echo "<p><strong>Meals:</strong> {$day['meals']}</p>";
//     echo "<p><strong>Description:</strong> {$day['description']}</p>";
//     echo "</div><br>";
// }
  $data = 1;
  $qaText = $roo["faq"];
  $qaPairs = preg_split('/(?<=\.)\s+(?=Q:)/', $qaText);

  $formattedQA = [];
  foreach ($qaPairs as $pair) {
    if (preg_match('/Q:\s*(.*?)\s*A:\s*(.*)/', $pair, $matches)) {
      $formattedQA[] = [
        'question' => trim($matches[1]),
        'answer' => trim($matches[2])
      ];
    }
  }

  // Display the formatted Q&A
// foreach ($formattedQA as $qa) {
//     echo '<div class="qa-item">';
//     echo '  <div class="question font-bold text-blue-600">Q: ' . htmlspecialchars($qa['question']) . '</div>';
//     echo '  <div class="answer text-gray-700 mt-2">A: ' . htmlspecialchars($qa['answer']) . '</div>';
//     echo '</div>';
//     echo '<hr class="my-4">';
// }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nepal, Tibet & Bhutan Introduction Tour - 12 Days | Advanced Adventures</title>

  <!-- External Dependencies -->
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <!-- Tailwind Config -->
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: '#1a365d',
            secondary: '#c2410c',
            'accent-blue': '#005FAB'
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

  <!-- Custom Styles -->
  <style>
    /* Gradient Background Animation */
    @keyframes gradient-bg {
      0% {
        background: linear-gradient(45deg, #ff7e5f, #feb47b);
        /* Red to Orange */
      }

      25% {
        background: linear-gradient(45deg, #11c5cb, #2575fc);
        /* Purple to Blue */
      }

      50% {
        background: linear-gradient(45deg, #00b09b, #96c93d);
        /* Teal to Green */
      }

      75% {
        background: linear-gradient(45deg, #ff9a8b, #ff6a00);
        /* Pink to Red */
      }

      100% {
        background: linear-gradient(45deg, #ff7e5f, #feb47b);
        /* Red to Orange */
      }
    }

    /* Applying the gradient animation to the badges */
    .animate-gradient-bg {
      animation: gradient-bg 6s ease infinite;
    }

    /* Optional: Text and icon color transition to match gradient */
    .animate-gradient-bg a .flex .text-[#005FAB] {
      color: #fff;
      transition: color 0.5s ease;
    }

    .animate-gradient-bg a:hover .flex .text-[#005FAB] {
      color: #000;
    }

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

    .hover\:scale-105:hover {
      transform: scale(1.05);
    }

    .transition-transform {
      transition: transform 0.3s ease;
    }
  </style>
</head>

<body class="font-sans antialiased bg-gray-50">
  <!-- Top Info Bar -->
  <div class="bg-gray-800 text-white text-sm py-2">
    <div class="container mx-auto px-4 flex justify-between items-center">
      <span><i class="fas fa-medal mr-1"></i> 15 Years Experience</span>
      <div class="flex items-center space-x-4">
        <span><span class="font-bold text-yellow-400"><i class="fas fa-headset mr-1"></i> Talk to Expert</span>
          <i class="fas fa-phone-alt mr-1"></i> +977-9851189771</span>
        <a href="https://wa.me/9779851189771" target="_blank"
          class="fixed right-6 bottom-6 z-50 w-14 h-14 bg-[#25D366] rounded-full flex items-center justify-center shadow-lg hover:scale-110 transition-transform">
          <i class="fab fa-whatsapp text-white text-3xl"></i>
        </a>
      </div>
    </div>
  </div>

  <!-- Main Header -->
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
          <button class="p-2 text-gray-600 hover:text-primary">
            <i class="fas fa-search"></i>
          </button>
          <a href="/page/book-your-trip.html"
            class="bg-primary hover:bg-[#122747] text-white px-4 py-2 rounded-md font-medium transition">Enquiry</a>
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
          <img src="assets/logo.png" alt="Advanced Adventures" class="h-10">
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
              class="block w-full bg-primary hover:bg-[#122747] text-white text-center px-4 py-2 rounded-md font-medium">Enquiry</a>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content Container -->
  <div class="flex flex-col md:flex-row gap-8 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Main Content (3/4 width) -->
    <main class="w-full md:w-3/4">
      <!-- Featured Image -->
      <div class="mb-8 rounded-xl overflow-hidden shadow-lg">
        <img src='./admin/postimages/<?php echo $row['PostImage']; ?>' alt="Nepal, Tibet & Bhutan Introduction Tour"
          class="w-full h-96 object-cover">
      </div>

      <!-- Breadcrumb -->
      <div class="text-sm text-gray-600 py-2">
        Home - Nepal - <?php echo $row["PostTitle"] ?>
      </div>

      <!-- Title Section -->
      <div class="mb-6">
        <h1 class="text-3xl font-bold text-accent-blue"><?php echo $row["PostTitle"] ?> – <?php echo $row["Days"] ?>
          Days
        </h1>
        <p class="text-yellow-600 font-medium mt-1">★★★★★ 140 reviews on TripAdvisor | Recommended by 99% of travelers
        </p>
      </div>

      <!-- Sticky Navigation -->
      <div class="sticky top-28 z-40 bg-white shadow-md py-2 mb-8">
        <div class="max-w-7xl mx-auto px-4 flex overflow-x-auto space-x-6">
          <a href="#facts" class="text-blue-600 font-semibold hover:text-secondary">Trip Facts</a>
          <a href="#overview" class="text-blue-600 font-semibold hover:text-secondary">Overview</a>
          <a href="#itinerary" class="text-blue-600 font-semibold hover:text-secondary">Itinerary</a>
          <a href="#includes" class="text-blue-600 font-semibold hover:text-secondary">Includes/Exclude</a>
          <a href="#info" class="text-blue-600 font-semibold hover:text-secondary">Useful Info</a>
          <a href="#faqs" class="text-blue-600 font-semibold hover:text-secondary">FAQs</a>
          <a href="#reviews" class="text-blue-600 font-semibold hover:text-secondary">Reviews</a>
        </div>
      </div>

      <!-- Trip Facts Section -->
      <section id="facts" class="bg-blue-50 p-8 rounded-xl shadow-lg mb-10">
        <h2 class="text-3xl font-bold text-accent-blue mb-8 border-b-2 border-accent-blue pb-4">Trip Facts</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
          <?php foreach ($tripFacts as $label => $value): ?>
            <div class="flex items-start space-x-4">
              <div class="w-8 mt-1 text-accent-blue">
                <!-- Optional: Add icon logic based on $label if needed -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                  stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5z" />
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                </svg>
              </div>
              <div>
                <h3 class="font-semibold text-lg mb-1"><?= htmlspecialchars($label) ?></h3>
                <p class="text-gray-700"><?= htmlspecialchars($value) ?></p>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </section>

      <!-- Trip Overview Section -->
      <section id="overview" class="bg-blue-50 p-8 rounded-xl shadow-lg mb-10">
        <h2 class="text-3xl font-bold text-accent-blue mb-8 border-b-2 border-accent-blue pb-4">Trip Overview</h2>
        <div class="space-y-6 text-gray-700 leading-relaxed">
          <p>
            <?php echo $row["PostDetails"]; ?>
          </p>
          <div class="bg-white/70 p-6 rounded-lg border-l-4 border-accent-blue">
            <h3 class="text-xl font-semibold mb-4 text-accent-blue">Key Highlights</h3>
            <ul class="space-y-2">
              <?php foreach ($result as $key => $value) { ?>
                <li class="flex items-start space-x-2">
                  <svg class="w-5 mt-1 text-accent-blue" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                  <span><?php echo "<strong>$key:</strong> $value"; ?></span>
                </li>
              <?php } ?>
            </ul>
          </div>
        </div>
      </section>

      <!-- Continue with all other sections (Itinerary, Includes/Excludes, etc.) following the same pattern -->
      <!-- ... [Remaining content sections would follow here with identical structure] ... -->

      <!-- Compact Short Itinerary -->
      <section class="bg-blue-50 p-6 rounded-xl shadow-sm mb-8">
        <h2 class="text-3xl font-bold text-[#005FAB] mb-6 border-b-2 border-[#005FAB] pb-4">Short Itinerary</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
          <!-- Day Items -->
          <?php foreach ($days as $day) {
            ?>
            <div class="bg-white/90 p-4 rounded-lg shadow-sm hover:shadow-md transition-shadow">
              <div class="flex items-start gap-3">
                <div class="bg-[#005FAB] text-white w-8 h-8 rounded-full flex items-center justify-center shrink-0">
                  <?php echo $day['day']; ?>
                </div>
                <div>
                  <h3 class="font-semibold text-gray-800 mb-1"><?php echo $day['title']; ?></h3>
                </div>
              </div>
            </div>
          <?php } ?>
          <!-- <div class="bg-white/90 p-4 rounded-lg shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-start gap-3">
              <div class="bg-[#005FAB] text-white w-8 h-8 rounded-full flex items-center justify-center shrink-0">2
              </div>
              <div>
                <h3 class="font-semibold text-gray-800 mb-1">Kathmandu Heritage Tour</h3>
                <p class="text-sm text-gray-600">4 UNESCO World Heritage Sites</p>
              </div>
            </div>
          </div>

          <div class="bg-white/90 p-4 rounded-lg shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-start gap-3">
              <div class="bg-[#005FAB] text-white w-8 h-8 rounded-full flex items-center justify-center shrink-0">3
              </div>
              <div>
                <h3 class="font-semibold text-gray-800 mb-1">Bhaktapur & Nagarkot</h3>
                <p class="text-sm text-gray-600">Cultural exploration + mountain views</p>
              </div>
            </div>
          </div>

          <div class="bg-white/90 p-4 rounded-lg shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-start gap-3">
              <div class="bg-[#005FAB] text-white w-8 h-8 rounded-full flex items-center justify-center shrink-0">4
              </div>
              <div>
                <h3 class="font-semibold text-gray-800 mb-1">Nagarkot Sunrise & Patan</h3>
                <p class="text-sm text-gray-600">Panoramic Himalayan views</p>
              </div>
            </div>
          </div>

          <div class="bg-white/90 p-4 rounded-lg shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-start gap-3">
              <div class="bg-[#005FAB] text-white w-8 h-8 rounded-full flex items-center justify-center shrink-0">5
              </div>
              <div>
                <h3 class="font-semibold text-gray-800 mb-1">Fly to Lhasa</h3>
                <p class="text-sm text-gray-600">1.5hr flight • Altitude: 3650m/11,980ft</p>
              </div>
            </div>
          </div>

          <div class="bg-white/90 p-4 rounded-lg shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-start gap-3">
              <div class="bg-[#005FAB] text-white w-8 h-8 rounded-full flex items-center justify-center shrink-0">6
              </div>
              <div>
                <h3 class="font-semibold text-gray-800 mb-1">Lhasa Highlights</h3>
                <p class="text-sm text-gray-600">Potala Palace & Barkhor Street</p>
              </div>
            </div>
          </div>

          <div class="bg-white/90 p-4 rounded-lg shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-start gap-3">
              <div class="bg-[#005FAB] text-white w-8 h-8 rounded-full flex items-center justify-center shrink-0">7
              </div>
              <div>
                <h3 class="font-semibold text-gray-800 mb-1">Monastery Visits</h3>
                <p class="text-sm text-gray-600">Drepung & Sera Monasteries</p>
              </div>
            </div>
          </div>

          <div class="bg-white/90 p-4 rounded-lg shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-start gap-3">
              <div class="bg-[#005FAB] text-white w-8 h-8 rounded-full flex items-center justify-center shrink-0">8
              </div>
              <div>
                <h3 class="font-semibold text-gray-800 mb-1">Return to Kathmandu</h3>
                <p class="text-sm text-gray-600">1.5hr flight • Free evening</p>
              </div>
            </div>
          </div>

          <div class="bg-white/90 p-4 rounded-lg shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-start gap-3">
              <div class="bg-[#005FAB] text-white w-8 h-8 rounded-full flex items-center justify-center shrink-0">9
              </div>
              <div>
                <h3 class="font-semibold text-gray-800 mb-1">Fly to Bhutan</h3>
                <p class="text-sm text-gray-600">Thimphu sightseeing</p>
              </div>
            </div>
          </div>

          <div class="bg-white/90 p-4 rounded-lg shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-start gap-3">
              <div class="bg-[#005FAB] text-white w-8 h-8 rounded-full flex items-center justify-center shrink-0">10
              </div>
              <div>
                <h3 class="font-semibold text-gray-800 mb-1">Thimphu to Paro</h3>
                <p class="text-sm text-gray-600">Cultural immersion day</p>
              </div>
            </div>
          </div>

          <div class="bg-white/90 p-4 rounded-lg shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-start gap-3">
              <div class="bg-[#005FAB] text-white w-8 h-8 rounded-full flex items-center justify-center shrink-0">11
              </div>
              <div>
                <h3 class="font-semibold text-gray-800 mb-1">Tiger's Nest Hike</h3>
                <p class="text-sm text-gray-600">5-6hr hike • 3180m/10,430ft</p>
              </div>
            </div>
          </div>

          <div class="bg-white/90 p-4 rounded-lg shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-start gap-3">
              <div class="bg-[#005FAB] text-white w-8 h-8 rounded-full flex items-center justify-center shrink-0">12
              </div>
              <div>
                <h3 class="font-semibold text-gray-800 mb-1">Departure</h3>
                <p class="text-sm text-gray-600">Transfer to Paro Airport</p>
              </div>
            </div>
          </div>
        </div> -->
      </section>


      <!-- Detailed Itinerary -->
      <section class="bg-blue-50 p-6 rounded-xl shadow-sm mb-8">
        <h2 class="text-3xl font-bold text-[#005FAB] mb-8 border-b-2 border-[#005FAB] pb-4">Detailed Itinerary</h2>
        <div class="space-y-6 text-gray-700 leading-relaxed">
          <div x-data="{ selected: null }" class="space-y-4">

            <!-- Day 01 -->
            <?php
            foreach ($days as $day) {
              ?>
              <div class="border border-gray-200 rounded-lg">
                <button @click="selected !== <?php echo $i; ?> ? selected = <?php echo $i; ?> : selected = null"
                  class="w-full text-left px-4 py-3 flex justify-between items-center font-semibold text-black">
                  <span><strong>Day <?php echo $day['day']; ?>:</strong> <?php echo $day['title']; ?></span>
                  <span x-show="selected !== <?php echo $i; ?>">+</span>
                  <span x-show="selected === <?php echo $i; ?>">−</span>
                </button>
                <div x-show="selected === <?php echo $i; ?>" x-collapse class="px-4 pb-4 text-black">
                  <p><strong>Altitude:</strong> <?php echo $day['altitude']; ?></p>
                  <p><strong>Meals:</strong> <?php echo $day['meals']; ?></p>
                  <br>
                  <p><?php echo $day['description']; ?></p>
                </div>
              </div>
              <?php
              $i++;
            } ?>
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
            labels: <?php echo json_encode($completeLabels); ?>,
            datasets: [{
              label: 'Altitude (m)',
              data: <?php echo json_encode($completeData); ?>,
              backgroundColor: 'rgba(0, 95, 171, 0.2)',
              borderColor: 'rgba(0, 95, 171, 1)',
              borderWidth: 2,
              pointBackgroundColor: 'rgba(0, 95, 171, 1)',
              pointRadius: 5,
              tension: 0.3,
              fill: true,
            }]
          },
          options: {
            responsive: true,
            plugins: {
              tooltip: {
                backgroundColor: '#ffffff',
                titleColor: '#005FAB',
                bodyColor: '#333333',
                font: {
                  size: 14,
                  family: 'Arial, sans-serif',
                  weight: 'bold'
                },
                callbacks: {
                  title: function (context) {
                    return context[0].label;
                  },
                  label: function (context) {
                    const dayDetails = <?php echo json_encode($completeDetails); ?>;
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
                    size: 16,
                    family: 'Arial, sans-serif',
                    weight: 'bold'
                  },
                  color: '#005FAB'
                },
                ticks: {
                  font: {
                    size: 14,
                    family: 'Arial, sans-serif',
                    weight: 'normal'
                  },
                  color: '#333333'
                }
              },
              x: {
                title: {
                  display: true,
                  text: 'Days',
                  font: {
                    size: 16,
                    family: 'Arial, sans-serif',
                    weight: 'bold'
                  },
                  color: '#005FAB'
                },
                ticks: {
                  font: {
                    size: 14,
                    family: 'Arial, sans-serif',
                    weight: 'normal'
                  },
                  color: '#333333'
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
          <?php
          foreach ($it as $itm) {
            $cleanItem = trim($itm);

            ?>

          <li class="flex items-center space-x-2">
            <span class="w-2.5 h-2.5 bg-blue-500 rounded-full"></span>
            <?php if (!empty($cleanItem)) {
              echo "<span>{$cleanItem}</span>";
            } ?>
          </li>
          <?php } ?>
        </ul>
      </section>

      <section class="bg-blue-50 p-6 rounded-xl shadow-lg mt-8">
        <h2 class="text-3xl font-bold text-gray-800 mb-6 border-b-2 pb-2">What's Not Included?</h2>
        <ul class="list-disc pl-6 space-y-4 text-gray-700">
          <?php
          foreach ($exit as $itmm) {
            $cleanItem = trim($itmm);

            ?>
          <li class="flex items-center space-x-2">
            <span class="w-2.5 h-2.5 bg-red-500 rounded-full"></span>
            <?php if (!empty($cleanItem)) {
              echo "<span>{$cleanItem}</span>";
            } ?>
          </li>

          <?php } ?>
        </ul>
      </section>


      <!----------------------Departure Dates And Price------------------------->
      <section id="departures" class="bg-blue-50 p-6 rounded-xl shadow-lg mt-8">
        <h2 class="text-3xl font-bold text-gray-800 mb-6">
          <?php echo $row["PostTitle"] ?>
        </h2>

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
              <label for="year" class="block text-sm font-medium text-gray-800 mb-1">Start Date</label>
              <input type="date" id="year" class="w-full p-2 border rounded-md bg-white">

              </input>
            </div>
            <div>
              <label for="month" class="block text-sm font-medium text-gray-800 mb-1">End Date</label>
              <input type="date" id="month" class="w-full p-2 border rounded-md bg-white">

              </input>
            </div>
          </div>

          <div class="overflow-x-auto">
            <table class="min-w-full text-left bg-white rounded-lg overflow-hidden border border-gray-200">
              <thead class="bg-primary text-white">
                <tr>
                  <th class="px-4 py-3">Trip Starts</th>
                  <th class="px-4 py-3">Trip Ends</th>
                  <th class="px-4 py-3">Price Per Person</th>
                  <th class="px-4 py-3">Status</th>
                  <th class="px-4 py-3">Book Now</th>
                </tr>
              </thead>
              <tbody>
                <tr class="border-t">
                  <td class="px-4 py-3">01 Jan 2025</td>
                  <td class="px-4 py-3">14 Jan 2025</td>
                  <td class="px-4 py-3">USD 1000</td>
                  <td class="px-4 py-3 text-green-600 font-semibold">Available</td>
                  <td class="px-4 py-3">
                    <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md">Book Now</button>
                  </td>
                </tr>
                <tr class="border-t">
                  <td class="px-4 py-3">15 Jan 2025</td>
                  <td class="px-4 py-3">28 Jan 2025</td>
                  <td class="px-4 py-3">USD 1200</td>
                  <td class="px-4 py-3 text-green-600 font-semibold">Available</td>
                  <td class="px-4 py-3">
                    <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md">Book Now</button>
                  </td>
                </tr>
                <tr class="border-t">
                  <td class="px-4 py-3">01 Feb 2025</td>
                  <td class="px-4 py-3">14 Feb 2025</td>
                  <td class="px-4 py-3">USD 1100</td>
                  <td class="px-4 py-3 text-yellow-600 font-semibold">Few Seats</td>
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
              Looking for a private departure with your own group, family, or solo? We can customize this trek based on
              your
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
        <h2 class="text-2xl font-bold text-[#005FAB] mb-4">Similar Tours</h2>
        <ul class="space-y-3 text-blue-700 list-disc list-inside">
          <?php if (!empty($smtrek)): ?>
            <?php foreach ($smtrek as $tour): ?>
              <li><?= htmlspecialchars($tour) ?></li>
            <?php endforeach; ?>
          <?php else: ?>
            <li>No similar tours available.</li>
          <?php endif; ?>
        </ul>
      </section>

      <section class="bg-blue-50 p-6 rounded-xl shadow-lg mt-8" id="faqs">
        <h2 class="text-3xl font-bold text-[#005FAB] mb-6 border-b-2 border-[#005FAB] pb-3">Frequently Asked Questions
        </h2>

        <div class="space-y-6" x-data="{ open: null }">
          <!-- Visa Requirements -->
          <?php
          foreach ($formattedQA as $qa) {
            ?>
            <div class="border border-gray-200 rounded-lg">
              <button @click="open !== <?php echo $data; ?> ? open = <?php echo $data; ?> : open = null"
                class="w-full text-left px-4 py-3 flex justify-between items-center font-semibold text-gray-800">
                <span><?php echo htmlspecialchars($qa['question']); ?></span>
                <i class="fas fa-chevron-down text-[#005FAB]"
                  :class="{ 'rotate-180': open === <?php echo $data; ?> }"></i>
              </button>
              <div x-show="open === <?php echo $data; ?>" x-collapse class="px-4 pb-4 text-gray-700">
                <p><?php echo htmlspecialchars($qa['answer']); ?></p>
              </div>
            </div>

            <?php
            $data++;
          } ?>
      </section>


    </main>

    <!-- Sidebar Area (1/4) -->
    <aside class="w-full md:w-1/4 space-y-8">

      <!-- Trip Price Box -->
      <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200 relative">
        <div
          class="absolute -top-3 -right-3 bg-red-500 text-white w-12 h-12 rounded-full flex items-center justify-center font-bold text-sm">
          10%
        </div>
        <div class="text-center mb-4">
          <p class="text-2xl font-bold text-[#005FAB]">US $<?php echo $row['Price']; ?> <span
              class="text-sm font-normal text-gray-600">per
              person</span></p>
        </div>
        <div class="flex flex-col items-center mb-4 space-y-1">
          <div class="flex text-yellow-400 text-lg">
            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
              class="fas fa-star"></i><i class="fas fa-star"></i>
          </div>
          <span class="text-sm text-gray-500">based on 0 reviews</span>
        </div>
        <div class="flex justify-between items-center text-sm text-gray-600 mb-4">
          <span class="flex items-center"><i class="fas fa-lock mr-1"></i> All inclusive</span>
          <span class="flex items-center"><i class="fas fa-calendar-alt mr-1"></i> <?php echo $row["Days"]; ?>
            Days</span>
        </div>
        <ul class="space-y-3 text-sm text-gray-700 border-t border-b border-gray-200 py-4 mb-4">
          <li class="flex items-start space-x-2"><i class="fas fa-key text-[#005FAB] mt-1"></i><span>Group & Early
              Booking Discount Available</span></li>
          <li class="flex items-start space-x-2"><i
              class="fas fa-plane-departure text-[#005FAB] mt-1"></i><span>Guaranteed Departure</span></li>
          <li class="flex items-start space-x-2"><i class="fas fa-users text-[#005FAB] mt-1"></i><span>Local
              Professional Guides</span></li>
          <li class="flex items-start space-x-2"><i class="fas fa-first-aid text-[#005FAB] mt-1"></i><span>Safe Trip &
              Professional Services</span></li>
          <li class="flex items-start space-x-2"><i class="fas fa-user-friends text-[#005FAB] mt-1"></i><span>Private &
              Group Departure</span></li>
        </ul>
        <div class="space-y-3">
          <button
            class="w-full bg-[#005FAB] hover:bg-[#004080] text-white py-2 rounded-lg font-semibold transition-colors">Book
            Now Pay Later</button>
          <button
            class="w-full border-2 border-[#005FAB] text-[#005FAB] hover:bg-blue-50 py-2 rounded-lg font-semibold transition-colors">Enquire
            Now</button>
        </div>
      </div>

      <!-- TripAdvisor Badge -->
      <div
        class="mt-6 p-4 rounded-xl shadow-lg text-center transition-all duration-300 ease-in-out animate-gradient-bg">
        <a href="https://www.tripadvisor.com/Attraction_Review-g293890-d9984262-Reviews-Advanced_Adventures_Nepal-Kathmandu_Kathmandu_Valley_Bagmati_Zone_Central_Region.html"
          target="_blank" class="inline-block hover:bg-gray-50 rounded-lg transition-colors duration-200 p-2">
          <div class="flex items-center justify-center space-x-2 text-[#005FAB]">
            <div class="flex items-center">
              <i class="fab fa-tripadvisor text-2xl transition-all duration-200"></i>
              <span class="text-lg font-bold ml-1">TripAdvisor</span>
            </div>
            <div class="flex items-center text-yellow-400">
              <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                class="fas fa-star"></i><i class="fas fa-star"></i>
            </div>
          </div>
          <p class="text-sm text-gray-600 mt-1">★★★★★ 140 reviews</p>
        </a>
      </div>

      <!-- Google Reviews Badge -->
      <div
        class="mt-6 p-4 rounded-xl shadow-lg text-center transition-all duration-300 ease-in-out animate-gradient-bg">
        <a href="https://www.google.com/maps/place/Advanced+Adventures" target="_blank"
          class="inline-block hover:bg-gray-50 rounded-lg transition-colors duration-200 p-2">
          <div class="flex items-center justify-center space-x-2 text-[#005FAB]">
            <i class="fab fa-google text-2xl transition-all duration-200"></i>
            <span class="text-lg font-bold ml-1">Google Reviews</span>
          </div>
          <p class="text-sm text-gray-600 mt-1">★★★★★ 4.9 rating</p>
        </a>
      </div>


      <!-- Contact Form (Sticky) -->
      <div class="sticky top-28 bg-white p-6 rounded-xl shadow-lg mt-6">
        <h3 class="text-xl font-bold text-accent-blue mb-4">Have a question?</h3>
        <form method="POST" action="https://www.advadventures.com/thanks.html" accept-charset="UTF-8">
          <input type="hidden" name="_token" value="KTDBdgD5J1Of9GYcnR79zJgMdRFDk47b7XWPHUCm">
          <div class="space-y-4">
            <div>
              <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name <span
                  class="text-blue-600">*</span></label>
              <input type="text" id="name" name="name" required placeholder="Enter your name"
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div>
              <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email <span
                  class="text-blue-600">*</span></label>
              <input type="email" id="email" name="email" required placeholder="Enter your email"
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div>
              <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
              <input type="tel" id="phone" name="phone" placeholder="Enter your phone (Optional)"
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div>
              <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Message <span
                  class="text-blue-600">*</span></label>
              <textarea id="message" name="comment" required placeholder="Enter your query"
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 h-32"></textarea>
            </div>
            <input type="hidden" name="subject" value="Enquiry">
            <div class="pt-2">
              <button type="submit"
                class="w-full bg-gradient-to-r from-blue-600 to-blue-800 text-white py-2 px-4 rounded-md font-semibold hover:from-blue-700 hover:to-blue-900 transition-all">
                Send Message
              </button>
            </div>
            <p class="text-gray-500 text-xs italic mt-3 text-center">
              We respect your privacy. We never share, sell, publicize or market your personal info in any way, shape,
              or form.
            </p>
          </div>
        </form>
      </div>

    </aside>
  </div>
  </div>

  <!-- Footer Section -->
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

  <!-- Scripts -->
  <script>
    // Mobile Menu Functionality
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

    // Accordion Functionality
    document.querySelectorAll('.accordion button').forEach(button => {
      button.addEventListener('click', () => {
        const content = button.nextElementSibling;
        const icon = button.querySelector('i');
        content.classList.toggle('hidden');
        icon.classList.toggle('fa-chevron-down');
        icon.classList.toggle('fa-chevron-up');
      });
    });

    // Back to Top Button
    const goToTopBtn = document.getElementById('goToTop');
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

    // Chart.js Implementation
    const ctx = document.getElementById('altitudeChart').getContext('2d');
    const altitudeChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: ['Day 01', 'Day 02', 'Day 03', 'Day 04', 'Day 05', 'Day 06', 'Day 07', 'Day 08', 'Day 09', 'Day 10', 'Day 11', 'Day 12'],
        datasets: [{
          label: 'Altitude (m)',
          data: [1350, 1350, 2161, 1350, 3650, 3650, 3650, 1350, 2248, 2200, 3180, 2200],
          backgroundColor: 'rgba(0, 95, 171, 0.2)',
          borderColor: 'rgba(0, 95, 171, 1)',
          borderWidth: 2,
          pointBackgroundColor: 'rgba(0, 95, 171, 1)',
          pointRadius: 5,
          tension: 0.3,
          fill: true,
        }]
      },
      options: {
        responsive: true,
        plugins: {
          tooltip: {
            backgroundColor: '#ffffff',
            titleColor: '#005FAB',
            bodyColor: '#333333',
            font: { size: 14, family: 'Arial, sans-serif', weight: 'bold' }
          },
          legend: { display: false },
          title: { display: false }
        },
        scales: {
          y: {
            beginAtZero: false,
            title: {
              display: true,
              text: 'Altitude (meters)',
              font: { size: 16, family: 'Arial, sans-serif', weight: 'bold' },
              color: '#005FAB'
            },
            ticks: { font: { size: 14, family: 'Arial, sans-serif' }, color: '#333333' }
          },
          x: {
            title: {
              display: true,
              text: 'Days',
              font: { size: 16, family: 'Arial, sans-serif', weight: 'bold' },
              color: '#005FAB'
            },
            ticks: { font: { size: 14, family: 'Arial, sans-serif' }, color: '#333333' }
          }
        }
      }
    });
  </script>
</body>

</html>