<template>
        <div class="container">
            <div v-for="(item,key) in textComputed" :key="key" >

                <div class="card mb-3" @click="drawerClicked(item)">
                    <div class="card-header">
                        <a v-if="isUrl(item.title)" target="_blank" :href="item.title">{{item.title}}</a>
                        <span v-else>{{item.title}}</span>
                    </div>
                    <div class="card-body" >
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
            <el-drawer
                :direction="'rtl'"
                title="I am the title"
                :visible.sync="drawer"
                :size="'80%'"
                :with-header="true">
                <div class="container-fluid px-0" style="">
                    <div style="position: sticky; top: 0vh;z-index: 9">
                        <el-alert
                            title="If you think this is not your post don't even try to attempt!"
                            type="warning">
                        </el-alert>
                        <div class="container p-3 card card-body mx-2">
                            <p class="text-center mb-2">
                                <a v-if="isUrl(drawer_content.title)" target="_blank" :href="drawer_content.title">{{drawer_content.title}}</a>
                                <span v-else>{{drawer_content.title}}</span>
                            </p>
                            <input class="form-control" type="password" v-model="drawer_content.password"
                                   placeholder="Password..."/>
                            <el-button class="form-control mt-2" type="success" :disabled="!drawer_content.password" style="width: 100%">Share Here
                                <i class="el-icon-bottom"></i>
                            </el-button>
                            <footer class="blockquote-footer mt-2 text-right">
                                {{drawer_content.created_at ?
                                moment.duration(moment().diff(drawer_content.created_at)).humanize() : ''}} ago
                            </footer>
                        </div>
                    </div>
                    <div style="overflow-y: scroll;" class="mt-4">
                        <h6 class="text-left text-muted pl-3">Viewed by:</h6>
                        <div class="container mt-1 mx-auto">
                            <b-table style="font-size: 11px!important;text-align: left!important;" responsive fixed striped hover :items="items" :dark="false"></b-table>
                        </div>
                        <h6 class="text-left text-muted pl-3">Password attempt by:</h6>
                        <div class="container mt-1 mx-auto">
                            <b-table style="font-size: 11px!important;text-align: left!important;" responsive fixed striped hover :items="items" :dark="false"></b-table>
                        </div>
                        <h6 class="text-left text-muted pl-3">Reached by:</h6>
                        <div class="container mt-1 mx-auto">
                            <b-table style="font-size: 11px!important;text-align: left!important;" responsive fixed striped hover :items="items" :dark="false"></b-table>
                        </div>
                    </div>
                </div>
            </el-drawer>
        </div>
</template>

<script>
    export default {
        name: "Chat",
        props:['propsData','isMobile'],
        data(){
            return{
                drawer:false,
                drawer_content:{
                    title:'',
                    created_at:'',
                    password:null
                },
                items: [
                    { ip_address: '21.192.175.2', country: 'Larsen', viewed_at: '2021-10-25' },
                    { ip_address: '40.230.43.12', country: 'Dickerson', viewed_at: '2021-10-02' },
                    { ip_address: '89.878.23.12', country: 'Geneva', viewed_at: '2021-09-30' },
                    { ip_address: '38.76.45.343', country: 'Jami', viewed_at: '2021-10-19' }
                ]
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
            drawerClicked(item){
                this.drawer_content = item;
                this.drawer = !this.drawer;
            }
        }
    }
</script>

<style >
    @media only screen and (max-width: 600px) {
        .el-upload-dragger{
        }
    }
</style>
