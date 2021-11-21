<template>
    <div>
        <div class="col-md-5 col-sm-12 upload-card__custom">
            <el-card :body-style="{ padding: '0px' }">
                <div class="col ">
                    <div class="card-body">
                        <div class="col  align-items-center full-width mt-2">
                            <div class="col mb-2 p-0">
                                <el-input
                                    type="input"
                                    :rows="3"
                                    placeholder="Share a youtube link or any text..."
                                    v-model="formInline.title">
                                </el-input>
                            </div>
                            <div class="col ">
                                <el-upload
                                    class="upload-demo"
                                    drag
                                    ref="upload"
                                    :action="this.number ? '/private_room_create/'+number : '/create_global'"
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
                                        Share file with password (max:1GB)
                                    </div>
                                </el-upload>
                            </div>
                            <div class="col">
                                <input class="form-control" type="password" v-model="formInline.password"
                                       :disabled="!actualFiles.length>0" placeholder="Password..."/>
                            </div>
                        </div>
                    </div>
                    <div>
                        <el-button class="mb-3 col" type="success" :disabled="!formInline.title" style="width: 100%"
                                   @click="onSubmit">Share Here
                            <i class="el-icon-bottom"></i>
                        </el-button>
                    </div>
                </div>
            </el-card>

        </div>
        <div class="d-none d-md-block py-0 mt-2">
            <div class="row">
                <div class="col-md-3 col-sm-12 message-div">
                    <chat :propsData="texts"></chat>
                </div>
                <div class="col-md-6 col-sm-12 p-0 message-div">
                    <files :number="number" :propsData="files"></files>
                </div>
                <div class="col-md-3 col-sm-12 message-div">
                    <links :propsData="links"></links>
                </div>
            </div>
        </div>
        <div class="d-sm-block d-md-none py-0 mt-2">
            <el-tabs class="py-0" :tab-position="'top'" :stretch="true">
                <el-tab-pane label="Notes" class="mx-1">
                    <chat class="h-full" :propsData="texts"></chat>
                </el-tab-pane>
                <el-tab-pane label="Files">
                    <files :number="number" class="h-full" :propsData="files"></files>
                </el-tab-pane>
                <el-tab-pane label="Links">
                    <links class="h-full" :propsData="links"></links>
                </el-tab-pane>
            </el-tabs>
        </div>
    </div>
</template>

<script>
    const appUrl = process.env.MIX_API_URL;
    import axios from 'axios';
    import Chat from './components/Chat';
    import Links from './components/Links';
    import Files from './components/Files'

    export default {
        props: ['csrf','number'],
        components: {
            Chat, Files, Links
        },
        data() {
            return {
                formInline: {
                    title: null,
                    password: ''
                },
                percentage: 0,
                fileList: [],
                url: '',
                id: '',
                asd: null,
                files: [],
                texts: [],
                links: [],
                actualFiles: [],
            }
        },
        mounted() {
            this.getDatas()
        },
        methods: {
            onSubmit() {
                if (this.actualFiles.length <= 0) {
                    let url = this.number ? appUrl + '/private_room_create/' + this.number : appUrl + '/create_global';
                    axios.post(
                        url,
                        {title: this.formInline.title},
                        {
                            headers: {'X-CSRF-TOKEN': this.csrf},
                            onUploadProgress: this.handleProgress
                        })
                        .then(resp => {
                            this.getDatas();
                            this.$refs.upload.clearFiles()

                        })
                } else {
                    if (this.formInline.password) {
                        this.$refs.upload.submit();
                    } else {
                        this.$notify({
                            title: 'File Uploaded Without Password',
                            type: 'warning',
                            message: 'Sharing your files without password is blocked for security reasons. Please set a password.'
                        });
                    }
                }
            },
            handleProgress(progressEvent) {
                let pers = Math.floor((progressEvent.loaded * 100) / progressEvent.total);
                this.percentage = pers
            },
            handleUploadChange(file) {
                this.actualFiles.push(file);
            },
            handleSuccess(file, fileList) {
                this.getDatas()
                this.$refs.upload.clearFiles()
                this.$notify({
                    title: 'File Uploaded',
                    type: 'success',
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
                let url = this.number ? appUrl + '/api/private_room/' + this.number : appUrl + '/api';
                axios.get(url)
                    .then(resp => resp.data)
                    .then((response) => {
                        let responseLinks = response.texts.filter(q=> (
                            q.title.includes('www.youtube.com') ||
                            q.title.includes('m.youtube.com') ||
                            q.title.includes('youtu.be') ||
                            q.title.includes('open.spotify.com')));
                        if (this.links == null || this.links.length !== responseLinks.length){
                            this.links = responseLinks;
                        }
                        let responseTextsOnly = response.texts.filter(q=> !(
                            q.title.includes('www.youtube.com') ||
                            q.title.includes('m.youtube.com') ||
                            q.title.includes('youtu.be') ||
                            q.title.includes('open.spotify.com')));
                        this.texts = responseTextsOnly;

                        this.files = response.files;
                        this.formInline.title = null;
                        this.formInline.password = null
                    });
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

<style>
    .text {
        font-size: 14px;
    }

    .item {
        padding: 0px 0;
    }

    .box-card {
        min-height: 300px;
        width: 480px;
        padding: 10px !important
    }

    .el-card__body {
        padding: 0px !important
    }

    .upload-card__custom {
        min-width: 300px
    }

    .el-upload .el-upload--text {
        max-width: 100px !important;
    }

    .el-upload-dragger {
        left: -10px;
    }

    .message-content {
        position: absolute;
        left: 2px;
        bottom: 5px;
    }

    .message-time {
        color: #28A745;
        position: absolute;
        right: 2px;
        bottom: 2px;
    }

    @media only screen and (max-width: 600px) {
        .el-upload-dragger {
            max-width: 84% !important;
            left: -30px;
        }
        textarea {
            min-height:40px!important;
            height:40px!important;
        }

        .el-textarea__inner{
            padding:0!important
        }
        .col.align-items-center.full-width.mt-2{
            padding:0!important
        }
    }

    .el-tabs__item.is-top{
        background-color: #28A745;
        color: white;
        font-size: 18px;
        position: sticky;
        bottom: 0;
    }
    .el-tab-pane{
        min-height:70%;
        padding-top:10px;

    }
    .el-tabs__header{
        margin:0 13px!important;
        position: sticky; top: 9vh;
        z-index:9;
    }
    .el-tabs__nav-scroll{
        border-radius:3px!important
    }
    .el-tabs__active-bar{
        display:none!important
    }
    .el-tabs__item.is-top.is-active{
        color: #28A745;
        background-color: white;
        font-size: 18px;
        position: sticky;
        bottom: 0;
    }
    .file-dis {
        float: left;
        text-align: left;
        position: relative;
        left: 0
    }

    .message-div {
        height: 900px;
        overflow: scroll !important;
    }

    .message-div::-webkit-scrollbar {
        display: none; /* Safari and Chrome */
    }

    .h-full{
        min-height:100vh;
    }
</style>
