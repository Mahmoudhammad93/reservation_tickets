<template>
    <div class="profile">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="title m-0 p-3">Profile</h3>
            </div>
            <div class="card-body">
                <form action="" class="profile_form forms-sample">
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input v-model="user.first_name" type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name">
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input v-model="user.last_name" type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input v-model="user.email" type="email" class="form-control" name="email" id="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input v-model="user.phone" type="number" class="form-control" name="phone" id="phone" placeholder="Phone">
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select class="form-control" v-model="user.gender" name="gender" id="gender" placeholder="Gender">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input v-model="user.address" type="text" class="form-control" name="address" id="address" placeholder="Address">
                    </div>
                    <div class="form-group">
                        <label for="age">Age</label>
                        <input v-model="user.age" type="number" class="form-control" name="age" id="age" placeholder="Age">
                    </div>
                    <div class="form-group">
                        <label for="country">Country</label>
                        <select class="form-control" v-model="user.country" name="country" id="country">
                            <option selected="selected" disabled="disabled" hidden="hidden" value="">Country</option>
                            <option value="eg">Egypt</option>
                            <option>United States of America</option>
                            <option>United Kingdom</option>
                            <option>India</option>
                            <option>Germany</option>
                            <option>Argentina</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nationalty">Nationalty</label>
                        <input v-model="user.nationality" type="text" class="form-control" name="nationalty" id="nationalty" placeholder="Nationalty">
                    </div>
                    <div class="form-group">
                        <label for="cover_letter">Cover Letter</label>
                        <textarea v-model="user.cover_letter" class="form-control" name="cover_letter" id="cover_letter" placeholder="Cover Letter"></textarea>
                    </div>
                    <div class="form-group">
                        <div class="profile_image cover">
                            <label class="label-img" for="cover">
                                <img class="profile-user-img img-fluid" v-if="user.image_cover != null" :src="`${defaultSrc}/${user.image_cover}`" id="resume_cover" />
                                <img class="profile-user-img img-fluid def" v-else :src="`${defaultSrc}/default.jpg`" id="resume_cover" />
                                <span class="before">
                                    <i class="mdi mdi-camera"></i>
                                    Update Cover
                                </span>
                            </label>
                            <input
                                id="cover"
                                ref="cover"
                                class="form-control image"
                                type="file"
                                name="cover"
                                value=""
                                onchange="previewImage(event,'resume_cover')"
                                />
                        </div>
                    </div>
                    <div class="form-group m-0">
                        <button type="submit" @click.prevent="updateUser()" class="btn btn-outline-success btn-block btn-fw">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props:[
        'defaultSrc'
    ],
    data(){
        return{
            user:{}
        }
    },
    created(){
        this.getUser();
    },
    methods:{
        getUser(){
            axios.get(`/admin/user_data`).then((res) => {
                this.user = res.data;
            });
        },
        updateUser(){
            let file = this.$refs.cover.files[0];
            let formData = new FormData();
            formData.append('cover', file)
            formData.append('first_name', this.user.first_name)
            formData.append('last_name', this.user.last_name)
            formData.append('email', this.user.email)
            formData.append('phone', this.user.phone)
            formData.append('gender', this.user.gender)
            formData.append('address', this.user.address)
            formData.append('age', this.user.age)
            formData.append('country', this.user.country)
            formData.append('nationality', this.user.nationality)
            formData.append('cover_letter', this.user.cover_letter)
            axios.post(`/admin/update_user/${this.user.id}`,formData, {"Content-Type": "multipart/form-data"}).then((res) => {
                console.log(res.data)
                Vue.$toast.success('Profile saved.', {
                    position: 'bottom-right',
                })
            })
        }
    }
}
</script>
