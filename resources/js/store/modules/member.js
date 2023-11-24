
export default {
    //สร้างตัวแปรนั่นแหละ
    state() {
        return {
            
        };
    },
    getters: {

    },
    mutations: {

    },
    actions: {

        async addMem({ dispatch }, payload) {

            try {
                await axios.get("/sanctum/csrf-cookie"); //await การ process ข้อมูลโดยบังคับให้ต้องรอ กระบวนการนี้เสร็จก่อนจึงจะสามารถไปทำ process อื่นๆได้

                await axios
                    .post("/api/member", payload) //ไปที่ routes->api->login
                    .then((response) => {
                        
                    })
                    .catch((err) => {
                        throw err.response;
                    });
            } catch (e) {
                throw e;
            }
        },     
    },
};
