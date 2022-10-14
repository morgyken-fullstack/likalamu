<template>
    <!-- include summernote css/js -->
    <div class="modal fade" id="post-question" style="font-size: 80%">
        <div class="modal-dialog modal-post modal-md">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header" style="background:#3498DB">
                    <h4 class="modal-title"> Post a Task</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form method="post" @prevent.default="storeUser" accept-charset="utf-8">
                       
                    <!-- Modal body <form method="post" action="{{url ('api/tasks')}}"> -->
                    <div class="form-group">
                        <label for="usr">Title:</label>
                        <input type="text" placeholder="Enter Short title" name="header" class="form-control" v-model="form.title">
                    </div>
                    <div class="col-md-12 row">
                        <div class="form-group col-md-6">
                            <label for="usr">Writing Type:</label>
                            <select id="" class="form-control" name="paperType" @change="calculatePrice" v-model="form.paperType">
                                <option selected="selected" value="class">Class</option>
                                <option value="thesis">Thesis</option>
                                <option value="general">General</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="usr">Level:</label>
                            <select id="" class="form-control" name="level" @change="calculatePrice" v-model="form.level">
                                <option selected="selected" value="1">Masters</option>
                                <option value="phd">PHD</option>
                                <option value="mast">Masters</option>
                                <option value="colle">College</option>
                                <option value="other">Other</option>

                            </select>
                        </div>
                    </div>

                        <input type="hidden" v-model="_token" name="_token" :value="csrf">

                        <input type="hidden" v-model="questionId" name="questionId" :value="findrand">

                        <input type="hidden" v-model="summary" name="summary" >

                        <input type="hidden" v-model ="tutorprice" name="tutorprice" :value="findrand">

                    <div class="form-group">
                        <label for="body">Body:</label>
                        <textarea id="summernote" name="body" @change="findSummary" v-model="form.body"></textarea>

                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-md-12">


                            <div class="form-group">
                                <label for="usr">pages:</label>
                                <input type="number" @change="calculatePrice" name="pages" class="form-control" id="usr" v-model="form.pages">
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="form-group col-md-6">
                            <label for="usr">Format:</label>
                            <select id="" name="format" class="form-control" v-model="form.format">
                                <option selected="selected" value="1">APA</option>
                                <option value="MLA">MLA</option>
                                <option value="Turabian">Turabian</option>
                                <option value="Chicago">Chicago</option>
                                <option value="Harvard">Harvard</option>
                                <option value="Oxford">Oxford</option>
                                <option value="Vancouver">Vancouver</option>
                                <option value="CBE">CBE</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="usr">deadline:</label>
                            <div id="deadline">
                                <input type="date" name="deadline" v-model="form.deadline">
                            </div>

                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <hr>
                        <label for="usr">Include Files:</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" multiple>
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>

                    <div class="form-group col-md-12">
                        <div class="form-group">
                            <label for="usr">Price:</label>
                            <input type="number" name="studentprice" class="form-control" v-model="form.studentprice">
                        </div>
                    </div>


                    <div class="form-group col-md-12">
                        <hr>
                        <button type="submit" class="btn btn-primary" v-on:click="storeUser()" name="button"> Submit
                            Question</button>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer" style="background:#ff7878">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>

                    </form>


                </div>
            </div>
        </div>
    </div>

</template>

<script>           
         

import { ref, onMounted, reactive } from 'vue';

import axios, * as others from 'axios';

export default {

    el: '#post-question',
    name: "Price",
    data () {
        return {
            form: {
                
                header:[],  //1
                studentId:window.User.id, //2
                
                summary:[],  //3
                tutorprice:[], //4
                
                studentprice:[], //5
                pages: [], //6
                
                body: [], //7
                level: [], //8
                
                paperType: [], //9
                
                format: [], //10
                deadline: [], //11

                questionId:[],
                created_at: []
            },
            tasks:[],

        //header,paperType,level,studentId
        //questionId,summary,tutorprice
        //studentprice,body,pages
        //format,deadline,studentprice
        }

    },
  

    methods: {

        calculateDeadline : function(event) {
            // Discard the time and time-zone information.
            const today = new Date(), deadline = new Date(this.deadline);
               // difference = dateDiffInDays(a, b);
            var diff = Math.abs(deadline.getTime() - today.getTime())/3600000;
            console.log(diff)

            return diff;

        },
        // a computed getter
        calculatePrice: function (event) {


            if (this.paperType == 'thesis' && this.form.level == 'phd') {
                this.form.price = 20 * this.form.pages
                }
            if (this.paperType == 'thesis' && this.form.level == 'mast') {
                this.form.price = 18 * this.form.pages
                }
            if (this.form.paperType == 'thesis' && this.form.level == 'colle') {
                this.form.price = 16 * this.form.pages
                }
            if (this.form.paperType == 'thesis' && this.form.level == 'other') {
                this.form.price = 15 * this.form.pages
                }

            if (this.form.paperType == 'general' && this.form.level == 'phd')
               {
                this.form.price = 18 * this.form.pages
               }

            if (this.form.paperType == 'general' && this.form.level == 'mast') {
                this.form.price = 15 * this.form.pages
            }
            if (this.form.paperType == 'general' && this.form.level == 'colle') {
                this.form.price = 16 * this.form.pages
            }
            if (this.form.paperType == 'general' && this.form.level == 'other') {
                this.form.price = 12 * this.form.pages
            }


            if (this.form.paperType == 'class') {
                this.form.price  = 350
            }
            console.log(this.form.price)

            return this.form.price;
        },

        // calculate summary 
        findSummary () {
            try{
                let summary  = this.body.substring(1, 130);
            }
            catch (e) 
            {
                console.log(e)
            }

            return summary
        },

        findrand () {
            return Math.floor(Math.random() * 100001);
        },

        async storeUser(e) {

            console.log (this.form)

             e.preventDefault();   


             try{
                axios.post('./api/tasks', this.form)
                .then((res) => {
                     console.log(this.form.data)
                     //call form data
                     this.formData
                 })
                 .catch((error) => {
                     // error.response.status Check status code
                     console.log(error)
                 }).finally(() => {
                     //Perform action in always
                     console.log('final function')
                 });
            }

    }
}


</script>

<style>
textarea {
     width: 100%;
     height: 150px;
     padding: 12px 20px;
     box-sizing: border-box;
     border: 2px solid #ccc;
     border-radius: 4px;
     background-color: #f8f8f8;
     font-size: 16px;
     resize: none;
 }
</style>



