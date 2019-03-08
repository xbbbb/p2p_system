



    <div class="container" style=" margin-left: 15%; width: 70%">
        <h4>We recommend that you consider obtaining legal and financial advice in relation to this loan. If you have any questions, ask before you sign.
        </h4>
        <h6>&nbsp;</h6>
        <h2>
            Pre Contractual Terms and Condition subject to Verification
        </h2>
        <h4>&nbsp;</h4>
        <h5 >
           <span style="font-weight: bold">LENDER (“we”/ “My Cash Online"/ “us”/ “our”):</span>  &nbsp;<span>Australian Synergy Finance Pty Ltd ABN 54 613 655 646
            (trading as My Cash Online)  Credit Licence Number: 490422</span>
        </h5>
        <h5 style="font-weight: bold">
            BORROWER: {{$first_name." ".$middle_name." ".$last_name}}
        </h5>
        <h5 style="font-weight: bold">
            LOAN REF: {{$id}}
        </h5>
        <h6>&nbsp;</h6>
        <p>We are pleased to offer you a loan on the terms and conditions set out in this loan agreement.</p>
        <p>Words in italics have special meanings.</p>
        <p>By accepting and submitting this loan agreement to us, you, the Borrower, enter into a contract with
            Australian Synergy Finance Pty Ltd (trading as My Cash Online) for a loan in the amount specified in the
            Loan Schedule below. </p>
        <p>The contract between you and My Cash Online consists of: </p>
        <p>1.This loan agreement; </p>
        <p>2.The General Terms & Conditions; and  </p>
        <p>3.Any other conditions imposed by us. </p>
        <p>  <span style="font-weight: bold;">IMPORTANT:</span>  This document does not contain all the pre-contractual information required by law to be given to you.
            (T&Cs) which forms part of the contract between you and us. You must perform all of the terms
            specified in the T&Cs. If there is any conflict between the T&Cs and this document, the terms of this document
            prevail.. If there is any conflict between any provisions of any security or guarantee and this document and the T&Cs,
            the terms of this loan agreement and the T&Cs prevail.</p>
        <p><span style="font-weight: bold;">Loan Schedule:</span> (This is a table setting out information prescribed by the National Credit Code (the Code)
            – a law designed to ensure you have all the information you need to know about your loan).</p>
        <p>The following information is prepared as at  (the disclosure date). This information may change before or after the settlement date</p>
        <h6>&nbsp;</h6>
        <h4>Your information</h4>

        <table class="table table-bordered table-hover text-center">
            <tr>
                <td><p>Borrower name:</p></td>
                <td><p>{{$first_name." ".$middle_name." ".$last_name}}</p></td>
            </tr>
            <tr>
                <td><p>Residential address</p></td>
                <td><p>{{$residential_addr}}</p></td>
            </tr>
            <tr>
                <td><p>Email:</p></td>
                <td><p>{{$email}}</p></td>
            </tr>


        </table>

        <h4>Your loan details</h4>

        <table class="table table-bordered table-hover text-center">
            <tr>
                <td><p>Disclosure date:</p></td>
                <td><p>{{$sign_date}}</p></td>
            </tr>
            <tr>
                <td><p>Amount of Credit (a)</p></td>
                <td><p>@if($loan_amount!=0)
                            {{ $loan_amount}}
                        @else
                            {{ $loan_amount_MACC }}
                        @endif</p></td>
            </tr>
            <tr>
                <td>
                    <p>
                        plus
                    </p>

                </td>
                <td>

                </td>
            </tr>
            <tr>
                <td>
                    <p>
                        Establishment fee (b):
                    </p>

                </td>
                <td>
                    <p>
                        @if($loan_amount!=0)
                            {{$loan_amount*0.2}}
                        @elseif($loan_amount_MACC<=5000)
                            400
                            @else
                            0
                        @endif
                    </p>
                </td>
            </tr>

            <tr>
                <td>
                    <p>
                        Monthly Account Fee:
                    </p>

                </td>
                <td>
                    <p>

                        @if($loan_amount!=0)
                            {{$loan_amount*0.04}}
                        @else
                            {{$loan_amount_MACC*0.04}}

                        @endif
                    </p>
                </td>
            </tr>

            <tr>
                <td>
                    <p>
                        Total Monthly Account Fee (c)
                    </p>

                </td>
                <td>
                    <p>
                        @if($loan_amount!=0)
                            {{$loan_amount*0.04 *ceil($loan_period/4.33)}}
                        @else
                            {{$loan_amount_MACC*0.04*ceil($loan_period_MACC/4.33)}}

                        @endif
                    </p>
                </td>
            </tr>

            <tr>
                <td>
                    <p>
                        Total amount of fees and charges payable throughout your loan (b) + (c)
                    </p>

                </td>
                <td>
                    <p>
                        @if($loan_amount!=0)
                            {{$loan_amount*0.04*ceil($loan_period/4.33)+$loan_amount*1.2}}
                        @elseif($loan_amount_MACC<=5000)
                        {{$loan_amount_MACC*0.04*ceil($loan_period_MACC/4.33)+400}}
                        @else
                            {{$loan_amount_MACC*0.04*ceil($loan_period_MACC/4.33)}}

                        @endif
                    </p>
                </td>
            </tr>

            <tr>
                <td>
                    <p>
                        Amount of each repayment:
                    </p>

                </td>
                <td>
                    <p>
                        @if($loan_amount!=0)
                            {{(ceil($loan_amount*0.04*ceil($loan_period/4.33)+$loan_amount*1.2)/$loan_period)}}
                        @elseif($loan_amount_MACC<=5000)

                        {{ceil(($loan_amount_MACC*0.04*ceil($loan_period_MACC/4.33)+400)/$loan_period_MACC)}}

                            @else
                            {{ceil(($loan_amount_MACC*0.04*ceil($loan_period_MACC/4.33))/$loan_period_MACC)}}


                        @endif
                    </p>
                </td>
            </tr>

            <tr>
                <td>
                    <p>
                        Frequency of repayments:
                    </p>

                </td>
                <td>
                    <p>
                        Once a week
                    </p>
                </td>
            </tr>

            <tr>
                <td>
                    <p>
                        When must you make your first repayment?
                    </p>

                </td>
                <td>
                    <p>
                        {{$primary_next_pay_date}}
                    </p>
                </td>
            </tr>

            <tr>
                <td>
                    <p>
                        Number of repayments
                    </p>

                </td>
                <td>
                    <p>
                        {{$loan_period}}
                    </p>
                </td>
            </tr>
        </table>



        <h4 style=" font-weight: bolder">Other Fees and Charges</h4>
        <p>Daily default fee: &nbsp;$5 while your account remains in default*</p>
        <p>Direct debit dishonor fee: &nbsp; $12 per dishonor*</p>
        <p>Reschedule fee payable for each time a payment is rescheduled: &nbsp; $15 per reschedule*</p>
        <p>Enforcement fee: &nbsp; May be payable if you are in default under the Contract</p>
        <h6>&nbsp;</h6>
        <p style="font-size: smaller; font-style: italic"> Any fees charged will form part of your outstanding loan balance where My Cash Online is authorised to debit the amount of any fees from your account.</p>
        <p style="font-size: smaller; font-style: italic"> The fees listed above under “Other Fees and Charges” are payable when the service is provided
            , or the expense incurred unless otherwise specified. Unless otherwise stated all fees are non-refundable.</p>
        <p style="font-size: smaller; font-style: italic">• continue or commence proceedings against you for recovery of the loan amount, plus fees and charges; and/or<br>
            • vary your loan by extending your loan term for a period of 24 months.</p>
        <h6>&nbsp;</h6>

        <p style="font-size: smaller; font-style: italic">
            BEFORE YOU SIGN THINGS YOU MUST KNOW
        </p>
        <p style="font-size: smaller; font-style: italic">
            * READ THIS CONTRACT DOCUMENT so that you know exactly what contract you are entering into and what you will have to do under the contract.
        </p>
        <p style="font-size: smaller; font-style: italic">
            * You should also read the information statement: ‘THINGS YOU SHOULD KNOW ABOUT YOUR PROPOSED CREDIT CONTRACT’ as well as our pre-contractual disclosure terms and conditions.
        </p>
        <p style="font-size: smaller; font-style: italic">
            * Fill in or cross out any blank spaces.
        </p>
        <p style="font-size: smaller; font-style: italic">
            * Get a copy of this contract document.
        </p>
        <p style="font-size: smaller; font-style: italic">
            * Do not sign this contract document if there is anything you do not understand.
        </p>
        <p style="font-size: smaller; font-style: italic">
            * Once you submit this contract document, you will be bound by it
        </p>
        <p style="font-size: smaller; font-style: italic">
            *However, you may end the contract before you obtain credit, or a card or other means is used to obtain goods or services for which credit is to be provided under the contract, by telling the credit provider in writing, but you will still be liable for any fees or charges already incurred.
        </p>
        <p style="font-size: smaller; font-style: italic">
            * You do not have to take out consumer credit insurance unless you want to.
        </p>
        <p style="font-size: smaller; font-style: italic">
            * If you take out insurance, the credit provider cannot insist on any particular insurance company.
        </p>
        <p style="font-size: smaller; font-style: italic">
            * If this contract document says so, the credit provider can vary the annual percentage rate (the interest rate), the repayments and the fees and charges and can add new fees and charges without your consent.
        </p>
        <p style="font-size: smaller; font-style: italic">
            * If this contract document says so, the credit provider can charge a fee if you pay out your contract early.
        </p>

        <h6>&nbsp;</h6>

        <h4 style=" font-weight: bolder">Borrower’s acknowledgement and declarations</h4>
        <p>By signing this loan agreement, you have made the following declarations:</p>
        <p>1.You have carefully read this loan agreement and the T&Cs and understand they establish a legal contract between you and us. If you have any questions, ask before you sign.</p>
        <p>2.All information you have given directly or indirectly to us, our agents, or our lawyers is accurate and not misleading. You acknowledge that we are relying on that information to enter this transaction</p>
        <p>3.Other than this loan agreement and the T&Cs, you have not relied on any promise or representation by anybody when deciding to enter this transaction.</p>
        <p>4.The loan will be used only for the purpose set out above under ‘Purpose’.</p>

        <h6>&nbsp;</h6>


        <h4 style=" font-weight: bolder">Terms and Conditions</h4>

        <p>These are the Australian Synergy Finance Pty Ltd (ABN: 54 613 655 646; trading as My Cash Online ) General Terms and Conditions. They form part of your loan agreement. This document does not contain all the pre-contractual information required to be given to you. You must read this document together with your loan agreement. Words printed like this have a special meaning – see your loan agreement and this document. If there is any conflict between your loan agreement and this document, the terms of the loan agreement prevail.</p>
        <p>&nbsp;</p>
        <p>1 "(c) Is there anything else I need to read and comply with?</p>
        <p>You must read and comply with:</p>
        <p>(a) your loan contract;<br />(b) these General Conditions;<br />(c) any other conditions reasonably imposed by the Lender.<br />Take particular notice of the things you must do, and must not do and when your payments are due. If you are unsure, call us on 1300 998868" <br /><br />2 "When is there a binding legal agreement between you and us?</p>
        <p>We agree to lend to you the loan amount, but we only have to lend to you if:</p>
        <p>(a) You borrow the loan amount at the disclosure date;<br />(b) You are not in default under this agreement;<br />(c) We have verified as correct the information set out in your loan application;<br />(d) We have obtained satisfactory credit reports about you;<br />(e) We have carried out a credit assessment on you that is satisfactory to us;<br />(f) Following your loan application, nothing has happened which has led to a significant adverse change in your financial circumstances or which we reasonable believe could lead to this; and<br />(g) You have provided us with any documents or information we reasonably require, and we are satisfied with those documents and that information.</p>
        <p>You authorise us to open your loan account in your name and to debit to it without first telling you:</p>
        <p>(a) All or any part of the loan amount; and<br />(b) Any other amount which you must pay under this agreement, on the day it becomes due.</p>
        <p>You owe us any amounts we debit to your loan account. You may also owe us other amounts under this agreement. <br />" <br /><br />3 "Representations and warranties</p>
        <p>" <br /><br />3.1 You represent and warrant that all information you have given us regarding your financial and personal affairs is true and correct. <br /><br />3.2 You represent and warrant that you will give us promptly any information we reasonably ask for about your financial position. <br /><br />3.3 You represent and warrant that you will do anything (such as producing and signing documents) that we reasonably require to give full effect to these terms and conditions. <br /><br />4 What can we do with your account? <br /><br />4.1 We can debit your account with any amounts lent to you or due under your loan agreement <br /><br />4.1 If a third party makes a payment to you on our behalf, we can debit your account on the date that money is made available to you. <br /><br />5 What payments must you make? <br /><br />5.1 "You must make all payments specified in your loan agreement by making repayments up until the last day of the loan term. On the last day of the loan term (or, if you default, on the day on which the balance owing on the loan account becomes due under clause 12) you must pay us: <br />(a) The balance owing on the loan account; and<br />(b) Any amounts charged, accrued or payable but not yet debited to your loan account<br />" <br /><br />5.2 You may with our approval make monthly repayments of the amount specified by us instead of making fortnightly repayments. If you want to make repayments monthly, please make appropriate arrangements with us. <br /><br />5.3 Payments are to be made by direct debit (and you must sign the necessary direct debit form), or such other method as we approve. Until the term has expired and all amounts owing to us have been paid, you must sign a direct debit authority to allow us to debit an account from which repayments will be made and you must keep that account open until your loan is repaid in full. You authorise us to obtain any payment due under your loan agreement by using the direct debit authority. <br /><br />5.4 The amount of each payment will include any applicable direct debit fees, taxes, or charges. If the interest rate changes, your repayments may change. <br /><br />5.5 If any payment is due on a day which is not a business day, the payment must be made on the next business day. A business day is a day that is not a Saturday or Sunday, or a day on which banks are not generally open to conduct business in Melbourne, Victoria, Australia. <br /><br />5.6 If any payment is due on a day which is the 29th, 30th or 31st of a month with no such date, the payment must be made on the last business day of that month. For example, if the date is the 31st day of December, your April repayment will be due on 30th April (assuming it is a business day) as 31st April is a date which does not exist. <br /><br />5.7 If any direct debit or cheque used for repayment is dishonoured, the repayment will be treated as not having been made, and interest will continue to accrue on the unpaid daily balance until actual payment is received by the Lender. <br /><br />5.8 If you become liable by a court order to pay any money due under your loan agreement, you must pay interest at the higher of the rate ordered by the court or the rate payable under this agreement. <br /><br />5.9 "We may review, at any time, the repayments you have to make. If in our, opinion, your repayments are not sufficient to enable you to pay:<br />(a) the loan; and<br />(b) all interest charges; and<br />(c) other moneys owing under this agreement,<br />by the last day of the loan term, when we may increase your repayments to ensure this can be done. <br />" <br /><br />6 How are your payments credited? <br /><br />6.1 We can apply any payment or other credit to any amount you owe us in any order we determine acting reasonably. <br /><br />6.2 If you have more than one account with us and you make a payment without telling us in writing how the payment is to be applied, we can apply it to any one or more of the accounts in any way we think fit. <br /><br />6.3 We do not pay interest on any credit balance in your account. <br /><br />6.4 If you have more than one account with us and one of those accounts is in arrears, while any other account has available funds, you irrevocably request and authorise us to withdraw an amount up to the available funds and apply that money towards payment of the arrears. <br /><br />7 How is interest/monthly fee applied to your loan? <br /><br />7.1 Monthly fees or interest charges are debited to your account monthly in arrears on the same day of each month as the disclosure date. However, if the disclosure date is the 29th, 30th or 31st day of a month with no such date, it will be debited on the last day of that month. <br /><br />7.2 If the monthly fee or interest is due on a day which is not a business day, it will be debited on the next business day. A business day is a day that is not a Saturday or Sunday, or a day on which banks are not generally open to conduct business in Melbourne, Victoria, Australia. <br /><br />7.3 Monthly fees or interest charges are calculated in advance on the loan amount approved by the Lender at the disclosure date. <br /><br />7.4 Interest may also be debited on the date of any change to your account, principal reduction, or repayment in full. <br /><br />8 What happens if you repay early? <br /><br />You may make additional payments or repay your loan in full or part at any time. Fees may be payable on early repayment as specified in your loan agreement. If you repay all or part of your fixed rate loan early, fixed rate break costs may apply. <br /><br />9 Can your obligations under your loan agreement change? <br /><br />9.1 Acting reasonably, we can change any term of your loan agreement including the interest rate, the credit fees or charges, and the repayments without your consent. We can introduce new credit fees or charges without your consent. You will be notified in accordance with applicable laws on or before the day the change takes effect either in writing or by advertisement in a major newspaper or (if you have consented) by electronic means. If notified by newspaper, the change will also be confirmed in your next statement of account. You may not be notified of changes which reduce your obligations. <br /><br />9.2 The interest rates and repayments shown in the financial information section in your loan agreement are correct at the disclosure date. The Lender may change the interest rate at any time. The variable rate is an individual rate set for your loan, and acting reasonably we may vary as we see fit from time to time. <br /><br />10 When will you receive account statements? <br /><br />Statements of account will be forwarded to you at least once every six months or more frequently if required by law. We may not send account statements if not required by law. <br /><br />11 How does the default rate apply? <br /><br />11.1 If any amount due by you is not paid on the due date, you must pay default fees and charges on the account until the account is brought to order. You may also be liable for other fees as specified in your loan agreement. <br /><br />11.2 The Daily Default fee accrues daily and is calculated by applying the daily default rate each day while the default continues. The end of each day for calculating default is 5.00pm Eastern Standard time. <br /><br />11.3 Acting reasonably, we may change the default rate at any time without your consent. You will be notified of any changes in the default rate in the same way any variations to the interest rate are notified to you. <br /><br />11.4 The charging of interest on arrears of interest and fees and charges does not mean that they are part of the principal sum or loan amount. These amounts only become part of the principal sum or loan amount if we elect to convert them to principal. <br /><br />Part B - Default <br /><br />12 When will you be in default? <br /><br />"If any one or more of the following occur, we may decide an event of default has occurred. You must ensure no event of default occurs.<br />(a) There is default of any term or condition of your loan agreement. <br />(b) You fail to pay any person (including us and/or other lenders) any money by the due date. <br />(c) Any representation made by you to us or our agents is or becomes untrue or misleading. <br />(d) You die, become bankrupt, enter into any kind of bankruptcy administration or are jailed. <br />(e) Any agreement or security becomes wholly or partly unenforceable. <br />(f) You use any amount advanced under your loan agreement for a purpose other than the purpose provided in your loan agreement. <br />(g) You breach any material undertaking given at any time to us. <br />(h) You assign your estate to a creditor.<br />" <br /><br />13 What can we do when you are in default? <br /><br />13.1 "At any time after the default occurs, we can take any of the following actions. We will give you any notices required by law in connection with exercising these rights:<br />(a) Demand and require immediate payment of any money due under you loan agreement.<br />(b) Call up the loan and require payment of the entire balance owing under your loan agreement. If notice is required, the notice requiring payment of the entire balance owing can be included in the demand for payment of arrears, and the entire balance owing under your loan agreement will become immediately due for payment at the date specified in the notice without the need for any further notice.<br />(c) Exercise any right, power, or privilege conferred by any law, your loan agreement, or any security." <br /><br />13.2 "If you are in default, then, unless we notify you to the contrary, we may bring enforcement proceedings against you in the following circumstances:<br />(a) We have provided you, a default notice allowing you at least 30 days from the date the default notice is taken to be given to remedy the default. The notice will contain all information at required by the National Credit Code; or<br />(b) Where the National Credit Code applies to this agreement and it does require us to give a default notice or to wait until the period specified in the default notice has passed before taking proceedings against you<br />" <br /><br />13.3 We can take action even if we do not do so promptly after the default occurs so long as the default is continuing. <br /><br />13.4 Our rights and remedies under the loan agreement may be exercised by any of our employees or any other person we authorise <br /><br />13.5 We are not liable for any loss caused by the exercise, attempted exercise, failure to exercise, or delay in exercising any of our rights or remedies. <br /><br />14 Are you liable for enforcement expenses? <br /><br />14.1 "Enforcement expenses may become payable under your loan agreement and any security if you default. You must pay on demand and we may debit your account with our costs in connection with any exercise or non-exercise of rights arising from any default, including:<br />(a) legal costs and expenses on a full indemnity basis or solicitor and own client basis, whichever is higher; and<br />(b) our internal costs.<br />" <br /><br />14.2 Where the loan is regulated by the National Credit Code or similar laws, these costs will not exceed our reasonable enforcement costs including internal costs. <br /><br />14.3 These expenses include expenses resulting from dishonour of a cheque or payment. These expenses may be debited to your loan at any time after they are incurred. <br /><br />14.4 You indemnify us from and against any expense, loss, loss of profit, damage, or liability which we incur as a consequence of a default occurring. <br /><br />Part C - General matters <br /><br />15 Do you have to pay government charges? <br /><br />"You must pay us on request any government duties, taxes and other charges that apply in connection with your loan (including in relation to any security). This includes (but is not limited to):<br />(a) income tax payable by you (if the Commissioner of Taxation requires us to deduct this from your account);<br />(b) bank account debits tax;<br />(c) withholding tax; and<br />(d) goods and services tax." <br /><br />16 What happens if you have a guarantor? <br /><br />"You agree to allow us to disclose the following documents to each guarantor named in your loan agreement:<br />(a) a copy of any notice, including correspondence, to us or to you;<br />(b) any credit report received in relation to you;<br />(c) any financial statement you have given us;<br />(d) any notice of demand, or information regarding a dishonour, or any loan with us;<br />(e) information on any excess or overdrawing;<br />(f) a copy of your loan account statement; and<br />(g) any other information about you and your accounts with us." <br /><br />17 Must you provide financial statements? <br /><br />Within 14 days of our request, you must provide to us any information we require relating to your business, assets, and financial affairs. For example, we may require a copy of an individual&rsquo;s taxation return or an assets and liability statement. We may require this information to be certified or audited. <br /><br />18 What happens if your account has a credit balance? <br /><br />If you repay us more than the total amount outstanding, we may place the excess funds into a suspense account, deposit it with a bank or pay it to you. We will not pay you interest on that amount. <br /><br />19 What does a certificate signed by us mean? <br /><br />A certificate signed by us or on behalf of us as to an amount payable is conclusive and binding on you. <br /><br />20 What law applies to your loan agreement? <br /><br />Your loan agreement is governed by and interpreted in accordance with the law of the State or Territory in Australia whose credit legislation applies to this loan contract, provided that, if the borrower resides at the time of this loan agreement is entered into in a state or territory outside Australia, then this loan contract will be governed by the law of the state or territory in Australia that the credit provider is situated in. <br /><br />21 Read down and severance <br /><br />21.1 If a provision of this agreement is, for any reason, illegal, void, voidable or unenforceable by us, the provision is to be read down and construed as if it were varied, to the minimum extent necessary, so that the provision is not illegal, void, voidable or unenforceable by us. <br /><br />21.2 If, despite reading down, a provision of this agreement is still illegal, void, voidable or unenforceable by us, and the provision would not be illegal, void, voidable or unenforceable if a word, part of a provision or the whole provision were severed, then the offending word, part or whole provision is severed, to the minimum extent necessary, and the remainder of this agreement has full force and effect. <br /><br />21.3 To the extent that the National Credit Code applies to this agreement our rights and remedies under this agreement are in addition to those given to a credit provider under that legislation. <br /><br />22 How can we deal with your loan agreement? <br /><br />22.1 We may assign, novate or otherwise deal with our rights under your loan agreement in any way we wish. You must sign anything and do anything we reasonably require to enable any dealing with your loan agreement. Of course, any dealing with our rights does not change your obligations under your loan agreement in any way. <br /><br />22.2 You must not assign, novate, or otherwise deal with your rights or obligations under your loan agreement. <br /><br />22.3 We may disclose information about you, your loan agreement, or the security to anybody involved in an actual or proposed assignment or dealing by us with our rights under your loan agreement. <br /><br />23 What about any relevant legislation or statutes? <br /><br />23.1 To the extent that your loan agreement is regulated under consumer legislation (e.g. the National Credit Code) or any other law, any provisions in your loan agreement which do not comply with that law have no effect, and to the extent necessary, your loan agreement is to be read so it does not impose obligations prohibited by that law. <br /><br />23.2 There may be some statutes (i.e. laws passed by parliament) or other law (usually called common law) intended to limit lender&rsquo;s rights. None of those statutes or laws will operate to limit our rights under your loan agreement unless by law those statutes or laws cannot be negated. If any of the provisions of your loan agreement are illegal or become illegal at any time, the affected provisions will cease to have effect, but the balance of your loan agreement will remain in full force and effect, and we may by notice vary your loan agreement so that the provision is no longer illegal. <br /><br />24 Interest on judgment <br /><br />If a liability under your loan agreement becomes merged in a judgment or order then you must as an independent obligation pay interest to the lender on the amount of that liability from the date it becomes payable until it is paid both before and after the judgment or order despite the bankruptcy or insolvency of you at a rate being the higher of the rate payable under the judgment, order, bankruptcy, or insolvency and the rate payable under this loan agreement. Our rights are not affected by, and do not merge with, any judgment or order which we obtain against you, in respect of the debt. <br /><br />25 What happens if you are a trustee? <br /><br />If you are at any time trustee of any trust, you are liable under our loan agreement in your own right and as trustee of the trust. Accordingly, we can recover against the trust assets as well as you. Default occurs if there is a change of trustee, a termination of the trust, or any change to the terms of the trust without our consent. <br /><br />26 What should you do if your residential address changes? <br /><br />You must tell us if you change your residential or postal address, or if you think there is any information that we should be aware of about your ability to comply with your loan agreement. <br /><br />27 How can we give you information about your loan? <br /><br />27.1 "Any communications, originating process, court document or other document to be given or served under or in connection with this loan agreement or any security associated with this loan agreement may be:<br />(a) delivered personally to you;<br />(b) posted to or left at your residential or business address last known to us;<br />(c) posted to or left at the address shown in your loan agreement;<br />(d) sent by fax to your residential or business fax number last known to us; <br />(e) sent by email to your last residential or business email address last known to us (if you have consented as required by any applicable law) or;<br />(f) given in any other way permitted by law, <br />even if the borrower has died or any one of them has died." <br /><br />27.2 A notice, statement, certificate or other communication must be in writing. <br /><br />27.3 A notice or communication may be signed by any employee, solicitor, or agent on our behalf. <br /><br />27.4 "For the purposes of this agreement a notice, statement, certificate or other communication (notice) is taken to be given:<br />(a) in the case of a notice given personally &ndash; on the date it bears or the date it is received by the addressee, whichever is the later; or<br />(b) in the case of a notice sent by post- on the date it bears or the date it would have been delivered in the ordinary course of post, whichever is the later; or<br />(c) in the case of a notice sent by fax or some other form of electronic transmission &ndash; on the date it bears or the date on which the machine from which the transmission was sent produces a report indicating that the notice was sent to the number of the addresses, which is the later; or<br />(d) in the case of a communication given by newspaper advertisement &ndash; on the date it is first published. <br />" <br /><br />28 What happens if there are two or more borrowers? <br /><br />28.1 "If there are two or more of you, each of you is individually liable, and all of you are jointly liable. This means we may sue any one of you for all the outstanding amounts.<br />You agree that each borrower can bind each other borrower. For example, any one of the borrowers can authorise a redraw, a split into one or more sub-loans, or any other activity in respect of your loan. Each other Borrower and any guarantor will be liable even though they did not know about or did not agree to the transaction.<br />" <br />WARNING. This means that each one of you can be required to pay the whole amount even though you may have some other arrangement among yourselves or not all of you benefit equally <br /><br />Despite this clause, we may require all borrowers and guarantors to authorise any activity with respect to your loan. <br /><br />28.2 If a borrower or guarantor dies, we may require the loan to be repaid in full. Alternatively, where there is more than one borrower, if a borrower or guarantor dies or is released from the loan agreement or guarantee (as appropriate) for any reason, we may allow the remaining borrower/ guarantors(s) to become the borrower(s) under the loan agreement, or guarantors under the guarantee. If we do not agree to the remaining borrower(s) becoming the borrowers under the loan agreement (or the guarantors to be the remaining guarantors under the guarantee), we may call up the loan even though further advances have been made after the death or release of a borrower or guarantor. <br /><br />29 Interpretation <br /><br />"In this document:<br />(a) a reference to the singular includes the plural, <br />(b) reference to a document includes any variation or replacement of it,<br />(c) headings in this agreement are for ease of reference only and not to assist interpretation, and <br />(d) use of examples is illustrative of the context only and does not limit the natural meaning of the terms of your loan agreement.<br />Credit information includes the type and amount of credit provided to you, repayment history information, default information (including overdue payments) and court information. Credit information includes credit reporting information supplied to us by a credit reporting body. Personal information includes any information or an opinion from which your identity is apparent or reasonably apparent. <br />" <br /><br />By signing this document, you consent to us, related bodies corporate, affiliates and some other entities collecting, using, holding and disclosing personal and credit-related information about you. You can find out more about how we deal with your privacy by viewing our privacy and credit reporting policy at https://www.mycashonline.com.au/. We may seek and obtain further Personal Information (including sensitive information) and credit-related information about you during the course of our dealings with you. The terms of this consent apply to the collection, use and disclosure of that information. If you do not provide us with this consent or provide us with your Personal Information and credit-related information we may not be able to arrange finance for you or provide other services. <br /><br />30 How can we use your personal information? <br /><br />30.1 We are also required to collect your personal information to comply with our obligations under Australian law, including the Anti-Money Laundering and Counter-Terrorism Financing Act 2006 (Cth). <br /><br />30.2 Privacy Policies You may gain access to the personal information and credit-related information that we hold about you by contacting us. <br /><br />A copy of our privacy and credit reporting policy can be obtained from the link below, <br /><br />https://www.mycashonline.com.au/privacy <br /><br />or by contacting us on 1300 998868 <br /><br />The privacy policies and credit reporting policies contain information about how you may access or seek correction of your personal information and credit-related information, how that information is managed, how you may complain about a breach of your privacy and how that complaint will be dealt with. They also contain information on &lsquo;notifiable matters&rsquo; including things such as the information we use to assess your creditworthiness, the fact that credit reporting bodies (CRBs) may provide your personal information and credit-related information to credit providers to assist in an assessment of your credit worthiness, what happens if you fail to meet your credit obligations or commit a serious credit infringement &ndash; including our right to report a default or a serious credit infringement to CRBs, your right to request that CRBs not use your credit-related information for the purposes of pre-screening credit offers, and your right to request a CRB not to use or disclose credit-related information about you if you believe you are a victim of fraud. <br /><br />30.3 Consumer and commercial Credit Information We may exchange your commercial and consumer credit-related information with entities listed below to assess an application for consumer or commercial credit and manage that credit: <br /><br />&bull; Credit Sense Australia Pty Ltd <br /><br />In particular, we can obtain credit-related information about you from a CRB providing both consumer and commercial credit-related information. <br /><br />30.4 Exchange information with credit providers We may exchange your personal information and credit-related information with other credit providers for the purposes of assessing your creditworthiness, credit standing, and credit history or credit capacity. <br /><br />30.5 Disclose information to guarantors We may disclose your personal information and credit-related information to any person who proposes to guarantee, or has guaranteed repayment of any credit provided to you, or who indemnifies you in any way. <br /><br />30.6 "Exchange Information We may exchange personal information and credit-related information with the following types of entities, some of which may be located overseas. Please see our privacy policy for more information.<br />(a) The CRBs identified in clause 30.8. <br />(b) Finance brokers and other persons who assist us to provide our products to you.<br />(c) Financial consultants, accountants, lawyers and advisers.<br />(d) Any industry body, government authority, tribunal, court or otherwise in connection with any complaint regarding the approval or management of your lease or loan - for example if a complaint is lodged about us.<br />(e) Businesses assisting us with funding for loans.<br />(f) Entities to whom we outsource some of our functions.<br />(g) Trade insurers, other insurers, valuers and debt collection agencies.<br />(h) Any person where we are required by law to do so.<br />(i) Any of our associates, related entities or contractors.<br />(j) Your referees, such as your employer, to verify your information you have provided.<br />(k) Any person considering acquiring an interest in our business or assets.<br />(l) Any organisation providing online verification of your identity.<br />" <br /><br />30.7 "Customer Identification We may disclose personal information about you to an organisation, including a CRB proving verification of your identity, including on-line verification of your identity. The organisation will give us a report of whether that Personal Information matches personal and credit-related information held by the organisation. If we use these methods and are unable to verify your identity in this way we will let you know. We may also use information about your Australian Passport, state or territory driver licence, Medicare card, citizenship certificate, birth certificate, and any other identification documents to match those details with the relevant registries using third party systems and record the results of that matching.<br />" <br /><br />30.8 Credit Reporting Bodies We may exchange your personal and credit-related information with the CRBs listed below. The information may be included in reports that the CRBs give other organisations (such as other lenders) to help them assess your credit worthiness. Some of the information may adversely affect your credit worthiness (for example if you have defaulted on your loan) and accordingly, may affect your ability to obtain credit from other lenders: <br /><br />(a) Equifax Ltd https://www.equifax.com.au/ <br /><br />30.9 Overseas Disclosure We may disclose your personal information, and credit &ndash;related information to overseas entities including related entities and service providers located overseas. Overseas entities may be required to disclose information to relevant foreign authorities under a foreign law. More information on overseas disclosure may be found in the entities&rsquo; privacy policies. We attempt to select secure and reputable offshore service providers, but we are not liable for any breach or misuse of information sent offshore, and the information will not have the same protection as under the Australian Privacy law. <br /><br />30.1 Storage and Security We may store your Personal Information and credit-related information in cloud or other types of networked or electronic storage and will take reasonable steps to ensure its security. However, it is not always practicable to find out where your information may be accessed or held, as electronic or networked storage can be accessed from various countries via an internet connection <br /><br />INFORMATION STATEMENT <br /><br />THINGS YOU SHOULD KNOW ABOUT YOUR PROPOSED CREDIT CONTRACT <br /><br />This statement tells you about some of the rights and obligations of yourself and your credit provider. It does not state the terms and conditions of your contract. <br /><br />If you have any concerns about your contract, contact your credit provider and, if you still have concerns, your credit provider&rsquo;s external dispute resolution scheme, or get obtain legal advice. <br />THE CONTRACT <br />1. "How can I get details of my proposed credit contract?<br />Your credit provider must give you a pre-contractual statement containing certain information about your contract. The pre-contractual statement, and this information statement must be given to you before:<br />&bull; your contract is entered into; or<br />&bull; you make an offer to enter into the contract.<br />whichever happens first.<br />" <br />2. "How can I get a copy of the final contract?<br />If the contract document is to be signed by you and returned to your credit provider, you must be given a copy to keep.</p>
        <p>Also, the credit provider must give you a copy of the final contract within 14 days after it is made. This rule does not, however, apply, if the credit provider has previously given you a copy of the contract document to keep.</p>
        <p>If you want another copy of your contract write to your credit provider and ask for one. Your credit provider may charge you a fee. Your credit provider has to give you a copy:<br />&bull; within 14 days of your written request if the original contract came into existence 1 year or less before your request; or<br />&bull; otherwise within 30 days of your written request. <br />" <br />3. "Can I terminate the contract?<br />Yes. You can terminate the contract by witting to the credit provider so long as:<br />&bull; you have not obtained any credit under the contract; or<br />&bull; a card or other means of obtaining credit given to you by your credit provider has not been used to acquire goods or services for which credit is to be provided under the contract.</p>
        <p>However, you will still have to pay any fees or charges incurred before you terminated the contract.<br />" <br />4. "Can I pay my credit contract out early?<br />Yes. However, you must pay your credit provider the amount required to pay out your credit contract on the day you wish to end your contract.<br />" <br />5. "How can I find out the payout figure?<br />You can write to your credit provider at any time and ask for a statement of the payout figure as at any date you specify. You can also ask for details of how the amount is made up.</p>
        <p>Your credit provider must give you the statement within 7 days after you give your request to the credit provider. You may be charged a fee for the statement.<br />" <br />6. "Will I pay less interest if I pay out my contract early?<br />Yes. The interest you can be charged depends on the actual time money is owing. However, you may have to pay an early termination charge (if your contract permits your credit provider to charge one) and other fees.<br />" <br />7. "Can my contract be changed by my credit provider?<br />Yes, but only if your contract says so.<br />" <br />8. "Will you be told in advance if we are going to make a change in the contract?<br />That depends on the type of change. For example-<br />&bull; you get at least same day notice for a change to an annual percentage rate. That notice may be a written notice to you or a notice published in a newspaper.<br />&bull; you get 20 days advance written notice for-<br />- a change in the way in which interest is calculated; or<br />- a change in credit fees and charges; or<br />- any other changes by your credit provider;<br />except where the change reduces what you have to pay, or the change happens automatically under the contract.<br />" <br />9. "Is there anything I can do if I think that my contract is unjust?<br />Yes. You should first talk to your credit provider. Discuss the matter and see if you can come to some arrangement. If that is not successful you may contact your credit provider&rsquo;s external dispute resolution scheme. External dispute resolution is a free service established to provide you with an independent mechanism to resolve specific complaints. Your credit provider&rsquo;s external dispute resolution provider is the Australian Financial Complaints Authority and can be contacted on 1800 931 678 , by visiting their website at https://www.afca.org.au/ or in writing to GPO Box 3
            Melbourne VIC 3001.</p>
        <p>Alternatively, you can go to court. You may wish to get legal advice, for example from your community legal centre or Legal Aid.</p>
        <p>You can also contact ASIC, the regulator, for information on 1300 300 630 or through ASIC&rsquo;s website at http://www.asic.gov.au<br />" <br />INSURANCE <br />10. "Do I have to take out insurance?<br />Your credit provider can insist you take out or pay the cost of types of insurance specifically allowed by law. These are compulsory third party personal injury insurance, mortgage indemnity insurance or insurance over property covered by any mortgage. Otherwise, you can decide if you want to take out insurance or not. If you take out insurance, the credit provider cannot insist that you use any particular insurance company.<br />" <br />11. "Will I get details of my insurance cover?<br />Yes, if you have taken out insurance over mortgaged property or consumer credit insurance and the premium is financed by your credit provider. In that case the insurer must give you a copy of the policy within 14 days after the insurer has accepted the insurance proposal.</p>
        <p>Also, if you acquire an interest in any such insurance policy which is taken out by your credit provider then, within 14 days of that happening, your credit provider must ensure you have a written notice of the particulars of that insurance.</p>
        <p>You can always ask the insurer for details of your insurance contract. If you ask in writing, your insurer must give you a statement containing all the provisions of the contract<br />" <br />12. "If the insurer does not accept my proposal, will I be told?<br />Yes, if the insurance was to be financed by the credit contract. The insurer will inform you if the proposal is rejected.<br />" <br />13. "In that case, what happens to the premiums?<br />Your credit provider must give you a refund or credit unless the insurance is to be arranged with another insurer<br />" <br />14. "What happens if my credit contract ends before any insurance contract over mortgaged property?<br />You can end the insurance contract and get a proportionate rebate of any premium from the insurer.<br />" <br />MORTGAGE <br />15. "If my contract says I have to give a mortgage, what does this mean?<br />A mortgage means that you give your credit provider certain rights over any property you mortgage. If you default under your contract, you can lose that property and you might still owe money to the credit provider.<br />" <br />16. "Should I get a copy of my mortgage?<br />Yes. It can be part of your credit contract or, if it is a separate document, you will be given a copy of the mortgage within 14 days after your mortgage is entered into.</p>
        <p>However, you need not be given a copy if the credit provider has previously given you a copy of the mortgage document to keep<br />" <br />17. "Is there anything that I am not allowed to do with the property I have mortgaged?<br />The law says you cannot assign or dispose of the property unless you have your credit provider&rsquo;s, or the court&rsquo;s, permission. You must also look after the property. Read the mortgage document as well. It will usually have other terms and conditions about what you can or cannot do with the property.<br />" <br />18. "What can I do if I find that I cannot afford my repayments and there is a mortgage over property?<br />See the answers to questions 22 and 23.</p>
        <p>Otherwise you may &mdash;<br />&bull; if the mortgaged property is goods &mdash; give the property back to your credit provider, together with a letter saying you want the credit provider to sell the property for you;<br />&bull; sell the property, but only if your credit provider gives permission first;</p>
        <p>OR<br />&bull; give the property to someone who may then take over the repayments, but only if your credit provider gives permission first.</p>
        <p>If your credit provider won&rsquo;t give permission, you can contact their external dispute resolution scheme for help.</p>
        <p>If you have a guarantor, talk to the guarantor who may be able to help you.</p>
        <p>You should understand that you may owe money to your credit provider even after the mortgaged property is sold.<br />" <br />19. "Can my credit provider take or sell the mortgaged property?<br />Yes, if you have not carried out all of your obligations under your contract.<br />" <br />20. "If my credit provider writes asking me where the mortgaged goods are, do I have to say where they are?<br />Yes. You have 7 days after receiving your credit provider&rsquo;s request to tell your credit provider. If you do not have the goods you must give your credit provider all the information you have so they can be traced.<br />" <br />21. "When can my credit provider or its agent come into a residence to take possession of mortgaged goods?<br />Your credit provider can only do so if it has the court&rsquo;s approval or the written consent of the occupier which is given after the occupier is informed in writing of the relevant section in the National Credit Code.<br />" <br />GENERAL <br />22. "What do I do if I cannot make a repayment?<br />Get in touch with your credit provider immediately. Discuss the matter and see if you can come to some arrangement. You can ask your credit provider to change your contract in a number of ways:<br />&bull; to extend the term of the contract and reduce payments; or <br />&bull; to extend the term of your contract and delay payments for a set time; or<br />&bull; to delay payments for a set time.<br />" <br />23. "What if my credit provider and I cannot agree on a suitable arrangement?<br />If the credit provide refuses your request to change the repayments, you can ask the credit provider to review this decision if you think it is wrong.</p>
        <p>If the credit provider still refuses your request you can complain to the external dispute resolution scheme that your credit provider belongs to. Further details about this scheme are set out below in question 25.<br />" <br />24. "Can my credit provider take action against me?<br />Yes, if you are in default under your contract. But the law says that you can not be unduly harassed or threatened for repayments. If you think you are being unduly harassed or threatened, contact the credit provider&rsquo;s external dispute resolution scheme or ASIC, or get legal advice.<br />" <br />25. "Do I have any other rights and obligations?<br />Yes. The law will give you other rights and obligations. You should also READ YOUR CONTRACT carefully.<br />" <br /><br />"IF YOU HAVE ANY COMPLAINTS ABOUT YOUR CREDIT CONTRACT, OR WANT MORE INFORMATION, CONTACT YOUR CREDIT PROVIDER. YOU MUST ATTEMPT TO RESOLVE YOUR COMPLAINT WITH YOUR CREDIT PROVIDER BEFORE CONTACTING YOUR CREDIT PROVIDER&rsquo;S EXTERNAL DISPUTE RESOLUTION SCHEME. IF YOU HAVE A COMPLAINT WHICH REMAINS UNRESOLVED AFTER SPEAKING TO YOUR CREDIT PROVIDER YOU CAN CONTACT YOUR CREDIT PROVIDER&rsquo;S EXTERNAL DISPUTE RESOLUTION SCHEME OR GET LEGAL ADVICE.</p>
        <p>EXTERNAL DISPUTE RESOLUTION IS A FREE SERVICE ESTABLISHED TO PROVIDE YOU WITH AN INDEPENDENT MECHANISM TO RESOLVE SPECIFIC COMPLAINTS. YOUR CREDIT PROVIDER&rsquo;S EXTERNAL DISPUTE RESOLUTION PROVIDER IS THE Australian Financial Complaints Authority
            AND CAN BE CONTACTED ON 1800 931 678 , BY VISITING AT http://www.afca.org.au/ OR IN WRITING TO  GPO Box 3 Melbourne VIC 3001. <br />PLEASE KEEP THIS INFORMATION STATEMENT. YOU MAY WANT SOME INFORMATION FROM IT AT A LATER DATE.<br />" </p>

        <p>&nbsp;</p>
        <p>We reserve the right to withdraw from this transaction at any time and if this offer is not accepted within 7 days from the disclosure date on page 1 of this loan agreement</p>
        <h6>&nbsp;</h6>


        <h6>DDR SERVICE AGREEMENT(Ver 1.9)</h6>
        <p>I/We hereby authorise Ezidebit Pty Ltd ACN 096 902 813 (Direct Debit User ID number 165969, 303909, 301203, 234040, 234072, 428198) (herein referred to as "Ezidebit") to make periodic debits on behalf of the "Business" as indicated on the attached Direct Debit Request (herein referred to as "the Business").</p>
        <p>I/We acknowledge that Ezidebit is acting as a Direct Debit Agent for the Business and that Ezidebit does not provide any goods or services (other than the direct debit collection services to me/us for the Business pursuant to the Direct Debit Request and this DDR Service Agreement) and has no express or implied liability in regards to the goods and services provided by the Business or the terms and conditions of any agreement that I/we have with the Business.</p>
        <p>I/We acknowledge that the debit amount will be debited from my/our account according to the terms and conditions of my/our agreement with the Business and the terms and conditions of the Direct Debit Request (and specifically the Debit Arrangement and the Fees/Charges detailed in the Direct Debit Request) and this DDR Service Agreement.</p>
        <p>I/We acknowledge that bank account and/or credit card details have been verified against a recent bank statement to ensure accuracy of the details provided and I/we will contact my/our financial institution if I/we are uncertain of the accuracy of these details.</p>
        <p>I/We acknowledge that is my/our responsibility to ensure that there are sufficient cleared funds in the nominated account by the due date to enable the direct debit to be honoured on the debit date. Direct debits normally occur overnight, however transactions can take up to three (3) business days depending on the financial institution. Accordingly, I/we acknowledge and agree that sufficient funds will remain in the nominated account until the direct debit amount has been debited from the account and that if there are insufficient funds available, I/we agree that Ezidebit will not be held responsible for any fees and charges that may be charged by either my/our or its financial institution.</p>
        <p>I/We acknowledge that there may be a delay in processing the debit if:-</p>
        <p>1.there is a public or bank holiday on the day of the debit, or any day after the debit date;<br>2.a payment request is received by Ezidebit on a day that is not a banking business day in Queensland;<br>3.a payment request is received after normal Ezidebit cut off times, being 3:00pm Queensland time, Monday to Friday.</p>
        <p>Any payments that fall due on any of the above will be processed on the next business day.</p>
        <p>I/We authorise Ezidebit to vary the amount of the payments from time to time as may be agreed by me/us and the Business as provided for within my/our agreement with the Business. I/We authorise Ezidebit to vary the amount of the payments upon receiving instructions from the Business of the agreed variations. I/We do not require Ezidebit to notify me/us of such variations to the debit amount.</p>
        <p>I/We acknowledge that Ezidebit is to provide at least 14 days' notice if it proposes to vary any of the terms and conditions of the Direct Debit Request or this DDR Service Agreement including varying any of the terms of the debit arrangements between us.</p>
        <p>I/We acknowledge that I/we will contact the Business if I/we wish to alter or defer any of the debit arrangements.</p>
        <p>I/We acknowledge that any request by me/us to stop or cancel the debit arrangements will be directed to the Business.</p>
        <p>I/We acknowledge that any disputed debit payments will be directed to the Business and/or Ezidebit. If no resolution is forthcoming, I/we agree to contact my/our financial institution.</p>
        <p>I/We acknowledge that if a debit is returned by my/our financial institution as unpaid, a failed payment fee may be payable by me/us to Ezidebit. Where a failed payment fee is applicable, the amount will be as detailed in the Debit Arrangement of the Direct Debit Request. I/We will also be responsible for any fees and charges applied by my/our financial institution for each unsuccessful debit attempt together with any collection fees, including but not limited to any solicitor fees and/or collection agent fee as may be incurred by Ezidebit.</p>
        <p>I/We authorise Ezidebit to attempt to re-process any unsuccessful payments as advised by the Business.</p>
        <p>I/We acknowledge that certain fees and charges (including setup, variation, SMS or processing fees) may apply to the Direct Debit Request and may be payable to Ezidebit and subject to my/our agreement with the Business agree to pay those fees and charges to Ezidebit.</p>
        <p>Credit Card Payments<br>I/We acknowledge that "Ezidebit" will appear as the merchant for all payments from my/our credit card. I/We acknowledge and agree that Ezidebit will not be held liable for any disputed transactions resulting in the non supply of goods and/or services and that all disputes will be directed to the Business as Ezidebit is acting only as a Direct Debit Agent for the Business.</p>
        <p>I/We acknowledge that Credit Card Fees are a minimum of the Transaction Fee or the Credit Card Fee, whichever is greater as detailed on the Direct Debit Request.</p>
        <p>I/We appoint Ezidebit as my/our exclusive agent with regard to the control, management and protection of my/our personal information (relating to the Business and contained in this DDR Service Agreement). I/We irrevocably authorise Ezidebit to take all necessary action (which Ezidebit deems necessary) to protect and/or correct, if required, my/our personal information, including (but not limited to) correcting account numbers and providing such information to relevant third parties and otherwise disclosing or allowing access to my/our personal information to third parties in accordance with the Ezidebit Privacy Policy.</p>
        <p>Other than as provided in this Agreement or the Ezidebit Privacy Policy, Ezidebit will keep your information about your nominated account at the financial institution private and confidential unless this information is required to investigate a claim made relating to an alleged incorrect or wrongful debit, to be referred to a debt collection agency for the purposes of debt collection, or as otherwise required or permitted by law. Further information relating to Ezidebit's Privacy Policy can be found at http://www.ezidebit.com/au/privacy-policy/.</p>
        <p>I/We hereby irrevocably authorise, direct and instruct any third party who holds/stores my/our personal information (relating to the Business and contained in this DDR Service Agreement) to release and provide such information to Ezidebit on my/our written request.</p>
        <p>I/We authorise:</p>
        <p>a.Ezidebit to verify and/or correct, if necessary, details of my/our account with my/our financial institution; and<br>b.my/our financial institution to release information allowing Ezidebit to verify my/our account details.</p>
        <p>I / We authorise Ezidebit Pty Ltd ACN 096 902 813 (User ID No 165969, 303909, 301203, 234040, 234072, 428198) to debit my/our account at the Financial Institution identified above through the Bulk Electronic Clearing System (BECS), in accordance with this Direct Debit Request and as per the Ezidebit DDR Service Agreement. I / We authorise these payments to be debited at intervals and amounts as directed by {{$first_name." ".$middle_name." ".$last_name}} as per the Terms and Conditions of the {{$first_name." ".$middle_name." ".$last_name}} agreement and subsequent agreements.  </p>





        <h5 style="font-weight: bold; font-style: italic">Please sign and date below and return this agreement if you want to enter into a contract with us. Once this loan agreement is received completed, this contract will be binding on you. </h5>
        <h6>&nbsp;</h6>
        <h4 style="font-weight: bold">I agree to the Loan Contract and to the Terms and Conditions</h4>
        <h4>I agree to the Terms and Conditions of the Direct Debit Request and Service Agreement.</h4>
        <h4> Sign:{{$sign}}   </h4>
        <h4> Date of Birth:{{ $dob }}   </h4>
        <h4> Date:{{$sign_date}}   </h4>
        <h4> From IP Address:{{ $ip }}   </h4>
    </div>
















