@include("kanpur.layout.indexheader")
<section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb">
                        <ul>
                            <li><a href="#">Sign Up</a></li>
                            <li class="active"><a href="#">Quiz</a></li>
                        </ul>
                    </div>
                    <h1 class="page-title">Kanpurize Quiz</h1>
                </div><!-- end /.col-md-12 -->
            </div><!-- end /.row -->
        </div><!-- end /.container -->
    </section>
<section class=" bgimage">
    <div class="bg_image_holder">
        <img src="{{ asset('images/back/quiz.jpg') }}" alt="kanpurize_quiz">
    </div>
    <!-- start hero-content -->
    <div class="hero-content hero-content1 content_above">
        <!-- start .contact_wrapper -->
        <div class="content-wrapper">
            <!-- start .container -->
            <div class="container" style="padding:50px;">
                <!-- start row -->
                <div class="row">
                <div class="col-md-8">
                   <div class="information_module quizmodel">
                   <form id="questionform" name="questionform" method="post">
                     {{ csrf_field() }}
                     <input type="hidden" name="newquestion_id" id="newquestion_id" value="{{ $quizques->id}}">
                   				<div class="quizhead">
                                    <span><span class="quizqus">Question:</span> 
                                    {{ $quizques->question}}</span>
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
                                             
                                    </div><!-- end /.information_wrapper -->
                                </div>
                                <div class="quizhead">
                                   <!-- <a class="btn btn--round btn--bordered btn-sm btn-secondary bttonlleft">Skip Question</a> -->
                                   <!-- <a class=""></a> -->
                                   <input type="submit" name="submit" id="submit" class="btn btn--round btn-sm bottonright" value="Next Question">
                                    </div>
                   </form>
                            </div>
                 </div>
                <div class="col-md-4">
               	</div>
            </div><!-- end /.row -->
            </div><!-- end /.container -->
        </div><!-- end .contact_wrapper -->
    <!-- end hero-content -->

</section>

@include("kanpur.layout.indexfooter")