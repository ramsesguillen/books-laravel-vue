<template>
    <div>
        <Navbar />
        <div class="container">
            <div class="row justify-center mt-5">
                <router-view></router-view>
            </div>
        </div>
    </div>
</template>

/*  */
<script>
import { defineAsyncComponent } from 'vue';
export default {
    components: {
        Navbar: defineAsyncComponent(() => import('./components/Navbar.vue') )
    },
    name: 'App',
}
</script>

/*  */
<style scoped>

</style>
