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
                :size="drawer_size"
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
                drawer_size:'30%',
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
        },
        mounted() {
            if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent)
                || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) {
                this.drawer_size = '80%';
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
