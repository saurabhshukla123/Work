<?php

class pagging
{
	/* These are defaults */

	var $TotalResults;
	var $CurrentPage = 1;
	var $PageVarName = "pageno";
	var $ResultsPerPage = 10;
	var $LinksPerPage = 20;
	var $PaggingMethod = "get";
	var $StartOffset = "";
	var $EndOffset = "";

	function Redirect($url)
	{
		unset($_GET['pageno']);
		foreach ($_GET as $key => $value) {
			$pagging_vars.= "&" . $key . "=" . $value;
		}
		$pagging_vars = ltrim($pagging_vars, '&');
		@header("Location: ?" . $pagging_vars);
		exit;
	}

	function __construct($ResultsPerPage, $PaggingMethod = "get")
	{
		$this->ResultsPerPage = $ResultsPerPage;
		$this->PaggingMethod = $PaggingMethod;
	}

	function InfoArray()
	{
		$this->TotalPages = $this->getTotalPages();
		$this->CurrentPageName = $this->CurrentPageName();
		$this->CurrentPage = (isset($attribute['CURRENT_PAGE'])) ? $attribute['CURRENT_PAGE'] : $this->getCurrentPage();

		// Set the starting offset

		if ($this->CurrentPage <= 0)
		{
			$this->Redirect('?' . $pagging_vars);
		}
		if (($this->CurrentPage > $this->TotalPages) && ($this->TotalResults != 0))
		{
			$this->CurrentPage = 1;
			// Temporary commented for displaying two grid in a page
			//$this->Redirect('?'.$pagging_vars);
		}
		if (($this->CurrentPage == 1 && $this->TotalResults > 0))
		{
			$this->StartOffset = 1;
		}
		elseif ($this->CurrentPage == 1 && $this->TotalResults == 0)
		{
			$this->StartOffset = 0;
		}
		else
		{
			$this->StartOffset = $this->getStartOffset() + 1;
		}

		// Set the ending offset
		if ($this->CurrentPage == $this->TotalPages)
		{
			$this->EndOffset = $this->TotalResults;
		}
		else if ($this->CurrentPage == 1)
		{
			$this->EndOffset = $this->getEndOffset();
		}
		else
		{
			$this->EndOffset = $this->getEndOffset() + 1;
		}

		$this->ResultArray = array(
			"PREV_PAGE" => $this->getPrevPage(),
			"NEXT_PAGE" => $this->getNextPage(),
			"CURRENT_PAGE" => $this->CurrentPage,
			"CURRENT_PAGE_NAME" => $this->CurrentPageName,
			"TOTAL_PAGES" => $this->TotalPages,
			"TOTAL_RESULTS" => $this->TotalResults,
			"PAGE_NUMBERS" => $this->getNumbers(),
			"MYSQL_LIMIT1" => $this->getStartOffset(),
			"MYSQL_LIMIT2" => $this->ResultsPerPage,
			"START_OFFSET" => $this->StartOffset,
			"END_OFFSET" => $this->EndOffset,
			"RESULTS_PER_PAGE" => $this->ResultsPerPage,
		);

		return $this->ResultArray;
	}

	/* Start information functions */

	function getTotalPages()
	{
		/* Make sure we don't devide by zero */

		if ($this->TotalResults != 0 && $this->ResultsPerPage != 0)
		{
			$result = ceil($this->TotalResults / $this->ResultsPerPage);
		}
		/* If 0, make it 1 page */
		if ((isset($result) && $result == 0) || !isset($result))
		{
			return 1;
		}
		else
		{
			return $result;
		}
	}

	function getStartOffset()
	{
		$offset = $this->ResultsPerPage * ($this->CurrentPage - 1);

		/* if($offset != 0)
		  {
		  //$offset++;
		  }
		 */

		return $offset;
	}

	function getEndOffset()
	{
		if ($this->getStartOffset() > ($this->TotalResults - $this->ResultsPerPage))
		{
			$offset = $this->TotalResults;
		}
		elseif ($this->getStartOffset() != 0)
		{
			$offset = $this->getStartOffset() + $this->ResultsPerPage - 1;
		}
		else
		{
			$offset = $this->ResultsPerPage;
		}
		return $offset;
	}

