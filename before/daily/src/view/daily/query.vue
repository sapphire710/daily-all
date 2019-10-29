<template>
    <div>
        <el-form ref="form" :model="form" label-width="80px" :inline="true">
            <el-form-item label="时间:">
                <el-col :span="11">
                    <el-date-picker type="date" placeholder="选择日期" format="yyyy 年 MM 月 dd 日"
                                    value-format="yyyy-MM-dd" v-model="form.ctime"
                                    style="width: 250px;"></el-date-picker>
                </el-col>
                <el-col class="line" :span="2">-</el-col>
            </el-form-item>
            <el-form-item label="内容:">
                <el-input v-model="form.content" style="width:250px"></el-input>
            </el-form-item>
            <el-form-item>
                <el-button type="primary" @click="changePage" style="margin-left:50px">立即查询</el-button>
            </el-form-item>
        </el-form>

        <el-table :data="dailyArr" style="width: 100%">
            <el-table-column prop="content" label="内容"></el-table-column>
            <el-table-column prop="finish" label="完成度"></el-table-column>
            <el-table-column prop="motto" label="座右铭"></el-table-column>
            <el-table-column prop="suggest" label="建议"></el-table-column>
            <el-table-column prop="problem" label="问题"></el-table-column>
            <el-table-column prop="feeling" label="心得体会"></el-table-column>
            <el-table-column prop="ctime" label="提交时间"></el-table-column>
        </el-table>

        <!--<el-pagination layout="total,prev,pager,next,jumper" :total="total" page-size="1"></el-pagination>-->

        <!--自定义组件-->
        <my-page :total="total" :page-size="size" @changePage="changePage"></my-page>

    </div>
</template>

<script>
    import {SUCCESS, FAIL} from '../../config/base'
    import myPage from '../../components/page'

    export default {
        name: "query"
        , data() {
            return {
                dailyArr: [],
                total: 1,
                user: '',
                size: 2,
                form: {
                    ctime: '',
                    content: ''
                }
            }
        }
        , computed: {
            objTransformQS() {
                let str = '';
                for (let i in this.form) {
                    let val = this.form[i];
                    if (val !== '') {
                        str += '&' + i + '=' + val
                    }
                }
                return str;
            }
        }
        , methods: {
            changePage(i) {
                this.getDaily(i)
            }
            , getDaily(i) {
                let user = this.user.username;
                fetch('http://www.daily-end.com/index/index/query?names=' + user + '&page=' + i + '&size=' + this.size + this.objTransformQS)
                    .then(res => res.json())
                    .then(data => {
                        if (data.code == SUCCESS) {
                            this.dailyArr = data.data;
                            this.total = data.count;
                        } else if (data.code == FAIL) {
                            // this.$message.warning(data.msg)
                        }
                    })
            }
            , getUser() {
                this.user = JSON.parse(localStorage.user);
            }

        }
        , beforeMount() {
            this.getUser();
            this.getDaily(1);

        }
        , components: {
            myPage
        }
    }
</script>

<style scoped>

</style>