<template>
    <div class="experince">
        <div class="cv">
            <div class="card card-primary card-outline">
                <div class="card-body">
                    <h4 class="title p-3">
                        Add Your Skills
                    </h4>
                    <div class="edu_card skills mb-2" v-for="skill in skills" :key="skill.id" :style="`border-bottom: 4px solid ${skill.color}`">
                        <div class="options">
                            <span class="edit" @click="editskill(skill)">
                                <i class="mdi mdi-pencil"></i> Edit
                            </span>
                            <span class="delete" @click="removeskill(skill)">
                                <i class="mdi mdi-delete"></i> Delete
                            </span>
                        </div>
                        <div class="edu_title">
                            <h4>
                                {{skill.name}}
                            </h4>
                        </div>
                        <ul class="list-unstyled m-0 list-arrow">
                            <li>
                                <p>{{skill.percent}}%</p>
                            </li>
                            <li>
                                <p>{{skill.experince}}</p>
                            </li>
                            <li>
                                <p class="image">
                                    <img :src="`${public_path}/${skill.image}`" alt="">
                                </p>
                            </li>
                        </ul>
                    </div>
                    <form class="forms-sample" v-if="show" @submit.prevent="addskill(skills)">
                        <div class="form-group mb-1">
                            <label for="name">Skill</label>
                            <textarea
                                class="form-control"
                                id="name"
                                name="name"
                                placeholder="Type Your Skills"
                                v-model="skills.name"
                            ></textarea>
                        </div>
                        <div class="form-group mb-1">
                            <label for="percent">Percentage</label>
                            <input
                                type="number"
                                class="form-control"
                                id="percent"
                                name="percent"
                                placeholder="Put Skill Percentage"
                                v-model="skills.percent"
                            />
                        </div>
                        <label for="experince">Year's of Experince</label>
                        <div class="form-group">
                            <select class="form-control" v-model="skills.experince" name="experince" id="experince">
                                <option selected="selected" disabled="disabled" hidden="hidden" value="">Year's of Experince </option>
                                <option value="Less than 1 year">Less than 1 year</option>
                                <option value="1 - 3 Years">1 - 3 Years</option>
                                <option value="3 - 5 Years">3 - 5 Years</option>
                                <option value="5 - 7 Years">5 - 7 Years</option>
                                <option value="More than 7 year">More than 7 year</option>
                            </select>
                        </div>
                        <div class="form-group mb-1">
                            <label for="percent">Skill Image</label>
                            <input
                                type="file"
                                class="form-control"
                                id="percent"
                                name="percent"
                                placeholder="Skill Image"
                                ref="skill_img"
                            />
                        </div>
                        <div class="form-group mb-1">
                            <label for="percent">Color</label>
                            <input
                                type="color"
                                class="form-control"
                                id="color"
                                name="color"
                                placeholder="Skill Color"
                                v-model="skills.color"
                            />
                        </div>
                        <div class="form-group">
                            <label for="description">Skill Description</label>
                            <textarea v-model="skills.description" class="form-control" name="description" id="description" placeholder="Skill Description"></textarea>
                        </div>
                        <button
                            @click.prevent="updateskill(obj_id, skills)"
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
                        <a href="" @click.prevent="show =! show; addNew()" v-else>+ Add Skill</a>
                    </div>
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
            skills:[],
            show: false,
            update: false,
            obj_id:null,
            file:{}
        }
    },
    created(){

    },
    mounted(){
        this.get_skills()
    },
    methods:{
        addskill(obj){
            this.file = this.$refs.skill_img.files[0];
            let formData = new FormData();
            formData.append('name', obj.name);
            formData.append('percent', obj.percent);
            formData.append('experince', obj.experince);
            formData.append('color', obj.color);
            formData.append('desc', obj.description);
            formData.append('file', this.file);
            console.log(formData)
            if (obj.name != null && obj.percent != null, experince != null){
                axios.post(`/admin/add_skill`,formData).then((res) => {
                    console.log(res.data)
                    Vue.$toast.success('skill Added Successfully.', {})
                    this.skills.push(res.data)
                    this.skills.name = null;
                    this.skills.percent = null;
                    this.skills.experince = null;
                    this.skills.color = null;
                    this.skills.description = null;
                })
            }else{
                Vue.$toast.error('Complete your info.', {})
            }
        },
        get_skills(){
            axios.get(`/admin/get_skills`).then((res) => {
                this.skills = res.data
            })
        },
        removeskill(obj) {
            axios.post(`/admin/delete_skill/${obj.id}`).then((res)=>{
                this.skills.splice(this.skills.indexOf(obj), 1)
                Vue.$toast.success('skill Deleted Successfully.', {})
            })
        },
        editskill(obj) {
            this.show = false
            this.update = true
            this.obj_id = obj.id
            axios.get(`/admin/get_skill/${obj.id}`).then((res)=>{
                console.log(res.data)
                this.skills.name = res.data.name;
                this.skills.percent = res.data.percent;
                this.skills.experince = res.data.experince;
                this.show = true
            })
        },
        updateskill(obj_id, obj){
            const object = this.skills.find( ({ id }) => id === obj_id );
            this.file = this.$refs.skill_img.files[0];
            let formData = new FormData();
            formData.append('name', obj.name);
            formData.append('percent', obj.percent);
            formData.append('experince', obj.experince);
            formData.append('color', obj.color);
            formData.append('desc', obj.description);
            formData.append('file', this.file);
            if (obj.name != null && obj.percent != null){
                axios.post(`/admin/update_skill/${object.id}`,formData).then((res) => {
                    console.log(res.data)
                    Vue.$toast.success('skill Updated Successfully.', {})
                    object.name = res.data.name
                    object.percent = res.data.percent
                    object.experince = res.data.experince
                    object.description = res.data.description
                })
            }else{
                Vue.$toast.error('Complete your info.', {})
            }
        },
        addNew(){
            this.skills.name = null;
            this.skills.percent = null;
            this.skills.experince = null
        },
        selectColor(e){
            this.skills.color = e.target.value
        }
    }
}
</script>
