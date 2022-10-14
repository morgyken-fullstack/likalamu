<template>


<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-striped col-md-12">
                    <thead>
                        <tr>
                        <th>
                            Image
                        </th>
                        <th>
                            Question ID
                        </th>
                        <th>
                            Summary
                        </th>
                        <th>
                            No. Pages
                        </th>

                        <th>
                            Price
                        </th>
                        <th>
                            format
                        </th>
                        <th>
                            deadline
                        </th>
                        </tr>
                    </thead>
                    <tbody>

                        <template v-for="task in tasks" :key="task.id">
                        <tr>

                            <td class="py-1">
                                <img src="/theme/star-admin/images/faces/face1.jpg" alt="image">
                            </td>

                            <td>{{ task.questionId}} </td>
                            <td>{{ task.summary}} </td>
                            <td>{{ task.pages}} </td>
                            <td>{{ task.studentprice}} </td>
                            <td>{{ task.format}} </td>
                            <td>{{ task.deadline}} </td>
                        </tr>
                        </template>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</template>

<script>
    import { ref, onMounted, reactive } from 'vue';

    import axios from 'axios';

    export default {

        setup() {

            const tasks = ref ([]);

            const getTask = async() => {

                let res = await axios.get('api/tasks');

                tasks.value = res.data.data

                console.log(tasks)
            };

            onMounted(getTask()); //call the getdata function

            return {tasks}

        }
    }




</script>

<style>
td {
    white-space: normal !important;
}
</style>
