<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin.dashboard') }}">سين ياء</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin.dashboard') }}">سين</a>
        </div>
        <ul class="sidebar-menu">
            {{--  Dashboard Route  --}}
            <li class="menu-header">Dashboard</li>
            <li class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-fire"></i> <span>الرئيسية</span>
                </a>
            </li>

            {{--  Sections Route  --}}
            <li class="menu-header">أقسام الموقع (Sections)</li>
            <li class="dropdown {{ request()->routeIs(['admin.why-choose-us.*', 'admin.services.*', 'admin.galleries.*', 'admin.testimonials.*', 'admin.faqs.*', 'admin.posts.*', 'admin.pages.*']) ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-layer-group"></i> <span>الأقسام</span>
                </a>
                <ul class="dropdown-menu">
                    {{--  Why Choose Us Section  --}}
                    <li class="{{ request()->routeIs('admin.why-choose-us.*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.why-choose-us.index') }}">لماذا سين ياء؟</a>
                    </li>

                    {{--  Services Section  --}}
                    <li class="{{ request()->routeIs('admin.services.*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.services.index') }}">خدماتنا</a>
                    </li>

                    {{--  Gallery Section  --}}
                    <li class="{{ request()->routeIs('admin.galleries.*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.galleries.index') }}">معرض الأعمال (أعمالنا)</a>
                    </li>

                    {{--  Testimonials Section  --}}
                    <li class="{{ request()->routeIs('admin.testimonials.*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.testimonials.index') }}">آراء وتجارب العملاء</a>
                    </li>

                    {{--  FAQs Section  --}}
                    <li class="{{ request()->routeIs('admin.faqs.*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.faqs.index') }}">الأسئلة الشائعة</a>
                    </li>

                    {{--  Blog Posts Section  --}}
                    <li class="{{ request()->routeIs('admin.posts.*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.posts.index') }}">المدونة والمقالات</a>
                    </li>

                    {{--  Pages CMS Section  --}}
                    <li class="{{ request()->routeIs('admin.pages.*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.pages.index') }}">إدارة الصفحات (Pages)</a>
                    </li>
                </ul>
            </li>

            {{--  Pages Direct Route  --}}
            <li class="{{ request()->routeIs('admin.pages.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.pages.index') }}">
                    <i class="fas fa-file-alt"></i> <span>الصفحات الثابتة (CMS)</span>
                </a>
            </li>

            {{--  Bookings Route  --}}
            <li class="menu-header">الطلبات والحجوزات</li>
            <li class="{{ request()->routeIs('admin.bookings.*') ? 'active' : '' }}">
                <a class="nav-link d-flex justify-content-between align-items-center" href="{{ route('admin.bookings.index') }}">
                    <div>
                        <i class="fas fa-calendar-check"></i> <span>طلبات المعاينة</span>
                    </div>
                </a>
            </li>

            {{--  Settings Route  --}}
            <li class="menu-header">النظام والإعدادات</li>
            <li class="{{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.settings.index') }}">
                    <i class="fas fa-cog"></i> <span>إعدادات الموقع</span>
                </a>
            </li>
        </ul>
    </aside>
</div>
