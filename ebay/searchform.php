<?php

	/**
	* Lighting Fast Search
	**/
	if(isset($search) && isset($country) && isset($listType)&& isset($sort) && isset($_GET['seo_search'])=="GO")
	{
		$url = $path."/".$country."/".$search."/".$listType."/".$sort."/"; // Define the URL
		header("location: $url");
	}
	else if(isset($search) && isset($country) && isset($listType) && isset($_GET['seo_search'])=="GO")
	{
		$url = $path."/".$country."/".$search."/".$listType."/"; // Define the URL
		header("location: $url");
	}
	else if(isset($search) && isset($country) && isset($_GET['seo_search'])=="GO")
	{
		$url = $path."/".$country."/".$search."/"; // Define the URL
		header("location: $url");
	}
	
	/**
	* Selected Function ==> one small function can replace all unnecessary code <==
	**/
	function selected($flag)
	{
		global $country;
		
		if($country==$flag)
		{
			$selected = 'selected';
		}
		echo $selected;
	}
	
	function selectedSort($flagSort)
	{
		global $sort;
		
		if($sort==$flagSort)
		{
			$selectedSort = 'selected';
		}
		echo $selectedSort;
	}
	
	
?>
<form name="form1" method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-inline">
  <div class="form-group">
        <input type="text" name="search" class="form-control" value="<? echo str_replace("_", " ", $search); ?>" />
</div>
  <div class="form-group">

			<select name="country" class="form-control">
				<option value="USA"				<?selected('USA')?>				>USA</option>
				<option value="Canada" 			<?selected('Canada')?>			>Canada</option>
				<option value="Canada-French" 	<?selected('Canada-French')?>	>Canada(French)</option>
				<option value="United-Kingdom" 	<?selected('United-Kingdom')?>	>United Kingdom</option>
				<option value="Australia" 		<?selected('Australia')?>		>Australia</option>
				<option value="Austria" 		<?selected('Austria')?>			>Austria</option>
				<option value="Belgium-French" 	<?selected('Belgium-French')?>	>Belgium(French)</option>
				<option value="France" 			<?selected('France')?>			>France</option>
				<option value="Germany" 		<?selected('Germany')?>			>Germany</option>
				<option value="Italy" 			<?selected('Italy')?>			>Italy</option>
				<option value="Belgium-Dutch" 	<?selected('Belgium-Dutch')?>	>Belgium(Dutch)</option>
				<option value="Netherlands" 	<?selected('Netherlands')?>		>Netherlands</option>
				<option value="Spain" 			<?selected('Spain')?>			>Spain</option>
				<option value="Switzerland" 	<?selected('Switzerland')?>		>Switzerland</option>
				<option value="Ireland" 		<?selected('Ireland')?>			>Ireland</option>
			</select>
	</div>
  <div class="form-group">
			<select name="sort" class="form-control">
				<option value="BestMatch"		<?selectedSort('BestMatch')?>	>Best Match</option>
				<option value="EndingSoon" 	<?selectedSort('EndingSoon')?>	>Ending Soon</option>
				<option value="NewlyListed" <?selectedSort('NewlyListed')?>	>Newly Listed</option>
				<option value="LowestPrice" 	<?selectedSort('LowestPrice')?>		>Lowest Price</option>
				<option value="HighestPrice" 	<?selectedSort('HighestPrice')?>	>Highest Price</option>
			</select>
</div>
        <input type="submit" value="Find Auctions" class="btn btn-primary" name="seo_search" />
      </form>

