<div class="aiz-category-menu main_menuHere bg-white rounded @if(Route::currentRouteName() == 'home') shadow-sm" @else shadow-lg id="category-sidebar" @endif>
    <div class="p-3 bg-white d-none d-lg-block rounded-top all-category position-relative text-left">
        <style>
            .cole {
                font-weight: 700;
                font-size: 18px;
            }
        </style>

        <span class="fw-600 fs-16 mr-3"><a class="cole" href="https://sahebzaadi.com.bd/categories">{{ translate('All Categories') }}</a></span>
        <a href="{{ route('categories.all') }}" class="text-reset">
            <span class="d-none d-lg-inline-block"></span>
        </a>
    </div>
    <ul class="list-unstyled categories no-scrollbar  mb-0 text-left menuUl">
        @foreach (\App\Models\Category::where('level', 0)->orderBy('order_level', 'desc')->get()->take(11) as $key => $category)
            <li class="menuLi category-nav-element" data-id="{{ $category->id }}">
                <a href="{{ route('products.category', $category->slug) }}" class="text-truncate text-reset d-block mainA">
                    
                    <span class="cat-name">{{ $category->getTranslation('name') }}</span>
                </a>
                @if(count(\App\Utility\CategoryUtility::get_immediate_children_ids($category->id))>0)
                    <div class="sub-cat-menu c-scrollbar-light rounded shadow-lg p-4">
                        <div class="c-preloader text-center absolute-center">
                            <i class="las la-spinner la-spin la-3x opacity-70"></i>
                        </div>
                    </div>
                @endif
            </li>
        @endforeach
    </ul>
</div>
