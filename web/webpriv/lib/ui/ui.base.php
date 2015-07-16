
<?php
	//requires
	require_once("/webpriv/lib/util/util.base.php");
?>


<?php
	
	function start_tag(string $tagname)
	{
		if (! $GLOBALS['started_tag'])
		{
			$GLOBALS['started_tag'] = true;
			echo "<$tagname";
			return false;
		}
		else
		{
			$GLOBALS['ui_error'] = "start_tag failed because a tag was already started";
			return true;
		}
	}
	
	function close_start_tag()
	{
		if ($GLOBALS['started_tag'])
		{
			echo ">";
			$GLOBALS['started_tag'] = false;
			return false;
		}
		else
		{
			$GLOBALS['ui_error'] = "close_start_tag failed because no tag started";
			return true;
		}
		
	}
	
	function add_tag_attribute(string $attribute, string $value)
	{
		if ($GLOBALS['started_tag'])
		{
			echo "$attribute=\"$value\"";
			return false;
		}
		else
		{
			$GLOBALS['ui_error'] = "add_tag_attribute failed because no tag started";
			return true;
		}
	}
	
	function close_start_tag_no_body()
	{
		if ($GLOBALS['started_tag'])
			echo "/>";
		$GLOBALS['started_tag'] = false;
	}
	
	function end_tag(string $tagname)
	{
		echo "</$tagname>";
	}

	function start_html_doc()
	{
		echo "<!DOCTYPE html>" . newline();
		start_tag("html");
		close_start_tag("html");
	}
	
	function end_html_doc()
	{
		echo "</html>";
	}
	
	
	
	
	
?>
