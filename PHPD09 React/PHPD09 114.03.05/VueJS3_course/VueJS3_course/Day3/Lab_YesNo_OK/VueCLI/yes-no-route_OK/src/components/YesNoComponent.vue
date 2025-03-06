<template lang="">
    <div class="container">

        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <div class="page-header">
                        <h1>無所不問、無所不答</h1>
                </div>
            </div>
        </div>

        <form class="form-horizontal">
            <fieldset>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="question">請輸入問題:</label>
                    <div class="col-md-4">
                        <input id="question" name="question" 
                            v-model="question" v-on:input="questionChanged()"
                            type="text" placeholder="" class="form-control input-md">
                        <span class="help-block">問題請以問號結尾</span>
                    </div>
                </div>
            </fieldset>
        </form>

        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <h2>{{answer}}</h2>
                <img v-bind:src="image">
            </div>
        </div>

    </div>
</template>

<script>

export default {
    name: 'YesNo',
    data: function () {
        return {
            question: "",
            answer: "",
            image: ""
        }
    },
    methods: {
        questionChanged: async function () {
            let question = this.question;
            if (question.indexOf("?") >= 0) {
                const response = await this.axios.get("https://yesno.wtf/api");
                this.answer = response.data.answer;
                this.image = response.data.image;
            }
        }
    }        
}
</script>

<style lang="">
    
</style>