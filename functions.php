<?php
	function calcGST($p, $numtrav, $gst)
	{
		global $num_uses;
		$num_uses++;
		print("in calcGST: $num_uses");
		return ($p * $numtrav) * $gst;
		//return $tax;
	}

	function connectDB($h, $u, $p,$d)
		{
			$mysqli=new mysqli($h,$u, $p,$d);
			if (mysqli_connect_error())
			{
				print("Connect Error:".mysqli_connect_error());
				exit();
			}
			return $mysqli;
		}

	function selectAgency($mysqli)
		{
			$sql="SELECT AgencyId, AgncyAddress, AgncyCity FROM agencies";
			$result=$mysqli->query($sql);
			$agency="<select name='AgencyId' id='AgencyId'>";
			while ($row=$result->fetch_row())
				{
					$agency.="<option value=$row[0]>$row[1]$row[2] </option>";
				}
			$agency.="</select>";
			//$mysqli->close();
			return $agency;
		}

	//selectAgent used to select an agent from the dropdown list and return the AgentId as part of $_REQUEST
	function selectAgent($mysqli)
		{
			$sql="SELECT AgentId, AgtFirstName, AgtLastName FROM agents";
			$result=$mysqli->query($sql);
			$agent="<select name='AgentId' id='AgentId'>";
			while ($row=$result->fetch_row())
				{
					$agent.="<option value=$row[0]>$row[1]$row[2] </option>";
				}
			$agent.="</select>";
		//	$mysqli->close();
			return $agent;
		}

	//selectAgents used to select an agent from the dropdown list and display all fields for this agent in the same page
	function selectAgents($mysqli)
		{
			$sql="SELECT AgentId, AgtFirstName, AgtLastName FROM agents";
			$result=$mysqli->query($sql);
			$agents="<select name='AgentId' onchange='getAgent(this.value)'>";
			$agents.="<option value=''> Select an Agent </option>";
			while ($row=$result->fetch_row())
				{
					$agents.="<option value=$row[0]>$row[1]$row[2] </option>";
				}
			$agents.="</select>";
		//	$mysqli->close();
			return $agents;
		}

	function selectCustomers($mysqli)
		{
			$sql="SELECT CustomerId,userid,CustFirstName, CustLastName FROM customers";
			$result=$mysqli->query($sql);
			$customer="<select name='Customerid' onchange='getCustomer(this.value)'>";
			$customer.="<option value=''> Select the customer </option>";
			while ($row=$result->fetch_row())
				{
					$customer.="<option value=$row[0]>$row[0]$row[1]$row[2]$row[3] </option>";
				}
			$customer.="</select>";
		//	$mysqli->close();
			return $customer;
		}

	function insertAgent($agent)
		{
				$dbh=mysqli_connect("localhost","n20","0000","travelexperts"); //database handler
				if (!$dbh) // check $dbh connected or not ! means not connected
					{
						die("Connect Error:".mysqli_connect_errno()."-".mysqli_connect_error());
					}
				//print("connected to database");

				$sql="INSERT INTO `agents` (`AgentId`, `AgtFirstName`, `AgtMiddleInitial`, `AgtLastName`, `AgtBusPhone`, `AgtEmail`, `AgtPosition`, `AgencyId`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?)"; 	//build sql query
				$stmt=mysqli_prepare($dbh,$sql);

				if (!$stmt)
					{
						die("Error:".mysqli_error($dbh));
					}
				mysqli_stmt_bind_param($stmt,"ssssssi",$agent['AgtFirstName'],$agent['AgtMiddleInitial'],$agent['AgtLastName'],$agent['AgtBusPhone'],$agent['AgtEmail'],$agent['AgtPosition'],$agent['AgencyId']);

				mysqli_stmt_execute($stmt);
				if(mysqli_stmt_affected_rows($stmt))
					{
						mysqli_close($dbh);
						return true;
					}
				else
					{
						mysqli_close($dbh);
						return false;
					}
		}
	function insertAgentObject($agent)  //insert agent as an object
		{
				$dbh=mysqli_connect("localhost","n20","0000","travelexperts"); //database handler
				if (!$dbh) // check $dbh connected or not ! means not connected
					{
						die("Connect Error:".mysqli_connect_errno()."-".mysqli_connect_error());
					}


				$sql="INSERT INTO `agents` (`AgentId`, `AgtFirstName`, `AgtMiddleInitial`, `AgtLastName`, `AgtBusPhone`, `AgtEmail`, `AgtPosition`, `AgencyId`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?)"; 	//build sql query
				$stmt=mysqli_prepare($dbh,$sql);

				if (!$stmt)
					{
						die("Error:".mysqli_error($dbh));
					}
				mysqli_stmt_bind_param($stmt,"ssssssi",$agent->getAgtFirstName(),$agent->getAgtMiddleInitial(),$agent->getAgtLastName(),$agent->getAgtBusPhone(),$agent->getAgtEmail(),$agent->getAgtPosition(),$agent->getAgencyId() );

				mysqli_stmt_execute($stmt);
				if(mysqli_stmt_affected_rows($stmt))
					{
						mysqli_close($dbh);
						return true;
					}
				else
					{
						mysqli_close($dbh);
						return false;
					}

		}

	function updateAgent($agent)
	{
		$sql = "UPDATE `agents` SET `AgtFirstName`=?, `AgtMiddleInitial`=?, `AgtLastName`=?, `AgtBusPhone`=?, `AgtEmail`=?, `AgtPosition`=?, `AgencyId`=? WHERE AgentId=?";
		$dbh = mysqli_connect("localhost", "n20", "0000", "travelexperts");
		if (! $dbh)
		{
			die ("Error: " . mysqli_connect_errno() . " - " . mysqli_connect_error());
		}
		$stmt = mysqli_prepare($dbh, $sql);
		if (! $stmt)
		{
			die ("Error: " . mysqli_error($dbh));
		}
		mysqli_stmt_bind_param($stmt, "ssssssii", $agent['AgtFirstName'], $agent['AgtMiddleInitial'], $agent['AgtLastName'], $agent['AgtBusPhone'], $agent['AgtEmail'], $agent['AgtPosition'], $agent['AgencyId'], $agent['AgentId']);
		mysqli_stmt_execute($stmt);
		$count=mysqli_stmt_affected_rows($stmt); // to be removed
		print $count;// to be removed
		if (mysqli_error($dbh))
		{
			print("Statement has an error: " . mysqli_error());
		}
		if (mysqli_stmt_affected_rows($stmt))
		{

			mysqli_close($dbh);
			return true;
		}
		else
		{
			mysqli_close($dbh);
			return false;
		}

	}

	function updateAgentObject($agent)
	{
		$sql = "UPDATE `agents` SET `AgtFirstName`=?, `AgtMiddleInitial`=?, `AgtLastName`=?, `AgtBusPhone`=?, `AgtEmail`=?, `AgtPosition`=?, `AgencyId`=? WHERE AgentId=?";
		$dbh = mysqli_connect("localhost", "n20", "0000", "travelexperts");
		if (! $dbh)
		{
			die ("Error: " . mysqli_connect_errno() . " - " . mysqli_connect_error());
		}
		$stmt = mysqli_prepare($dbh, $sql);
		if (! $stmt)
		{
			die ("Error: " . mysqli_error($dbh));
		}
		mysqli_stmt_bind_param($stmt, "ssssssii", $agent->getAgtFirstName(),$agent->getAgtMiddleInitial(),$agent->getAgtLastName(),$agent->getAgtBusPhone(),$agent->getAgtEmail(),$agent->getAgtPosition(),$agent->getAgencyId(), $agent->getAgentId());
		mysqli_stmt_execute($stmt);
		$count=mysqli_stmt_affected_rows($stmt); // to be removed
		print $count;// to be removed
		if (mysqli_error($dbh))
		{
			print("Statement has an error: " . mysqli_error());
		}
		if (mysqli_stmt_affected_rows($stmt))
		{

			mysqli_close($dbh);
			return true;
		}
		else
		{
			mysqli_close($dbh);
			return false;
		}

	}


	function insertCustObj($customer)  //insert agent as an object
		{
				$dbh=mysqli_connect("localhost","n20","0000","travelexperts"); //database handler
				if (!$dbh) // check $dbh connected or not ! means not connected
					{
						die("Connect Error:".mysqli_connect_errno()."-".mysqli_connect_error());
					}
				//print("connected to database");

				$sql="INSERT INTO `customers` (`CustomerId`, `CustFirstName`, `CustLastName`,`CustAddress`,`CustCity`,`CustProv`,`CustPostal`, `CustCountry`, `CustHomePhone`, `CustBusPhone`,`CustEmail`, `AgentId`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"; 	//build sql query
				$stmt=mysqli_prepare($dbh,$sql);

				if (!$stmt)
					{
						die("Error:".mysqli_error($dbh));
					}
				mysqli_stmt_bind_param($stmt,"ssssssssssi",$customer->getCustFirstName(),$customer->getCustLastName(),$customer->getCustAddress(),$customer->getCustCity(),$customer->getCustProv(),$customer->getCustPostal(),$customer->getCustCountry(),$customer->getCustHomePhone(),$customer->getCustBusPhone(),$customer->getCustEmail(),$customer->getAgentId());

				mysqli_stmt_execute($stmt);
				if(mysqli_stmt_affected_rows($stmt))
					{
						mysqli_close($dbh);
						return true;
					}
				else
					{
						mysqli_close($dbh);
						return false;
					}

		}

	function updateCustomerObject($customer)
	{
		$sql = "UPDATE `customers` SET `CustFirstName`=?, `CustLastName`=?, `CustAddress`=?, `CustCity`=?, `CustProv`=?, `CustPostal`=?,`CustCountry`=?,`CustHomePhone`=?,`CustBusPhone`=?,`CustEmail`=?, `AgentId`=?,`password`=? WHERE userid=?";
		$dbh = mysqli_connect("localhost", "n20", "0000", "travelexperts");
		if (! $dbh)
		{
			die ("Error: " . mysqli_connect_errno() . " - " . mysqli_connect_error());
		}
		$stmt = mysqli_prepare($dbh, $sql);
		if (! $stmt)
		{
			die ("Error: " . mysqli_error($dbh));
		}
		mysqli_stmt_bind_param($stmt, "ssssssssssiss", $customer->getCustFirstName(),$customer->getCustLastName(),$customer->getCustAddress(),$customer->getCustCity(),$customer->getCustProv(),$customer->getCustPostal(),
		$customer->getCustCountry(), $customer->getCustHomePhone(),$customer->getCustBusPhone(),$customer->getCustEmail(),$customer->getAgentId(),$customer->getpassword(),$customer->getuserid);
		mysqli_stmt_execute($stmt);
		$count=mysqli_stmt_affected_rows($stmt); // to be removed
		print $count;// to be removed
		if (mysqli_error($dbh))
		{
			print("Statement has an error: " . mysqli_error());
		}
		if (mysqli_stmt_affected_rows($stmt))
		{

			mysqli_close($dbh);
			return true;
		}
		else
		{
			mysqli_close($dbh);
			return false;
		}

	}


	function validate($data)
	{
		$message="";
		foreach($data as $k=>$v)
			{
				if ($v=="")
					{
						$message.="$k must have a value<br/>";

					}
			}
		return $message;

	}

	function printPkg($pkgid)
	{

			$dbh= mysqli_connect("localhost","n20","0000","travelexperts"); //database handler
			if (!$dbh) // check $dbh connected or not ! means not connected
					{
						die("Connect Error:".mysqli_connect_errno()."-".mysqli_connect_error());
					}


			$sql="select `PackageId`, `PkgName`, date(`PkgStartDate`), date(`PkgEndDate`), `PkgDesc`, convert(`PkgBasePrice`,decimal(10,2)), `PkgAgencyCommission` from packages WHERE `PackageId` = $pkgid"; 	//build sql query
			if ($result=mysqli_query($dbh,$sql)) //pass db name and query to mysqli_query function and return query result to $result, the result is a set
				{

					while ($row=$result->fetch_row())
						{

							print("<h1 class='text-white font-weight-light'>".$row[1]."</h1>");
							print("<p class='lead text-white mt-4'>".$row[4]."</p>");
							print("<p class='lead text-white mt-4'>"."Duration: ".$row[2]." ~ ".$row[3]."</p>");
							print("<p class='lead text-black-50 mt-5 font-weight-bold'>"."Price: $".$row[5]."</p>");

						}


					mysqli_free_result($result);
				}

				mysqli_close($dbh);


	}

	function listPkg()
	{

			$dbh= mysqli_connect("localhost","n20","0000","travelexperts"); //database handler
			if (!$dbh) // check $dbh connected or not ! means not connected
					{
						die("Connect Error:".mysqli_connect_errno()."-".mysqli_connect_error());
					}


			$sql="select `PackageId`, `PkgName`, date(`PkgStartDate`), date(`PkgEndDate`), `PkgDesc`, convert(`PkgBasePrice`,decimal(10,2)), `PkgAgencyCommission`, `Image`from packages"; 	//build sql query
			if ($result=mysqli_query($dbh,$sql)) //pass db name and query to mysqli_query function and return query result to $result, the result is a set
				{
					$i=0;
					while ($row=$result->fetch_row())
						{

						  print('<div class="col-md-6 col-lg-3 mb-5 mb-lg-0 justify-content-center">');
						  print(' <div class="px-4">');
							print('<div class="hvr-buzz">');
							print('			<img title='.$row[1].' src="./assets/img/theme/'.$row[7].'1.jpg" class="rounded-circle img-center  img-fluid shadow shadow-lg--hover" style="width: 210px; height:120px" onclick="displaywindow(\''.$row[0].'\',\''.$row[1].'\',\''.$row[2].'\',\''.$row[3].'\',\''.$row[4].'\',\''.$row[5].'\',\''.$row[7].'\')" /> ');
							print('		</div>');
							print('  <div class="pt-4 text-left">');
							print('	<h5 class="title">');
							print('	  <span class="d-inline mb-1" style="white-space:nowrap">'.$row[1].'</span>');
							print('	</h5>');
							print('	<h5 class="title">');
							print('	  <span class="d-inline mb-1" style="white-space:nowrap">'.'From: $'.$row[5].'</span>');
							print('	</h5>');
							print('	<div class="mt-3">');
							print('	  <a onclick="displaywindow(\''.$row[0].'\',\''.$row[1].'\',\''.$row[2].'\',\''.$row[3].'\',\''.$row[4].'\',\''.$row[5].'\',\''.$row[7].'\')" class="btn btn-white btn-icon-only rounded-circle">');
							print('		<i class="fa fa-picture-o"></i>');
							print('	  </a>');
							//print('	  <a href="#" class="btn btn-warning btn-icon-only rounded-circle">');
							//print('		<i class="fa fa-share"></i>');
							//print('	  </a>');
							//print('<div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" /><input type="submit" value="Add to Cart" class="btnAddAction" /></div> ');

							print('	  <a href="packageobsolete1.php" class="btn btn-info btn-icon-only rounded-circle"> ');
							print('		<i class="fa fa-shopping-cart"></i>');
							print('	  </a>');

							print('	</div>');
							print('  </div>');
							print('</div>');
							print('</br></br>');
						  print('</div>');

						}


					mysqli_free_result($result);
				}

				mysqli_close($dbh);


	}

