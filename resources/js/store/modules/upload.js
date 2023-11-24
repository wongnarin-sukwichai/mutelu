import axios from "axios";

export default {

    state() {
        return {
            picName: null
        }
    },
    getters: {
        getPicName(state) {
            return state.picName
        }
    },
    mutations: {
        setPicName(state, payload) {
            state.picName = payload;
        },
    },
    actions: {

        async uploadPicCollap({ dispatch }, payload) {
            
            const config = {                                    //ใส่ทุกครั้งที่รับ File เข้ามา
                headers: {
                    'content-type': 'multipart/form-data'
                }
            }

            try {
                await axios.get('/sanctum/csrf-cookie'); 
                await axios
                    .post('/api/uploadPicCollap', payload, config) 
                    .then((response) => {        
                        return dispatch('getPicName', response.data)   
                    })
                    .catch((err) => {
                        //console.log("ERROR::",error.res.headers)
                        throw err.response
                    });
  
            } catch (err) {
                throw err
            }
        },

        async uploadPicPost({ dispatch }, payload) {
            
            const config = {                                    //ใส่ทุกครั้งที่รับ File เข้ามา
                headers: {
                    'content-type': 'multipart/form-data'
                }
            }

            try {
                await axios.get('/sanctum/csrf-cookie');
                await axios
                    .post('/api/uploadPicPost', payload, config) 
                    .then((response) => {        
                        return dispatch('getPicName', response.data)   
                    })
                    .catch((err) => {
                        //console.log("ERROR::",error.res.headers)
                        throw err.response
                    });
  
            } catch (err) {
                throw err
            }
        },

        async uploadPicMap({ dispatch }, payload) {
            
            const config = {                                    //ใส่ทุกครั้งที่รับ File เข้ามา
                headers: {
                    'content-type': 'multipart/form-data'
                }
            }

            try {
                await axios.get('/sanctum/csrf-cookie');
                await axios
                    .post('/api/uploadPicMap', payload, config) 
                    .then((response) => {        
                        return dispatch('getPicName', response.data)   
                    })
                    .catch((err) => {
                        //console.log("ERROR::",error.res.headers)
                        throw err.response
                    });
  
            } catch (err) {
                throw err
            }
        },


        async getPicName({ commit }, data) {
            commit('setPicName', data)
        }
    },
};
