<template>
    <div class="row">
        <div class="col-6 offset-3">
            
            <div class="login-form bg-white p-5 m-3"> 
                <div class="alert alert-warning alert-dismissible fade show my-2" role="alert" v-if="userStatus">
                    <strong>Register Failed!</strong> You should check in on some of those fields below.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                 </div>

                    <div class="form-group mb-3">
                        <label class="form-label">Username</label>
                        <input class="form-control " type="text" name="name" v-model="userData.name" placeholder="Username">
                        
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Email Address</label>
                        <input class="form-control  " type="email" name="email" v-model="userData.email" placeholder="Email">
                    
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Password</label>
                        <input class="form-control " type="password" name="password" v-model="userData.password" placeholder="Password">
                        
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Confirm Password</label>
                        <input class="form-control " type="password" name="password_confirmation" v-model="userData.confirmPassword" placeholder="Confirm Password">
                        
                    </div>

                    <button class="btn btn-primary mb-3" @click="userRegister()">register</button>

                <div class="register-link">
                    <p>
                        Already have account?
                        <span class="text-primary" @click="signIn()">Sign In</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
    
</template>

<script src="../js/registerPage.js"></script>
