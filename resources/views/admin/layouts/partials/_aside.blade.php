

<aside class="aside">
    <!-- Aside Header -->
    <div class="aside-header">
        <!-- Logo -->

            <a href="" class="logo d-flex gap-2">
                <img src="{{asset('storage/app/public/business')}}/{{$logo->live_values??""}}"
                     alt="" class="main-logo">
                <img src="{{asset('storage/app/public/business')}}/{{$logo->live_values??""}}"
                     alt="" class="mobile-logo">
            </a>
        <!-- </a> -->
        <!-- End Logo -->

        <!-- Aside Toggle Menu Button -->
        <button class="toggle-menu-button aside-toggle border-0 bg-transparent p-0 dark-color">
            <span class="material-icons">menu</span>
        </button>
        <!-- End Aside Toggle Menu Button -->
    </div>
    <!-- End Aside Header -->

    <!-- Aside Body -->
    <div class="aside-body" data-trigger="scrollbar">
        <div class="user-profile media gap-3 align-items-center my-3">
            <div class="avatar">
                <img class="avatar-img rounded-circle"
                     src=""
                     onerror=""
                     alt="">
            </div>
            <div class="media-body ">
                <h5 class="card-title"></h5>
                <span class="card-text"></span>
            </div>
        </div>

        <!-- Nav -->
        <ul class="nav">
            <li class="nav-category">Main</li>
            <li>
                <a href="" class="{{request()->is('admin/dashboard')?'active-menu':''}}">
                    <span class="material-icons" title="Dashboard">dashboard</span>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>

           
                <li class="nav-category" title="Service Management">
                Service Management
                </li>
                
                <li class="has-sub-item {{(request()->is('admin/category/*') || request()->is('admin/sub-category/*'))?'sub-menu-opened':''}}">
                    <a href="#" class="{{(request()->is('admin/category/*') || request()->is('admin/sub-category/*'))?'active-menu':''}}">
                        <span class="material-icons" title="Service Categories">category</span>
                        <span class="link-title">Service Categories</span>
                    </a>
                    <!-- Sub Menu -->
                    <ul class="nav sub-menu">
                        <li>
                        <a href="{{route('categories.index')}}"
                               class="">
                               Category List
                            </a>
                        </li>
                        <li>
                        <a href="{{route('categories.create')}}"
                               class="">
                               Add New Category
                            </a> 
                        </li>
                    </ul>
                    <!-- End Sub Menu -->
                </li>
                <li class="has-sub-item {{request()->is('admin/service/*')?'sub-menu-opened':''}}">
                    <a href="#" class="{{request()->is('admin/service/*')?'active-menu':''}}">
                        <span class="material-icons" title="">design_services</span>
                        <span class="link-title">Services</span>
                    </a>
                    <!-- Sub Menu -->
                    <ul class="nav flex-column sub-menu">
                        <li>
                            <a href="{{route('services.index')}}"
                               class="{{request()->is('admin/service/list')?'active-menu':''}}">
                               Service List
                            </a>
                        </li>
                        <li>
                            <a href="{{route('services.create')}}"
                               class="{{request()->is('admin/service/create')?'active-menu':''}}">
                               Add New Service
                            </a>
                        </li>
                    </ul>
                    <!-- End Sub Menu -->
                </li>
       

           


                <li class="nav-category" title="Booking Management">
                Booking Management
                </li>
                <li class="has-sub-item {{request()->is('admin/booking/*')?'sub-menu-opened':''}}">
                    <a href="#" class="{{request()->is('admin/booking/*')?'active-menu':''}}">
                        <span class="material-icons" title="Bookings">calendar_month</span>
                        <span class="link-title">Bookings</span>
                    </a>
                    <!-- Sub Menu -->
                    <ul class="nav sub-menu">
                        <li><a href=""
                               class="{{request()->is('admin/booking/list') && request()->query('booking_status')=='pending'?'active-menu':''}}"><span
                                    class="link-title">Booking Requests <span
                                        class="count"></span></span></a>
                        </li>
                        <li><a href=""
                               class="{{request()->is('admin/booking/list') && request()->query('booking_status')=='accepted'?'active-menu':''}}"><span
                                    class="link-title">Accepted <span
                                        class="count"></span></span></a>
                        </li>
                        <li><a href=""
                               class="{{request()->is('admin/booking/list') && request()->query('booking_status')=='ongoing'?'active-menu':''}}"><span
                                    class="link-title">Ongoing <span
                                        class="count"></span></span></a>
                        </li>
                        <li><a href=""
                               class="{{request()->is('admin/booking/list') && request()->query('booking_status')=='completed'?'active-menu':''}}"><span
                                    class="link-title">Completed <span
                                        class="count"></span></span></a>
                        </li>
                        <li><a href=""
                               class="{{request()->is('admin/booking/list') && request()->query('booking_status')=='canceled'?'active-menu':''}}"><span
                                    class="link-title">Canceled <span
                                        class="count"></span></span></a>
                        </li>
                    </ul>
                    <!-- End Sub Menu -->
                </li>
           

            
                <li class="nav-category"
                    title="Provider Management">
                    Provider Management
                </li>
                <li class="has-sub-item  {{(request()->is('admin/provider/list') || request()->is('admin/provider/create'))?'sub-menu-opened':''}}">
                    <a href="#" class="{{(request()->is('admin/provider/list') || request()->is('admin/provider/create'))?'active-menu':''}}">
                        <span class="material-icons" title="Providers">engineering</span>
                        <span class="link-title">Providers</span>
                    </a>
                    <!-- Sub Menu -->
                    <ul class="nav sub-menu">
                        <li>
                            <a href="{{route('providers.index')}}"
                                class="{{(request()->is('admin/provider/list'))?'active-menu':''}}">Provider List</a>
                        </li>
                        <li><a href="{{route('providers.create')}}"
                                class="{{(request()->is('admin/provider/create'))?'active-menu':''}}">Add New Provider</a></li>
                    </ul>
                    <!-- End Sub Menu -->
                </li>
                
                <li>
                    <a href=""
                       class="{{request()->is('admin/provider/onboarding-request')?'active-menu':''}}">
                        <span class="material-icons" title="Onboarding Request">description</span>
                        <span class="link-title">Onboarding Request <span class="count"></span></span>
                    </a>
                </li>
      

            
               
               
        </ul>
        <!-- End Nav -->
    </div>
    <!-- End Aside Body -->
</aside>
