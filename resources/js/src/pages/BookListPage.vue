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
    <div class="row justify-content-center" v-if="getting">
        <div class="spinner-border" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
    <div class="row justify-content-center" v-if="showAlert">
        <div class="col-5">
            <div class="alert alert-success" role="alert">
                El libro ha eliminado un elememto de la lista.
            </div>
        </div>
    </div>
    <div v-for="item in books" :key="item.id">
        <div>
            <div class="row justify-content-center mb-4">
                <div class="col-7 p-2 shadow bg-body rounded">
                    <div class="row">
                        <div class="col-8">
                            <p><span class="fw-semibold">Titulo: </span>{{ item.title }}</p>
                            <p><span class="fw-semibold">Autor: </span>{{ item.author }}</p>
                        </div>
                        <div class="col-4 d-flex align-items-center">
                            <button class="btn btn-outline-secondary" type="button" data-bs-toggle="collapse" :data-bs-target="`#col-${item.id}`" aria-expanded="false" :aria-controls="`col-${item.id}`">
                                Ver más información
                            </button>
                        </div>
                    </div>
                    <div class="collapse" :id="`col-${item.id}`">
                        <div class="card card-body">
                            <p><span class="fw-semibold">Edición: </span>{{ item.edition }}</p>
                            <p><span class="fw-semibold">Datos de publicación: </span>{{ item.publish_data }}</p>
                            <p><span class="fw-semibold">Tipo de contenido: </span>{{ item.content_type }}</p>
                            <p><span class="fw-semibold">Restricciones: </span>{{ item.restrict.description }}</p>
                            <p><span class="fw-semibold">Materia: </span>{{ item.topic.description }}</p>
                            <p><span class="fw-semibold">Proveedor: </span>{{ item.provider }}</p>
                            <div class="col-12 d-flex justify-content-between">
                                <button type="button" class="btn btn-link" @click="$router.push({ name: 'books.create', params: item })">
                                    Editar
                                </button>
                                <button type="button" class="btn btn-danger" @click="deleteItem(item.id)">
                                    Eliminar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

/*  */
<script>
import { ref } from 'vue'
import useBook from '../composables/useBook';

export default {
    setup() {
        const showAlert = ref(false);
        const {
            books,
            removeBook,
            getting,
        } = useBook();

        return {
            books,
            showAlert,
            getting,
            deleteItem: async (id) => {
                const ok = await removeBook(id);

                if ( ok ) {
                    showAlert.value = true;
                    setTimeout(() => {
                        showAlert.value = false;
                    }, 3000);
                }
            }
        }
    }
}
</script>
