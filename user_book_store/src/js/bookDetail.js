
import axios from "axios";
export default {
    name : 'BookDetail',
    data () {
        return {
            bookID : "",
            bookDetail : [],
            bookNumber : 1,
            userId : "",      
            order_status : "",
            cartData2 : [],
            orderData : []
        }
    },               
   
    methods: {
        detail (key) {
            let id =  { book_id : key };
            axios.post("http://localhost:8000/api/bookDetail",id).then((response)=>{
                this.bookDetail = response.data.searchData;              
                
                    if(this.bookDetail.image != null){
                        this.bookDetail.image = "http://localhost:8000/storage/"+ this.bookDetail.image;
                    }else{
                        this.bookDetail.image = "http://localhost:8000/Image/defaultBookCover.png";
                    }            
                });
        },
        addCart(){

            
            
            this.orderData = { userId : this.userId ,
                               bookId : this.bookID,
                               orderNumber : this.bookNumber };

            let data = this.orderData;

            axios.post("http://localhost:8000/api/addToCart", data)
                 .then(response => {
                 this.order_status = response.data.status;

                 if(this.order_status == "success"){
                    this.$router.push({
                        name : "BookCart",
                        params: {
                            userId : this.userId,
                        },
                    });
                 }        
            })
                .catch(error => {
                console.error(error);
        });                
            
            
        },
        plusBtn(){
            if(this.bookNumber != 0){
                this.bookNumber  = this.bookNumber + 1;
            }            
        },
        minusBtn(){
            if(this.bookNumber > 1 ){
                this.bookNumber = this.bookNumber - 1;
            }
            else{
                this.bookNumber = 1;
            }            
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
    },
    mounted (){
        this.userId = this.$route.params.userId;
        this.bookID = this.$route.params.bookId;
        this.detail(this.bookID);        
    }
}

