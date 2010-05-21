<?php
$this->incView('include/page-top', false);
?>
<div id="dmain" class="full">
	<div id="dfilters">
		<span>
			<a href="<?php echo $this->fc->getUrl('task/edit');?>" class="ajax box new inv" title="Create single task">Create task</a>
			<a href="<?php echo $this->fc->getUrl('task/create');?>" class="ajax bigbox new multi inv" title="Create multiple tasks">Create multiple</a>
			<a href="javascript:reloadList()" class="new reload inv" title="Reload list">Reload</a>
		</span>
		<ul class="links horiz">
			<?php
			$arr = array('todo'=>0,'done'=>1,'valid'=>2,'archived'=>3);
			foreach($arr as $lbl => $val) {
				echo '<li';
				if ($this->filter == $val) {
					echo ' class="active"';
				}
				echo '><a href='.$this->fc->thisUrl(array('filter'=>$val)).'>'.$lbl.'</a></li>';
			}
			?>
		</ul>
		<ul class="links horiz">
			<?php
			$arr = array('compact'=>0,'expand'=>1);
			foreach($arr as $lbl => $val) {
				echo '<li';
				if ($this->expand == $val) {
					echo ' class="active"';
				}
				echo '><a href='.$this->fc->thisUrl(array('expand'=>$val)).'>'.$lbl.'</a></li>';
			}
			?>
		</ul>
		<ul class="links horiz">
			<?php
			$arr = array('10'=>10,'25'=>25,'50'=>50,'all'=>0);
			foreach($arr as $lbl => $val) {
				echo '<li';
				if ($this->limit == $val) {
					echo ' class="active"';
				}
				echo '><a href='.$this->fc->thisUrl(array('limit'=>$val)).'>'.$lbl.'</a></li>';
			}
			?>
		</ul>
		<form id="search" action="<?php $this->fc->thisUrl(); ?>" method="get">
			<p>
				<input type="text" name="search" value="<?php echo $this->search; ?>" tabindex="4" />
				<button type="submit" name="go" value="1">search</button>
				<button type="button" onclick="this.form.elements[0].value='';this.form.submit()">x</button>
			</p>
		</form>
	</div>
	<div id="dlist" class="tasks">
	<?php
		if ($this->expand) {
			$this->incView('include/list-expand');
		} else {
			$this->incView('include/list-compact');
		}
	?>
	</div>
</div>
<?php
$this->incView('include/page-bot', false);