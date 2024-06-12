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
                            <a  class="nav-item nav-link" @click="goCart()">Cart</a>
                            <a  class="nav-item nav-link" @click="goLogout()">Logout</a>
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

        <!-- Contact Start -->
        <div class="container-fluid">
            <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-dark text-white pr-3">Contact Us</span></h2>
            <div class="row px-xl-5">
                <div class="col-lg-7 mb-5">
                    <div class="contact-form bg-light p-30">

                        <div id="success"></div>
                       
                            
                            <input type="hidden" name="id" value="" >

                            <div class="control-group">
                                <input type="text" class="form-control" name="name" placeholder="Your Name"
                                    v-model="userInfo.name" data-validation-required-message="Please enter your name" disabled/>
                                <p class="help-block text-danger">
                                </p>
                            </div>

                            <div class="control-group">
                                <input type="email" class="form-control" name="email" placeholder="Your Email"
                                v-model="userInfo.email" data-validation-required-message="Please enter your email" disabled/>
                                <p class="help-block text-danger">
                                </p>
                            </div>

                            <div class="control-group">
                                <input type="text" class="form-control  " name="subject" placeholder="Subject"
                                    data-validation-required-message="Please enter a subject" v-model='subject'/>                            
                            </div>

                            <div class="control-group">
                                <textarea class="form-control" rows="8" name="message" placeholder="Message"
                                    data-validation-required-message="Please enter your message" v-model="message">  </textarea>
                                <!-- <p class="help-block text-danger">
                                    @error('message')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </p> -->
                            </div>

                            <div @click="sendMessage()">
                                <button class="btn btn-warning py-2 px-4" >Send
                                    Message</button>
                            </div>

                        
                    </div>
                </div>
                <div class="col-lg-5 mb-5">
                    <div class="bg-light p-30 mb-3">
                        <p class="mb-2"><i class="fa fa-map-marker-alt text-warning mr-3"></i>123 Street, New York, USA</p>
                        <p class="mb-2"><i class="fa fa-envelope text-warning mr-3"></i>info@example.com</p>
                        <p class="mb-2"><i class="fa fa-phone-alt text-warning mr-3"></i>+012 345 67890</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->
    </main>
</template>

<script src = "../js/userMessage.js">
    
</script>

<style lang="stylus" scoped>

</style>
