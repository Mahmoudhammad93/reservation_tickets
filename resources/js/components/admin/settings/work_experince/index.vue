<template>
    <div class="experince">
        <div class="cv">
            <div class="card card-primary card-outline">
                <div class="card-body">
                    <h4 class="title p-3">
                        Work Experince
                    </h4>
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
                                {{work.company}}
                            </h4>
                        </div>
                        <ul class="list-unstyled m-0 list-arrow">
                            <li>
                                <p>{{work.position}}</p>
                            </li>
                            <li v-if="work.description !== null">
                                <p>{{work.description}}</p>
                            </li>
                            <li>
                                <p class="m-0">
                                    {{work.from}} -- {{(work.currently_work == 1)? 'I\'am currently working in' : work.to}}
                                </p>
                            </li>
                        </ul>
                    </div>
                    <form class="forms-sample" v-if="show" @submit.prevent="addWork(works)">
                        <div class="form-group">
                            <label for="company">Company</label>
                            <input
                                type="text"
                                class="form-control"
                                id="company"
                                name="company"
                                placeholder="Company Name"
                                v-model="works.company"
                            />
                        </div>
                        <div class="form-group">
                            <label for="position">Position</label>
                            <input
                                type="text"
                                class="form-control"
                                id="position"
                                name="position"
                                placeholder="Position Name"
                                v-model="works.position"
                            />
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea
                                class="form-control"
                                id="description"
                                name="description"
                                placeholder="Description"
                                v-model="works.description"
                            ></textarea>
                        </div>
                        <div class="form-group">
                            <label for="from">From</label>
                            <input
                                type="date"
                                class="form-control"
                                id="from"
                                name="from"
                                placeholder="From"
                                v-model="works.from"
                            />
                        </div>
                        <div class="form-group" v-if="!checked">
                            <label for="to">To</label>
                            <input
                                type="date"
                                class="form-control"
                                id="to"
                                name="to"
                                placeholder="To"
                                v-model="works.to"
                            />
                        </div>
                        <div class="form-check form-check-info">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" @change="get_current_job($event)" :checked="checked">
                              Current working in ?
                            <i class="input-helper"></i></label>
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
                        <a href="" @click.prevent="show =! show; addNew()" v-else>+ Add Work</a>
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
            works:[],
            show: false,
            update: false,
            obj_id:null,
            checked: false,
            current_job:false
        }
    },
    created(){

    },
    mounted(){
        this.get_works()
    },
    methods:{
        addWork(obj){
            if (obj.company != null && obj.position != null && obj.from != null){
                axios.post(`/admin/add_work`,{company: obj.company, position: obj.position, description: obj.description, from: obj.from, to: obj.to, current: obj.current}).then((res) => {
                    console.log(res.data)
                    Vue.$toast.success('work Added Successfully.', {})
                    this.works.push(res.data)
                    this.works.company = null;
                    this.works.position = null;
                    this.works.description = null;
                    this.works.from = null;
                    this.works.to = null;
                    this.works.current = null;
                })
            }else{
                Vue.$toast.error('Complete your info.', {})
            }
        },
        get_works(){
            axios.get(`/admin/get_works`).then((res) => {
                this.works = res.data
            })
        },
        removeWork(obj) {
            axios.post(`/admin/delete_work/${obj.id}`).then((res)=>{
                this.works.splice(this.works.indexOf(obj), 1)
                Vue.$toast.success('Work Deleted Successfully.', {})
            })
        },
        editWork(obj) {
            this.show = false
            this.update = true
            this.obj_id = obj.id
            axios.get(`/admin/get_work/${obj.id}`).then((res)=>{
                console.log(res.data)
                this.works.company = res.data.company;
                this.works.position = res.data.position;
                this.works.description = res.data.description;
                this.works.from = res.data.from;
                this.works.to = res.data.to;
                this.works.current = res.data.currently_work;
                (res.data.currently_work == 1)?this.checked = true : this.checked = false;
                this.show = true;
            })
        },
        updateWork(obj_id, obj){
            const object = this.works.find( ({ id }) => id === obj_id );
            console.log(object)
            if (obj.company != null && obj.position != null && obj.from != null){
                axios.post(`/admin/update_work/${object.id}`,{company: obj.company, position: obj.position, description: obj.description, from: obj.from, to: obj.to, current: obj.current}).then((res) => {
                    Vue.$toast.success('work Updated Successfully.', {})
                    object.company = res.data.company
                    object.position = res.data.position
                    object.description = res.data.description
                    object.from = res.data.from
                    object.to = res.data.to
                    object.current = res.data.currently_work
                })
            }else{
                Vue.$toast.error('Complete your info.', {})
            }
        },
        addNew(){
            this.works.company = null;
            this.works.position = null;
            this.works.description = null;
            this.works.from = null;
            this.works.to = null;
            this.works.current = null;
        },
        get_current_job(event) {
            if (event.target.checked == true) {
                this.works.current = 1;
                this.checked = true;
                this.works.to = null;
                this.current_job = false
            } else {
                this.works.current = 0;
                this.checked = false;
                this.current_job = true
            }
        }
    }
}
</script>
