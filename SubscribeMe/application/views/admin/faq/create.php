<h2>Create a faq item</h2>

<?php echo validation_errors(); ?>

<?php echo form_open('faq/create') ?>

	<label for="question">Question</label> 
	<input type="input" name="question" /><br />

	<label for="answer">Answer</label>
	<textarea name="answer"></textarea><br />
	
	<input type="submit" name="submit" value="Create faq item" /> 

</form>