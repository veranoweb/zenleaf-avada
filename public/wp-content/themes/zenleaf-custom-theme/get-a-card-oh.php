<?php

/**
 * Template Name: Get a Card Help - Ohio
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
            "RegionStr": "#state", // State
            "UsrRefStore": "#location", // Ref Store
            "UsrPreferredContMethod": "#contactMethod",
            "UsrHowCanWeHelp": "#UsrHowCanWeHelp",
            "UsrConsentDate": "#UsrConsentDate",
            "UsrConsentString": "#user_consent",

        },
        contactFields: {
            "FullName": "css-selector", // Name of a contact
            "Phone": "css-selector", // Contact's mobile phone
            "Email": "css-selector" // Contact's email
        },
        customFields: {},
        landingId: "ffa79aef-613f-4429-8372-d19d51e8c8ff",
        serviceUrl: "https://verano.creatio.com:443/0/ServiceModel/GeneratedObjectWebFormService.svc/SaveWebFormObjectData",
        redirectUrl: "https://oh.zenleafdispensaries.com/card-help-success"
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




jQuery(document).ready(function() {
    //set initial state.
    jQuery('#user_consent').val(this.checked);
    jQuery('#state').val("OH");

    jQuery('#agree').change(function() {
        jQuery('#user_consent').val(this.checked);     
        var today = new Date();
        var date = (today.getMonth()+1)+' / '+today.getDate()+' / '+today.getFullYear();
        document.getElementById("UsrConsentDate").value = date;
        document.getElementById("state").value = "OH";
    });
});

</script>

<div class="w-full bg-gray-100 text-black">
    <div class="max-w-5xl mx-auto py-6 px-4">    
        <h1 class="text-3xl font-subheading normal-case text-center leading-normal" style="line-height:1.2em;">Get Help Becoming an Ohio <span class="block lg:inline">Medical Marijuana Patient</span></h1>
        <p class="text-lg lg:text-xl  mb-3 text-center mx-auto max-w-md lg:max-w-none" >Wondering how to get your medical marijuana card in Ohio? <span class="lg:block">Curious as to what the qualifying conditions, purchase limits, and fees are?</span>
</p>

        <p class="text-xl font-bold mb-4 text-center">We are here to help.</p>
    </div>

</div>


<div class="my-4 lg:my-8 px-4 xl:px-0">
    <div class="p-8 mx-auto border border-gray-500 w-full max-w-2xl rounded ">
        <form onsubmit="createObject(); return false">
        <div class="grid lg:grid-cols-2 gap-4">
                <div class="mb-2">
                    <label for="ullname" class="block uppercase">Full Name:</label>
                    <div class="mt-1">
                        <input type="text" id="fullname" name="fullname" class="nameField text-left px-3 py-2 text-black focus:border-black sm:text-sm rounded-md border-gray-500 block" style="border:1px solid #747474; color:black;" required>
                    </div>
                </div>
                <div class="mb-2">
                    
                <label for="contactMethod" class="uppercase">Preferred Contact Method:</label>
                        <select name="contactMethod" id="contactMethod" class="block w-full pl-3 pr-10 py-2 text-base border-gray-500 focus:outline-none focus:ring-black focus:border-black sm:text-sm rounded-md" style="border:1px solid #747474; font-size:18px; color:black;" required>
                        <option value=""  class="text-grey-800 text-base py-2" disabled selected>-- Please choose an option --</option>

                            <option value="phone" class="text-black text-base py-2">Phone Call</option>
                            <option value="e-mail" class="text-black text-base py-2">E-mail</option>
                            <option value="both" class="text-black text-base py-2">Both</option>
                        </select>
                </div>
                <input type="hidden" name="fullname" id="fullname">
            </div>
            <div class="grid lg:grid-cols-2 gap-4 mt-2 lg:mt-0">
            <div class="mb-2">
                    <label for="email" class="block uppercase">E-mail Address:</label>
                    <div class="mt-1">
                        <input type="text" id="email" name="email" class="text-left px-3 py-2 text-black focus:border-black sm:text-sm rounded-md border-gray-500 block" style="border:1px solid #747474; color:black;" required>
                    </div>
                </div>
                <div class="mb-2">
                    <label for="phoneNumber" class="block uppercase">Phone Number:</label>
                    <div class="mt-1">
                        <input type="text" id="phoneNumber" name="phoneNumber" class="text-left px-3 py-2 text-black focus:border-black sm:text-sm rounded-md border-gray-500 block" style="border:1px solid #747474; color:black;" required>
                    </div>
                </div>
                
            </div>
            <div class="grid lg:grid-cols-2 gap-4 mt-2 lg:mt-0">
            <div class="mb-2">
                    

                    <div class="mt-1 mb-2">

                    <label for="UsrHowCanWeHelp" class="uppercase">How Can We Help?</label>
                        <select name="UsrHowCanWeHelp" id="UsrHowCanWeHelp" class="block w-full pl-3 pr-10 py-2 text-base border-gray-500 focus:outline-none focus:ring-black focus:border-black sm:text-sm rounded-md" style="border:1px solid #747474; font-size:18px; color:black;" required>
                            <option value=""  class="text-grey-800 text-base py-2" disabled selected>-- Please choose an option --</option>

                            <option value="New Patient" class="text-black text-base py-2">I am a new patient</option>
                            <option value="Renewal" class="text-black text-base py-2">I need help renewing my card</option>
                            <option value="Other" class="text-black text-base py-2">Other</option>
                        </select>
                    </div>
                </div>
                <div class="mb-2">
                    <div class="mt-1 mb-2">
                    <input type="hidden" id="state" name="state" value="OH" >
                        <label for="location" class="uppercase">Preferred Location:</label>
                        <select name="location" id="location" class="block w-full pl-3 pr-10 py-2 text-base border-gray-500 focus:outline-none focus:ring-black focus:border-black sm:text-sm rounded-md" style="border:1px solid #747474; font-size:18px; color:black;" required>
                            <option value=""  class="text-grey-800 text-base py-2" disabled selected>-- Please choose an option --</option>

                            <option value="OH004" class="text-black text-base py-2">Bowling Green</option>
                            <option value="OH002" class="text-black text-base py-2">Canton</option>
                            <option value="OH003" class="text-black text-base py-2">Cincinnati</option>
                            <option value="OH005" class="text-black text-base py-2">Dayton (Riverside)</option>
                            <option value="OH001" class="text-black text-base py-2">Newark</option>

                        </select>

                        
                    </div>
                </div>
                
            </div>
            <div>
                <div class="mb-2">
                    <div class="block w-full mb-4">

                

                        <input type="submit" class="bg-black rounded-md text-white px-4 py-2 mt-4 block w-full uppercase cursor-pointer hover:bg-gray-800 tracking-wider" style="border-radius:4px;" value="Agree and Submit">
                    </div>
                    <div class="relative flex items-start my-2">
                        <div class="flex items-center h-5 my-1">
                            <input id="agree" aria-describedby="agree-description" name="agree" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" required>
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="agree" class="font-medium text-gray-700 tracking-wider">
                                By clicking Agree and Submit, I hereby agree and consent to have the Zen Leaf Outreach Team securely and electronically store and use my personal contact information which I have provided to contact me by telephone and/or e-mail to provide me with information, for informational purposes only, regarding the medical marijuana program and how to obtain a medical marijuana card in my state of residency.
                            </label>
                        </div>
                        
                    </div>
                    <input type="hidden" name="user_consent" value="" id="user_consent">
                    <input type="hidden" name="UsrConsentDate" value="" id="UsrConsentDate">
        </form>
    </div>
</div>


<?php
get_footer();
?>