<?php
$pageTitle = "Volunteer Teaching";
$relatedPages = [
  "Responsible Tourism in Nepal with Advanced Adventures" => "responsible-tourism.php",
  "Health & Porter Policy" => "health-porter-policy.php",
  "Education" => "education.php",
  "Social Awareness" => "social-awareness.php",
  "Post-Quake Relief" => "post-quake-relief.php",
  "Environment" => "environment.php",
  "Learn Nepalese Language" => "learn-nepalese.php"
];
?>
<?php
include("./admin/includes/config.php")
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo htmlspecialchars($pageTitle); ?> | Advanced Adventures</title>

  <?php
  include("header.php")
  ?>

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

        <!-- Hero Image -->
        <div class="relative mb-8">
          <img
            src="/api/placeholder/1200/400"
            alt="Volunteer Teaching in Nepal"
            class="object-cover w-full h-64">
          <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50">
            <h2 class="px-4 text-3xl font-bold text-center text-white">
              Empower Communities Through Education
            </h2>
          </div>
        </div>

        <!-- Program Introduction -->
        <div class="p-6 bg-white rounded-lg shadow-md">
          <h2 class="mb-4 text-2xl font-semibold text-gray-800">Our Volunteer Teaching Program</h2>
          <p class="mb-4 text-gray-600">
            This program is carried out in collaboration with Pioneer Foundation Nepal (Non-Profitable Organization - WWW.PFNEPAL.ORG)
          </p>
        </div>

        <!-- School Details -->
        <div class="p-6 bg-white rounded-lg shadow-md">
          <h3 class="mb-4 text-xl font-semibold text-green-700">School Details</h3>
          <div class="space-y-2 text-gray-600">
            <p><strong>Name:</strong> Sree Rameshwary Secondary School</p>
            <p><strong>Address:</strong> Bungkot, ward no - 09, Gorkha</p>
            <p><strong>Grades:</strong> Grade I to V</p>
            <p><strong>Subjects:</strong> English Teaching, Sports teaching, Social and environmental studies</p>
          </div>
        </div>

        <!-- Admission & Cost -->
        <div class="p-6 bg-white rounded-lg shadow-md">
          <h3 class="mb-4 text-xl font-semibold text-green-700">Admission & Volunteering Details</h3>
          <div class="space-y-4 text-gray-600">
            <div>
              <h4 class="mb-2 font-semibold">Admission Process</h4>
              <p>Admission Fee: US $50 per person (This amount will go to the Pioneer Foundation - Nepal to support their social project)</p>
            </div>

            <div>
              <h4 class="mb-2 font-semibold">Volunteering Costs</h4>
              <p>Per Day Volunteering: US $50 per person per day</p>
              <p>Includes: Lodging, food, volunteering fees in Schools, and local transportation in/out to Gorkha from Kathmandu</p>
            </div>

            <div>
              <h4 class="mb-2 font-semibold">Duration</h4>
              <p>Minimum: 1 week to 10 days</p>
              <p>Maximum: As per your choice (2 weeks, 3 weeks, 1 month possible)</p>
              <p>You must confirm your timeline of volunteering beforehand.</p>
            </div>
          </div>
        </div>

        <!-- Lodging & Food -->
        <div class="p-6 bg-white rounded-lg shadow-md">
          <h3 class="mb-4 text-xl font-semibold text-green-700">Lodging & Food Details</h3>
          <div class="space-y-4 text-gray-600">
            <div>
              <h4 class="mb-2 font-semibold">Lodging</h4>
              <p>Accommodation will be with a host family in a community house. This provides an opportunity to:</p>
              <ul class="pl-5 list-disc">
                <li>Enjoy and explore local lifestyles</li>
                <li>Interact with local people and their culture</li>
                <li>Stay in a double bedroom</li>
              </ul>
              <p class="mt-2">Note: Toilets are outside in the yard. Shower is cold and outside. You can buy a water heating rod in Kathmandu or Gorkha for hot bucket showers.</p>
            </div>

            <div>
              <h4 class="mb-2 font-semibold">Food</h4>
              <p>Basic village food with limited western options:</p>
              <div class="pl-5">
                <p><strong>Breakfast:</strong> Choice of eggs, tea or coffee, biscuits (Sometimes bread with butter/jam)</p>
                <p><strong>Lunch/Dinner:</strong> Nepali Food (Dal Bhat) - plain rice, lentil soup, potato or cauliflower curry, Gundrek Sadeko (Kimchi) or pickle</p>
                <p class="mt-2">Tip: You can bring additional items like noodles, spaghetti, or cheese.</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Volunteering Experience -->
        <div class="p-6 bg-white rounded-lg shadow-md">
          <h3 class="mb-4 text-xl font-semibold text-green-700">Volunteering Experience</h3>
          <p class="text-gray-600">
            During your volunteering teaching, you'll have the opportunity to:
          </p>
          <ul class="pl-5 mt-2 space-y-2 text-gray-600 list-disc">
            <li>Observe school operations</li>
            <li>Discuss teaching differences between your country and Nepal</li>
            <li>Interact with social workers, teachers, and school management</li>
            <li>Play sports with school children</li>
          </ul>
        </div>

        <!-- Optional Activities -->
        <div class="p-6 bg-white rounded-lg shadow-md">
          <h3 class="mb-4 text-xl font-semibold text-green-700">Optional/Extra Activities</h3>
          <ul class="pl-5 space-y-2 text-gray-600 list-disc">
            <li>Milking cow/buffalo</li>
            <li>Visit to rice fields</li>
            <li>Fishing in river</li>
            <li>Visit to cultural villages</li>
            <li>Explore historical areas (Martyr Bhimsen Place, Budi-Gandaki Sattle)</li>
            <li>Day hiking in other villages with local guides</li>
          </ul>
        </div>

        <!-- Fundraising -->
        <div class="p-6 bg-white rounded-lg shadow-md">
          <h3 class="mb-4 text-xl font-semibold text-green-700">Fundraising & School Support</h3>
          <p class="mb-4 text-gray-600">
            The school, which was severely damaged by an earthquake, has limited resources. While the program covers basic costs, the school welcomes additional support.
          </p>
          <div class="space-y-4 text-gray-600">
            <div>
              <h4 class="mb-2 font-semibold">Potential Support Areas:</h4>
              <ul class="pl-5 list-disc">
                <li>Science laboratory setup</li>
                <li>Library creation</li>
                <li>Buying cupboards, tables, chairs</li>
                <li>Teaching posters and digital teaching DVDs</li>
                <li>Sports equipment (footballs, volleyballs, nets, badminton, table tennis, cricket gear)</li>
              </ul>
            </div>
            <p>
              Even small contributions (US $100-$200) for sports materials, colors, pencils, textbooks, or examination copies can make a significant difference.
            </p>
            <p>
              You can purchase support items in Kathmandu or at the district headquarters (approximately 4 hours walking from the school).
            </p>
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
  <?php
  include("footer.php");
  ?>
  </body>

</html>