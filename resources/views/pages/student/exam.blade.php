@extends('layouts.app')

@section('content')
<div class="container">
  <div id="quiz">
    <div class="quiz-header">
      <h1>Custom Results Screen Quiz Demo</h1>
      <p><a class="quiz-home-btn">Home</a></p>
    </div>
    <div class="quiz-start-screen">
      <p><a href="#" class="quiz-start-btn quiz-button">Start</a></p>
    </div>
    <!-- You can just specify your own quiz results container. -->
    <!-- Must match the default class or specify your own in the config (resultsScreen). -->
    <div class="quiz-results-screen">
      <h3>Thank You!</h3>
      <p class="quiz-results"></p>
      <form id="results-form">
        <p>
          <label for="email">Email</label>
          <input type="email" name="email">
        </p>
        <p><button type="submit">Submit</button></p>
      </form>
    </div>
  </div>
</div>

@endsection
@section('scripts')
<script>
  $(document).ready(function() {
    $('#results-form').on('submit', function(e) {
      e.preventDefault();
      $(this).remove();
      console.log('Do Ajax Submit');
    });

    var questions = @json($questions);
    console.log(questions);
    $('#quiz').quiz({
      counterFormat: 'Question %current of %total',
      questions: questions.map(function(question) {
        var qText = question.descriptions;
        if (question.resourse) {
          qText = '<img src="{{ asset("mcq") }}/' + question.resourse + '" class="w-100 mx-auto" style="max-width:650px" /><br />' + qText;
        }
        return {
          'q': qText,
          'options': [
            question.q1,
            question.q2,
            question.q3,
            question.q4
          ],
          'correctIndex': question.answer - 1,
          'correctResponse': 'Custom correct response.',
          'incorrectResponse': 'Custom incorrect response.'
        };
      })
    });
  });
</script>



@endsection