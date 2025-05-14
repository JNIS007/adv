<!DOCTYPE html>
<?php
$pageTitle = "Social Awareness";
$relatedPages = [
  "Responsible Tourism in Nepal with Advanced Adventures" => "responsible-tourism.php",
  "Health & Porter Policy" => "health-porter-policy.php",
  "Education" => "education.php",
  "Social Awareness" => "#",
  "Post-Quake Relief" => "post-quake-relief.php",
  "Environment" => "environment.php",
  "Volunteer Teaching" => "volunteer-teaching.php",
  "Learn Nepalese Language" => "learn-nepali-language.php"
];
?>
<?php
include("./admin/includes/config.php");
?>
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
            alt="Social Awareness"
            class="object-cover w-full h-64">
          <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50">

          </div>
        </div>

        <!-- Our Expectation Section -->
        <div class="p-6 bg-white rounded-lg shadow-md">
          <h2 class="mb-4 text-2xl font-semibold text-gray-800">Our expectation: the more respect the more progress</h2>

          <div class="space-y-4 text-gray-600">
            <h3 class="text-xl font-semibold text-green-700">Multicultural assimilation</h3>
            <p>
              Our Nepalese culture is fully different from the Western culture. Due to the new environment, you might get something uncomfortable, to someone unfamiliar to the Nepalese lifestyle. But this uniqueness is the property of your travel. There are various things to be considered regarding the clothes one wears, how one eats, the tone one uses while talking, to the proximity one maintains while communicating. Your Patience, courtesy and smiles are the ornament to make your trip memorable in Nepal.
            </p>

            <h3 class="text-xl font-semibold text-green-700">Come as guest, back as friend</h3>
            <p>
              You can make a new friend with new vision and progress of life. While travelling toward the local area you will have so many opportunities to make a friends. Everybody will respect and love you. With chat with the locals you will learn about their daily lives, culture and attitude to life, plus have a very enjoyable time and a few laughs. This is only possible in the case of understanding local culture.
            </p>

            <h3 class="text-xl font-semibold text-green-700">Go green, do green and think green: Environmental Responsibility</h3>
            <p>
              Without the concept of responsible tourism the tourism industry cannot be sustained. We are the parts of our society. So all our impact will be gone on society directly and indirectly. We always brief our guest about the environmental policies and encourage them to participate in clean-up campaigns to promote awareness as well as to maintain a clean and healthy living environment. Our mission toward the environment is for future tourism.
            </p>
          </div>
        </div>

        <!-- Can I assist for locality? -->
        <div class="p-6 bg-white rounded-lg shadow-md">
          <h2 class="mb-6 text-2xl font-semibold text-gray-800">Can I assist for locality?</h2>

          <p class="mb-4 text-gray-600">
            The management of waste and population is the devastating problems throughout the world. We have not proper disposal and recycling system.
          </p>

          <p class="mb-4 text-gray-600">
            We kindly request every visitor to arrange their waste properly. While shopping, you will be given plastic bags, but don't be shy in suggesting that it isn't needed. Your tiny help is highly courtable to please kindly support us in our campaign. Please kindly support to minimize the waste of plastic water bottles. Consider packing a water filter, water purification tablets or iodine to partly drinking water. Your information and actions are always valuable to please only thank how can you make the environment productive.
          </p>
        </div>

        <!-- Can I have new way of Dinning & Shopping? -->
        <div class="p-6 bg-white rounded-lg shadow-md">
          <h2 class="mb-6 text-2xl font-semibold text-gray-800">Can I have new way of Dinning & Shopping?</h2>

          <p class="mb-4 text-gray-600">
            Advanced Adventures is highly committed to a local community-based local organization, so we always inspire our clients to have local food and drinks, rather than seeking imported familiar snacks and drinks. You have enough advantages of the local foods. Local food is healthy and it will save your economy as well.
          </p>

          <p class="mb-4 text-gray-600">
            Regarding any momentos or shopping we kindly request you to visit the manufacturers in the villages instead of fancy emporiums and department stores. If you buy the things with local people it will be more supportive for their economy and we can obtain a fair price for their products.
          </p>

          <p class="text-gray-600">
            More than the urban educated communities, Nepal has remote important societies, where the darkness still prevails just because of minor awareness to various aspects people of these remote communities lack. The lack of educational and effective awareness campaigns in Nepal has resulted many social issues and hence many important social issues still remain unsolved.
          </p>
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
            <p class="mt-2 text-gray-600">Stay updated with our latest offers and social awareness initiatives</p>
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