console.log('js/shop/catalog/products.js');

////////////////////////////////////////////////////////////////////////

handleProducts();

function handleProducts() // void
{
    const createOrEditContainer = qs('#create_or_edit');
    const indexContainer = qs('#index');
    const showCreateControl = qs('#show_create');
    const showIndexControl = qs('#show_index');


    showCreateControl.addEventListener('click', function (ev) // void
    {
        showCreate(ev.target);
    });
    showIndexControl.addEventListener('click', function (ev) // void
    {
        showIndex(ev.target);
    });
    qs('#close_create_or_edit').addEventListener('click', function () // void
    {
        closeCreate();
    });
    qs('#close_index').addEventListener('click', function () // void
    {
        closeIndex();
    });

    const productRowsDestroyButtons = qsa('#index li [data-action="delete"]');
    productRowsDestroyButtons.forEach(button => {
        button.addEventListener('click', function () // void
        {
            destroyProduct(button.getAttribute('data-id'));
        });
    });


    function destroyProduct(productId)
    {
        const form = qs('form#destroy_product');

        let action = form.getAttribute('action');
        action = action.replace('?0', '?' + productId);
        form.setAttribute('action', action);

        form.submit();
    }
    function showCreate(target) // void
    {
        toggleClassName(target, 'disabled');
        toggleClassName(createOrEditContainer, 'none');
    }
    function showIndex(target) // void
    {
        toggleClassName(target, 'disabled');
        toggleClassName(indexContainer, 'none');
    }

    function closeCreate() // void
    {
        toggleClassName(showCreateControl, 'disabled');
        toggleClassName(createOrEditContainer, 'none');
    }
    function closeIndex() // void
    {
        toggleClassName(showIndexControl, 'disabled');
        toggleClassName(indexContainer, 'none');
    }
}