	function getCurrentPage()
	{
		if (isset($_GET[$this->PageVarName]) && $_GET[$this->PageVarName] != '' && $_GET[$this->PageVarName] != 0)
		{
			return $_GET[$this->PageVarName];
		}
		else if (isset($_POST[$this->PageVarName]) && $_POST[$this->PageVarName] != '' && $_POST[$this->PageVarName] != 0)
		{
			return $_POST[$this->PageVarName];
		}
		else
		{
			return $this->CurrentPage;
		}
	}

	function CurrentPageName()
	{
		if ($_REQUEST['role_id'] != '')
		{
			//	$concate_url='&role_id='.$_REQUEST['role_id'];
		}
		return $_REQUEST['page'] . $concate_url;
	}

	function CurrentPageRequest()
	{
		return $_REQUEST['page'];
	}

	function getPrevPage()
	{
		if ($this->CurrentPage > 1)
		{
			return $this->CurrentPage - 1;
		}
		else
		{
			return false;
		}
	}

	function getNextPage()
	{
		if ($this->CurrentPage < $this->TotalPages)
		{
			return $this->CurrentPage + 1;
		}
		else
		{
			return false;
		}
	}

	function getStartNumber()
	{
		$links_per_page_half = $this->LinksPerPage / 2;
		/* See if curpage is less than half links per page */
		if ($this->CurrentPage <= $links_per_page_half || $this->TotalPages <= $this->LinksPerPage)
		{
			return 1;
			/* See if curpage is greater than TotalPages minus Half links per page */
		}
		elseif ($this->CurrentPage >= ($this->TotalPages - $links_per_page_half))
		{
			return $this->TotalPages - $this->LinksPerPage + 1;
		}
		else
		{
			return $this->CurrentPage - $links_per_page_half;
		}
	}

	function getEndNumber()
	{
		if ($this->TotalPages < $this->LinksPerPage)
		{
			return $this->TotalPages;
		}
		else
		{
			return $this->getStartNumber() + $this->LinksPerPage - 1;
		}
	}

	function getNumbers()
	{
		for ($i = $this->getStartNumber(); $i <= $this->getEndNumber(); $i++) {
			$numbers[] = $i;
		}
		return $numbers;
	}

