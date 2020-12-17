<div class="order-container">
    <div class="order-wrappper">
    <div data-crm-widget="form">
    <div data-crm="loader" style="display: none;"></div>
    <div style="display: block;">
        <link href="{{asset('inf/o1.css')}}" rel="stylesheet" />
        <style>
            form#orderForm div[data-label="limit-exceeded"] {
                display: none;
            }
            .alert-danger{
                padding: 10px;
                border-radius:10px;
                background-color: #f44336; /* Red */
                color: white;
                font-size:15px;
                width:40%;
                text-align:center;
                margin:auto;
                margin-bottom: 15px;
                margin-top: 15px;
            }
            @media (min-width: 100px)
            {
                .accordion-sidebar__wrap {
                    box-shadow: 0 4px 10px rgba(99,157,255,.44)!important;
                    border-radius: 8px!important;
                    background-color: #fff!important;
                }
            }
            .accordion-sidebar {
                display: block!important;
            }
            .accordion-sidebar__wrap {
                max-width: 680px!important;
                margin: auto!important;
            }
            form#orderForm[data-files-state="limit-exceeded"] div[data-label="limit-exceeded"] {
                display: block;
            }
            #accordion-redesign .accordion-form .field-essayform-number_of_source .ui-spinner-up:before, #accordion-redesign .accordion-form .field-essayform-number_page .ui-spinner-up:before {
                background: url('inf/plus.png') center no-repeat!important;
            }
            #accordion-redesign .accordion-form__contacts-block .ext-phone .selectr-selected:before {
                background: url('inf/select-arrow-phone.svg') no-repeat!important;
            }
        </style>
        <div id="crmLoginModal" class="c-modal c-modal_xs" data-show-btn=".crm-login-modal">
        </div>
        <form>
            @csrf
            <input type="hidden" id="essayform-timezone_num" class="form-control" name="essayform-timezone_num" value="Africa/Nairobi" />
            <script src="{{asset('inf/o2.js')}}"></script>
            <link href="{{asset('inf/o3.css')}}" rel="stylesheet" />
            <div id="accordion-redesign" class="acc-redesign">
                <div class="acc-redesign__title">
                    Complete your order <br>
                    <div class="alert-danger">some error</div>
                </div>
                <div class="accordion-form__wrapper">
                    <div class="accordion-sidebar">
                        <div class="accordion-sidebar__wrap" style="top: 0px;">
                            <div class="accordion-sidebar__top">
                                <div id="workshow" class="accordion-sidebar__top-item--type">Order No.</div>
                                <div id="levelshow" class="accordion-sidebar__top-item--level">
                                    {{ $sess['orderid'] }}
                                </div>
                            </div>
                            <div class="bonus-field"></div>
                            <div class="accordion-form__total">
                                <span class="accordion-form__total-title">Total cost</span>
                                <div data-label="total"></div>
                                <div id="new_total" data-label="new_total">
                                    ${{ $sess['amount'] }}
                                </div>
                            </div>
                            <div class="accordion-form__cards">
                                <img src="{{asset('inf/cards.png')}}" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br><br>
            <div class="info">
                <div class="info__items">
                    <div class="info__item">
                        <div class="info__title">Secure online payment</div>
                        <div class="info__txt">Your online payment will be processed via a secure payment system. We don’t have access to your credit card information. So it is absolutely safe to pay for your paper.</div>
                    </div>
                    <div class="info__item">
                        <div class="info__title">Free revisions</div>
                        <div class="info__txt">Your can submit your paper for free revisions for 2 whole weeks. We will revise it as many times as needed, until you are 100% satisfied with your order.</div>
                    </div>
                    <div class="info__item">
                        <div class="info__title">Satisfaction guarantee</div>
                        <div class="info__txt">
                            If the downloaded paper doesn’t match your order requirements, you can request a refund within 14-30 days, depending on your paper’s lenght. You can request a complete refund before the paper is downloaded.
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

    </div>