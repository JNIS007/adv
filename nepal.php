<?php
include("./admin/includes/config.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advanced Adventures - Nepal Trekking & Tours</title>
    <?php
    include("header.php")
    ?>
    <div class="py-2 pl-10 text-sm text-gray-600">
        Home - Nepal
    </div>
    <div class="container grid grid-cols-1 gap-6 px-4 py-6 mx-auto lg:grid-cols-4">

        <!-- 📄 Main Content Area (spans 3/4 on large screens) -->
        <div class="space-y-6 lg:col-span-3">

            <!-- 🌍 Nepal Description Section -->
            <div class="p-6 bg-white border rounded-md shadow-sm">


                <h1 class="inline-block mb-4 text-3xl font-bold border-b-4 border-blue-500">Nepal</h1>

                <p class="mb-4">
                    Rough Guides labeled Nepal as a "must travel destination" and listed trekking as the "ultimate thing
                    not
                    to miss in Nepal: an unequalled scenic and cultural experience." The Himalayan range stretches
                    2,000km
                    and houses eight 8,000-ers out of fourteen including the world’s highest peak, Mount Everest. Nepal
                    is
                    undoubtedly the best travel destination for those travelers who seek walking adventures ranging from
                    easy to extremely challenging. Easy, moderate and challenging treks in every region of the country
                    are
                    major highlights of Nepal, the nation known for Himalayan adventure. Nepal goes beyond trekking
                    though.
                    Adventurous activities like white water river rafting, wildlife safaris, peak climbing, aerial
                    adventures and volunteerism are other major activities travelers can experience in Nepal.
                </p>

                <p class="mb-4">
                    Nepal is rich in culture with eight cultural UNESCO World Heritage Sites (seven are inside Kathmandu
                    Valley and the eighth is Lumbini, the birthplace of Buddha). Nepal caters many wonderful cultural
                    tours
                    where ancient and medieval culture spills in every corner of the country. With more than 100
                    ethnical
                    tribes uniquely different to each other, there's a great cultural encounter for every traveler to
                    experience in Nepal. You'll also be amazed at this small nation's resilience after the devastating
                    2015
                    earthquake. Nepal took this disaster and turned it into opportunity to promote better housing
                    construction, empower women, promote good governance and economic development.
                </p>

                <p>
                    Nepal is one of the few countries that cater diverse holiday activities relatively in a small
                    geographical territory. We can't wait to help you plan your Nepal adventure!
                </p>
            </div>

            <!-- 🎒 Nepal Packages Heading -->
            <div>
                <h2 class="py-1 pl-5 text-3xl font-bold">Nepal Packages</h2>

                <!-- Your package loop goes here -->
                <!-- You can paste the package cards here (from previous answer) -->
            </div>
        </div>

        <!-- 🗂️ Sidebar: Categories -->
        <aside class="p-4 bg-white border rounded-md shadow-sm h-fit ">
            <h2 class="pb-1 mb-2 text-xl font-bold border-b">Category</h2>
            <?php
            $catQuery = mysqli_query($con, "SELECT * FROM tblcategory");
            while ($cat = mysqli_fetch_array($catQuery)) {
                echo '<a href="category.php?id=' . $cat['id'] . '" class="block py-1 text-blue-700 hover:underline">' . $cat['CategoryName'] . '</a>';
            }
            ?>
        </aside>

    </div>

    <div class="grid grid-cols-1 gap-8 py-2 pl-10 sm:grid-cols-2 lg:grid-cols-4 lg:col-span-3">

        <?php
        $query = mysqli_query($con, "SELECT * FROM tblposts WHERE Is_Active = 1");
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
    </div>
    <?php
    include("footer.php");
    ?>
    </body>

</html>