<template>
    <div>
        <div class="col-md-5 col-sm-12 mx-auto upload-card__custom">
            <el-card :body-style="{ padding: '0px' }">
                <div class="col ">
                    <div class="card-body">
                        <div class="col  align-items-center full-width mt-2"  >
                            <div class="col">
                                <el-input
                                    type="textarea"
                                    :rows="3"
                                    placeholder="Share a youtube link or any text..."
                                    v-model="formInline.title">
                                </el-input>
                            </div>
                            <br>
                           <div class="col ">
                               <el-upload
                                   class="upload-demo"
                                   drag
                                   ref="upload"
                                   action="/create_global"
                                   :on-change="handleUploadChange"
                                   :on-remove="handleRemove"
                                   :on-success="handleSuccess"
                                   :headers="{ 'X-CSRF-TOKEN': csrf }"
                                   :file-list="fileList"
                                   :data="formInline"
                                   :on-progress="handleProgress"
                                   :auto-upload="false"
                                   multiple>
                                   <i class="el-icon-upload"></i>
                                   <div class="el-upload__text">Drop file here or <em>click to upload</em></div>
                                   <div class="el-upload__tip text-center" slot="tip">
                                       Share file either with password or without password(max:1GB)
                                   </div>
                               </el-upload>
                           </div>
                            <div class="col">
                                <input class="form-control" type="password" v-model="formInline.password"  :disabled="!actualFiles.length>0" placeholder="Password..." />
                            </div>
                        </div>
                    </div>
                    <div >
                        <el-button class="mb-3 col"  type="success" :disabled="!formInline.title"  style="width: 100%" @click="onSubmit">Share Here
                            <i class="el-icon-bottom"></i>
                        </el-button>
                    </div>
                </div>
            </el-card>

        </div>
        <div class="d-md-flex flex-wrap justify-content-center text-center d-sm-inline " style="text-align:center">
            <div v-for="(item,key) in data" :key="key" >
                <div v-if="isUrl(item.title) || item.file_name !==null"  class="p-3 text-center mx-auto" style="width:280px;height:300px;">
                    <div class="card card-small card-post mb-4 shadow" name="kart" style=" width: 100%;height:100%;border-radius: 20px">
                        <div class="card-header " style="background-color: #28A745;border-radius:20px 20px 0px 0px ">
                        </div>
                        <div class="card-body row text-center" style="height:10px;">
                            <div v-if="item.title.includes('www.youtube.com') || item.title.includes('m.youtube.com') || item.title.includes('youtu.be') || item.title.includes('open.spotify.com') "
                                 class="iframe-container text-center align-self-center "  >
                                <iframe  width="1024" height="768" :src="youtube_link(item.title)" frameborder="0"
                                         allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                         allowfullscreen></iframe>
                                <!--<small class="small flex-wrap "><a target="_blank" :href="item.title">{{item.title.substring(0,40)}}</a></small>-->
                            </div>
                            <h6 v-else-if="isUrl(item.title)" class=" col-12 text-center" ><a target="_blank" :href="item.title">{{item.title}}</a></h6>
                            <h5 v-else class="col-12 text-center">{{item.title}}</h5>
                            <div v-if="item.password !== null" class="text-center" style="margin-left: auto;margin-right: auto;">
                                <br>
                                <input style="width: auto;margin-left: auto;margin-right: auto;" v-model="item.new_password" class=" align-self-center form-control mx-sm-3" type="password"
                                       placeholder="Password..." name="file_password_confirm"> <br>
                                <div class="row">
                                    <div class="col">
                                  <span  v-on:click="ajax_password(this,item.id,item.new_password,key)"
                                         class="btn btn-success">Download</span>
                                    </div>
                                    <div v-if="item.remove" class="col">
                                        <div>
                                            <button class="btn btn-outline-danger" @click="removeFile(item.id)">Remove</button>
                                        </div>
                                    </div>
                                </div>
                                <br>
                            </div>
                            <div v-else-if="item.file_name !==null" class="text-center full-width">
                                <a :href="item.file_name" target="_blank" class="card-text    text-center"
                                   style="text-align: center;">
                                    Download File
                                </a>
                            </div>
                        </div>
                        <div class="card-footer border-top"   style="background-color: #28A745;border-radius:0px 0px 20px 20px">
                            <div style="text-align: right">
                                <small class="text-white">{{moment.duration(moment().diff(item.created_at)).humanize()}} ago</small>
                            </div>
                        </div>
                    </div>
                </div>



                <div v-else class="p-3 text-center mx-auto" style="width:280px;height:300px">
                    <div class=" card card-small card-post mb-4 shadow" name="kart" style=" width: 100%;height:100%;border-radius: 20px">
                        <div  data-toggle="modal" :data-target="'#exampleModal'+key"  class="card-header text-white " v-html="maxTitleLenght(item.title)" style="cursor: pointer;height:100%;background-color: #28A745;border-radius:20px 20px 0px 0px ">
                            {{maxTitleLenght(item.title,key)}}
                        </div>
                        <div class="card-footer border-top"   style="background-color:white;border-radius:0px 0px 20px 20px">
                            <div style="text-align: right">
                                <small style="color: #28A745;">{{moment.duration(moment().diff(item.created_at)).humanize()}} ago</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div  class="modal fade" v-bind:id="'exampleModal'+key" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content " style="border-radius: 20px;">
                            <div class="modal-header  "  style="background-color:#28A745;color:white;border-radius: 20px 20px  0px 0px">
                                <h5 class="modal-title" id="exampleModalLabel" >Leave Note</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" >
                                {{item.title}}
                            </div>
                            <div class="modal-footer" style="background-color:#28A745;border-radius:0px 0px 20px 20px">
                                <div style="text-align: right;">
                                    <small style="color: white;">{{moment.duration(moment().diff(item.created_at)).humanize()}} ago</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</template>

