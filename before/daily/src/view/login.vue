<template>
    <div class="loginbox">
        <div class="box">
            <el-form :model="form" :rules="rules" ref="form">
                <el-form-item label="用户名" prop="username">
                    <el-input v-model="form.username" clearable placeholder="请输入用户名">
                        <i slot="prefix" class="el-icon-s-custom" style="margin:5px;"></i>
                    </el-input>
                </el-form-item>
                <el-form-item label="密码" prop="password">
                    <el-input v-model="form.password" show-password clearable placeholder="请输入密码">
                        <i slot="prefix" class="el-icon-lock" style="margin:5px;"></i>
                    </el-input>
                </el-form-item>
                <el-form-item label="角色" prop="role">
                    <el-radio-group v-model="form.role">
                        <el-radio label="student"></el-radio>
                        <el-radio label="teacher"></el-radio>
                        <el-radio label="admin"></el-radio>
                    </el-radio-group>
                </el-form-item>
                <el-form-item>
                    <el-button type="primary" @click="submitForm">立即登录</el-button>
                    <el-button @click="resetForm('form')">重置</el-button>
                </el-form-item>
            </el-form>
        </div>
    </div>
</template>

<script>
    import admin from '../data/admin';
    import student from '../data/student';
    import teacher from '../data/teacher';

    export default {
        name: "login",
        data() {
            return {
                form: {
                    username: '',
                    password: '',
                    role: '',
                },
                rules: {
                    username: [
                        {required: true, message: '请输入用户名', trigger: 'blur'},
                        {min: 2, max: 10, message: '长度在 2 到 10 个字符', trigger: 'blur'}
                    ],
                    password: [
                        {required: true, message: '请输入密码', trigger: 'blur'},
                        {min: 3, max: 10, message: '长度在 3 到 10 个字符', trigger: 'blur'}
                    ],
                    role: [
                        {required: true, message: '请选择角色', trigger: 'change'}
                    ],

                }
            };
        },
        methods: {
            submitForm() {
                // let _self = this;
                //this的指向：1、箭头函数。2、把this存到一个临时的变量。3、在函数定义时通过bind绑定this（bind(this);)
                this.$refs.form.validate((valid) => { //获取元素
                        if (valid) {
                            let role = this.form.role;
                            let model = null;
                            if (role == 'admin') {
                                model = admin;
                            } else if (role == 'student') {
                                model = student;
                            } else {
                                model = teacher;
                            }
                            let flag = model.filter(ele => ele.username == this.form.username && ele.password == this.form.password);
                            if (flag) {
                                // this.$router.push({name: 'index'});
                                let user = localStorage.user = JSON.stringify(flag[0]);
                                if (role == 'student') {
                                    this.$message.success('学生日报系统登录成功');
                                    this.$router.push({name: 'studentIndex'}, user);
                                } else {
                                    this.$message.success('管理员系统登录成功');
                                    this.$router.push({name: 'index'});
                                }
                                //页面的跳转：a标签、js脚本、编程式$router、router-link
                            } else {
                                this.$message.warning('用户名与密码不匹配');
                            }
                        }
                    }
                )
                ;
            },
            resetForm(formName) {
                this.$refs[formName].resetFields();
            }
        }
    }
</script>
<style>
    html, body {
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.7);
    }

    .loginbox {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url("../assets/bg.jpg") no-repeat center center/100% 100%;
    }
</style>

<style scoped>
    .box {
        background: rgba(10, 10, 10, 0.8);
        padding: 20px;
        width: 300px;
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);

    }
</style>