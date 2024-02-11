import axios from "axios";

export default {

    state() {

    },
    getters: {

    },
    mutations: {

    },
    actions: {

        async storePost({ dispatch }, payload) {

            try {
                // await axios.get('/sanctum/csrf-cookie'); 
                await axios
                    .post('/api/post', payload) 
                    .then((response) => {                     
                        
                    })
                    .catch((err) => {
                        //console.log("ERROR::",err.response.headers)
                        throw err.response
                    });
            } catch (e) {
                throw e
            }
        },

        async updatePost({ dispatch }, payload) {

            try {
                // await axios.get('/sanctum/csrf-cookie'); 
                await axios
                    .put('/api/post/' + payload.id, payload) 
                    .then((response) => {                     
                    
                    })
                    .catch((err) => {
                        //console.log("ERROR::",err.response.headers)
                        throw err.response
                    });
            } catch (e) {
                throw e
            }
        },
    },
};
