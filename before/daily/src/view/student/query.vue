<template>
    <div>
        <el-table :data="students">
            <el-table-column prop="id" label="ID"></el-table-column>
            <el-table-column prop="username" label="姓名"></el-table-column>
            <el-table-column prop="sex" label="性别"></el-table-column>
            <el-table-column prop="age" label="年龄"></el-table-column>
            <el-table-column prop="classes" label="班级"></el-table-column>
            <el-table-column prop="num" label="学号"></el-table-column>
            <el-table-column prop="tell" label="联系电话"></el-table-column>
            <el-table-column prop="" label="操作">

                <template slot-scope="scope">

                    <!--<el-button>
                        <router-link :to="{name:studentEdit}"></router-link>
                    </el-button>-->

                    <!--tag="el-buttont"-->
                    <router-link :to="{name:'studentEdit',params:{id:scope.row.id}}" ><el-button type="primary"  icon="el-icon-edit"></el-button></router-link>

                    <el-button type="danger" @click="deleteStudent(scope.row.id)" icon="el-icon-delete"></el-button>
                </template>
            </el-table-column>
        </el-table>
    </div>
</template>

<script>
    import student from '../../data/student';

    export default {
        name: "query"
        , data() {
            return {
                students: []
            }
        }

        , methods: {
            getStudent() {
                let students = JSON.parse(localStorage.getItem('form')); //获取本地数据,
                if (students !== null) {
                    student.push(students);
                }
                this.students = student;
                console.log(this.students);
            }
            , deleteStudent(id) {
                //findIndex  splice
                this.students = this.students.filter(ele => ele.id != id);
                // this.students.splice(index, 1);
            }
        }
        //生命周期函数
        , mounted() {
            // 不要用箭头函数，this指向不明确
            this.getStudent();
        }

    }
</script>

<style scoped>

</style>