<div class="mainmenu pull-left">
    <ul class="nav navbar-nav collapse navbar-collapse">
        <li><a href="{{ asset('/') }}" class="active">Trang Chủ</a></li>
        @foreach ($cate_menu as $categories)
        <li class="dropdown"><a href="{{ asset('categorydetail/'.$categories->slug.'/'.$categories->id) }}">{{ $categories->name }}
            @if ($categories->childs->count()>0)
            <i class="fa fa-angle-down"></i>  
            @endif
            </a>
            @include('fontend.components.child_menu',['categories'=>$categories])
        </li> 
        @endforeach       
        
        <li><a href="{{ asset('contact') }}">Liên Hệ</a></li>
    </ul>
</div>