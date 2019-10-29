<template>
    <div>
        <el-form :model="daily" label-width="80px">

            <el-form-item label="座右铭">
                <el-input v-model="daily.motto" placeholder="座右铭" minlength="10" show-word-limit></el-input>
            </el-form-item>

            <el-form-item label="完成情况">
                <el-input v-model="daily.finish" placeholder="完成情况" minlength="10" show-word-limit></el-input>
            </el-form-item>

            <el-form-item label="完成内容">
                <el-input type="textarea" v-model="daily.content" placeholder="完成内容" minlength="10" show-word-limit></el-input>
            </el-form-item>

            <el-form-item label="心得体会">
                <el-input v-model="daily.feeling" placeholder="心得体会" minlength="10" show-word-limit></el-input>
            </el-form-item>

            <el-form-item label="遇到问题">
                <el-input v-model="daily.problem" placeholder="遇到问题" minlength="10" show-word-limit></el-input>
            </el-form-item>

            <el-form-item label="建议">
                <el-input v-model="daily.suggest" placeholder="建议" minlength="10" show-word-limit></el-input>
            </el-form-item>

            <el-form-item label="其他">
                <el-input v-model="daily.other" placeholder="其他" minlength="10" show-word-limit></el-input>
            </el-form-item>

            <el-form-item>
                <el-button type="primary" @click="submitDaily">立即提交</el-button>
                <el-button @click="resetForm('form')">重置</el-button>
            </el-form-item>


        </el-form>
    </div>
</template>

<script>
    export default {
        name: "write"
        , data() {
            return {
                daily: {
                    names: ''
                    , classes: 'wuif1907-2'
                    , motto: '' //座右铭
                    , content: ''
                    , finish: '' //完成程度
                    , problem: ''   //问题
                    , feeling: '' //心得
                    , suggest: '' //建议
                    , other:'' //其他
                }
            }
        }
        ,methods:{
            submitDaily(){
                this.daily.names = JSON.parse(localStorage.user).username;
                fetch('http://www.daily-end.com/index/index/index',{
                    method:'POST',
                    body:JSON.stringify(this.daily),
                    headers:new Headers({
                        'Content-Type':'application/json'
                    })
                })
                    .then(res=>res.json())
                    .then(data=>{
                        alert(data.msg);
                    })

            }
        }
    }
</script>

<style scoped>

</style>