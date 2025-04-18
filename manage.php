<?php
require_once("settings.php");

// Function to sanitize input data
function sanitizeInput($input) {
    return htmlspecialchars(trim(stripslashes($input)));
}

// Handle form submissions
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["manage_search_button"])) {
        // Search query based on user input
        $jobReference = sanitizeInput(isset($_POST["manage_job_reference_number"]) ? $_POST["manage_job_reference_number"] : "");
        $firstName = sanitizeInput(isset($_POST["manage_first_name"]) ? $_POST["manage_first_name"] : "");
        $lastName = sanitizeInput(isset($_POST["manage_last_name"]) ? $_POST["manage_last_name"] : "");

        $sql = "SELECT * FROM Process_EOI WHERE 1";
        if (!empty($jobReference)) {
            $sql .= " AND job_reference = '$jobReference'";
        }
        if (!empty($firstName)) {
            $sql .= " AND first_name = '$firstName'";
        }
        if (!empty($lastName)) {
            $sql .= " AND last_name = '$lastName'";
        }

    } elseif (isset($_POST["manage_delete_button"])) {
        // Delete EOIs by job reference
        if (!empty($_POST["manage_job_reference_number"])) {
            $jobReference = sanitizeInput($_POST["manage_job_reference_number"]);
            $sql = "DELETE FROM Process_EOI WHERE job_reference = '$jobReference'";

            if (mysqli_query($conn, $sql)) {
                echo "EOIs with job reference '$jobReference' deleted successfully.";
                mysqli_query($conn, "ALTER TABLE Process_EOI AUTO_INCREMENT = 1");
                echo "<a href='manage.php'>Back to Manage Page</a>";
            } else {
                echo "Error: " . mysqli_error($conn);
            }
            exit();
        }
    } elseif (isset($_POST["manage_status"])) {
        // Change status of an EOI entry
        if (!empty($_POST["eoi_number"]) && !empty($_POST["manage_status"])) {
            $eoiID = sanitizeInput($_POST["eoi_number"]);
            $status = sanitizeInput($_POST["manage_status"]);
            $sql = "UPDATE Process_EOI SET status = '$status' WHERE EOInumber = $eoiID";

            if (mysqli_query($conn, $sql)) {
                echo "Status updated successfully.";
                echo "<a href='manage.php'>Back to Manage Page</a>";
            } else {
                echo "Error: " . mysqli_error($conn);
            }
            exit();
        }
    } elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
        $sql = "SELECT * FROM Process_EOI";
    
        if (isset($_POST["filter_button"])) {
            $filterColumn = isset($_POST["filter_column"]) ? $_POST["filter_column"] : "EOInumber";
            $filterOrder = isset($_POST["filter_order"]) ? $_POST["filter_order"] : "ASC";
    
            // Chỉ cho phép sắp xếp theo các cột hợp lệ để tránh SQL Injection
            $allowedColumns = ["EOInumber", "status"];
            $allowedOrders = ["ASC", "DESC"];
    
            if (in_array($filterColumn, $allowedColumns) && in_array($filterOrder, $allowedOrders)) {
                $sql .= " ORDER BY $filterColumn $filterOrder";
            }
        }
    
        $result = mysqli_query($conn, $sql);
    } else {
        $sql = "SELECT * FROM Process_EOI";

    }
} else {
    $sql = "SELECT * FROM Process_EOI";
}

$result = mysqli_query($conn, $sql);
?>

<!-- HTML FORM -->
<!DOCTYPE html>
<html lang="en" class="manage_page_html">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:500,900,100,300,700,400">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lilita+One&family=Monomakh&family=Oswald:wght@200..700&family=Russo+One&family=Sigmar&display=swap" rel="stylesheet">
<link rel="stylesheet" href="styles/style.css">
<title>Manage Page</title>

<script>
    class StickyNavigation {
	
	constructor() {
		this.currentId = null;
		this.currentTab = null;
		this.tabContainerHeight = 70;
		let self = this;
		$('.manage_hero_tab').click(function() { 
			self.onTabClick(event, $(this)); 
		});
		$(window).scroll(() => { this.onScroll(); });
		$(window).resize(() => { this.onResize(); });
	}
	
	onTabClick(event, element) {
		event.preventDefault();
		let scrollTop = $(element.attr('href')).offset().top - this.tabContainerHeight + 1;
		$('manage_page_html, manage_container').animate({ scrollTop: scrollTop }, 600);
	}
	
	onScroll() {
		this.checkTabContainerPosition();
        this.findCurrentTabSelector();
	}
	
	onResize() {
		if(this.currentId) {
			this.setSliderCss();
		}
	}
	
	checkTabContainerPosition() {
		let offset = $('.manage_dong1').offset().top + $('.manage_dong1').height() - this.tabContainerHeight;
		if($(window).scrollTop() > offset) {
			$('.manage_nav').addClass('manage_nav--top');
		} 
		else {
			$('.manage_nav').removeClass('manage_nav--top');
		}
	}
	
	findCurrentTabSelector(element) {
		let newCurrentId;
		let newCurrentTab;
		let self = this;
		$('.manage_hero_tab').each(function() {
			let id = $(this).attr('href');
			let offsetTop = $(id).offset().top - self.tabContainerHeight;
			let offsetBottom = $(id).offset().top + $(id).height() - self.tabContainerHeight;
			if($(window).scrollTop() > offsetTop && $(window).scrollTop() < offsetBottom) {
				newCurrentId = id;
				newCurrentTab = $(this);
			}
		});
		if(this.currentId != newCurrentId || this.currentId === null) {
			this.currentId = newCurrentId;
			this.currentTab = newCurrentTab;
			this.setSliderCss();
		}
	}
	
	setSliderCss() {
		let width = 0;
		let left = 0;
		if(this.currentTab) {
			width = this.currentTab.css('width');
			left = this.currentTab.offset().left;
		}
		$('.manage_hero_tab_slider').css('width', width);
		$('.manage_hero_tab_slider').css('left', left);
	}
	
}

