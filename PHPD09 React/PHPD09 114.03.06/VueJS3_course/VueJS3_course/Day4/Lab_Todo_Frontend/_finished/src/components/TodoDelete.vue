<template lang="">
    <div class="container" style="text-align:left;">
    
        <h1>待辦事項清單 - 刪除</h1>
    
        <hr />
        <div>
            <dl class="row">
                <dt class = "col-sm-2">
                    項目名稱
                </dt>
                <dd class = "col-sm-10">
                    {{ todoItemName }}
                </dd>
                <dt class = "col-sm-2">
                    是否已完工
                </dt>
                <dd class = "col-sm-10">
                    <input class="check-box" disabled="disabled" 
                    type="checkbox" v-model="todoItemIsComplete" />
                </dd>
            </dl>
            
            <hr>
            <h3>確定要刪除這筆資料嗎?</h3>
    
            <form>
                <input type="hidden" id="TodoItemId" name="TodoItemId" 
                    value="1" 
                />
                <input type="button" v-on:click="doOkButtonClick" value="確定" class="btn btn-outline-danger" /> |
                <a href="/Todo/Index" class="btn btn-outline-info">取消</a>
            </form>
        </div>
    
    </div>
</template>
<script>

    export default {
        name: "TodoDelete",
        data() {
            return {
                todoItemId: 0,
                todoItemName: "",
                todoItemIsComplete: false
            }
        },
        methods: {
            async getTodoItem() {
                const response = await this.axios.get(
                    'http://localhost:3000/api/todoitem/' + this.$route.params.id
                );
                this.todoItemId = response.data.TodoItemId;
                this.todoItemName = response.data.Name;
                this.todoItemIsComplete = response.data.IsComplete;
            },
            async doOkButtonClick() {
                await this.axios.delete(
                    "http://localhost:3000/api/todoitem/" + this.todoItemId 
                );
                this.$router.replace('/Todo/Index');
            }
        },
        mounted() {
            this.getTodoItem();
        }
    }
</script>
