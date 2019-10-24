@extends('layouts.dashboard')

@section('content')

<!-- Overlay For Sidebars -->
<div class="overlay"></div>

<div id="wrapper" class="container payment-complete">
    @include('partials.navbar')
    <div class="row clearfix">
        <div class="col-md-12 payment-header">
        <h3>Connect Your Accounts to Begin Receiving Payments</h3>
        <p>We need to learn more about you and your business before you can process payments on HUMBL. Except where noted below, the information you provide will only be visible to the account owner and administrators.</p>
        </div>
        <div class="col-md-12">
            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                    <h4 class="panel-title create-stripe-account">
                        {{-- <a data-toggle="collapse" data-parent="#accordion" href="#business_details"> --}}
                        1. Create Stripe Account <span class="required">REQUIRED</span>
                        <a class="btn btn-create-stripe-account pull-right">Create Account</a>
                        {{-- </a> --}}
                    </h4>
                    </div>
                    <div id="business_details" class="panel-collapse collapse in" style="display:none;">
                        <div class="panel-body">
                            <form method="POST" action="{{ route('savePayment') }}" enctype="multipart/form-data">
                            @csrf
                                <div class="form-group">
                                    <label>Country </label>
                                    <select class="form-control" name="country" required>
                                        <option value="" disabled>-- Select Country --</option>
                                        <option value="AF">Afghanistan</option>
                                        <option value="AX">Åland Islands</option>
                                        <option value="AL">Albania</option>
                                        <option value="DZ">Algeria</option>
                                        <option value="AS">American Samoa</option>
                                        <option value="AD">Andorra</option>
                                        <option value="AO">Angola</option>
                                        <option value="AI">Anguilla</option>
                                        <option value="AQ">Antarctica</option>
                                        <option value="AG">Antigua and Barbuda</option>
                                        <option value="AR">Argentina</option>
                                        <option value="AM">Armenia</option>
                                        <option value="AW">Aruba</option>
                                        <option value="AU">Australia</option>
                                        <option value="AT">Austria</option>
                                        <option value="AZ">Azerbaijan</option>
                                        <option value="BS">Bahamas</option>
                                        <option value="BH">Bahrain</option>
                                        <option value="BD">Bangladesh</option>
                                        <option value="BB">Barbados</option>
                                        <option value="BY">Belarus</option>
                                        <option value="BE">Belgium</option>
                                        <option value="BZ">Belize</option>
                                        <option value="BJ">Benin</option>
                                        <option value="BM">Bermuda</option>
                                        <option value="BT">Bhutan</option>
                                        <option value="BO">Bolivia, Plurinational State of</option>
                                        <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                                        <option value="BA">Bosnia and Herzegovina</option>
                                        <option value="BW">Botswana</option>
                                        <option value="BV">Bouvet Island</option>
                                        <option value="BR">Brazil</option>
                                        <option value="IO">British Indian Ocean Territory</option>
                                        <option value="BN">Brunei Darussalam</option>
                                        <option value="BG">Bulgaria</option>
                                        <option value="BF">Burkina Faso</option>
                                        <option value="BI">Burundi</option>
                                        <option value="KH">Cambodia</option>
                                        <option value="CM">Cameroon</option>
                                        <option value="CA">Canada</option>
                                        <option value="CV">Cape Verde</option>
                                        <option value="KY">Cayman Islands</option>
                                        <option value="CF">Central African Republic</option>
                                        <option value="TD">Chad</option>
                                        <option value="CL">Chile</option>
                                        <option value="CN">China</option>
                                        <option value="CX">Christmas Island</option>
                                        <option value="CC">Cocos (Keeling) Islands</option>
                                        <option value="CO">Colombia</option>
                                        <option value="KM">Comoros</option>
                                        <option value="CG">Congo</option>
                                        <option value="CD">Congo, the Democratic Republic of the</option>
                                        <option value="CK">Cook Islands</option>
                                        <option value="CR">Costa Rica</option>
                                        <option value="CI">Côte d'Ivoire</option>
                                        <option value="HR">Croatia</option>
                                        <option value="CU">Cuba</option>
                                        <option value="CW">Curaçao</option>
                                        <option value="CY">Cyprus</option>
                                        <option value="CZ">Czech Republic</option>
                                        <option value="DK">Denmark</option>
                                        <option value="DJ">Djibouti</option>
                                        <option value="DM">Dominica</option>
                                        <option value="DO">Dominican Republic</option>
                                        <option value="EC">Ecuador</option>
                                        <option value="EG">Egypt</option>
                                        <option value="SV">El Salvador</option>
                                        <option value="GQ">Equatorial Guinea</option>
                                        <option value="ER">Eritrea</option>
                                        <option value="EE">Estonia</option>
                                        <option value="ET">Ethiopia</option>
                                        <option value="FK">Falkland Islands (Malvinas)</option>
                                        <option value="FO">Faroe Islands</option>
                                        <option value="FJ">Fiji</option>
                                        <option value="FI">Finland</option>
                                        <option value="FR">France</option>
                                        <option value="GF">French Guiana</option>
                                        <option value="PF">French Polynesia</option>
                                        <option value="TF">French Southern Territories</option>
                                        <option value="GA">Gabon</option>
                                        <option value="GM">Gambia</option>
                                        <option value="GE">Georgia</option>
                                        <option value="DE">Germany</option>
                                        <option value="GH">Ghana</option>
                                        <option value="GI">Gibraltar</option>
                                        <option value="GR">Greece</option>
                                        <option value="GL">Greenland</option>
                                        <option value="GD">Grenada</option>
                                        <option value="GP">Guadeloupe</option>
                                        <option value="GU">Guam</option>
                                        <option value="GT">Guatemala</option>
                                        <option value="GG">Guernsey</option>
                                        <option value="GN">Guinea</option>
                                        <option value="GW">Guinea-Bissau</option>
                                        <option value="GY">Guyana</option>
                                        <option value="HT">Haiti</option>
                                        <option value="HM">Heard Island and McDonald Islands</option>
                                        <option value="VA">Holy See (Vatican City State)</option>
                                        <option value="HN">Honduras</option>
                                        <option value="HK">Hong Kong</option>
                                        <option value="HU">Hungary</option>
                                        <option value="IS">Iceland</option>
                                        <option value="IN">India</option>
                                        <option value="ID">Indonesia</option>
                                        <option value="IR">Iran, Islamic Republic of</option>
                                        <option value="IQ">Iraq</option>
                                        <option value="IE">Ireland</option>
                                        <option value="IM">Isle of Man</option>
                                        <option value="IL">Israel</option>
                                        <option value="IT">Italy</option>
                                        <option value="JM">Jamaica</option>
                                        <option value="JP">Japan</option>
                                        <option value="JE">Jersey</option>
                                        <option value="JO">Jordan</option>
                                        <option value="KZ">Kazakhstan</option>
                                        <option value="KE">Kenya</option>
                                        <option value="KI">Kiribati</option>
                                        <option value="KP">Korea, Democratic People's Republic of</option>
                                        <option value="KR">Korea, Republic of</option>
                                        <option value="KW">Kuwait</option>
                                        <option value="KG">Kyrgyzstan</option>
                                        <option value="LA">Lao People's Democratic Republic</option>
                                        <option value="LV">Latvia</option>
                                        <option value="LB">Lebanon</option>
                                        <option value="LS">Lesotho</option>
                                        <option value="LR">Liberia</option>
                                        <option value="LY">Libya</option>
                                        <option value="LI">Liechtenstein</option>
                                        <option value="LT">Lithuania</option>
                                        <option value="LU">Luxembourg</option>
                                        <option value="MO">Macao</option>
                                        <option value="MK">Macedonia, the former Yugoslav Republic of</option>
                                        <option value="MG">Madagascar</option>
                                        <option value="MW">Malawi</option>
                                        <option value="MY">Malaysia</option>
                                        <option value="MV">Maldives</option>
                                        <option value="ML">Mali</option>
                                        <option value="MT">Malta</option>
                                        <option value="MH">Marshall Islands</option>
                                        <option value="MQ">Martinique</option>
                                        <option value="MR">Mauritania</option>
                                        <option value="MU">Mauritius</option>
                                        <option value="YT">Mayotte</option>
                                        <option value="MX">Mexico</option>
                                        <option value="FM">Micronesia, Federated States of</option>
                                        <option value="MD">Moldova, Republic of</option>
                                        <option value="MC">Monaco</option>
                                        <option value="MN">Mongolia</option>
                                        <option value="ME">Montenegro</option>
                                        <option value="MS">Montserrat</option>
                                        <option value="MA">Morocco</option>
                                        <option value="MZ">Mozambique</option>
                                        <option value="MM">Myanmar</option>
                                        <option value="NA">Namibia</option>
                                        <option value="NR">Nauru</option>
                                        <option value="NP">Nepal</option>
                                        <option value="NL">Netherlands</option>
                                        <option value="NC">New Caledonia</option>
                                        <option value="NZ">New Zealand</option>
                                        <option value="NI">Nicaragua</option>
                                        <option value="NE">Niger</option>
                                        <option value="NG">Nigeria</option>
                                        <option value="NU">Niue</option>
                                        <option value="NF">Norfolk Island</option>
                                        <option value="MP">Northern Mariana Islands</option>
                                        <option value="NO">Norway</option>
                                        <option value="OM">Oman</option>
                                        <option value="PK">Pakistan</option>
                                        <option value="PW">Palau</option>
                                        <option value="PS">Palestinian Territory, Occupied</option>
                                        <option value="PA">Panama</option>
                                        <option value="PG">Papua New Guinea</option>
                                        <option value="PY">Paraguay</option>
                                        <option value="PE">Peru</option>
                                        <option value="PH">Philippines</option>
                                        <option value="PN">Pitcairn</option>
                                        <option value="PL">Poland</option>
                                        <option value="PT">Portugal</option>
                                        <option value="PR">Puerto Rico</option>
                                        <option value="QA">Qatar</option>
                                        <option value="RE">Réunion</option>
                                        <option value="RO">Romania</option>
                                        <option value="RU">Russian Federation</option>
                                        <option value="RW">Rwanda</option>
                                        <option value="BL">Saint Barthélemy</option>
                                        <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                                        <option value="KN">Saint Kitts and Nevis</option>
                                        <option value="LC">Saint Lucia</option>
                                        <option value="MF">Saint Martin (French part)</option>
                                        <option value="PM">Saint Pierre and Miquelon</option>
                                        <option value="VC">Saint Vincent and the Grenadines</option>
                                        <option value="WS">Samoa</option>
                                        <option value="SM">San Marino</option>
                                        <option value="ST">Sao Tome and Principe</option>
                                        <option value="SA">Saudi Arabia</option>
                                        <option value="SN">Senegal</option>
                                        <option value="RS">Serbia</option>
                                        <option value="SC">Seychelles</option>
                                        <option value="SL">Sierra Leone</option>
                                        <option value="SG">Singapore</option>
                                        <option value="SX">Sint Maarten (Dutch part)</option>
                                        <option value="SK">Slovakia</option>
                                        <option value="SI">Slovenia</option>
                                        <option value="SB">Solomon Islands</option>
                                        <option value="SO">Somalia</option>
                                        <option value="ZA">South Africa</option>
                                        <option value="GS">South Georgia and the South Sandwich Islands</option>
                                        <option value="SS">South Sudan</option>
                                        <option value="ES">Spain</option>
                                        <option value="LK">Sri Lanka</option>
                                        <option value="SD">Sudan</option>
                                        <option value="SR">Suriname</option>
                                        <option value="SJ">Svalbard and Jan Mayen</option>
                                        <option value="SZ">Swaziland</option>
                                        <option value="SE">Sweden</option>
                                        <option value="CH">Switzerland</option>
                                        <option value="SY">Syrian Arab Republic</option>
                                        <option value="TW">Taiwan, Province of China</option>
                                        <option value="TJ">Tajikistan</option>
                                        <option value="TZ">Tanzania, United Republic of</option>
                                        <option value="TH">Thailand</option>
                                        <option value="TL">Timor-Leste</option>
                                        <option value="TG">Togo</option>
                                        <option value="TK">Tokelau</option>
                                        <option value="TO">Tonga</option>
                                        <option value="TT">Trinidad and Tobago</option>
                                        <option value="TN">Tunisia</option>
                                        <option value="TR">Turkey</option>
                                        <option value="TM">Turkmenistan</option>
                                        <option value="TC">Turks and Caicos Islands</option>
                                        <option value="TV">Tuvalu</option>
                                        <option value="UG">Uganda</option>
                                        <option value="UA">Ukraine</option>
                                        <option value="AE">United Arab Emirates</option>
                                        <option value="GB">United Kingdom</option>
                                        <option value="US">United States</option>
                                        <option value="UM">United States Minor Outlying Islands</option>
                                        <option value="UY">Uruguay</option>
                                        <option value="UZ">Uzbekistan</option>
                                        <option value="VU">Vanuatu</option>
                                        <option value="VE">Venezuela, Bolivarian Republic of</option>
                                        <option value="VN">Viet Nam</option>
                                        <option value="VG">Virgin Islands, British</option>
                                        <option value="VI">Virgin Islands, U.S.</option>
                                        <option value="WF">Wallis and Futuna</option>
                                        <option value="EH">Western Sahara</option>
                                        <option value="YE">Yemen</option>
                                        <option value="ZM">Zambia</option>
                                        <option value="ZW">Zimbabwe</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Business Address </label>
                                    <input type="text" placeholder="Address Line1" name="address_1" required><br/>
                                    <input type="text" placeholder="Address Line2" name="address_2"><br/>
                                    <input type="text" placeholder="City" name="city" required><br/>
                                    <input type="text" placeholder="State" name="state" required><br/>
                                    <input type="text" placeholder="Zip Code" name="zipcode" required>
                                </div>
                                <div class="form-group">
                                    <label>Business Phone </label>
                                    <input type="text" placeholder="+1(555) 678-1212" name="business_phone" required>
                                </div>
                                <div class="form-group">
                                    <label>Business Type </label>
                                    <select class="form-control" name="business_type" required>
                                        <option value="corporation">Corporation</option>
                                        <option value="sole_prop" selected="selected">Individual or Sole Proprietor</option>
                                        <option value="non_profit">Nonprofit organization</option>
                                        <option value="partnership">Partnership</option>
                                        <option value="llc">Limited liability company (LLC)</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Employer Identification Number (EIN) </label>
                                    <input type="text" placeholder="12-3456789" name="ein" required>
                                    <p>If you use your Social Security number for business tax purposes, you can use that instead</p>
                                </div>
                                <div class="form-group">
                                    <label>Business Website </label>
                                    <input type="text" placeholder="company.com" name="website" required>
                                </div>
                                <div class="form-group">
                                    <label>Business Description </label>
                                    <select class="form-control" name="industry" required>
                                        <option value="" disabled selected>Individual, Sole Proprietor, or Single-Member LLC</option>
                                        <option value="individual">Individual</option>
                                        <option value="sole">Sole Proprietor</option>
                                        <option value="single">Single-Member LLC</option>
                                    </select>
                                    <textarea name="biz_description" id="" cols="30" rows="10" placeholder="Describe what you sell, whom you sell to, and when you charge your customers."></textarea>
                                </div>
                                <div class="form-group">
                                    <label>How Long After Paying Will Your Customers Typically Receive Their Goods or Services? </label>
                                    <select class="form-control" name="receive_service" required>
                                        <option value="" disabled selected>Choose…</option>
                                        <option value="withinoneday">Within a day</option>
                                        <option value="withintwoweeks">Within two weeks</option>
                                        <option value="withinonemonth">Within a month</option>
                                        <option value="multiplemonths">More than a month</option>
                                    </select>
                                    <textarea name="biz_description" id="" cols="30" rows="10" placeholder="Describe what you sell, whom you sell to, and when you charge your customers."></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Business representative </label>
                                    <p>An individual or sole proprietor must activate their own account. If you’re trying to activate this account on someone's behalf, please invite them to become an administrator and transfer ownership of the account. You will still have administrator access, and any information you added will be saved.</p>
                                    <label>Full name</label>
                                    <input type="text" placeholder="First name" name="first_name" required>
                                    <input type="text" placeholder="Last name" name="last_name" required>
                                </div>
                                <div class="form-group">
                                    <label>Email address</label>
                                    <input type="text" placeholder="user@example.com" name="email" required>
                                </div>
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="text" placeholder="+1 (555) 678-1212" name="phone" required>
                                </div>
                                <div class="form-group">
                                    <label>Date of birth</label>
                                    <input type="date" placeholder="MM/DD/YYYY" name="birthday" required>
                                </div>
                                <div class="form-group">
                                    <label>Last 4 digits of Social Security number (SSN)</label>
                                    <input type="text" placeholder="8888" name="ssn" required>
                                </div>
                                <div class="form-group">
                                    <label>Home Address</label>
                                    <input type="text" placeholder="Address Line1" name="home_address_1" required><br/>
                                    <input type="text" placeholder="Address Line2" name="home_address_2"><br/>
                                    <input type="text" placeholder="City" name="home_city" required><br/>
                                    <input type="text" placeholder="State" name="home_state" required><br/>
                                    <input type="text" placeholder="Zip Code" name="home_zipcode" required>
                                </div>
                                <div class="form-group">
                                    <label>Credit card statement</label>
                                    <p>This information may appear on your customers' credit card statements. Use recognizable information to prevent unintended chargebacks.</p>
                                    <label>Statement descriptor</label>
                                    <input type="text" placeholder="Your business name" name="card_state_descriptor" required>
                                </div>
                                <div class="form-group">
                                    <label>Shortened descriptor</label>
                                    <input type="text" placeholder="Business" name="card_shortend_descriptor" required>
                                </div>
                                <div class="form-group">
                                    <label>Support phone number</label>
                                    <input type="text" placeholder="+1 (555) 678-1212" name="support_phone" required>
                                </div>
                                <div class="form-group">
                                    <label>Customer support address</label>
                                    <input type="text" placeholder="Address Line1" name="customer_address_1" required><br/>
                                    <input type="text" placeholder="Address Line2" name="customer_address_2"><br/>
                                    <input type="text" placeholder="City" name="customer_city" required><br/>
                                    <input type="text" placeholder="State" name="customer_state" required><br/>
                                    <input type="text" placeholder="Zip Code" name="customer_zipcode" required>
                                </div>
                                <div class="form-group">
                                    <label>Bank details</label>
                                    <p>Provide your bank details so Stripe can make deposits to your checking account. Payments in other currencies will be converted and paid out in USD.</p>
                                    <label>Routing number</label>
                                    <input type="text" placeholder="110000000" name="routing_number" required>
                                </div>
                                <div class="form-group">
                                    <label>Account number</label>
                                    <input type="text" placeholder="000123456789" name="account_number" id="account_number" required>
                                </div>
                                <div class="form-group">
                                    <label>Confirm account number</label>
                                    <input type="text" placeholder="000123456789" name="confirm_account_number" id="confirm_account_number" required>
                                </div>
                                <button type="submit" class="btn btn-primary btn-save-continue">
                                    Submit
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#additional_payment">
                        2. Connect Additional Payment Methods + Apps<span class="recommended">RECOMMENDED</span>
                        <span class="expand">+ Expand</span></a>
                    </h4>
                    </div>
                    <div id="additional_payment" class="panel-collapse collapse">
                    <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                    minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                    commodo consequat.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>

<!-- Modal -->
<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="col-md-12 text-center mb-5">
                    <img src="/img/humbl-success-mark.png" class="success-mark" alt="">
                    <h4>Account Successfully Created!</h4>
                    <p>Your account is ready to go, now let's add your bank.</p>
                    <a class="btn btn-primary btn-continue-link">
                        Continue
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="failureModal" tabindex="-1" role="dialog" aria-labelledby="failureModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="col-md-12 text-center mb-5">
                    <img src="/img/humbl-error-mark.png" class="error-mark" alt="">
                    <h4>Hmm, let's try that again!</h4>
                    <p>There was an error setting up your account. If the error persis, please contact us.</p>
                    <div>
                        <a class="btn btn-primary btn-try-again">
                            Try Again
                        </a>
                        <a class="btn btn-primary" data-dismiss="modal">
                            Close
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
