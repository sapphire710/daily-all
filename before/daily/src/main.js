import Vue from 'vue'
import App from './App.vue'
import VueRouter from "vue-router";// 引入vue-router
import 'u-reset.css';
import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';
import VCharts from 'v-charts';

Vue.config.productionTip = false;
Vue.use(ElementUI);
Vue.use(VueRouter);
Vue.use(VCharts);

//引入组件
import login from "./view/login";
import studentAdd from './view/student/add';
import studentQuery from './view/student/query';
import studentEdit from './view/student/edit'
import vCharts from './view/vcharts'

import studentIndex from './view/student-index'
import  write from './view/daily/write'
import  query from './view/daily/query'


let router = new VueRouter({
    routes: [
        {path: '/login', component: login, name: 'login', meta: {title: '登录'}},
        {path: '/studentIndex', component: studentIndex, name: 'studentIndex', meta: {title: '学生界面'},
            children:[
                {path:'write',component:write,name:'studentwrite',meta:{title:'填写日报'}},
                {path:'query',component:query,name:'studentquery',meta:{title:'查看日报'}}
            ]
        },
        {
            path: '/', component: () => import('./view/index'), name: 'index', meta: {title: '首页'},
            children: [
                {path: 'studentAdd', component: studentAdd, meta: {title: '学生添加'}},
                {path: 'studentQuery', component: studentQuery, meta: {title: '学生查询'}},
                {path: 'studentEdit/:id', component: studentEdit, name: 'studentEdit', meta: {title: '学生编辑'}},
                {path:'vCharts',component:vCharts,name:'vCharts',meta:{title:'可视化'}},
            ]
        }
    ]
});

//导航守卫
//组件切换  设置文档标题     流程：1、什么时候切换（监听组件切换）/2、对应标题meta/3、设置文档标题
// 全局前置
router.beforeResolve((to, from, next) => {
    let title = to.meta.title || '学生日报管理系统';
    document.title = title;//设置标题
    next();
});
// router.afterEach()


new Vue({
    render: h => h(App),//==el:'#app';
    router,

}).$mount('#app');
