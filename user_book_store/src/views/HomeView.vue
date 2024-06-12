<template>


    <!-- Navbar Start -->
    <div class="container-fluid bg-success mb-30">
        <div class="row px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <div class="btn-group mt-2">
                    <button class="btn btn-outline-light btn-lg" type="button">
                        Authors
                    </button>
                    <button type="button" class="btn btn-lg btn-warning dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="visually-hidden">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu" >
                        <li href="" class="dropdown-item text-success" v-for="(a, index) in authorLists" :key="index" @click="searchByAuthor(a.writer_id)">{{a.writer_name}}</li>                        
                    </ul>
                </div>
                    
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-success navbar-dark py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <span class="h1 text-uppercase text-dark bg-light px-2">Multi</span>
                        <span class="h1 text-uppercase text-light bg-primary px-2 ml-n1">Shop</span>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <span @click="goHome()" class="nav-item nav-link active">Home</span>
                            <span @click="goCart()" class="nav-item nav-link">My Cart</span>
                            <span @click="goContact()" class="nav-item nav-link">Contact</span>
                            <span @click="goOrder()" class="nav-item nav-link">Order</span>
                        </div>
                        <div class="navbar-nav ml-auto py-0 d-none d-lg-block">  
                            <span @click="goLogout()" class="btn px-0 ml-3 text-white" title="logout">
                                <i class="fa-solid fa-right-from-bracket"></i>                                
                            </span>                          
                            <span @click="goCart()" class="btn px-0 ml-3">
                                <i class="fas fa-shopping-cart text-primary"></i>
                                <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">{{cartCount}}</span>
                            </span>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->   


    <!-- Shop Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            <div class="col-lg-3 col-md-4">                
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="text-white pr-3">Filter by category</span></h5>
                <div class="bg-secondary p-2 mb-30">                    
                    <p v-for="(category,index) in categoryLists" :key="index" class="btn d-block">
                        <button class="btn btn-block btn-outline-success" @click="searchData(category.category_id)">{{category.category_name}}</button>
                    </p>
                </div>                               
                
            </div>
            <!-- Shop Sidebar End -->


            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-8">
                <div class="row pb-3">
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <p>...</p>
                            <div class="ml-2">
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                       <span class="text-muted">Sort by Date</span> 
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item text-warning" @click="searchData('latest')">Latest to Newest</a></li>
                                        <li><a class="dropdown-item text-warning" @click="searchData('newest')">Newest to Latest</a></li>                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class=" text-center text-white"><h4>{{message}}</h4></div>

                     <div class="col-lg-4 col-md-6 col-sm-6 pb-1 " v-for="(book,index) in bookLists" :key="index">
                        <div class="product-item bg-success mb-4">
                            <div class="product-img position-relative overflow-hidden">
                                <img class="img-fluid w-100 img-thumbnail" v-bind:src="book.image" alt="">
                                <div class="product-action">
                                    <a class="btn btn-outline-success btn-square" @click="addCart(book.book_id)"><i class="fa fa-shopping-cart"></i></a>
                                    <a class="btn btn-outline-success btn-square"  @click="details(book.book_id)"><i class="fa-solid fa-circle-info"></i></a>                                    
                                </div>
                            </div>
                            <div class="text-center py-4">
                                <a class="h6 text-decoration-none text-white" href="">{{book.name}}</a>
                                <div class="d-flex align-items-center justify-content-center mt-2">
                                    <h5 class="text-white">{{book.price}}</h5><h6 class="text-white ml-2">Kyats</h6>
                                </div>
                                <div class="d-flex align-items-center justify-content-center mb-1">
                                    <!-- <small class="fa fa-star text-primary mr-1"></small>-->
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->

</template>

<script src="../js/homePage.js">
  
</script>

