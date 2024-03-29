<form
    name="signup"
    id="signup"
    class="js-dotmailer-form js-dotmailer-form--modal"
    action="https://oceanmediaemail.co.uk/signup.ashx"
    method="post"
    >
    <div class="newsletter-container">

        <p class="modal-subtitle text-center">Register your details below:</p>
		<input type="hidden" name="cd_FORM_ID" value="pop_up">
        <input type="hidden" name="addressbookid" value="1025966">
        <input type="hidden" name="ci_isconsentform" value="true">
        <input type="hidden" name="userid" value="69771">
        <input type="hidden" name="SIG4c62b1c95b999e2912b2b260eae2fdff47fd111357181e9cc3ed05fa72ffc001" value="">
        <input type="hidden" name="ReturnURL" value="">

        <div class="newsletter-row">
            <input class="text" type="text" name="cd_FIRSTNAME" placeholder="Name"/>
        </div>
        <div class="newsletter-row">
            <input class="text" type="text" name="Email" placeholder="Email"/>
        </div>
        <div class="newsletter-row">
            <input class="text datepicker" id="ENGAGEMENTDATE" type="text" name="cd_ENGAGEMENT_DATE" placeholder="Engagement date"/>
        </div>
        <div class="newsletter-row">
            <input class="text datepicker" id="WEDDINGDATE" type="text" name="cd_DATE_OF_WEDDING" min="<?php echo date('Y-m-d'); ?>" placeholder="Wedding Date"/>
        </div>
        <div class="newsletter-row">
            <input class="text" type="text" name="cd_POSTCODE" placeholder="Postcode*"/>
        </div>
        <div class="newsletter-row">
            <div class="select-style">
                <select class="text" type="text" name="cd_WHICH_SHOW">
                    <option value="" disabled selected>Which show are you likely to attend</option>
                    <option value="London">London</option>
                    <option value="Manchester">Manchester</option>
                    <option value="Birmingham">Birmingham</option>
                </select>
            </div>
        </div>
        <div class="newsletter-row">
            <div class="select-style">
                <select class="text" type="text" name="cd_BUDGET">
                    <option value="" disabled selected>Expected wedding budget</option>
                    <option value="0-10000">£0 - £10,000</option>
                    <option value="10000-20000">£10,000 - £20,000</option>
                    <option value="20000-30000">£20,000 - £30,000</option>
                    <option value="30000-40000">£30,000 - £40,000</option>
                    <option value="40000+">£40,000 +</option>
                </select>
            </div>
        </div>
        <div class="newsletter-row">
            <div class="select-style">
                <select class="text" type="text" name="cd_WEDDING_LOCATION">
                    <option value="" disabled selected>Expected wedding location</option>
                    <option value="Scotland">Scotland</option>
                    <option value="Northern Ireland">Northern Ireland</option>
                    <option value="Wales">Wales</option>
                    <option value="North East">North East</option>
                    <option value="North West">North West</option>
                    <option value="Yorkshire and the Humber">Yorkshire and the Humber</option>
                    <option value="West Midlands">West Midlands</option>
                    <option value="East Midlands">East Midlands</option>
                    <option value="South West">South West</option>
                    <option value="South East">South East</option>
                    <option value="East of England">East of England</option>
                    <option value="Greater London">Greater London</option>
                    <option value="International">International</option>
                </select>
            </div>
        </div>
        <div class="newsletter-row">
            <div class="select-style">
                <select class="text" type="text" name="cd_GENDER">
                    <option value="" disabled selected>Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Nonbinary">Nonbinary</option>
                    <option value="Other">Other</option>
                    <option value="Choose not to answer">Choose not to answer</option>
                </select>
            </div>
        </div>
        <div class="newsletter-row">
            <div class="select-style">
                <select class="text" type="text" name="cd_PARTNER_GENDER">
                    <option value="" disabled selected>Partner gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Nonbinary">Nonbinary</option>
                    <option value="Other">Other</option>
                    <option value="Choose not to answer">Choose not to answer</option>
                </select>
            </div>
        </div>
        <div class="newsletter-row checkbox-container">
            <input class="checkbox" type="checkbox" name="cd_TERMS_OPT_IN_radio" value="y">
            <span>
                * By entering my details, I accept the terms and conditions and opt in to being emailed about Ocean Media Group's wedding products which include The National Wedding Shows & Confetti.
            </span>
        </div>
        <div class="newsletter-row info-container">
            <span class="fields-info">FIELDS MARKED WITH AN * ARE MANDATORY.</span>
        </div>
        <div class="newsletter-row">
            <div
                class="g-recaptcha"
                id="RecaptchaField1"
                data-callback="capcha_filled_modal"
                data-expired-callback="captcha_expired_modal"
                data-error-callback="captcha_error_modal"
                ></div>
            <p class="js-form-callback-captcha" style="color: red;">
                <?php _e('Please fill in the captcha.', 'nws'); ?>
            </p>
            <p class="js-form-callback-sent" style="color: green; opacity: 0;">
                <?php _e('', 'nws'); ?>
            </p>
            <p class="js-form-callback-error" style="color: red;">
                <?php _e('There was an error sending your message.', 'nws'); ?>
            </p>
        </div>
        <div class="newsletter-row">
            <input type="hidden" name="ci_userConsentText" value="">
            <input type="hidden" id="ci_consenturl" name="ci_consenturl" value="">
            <input type="hidden" class="js-recaptcha-response" name="grecaptcha_modal" required>

            <p><input type="Submit" name="Submit" value="ENTER NOW"/></p>
        </div>

    </div>

</form>
<script>
    function capcha_filled_modal (response) {
        var form = document.querySelector('.js-dotmailer-form--modal')
        var captchaResponse = form.querySelector('.js-recaptcha-response')
        captchaResponse.value = response
    }
    function captcha_expired_modal (response) {
        var form = document.querySelector('.js-dotmailer-form--modal')
        var captchaResponse = form.querySelector('.js-recaptcha-response')
        captchaResponse.value = ''
    }
    function captcha_error_modal (response) {
        console.log('Captcha error')
    }
</script>
