<template>
  <img alt="Vue logo" src="./assets/logo.png">
  <HelloWorld msg="Welcome to Your Vue.js App"/>
</template>

<script>
    import HelloWorld from './components/HelloWorld.vue'

    export default {
        name: 'App',
        components: {
            HelloWorld
        }
    }
</script>

<style>
    body {
        --main_color: #42b983
    }

    .pad-2 {
        padding: 2%;
    }
    .top-5 {
        margin-top: 5%;
    }
    .bordered {
        border: 1px solid var(--main_color)
    }
    .rounded {
        border-radius: 3px;
    }
    .w-50 {
        width: 50%;
    }
    .w-60 {
        width: 60%;
    }
    .w-70 {
        width: 70%;
    }
    .centered {
        margin-left: auto;
        margin-right: auto;
    }

    #app {
        font-family: Avenir, Helvetica, Arial, sans-serif;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        text-align: center;
        color: #2c3e50;
        margin-top: 60px;
    }
</style>
