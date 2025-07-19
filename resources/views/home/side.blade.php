<!-- sidenav -->
<div class="sidenav openNav" >
    <span class="closeNav" onclick="toggleSideNav()">
        <i class="fas fa-times"></i>
    </span>
    <ul class="mb-0 mt-3 list-unstyled main-ul">
        <li>
            <a href="#" class="text-center">
                <img style="width: 100px; max-height: 100px !important; margin: 0 auto;"
                    src="{{ asset('template/images/swc.png') }}" />
            </a>
        </li>
        <li class="mt-3">
            <a href="#"
                style="display: flex; align-items: center; text-decoration: none;">
                <i style="margin-left: 8px;" class="fas fa-home me-2"></i>
                <span class="sub-text">
                    {{ __('menu.home') }}
                </span>
            </a>
        </li>
        <!-- Currency Dropdown -->
        {{-- <li class="mt-3 dropdown">
            <a class="nav-link p-0 dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown"
                role="button" data-bs-toggle="dropdown" aria-expanded="false" style="text-decoration: none;">
                <i class="fas fa-coins me-2" style="margin-left: 8px;  margin-right: 8px;"></i>
                <span class="sub-text"> {{ __('menu.Currency') }}</span>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li>
                    <a class="dropdown-item" href="{{ route('currency.index') }}">
                        <i class="fas fa-eye me-2 text-primary"></i> {{ __('menu.Show') }}
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('currency.create') }}">
                        <i class="fas fa-plus-circle me-2 text-success"></i> {{ __('menu.Create') }}
                    </a>
                </li>
            </ul>
        </li> --}}



    </ul>
</div>
