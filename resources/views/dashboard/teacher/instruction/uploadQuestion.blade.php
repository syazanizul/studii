@extends('dashboard.teacher.instruction.instructionApp')

@section('headline')
    <h1>Process to add questions into Studii</h1>
@endsection

@section('contents')
<div class="row">
    <div class="col-md-1 justify-content-center">
        <div style="background-color:#449fc9; width:50px; border-radius: 30px; height:50px; border:3px solid black">
            <h2 style="text-align: center">1</h2>
        </div>
    </div>
    <div class="col-11 col-md-11">
        <p><b>Creating the question</b></p>
        <p>In this step, a <a href="/about/teacher/compensation-for-contributors#creator" target="_blank">creator</a> creates the question. The creator thinks of the question, write them up on paper and make sure the question is correct. Then,
        the creator will transfer the question into either Microsoft Word or Google Docs.</p>
        <br>
        <p><b>From brain &#129504; -> to a Microsoft Word or Google Docs</b></p>
        <br>
        <p><u>1) From brain to a piece of paper</u></p>
        <p>Draft the question and think about how to get the answer. Recheck multiple times to make sure the question and its answer are correct.</p>
        <img class="ml-auto mr-auto d-block" src="{{asset('images/assets/teacher/instruction/sample-written-question-1.jpg')}}" width="80%" style="border:2px solid black">
        <p class="text-center">Example : A question drafted on a paper</p>
        <br>
        <br><br>
        <p><u>2) From on paper to Microsoft Words or Google Docs</u></p>
        <p>Type the question in proper sentences so that it is easily readable. We must also make sure all needed things can easily be seen, to ease the uploading
        process later.</p>
        <p><i>Every question needs:</i></p>
        <ul style="font-size:1.2em">
            <li>The information of the question</li>
            <ul>
                <li>What subject is this?</li>
                <li>What chapter (& level) is this?</li>
                <li>What sub-topic is this?</li>
            </ul>
            <li>The question</li>
            <li>The possible answers <b>(optional)</b></li>
            <li>The answers</li>
        </ul>
        <img class="ml-auto mr-auto d-block" src="{{asset('images/assets/teacher/instruction/sample-question-1.PNG')}}" width="80%" style="border:2px solid grey">
        <p class="text-center">Example 1 : Question written in Microsoft Words containing all important informations.</p>
        <br>
        <img class="ml-auto mr-auto d-block" src="{{asset('images/assets/teacher/instruction/sample-question-2.PNG')}}" width="80%" style="border:2px solid grey">
        <p class="text-center">Example 2 : Many questions with the same information.</p>
        <br>
        <img class="ml-auto mr-auto d-block" src="{{asset('images/assets/teacher/instruction/sample-question-3.PNG')}}" width="80%" style="border:2px solid grey">
        <p class="text-center">Example 3 : Question with possible answers (in this case, 3 possible answers). This is best because uploader does not need to come up with their possible answers
        themselves, but instead just copy and paste from the creator.</p>

        <br>
        <p><b>Do Note: </b></p>
        <ul style="font-size:1.3em">
            <li>Studii accepts questions up to 5 sub-sections, meaning it can have a) , b) , c) , d) , and e) .</li>
            <li>Right now, all questions in Studii must be of objective form (A, B, C, D), instead of subjective.</li>
            <ul>
                <li>The total possible answer can be either just 2, 3, or 4.</li>
                <li>We do not set this to a fixed number so that it will be easier for creators to create questions. If a question is hard, they can put
                    more possible answers, while easier question can have less possible answers.</li>
            </ul>
        </ul>
    </div>
</div>

<br><hr><br>

<div class="row">
    <div class="col-md-1 justify-content-center">
        <div style="background-color:#449fc9; width:50px; border-radius: 30px; height:50px; border:3px solid black">
            <h2 style="text-align: center">2</h2>
        </div>
    </div>
    <div class="col-11 col-md-11">
        <p><b>Uploading the question into Studii</b></p>
        <p>In this process, an <a href="/about/teacher/compensation-for-contributors#uploader" target="_blank">uploader</a> will upload the written question into Studii. This process is
        easy if the question is simple. However, if the question is more complicated (for example: has equations), it will take longer time to finish.</p>
        <p><b>Note:</b> If the question contains mathematical equation, then the uploader must know about Mathjax (a tool to write
        mathematical equations). But don't worry, we will explain how to use it to you.</p>
        <p><b>From Microsoft Word or Google Docs -> to Studii</b></p>
        <br><br>
        <p>There are 3 steps to upload questions. Add property, add content, and add answer.</p>
        <p><u>1) Add Property</u></p>
        <img class="ml-auto mr-auto d-block" src="{{asset('images/assets/teacher/instruction/add-property.PNG')}}" width="60%" style="border:2px solid grey">
        <p class="text-center">Step 1: Tell us the information of the question</p>

        <p><u>2) Add Content</u></p>
        <img class="ml-auto mr-auto d-block" src="{{asset('images/assets/teacher/instruction/add-content.PNG')}}" width="80%" style="border:2px solid grey">
        <p class="text-center">Step 2: The content of the question (the question itself)</p>

        <p><u>3) Add Answer</u></p>
        <img class="ml-auto mr-auto d-block" src="{{asset('images/assets/teacher/instruction/add-answer.PNG')}}" width="90%" style="border:2px solid grey">
        <p class="text-center">Step 3: Add the possible answer and tell us which answer is correct (Green is correct, Red is wrong).</p>

        <br>
        <p>As a summary, this step takes more explanation to cover everything. This step will be further explained in another section.</p>
    </div>
</div>

<br><hr><br>

<div class="row">
    <div class="col-md-1 justify-content-center">
        <div style="background-color:#449fc9; width:50px; border-radius: 30px; height:50px; border:3px solid black">
            <h2 style="text-align: center">3</h2>
        </div>
    </div>
    <div class="col-11 col-md-11">
        <p><b>Add Working (Optional)</b></p>
        <p>A <a href="/about/teacher/compensation-for-contributors#working" target="_blank">working uploader</a> will add a working to solve the question in this question. This uploader can be of the creator from <b>step 1</b>, the uploader from <b>step 2</b>,
        or another new uploader (unrelated from previous steps).</p>
        <p style="color:#b52a21"><b>Right now, we still have not introduced 'Add Working' in Studii. Stay tuned for this feature.</b></p>
    </div>
</div>

<br><hr><br>

<div class="row">
    <div class="col-md-1 justify-content-center">
        <div style="background-color:#449fc9; width:50px; border-radius: 30px; height:50px; border:3px solid black">
            <h2 style="text-align: center">4</h2>
        </div>
    </div>
    <div class="col-11 col-md-11">
        <p><b>Verification</b></p>
        <p>All questions must be verified by at least <b>2</b> different teachers (<a href="/about/teacher/compensation-for-contributors#verifier">'verifier'</a>) before the question is ready for students. When the teacher verify the question,
        they will own a part of the question and they will also have responsibility towards the validity of that question. </p>
        <p>In this process, the 'verifier' will recheck the question to ensure it is correct. They will attempt the question and see if they can get the answer. If can, then
            there is no problem. They proceed to click the <b>verify button</b>.</p>
        <p>If there are already 2 different teachers who have verified the question, then the question is ready for students. The process is finished :).</p>
        <p style="color:#b52a21"><b>Right now, this verification process is skipped. All uploaded questions will be personally verified by the Studii Team. This
            is as a method to accelerate the process to add questions in the early stages of Studii's development.</b></p>
    </div>
</div>


@endsection
