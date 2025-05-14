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


    <div class="px-4 py-8 mx-auto lg:px-8">
        <div class="flex items-center mb-6 text-gray-600">
            <a href="/" class="hover:text-blue-500">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                    </path>
                </svg>
            </a>
            <span class="mx-2">→</span>
            <span>How to Pay</span>
        </div>
        <div class="flex flex-col gap-6 lg:flex-row">
            <div class="p-4 bg-white rounded-lg shadow-md lg:w-3/4 sm:p-6">

                <h1 class="pb-4 mb-6 text-3xl font-bold text-indigo-800 border-b">How to Pay</h1>

                <!-- Image container - ADDED HERE -->
                <div class="mb-8">
                    <img src="assets/howtopay.png" alt="Payment Methods" class="w-full h-auto rounded-lg shadow-md">
                </div>

                <div class="p-5 mb-8 border-l-4 border-blue-500 rounded-lg bg-blue-50">
                    <p class="mb-3 leading-relaxed text-gray-800">
                        Advanced Adventures Nepal offers secure and convenient payment options for your Himalayan
                        adventures across Nepal, Bhutan, and Tibet.
                    </p>
                    <div class="flex flex-col mt-2 md:flex-row md:space-x-6">
                        <div class="flex-1 p-3 mb-3 bg-white border border-blue-100 rounded shadow-sm md:mb-0">
                            <p class="font-medium text-center">Nepal Trips</p>
                            <p class="text-2xl font-bold text-center text-indigo-700">20%</p>
                            <p class="text-sm text-center text-gray-600">Advance Deposit</p>
                        </div>
                        <div class="flex-1 p-3 bg-white border border-blue-100 rounded shadow-sm">
                            <p class="font-medium text-center">Bhutan & Tibet Trips</p>
                            <p class="text-2xl font-bold text-center text-indigo-700">50%</p>
                            <p class="text-sm text-center text-gray-600">Advance Deposit</p>
                        </div>
                    </div>
                </div>

                <!-- Payment Options -->
                <div class="space-y-8">
                    <!-- Option 1 -->
                    <div class="p-6 transition-all bg-white border border-gray-200 rounded-lg hover:shadow-md">
                        <div class="flex items-center mb-4">
                            <div class="flex items-center justify-center w-12 h-12 mr-4 bg-indigo-100 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-indigo-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                </svg>
                            </div>
                            <h2 class="text-xl font-semibold text-indigo-700">Option 1: Pay Online</h2>
                        </div>
                        <p class="mb-4 ml-16">
                            Make a secure online payment using major credit cards including Visa, MasterCard, American
                            Express, and more.
                        </p>
                        <div class="ml-16">
                            <a href="#"
                                class="inline-flex items-center px-4 py-2 text-white transition-colors bg-indigo-600 rounded-md hover:bg-indigo-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                                Pay Online Now
                            </a>
                        </div>
                    </div>

                    <!-- Option 2 -->
                    <div class="p-6 transition-all bg-white border border-gray-200 rounded-lg hover:shadow-md">
                        <div class="flex items-center mb-4">
                            <div class="flex items-center justify-center w-12 h-12 mr-4 bg-indigo-100 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-indigo-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                            </div>
                            <h2 class="text-xl font-semibold text-indigo-700">Option 2: Bank Wire Transfer</h2>
                        </div>
                        <div class="ml-16">
                            <div class="p-5 border border-gray-200 rounded-md shadow-sm bg-gray-50">
                                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                                    <div>
                                        <p><span class="font-semibold text-gray-700">Beneficiary Bank:</span> Himalayan
                                            Bank Limited</p>
                                        <p><span class="font-semibold text-gray-700">Company:</span> Advanced Adventures
                                            Nepal Pvt. Ltd.</p>
                                        <p><span class="font-semibold text-gray-700">Account No:</span> 019-0288020014
                                        </p>
                                        <p><span class="font-semibold text-gray-700">Swift Code:</span> HIMANPKA</p>
                                        <p><span class="font-semibold text-gray-700">Account Type:</span> Current
                                            Account</p>
                                    </div>
                                    <div>
                                        <p><span class="font-semibold text-gray-700">Bank Address:</span> Tridevi Marg,
                                            Kathmandu, Nepal</p>
                                        <p><span class="font-semibold text-gray-700">Tel:</span> +977-1-4227749, 4250201
                                        </p>
                                        <p><span class="font-semibold text-gray-700">Telex:</span> 2972 HIBA NP</p>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 text-sm text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="inline w-4 h-4 mr-1 text-blue-500"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                SWIFT is used for transferring money globally (similar to BIC).
                            </p>
                        </div>
                    </div>

                    <!-- Option 3 -->
                    <div class="p-6 transition-all bg-white border border-gray-200 rounded-lg hover:shadow-md">
                        <div class="flex items-center mb-4">
                            <div class="flex items-center justify-center w-12 h-12 mr-4 bg-indigo-100 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-indigo-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </div>
                            <h2 class="text-xl font-semibold text-indigo-700">Option 3: Western Union / Money Gram</h2>
                        </div>
                        <div class="ml-16">
                            <div class="p-5 border border-gray-200 rounded-md shadow-sm bg-gray-50">
                                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                                    <div>
                                        <p><span class="font-semibold text-gray-700">First Name:</span> Keshav</p>
                                        <p><span class="font-semibold text-gray-700">Middle Name:</span> Raj</p>
                                        <p><span class="font-semibold text-gray-700">Last Name:</span> Wagley</p>
                                    </div>
                                    <div>
                                        <p><span class="font-semibold text-gray-700">City:</span> Kathmandu</p>
                                        <p><span class="font-semibold text-gray-700">Country:</span> Nepal</p>
                                    </div>
                                </div>
                            </div>
                            <p class="flex items-start mt-3 text-sm text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-4 w-4 mr-1 text-blue-500 mt-0.5 flex-shrink-0" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>Please send the MTCN, sender name, address, and reservation ID to confirm the
                                    transfer.</span>
                            </p>
                        </div>
                    </div>

                    <!-- Remaining Payment -->
                    <div class="p-6 transition-all bg-white border border-gray-200 rounded-lg hover:shadow-md">
                        <div class="flex items-center mb-4">
                            <div class="flex items-center justify-center w-12 h-12 mr-4 bg-indigo-100 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-indigo-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 11V9a2 2 0 00-2-2m2 4v4a2 2 0 104 0v-1m-4-3H9m2 0h4m6 1a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <h2 class="text-xl font-semibold text-indigo-700">Remaining Payment (Balance Payment)</h2>
                        </div>
                        <div class="ml-16">
                            <p class="text-gray-800">
                                The remaining trip payment can be made after your arrival in Kathmandu via:
                            </p>
                            <ul class="mt-2 ml-4 space-y-1 text-gray-700 list-disc list-inside">
                                <li>Cash payment (USD, EUR, or NPR)</li>
                                <li>Bank wire transfer</li>
                                <li>Credit card (with 4% surcharge)</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Contact Section -->
                <div class="pt-6 mt-8 border-t">
                    <p class="mb-2 text-lg font-semibold text-indigo-800">
                        Please contact us 24/7 if you have any confusion or questions regarding payment.
                    </p>
                    <div class="flex mt-3">
                        <a href="tel:+9779851232645"
                            class="flex items-center mr-6 text-indigo-600 hover:text-indigo-800">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            +977-9851232645
                        </a>
                        <a href="mailto:info@advadventures.com"
                            class="flex items-center text-indigo-600 hover:text-indigo-800">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            info@advadventures.com
                        </a>
                    </div>
                </div>
            </div>

            <!-- Related Pages Section -->
            <div class="mt-0 lg:w-1/4">
                <div class="p-4 bg-white rounded-lg shadow-md sm:p-6">
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
        </div>

        <!-- Newsletter Section -->
        <div class="mt-6">
            <div class="p-4 rounded-lg shadow-sm bg-indigo-50 sm:p-6">
                <div class="flex flex-col justify-between sm:flex-row sm:items-center">
                    <div class="mb-4 sm:mb-0">
                        <p class="text-lg font-medium text-gray-800">Sign Up for Newsletter for Special Deals &
                            Discounts</p>
                        <p class="mt-1 text-sm text-gray-600">Stay updated with our latest offers and travel packages
                        </p>
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
    <?php
    include("footer.php");
    ?>


    </body>

</html>