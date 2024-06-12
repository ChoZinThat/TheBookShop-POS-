<template>
     <div class="row mt-4">
        <div class="col-6 offset-3">
            <div class="login-form bg-white p-5 m-3">
                                                 
                    <div class="alert alert-danger alert-dismissible fade show" role="alert" v-if="userStatus">
                        <strong>Login Failed!</strong> You should check in on some of those fields below.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label">Email Address</label>
                        <input class="form-control  " type="email" name="email" v-model="userData.email" placeholder="Email">
                    
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Password</label>
                        <input class="form-control " type="password" name="password" v-model="userData.password" placeholder="Password">
                        
                    </div>
                    

                    <button class="btn btn-primary mb-3" @click="loginUser()">Login</button>

                
                <div>
                    <p>
                        Don't have an account 
                        <span class="text-primary" @click="signUp">Sign Up Here...</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>

<script src="../js/loginPage.js">

</script>



