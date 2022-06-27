import { ref, reactive, computed } from 'vue';
import { useStore } from 'vuex';

//
const useBook = () => {
    const submitting = ref(false);
    const getting = ref(false);
    const bookId = ref(null);
    const formData = reactive({
        title: null,
        author: null,
        edition: null,
        publishData: null,
        contentType: null,
        provider: null,
        restrictId: null,
        topicId: null,
    });

    /**
    * Composable
    */
    const store = useStore();

    /**
    * Getters
    */
    const catalogs = computed(() => store.getters['catalogs']);
    const books = computed(() => store.getters['books']);

    /**
    * Methods
    */

    const getCatalogs = async () => {
        if (catalogs.value) return;
        const { ok, message } = await store.dispatch('getBookCatalogs');
    };

    const getBooks = async () => {
        if (books.value.length !== 0) return;
        getting.value = true;
        const { ok, message } = await store.dispatch('getBooks');
        getting.value = false;
        return ok;
    };

    const saveBook = async (payload) => {
        submitting.value = true;
        const { ok, message } = await store.dispatch('saveBook', payload);
        submitting.value = false;
        return { ok, message };
    };

    const updateBook = async (payload, id) => {
        submitting.value = true;
        const { ok, message } = await store.dispatch('updateBook', { payload, id });
        submitting.value = false;
        return { ok, message }
    };

    const removeBook = async (id) => {
        const { ok, message } = await store.dispatch('deleteBook', id);
        return ok;
    };

    const fillForm = (payload) => {
        bookId.value = payload?.id || null;
        formData.title = payload?.title || null;
        formData.author = payload?.author || null;
        formData.edition = payload?.edition || null;
        formData.publishData = payload?.publish_data || null;
        formData.contentType = payload?.content_type || null;
        formData.provider = payload?.provider || null;
        formData.restrictId = payload?.restrict_id || null;
        formData.topicId = payload?.topic_id || null;
    }



    return {
        bookId,
        updateBook,
        removeBook,
        fillForm,
        submitting,
        getting,
        formData,
        getCatalogs,
        catalogs,
        getBooks,
        books,
        saveBook,
    };
};

export default useBook;
