
const { createStore } = require("vuex");
import { bookServices } from '../services'

const store = createStore({
    state () {
        return {
            books: [],
            catalogs: null,
        }
    },
    mutations: {
        setCatalogs: (state, catalogs) => state.catalogs = catalogs,
        setBooks: (state, books) => state.books = books,
        addBook: (state, book) => state.books = [book, ...state.books],
        updateBook: (state, book) => state.books = state.books.map(b => book.id === b.id ? book : b),
        removeBook: (state, id) => state.books = state.books.filter(b => b.id !== id),
    },
    actions: {
        getBookCatalogs: async ({ commit }) => {
            try {
                const { data } = await bookServices.getCatalogs({ topics: true,restricts: true, });
                commit('setCatalogs', data?.catalogs);
                return { ok: true, message: data?.message }
            } catch (error) {
                return { ok: false, message: 'No se logro cargar los catalogs', }
            }
        },
        getBooks: async ({ commit }) => {
            try {
                const { data } = await bookServices.getBooks();
                commit('setBooks', data?.books);
                return { ok: true, message: data?.message }
            } catch (error) {
                return { ok: false, message: 'Hubo un error', }
            }
        },
        saveBook: async ({ commit }, payload) => {
            try {
                const { data } = await bookServices.postBook(payload);
                commit('addBook', data?.book);
                return { ok: true, message: data?.message }
            } catch (error) {
                return { ok: false, message: 'Hubo un error', }
            }
        },
        updateBook: async ({ commit }, { payload, id }) => {
            try {
                const { data } = await bookServices.putBook(payload, id);
                commit('updateBook', data?.book);
                return { ok: true, message: data?.message }
            } catch (error) {
                return { ok: false, message: 'Hubo un error', }
            }
        },
        deleteBook: async ({ commit }, id) => {
            try {
                const { data } = await bookServices.deleteBook(id);
                commit('removeBook', id);
                return { ok: true, message: data?.message }
            } catch (error) {
                return { ok: false, message: 'Hubo un error', }
            }
        },
    },
    getters: {
        books: (state) => state.books,
        catalogs: (state) => state.catalogs,
    }
})

export default store
