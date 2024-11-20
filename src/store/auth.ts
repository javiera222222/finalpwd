import { defineStore } from "pinia";
import IAuth from "../Interfaces/IAuth";

export const useAuthStore = defineStore("auth", {
    // valores iniciales de los stores
    state: () => ({
        access_jwt: "" as string | null,
        username: "" as string | null,
        authorized: false as boolean,
        id: 0 as number | null,
    }),
    // mutaciones en forma de computadas (getters)
    getters: {
        getAccess_token: (state) => {
            return state.access_jwt;
        },

        getUsername: (state) => {
            return state.username;
        },
        getAuthorized: (state) => {
            return state.authorized;
        },

        getID: (state) => {
            return state.id;
        },
    },

    actions: {
        isAuth(data: IAuth) {
            this.access_jwt = data.access_jwt;
            this.username = data.username;
            this.authorized = true;
            this.id = data.id;
        },
        logout() {
            this.access_jwt = "";
            this.username = "";
            this.authorized = false;
            this.id = 0;
        },
    },
    persist: true,
});
