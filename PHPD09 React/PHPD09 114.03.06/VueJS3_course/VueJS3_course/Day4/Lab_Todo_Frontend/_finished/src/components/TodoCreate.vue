<template lang="">
    <div class="container" style="text-align: left;">
    
        <h1>待辦事項清單 - 新增</h1>
        <hr />
        <div class="row">
            <div class="col-md-4">
                <form >
                    
                    <div class="form-group">
                        <label class="control-label" for="Name">項目名稱</label>
                        <input class="form-control" type="text" id="Name" 
                            name="Name" value="" v-model="todoItemName" />
                    </div>
                    <div class="form-group form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" id="IsComplete" 
                                name="IsComplete" v-model="todoItemIsComplete" /> 是否已完工
                        </label>
                    </div>
                    <div class="form-group">
                        <input type="button" value="確定" v-on:click="doOkButtonClick" class="btn btn-outline-primary" /> | 
                        <a href="/Todo/Index" class="btn btn-outline-info">取消</a>
                    </div>
                </form>
            </div>
        </div>
    
    </div>
    </template>
    
<script>

export default {
    name: "TodoCreate",
    data() {
        return {
            todoItemName: "",
            todoItemIsComplete: false
        }
    },
    methods: {
        async doOkButtonClick() {
            
            var dataToServer = {
                Name: this.todoItemName,
                IsComplete: this.todoItemIsComplete,
            };

            // console.log(dataToServer);
            await this.axios.post(
                "http://localhost:3000/api/todoitem",
                JSON.stringify(dataToServer),
                { headers: { 'Content-Type': 'application/json' } }
            );
            this.$router.replace('/Todo/Index');
        }
    }

}
</script>
    