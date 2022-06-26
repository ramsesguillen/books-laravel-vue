<template>
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
                    <label for="editionData" class="form-label">Datos de publicación</label>
                    <Field type="text"
                        class="form-control"
                        id="editionData"
                        name="editionData"
                        :rules="isEmpty"
                        v-model="formData.editionData"/>
                    <small class="form-text text-muted"><ErrorMessage class="text-danger" name="editionData"/></small>
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
                    <label for="restricts" class="form-label">Restricciones</label>
                    <Field
                        class="form-select"
                        name="restricts"
                        id="restricts"
                        as="select"
                        v-model="formData.restricts"
                        :rules="isEmpty"
                    >
                        <option selected disabled>Choose...</option>
                        <option value="1">1</option>
                    </Field>
                <small class="form-text text-muted"><ErrorMessage class="text-danger" name="restricts"/></small>
                </div>
                <div class="col-md-6">
                    <label for="topic" class="form-label">Materia</label>
                    <Field type="text"
                        class="form-control"
                        name="topic"
                        id="topic"
                        :rules="isEmpty"
                        v-model="formData.topic"/>
                    <small class="form-text text-muted"><ErrorMessage class="text-danger" name="topic"/></small>
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
                    <button class="btn btn-primary" type="submit">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</template>

/*  */
<script>
import { reactive } from 'vue';
import { Field, Form, ErrorMessage } from 'vee-validate';
import { required, min, max } from '@vee-validate/rules';

export default {
    components: {
        Field,
        Form,
        ErrorMessage,
    },
    setup() {
        const formData = reactive({
            title: null,
            author: null,
            edition: null,
            editionData: null,
            contentType: null,
            restricts: null,
            topic: null,
            provider: null,
        });

        const isEmpty = (value) => {
            if (required(value)) {
                return true;
            }
            return 'Este campo es requerido';
        }

        return {
            formData,
            isEmpty,
            onSubmit: (values) => {
                console.log(values)
            }
        }
    }
}
</script>
