<template>
    <div>
        <el-row>
            <el-col :span="6">
                <div class="grid-content bg-purple-dark">
                    <ve-line :data="lineData" :settings="lineSettings"></ve-line>
                </div>
            </el-col>

            <el-col :span="6">
                <div class="grid-content bg-purple-dark">
                    <ve-line :data="lineDatal" :settings="lineSettings"></ve-line>
                </div>
            </el-col>
        </el-row>
    </div>
</template>

<script>
    export default {
        name: "vcharts"
        , data() {
            this.lineSettings = {
                labelMap:{
                    'number':'每日提交量'
                }
            };
            return {
                lineData: {
                    columns: ['date', 'number']
                    , rows: [
                        {date: '2019-10-21', number: 41}
                        , {date: '2019-10-22', number: 35}
                        , {date: '2019-10-23', number: 30}
                        , {date: '2019-10-24', number: 20}
                        , {date: '2019-10-25', number: 15}
                        , {date: '2019-10-26', number: 2}
                    ]
                }
                ,lineDatal:{
                    columns:['date','status','skill'],
                    rows:[
                        {date:'7.22',status:'100',skill:'0'}
                        ,{date:'8.22',status:'90',skill:'20'}
                        ,{date:'9.22',status:'50',skill:'50'}
                        ,{date:'10.22',status:'80',skill:'70'}
                        ,{date:'11.22',status:'99',skill:'90'}
                        ,{date:'12.22',status:'66',skill:'95'}

                    ]
                }
            }
        }
    }
</script>

<style scoped>

</style>