	function print_pagging($extra_vars = "", $style = 1)
	{

		/* Print out our prev link */
		if ($style == 1)
		{
			$previous_link_name = "Newer";
			$next_link_name = "Older";
		}
		else if ($style == 2)
		{
			$previous_link_name = "<<";
			$next_link_name = ">>";
		}
		$InfoArray = $this->InfoArray();
		if ($InfoArray["PREV_PAGE"])
		{
			//		$ret .= "<a class='link-pre-next' href='?page=".$InfoArray["CURRENT_PAGE_NAME"]."&pageno=" . $InfoArray["PREV_PAGE"] . $extra_vars."'>".$previous_link_name."</a>";
		}


		if ($InfoArray["NEXT_PAGE"])
		{
			//		$ret .= " <a class='link-pre-next' href='?page=".$InfoArray["CURRENT_PAGE_NAME"]."&pageno=" . $InfoArray["NEXT_PAGE"] . $extra_vars."'>".$next_link_name."</a>";
		}

		if ($style == 3)
		{



			unset($extra_vars['page']);
			unset($extra_vars['pageno']);
			unset($extra_vars['internal']);

			foreach ($extra_vars as $key => $value) {
				unset($extra_vars['pageno']);
				$pagging_vars.= "&" . $key . "=" . $value;
			}

			$InfoArray = $this->InfoArray();

			if ($this->PaggingMethod == "post")
			{
				/* Print out our prev link */
				if ($InfoArray["PREV_PAGE"])
				{

					$ret.="<a class='link-pre-next' href=javascript:submitPage('" . $InfoArray["PREV_PAGE"] . "')> << </a>";
				}
				else
				{
					//	$ret.="Previous";
				}

				$ret.= "  ";

				if ($InfoArray["CURRENT_PAGE"] != 1)
				{
					//	  $ret= "<a class='link-pre-next' href='?page=".$InfoArray["CURRENT_PAGE_NAME"]."&pageno=1".$extra_vars."'>&lt;&lt;</a> ";
				}
				else
				{
					//  $ret="&lt;&lt; ";
				}

				for ($i = 0; $i < count($InfoArray["PAGE_NUMBERS"]); $i++) {
					if ($InfoArray["CURRENT_PAGE"] == $InfoArray["PAGE_NUMBERS"][$i])
					{
						$ret.="<a style=\"color:#565656;font-weight:bold;background-color:#CCC;font-size:14px;color:black;\" >" . $InfoArray["PAGE_NUMBERS"][$i] . "</a> ";
					}
					else
					{
						$ret.="<a class='link-pre-next' href=javascript:submitPage('" . $InfoArray["PAGE_NUMBERS"][$i] . "')>" . $InfoArray["PAGE_NUMBERS"][$i] . "</a>  ";
					}
				}



				/* Print out our next link */
				if ($InfoArray["NEXT_PAGE"])
				{
					$ret.= " <a class='link-pre-next' href=javascript:submitPage('" . $InfoArray["NEXT_PAGE"] . "')> >> </a>";
				}
				else
				{
					//  $ret.="Next";
				}

				/* Print our last link */
				if ($InfoArray["CURRENT_PAGE"] != $InfoArray["TOTAL_PAGES"])
				{
					//	$ret.=" <a class='link-pre-next' href='?page=".$InfoArray["CURRENT_PAGE_NAME"]."&pageno=" . $InfoArray["TOTAL_PAGES"] . $extra_vars."'>>></a>";
				}
				else
				{
					// $ret.=" &gt;&gt;";
				}
			}
			else
			{
				/* Print out our prev link */
				if ($InfoArray["PREV_PAGE"])
				{
					$pagging_vars = $this->pageList($pagging_vars, $InfoArray["PREV_PAGE"]);
					$ret.="<a class='link-pre-next' href='?pageno=" . $InfoArray["PREV_PAGE"] . "&page=" . $InfoArray["CURRENT_PAGE_NAME"] . $pagging_vars . "'> << </a>";
				}
				else
				{
					//	$ret.="Previous";
				}

				$ret.= "  ";

				if ($InfoArray["CURRENT_PAGE"] != 1)
				{
					//	  $ret= "<a class='link-pre-next' href='?page=".$InfoArray["CURRENT_PAGE_NAME"]."&pageno=1".$extra_vars."'>&lt;&lt;</a> ";
				}
				else
				{
					$ret = "<span class='disabled'> &lt;&lt; </span> ";
				}

				for ($i = 0; $i < count($InfoArray["PAGE_NUMBERS"]); $i++) {
					if ($InfoArray["CURRENT_PAGE"] == $InfoArray["PAGE_NUMBERS"][$i])
					{
						$ret.="<a style=\"color:#565656;font-weight:bold;background-color:#CCC;font-size:14px;color:black;\" >" . $InfoArray["PAGE_NUMBERS"][$i] . "</a> ";
					}
					else
					{
						$pagging_vars = $this->pageList($pagging_vars, $InfoArray["PAGE_NUMBERS"][$i]);
						$ret.="<a class='link-pre-next' href='?pageno=" . $InfoArray["PAGE_NUMBERS"][$i] . "&page=" . $InfoArray["CURRENT_PAGE_NAME"] . $pagging_vars . "'>" . $InfoArray["PAGE_NUMBERS"][$i] . "</a>  ";
					}
				}



				/* Print out our next link */
				if ($InfoArray["NEXT_PAGE"])
				{
					$pagging_vars = $this->pageList($pagging_vars, $InfoArray["NEXT_PAGE"]);
					$ret.= " <a class='link-pre-next' href='?pageno=" . $InfoArray["NEXT_PAGE"] . "&page=" . $InfoArray["CURRENT_PAGE_NAME"] . $pagging_vars . "'> >> </a>";
				}
				else
				{
					//  $ret.="Next";
				}

				/* Print our last link */
				if ($InfoArray["CURRENT_PAGE"] != $InfoArray["TOTAL_PAGES"])
				{
					//	$ret.=" <a class='link-pre-next' href='?page=".$InfoArray["CURRENT_PAGE_NAME"]."&pageno=" . $InfoArray["TOTAL_PAGES"] . $extra_vars."'>>></a>";
				}
				else
				{
					$ret.="<span class='disabled'> &gt;&gt; </span>";
				}
			}
		}
		return $ret;
	}

