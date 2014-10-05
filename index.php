<?php

function generate_random_phrase() {
  $words = get_words();
  $number_of_words = get_word_count();
  $phrase = ""; 
  $symbols = "!@#$%^&*()";
  for ($i = 0;$i < $number_of_words;$i++)
    $phrase .= " ".$words[$i];

  if (isset($_POST['include_numbers']))
    $phrase = $phrase.rand(0, 9);

  if (isset($_POST['include_symbols']))
    $phrase = $phrase.$symbols[rand(0, 9)];

  return $phrase;
}

function get_word_count() {
  if ($_POST['word_count'] < 1 || $_POST['word_count'] > 9) 
    $word_count = 4; #default
  else
    $word_count = $_POST['word_count'];
  return $word_count;
}

function get_words() {

  $BASE_WORDS = "my sentence really hope you like narwhales bacon at midnight but only ferver where can paper laptops spoon door knobs head phones watches barbeque not say";
  $words = explode(' ', $BASE_WORDS);
  shuffle($words);
  return $words;
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>xkcd Password Generator</title>
  </head>
  <body>
    <h1>xkcd Password Generator</h1>
    <p class="password"><?php echo generate_random_phrase() ?></p>

    <form action="index.php" method="POST">
      <label for="word_count">Number of words? (Max-9)</label>
      <input id="word_count" type="text" value="" name="word_count"
        maxlength="1">
      <br>

      <input id="include_numbers" type="checkbox" name="include_numbers">
      <label for="include_numbers">Include a number in the password?</label>
      <br>

      <input id="include_symbols" type="checkbox" name="include_symbols">
      <label for="include_symbols">Include a symbol in the password?</label>

      <input class="generate-btn" type="submit" value="Generate new password">
    </form>
  </body>
</html>

