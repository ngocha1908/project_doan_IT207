<div id="sidebar-collapse" class="col-2 sidebar">
    <ul class="nav menu">
        <li><a href="index"><svg class="glyph stroked dashboard-dial">
                    <use xlink:href="#stroked-dashboard-dial"></use>
                </svg> {{ __('Dashboard') }} </a></li>
        <li><a href="{{ route('admin.users.index') }}"><svg class="glyph stroked male user ">
                    <use xlink:href="#stroked-male-user" />
                </svg> {{ __('Users') }} </a></li>
        <li><a href="{{ route('admin.categories.index') }}"><svg class="glyph stroked open folder">
                    <use xlink:href="#stroked-open-folder" />
                </svg> {{ __('Categories') }} </a></li>
        <li><a href="{{ route('admin.products.index') }}"><svg class="glyph stroked bag">
                    <use xlink:href="#stroked-bag"></use>
                </svg> {{ __('Products') }} </a></li>
        <li><a href="{{ route('admin.orders.index') }}"><svg class="glyph stroked bag">
                    <use xlink:href="#stroked-bag"></use>
                </svg> {{ __('Orders') }} </a></li>
    </ul>
</div>
