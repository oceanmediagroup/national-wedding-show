<?php
/**
 * Created by PhpStorm.
 * User: Dominika
 * Date: 05/09/2018
 * Time: 15:31
 */ ?>
<!-- Start of signup -->
<style>

    #g-recaptcha-response {
        display: block !important;
        position: absolute;
        margin: -78px 0 0 0 !important;
        width: 302px !important;
        height: 76px !important;
        z-index: -999999;
        opacity: 0;
    }

</style>
<script language="javascript">
    window.onload = function() {
        var $recaptcha = document.querySelector('#g-recaptcha-response');
        if($recaptcha) {
            $recaptcha.setAttribute("required", "required");
        }
    };

    var allowSubmit = false;

    function capcha_filled () {
        allowSubmit = true;
    }
    function capcha_expired () {
        allowSubmit = false;
    }
    function check_if_capcha_is_filled (e) {
        if(allowSubmit) return true;
        e.preventDefault();
        alert('You have to fill the captcha.');
    }

    function validate_signup(frm) {
        var emailAddress = frm.Email.value;
        var errorString = '';

        if (emailAddress == '' || emailAddress.indexOf('@') == -1) {
            errorString = 'Please enter your email address';
        }

        if (allowSubmit) {
            var isError = false;
            if (errorString.length > 0)
                isError = true;

            if (isError)
                alert(errorString);
            return !isError;
        }
    }

</script>
<script src='https://oceanmediaemail.co.uk/inc/cal.js'></script>

<form name="signup" id="signup" action="https://oceanmediaemail.co.uk/signup.ashx" method="post" onsubmit="return validate_signup(this)">

    <div class="newsletter-container">

        <p class="modal-subtitle text-center">Register your details below:</p>
		<input type="hidden" name="cd_FORM_ID" value="pop_up">
        <input type="hidden" name="addressbookid" value="1025966">
        <input type="hidden" name="ci_isconsentform" value="true">
        <input type="hidden" name="userid" value="69771">
        <input type="hidden" name="SIG4c62b1c95b999e2912b2b260eae2fdff47fd111357181e9cc3ed05fa72ffc001" value="">
        <input type="hidden" name="ReturnURL" value="">

        <div class="newsletter-row">
            <input class="text" type="text" name="cd_FIRSTNAME" placeholder="First Name*" required/>
        </div>
        <div class="newsletter-row">
            <input class="text" type="text" name="cd_LASTNAME" placeholder="Last Name*" required/>
        </div>
        <div class="newsletter-row">
            <input type="text" name="Email" placeholder="Email*" required/>
        </div>
        <div class="newsletter-row">
            <input class="date" onclick="displayDatePicker('cd_DATE_OF_WEDDING');" placeholder="Date of Wedding*" type="text" name="cd_DATE_OF_WEDDING" required/>
        </div>
        <div class="newsletter-row">
            <input class="text" type="text" name="cd_POSTCODE" placeholder="Postcode*" required/>
        </div>
        <div class="newsletter-row">
            <div class="select-style">
                <select class="text" type="text" name="cd_WHICH_SHOW" id="cd_WHICH_SHOW" required>
                    <option value=""></option>
                    <option value="Olympia London">Olympia London</option>
                    <option value="Manchester Central">Manchester Central</option>
                    <option value="NEC Birmingham">NEC Birmingham</option>
                    <option value="ExCeL London">ExCeL London</option>

                </select>
            </div>
        </div>
        <div class="newsletter-row checkbox-container">
            <input class="checkbox" type="checkbox" name="cd_WEDDING_OPT_IN_radio" value="y" required>
            <span>
                * By entering my details, I accept the terms and conditions and opt in to being emailed about The National Wedding Show news and products.
            </span>
        </div>
        <div class="newsletter-row checkbox-container">
            <input class="checkbox" type="checkbox" name="cd_SISTER_OPT_IN_radio" value="y">
            <span>
                Ocean Media Group, organiser of this event, would like to contact you by email with news and offers from our other products confetti.co.uk, Wedding Style collective and wedify. Please tick this box to receive them. View our privacy policy.
            </span>
        </div>
        <div class="newsletter-row info-container">
            <span class="fields-info">FIELDS MARKED WITH AN * ARE MANDATORY.</span>
        </div>
        <div class="newsletter-row">
            <div
                class="g-recaptcha"
                data-callback="capcha_filled"
                data-expired-callback="capcha_expired"
                data-sitekey="6LfTGX0UAAAAAP7lO9Y8_BqGB86_-9XFXzbAkxmK"
                ></div>
        </div>
        <div class="newsletter-row">
            <input type="hidden" name="ci_userConsentText" value="">
            <input type="hidden" id="ci_consenturl" name="ci_consenturl" value="">
            <p><input type="Submit" name="Submit" onsubmit="check_if_capcha_is_filled" value="ENTER NOW"/></p>
        </div>

    </div>

</form>

<script language="javascript">
    var urlInput = document.getElementById("ci_consenturl");

    if (urlInput != null && urlInput != 'undefined') {
        urlInput.value = encodeURI(window.location.href);
    }
</script>

<!-- End of signup -->
