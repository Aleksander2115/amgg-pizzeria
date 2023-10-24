@extends('template')

@section('body')
    <div>
        <h1>
            Szczegóły zamówienia #{{ $order->id }}
        </h1>
        <article>
            <p>
                Użytkownik:
                <strong>
                    <a href="/clients/{{ $user->id }}">
                        {{ $user->name }} {{ $user->surname }}
                    </a>
                </strong>
            </p>
            <p>
                Do zapłaty:
                <strong>
                    {{ $order->total_cost }} zł
                </strong>
            </p>
        </article>
        @if($var === null)
            <h3>
                Zamówienie jest puste
            </h3>
        @else
            <h1>
                Zawartość zamówienia
            </h1>
            @foreach($var as $v)
                <article>
                    <h1>
                        {{ $v->pizza->name }} - {{ $v->size->name }} - {{ $v->pizza->price }}
                    </h1>
                </article>
            @endforeach
        @endif
        @if($toppings === null)
            <h3>
                Brak dodatków
            </h3>
        @else
            <h1>
                Dodatki
            </h1>
            @foreach($toppings as $topping)
                <article>
                    <h1>
                        {{ $topping->name }}
                    </h1>
                </article>
            @endforeach
        @endif
        <h3>
            <a href="/orders">
                Powrót
            </a>
        </h3>
    </div>
@endsection
