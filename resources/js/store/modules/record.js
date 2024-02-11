import axios from "axios";

export default {

    state() {

    },
    getters: {

    },
    mutations: {

    },
    actions: {

        async storeRecord({ dispatch }, payload) {

            try {
                // await axios.get('/sanctum/csrf-cookie'); 
                await axios
                    .post('/api/record', payload) 
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
