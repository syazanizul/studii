<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css">

<section class="hero is-primary">
    <div class="hero-body">
        <div class="container">
            <h1 class="title">
                Add Question (1)
            </h1>

        </div>
    </div>
</section>

<div class="section">
    <div class="container">
        <h1 class="title">1. Question Properties.</h1>
        <div>
            <div class="columns">
                <div class="column is-three-fifths">
                    <form method="post" action="/question/add/save/property">
                        @csrf
                        <div class="field">
                            <label for="s_subject" >Subject</label>
                            <select name="s_subject" id="s_subject">
                                @foreach ($subjects as $subject)
                                    <option value="{{$subject -> id}}">{{$subject -> name}}</option>
                                @endforeach
                            </select>
                            <br>
                        </div>
                        <div class="field">
                            <label for="s_level" >level</label>
                            <select name="s_level" id="s_level">
                                @foreach ($levels as $level)
                                    <option value="{{$level -> id}}">{{$level -> name}}</option>
                                @endforeach
                            </select>
                            <br>
                        </div>
                        <div class="field">
                            <label for="s_chapter" >Chapter</label>
                            <select name="s_chapter" id="s_chapter">
                                @foreach ($chapters as $chapter)
                                    <option value="{{$chapter -> id}}">{{$chapter -> name}}</option>
                                @endforeach
                            </select>
                            <br>
                        </div>
{{--                        <div class="field">--}}
{{--                            <label for="s_source" >Source</label>--}}
{{--                            <select name="s_source" id="s_source">--}}
{{--                                @foreach ($sources as $source)--}}
{{--                                    <option value="{{$source -> id}}">{{$source -> name}}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                            <br>--}}
{{--                        </div>--}}
                        <div class="field">
                            <label for="s_paper" >Paper</label>
                            <select name="s_paper" id="s_paper">
                                <option value="1">Paper 1</option>
                                <option value="2">Paper 2</option>
                                <option value="3">Paper 3</option>
                            </select>
                            <br>
                        </div>
{{--                        <div class="field">--}}
{{--                            <label for="s_year" >Year</label>--}}
{{--                            <input name="s_year" type="number" max="2019" min="2010" required>--}}
{{--                            <br>--}}
{{--                        </div>--}}
                        <div class="field">
                            <label for="s_difficulty" >Difficulty</label>
                            <select name="s_difficulty" id="s_difficulty">
                                <option value="1">1 Ez</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5 Hardest</option>
                            </select>
                            <br>
                        </div>
                        <input class="button" type="submit" value="Save Property!">
                    </form>
                </div>
                <div class="column is-one-fifths">
                    <h3 class="title">Add new property</h3>
                    <div class="field">
                        <form method="post" action="/question/add/newproperty/1">
                            @csrf
                            <p>Add into -> Subject</p>
                            <input class="" type="text" name="thing" value="">
                            <br><input class="button" type="submit">
                        </form>
                    </div>
                    <div class="field">
                        <form method="post" action="/question/add/newproperty/2">
                            @csrf
                            <p>Add into -> Chapter</p>
                            <select>
                                @foreach ($subjects as $subject)
                                    <option value="{{$subject -> id}}">{{$subject -> name}}</option>
                                @endforeach
                            </select>
                            <select name="level">
                                <option value="1">Form 4</option>
                                <option value="2">Form 5</option>
                            </select>
                            <input class="" type="text" name="thing" value="">
                            <br><input class="button" type="submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

