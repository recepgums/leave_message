<template>
    <div class="row" >
        <div v-for="(item,key) in files" :key="key"  class="col" >
            <div class="p-3 text-center mx-auto" style="width:280px;height:300px;">
                <div class="card card-small card-post mb-4" style=" width: 100%;height:100%;border-radius: 20px">
                    <div class="card-header " style="background-color: #28A745;border-radius:20px 20px 0px 0px ">
                    </div>
                    <div class="card-body row text-center" style="height:10px;">
                        <h5  class="col-12 text-center">{{item.title}}</h5>
                        <div v-if="item.password !== null" class="text-center" style="margin-left: auto;margin-right: auto;">
                            <br>
                            <input style="width: auto;margin-left: auto;margin-right: auto;" v-model="item.password" class=" align-self-center form-control mx-sm-3" type="password"
                                   placeholder="Password..." name="file_password_confirm"> <br>
                            <div class="row">
                                <div class="col">
                                          <span  v-on:click="ajax_password(this,item.id,item.password,key)"
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
        </div>
    </div>
</template>

<script>
    const appUrl = 'https://anonymupload.com';
    export default {
        name: "Files",
        props:['propsData'],
        data(){
          return {
              files:[],
          }
        },
        watch:{
            propsData(newValue){
                this.files = newValue
            }
        },
        methods:{
            removeFile(id) {
                axios.post(appUrl + '/api/removeFile', {id: id}).then(resp => {
                    this.$notify({
                        title: 'File Removed',
                        type:'success',
                        message: 'None can see that file anymore'
                    });
                });
                this.getDatas()
            },
            ajax_password(event, id, password, key) {
                let hasWrong = localStorage.hasOwnProperty('wrong_password');
                let forbidden = localStorage.hasOwnProperty('forgiving_time');
                if (forbidden){
                    let current =new Date().getMinutes();
                    let forgive = localStorage.getItem('forgiving_time');
                    if(current - forgive >= 3 ){
                        localStorage.removeItem('forgiving_time');
                        localStorage.removeItem('wrong_password');
                        forbidden = false
                    }
                }
                let wrongTimes = localStorage.getItem('wrong_password');
                if(wrongTimes >= 3 && !forbidden){
                    localStorage.setItem('forgiving_time',new Date().getMinutes())
                    this.$notify({
                        title: 'Too many wrong password!',
                        type:'error',
                        message: 'You can try after 3 minutes'
                    });
                }else{
                    axios.post(appUrl + '/ajaxdeneme', {id: id, password: password}).then(resp=>resp.data)
                        .then((response) => {
                            if (response.status === 200) {
                                localStorage.removeItem('forgiving_time');
                                localStorage.removeItem('wrong_password');
                                this.files[key].remove = true;
                                let path = response.download_link;
                                window.open(path, '_blank');
                                this.files[key].password ='';
                            }
                            if (response.status === 400) {
                                hasWrong ? localStorage.setItem('wrong_password',wrongTimes*1+1) : localStorage.setItem('wrong_password',0);
                                this.$notify({
                                    title: 'Error',
                                    type:'error',
                                    message: 'Password is not correct'
                                });
                            }
                        });
                }

            },
        },
    }
</script>

<style scoped>

</style>
