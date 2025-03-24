@props(['active' => false])

<a {{ $attributes }} href="/"
    class="{{ $active ? ' bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium' : 'text-gray-300 hover:bg-gray-700 hover:text-white capitalize' }} "
    aria-current="{{ $active ? 'page' : false }}">{{ $slot }}</a>
