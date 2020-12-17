
<!DOCTYPE html>
<!--[if IE 7]><html class="ie7"><![endif]-->
<!--[if IE 8]><html class="ie8"><![endif]-->
<!--[if IE 9]><html class="ie9"><![endif]-->
<!--[!(IE)]><!-->
<html><!--<![endif]-->
<head>
@yield('meta')
<link rel="stylesheet" href="{{asset('inf/intlTelInput.css')}}">
<style>
.iti {
    width:100%!important;
}
.intl-tel-input .flag-dropdown .selected-flag {
    padding: 15px 15px 15px 15px!important;
}
.iti__flag {
  height: 15px;
  box-shadow: 0px 0px 1px 0px #888;
  background-image: url({{asset('flags.png')}}); 
  background-repeat: no-repeat;
  background-color: #DBDBDB;
  background-position: 20px 0; }
  @media (-webkit-min-device-pixel-ratio: 2), (min-resolution: 192dpi) {
    .iti__flag {
      background-image: url({{asset('flags@2x.png')}}); 
    } }
</style>
</head>

<body class="home page-template-default page page-id-5">
<div class="phone-line">
    <div class="component-wrap" style="color: #ffffff;">
        Email us: <a style="color: #ffffff;font-weight: 800;" href="javascript:void(0);" class="phone-item" onclick="">help@myacademicwriter.com</a>
    </div>
</div>

<header class="header " id="header">

@yield('nav')
</header>

<!--MAIN-->
<div id="main" class="main">

    <!-- Validation 82749187238 -->
      @yield('face')

    <section class="pas-wrap">
        @yield('counterup')
    </section>

    <section class="how-it-works-wrap">
        @yield('howitworks')
    </section>

    <section class="meet-our-experts-wrap">
        @yield('team')
    </section>

    <section class="new-team-members-wrap">
        @yield('hrprocess')
    </section>
    
    <section class="popular-assignments-wrap">
        @yield('popular')
    </section>

    <section class="reviews-wrap">
        @yield('promo')
    </section>

    <section class="customer-reviews-wrap">
      @yield('testimony')
    </section>

    <section class="popular-services-wrap">
        @yield('free')
    </section>

    <section class="faq-wrap">
      @yield('faq')
    </section>

    @yield('label')

    <section class="homework-wrap">
        @yield('seofake')
    </section>

</div>

<footer class="footer-wrap">
    <div class="component-wrap">
        <div class="flex-first">
            <div class="footer-wrap__top">
                <div class="footer-logo">
                    <a href="{{route('welcome')}}">
                        <img src="{{asset('inf/dark-logo.png')}}" width="250"/>
                    </a>
                </div>
                <div class="footer__new-info mobile-visible">
                    All of papers you get at myacademicwriter.com are meant for research purposes only.
                    The papers are not supposed to be submitted for academic credit.
                </div>
                <div class="footer-copy mobile-visible">
                    Copyright © 2015 - 2020, myacademicwriter.com <br>
                    All rights reserved.
                </div>
            </div>
            <div class="footer2-menu">
            <ul id="menu-footer-2" class="menu">
                <li id="menu-item-287" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-287">
                  <a href="{{route('howit')}}">How It Works</a></li>
                <li id="menu-item-286" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-286">
                  <a href="{{route('about')}}">About Us</a></li>
                <li id="menu-item-289" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-289">
                  <a href="{{route('gr')}}">Guarantees</a></li>
                <li id="menu-item-290" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-290">
                  <a href="##" data-crm-widget="termsPopup" data-tab="tos">Terms And Conditions</a></li>
            </ul>
        </div>
        </div>
        <div class="flex-last">
            <div class="footer-payment">
                <div class="footer-secure">
                    <img data-original="{{asset('inf/guarantee.png')}}" class="lazy" alt="">
                    <img data-original="{{asset('inf/reviews.png')}}" class="lazy" alt="">
                </div>
                <div class="payments"><p>We accept:</p><img
                            data-original="{{asset('inf/payments.png')}}" class="lazy" alt="">
                </div>
            </div>
            <div class="footer-copy mobile-hide">
                Copyright © 2015 - 2020, myacademicwriter.com <br>
                All rights reserved.
            </div>
            <div class="footer__new-info mobile-hide">
                All of papers you get at myacademicwriter.com are meant for research purposes only.
                The papers are not supposed to be submitted for academic credit.
            </div>
        </div>
    </div>
    <div class="footer-bot-wrap">
        <div class="component-wrap">
            <div class="footer-copy"></div>
        </div>
    </div>
</footer>


