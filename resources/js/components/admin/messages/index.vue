<template>
    <div id="messages">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <ul class="list-unstyled msgs-option">
                        <li>
                            <i class="mdi mdi-send"></i>
                            New Message
                        </li>
                        <li class="active">
                            <i class="mdi mdi-email"></i>
                            Inbox
                        </li>
                        <li>
                            <i class="mdi mdi-email-open"></i>
                            Send Message
                        </li>
                    </ul>
                </div>
                <div class="col-md-9">
                    <div class="messages-content">
                        <div class="msgs-menu">
                            <div class="msgs-search">
                                <div class="form-group">
                                    <input type="text" name="" id="" class="form-control search-input" placeholder="Search Message or Name">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="menu">
                                <ul class="list-unstyled">
                                    <li v-for="msg in messages" :key="msg.id">
                                        <h5>
                                            {{msg.email}}
                                        </h5>
                                        <p>
                                            {{msg.message}}
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="msg-content">
                            test
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
        'messages'
    ]
}
</script>
