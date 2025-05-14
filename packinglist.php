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
            <span>Packing List</span>
        </div>
        <!-- Main Content and Sidebar Wrapper -->
        <div class="flex flex-col gap-8 lg:flex-row">
            <!-- Main Content -->
            <div class="w-full lg:w-3/4">
                <h1 class="mb-6 text-3xl font-bold">Packing List</h1>

                <!-- Featured Image -->
                <div class="mb-8">
                    <img src="assets/packinglist.png" alt="Nepal Visa" class="w-full h-auto mb-6 rounded-lg shadow-md">
                </div>

                <div class="space-y-6 text-gray-800 leading-relaxed text-[16px]">
                    <h2 class="mb-4 text-2xl font-bold text-blue-700">Packing List for Trekking in Himalayas</h2>

                    <p class="p-4 italic bg-yellow-100 border-l-4 border-yellow-500">
                        This list is a reference for best packing. Pack based on your travel habits and experience.
                        Efficient packing is crucial for minimizing load on international and domestic flights!
                    </p>

                    <!-- Head & Hand Gear -->
                    <div class="mb-6">
                        <h3 class="mb-3 text-xl font-semibold text-blue-600">Head & Hand Gear</h3>
                        <div class="p-4 space-y-2 bg-white rounded-lg shadow">
                            <ul class="pl-2 list-disc list-inside">
                                <li>Sun Hat: Lightweight with good brim or visor</li>
                                <li>Wool or Fleece Hat: Ear-covering</li>
                                <li>Balaclava: Thick, for high altitudes (above 5000m)</li>
                                <li>Neckband: Optional, multi-use (scarf, facemask, headband)</li>
                                <li>Liner Gloves: Lightweight, synthetic (e.g., Patagonia)</li>
                                <li>Wind Stopper Fleece Gloves</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Footwear -->
                    <div class="mb-6">
                        <h3 class="mb-3 text-xl font-semibold text-blue-600">Footwear</h3>
                        <div class="p-4 space-y-2 bg-white rounded-lg shadow">
                            <ul class="pl-2 list-disc list-inside">
                                <li>Running Shoes: For travel and easy walking</li>
                                <li>Hiking Boots: Warm, well-fitting (Asolo, Merrill, Scarpa, La Sportiva)</li>
                                <li>Gaiters: Short (Outdoor Research Rocky Mountain Low Gaiters)</li>
                                <li>Sport Sandals: For evening lodge use</li>
                                <li>Socks:
                                    <ul class="pl-4 list-circle">
                                        <li>Lightweight synthetic/wool blend (Bridgedale, Patagonia, Wigwam, Fox River)</li>
                                        <li>Heavy synthetic/wool blend (Smartwool, Bridgedale, Wigwam, Fox River)</li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Clothing -->
                    <div class="mb-6">
                        <h3 class="mb-3 text-xl font-semibold text-blue-600">Clothing</h3>
                        <div class="p-4 space-y-2 bg-white rounded-lg shadow">
                            <ul class="pl-2 list-disc list-inside">
                                <li>Lightweight Long Underwear (Top/Bottom): Patagonia-Capilene, REI, Mountain Equipment
                                    Co-op</li>
                                <li>Mid-weight Long Underwear (Top/Bottom): Zip T-neck, light colors recommended</li>
                                <li>Briefs: Few pairs synthetic or cotton</li>
                                <li>Short-Sleeved Shirts: Synthetic, vapor-wicking (North Face, Patagonia-Capilene)</li>
                                <li>Long-Sleeved Shirts</li>
                                <li>Lightweight Windproof Fleece</li>
                                <li>Synthetic Jacket/Pullover: Primaloft or Polartec 100/200 fleece</li>
                                <li>Synthetic Insulated Pants: Primaloft or Polarguard 3D</li>
                                <li>Down Insulated Jacket: Medium weight, preferably with hood</li>
                                <li>Waterproof Breathable Jacket & Pants: With hood and full-length side zips</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Accessories -->
                    <div class="mb-6">
                        <h3 class="mb-3 text-xl font-semibold text-blue-600">Accessories</h3>
                        <div class="p-4 space-y-2 bg-white rounded-lg shadow">
                            <ul class="pl-2 list-disc list-inside">
                                <li>Sunglasses: High-quality 100% UV and IR protection (with spare pair)</li>
                                <li>Headlamp: With spare bulb (Petzl or Black Diamond)</li>
                                <li>Spare Batteries</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Additional Gear -->
                    <div class="mb-6">
                        <h3 class="mb-3 text-xl font-semibold text-blue-600">Additional Gear</h3>
                        <div class="p-4 space-y-2 bg-white rounded-lg shadow">
                            <ul class="pl-2 list-disc list-inside">
                                <li>Backpack: 20L-40L, internal frame</li>
                                <li>Pack Cover</li>
                                <li>Sleeping Bag: -10F to 10F (-12C to -24C)</li>
                                <li>Water Bottles: 1-2 liter, leak-proof</li>
                                <li>Trekking Poles: Adjustable (Leki, Black Diamond)</li>
                                <li>Swiss Army Knife: Do not pack in carry-on</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Medical & Personal -->
                    <div class="mb-6">
                        <h3 class="mb-3 text-xl font-semibold text-blue-600">Medical & Personal Items</h3>
                        <div class="p-4 space-y-2 bg-white rounded-lg shadow">
                            <ul class="pl-2 list-disc list-inside">
                                <li>Sunscreen: SPF 30+, non-oily</li>
                                <li>Lip Cream: SPF 30+</li>
                                <li>Toiletry Kit: Travel-sized essentials</li>
                                <li>First-Aid Kit: Including prescription medications</li>
                                <li>Water Purification Tablets</li>
                                <li>Baby Wipes</li>
                                <li>Earplugs</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Travel Items -->
                    <div class="mb-6">
                        <h3 class="mb-3 text-xl font-semibold text-blue-600">Travel Items</h3>
                        <div class="p-4 space-y-2 bg-white rounded-lg shadow">
                            <ul class="pl-2 list-disc list-inside">
                                <li>Trek/Expedition Duffel Bag</li>
                                <li>Small Travel Bag</li>
                                <li>Nylon Stuff Sacks</li>
                                <li>Travel Clothes</li>
                                <li>Passport Belt/Pouch</li>
                                <li>Small Padlocks</li>
                                <li>Camera with Extra Batteries</li>
                                <li>Book(s) and Journal</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Climbing Gear (Optional) -->
                    <div class="mb-6">
                        <h3 class="mb-3 text-xl font-semibold text-blue-600">Climbing Gear (If Applicable)</h3>
                        <div class="p-4 space-y-2 bg-white rounded-lg shadow">
                            <ul class="pl-2 list-disc list-inside">
                                <li>Ice Axe</li>
                                <li>Crampons</li>
                                <li>Harness</li>
                                <li>2x Tape Slings</li>
                                <li>2x Screw Gate Karabiners</li>
                                <li>Descender/Abseil Device</li>
                                <li>Prussic Loops</li>
                                <li>Plastic Mountaineering Boots</li>
                                <li>Mittens with Pile Liners</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Final Note -->
                    <div class="p-4 mt-6 bg-gray-100 border-t-4 border-gray-500">
                        <p class="text-sm italic">
                            Note: Some items like the Trek/Expedition Duffel Bag may be provided by Advanced Adventures.
                            Always verify current recommendations and pack according to your specific trek requirements.
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