<template>
    <div>

        <ul class="pages">

            <li v-for="i in pageNumber" :class="{active:current ===i }" :key="i" @click="pagechange(i)">
                {{i}}
            </li>

        </ul>
    </div>
</template>

<script>
    export default {
        name: "page",
        props: {
            total: {
                required: true,
                type: Number,
            }
            , pageSize: {
                type: Number,
                default: 3
            }
        }
        , computed: {
            pageNumber() {
                return Math.ceil(this.total / this.pageSize);
            }
        }
        , data() {
            return {
                current: 1
            }
        }
        , methods: {
            pagechange(i) {
                if (this.current == i) {
                    return
                }
                this.current = i;
                this.$emit('changePage', i)
            }
        }
    }
</script>

<style scoped>
    .pages {
        width: 100%;
        height: 30px;
        display: flex;
    }

    .pages > li {
        width: 30px;
        height: 28px;
        text-align: center;
        line-height: 28px;
        background: #999;
        cursor: pointer;
    }

    .pages .active {
        background: bisque;
    }

</style>