<link rel='stylesheet' id='fontawesome-css' href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css?ver=4.9.8" type='text/css' media='all' />
<script type='text/javascript' src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js?ver=1.11.3"></script>
<script type='text/javascript' src="{{asset('inf/front.min.js')}}"></script>

<script src="{{asset('inf/fc78133073ebe3efe317d67ab7454041.js')}}"></script>
<script src="{{asset('inf/intlTelInput.js')}}"></script>
<script>
    /*** ++++++++++++++++++ main order page ++++++++++++++++++++++++++++++++ */
    handleLevelRadio = function(radio, touchedlabel, factor, llable)
    {
        console.log(radio, touchedlabel, factor, llable);
        $('#levelfactorid').val(factor);
        $('#levelfactoridlabel').val(llable);
        $('.clevel').attr('checked', false);
        $('#essayform-level_work label[for="acadlevel"]').removeClass( "active" ).addClass( "inactive" )
        $('#' + touchedlabel ).addClass( "active" );
        $('#' + radio).attr('checked', true);
        Ordercompute();
        orderShowItems();
    }
    handleSpacingRadio = function(chk)
    {
        if($("#essayform-as-single_spaced").prop('checked') == true){
            $('#spacingfactorid').val(chk.value)
            console.log('checked', chk.value);
            Ordercompute();
            orderShowItems();
        }else{
            console.log('not checked', 0);
            $('#spacingfactorid').val(1);
            Ordercompute();
            orderShowItems();
        }
        return;
    }
    handlePagesInput = function(chk = 1)
    {
        if( chk === 1 ){
            var current = parseInt($('#essayform-number_page').val());
            if( current <= 200 )
            {
                var final = current+1; 
                $('#essayform-number_page').val(final);
                $('#wordsCount').text(parseInt(final*275) + ' words')
                Ordercompute();
                orderShowItems();
            }
            else
            {
                var final = current;
                $('#essayform-number_page').val(final)
                $('#wordsCount').text(parseInt(final*275) + ' words')
                Ordercompute();
                orderShowItems();
            }
            return;
        }else{
            var current = parseInt($('#essayform-number_page').val());
            if( current > 1 )
            {
                var final = current-1; 
                $('#essayform-number_page').val(final);
                $('#wordsCount').text(parseInt(final*275) + ' words')
                Ordercompute();
                orderShowItems();
            }
            else
            {
                var final = current; 
                $('#essayform-number_page').val(final);
                $('#wordsCount').text(parseInt(final*275) + ' words')
                Ordercompute();
                orderShowItems();
            }
            return;
        }
        return;
    }
    OrderWorkTypeChange = function(sel){
        var v = sel.value;
        var alias = $('option:selected', sel).attr('alias');
        if( alias !== 'none')
        {
            switchOrderPricing(2);
        }
        else
        {
            switchOrderPricing(1);
        }
    }
    OrderWorkUrgencyChange = function(sel)
    {
        Ordercompute();
        orderShowItems();
    }
    switchOrderPricing = function(t)
    {
        data = "t=" + t + "&_token={{ csrf_token() }}";
        $.ajax({
            type: "post",
            url:"{{route('fpricing')}}",
            data:data,
            success: function(res){
                var data = res.data;
                var options = '';
                for (var x = 0; x < data.length; x++) {
                    var f = data[x]['factor'];
                    var pid = data[x]['id'];
                    var lb = data[x]['alias'];
                    var hr = data[x]['dt'];
                    var bbl = lb + ' / ' + hr;
                    if(pid === 2){
                        options += '<option selected factor="' + f + '" value="' + pid + '" nm="' + bbl + '">' +bbl+ '</option>';
                    }
                    else{
                        options += '<option factor="' + f + '" value="' + pid + '" nm="' + bbl + '">' +bbl+ '</option>';
                    }
                }
                $('#essayform-urgency').html(options);
                Ordercompute();
                orderShowItems();
            },
            error: function(xhr, status, error){
                console.log(xhr, error, status);
            }
        });
    }
    Ordercompute = function()
    {
        var pg = parseInt($('#essayform-number_page').val());
        var ct = $('option:selected', '#essayform-urgency').attr('factor');
        var fc = $('#levelfactorid').val();
        var spc = $('#spacingfactorid').val();
        console.log(pg, ct, fc, spc);
        let rtn = (parseFloat( pg * ct * fc * spc)).toFixed(2);
        $('#new_total_mobile').text('$' + rtn );
        $('#new_total').text('$' + rtn );
        $('#totalorderamount').val( rtn );
        return true;
    }
    orderShowItems = function(){
        var spc = $('#spacingfactorid').val();
        var spclabel = 'Double-spaced';
        if(spc != 1){
            var spclabel = 'Single-spaced';
        }
        $('#workshow').text($('option:selected', '#essayform-type_of_work').attr('nm'));
        $('#levelshow').text($('#levelfactoridlabel').val());
        $('#pageshow').text(parseInt($('#essayform-number_page').val()));
        $('#spacingshow').text(spclabel);
        $('#urgencyshow').text($('option:selected', '#essayform-urgency').attr('nm'));
    }
    gotoLast = function(){
        var email = $('#essayform-email').val();
        var phone = $('#essayform-phone').val();
        if(!validateEmail(email) || phone.length < 10 )
        {
            alert('Email address is required');
            return;
        }
        $('#form__steps-1').removeClass( "active current" );
        $('#form__steps-2').addClass( "active current" );
    }
    gotoFast = function(){
        $('#form__steps-2').removeClass( "active current" );
        $('#form__steps-1').addClass( "active current" );
    }
    function validateEmail(email) {
        const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(String(email).toLowerCase());
    }
    handleSourceInput = function(chk = 1)
    {
        if( chk === 1 ){
            var current = parseInt($('#essayform-number_of_source').val());
            if( current <= 50 )
            {
                var final = current+1; 
                $('#essayform-number_of_source').val(final);
            }
            else
            {
                var final = current;
                $('#essayform-number_of_source').val(final)
            }
            return;
        }else{
            var current = parseInt($('#essayform-number_of_source').val());
            if( current > 1 )
            {
                var final = current-1; 
                $('#essayform-number_of_source').val(final);
            }
            else
            {
                var final = current; 
                $('#essayform-number_of_source').val(final);
            }
            return;
        }
        return;
    }
    $("#essayform-phone").intlTelInput();
    /*** ++++++++++++++++++ end main order page ++++++++++++++++++++++++++++++++ */
