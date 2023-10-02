<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="http://localhost/hoa_project{{settings('website_logo')}}">
                      </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2">{{ settings('website_name') }}</span>
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item @if (str_contains($title, 'Dashboard') == 1) active @endif">
            <a href="{{ route('admin.dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard </div>
            </a>
        </li>

        <li class="menu-item @if (str_contains($title, 'Committee') == 1) active @endif">
            <a href="{{ route('admin.committee.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-group"></i>
                <div data-i18n="Boxicons">Committee</div>
            </a>
        </li>

        <li class="menu-item  @if (str_contains($title, 'Calendar') == 1) active @endif">
            <a href="{{ route('admin.calendar.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-calendar-event"></i>
                <div data-i18n="Boxicons">Calendar</div>
            </a>
        </li>

        <li class="menu-item  @if (str_contains($title, 'Vendor') == 1) active @endif">
            <a href="{{ route('admin.vendor.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-briefcase-alt-2"></i>
                <div data-i18n="Boxicons">Vendor</div>
            </a>
        </li>

        <li class="menu-item @if (str_contains($title, 'Account') == 1) active @endif">
            <a href="{{ route('admin.account.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user-circle"></i>
                <div data-i18n="Boxicons">Account</div>
            </a>
        </li>

        <li class="menu-item @if (str_contains($title, 'Announcement') == 1) active @endif">
            <a href="{{ route('admin.announcement.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-bell"></i>
                <div data-i18n="Boxicons">Announcement</div>
            </a>
        </li>


        <li class="menu-item @if (str_contains($title, 'Billing') == 1) active @endif">
            <a href="{{ route('admin.billing.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-dollar-circle"></i>
                <div data-i18="Boxicons">Billing</div>
            </a>
        </li>


        <li class="menu-item @if (str_contains($title, 'Board Member') == 1) active @endif">
            <a href="{{ route('admin.board-member.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-group"></i>
                <div data-i18="Boxicons">Board Member</div>
            </a>
        </li>

        <li class="menu-item @if (str_contains($title, 'Documents') == 1) active @endif">
            <a href="{{ route('admin.documents.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-file-doc"></i>
                <div data-i18="Boxicons">Documents</div>
            </a>
        </li>

        <li class="menu-item @if (str_contains($title, 'Properties') == 1) active @endif">
            <a href="{{ route('admin.properties.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home"></i>
                <div data-i18="Boxicons">Properties</div>
            </a>
        </li>

        <li class="menu-item @if (str_contains($title, 'Work Order') == 1) active @endif">
            <a href="{{ route('admin.work-order.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-basket"></i>
                <div data-i18="Boxicons">Work Order</div>
            </a>
        </li>
        <li class="menu-item @if (str_contains($title, 'Gallery') == 1) active @endif">
            <a href="{{ route('admin.gallery.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-images"></i>
                <div data-i18="Boxicons">Gallery</div>
            </a>
        </li>


        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Settings</span>
        </li>

        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-cog"></i>
                <div data-i18n="Layouts">Settings</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                </li>
                <li class="menu-item">
                    <a href="{{ route('admin.settings.website') }}" class="menu-link">
                        <div data-i18n="Without menu">General Settings</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('admin.settings.header') }}" class="menu-link">
                        <div data-i18n="Without menu">Header Settings</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-cog"></i>
                <div data-i18n="Layouts">Sections</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                </li>
                <li class="menu-item">
                    <a href="{{ route('admin.settings.header') }}" class="menu-link">
                        <div data-i18n="Without menu">Header</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('admin.settings.about') }}" class="menu-link">
                        <div data-i18n="Without menu">About</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('admin.settings.social.index') }}" class="menu-link">
                        <div data-i18n="Without menu">Social Icons</div>
                    </a>
                </li>
            </ul>
        </li>









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
