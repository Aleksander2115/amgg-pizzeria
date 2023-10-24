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
        @if($pizzas === null)
            <h3>
                Zamówienie jest puste
            </h3>
        @else
            <h1>
                Zawartość zamówienia
            </h1>
            @foreach($pizzas as $pizza)
                <article>
                    <h1>
                        <a href="/products/{{ $pizza->id }}">
                            {{ $pizza->name }} - {{ $pizza->size }}
                        </a>
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
