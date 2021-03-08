<template>
    <div id="dashboard">
        <div class="row">
            <div class="col-sm-8 flex-column d-flex stretch-card">
                <div class="row">
                    <div class="col-lg-4 d-flex grid-margin stretch-card" v-for="ticket in JSON.parse(data)" :key="ticket.id">
                        <div class="card bg-primary">
                            <div class="card-body text-white">
                                <a :href="`/admin/ticket/${ticket.id}`" style="color: #fff">
                                    <h3 class="font-weight-bold mb-3">
                                        18,39 (75GB)
                                    </h3>
                                    <p class="pb-0 mb-0">{{ticket.name}}</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props:[
        'data'
    ],
    data(){
        return{
            tickets:[]
        }
    },
    methods:{

    }
}
</script>
