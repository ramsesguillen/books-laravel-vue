<template>
    <nav class="navbar navbar-expand-lg bg-dark p-0">
        <div class="container-fluid m-0 p-0">
            <p class="navbar-brand fw-semibold text-dark m-0 p-3 bg-white">Libros Dev</p>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <router-link
                        :to="{ name: 'books.list' }"
                        v-slot="{ isActive }"
                    >
                        <a
                            class="nav-link"
                            :class="isActive ? 'is-active' : 'normal-link'"
                        >Libros</a>
                    </router-link>
                </li>
                <li class="nav-item">
                    <router-link
                        :to="{ name: 'books.create' }"
                        v-slot="{ isActive }"
                    >
                        <a
                            class="nav-link"
                            :class="isActive ? 'is-active' : 'normal-link'"
                        >Agregar nuevo libro</a>
                    </router-link>
                </li>
            </ul>
            </div>
        </div>
    </nav>
</template>

/*  */
<script>
export default {
    name: 'Navbar',
}
</script>

<style scoped>
    a {
        text-decoration: none;
    }
    .is-active {
        color: #42b983;
    }
    .normal-link {
        color: #ffff;
    }
</style>
