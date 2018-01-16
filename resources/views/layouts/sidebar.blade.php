<div class="left-sidebar">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h5>@lang('label.category')</h5>
        </div>
        <div class="panel-body">
            <ul class="vertical-nav">
                @foreach ($categories as $parentCategory)
                    <li><a href="#">{{ $parentCategory->name }}</a>
                        @if(!is_null($parentCategory->subCategories))
                            <ul class="sub-menu">
                            @foreach ($parentCategory->subCategories as $subCategory)
                                <li><a href="{{ route('category', $subCategory->id) }}">{{ $subCategory->name }}</a></li>
                            @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    
</div>
