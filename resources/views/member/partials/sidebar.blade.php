<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="http://localhost/hoa_project{{settings('website_logo')}}">
                      </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2" style="text-transform:capitalize;">{{ settings('website_name') }}</span>
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item @if (str_contains($title, 'Dashboard') == 1) active @endif">
            <a href="{{ route('dashboard') }}" class="menu-link">
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
                <li class="menu-item">
                    <a href="{{ route('work-order.create') }}" class="menu-link">
                        <div data-i18n="Without menu">Create Work Request</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('work-order.index') }}" class="menu-link">
                        <div data-i18n="Without menu">My Work Orders</div>
                    </a>
                </li>
            </ul>
        </li>
        
        <li class="menu-item @if (str_contains($title, 'Bills') == 1) active open @endif">
            
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dollar-circle"></i>
                <div data-i18n="Layouts">Bills</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                </li>
                <li class="menu-item">
                    <a href="{{ route('bills.index') }}?status=Unpaid" class="menu-link">
                        <div data-i18n="Without menu">Unpaid Bills</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('bills.index') }}?status=Paid" class="menu-link">
                        <div data-i18n="Without menu">Paid Bills</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('bills.index') }}" class="menu-link">
                        <div data-i18n="Without menu">All Bills</div>
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
                    <a href="{{ route('payment.index') }}" class="menu-link">
                        <div data-i18n="Without menu">Payment History</div>
                    </a>
                </li>
                {{-- <li class="menu-item">
                    <a href="{{ route('admin.transaction-type.index') }}" class="menu-link">
                        <div data-i18n="Without menu">Declined Payments</div>
                    </a>
                </li> --}}
            </ul>
        </li>


        



        <li class="menu-item  @if (str_contains($title, 'Committee') == 1) active @endif">
            <a href="{{ route('committee.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-group"></i>
                <div data-i18n="Boxicons">Committee</div>
            </a>
        </li>

        <li class="menu-item  @if (str_contains($title, 'Events') == 1) active @endif">
            <a href="{{ route('events.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-calendar-event"></i>
                <div data-i18n="Boxicons">Events</div>
            </a>
        </li>

        <li class="menu-item @if (str_contains($title, 'Announcement') == 1) active @endif">
            <a href="{{ route('announcement.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-bell"></i>
                <div data-i18n="Boxicons">Announcement</div>
            </a>
        </li>

        {{-- <li class="menu-item @if (str_contains($title, 'Documents') == 1) active @endif">
            <a href="{{ route('admin.documents.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-file-doc"></i>
                <div data-i18="Boxicons">Documents</div>
            </a>
        </li> --}}

        {{-- <li class="menu-item @if (str_contains($title, 'Gallery') == 1) active @endif">
            <a href="{{ route('admin.gallery.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-images"></i>
                <div data-i18="Boxicons">Gallery</div>
            </a>
        </li> --}}

        {{-- <li class="menu-header small text-uppercase">
      <span class="menu-header-text">Pages</span>
    </li> --}}
        {{-- <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-dock-top"></i>
        <div data-i18n="Account Settings">Account Settings</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item">
          <a href="pages-account-settings-account.html" class="menu-link">
            <div data-i18n="Account">Account</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="pages-account-settings-notifications.html" class="menu-link">
            <div data-i18n="Notifications">Notifications</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="pages-account-settings-connections.html" class="menu-link">
            <div data-i18n="Connections">Connections</div>
          </a>
        </li>
      </ul>
    </li> --}}



    </ul>
</aside>
