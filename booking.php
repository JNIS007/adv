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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advanced Adventures - Nepal Trekking & Tours</title>

    <?php
    include("header.php")
    ?>

    <div class="container px-4 py-8 mx-auto">
        <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">
            <!-- Booking Form -->
            <div class="flex flex-col p-6 space-y-6 bg-white rounded shadow lg:col-span-2">
                <h2 class="mb-6 text-2xl font-bold text-gray-800">Book your trip now</h2>
                <form action="submit_booking.php" method="POST" class="space-y-6">
                    <!-- Trip Selection -->
                    <div class="grid gap-4">
                        <!-- Full-width Trip Selection -->
                        <div>
                            <label class="block mb-1 font-medium text-gray-700">Your selected trip *</label>
                            <select name="trip" required class="w-full p-2 border border-gray-300 rounded">
                                <option value="">Select your package</option>
                                <!-- Add trip options here -->
                                <option value="package1">Trip Package 1</option>
                                <option value="package2">Trip Package 2</option>
                            </select>
                        </div>

                        <!-- Two-column layout for Date and Travellers -->
                        <div class="grid gap-4 md:grid-cols-2">
                            <!-- Trip Date -->
                            <div>
                                <label class="block mb-1 font-medium text-gray-700">Select trip date *</label>
                                <input type="date" name="trip_date" required class="w-full p-2 border border-gray-300 rounded">
                            </div>

                            <!-- Travellers -->
                            <div>
                                <label class="block mb-1 font-medium text-gray-700">Select travellers number *</label>
                                <input type="number" name="travellers" value="1" min="1" required class="w-full p-2 border border-gray-300 rounded">
                            </div>
                        </div>
                    </div>



                    <!-- Traveller Information -->
                    <h3 class="text-xl font-semibold text-gray-800">Information of traveller 1</h3>
                    <div class="grid gap-4 md:grid-cols-2">
                        <div class="flex gap-2">
                            <select name="salutation" class="p-2 border border-gray-300 rounded">
                                <option>Mr.</option>
                                <option>Ms.</option>
                                <option>Mrs.</option>
                            </select>
                            <input type="text" name="fullname" required placeholder="Full Name"
                                class="flex-1 p-2 border border-gray-300 rounded">
                        </div>
                        <input type="email" name="email" required placeholder="Enter your email here"
                            class="w-full p-2 border border-gray-300 rounded">
                        <input type="tel" name="contact" placeholder="Contact Number"
                            class="w-full p-2 border border-gray-300 rounded">
                        <input type="text" name="country" required placeholder="Your Current Country"
                            class="w-full p-2 border border-gray-300 rounded">
                        <input type="text" name="passport" required placeholder="Passport Number"
                            class="w-full p-2 border border-gray-300 rounded">
                        <input type="text" name="emergency" required
                            placeholder="Enter personal address and number in case of emergency"
                            class="w-full p-2 border border-gray-300 rounded">
                        <select name="ref_source" class="w-full p-2 border border-gray-300 rounded">
                            <option value="">Select how did you find us?</option>
                            <option>Google</option>
                            <option>Facebook</option>
                            <option>Friend</option>
                            <option>Other</option>
                        </select>
                        <textarea name="special_request" rows="3" class="w-full p-2 border border-gray-300 rounded"
                            placeholder="Do you have any other special questions or request?"></textarea>
                    </div>

                    <!-- Agreement -->
                    <div class="flex items-center gap-2">
                        <input type="checkbox" name="agree" required class="border-gray-300">
                        <label for="agree" class="text-sm text-gray-700">I agree to all the booking terms and
                            conditions</label>
                    </div>

                    <!-- Submit -->
                    <button type="submit" class="px-6 py-2 text-white bg-blue-600 rounded hover:bg-blue-700">
                        Submit Booking
                    </button>
                </form>
            </div>

            <!-- Aside Content -->
            <aside class="sticky top-0 p-6 bg-gray-100 rounded shadow">
                <h3 class="mb-4 text-xl font-semibold text-gray-800">Why Book With Us?</h3>
                <ul class="space-y-2 text-gray-700 list-disc list-inside">
                    <li>Group Discounts Available</li>
                    <li>Guaranteed Departures</li>
                    <li>Local Professional Guides</li>
                    <li>Safe and Secure Trips</li>
                    <li>Private & Group Departures</li>
                </ul>
            </aside>
        </div>
    </div>

    <?php
    include("footer.php");
    ?>



    </body>

</html>