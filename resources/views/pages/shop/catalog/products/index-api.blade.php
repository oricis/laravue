@extends('layouts.master')
@section('title', 'Productos')

@section('content')
    <section class="viewcontent">
         <h2>Lista de productos (api)</h2>

        <ul id="products">
        </ul>
    </section>

    @push('public-scripts')
        <script defer src="{{ asset('js/public.js') }}"></script>
    @endpush
@endsection

