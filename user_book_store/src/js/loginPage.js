import axios from "axios"
import { mapGetters } from 'vuex'    
export default {
        name: "loginPage",
        data () {
            return { 
                userData: {
                    email : "",
                    password : "",   
                },
                userStatus : false
            }
        },
        computed: {           
             ...mapGetters(["storageToken","storageUserData"]),            
        },
        methods: {
            loginUser () {
                axios.post("http://localhost:8000/api/user/login", this.userData).then((response) => {
                    if(response.data.token == null){
                        this.userStatus = true;
                        console.log(response.data.token);
                    }
                    else{
                        this.userStatus = false;
                        this.storeUserData(response);
                        this.goHome();                                                  
                    }
                })
             },
            storeUserData(response){
                this.$store.dispatch("setToken", response.data.token);
                this.$store.dispatch("setUserData", response.data.user); 
                
              },  
            goHome(){
                    this.$router.push({
                        name: "home",
                    });
            },
            signUp(){
                this.$router.push({
                    name: "registerPage"
                })
            }


        },
        






        
}