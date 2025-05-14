<?php
$pageTitle = "Environment";
$relatedPages = [
  "Responsible Tourism in Nepal with Advanced Adventures" => "responsible-tourism.php",
  "Health & Porter Policy" => "health-porter-policy.php",
  "Education" => "education.php",
  "Social Awareness" => "social-awareness.php",
  "Post-Quake Relief" => "post-quake-relief.php",
  "Environment" => "#",
  "Volunteer Teaching" => "volunteer-teaching.php",
  "Learn Nepalese Language" => "learn-nepali-language.php"
];
?>
<?php
include("./admin/includes/config.php");
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
            alt="Environment Landscape"
            class="object-cover w-full h-64">
          <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50">

          </div>
        </div>

        <!-- Environment Section -->
        <div class="p-6 bg-white rounded-lg shadow-md">
          <h2 class="mb-4 text-2xl font-semibold text-gray-800">Our Environmental Philosophy</h2>

          <p class="mb-4">
            Without the presence of any individuals the protection of environment is not possible. So we all are doing and following all the basic rules to protect environment, society and culture. Responsibility is an imperative term. Without the proper management of environment and ecology we cannot exist because our business and our livelihood depend upon the continued existence of the natural environment. We have the responsibility to broadcast the message from one generation to next.
          </p>

          <p class="mb-4">
            Advanced Adventure is applying the responsibilities in fields with a practical way. For each trip our guides are being explained all the information for visitors before commencing any tour. We are enhancing responsible tourism as our own integral responsibility of our ongoing efforts. We have been participating in various clean up campaigns and awareness programs as well as maintaining a clean and healthy living environment.
          </p>

          <p class="mb-4">
            We have eco-green practices and have been applying them since our establishment. We are always conscious about our environment and form the group. Till now we have not included more than 20 people in our trip to minimize our impact on the environment.
          </p>
        </div>

        <!-- Environmental Responsibilities -->
        <div class="p-6 bg-white rounded-lg shadow-md">
          <h3 class="mb-4 text-xl font-semibold text-gray-800">Our Environmental Commitment</h3>

          <div class="space-y-4">
            <div>
              <h4 class="font-semibold text-green-700">Leave No Trace</h4>
              <p>
                Advanced Adventure has a very close bond with the Leave No Trace organization, which sets the global standard for outdoor ethics. We practice helping and creating a green environment through education, research, and outreach, ensuring sustainable development and a healthy environment.
              </p>
            </div>

            <div>
              <h4 class="font-semibold text-green-700">Seven Principles of Leave No Trace</h4>
              <ul class="pl-4 list-disc list-inside">
                <li>Plan Ahead and Prepare</li>
                <li>Travel and Camp on Durable Surfaces</li>
                <li>Dispose of Waste Properly</li>
                <li>Leave What You Find</li>
                <li>Minimize Campfire Impacts</li>
                <li>Respect Wildlife</li>
                <li>Be Considerate of Your Hosts and Other Visitors</li>
              </ul>
            </div>

            <div>
              <h4 class="font-semibold text-green-700">Our Promise</h4>
              <p>
                Environment has always been our prime concern while designing tour or trek products across any regions of Nepal. We ensure no part of nature is hindered. Our guides are well-educated on preserving the environment and know how to do it effectively.
              </p>
            </div>
          </div>

          <p class="mt-4 italic text-gray-600">
            "Grab pictures, leave footprints" - Our motto is to take only photos and leave only footprints.
          </p>
        </div>

        <!-- Environmental Guidelines for Travelers -->
        <div class="p-6 bg-white rounded-lg shadow-md">
          <h3 class="mb-4 text-xl font-semibold text-gray-800">Guidelines for Responsible Travel</h3>

          <div class="grid gap-4 md:grid-cols-3">
            <div>
              <h4 class="font-semibold text-green-700">Economic Responsibilities</h4>
              <ul class="pl-4 text-gray-700 list-disc list-inside">
                <li>Buy locally made crafts</li>
                <li>Consider reasonable tipping</li>
                <li>Bargain with good humor</li>
                <li>Support local charities</li>
              </ul>
            </div>

            <div>
              <h4 class="font-semibold text-green-700">Social Considerations</h4>
              <ul class="pl-4 text-gray-700 list-disc list-inside">
                <li>Learn local language basics</li>
                <li>Ask permission for photos</li>
                <li>Respect local customs</li>
                <li>Observe dress codes</li>
              </ul>
            </div>

            <div>
              <h4 class="font-semibold text-green-700">Environmental Protection</h4>
              <ul class="pl-4 text-gray-700 list-disc list-inside">
                <li>Do not disturb wildlife</li>
                <li>Avoid damaging plants</li>
                <li>Use eco-friendly products</li>
                <li>Conserve water resources</li>
              </ul>
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
            <p class="mt-2 text-gray-600">Stay updated with our latest offers and environmental initiatives</p>
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
  <?php
  include("footer.php");
  ?>
  </body>

</html>