<form id="block_form_or" name="block_form_or" method="post">
     <div class="modal-body" >
     {{ csrf_field() }}
       <input type="hidden" name="newquestion_id" id="newquestion_id" value="{{ $quizques->id}}">
                   				<div class="quizhead" >
                                    <span><span class="quizqus">Question:</span>  {{ $quizques->question}}</span>
                                    </div>
                                <div class="information__set infoset mail_setting toggle_module collapse in" id="collapse4" aria-expanded="true" style="">
                                    <div class="information_wrapper">
                                   @if(count($quizques->answerserve)>0)
                                            @foreach($quizques->answerserve as $option)
                                    <div class="custom-radio">
                                                    <input type="radio" id="answer{{ $option->id}}" class="" value="{{ $option->id}}" name="newquestionanswer_id">
                                                    <label for="answer{{ $option->id}}"><span class="circle"></span>{{ $option->option1}}</label>
                                                </div>

                                                @endforeach
                                            @endif
                                               
                                               

                                    </div>
                                </div>                
</div>
<div class="modal-footer">
    <button type="button" id="upload_filecloud" class="btn btn--round btn-sm bottonright" onclick="submit_quiz();">Next Question</button>
</div>
</form>
