<nav class="navbar-vertical navbar">
    <div class="vh-100" data-simplebar>
        <!-- Brand logo -->
        <a class="navbar-brand text-white" href="{{ route('admin.dashboard') }}">
            <img src="{{ asset('assets/images/brand/logo/mr.png') }}" alt="MR_LANIMATION" />
            MR_LANIMATION
        </a>
        <!-- Navbar nav -->
        <ul class="navbar-nav flex-column" id="sideNavbar">
            <li class="nav-item ">
                <a class="nav-link active " href="{{ route('admin.dashboard') }}">
                    <i class="nav-icon fe fe-home me-2"></i>
                    Tableau de bord
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link  collapsed " href="#" data-bs-toggle="collapse"
                    data-bs-target="#navCourses" aria-expanded="false" aria-controls="navCourses">
                    <i class="nav-icon fe fe-book me-2"></i>
                    Gestion contenus
                </a>
                <div id="navCourses" class="collapse " data-bs-parent="#sideNavbar">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link " href="admin-course-overview.html">All Courses</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="admin-course-category.html">Courses Category</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="admin-course-category-single.html">Category Single</a>
                        </li>
                    </ul>
                </div>
            </li>
            <!-- Nav item -->
            <li class="nav-item">
                <a class="nav-link  collapsed " href="#" data-bs-toggle="collapse"
                    data-bs-target="#navProfile" aria-expanded="false" aria-controls="navProfile">
                    <i class="nav-icon fe fe-user me-2"></i>
                    Gestion utilisateurs
                </a>
                <div id="navProfile" class="collapse " data-bs-parent="#sideNavbar">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link " href="admin-instructor.html">Instructor</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="admin-students.html">Students</a>
                        </li>
                    </ul>
                </div>
            </li>

            <!-- Nav item -->
            <li class="nav-item">
                <a class="nav-link  collapsed " href="#" data-bs-toggle="collapse"
                    data-bs-target="#navCMS" aria-expanded="false" aria-controls="navCMS">
                    <i class="nav-icon fe fe-book-open me-2"></i>
                    Gestion interactions
                </a>
                <div id="navCMS" class="collapse " data-bs-parent="#sideNavbar">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link  active " href="admin-cms-overview.html">Overview</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="admin-cms-post.html">All Post</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="admin-cms-post-new.html">New Post</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="admin-cms-post-category.html">Category</a>
                        </li>
                    </ul>
                </div>
            </li>
            <!-- Nav item -->
            <li class="nav-item">
                <a class="nav-link  collapsed " href="#" data-bs-toggle="collapse"
                    data-bs-target="#navecommerce" aria-expanded="false" aria-controls="navecommerce">
                    <i class="nav-icon fe fe-shopping-bag me-2"></i>
                    Abonnements
                </a>
                <div id="navecommerce" class="collapse " data-bs-parent="#sideNavbar">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link  collapsed " href="#" data-bs-toggle="collapse"
                                data-bs-target="#navproduct" aria-expanded="false"
                                aria-controls="navproduct">
                                Product
                            </a>
                            <div id="navproduct" class="collapse " data-bs-parent="#navProduct">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link " href="ecommerce/product-grid.html">Grid</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link "
                                            href="ecommerce/product-grid-with-sidebar.html">Grid Sidebar</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " href="ecommerce/products.html">Products</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " href="ecommerce/product-single.html">Product
                                            Single</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " href="ecommerce/product-single-v2.html">Product
                                            Single v2</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " href="ecommerce/add-product.html">Add Product</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="ecommerce/shopping-cart.html">Shopping Cart</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="ecommerce/checkout.html">Checkout</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="ecommerce/order.html">Order</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="ecommerce/order-single.html">Order Single</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="ecommerce/order-history.html">Order History</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="ecommerce/order-summary.html">Order Summary</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link " href="ecommerce/customers.html">Customers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="ecommerce/customer-single.html">Customer Single</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="ecommerce/add-customer.html">Add Customer</a>
                        </li>
                    </ul>
                </div>
            </li>
    </div>
</nav>
