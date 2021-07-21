@if ($categories->childs->count()>0)
<ul role="menu" class="sub-menu">
    @foreach ($categories->childs as $item_sub)
    <li><a href="{{ asset('categorydetail/'.$item_sub->slug.'/'.$item_sub->id) }}">{{ $item_sub->name }}</a></li>
    @if ($item_sub->childs->count()>0)
    @include('fontend.components.child_menu',['categories'=>$item_sub])
    @endif
    @endforeach
</ul>
@endif