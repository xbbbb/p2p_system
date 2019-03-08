
@extends('layouts.front')

@section('content')

    @include('layouts.feedback')

    <script>
        $(document).ready(function () {
            $("#repayment").text((($("#loan_amount").val()*1.2+$("#loan_amount").val()*0.48/52*$("#loan_period").val())/$("#loan_period").val()).toFixed(2));
            $('#warningModal').modal('show');

           // var objectModel = {};
           // var   value = $(this).val();
          //  var   type = $(this).attr('id');
          //  objectModel[type] =value;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url:"/application/set_start_time",
                type:"get",
             //   dataType:"json",
             //   data:objectModel,
                timeout:30000,
                success:function(data){
                  /*  $("#cate_id").empty();
                    var count = data.length;
                    var i = 0;
                    var content="";
                    for(i=0;i<count;i++){
                        content+="<option value='"+data[i].id+"'>"+data[i].name+"</option>";
                    }
                    $("#cate_id").append(content);*/

                }
            });

        });


    </script>

    <div class="new_bgtwo1">
        <div class="container">
            <form action="{{ action('ApplicationController@intermediate') }}"   method="post" enctype="multipart/form-data" autocomplete="off" id="application">
                @csrf
                <input autocomplete="false" name="hidden" type="text" style="display:none;">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="progress-outer">
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped active1" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 50%; background-color: none">50%</div>
                            </div>
                        </div>
                        <div class="step" id="step1">
                            <div class="conone1" style="margin-bottom: 50px">
                                <h1>How much would you like to borrow
                                </h1>
                                <div class="down_arrow"><img src="../storage/down_arrow.png"></div>
                                <div class="col-sm-12 panel_headline">Loan Info</div>
                                <div class="col-sm-6" style=" margin-top: 5vh">
                                    <div style="">
                                        <div class="search_holder">
                                            <p>Loan Amout</p>
                                            <select id="loan_amount" name="loan_amount"  required>
                                                <option value="">--Select--</option>
                                                <option value="100" {{$amount==100 ? 'selected' : ''}}>100</option>
                                                <option value="200" {{$amount==200 ? 'selected' : ''}}>200</option>
                                                <option value="300" {{$amount==300 ? 'selected' : ''}}>300</option>
                                                <option value="400" {{$amount==400 ? 'selected' : ''}}>400</option>
                                                <option value="500"{{$amount==500 ? 'selected' : ''}}>500</option>
                                                <option value="600"{{$amount==600 ? 'selected' : ''}}>600</option>
                                                <option value="700" {{$amount==700 ? 'selected' : ''}}>700</option>
                                                <option value="800" {{$amount==800 ? 'selected' : ''}}>800</option>
                                                <option value="900"{{$amount==900 ? 'selected' : ''}}>900</option>
                                                <option value="1000" {{$amount==1000 ? 'selected' : ''}}>1000</option>
                                                <option value="1100" {{$amount==1100 ? 'selected' : ''}}>1100</option>
                                                <option value="1200" {{$amount==1200 ? 'selected' : ''}}>1200</option>
                                                <option value="1300" {{$amount==1300 ? 'selected' : ''}}>1300</option>
                                                <option value="1400" {{$amount==1400 ? 'selected' : ''}}>1400</option>
                                                <option value="1500" {{$amount==1500 ? 'selected' : ''}}>1500</option>
                                                <option value="1600" {{$amount==1600 ? 'selected' : ''}}>1600</option>
                                                <option value="1700" {{$amount==1700 ? 'selected' : ''}}>1700</option>
                                                <option value="1800" {{$amount==1800 ? 'selected' : ''}}>1800</option>
                                                <option value="1900" {{$amount==1900 ? 'selected' : ''}}>1900</option>
                                                <option value="2000" {{$amount==2000 ? 'selected' : ''}}>2000</option>
                                            </select>
                                            <div class="clearfix"></div>
                                        </div>

                                        <div class="clearfix"></div>

                                        <div class="search_holder">
                                            <p>Loan Period</p>
                                            <select id="loan_period" name="loan_period" required>
                                                <option value="">--Select--</option>
                                                <option value="9" {{$term==9 ? 'selected' : ''}}>9</option>
                                                <option value="13" {{$term==13 ? 'selected' : ''}}>13</option>
                                                <option value="17" {{$term==17 ? 'selected' : ''}}>17</option>
                                                <option value="21" {{$term==21 ? 'selected' : ''}}>21</option>
                                                <option value="25" {{$term==25 ? 'selected' : ''}}>25</option>
                      mi                          <option value="29" {{$term==29 ? 'selected' : ''}}>29</option>
                                                <option value="33" {{$term==33 ? 'selected' : ''}}>33</option>
                                                <option value="37" {{$term==37 ? 'selected' : ''}}>37</option>
                                                <option value="41" {{$term==41 ? 'selected' : ''}}>41</option>
                                                <option value="45" {{$term==45 ? 'selected' : ''}}>45</option>
                                                <option value="49" {{$term==49 ? 'selected' : ''}}>49</option>
                                                <option value="52" {{$term==52 ? 'selected' : ''}}>52</option>
                                            </select>
                                            <div class="clearfix"></div>
                                        </div>

                                        <div class="clearfix"></div>


                                    </div>

                                </div>
                                <div class="col-sm-6 bg" style="padding-bottom: 2.5vh; padding-top: 2.5vh">

                                    <div class="week">
                                        <div class="white">
                                            <h4>Weekly Repayment<br>

                                                <span id="repayment"></span></h4>
                                        </div>
                                    </div>
                                </div>

                                <div class="clearfix"></div>

                            </div>

                            <div class="conone1">
                                <h1>Personal Details</h1>
                                <div class="down_arrow"><img src="../storage/down_arrow.png"></div>

                                <div class="clearfix"></div>

                                <div class="col-sm-12 panel_headline">General Information</div>



                                <div class="col-sm-4">
                                    <div class="search_holder">
                                        <p>First Name<span style="color: red">*</span></p>
                                        <input type="text" id="first_name" name="first_name"  pattern="[A-Za-z]{0,}" required>

                                        <div class="clearfix"></div>
                                    </div>
                                </div>


                                <div class="col-sm-4">
                                    <div class="search_holder">
                                        <p>Middle Name</p>
                                        <input type="text" id="middle_name" name="middle_name" pattern="[A-Za-z]{0,}">
                                        <div class="clearfix"></div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="search_holder">
                                        <p>Last Name<span style="color: red">*</span></p>
                                        <input type="text" id="last_name" name="last_name"  pattern="[A-Za-z]{0,}" required>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="search_holder">
                                        <p>Title<span style="color: red">*</span></p>
                                        <select id="type" name="type" required>
                                            <option value="">--Select--</option>
                                            <option value="Mr">Mr.</option>
                                            <option value="Ms">Ms.</option>
                                            <option value="Mrs">Mrs.</option>
                                        </select>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>


                                <div class="col-sm-4">
                                    <div class="search_holder">
                                        <p>Date of Birth<span style="color: red">*</span></p>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <input type="date" name="dob" id="dob" required>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="search_holder">
                                        <p>Mobile Phone<span style="color: red">*</span></p>
                                        <div class="phoneone">
                                            <input type="text" id="mobile" name="mobile" maxlength="10" required>
                                            <div class="phoneoneicon"><img src="../storage/search_icon.png" style="cursor:pointer;" id="phone_check"></div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="search_holder">
                                        <p>Verification Code<span style="color: red">*</span></p>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <input type="text" name="veri_code" id="veri_code" required>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="search_holder">
                                        <p>Sex<span style="color: red">*</span></p>
                                        <select id="sex" name="sex" required>
                                            <option value="">--Select--</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Unisex">Unisex</option>

                                        </select>

                                        <div class="clearfix"></div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="search_holder">
                                        <p>Home Phone<span style="color: red">*</span></p>
                                        <input type="text" name="phone" id="phone" maxlength="10" pattern="[0-9]{0,}" required>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="search_holder">
                                        <p>Email<span style="color: red">*</span></p>
                                        <input type="email" name="email" id="email" required >

                                        <div class="clearfix"></div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="search_holder">
                                        <p>No of Dependents<span style="color: red">*</span></p>
                                        <select id="no_of_dependent" name="no_of_dependent" required>
                                            <option value="">--Select--</option>
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">4+</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="search_holder">
                                        <p>Marital Status<span style="color: red">*</span></p>
                                        <select id="marital_status" name="marital_status" required>
                                            <option value="">--Select--</option>
                                            <option value="Single">Single</option>
                                            <option value="Married">Married</option>
                                            <option value="Defacto">Defacto</option>
                                            <option value="Partner">Partner</option>
                                        </select>
                                    </div>
                                </div>

                                <div id="share_partner" style="display: none">
                                    <div class="col-sm-4">
                                        <div class="search_holder">
                                            <p id="mtext"> Do you share expense with your partner<span style="color: red">*</span></p>
                                            <select id="ddl_share_partner" name="ddl_share_partner">
                                                <option value="">--Select--</option>
                                                <option value="1">Yes</option>
                                                <option value="0">No</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-sm-4">
                                        <div class="search_holder">
                                            <div id="partner_income_details" style="display: none">
                                                <p>Partner Monthly Income<span style="color: red">*</span></p>
                                                <input type="number" id="partner_income" name="partner_income">
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <!--==========================================-->

                                <div class="col-sm-12 panel_headline">Emergency Contact Details</div>
                                <div class="row">
                                    <div class="col-sm-12">

                                        <div class="col-sm-4">
                                            <div class="search_holder">
                                                <p>Contact person full name<span style="color: red">*</span></p>
                                                <input type="text" id="em_contact_name" name="em_contact_name" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="search_holder">
                                                <p>Contact person number<span style="color: red">*</span></p>
                                                <input type="text" name="em_contact_no" id="em_contact_no" pattern="[0-9]{0,}" maxlength="10" required>

                                                <div class="conon"></div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="search_holder">
                                                <div class="clearfix"></div>
                                                <p>Relationship<span style="color: red">*</span></p>
                                                <!--<input type="text" id="time_at_addr_from" name="time_at_addr_from" placeholder="Time At Current Address" readonly/>-->
                                                <select id="relationship" name="relationship" required>
                                                    <option value="">--Select--</option>
                                                    <option value="Husband">Husband</option>
                                                    <option value="Wife">Wife</option>
                                                    <option value="Son">Son</option>
                                                    <option value="Daughter">Daughter</option>
                                                    <option value="Relatives">Relatives</option>
                                                    <option value="Friends">Friends</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-sm-12 panel_headline">Address &amp; ID Details</div>

                                <div class="row">
                                    <div class="col-sm-12">

                                        <div class="col-sm-4">
                                            <div class="search_holder">
                                                <p>ID &amp; Details<span style="color: red">*</span></p>
                                                <select id="id_details" name="id_details" required>
                                                    <option value="">--Select--</option>
                                                    <option value="Driver licence">Driver licence</option>
                                                    <option value="proof of age card">proof of age card</option>
                                                    <option value="passport">passport</option>
                                                </select>
                                            </div>
                                        </div>


                                    </div>
                                </div>





                                <div id="driving_license_details" style="display: none">

                                    <div class="col-sm-4">
                                        <div class="search_holder">
                                            <p>Driver License no<span style="color: red">*</span></p>
                                            <input type="text" name="license_no" id="license_no"  maxlength="10" >
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="search_holder">
                                            <p>Driver License State<span style="color: red">*</span></p>
                                            <select name="license_state" id="license_state" >
                                                <option value="">--Select--</option>
                                                <option value="NSW">NSW</option>
                                                <option value="ACT">ACT</option>
                                                <option value="VIC">VIC</option>
                                                <option value="QLD">QLD</option>
                                                <option value="NT">NT</option>
                                                <option value="SA">SA</option>
                                                <option value="TAS">TAS</option>
                                                <option value="WA">WA</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="search_holder">
                                            <p>Driver License Expiry<span style="color: red">*</span></p>
                                            <input type="date" name="license_expiry" id="license_expiry" >
                                        </div>
                                    </div>


                                </div>
                                <div id="proof_of_age_details" style="display:none">
                                    <div class="col-sm-4">
                                        <div class="search_holder">
                                            <p>Card No<span style="color: red">*</span></p>
                                            <input type="text" id="card_no" name="card_no" placeholder="Card No" maxlength="10" >
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="search_holder">
                                            <p>Place of issue<span style="color: red">*</span></p>
                                            <select name="place_of_issue" id="place_of_issue" >
                                                <option value="">--Select--</option>
                                                <option value="NSW">NSW</option>
                                                <option value="ACT">ACT</option>
                                                <option value="VIC">VIC</option>
                                                <option value="QLD">QLD</option>
                                                <option value="NT">NT</option>
                                                <option value="SA">SA</option>
                                                <option value="TAS">TAS</option>
                                                <option value="WA">WA</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div id="passport_details" style="display: none">
                                    <div class="col-sm-4">
                                        <div class="search_holder">
                                            <p>Passport no<span style="color: red">*</span></p>
                                            <input type="text" name="passport_no" id="passport_no" maxlength="10" >
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="search_holder">
                                            <p>Country of Issue<span style="color: red">*</span></p>
                                            <select name="issue_country" id="issue_country" >
                                                <option value="">--Select--</option>
                                                <option value="United States">United States</option>
                                                <option value="United Kingdom">United Kingdom</option>
                                                <option value="Afghanistan">Afghanistan</option>
                                                <option value="Albania">Albania</option>
                                                <option value="Algeria">Algeria</option>
                                                <option value="American Samoa">American Samoa</option>
                                                <option value="Andorra">Andorra</option>
                                                <option value="Angola">Angola</option>
                                                <option value="Anguilla">Anguilla</option>
                                                <option value="Antarctica">Antarctica</option>
                                                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                                <option value="Argentina">Argentina</option>
                                                <option value="Armenia">Armenia</option>
                                                <option value="Aruba">Aruba</option>
                                                <option value="Australia">Australia</option>
                                                <option value="Austria">Austria</option>
                                                <option value="Azerbaijan">Azerbaijan</option>
                                                <option value="Bahamas">Bahamas</option>
                                                <option value="Bahrain">Bahrain</option>
                                                <option value="Bangladesh">Bangladesh</option>
                                                <option value="Barbados">Barbados</option>
                                                <option value="Belarus">Belarus</option>
                                                <option value="Belgium">Belgium</option>
                                                <option value="Belize">Belize</option>
                                                <option value="Benin">Benin</option>
                                                <option value="Bermuda">Bermuda</option>
                                                <option value="Bhutan">Bhutan</option>
                                                <option value="Bolivia">Bolivia</option>
                                                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                                <option value="Botswana">Botswana</option>
                                                <option value="Bouvet Island">Bouvet Island</option>
                                                <option value="Brazil">Brazil</option>
                                                <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                                <option value="Brunei Darussalam">Brunei Darussalam</option>
                                                <option value="Bulgaria">Bulgaria</option>
                                                <option value="Burkina Faso">Burkina Faso</option>
                                                <option value="Burundi">Burundi</option>
                                                <option value="Cambodia">Cambodia</option>
                                                <option value="Cameroon">Cameroon</option>
                                                <option value="Canada">Canada</option>
                                                <option value="Cape Verde">Cape Verde</option>
                                                <option value="Cayman Islands">Cayman Islands</option>
                                                <option value="Central African Republic">Central African Republic</option>
                                                <option value="Chad">Chad</option>
                                                <option value="Chile">Chile</option>
                                                <option value="China">China</option>
                                                <option value="Christmas Island">Christmas Island</option>
                                                <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                                <option value="Colombia">Colombia</option>
                                                <option value="Comoros">Comoros</option>
                                                <option value="Congo">Congo</option>
                                                <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                                                <option value="Cook Islands">Cook Islands</option>
                                                <option value="Costa Rica">Costa Rica</option>
                                                <option value="Cote D'ivoire">Cote D'ivoire</option>
                                                <option value="Croatia">Croatia</option>
                                                <option value="Cuba">Cuba</option>
                                                <option value="Cyprus">Cyprus</option>
                                                <option value="Czech Republic">Czech Republic</option>
                                                <option value="Denmark">Denmark</option>
                                                <option value="Djibouti">Djibouti</option>
                                                <option value="Dominica">Dominica</option>
                                                <option value="Dominican Republic">Dominican Republic</option>
                                                <option value="Ecuador">Ecuador</option>
                                                <option value="Egypt">Egypt</option>
                                                <option value="El Salvador">El Salvador</option>
                                                <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                <option value="Eritrea">Eritrea</option>
                                                <option value="Estonia">Estonia</option>
                                                <option value="Ethiopia">Ethiopia</option>
                                                <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                                <option value="Faroe Islands">Faroe Islands</option>
                                                <option value="Fiji">Fiji</option>
                                                <option value="Finland">Finland</option>
                                                <option value="France">France</option>
                                                <option value="French Guiana">French Guiana</option>
                                                <option value="French Polynesia">French Polynesia</option>
                                                <option value="French Southern Territories">French Southern Territories</option>
                                                <option value="Gabon">Gabon</option>
                                                <option value="Gambia">Gambia</option>
                                                <option value="Georgia">Georgia</option>
                                                <option value="Germany">Germany</option>
                                                <option value="Ghana">Ghana</option>
                                                <option value="Gibraltar">Gibraltar</option>
                                                <option value="Greece">Greece</option>
                                                <option value="Greenland">Greenland</option>
                                                <option value="Grenada">Grenada</option>
                                                <option value="Guadeloupe">Guadeloupe</option>
                                                <option value="Guam">Guam</option>
                                                <option value="Guatemala">Guatemala</option>
                                                <option value="Guinea">Guinea</option>
                                                <option value="Guinea-bissau">Guinea-bissau</option>
                                                <option value="Guyana">Guyana</option>
                                                <option value="Haiti">Haiti</option>
                                                <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                                                <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                                                <option value="Honduras">Honduras</option>
                                                <option value="Hong Kong">Hong Kong</option>
                                                <option value="Hungary">Hungary</option>
                                                <option value="Iceland">Iceland</option>
                                                <option value="India">India</option>
                                                <option value="Indonesia">Indonesia</option>
                                                <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                                                <option value="Iraq">Iraq</option>
                                                <option value="Ireland">Ireland</option>
                                                <option value="Israel">Israel</option>
                                                <option value="Italy">Italy</option>
                                                <option value="Jamaica">Jamaica</option>
                                                <option value="Japan">Japan</option>
                                                <option value="Jordan">Jordan</option>
                                                <option value="Kazakhstan">Kazakhstan</option>
                                                <option value="Kenya">Kenya</option>
                                                <option value="Kiribati">Kiribati</option>
                                                <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                                                <option value="Korea, Republic of">Korea, Republic of</option>
                                                <option value="Kuwait">Kuwait</option>
                                                <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                                                <option value="Latvia">Latvia</option>
                                                <option value="Lebanon">Lebanon</option>
                                                <option value="Lesotho">Lesotho</option>
                                                <option value="Liberia">Liberia</option>
                                                <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                                <option value="Liechtenstein">Liechtenstein</option>
                                                <option value="Lithuania">Lithuania</option>
                                                <option value="Luxembourg">Luxembourg</option>
                                                <option value="Macao">Macao</option>
                                                <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                                                <option value="Madagascar">Madagascar</option>
                                                <option value="Malawi">Malawi</option>
                                                <option value="Malaysia">Malaysia</option>
                                                <option value="Maldives">Maldives</option>
                                                <option value="Mali">Mali</option>
                                                <option value="Malta">Malta</option>
                                                <option value="Marshall Islands">Marshall Islands</option>
                                                <option value="Martinique">Martinique</option>
                                                <option value="Mauritania">Mauritania</option>
                                                <option value="Mauritius">Mauritius</option>
                                                <option value="Mayotte">Mayotte</option>
                                                <option value="Mexico">Mexico</option>
                                                <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                                                <option value="Moldova, Republic of">Moldova, Republic of</option>
                                                <option value="Monaco">Monaco</option>
                                                <option value="Mongolia">Mongolia</option>
                                                <option value="Montserrat">Montserrat</option>
                                                <option value="Morocco">Morocco</option>
                                                <option value="Mozambique">Mozambique</option>
                                                <option value="Myanmar">Myanmar</option>
                                                <option value="Namibia">Namibia</option>
                                                <option value="Nauru">Nauru</option>
                                                <option value="Nepal">Nepal</option>
                                                <option value="Netherlands">Netherlands</option>
                                                <option value="Netherlands Antilles">Netherlands Antilles</option>
                                                <option value="New Caledonia">New Caledonia</option>
                                                <option value="New Zealand">New Zealand</option>
                                                <option value="Nicaragua">Nicaragua</option>
                                                <option value="Niger">Niger</option>
                                                <option value="Nigeria">Nigeria</option>
                                                <option value="Niue">Niue</option>
                                                <option value="Norfolk Island">Norfolk Island</option>
                                                <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                                <option value="Norway">Norway</option>
                                                <option value="Oman">Oman</option>
                                                <option value="Pakistan">Pakistan</option>
                                                <option value="Palau">Palau</option>
                                                <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                                                <option value="Panama">Panama</option>
                                                <option value="Papua New Guinea">Papua New Guinea</option>
                                                <option value="Paraguay">Paraguay</option>
                                                <option value="Peru">Peru</option>
                                                <option value="Philippines">Philippines</option>
                                                <option value="Pitcairn">Pitcairn</option>
                                                <option value="Poland">Poland</option>
                                                <option value="Portugal">Portugal</option>
                                                <option value="Puerto Rico">Puerto Rico</option>
                                                <option value="Qatar">Qatar</option>
                                                <option value="Reunion">Reunion</option>
                                                <option value="Romania">Romania</option>
                                                <option value="Russian Federation">Russian Federation</option>
                                                <option value="Rwanda">Rwanda</option>
                                                <option value="Saint Helena">Saint Helena</option>
                                                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                                <option value="Saint Lucia">Saint Lucia</option>
                                                <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                                <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                                                <option value="Samoa">Samoa</option>
                                                <option value="San Marino">San Marino</option>
                                                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                                <option value="Saudi Arabia">Saudi Arabia</option>
                                                <option value="Senegal">Senegal</option>
                                                <option value="Serbia and Montenegro">Serbia and Montenegro</option>
                                                <option value="Seychelles">Seychelles</option>
                                                <option value="Sierra Leone">Sierra Leone</option>
                                                <option value="Singapore">Singapore</option>
                                                <option value="Slovakia">Slovakia</option>
                                                <option value="Slovenia">Slovenia</option>
                                                <option value="Solomon Islands">Solomon Islands</option>
                                                <option value="Somalia">Somalia</option>
                                                <option value="South Africa">South Africa</option>
                                                <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                                                <option value="Spain">Spain</option>
                                                <option value="Sri Lanka">Sri Lanka</option>
                                                <option value="Sudan">Sudan</option>
                                                <option value="Suriname">Suriname</option>
                                                <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                                <option value="Swaziland">Swaziland</option>
                                                <option value="Sweden">Sweden</option>
                                                <option value="Switzerland">Switzerland</option>
                                                <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                                <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                                                <option value="Tajikistan">Tajikistan</option>
                                                <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                                                <option value="Thailand">Thailand</option>
                                                <option value="Timor-leste">Timor-leste</option>
                                                <option value="Togo">Togo</option>
                                                <option value="Tokelau">Tokelau</option>
                                                <option value="Tonga">Tonga</option>
                                                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                                <option value="Tunisia">Tunisia</option>
                                                <option value="Turkey">Turkey</option>
                                                <option value="Turkmenistan">Turkmenistan</option>
                                                <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                                <option value="Tuvalu">Tuvalu</option>
                                                <option value="Uganda">Uganda</option>
                                                <option value="Ukraine">Ukraine</option>
                                                <option value="United Arab Emirates">United Arab Emirates</option>
                                                <option value="United Kingdom">United Kingdom</option>
                                                <option value="United States">United States</option>
                                                <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                                <option value="Uruguay">Uruguay</option>
                                                <option value="Uzbekistan">Uzbekistan</option>
                                                <option value="Vanuatu">Vanuatu</option>
                                                <option value="Venezuela">Venezuela</option>
                                                <option value="Viet Nam">Viet Nam</option>
                                                <option value="Virgin Islands, British">Virgin Islands, British</option>
                                                <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                                <option value="Wallis and Futuna">Wallis and Futuna</option>
                                                <option value="Western Sahara">Western Sahara</option>
                                                <option value="Yemen">Yemen</option>
                                                <option value="Zambia">Zambia</option>
                                                <option value="Zimbabwe">Zimbabwe</option>
                                            </select>
                                        </div>
                                    </div>


                                </div>



                                <div class="clearfix"></div>

                                <div class="col-sm-12">
                                    <div class="search_holder">
                                        <p>Residential Address<span style="color: red">*</span></p>
                                        <input type="text" name="autocomplete" id="autocomplete" placeholder="Enter a location" autocomplete="off" onFocus="geolocate()" required>
										<p>If your address does not match any auto fill results, please choose the closest match and change mannually below.</p>
                                        <div class="conon"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="search_holder">
                                        <p>Street Number<span style="color: red">*</span></p>
                                        <input type="text" name="street_number" id="street_number" placeholder="Enter a location" autocomplete="off" required>

                                        <div class="conon"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="search_holder">
                                        <p>Street Name<span style="color: red">*</span></p>
                                        <input type="text" name="route" id="route" placeholder="Enter a location" autocomplete="off" required>

                                        <div class="conon"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="search_holder">
                                        <p>Suburb<span style="color: red">*</span></p>
                                        <input type="text" name="locality" id="locality" placeholder="Enter a location" autocomplete="off" required>

                                        <div class="conon"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="search_holder">
                                        <p>State<span style="color: red">*</span></p>
                                        <input type="text" name="administrative_area_level_1" id="administrative_area_level_1" placeholder="Enter a location" autocomplete="off" required>

                                        <div class="conon"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="search_holder">
                                        <p>Postal Code<span style="color: red">*</span></p>
                                        <input type="text" name="postal_code" id="postal_code" autocomplete="off" required>

                                        <div class="conon"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>


                                <div class="col-sm-4">
                                    <div class="search_holder">
                                        <div class="clearfix"></div>
                                        <p>Time at current address<span style="color: red">*</span></p>
                                        <select id="time_at_addr_from" name="time_at_addr_from" required>
                                            <option value="">--Select--</option>
                                            <option value="Up to 6 months">Up to 6 months</option>
                                            <option value="6 month to 1 year">6 month to 1 year</option>
                                            <option value="1-2 year">1-2 year</option>
                                            <option value="More than two year">More than two year</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="search_holder">
                                        <p>Residential Status<span style="color: red">*</span></p>
                                        <select name="residential_status" id="residential_status" required>
                                            <option value="">--Select--</option>
                                            <option value="rent">Rent</option>
                                            <option value="boarding"> boarding</option>
                                            <option value="own">own</option>
                                            <option value="mortgage">mortgage</option>
                                        </select>
                                    </div>
                                </div>

                                <div id="residential_status_details" style="display: none;">
                                    <div class="col-sm-4">
                                        <div class="search_holder">
                                            <p>Agent Name/LandLord Name<span style="color: red">*</span></p>
                                            <input type="text" name="agent_name" id="agent_name" placeholder="Agent Name">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="search_holder">
                                            <p>Agent/Landlord Mobile<span style="color: red">*</span></p>
                                            <input type="text" id="agent_mobile" name="agent_mobile" placeholder="Mobile No" pattern="[0-9]{0,}" maxlength="10">
                                        </div>
                                    </div>
                                   <!-- <div class="col-sm-4">
                                        <div class="search_holder">
                                            <p>Rental per Month<span style="color: red">*</span></p>
                                            <input type="number" id="rent_amt" name="rent_amt" placeholder="Rent Amt" maxlength="10">
                                        </div>
                                    </div>-->
                                </div>

                                <div id="mortgage_detail" style="display: none;">
                                    <div class="col-sm-4">
                                        <div class="search_holder">
                                            <p>Agent Name<span style="color: red">*</span></p>
                                            <input type="text" name="mortgage_detail" id="mortgage_detail" placeholder="Agent Name">
                                        </div>
                                    </div>
                                </div>





                                <div class="col-sm-12 panel_headline">Employment Information</div>

                                <div class="col-sm-4">
                                    <div class="search_holder">

                                        <p>Employment Status<span style="color: red">*</span></p>
                                        <select id="emp_status" name="emp_status" class="emp_status" required>
                                            <option value="">--Select--</option>
                                            <option value="unemployed-government benefits">unemployed-government benefits</option>
                                            <option value="full time">full time</option>
                                            <option value="part time">part time</option>
                                            <option value="casual">casual</option>
                                            <option value="contractor">contractor</option>
                                            <option value="self employed">self employed</option>
                                            <option value="cash in hand">cash in hand</option>
                                        </select>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>

                                <div id="employment_status_details" style="display: none">

                                    <div class="col-sm-4">
                                        <div class="search_holder">
                                            <div class="clearfix"></div>
                                            <p>Employment start day<span style="color: red">*</span></p>
                                            <select id="employ_start_date" name="employ_start_date" required>
                                                <option value="">--Select--</option>
                                                <option value="Up to 6 months">Up to 6 months</option>
                                                <option value="6 month to 1 year">6 month to 1 year</option>
                                                <option value="1-2 year">1-2 year</option>
                                                <option value="More than two year">More than two year</option>
                                            </select>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="search_holder">
                                            <div class="clearfix"></div>
                                            <p>Occupation<span style="color: red">*</span></p>
                                            <input type="text" name="occupation" id="occupation">
                                        </div>
                                        <div class="clearfix"></div>

                                    </div>



                                    <div class="col-sm-4">
                                        <div class="search_holder">
                                            <div class="clearfix"></div>
                                            <p>Company Name<span style="color: red">*</span></p>
                                            <input type="text" id="company_name" name="company_name" placeholder="Company Name">
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>


                                    <div class="col-sm-4">
                                        <div class="search_holder">
                                            <div class="clearfix"></div>
                                            <p>Company Address<span style="color: red">*</span></p>
                                            <input type="text" id="company_addr" name="company_addr" autocomplete="off" placeholder="Company Address" onfocus="geolocate()">
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="search_holder">
                                            <div class="clearfix"></div>
                                            <p>Company Phone<span style="color: red">*</span></p>
                                            <input type="text" id="company_phone"  pattern="[0-9]{0,}" name="company_phone" maxlength="10" >
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="search_holder">
                                            <div class="clearfix"></div>
                                            <p>Next Pay date<span style="color: red">*</span></p>
                                            <input type="date" name="primary_next_pay_date" id="primary_next_pay_date" placeholder="Start date" >
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="search_holder">
                                            <div class="clearfix"></div>
                                            <p>Income Frequency<span style="color: red">*</span></p>
                                            <select id="primary_income_freq" name="primary_income_freq" >
                                                <option value="">--Select--</option>
                                                <option value="weekly">weekly</option>
                                                <option value="fornightly">fornightly</option>
                                                <option value="monthly">monthly</option>
                                            </select>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>



                                </div>

                                <div id="unemp" style="display:none;">
                                    <div class="col-sm-4">
                                        <div class="search_holder">
                                            <div class="clearfix"></div>
                                            <p>Next Pay date<span style="color: red">*</span></p>
                                            <input type="date" name="unemp_next_pay_date" id="unemp_next_pay_date"  >

                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>


                                <div class="col-sm-12 panel_headline">Second Employer Details</div>
                                <div class="col-sm-4">
                                    <div class="search_holder">
                                        <p>Do you have another job<span style="color: red">*</span></p>
                                        <select id="another_job" name="another_job" required>
                                            <option value="">--Select--</option>
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                </div>

                                <div id="other_company_details" style="display: none">


                                    <div class="col-sm-4">
                                        <div class="search_holder">

                                            <p>Employment Status<span style="color: red">*</span></p>
                                            <select id="second_emp_status" name="second_emp_status" class="emp_status" >
                                                <option value="">--Select--</option>
                                                <option value="full time">full time</option>
                                                <option value="part time">part time</option>
                                                <option value="casual">casual</option>
                                                <option value="contractor">contractor</option>
                                                <option value="self employed">self employed</option>
                                                <option value="cash in hand">cash in hand</option>
                                            </select>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>

                                        <div class="col-sm-4">
                                            <div class="search_holder">
                                                <div class="clearfix"></div>
                                                <!--<p>Occupation</p>
                                                <input type="text" name="second_occupation" id="second_occupation" onkeypress="return chk_char(event)"/>-->
                                                <p>Next Pay date<span style="color: red">*</span></p>
                                                <input type="date" name="next_pay_date" id="next_pay_date"   >
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="search_holder">

                                                <div class="clearfix"></div>
                                                <p>Other Company Name<span style="color: red">*</span></p>
                                                <input type="text" name="another_company_name" id="another_company_name" placeholder="Other company name" >
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="search_holder">
                                                <div class="clearfix"></div>
                                                <p>Other Company Address<span style="color: red">*</span></p>
                                                <input type="text" name="another_company_addr" id="another_company_addr" autocomplete="off" placeholder="Other company address" >
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="search_holder">
                                                <div class="clearfix"></div>
                                                <p>Other Company Phone<span style="color: red">*</span></p>
                                                <input type="text" name="another_company_phone" id="another_company_phone"  pattern="[0-9]{0,}"  maxlength="10" placeholder="Other company phone" >
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="search_holder">
                                                <div class="clearfix"></div>

                                                <p>Occupation<span style="color: red">*</span></p>
                                                <input type="text" name="second_occupation" id="second_occupation" >
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="search_holder">
                                                <div class="clearfix"></div>
                                                <p>Income Frequency<span style="color: red">*</span></p>
                                                <select id="income_freq" name="income_freq">
                                                    <option value="">--Select--</option>
                                                    <option value="weekly">weekly</option>
                                                    <option value="fornightly">fornightly</option>
                                                    <option value="monthly">monthly</option>
                                                </select>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="search_holder">
                                                <div class="clearfix"></div>
                                                <p>Employment start day<span style="color: red">*</span></p>
                                                <select id="length_of_employment" name="length_of_employment" required>
                                                    <option value="">--Select--</option>
                                                    <option value="Up to 6 months">Up to 6 months</option>
                                                    <option value="6 month to 1 year">6 month to 1 year</option>
                                                    <option value="1-2 year">1-2 year</option>
                                                    <option value="More than two year">More than two year</option>
                                                </select>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>

                                </div>

                                <div class="clearfix"></div>









                                <div class="clearfix"></div>
                            </div>
                        </div>




                        <div class="clearfix"></div>

                        <div class="col-sm-12">

                        </div>

                        <div class="clearfix"></div>




                    </div>




                </div>



                <div class="clearfix"></div>


            <div class="col-sm-3 col-xs-offset-5 " style="margin-top:20px ">
                <div class="search_holder">
                    <button type="submit" id="next" class="action next btn  hyh" style="display: inline-block;">Next</button>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>
            </form>
            <div class="clearfix"></div>
        </div>

    </div>

   <script>

        // This example displays an address form, using the autocomplete feature
        // of the Google Places API to help users fill in the information.

        // This example requires the Places library. Include the libraries=places
        // parameter when you first load the API. For example:
        // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
        var placeSearch, autocomplete, workplace,secondwork;
        var componentForm = {
            street_number: 'short_name',
            route: 'long_name',
            locality: 'long_name',
            administrative_area_level_1: 'short_name',
            postal_code: 'short_name'
        };


        function initAutocomplete() {

            // Create the autocomplete object, restricting the search to geographical
            // location types.
            autocomplete = new google.maps.places.Autocomplete(
                /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
                {types: ['geocode'], componentRestrictions: {country: "au"}});
            workplace = new google.maps.places.Autocomplete(
                /** @type {!HTMLInputElement} */(document.getElementById('company_addr')),
                {types: ['geocode'], componentRestrictions: {country: "au"}});
            secondwork = new google.maps.places.Autocomplete(
                /** @type {!HTMLInputElement} */(document.getElementById('another_company_addr')),
                {types: ['geocode'], componentRestrictions: {country: "au"}});
            // When the user selects an address from the dropdown, populate the address
            // fields in the form.
            autocomplete.addListener('place_changed', fillInAddress);
        }

        function fillInAddress() {
            // Get the place details from the autocomplete object.
            var place = autocomplete.getPlace();

            for (var component in componentForm) {
                document.getElementById(component).value = '';
                document.getElementById(component).disabled = false;
            }

            // Get each component of the address from the place details
            // and fill the corresponding field on the form.
            for (var i = 0; i < place.address_components.length; i++) {
                var addressType = place.address_components[i].types[0];
                if (componentForm[addressType]) {
                    var val = place.address_components[i][componentForm[addressType]];
                    document.getElementById(addressType).value = val;
                }
            }
        }

        // Bias the autocomplete object to the user's geographical location,
        // as supplied by the browser's 'navigator.geolocation' object.
        function geolocate() {

            if (navigator.geolocation) {

                navigator.geolocation.getCurrentPosition(function(position) {
                    var geolocation = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };
                    var circle = new google.maps.Circle({
                        center: geolocation,
                        radius: position.coords.accuracy,

                    });
                    autocomplete.setBounds(circle.getBounds());
                    workplace.setBounds(circle.getBounds());
                    secondwork.setBounds(circle.getBounds());

                });
            }
        }


    </script>
    <!--<script src="{{ asset('js/autofill.js') }}?rand=<?php echo uniqid() ; ?>" defer></script>-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDVbqptzy7IDdaIHe7fH1VBCRU0Cbxn4GQ&libraries=places&language=en&callback=initAutocomplete&sessiontoken =<?php echo uniqid() ; ?>"
            async defer type="text/javascript"></script>
















@endsection
