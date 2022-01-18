<template>
    <div class="mt-3">
        <table class="table w-50">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">fruit name</th>
                    <th scope="col">price</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="fruit in fruits" :key="fruit.id">
                    <th scope="row">{{ fruit.id }}</th>
                    <td>{{ fruit.name }}</td>
                    <td>{{ fruit.price }}p</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
import api from '../../api'
export default {
    name: "Index",
    data() {
        return {
            fruits: null,
           
        };
    },
    mounted() {

        this.getFruits();
    },
    methods: {
        getFruits() {
            api.get("/api/auth/fruits").then((res) => {
                // console.log(res.data.data);
                this.fruits = res.data.data;
            });
        },
       
    },
};
</script>
