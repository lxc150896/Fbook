<header data-language="{{ Session::get('website-language') }}">
    <div class="header-top-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    @if(Session::get('website-language') == 'vi')
                        <div class="language-area">
                            <ul>
                                <li>
                                    <img src="{{ asset(config('view.image_paths.flag') . '3.png') }}" alt="flag"/>
                                    <a href="{{ route('user.change-language', ['vi']) }}">{{ trans('settings.lang.vi') }}</a>
                                    <i class="fa fa-angle-down"></i>
                                    <div class="header-sub">
                                        <ul>
                                            <li>
                                                <a href="{{ route('user.change-language', ['en']) }}">
                                                    <img src="{{ asset(config('view.image_paths.flag') . '1.jpg') }}" alt="flag"/>{{ trans('settings.lang.en') }}
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    @else
                        <div class="language-area">
                            <ul>
                                <li><img src="{{ asset(config('view.image_paths.flag') . '1.jpg') }}" alt="flag"/><a
                                            href="{{ route('user.change-language', ['en']) }}">{{ trans('settings.lang.en') }}</a>
                                    <i class="fa fa-angle-down"></i>
                                    <div class="header-sub">
                                        <ul>
                                            <li>
                                                <a href="{{ route('user.change-language', ['vi']) }}">
                                                    <img src="{{ asset(config('view.image_paths.flag') . '3.png') }}"
                                                         alt="flag"/>{{ trans('settings.lang.vi') }}
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="account-area text-right">
                        <ul class="header-ul">
                            @auth
                                <li class="noti">
                                    <div class="header-noti">
                                        <a href="#">
                                            <i class="fa fa-bell-o noti-show" id="bell-notification" aria-hidden="true" data="{{ $new }}"></i>
                                            <sup class="badge badge-danger active-notification {{ $new == 0 ? 'hidden' : '' }}" id="notification_298">
                                                <span>{{ $new == 0 ? '' : $new }}</span>
                                            </sup>
                                        </a>
                                    </div>
                                    <div id="noti-detail" class="s-suggest"></div>
                                </li>
                                <li>
                                    <div class="dropdown">
                                        <span id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            @if(Auth::user()->avatar)
                                                <img src="{{ asset(Auth::user()->avatar) }}" alt="avatar" class="avatar">
                                            @else
                                                <img src="{{ asset(config('view.image_paths.user') . '1.png') }}" alt="avatar" class="avatar">
                                            @endif
                                        </span>
                                        <div class="dropdown-menu text-center" aria-labelledby="dropdownMenuButton">
                                            <b>{{ Auth::user()->name }}</b>
                                            @if ($roles && in_array(config('model.roles.admin'), $roles))
                                                <a class="dropdown-item" href="{{ url('admin') }}" target="_blank">
                                                    {{ trans('settings.header.dashboard') }}
                                                </a>
                                            @endif
                                            <a class="dropdown-item" href="{{ route('my-profile') }}">
                                                {{ trans('settings.header.profile') }}
                                            </a>
                                            <a class="dropdown-item" href="{{ route('my-request.index') }}">{{ trans('settings.header.my_request') }}</a>
                                            {!! Form::open([
                                                'route' => 'logout',
                                                'method' => 'POST',
                                            ]) !!}
                                            <a class="dropdown-item" href="">
                                                <button class="btn-link">{{ trans('settings.header.logout') }}</button>
                                            </a>
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </li>
                            @else
                                <li><a href="{{ route('framgia.login') }}"
                                       class="login_wsm">{{ trans('settings.header.login_wsm') }}</a></li>
                            @endauth
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-mid-area ptb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-5 col-xs-12">
                    <div class="header-search">
                        {!! Form::open([
                            'route' => 'search',
                            'method' => 'GET',
                            'id' => 'header-search',
                            'class' => 'form-groupt',
                        ]) !!}
                        {!! Form::text(
                            'req',
                            null,
                            [
                                'placeHolder' => __('page.search'),
                                'required' => 'required',
                                'class' => 'form-control m-input',
                                'title' => __('page.search'),
                                'autocomplete' => 'off',
                                'maxlength' => 100
                            ]
                        ) !!}
                        {!! Form::button(
                            '<i class="fa fa-search"></i>',
                            [
                                'type' => 'submit',
                                'class' => 'search-submit',
                            ]
                        ) !!}
                        {!! Form::close() !!}
                    </div>
                    <div id="search-suggest" class="s-suggest"></div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-4 col-xs-12">
                    <div class="logo-area text-center logo-xs-mrg">
                        <a href="{{ asset('/') }}">
                            <img src="{{ asset(config('view.image_paths.logo') . 'logo.png') }}" alt="logo" class="logo logo1"/>
                            <img src="{{ asset(config('view.image_paths.logo') . 'logo2.png') }}" alt="logo" class="logo">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-menu-area hidden-sm hidden-xs sticky-header-1" id="header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="menu-area">
                        <nav>
                            <ul>
                                <li class="{{ Request::is('/') ? 'active' : '' }}">
                                    <a href="{{ route('home') }}">{{ trans('settings.default.home') }}</a>
                                </li>
                                <li @if (Request::route()->getName() == 'books.index' || Request::route()->getName() == 'books.show' || Request::route()->getName() == 'book.category') class={{ "active" }} @endif>
                                    <a href="{{ route('books.index') }}">{{ trans('settings.default.book') }}</a>
                                </li>
                                <li class="{{ Request::route()->getName() == 'book.office' ? 'active' : '' }}">
                                    <a>{{ __('settings.default.office') }}<i class="fa fa-angle-down"></i></a>
                                    <div class="sub-menu sub-menu-2">
                                        <ul>
                                            <li>
                                                <a href="{{ route('book.office', 'handico-office') }}">Handico
                                                    Office</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('book.office', 'tran-khat-chan') }}">Tran Khat
                                                    Chan</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('book.office', 'hcmc-office') }}">HCMC Office</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('book.office', 'da-nang-office') }}">Da Nang
                                                    Office</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('book.office', 'hanoi-office') }}">Hanoi Office</a>
                                            </li>
                                        </ul>
                                    </div>
                                <li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-dialog" role="dialog" id="noti-dialog">
    </div>
    @include ('layout.notify')
    @if (session('status'))
    <div id="phone_modal" class="container">
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-sm">
                <div id="top" class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">{{ trans('page.addNumber') }}</h4>
                    </div>
                    {!! Form::open(['method' => 'post']) !!}
                    <div class="modal-body">
                        <div class="modal-phone">
                            {!! Form::text('phone', null, ['id' => 'phone_value', 'required', 'class' => 'form-control']) !!}
                            <div class="phone-display">
                                <div class="display">
                                    <h4>{{ trans('page.display') }}</h4>
                                </div>
                                <ul>
                                    <li>
                                        {!! Form::radio('result', '1', true, ['class' => 'message_pri', 'id' => 'f-option']) !!}
                                        <label for="f-option">{{ trans('page.public') }}</label>
                                        <div class="check"></div>
                                    </li>
                                    <li>
                                        {!! Form::radio('result', '0', false, ['class' => 'message_pri', 'id' => 's-option']) !!}
                                        <label for="s-option">{{ trans('page.private') }}</label>
                                        <div class="check"><div class="inside"></div></div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        {!! Form::button(trans('page.addPhone'), ['id' => 'modal_phone', 'class' => 'btn btn-info']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    @endif
</header>
