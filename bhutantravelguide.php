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
            <span>Bhutan Travel Guide</span>
        </div>
        <!-- Main Content and Sidebar Wrapper -->
        <div class="flex flex-col gap-8 lg:flex-row">
            <!-- Main Content -->
            <div class="w-full lg:w-3/4">
                <h1 class="mb-6 text-3xl font-bold">Bhutan Travel Guide</h1>

                <!-- Featured Image -->
                <div class="mb-8">
                    <img src="assets/nepaltravelguide.png" alt="Nepal Visa" class="w-full h-auto mb-6 rounded-lg shadow-md">
                </div>

                <div class="space-y-6 text-gray-800 leading-relaxed text-[16px]">
                    <h2 class="mb-4 text-2xl font-bold text-blue-700">Discover Bhutan: The Kingdom of Happiness</h2>

                    <!-- Unique Facts -->
                    <div class="mb-6">
                        <h3 class="mb-3 text-xl font-semibold text-blue-600">Fascinating Facts about Bhutan</h3>
                        <div class="p-4 space-y-2 bg-white rounded-lg shadow">
                            <ul class="pl-2 list-disc list-inside">
                                <li>Home to the unique philosophy of Gross National Happiness</li>
                                <li>World's Only Carbon Negative Country</li>
                                <li>Strong Buddhist Culture with Vibrant Traditions</li>
                                <li>Provides Free Education and Healthcare to Citizens</li>
                                <li>Known for Colorful Festivals and Unique Cultural Practices</li>
                                <li>Follows a 'High Value, Low Volume' Tourism Policy</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Weather & Climate -->
                    <div class="mb-6">
                        <h3 class="mb-3 text-xl font-semibold text-blue-600">Weather & Climate</h3>
                        <div class="p-4 space-y-2 bg-white rounded-lg shadow">
                            <p class="mb-2">Bhutan's weather is dramatically influenced by its altitude:</p>
                            <ul class="pl-2 list-disc list-inside">
                                <li>Northern Mountains (up to 7,000m/22,960 feet): Arctic-like, frozen conditions</li>
                                <li>Mountain Peaks: Continually snow-covered</li>
                                <li>Lower Regions: Cool even during summers due to high-altitude topography</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Internet & Communication -->
                    <div class="mb-6">
                        <h3 class="mb-3 text-xl font-semibold text-blue-600">Internet & SIM Cards</h3>
                        <div class="p-4 space-y-2 bg-white rounded-lg shadow">
                            <ul class="pl-2 list-disc list-inside">
                                <li>Two GSM Network Providers:
                                    <ul class="pl-4 list-circle">
                                        <li>B-mobile (Government-owned): Recommended, better coverage</li>
                                        <li>Tashi Cell (Private)</li>
                                    </ul>
                                </li>
                                <li>Urban Areas: Fully covered with 3G and 4G</li>
                                <li>Data Charged per MB: Recommended to get a data package</li>
                                <li>Mobile Internet Often Better Than Hotel Wi-Fi</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Electricity -->
                    <div class="mb-6">
                        <h3 class="mb-3 text-xl font-semibold text-blue-600">Electricity</h3>
                        <div class="p-4 space-y-2 bg-white rounded-lg shadow">
                            <ul class="pl-2 list-disc list-inside">
                                <li>Standard Voltage: 230 V</li>
                                <li>Frequency: 50 Hz</li>
                                <li>Compatible with devices from UK, Europe, Australia, Asia, and Africa</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Cuisine -->
                    <div class="mb-6">
                        <h3 class="mb-3 text-xl font-semibold text-blue-600">Bhutanese Cuisine</h3>
                        <div class="p-4 space-y-2 bg-white rounded-lg shadow">
                            <p class="mb-2">Key Characteristics:</p>
                            <ul class="pl-2 list-disc list-inside">
                                <li>Staple: Rice with meat or vegetable side dishes</li>
                                <li>Common Ingredients:
                                    <ul class="pl-4 list-circle">
                                        <li>Red Rice, Buckwheat, Maize</li>
                                        <li>Meat Varieties: Chicken, Yak, Lamb, Pork, Dried Beef</li>
                                        <li>Vegetables: Spinach, Pumpkins, Turnips, Radishes, Tomatoes</li>
                                    </ul>
                                </li>
                                <li>Distinguishing Feature: Extremely Spicy, Heavy Use of Chilies</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Best Time to Visit -->
                    <div class="mb-6">
                        <h3 class="mb-3 text-xl font-semibold text-blue-600">Best Time to Visit</h3>
                        <div class="p-4 space-y-2 bg-white rounded-lg shadow">
                            <ul class="pl-2 list-disc list-inside">
                                <li>Peak Seasons: Spring (March-May) and Autumn (Fall)</li>
                                <li>Spring Highlights:
                                    <ul class="pl-4 list-circle">
                                        <li>Valleys in Full Bloom</li>
                                        <li>Clear Skies</li>
                                        <li>Himalayan Peaks Visible</li>
                                        <li>Flourishing Flora and Fauna</li>
                                    </ul>
                                </li>
                                <li>Summer and Winter Also Offer Unique Experiences</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Festivals -->
                    <div class="mb-6">
                        <h3 class="mb-3 text-xl font-semibold text-blue-600">Festivals and Holidays</h3>
                        <div class="p-4 space-y-2 bg-white rounded-lg shadow">
                            <ul class="pl-2 list-disc list-inside">
                                <li>Tshechu: Annual Religious Festivals</li>
                                <li>Held on the 10th day of Tibetan Lunar Calendar</li>
                                <li>Important Social and Spiritual Events</li>
                                <li>Unique to Each Village</li>
                                <li>Dates Vary Annually Due to Unique Calendar</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Accommodation -->
                    <div class="mb-6">
                        <h3 class="mb-3 text-xl font-semibold text-blue-600">Accommodation</h3>
                        <div class="p-4 space-y-2 bg-white rounded-lg shadow">
                            <ul class="pl-2 list-disc list-inside">
                                <li>Typically All-Inclusive Packages</li>
                                <li>Minimum Daily Fee Includes:
                                    <ul class="pl-4 list-circle">
                                        <li>3-Star Hotel Accommodation</li>
                                        <li>Meals</li>
                                        <li>Transportation</li>
                                        <li>Guide and Driver</li>
                                    </ul>
                                </li>
                                <li>High-End Hotels and Resorts Scattered Across Tourist Destinations</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Final Note -->
                    <div class="p-4 mt-6 bg-yellow-100 border-l-4 border-yellow-500">
                        <p class="italic">
                            Bhutan: A mystical land of the Thunder Dragon, offering a unique blend of ancient Buddhist
                            culture and modern experiences. A journey that promises to be both enlightening and
                            unforgettable.
                        </p>
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