<template>
    <main>
        <!-- Navbar Start -->
    <div class="container-fluid bg-success mb-30">
        <div class="row px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <h4>,</h4>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-success navbar-dark py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <span class="h1 text-uppercase text-dark bg-light px-2">Knowledge</span>
                        <span class="h1 text-uppercase text-light bg-primary px-2 ml-n1">Tree</span>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <span @click="goHome()" class="nav-item nav-link active">Home</span>
                            <span @click="goCart()" class="nav-item nav-link">My Cart</span>
                            <span @click="goContact()" class="nav-item nav-link">Contact</span>                            
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

    

    <div class="row p-5" v-if="orderCount == 0">
        <div class="card text-center">
            <div class="card-header">
                Order
            </div>
            <div class="card-body">
                <h5 class="card-title">Your Order Will Appear Here...</h5>
                 <p class="card-text">You haven't order anything yet.Enjoy shopping with our book shop. Hope you see here soon...</p>       
            </div>
            <div class="card-footer text-muted">
                <i class="fa-solid fa-book-bookmark mx-3"></i><i class="fa-solid fa-book-bookmark mx-3"></i><i class="fa-solid fa-book-bookmark mx-3"></i>
            </div>
        </div>
    </div>
    
    
         <div class="row p-5" v-if="groupedOrders.length != 0">       

        <div class="col-6 " v-for="(group, index) in groupedOrders" :key="index" >
            <div class="card m-3" >
                <div class="card-body">
                     
                    <hr>                  
                    <div class="row p-3 shadow-lg text-center">
                        <tr class="row">
                            <th class="col">Book Name</th>
                            <th class="col-2">Price</th>
                            <th class="col-2">Qty</th>
                            <th class="col-3">Total Price</th>
                        </tr>
                        <tr v-for="(order, innerIndex) in group" :key="innerIndex" class="row mt-3">
                            <td class="col">{{ order.name }}</td>
                            <td class="col-2">{{ order.price }}</td>
                            <td class="col-2">{{ order.qty }}</td>
                            <td class="col-3">{{ order.total_price }}</td>
                        </tr>      

                        <hr style="border-top: 2px dashed green;" class="mt-3 row">  

                        <tr class="row ">
                            <td class="col text-left fw-3">
                                <i class="fa fa-truck text-success mx-2" aria-hidden="true"></i>{{group[0].city_name}}
                            </td>
                            <td class="col-3 ">
                                {{group[0].delivery_fees}}
                            </td>
                        </tr>


                        <hr style="border-top: 2px dashed green;" class="mt-1 row"> 
                        <tr class="row mt-1">
                            <th class="col text-left">
                                <i class="fa fa-money text-success mx-2" aria-hidden="true"></i>Total Price
                            </th>
                            <td class="col-3">{{ calculateTotalPrice(group,group[0].delivery_fees)}}</td>
                        </tr>

                    </div>

                    <p class="card-footer fw-5 text-center" ><i class="fa fa-barcode me-2" aria-hidden="true"></i> <span class="text-success">{{ group[0].order_code }}</span></p> 
                    <div class="">
                        
                        <!-- <tr>
                            <th>Delivery</th>
                            <td>{{totalPirces[index]}}</td>
                        </tr> -->
                    </div>
                </div>
            </div>
        </div>

      
   
      <!-- <div class="col-6" >
        <div class="card m-3">
          <div class="card-body">
            <h5 class="card-title">Group </h5>
            <div >
              <h6 class="card-subtitle mb-2 text-muted"></h6>
              <p class="card-text"></p>
              <p class="card-text"></p>
            </div>
            <a href="#" class="card-link">Card link</a>
            <a href="#" class="card-link">Another link</a>
          </div>
        </div>
      </div> -->
      
    </div>
    
      
    </main>
</template>

<script src="../js/userOrder.js">

</script>


