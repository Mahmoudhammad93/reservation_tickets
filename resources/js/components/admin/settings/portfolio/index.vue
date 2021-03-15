<template>
    <div id="portfolio">
        <div class="card card-primary card-outline">
            <div class="card-body">
                <h4 class="title m-0 p-3">Portfolio</h4>
                <div class="edu_card works mb-2" v-for="work in works" :key="work.id">
                    <div class="options">
                        <span class="edit" @click="editWork(work)">
                            <i class="mdi mdi-pencil"></i> Edit
                        </span>
                        <span class="delete" @click="removeWork(work)">
                            <i class="mdi mdi-delete"></i> Delete
                        </span>
                    </div>
                    <div class="edu_title">
                        <h4>
                            {{work.name}}
                        </h4>
                    </div>
                    <ul class="list-unstyled m-0 list-arrow">
                        <li>
                            <p>
                                <a :href="work.link" target="_blank">{{work.link}}</a>
                            </p>
                        </li>
                        <li>
                            <p>{{work.description}}</p>
                        </li>
                        <li>
                            <p class="image">
                                <img :src="`${public_path}/${work.image}`" alt="">
                            </p>
                        </li>
                    </ul>
                </div>
                <form class="forms-sample" v-if="show" @submit.prevent="addWork(works)">
                    <div class="form-group mb-1">
                        <label for="name">Work</label>
                        <input
                            type="text"
                            class="form-control"
                            id="name"
                            name="name"
                            placeholder="Type Your Work"
                            v-model="works.name"
                        />
                    </div>
                    <div class="form-group mb-1">
                        <label for="link">Link</label>
                        <input
                            type="url"
                            class="form-control"
                            id="link"
                            name="link"
                            placeholder="Put Work Link"
                            v-model="works.link"
                        />
                    </div>
                    <div class="form-group">
                        <label for="description">Work Description</label>
                        <textarea v-model="works.description" class="form-control" name="description" id="description" placeholder="work Description"></textarea>
                    </div>
                    <div class="multi-input">
                        <div class="form-group">
                            <div class="profile_image cover">
                                <label class="label-img" for="cover">
                                    <img class="profile-user-img img-fluid def" v-if="works.image != null" :src="`${public_path}/${works.image}`" id="work_image" />
                                    <img class="profile-user-img img-fluid def" v-else :src="`${public_path}/default.png`" id="work_image" />
                                    <span class="before">
                                        <i class="mdi mdi-camera"></i>
                                        work Image
                                    </span>
                                </label>
                                <input
                                    id="cover"
                                    ref="work_img"
                                    class="form-control image"
                                    type="file"
                                    name="percent"
                                    onchange="previewImage(event,'work_image')"
                                    />
                            </div>
                        </div>
                    </div>
                    <button
                        @click.prevent="updateWork(obj_id, works)"
                        v-if="update"
                        class="btn btn-success btn-block mr-2"
                    >
                        Update
                    </button>
                    <button
                        type="submit"
                        class="btn btn-primary btn-block mr-2"
                        v-else
                    >
                        Save
                    </button>
                </form>
                <div class="mt-4">
                    <a href="" @click.prevent="show =! show; update =! update" v-if="show">- Cancel</a>
                    <a href="" @click.prevent="show =! show; addNew()" v-else>+ Add work</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props:[
        'public_path'
    ],
    data(){
        return{
            works:[],
            show: false,
            update: false,
            obj_id:null,
            file:{},
            user:{}
        }
    },
    created(){

    },
    mounted(){
        this.get_works()
    },
    methods:{
        addWork(obj){
            this.file = this.$refs.work_img.files[0];
            let formData = new FormData();
            formData.append('name', obj.name);
            formData.append('link', obj.link);
            formData.append('description', obj.description);
            formData.append('file', this.file);
            console.log(formData)
            axios.post(`/admin/add_project`,formData)
                .then((res) => {
                    console.log(res.data)
                    Vue.$toast.success('Work Added Successfully.', {})
                    this.works.push(res.data)
                    this.works.name = null;
                    this.works.link = null;
                    this.works.description = null;
                })
                .catch((err) =>{
                    Vue.$toast.error(err, {})
                })
        },
        get_works(){
            axios.get(`/admin/get_projects`).then((res) => {
                this.works = res.data
            })
        },
        removeWork(obj) {
            axios.post(`/admin/delete_project/${obj.id}`).then((res)=>{
                this.works.splice(this.works.indexOf(obj), 1)
                Vue.$toast.success('work Deleted Successfully.', {})
            })
        },
        editWork(obj) {
            this.show = false
            this.update = true
            this.obj_id = obj.id
            axios.get(`/admin/get_project/${obj.id}`).then((res)=>{
                console.log(res.data)
                this.works.name = res.data.name;
                this.works.description = res.data.description;
                this.works.link = res.data.link;
                this.works.image = res.data.image;
                this.show = true
            })
        },
        updateWork(obj_id, obj){
            const object = this.works.find( ({ id }) => id === obj_id );
            this.file = this.$refs.work_img.files[0];
            let formData = new FormData();
            formData.append('name', obj.name);
            formData.append('link', obj.link);
            formData.append('description', obj.description);
            formData.append('file', this.file);
            axios.post(`/admin/update_project/${object.id}`,formData).then((res) => {
                console.log(res.data)
                Vue.$toast.success('work Updated Successfully.', {})
                object.name = res.data.name
                object.link = res.data.link
                object.image = res.data.image
                object.description = res.data.description
            }).catch((err) =>{
                Vue.$toast.error(err, {})
            })
        },
        addNew(){
            this.works.name = null;
            this.works.link = null;
            this.works.description = null
            this.works.image = null
        }
    }
}
</script>