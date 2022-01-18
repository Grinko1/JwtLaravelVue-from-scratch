<template>
       <div class="mt-3 w-25">
        <div class="mb-3">
            <input type="email" v-model="email" class="form-control" placeholder="email" />
        </div>
        <div class="mb-3">
            <input
                type="password"
                v-model="password"
                class="form-control"
                placeholder="password"
            />
        </div>
        <div class="mb-3">
            <input type="submit" @click.prevent="login" class="btn btn-primary" value="Login" />
        </div>
        <div v-if="error" class="text-danger mt-3">{{error}}</div>
     
    </div>
</template>
<script>
export default {
    name:"Login",
    data(){
       return{
            email:null,
        password:null,
        error:null
       }
    },
    methods:{
        login(){
             axios.post('/api/auth/login', {email:this.email, password:this.password})
             .then(res=>{
                 console.log(res.data.access_token)
                 localStorage.setItem('access_token' , res.data.access_token )
                 this.$router.push({name:'user.personal'})
             })
             .catch(error => {
                 this.error = (error.response.data.error)
                 console.log(error.response.data.error)
             })
        }
       
    }
}
</script>