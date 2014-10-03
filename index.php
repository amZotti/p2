<?php
   $_POST[word_count];

  function generate_random_phrase() {
    $words = get_words();
    $number_of_words = 4;
    $phrase = ""; 
    for ($i = 0; $i < $number_of_words; $i++) {
      $word = $words[array_rand($words)];
      $phrase = $phrase." ".$word;
    } 
    return $phrase;
  }

  function get_words() {
    $BASE_WORDS = "this is my sentence and I really hope you 
	like it the narwhales bacon at midnight but only in 
	ferver where can paper laptops spoon door knobs 
	head phones watches";
    $words = explode(' ', $BASE_WORDS);
    return $words;
  }
?>

<html>
	<head>
		<title>xkcd Password Generator</title>
	</head>
	<body>
		<h1>xkcd Password Generator</h1>
		<p class="password"><?php echo generate_random_phrase() ?></p>
		
		<form action="index.php" method="POST">
			<label for="word_count">Number of words? (Max-9)</label>
			<input id="word_count" type="text" value="" name="word_count"
				maxlength="1"></input>
			<br>

			<input id="include_numbers" type="checkbox" name="include_numbers"></input>
			<label for="include_numbers">Include a number in the password?</label>
			<br>

			<input id="include_symbols" type="checkbox" name="include_symbols"></input>
			<label for="include_symbols">Include a symbol in the password?</label>
		
			<input class="generate-btn" type="submit" value="Generate new password"></input>
		</form>
	</body>
</html>
			