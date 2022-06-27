<template>

    <div class="row justify-content-center" v-if="showAlert">
        <div class="col-5">
            <div class="alert alert-success" role="alert">
                {{ alertMsg }}
            </div>
        </div>
    </div>
    <div class="row justify-content-center" v-if="showAlertError">
        <div class="col-5">
            <div class="alert alert-danger" role="alert">
                {{ alertMsg }}
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-8">
            <Form class="row g-3" @submit="onSubmit">
                <div class="col-md-6">
                    <label for="title" class="form-label">Titulo</label>
                    <Field
                        type="text"
                        class="form-control"
                        name="title"
                        id="title"
                        v-model="formData.title"
                        :rules="isEmpty"
                    />
                    <small class="form-text text-muted"><ErrorMessage class="text-danger" name="title"/></small>
                </div>
                <div class="col-md-6">
                    <label for="author" class="form-label">Autor</label>
                    <Field type="text"
                        class="form-control"
                        name="author"
                        id="author"
                        :rules="isEmpty"
                        v-model="formData.author"/>
                    <small class="form-text text-muted"><ErrorMessage class="text-danger" name="author"/></small>
                </div>
                <div class="col-md-6">
                    <label for="edition" class="form-label">Edición</label>
                    <Field type="text"
                        class="form-control"
                        name="edition"
                        id="edition"
                        :rules="isEmpty"
                        v-model="formData.edition"/>
                    <small class="form-text text-muted"><ErrorMessage class="text-danger" name="edition"/></small>
                </div>
                <div class="col-md-6">
                    <label for="publishData" class="form-label">Datos de publicación</label>
                    <Field type="text"
                        class="form-control"
                        id="publishData"
                        name="publishData"
                        :rules="isEmpty"
                        v-model="formData.publishData"/>
                    <small class="form-text text-muted"><ErrorMessage class="text-danger" name="publishData"/></small>
                </div>
                <div class="col-md-6">
                    <label for="contentType" class="form-label">Tipo de contenido</label>
                    <Field type="text"
                        class="form-control"
                        name="contentType"
                        id="contentType"
                        :rules="isEmpty"
                        v-model="formData.contentType"/>
                    <small class="form-text text-muted"><ErrorMessage class="text-danger" name="contentType"/></small>
                </div>
                <div class="col-md-6">
                    <label for="restrictId" class="form-label">Restricciones</label>
                    <Field
                        class="form-select"
                        name="restrictId"
                        id="restrictId"
                        as="select"
                        v-model="formData.restrictId"
                        :rules="isEmpty"
                    >
                        <option selected disabled>Choose...</option>
                        <option v-for="item in catalogs?.restricts" :key="item.id" :value="item.id">{{ item.description }}</option>
                    </Field>
                    <small class="form-text text-muted"><ErrorMessage class="text-danger" name="restrictId"/></small>
                </div>
                <div class="col-md-6">
                    <label for="topicId" class="form-label">Materia</label>
                    <Field
                        class="form-select"
                        name="topicId"
                        id="topicId"
                        as="select"
                        v-model="formData.topicId"
                        :rules="isEmpty"
                    >
                        <option selected disabled>Choose...</option>
                        <option v-for="item in catalogs?.topics" :key="item.id" :value="item.id">{{ item.description }}</option>
                    </Field>
                    <small class="form-text text-muted"><ErrorMessage class="text-danger" name="topicId"/></small>
                </div>
                <div class="col-md-6">
                    <label for="provider" class="form-label">Proveedor</label>
                    <Field type="text"
                        class="form-control"
                        name="provider"
                        id="provider"
                        :rules="isEmpty"
                        v-model="formData.provider"/>
                    <small class="form-text text-muted"><ErrorMessage class="text-danger" name="provider"/></small>
                </div>
                <div class="col-12">
                    <input class="btn btn-secondary" type="reset" value="Limpiar formulario" @click="bookId = null"/>
                    <button class="btn btn-primary" type="submit">{{ submitting ? 'Guardando...' : 'Guardar' }}</button>
                </div>
            </form>
        </div>
    </div>
</template>

/*  */
<script>
import { onMounted, ref } from 'vue';
import { Field, Form, ErrorMessage } from 'vee-validate';
import { required, min, max } from '@vee-validate/rules';
import useBook from '../composables/useBook';

export default {
    components: {
        Field,
        Form,
        ErrorMessage,
    },
    props: {
        bookToUpdate: {
            type: Object,
            required: false,
        },
    },
    setup(props) {
        const showAlert = ref(false);
        const showAlertError = ref(false);
        const alertMsg = ref('');
        const {
            formData,
            submitting,
            getCatalogs,
            catalogs,
            saveBook,
            fillForm,
            bookId,
            updateBook,
            resetForm,
        } = useBook();

        onMounted(async() => {
            fillForm(props.bookToUpdate);
            await getCatalogs();
        });

        const isEmpty = (value) => {
            if (required(value)) {
                return true;
            }
            return 'Este campo es requerido';
        }

        return {
            submitting,
            alertMsg,
            catalogs,
            formData,
            isEmpty,
            showAlert,
            showAlertError,
            bookId,
            onSubmit: async (values) => {
                let resp;
                if (bookId.value) {
                    resp = await updateBook(values, bookId.value);
                    alertMsg.value = resp.message;
                } else {
                    resp = await saveBook(values);
                    alertMsg.value = resp.message;
                }
                if ( resp.ok ) {
                    showAlert.value = true;
                    // resetForm();
                    bookId.value = null;
                    setTimeout(() => {
                        showAlert.value = false;
                    }, 3000);
                } else {
                    showAlertError.value = true;
                    setTimeout(() => {
                        showAlertError.value = false;
                    }, 3000);
                }
            }
        }
    }
}
</script>
