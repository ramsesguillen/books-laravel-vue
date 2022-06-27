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
import { defineAsyncComponent, onMounted } from 'vue';
import useBook from './composables/useBook';

export default {
    components: {
        Navbar: defineAsyncComponent(() => import('./components/Navbar.vue') )
    },
    setup() {
        const {
            getBooks,
        } = useBook();
        onMounted( async () => {
            await getBooks();
        });
        return {
        }
    }
}
</script>
