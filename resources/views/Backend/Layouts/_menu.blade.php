<nav id="mainnav-container">
    <div id="mainnav">
        <div id="mainnav-menu-wrap">
            <div class="nano">
                <div class="nano-content">
                    <div id="mainnav-profile" class="mainnav-profile">
                        <div class="profile-wrap text-center">
                            <div class="pad-btm">
                                <img class="img-circle img-md" src="@if (Auth::check()) {{ url('') }}.'/'.{{Auth::user()->avatar}} @endif" alt="Profile Picture">
                            </div>
                            <a href="#profile-nav" class="box-block" data-toggle="collapse" aria-expanded="false">
                                <p class="mnp-name">@if (Auth::check()) {!! Auth::user()->name !!} @endif</p>
                                <span class="mnp-desc">@if (Auth::check()) {!! Auth::user()->email !!} @endif</span>
                            </a>
                        </div>
                    </div>
                    
                    <ul id="mainnav-menu" class="list-group">
                        <li class="list-divider"></li>
                        <li class="list-header">{!! 'Dashboard'  !!}</li> 
                        <li>
                            <a href="{{ route('backend.home') }}" class="{{ request()->is('admin') ? 'active' : '' }}">
                                <i class="demo-pli-home"></i>
                                <span class="menu-title">Dashboard</span>
                            </a>
                        </li>
                        <li class="list-divider"></li>
                        <li class="list-header">{!! trans('backend.menu.manager')  !!}</li> 

                        <li class="
                                {{ request()->is('admin/categories') 
                                || request()->is('admin/categories/*')
                                || request()->is('admin/products') 
                                || request()->is('admin/products/*')
                                || request()->is('admin/tags') 
                                || request()->is('admin/tags/*')
                                ? 'active-sub active': '' }}">
                            <a href="#">
                                <i class="ti-settings"></i>
                                <span class="menu-title">{!! trans('backend.menu.product')  !!}</span>
                                <i class="arrow"></i>
                            </a>                    
                            <ul class="collapse">
                                @if (Auth::check() && Auth::user()->can('category.read'))
                                    <li class="{{ request()->is('admin/categories') || request()->is('admin/categories/*') ? 'active-link': '' }}">
                                        <a href="{{ route('categories.index') }}"><i class="ti-angle-double-right">
                                        </i>{!! trans('backend.menu.category')  !!}</a>
                                    </li>
                                @endif
                            </ul>

                            <ul class="collapse">
                                @if (Auth::check() && Auth::user()->can('product.read'))
                                    <li class="{{ request()->is('admin/products') || request()->is('admin/products/*') ? 'active-link': '' }}">
                                        <a href="{{ route('products.index') }}"><i class="ti-angle-double-right">
                                        </i>{!! trans('backend.menu.product')  !!}</a>
                                    </li>
                                @endif
                            </ul>
                            <ul class="collapse">
                                @if (Auth::check() && Auth::user()->can('tag.read'))
                                    <li class="{{ request()->is('admin/tags') || request()->is('admin/tags/*') ? 'active-link': '' }}">
                                        <a href="{{ route('tags.index') }}"><i class="ti-angle-double-right">
                                        </i>{!! trans('backend.menu.tag')  !!}</a>
                                    </li>
                                @endif
                            </ul>
                        </li>

                        <li class="
                                {{ request()->is('admin/contacts') 
                                || request()->is('admin/contacts/*')
                                || request()->is('admin/orders') 
                                || request()->is('admin/orders/*')
                                || request()->is('admin/members') 
                                || request()->is('admin/members/*')
                                ? 'active-sub active': '' }}">
                            <a href="#">
                                <i class="ti-settings"></i>
                                <span class="menu-title">{!! trans('backend.menu.members')  !!}</span>
                                <i class="arrow"></i>
                            </a>                    
                            <ul class="collapse">
                                @if (Auth::check() && Auth::user()->can('contact.read'))
                                    <li class="{{ request()->is('admin/contacts') || request()->is('admin/contacts/*') ? 'active-link': '' }}">
                                        <a href="{{ route('contacts.index') }}"><i class="ti-angle-double-right">
                                        </i>{!! trans('backend.menu.contacts')  !!}</a>
                                    </li>
                                @endif
                            </ul>

                            <ul class="collapse">
                                @if (Auth::check() && Auth::user()->can('order.read'))
                                    <li class="{{ request()->is('admin/orders') || request()->is('admin/orders/*') ? 'active-link': '' }}">
                                        <a href="{{ route('orders.index') }}"><i class="ti-angle-double-right">
                                        </i>{!! trans('backend.menu.orders')  !!}</a>
                                    </li>
                                @endif
                            </ul>
                            <ul class="collapse">
                                @if (Auth::check() && Auth::user()->can('member.read'))
                                    <li class="{{ request()->is('admin/members') || request()->is('admin/members/*') ? 'active-link': '' }}">
                                        <a href="{{ route('members.index') }}"><i class="ti-angle-double-right">
                                        </i>{!! trans('backend.menu.members')  !!}</a>
                                    </li>
                                @endif
                            </ul>

                            <ul class="collapse">
                                <li class="{{ request()->is('admin/history-order') || request()->is('admin/history-order/*') ? 'active-link': '' }}">
                                    <a href="{{ route('order.history') }}"><i class="ti-angle-double-right">
                                    </i>Sản phẩm được đặt</a>
                                </li>
                            </ul>
                        </li>

                        <li class="
                                {{ request()->is('admin/posts') 
                                || request()->is('admin/posts/*')
                                ? 'active-sub active': '' }}">
                            <a href="#">
                                <i class="ti-settings"></i>
                                <span class="menu-title">{!! trans('backend.menu.post')  !!}</span>
                                <i class="arrow"></i>
                            </a>                    
                            <ul class="collapse">
                                @if (Auth::check() && Auth::user()->can('post.read'))
                                    <li class="{{ request()->is('admin/posts') || request()->is('admin/posts/*') ? 'active-link': '' }}">
                                        <a href="{{ route('posts.index') }}"><i class="ti-angle-double-right">
                                        </i>{!! trans('backend.menu.post')  !!}</a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                        @if (Auth::check() && Auth::user()->can('user.read') || Auth::check() &&  Auth::user()->can('role.read'))
                            <li class="
                                    {{ request()->is('admin/users')
                                    || request()->is('admin/users/*')
                                    || request()->is('admin/roles')
                                    || request()->is('admin/roles/*')
                                    ? 'active-sub active': '' }}">
                                <a href="#">
                                    <i class="demo-pli-male"></i>
                                    <span class="menu-title">{!! trans('backend.menu.users')  !!}</span>
                                    <i class="arrow"></i>
                                </a>
                                <ul class="collapse">
                                    @if (Auth::check() && Auth::user()->can('user.read'))
                                        <li class="{{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active-link': '' }}">
                                            <a href="{{ route('users.index') }}"><i class="ti-angle-double-right">
                                            </i>{!! trans('backend.menu.users') !!}</a>
                                        </li>
                                    @endif
                                    @if (Auth::check() && Auth::user()->can('role.read'))
                                        <li class="{{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active-link': '' }}">
                                            <a href="{{ route('roles.index') }}"><i class="ti-angle-double-right"></i>{!! trans('backend.menu.role')  !!}</a>
                                        </li>
                                    @endif
                                    @if (Auth::check() && Auth::user()->can('setting.read') )
                                        <li class="{{ request()->is('admin/providers') || request()->is('admin/providers/*') ? 'active-link': '' }}">
                                            <a href="{{ route('providers.index') }}"><i class="ti-angle-double-right">
                                            </i>Nhà cung cấp</a>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        @endif

                        @if (Auth::check() && Auth::user()->can('slide.read') ||Auth::check() && Auth::user()->can('setting.read'))
                        <li class="
                                {{ request()->is('admin/languages') 
                                || request()->is('admin/languages/*')
                                || request()->is('admin/setting') 
                                || request()->is('admin/setting/*')
                                || request()->is('admin/slides') 
                                || request()->is('admin/slides/*')
                                ? 'active-sub active': '' }}">
                            <a href="#">
                                <i class="ti-settings"></i>
                                <span class="menu-title">{!! trans('backend.menu.setting')  !!}</span>
                                <i class="arrow"></i>
                            </a>
                            @if (Auth::check() && Auth::user()->can('slide.read'))
                                <ul class="collapse">
                                    <li class="{{ request()->is('admin/slides') || request()->is('admin/slides/*') ? 'active-link': '' }}">
                                        <a href="{{ route('slides.index') }}"><i class="ti-angle-double-right">
                                        </i>{!! trans('backend.menu.slide')  !!}</a>
                                    </li>
                                </ul>
                            @endif
                            @if (Auth::check() && Auth::user()->can('setting.read'))
                                <ul class="collapse">
                                    <li class="{{ request()->is('admin/setting') || request()->is('admin/setting/*') ? 'active-link': '' }}">
                                        <a href="{{ route('setting.index') }}"><i class="ti-angle-double-right">
                                        </i>{!! trans('backend.menu.setting')  !!}</a>
                                    </li>
                                </ul>
                            @endif
                        </li>
                        @endif
                    </ul>

                    


                    <div class="mainnav-widget">
                        <div class="show-small">
                            <a href="#" data-toggle="menu-widget" data-target="#demo-wg-server">
                                <i class="demo-pli-monitor-2"></i>
                            </a>
                        </div>
                        <div id="demo-wg-server" class="hide-small mainnav-widget-content">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>