<template>
    <div class="school">
        <div class="card card-outline card-primary">
            <div class="card-body">
                <h4 class="title p-3">
                    Add Your School
                </h4>
                <div class="edu_card schools mb-2" v-for="school in schools" :key="school.id">
                    <div class="options">
                        <span class="edit" @click="editSchool(school)">
                            <i class="mdi mdi-pencil"></i> Edit
                        </span>
                        <span class="delete" @click="removeSchool(school)">
                            <i class="mdi mdi-delete"></i> Delete
                        </span>
                    </div>
                    <div class="edu_title">
                        <h4>
                            {{school.name}}
                        </h4>
                    </div>
                    <ul class="list-unstyled m-0 list-arrow">
                        <li>
                            <p class="m-0">
                                {{school.from}} - {{school.to}}
                            </p>
                        </li>
                    </ul>
                </div>
                <form v-if="show" class="forms-sample" @submit.prevent="add_school(schools)">
                    <div class="form-group">
                        <label for="name">School Name</label>
                        <input
                            type="text"
                            class="form-control"
                            id="name"
                            name="name"
                            placeholder="School Name"
                            v-model="schools.name"
                        />
                    </div>
                    <div class="form-group">
                        <label for="from">From</label>
                        <input
                            type="date"
                            class="form-control"
                            id="from"
                            name="from"
                            placeholder="From"
                            v-model="schools.from"
                        />
                    </div>
                    <div class="form-group">
                        <label for="to">To</label>
                        <input
                            type="date"
                            class="form-control"
                            id="to"
                            name="to"
                            placeholder="To"
                            v-model="schools.to"
                        />
                    </div>
                    <button
                        @click.prevent="updateSchool(obj_id, schools)"
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
                    <a href="" @click.prevent="show =! show; addNew()" v-else>+ Add School</a>
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
            schools:[],
            show: false,
            update: false,
            obj_id:null
        }
    },
    created(){

    },
    mounted(){
        this.get_schools()
    },
    methods:{
        add_school(obj){
            if (obj.name != null && obj.from != null && obj.to != null){
                axios.post(`/admin/add_school`,{name: obj.name, from: obj.from, to: obj.to}).then((res) => {
                    Vue.$toast.success('School Added Successfully.', {})
                    this.schools.push(res.data)
                    this.schools.name = null;
                    this.schools.from = null;
                    this.schools.to = null;
                })
            }else{
                Vue.$toast.error('Complete your info.', {})
            }
        },
        get_schools(){
            axios.get(`/admin/get_schools`).then((res) => {
                this.schools = res.data
            })
        },
        removeSchool(obj) {
            axios.post(`/admin/delete_school/${obj.id}`).then((res)=>{
                this.schools.splice(this.schools.indexOf(obj), 1)
                // console.log(res.data)
            })
        },
        editSchool(obj) {
            this.show = false
            this.update = true
            this.obj_id = obj.id
            axios.get(`/admin/get_school/${obj.id}`).then((res)=>{
                this.schools.name = res.data.name
                this.schools.from = res.data.from
                this.schools.to = res.data.to
                this.show = true
            })
        },
        updateSchool(obj_id, obj){
            const object = this.schools.find( ({ id }) => id === obj_id );
            if (obj.name != null && obj.from != null && obj.to != null){
                axios.post(`/admin/update_school/${object.id}`,{name: obj.name, from: obj.from, to: obj.to}).then((res) => {
                    Vue.$toast.success('School Updated Successfully.', {})
                    object.name = res.data.name
                    object.from = res.data.from
                    object.to = res.data.to
                })
            }else{
                Vue.$toast.error('Complete your info.', {})
            }
        },
        addNew(){
            this.schools.name = null;
            this.schools.from = null;
            this.schools.to = null;
        }
    }
}
</script>
