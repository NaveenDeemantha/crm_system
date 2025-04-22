<nav x-data="{ open: false }" class="navbar">
    <!-- Top Navigation -->
    <div class="navbar-container">
        <div class="navbar-flex">
            <div class="navbar-left">
                <!-- Navigation Links -->
                <div class="nav-links">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">Dashboard</x-nav-link>
                    <x-nav-link :href="route('customers.index')" :active="request()->routeIs('customers.*')">Customers</x-nav-link>
                    <x-nav-link :href="route('proposals.index')" :active="request()->routeIs('proposals.*')">Proposals</x-nav-link>
                    <x-nav-link :href="route('invoices.index')" :active="request()->routeIs('invoices.*')">Invoices</x-nav-link>
                </div>
            </div>

            <!-- User Dropdown -->
            <div class="user-dropdown">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="user-btn">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="dropdown-icon">
                                <svg class="icon-sm" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">Profile</x-dropdown-link>

                        <!-- Logout -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">Log Out</x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Mobile Toggle -->
            <div class="mobile-toggle">
                <button @click="open = ! open" class="toggle-btn">
                    <svg class="icon-md" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="mobile-menu">
        <div class="mobile-nav-links">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">Dashboard</x-responsive-nav-link>
            <x-responsive-nav-link :href="route('customers.index')" :active="request()->routeIs('customers.*')">Customers</x-responsive-nav-link>
            <x-responsive-nav-link :href="route('proposals.index')" :active="request()->routeIs('proposals.*')">Proposals</x-responsive-nav-link>
            <x-responsive-nav-link :href="route('invoices.index')" :active="request()->routeIs('invoices.*')">Invoices</x-responsive-nav-link>
            <x-responsive-nav-link :href="route('transactions.index')" :active="request()->routeIs('transactions.*')">Transactions</x-responsive-nav-link>
        </div>

        <div class="mobile-user">
            <div class="user-info">
                <div>{{ Auth::user()->name }}</div>
                <div>{{ Auth::user()->email }}</div>
            </div>
            <div class="user-actions">
                <x-responsive-nav-link :href="route('profile.edit')">Profile</x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">Log Out</x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
