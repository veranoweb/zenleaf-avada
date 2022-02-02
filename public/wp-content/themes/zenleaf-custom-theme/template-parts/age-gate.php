<section id="age-verification" class="fixed top-0 left-0 z-50 w-full h-screen flex overflow-hidden text-center sm:text-justify">
    <img class="flex-auto w-1/2 object-cover sm:block hidden" src="/wp-content/uploads/2021/11/zen-leaf-building-age-gate.png" alt="Zen Leaf Office Building">
    <div class="flex-auto w-1/2 flex items-center justify-center bg-white text-black">
        <div class="w-full max-w-xs px-5 pb-5">
            <img class="mx-auto sm:mx-0" src="/wp-content/uploads/2021/12/zen-leaf-logo-262.svg" alt="Zen Leaf Logo">
            <h2 class="text-3xl mb-0 font-bold">WELCOME TO ZEN LEAF</h2>
            <p class="text-2xl mb-8">Before we let you in...</p>
            <p class="text-2xl mb-1 leading-10">
                Are you at least 21 years old?
            </p>
            <p class="text-sm italic">
                *For Pennsylvania and Maryland you must be 18+
            </p>
            <div class="mt-9 mb-3 flex gap-4">
                <button onclick="ragevAgeVerificationConfirm()" class="w-1/2 bg-black text-lg leading-6 text-white px-12 font-bold py-5 rounded-md">YES</button>
                <button onclick="ragevAgeVerificationFailed()" class="w-1/2 bg-black text-lg leading-6 text-white px-12 font-bold py-5 rounded-md">NO</button>
            </div>
            <p class="text-sm text-gray-600">
                By clicking “YES” and entering this website, you agree to be bound by the <a class="text-black underline font-bold" href="/terms-of-use/" rel="noopener">Terms of Service</a> &amp; <a class="text-black underline font-bold" href="/privacy-policy/"
                    rel="noopener">Privacy Policy</a>.
            </p>
        </div>
    </div>
</section>

<script>
    var ageCookieName = "zld-agev-age-verification-passed";

    function ageSetCookie(cname, cvalue, exhours) {
        var d = new Date();
        d.setTime(d.getTime() + (exhours * 60 * 60 * 1000));
        var expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    function ageGetCookie(cname) {
        var name = cname + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }

    function ragevAgeVerificationHide() {
        var ragevAgeVerificationModel = document.getElementById('age-verification');
        ragevAgeVerificationModel.style.display = 'none';
        document.getElementsByTagName('body')[0].style.overflow = 'auto';
    }

    function ragevAgeVerificationShow() {
        var ragevAgeVerificationModel = document.getElementById('age-verification');
        ragevAgeVerificationModel.style.display = 'flex';
        document.getElementsByTagName('html')[0].style.overflow = 'hidden';
    }

    function ragevAgeVerificationLoad() {
        try {
            var agePass = ageGetCookie(ageCookieName);
            var previewing = window.location.href.indexOf('preview_age_verification') > -1;
            if (agePass != "" && !previewing) {
                ragevAgeVerificationHide();
                return;
            } else {
                ragevAgeVerificationShow();
            }
        } catch (err) {
            ragevAgeVerificationShow();
        }
    }

    function ragevAgeVerificationConfirm() {
        ageSetCookie(ageCookieName, "verified", 8760); // 1 year
        ragevAgeVerificationHide();
    }

    function ragevAgeVerificationFailed() {
        window.history.back();

        if(window.parent != null) { //has a parent opener
            setTimeout(window.close, 150); // Close the windows if click to NO
        }
    }

    /** EDIT: Run ASAP //OLD: Run the verification after DOM has been loaded **/
    //document.addEventListener("DOMContentLoaded", function(event) {
    ragevAgeVerificationLoad();
</script>