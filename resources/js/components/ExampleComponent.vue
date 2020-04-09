<template>
    <div class="container">
        <div class="col-11"  v-for="item in data">
            <div class="card card-small card-post mb-4" name="kart">
                <div class="card-body row ">
                    <h5 class="card-title col-md-10 ">{{item.title}}</h5>
                    <div class="card-title col-md-2 ">

                    </div>
                </div>
                <div v-if="item.password !== null">
                    <input class="input-group-seamless sifre"  type="password" placeholder="password..." name="file_password_confirm">
                    <span onclick="ajax_password(this,item.id)" class="btn btn-success" >Download</span>
                </div>
                <div v-else-if="item.file_name !== null">
                    <a :href="'/storage/global_files/'+item.file_name" target="_blank" class="card-text  text-break "  style="word-wrap: break-word;width: 100%">
                        Dosyayı İndirin
                    </a>
                </div>
                <div style="background-color: #28A745">
                    <div class=" ">
                        <div  style="text-align: right">
                            <small class="text-white">{{item.created_at}</small>
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
                data:[]
            }
        },
            mounted() {
                window.Echo.channel('user-channel')
                    .listen('.UserEvent', (data) => {
                        this.data = data.data;
                        console.log(this.data);
                        /* let j;
                    j=0;
                    $("#notification").empty();
                    for (j = 0; j < data.data.length; j++) {
                        $("#notification").append('<div class="alert alert-success">'+(j+1) + data.data[j].title+'</div>');
                    }*/
                    });
            }
        }
</script>
