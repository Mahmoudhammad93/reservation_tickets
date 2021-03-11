<template>
    <div id="categories">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Create Categories</h4>
                        <br>
                        <br>
                        <form class="forms-sample" @submit.prevent="submitForm()">
                            <div class="form-group">
                                <label for="name"
                                    >Category Name</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="name"
                                    placeholder="Category Name"
                                    v-model="category.name"
                                />
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
    data(){
        return{
            category:{}
        }
    },
    methods:{
        submitForm(){
            axios.post(`/admin/categories/store`,this.category).then((res) =>{
                Vue.$toast.success(res.data.name+" created successfuly.", {
                    position: "bottom-right"
                })
                .catch((err) => {
                    Vue.$toast.error(err, {
                        position: "bottom-right"
                    });
                });;
            })
        }
    }
}
</script>