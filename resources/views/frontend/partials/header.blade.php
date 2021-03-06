
<header class="section-header">

        <section class="header-main border-bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-2 col-6">
                        <a href="{{route('fe.landing')}}" class="brand-wrap">
                            <img class="logo" src="{{asset('frontend')}}/images/logo.png">
                        </a> <!-- brand-wrap.// -->
                    </div>
                    <div class="col-lg-6 col-12 col-sm-12">
                        <form action="" class="search" method="GET">
                            <div class="input-group w-100">
                                <input type="text" name="search" class="form-control" placeholder="Search" value="<?= isset($_GET['search']) ? $_GET['search']:''; ?>">
                                <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                                </div>
                            </div>
                        </form> <!-- search-wrap .end// -->
                    </div> <!-- col.// -->
                    <div class="col-lg-4 col-sm-6 col-12">
                        <div class="widgets-wrap float-md-right">
                            <div class="widget-header  mr-3">
                                <a href="#" class="icon icon-sm rounded-circle border" data-toggle="dropdown"><i class="fa fa-shopping-cart"></i></a>
                                <span class="badge badge-pill badge-danger notify sum-order">{{$cartQuantity}}</span>
                                @if ($cartQuantity > 0)
                                    <div class="dropdown-menu">
                                        @foreach (\Cart::getContent() as $item)
                                            @php
                                                $productItem = App\Product::find($item->id);
                                            @endphp
                                            <a class="dropdown-item" href="#">{{$productItem->name}} x {{$item->quantity}}</a>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                            <div class="widget-header icontext">
                                <a href="#" class="icon icon-sm rounded-circle border" data-toggle="dropdown"><i class="fa fa-user"></i></a>
                                @if (Auth::check())
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{route('fe.myprofile')}}">My Profile</a>
                                        <a class="dropdown-item" href="{{route('fe.changePassword')}}">Change Password</a>
                                        <a class="dropdown-item" href="<?= ($cartQuantity == 0) ? '#' : route('fe.myorder'); ?>">My Cart</a>
                                        <a class="dropdown-item" href="{{route('fe.invoice')}}">Invoice</a>
                                        <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">Logout</a>
                                    </div>
                                @endif
                                <div class="text">
                                    @guest
                                        <span class="text-muted">Hi!</span>
                                        <div> 
                                            <a href="{{url('/login')}}">Sign in</a> |  
                                            <a href="{{url('/register')}}"> Register</a>
                                        </div>
                                    @else
                                        <span class="text-muted">Hi! {{Auth::user()->name}}</span>
                                        
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    @endguest
                                </div>
                            </div>
                        </div> <!-- widgets-wrap.// -->
                    </div> <!-- col.// -->
                </div> <!-- row.// -->
            </div> <!-- container.// -->
        </section> <!-- header-main .// -->
    </header> <!-- section-header.// -->
    