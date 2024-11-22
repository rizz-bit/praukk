@extends('profile.index')
@section('profile')
<a href="{{ route('add.foto' , auth()->user()->id ) }}" class="absolute right-0">
    <i class="fas fa-plus text-2xl mr-8">
    </i>
</a>
 <div class="w-1/4">
      <img alt="Screenshot of a web page" class="w-full" height="100" src="https://storage.googleapis.com/a1aa/image/WhWIixmZ3yIjBt7r3HCbq3ovhcqNeLliif77eZrJNjPozKinA.jpg" width="150"/>
     </div>
     <div class="w-1/4">
      <img alt="Another screenshot of a web page" class="w-full" height="100" src="https://storage.googleapis.com/a1aa/image/X7HZDG3OXbLgKRvzPuVEVZM6znf8mqTAx9gyxq0IdCDuti4JA.jpg" width="150"/>
     </div>
    </div>
@endsection