new StickyNavigation();
</script>

</head>
<body class="manage_container">
<header class="manage_dong1">
    <nav class="manage_nav manage_nav--top">
        <div class="manage_navdiv">
            <h1 class="manage_logo">Manager Page</h1>
            <ul class="manage_heading_nav1">
                <li ><a class="manage_hero_tab" href="index.php">Home</a></li>
                <li ><a class="manage_hero_tab" href="apply.php">Add Users</a></li>
                <li ><a id="logout_managepage" class="manage_hero_tab" href="manage_logout.php">Log out</a></li>
                <span class="manage_hero_tab_slider"></span>
            </ul>
        </div>
    </nav>
</header>

<fieldset class="manage_dong2">
    <form method="post">
        <input type="text" name="manage_job_reference_number" class="manage_job_reference" placeholder="Job Reference Number">
        <input type="text" name="manage_first_name" class="manage_first_name" placeholder="First Name">
        <input type="text" name="manage_last_name" class="manage_last_name" placeholder="Last Name">
        <button type="submit" name="manage_search_button" class="manage_search_button">Search</button>
        <button type="submit" name="manage_delete_button" class="manage_delete_button">Delete</button>
        <button type="submit" name="manage_show_EOI_button" class="manage_show_EOI_button">Show all EOIs </button>
    </form>
    
    <form method="post">
        <label>Status</label>
        <select name="manage_status">
            <option value="New">New</option>
            <option value="Current">Current</option>
            <option value="Final">Final</option>
        </select>
        <input type="text" name="eoi_number" placeholder="EOI Number">
        <input type="submit" value="Change">
    </form>

    <form method="post" class="filter_container">
        <label>Filter by:</label>
        <select name="filter_column">
            <option value="EOInumber">EOI Number</option>
            <option value="status">Status</option>
        </select>

        <label>Order:</label>
        <select name="filter_order">
            <option value="ASC">Ascending</option>
            <option value="DESC">Descending</option>
        </select>

        <button type="submit" name="filter_button">Apply Filter</button>
    </form>
</fieldset>

<!-- HTML TABLE -->
<div class="table_container" style="overflow-x: auto;">
<table border = 0 class="manage_table" >
    <thead class="manage_thead">
        <tr class="manage_table_row">
            <th class="manage_table_interface">EOI NUMBER</th>
            <th class="manage_table_interface">JOB REFERENCE</th>
            <th class="manage_table_interface">FIRST NAME</th>
            <th class="manage_table_interface">LAST NAME</th>
            <th class="manage_table_interface">DATE OF BIRTH</th>
            <th class="manage_table_interface">GENDER</th>
            <th class="manage_table_interface">STREET ADDRESS</th>
            <th class="manage_table_interface">SUBURB</th>
            <th class="manage_table_interface">STATE</th>
            <th class="manage_table_interface">POSTCODE</th>
            <th class="manage_table_interface">EMAIL</th>
            <th class="manage_table_interface">PHONE</th>
            <th class="manage_table_interface">SKILLS</th>
            <th class="manage_table_interface">OTHER SKILLS</th>
            <th class="manage_table_interface">STATUS</th>
        </tr>
    </thead>
    <tbody class="manage_tbody">
        <?php while ($row = mysqli_fetch_array($result)) { ?>
            <tr class="manage_table_row">
                <td class="manage_table_db"><?php echo $row['EOInumber']; ?></td>
                <td class="manage_table_db"><?php echo $row['job_reference']; ?></td>
                <td class="manage_table_db"><?php echo $row['first_name']; ?></td>
                <td class="manage_table_db"><?php echo $row['last_name']; ?></td>
                <td class="manage_table_db"><?php echo $row['dob']; ?></td>
                <td class="manage_table_db"><?php echo $row['gender']; ?></td>
                <td class="manage_table_db"><?php echo $row['street_address']; ?></td>
                <td class="manage_table_db"><?php echo $row['suburb']; ?></td>
                <td class="manage_table_db"><?php echo $row['state']; ?></td>
                <td class="manage_table_db"><?php echo $row['postcode']; ?></td>
                <td class="manage_table_db"><?php echo $row['email']; ?></td>
                <td class="manage_table_db"><?php echo $row['phone']; ?></td>
                <td class="manage_table_db"><?php echo $row['skills']; ?></td>
                <td class="manage_table_db"><?php echo $row['other_skills']; ?></td>
                <td class="manage_table_db"><?php echo $row['status']; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
</div>

</body>
</html>

<?php
// Close database connection
mysqli_close($conn);
?>
