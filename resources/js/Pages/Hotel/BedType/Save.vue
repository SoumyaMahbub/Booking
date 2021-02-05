<template>
    <navbar></navbar>
    <div class="pt-5"></div>
    <div class="container">
        <div class="card bg-dark text-white">
            <div class="card-header text-center">
                <h1>Create a New Bed Type</h1>
            </div>
            <div class="card-body">
                <form method="POST" @submit.prevent="save">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input
                            class="form-control"
                            type="text"
                            id="name"
                            v-model="bedProfile.name"
                        />
                    </div>
                    <input
                        type="submit"
                        class="btn btn-outline-success float-right"
                        value="Save"
                    />
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
    props: ["hotel_id"],
    data: function () {
        return {
            bedProfile: {
                name: "",
            }
        };
    },
    mounted() {
        console.log(this.bedProfile);
    },
    methods: {
        save() {
            this.$inertia.post(route("bed_type.store", this.hotel_id), this.bedProfile, {
                preserveScroll: true,
            });
        },
    },
};
</script>