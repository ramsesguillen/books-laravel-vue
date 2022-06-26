<template>
    <div>
        <div class="container-container mb-5">
            <form class="d-flex justify-content-end" role="search">
                <div class="col-4">
                    <input class="form-control me-2" type="search" placeholder="Buscar libro" aria-label="Buscar libro">
                </div>
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
    <div v-for="(index) in 10" :key="index">
        <div>
            <div class="row justify-content-center mb-4">
                <div class="col-7 p-2 shadow bg-body rounded">
                    <div class="row">
                        <div class="col-8">
                            <p><span class="fw-semibold">Titulo: </span>Nombre del libro</p>
                            <p><span class="fw-semibold">Autor: </span>Fulano de tal</p>
                        </div>
                        <div class="col-4 d-flex align-items-center">
                            <button class="btn btn-outline-secondary" type="button" data-bs-toggle="collapse" :data-bs-target="`#col-${index}`" aria-expanded="false" :aria-controls="`col-${index}`">
                                Ver más información
                            </button>
                        </div>
                    </div>
                    <div class="collapse" :id="`col-${index}`">
                        <div class="card card-body">
                            Some placeholder content for the collapse component. This panel is hidden by default but revealed when the user activates the relevant trigger.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

/*  */
<script>
export default {
    name: 'BookListPage',
    // setup() {
    //     return {
    //     }
    // }
}
</script>
