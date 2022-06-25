<template>
    <section class="bordered rounded pad-2 pad-both-5 top-2 none"
        id="index">
        <h3 class="flex flex-both">
            <span>Lista de productos (vue)</span>
            <span class="cred" id="close_index">Cerrar</span>
        </h3>

        <ul id="products">
            <li hidden
                class="flex flex-both pad-b-2 pad-both-2 border-bottom margin-b-2">
                <div title="Some text...">
                    ID: 0, Demo
                </div>
                <div class="row-buttons">
                    <strong class="b cred cbrown-hover pointer"
                        data-action="delete"
                        data-id="0"
                        title="Eliminar producto Demo, ID: 0">
                        x
                    </strong>
                </div>
            </li>
        </ul>
    </section>
</template>

<script>
    import axios from "axios";
    export default {
    created() {
        axios.get("https://jsonplaceholder.typicode.com/todos/1").then((result) => {
            console.log(result.data);
        })
    }
    };
</script>

<style scoped>
  /* Código CSS */
</style>
