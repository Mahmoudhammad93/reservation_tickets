<template>
    <div id="create_product">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" @submit.prevent="submitForm($event)">
                            <div class="form-group">
                                <label for="name"
                                    >Name <span class="asterisk">*</span></label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="name"
                                    placeholder="Name"
                                    v-model="product.name"
                                />
                            </div>
                            <div class="form-group">
                                <label for="email"
                                    >Email <span class="asterisk">*</span></label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="email"
                                    placeholder="Email"
                                    v-model="product.email"
                                />
                            </div>
                            <div class="form-group">
                                <label for="product_name"
                                    >Product Name <span class="asterisk">*</span></label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="product_name"
                                    placeholder="Product Name"
                                    v-model="product.product_name"
                                />
                            </div>
                            <div class="form-group" v-if="show">
                                <label for="product_cr"
                                    >Product CR <span> (Optional)</span></label
                                >
                                <input
                                    type="file"
                                    class="form-control"
                                    id="product_cr"
                                    placeholder="Product CR"
                                    ref="cr"
                                    @change="onChange($event)"
                                />
                            </div>
                            <div class="form-group">
                                <a href="" v-if="!show" @click.prevent="show = true">
                                    + Add CR
                                </a>
                                <a href="" v-else @click.prevent="show = false">
                                    - Cancel
                                </a>
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
import axios from "axios";
export default {
    props:[],
    data(){
        return{
            product:{},
            show: false,
            file: null
        }
    },
    methods:{
        submitForm(){
            if(this.file != null){
                let formData = new FormData();
                formData.append('name', this.product.name)
                formData.append('email', this.product.email)
                formData.append('product_name', this.product.product_name)
                formData.append('product_cr', this.file)
                const fileExtention = this.file.name.split('.').pop();
                if(fileExtention === 'pdf'){
                    axios.post('/admin/product/store', formData)
                    .then((res) => {
                        Vue.$toast.success(`${res.data.brand_name} Saved successfully.`, {})
                        this.sendEmail(this.product)
                        this.product.name = ''
                        this.product.email = ''
                        this.product.product_name = ''
                    }).catch((err) => {
                        Vue.$toast.error(err, {})
                    })
                }else{
                    Vue.$toast.error(`The File Extention Must Be PDF.`, {})
                }
            }else{
                axios.post('/admin/product/store', this.product)
                .then((res) => {
                    Vue.$toast.success(`${res.data.brand_name} Saved successfully.`, {})
                    this.sendEmail(this.product)
                    this.product.name = ''
                    this.product.email = ''
                    this.product.product_name = ''
                }).catch((err) => {
                    Vue.$toast.error(err, {})
                })
            }
        },
        sendEmail(obj){
            axios.post(`/admin/sendAdminEmail`, obj)
            .then((res) => {
                console.log(res.data)
                this.sendUserMail(obj)
            })
        },
        sendUserMail(obj){
            axios.post(`/admin/sendUserEmail`, obj)
            .then((res) => {
                console.log(res.data)
            })
        },
        onChange(event){
            this.file = event.target.files[0]
            console.log(file)
        }
    }
}
</script>

<style lang="scss" scoped>
.form-group{
    label{
        span.asterisk{
            color: red
        }
    }
}
</style>
