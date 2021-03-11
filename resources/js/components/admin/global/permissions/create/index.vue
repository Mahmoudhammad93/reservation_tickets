<template>
    <div class="create_user">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Create Permission</h4>
                        <p class="card-description">
                            Basic form layout
                        </p>
                        <form class="forms-sample" @submit.prevent="addPermission()">
                            <div class="form-group">
                                <label for="user">Permission Name</label>
                                <select class="form-control form-control-lg" id="user" v-model="permission.id">
                                    <option v-for="category in JSON.parse(categories)" :key="category.id" :value="category.id">{{category.name}}</option>
                                </select>
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
    props:[
        'user_id',
        'categories'
    ],
    data(){
        return{
            permission:{}
        }
    },
    methods:{
        addPermission(){
            axios.post(`/admin/permissions/store`,{permission:this.permission, user_id:this.user_id})
            .then((res) => {
                console.log(res.data)
                Vue.$toast.success("Permission created successfuly.", {
                    position: "bottom-right"
                });
            })
            .catch((err) => {
                    Vue.$toast.error(err, {
                        position: "bottom-right"
                    });
                });
        }
    }
}
</script>
