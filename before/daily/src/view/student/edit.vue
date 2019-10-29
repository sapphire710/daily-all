<template>
    <div class="form" v-if="form">

        <el-breadcrumb separator-class="el-icon-arrow-right">
            <el-breadcrumb-item :to="{ path: '/' }">首页</el-breadcrumb-item>
            <el-breadcrumb-item :to="{ path: '/studentQuery' }">查看学生</el-breadcrumb-item>
            <el-breadcrumb-item>编辑信息</el-breadcrumb-item>
        </el-breadcrumb>

        <el-form :model="form" ref="form" :rules="rules" label-width="80px">

            <el-form-item label="姓名" prop="username">
                <el-input v-model="form.username" placeholder="请输入姓名" clearable>
                    <i slot="prefix" style="margin:5px;" class="el-icon-s-custom"></i>
                </el-input>
            </el-form-item>

            <el-form-item label="性别" prop="sex">
                <el-radio label="男" v-model="form.sex"></el-radio>
                <el-radio label="女" v-model="form.sex"></el-radio>
            </el-form-item>

            <el-form-item label="年龄" prop="age">
                <el-input v-model="form.age" placeholder="请输入年龄" clearable>
                    <i slot="prefix" style="margin:5px;" class="el-icon-s-custom"></i>
                </el-input>
            </el-form-item>

            <el-form-item label="学号" prop="num">
                <el-input v-model="form.num" placeholder="请输入学号" clearable>
                    <i slot="prefix" style="margin:5px;" class="el-icon-s-custom"></i>
                </el-input>
            </el-form-item>

            <el-form-item label="电话" prop="tell">
                <el-input v-model="form.tell" placeholder="请输入联系电话" clearable>
                    <i slot="prefix" style="margin:5px;" class="el-icon-phone"></i>
                </el-input>
            </el-form-item>

            <el-form-item label="班级" prop="classes">
                <el-select v-model="form.classes" clearable placeholder="请选择">
                    <i slot="prefix" style="margin:5px;" class="el-icon-s-home"></i>
                    <el-option
                            v-for="item in classes"
                            :key="item.cid"
                            :label="item.cname"
                            :value="item.cname">
                    </el-option>
                </el-select>
            </el-form-item>

            <el-form-item label="密码" prop="password">
                <el-input v-model="form.password" placeholder="请输入密码" clearable>
                    <i slot="prefix" style="margin:5px;" class="el-input-icon el-icon-lock"></i>
                </el-input>
            </el-form-item>

            <el-form-item>
                <el-button type="primary" @click="submitForm">立即修改</el-button>
                <el-button @click="resetForm('form')">重置</el-button>
            </el-form-item>

        </el-form>
    </div>
</template>

<script>
    export default {
        name: "edit"
        , data: function () {
            return {
                form: null
                , classes: [
                    {cid: 1, cname: 'wuif1907-1'},
                    {cid: 2, cname: 'wuif1907-2'},
                    {cid: 3, cname: 'wuif1907-3'},
                ]
                , rules: {
                    username: [
                        {required: true, message: '请输入用户名', trigger: 'blur'},
                        {min: 2, max: 10, message: '长度在 2 到 10 个字符', trigger: 'blur'}
                    ],
                    password: [
                        {required: true, message: '请输入密码', trigger: 'blur'},
                        {min: 3, max: 10, message: '长度在 3 到 10 个字符', trigger: 'blur'}
                    ],
                    num: [
                        {required: true, message: '请输入学号', trigger: 'blur'},
                        {min: 3, max: 10, message: '长度在 3 到 10 个字符', trigger: 'blur'},
                    ],
                    age: [
                        {required: true, message: '请输入年龄', trigger: 'blur'},
                        {min: 1, max: 3, message: '0~999岁', trigger: 'blur'},
                    ],
                    tell: [
                        {required: true, message: '请输入联系电话', trigger: 'blur'},
                        // {length: 10, message: '11位', trigger: 'blur'},
                    ],
                    sex: [
                        {required: true, message: '请选择性别', trigger: 'change'}
                    ],
                    classes: [
                        {required: true, message: '请选择班级', trigger: 'change'}
                    ],

                }
            }
        }
        , methods: {
            submitForm() {
            }
            , getStudent() {
                let form = JSON.parse(localStorage.getItem('form'));
                if (form) {
                    this.form = form;

                } else {
                    this.$message.error('数据获取失败');
                }
            }
            , resetForm(formName) {
                this.$refs[formName].resetFields();
            }
        },
        beforeMount() {
            this.id = this.$route.params.id;
            this.getStudent();
        }

    }
</script>

<style scoped>

</style>