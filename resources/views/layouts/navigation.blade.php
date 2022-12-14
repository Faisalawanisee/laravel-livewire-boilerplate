<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <x-nav-link :href="route('admin')" icon="far fa-clock" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-nav-link>
                <x-nav-link :href="route('admin.users')" icon="fa fa-user" :active="request()->routeIs('admin.users')">
                    {{ __('Users') }}
                </x-nav-link>
                <x-nav-link :href="route('admin.roles')" icon="fa fa-user" :active="request()->routeIs('admin.roles')">
                    {{ __('User Roles') }}
                </x-nav-link>
                <x-nav-link :href="route('profile')" icon="fa fa-user" :active="request()->routeIs('profile')">
                    {{ __('Profile') }}
                </x-nav-link>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
