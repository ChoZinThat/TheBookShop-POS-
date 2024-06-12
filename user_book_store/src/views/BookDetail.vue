<template>

    <main>        

        <!-- Navbar Start -->
    <div class="container-fluid bg-dark mb-30">
        <div class="row px-xl-5">
            
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                    
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <span  class="nav-item nav-link active" @click="goHome()">Home</span>
                            <span  class="nav-item nav-link" @click="goCart()" >My Cart</span>
                            <span href="contact.html" class="nav-item nav-link">Contact</span>
                        </div>                        
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->


   


    <!-- Shop Detail Start -->
    <div class="container-fluid pb-5">
        <div class="row px-xl-5">           
            <img v-bind:src="bookDetail.image" alt="" class="col-lg-5 mb-30">            

            <div class="col-lg-7 h-auto mb-30">
                <div class="h-100 bg-light p-30">
                    <h3>{{ bookDetail.name}}</h3>
                    <div class="d-flex mb-3">                        
                        <small class="pt-1">(99 Reviews)</small>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <p class=" mb-4">Author</p>
                            <p class=" mb-4">Category</p> 
                            <p class=" mb-4">Released Date</p>                           
                        </div>
                        <div class="col-7 ">
                            <p class="font-weight-semi-bold mb-4">:  {{ bookDetail.writer_name}} </p>
                            <p class="font-weight-semi-bold mb-4">:  {{ bookDetail.category_name}} </p>   
                            <p class="font-weight-semi-bold mb-4">:  {{ bookDetail.released_date}} </p>                           
                        </div>
                    </div>
                    <h4 class="font-weight-semi-bold mb-4">{{ bookDetail.price}} MMK</h4>
                    
                    <p class="mb-4">{{ bookDetail.book_description}}</p>
                    <div class="d-flex align-items-center mb-4 pt-2">
                        <div class="input-group quantity mr-3" style="width: 130px;">
                            <div class="input-group-btn">
                                <button class="btn btn-success " @click="minusBtn()" >
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                            <input type="text" class="form-control bg-secondary border-0 text-center" v-model="bookNumber">
                            <div class="input-group-btn">
                                <button class="btn btn-success " @click="plusBtn()">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <button class="btn btn-success px-3" @click="addCart()"><i class="fa fa-shopping-cart mr-1" ></i> Add To
                            Cart</button>
                    </div>
                    <div class="d-flex pt-2">
                        <strong class="text-dark mr-2">Share on:</strong>
                        <div class="d-inline-flex">
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-pinterest"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <!-- Shop Detail End -->


    <!-- Products Start -->
    <div class="container-fluid py-5">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-warning pr-3">You May Also Like</span></h2>
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel related-carousel">
                    
                    <div class="product-item bg-light">
                        <div class="product-img position-relative overflow-hidden" >
                            <img class="img-fluid w-100" src="https://static.vecteezy.com/system/resources/previews/004/473/694/original/hand-drawn-cloud-doodle-style-free-vector.jpg" alt="" style="height:250px">
                            <div class="product-action">
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa-solid fa-circle-info"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <a class="h6 text-decoration-none text-truncate" href=""></a>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                <h5> kyats</h5>
                            </div>
                            <div class="d-flex align-items-center justify-content-center mb-1">
                                <small class="fa fa-star text-warning mr-1"></small>
                                <small class="fa fa-star text-warning mr-1"></small>
                                <small class="fa fa-star text-warning mr-1"></small>
                                <small class="fa fa-star text-warning mr-1"></small>
                                <small class="fa fa-star text-warning mr-1"></small>
                                <small>(99)</small>
                            </div>
                        </div>
                    </div>
                    


                </div>
            </div>
        </div>
    </div>
    <!-- Products End -->

    </main>

 
</template>

<script src="../js/bookDetail.js">
    
</script>

