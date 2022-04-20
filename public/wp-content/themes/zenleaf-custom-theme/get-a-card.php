<?php

/**
 * Template Name: Get a Card Help
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header();

?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://webtracking-v01.bpmonline.com/JS/track-cookies.js"></script>
<script src="https://webtracking-v01.bpmonline.com/JS/create-object.js"></script>
<script>

/**
* Replace the "css-selector" placeholders in the code below with the element selectors on your landing page.
* You can use #id or any other CSS selector that will define the input field explicitly.
* Example: "Email": "#MyEmailField".
* If you don't have a field from the list below placed on your landing, leave the placeholder or remove the line.
*/
var config = {
    fields: {
      
        "Name": "#fullname", // Name of a visitor, submitting the page
        "Email": "#email", // Visitor's email
        "Zip": "css-selector", // Visitor's ZIP code
        "MobilePhone": "#phoneNumber", // Visitor's phone number
        "Company": "css-selector", // Name of a company (for business landing pages)
        "Industry": "css-selector", // Company industry (for business landing pages)
        "FullJobTitle": "css-selector", // Visitor's job title (for business landing pages)
        "UseEmail": "css-selector", // Logical value: 'true' equals to visitor's opt-in to receive emails
        "City": "css-selector", // City
        "Country": "css-selector", // Country
        "Commentary": "css-selector", // Notes
        "UsrCaregiverName": "css-selector", // Caregiver name
        "UsrPhysician": "css-selector", // Physician
        "Region": "#state", // State
        "UsrRefStore": "#location" // Ref Store
    },
    contactFields: {
        "FullName": "css-selector", // Name of a contact
        "Phone": "css-selector", // Contact's mobile phone
        "Email": "css-selector" // Contact's email
    },
    customFields: {},
    landingId: "ffa79aef-613f-4429-8372-d19d51e8c8ff",
    serviceUrl: "https://verano.creatio.com:443/0/ServiceModel/GeneratedObjectWebFormService.svc/SaveWebFormObjectData",
    redirectUrl: "https://www.zenleafdispensaries.com/card-help-success"
};
/**
* The function below creates a object from the submitted data.
* Bind this function call to the "onSubmit" event of the form or any other elements events.
* Example: <form class="mainForm" name="landingForm" onSubmit="createObject(); return false">
*/
function createObject() {

        landing.createObjectFromLanding(config);


      
}
/**
* The function below inits landing page using URL parameters.
*/
function initLanding() {
    landing.initLanding(config);
}
jQuery(document).ready(initLanding);
</script>

<div class="w-full bg-gray-100 text-black">
     <div class="max-w-5xl mx-auto py-6">
              <h1 class="text-3xl font-subheading normal-case text-center leading-normal" style="line-height:1.2em;">Get Help Becoming a <span class="block lg:inline">New Jersey</span> <span class="block lg:inline">Medical Marijuana Patient</span></h1>
     </div>

 </div>


 
<div class="flex flex-col gap-4 lg:flex-row my-8 mx-auto px-4 w-full" style="margin-left:auto; margin-right:auto; max-width:62rem; ">
    <div class="flex-grow  text-center lg:text-left max-w-lg mx-auto">
    <h2 class="text-lg lg:text-xl font-subheading mb-3" style="text-transform:none !important; font-family:Nourd-Bold;">Wondering how to get your medical cannabis card in New Jersey? Curious as to what the qualifying conditions, purchase limits, and fees are?

</h2>
    <p class="text-xl font-bold mb-4">We are here to help.</p>
    
    <ol class="hidden lg:block">
    <li>Submit this form, including your preferred Zen Leaf location</li>
    <li>Customer Care will respond using the phone number or email address provided</li>
    <li>Start your path to Zen with the best support system in the industry</li>


    </ol>
    </div>

<div class="">
<div class="p-8 mx-auto border border-gray-500 w-full max-w-lg rounded ">
<form onsubmit="createObject(); return false">

<div class="mb-2"> 
    <label for="fullname" class="block uppercase">Full Name:</label>

    <input type="text" id="fullname" name="fullname" class="text-left px-3 py-2 text-black focus:border-black sm:text-sm rounded-md border-gray-500 block" style="border:1px solid #747474; color:black;" required>
    </div>
    <div class="mb-2">
    <label for="email" class="block uppercase">E-mail Address:</label>
    <div class="mt-1">
    <input type="text" id="email" name="email" class="text-left px-3 py-2 text-black focus:border-black sm:text-sm rounded-md border-gray-500 block"  style="border:1px solid #747474; color:black;" required>
    </div>
    </div>
    <div class="mb-2">
    <label for="phoneNumber" class="block uppercase">Phone Number:</label>
    <div class="mt-1">
    <input type="text" id="phoneNumber" name="phoneNumber" class="text-left px-3 py-2 text-black focus:border-black sm:text-sm rounded-md border-gray-500 block"  style="border:1px solid #747474; color:black;" required>
    </div>
    </div>
    <div class="mb-2">
    <input type="hidden" id="state" name="state" value="New Jersey" class="block"  required>
    <div class="mt-1 mb-2">

  <label for="location">Preferred Location:</label>
    <select name="location" id="location"
    class="block w-full pl-3 pr-10 py-2 text-base border-gray-500 focus:outline-none focus:ring-black focus:border-black sm:text-sm rounded-md"  style="border:1px solid #747474; font-size:18px; color:black;"

    required
    >
    <option value="" disabled selected>--Please choose an option--</option>

      <option value="NJ002" class="text-black text-base py-2">Elizabeth</option>
      <option value="NJ003" class="text-black text-base py-2">Lawrence Township</option>
      <option value="NJ001" class="text-black text-base py-2">Neptune Township</option>
  </select>
  </div>
  <div class="mt-3 block">
 
  </div>
  
  <div class="block w-full">
  <input type="submit" class="bg-black rounded-md text-white px-4 py-2 mt-4 block w-full uppercase cursor-pointer hover:bg-gray-800 tracking-wider" style="border-radius:4px;" value="Agree and Submit" >	
</div>
<div class="relative flex items-start my-2">
    <div class="flex items-center h-5 my-1">
      <input id="agree" aria-describedby="agree-description" name="agree" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" checked required>
    </div>
    <div class="ml-3 text-sm">
      <label for="agree" class="font-medium text-gray-700 tracking-wider">
      By clicking Agree and Submit, I hereby agree and consent to have the Zen Leaf Outreach Team securely and electronically store and use my personal contact information which I have provided to contact me by telephone and/or e-mail to provide me with information, for informational purposes only, regarding the medical cannabis program and how to obtain a medical cannabis card in my state of residency.
      </label>
    </div>
  </div>
  </form>
  </div>
  </div>

</div>
<?php
get_footer();
?>