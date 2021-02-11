@if (empty($item->children))
    <li>{{ $item->name }}</li>
@endif


@if (!empty($item->children))
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
            {{ $item->name }} <span class="caret"></span>
        </a>

        <ul class="dropdown-menu" role="menu">
            <li> {{ renderMenuItems($item->children) }}</li>
        </ul>
    </li>
@endif