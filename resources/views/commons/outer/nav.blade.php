<div class="component-wrap header-wrap flex flex-ai-c flex-jc-spBet">
    <div class="header-item logo-item">
        <a href="{{ route('welcome') }}" class="header-logo">
            <img src="{{asset('inf/dark-logo.png')}}" width="250"/>
        </a>
        <a href="{{ route('welcome') }}" class="header-logo-mobile">
            <img src="{{asset('inf/dark-logo-mb.png')}}" width="67"/>
        </a>
    </div>
    <div class="header-item header-menu">
        <div class="nav-menu">
            <ul id="menu-main-menu" class="menu">
                <li id="menu-item-83" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-83">
                    <a href="{{ route('howit') }}">How It Works</a></li>
                <li id="menu-item-84" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-84">
                    <a href="{{ route('about') }}">About Us</a></li>
                <li id="menu-item-79" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-79">
                    <a href="{{ route('gr') }}">Guarantees</a></li>
            </ul>
        </div>
    </div>
    <div class="header-item btn-item">
        <div class="btn-login">
        <div class="c-login">
            <a href="{{route('login')}}" class="c-login__btn-open">
                <svg class="c-login__icon" width="21" height="24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10.5 12a6 6 0 1 0 0-12 6 6 0 1 0 0 12zm4.2 1.5h-.783a8.169 8.169 0 0 1-6.834 0H6.3A6.302 6.302 0 0 0 0 19.8v1.95A2.25 2.25 0 0 0 2.25 24h16.5A2.25 2.25 0 0 0 21 21.75V19.8c0-3.478-2.822-6.3-6.3-6.3z" fill="#232E44"></path></svg>
                <span class="c-login__text">Log in</span>
            </a>
        </div>
        <div class="btn-order">
            <a href="{{ route('order') }}" class="cta-1" id="orderCtaHeader">Order</a>
        </div>
    </div>
    <div class="mobile-nav header-item" id="mobile_nav"></div>
</div>