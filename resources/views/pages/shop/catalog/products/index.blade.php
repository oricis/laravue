


@extends('layouts.master')
@section('title', 'Productos')

@section('content')
    <section class="viewcontent">
        <h2>Lista de productos (web)</h2>

        <ul id="products">
            @foreach($rows as $key => $product)
                <li>ID: {{ $product->id }}, name: {{ $product->name }}</li>
            @endforeach
        </ul>
    </section>

    @push('public-scripts')
        <script defer src="{{ asset('js/public.js') }}"></script>
    @endpush
@endsection
