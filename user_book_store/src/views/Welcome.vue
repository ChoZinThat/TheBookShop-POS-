<template>
    <div class="row">
        <div class="col-sm-4 offset-3">
            <div class="card">
                <img class="card-img" style="height:180px" src="https://www.shutterstock.com/shutterstock/photos/2290492039/display_1500/stock-vector-children-reading-book-at-nature-cartoon-vector-2290492039.jpg" alt="">
            <div class="card-body">                
                <p class="card-text">A Store that you can find every book you want ....</p>
                <button class="btn btn-primary" @click="goLogin()">Login</button>
                <p class="text-muted" @click="goSignUp()">Already have an account <span class="text-primary">sing up</span> here.</p>
            </div>
            </div>
        </div>
        
    </div>
</template>

<script>
    export default {
        name : 'welocmeUser',
        methods: {
            goLogin() {
                this.$router.push({
                name : "loginPage",                
            });
            },
            goSignUp() {
                this.$router.push({
                name : "registerPage",               
            });
            }
        }
    }
</script>

<style lang="stylus" scoped>

</style>
