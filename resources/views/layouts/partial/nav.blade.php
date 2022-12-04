
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
       @auth
        <li class="nav-item">
            <a href="{{ route('store.index') }}" class="nav-link">
                <p>
                   Stores  
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('store.create') }}" class="nav-link">
                <p>
                   Create Stores
                   
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('product.index') }}" class="nav-link">
                <p>
                    Products
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('product.create') }}" class="nav-link">
                <p>
                    Create Product
                </p>
            </a>
        </li>
        
        <li class="nav-item">
            <a href="{{ route('purchases.purchases') }}" class="nav-link">
                <p>
                    purchases
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('purchases.statistics') }}" class="nav-link">
                <p>
                    statistics
                </p>
            </a>
        </li>
        @endauth
        <li class="nav-item">
            <a href="{{ route('making_purchase.stores') }}" class="nav-link">
                <p>
                    Purchase From Store
                </p>
            </a>
        </li>
    </ul>
</nav>