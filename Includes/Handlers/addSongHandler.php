<?php 


	function sanitizeFormString($text)
	{
		$text = strip_tags($text);
		return $text;

	}

	if(isset($_POST['addSong']))
  	{
    	//echo "Everything is okey, now...";
    	$Artist = sanitizeFormString($_POST['artist']);
        $Duration = sanitizeFormString($_POST['duration']);
        $Genre = sanitizeFormString($_POST['genre']);
        $Playlist = sanitizeFormString($_POST['playlist']);
        if($_FILES['musicFile']['tmp_name'] != "")
        {

            $File = ($_FILES['musicFile']);


        	$addingSuccess = $account->addSong($File, $Artist, $Duration, $Genre, $Playlist);

        	if($addingSuccess == true)
        	{
        		
        		return true;
        	}
        	else
        	{
        		return false;
        	}
        }
        else
        {
            return;
        }
  	}
    else
    {
        return;
    }

?>