<template>
    <navbar></navbar>
    <div class="pt-5"></div>
    <div class="container">
        <div class="card bg-dark text-white">
            <div class="card-header text-center">
                <h1>Create a New Room Type</h1>
            </div>
            <div class="card-body">
                <form method="POST" @submit.prevent="save">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control" type="text" id="name" v-model="name"/>
                    </div>
                    <input type="submit" class="btn btn-outline-success float-right" value="Save">
                </form>
            </div>
        </div>
    </div>
</template>
<script>
import Navbar from "./../../Layouts/Navbar.vue";
export default {
    components: {
        Navbar,
    },
    data: function (){
        return {
            name: "",
        }
    },
    props: ['hotel_id'],
    methods: {
        save() {
            this.$inertia.post(route("room_type.store", this.hotel_id), {name: this.name}, {
                preserveScroll: true,
            });
        },
    }
};
</script>