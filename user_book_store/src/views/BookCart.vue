<template>
    <main>

        <!-- Navbar Start -->
    <div class="container-fluid bg-success mb-30">
        <div class="row px-xl-5">            
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-success navbar-dark py-3 py-lg-0 px-0">
                    
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a  class="nav-item nav-link active" @click="goHome()">Home</a>                            
                            <a  class="nav-item nav-link">Contact</a>
                        </div>
                        <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                            <span class="btn px-0">
                                <i class="fa-solid fa-clipboard-list text-warning"></i>
                                <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">0</span>
                            </span>                           
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->   


    <!-- Cart Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Products</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        <tr v-for="(cart,index) in cartData" :key="index">
                            <td class="align-middle"><img src="" alt="" style="width: 50px;">{{cart.name}}</td>
                            <td class="align-middle">{{cart.price}}</td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary " @click="minusBtn(index)">
                                        <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" class="form-control form-control-sm bg-secondary border-0 text-center" v-model="bookNumber[index]">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary " @click="plusBtn(index)">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle">{{totalPrice[index]}}</td>
                            <td class="align-middle" @click="deleteOrder(cart.cart_id)"><button class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button></td>
                        </tr>                        
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Cart Summary</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Subtotal</h6>
                            <h6>{{subTotal}}</h6>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Choose deliver part</h6>
                            <h6 class="font-weight-medium">
                                    <select v-model="selectedDelivery" @change="displayDeliveryFee()" class="form-control my-1">                                        
                                        <option v-for="deli in deliverData" :key="deli.delivery_id" :value="deli.delivery_id">{{ deli.city_name }}</option>
                                    </select>
                             </h6>                       
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Delivery Fee </h6>
                            <h6 class="font-weight-medium">{{ deliveryFee }}</h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total</h5>
                            <h5>{{orderTotalPrice}} kyats</h5>
                        </div>
                        <div class="d-flex justify-content-between mt-2">
                            <p class="text-danger">{{orderMessage}}</p>                            
                        </div>
                        <p class="btn btn-block btn-outline-success font-weight-bold my-3 py-3" @click="order()">Order Now</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->

    </main>
</template>

<script src="../js/cart.js">
    
</script>



