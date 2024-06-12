import axios from "axios"
import { mapGetters } from 'vuex'

export default {
    name : "ContactToAdmin",
    data () {
        return {
            userId : "",
            userInfo : {},
            message : "",
            subject : "",
            check : ""
        }
    },
    computed: {           
        ...mapGetters(["storageToken","storageUserData"]),            
    },   
    methods: {
        getUerInfo(){
            console.log(this.userId);
            let data = {'user_id' : this.userId} ;
            axios.post("http://localhost:8000/api/user/info", data)
                 .then(response => {
                 this.userInfo = response.data.userInfo;                  
            }) 
                .catch(error => {
                console.error(error);
        });  
        },
        goHome(){
            this.$router.push({
                name : 'home'
            });
        },
        goCart(){
            this.$router.push({
                name : "BookCart",
                params: {
                    userId : this.userId,
                },
            });
        },
        goLogout(){
            this.$router.push({
                name : "loginPage"
            })
        },
        sendMessage(){
            let data = {
                'user_id' : this.userId,
                'message' : this.message,
                'subject' : this.subject
            }
            axios.post("http://localhost:8000/api/contactToAdmin", data)
                 .then(response => {
                    this.check = response.data.status;
                 if( this.check == "success"){
                    this.goHome();
                 }     
            }) 
                .catch(error => {
                console.error(error);
        });  
                
            
        },
        
    },
    mounted () {
        this.userId = this.storageUserData.id;
        this.getUerInfo();        
    }
}