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
            .mobile-amt{
                font-size: 18px!important;
                font-weight: 800!important;
                color: antiquewhite!important;
                margin-left: 15px!important;
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
            .btn-custom{
                display: inline-block!important;
                float: left!important;
                margin-right: 30px!important;
                margin-left: 30px!important;
            }
            .btn-containers {
                margin: auto!important;
                padding-bottom: 30px;
                text-align: center;
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
        <form action="{{ route('finishOrder', ['orderid' => $sess['orderid'] ]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" id="essayform-timezone_num" class="form-control" name="essayform-timezone_num" value="Africa/Nairobi" />
            <script src="{{asset('inf/o2.js')}}"></script>
            <link href="{{asset('inf/o3.css')}}" rel="stylesheet" />
            <div id="accordion-redesign" class="acc-redesign">
                <div class="acc-redesign__title">
                    Get your paper done by an expert in your field! <br>
                    
                    @if(Session::get('status') && Session::get('status') == 201)
                        <div class="alert-danger">{{Session::get('message')}}</div>
                    @endif
                </div>
                <div class="accordion-form__wrapper">
                    <div class="accordion-form">
                        <ul class="accordion-form__steps">
                            <!--STEP 1-->
                            <li id="form__steps-1" class="active current">
                                <div class="accordion-form__steps-meta">
                                    <div class="accordion-form__steps-meta__numbers">Step 1<span>/2</span></div>
                                    <div class="accordion-form__steps-meta__title">Type of work and deadline</div>
                                </div>
                                <div class="accordion-form__steps-content">
                                    <div class="accordion-form__steps-wrap">
                                        <div class="form-group field-essayform-type_of_work has-success">
                                            <label class="control-label" for="essayform-type_of_work">Type of work</label>
                                            <select onchange="OrderWorkTypeChange(this)" id="essayform-type_of_work" class="form-control" name="essayform-type_of_work" data-field="type_of_work" aria-invalid="false">
                                            @if(count($calc_data[0]))
                                                @foreach( $calc_data[0] as $tow )
                                                    @if( $sess['worktype']==$tow['id'] )
                                                        <option alias="{{ $tow['alias'] }}" selected value="{{ $tow['id'] }}" nm="{{ $tow['name'] }}">{{ $tow['name'] }}</option>
                                                    @else
                                                        @if( $tow['id'] == 20 )
                                                            <option alias="{{ $tow['alias'] }}" selected value="{{ $tow['id'] }}" nm="{{ $tow['name'] }}">{{ $tow['name'] }}</option>
                                                        @else
                                                            <option alias="{{ $tow['alias'] }}"  value="{{ $tow['id'] }}" nm="{{ $tow['name'] }}">{{ $tow['name'] }}</option>
                                                        @endif
                                                    @endif
                                                @endforeach
                                            @endif
                                            </select>
                                            <div class="help-block"></div>
                                        </div>
                                        <div class="form-group field-essayform-type_of_work has-success">
                                            <label class="control-label" for="essayform-type_of_work">Subject</label>
                                            <select id="essayform-subject" class="form-control" name="essayform-subject" data-field="subject" aria-invalid="false">
                                                <option value="0" disabled="" selected>Select subject</option>
                                                @if(count($calc_data[5]))
                                                    @foreach( $calc_data[5] as $sow )
                                                        <option value="{{ $sow['id'] }}">{{ $sow['name'] }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            <div class="help-block"></div>
                                        </div>
                                        <div class="form-group field-essayform-level_work">
                                            <label class="control-label" for="essayform-level_work">Academic level</label>
                                            <div id="essayform-level_work" role="radiogroup">
                                                @if(count($calc_data[1]))
                                                    @foreach( $calc_data[1] as $low )
                                                        @php( $low_id = 'low_id' . $low['id'] )
                                                        @php( $radio_id = 'radio_id' . $low['id'] )
                                                        @php( $low_id = "'" . $low_id . "'" )
                                                        @php( $radio_id = "'" . $radio_id . "'" )
                                                        @php( $llabel = "'" . $low['name'] . "'" )

                                                        @if( $sess['worklevel'] == $low['id'] )
                                                            <label for="acadlevel" 
                                                            onclick="handleLevelRadio({{$radio_id}}, {{$low_id}}, {{$low['factor']}}, {{$llabel}})" class="active" id="low_id{{$low['id']}}">
                                                                <input type="radio" class="clevel" id="radio_id{{$low['id']}}" name="essayform-levelofwork" value="{{ $low['factor'] }}" checked /> {{ $low['name']}}
                                                            </label>
                                                        @else
                                                            @if( $low['id'] == 2 )
                                                                <label for="acadlevel" onclick="handleLevelRadio({{$radio_id}}, {{$low_id}}, {{$low['factor']}}, {{$llabel}})" class="active" id="low_id{{$low['id']}}">
                                                                    <input type="radio" class="clevel" id="radio_id{{$low['id']}}" name="essayform-levelofwork" value="{{ $low['factor'] }}" checked /> {{ $low['name']}}
                                                                </label>
                                                            @else
                                                                <label for="acadlevel" onclick="handleLevelRadio({{$radio_id}}, {{$low_id}}, {{$low['factor']}}, {{$llabel}})" id="low_id{{$low['id']}}">
                                                                    <input type="radio" class="clevel" id="radio_id{{$low['id']}}" name="essayform-levelofwork" value="{{ $low['factor'] }}" /> {{ $low['name']}}
                                                                </label>
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                @endif
                                                <input type="hidden" name="levelfactorid" id="levelfactorid"/>
                                                <input type="hidden" name="levelfactoridlabel" id="levelfactoridlabel"/>
                                            </div>
                                        </div>
                                        <div class="accordion-form__row-flex">
                                            <div class="number-page-row">
                                                <div class="form-group field-essayform-number_page">
                                                    <label class="control-label" for="essayform-number_page">Number of pages</label>
                                                    <span class="ui-spinner ui-corner-all ui-widget ui-widget-content" style="height: 45px;">
                                                        @php( $def_page = $sess['pages'] )
                                                        @php( $def_wo = $sess['pages'] * 275 )
                                                        @if(!$sess['pages'])
                                                            @php( $def_page = 1)
                                                            @php( $def_wo = 275 )
                                                        @endif
                                                        <input
                                                            type="text"
                                                            id="essayform-number_page"
                                                            name="essayform-number_page"
                                                            value="{{ $def_page }}"
                                                            data-field="number_page"
                                                            inputmode="numeric"
                                                            aria-valuemin="1"
                                                            aria-valuemax="200"
                                                            aria-valuenow="1"
                                                            autocomplete="off"
                                                            class="ui-spinner-input"
                                                            role="spinbutton"
                                                        />
                                                        <a onclick="handlePagesInput()" tabindex="-1" aria-hidden="true" class="ui-button ui-widget ui-spinner-button ui-spinner-up ui-corner-tr ui-button-icon-only" role="button">
                                                            <span class="ui-button-icon ui-icon ui-icon-triangle-1-n"></span><span class="ui-button-icon-space"> </span>
                                                        </a>
                                                        <a onclick="handlePagesInput(0)" tabindex="-1" aria-hidden="true" class="ui-button ui-widget ui-spinner-button ui-spinner-down ui-corner-br ui-button-icon-only" role="button">
                                                            <span class="ui-button-icon ui-icon ui-icon-triangle-1-s"></span><span class="ui-button-icon-space"> </span>
                                                        </a>
                                                    </span>
                                                    <div class="help-block"></div>
                                                </div>
                                                <span data-label="wordsCount" id="wordsCount" >{{ $def_wo }} words</span>
                                            </div>
                                            <div class="form-group field-essayform-as-single_spaced">
                                                <span
                                                    class="t-hint lato-400"
                                                    data-action="Hint"
                                                    data-theme="dark"
                                                    data-title="<strong>Single-spaced</strong><p>The final paper will have one line spacing between lines.</p>"
                                                    data-hint-icon=""
                                                >
                                                    <div class="t-hint__wrap t-hint_theme_dark">
                                                        <div class="t-hint__icon__wrap"><div class="t-hint__icon__block"></div></div>
                                                        <div class="t-hint__content"></div>
                                                    </div>
                                                </span>
                                                
                                                <input onclick="handleSpacingRadio(this)" type="checkbox" id="essayform-as-single_spaced" name="essayform-spacing" value="1.025" data-alias="single_spaced" data-type="single_spaced" data-field="single_spaced" />
                                                <label for="essayform-as-single_spaced">
                                                    <span class="double">Double-spaced</span>
                                                    <span class="single">Single-spaced</span>
                                                </label>
                                                <input type="hidden" value='1' name="spacingfactorid" id="spacingfactorid"/>
                                            </div>
                                        </div>
                                        <div class="accordion-form__urgency_notice">
                                            <div class="form-group field-essayform-urgency">
                                                <label class="control-label" for="essayform-urgency">Urgency</label>
                                                <select onchange="OrderWorkUrgencyChange(this)" id="essayform-urgency" class="form-control" name="essayform-urgency" data-field="urgency">
                                    @if(count($calc_data[2]))
                                        @foreach( $calc_data[2] as $uow )
                                            @php( $deadloine = $uow['alias'] . ' / ' . date("D, M jS", strtotime('+'.$uow['name'].' hours')) )
                                            @if($uow['id'] == 2 )
                                                <option nm="{{ $deadloine }}" factor="{{ $uow['factor'] }}" selected value="{{ $uow['id'] }}">{{ $uow['alias'] }} / {{ date("D, M jS", strtotime('+'.$uow['name'].' hours')) }}</option>
                                            @else
                                                <option nm="{{ $deadloine }}" factor="{{ $uow['factor'] }}"  value="{{ $uow['id'] }}">{{ $uow['alias'] }} / {{ date("D, M jS", strtotime('+'.$uow['name'].' hours')) }}</option>
                                            @endif
                                        @endforeach
                                    @endif
                                                </select>
                                                <div class="help-block"></div>
                                            </div>
                                            <div class="accordion-form__urgency_notice_block">Please be informed that we might ask for additional time in case the order is complex</div>
                                        </div>
                                    </div>
                                    <div class="accordion-form__contacts-block">
                                        <div class="form-group field-essayform-email required">
                                            <label class="control-label" for="essayform-email">E-mail</label>
                                            <input type="email" id="essayform-email" class="form-control" name="essayform-email" value="{{$sess['email']}}" placeholder="example@gmail.com" data-field="email" aria-required="true" />
                                            <div class="help-block"></div>
                                        </div>
                                        <div class="form-group field-essayform-email require">
                                            <label class="control-label" for="essayform-phone">Phone</label><br>
                                            <input style="padding-left: 50px;" type="tel" id="essayform-phone" name="essayform-phone" class="form-control"/>
                                        </div>
                                        <input type="hidden" name="totalorderamount" id="totalorderamount"/>
                                    </div>
                                    <div class="btn-container">
                                        <button type="button" id="btn_step_1" onclick="gotoLast()" class="btn btn-next">Next Step</button>
                                    </div>
                                </div>
                            </li>
                            <!--STEP 2-->
                            <li id="form__steps-2">
                                <div class="accordion-form__steps-meta">
                                    <div class="accordion-form__steps-meta__numbers">Step 2<span>/2</span></div>
                                    <div class="accordion-form__steps-meta__title">Additional paper details</div>
                                </div>
                                <div class="accordion-form__steps-content">
                                    <div class="accordion-form__steps-wrap">
                                        <div class="form-group field-essayform-topic required">
                                            <label class="control-label" for="essayform-topic">Topic</label>
                                            <input
                                                type="text"
                                                id="essayform-topic"
                                                class="form-control"
                                                name="essayform-topic"
                                                value="Any topic (Writer's choice)"
                                                maxlength="128"
                                                placeholder="Any topic (Writer's choice)"
                                                data-field="topic"
                                                aria-required="true"
                                            />
                                            <div class="help-block"></div>
                                        </div>
                                        <div class="form-group field-essayform-instruction">
                                            <label class="control-label" for="essayform-instruction">Specific instructions</label>
                                            <textarea
                                                required
                                                id="essayform-instruction"
                                                class="form-control"
                                                name="essayform-instruction"
                                                placeholder="E.g., preferred paper structure, outline, grading scale, or any particular work focus."
                                                data-field="instruction"
                                            ></textarea>
                                            <div class="help-block"></div>
                                        </div>
                                        <div class="file-row">
                                            <div class="form-group field-essayform-file">
                                                <label>Upload file here ( e.g. tasks document or instructions)</label>
                                                <input type="file" class="form-control form-group field-essayform-language_work" id="essayformfile" name="essayformfile"/>
                                                <div class="help-block"></div>
                                                <div data-label="limit-exceeded">You will be able to attach more files after the order is placed.</div>
                                            </div>
                                        </div>
                                        <div class="form-group field-essayform-number_of_source">
                                            <label class="control-label" for="essayform-number_of_source">Sources<br>
                                                <small>Please specify the exact number of books, journals, articles or any other sources you want the writer to use as references in your paper</small>
                                            </label>
                                            <span class="ui-spinner ui-corner-all ui-widget ui-widget-content" style="height: 45px;">
                                                <input
                                                    type="text"
                                                    id="essayform-number_of_source"
                                                    name="essayform-number_of_source"
                                                    value="0"
                                                    inputmode="numeric"
                                                    aria-valuemin="0"
                                                    aria-valuemax="100"
                                                    aria-valuenow="0"
                                                    autocomplete="off"
                                                    class="ui-spinner-input"
                                                    role="spinbutton"
                                                />
                                                <a onclick="handleSourceInput()" tabindex="-1" aria-hidden="true" class="ui-button ui-widget ui-spinner-button ui-spinner-up ui-corner-tr ui-button-icon-only" role="button">
                                                    <span class="ui-button-icon ui-icon ui-icon-triangle-1-n"></span><span class="ui-button-icon-space"> </span>
                                                </a>
                                                <a onclick="handleSourceInput(0)" tabindex="-1" aria-hidden="true" class="ui-button ui-widget ui-spinner-button ui-spinner-down ui-corner-br ui-button-icon-only" role="button">
                                                    <span class="ui-button-icon ui-icon ui-icon-triangle-1-s"></span><span class="ui-button-icon-space"> </span>
                                                </a>
                                            </span>
                                            <div class="help-block"></div>
                                        </div>
                                        <div class="form-group field-essayform-language_work">
                                            <label class="control-label" for="essayform-language_work">Referencing style</label>
                                            <select id="essayform-language_work" class="form-control" name="essayform-language_work" data-field="lang">
                                                <option selected value="APA">APA</option>
                                                <option value="Chicago">Chicago</option>
                                                <option value="MLA">MLA</option>
                                                <option value="Harvard">Harvard</option>
                                                <option value="OSCOLA">OSCOLA</option>
                                            </select>
                                        </div>
                                        <div class="btn-holder">
                                            <div class="btn-container btn-custom">
                                                <button style="background-color: #4d4d4e;" type="button" onclick="gotoFast()" class="btn btn-next">Previous Step</button>
                                            </div>
                                            <div class="btn-container btn-custom">
                                                <button type="submit" id="btn_step_2" class="btn btn-next">Pay Now</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!--STEP 3-->
                        </ul>
                        <!--MOBILE FOOTER -->
                        <span class="fixed-block"></span>
                        <div id="mobile-scroll" class="scroll accordion-form__mobile-footer" style="position: fixed; bottom: 0px;">
                            <div class="accordion-form__mobile-total">
                                <span class="accordion-form__mobile-total-title">Total cost</span>
                                <div data-label="total"></div>
                                <div id="new_total_mobile" class="mobile-amt">${{ $sess['amount'] }}</div>
                            </div>
                        </div>
                    </div>
                    <!--SIDEBAR -->
                    <div class="accordion-sidebar">
                        <div class="accordion-sidebar__wrap" style="top: 0px;">
                            <div class="accordion-sidebar__top">
                                <div id="workshow" class="accordion-sidebar__top-item--type">Essay</div>
                                <div id="levelshow" class="accordion-sidebar__top-item--level">College</div>
                            </div>
                            <div class="accordion-preview">
                                <div class="accordion-preview__item accordion-preview__item--pages">
                                    <span id="pageshow">1</span> page(s)/
                                    <span id="spacingshow">double-spaced</span>
                                </div>
                                <div class="accordion-preview__item accordion-preview__item--urgency">
                                    <span id="urgencyshow"></span>
                                </div>
                            </div>
                            <div class="bonus-field"></div>
                            <div class="accordion-form__total">
                                <span class="accordion-form__total-title">Total cost</span>
                                <div data-label="total"></div>
                                <div id="new_total" data-label="new_total">${{ $sess['amount'] }}</div>
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