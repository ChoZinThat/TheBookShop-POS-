import axios from "axios"
import { mapGetters } from 'vuex'
export default {
    name: "UserOrder",
    data () {
        return {
            userId: "",
            orderLists : {},
            orderCount : "",
            groupedOrders : [],           
            userInfo : {},            
        }
    },
    computed: {           
        ...mapGetters(["storageToken","storageUserData"]),            
    },
    methods: {
    getUerInfo(){
       
        let data = {'user_id' : this.userId} ;
        axios.post("http://localhost:8000/api/cartData", data)
             .then(response => {
             this.userInfo = response.data.userInfo;
             
        })
            .catch(error => {
            console.error(error);
    });  
    },
    getOrderList(){
        let data = {'user_id' : this.userId} ;
        axios.post("http://localhost:8000/api/getUserOrder", data)
            .then(response => {
            this.orderLists = response.data.orderData;  
            //this.orderTotalPrice = response.data.orderTotalPrice;
            this.orderCount = Object.keys(this.orderLists).length;           
            
            let i = 0;

            // Iterate through the orderLists
            while (i < this.orderCount) {
                let tempGroup = [];

                // Continue iterating until the order codes don't match
                while (i < this.orderCount - 1 && this.orderLists[i].order_code === this.orderLists[i + 1].order_code) {
                    tempGroup.push(this.orderLists[i]);                    
                    i++;
                }

                // Add the current order to the temporary group
                tempGroup.push(this.orderLists[i]);
                

                // Add the temporary group to the groupedOrders array
                this.groupedOrders.push(tempGroup);

                // Move to the next index
                i++;                
            }   
            
            console.log(this.orderCount);
          })
            .catch(error => {
            console.error(error);
    });  

    
    },
    calculateTotalPrice(group,deliveryFee){
        let userTotal = 0;
        for(let i = 0; i< group.length;i++){
            userTotal += (group[i].total_price*1) + (deliveryFee*1) ;
        }

        return userTotal;
    },
    goHome(){
        this.$router.push({
            name : 'home'
        })
    },
    goCart(){
        this.$router.push({
            name : "BookCart",
            params: {
                userId : this.userId,
            },
        });
    },
    goContact(){
        this.$router.push({
            name : "ContactToAdmin",
            params: {
                userId : this.userId,
            },
        });
    },
    goLogin(){
        this.$router.push({
            name : "loginPage"
        })
    },
    goLogout(){
        this.$store.dispatch("setToken", null);            
        this.goLogin();
    },
    },
    mounted () {
        this.userId = this.storageUserData.id;
        this.getUerInfo();
        this.getOrderList();
    }
}