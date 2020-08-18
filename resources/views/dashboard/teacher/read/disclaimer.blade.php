@extends('dashboard.teacher.read.instructionApp')

@section('headline')
    <p style="font-size:2.4em; font-family: 'rubik', sans-serif;">How Studii calculates your earnings?</p>
@endsection

@section('contents')
    <div class="row" style="font-family: 'rubik', sans-serif;">
{{--        <div class="col-lg-12">--}}
{{--            <p><b>Disclaimer</b></p>--}}
{{--            <p>Studii gives compensation to the contributors (the teachers) everytime their contributions (exercise questions) are attempted.</p>--}}
{{--            <p>In the endgame, Studii is built to help everybody, the students and the teachers.</p>--}}
{{--            <p>However, it is important for us to make clear a few things. Those are:</p>--}}
{{--            <br>--}}
{{--            <ol style="font-size:1.3em">--}}
{{--                <li>The price per attempt (meaning : how much contributors get for every attempt) are fully decided by Studii.</li>--}}
{{--                    <br>--}}
{{--                <li>Studii has the right to put a limit on compensation for contributors.</li>--}}
{{--                    <br>--}}
{{--                <ul>--}}
{{--                    <li>This may happen if there is any financial constraint that will put Studii at difficulty.</li>--}}
{{--                    <li>If so, we will contact the contributors personally. The contributors may decide if they want to stop serving the questions, or allow it--}}
{{--                    to be served without compensation.</li>--}}
{{--                </ul>--}}
{{--            </ol>--}}
{{--        </div>--}}
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
                    <td>A question is of many roles (or parts) - creator, uploader, working, & translator. The term <i>Contributors</i> refer to all of these
                    roles.</td>
                </tr>
                <tr>
                    <td>Creator</td>
                    <td>The person who creates the question. To know more, read about creator <a href="/about/teacher/compensation-for-contributors#creator" target="_blank">here</a>.</td>
                </tr>
                <tr>
                    <td>Uploader</td>
                    <td>The person who uploads the question to Studii. One person can fill multiple roles.
                        To know more, read about uploader <a href="/about/teacher/compensation-for-contributors#uploader" target="_blank">here</a>.</td>
                </tr>
                <tr>
                    <td>Working Uploader</td>
                    <td>The person who uploads the working of the question to Studii. One person can fill multiple roles.
                        To know more, read about working uploader <a href="/about/teacher/compensation-for-contributors#working-uploader" target="_blank">here</a>.</td>
                </tr>
                <tr>
                    <td>Translator</td>
                    <td>The person who translates the question into another language. One person can fill multiple roles.
                        To know more, read about translator <a href="/about/teacher/compensation-for-contributors#translator" target="_blank">here</a>.</td>
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
            If say 1 person contributed 15% (2/13) of a 0.2 cent question (price per attempt = 0.2 cent), then this contributor will get 0.03 cent. The contribution breakdown
            is as shown:</p>
            <ul>
                <li><p>Creator : 8/13</p></li>
                <li><p>Uploader : 2/13</p></li>
                <li><p>Working Uploader : 2/13</p></li>
                <li><p>Translator : 1/13</p></li>
            </ul>

                <br>
            <div style="border:1px solid black; padding: 15px">
                <p>Just a side note - Eventhough the price is in terms of cent, but here at Studii, we value the power of accumulation. Sikit-sikit lama lama jadi bukit.
                Given sufficient amount of traffic, Studii expects to compensate active contributors of an amount around RM500 a month (based on our traffic target in 1 year).</p>
                <p>Also, this is a passive income. Once the traffic comes, you just need to adjust a few things to make sure your contributions stay relevant with the current
                syllabus.</p>
            </div>

            <br>
            <p>Price per attempt varies according to the length, quality, and complexity of the question. After you have submitted your questions, Studii will
            go through them one by one to decide on its price per attempt. Ultimately, only Studii can decide the value of price per attempt.</p>


                <br><br><hr>
            <p id="advertising"><b>Disclaimer - Studii and Advertising</b></p>
            <p>Currently, Studii operates fully on advertising. To put it simply, Studii channels the revenue that we get from advertising to the people who contributes
                to our library, as an appreciation towards that contribution.</p>
            <p>The thing with advertising is it <i>is not consistent</i>. Sometimes advertising returns good revenue, sometimes less. </p>
            <p>So, in order to remain sustainable as a service, Studii will implement this set of rules towards all of its content :</p>
            <ol>
                <li><p style="margin:auto 1em">The price per attempt are fully decided by Studii.</p></li>
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
                <li><p style="margin:auto 1em">Studii can gives the contributors bonus compensation, to reward active contributors, if there are surplass from advertising.</p></li>
                    <br>
                <li><p style="margin:auto 1em">Ultimately, Studii can remove any content or contributors from this platform, if Studii decides it is the best for the growth of the platform.</p></li>
            </ol>

            <br><br><hr>
        </div>
    </div>
    <p>Contact us at <b>019-209 9853</b> or at <b>studii.malaysia@gmail.com</b> for any inquiries (or anything else).</p>
{{--    <p>By clicking this button below, you confirm that you agree with this agreement :</p>--}}
{{--    <a class="btn btn-lg btn-primary float-right">I have read, understood, and agreed to this disclaimer</a>--}}


@endsection