	function print_ajax_pagging($extra_vars = "", $style = 1, $funcName = "")
	{
		if ($funcName == "")
		{
			$CallFunction = 'doCallAjax';
		}
		else
		{
			$CallFunction = $funcName;
		}

		/* Print out our prev link */
		if ($style == 1)
		{
			$previous_link_name = "Newer";
			$next_link_name = "Older";
		}
		else if ($style == 2)
		{
			$previous_link_name = "<<";
			$next_link_name = ">>";
		}
		$InfoArray = $this->InfoArray();
		if ($InfoArray["PREV_PAGE"])
		{
			//		$ret .= "<a class='link-pre-next' href='?page=".$InfoArray["CURRENT_PAGE_NAME"]."&pageno=" . $InfoArray["PREV_PAGE"] . $extra_vars."'>".$previous_link_name."</a>";
		}


		if ($InfoArray["NEXT_PAGE"])
		{
			//		$ret .= " <a class='link-pre-next' href='?page=".$InfoArray["CURRENT_PAGE_NAME"]."&pageno=" . $InfoArray["NEXT_PAGE"] . $extra_vars."'>".$next_link_name."</a>";
		}

		if ($style == 3)
		{



			unset($extra_vars['page']);
			unset($extra_vars['pageno']);
			unset($extra_vars['internal']);

			foreach ($extra_vars as $key => $value) {
				unset($extra_vars['pageno']);
				$pagging_vars.= "&" . $key . "=" . $value;
			}

			$InfoArray = $this->InfoArray();

			if ($this->PaggingMethod == "post")
			{
				/* Print out our prev link */



				if ($InfoArray["PREV_PAGE"])
				{
					$ret.="<a class='link-pre-next' href=\"javascript:" . $CallFunction . "('" . $InfoArray["PREV_PAGE"] . "','" . $extra_vars . "')\"> << </a>";
				}
				else
				{
					//	$ret.="Previous";
				}

				$ret.= "  ";

				if ($InfoArray["CURRENT_PAGE"] != 1)
				{
					//	  $ret= "<a class='link-pre-next' href='?page=".$InfoArray["CURRENT_PAGE_NAME"]."&pageno=1".$extra_vars."'>&lt;&lt;</a> ";
				}
				else
				{
					$ret = "<span class='disabled'> &lt;&lt; </span> ";
				}

				for ($i = 0; $i < count($InfoArray["PAGE_NUMBERS"]); $i++) {

					if ($InfoArray["CURRENT_PAGE"] == $InfoArray["PAGE_NUMBERS"][$i])
					{
						$ret.="<a style=\"color:#565656;font-weight:bold;background-color:#CCC;font-size:14px;color:black;\" >" . $InfoArray["PAGE_NUMBERS"][$i] . "</a> ";
					}
					else
					{
						$ret.="<a class='link-pre-next' href=\"javascript:" . $CallFunction . "('" . $InfoArray["PAGE_NUMBERS"][$i] . "','" . $extra_vars . "')\">" . $InfoArray["PAGE_NUMBERS"][$i] . "</a>  ";
					}
				}



				/* Print out our next link */
				if ($InfoArray["NEXT_PAGE"])
				{
					$ret.= " <a class='link-pre-next' href=\"javascript:" . $CallFunction . "('" . $InfoArray["NEXT_PAGE"] . "','" . $extra_vars . "')\"> >> </a>";
				}
				else
				{
					//  $ret.="Next";
				}

				/* Print our last link */
				if ($InfoArray["CURRENT_PAGE"] != $InfoArray["TOTAL_PAGES"])
				{
					//	$ret.=" <a class='link-pre-next' href='?page=".$InfoArray["CURRENT_PAGE_NAME"]."&pageno=" . $InfoArray["TOTAL_PAGES"] . $extra_vars."'>>></a>";
				}
				else
				{
					$ret.="<span class='disabled'> &gt;&gt; </span>";
				}
			}
			else
			{
				/* Print out our prev link */
				if ($InfoArray["PREV_PAGE"])
				{
					$pagging_vars = $this->pageList($pagging_vars, $InfoArray["PREV_PAGE"]);
					$ret.="<a class='link-pre-next' href=\"javascript:" . $CallFunction . "('" . $InfoArray["PREV_PAGE"] . "','&page=" . $InfoArray["CURRENT_PAGE_NAME"] . $pagging_vars . "')\">Previous</a>";
				}
				else
				{
					//	$ret.="Previous";
				}

				$ret.= "  ";

				if ($InfoArray["CURRENT_PAGE"] != 1)
				{
					//	  $ret= "<a class='link-pre-next' href='?page=".$InfoArray["CURRENT_PAGE_NAME"]."&pageno=1".$extra_vars."'>&lt;&lt;</a> ";
				}
				else
				{
					$ret = "<span class='disabled'> &lt;&lt; </span>";
				}

				for ($i = 0; $i < count($InfoArray["PAGE_NUMBERS"]); $i++) {
					if ($InfoArray["CURRENT_PAGE"] == $InfoArray["PAGE_NUMBERS"][$i])
					{
						$ret.="<a style=\"color:#565656;font-weight:bold;background-color:#CCC;font-size:14px;color:black;\" >" . $InfoArray["PAGE_NUMBERS"][$i] . "</a> ";
					}
					else
					{
						$pagging_vars = $this->pageList($pagging_vars, $InfoArray["PAGE_NUMBERS"][$i]);
						$ret.="<a class='link-pre-next' href=\"javascript:" . $CallFunction . "('" . $InfoArray["PAGE_NUMBERS"][$i] . "','&page=" . $InfoArray["CURRENT_PAGE_NAME"] . $pagging_vars . "')\">" . $InfoArray["PAGE_NUMBERS"][$i] . "</a>  ";
					}
				}


				/* Print out our next link */
				if ($InfoArray["NEXT_PAGE"])
				{
					$pagging_vars = $this->pageList($pagging_vars, $InfoArray["NEXT_PAGE"]);
					$ret.= " <a class='link-pre-next' href=\"javascript:" . $CallFunction . "('" . $InfoArray["NEXT_PAGE"] . "','&page=" . $InfoArray["CURRENT_PAGE_NAME"] . $pagging_vars . "')\">Next</a>";
				}
				else
				{
					//  $ret.="Next";
				}

				/* Print our last link */
				if ($InfoArray["CURRENT_PAGE"] != $InfoArray["TOTAL_PAGES"])
				{
					//	$ret.=" <a class='link-pre-next' href='?page=".$InfoArray["CURRENT_PAGE_NAME"]."&pageno=" . $InfoArray["TOTAL_PAGES"] . $extra_vars."'>>></a>";
				}
				else
				{
					$ret.="<span class='disabled'> &gt;&gt; </span>";
				}
			}
		}
		return $ret;
	}

	function pageList($pagging_vars, $data)
	{
		$gridId = 1;
		$pageList;
		$tmpArray = explode('&', $pagging_vars);
		foreach ($tmpArray as $key => &$value) {
			$tmpVar = explode('=', $value);

			if ($tmpVar[0] == 'grid')
			{
				$gridId = $tmpVar[1];
			}
			if ($tmpVar[0] == 'page_list')
			{
				$pageList = explode(',', $tmpVar[1]);
				$pageList[$gridId - 1] = $data;

				$pageListString = implode(',', $pageList);
				$tmpVar[1] = $pageListString;
			}
			$value = implode('=', $tmpVar);
		}
		$pagging_vars = implode('&', $tmpArray);
		return $pagging_vars;
	}

}

?>