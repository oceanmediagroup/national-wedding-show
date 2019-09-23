<form
    name="signup"
    id="signup-old"
    class="js-dotmailer-form js-dotmailer-form--old"
    action="https://oceanmediaemail.co.uk/signup.ashx"
    method="post"
    >
	<input type="hidden" name="cd_FORM_ID" value="organic">
    <input type="hidden" name="addressbookid" value="1025966">
    <input type="hidden" name="ci_isconsentform" value="true">
    <input type="hidden" name="userid" value="69771">
    <input type="hidden" name="SIG4c62b1c95b999e2912b2b260eae2fdff47fd111357181e9cc3ed05fa72ffc001"
           value="">
    <!-- ReturnURL - when the user hits submit, they'll get sent here -->
    <input type="hidden" name="ReturnURL" value="">
    <!-- Email - the user's email address -->
    <table>
        <tr>
            <td>First Name*</td>
            <td><input class="text" type="text" name="cd_FIRSTNAME" required/></td>
        </tr>
        <tr>
            <td>Last Name*</td>
            <td><input class="text" type="text" name="cd_LASTNAME" required/></td>
        </tr>

        <tr>
            <td>
                Email*
            </td>
            <td><input type="text" name="Email" required></td>
        </tr>
        <tr>
            <td>Date of Wedding*</td>
            <td><input type="text"
                       name="cd_DATE_OF_WEDDING" required/></td>
        </tr>

        <tr>
            <td>Postcode*</td>
            <td><input class="text" type="text" name="cd_POSTCODE" required/></td>
        </tr>
        <tr>
            <td>Which Show*</td>
            <!--            <td><input class="text" type="text" name="cd_WHICH_SHOW"/></td>-->

            <td>
                <div class="select-style">
                    <select class="text" type="text" name="cd_WHICH_SHOW" id="cd_WHICH_SHOW" required>
                        <option value></option>
                        <option value="Olympia London">Olympia London</option>
                        <option value="Manchester Central">Manchester Central</option>
                        <option value="NEC Birmingham">NEC Birmingham</option>
                        <option value="ExCeL London">ExCeL London</option>

                    </select>
                </div>
            </td>

        </tr>
        <tr class="w-100">
            <td class="w-100">
                <!-- <div
                    class="g-recaptcha"
                    id="RecaptchaField2"
                    data-callback="capcha_filled"
                    data-expired-callback="capcha_expired"
                    ></div> -->
            </td>
        </tr>
        <tr class="w-100 secondary">
            <td>
                <input class="checkbox" type="checkbox" name="cd_WEDDING_OPT_IN_radio" value="y" required>
                <span>
                    * By entering my details, I accept the terms and conditions and opt in to being emailed about The National Wedding Show news and products.
                </span>
            </td>
        </tr>
        <tr class="w-100 secondary">
            <td>
                <input class="checkbox" type="checkbox" name="cd_SISTER_OPT_IN_radio" value="y">
                <span>
                    Ocean Media Group, organiser of this event, would like to contact you by email with news and offers from our other products confetti.co.uk, <br> Wedding Style collective and wedify. Please tick this box to receive them. View our privacy policy.
                </span>
            </td>
        </tr>
        <tr class="w-100 secondary">
            <td>
                <span class="fields-info">FIELDS MARKED WITH AN * ARE MANDATORY.</span>
            </td>
        </tr>

        <tr class="w-100 secondary">
            <td>
                <div
                    class="g-recaptcha"
                    id="RecaptchaField2"
                    data-callback="capcha_filled_old"
                    data-expired-callback="captcha_expired_old"
                    data-error-callback="captcha_error_old"
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
            </td>
        </tr>


    </table>
    <input type="hidden" name="ci_userConsentText" value="">

    <input type="hidden" id="ci_consenturl" name="ci_consenturl" value="">

    <input type="hidden" class="js-recaptcha-response" name="grecaptcha_old" value="" required>

    <p><input type="Submit" name="Submit" value="ENTER NOW"></p>


</form>
<script>
    function capcha_filled_old (response) {
        var form = document.querySelector('.js-dotmailer-form--old')
        var captchaResponse = form.querySelector('.js-recaptcha-response')
        captchaResponse.value = response
    }
    function captcha_expired_old (response) {
        var form = document.querySelector('.js-dotmailer-form--old')
        var captchaResponse = form.querySelector('.js-recaptcha-response')
        captchaResponse.value = ''
    }
    function captcha_error_old (response) {
        console.log('Captcha error (-old)')
    }
</script>
gt