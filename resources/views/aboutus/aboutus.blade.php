@extends('layouts.app')
<link href="{{ asset('css/aboutus/aboutus.css') }}" rel="stylesheet">
@section('content')
    <h1>ABout Us</h1>
    <div class="container">
        <div class="cont-img">
        <p>
            Donec elementum arcu nisl. Sed eu consequat lacus, eu scelerisque dolor. Duis finibus suscipit odio, in lacinia leo semper ac. Aliquam erat volutpat. In tincidunt, magna id auctor blandit, magna urna sodales ligula, ut sollicitudin eros diam id est. Curabitur tellus lectus, vulputate ut eros id, pulvinar euismod libero. Vestibulum mattis ipsum nulla. Quisque consequat tellus non mauris fermentum rhoncus. Sed tincidunt urna vitae erat blandit, vel hendrerit odio lobortis. Suspendisse eget commodo sapien, ut ultricies nisl. Etiam eget ex quis odio ornare pretium et non libero. Sed lectus lorem, maximus non magna in, pulvinar tincidunt neque. Donec ac nunc vel ligula ullamcorper cursus. Sed placerat pulvinar erat, ac ullamcorper lectus viverra in. Curabitur semper orci vitae justo tempus volutpat. Nam laoreet vel lectus eget consequat. Pellentesque imperdiet vitae sem ut vehicula. Aliquam sed volutpat augue. Vestibulum tincidunt est eros, a placerat velit porttitor sit amet. Sed in volutpat urna, vitae auctor libero. Vivamus non dignissim purus, et commodo dui. Vestibulum scelerisque elit nec leo porta tristique a in erat. Aliquam metus nisl, ornare ut condimentum non, semper ac lectus. Donec aliquet metus id odio mattis porttitor quis nec eros. Aenean euismod feugiat tincidunt.
        </p>
        <img src="{{ URL::asset('/images/bodyImg.jpg') }}" alt="">
        </div>

        <p>Curabitur semper orci vitae justo tempus volutpat. Nam laoreet vel lectus eget consequat. Pellentesque imperdiet vitae sem ut vehicula. Aliquam sed volutpat augue. Vestibulum tincidunt est eros, a placerat velit porttitor sit amet. Sed in volutpat urna, vitae auctor libero. Vivamus non dignissim purus, et commodo dui. Vestibulum scelerisque elit nec leo porta tristique a in erat. Aliquam metus nisl, ornare ut condimentum non, semper ac lectus. Donec aliquet metus id odio mattis porttitor quis nec eros. Aenean euismod feugiat tincidunt. Nam fermentum urna nec tristique ornare. Sed turpis mi, aliquet convallis convallis vitae, placerat in eros. Sed pharetra mauris massa, eu fringilla magna volutpat at. Duis quis justo quis lorem sodales commodo ac eget nulla. Proin aliquam lacus at velit sollicitudin cursus. Donec quis dui in urna euismod ultricies. Nunc euismod egestas pharetra. Curabitur semper orci vitae justo tempus volutpat. Nam laoreet vel lectus eget consequat. Pellentesque imperdiet vitae sem ut vehicula. Aliquam sed volutpat augue. Vestibulum tincidunt est eros, a placerat velit porttitor sit amet. Sed in volutpat urna, vitae auctor libero. Vivamus non dignissim purus, et commodo dui. Vestibulum scelerisque elit nec leo porta tristique a in erat. Aliquam metus nisl, ornare ut condimentum non, semper ac lectus. Donec aliquet metus id odio mattis porttitor quis nec eros. Aenean euismod feugiat tincidunt. Nam fermentum urna nec tristique ornare. Sed turpis mi, aliquet convallis convallis vitae, placerat in eros. Sed pharetra mauris massa, eu fringilla magna volutpat at. Duis quis justo quis lorem sodales commodo ac eget nulla. Proin aliquam lacus at velit sollicitudin cursus. Donec quis dui in urna euismod ultricies. Nunc euismod egestas pharetra.
        </p>
        <div class="FAQ">
            <button><a href="">Our FAQ</a></button>
        </div>
    </div>

@endsection
