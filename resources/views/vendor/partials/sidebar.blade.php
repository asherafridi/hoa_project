<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">

        <a href="{{ route('home') }}" class="app-brand-link">
            @if (settings('website_logo') != null)
                <span class="app-brand-logo demo">
                    <img src="{{ settings('website_logo') }}" style="height: 40px">
                </span>
            @else
                <span class="app-brand-text demo menu-text fw-bolder ms-2"
                    style="text-transform:capitalize;">{{ settings('website_name') }}</span>
            @endif
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item @if (str_contains($title, 'Dashboard') == 1) active @endif">
            <a href="{{ route('vendor.dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard </div>
            </a>
        </li>


        <li class="menu-item @if (str_contains($title, 'Work Order') == 1) active open @endif">

            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-group"></i>
                <div data-i18n="Layouts">Work Order</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                </li>
                {{-- <li class="menu-item">
                    <a href="{{ route('work-order.create') }}" class="menu-link">
                        <div data-i18n="Without menu">Create Work Request</div>
                    </a>
                </li> --}}
                <li class="menu-item">
                    <a href="{{ route('vendor.work-order.index') }}" class="menu-link">
                        <div data-i18n="Without menu">My Work Orders</div>
                    </a>
                </li>
            </ul>
        </li>


        <li class="menu-item @if (str_contains($title, 'Payment') == 1) active open @endif">

            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dollar-circle"></i>
                <div data-i18n="Layouts">Payments</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                </li>
                <li class="menu-item">
                    <a href="{{ route('vendor.payment.index') }}" class="menu-link">
                        <div data-i18n="Without menu">Payment History</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item  @if (str_contains($title, 'Committee') == 1) active @endif">
            <a href="{{ route('vendor.committee.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-group"></i>
                <div data-i18n="Boxicons">Committee</div>
            </a>
        </li>

        <li class="menu-item  @if (str_contains($title, 'Events') == 1) active @endif">
            <a href="{{ route('vendor.events.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-calendar-event"></i>
                <div data-i18n="Boxicons">Events</div>
            </a>
        </li>

        <li class="menu-item @if (str_contains($title, 'Announcement') == 1) active @endif">
            <a href="{{ route('vendor.announcement.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-bell"></i>
                <div data-i18n="Boxicons">Announcement</div>
            </a>
        </li>

        <li class="menu-item @if (str_contains($title, 'Documents') == 1) active @endif">
            <a href="{{ route('vendor.documents.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-file-doc"></i>
                <div data-i18="Boxicons">Documents</div>
            </a>
        </li>

        <li class="menu-item @if (str_contains($title, 'Gallery') == 1) active @endif">
            <a href="{{ route('vendor.gallery.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-images"></i>
                <div data-i18="Boxicons">Gallery</div>
            </a>
        </li>





    </ul>
</aside>
