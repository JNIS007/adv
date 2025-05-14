<?php
include("./admin/includes/config.php")
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Advanced Adventures - Nepal Trekking & Tours</title>
  <!-- Header -->
  <?php
  include("header.php");
  ?>
  <!-- Tailwind CSS -->

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
        $query = mysqli_query($con, "SELECT * FROM topposts WHERE Is_Active = 1");
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
        <?php
        $sql = mysqli_query($con, "SELECT * FROM popularposts WHERE Is_Active = 1");
        while ($ro = mysqli_fetch_array($sql)) {
          $ctid = $ro["CategoryId"];
        ?>
          <div class="relative overflow-hidden transition-all duration-300 shadow-lg group rounded-xl hover:shadow-xl">
            <div class="relative h-64 overflow-hidden">
              <img src="admin/postimages/<?php echo htmlentities($ro['PostImage']); ?>"
                alt="<?php echo htmlentities($ro['PostTitle']); ?>"
                class="object-cover w-full h-full transition duration-500 transform group-hover:scale-105">
              <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-black/10 to-transparent" style="mask-image: linear-gradient(to bottom, black 0%, transparent 30%), 
      linear-gradient(to right, black 0%, transparent 30%);">
              </div>
              <div
                class="absolute px-4 py-2 border rounded-full shadow-lg bottom-4 right-4 bg-white/90 backdrop-blur-sm border-white/20">
                <span class="font-bold text-primary">US $<?php echo htmlentities($ro['Price']); ?></span>
              </div>
            </div>
            <div class="p-6 bg-white">
              <div class="flex items-start justify-between mb-2">
                <span class="text-sm text-gray-500"><?php echo htmlentities($ro['Days']); ?> Days</span>
                <span class="px-2 py-1 text-xs font-semibold text-red-800 bg-red-100 rounded-full"><?php
                                                                                                    $qr = mysqli_query($con, "SELECT * FROM tblcategory WHERE id =$ctid");
                                                                                                    $rr = mysqli_fetch_array($qr);
                                                                                                    echo $rr["CategoryName"];
                                                                                                    ?></span>
              </div>
              <h3 class="mb-3 text-xl font-bold text-gray-800 transition group-hover:text-primary">
                <a href="package/<?php echo htmlentities($ro['PostUrl']); ?>">
                  <?php echo htmlentities($ro['PostTitle']); ?>
                </a>
              </h3>
              <p class="mb-4 text-gray-600 line-clamp-3">
                <?php echo htmlentities(substr($ro['PostDetails'], 0, 150)); ?>...
              </p>
              <a href="http://localhost/adv/new_page.php?id=<?php echo urlencode($ro['id']); ?>"
                class="inline-flex items-center font-medium transition text-primary hover:text-blue-800">
                Explore This Trek <i class="ml-2 fas fa-arrow-right"></i>
              </a>
            </div>
          </div>
        <?php } ?>
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
  <?php
  include("footer.php");
  ?>
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