</script>
<script>
    switchPricing = function(t)
    {
        data = "t=" + t + "&_token={{ csrf_token() }}";
        $.ajax({
            type: "post",
            url:"{{route('fpricing')}}",
            data:data,
            success: function(res){
                var data = res.data;
                var options = '';
                for (var x = 0; x < data.length; x++) {
                    var f = data[x]['factor'];
                    var pid = data[x]['id'];
                    var lb = data[x]['alias'];
                    var hr = data[x]['dt'];
                    if(pid === 2 ){
                        options += '<option selected factor="' + f + '" value="' + pid + '">' + lb + ' / ' + hr + '</option>';
                    }else{
                        options += '<option factor="' + f + '" value="' + pid + '">' + lb + ' / ' + hr + '</option>';
                    }
                }
                $('#calculator-urgency').html(options);
                compute();
            },
            error: function(xhr, status, error){
                console.log(xhr, error, status);
            }
        });
    }

    onWorkTypeChange = function(sel)
    {
        var v = sel.value;
        var alias = $('option:selected', sel).attr('alias');
        if( alias !== 'none')
        {
            switchPricing(2);
        }
        else
        {
            switchPricing(1);
        }
    }
    onWorkLevelChange = function(sel)
    {
        compute();
    }
    onWorkUrgencyChange = function(sel)
    {
        compute();
    }
    onWorkPagesChange = function(sel)
    {
        compute();
    }
    compute = function()
    {
        var pg = $('option:selected', '#calculator-number_page').attr('value');
        var ct = $('option:selected', '#calculator-urgency').attr('factor');
        var fc = $('option:selected', '#calculator-level_work').attr('factor');
        console.log(pg, ct, fc);
        let rtn = (parseFloat( pg * ct * fc )).toFixed(2);
        $('#order-cost').text('$' + rtn );
        $('#ttl').val( rtn );
        return true;
    }
    format_dt = function(dt)
    {
        var d = dt.toString().split(' ');
        var df = d[0] + ', ' + d[1] + ' ' + d[2];
        return df;
    }
  $( document ).ready( function() {
    var default_acd = $("input:radio.clevel:checked").val();
    $('#levelfactorid').val(default_acd);
    $('#levelfactoridlabel').val('College');
    $('#').Intl.DateTimeFormat().resolvedOptions().timeZone
    $('#essayform-timezone_num').val(Intl.DateTimeFormat().resolvedOptions().timeZone)
    // console.log('default_acd', default_acd);
    orderShowItems();
    Ordercompute();
    // console.log('deadline', format_dt(new Date().addHours(240)));
  });
</script>
</body>
</html>
