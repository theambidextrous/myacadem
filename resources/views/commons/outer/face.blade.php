<section class="first-screen-wrap">
    <style>
        .form-group select {
        line-height: 46px!important;
        }
        .email__field:after {
            content: ''!important;
        }
    </style>
    <div class="component-wrap">
            <div class="flex flex-jc-spBet flex-ai-c">
                <div class="component-item top-title">
                    <div class="section-title">
                        {{ $title }}
                    </div>
                    <div class="section-subtitle">
                        {{ $subtitle }}
                    </div>
                    <ul>
                        <li>
                            <b>24/7</b> Support
                        </li>
                        <li>
                            <b>50+</b> Disciplines
                        </li>
                        <li>
                            <b>100%</b> Confidentiality
                        </li>
                    </ul>
                </div>
                <div class="component-item">
                    <div class="simple-calculator__outer">
                        <div class="section__title">I Need an Expert for:</div>
                    <div data-crm-widget=""><div data-crm="loader" style="display: none;"></div>
                        <div style="display: block;">
                        <form id="simplePriceCalc" action="{{ route('init') }}" method="post">
                        @csrf
                        <div class="simple-calc row">
                            <div class="col-sm-12">
                                <div class="simple-calc__field email__field">
                                    <div class="form-group field-calculator-type_of_work">
                                        <input type="email" style="padding-left:10px;" id="email" class="email__field form-control simple-calc__field" name="email" required placeholder="Email address"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="simple-calc__field">
                                    <div class="form-group field-calculator-type_of_work">
                                        <select onchange="onWorkTypeChange(this)" id="calculator-type_of_work" class="form-control" name="calculator-type_of_work" data-field="type_of_work">
                                    @if(count($calc_data[0]))
                                        @foreach( $calc_data[0] as $tow )
                                            @if($tow['id'] == 20 )
                                                <option alias="{{ $tow['alias'] }}" selected value="{{ $tow['id'] }}">{{ $tow['name'] }}</option>
                                            @else
                                                <option alias="{{ $tow['alias'] }}"  value="{{ $tow['id'] }}">{{ $tow['name'] }}</option>
                                            @endif
                                        @endforeach
                                    @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="simple-calc__field">
                                    <div class="form-group field-calculator-level_work">
                                        <select onchange="onWorkLevelChange()" id="calculator-level_work" class="form-control" name="calculator-level_work" data-field="level_work">
                                    @if(count($calc_data[1]))
                                        @foreach( $calc_data[1] as $low )
                                            @if($low['id'] == 2 )
                                                <option factor="{{ $low['factor'] }}" selected value="{{ $low['id'] }}">{{ $low['name'] }}</option>
                                            @else
                                                <option factor="{{ $low['factor'] }}"  value="{{ $low['id'] }}">{{ $low['name'] }}</option>
                                            @endif
                                        @endforeach
                                    @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="simple-calc__field">
                                    <div class="form-group field-calculator-urgency">
                                        <select onchange="onWorkUrgencyChange()" id="calculator-urgency" class="form-control" name="calculator-urgency" data-field="urgency">
                                @if(count($calc_data[2]))
                                    @foreach( $calc_data[2] as $uow )
                                        @if($uow['id'] == 2 )
                                            <option factor="{{ $uow['factor'] }}" selected value="{{ $uow['id'] }}">{{ $uow['alias'] }} / {{ date("D, M jS", strtotime('+'.$uow['name'].' hours')) }}</option>
                                        @else
                                            <option factor="{{ $uow['factor'] }}"  value="{{ $uow['id'] }}">{{ $uow['alias'] }} / {{ date("D, M jS", strtotime('+'.$uow['name'].' hours')) }}</option>
                                        @endif
                                    @endforeach
                                @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="simple-calc__field">
                                    <div class="form-group field-calculator-number_page">
                                        <select onchange="onWorkPagesChange()" id="calculator-number_page" class="form-control" name="calculator-number_page" data-field="number_page">
                                @if(count($calc_data[3]))
                                    @foreach( $calc_data[3] as $nop )
                                        @if($nop['id'] == 1 )
                                            <option selected value="{{ $nop['id'] }}">{{ $nop['dword'] }} words / {{ $nop['name'] }} pages</option>
                                        @else
                                            <option value="{{ $nop['id'] }}">{{ $nop['dword'] }} words / {{ $nop['name'] }} pages</option>
                                        @endif
                                    @endforeach
                                @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="field-price">
                            <div id="order-cost" data-label="price">${{ number_format($calc_data[4], 2) }}</div>
                        </div>
                        <input id="ttl" value="{{ round($calc_data[4], 2) }}" type="hidden" name="totals"/>
                        <div class="field-submit">
                            <button type="submit" data-role="goToForm" id="simpleCalcCta">Order Now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</section>