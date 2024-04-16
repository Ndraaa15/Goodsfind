<div class="dropdown category-dropdown">
    <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static" title="Browse Categories">
        Browse Categories <i class="icon-angle-down"></i>
    </a>
    <div class="dropdown-menu">
        <nav class="side-nav">
            <ul class="menu-vertical sf-arrows">
                <li class="item-lead"><a href="/shop?daily=true">Daily offers</a></li>
                @foreach($categories as $category)
                <li><a href="/shop?category={{ $category->id }}">{{ $category->category }}</a></li>
                @endforeach
            </ul>
        </nav>
    </div>
</div>