<script>
    const appUrl = 'http://recepgumus.com';
    import axios from 'axios'
    export default {
        props:['csrf'],
        data() {
            return {
                formInline: {
                    title: null,
                    password:null
                },
                percentage:0,
                fileList:[],
                url: '',
                id: '',
                asd: null,
                password: '',
                data: [],
                actualFiles:[]
            }
        },
        mounted() {
            this.getDatas()
        },
        methods: {
           onSubmit(){
               if(this.actualFiles.length <=0){
                   axios.post(
                       appUrl+'/create_global',
                       {title:this.formInline.title},
                       {headers:{'X-CSRF-TOKEN': this.csrf },
                           onUploadProgress: this.handleProgress})
                   .then(resp=>{
                       this.getDatas()
                       this.$refs.upload.clearFiles()

                   })
               }else{
                   this.$refs.upload.submit();
               }
           },
            handleProgress(progressEvent){
                    let pers= Math.floor((progressEvent.loaded * 100) / progressEvent.total);
                    this.percentage =pers
                    console.log('asd',pers)
            },
            handleUploadChange(file) {
                this.actualFiles.push(file);
            },
            handleSuccess(file, fileList) {
               this.getDatas()
                this.$refs.upload.clearFiles()
                this.$notify({
                    title: 'File Uploaded',
                    type:'success',
                    message: 'Check the files below'
                });
            },
            handleRemove(file, fileList) {
                this.actualFiles.pop();
            },
            fileAdded(files) {
                console.log(files)
            },
            getDatas() {
                axios.get(appUrl + '/api/')
                    .then((response) => {
                        this.data = response.data;
                        this.formInline.title = null
                        this.formInline.password = null
                    });
                for (var i = 0; i < this.data.length; i++) {
                    this.data[i].push({
                        "new_password": "",
                    });
                }
            },
            removeFile(id) {
                axios.post(appUrl + '/api/removeFile', {id: id}).then(resp => {
                    console.log(resp)
                    this.$notify({
                        title: 'File Removed',
                        type:'success',
                        message: 'None can see that file anymore'
                    });
                })
                this.getDatas()

            },

            ajax_password: function (event, id, password, key) {
                axios.post(appUrl + '/ajaxdeneme', {id: id, password: password})
                    .then((response) => {
                        if (response.data.status === 200) {
                            this.data[key].remove = true
                            this.data[key].title = this.data[key].title + " ";
                            let path = response.data.download_link;
                            window.open(path, '_blank');
                        }
                        if (response.data.status === 400) {
                            alert('nt')
                        }
                        this.password = "";
                    });
            },
            youtube_link: function (url) {
                if (url.includes('youtu.be')) {
                    return url.replace('youtu.be/', 'www.youtube.com/embed/');
                } else if (url.includes('list')) {
                    return 'https://www.youtube.com/embed/' + url.substring(url.indexOf('watch?v=') + 8, url.indexOf('&list'));
                } else if (url.includes('open.spotify.com')) {
                    return url.replace('spotify.com/', 'spotify.com/embed/');
                }
                return 'https://www.youtube.com/embed/' + url.substring(url.indexOf('watch?v=') + 8);
            },
            isUrl: function (text) {
                var res = text.match(/(http(s)?:\/\/.)?(www\.)?[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)/g);
                return (res !== null)
            },

            maxTitleLenght: function (text, key) {
                if (text.length > 210) {
                    let last_version = text.substring(0, 198) + "...";

                    return last_version;
                }
                return text;
            },
        },

    }
</script>

<style >
    .text {
        font-size: 14px;
    }

    .item {
        padding: 0px 0;
    }

    .box-card {
        min-height:300px;
        width: 480px;
        padding:10px!important
    }
    .el-card__body{
        padding:0px!important
    }
    .upload-card__custom{
        min-width:300px
    }
    .el-upload .el-upload--text{
        max-width:100px!important;
    }
    .el-upload-dragger{
        left:-10px;
    }
    @media only screen and (max-width: 600px) {
        .el-upload-dragger{
            max-width:84%!important;
            left:-30px;
        }
    }

</style>
