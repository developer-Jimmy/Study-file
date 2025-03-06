<template lang="">
    <div class="container" style="text-align: left;">
    
        <h1>待辦事項清單 - 新增</h1>
        <hr />
        <div class="row">
            <div class="col-md-4">
                <form >
                    <div class="form-group">
                        <label class="control-label" for="userName">帳號</label>
                        <input class="form-control" type="text" id="userName" 
                            name="userName" value="" v-model="userName" />
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="password">密碼</label>
                        <input class="form-control" type="password" id="password" 
                            name="password" value="" v-model="password" />
                    </div>
                    <div class="form-group">
                        <input type="button" value="確定" v-on:click="doOkButtonClick" class="btn btn-outline-primary" /> | 
                        <a href="/Todo/Index" class="btn btn-outline-info">取消</a>
                    </div>
                    <div>{{$store.state.userName}}</div>
                </form>
            </div>
        </div>
    
    </div>
</template>
<script>

export default {
    data() {
        return {
            userName: "",
            password: ""
        }
    },
    methods: {
        doOkButtonClick: function () {
            let userInfo = {
                userName: this.userName,
                password: this.password
            }
            console.log(userInfo);
            this.$store.dispatch('login', userInfo);
        }
    }
}
</script>
<style lang="">
    
</style>