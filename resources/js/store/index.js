import { createStore } from "vuex";
import user from './modules/user';
import member from './modules/member';
import upload from './modules/upload';
import collap from './modules/collap';
import post from './modules/post';

const store = createStore({
    modules:{
        user,
        member,
        upload,
        collap,
        post
    }
})

export default store