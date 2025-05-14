<?php
$pageTitle = "Learn Nepalese Language";
$relatedPages = [
  "Responsible Tourism in Nepal with Advanced Adventures" => "responsible-tourism.php",
  "Health & Porter Policy" => "health-porter-policy.php",
  "Education" => "education.php",
  "Social Awareness" => "social-awareness.php",
  "Post-Quake Relief" => "post-quake-relief.php",
  "Environment" => "environment.php",
  "Volunteer Teaching" => "volunteer-teaching.php",
  "Learn Nepalese Language" => "#"
];

// Organize language phrases
$languageSections = [
  'Greeting' => [
    'Namaste' => 'Hello',
    '(Tapaiilai) Kasto Cha?' => 'How are you?',
    '(Malai) Thik Cha' => 'I am fine',
    'Khana khannu bhaiyo?' => 'Have you eaten? (used often as informal greeting)',
    'Dhanybhad' => 'Thank you',
    'Tapaiiko naam ke ho?' => 'What is your name?',
    'Maaph garnuhos' => 'Excuse me/ pardon me/ sorry',
    'Maile bhujhina' => 'I don\'t understand',
    'Maile bhujhe' => 'I understand',
    'Pheri bhetaunla' => 'I hope we meet again'
  ],
  'Pronouns' => [
    'Ma / Hami' => 'I / We',
    'Tapaii' => 'You',
    'Yo / Tyo' => 'This / That'
  ],
  'Useful Adjectives' => [
    'Mahango / Sasto' => 'Expensive / Cheap',
    'Ramro / Naramro' => 'Good / Bad',
    'Sapha / Phohar' => 'Clean / Dirty',
    'Thulo / Sano' => 'Big / Small',
    'Sajilo / Gahro' => 'Easy / Hard',
    'Thada / Najik' => 'Far / Close',
    'Chito / Dhilo' => 'Fast / Slow',
    'Tato / Cheeso' => 'Hot / Cold (for food)',
    'Garmi / Jaado' => 'Hot / Cold (for weather)',
    'Naya / Purano' => 'New / Old',
    'Dhani / Garib' => 'Rich / Poor'
  ],
  'Question Words' => [
    'Kahile' => 'When',
    'Kahaang' => 'Where',
    'Kun' => 'Which',
    'Kati' => 'How much',
    'Kasari' => 'How',
    'Kina / kinabhane' => 'Why / because',
    'Kasto' => 'How (of quality)',
    'Kasko' => 'Whose'
  ],
  'Numbers' => [
    '1 / ek' => '',
    '2 / dui' => '',
    '3 / tin' => '',
    '4 / char' => '',
    '5 / panchs' => '',
    '100 / ek saye' => '',
    '200 / dui saye' => '',
    '1000 ek hazar' => ''
  ],
  'Expressions of Time' => [
    'Aaja' => 'Today',
    'Hijo' => 'Yesterday',
    'Bholi' => 'Tomorrow',
    'Ghanta' => 'Hour',
    'Din' => 'Day',
    'Haptaa' => 'Week',
    'Mahina' => 'Month',
    'Barsa' => 'Year',
    'Bihaana' => 'Morning',
    'Diunso' => 'Afternoon',
    'Beluka' => 'Evening',
    'Raatri' => 'Night',
    'Subha raatri' => 'Good night',
    'Kati bhajyo?' => 'What time is it?',
    'Ek bhajyo' => 'One o\'clock'
  ],
  'General Conversation' => [
    'Tapaiko naam k ho?' => 'What is your name?',
    'Mero naam Anjeela ho.' => 'My name is Anjella.',
    'Tapai kaha bata aaunu bhayako ho?' => 'Where are you from?',
    'Ma Australia bata ayeko hu' => 'I am from Australia.',
    'Tapaiko pariwar ma ko ko hunuhuncha?' => 'Who are there in your family?',
    'Mero pariwar ma aama/buwa ani tin jan dai harru hunuhuncha.' => 'I have my parents, and three older brothers.',
    'Tapaiiko bihe bhayo?' => 'Are you married?',
    'Mero bihe bhaiyo / bhayeko chaina' => 'I am married / not married.',
    'Yo / tyo ke ho?' => 'What is this / that?',
    'Tapailai bhetda khushi lagyo.' => 'Nice to meet you'
  ]
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
            alt="Learn Nepalese Language"
            class="object-cover w-full h-64">
          <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50">
            <h2 class="px-4 text-3xl font-bold text-center text-white">
              Discover the Beauty of Nepalese Language
            </h2>
          </div>
        </div>

        <!-- Language Learning Introduction -->
        <div class="p-6 bg-white rounded-lg shadow-md">
          <h2 class="mb-4 text-2xl font-semibold text-gray-800">About Nepalese Language</h2>
          <p class="mb-4 text-gray-600">
            Nepalese, also known as Nepali, is the official language of Nepal and is spoken by millions of people. Learning some basic phrases can greatly enhance your travel experience, helping you connect with local people and understand the rich cultural context of your journey.
          </p>
          <p class="text-gray-600">
            We've compiled a comprehensive guide to help you learn essential Nepalese phrases and words that will be useful during your travel in Nepal.
          </p>
        </div>

        <!-- Language Sections -->
        <?php foreach ($languageSections as $sectionName => $phrases): ?>
          <div class="p-6 bg-white rounded-lg shadow-md">
            <h3 class="mb-4 text-xl font-semibold text-green-700"><?php echo $sectionName; ?></h3>
            <div class="grid gap-4 md:grid-cols-2">
              <?php foreach ($phrases as $nepali => $english): ?>
                <div class="flex justify-between pb-2 border-b">
                  <span class="font-medium text-gray-800"><?php echo $nepali; ?></span>
                  <span class="italic text-gray-600"><?php echo $english; ?></span>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        <?php endforeach; ?>

        <!-- Language Learning Tips -->
        <div class="p-6 bg-white rounded-lg shadow-md">
          <h3 class="mb-4 text-xl font-semibold text-gray-800">Tips for Learning Nepalese</h3>
          <ul class="space-y-3 text-gray-600 list-disc list-inside">
            <li>Practice pronunciation with locals</li>
            <li>Use language learning apps or audio resources</li>
            <li>Don't be afraid to make mistakes</li>
            <li>Listen to native speakers</li>
            <li>Practice daily, even if just for a few minutes</li>
          </ul>
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
            <h3 class="text-2xl font-bold text-gray-800">Sign Up for Language Learning Updates</h3>
            <p class="mt-2 text-gray-600">Stay updated with our language resources and travel tips</p>
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

  <!-- WhatsApp-->
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