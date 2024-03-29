import { defineStore } from 'pinia'
import { post } from '@/services/api.services'

export const useUserStore = defineStore('user', {
    state: () => ({ data: null, token: null, isLoggedIn: false }),
    getters: {
      getData: (state) => state.data,
      getToken: (state) => state.token,
      getIsLoggedIn: (state) => state.isLoggedIn,
    },
    actions: {
      async login(user) {
        console.log("Initializing session...");
        try {
            const response = await post("/users/login", user);

            if(response.ok) {
                localStorage.setItem("token", response.data.token);
                this.data = response.data.user;
                this.token = response.data.token;
                this.isLoggedIn = true;
                
                console.log("Session successfully initialized.");
                return response.ok;
            } else {
                console.log("An error occurred: ", response);
                return response.ok;
            };
            
        } catch (error) {
            console.error("Error on Login action: ", error);
            throw new Error("An error occurred trying init session: ", error);
        }
      },
      async logout() {
          
          try {
              const response = await post("/users/logout")
              
              if(response.ok) {
                localStorage.removeItem("token");

                this.data = {};
                this.token = "";
                this.isLoggedIn = false;

                console.log("Logout successfully.");
                return response.ok;
            } else {
                console.log("An error occurred.", response); 
                return response.ok;
              }

            } catch (error) {
            console.error("Error on Logout action: ", error);
            throw new Error("An error occurred trying to end session: ", error);
            }
        },
    }
  })