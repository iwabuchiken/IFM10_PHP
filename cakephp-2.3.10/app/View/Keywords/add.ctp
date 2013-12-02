<!-- File: /app/View/Posts/add.ctp -->

<h1>Add Post</h1>
<?php
echo $this->Form->create('Keyword');
//echo $this->Form->create('Post');
echo $this->Form->input('name');
//echo $this->Form->hidden('created');


echo $this->Form->end('Save keyword');
?>

<br>
<form action="/IFM10_PHP/cakephp-2.3.10/keywords/add"
      id="KeywordAddForm"
      method="post"
      accept-charset="utf-8">
    <div style="display:none;">
	<input type="hidden" name="_method" value="POST"/>
    </div>
    <div class="input text required">
	<label for="KeywordName">Name</label>
	<input name="data[Keyword][name]" maxlength="50" type="text" id="KeywordName" required="required"/>
    </div>
    <div class="submit">
	<input  type="submit" value="Save keyword"/>
    </div>
</form>

<?php echo $this->Html->link(
    'List',
    array('controller' => 'keywords', 'action' => 'index')
); ?>
