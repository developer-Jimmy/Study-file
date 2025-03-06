<template>
    <div class="container" style="text-align: left;">

        <h1>待辦事項清單 - 修改</h1>
        <hr />
        <div class="row">
            <div class="col-md-4">
                <form>
                    <div class="form-group">
                        <label class="control-label" for="Name">項目名稱</label>
                        <input class="form-control" type="text" id="Name"
                               v-model="todoItemName" />
                    </div>
                    <div class="form-group form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox"
                                   v-model="todoItemIsComplete" /> 是否已完工
                        </label>
                    </div>
                    <div class="form-group">
                        <input type="button" v-on:click="doOkButtonClick" value="確定" class="btn btn-outline-primary" /> |
                        <router-link to="/Todo/Index" class="btn btn-outline-info">取消</router-link>
                    </div>
                </form>
            </div>
        </div>


    </div>
</template>
<script>
    
    export default {
        name: "TodoEdit",
        data() {
            return {
                todoItemId: 0,
                todoItemName: "",
                todoItemIsComplete: false
            }
        },
        methods: {
            async getTodoItem() {
                // console.log(this.$route.params.id);
                const response = await this.axios.get(
                    'http://localhost:3000/api/todoitem/' + this.$route.params.id
                );
                this.todoItemId = response.data.TodoItemId;
                this.todoItemName = response.data.Name;
                this.todoItemIsComplete = response.data.IsComplete;
            },
            async doOkButtonClick() {
                var dataToServer = {
                    TodoItemId: this.todoItemId,
                    Name: this.todoItemName,
                    IsComplete: this.todoItemIsComplete,
                };

                await this.axios.put(
                    "http://localhost:3000/api/todoitem/" + this.todoItemId,
                    JSON.stringify(dataToServer),
                    { headers: { 'Content-Type': 'application/json' } }
                );
                
                this.$router.replace('/Todo/Index');
            }
        },
        mounted() {
            this.getTodoItem();
        }

    }
</script>
<style lang="">
    
</style>