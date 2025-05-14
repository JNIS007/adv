<?php
$pageTitle = "Post-Quake Relief";
$relatedPages = [
  "Responsible Tourism in Nepal with Advanced Adventures" => "responsible-tourism.php",
  "Health & Porter Policy" => "health-porter-policy.php",
  "Education" => "education.php",
  "Social Awareness" => "social-awareness.php",
  "Post-Quake Relief" => "#",
  "Environment" => "environment.php",
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
            src="/api/placeholder/1200/600"
            alt="Post-Quake Relief Landscape"
            class="object-cover w-full h-64">
        </div>

        <!-- Corporate Social Responsibility Section -->
        <div class="p-6 bg-white rounded-lg shadow-md">
          <h2 class="mb-4 text-2xl font-semibold text-gray-800">Corporate Social Responsibility</h2>

          <p class="mb-4">
            Advanced Adventures is fully aware in our Corporate Social Responsibility as we have our own regulation in our business model. We always respect the law and policy to build-in, self-regulating mechanism and well esteem manner. Moreover we are fully occupied by law, ethical standards, international norms, sustainability and environmental awareness.
          </p>

          <p class="mb-4">
            We are not beyond from the society so we are fully attached with the society and their activities. We know we have the full responsibility toward the society. Our activities are directly connected with society, environment, consumers, employees, communities, and all other members of the public sphere. If the business does not address this interest of the society, it cannot succeed only with short man's charity, even eliminating poverty and cultivating peace are our core program.
          </p>
        </div>

        <!-- Post-Quake Relief Details -->
        <div class="p-6 bg-white rounded-lg shadow-md">
          <p class="mb-4">
            After earthquake at 25 April 2015 (7.9 Magnitude), we focused our support for earthquake victims in collaboration with non-profitable local organizations, Pioneer Foundation Nepal - http://www.pfnepal.org
          </p>

          <p class="mb-4">
            For the first two months, our support was focused for buying foods and tents for the earthquake victims who had no houses as it was fully destructive and had no foods to eat. After 2 months, we started supporting victims with Zero Rate for their shelter houses or safe staying in monsoon. After 6 months, an earthquake victims were some what stabilized. Since then, and till now, we are supporting local community's youth, children, and schools with scholarships, books, copies for their students, sports and educational materials, and have also created support program for volunteering teaching from westerners in their school.
          </p>

          <p class="mb-4">
            Note: Earthquake hit at Central Nepal (including North and mid west region - 11 District including Gorkha (was the epic center of the earthquake just below Manaslu Mountain), Dhading district, Nuwakot District, Rasuwa District, Kathmandu, Patan & Bhaktapur, Kave, Sindhulpalanchok, Dolakha etc. so most of our support effort is centered in these districts, mainly in Gorkha and Dhading, which most center of the devastation are in these region.
          </p>
        </div>
      </div>

      <!-- Sidebar -->
      <div class="relative md:w-1/4 ">
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
            <h3 class="text-2xl font-bold text-gray-800">Sign Up for News Letter for Special Deals & Discounts</h3>
            <p class="mt-2 text-gray-600">Enter your email address</p>
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