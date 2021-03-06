<template>
    <div class="create_user">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Default form</h4>
                        <p class="card-description">
                            Basic form layout
                        </p>
                        <form
                            class="forms-sample"
                            @submit.prevent="submitForm()"
                        >
                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="first_name"
                                    placeholder="First Name"
                                    v-model="user.first_name"
                                />
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="last_name"
                                    placeholder="Last Name"
                                    v-model="user.last_name"
                                />
                            </div>
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input
                                    type="email"
                                    class="form-control"
                                    id="email"
                                    placeholder="Email"
                                    v-model="user.email"
                                />
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input
                                    type="number"
                                    class="form-control"
                                    id="phone"
                                    placeholder="Phone"
                                    v-model="user.phone"
                                />
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="address"
                                    placeholder="Address"
                                    v-model="user.address"
                                />
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input
                                    type="password"
                                    class="form-control"
                                    id="password"
                                    placeholder="Password"
                                    v-model="user.password"
                                />
                            </div>
                            <div class="form-group">
                                <label for="type">Type</label>
                                <select
                                    class="form-control form-control-lg"
                                    id="type"
                                    name="type"
                                    @change="handelType($event)"
                                    v-model="user.type"
                                >
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                </select>
                            </div>
                            <div class="form-group" v-if="show">
                                <div
                                    v-for="permission in user.permissions"
                                    :key="permission.id"
                                >
                                    <permissions
                                        :data="permission"
                                        :user_id="user.id"
                                    ></permissions>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <a :href="`/admin/permissions/${user.id}/add`">Add New Permission</a>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success mr-2">
                                Update
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ["user_data"],
    data() {
        return {
            user: {},
            show: false
        };
    },
    created() {
        console.log(JSON.parse(this.user_data));
        this.user = JSON.parse(this.user_data);
        if (this.user.type == "user") {
            this.show = true;
        } else {
            this.show = false;
        }
        console.log()
    },
    mounted(){
    },
    methods: {
        submitForm() {
            axios
                .post(`/admin/user/${this.user.id}/update`, {
                    user: this.user,
                    permissions: this.user.permissions
                })
                .then(res => {
                    console.log(res.data)
                    Vue.$toast.success("User created successfuly.", {
                        position: "bottom-right"
                    });
                });
        },
        handelType(e) {
            e.target.value == "user" ? (this.show = true) : (this.show = false);
        }
    }
};
</script>
