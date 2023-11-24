import axios from "axios";

export default {

    state() {

    },
    getters: {

    },
    mutations: {

    },
    actions: {

        async storeCollap({ dispatch }, payload) {

            try {
                await axios.get('/sanctum/csrf-cookie'); 
                await axios
                    .post('/api/collap', payload) 
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

        async updateCollap({ dispatch }, payload) {

            try {
                await axios.get('/sanctum/csrf-cookie'); 
                await axios
                    .put('/api/collap/' + payload.id, payload) 
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
