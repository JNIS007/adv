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
        <!-- Breadcrumb -->
        <div class="flex items-center mb-6 text-gray-600">
            <a href="/" class="hover:text-blue-500">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                    </path>
                </svg>
            </a>
            <span class="mx-2">→</span>
            <span>Terms & Conditions</span>
        </div>

        <!-- Main Content and Sidebar -->
        <div class="flex flex-col gap-8 lg:flex-row">
            <!-- Terms & Conditions -->
            <div class="w-full lg:w-3/4">
                <h1 class="mb-6 text-3xl font-bold">Terms & Conditions</h1>

                <!-- Featured Image -->
                <div class="mb-8">
                    <img src="assets/termsandconditions.png" alt="Terms and Conditions"
                        class="w-full h-auto mb-6 rounded-lg shadow-md">
                </div>

                <!-- Terms & Conditions Content - Aligned with image -->
                <div class="space-y-8 text-gray-800 leading-relaxed text-[16px]">
                    <!-- Introduction -->
                    <div class="p-6 bg-white rounded-lg shadow-sm">
                        <h2 class="pb-3 mb-4 text-2xl font-semibold border-b text-primary">BOOKING TERMS & CONDITIONS</h2>
                        <div class="prose max-w-none">
                            <p>By booking a trip with Advanced Adventures Nepal, you agree to be bound by these Terms. These
                                terms form a legal contract between you and us. If you're booking on behalf of others, you
                                confirm that you have the authority to accept these terms for them.</p>
                            <p class="mt-3"><strong>Note:</strong> Trekking, climbing, and mountaineering in the Himalayas
                                involve risks
                                due to altitude and terrain. You accept these risks when booking with us.</p>
                        </div>
                    </div>

                    <!-- Payment Terms -->
                    <div class="p-6 bg-white rounded-lg shadow-sm">
                        <h2 class="pb-3 mb-4 text-2xl font-semibold border-b text-primary">BOOKING CONFIRMATION & PAYMENTS
                        </h2>
                        <div class="prose max-w-none">
                            <p>To confirm your booking, a <strong>20% deposit for Nepal trips</strong> or <strong>50% for
                                    Bhutan & Tibet trips</strong> is required. This deposit is non-refundable.</p>
                            <p class="mt-3">Payment methods include <strong>bank wire transfer</strong> or <strong>online
                                    payment</strong> (Visa, MasterCard, AMEX with 4% surcharge).</p>
                        </div>
                    </div>

                    <!-- Balance Payment -->
                    <div class="p-6 bg-white rounded-lg shadow-sm">
                        <h2 class="pb-3 mb-4 text-2xl font-semibold border-b text-primary">BALANCE PAYMENT</h2>
                        <div class="prose max-w-none">
                            <ul class="ml-6 space-y-2 list-disc">
                                <li><strong>Nepal Trips:</strong> Remaining 80% payable on arrival in Kathmandu (preferably
                                    in USD cash, or card with 4% fee).</li>
                                <li><strong>Bhutan & Tibet Trips:</strong> Full balance due <strong>30 days prior</strong>
                                    to departure.</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Trip Price -->
                    <div class="p-6 bg-white rounded-lg shadow-sm">
                        <h2 class="pb-3 mb-4 text-2xl font-semibold border-b text-primary">TRIP PRICE</h2>
                        <div class="prose max-w-none">
                            <p>Prices are per person. Solo travelers pay a single supplement. We reserve the right to change
                                prices due to currency fluctuation, fuel costs, or changes in local operator fees.</p>
                        </div>
                    </div>

                    <!-- Cancellation Policy -->
                    <div class="p-6 bg-white rounded-lg shadow-sm">
                        <h2 class="pb-3 mb-4 text-2xl font-semibold border-b text-primary">CANCELLATION</h2>
                        <div class="prose max-w-none">
                            <p><strong>Client Cancellation:</strong> Deposit is non-refundable. No refund after trip starts.
                                For Bhutan/Tibet, 100% cancellation fee applies within 30 days.</p>
                            <p class="mt-3"><strong>Company Cancellation:</strong> Full refund or option to reschedule if
                                canceled due to
                                uncontrollable events (weather, disasters, etc.).</p>
                        </div>
                    </div>

                    <!-- Itinerary Changes -->
                    <div class="p-6 bg-white rounded-lg shadow-sm">
                        <h2 class="pb-3 mb-4 text-2xl font-semibold border-b text-primary">ITINERARY CHANGES</h2>
                        <div class="prose max-w-none">
                            <p>Flight delays due to weather are common. Clients are responsible for extra accommodation/meal
                                costs. We'll help adjust the itinerary when necessary.</p>
                        </div>
                    </div>

                    <!-- Trip Flexibility -->
                    <div class="p-6 bg-white rounded-lg shadow-sm">
                        <h2 class="pb-3 mb-4 text-2xl font-semibold border-b text-primary">TRIP FLEXIBILITY</h2>
                        <div class="prose max-w-none">
                            <p>Date changes must be requested at least 30 days prior. A US$100 amendment fee applies.
                                Last-minute changes may cost more.</p>
                        </div>
                    </div>

                    <!-- Insurance & Medical -->
                    <div class="p-6 bg-white rounded-lg shadow-sm">
                        <h2 class="pb-3 mb-4 text-2xl font-semibold border-b text-primary">INSURANCE & MEDICAL</h2>
                        <div class="prose max-w-none">
                            <p>Travel insurance covering emergency evacuation, medical expenses, and trip cancellation is
                                mandatory. We are not responsible for injuries or health issues during the trip.</p>
                        </div>
                    </div>

                    <!-- Missed Services -->
                    <div class="p-6 bg-white rounded-lg shadow-sm">
                        <h2 class="pb-3 mb-4 text-2xl font-semibold border-b text-primary">MISSED SERVICES</h2>
                        <div class="prose max-w-none">
                            <p>No refunds for missed or unused services due to voluntary or involuntary reasons (sickness,
                                early departure, etc.).</p>
                        </div>
                    </div>

                    <!-- Visa & Passport -->
                    <div class="p-6 bg-white rounded-lg shadow-sm">
                        <h2 class="pb-3 mb-4 text-2xl font-semibold border-b text-primary">VISA & PASSPORT</h2>
                        <div class="prose max-w-none">
                            <p>Ensure your passport is valid for 6 months beyond your trip. Nepal visas are available on
                                arrival. Bhutan visas are arranged by us. Tibet visas vary depending on entry point.</p>
                        </div>
                    </div>

                    <!-- Child Policy -->
                    <div class="p-6 bg-white rounded-lg shadow-sm">
                        <h2 class="pb-3 mb-4 text-2xl font-semibold border-b text-primary">CHILD POLICY</h2>
                        <div class="prose max-w-none">
                            <p>Children under 16 must travel with a legal guardian.</p>
                        </div>
                    </div>

                    <!-- Privacy -->
                    <div class="p-6 bg-white rounded-lg shadow-sm">
                        <h2 class="pb-3 mb-4 text-2xl font-semibold border-b text-primary">PRIVACY</h2>
                        <div class="prose max-w-none">
                            <p>Personal details collected for booking are confidential and secure. We do not share your
                                information.</p>
                        </div>
                    </div>

                    <!-- Updates to Terms -->
                    <div class="p-6 bg-white rounded-lg shadow-sm">
                        <h2 class="pb-3 mb-4 text-2xl font-semibold border-b text-primary">UPDATES TO TERMS</h2>
                        <div class="prose max-w-none">
                            <p>We may update these terms at any time. The current version is always on our website.</p>
                        </div>
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
            <aside class="w-full mt-6 lg:w-1/4 lg:mt-0">
                <div class="sticky top-6">
                    <div class="p-6 bg-white rounded-lg shadow-md">
                        <h3 class="mb-4 text-xl font-bold text-gray-800">Related Pages</h3>
                        <ul class="space-y-3">
                            <li class="pb-3 border-b">
                                <a href="#" class="text-blue-600 transition-colors hover:text-blue-800">Discount Offer</a>
                            </li>
                            <li class="pb-3 border-b">
                                <a href="#" class="text-blue-600 transition-colors hover:text-blue-800">Terms &
                                    Conditions</a>
                            </li>
                            <li class="pb-3 border-b">
                                <a href="#" class="text-blue-600 transition-colors hover:text-blue-800">How to Pay</a>
                            </li>
                            <li class="pb-3 border-b">
                                <a href="#" class="text-blue-600 transition-colors hover:text-blue-800">Book Your Trip</a>
                            </li>
                            <li>
                                <a href="#" class="text-blue-600 transition-colors hover:text-blue-800">Pay Online</a>
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