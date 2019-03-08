$(function(){

    $("#marital_status").change(function(){
        if($("#marital_status").val()=="Married"||$("#marital_status").val()=="Defacto"||$("#marital_status").val()=="Partner"){
            $("#share_partner").css("display","block");
            $("#share_partner :input").attr("required","required")
            $("#share_partner >select").attr("required","required")
        }
        else {
            $("#share_partner").css("display","none");
            $("#share_partner :input").removeAttr("required");
            $("#share_partner >select").removeAttr("required");
        }

    });

    $("#ddl_share_partner").change(function(){
        if($("#ddl_share_partner").val()==1){
            $("#partner_income_details").css("display","block")
            $("#partner_income_details :input").attr("required","required")
            $("#partner_income_details >select").attr("required","required")
        }
        else {
            $("#partner_income_details").css("display","none")
            $("#partner_income_details :input").removeAttr("required");
            $("#partner_income_details >select").removeAttr("required");
        }

    });

    $("#residential_status").change(function(){
        $("#residential_status_details").css("display","none");
        $("#residential_status_details :input").removeAttr("required");
        $("#residential_status_details >select").removeAttr("required");
        $("#mortgage_detail").css("display","none");
        $("#mortgage_detail :input").removeAttr("required");
        $("#mortgage_detail >select").removeAttr("required");

        if($("#residential_status").val()=="rent"){
            $("#residential_status_details").css("display","block")
            $("#residential_status_details :input").attr("required","required")
            $("#residential_status_details >select").attr("required","required")
        }
        else if($("#residential_status").val()=="mortgage"){
            $("#mortgage_detail").css("display","block");
            $("#mortgage_detail :input").attr("required","required")
            $("#mortgage_detail >select").attr("required","required")
        }
    });

    $("#id_details").change(function(){
        $("#driving_license_details").css("display","none");
        $("#driving_license_details :input").removeAttr("required");
        $("#driving_license_details >select").removeAttr("required");
        $("#proof_of_age_details").css("display","none");
        $("#proof_of_age_details :input").removeAttr("required");
        $("#proof_of_age_details >select").removeAttr("required");
        $("#passport_details").css("display","none");
        $("#passport_details :input").removeAttr("required");
        $("#passport_details >select").removeAttr("required");
        if($("#id_details").val()=="Driver licence"){
            $("#driving_license_details").css("display","block")
            $("#driving_license_details :input").attr("required","required")
            $("#driving_license_details >select").attr("required","required")
        }
        else if($("#id_details").val()=="proof of age card"){
            $("#proof_of_age_details").css("display","block")
            $("#proof_of_age_details :input").attr("required","required")
            $("#proof_of_age_details >select").attr("required","required")
        }
        else if ($("#id_details").val()=="passport") {
            $("#passport_details").css("display","block")
            $("#passport_details :input").attr("required","required")
            $("#passport_details >select").attr("required","required")
        }

    });

    $("#emp_status").change(function(){
        $("#employment_status_details").css("display","none")
        $("#employment_status_details :input").removeAttr("required");
        $("#employment_status_details >select").removeAttr("required");
        $("#unemp").css("display","none")
        $("#unemp :input").removeAttr("required");
        $("#unemp >select").removeAttr("required");
        if($("#emp_status").val()!="unemployed-government benefits"){
            $("#employment_status_details").css("display","block")
            $("#employment_status_details :input").attr("required","required")
            $("#employment_status_details >select").attr("required","required")
        }
        else{
            $("#unemp").css("display","block")
            $("#unemp :input").attr("required","required")
            $("#unemp >select").attr("required","required")
        }


    });

    $("#another_job").change(function(){
        if($("#another_job").val()!=0){
            $("#other_company_details").css("display","block")
            $("#other_company_details :input").attr("required","required")
            $("#other_company_details >select").attr("required","required")
        }
        else{
            $("#other_company_details").css("display","none")
            $("#other_company_details :input").removeAttr("required");
            $("#other_company_details >select").removeAttr("required");
        }
    });

   /* $("#loan_amount").blur(function(){
        if($("#loan_amount").val()%100!=0||$("#loan_amount").val()>2000){
            alert("Invalid Input!")
        }
    });

    $("#loan_period").blur(function(){
        if($("#loan_period").val()%1!=0||$("#loan_period").val()>52||$("#loan_period").val()<9){
            alert("Invalid Input!")
        }
    });*/

    $("#loan_amount").change(function(){
        if($("#loan_amount").val()<=2000){
            $("#loan_period").empty();
            var content="<option value=\"\">--Select--</option>\n" +
                "                                                <option value=\"9\">9</option>\n" +
                "                                                <option value=\"13\">13</option>\n" +
                "                                                <option value=\"17\">17</option>\n" +
                "                                                <option value=\"21\">21</option>\n" +
                "                                                <option value=\"25\">25</option>\n" +
                "                                                <option value=\"29\">29</option>\n" +
                "                                                <option value=\"33\">33</option>\n" +
                "                                                <option value=\"37\">37</option>\n" +
                "                                                <option value=\"41\">41</option>\n" +
                "                                                <option value=\"45\">45</option>\n" +
                "                                                <option value=\"49\">49</option>\n" +
                "                                                <option value=\"52\">52</option>"
            $("#loan_period").append(content);
        }

        else{
            $("#loan_period").empty();
            var content=" <option value=\"\">--Select--</option>\n" +
                "                            <option value=\"9\">9</option>\n" +
                "                            <option value=\"13\">13</option>\n" +
                "                            <option value=\"17\">17</option>\n" +
                "                            <option value=\"21\">21</option>\n" +
                "                            <option value=\"25\">25</option>\n" +
                "                            <option value=\"29\">29</option>\n" +
                "                            <option value=\"33\">33</option>\n" +
                "                            <option value=\"37\">37</option>\n" +
                "                            <option value=\"41\">41</option>\n" +
                "                            <option value=\"45\">45</option>\n" +
                "                            <option value=\"49\">49</option>\n" +
                "                            <option value=\"52\">52</option>\n" +
                "                            <option value=\"52\">56</option>\n" +
                "                            <option value=\"60\">60</option>\n" +
                "                            <option value=\"64\">64</option>\n" +
                "                            <option value=\"68\">68</option>\n" +
                "                            <option value=\"72\">72</option>\n" +
                "                            <option value=\"76\">76</option>"
            $("#loan_period").append(content);
        }
    });

    $("#loan_period").change(function(){
        if($("#loan_amount").val()<=2000){
            $("#repayment").text((($("#loan_amount").val()*1.2+$("#loan_amount").val()*0.48/52*$("#loan_period").val())/$("#loan_period").val()).toFixed(2))
        }
        else if($("#loan_period").val()<=5000){
            $("#repayment").text((($("#loan_amount").val()*1+$("#loan_amount").val()*0.48/52*$("#loan_period").val()+400)/$("#loan_period").val()).toFixed(2))
        }
        else{
            $("#repayment").text((($("#loan_amount").val()*1+$("#loan_amount").val()*0.48/52*$("#loan_period").val())/$("#loan_period").val()).toFixed(2))
        }
    });





    $("#loan_type").change(function(){
        if($("#loan_type").val()==1){
            $("#MACC").css("display","block");
            $("#SACC").css("display","none");
            $("#loan_amount_MACC").attr("required","required")
            $("#loan_period_MACC").attr("required","required")
            $("#loan_amount").removeAttr("required");
            $("#loan_period").removeAttr("required");


        }
        if($("#loan_type").val()==0){
            $("#SACC").css("display","block");
            $("#MACC").css("display","none");
            $("#loan_amount").attr("required","required")
            $("#loan_period").attr("required","required")
            $("#loan_amount_MACC").removeAttr("required");
            $("#loan_period_MACC").removeAttr("required");
        }
    });

    $("#phone_check").click(function(){
        var objectModel = {};
        var   value = $("#mobile").val();
        var   type = $("#mobile").attr('id');
        objectModel[type] =value;
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url:"/application/send_phone_code",
            type:"post",
            dataType:"json",
            data:objectModel,
            timeout:30000,
            success:function(data){
                $("#veri_code").attr('readonly',false);
                alert(data)

            }
        });
        return false;

    });
    
    $("#dob").blur(function () {
       var dob= new Date($(this).val());
      // alert(dob)
       var  end   = new Date();
       var   diff  = new Date(end - dob);
        var    years  = diff/1000/60/60/24/365;
        if(years<18){
            $("#dob").val("");
            alert("You must be 18 years old to apply for a loan!");
        }

    })

    $("#primary_next_pay_date").blur(function () {
        var payday= new Date($(this).val());
        // alert(dob)
        var  end   = new Date();
        var   diff  = new Date(end - payday);
        if(diff>0){
            $("#primary_next_pay_date").val("");
            alert("Please enter valid information!");
        }


    })


    $("#unemp_next_pay_date").blur(function () {
        var payday= new Date($(this).val());
        // alert(dob)
        var  end   = new Date();
        var   diff  = new Date(end - payday);
        if(diff>0){
            $("#unemp_next_pay_date").val("");
            alert("Please enter valid information!");
        }


    })


    $("#next_pay_date").blur(function () {
        var payday= new Date($(this).val());
        // alert(dob)
        var  end   = new Date();
        var   diff  = new Date(end - payday);
        if(diff>0){
            $("#next_pay_date").val("");
            alert("Please enter valid information!");
        }


    })

    $("#employ_start_date").blur(function () {
        var day= new Date($(this).val());
        // alert(dob)
        var  end   = new Date();
        var   diff  = new Date(end - day);
        if(diff<0){
            $("#employ_start_date").val("");
            alert("Please enter valid information!");
        }


    })



    $("#length_of_employment").blur(function () {
        var day= new Date($(this).val());
        // alert(dob)
        var  end   = new Date();
        var   diff  = new Date(end - day);
        if(diff<0){
            $("#length_of_employment").val("");
            alert("Please enter valid information!");
        }


    })

    $("#license_expiry").blur(function () {
        var day= new Date($(this).val());
        // alert(dob)
        var  end   = new Date();
        var   diff  = new Date(end - day);
        if(diff>0){
            $("#license_expiry").val("");
            alert("Please enter valid information!");
        }


    })

    $("#loan_yes").change(function () {
        $("#loan_num_div").css("display","block");


    })

    $("#loan_no").change(function () {
        $("#loan_num_div").css("display","none");


    })


    $("#borrow_amount_slider").change(function () {
        calculate()


    })

    $("#borrow_time_slider").change(function () {
        calculate()


    })


    function calculate() {
        if($("#borrow_amount_slider").val()<=2000){
            $("#repayment_weekly").text((($("#borrow_amount_slider").val()*1.2+$("#borrow_amount_slider").val()*0.48/52*$("#borrow_time_slider").val())/$("#borrow_time_slider").val()).toFixed(2))
            $("#repayment_fornightly").text((($("#borrow_amount_slider").val()*1.2+$("#borrow_amount_slider").val()*0.48/26* Math.ceil($("#borrow_time_slider").val()/2) )/Math.ceil($("#borrow_time_slider").val()/2)).toFixed(2))
            $("#repayment_monthly").text((($("#borrow_amount_slider").val()*1.2+$("#borrow_amount_slider").val()*0.48/12* Math.ceil($("#borrow_time_slider").val()/4) )/Math.ceil($("#borrow_time_slider").val()/4)).toFixed(2))

        }
        else if($("#loan_period").val()<=5000){
            $("#repayment_weekly").text((($("#borrow_amount_slider").val()*1+$("#borrow_amount_slider").val()*0.48/52*$("#borrow_time_slider").val()+400)/$("#borrow_time_slider").val()).toFixed(2))
        }
        else{
            $("#repayment_weekly").text((($("#borrow_amount_slider").val()*1+$("#borrow_amount_slider").val()*0.48/52*$("#borrow_time_slider").val())/$("#borrow_time_slider").val()).toFixed(2))
        }
    }





})