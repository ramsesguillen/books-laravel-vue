import axios from 'axios';

const resource = 'api/books';

export const getBooks = async () => {
    try {
        const response = await axios.get(`/${resource}`);
        if (response && response.status === 200) {
        return Promise.resolve(response);
        }
        return Promise.reject(response);
    } catch (error) {
        return Promise.reject(error);
    }
};
const bookPayload = (payload) => ({
    author: payload.author,
    title: payload.title,
    edition: payload.edition,
    publish_data: payload.publishData,
    content_type: payload.contentType,
    provider: payload.provider,
    restrict_id: payload.restrictId,
    topic_id: payload.topicId,
});

export const postBook = async (payload) => {
    try {
        const response = await axios.post(`/${resource}`, bookPayload(payload));
        if (response && response.status === 201) {
        return Promise.resolve(response);
        }
        return Promise.reject(response);
    } catch (error) {
        return Promise.reject(error);
    }
};

export const putBook = async (payload, id) => {
    try {
        const response = await axios.put(`/${resource}/${id}`, bookPayload(payload));
        if (response && response.status === 200) {
        return Promise.resolve(response);
        }
        return Promise.reject(response);
    } catch (error) {
        return Promise.reject(error);
    }
};

export const deleteBook = async (id) => {
    try {
        const response = await axios.delete(`/${resource}/${id}`);
        if (response && response.status === 200) {
        return Promise.resolve(response);
        }
        return Promise.reject(response);
    } catch (error) {
        return Promise.reject(error);
    }
};


export const getCatalogs = async (catalogsToGet) => {
    try {
        const response = await axios.get(`/${resource}/catalogs`, {
            params: {
            payload: {
                    topics: false,
                    restricts: false,
                    ...catalogsToGet,
                },
            },
        });
        if (response && response.status === 200) {
            return Promise.resolve(response);
        }
        return Promise.reject(response);
    } catch (error) {
        return Promise.reject(error);
    }
};
