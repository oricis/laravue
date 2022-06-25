


@extends('layouts.master')
@section('title', 'Productos')

@section('content')
    <section class="viewcontent">
        <h2>Contenido productos</h2>
        <ul class="">
            <li class="a b" id="show_index">Lista de productos</li>
            <li class="a b top-2" id="show_create">Crear producto</li>
        </ul>

        <section class="bordered rounded pad-2 pad-both-5 top-2 none"
            id="index">

            <h3 class="flex flex-both">
                <span>Lista de productos (web)</span>
                <span class="a cred" id="close_index">Cerrar</span>
            </h3>

            <ul id="products">
                @foreach($rows as $key => $product)
                    @include('pages/shop/catalog/products/index-row')
                @endforeach
            </ul>

            <form method="POST"
                action="{{ route('web.products.destroy', 0) }}"
                id="destroy_product"
                hidden>
                @hiddenInputs('DELETE')
            </form>
        </section>

        <section class="bordered rounded pad-2 pad-both-5 top-2 none"
            id="create_or_edit">
            <h3 class="flex flex-both">
                <span><span id="form_action">Crear</span> producto (web)</span>
                <span class="a cred" id="close_create_or_edit">Cerrar</span>
            </h3>

            @include('components.forms.errors.all')
            <form method="POST" action="{{ route('web.products.store') }}">
                @hiddenInputs('POST')

                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" name="name" id="name" maxlength="100">
                </div>
                <div class="form-group">
                    <label for="description">Descripción</label>
<textarea name="description" id="description" maxlength="500"></textarea>
                </div>
                <div class="form-group">
                    <label for="price">Precio</label>
                    <input type="number"
                        id="price"
                        min="{{ $priceMin ?? 1 }}"
                        name="price"
                        step="{{ $priceStep ?? 0.5 }}">
                </div>

                @include('components.buttons.accept-and-cancel-buttons')
            </form>
        </section>
    </section>

    @push('public-scripts')
        <script defer src="{{ asset('js/shop/catalog/products.js') }}"></script>
    @endpush
@endsection
