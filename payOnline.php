<?php
include("./admin/includes/config.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Advanced Adventures - Nepal Trekking & Tours</title>

  <?php
  include("header.php")
  ?>
  <div class="container p-4 mx-auto">
    <!-- Navigation Breadcrumb -->
    <div class="flex items-center mb-6 text-sm">
      <a href="#" class="text-blue-500">
        <svg xmlns="http://www.w3.org/2000/svg" class="inline w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
        </svg>
      </a>
      <span class="mx-2">›</span>
      <span class="text-gray-600">Pay</span>
    </div>

    <div class="flex flex-col gap-4 lg:flex-row">
      <!-- Left Side - Online Payment Form -->
      <div class="flex-1 p-6 bg-white border border-gray-200 rounded-md shadow-sm">
        <div class="pb-2 mb-4 border-b">
          <h2 class="text-xl font-medium">Pay us online</h2>
          <div class="flex border-b">
            <div class="py-2 active-tab">Online Payment</div>
          </div>
        </div>

        <form action="process_payment.php" method="post" class="space-y-4">
          <!-- Trip Selection -->
          <div class="space-y-1">
            <label class="block text-sm">
              <span class="text-gray-700">* Your selected trip</span>
            </label>
            <div class="relative">
              <select name="trip_package" class="block w-full px-4 py-2 pr-8 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                <option value="" selected disabled>Select your package</option>
                <option value="package1">Everest Base Camp Trek</option>
                <option value="package2">Annapurna Circuit</option>
                <option value="package3">Langtang Valley Trek</option>
              </select>
              <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
              </div>
            </div>
          </div>

          <!-- Full Name and Email on same row for larger screens -->
          <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
            <div class="space-y-1">
              <label class="block text-sm">
                <span class="text-gray-700">* Your Full Name</span>
              </label>
              <input type="text" name="full_name" placeholder="Enter your full name" class="block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div class="space-y-1">
              <label class="block text-sm">
                <span class="text-gray-700">* Your Email</span>
              </label>
              <input type="email" name="email" placeholder="Enter your email" class="block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500">
            </div>
          </div>

          <!-- Payment Amount -->
          <div class="space-y-1">
            <label class="block text-sm">
              <span class="text-gray-700">* Amount you want to pay now</span>
            </label>
            <input type="text" name="amount" placeholder="Enter amount you would like to pay" class="block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500">
          </div>

          <!-- Note about Service Charge -->
          <div class="p-3 text-sm rounded-md bg-blue-50">
            <span class="font-medium">Note:</span> All payments made via Card is subject to 4% Service Charge. Service Charge applies to all payments: deposits, final balances, trip extensions and miscellaneous purchases. Your card will be processed by Himalayan Bank Limited securely
          </div>

          <!-- Terms and Conditions Checkbox -->
          <div class="flex items-start space-x-2">
            <input type="checkbox" name="agree_terms" id="agree_terms" class="mt-1">
            <label for="agree_terms" class="text-sm text-gray-700">
              I agree to all the <a href="#" class="text-blue-500">booking terms and conditions</a>
            </label>
          </div>

          <!-- Submit Button -->
          <div>
            <button type="submit" class="px-6 py-2 text-white transition bg-blue-500 rounded-md hover:bg-blue-600">Submit Payment</button>
          </div>
        </form>
      </div>

      <!-- Right Side - Wire Transfer Info -->
      <div class="p-6 bg-white border border-gray-200 rounded-md shadow-sm lg:w-1/3">
        <h2 class="mb-4 text-xl font-medium">Payment by wire transfer</h2>

        <div class="pb-4 mb-4 border-b">
          <div class="space-y-1 text-sm">
            <p><span class="font-medium">Beneficiary Bank:</span> Himalayan Bank Limited</p>
            <p><span class="font-medium">Beneficiary Company:</span> Advanced Adventures Nepal Pvt. Ltd.</p>
            <p><span class="font-medium">Account No:</span> 01902880807014</p>
            <p><span class="font-medium">Swift Code:</span> HIMANPKA</p>
            <p><span class="font-medium">Account Type:</span> Current Account</p>
          </div>
        </div>

        <div class="text-sm">
          <h3 class="mb-2 font-medium">Bank Address:</h3>
          <p>Karmachari Sanchaya Kosh Building</p>
          <p>P.O. Box 20590, Kathmandu, Nepal</p>
          <p><span class="font-medium">Telephones:</span> 4227749, 4250201</p>
          <p><span class="font-medium">Telefax:</span> 977-1-4222800</p>
          <p><span class="font-medium">Telex:</span> 2789 HIBA NP, Swift HIMANPKA</p>
          <p><span class="font-medium">Email:</span> <a href="mailto:himal@himalayanbank.com" class="text-blue-500">himal@himalayanbank.com</a></p>
        </div>

        <!-- Payment Method Icons -->
        <div class="flex mt-6 space-x-2">
          <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b7/MasterCard_Logo.svg/200px-MasterCard_Logo.svg.png" alt="MasterCard" class="h-8">
          <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5e/Visa_Inc._logo.svg/200px-Visa_Inc._logo.svg.png" alt="Visa" class="h-8">
          <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/fa/American_Express_logo_%282018%29.svg/200px-American_Express_logo_%282018%29.svg.png" alt="American Express" class="h-8">
          <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/Old_Visa_Logo.svg/200px-Old_Visa_Logo.svg.png" alt="Discover" class="h-8">
        </div>

        <!-- WhatsApp Button -->
        <div class="flex justify-end mt-6">
          <a href="#" class="p-2 text-white bg-green-500 rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
              <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
            </svg>
          </a>
        </div>
      </div>
    </div>

    <!-- Newsletter Signup -->
    <div class="py-4 mt-6">
      <div class="flex flex-col items-center justify-between md:flex-row">
        <h3 class="mb-4 text-lg font-medium md:mb-0">Sign Up for News Letter for Special Deals & Discounts</h3>
        <div class="flex w-full md:w-auto">
          <input type="email" placeholder="Enter your email address" class="flex-1 px-4 py-2 border border-gray-300 rounded-l-md focus:outline-none focus:ring-blue-500 focus:border-blue-500">
          <button class="px-4 py-2 text-white transition bg-blue-600 rounded-r-md hover:bg-blue-700">Subscribe</button>
        </div>
      </div>
    </div>
  </div>
  <?php
  include("footer.php");
  ?>

  <?php
  // PHP code for processing form would go here in a real implementation
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process form data
    $trip_package = $_POST["trip_package"] ?? '';
    $full_name = $_POST["full_name"] ?? '';
    $email = $_POST["email"] ?? '';
    $amount = $_POST["amount"] ?? '';
    $agree_terms = isset($_POST["agree_terms"]);

    // Validation and payment processing would happen here
    // ...
  }
  ?>

  </body>