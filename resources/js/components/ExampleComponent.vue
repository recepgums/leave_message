<template>
  <div class="d-flex flex-wrap text-center" style="text-align:center">
      <div v-for="(item,key) in data" :key="key" >
          <div v-if="isUrl(item.title) || item.file_name !==null"  class="p-3" style="width:280px;height:300px;">
              <div class="card card-small card-post mb-4 shadow" name="kart" style=" width: 100%;height:100%;border-radius: 20px">
                  <div class="card-header " style="background-color: #28A745;border-radius:20px 20px 0px 0px ">
                  </div>
                  <div class="card-body row text-center" style="height:10px;">
                      <div v-if="item.title.includes('www.youtube.com') || item.title.includes('m.youtube.com') || item.title.includes('youtu.be') || item.title.includes('open.spotify.com') "
                           class="iframe-container text-center align-self-center "  >
                          <iframe  width="1024" height="768" :src="youtube_link(item.title)" frameborder="0"
                                   allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                   allowfullscreen></iframe>
                      </div>
                      <h5 v-else class=" col-12 text-center" >{{item.title}}</h5>
                      <div v-if="item.password !== null" class="text-center" style="margin-left: auto;margin-right: auto;">
                          <br>
                          <input style="width: auto;margin-left: auto;margin-right: auto;" v-model="item.new_password" class=" align-self-center form-control mx-sm-3" type="password"
                                 placeholder="Password..." name="file_password_confirm"> <br>
                          <span  v-on:click="ajax_password(this,item.id,item.new_password)"
                                 class="btn btn-success">Download</span>
                          <br>
                      </div>
                      <div v-else-if="item.file_name !==null" class="text-center full-width">
                          <a :href="'/storage/global_files/'+item.file_name" target="_blank" class="card-text    text-center"
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



          <div v-else class="p-3" style="width:280px;height:300px">
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

          <div class="modal fade" v-bind:id="'exampleModal'+key" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header"  style="background-color:#28A745;color:white">
                          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body" >
                          {{item.title}}
                      </div>
                      <div class="modal-footer" style="background-color:#28A745">
                          <div style="text-align: right;">
                              <small style="color: white;">{{moment.duration(moment().diff(item.created_at)).humanize()}} ago</small>
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
        data() {
            return {
                url:'',
                id:'',
                password: '',
                data: []
            }
        },
        mounted() {
            axios.get('http://127.0.0.1:8000/api/')
                .then((response)=>{
                    this.data = response.data;
                });
            window.Echo.channel('user-channel')
                .listen('.UserEvent', (data) => {
                    this.data = data.data;
                });
            for (var i = 0; i<this.data.length; i++){
                this.data[i].push({
                    "new_password":""
                });
            }
    },
        methods: {
            ajax_password: function (event, id,password) {
                axios.post('http://127.0.0.1:8000/ajaxdeneme',{id:id,password: password})
                    .then((response) => {
                        if(response.status==200){
                            let path = response.data.download_link;
                            window.open(path,'_blank');
                        }
                        this.password="";
                    });

            },
            youtube_link:function(url){
                if (url.includes('youtu.be')){
                    return  url.replace('youtu.be/','www.youtube.com/embed/');
                }
                else if (url.includes('list')){
                    return   'https://www.youtube.com/embed/'+url.substring(url.indexOf('watch?v=')+8,url.indexOf('&list'));
                }
                else if(url.includes('open.spotify.com')){
                    return url.replace('spotify.com/','spotify.com/embed/');
                }
                return 'https://www.youtube.com/embed/'+url.substring(url.indexOf('watch?v=')+8);
            },
            isUrl:function(text){
                var res = text.match(/(http(s)?:\/\/.)?(www\.)?[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)/g);
                return (res !== null)
            },
            maxTitleLenght:function (text,key) {
                    if (text.length > 210 ){
                        let last_version = text.substring(0,198)+"..." ;

                        return  last_version;
                    }
                return  text;
            },
        }
    }
</script>
