import axios from "axios";

export default {

    state() {

    },
    getters: {

    },
    mutations: {

    },
    actions: {

        async storeMap({ dispatch }, payload) {

            try {
                // await axios.get('/sanctum/csrf-cookie'); 
                await axios
                    .post('/api/map', payload) 
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

        async updateMap({ dispatch }, payload) {

            try {
                // await axios.get('/sanctum/csrf-cookie'); 
                await axios
                    .put('/api/map/' + payload.id, payload) 
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
