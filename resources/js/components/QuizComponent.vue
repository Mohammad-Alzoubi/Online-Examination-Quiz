<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Online ExamineAction <span class="float-right">{{questionIndex}}/{{questions.length}}</span></div>

                    <div class="card-body">
                        <span class="float-right" style="color: #f00">{{time}}</span>
                        <div v-for="(question,index) in questions">
                            <div v-show="index === questionIndex">
                                {{question.question}}
                                <ol>
                                    <li v-for="choice in question.answers">
                                        <lable>
                                            <input type="radio"
                                                :value ="choice.is_correct==true?true:choice.answer"
                                                :name  ="index"
                                                v-model="userResponses[index]"
                                                @click="choices(question.id, choice.id)"
                                            >
                                            {{choice.answer}}
                                        </lable>
                                    </li>
                                </ol>
                            </div>
                        </div>

                        <div v-show="questionIndex!=questions.length">
                            <button v-if="questionIndex>0" class="btn btn-success float-right" @click="prev()">Prev</button>
                            <button class="btn btn-success" @click="next();postUserChoice()">next</button>
                        </div>
                        <div v-show="questionIndex===questions.length">
                            <p style="text-align: center;">
                                You get: {{score()}}/{{questions.length}}
                            </p>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import moment from "moment";

    export default {
        props:['quizid', 'times', 'quizQuestions', 'hasQuizPlayed'],
        data(){
            return{
                questions: this.quizQuestions,
                questionIndex:0,
                userResponses:Array(this.quizQuestions.length).fill(false),
                currentQuestion:0,
                currentAnswer:0,
                clock:moment(this.times*60*1000),
            }
        },
        mounted() {
            setInterval(() => {
                this.clock = moment(this.clock.subtract(1, 'seconds'))
            }, 1000)

        },
        computed:{
            time:function(){
                var minsec=this.clock.format('mm:ss');
                if (minsec == '00:00'){
                    alert('Timeout!')
                    window.location.reload();
                }
                return minsec
            }
        },
        methods: {
            next() {
                this.questionIndex++;
            },
            prev() {
                this.questionIndex--;
            },
            choices(question, answer) {
                this.currentQuestion = question;
                this.currentAnswer   = answer;
            },
            score() {
                return this.userResponses.filter((val)=>{
                    return val===true;
                }).length;
            },
            postUserChoice() {
                axios.post('/quiz/create', {
                    questionId: this.currentQuestion,
                    answerId:   this.currentAnswer,
                    quizId:     this.quizid
                }).then((response)=>{
                    console.log(response);
                }).catch((error)=>{
                    alert('Error!')
                });
            }
        }
    }
</script>
