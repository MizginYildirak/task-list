 // laravel changes these codes into php codes and it caches it in the file "storage/framework/views". It doesn't render the codes again until it is changed.

 // @{} means do not render this as php codes, take it as a js code.

 // if there is big amount of block code then @verbatim becomes handy instead of writing too mant @ s.

 // @if, @unless

 // difference is if it returns true then it works for @if, if false then @unless

 // @isset, if the variable is defined and not null, then its code block works. 

 // @empty is used to control if the variable is not null, [], "", 0

 // [] is defined acc. to @isset

 // @auth controls if the user is logged in, returns true

 // @guest is if the user is not logged.

 // @production checks if the app works in the production environment.

 // @env checks in a specific environment

 // @hassection if a section has a content

 // @sectionMissing if a section doesn't have a content

 // @session checks if a session value exists

 // @switch, @case, @break

 {{-- @for ($i = 0; $i < 10; $i++)
 The current value is {{ $i }}
@endfor

@foreach ($users as $user)
 <p>This is user {{ $user->id }}</p>
@endforeach

@forelse ($users as $user)
 <li>{{ $user->name }}</li>
@empty
 <p>No users</p>
@endforelse

@while (true)
 <p>I'm looping forever.</p>
@endwhile --}}

