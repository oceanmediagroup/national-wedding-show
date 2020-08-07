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
            <td>
                Name
            </td>
            <td>
                <input class="text" type="text" name="cd_FIRSTNAME"/>
            </td>
        </tr>
        <tr>
            <td>
                Email
            </td>
            <td>
                <input type="email" name="Email">
            </td>
        </tr>

        <tr>
            <td>
                Engagement date
            </td>
            <td>
                <input class="text" type="date" name="cd_ENGAGEMENT_DATE"/>
            </td>
        </tr>
        <tr>
            <td>
                Wedding Date
            </td>
            <td>
                <input class="text" type="date" name="cd_DATE_OF_WEDDING" min="<?php echo date('Y-m-d'); ?>" />
            </td>
        </tr>

        <tr>
            <td>
                Postcode*
            </td>
            <td>
                <input class="text" type="text" name="cd_POSTCODE" />
            </td>
        </tr>
        <tr>
            <td>
                Show location (NWS)
            </td>
            <td>
                <div class="select-style">
                    <select class="text" type="text" name="cd_WHICH_SHOW" >
                        <option value=""></option>
                        <option value="London">London</option>
                        <option value="Manchester">Manchester</option>
                        <option value="Birmingham">Birmingham</option>
                    </select>
                </div>
            </td>
        </tr>
        <tr>
            <td>Budget</td>
            <td>
                <div class="select-style">
                    <select class="text" type="text" name="cd_WD_BUDGET">
                        <option value=""></option>
                        <option value="0-10000">£0 - £10,000</option>
                        <option value="10000-20000">£10,000 - £20,000</option>
                        <option value="20000-30000">£20,000 - £30,000</option>
                        <option value="30000-40000">£30,000 - £40,000</option>
                        <option value="40000+">£40,000 +</option>
                    </select>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                Wedding Location
            </td>
            <td>
                <div class="select-style">
                    <select class="text" type="text" name="cd_LOCATION_OF_WEDDING">
                        <option value=""></option>
                        <option value="All UK Regions">All UK Regions </option>
                        <option value="Option International">Option ‘International’</option>
                        <option value="Option Not yet decided">Option ‘Not yet decided’</option>
                    </select>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                Gender
            </td>
            <td>
                <div class="select-style">
                    <select class="text" type="text" name="cd_GENDER">
                        <option value=""></option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Nonbinary">Nonbinary</option>
                        <option value="Other">Other</option>
                        <option value="Choose not to answer">Choose not to answer</option>
                    </select>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                Partner gender
            </td>
            <td>
                <div class="select-style">
                    <select class="text" type="text" name="cd_PARTNER_GENDER">
                        <option value=""></option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Nonbinary">Nonbinary</option>
                        <option value="Other">Other</option>
                        <option value="Choose not to answer">Choose not to answer</option>
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
                <input class="checkbox" type="checkbox" name="cd_SISTER_OPT_IN_radio" value="y">
                <span>
                    Ocean Media Group, organiser of this event, would like to contact you by email with news and offers from our other products confetti.co.uk, <br> Wedding Style collective and wedify. Please tick this box to receive them. View our privacy policy.
                </span>
            </td>
        </tr>
        <tr class="w-100 secondary">
            <td>
                <input class="checkbox" type="checkbox" name="cd_TERMS_OPT_IN_radio" value="y">
                <span>
                    * By entering my details, I accept the terms and conditions and opt in to being emailed about Ocean Media Group's wedding products which include The National Wedding Shows & Confetti.
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
