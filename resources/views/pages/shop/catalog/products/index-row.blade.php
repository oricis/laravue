<li class="flex flex-both pad-b-2 pad-both-2 border-bottom margin-b-2">
    <div title="{{ $product->description }}">
        ID: {{ $product->id }}, {{ $product->name }}
    </div>
    <div class="row-buttons">
        <strong class="b cred cbrown-hover pointer"
            data-action="delete"
            data-id="{{ $product->id }}"
            title="Eliminar producto {{ $product->name }}, ID: {{ $product->id }}"
            role="button">
            x
        </strong>
    </div>
</li>
