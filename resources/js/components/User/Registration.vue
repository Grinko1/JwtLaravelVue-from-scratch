<template>
    <div class="mt-3">
        <div class="mb-3">
            <input
                v-model="name"
                type="text"
                class="form-control"
                placeholder="name"
            />
        </div>
        <div class="mb-3">
            <input
                v-model="email"
                type="email"
                class="form-control"
                placeholder="email"
            />
        </div>
        <div class="mb-3">
            <input
                v-model="password"
                type="password"
                class="form-control"
                placeholder="password"
            />
        </div>
        <div class="mb-3">
            <input
                v-model="password_confirmation"
                type="password"
                class="form-control"
                placeholder="confirm password"
            />
        </div>
        <div>
            <input type="submit" @click.prevent="store" class="btn btn-primary" value="Registration" />
        </div>
         <div v-if="error" class="text-danger mt-3">{{error}}</div>
    </div>
</template>
<script>
export default {
    name: "Registration",
    data() {
        return {
            name: null,
            email: null,
            password: null,
            password_confirmation: null,
            error:null
        };
    },
    mounted(){
       
    },
    methods: {
        store() {
            axios
                .post("/api/users", {
                    name: this.name,
                    email: this.email,
                    password: this.password,
                    password_confirmation: this.password_confirmation,
                })
                .then((res) => {
                    localStorage.setItem('access_token', res.data.access_token)
                    this.$router.push({name: 'user.personal'})
                    console.log(res)
                })
                  .catch(error => {
                 this.error = (error.response.data.error)
                 console.log(error.response.data.error)
             });
        },
    },
};
</script>
