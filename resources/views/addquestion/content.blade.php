<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css">

<script type="text/x-mathjax-config">
  MathJax.Hub.Config({tex2jax: {inlineMath: [['$','$'], ['\\(','\\)']]}});
</script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.5/MathJax.js?config=TeX-MML-AM_CHTML' async></script>

<style>
    .margin {
        margin:0.6em auto;
    }

    table {
        border-collapse: collapse;
    }

    table, th, td {
        border: 1px solid black;
        padding: 0.5em;
    }
</style>


<section class="hero is-primary">
    <div class="hero-body">
        <div class="container">
            <h1 class="title">
                Add Question (2)
            </h1>
        </div>
    </div>
</section>

<div class="section">
    <div class="container">
        <h1 class="title">
            Question Content!
        </h1>
        <div class="field">
            <div class="columns">
{{--                ------------ Display--}}
                <div class="column">
                    <div style="position: sticky; top:30px; min-height: 500px; background-color: #d4d9d6; padding:1em;">
                        <p id="display_1">
                            @if (isset($contents[0]))
                                {!! $contents[0]-> content !!}
                            @endif
                        </p>
                        <br>
                        @if ($image == 1)
                            <img src="/images/question_images/id-{{$id}}.jpg?n={{rand(1,10)}}" alt="question_image">
                        @endif
                        <br><br>
                        <p id="display_2">
                            @if (isset($contents[1]))
                                {!! $contents[1]-> content !!}
                            @endif
                        </p>
                        <div style="padding-left:20px;">

                            @for($k=2; $k<7; $k++)
                                <div>
                                    <p id="symbol_{{$k+1}}" style="width:5%; display: inline-block">@if (isset($contents[$k])) {!! $symbol_finished[$k] !!} @endif</p>
                                    <p id="display_{{$k+1}}" style="display: inline-block">@if (isset($contents[$k])) {!! $contents[$k]-> content !!} @endif</p>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>


{{--                ------------Form--}}
                <div class="column">
                    <form action="/question/add/save/content/{{request()->route('id')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="margin">
                            <label for="text_main_1">Content 1</label>
                            <textarea id="text_main_1" name="text_main_1" class="textarea" rows="2" onkeyup="text_change(1, this.value)">@if (isset($contents[0])) {{$contents[0]-> content}} @endif</textarea>
                        </div>
                        <div>
                            <label for="question_image"></label>
                            <input type="file" name="question_image" onchange="form.submit()">
                            <a href="/question/add/save/content/{{$id}}/remove" class="button is-pulled-right">Remove Image</a>
                        </div>
                        <div class="margin">
                            <label for="text_sub_1">Content 2</label>
                            <textarea id="text_sub_1" name="text_sub_1" class="textarea" rows="1"onkeyup="text_change(2, this.value)">@if (isset($contents[1])) {{$contents[1]-> content}} @endif</textarea>
                        </div>
                        <br>
                        <div style="margin-left: 5em;">

                            @for ($i=0; $i<=4; $i++)
                                <div class="margin">
                                    <label for="text_sub_{{$i+2}}">Sub {{$i+1}}</label>
                                    <select name="select{{$i+1}}" class="select" onchange="sym_change({{$i+3}}, this.options[this.selectedIndex].text)">
                                        @if (isset($contents[$i+2]) && $contents[$i+2] -> numbering != '0')
                                            <option value="{{$contents[$i+2] -> numbering}}">{{$symbol_finished[$i+2]}}</option>
                                        @endif
                                            <option value="0"> - </option>
                                            <option value="1">a)</option>
                                            <option value="2">b)</option>
                                            <option value="3">c)</option>
                                            <option value="4">d)</option>
                                            <option value="5">e)</option>
                                    </select>
                                    @if (isset($contents[$i+2]) && empty($contents[$i+3]))
                                        <a href="/question/add/save/content/{{$id}}/remove/{{$i+2}}">DELETE</a>
                                    @endif
                                    <textarea id="text_sub_{{$i+2}}" name="text_sub_{{$i+2}}" class="textarea" rows="1" onkeyup="text_change({{$i+3}}, this.value)">@if (isset($contents[$i+2])) {{$contents[$i+2]-> content}} @endif</textarea>
                                </div>
                            @endfor
                        </div>
                        <input type="submit" value="save" class="button is-large is-pulled-right">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <a href="/question/update/answer/{{$id}}" class="button is-large is-pulled-right" style="margin:2em">Go Add Answer</a>
</div>


<script type="text/javascript">
    function sym_change(x, symbol)   {
        let id = 'symbol_' + x;
        document.getElementById(id).innerHTML = symbol;
    }

    function text_change(x, text) {
        let id = 'display_' + x;
        document.getElementById(id).innerHTML = text;
        newTypeset();
    }

    function newTypeset(){
        MathJax.Hub.Queue(["Typeset",MathJax.Hub]);
    }
</script>
