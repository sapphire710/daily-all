<template>
    <div id="box">
        <el-container>
            <!--侧边栏开始-->
            <el-aside width="180px">
                <el-row class="tac">
                    <el-col :span="12">
                        <el-menu width="200px" class="el-menu-vertical-demo" :router="true"
                                 background-color="#545c64" text-color="#fff" active-text-color="#ffd04b">
                            <!--@open="handleOpen" @close="handleClose"-->

                            <el-submenu index="/studentIndex">
                                <template slot="title">
                                    <i class="el-icon-location"></i>
                                    <span>日报管理</span>
                                </template>
                                <el-menu-item-group>
                                    <el-menu-item index="/studentIndex/write">填写日报</el-menu-item>
                                    <el-menu-item index="/studentIndex/query">查看日报</el-menu-item>
                                </el-menu-item-group>
                            </el-submenu>

                            <el-submenu index="2">
                                <template slot="title">
                                    <i class="el-icon-location"></i>
                                    <span>查看日报</span>
                                </template>
                                <el-menu-item-group>
                                    <el-menu-item index="2-1">添加教师</el-menu-item>
                                    <el-menu-item index="2-2">查看教师</el-menu-item>
                                </el-menu-item-group>
                            </el-submenu>

                        </el-menu>
                    </el-col>
                </el-row>
            </el-aside>
            <!--侧边栏结束-->
            <el-container>
                <el-container>
                    <!--头部内容开始-->
                    <el-header>
                        <el-menu class="el-menu-demo" mode="horizontal"
                                 background-color="#545c64" text-color="#fff" active-text-color="#ffd04b">
                            <!--@select="handleSelect"-->
                            <el-menu-item index="1">管理中心</el-menu-item>
                            <el-submenu index="2">
                                <template slot="title">我的工作台</template>
                                <el-menu-item index="2-1">选项1</el-menu-item>
                                <el-menu-item index="2-2">选项2</el-menu-item>
                                <el-menu-item index="2-3">选项3</el-menu-item>
                                <el-submenu index="2-4">
                                    <template slot="title">选项4</template>
                                    <el-menu-item index="2-4-1">选项1</el-menu-item>
                                    <el-menu-item index="2-4-2">选项2</el-menu-item>
                                    <el-menu-item index="2-4-3">选项3</el-menu-item>
                                </el-submenu>
                            </el-submenu>
                            <el-menu-item index="3" style="float: right;">{{user.username}}</el-menu-item>
                        </el-menu>
                    </el-header>
                    <!--头部内容结束-->
                    <!--主内容开始-->
                    <el-main>

                        <router-view></router-view>
                    </el-main>
                    <!--主内容结束-->
                    <!--底部开始-->
                    <el-footer>Footer</el-footer>
                    <!--底部结束-->
                </el-container>
            </el-container>
        </el-container>
    </div>
</template>

<script>
    export default {
        name: "student-index"
        ,data(){
            return {
                user:null
            }
        }
        ,methods:{
            getUser(){
                this.user= JSON.parse(localStorage.getItem('user'))
            }
        }
        ,beforeMount() {
            this.getUser();
        }
    }
</script>


<style>
    body {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    #box {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
    }

</style>

<style scoped>
    a{
        color:#999;
    }
    .router-link-exact-active{
        color:#ffd04b;
    }
    .el-container{
        height:100%;
    }
    .el-header, .el-footer {
        background-color: #B3C0D1;
        color: #333;
        text-align: center;
        line-height: 60px;
    }
    .el-header{
        padding:0 0 0 20px;
    }
    .el-aside {
        background-color: rgb(84, 92, 100) !important;
    }
    .el-menu {
        border: none;
    }
    .el-aside {
        background-color: #D3DCE6;
        color: #333;
    }
    .el-main {
        background-color: #E9EEF3;
        color: #333;
    }
    body > .el-container {
        margin-bottom: 40px;
    }
    .el-container:nth-child(5) .el-aside,
    .el-container:nth-child(6) .el-aside {
        line-height: 260px;
    }
    .el-container:nth-child(7) .el-aside {
        line-height: 320px;
    }
    .el-col-12 {
        width: 100%;
    }
    .el-submenu .el-menu-item {
        min-width: 100%;
    }
</style>