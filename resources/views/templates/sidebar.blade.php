<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="index.html"><img src="{{ asset('assets/images/logo/logo.png') }}" alt="Logo" srcset=""></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item active">
                    <a href="{{ route('dashboard') }}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="{{ route('contracts') }}" class='sidebar-link'>
                        <i class="bi bi-file-earmark-text"></i>
                        <span>Contract</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="{{ route('products.index') }}" class='sidebar-link'>
                        <i class="bi bi-box-seam"></i>
                        <span>Product</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="{{ route('email.manual') }}" class='sidebar-link'>
                        <i class="bi bi-envelope-paper"></i>
                        <span>Email Manually</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="{{ route('users.index') }}" class='sidebar-link'>
                        <i class="bi bi-people"></i>
                        <span>User</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="{{ route('managers') }}" class='sidebar-link'>
                        <i class="bi bi-person-badge"></i>
                        <span>Manager</span>
                    </a>
                </li>
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>