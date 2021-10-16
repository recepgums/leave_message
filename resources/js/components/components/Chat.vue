<template>
        <div class="container">
            <div v-for="(item,key) in textComputed" :key="key" >
                <div class="card mb-3">
                    <div class="card-header">
                        <a v-if="isUrl(item.title)" target="_blank" :href="item.title">{{item.title}}</a>
                        <span v-else>{{item.title}}</span>
                    </div>
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <p class="text-left">
                                <a v-if="isUrl(item.title)" target="_blank" :href="item.title">{{item.title}}</a>
                                <span v-else>{{item.title}}</span>
                            </p>
                            <footer class="blockquote-footer text-right">
                                {{moment.duration(moment().diff(item.created_at)).humanize()}} ago
                            </footer>
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>
</template>

<script>
    export default {
        name: "Chat",
        props:['propsData'],
        data(){
            return{
            }
        },
        computed:{
            textComputed(){
              return this.propsData
            }
        },
        methods:{
            isUrl: function (text) {
                var res = text.match(/(http(s)?:\/\/.)?(www\.)?[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)/g);
                return (res !== null)
            },
        }
    }
</script>

<style >
    @media only screen and (max-width: 600px) {
        .el-upload-dragger{
        }
    }
</style>
