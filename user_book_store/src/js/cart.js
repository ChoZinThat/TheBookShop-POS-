import axios from "axios";

export default {
    name : 'BookCart',
    data () {
        return {
           userId : '',
           bookNumber : [],
           cartData: {},           
           message: "",//temporay store data
           totalPrice : [],//total price of each item
           subTotal: "",//total price of all item
           orderTotalPrice : "",//final total price with delveiry fee
           deliverData: [],
           selectedDelviery : "",
           deliveryFee: "0",           
           deliverStatus : false,//for order click
           orderMessage : "",//for user message
        }
    },
    
    methods: {
        getcartData () {        

            let data = {'user_id' : this.userId} ;
            axios.post("http://localhost:8000/api/cartData", data)
                 .then(response => {
                 this.cartData = response.data.cartData;
                 
                 this.bookNumber = [];
                 this.totalPrice = [];

                 // Iterate through each item in the cartData
                 for (let cartItem of this.cartData) {
                     this.bookNumber.push(cartItem.qty);
                     this.totalPrice.push(cartItem.qty * cartItem.price);
                 }

                this.allTotal();
                 
            })
                .catch(error => {
                console.error(error);
        });            
        },
        minusBtn(index) {
            if (this.bookNumber[index] > 1) {
                this.bookNumber[index]--; // Decrement book number for the specified index
                this.totalPrice[index] = this.bookNumber[index] * this.cartData[index].price; // Update total price for the specified index
                this.allTotal();
                this.calculateFinalPrice();                
            }
        },
        plusBtn(index) {
            this.bookNumber[index]++; // Increment book number for the specified index
            this.totalPrice[index] = this.bookNumber[index] * this.cartData[index].price; // Update total price for the specified index
            this.allTotal();          
            this.calculateFinalPrice();
        },
        allTotal(){            
             // Calculate the subtotal
            this.subTotal = this.totalPrice.reduce((acc, val) => acc + val, 0);
            
        },
        deleteOrder(cartId){
            let deleteCartId =  {'cart_id' : cartId };
            axios.post("http://localhost:8000/api/deleteOrderCart", deleteCartId)
            .then(response => {
                this.message = response.data.message;
                this.calculateFinalPrice();
                this.getcartData();                
                
            })
           .catch(error => {
           console.error(error);
        }); 
            
        },
        delivery(){
            axios.get("http://localhost:8000/api/delivery").then((response) => {      
                this.deliverData = response.data.delivery;       
                console.log(this.deliverData);
            },
            
            );
        },
        displayDeliveryFee() {
            this.deliverStatus = true;
            const selectedDelivery = this.deliverData.find((deli) => deli.delivery_id === this.selectedDelivery);
            if (selectedDelivery) {
              this.deliveryFee = `${selectedDelivery.delivery_fees}`;
              this.calculateFinalPrice();
              
            } else {
              this.deliveryFee = ""; // If "Delivery Part" is selected, reset the delivery fee display
            }
        },
        calculateFinalPrice(){
            this.orderTotalPrice = (this.subTotal*1)+(this.deliveryFee*1);
        },
        order(){
            if(this.deliverStatus){
                
                let bookIds = this.cartData.map((item) => item.book_id);
                let orderData = {
                    'user_id' : this.userId,
                    'book_id' : bookIds,
                    'qty' : this.bookNumber,
                    'price' : this.totalPrice,
                    'delivery_id' : this.selectedDelivery,
                    'final_total' : this.orderTotalPrice
                };

                axios.post("http://localhost:8000/api/userOrder", orderData)
                    .then(response => {
                    if(response.data == 'success'){
                       this.goOrder();
                    }                
                })
                .catch(error => {
                console.error(error);
                });             
                

                
            }
            else{
                this.orderMessage = "You need to select delivery place!";
            }
        },
        goHome(){
            this.$router.push({
                name : 'home',               
            })
        },
        goOrder(){
            this.$router.push({
                name : "UserOrder",
                params: {
                    userId : this.userId,
                },
            });
        },
    },   
    mounted () {
        this.userId = this.$route.params.userId;
        this.getcartData();
        this.delivery();
       
              
    }
}
