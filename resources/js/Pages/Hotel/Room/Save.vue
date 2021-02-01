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
                        <input class="form-control" type="text" id="name" />
                    </div>
                    <div class="form-check">
                        <input
                            class="form-check-input"
                            type="checkbox"
                            value=""
                            id="fan"
                        />
                        <label class="form-check-label" for="fan"> Fan </label>
                    </div>
                    <div class="form-check">
                        <input
                            class="form-check-input"
                            type="checkbox"
                            value=""
                            id="ac"
                        />
                        <label class="form-check-label" for="ac"> AC </label>
                    </div>
                    <div class="form-check">
                        <input
                            class="form-check-input"
                            type="checkbox"
                            value=""
                            id="tv"
                        />
                        <label class="form-check-label" for="tv"> TV </label>
                    </div>

                    <div class="card" style="width: 18rem">
                        <div class="card-body">
                            <h5 class="card-title">Beds</h5>
                            <button @click="addBed">Add bed</button>
                            <div v-for="(bed, idx) in room.beds" :key="idx">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label
                                            class="input-group-text"
                                            for="inputGroupBedType"
                                            >Bed type</label
                                        >
                                    </div>
                                    <select
                                        class="custom-select"
                                        id="inputGroupBedType"
                                        v-model="bed.bed_type_id"
                                    >
                                        <option v-for="bed_type in bed_types" :key="bed_type.id" :value="bed_type.id">{{bed_type.name}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
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
    props: ['bed_types'],
    data: function () {
        return {
            room: {
                has_fan: false,
                has_ac: false,
                has_tv: false,
                beds: []
            }
        };
    },
    methods: {
        addBed() {
            this.room.beds.push({bed_type_id: this.bed_types[0].id });
        },
    },
};
</script>