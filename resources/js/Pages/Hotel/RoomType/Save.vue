<template>
    <navbar></navbar>
    <div class="container pt-5">
        <div class="alert alert-danger" role="alert">
            {{$page.props.errors}}
        </div>
        <div class="card bg-dark text-white">
            <div class="card-header text-center">
                <h1 v-if="room_type">Edit a Room Type</h1>
                <h1 v-else>Create a New Room Type</h1>
            </div>
            <div class="card-body">
                <form method="POST" @submit.prevent="save" autocomplete="off">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input
                            class="form-control"
                            type="text"
                            id="name"
                            v-model="editedRoomType.name"
                        />
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                        </div>
                        <input
                            type="number"
                            class="form-control"
                            placeholder="Price"
                            v-model.number="editedRoomType.price"
                            pattern="[0-9]{1,5}\.[0-9]{2}"
                            min="10"
                            max="99999999999"
                        />
                    </div>

                    <div class="form-check">
                        <input
                            class="form-check-input"
                            type="checkbox"
                            id="defaultCheck1"
                            v-model="editedRoomType.has_fan"
                            true-value="1"
                            false-value="0"
                        />
                        <label class="form-check-label" for="defaultCheck1">
                            Has Fan
                        </label>
                    </div>
                    <div class="form-check">
                        <input
                            class="form-check-input"
                            type="checkbox"
                            id="defaultCheck2"
                            v-model="editedRoomType.has_ac"
                            true-value="1"
                            false-value="0"
                        />
                        <label class="form-check-label" for="defaultCheck2">
                            Has AC
                        </label>
                    </div>
                    <div class="form-check">
                        <input
                            class="form-check-input"
                            type="checkbox"
                            id="defaultCheck3"
                            v-model="editedRoomType.has_tv"
                            true-value="1"
                            false-value="0"
                        />
                        <label class="form-check-label" for="defaultCheck3">
                            Has TV
                        </label>
                    </div>
                    <div class="form-group mt-2">
                        <input
                            class="btn btn-outline-success"
                            type="button"
                            value="+ Add Bed"
                            @click="addBed"
                        />
                    </div>
                    <div v-for="bed in beds" v-bind:key="bed.id">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label
                                    class="input-group-text"
                                    for="inputGroupSelect01"
                                    >Choose Bed Type</label
                                >
                            </div>
                            <select
                                class="custom-select"
                                id="inputGroupSelect01"
                                v-model="bed.bed_type_id"
                            >
                                <option
                                    v-for="bed_type in $page.props.hotel
                                        .bed_types"
                                    :key="bed_type.id"
                                    v-bind:value="bed_type.id"
                                >
                                    {{ bed_type.name }}
                                </option>
                            </select>
                            <div
                                class="btn btn-outline-danger ml-2"
                                @click="destroyBed(bed)"
                            >
                                Delete
                            </div>
                        </div>
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
    props: ["hotel", "room_type"],
    data: function () {
        return {
            editedRoomType: {
                name: "",
                price: "10.00",
                has_fan: false,
                has_ac: false,
                has_tv: false,
            },
            beds: [],
            deletedBedsId: [],
        };
    },
    mounted() {
        if (this.room_type) {
            this.editedRoomType = this.room_type;
            this.beds = this.room_type.beds;
        }
    },
    methods: {
        addBed() {
            this.beds.push({
                id: 0,
                room_type_id: 0,
                bed_type_id: this.hotel.bed_types[0].id,
            });
        },
        save() {
            this.$inertia.post(
                route("room_type.store", this.hotel.id),
                {
                    room_type: this.editedRoomType,
                    beds: this.beds,
                    deletedBedsId: this.deletedBedsId,
                },
                {
                    preserveScroll: true,
                }
            );
             this.$inertia.delete(route("hotel.destroy", this.deletedBedsId));
        },
        destroyBed(bed) {
            for (var i = 0; i < this.beds.length; i++) {
                if (this.beds[i] === bed) {
                    this.beds.splice(i, 1);
                    this.deletedBedsId.push(bed.id);
                }
            }
        },
    },
};
</script>