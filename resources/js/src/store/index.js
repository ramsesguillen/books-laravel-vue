
const { createStore } = require("vuex");

const store = createStore({
    state () {
        return {
            books: []
        }
    },
    mutations: {
        // increment (state) {
        //     state.count++
        // }
    },
    getters: {
        books(state) {
            return state.books;
        }
    }
})

export default store
