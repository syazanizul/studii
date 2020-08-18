@extends('dashboard.teacher.read.instructionApp')

@section('headline')
    <p style="font-size:2.4em; font-family: 'rubik', sans-serif;">How Studii calculates your earnings?</p>
@endsection

@section('contents')
    <div class="row" style="font-family: 'rubik', sans-serif;">
        <div class="col-lg-12">
            <p><b>Studii</b></p>
            <p>Studii gives compensation to the contributors (the teachers) everytime their contributions (exercise questions) are attempted by students. This
                compensation, similar to like how royalty payment works, is to honor the contributions made towards our library.</p>
            <p>In the end, Studii is built to help everybody. Those are the students, the teachers, the tutors, and the parents.</p>


            <br><br><hr>
            <p><b>Terms and its definition</b></p>
            <table style="width:90%;">
                <tr style="background-color:grey; color:white">
                    <th>Term</th>
                    <th>Definition</th>
                </tr>
                <tr>
                    <td>Contributors</td>
                    <td>A question is made by many roles (or parts) - creator, uploader, working, & translator. The term <i>Contributors</i> refer to all of these
                        roles.</td>
                </tr>
                <tr>
                    <td>Creator</td>
                    <td>The person who creates the question. Only teachers can create questions.</td>
                </tr>
                <tr>
                    <td>Uploader</td>
                    <td>The person who uploads the question to Studii. One person can fill multiple roles. Teacher and tutors can be an uploader.</td>
                </tr>
                <tr>
                    <td>Working Uploader</td>
                    <td>The person who uploads the working of the question to Studii. One person can fill multiple roles. Teacher and tutors can be a working uploader.</td>
                </tr>
                <tr>
                    <td>Translator</td>
                    <td>The person who translates the question into another language. One person can fill multiple roles. Teacher and tutors can be a translator.</td>
                </tr>
                <tr style="border-top: 3px solid black">
                    <td>Price Per Attempt</td>
                    <td>How much is the worth of 1 question when it is attempted by 1 student, 1 time. </td>
                </tr>
            </table>


            <br><br><hr>
            <p><b>Understanding The Pricing</b></p>
            <p><i>Price per attempt</i> is the term used to describe how much is the worth of 1 question when it is attempted 1 time.</p>
            <p>This price will be further broken down according to each individual roles, to see how much each contributor gets from that attempt.
                If say 1 person contributed 14% (2/14) of a 1.2 cent question (price per attempt = 1.2 cent), then this contributor will get 0.17 cent for that attempt. The contribution breakdown
                is as shown:</p>
            <ul>
                <li><p>Creator : 9/14</p></li>
                <li><p>Uploader : 2/14</p></li>
                <li><p>Working Uploader : 2/14</p></li>
                <li><p>Translator : 1/14</p></li>
            </ul>

            <br>
            <div style="border:1px solid black; padding: 15px">
                <p>Just a side note - Eventhough the price is in terms of cent, but here at Studii, we value the power of accumulation. 'Sikit-sikit lama lama jadi bukit'.</p>
            </div>

            <br>
            <p>The price per attempt of each question varies according to the length, quality, and complexity of the question. After you have submitted your questions, Studii will
                go through them one by one to decide on its price per attempt. Ultimately, only Studii can decide the value of price per attempt.</p>


            <br><br><hr>
            <p id="advertising"><b>Rules</b></p>
            <p>Just a few rules to ensure Studii can grow sustainably and amazingly:</p>
{{--            <p>Currently, Studii operates fully on advertising. To put it simply, Studii channels the revenue that we get from advertising to the people who contributes--}}
{{--                to our library, as an appreciation towards that contribution.</p>--}}
{{--            <p>The thing with advertising is it <i>is not consistent</i>. Sometimes advertising returns good revenue, sometimes less. </p>--}}
{{--            <p>So, in order to remain sustainable as a service, Studii will implement this set of rules towards all of its content :</p>--}}
            <ol>
                <li><p style="margin:auto 1em">The price per attempt will be fully decided by Studii.</p></li>
                <br>
                <li><p style="margin:auto 1em">Studii has the right to put a max cap or limit on the compensation for contributors.</p></li>
                <br>
                <ul>
                    <li><p>This may happens if we find we are incapable of providing the compensation with more attempts.</p></li>
                    <li><p>If this happens, we will contact you personally. You will then decide to whether:</p></li>
                    <ul>
                        <li><p>Allow us to continue to serve the questions to students without the promise of compensation.</p></li>
                        <li><p>Hold the questions from the students.</p></li>
                    </ul>
                </ul>
                <br>
                <li><p style="margin:auto 1em">Ultimately, Studii can remove any content or contributors from this platform, if Studii decides it is the best for the growth of the platform. So, be kind :)</p></li>
            </ol>

            <br><br><hr>
        </div>
    </div>
    <p>Contact us at <b>019-209 9853</b> or at <b>studii.malaysia@gmail.com</b> for any inquiries (or anything else).</p>
    {{--    <p>By clicking this button below, you confirm that you agree with this agreement :</p>--}}
    {{--    <a class="btn btn-lg btn-primary float-right">I have read, understood, and agreed to this disclaimer</a>--}}


@endsection
