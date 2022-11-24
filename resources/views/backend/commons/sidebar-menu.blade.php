@if(\App\Models\Role::getValue($permission))
    <li class="nav-item @if(Request::route()->getName() == $route) active @endif"><a class="nav-link" href="{{ isset($params) ? route($route, $params) : route($route) }}"><i class="fas {{ $icon }}"></i> <span>{{ $name }}</span></a></li>
@endif