@component('mail::message')
# Hello

Consequatur doloribus ratione et voluptatem pariatur vel. Omnis tempora consequatur harum maiores. Aut corrupti praesentium eum voluptate omnis quasi. Quia modi voluptatibus qui velit ipsam.

@component('mail::button', ['url' => 'http://laravel.blog'])
Button Text


@endcomponent

-{{ $user->name }}
-{{ $ip }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