function selectPkgs($mysqli)
		{
			$sql="SELECT `PackageId`,`PkgName`,`PkgStartDate`,`PkgEndDate`,`PkgDesc`,`PkgBasePrice`,`PkgAgencyCommission`,`Image` FROM `packages` ";
			$result=$mysqli->query($sql);
			$package="<select name='pkgId'  onchange='getPackage(this.value)'>";
			$package.="<option value=''> Select a package </option>";
			while ($row=$result->fetch_row())
				{
					$package.="<option value=$row[0]>$row[0]"."-"."$row[1]</option>";
				}
			$package.="</select>";

		//	$mysqli->close();
			return $package;
		}




	function updatePkgObject($package)
	{
		$sql = "UPDATE `packages` SET `PkgName`=?, `PkgStartDate`=?, `PkgEndDate`=?, `PkgDesc`=?, `PkgBasePrice`=?, `PkgAgencyCommission`=?,`Image`=? WHERE PackageId=?";
		$dbh = mysqli_connect("localhost", "n20", "0000", "travelexperts");
		if (! $dbh)
		{
			die ("Error: " . mysqli_connect_errno() . " - " . mysqli_connect_error());
		}
		$stmt = mysqli_prepare($dbh, $sql);
		if (! $stmt)
		{
			die ("Error: " . mysqli_error($dbh));
		}
		mysqli_stmt_bind_param($stmt, "ssssddsi", $package->getPkgName(),$package->getPkgStartDate(),$package->getPkgEndDate(),$package->getPkgDesc(),$package->getPkgBestPrice(),$package->getPkgAgencyCommission(),$package->getImage(), $package->getPackageId());
		mysqli_stmt_execute($stmt);
		$count=mysqli_stmt_affected_rows($stmt); // to be removed
		print $count;// to be removed
		if (mysqli_error($dbh))
		{
			print("Statement has an error: " . mysqli_error());
		}
		if (mysqli_stmt_affected_rows($stmt))
		{

			mysqli_close($dbh);
			return true;
		}
		else
		{
			mysqli_close($dbh);
			return false;
		}

	}

	function deletePkg($package)
	{
		$sql = "DELETE FROM `packages`  WHERE PackageId=".$package;
		$dbh = mysqli_connect("localhost", "n20", "0000", "travelexperts");
		if (! $dbh)
		{
			die ("Error: " . mysqli_connect_errno() . " - " . mysqli_connect_error());
		}
		$stmt = mysqli_prepare($dbh, $sql);
		if (! $stmt)
		{
			die ("Error: " . mysqli_error($dbh));
		}

	//	$p=intval(9);
	//	mysqli_stmt_bind_param($stmt, "i", $p);
		mysqli_stmt_execute($stmt);
		$count=mysqli_stmt_affected_rows($stmt); // to be removed
		print $count;// to be removed
		if (mysqli_error($dbh))
		{
			print("Statement has an error: " . mysqli_error());
		}
		if (mysqli_stmt_affected_rows($stmt))
		{

			mysqli_close($dbh);
			return true;
		}
		else
		{
			mysqli_close($dbh);
			return false;
		}

	}

	function insertPkgObject($package)  //insert agent as an object
		{
				$dbh=mysqli_connect("localhost","n20","0000","travelexperts"); //database handler
				if (!$dbh) // check $dbh connected or not ! means not connected
					{
						die("Connect Error:".mysqli_connect_errno()."-".mysqli_connect_error());
					}

				// hard code for testing purpose
				//$sql="INSERT INTO packages(PkgName, PkgStartDate, PkgEndDate, PkgDesc, PkgBasePrice, PkgAgencyCommission)  VALUES ( 'lily', '2019-12-01 00:00:00', '2019-12-13 00:00:00', 'test', 1234, 12)"; 	//build sql query
				$sql="INSERT INTO packages(PkgName, PkgStartDate, PkgEndDate, PkgDesc, PkgBasePrice, PkgAgencyCommission,Image)  VALUES ( ?, ?, ?, ?, ?, ?,?)";
				$stmt=mysqli_prepare($dbh,$sql);

				if (!$stmt)
					{
						die("Error:".mysqli_error($dbh));
					}
				mysqli_stmt_bind_param($stmt,"ssssdds",$package->getPkgName(),$package->getPkgStartDate(),$package->getPkgEndDate(),$package->getPkgDesc(),$package->getPkgBestPrice(),$package->getPkgAgencyCommission(),$package->getImage() );

				mysqli_stmt_execute($stmt);
				if(mysqli_stmt_affected_rows($stmt))
					{
						mysqli_close($dbh);
						return true;
					}
				else
					{
						mysqli_close($dbh);
						return false;
					}

		}
