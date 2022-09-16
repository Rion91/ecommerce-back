<ul class="list-group">

    <a href="{{ route('categories.index') }}">
        <li class="list-group-item {{ Request::route()->getName() == 'categories.index' || Request::route()->getName() == 'categories.create' || Request::route()->getName() == 'categories.edit' ? 'side-bar-active' : ' '}}">
            Category
        </li>
    </a>

    <a href="{{ route('products.index') }}">
        <li class="list-group-item {{ Request::route()->getName() == 'products.index' || Request::route()->getName() == 'products.create' || Request::route()->getName() == 'products.edit' ? 'side-bar-active' : ' '}}">
            Product
        </li>
    </a>

    <li class="list-group-item">Order</li>

    <a href="{{ route('logout') }}">
        <li class="list-group-item">Logout</li>
    </a>


</ul>


