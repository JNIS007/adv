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


    <div class="container px-4 py-8 mx-auto lg:px-8">
        <div class="flex items-center mb-6 text-gray-600">
            <a href="/" class="hover:text-blue-500">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                    </path>
                </svg>
            </a>
            <span class="mx-2">→</span>
            <span>Best Time to Travel</span>
        </div>
        <!-- Main Content and Sidebar Wrapper -->
        <div class="flex flex-col gap-8 lg:flex-row">
            <!-- Main Content -->
            <div class="w-full lg:w-3/4">
                <h1 class="mb-6 text-3xl font-bold">Best Time to Travel</h1>

                <!-- Featured Image -->
                <div class="mb-8">
                    <img src="assets/nepaltravelguide.png" alt="Nepal Visa" class="w-full h-auto mb-6 rounded-lg shadow-md">
                </div>

                <!-- Nepal Visa Info -->
                <div class="space-y-6 text-gray-800 leading-relaxed text-[16px]">
                    <h2 class="mb-4 text-2xl font-bold text-blue-700">Nepal Travel Seasons Guide</h2>

                    <p class="p-4 mb-4 bg-yellow-100 border-l-4 border-yellow-500">
                        Nepal offers year-round travel, with optimal times for trekking and Himalayan views during pre- and
                        post-monsoon periods (March-May and September-December). Even during off-seasons, unique experiences
                        await travelers.
                    </p>

                    <!-- Spring Season -->
                    <div class="mb-6">
                        <h3 class="mb-3 text-xl font-semibold text-blue-600">Spring (March-May)</h3>
                        <div class="p-4 space-y-2 bg-white rounded-lg shadow">
                            <ul class="pl-2 list-disc list-inside">
                                <li>Ideal for trekking with warm temperatures and clear skies</li>
                                <li>Rhododendrons bloom, creating stunning landscapes</li>
                                <li>Excellent visibility</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Autumn Season -->
                    <div class="mb-6">
                        <h3 class="mb-3 text-xl font-semibold text-blue-600">Autumn (September to Mid-December)</h3>
                        <div class="p-4 space-y-2 bg-white rounded-lg shadow">
                            <ul class="pl-2 list-disc list-inside">
                                <li>Another prime trekking season with clear blue skies and excellent visibility</li>
                                <li>Stable weather conditions</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Winter Season -->
                    <div class="mb-6">
                        <h3 class="mb-3 text-xl font-semibold text-blue-600">Winter (Mid-December to February)</h3>
                        <div class="p-4 space-y-2 bg-white rounded-lg shadow">
                            <ul class="pl-2 list-disc list-inside">
                                <li>Colder temperatures, requiring appropriate gear</li>
                                <li>Suitable for those seeking solitude</li>
                                <li>Prepare for potential snow and extreme cold</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Summer/Monsoon Season -->
                    <div class="mb-6">
                        <h3 class="mb-3 text-xl font-semibold text-blue-600">Summer/Monsoon (Mid-June to August)</h3>
                        <div class="p-4 space-y-2 bg-white rounded-lg shadow">
                            <ul class="pl-2 list-disc list-inside">
                                <li>Heavy rainfall and reduced visibility</li>
                                <li>Generally not recommended for trekking due to challenging conditions</li>
                                <li>Rain shadow areas like Upper Mustang and Upper Dolpo regions remain visitable</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Off-Season Considerations -->
                    <div class="p-4 mt-6 bg-gray-100 border-t-4 border-gray-500">
                        <h3 class="mb-3 text-xl font-semibold text-blue-600">Off-Season Considerations</h3>
                        <ul class="pl-2 space-y-2 list-disc list-inside">
                            <li>Traveling during monsoon offers fewer crowds and potential discounts</li>
                            <li>Be prepared for potential discomforts: rain, snow, extreme cold, and flight disruptions</li>
                            <li>Winter is recommended for low land tours and treks</li>
                        </ul>
                    </div>
                </div>


                <!-- Newsletter -->
                <div class="mt-10">
                    <div class="p-6 rounded-lg shadow-sm bg-indigo-50">
                        <div class="flex flex-col justify-between sm:flex-row sm:items-center">
                            <div class="mb-4 sm:mb-0">
                                <p class="text-lg font-medium text-gray-800">Sign Up for Newsletter for Special Deals &
                                    Discounts</p>
                                <p class="mt-1 text-sm text-gray-600">Stay updated with our latest offers and travel
                                    packages</p>
                            </div>
                            <div class="flex-shrink-0 sm:ml-4">
                                <form class="flex w-full sm:w-auto">
                                    <input type="email" placeholder="Your Email Address"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-l sm:w-64 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                                        required>
                                    <button type="submit"
                                        class="px-4 py-2 text-white transition-colors bg-indigo-600 rounded-r hover:bg-indigo-700 whitespace-nowrap">
                                        Subscribe
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <aside class="w-full lg:w-1/4">
                <div class="sticky top-6">
                    <div class="p-6 bg-white rounded-lg shadow-md">
                        <h3 class="mb-4 text-xl font-bold text-gray-800">Related Pages</h3>
                        <ul class="space-y-3">
                            <li class="pb-3 border-b">
                                <a href="#" class="text-blue-600 transition-colors hover:text-blue-800">Travel Insurance</a>
                            </li>
                            <li class="pb-3 border-b">
                                <a href="#" class="text-blue-600 transition-colors hover:text-blue-800">Nepal Travel
                                    Guide</a>
                            </li>
                            <li class="pb-3 border-b">
                                <a href="#" class="text-blue-600 transition-colors hover:text-blue-800">Packing List</a>
                            </li>
                            <li class="pb-3 border-b">
                                <a href="#" class="text-blue-600 transition-colors hover:text-blue-800">Nepal Visa</a>
                            </li>
                            <li class="pb-3 border-b">
                                <a href="#" class="text-blue-600 transition-colors hover:text-blue-800">Equipment Check
                                    List</a>
                            </li>
                            <li class="pb-3 border-b">
                                <a href="#" class="text-blue-600 transition-colors hover:text-blue-800">Best Time to
                                    Travel</a>
                            </li>
                            <li class="pb-3 border-b">
                                <a href="#" class="text-blue-600 transition-colors hover:text-blue-800">Bhutan Travel
                                    Guide</a>
                            </li>
                            <li class="pb-3 border-b">
                                <a href="#" class="text-blue-600 transition-colors hover:text-blue-800">Tibet Travel
                                    Guide</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </aside>
        </div>
    </div>
    <?php
    include("footer.php");
    ?>






    </body>

</html>