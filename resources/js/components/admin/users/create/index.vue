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
                        <form class="forms-sample" @submit.prevent="submitForm(permissions)">
                            <div class="form-group">
                                <label for="first_name"
                                    >First Name</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="first_name"
                                    placeholder="First Name"
                                    v-model="user.first_name"
                                />
                            </div>
                            <div class="form-group">
                                <label for="last_name"
                                    >Last Name</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="last_name"
                                    placeholder="Last Name"
                                    v-model="user.last_name"
                                />
                            </div>
                            <div class="form-group">
                                <label for="email"
                                    >Email address</label
                                >
                                <input
                                    type="email"
                                    class="form-control"
                                    id="email"
                                    placeholder="Email"
                                    v-model="user.email"
                                />
                            </div>
                            <div class="form-group">
                                <label for="phone"
                                    >Phone</label
                                >
                                <input
                                    type="number"
                                    class="form-control"
                                    id="phone"
                                    placeholder="Phone"
                                    v-model="user.phone"
                                />
                            </div>
                            <div class="form-group">
                                <label for="address"
                                    >Address</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="address"
                                    placeholder="Address"
                                    v-model="user.address"
                                />
                            </div>
                            <div class="form-group">
                                <label for="password"
                                    >Password</label
                                >
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
                                <select class="form-control form-control-lg" id="type" name="type" @change="handelType($event)" v-model="user.type">
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                </select>
                            </div>
                            <div class="form-group" v-if="permission">
                                <div v-for="permission in permissions" :key="permission.id">
                                    <permissions :data="permission"></permissions>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">
                                Save
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
    props:[],
    data(){
        return{
            user:{},
            permission:false,
            permissions:[
                {name: 'Teckets', create: 0, edit: 0, delete: 0, open: 0, close: 0},
                {name: 'Products', create: 0, edit: 0, delete: 0, open: 0, close: 0},
                {name: 'Categories', create: 0, edit: 0, delete: 0, open: 0, close: 0},
                {name: 'Tasks', create: 0, edit: 0, delete: 0, open: 0, close: 0}
            ]
        }
    },
    methods:{
        submitForm(permissions){
            axios.post('/admin/users/store',{user: this.user, permissions: permissions}).then((res) => {
                console.log(res.data)
                Vue.$toast.success('User created successfuly.', {
                    position: 'bottom-right',
                })
                this.user.first_name = null
                this.user.last_name = null
                this.user.email = null
                this.user.phone = null
                this.user.address = null
                this.user.type = null
                this.user.password = null
            })

        },
        handelType(e){
            (e.target.value == 'user')? this.permission = true : this.permission = false
        },
        createPermission(e,name){
            (e.target.checked)?this.permissions.create = 1:this.permissions.create = 0;
            console.log(this.permissions.create)
        },
        editPermission(e,name){
            (e.target.checked)?this.permissions.edit = 1:this.permissions.edit = 0;
            console.log(this.permissions.edit)
        },
        deletePermission(e,name){
            (e.target.checked)?this.permissions.delete = 1:this.permissions.delete = 0;
            console.log(this.permissions.delete)
        },
        closePermission(e,name){
            (e.target.checked)?this.permissions.close = 1:this.permissions.close = 0;
            console.log(this.permissions.close)
        },
        openPermission(e,name){
            (e.target.checked)?this.permissions.open = 1:this.permissions.open = 0;
            console.log(this.permissions.open)
        }
    }
}
</script>
