import axios from "axios"
import { mapGetters } from 'vuex'

export default {
    name : 'HomeView',
    data : () => ({
        userId : '',
        message : '',
        bookLists : {},
        categoryLists : {},
        cartLists : {},
        authorLists: {},
        cartCount : "",
        searchKey : "",
        storageStatus : false,

    }),
    computed: {           
        ...mapGetters(["storageToken","storageUserData"]),            
    },
    methods : {
        getBooks(){
            axios.get("http://localhost:8000/api/books").then((response) => {
                 this.bookLists = response.data.books;             

                
                for(let p=0; p<this.bookLists.length; p++){
                    if(this.bookLists[p].image != null){
                        this.bookLists[p].image = "http://localhost:8000/storage/"+ this.bookLists[p].image;
                    }else{
                        this.bookLists[p].image = "http://localhost:8000/Image/defaultBookCover.png";
                    } 
                }                    
            },
            
            );
        },
        getCategoryList(){
            axios.get("http://localhost:8000/api/getCategoryData").then((response) => {
                this.categoryLists = response.data.category;  
            });         
        },
        getcartData () {
            let data = {'user_id' : this.userId} ;
            axios.post("http://localhost:8000/api/cartData", data)
                 .then(response => {
                 this.cartLists = response.data.cartData;              
                 this.cartCount = this.cartLists.length;
            })
                .catch(error => {
                console.error(error);
        });            
        },
        searchData(id){
           
            this.searchKey = id;
            let key = { key : this.searchKey};

            axios.post("http://localhost:8000/api/userBook",key).then((response) => {
                
                this.bookLists = response.data.books;      
                

               if(this.bookLists.length != 0){
                this.message = "";
                for(let p=0; p<this.bookLists.length; p++){
                    if(this.bookLists[p].image != null){
                        this.bookLists[p].image = "http://localhost:8000/storage/"+ this.bookLists[p].image;
                    }else{
                        this.bookLists[p].image = "http://localhost:8000/Image/defaultBookCover.png";
                    } 
                }
               }
               else{
                   this.message = "There is no book here! We will fill here very soon...";
               }
                                   
           },
           
           );
        },

        searchByAuthor(id){
            
            this.searchKey = id;
            let key = { key : this.searchKey};

            axios.post("http://localhost:8000/api/searchAuthor",key).then((response) => {
                
                this.bookLists = response.data.books;      
                

               if(this.bookLists.length != 0){
                this.message = "";
                for(let p=0; p<this.bookLists.length; p++){
                    if(this.bookLists[p].image != null){
                        this.bookLists[p].image = "http://localhost:8000/storage/"+ this.bookLists[p].image;
                    }else{
                        this.bookLists[p].image = "http://localhost:8000/Image/defaultBookCover.png";
                    } 
                }
               }
               else{
                   this.message = "There is no book here! We will fill here very soon...";
               }
                                   
           },
           
           );
        },
       
        details(id){
            this.$router.push({
                name : "BookDetail",
                params: {
                    bookId : id,
                    userId : this.userId
                },
            });
            
        },
        getAuthorData(){
            axios.get("http://localhost:8000/api/getAuthorData").then((response) => {
                this.authorLists = response.data.author;
                
            }); 
        },
        addCart(bookID){           
            
            this.orderData = { userId : this.userId,
                               bookId : bookID,
                               orderNumber : 1 };

            let data = this.orderData;

            axios.post("http://localhost:8000/api/addToCart", data)
                 .then(response => {
                 this.order_status = response.data.status;

                 if(this.order_status == "success"){
                    this.goCart();
                 }        
            })
                .catch(error => {
                console.error(error);
        });               
            
            
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
        goOrder(){
            this.$router.push({
                name : "UserOrder",
                params: {
                    userId : this.userId,
                },
            });
        },
        goLogout(){
            this.$store.dispatch("setToken", null);            
            this.goLogin();
        },
      
    },
    mounted(){   
      this.userId = this.storageUserData.id;            
      this.getBooks();
      this.getCategoryList();
      this.getAuthorData();
      this.getcartData();
    }
}