@foreach ($users as $user)
    <h1>{{ $user['name'] }}</h1>
    <h1>{{ $user['age'] }}</h1>
    @if ($user['age'] < 18)
        <p>{{ $user['name'] }} you can't Drive the car</p>
    @endif
    <hr>
@endforeach

Today Date = {{ date('D d M Y') }}

<br>


&copy; Copyright {{ date('Y') }}
